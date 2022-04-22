<?php

namespace App\Services;

use App\Models\Item;

class ItemService {
    private $item;
    public function __construct(Item $item) {
        $this->item = $item;
    }

    // 商品をすべて取得
    public function fetchItems() {
        return $this->item->select('id', 'name', 'postage', 'price', 'category_id', 'shop_id')
                          ->with('item_imgs:id,name,item_id');   // ->where('relations.item_imgs', 0);
    }

    // shop_idから商品をすべて取得
    public function fetchItemByShopId($shopId) {
        return $this->item->where('shop_id', $shopId)
                          ->select('id', 'name', 'postage', 'price', 'category_id', 'shop_id')
                          ->with('item_imgs:id,name,item_id')
                          ->get();
    }

    // カテゴリーidから商品をすべて取得
    public function fetchItemByCategoryId($categoryId) {
        return $this->item->where('category_id', $categoryId)
                          ->select('items.id', 'items.name', 'price', 'postage', 'category_id')
                          ->with('item_imgs:id,name,item_id')
                          ->get();
    }

    // 指定の親カテゴリーに紐づく商品をすべて取得
    public function fetchItemByParentCategoryId($parentId) {
        return $this->item->join('categories', function($join) use($parentId) {
                              $join->on('items.category_id', '=', 'categories.id')
                                    ->where('categories.parent_id', $parentId);
                          })
                          ->select('items.id', 'items.name', 'price', 'postage', 'category_id')
                          ->with('item_imgs:id,name,item_id')
                          ->get();
    }

    // idから商品を1つ取得
    public function fetchItemById($itemId) {
        return $this->item->where('id', $itemId)
                          ->select('id', 'name', 'content', 'postage', 'price', 'category_id', 'shop_id')
                          ->with([
                              'category:id,name,parent_id', 
                              'category.parent_cat:id,name', 
                              'shop:id,name', 
                              'shop.shop_info', 
                              'item_imgs:id,name,item_id', 
                          ])->first();
    }

    // 商品情報の配列
    public function itemAttributes($data, $shopId) {
        return [
            'name'          => $data->name,
            'content'       => $data->content,
            'postage'       => $data->postage,
            'price'         => $data->price,
            'category_id'   => $data->category,
            'shop_id'       => $shopId,
        ];
    }

}
