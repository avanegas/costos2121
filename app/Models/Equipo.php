<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'grupo_equipo_id', 'name', 'marca', 'tipo', 'tarifa',
    ];

    public function grupo_equipo()
    {
        return $this->belongsTo(GrupoEquipo::class);
    }

    public function data_equipo()
    {
        return $this->hasOne(DataEquipo::class);
    }    
}
