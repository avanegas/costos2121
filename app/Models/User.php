<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function scopeTermino($query, $termino)
    {
        if($termino === '') {
            return;
        }

        return $query->where('name', 'LIKE', "%{$termino}%")
            ->orWhere('email', 'LIKE',  "%{$termino}%")
            ->orWhereHas('groups', function($query2) use ($termino){
                $query2->where('name', 'like', "%{$termino}%");
            });
    }

    public function adminlte_image(){
        return $this->profile_photo_url;
    }

    public function adminlte_desc(){
        return "Administrador";
    }

    public function adminlte_profile_url(){
        return "user/profile";
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class);
    }

    public function location(): HasOneThrough
    {
        return $this->hasOneThrough(Location::class, Profile::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }   

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function ofertas(): HasMany
    {
        return $this->hasMany(Oferta::class);
    }
}
