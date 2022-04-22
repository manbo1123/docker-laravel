<?php

namespace App\Services;

use App\Models\Cart;

class CartService {
    private $cart;
    public function __construct(Cart $cart) {
        $this->cart = $cart;
    }

    // 指定ユーザーのカート情報をすべて取得
    public function fetchCartsByUser($userId, $isBought) {
        return $this->cart->where('user_id', $userId)
                          ->where('is_bought', $isBought)
                          ->with([
                              'item:id,name,postage,price,category_id,shop_id',
                              'item.item_imgs:id,name,item_id', 
                              'item.category:id,name,parent_id',
                              'item.category.parent_cat:id,name',
                        ])->get();
    }

    // 指定ユーザーの指定アイテムの情報を1つ取得
    public function fetchCartsByUserItem($userId, $itemId, $isBought) {
        return $this->cart->where('user_id', $userId)
                          ->where('item_id', $itemId)
                          ->where('is_bought', $isBought)
                          ->first();
    }

    // 指定idのカート情報を1つ取得
    public function fetchCartItemById($cartId) {
        return $this->cart->where('id', $cartId)->first();
    }

    // カート情報の配列
    public function cartAttributes($userId, $itemId, $count) {
        return [
            'item_id'   => $itemId,
            'user_id'   => $userId,
            'count'     => $count
        ];
    }
}
