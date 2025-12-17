<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'category_id', 'user_id', 'content', 'image'];

    public function categories(){
        return $this->belongsTo(Category::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function image(){
        return Attribute::make(
            get: fn($image) => url('/storage/posts/' . $image)
        );
    }
}
