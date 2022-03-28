<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function show($parent, $id) {
        $parent_cat = DB::table('parent_cats')->select('id', 'name', 'icon')->get();
        $items = Item::where('category_id', $id)
                        ->select('items.id', 'items.name', 'price', 'postage', 'category_id')
                        ->with('item_imgs:id,name,item_id')
                        ->get();

        $target_cat = count($items) === 0 
                        ? Category::where('id', $id)->select('id', 'name', 'parent_id')->first()
                        : $items[0]->category;
        return view('category.show', compact('parent_cat', 'items', 'target_cat'));
    }
}
