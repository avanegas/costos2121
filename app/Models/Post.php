<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [
        'id','created_at','updated_at'
        //'name', 'slug', 'status', 'excerpt', 'body', 'category_id','user_id',
    ];

    //retorno de slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Relacion uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //relacion uno a uno polimorfica
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    //Relacion muchos a muchos polimorfica
    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }    
}
