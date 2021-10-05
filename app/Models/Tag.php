<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'color',
    ];

    public function getRouteKeyName()
    {
        return "slug";
    }

    //relacion polimorfica
    public function taggable()
    {
        return $this->morphTo();
    }

    //Relacion muchos a muchos
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }    
}
