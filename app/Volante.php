<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volante extends Model
{
    protected $table = 'volante';


  protected $primaryKey='folio';
   protected $fillable = [
      'tipo',
      'referencia',
      'fecha_recepcion',
      'procedimiento',
      'asunto',
      'anio',
      'num',
   ];
}


