<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Seller extends Authenticatable
{
    // The authentication guard for seller
    protected $guard = 'seller';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'business_name',
        'address',
        'phone',
        'year_of_work',
        'category_id',
        'subcategory_id',
        'email',
        'image',
        'password',
        'isVerfied',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
