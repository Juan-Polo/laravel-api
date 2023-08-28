<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;


    public function degree() {
        return $this->belongsTo('App\Models\Degree');
      }


      public function mensajes() {
        return $this->hasMany('App\Models\Mensaje');
      }
}
