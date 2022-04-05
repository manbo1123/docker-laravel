<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostShopRequest;
use App\Models\Item;
use App\Models\Shop;
use App\Models\ShopInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function show($id) {
        $parent_cat = DB::table('parent_cats')->select('id', 'name', 'icon')->get();
        $shop = Shop::where('id', $id)->select('id', 'name')->with('shop_info')->first();
        $holiday = implode(ShopInfo::holiday($shop->shop_info->holiday));
        return view('shop.show', compact('parent_cat', 'shop', 'holiday'));
    }

    public function showItem($id) {
        $parent_cat = DB::table('parent_cats')->select('id', 'name', 'icon')->get();
        $shop = Shop::where('id', $id)->select('id', 'name')->first();
        $items = Item::where('shop_id', $id)
                        ->select('id', 'name', 'postage', 'price', 'category_id', 'shop_id')
                        ->with('item_imgs:id,name,item_id')->get();
        return view('shop.item_list', compact('parent_cat', 'shop', 'items', ));
    }

    public function edit($id) {
        $parent_cat = DB::table('parent_cats')->select('id', 'name', 'icon')->get();
        $shop = Shop::where('id', $id)->select('id', 'name', 'email')->first();
        $holiday = ShopInfo::holiday($shop->shop_info->holiday);
        return view('shop.mypage.edit', compact('parent_cat', 'shop', 'holiday'));
    }

    public function update(PostShopRequest $request, $id) {
        $shop = Shop::where('id', $id)->select('id', 'name', 'email')->first();
        $holiday_array = $request->holiday;
        $holiday_data = ShopInfo::holidayToInt($holiday_array);

        $shop->fill([
                'name'  => $request->name,
                'email' => $request->email,
            ])->save();

        $shop->shop_info->fill([
                            'post_code' => $request->post_code,
                            'address'   => $request->address,
                            'content'   => $request->content,
                            'url'       => $request->url,
                            'tel'       => $request->tel,
                            'holiday'   => $holiday_data,
                            'open'      => $request->open,
                            'close'     => $request->close,
                        ])->save();

        $holiday = implode($holiday_array);
        $parent_cat = DB::table('parent_cats')->select('id', 'name', 'icon')->get();
        return view('shop.show', compact('parent_cat', 'shop', 'holiday'));
    }
}
