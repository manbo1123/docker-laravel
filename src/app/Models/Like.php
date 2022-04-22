<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['item_id', 'user_id', ];
    protected $dates = ['created_at', 'updated_at'];

    public function item() {
        return $this->belongsTo('App\Models\Item');
    }
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

}
