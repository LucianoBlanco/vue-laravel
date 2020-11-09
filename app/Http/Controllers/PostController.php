<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        return Post::orderBy('id', 'DESC')->pagiante();
    }
    public function show($slug)
    {
        return Post::where('slug', $slug)->first();
    }
}
