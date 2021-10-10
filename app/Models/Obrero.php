<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obrero extends Model
{
    use HasFactory;

    protected $fillable = [
        'grupo_obrero_id', 'name', 'jornalhora', 'factor',
    ];

    public function grupo_obrero()
    {
        return $this->belongsTo(GrupoObrero::class);
    }   
}
