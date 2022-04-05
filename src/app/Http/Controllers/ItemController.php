<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller {
    public function index() {
        $shop_items = Item::select('id', 'name', 'postage', 'price', 'category_id', 'shop_id')
                            ->with('item_imgs:id,name,item_id')
                            // ->where('relations.item_imgs', 0)
                            ->take(15)->get();

        $parent_cat = DB::table('parent_cats')->select('id', 'name', 'icon')->get();
        return view('index', compact('shop_items', 'parent_cat'));
    }

    public function show($id) {
        $shop_item = Item::where('id', $id)
                            ->select('id', 'name', 'content', 'postage', 'price', 'category_id', 'shop_id')
                            ->with([
                                'category:id,name,parent_id', 
                                'category.parent_cat:id,name', 
                                'shop:id,name', 
                                'shop.shop_info', 
                                'item_imgs:id,name,item_id', 
                            ])->first();
        $parent_cat = DB::table('parent_cats')->select('id', 'name', 'icon', )->get();
        return view('show', compact('shop_item', 'parent_cat'));
    }

    public function create() {
        $parent_cat = DB::table('parent_cats')->select('id', 'name', 'icon', )->get();
        return view('new', compact('parent_cat'));
    }

    public function store(Request $request) {
        try {
            $item_id = DB::transaction(function () use ($request) {
                $item = new Item();
                $item->fill([
                    'name'          => $request->name,
                    'content'       => $request->content,
                    'postage'       => $request->postage,
                    'price'         => $request->price,
                    'category_id'   => $request->category,
                    'shop_id'       => 1,
                ])->save();

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
            $flash_message = 'flash_message';
            $message = '商品の登録に失敗しました';
        }
        return redirect()->route('show', ['item' => $item_id])->with($flash_message, $message);
    }
}
