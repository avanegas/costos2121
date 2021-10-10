<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AprecioObrero extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'obrero_id', 'name', 'jornalhora', 'cantidad', 'rendimiento', 'total'
    ];

    public $timestamps = false;

    public function precio()
    {
        return $this->belongsTo(Precio::class);
    }

    public function obrero()
    {
        return $this->belongsTo(Obrero::class);
    }
}
