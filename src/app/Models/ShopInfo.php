<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopInfo extends Model
{
    use HasFactory;

    protected $fillable = ['shop_id', 'post_code', 'address', 'content', 'url', 'tel', 'holiday', 'open', 'close'];
    protected $dates = ['created_at', 'updated_at'];

    // 数値 → 曜日の配列
    public static function holiday($data) {
        $holiday = [];
        $day = ['月', '火', '水', '木', '金', '土', '日', ];
        foreach (str_split($data) as $key => $value) {
            $value == "1" ? $holiday[] = $day[$key] : null;
        }
        return $holiday;
    }
    // 曜日の配列 → 数値
    public static function holidayToInt($data) {
        $holiday = [];
        $day = ['月', '火', '水', '木', '金', '土', '日', ];
        foreach ($day as $key => $value) {
            $holiday[] = in_array($value, $data) ? '1' : '0';
        }
        return implode($holiday);
    }

}
