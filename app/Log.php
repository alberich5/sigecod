<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
  protected $table = 'log';


  protected $primaryKey='id';
   protected $fillable = [
      'id_entrada',
      'id_cliente',
      'id_usuario',
      'cantidad_inicial',
      'fecha_log',
   ];
}
