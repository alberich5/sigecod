<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Entrada;
use App\Salida;
use App\Cliente;
use App\User;
use DB;

class SalidaController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');

  }

  public function guardar(Request $request)
  {

    $phpWord = new \PhpOffice\PhpWord\PhpWord();
    $section = $phpWord->addSection();


    $templateWord = new \PhpOffice\PhpWord\TemplateProcessor('plantillasDoc/formato1.docx');

    $dia=date('d');
    $mes=date('m');
    $ano=date('Y');
    $fecha=$ano.'-'.$mes.'-'.$dia;

    $templateWord->setValue('dia',$dia);
    $templateWord->setValue('mes',$mes);
    $templateWord->setValue('ano',$ano);
    $templateWord->setValue('area',$var);

    //Guardar Informacion
    $tamano = count($request->variable);
    for($i=0; $i<$tamano; $i++){

      $templateWord->setValue('articulo0','pruba');
      $templateWord->setValue('unidad0','pieza');
      $templateWord->setValue('cant0',$request->variable[$i]['otro']);

      $salida=new Salida;
      $salida->id_entrada=$request->variable[$i]['id'];
      $salida->id_cliente=$request->variable[$i]['cliente'];
      $salida->id_usuario=$request->variable[$i]['id_usuario'];
      $salida->cantidad=$request->variable[$i]['otro'];
      $salida->fecha_salida=$fecha;
      $salida->save();

      $unidad = Entrada::select('id','cantidad')
      ->where('id','=', $request->variable[$i]['id'])
      ->get();
      $var="";
      foreach ($unidad as $uni) {
          $var = $uni->cantidad;
      }

      $entrada=Entrada::findOrFail($request->variable[$i]['id']);
      $entrada->cantidad=$var-$request->variable[$i]['otro'];
      $entrada->update();

    }

    $templateWord->saveAs('salida.docx');
    //$this->historial('Descarga de oficio de alta del elemento '.$id);
    $nombreDocumento=str_replace("  "," ","omar");
    return Response::download('salida.docx',$nombreDocumento.'.docx');
    //return $tamano;

  }

    public function pruebas(){
      $dia=date('d');
      $mes=date('m');
      $ano=date('Y');
      $fecha=$ano.'-'.$mes.'-'.$dia;
      dd($fecha);
        $unidad = Entrada::select('id','cantidad')
        ->where('id','=', "15")
        ->get();
        $var="";
        foreach ($unidad as $uni) {
            $var = $uni->cantidad;
        }
        $final=$var-1;

        dd($final);

    }


    public function crearWord(Request $request){

      $client = Cliente::select('id','nombre')
      ->where('id','=', $request->get('cliente'))
      ->get();
      $var="";
      foreach ($client as $cli) {
          $var = $cli->nombre;
      }
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection();


$templateWord = new \PhpOffice\PhpWord\TemplateProcessor('plantillasDoc/formato1.docx');

    $dia=date('d');
    $mes=date('m');
    $ano=date('Y');
    $fecha=$ano.'-'.$mes.'-'.$dia;

    $templateWord->setValue('dia',$dia);
    $templateWord->setValue('mes',$mes);
    $templateWord->setValue('ano',$ano);
    $templateWord->setValue('area',$var);
         $templateWord->setValue('articulo0',$request->get('articulo'));
         $templateWord->setValue('unidad0','pieza');
         $templateWord->setValue('cant0',$request->get('cantidad'));

    $templateWord->saveAs('salida.docx');
    //$this->historial('Descarga de oficio de alta del elemento '.$id);
    $nombreDocumento=str_replace("  "," ","omar");
    return Response::download('salida.docx',$nombreDocumento.'.docx');
    }


    public function mostrar(Request $request){
      $dia=date('d');
      $mes=date('m');
      $ano=date('Y');
      $fecha=$ano.'-'.$mes.'-'.$dia;

      dd($fecha);

    }



    public function mostrarsalidas(Request $request){
      $salidas = Salida::orderBy('created_at', 'fecha_salida')
      ->paginate(10);

      $salidas = Salida::leftjoin('cliente', 'salida.id_cliente', '=', 'cliente.id')
              ->leftjoin('users', 'salida.id_usuario', '=', 'users.id')
              ->select('salida.id_entrada','cliente.nombre','users.name','salida.cantidad','salida.fecha_salida')
                ->orderBy('salida.fecha_salida','desc')
               ->paginate(10);


      return view('servicio.salidashechas',compact("salidas"));

    }

    public function especifico(){
      $cliente = Cliente::orderBy('created_at', 'fecha_salida')
      ->get();

      return view('servicio.especifico',compact("cliente"));

    }

    public function historial(Request $request){
        $clientes = Cliente::select('nombre')
        ->where('id','=',$request->get('cliente'))
        ->get();

        $totalprecio = DB::table('salida as sali')
         ->leftjoin('cliente as cli','sali.id_cliente','=','cli.id')
         ->leftjoin('entrada as entra','sali.id_entrada','=','entra.id')
               ->select(DB::raw('SUM(entra.precio*sali.cantidad) AS total'))
               ->where('sali.id_cliente','=',$request->get('cliente'))
               ->whereBetween('sali.fecha_salida', array($request->get('fechaini'), $request->get('fechafinal')))
               ->get();


        $totaliva = DB::table('salida as sali')
        ->leftjoin('cliente as cli','sali.id_cliente','=','cli.id')
        ->leftjoin('entrada as entra','sali.id_entrada','=','entra.id')
               ->select(DB::raw('SUM(entra.precio_iva*sali.cantidad) AS totaliva'))
              ->where('sali.id_cliente','=',$request->get('cliente'))
              ->whereBetween('sali.fecha_salida', array($request->get('fechaini'), $request->get('fechafinal')))
              ->get();



      $salidas = Salida::leftjoin('cliente', 'salida.id_cliente', '=', 'cliente.id')
              ->leftjoin('entrada', 'salida.id_entrada', '=', 'entrada.id')
              ->select('salida.cantidad','salida.fecha_salida','cliente.nombre','entrada.descripcion','entrada.precio','entrada.precio_iva')
                ->where('salida.id_cliente','=', $request->get('cliente'))
              //  ->where('salida.fecha_salida','=', $request->get('fechaini'))
                 ->whereBetween('salida.fecha_salida', [$request->get('fechaini'), $request->get('fechafinal')])
               ->get();




      return view('servicio.especificomostrar',["salidas"=>$salidas,"cliente"=>$clientes,"precio"=>$totalprecio,"iva"=>$totaliva,"final"=>$request->get('fechafinal'),"inicial"=>$request->get('fechaini')]);
    //  return view('servicio.especificomostrar',compact("salidas"));
    }

}
