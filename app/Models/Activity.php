<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    public function asignatura()
    {
        return $this->belongsTo('App\Models\Asignatura');
    }


    public function evidencias()
    {
        return $this->hasMany('App\Models\Evidencia');
    }
}
