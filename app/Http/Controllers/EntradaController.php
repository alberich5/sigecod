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
      $entrada->cantidadOriginal=$request->get('cantidad');
      $entrada->status='activo';
      $entrada->save();

      return redirect('articulos');
  }

  public function mostrar()
  {
    $entradas = Entrada::orderBy('created_at', 'desc')
    ->where('status','=', 'activo')
    ->paginate(10);
    return view('servicio.articulos',compact("entradas"));

  }
  public function cancelados()
  {
    $entradas = Entrada::orderBy('created_at', 'desc')
    ->where('status','=', 'cancelado')
    ->paginate(10);
    return view('servicio.cancelados',compact("entradas"));

  }



  public function mostrarArticulos(Request $request)
  {
    $consul=strtoupper($request->get('query'));
    $entradas = Entrada::orderBy('created_at', 'desc')
    ->where('descripcion','like', "%".$consul."%")
    ->where('status','=', 'activo')
    ->get();

    return $entradas;
  }

  public function eliminar($id)
  {

    $entrada = Entrada::orderBy('created_at', 'desc')
    ->where('id','=', $id)
    ->get();

    $cantoriginal="";
    $cantinicial="";
    foreach ($entrada as $entra) {
        $cantoriginal = $entra->cantidadOriginal;
        $cantinicial = $entra->cantidad;
    }

    if ($cantoriginal == $cantinicial ) {
      $entrada=Entrada::findOrFail($id);
      $entrada->status='cancelado';
      $entrada->update();
        return redirect('articulos');
    }else{
      dd("no se puede elimnar porque ya ubo salida");
    }


    return redirect('articulos');
  }

  public function destroy($id)
  {

      dd("entro al destruir de los articulos");
  }
}
