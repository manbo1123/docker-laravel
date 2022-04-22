<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'content', 'postage', 'price', 'category_id', 'shop_id',];
    protected $dates = ['created_at', 'updated_at'];

    public function shop() {
        return $this->belongsTo('App\Models\Shop');
    }
    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
    public function item_imgs() {
        return $this->hasMany('App\Models\ItemImg');
    }
    public function likes() {
        return $this->hasMany('App\Models\Like');
    }

}
