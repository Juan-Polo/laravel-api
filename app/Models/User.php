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
        return $this->hasMany('App\Models\Notification');
    }

    public function degrees(){
        return $this->belongsToMany(Degree::class, 'degree_user');
    }
}
