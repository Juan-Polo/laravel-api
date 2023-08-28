<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;
    public function maestros() {
        return $this->belongsToMany('App\Models\Degree');
      }


    public function activity()
    {
        return $this->hasMany('App\Models\Activity');
    }


    public function alumno() {
        return $this->hasMany('App\Models\Alumno');
      }

      public function chat() {
        return $this->hasOne('App\Models\Chat');
      }
}
