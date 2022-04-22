<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemImg;
use App\Services\ItemService;
use App\Http\Requests\PostItemRequest;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller {
    protected $itemService;
    public function __construct(ItemService $itemService) {
        $this->itemService = $itemService;
    }

    public function index() {
        $shop_items = $this->itemService->fetchItems()->take(15)->get();
        return view('index', compact('shop_items', ));
    }

    public function show($id) {
        $shop_item = $this->itemService->fetchItemById($id);
        return view('show', compact('shop_item', ));
    }

    public function create() {
        return view('new');
    }

    public function store(PostItemRequest $request) {
        try {
            $item_id = DB::transaction(function () use ($request) {
                $item = new Item();
                $item->fill(
                    $this->itemService->itemAttributes($request, 1)
                )->save();

                $item_imgs = $request->file('item_img');
                foreach($item_imgs as $item_img) {
                    $file_name = $item_img->getClientOriginalName();
                    $item_img->storeAS('public/item_img', $file_name);

                    $img = new ItemImg();
                    $img->fill([
                        'name'      => $file_name,
                        'item_id'   => $item->id,
                    ])->save();
                }

                return $item->id;
            });
            $flash_message = 'flash_message_success';
            $message = '商品を登録しました';
        } catch (Throwable $e) {
            DB::rollback();
            $flash_message = 'flash_message';
            $message = '商品の登録に失敗しました';
        }
        return redirect()->route('show', ['item' => $item_id])->with($flash_message, $message);
    }
}
