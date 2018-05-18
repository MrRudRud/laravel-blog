<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;

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

    public function getBodyHtmlAttribute($value)
    {
        return $this->body ? Markdown::convertToHTML($this->body) : NULL;
    }

    public function getExcerptHtmlAttribute($value)
    {
        return $this->excerpt ? Markdown::convertToHTML($this->excerpt) : NULL;
    }

    public function scopeLatestFirst($query)
    {
        return $this->orderBy('created_at', 'desc');
    }

    public function scopePublished($query)
    {
        return $this->where('published_at', '<=', Carbon::now());
    }
}
