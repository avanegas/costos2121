<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AprecioMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_id', 'name', 'unidad', 'precio', 'cantidad', 'total'
    ];

    public $timestamps = false;

    public function precio()
    {
        return $this->belongsTo(Precio::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
