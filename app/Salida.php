<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
  protected $table = 'salida';


  protected $primaryKey='id';
   protected $fillable = [
      'id_entrada',
      'id_cliente',
      'id_usuario',
      'cantidad',
      'fecha_salida',
   ];
}
