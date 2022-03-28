<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('商品名');
            $table->text('content')->comment('商品情報');
            $table->string('postage')->comment('送料');
            $table->integer('price')->comment('価格');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('shop_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->comment('カテゴリーid');
            $table->foreign('shop_id')->references('id')->on('shops')->comment('ショップid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
