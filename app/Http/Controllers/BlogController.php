<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{
    protected $limit = 3;
    public function index() {
        // die("blog.index");
        $posts = Post::with('author')->latestFirst()->simplePaginate($this->limit);
        return view('blog.index', compact('posts'));

        // $posts = Post::with('author')
        //                 ->latest()
        //                 ->simplePaginate($this->limit);
        // return view('blog.index', compact('posts'));
    }
}
