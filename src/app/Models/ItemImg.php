<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemImg extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'item_id', ];
    protected $dates = ['created_at', 'updated_at'];    

    public function item() {
        return $this->belongsTo('App\Models\Item');
    }
    
}
