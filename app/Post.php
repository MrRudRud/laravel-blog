<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model
{

    protected $dates = ['published_at'];

    public function Category(){
        return $this->BelongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class);
    }

    // ==========================
    // Eloquet Mutator
    // ==========================
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
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

    public function getBodyHtmlAttribute($value)
    {
        return $this->body ? Markdown::convertToHTML($this->body) : NULL;
    }

    public function getExcerptHtmlAttribute($value)
    {
        return $this->excerpt ? Markdown::convertToHTML($this->excerpt) : NULL;
    }

    // ==========================
    // Eloquent Scope
    // ==========================    
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }

}
