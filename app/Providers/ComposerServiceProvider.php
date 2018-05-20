<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //move all Categories here to make them as the central place, readable in every layouts.
        view()->composer('layouts.sidebar', function($view){
            $categories = Category::with(['post' => function($query) {
                $query->published();
            }])->orderBy('title','ASC')->get();
            
            return $view->with('categories', $categories);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
