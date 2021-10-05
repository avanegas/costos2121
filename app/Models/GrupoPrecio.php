<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoPrecio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description',
    ];

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }

    public function precios()
    {
        return $this->hasMany(Precio::class);
    }    
}
