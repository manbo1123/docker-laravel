<?php

namespace App\Http\Controllers;

use App\Models\Item;
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
}
