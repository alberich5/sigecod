@extends('layouts.app')

@section('content')
  <div class="container" id="app">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <center>
        @foreach ($salidas as $sali)
        <h2>{{ $sali->nombre}}</h2>
        <h3>{{ $sali->fecha_salida}}</h3>
         @endforeach
      </center>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Precio Iva</th>
          </thead>
                 @foreach ($salidas as $sali)
          <tr>
            <td>{{ $sali->cantidad}}</td>
            <td>{{ $sali->descripcion}}</td>
            <td>{{ $sali->precio}}</td>
            <td>{{ $sali->precio_iva}}</td>

          </tr>

          @endforeach
        </table>
      </div>
    </div>
  </div>


@endsection

@section('js')


@endsection
