<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\Volante;
use App\Datosvolante;
use App\Personal;
use Response;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    //funcion para mostrar el index
    public function index()
    {
        //$posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts');
    }

    //funcion para mostrar el index
    public function traerpersonal()
    {

        $personal = DB::table('personal')
               ->get();
        return $personal;

    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'id_usuario'=>'required',
           'nombre_usuario' => 'required',
            'contenido' => 'required',
            'fecha' => 'required',
            'empresa' => 'required',
            'mes' => 'required',
            'representante' => 'required',
            'delegacion' => 'required',
            'delegacion' => 'required',
        ]);
        //dd($request->all());
        Post::create($request->all());

        return redirect('quejas');
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('posts');
    }

    public function show($id)
    {
        $post=Post::findOrFail($id);

        return view('posts/editposts',compact('post'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'id_usuario'=>'required',
            'nombre_usuario' => 'required',
            'contenido' => 'required',
        ]);
        $post = Post::findOrFail($id);
        $input = $request->all();
        $post->fill($input)->save();

        return redirect("quejas");
    }

    public function prueba(Request $request)
    {
      $volantes = Volante::where('anio','=','2018')
      ->orderBy('num', 'desc')
      ->take(1)
      ->get();
      $numero=0;
      $id=0;
      foreach ($volantes as $entra) {
          $numero = $entra->num;
          $id = $entra->folio;
      }
      $numero=$numero+1;
      dd($id);
    }

    public function guardar(Request $request)
  {
    //funcion para obtener el ultimo numero para el folio
    $volantes = Volante::where('anio','=','2018')
    ->orderBy('num', 'desc')
    ->take(1)
    ->get();
    $numero=0;
    $id=0;
    foreach ($volantes as $entra) {
        $numero = $entra->num;
        $id = $entra->folio;
    }
    $numero=$numero+1;
    $id=$id+1;
    //valores de word

    $referencia='';
    $fecha_recepcion='';
    $area_turnada='';
    $asunto='';
    $fecha_entrega='';
    $fecha_limite='';
    $termino='';
    $instruciones='';
    $turna='';
    $tamano = count($request->variable);
      for($i=0; $i<$tamano; $i++){
        $fecha_recepcion=$request->variable[$i]['fecha_recepcion'];
        $area_turnada=$request->variable[$i]['area_turnada'];
        $referencia=$request->variable[$i]['referencia'];
        $asunto=$request->variable[$i]['asunto'];
        $fecha_entrega=$request->variable[$i]['fecha_entrega'];
        $fecha_limite=$request->variable[$i]['fecha_limite'];
        $termino=$request->variable[$i]['termino'];
        $instruciones=$request->variable[$i]['instrucciones'];
        $turna=$request->variable[$i]['turna'];
        if (empty($request->variable[$i]['procedencia'])) {
        DB::table('volante')->insert(
           ['tipo' => $request->variable[$i]['tipo'],
            'referencia' => strtoupper($request->variable[$i]['referencia']),
            'fecha_recepcion' => $request->variable[$i]['fecha_recepcion'],
            'procedimiento' => strtoupper($request->variable[$i]['otro1']),
            'asunto' => strtoupper($request->variable[$i]['asunto']),
            'anio' => '2018',
            'num' => $numero
          ]
         );
       }else{
         DB::table('volante')->insert(
            ['tipo' => $request->variable[$i]['tipo'],
             'referencia' => strtoupper($request->variable[$i]['referencia']),
             'fecha_recepcion' => $request->variable[$i]['fecha_recepcion'],
             'procedimiento' => strtoupper($request->variable[$i]['procedencia']),
             'asunto' => strtoupper($request->variable[$i]['asunto']),
             'anio' => '2018',
             'num' => $numero
           ]
          );
          DB::table('datos_volante')->insert(
             ['datos_atencion_area_turnada' => $request->variable[$i]['area_turnada'],
              'fecha_entrega' => $request->variable[$i]['fecha_entrega'],
              'fecha_limite' => $request->variable[$i]['fecha_limite'],
              'termino' => strtoupper($request->variable[$i]['termino']),
              'copias' => $request->variable[$i]['copias'],
              'instrucciones' => $request->variable[$i]['instrucciones'],
              'turna' => strtoupper($request->variable[$i]['turna']),
              'recibe' => strtoupper($request->variable[$i]['recibe']),
              'volante_id' => $id,
              'personas_copias' => strtoupper($request->variable[$i]['para'])
            ]
           );
       }
      }
      $folio=$numero.'/2018';
      $phpWord = new \PhpOffice\PhpWord\PhpWord();
      $section = $phpWord->addSection();
      $templateWord = new \PhpOffice\PhpWord\TemplateProcessor('plantillasDoc/plantilla_sigecod.docx');
      $templateWord->setValue('folio',$folio);
     $templateWord->setValue('fecha_recep',$fecha_recepcion);
     $templateWord->setValue('tipo',$tipo);
     $templateWord->setValue('referencia',$referencia);
     $templateWord->setValue('procedencia',$procedencia);
     $templateWord->setValue('area_turnada',$area_turnada);
     $templateWord->setValue('fecha_entrega',$fecha_entrega);
     $templateWord->setValue('fecha_limte',$fecha_limite);
     $templateWord->setValue('asunto',$asunto);
     $templateWord->setValue('termino',$termino);
     $templateWord->setValue('copias',$copias);
     $templateWord->setValue('intrucciones',$instruciones);
      $templateWord->setValue('turna',$turna);
      $templateWord->setValue('recibe',$recibe);
     $tim =time();

   $templateWord->saveAs('log/salida'.$tim.'.docx'.$tim);
   //$this->historial('Descarga de oficio de alta del elemento '.$id);
   $nombreDocumento=str_replace("  "," ","Acuse para del ".$procedencia);
   return Response::download('log/salida'.$tim.'.docx'.$tim,$nombreDocumento.'.docx');

    //return $tamano;

  }

   public function editar(Request $request)
  {
     $vola = Datosvolante::leftjoin('volante', 'datos_volante.volante_id', '=', 'volante.folio')
    ->select('volante.tipo','volante.referencia','volante.fecha_recepcion','volante.procedimiento','volante.asunto','volante.anio','volante.num','datos_volante.datos_atencion_area_turnada','datos_volante.fecha_entrega','datos_volante.fecha_limite','datos_volante.termino','datos_volante.copias','datos_volante.instrucciones','datos_volante.turna','datos_volante.recibe','datos_volante.volante_id','datos_volante.personas_copias','datos_volante.id_datos')
    ->where('datos_volante.id_datos','=',$request->get('id'))
    ->get();

     return view('posts/actualizar',compact('vola'));

  }

  public function imprimir(Request $request)
 {
    $vola = Datosvolante::leftjoin('volante', 'datos_volante.volante_id', '=', 'volante.folio')
   ->select('volante.tipo','volante.referencia','volante.fecha_recepcion','volante.procedimiento','volante.asunto','volante.anio','volante.num','datos_volante.datos_atencion_area_turnada','datos_volante.fecha_entrega','datos_volante.fecha_limite','datos_volante.termino','datos_volante.copias','datos_volante.instrucciones','datos_volante.turna','datos_volante.recibe','datos_volante.volante_id','datos_volante.personas_copias','datos_volante.id_datos')
   ->where('datos_volante.id_datos','=',$request->get('id'))
   ->get();

     $folio='';
     $tipo='';
     $referencia='';
     $fecha_recepcion='';
     $procedencia='';
     $asunto='';
     $area_turnada='';
     $fecha_entrega='';
     $fecha_limite='';
     $termino='';
     $copias='';
     $instruciones='';
     $turna='';
     $recibe='';

   foreach ($vola as $po) {
     $folio=$po->num."/".$po->anio;
       $tipo = $po->tipo;
       $referencia = $po->referencia;
       $fecha_recepcion = $po->fecha_recepcion;
       $procedencia = $po->procedimiento;
       $asunto = $po->asunto;
       $area_turnada = $po->datos_atencion_area_turnada;
       $fecha_entrega = $po->fecha_entrega;
       $fecha_limite = $po->fecha_limite;
       $termino = $po->termino;
       $copias = $po->copias;
       $instruciones = $po->instrucciones;
       $turna = $po->turna;
       $recibe = $po->recibe;
   }

   $phpWord = new \PhpOffice\PhpWord\PhpWord();
   $section = $phpWord->addSection();


   $templateWord = new \PhpOffice\PhpWord\TemplateProcessor('plantillasDoc/plantilla_sigecod.docx');

   $dia=date('d');
   $mes=date('m');
   $ano=date('Y');
   $fecha=$ano.'-'.$mes.'-'.$dia;

    $templateWord->setValue('folio',$folio);
   $templateWord->setValue('fecha_recep',$fecha_recepcion);
   $templateWord->setValue('tipo',$tipo);
   $templateWord->setValue('referencia',$referencia);
   $templateWord->setValue('procedencia',$procedencia);
   $templateWord->setValue('area_turnada',$area_turnada);
   $templateWord->setValue('fecha_entrega',$fecha_entrega);
   $templateWord->setValue('fecha_limte',$fecha_limite);
   $templateWord->setValue('asunto',$asunto);
   $templateWord->setValue('termino',$termino);
   $templateWord->setValue('copias',$copias);
   $templateWord->setValue('intrucciones',$instruciones);
    $templateWord->setValue('turna',$turna);
    $templateWord->setValue('recibe',$recibe);



   $tim =time();

 $templateWord->saveAs('log/salida'.$tim.'.docx'.$tim);
 //$this->historial('Descarga de oficio de alta del elemento '.$id);
 $nombreDocumento=str_replace("  "," ","Acuse para del ".$procedencia);
 return Response::download('log/salida'.$tim.'.docx'.$tim,$nombreDocumento.'.docx');

 }



  public function buscar(Request $request)
  {


    $vola = Datosvolante::leftjoin('volante', 'datos_volante.volante_id', '=', 'volante.folio')
    ->select('volante.folio','volante.tipo','volante.referencia','volante.fecha_recepcion','volante.procedimiento','volante.asunto','volante.anio','volante.num','datos_volante.datos_atencion_area_turnada','datos_volante.fecha_entrega','datos_volante.fecha_limite','datos_volante.termino','datos_volante.copias','datos_volante.instrucciones','datos_volante.turna','datos_volante.recibe','datos_volante.volante_id','datos_volante.personas_copias','datos_volante.id_datos')
    ->orderBy('datos_volante.id_datos','desc')
    ->paginate(8);



    return view('posts/buscar',compact('vola'));

  }
    //metodos de personal

   public function mostrarvistapersonal(Request $request)
  {
    $personal = Personal::orderBy('id', 'desc')->paginate(10);

     return view('personal/index',compact("personal"));

  }

  public function editarpersonal(Request $request)
  {
    $personal=Personal::findOrFail($request->get('id_personal'));
     return view('personal/editar',compact("personal"));
  }

   public function actualpersonal(Request $request)
  {

      $per = Personal::findOrFail($request->get('id_personal'));
        $per->nombre=strtoupper($request->get('nombre'));
        $per->apellido_paterno=strtoupper($request->get('ap'));
        $per->apellido_materno=strtoupper($request->get('am'));
        $per->tipo=$request->get('tipo');
        $per->activo=$request->get('status');
        $per->update();

        return redirect("personal");

  }
  public function crearpersonal(Request $request)
  {
     return view('personal/crear');
  }

  public function guardarAnio(Request $request)
  {
     $res = $request->get('anio');
     DB::table('administrador')
            ->where('id', 1)
            ->update(['anio_actual' => $res]);
     return $res;
  }

  public function insertarpersonal(Request $request)
  {

    $per=new Personal;
      $per->nombre=strtoupper($request->get('nombre'));
      $per->apellido_paterno=strtoupper($request->get('ap'));
      $per->apellido_materno=strtoupper($request->get('am'));
      $per->tipo=$request->get('tipo');
      $per->activo=$request->get('status');
      $per->save();
     return redirect("personal")->with('success','muy bien');
  }

   public function mostrarcierre(Request $request)
  {

     return view('personal/cierre');
  }

  public function nuevoguardar(Request $request)
 {
   $vola = Datosvolante::leftjoin('volante', 'datos_volante.volante_id', '=', 'volante.folio')
   ->select('volante.folio','volante.tipo','volante.referencia','volante.fecha_recepcion','volante.procedimiento','volante.asunto','volante.anio','volante.num','datos_volante.datos_atencion_area_turnada','datos_volante.fecha_entrega','datos_volante.fecha_limite','datos_volante.termino','datos_volante.copias','datos_volante.instrucciones','datos_volante.turna','datos_volante.recibe','datos_volante.volante_id','datos_volante.personas_copias','datos_volante.id_datos')
   ->where('datos_volante.id_datos','=',$request->get('id_datos'))
   ->get();
   dd($vola);
    return redirect("buscar");
 }

}
