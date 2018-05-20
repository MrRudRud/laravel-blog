<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use Carbon\Carbon;

class BlogController extends Controller
{
    protected $limit = 5;

    public function index() {
        // die("blog.index");
        // \DB::enableQueryLog();
        
        $posts = Post::with('author')
                            ->latestFirst()
                            ->published()
                            ->simplePaginate($this->limit);
         return view('blog.index', compact('posts'));
        //  ->render();
        //  dd(\DB::getQueryLog());
    }

    public function category(Category $category) {

        $categoryName = $category->title;
        // $posts = Post::with('author')
        //                     ->latestFirst()
        //                     ->published()
        //                     ->where('category_id', $id)
        //                     ->simplePaginate($this->limit);

        $posts = $category->post()
                        ->with('author')
                        ->latestFirst()
                        ->published()
                        ->simplePaginate($this->limit);

         return view('blog.index', compact('posts', 'categoryName'));
    }

    public function show(Post $post) {
        return view('blog.show', compact('post'));
        // die('show');
    }
}
