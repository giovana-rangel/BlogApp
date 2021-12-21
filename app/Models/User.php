<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relación 1:1 - retorna la información del perfil asociado al usuario
    public function profile()
    {
        //$profile = Profile::where('user_id' == $this->id)->first();
        return $this->hasOne(Profile::class);
    }

    //Relación 1:N - Retorna información de los post hechos por el usuario
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    //Relación 1:N - Retorna información de los videos hechos por el usuario
    public function videos()
    {
        return $this->hasMany('App\Models\Video');
    }

    //Relación N:N - Retorna información de los roles del usuario
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    //Relación 1:1 Polimórfica - Retorna las urls de imágenes de perfil almacenadas por el usuario
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    //Relación 1:N Polimórfica - Retorna los comentarios hechos por un usuario
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
