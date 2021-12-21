<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model
{
    use HasFactory;

    //Rel N:N
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    //Rel N:N
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }
}
