<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entrada;
use Khill\Lavacharts\Lavacharts;

class GraficaController extends Controller
{
  //funcion para mostrar el index
  public function index()
  {
    
        return view('servicio.graficas');
  }


  //funcion para mostrar el index
  public function cargararticulosCancelados()
  {
    $entradas = Entrada::where('status','=', 'cancelado')

    ->get();


    return $entradas;
  }

}
