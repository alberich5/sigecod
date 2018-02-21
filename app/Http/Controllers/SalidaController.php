<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
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
    return $tamano;

  }

    public function pruebas(){
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

    public function crearWord(){
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection();


$templateWord = new \PhpOffice\PhpWord\TemplateProcessor('plantillasDoc/formato1.docx');

$dia=date('d');
$mes=date('m');
$ano=date('y');


$templateWord->setValue('dia',$dia);
$templateWord->setValue('mes',$mes);
$templateWord->setValue('ano',$ano);
$templateWord->saveAs('salida.docx');
//$this->historial('Descarga de oficio de alta del elemento '.$id);
$nombreDocumento=str_replace("  "," ","omar");
return Response::download('salida.docx',$nombreDocumento.'.docx');
    }

}
