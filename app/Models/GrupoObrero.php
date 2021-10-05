<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoObrero extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description',
    ];

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }

    public function obreros()
    {
        return $this->hasMany(Obrero::class);
    }    
}
