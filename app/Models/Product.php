<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'image',
        'owner',
        'price',
        'phone',
        'address',
    ];

    public function image(){
        return Attribute::make(
            get: fn ($image) => url('/storage/products/' . $image)
        );
    }
}
