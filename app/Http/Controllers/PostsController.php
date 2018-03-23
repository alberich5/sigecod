<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\Volante;
use App\Datosvolante;
use App\Personal;

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

    public function guardar(Request $request)
  {
    $tamano = count($request->variable);

      for($i=0; $i<$tamano; $i++){
        if (empty($request->variable[$i]['procedencia'])) {
        DB::table('volante')->insert(
           ['tipo' => $request->variable[$i]['tipo'],
            'referencia' => $request->variable[$i]['referencia'],
            'fecha_recepcion' => $request->variable[$i]['fecha_recepcion'],
            'procedimiento' => $request->variable[$i]['otro1'],
            'asunto' => $request->variable[$i]['asunto'],
            'anio' => '2018'
          ]
         );
       }else{
         DB::table('volante')->insert(
            ['tipo' => $request->variable[$i]['tipo'],
             'referencia' => $request->variable[$i]['referencia'],
             'fecha_recepcion' => $request->variable[$i]['fecha_recepcion'],
             'procedimiento' => $request->variable[$i]['procedencia'],
             'asunto' => $request->variable[$i]['asunto'],
             'anio' => '2018'
           ]
          );
       }
      }



    return $tamano;

  }

   public function editar(Request $request)
  {
     $vola = Datosvolante::leftjoin('volante', 'datos_volante.volante_id', '=', 'volante.folio')
    ->select('volante.tipo','volante.referencia','volante.fecha_recepcion','volante.procedimiento','volante.asunto','volante.anio','volante.num','datos_volante.datos_atencion_area_turnada','datos_volante.fecha_entrega','datos_volante.fecha_limite','datos_volante.termino','datos_volante.copias','datos_volante.instrucciones','datos_volante.turna','datos_volante.recibe','datos_volante.volante_id','datos_volante.personas_copias','datos_volante.id_datos')
    ->where('datos_volante.id_datos','=',$request->get('id'))
    ->get();


     return view('posts/actualizar',compact('vola'));

  }

  public function buscar(Request $request)
  {


    $vola = Datosvolante::leftjoin('volante', 'datos_volante.volante_id', '=', 'volante.folio')
    ->select('volante.tipo','volante.referencia','volante.fecha_recepcion','volante.procedimiento','volante.asunto','volante.anio','volante.num','datos_volante.datos_atencion_area_turnada','datos_volante.fecha_entrega','datos_volante.fecha_limite','datos_volante.termino','datos_volante.copias','datos_volante.instrucciones','datos_volante.turna','datos_volante.recibe','datos_volante.volante_id','datos_volante.personas_copias','datos_volante.id_datos')
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

}
