<?php

namespace App\Models;
use App\Models\Post;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function Artist()
    {
        return $this->hasOne(Artist::class);
    }
    
}
