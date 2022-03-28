<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_imgs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('商品画像');
            $table->unsignedBigInteger('item_id');
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('items')->comment('商品id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_imgs');
    }
}
