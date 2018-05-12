<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{
    public function index() {
        // die("blog.index");
        $posts = Post::all();
        return view('blog.index', compact('posts'));
    }
}
