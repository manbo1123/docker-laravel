<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ParentCatController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/category/getChildren/{parent}', [CategoryController::class, 'getFieldchildren']);
Route::get('/category/{parent}/{child}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/{parent}', [ParentCatController::class, 'show'])->name('category.parent.show');
Route::get('/category', [ParentCatController::class, 'index'])->name('category.parent.index');

Route::resource('/shop', ShopController::class)->except(['index', 'destroy', ])->names(['create' => 'shop.new']);
Route::get('/shop/{shop}/item', [ShopController::class, 'showItem'])->name('shop.item');

Route::resource('/', ItemController::class)->only(['index', 'create', 'store'])->names(['create' => 'new']);
Route::get('/{item}', [ItemController::class, 'show'])->name('show');

Route::post('/{item}/like', [LikeController::class, 'store'])->name('like');
Route::post('/{item}/add', [CartController::class, 'add'])->name('cart.add');

Route::get('/', [ItemController::class, 'index']);

// Route::resource('/mypage/cart', CartController::class)->only(['show', 'destroy', ]);
Route::delete('/mypage/cart/{item}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/mypage/cart', [CartController::class, 'show'])->name('cart.show');
