@extends('layouts.app')

@section('content')
  <div class="container" id="historial">
    <form action="historial" class="form-horizontal" method="get">
    <div class="form-group">
        <div class="col-sm-8">
      <label for="">Selecion cliente:</label>
      <select class="form-control" name="cliente">
        @foreach($cliente as $client)
          <option value="{{$client->id}}">{{{$client->nombre}}} </option>

        @endforeach
      </select>
      </div>
   </div>
    <div class="form-group">
      <div class="col-sm-8">
     <label for="">Fecha Inicial</label>
     <input type="date" class="form-control" name="fechaini" value="<?php echo date("Y-m-d");?>" >
     </div>
   </div>
   <div class="form-group">
     <div class="col-sm-8">
    <label for="">Fecha Final</label>
    <input type="date" class="form-control" name="fechafinal" value="<?php echo date("Y-m-d");?>" >
    </div>
  </div>
  <input type="submit" class="btn btn-primary" value="Ver" >
  </form>
  </div>


@endsection

@section('js')


@endsection
