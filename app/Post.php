<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = ['id_usuario',
    'nombre_usuario',
     'contenido',
     'fecha',
     'tipo',
     'entrada',
     'mes',
     'empresa',
     'representante',
     'domicilio',
     'ambito',
     'delegacion',
     'codigo',
     'codigoqueja',
     'status'
   ];
}
