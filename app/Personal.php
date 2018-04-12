<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';
   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    public $timestamps = false;
  protected $primaryKey='id';
   protected $fillable = [
      'nombre',
      'apellido_paterno',
      'apellido_materno',
      'tipo',
      'activo'
   ];
}
