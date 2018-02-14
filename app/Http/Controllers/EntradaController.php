<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entrada;

class EntradaController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');

  }

  public function guardar(Request $request)
  {
    //calcular iva
    $preci= $request->get('precio');
    $iva=($preci*0.16)+$preci;

      $entrada=new Entrada;
      $entrada->id_usuario=$request->get('id_usuario');
      $entrada->id_unidad=$request->get('unidad');
      $entrada->fecha_ingreso=$request->get('fecha');
      $entrada->descripcion=strtoupper($request->get('descripcion'));
      $entrada->marca=strtoupper($request->get('marca'));
      $entrada->precio=$request->get('precio');
      $entrada->precio_iva=$iva;
      $entrada->cantidad=$request->get('cantidad');
      $entrada->save();

      return redirect('articulos');
  }

  public function mostrar()
  {
    $entradas = Entrada::orderBy('created_at', 'desc')->paginate(10);
    return view('servicio.articulos',compact("entradas"));

  }

  public function mostrarArticulos(Request $request)
  {
    $consul=$request->get('query');
    $entradas = Entrada::orderBy('created_at', 'desc')
    ->where('descripcion','LIKE', "%$consul%")
    ->get();
    return $entradas;
  }
}
