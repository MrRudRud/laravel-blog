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
        $categories = Category::with([ 'post' => function($query) {
            // $query->where("published_at", "<=", Carbon::now());
            $query->published();
        }])->orderBy('title','ASC')->get();
        
        $posts = Post::with('author')
                            ->latestFirst()
                            ->published()
                            ->simplePaginate($this->limit);
         return view('blog.index', compact('posts','categories'));
        //  ->render();
        //  dd(\DB::getQueryLog());
    }

    public function category(Category $category) {

        $categoryName = $category->title;

        $categories = Category::with([ 'post' => function($query) {
            // $query->where("published_at", "<=", Carbon::now());
            $query->published();
        }])->orderBy('title','ASC')->get();

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

         return view('blog.index', compact('posts','categories', 'categoryName'));
    }

    public function show(Post $post) {

        $categories = Category::with([ 'post' => function($query) {
            $query->published();
        }])->orderBy('title','ASC')->get();
        
        return view('blog.show', compact('post','categories'));
        // die('show');
    }
}
