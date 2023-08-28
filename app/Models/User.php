<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public function role() {
        return $this->belongsTo('App\Models\Role');
      }


      public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
    }

    public function degree(){
        return $this->belongsToMany(Degree::class, 'degree_user');
    }


    public function image() {
        return $this->hasOne('App\Models\Image');
      }

      public function maestro() {
        return $this->hasOne('App\Models\Maestro');
      }
      public function padre() {
        return $this->hasOne('App\Models\Padre');
      }
      public function Alumno() {
        return $this->hasOne('App\Models\Alumno');
      }
}
