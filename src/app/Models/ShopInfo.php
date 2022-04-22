<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopInfo extends Model
{
    use HasFactory;

    protected $fillable = ['shop_id', 'post_code', 'address', 'content', 'url', 'tel', 'holiday', 'open', 'close'];
    protected $dates = ['created_at', 'updated_at'];

}
