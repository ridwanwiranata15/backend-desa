<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['image'];

    public function image(){
        return Attribute::make(
            get: fn ($image) => url('/storage/sliders/' . $image)
        );
    }
}
