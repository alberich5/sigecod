@extends('layouts.app')

@section('content')
<div class="container" id="historial">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <center>

        <h2> @foreach ($cliente as $cli)
          {{ $cli->nombre}}
              @endforeach
        </h2>
        <h3>{{ $inicial}} A {{ $final}}</h3>

      </center>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
          <thead>
            <th>Numero</th>
            <th>Cantidad</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Precio con Iva</th>
          </thead>
                 @foreach ($salidas as $sali)
          <tr>
            <td></td>
            <td>{{ $sali->cantidad}}</td>
            <td>{{ $sali->descripcion}}</td>
            <td>{{ $sali->precio}}</td>
            <td>{{ $sali->precio_iva}}</td>

          </tr>

          @endforeach
          <tr>
            <td><strong>TOTAL</strong></td>
            <td></td>
            <td></td>
            <td>@foreach ($precio as $pre)
            <span class="badge">{{ $pre->total}}</span>
                  @endforeach</td>
            <td>@foreach ($iva as $i)
                <span class="badge">{{ $i->totaliva}}</span>
                  @endforeach</td>

          </tr>
        </table>
      </div>


    </div>
  </div>


@endsection

@section('js')


@endsection
