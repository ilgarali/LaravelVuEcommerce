<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   
    public function index()
    {
        $posts = Post::latest()->paginate(8);
        return PostResource::collection($posts);
    }

    public function featured()
    {
        $posts = Post::where('featured',1)->latest()->take(3)->get();
        return PostResource::collection($posts);
    }
    public function allPost()
    {
        $posts = Post::latest()->get();
        return PostResource::collection($posts);
    }
    
}
