<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostShopRequest;
use App\Services\CategoryService;
use App\Services\ItemService;
use App\Services\ShopService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    protected $categoryService;
    protected $itemService;
    protected $shopService;
    public function __construct(CategoryService $categoryService, ItemService $itemService, ShopService $shopService) {
        $this->categoryService = $categoryService;
        $this->itemService = $itemService;
        $this->shopService = $shopService;
    }

    public function show($id) {
        $shop = $this->shopService->fetchShop($id);
        $holiday = implode($this->shopService->holidayToString($shop->shop_info->holiday));
        return view('shop.show', compact('shop', 'holiday'));
    }

    public function showItem($id) {
        $shop = $this->shopService->fetchShop($id);
        $items = $this->itemService->fetchItemByShopId($id);
        return view('shop.item_list', compact('shop', 'items', ));
    }

    public function edit($id) {
        $shop = $this->shopService->fetchShop($id);
        $holiday = $this->shopService->holidayToString($shop->shop_info->holiday);
        return view('shop.mypage.edit', compact('shop', 'holiday'));
    }

    public function update(PostShopRequest $request, $id) {
        $shop = $this->shopService->fetchShop($id);
        $holiday_array = $request->holiday;
        $holiday_data = $this->shopService->holidayToInt($holiday_array);
        try {
            $shop_id = DB::transaction(function () use ($request, $shop, $holiday_data) {
                $shop->fill(
                    $this->shopService->shopAttributes($request)
                )->save();

                $shop->shop_info->fill(
                    $this->shopService->shopInfoAttributes($request, $holiday_data)
                )->save();

                return $shop->id;
            });
            $flash_message = 'flash_message_success';
            $message = 'ショップ情報を更新しました';
        } catch (Throwable $e) {
            DB::rollback();
            $flash_message = 'flash_message';
            $message = 'ショップ情報の更新に失敗しました';
        }
        return redirect()->route('shop.show', ['shop' => $shop_id])->with($flash_message, $message);
    }
}
