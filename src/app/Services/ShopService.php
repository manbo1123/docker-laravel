<?php

namespace App\Services;

use App\Models\Shop;

class ShopService {
    private $shop;
    public function __construct(Shop $shop) {
        $this->shop = $shop;
    }

    // idからショップ情報1つ取得
    public function fetchShop($shopId) {
        return $this->shop->where('id', $shopId)
                          ->select('id', 'name', 'email')
                          ->with('shop_info')
                          ->first();
    }


    // 定休日のフォーマット変更（数値 → 文字列の配列）
    public function holidayToString($data) {
        $holiday = [];
        $day = $this->holidayArray();
        foreach (str_split($data) as $key => $value) {
          if ($value == "1") $holiday[] = $day[$key];
        }
        return $holiday;
    }

    // 定休日のフォーマット変更（文字列 → 数値の配列）
    public function holidayToInt($data) {
        $holiday = [];
        $day = $this->holidayArray();
        foreach ($day as $value) {
            $holiday[] = in_array($value, $data) ? '1' : '0';
        }
        return implode($holiday);
    }
  
    // 定休日の配列
    private function holidayArray() {
        return ['月', '火', '水', '木', '金', '土', '日', ];
    }

    // ショップの配列
    public function shopAttributes($data) {
        return [
            'name'  => $data->name,
            // 'email' => $data->email,
        ];
    }

    // shop_infoの配列
    public function shopInfoAttributes($data, $holiday) {
        return [
            'post_code' => $data->post_code,
            'address'   => $data->address,
            'content'   => $data->content,
            'url'       => $data->url,
            'tel'       => $data->tel,
            'holiday'   => $holiday,
            'open'      => $data->open,
            'close'     => $data->close,
        ];
    }
}
