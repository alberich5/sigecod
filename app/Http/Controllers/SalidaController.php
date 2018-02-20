<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entrada;

class SalidaController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');

  }

  public function guardar(Request $request)
  {
  return "llego muy bien";

  }

}
