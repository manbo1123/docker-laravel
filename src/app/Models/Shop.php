<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Shop extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'email_verified_at', 'password', ];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];
    protected $dates = ['created_at', 'updated_at', ];

    public function shop_info() {
        return $this->hasOne('App\Models\ShopInfo');
    }
}
