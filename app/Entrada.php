<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
  protected $table = 'entrada';


  protected $primaryKey='id';
   protected $fillable = [
      'id_usuario',
      'id_unidad',
      'fecha_ingreso',
      'descripcion',
      'marca',
      'precio',
      'cantidad'
   ];
}
