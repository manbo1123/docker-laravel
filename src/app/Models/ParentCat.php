<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentCat extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'icon', ];
    protected $dates = ['created_at', 'updated_at', ];
}
