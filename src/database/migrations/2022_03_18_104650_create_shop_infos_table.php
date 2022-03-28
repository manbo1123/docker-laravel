<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->integer('post_code')->comment('郵便番号');
            $table->string('address')->comment('住所');
            $table->text('content')->nullable()->comment('紹介');
            $table->text('url')->nullable()->comment('ショップURL');
            $table->string('tel')->nullable()->comment('電話番号');
            $table->string('holiday')->nullable()->comment('定休日');
            $table->time('open')->nullable()->comment('営業開始時間');
            $table->time('close')->nullable()->comment('営業終了時間');
            $table->timestamps();

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
        Schema::dropIfExists('shop_infos');
    }
}
