<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'contratante', 'ubicacion', 'oferente', 'entrega', 'referencial', 'indirecto', 'impuesto',
        'distancia', 'sub_total', 'gran_total', 'formato', 'precision', 'representante'
    ];

    protected $filter = [
        'id', 'name', 'contratante', 'ubicacion', 'oferente', 'entrega', 'referencial', 'indirecto', 'descuento',
        'distancia', 'sub_total', 'gran_total', 'formato', 'precision', 'representante', 'user_id', 'created_at',

        //filter relation also, eg: user
        'user.id', 'user.name', 'user.email', 'user.password', 'user.created_at'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function rubros(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasmany(AprojectRubro::class);
    }    
}
