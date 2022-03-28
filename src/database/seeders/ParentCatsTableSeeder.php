<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParentCatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parent_cats') -> insert([
            ['name' => 'ファッション', 'icon' => 'fashion.png'],
            ['name' => '食品', 'icon' => 'food.png'],
            ['name' => 'アウトドア、釣り、旅行用品', 'icon' => 'trip.png'],
            ['name' => 'ダイエット、健康', 'icon' => 'health.jpeg'],
            ['name' => 'コスメ、美容、ヘアケア', 'icon' => 'beauty.png'],
            ['name' => 'スマホ、タブレット、PC', 'icon' => 'pc.jpeg'],
            ['name' => 'TV、オーディオ、カメラ', 'icon' => 'tv.png'],
            ['name' => '家電', 'icon' => 'electric_appliances.png'],
            ['name' => '家具、インテリア', 'icon' => 'interior.jpeg'],
            ['name' => '花、ガーデニング', 'icon' => 'flower.png'],
            ['name' => 'キッチン、日用品、文具', 'icon' => 'kitchen.png'],
            ['name' => 'DIY、工具', 'icon' => 'diy.png'],
            ['name' => 'ペット用品、生き物', 'icon' => 'pets.png'],
            ['name' => '楽器、手芸、コレクション', 'icon' => 'instrument.png'],
            ['name' => 'ゲーム、おもちゃ', 'icon' => 'game.png'],
            ['name' => 'ベビー、キッズ、マタニティ', 'icon' => 'baby.png'],
            ['name' => 'スポーツ', 'icon' => 'sports.png'],
            ['name' => '車、バイク、自転車', 'icon' => 'car.png'],
            ['name' => 'CD、音楽ソフト、チケット', 'icon' => 'cd.png'],
            ['name' => 'DVD、映像ソフト', 'icon' => 'movie.png'],
            ['name' => '本、雑誌、コミック', 'icon' => 'book.png'],
            ['name' => 'レンタル、各種サービス', 'icon' => 'rent.jpeg'],
        ]);
    }
}
