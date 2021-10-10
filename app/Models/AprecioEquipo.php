<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AprecioEquipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipo_id', 'name', 'tarifa', 'cantidad', 'rendimiento', 'total'
    ];

    public $timestamps = false;

    public function precio()
    {
        return $this->belongsTo(Precio::class);
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }    
}
