<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  protected $table = 'cliente';
   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

  protected $primaryKey='id';
   protected $fillable = [
      'id_usuario',
      'nombre',
      'fecha'
   ];
}
