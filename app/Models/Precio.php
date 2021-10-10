<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    use HasFactory;

    protected $fillable = [
        'grupo_precio_id', 'name', 'unidad', 'detalle', 'directo', 'indirecto'
    ];

    protected $filter = [
        'id', 'grupo_precio_id', 'name', 'unidad', 'detalle', 'directo', 'indirecto',
        //filter relation also, eg: user
        'user.id', 'user.name', 'user.email', 'user.password'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function grupo_precio()
    {
        return $this->belongsTo(GrupoPrecio::class);
    }

    public function equipos()
    {
        return $this->hasMany(AprecioEquipo::class);
    }

    public function materials()
    {
        return $this->hasMany(AprecioMaterial::class);
    }

    public function obreros()
    {
        return $this->hasMany(AprecioObrero::class);
    }

    public function transportes()
    {
        return $this->hasMany(AprecioTransporte::class);
    }    
}
