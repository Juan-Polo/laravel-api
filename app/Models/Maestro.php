<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    use HasFactory;
    public function user() {
        return $this->belongsTo('App\Models\User');
      }

      public function degrees() {
        return $this->belongsToMany('App\Models\Degree');
      }

      public function asignatura() {
        return $this->hasMany('App\Models\Asignatura');
      }
}
