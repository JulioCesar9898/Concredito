<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
class Prospecto extends Model
{
 //Modelo de Prospectos 
    use SoftDeletes;
    use SoftCascadeTrait;
    use HasFactory;
    protected $table='prospecto';
    protected $primaryKey ='id';
    protected $guarded=[];
    protected $dates=['deleted_at'];
}
