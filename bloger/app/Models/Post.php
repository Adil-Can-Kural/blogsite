<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'status', 'cover_image'];
    
    protected static function boot()
{
    parent::boot();

    static::creating(function ($post) {
        $post->slug = Str::slug($post->title . '-' . time());
    });
}
public function images()
{
    return $this->hasMany(PostImage::class);
}
public function comments()
{
    return $this->hasMany(Comment::class);
}

}
