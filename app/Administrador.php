<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
  protected $table = 'administrador';
 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */

protected $primaryKey='id';
 protected $fillable = [
    'usuario',
    'passsword',
    'anio_actual'
 ];
}
