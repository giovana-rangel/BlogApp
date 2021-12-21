<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    //Rel N:1
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //Relación 1:N Polimórfica - Retorna los comentarios de del post
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    //Rel N:N (inversa) polimórfica - retorna tags
    public function videos()
    {
        return $this->morphedByMany('App\Models\Video', 'taggable');
    }
}
