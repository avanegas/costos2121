<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AprojectRubro extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'precio_id', 'orden', 'rubro', 'unidad', 'cantidad', 'precio', 'total'
    ];

    public $timestamps = false;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function precio()
    {
        return $this->belongsTo(Precio::class);
    }
}
