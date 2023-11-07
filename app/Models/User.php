<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['nombre','apellidos','gmail','password','role_id',];
    protected $allowIncluded=['role','alumno','alumno.degree','image'];


    public function scopeIncluded(Builder $query){
       
      // if(empty($this->allowIncluded)||empty(request('included'))){
      //     return;
      // }
      
      $relations = explode(',', request('included'));//['posts','relation2']
     
      $allowIncluded=collect($this->allowIncluded);//colocamos en una colecion lo que tiene $allowIncluded en este caso = ['posts','posts.user']
  
      foreach($relations as $key => $relationship){//recorremos el array de relaciones
          
          if(!$allowIncluded->contains($relationship)){
              unset($relations[$key]);
          }
      
      }
    $query->with($relations);//se ejecuta el query con lo que tiene $relations en ultimas es el valor en la url de included
   
  }

















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
      public function alumno() {
        return $this->hasOne('App\Models\Alumno');
      }
}
