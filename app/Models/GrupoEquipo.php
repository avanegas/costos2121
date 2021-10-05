<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoEquipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description',
    ];

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }

    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }    
}
