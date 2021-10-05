<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable= [
        'grupo_material_id', 'name', 'unidad', 'precio',
    ];

    public function grupo_material()
    {
        return $this->belongsTo(GrupoMaterial::class);
    }

    public function data_material()
    {
        return $this->hasOne(DataMaterial::class);
    }    
}
