<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Users extends Model
{
    use SoftDeletes;
    use SoftCascadeTrait;

    protected $table='users';
    protected $primaryKey ='id';
    protected $guarded=[];
    protected $dates=['deleted_at'];    
    protected $softCascade = ['partido','notes','equipos'];

    public function partido(){ 
      return $this->morphToMany('App\Models\Partido','resumen','resumens','partido_id','id','id','id');
    }
    /**
     * Get the notes for the users.
     */
    public function notes()
    {
      return $this->hasMany('App\Notes');
    }


    public function equipos(){
      return $this->belongsToMany('App\Models\Equipo','equipos_users','equipo_id','user_id');
    }
}