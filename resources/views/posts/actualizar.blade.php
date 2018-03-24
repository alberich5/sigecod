@extends('layouts.app')

@section('content')
  <div class="container" id="historial">
 @foreach ($vola as $vo)
 <form action="nuevoguardar" class="form-horizontal" method="get">
   <div class="form-group">
       <div class="col-sm-10">
           <input type="hidden" class="form-control" name="id_volante" value="{{ $vo->folio }}">
           <input type="hidden" class="form-control" name="id_datos" value="{{  $vo->id_datos }}">
       </div>
   </div>

 <div class="form-group">
     <div class="col-sm-4">
       <strong>Tipo:</strong>
          <input type="text" class="form-control" value=" {{ $vo->tipo}}" name="tipo" style="text-transform: uppercase;" required>
     </div>
     <div class="col-sm-4">
       <strong>Referencia:</strong>
         <input type="text" class="form-control" value=" {{ $vo->referencia}}" name="referencia" style="text-transform: uppercase;" required>
     </div>
      <div class="col-sm-4">
      <strong> Fecha Repcion:</strong>
         <input type="date" class="form-control" name="fecha_recepcion" value="{{ $vo->fecha_recepcion}}" >
     </div>
 </div>

 <div class="form-group">
     <div class="col-sm-7">
       <strong>Procedencia:</strong>
         <input type="text" class="form-control" value=" {{ $vo->procedimiento}}" name="procedencia" style="text-transform: uppercase;" required>
     </div>

 </div>

 <div class="form-group">
     <div class="col-sm-12">
       <strong>Asunto:</strong>
           <input type="text" class="form-control" value=" {{ $vo->asunto}}" name="asunto" style="text-transform: uppercase;" required>
     </div>
 </div>

 <br><br>
<div class="form-group">
   <div class="col-sm-7">
    <strong> Area turnada:</strong>
       <input type="text" class="form-control" value=" {{ $vo->datos_atencion_area_turnada}}" name="area_turnada" style="text-transform: uppercase;" required>
   </div>

   <div class="form-group">
       <div class="col-sm-4">
         <strong>Fecha de Entrega:</strong>
           <input type="text" class="form-control" value=" {{ $vo->fecha_entrega}}" name="fecha_entrega" required >
       </div>
        <div class="col-sm-4">
         <strong>Fecha Limite:</strong>
           <input type="text" class="form-control" value=" {{ $vo->fecha_limite}}" name="fecha_limite" required>
       </div>
       <div class="col-sm-4">
         <strong>Termino:</strong>
           <input type="text" class="form-control" value=" {{ $vo->termino}}" name="termino" required>
       </div>
   </div>

   <div class="form-group">
       <div class="col-sm-5">
         <strong>Copias:</strong>
           <input type="text" class="form-control" value=" {{ $vo->copias}}" name="copias" style="text-transform: uppercase;" required>
       </div>
       <div class="col-sm-6">
         <strong>Para:</strong>
            <input type="text" class="form-control" value=" {{ $vo->personas_copias}}" name="para"  style="text-transform: uppercase;" required>
       </div>
   </div>

   <div class="form-group">
      <div class="col-sm-10">
        <strong>instrucciones:</strong>
            <input type="text" class="form-control" value=" {{ $vo->instrucciones}}"  name="instrucciones" style="text-transform: uppercase;" required>
      </div>
  </div>
  <div class="form-group">
      <div class="col-sm-4">
         <strong>Turna:</strong>
        <input type="text" class="form-control" value=" {{ $vo->turna}}" name="turna" style="text-transform: uppercase;" required>
      </div>
      <div class="col-sm-7">
      <strong>  Recibe:</strong>
           <input type="text" class="form-control" value=" {{ $vo->recibe}}" name="recibe" style="text-transform: uppercase;" required>
      </div>
    </div>
</div>
<input type="submit" class="btn btn-primary" value="Actualizar datos" >

</form>
  @endforeach
  </div>


@endsection
