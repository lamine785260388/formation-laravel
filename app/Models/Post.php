<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\image;
use App\Models\tags;
use App\Models\Artist;

class Post extends Model
{
    use HasFactory;
    protected $fillable= ['title','content'] ;
    /*public function comments(){
        return $this->hasmany(Comment::class);
    }*/
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');//polymorphique
    }
    public function image()
    {
        return $this->hasOne(image::class);
    }
    public function tags()
    {
        return $this->belongsToMany(tags::class);
    }
    public function imageArtist ()
    {
        return $this->hasOneThrough(Artist::class, image::class);
    }
    public function latestcomment()
{
    return $this->hasOne(comment::class)->latestOfMany();
}
public function oldestcomment()
{
    return $this->hasOne(comment::class)->oldestOfMany();
}
}
