<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParentCatController extends Controller
{
    public function index() {
        $categories = Category::select('id', 'name', 'parent_id', )
                                ->with('parent_cat:id,name,icon')
                                ->get()->groupBy('parent_id');
        $parent_cat = DB::table('parent_cats')->select('id', 'name', 'icon', )->get();
        return view('category.list', compact('parent_cat', 'categories'));
    }

    public function show($id) {
        $parent_cat = DB::table('parent_cats')->select('id', 'name', 'icon')->get();
        $items = Item::join('categories', function($join) use($id) {
                            $join->on('items.category_id', '=', 'categories.id')->where('categories.parent_id', $id);
                        })
                        ->select('items.id', 'items.name', 'price', 'postage', 'category_id')
                        ->with('item_imgs:id,name,item_id')
                        ->get();

        $target_cat = count($items) === 0 
                        ? Category::where('id', $id)
                                    ->select('id', 'name', 'parent_id')
                                    ->with('parent_cat:id,name,icon')
                                    ->first()->parent_cat
                        : $items[0]->category->parent_cat;

        return view('category.show', compact('parent_cat', 'items', 'target_cat'));
    }
}
