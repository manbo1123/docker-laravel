<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }

    public function show() {
        $user = 1;
        $cart = $this->cartService->fetchCartsByUser($user, 0);
        $coart_count = $cart->count();
        return view('mypage.cart', compact('cart', 'coart_count'));
    }

    public function add(Request $request, $item) {
        $user = 1;
        $itemExist = $this->cartService->fetchCartsByUserItem($user, $item, 0);

        if ($itemExist) {
            $itemExist->fill([
                'count' => $itemExist->count + $request->count,
            ])->save();
        } else {
            $cart = new Cart();
            $cart->fill(
                $this->cartService->cartAttributes($user, $item, $request->count)
            )->save();
        }
        return true;
    }

    public function destroy($id) {
        $this->cartService->fetchCartItemById($id)->delete();
        return $id;
    }
}
