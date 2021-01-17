<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

use Tymon\JWTAuth\Contracts\JWTSubject;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'machine_count', 'price', 'landing_page_url', 'add_time', 'paypal_product_id'
    ];
    public $timestamps = false;

}

