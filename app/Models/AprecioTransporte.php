<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AprecioTransporte extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'transporte_id', 'name', 'unidad', 'tarifa', 'cantidad', 'distancia', 'total'
    ];

    public $timestamps = false;

    public function precio()
    {
        return $this->belongsTo(Precio::class);
    }

    public function transporte()
    {
        return $this->belongsTo(Transporte::class);
    }
}
