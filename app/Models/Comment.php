<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //Rel 1:N polimórfica - retorna los comentarios del video
    public function commentable()
    {
        return $this->morphTo();
    }

    //Relación N:1 Polimórfica - Retorna el usuario que hizo los comentarios
    public function user()
    {
        return $this->BelongsTo('App\Models\User');
    }
}
