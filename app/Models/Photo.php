<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['image', 'caption'];

    public function image(){
        return Attribute::make(
            get: fn ($image) => url('/storage/photos' . $image)
        );
    }
}
