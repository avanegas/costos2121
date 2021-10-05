<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id', 'country',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }    
}
