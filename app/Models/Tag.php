<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    //Rel N:N (inversa) polimórfica
    public function posts()
    {
        return $this->morphedByMany('App\Models\Post', 'taggable');
    }
}
