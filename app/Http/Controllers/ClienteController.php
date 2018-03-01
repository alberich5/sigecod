<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');

  }

  public function guardar(Request $request)
  {

      $cliente=new Cliente;
      $cliente->id_usuario=$request->get('id_usuario');
      $cliente->nombre=strtoupper($request->get('cliente'));
      $cliente->fecha=$request->get('fecha');
      $cliente->save();

      return redirect('mosclientes');
  }

  public function mostrar()
  {
    $clientes = Cliente::orderBy('created_at', 'desc')->paginate(10);

    return view('servicio.clientes',compact("clientes"));

  }
  public function cargar()
  {
    $clientes = Cliente::orderBy('created_at', 'desc')->get(

    );

    return $clientes;

  }

  public function traerCliente()
  {
      $clientes = Cliente::select('id','nombre')->get();
      return $clientes;
  }
}
