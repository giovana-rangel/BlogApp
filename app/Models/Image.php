<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = []; //restringe campos que se puedan llenar por asignación masiva, a contrario de $fillable

    use HasFactory;

    //Rel 1:1 Polimórfica 
    public function imageable()
    {
        return $this->morphTo(); //Admite varios tipos de modelo donde se respete dicha rel
    }
}
