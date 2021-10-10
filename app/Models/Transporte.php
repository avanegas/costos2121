<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    use HasFactory;

    protected $fillable = [
        'zona_id', 'name', 'unidad', 'tipo', 'tarifa',
    ];

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }
}
