<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entrada;
use App\Salida;

class SalidaController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');

  }

  public function guardar(Request $request)
  {

    $tamano = count($request->variable);
    for($i=0; $i<$tamano; $i++){
      $salida=new Salida;
      $salida->id_entrada=$request->variable[$i]['id'];
      $salida->id_cliente=$request->variable[$i]['cliente'];
      $salida->id_usuario=$request->variable[$i]['id_usuario'];
      $salida->cantidad=$request->variable[$i]['otro'];
      $salida->fecha_salida="2018-02-20";
      $salida->save();
    }
    return $tamano;

  }

}
