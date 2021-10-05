<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //public function general()
    //{
    //    return $this->belongsTo(General::class);
    //}

    public function grupo_equipos()
    {
        return $this->hasMany(GrupoEquipo::class);
    }

    public function grupo_materials()
    {
        return $this->hasMany(GrupoMaterial::class);
    }

    public function grupo_obreros()
    {
        return $this->hasMany(GrupoObrero::class);
    }

    public function transportes()
    {
        return $this->hasMany(Transporte::class);
    }

    public function grupo_precios()
    {
        return $this->hasMany(GrupoPrecio::class);
    }    
}
