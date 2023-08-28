<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    public function maestro() {
        return $this->belongsTo('App\Models\Maestro');
      }


      public function guias() {
        return $this->hasMany('App\Models\Guia');
      }

      public function activities() {
        return $this->hasMany('App\Models\Activity');
      }

}
