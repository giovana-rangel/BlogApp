<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //relación N:1 (inversa)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //Relación N:1
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    //Relación 1:1 Polimórfica - Retorna las urls de imágenes de portada del post
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    //Relación 1:N Polimórfica - Retorna los comentarios de del post
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    //Relación N:N Polimórfica - Retorna los tags de del post
    public function posts()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}
