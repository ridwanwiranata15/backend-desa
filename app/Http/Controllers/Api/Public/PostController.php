<?php

namespace App\Http\Controllers\Api\Public;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('users', 'categories')->latest()->paginate(10);
        return new PostResource(true, "List Data Posts", $posts);
    }
    public function show($slug){
        $post = Post::with('users', 'categories')->where('slug', $slug)->first();
        if($post){
            return new PostResource(true, 'Detail Data Post', $post);
        }
        return new PostResource(false, 'Detail Data Post tidak di temukan', null);
    }
    public function homepage(){
         $posts = Post::with('user', 'category')->latest()->take(6)->get();

        //return with Api Resource
        return new PostResource(true, 'List Data Post HomePage', $posts);
    }
}
