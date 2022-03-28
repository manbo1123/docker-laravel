<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
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
Route::get('/category/{parent}/{child}', [CategoryController::class, 'show']);
Route::get('/category/{parent}', [ParentCatController::class, 'show']);
Route::get('/category', [ParentCatController::class, 'index']);

Route::get('/{item}', [ItemController::class, 'show']);

Route::get('shop/{shop}/item', [ShopController::class, 'showItem']);
Route::get('shop/{shop}', [ShopController::class, 'show']);

Route::get('/', [ItemController::class, 'index']);