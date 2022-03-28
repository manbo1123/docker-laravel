<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id', ];
    protected $dates = ['created_at', 'updated_at', ];

    public function items() {
        return $this->hasMany('App\Models\Item');
    }

    public function parent_cat() {
        return $this->belongsTo('App\Models\ParentCat', 'parent_id');
    }
    
}
