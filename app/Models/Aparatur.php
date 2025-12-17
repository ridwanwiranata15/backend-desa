<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Aparatur extends Model
{
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'role',
        'image',
    ];

    protected function image(){
        return Attribute::make(
            get:  fn ($image) => url('/storage/aparaturs/' . $image)
        );
    }
}
