<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function post() {
        return $this->hasMany(Post::class);
    }

    // Return key relation 
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
