<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function author(){
        return $this->belongsTo(User::class);
    }

    // eloquet mutator
    public function getImageUrlAttribute($value) 
    {
        $imageUrl = "";

        if(! is_null($this->image))
        {
            $imagePath = public_path() . "/assets/img/" . $this->image;
            if(file_exists($imagePath)) $imageUrl = asset("assets/img/" . $this->image);
        }

        return $imageUrl;
    }

    public function getDateAttribute($value) 
    {
        return $this->created_at->diffForHumans();
    }

    public function scopeLatestFirst($query)
    {
        return $this->orderBy('created_at', 'desc');
    }
}
