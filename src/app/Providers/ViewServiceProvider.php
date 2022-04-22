<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * 全アプリケーションサービスの登録
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * 全アプリケーションサービスの初期起動
     *
     * @return void
     */
    public function boot()
    {
        // クラスベースのコンポーザを使用する
        // View::composer('profile', ProfileComposer::class);

        // クロージャベースのコンポーザを使用
        //View::composer('dashboard', function ($view) {
            //
        //});

        // 親カテゴリー一覧
        View::composer(
            [
              'index', 'show', 'new', 'mypage.cart', 
              'category.show', 'category.list', 'category.show',
              'shop.show', 'shop.item_list', 'shop.mypage.edit'
            ],
            'App\Http\ViewComposers\CategoryListComposer'
        );

    }
}