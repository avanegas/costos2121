<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indirecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'arriendo', 'seguros', 'financiamiento', 'total_indirectos', 'utilidades', 'otros', 'project_id',
    ];    
}
