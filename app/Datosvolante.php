<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datosvolante extends Model
{
    protected $table = 'datos_volante';


  protected $primaryKey='id_datos';
   protected $fillable = [
      'datos_atencion_area_turnada',
      'fecha_entrega',
      'fecha_limite',
      'termino',
      'copias',
      'instrucciones',
      'turna',
      'recibe',
      'volante_id',
      'personas_copias',
   ];
}

