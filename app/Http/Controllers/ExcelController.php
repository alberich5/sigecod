<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Entrada;
use App\Salida;
use App\Log;
use DB;

class ExcelController extends Controller
{
  public function exportUsers()
  {
    \Excel::create('Users', function($excel) {

  $users = User::all();

  $excel->sheet('Users', function($sheet) use($users) {

  $sheet->fromArray($users);
  $sheet->row(1, [
    'Número', 'Nombre', 'Email','Rol', 'Fecha de Creación', 'Fecha de Actualización'
]);
foreach($users as $index => $user) {
    $sheet->row($index+2, [
        $user->id, $user->name, $user->email,$user->rol, $user->created_at, $user->updated_at
    ]);
}
});
})->export('xlsx');

  }

  public function exportEntradas(Request $request)
  {

    \Excel::create('Entrada', function($excel) {
$consul = request()->get('fecha');
  $users = Entrada::where('fecha_ingreso','=', $consul)
  ->get();

  $excel->sheet('Users', function($sheet) use($users) {

  $sheet->fromArray($users);
  $sheet->row(1, [
    'Fecha Ingreso', 'Descripcion', 'Marca','Precio', 'cantidad'
]);
foreach($users as $index => $user) {
    $sheet->row($index+2, [
        $user->fecha_ingreso, $user->descripcion, $user->marca,$user->precio, $user->cantidad
    ]);
}
});
})->export('xlsx');

  }

  public function exportCancelados(Request $request)
  {

    \Excel::create('Cancelados', function($excel) {
  $users = Entrada::where('status','=', 'cancelado')
  ->get();

  $excel->sheet('Users', function($sheet) use($users) {

  $sheet->fromArray($users);
  $sheet->row(1, [
    'id', 'Fecha Ingreso', 'Descripcion','Marca', 'precio', 'status'
  ]);
  foreach($users as $index => $user) {
    $sheet->row($index+2, [
      $user->id, $user->fecha_ingreso, $user->descripcion, $user->marca,$user->precio, $user->status,$user->motivo
    ]);
  }
  });
  })->export('xlsx');

  }






  public function exportSalidas(Request $request)
  {

    $consul = request()->get('fecha');
    \Excel::create('Salida'.$consul, function($excel) {
      $consul = request()->get('fecha');
      $final = DB::table('salida as sali')
      ->leftjoin('entrada as entra','sali.id_entrada','=','entra.id')
      ->leftjoin('cliente as cli','sali.id_cliente','=','cli.id')
      ->leftjoin('unidad as uni','entra.id_unidad','=','uni.id')
      ->select('sali.cantidad','entra.descripcion as articulo','uni.nombre as tipo','cli.nombre as cliente','sali.fecha_salida as Fecha_Salida')
      ->where('fecha_salida','=',$consul )
      ->get();

      $data = array();
      foreach ($final as $result) {
        $data[] = (array)$result;
      }

      $excel->sheet('Sheetname', function($sheet) use($data) {
          $sheet->setFontFamily('Calibri');
          $sheet->setFontSize(13);
          $sheet->setBorder('A1:E1', 'thin');
          $sheet->fromArray($data);

      });

    })->export('xlsx');

  }

  public function exportProducto()
  {
    \Excel::create('productosCero', function($excel) {
  $users = Entrada::where('cantidad','=', '0')
  ->get();

  $excel->sheet('Users', function($sheet) use($users) {

  $sheet->fromArray($users);
  $sheet->row(1, [
    'Fecha', 'Descripcion', 'Marca','Precio', 'cantidad'
]);
foreach($users as $index => $user) {
    $sheet->row($index+2, [
        $user->fecha_ingreso, $user->descripcion, $user->marca,$user->precio, $user->cantidad
    ]);
}
});
})->export('xlsx');

  }


  public function exportMensual(Request $request)
  {
    \Excel::create('Mensual', function($excel) {
      $mes = request()->get('mes');
      $inicio='';
      $fin='';
        switch ($mes) {
          case '1':
            $inicio='2018-01-01';
            $fin='2018-01-31';
            break;
          case '2':
            $inicio='2018-02-01';
            $fin='2018-02-28';
            break;
          case '3':
            $inicio='2018-03-01';
            $fin='2018-03-31';
            break;
          case '4':
            $inicio='2018-04-01';
            $fin='2018-04-30';
            break;
          case '5':
                # code...
            break;
          case '6':
                  # code...
            break;

        }
        //consulta de la entrada


      $users = DB::table('entrada as entra')
      ->leftjoin('unidad as uni','entra.id_unidad','=','uni.id')
      ->leftjoin('log as lo','entra.id','=','lo.id_entrada')
      ->select('entra.fecha_ingreso','entra.descripcion','entra.marca','uni.nombre','entra.precio','entra.precio_iva','lo.cantidad_inicial as existenciaini',DB::raw('(lo.cantidad_inicial - entra.cantidad) as salidas'),'entra.cantidad as existenciafina',DB::raw('(entra.precio*entra.cantidad) as costo_final'))
      ->get();

      $data = array();
      foreach ($users as $result) {
        $data[] = (array)$result;
      }

      $excel->sheet('Sheetname', function($sheet) use($data) {
          $sheet->setFontFamily('Calibri');
          $sheet->setFontSize(13);
          $sheet->setBorder('A1:J1', 'thin');
          $sheet->fromArray($data);

      });



})->export('xlsx');

  }


  public function pruebaexcel(){
    $users = DB::table('entrada as entra')
    ->leftjoin('unidad as uni','entra.id_unidad','=','uni.id')
    ->leftjoin('log as lo','entra.id','=','lo.id_entrada')
    ->select('entra.fecha_ingreso','entra.descripcion','entra.marca','uni.nombre','entra.precio','entra.precio_iva','lo.cantidad_inicial as existencia_inicial',DB::raw('(lo.cantidad_inicial - entra.cantidad) as salidas'),'entra.cantidad as existencia_final',DB::raw('(entra.precio*entra.cantidad) as costo_final'))
    ->get();

    $data = array();
    foreach ($users as $result) {
      $data[] = (array)$result;
    }



\Excel::create('Filename', function($excel) use($data) {

    $excel->sheet('Sheetname', function($sheet) use($data) {

         $sheet->loadView('servicio.excel');

    });

})->export('xls');
  }


}
