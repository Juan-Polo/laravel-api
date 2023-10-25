<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'gmail',
        'password',
        'role_id',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




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
