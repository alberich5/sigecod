@extends('layouts.app')

@section('content')
  <div class="container" id="app">
    <center><h1>Listado de Articuloss</h1></center>

    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		<div class="table-responsive">
    			<table class="table table-striped table-bordered table-condensed table-hover">
    				<thead>
    					<th>Id</th>
              <th>Fecha Ingreso</th>
    					<th>Descripcion</th>
    					<th>Marca</th>
    					<th>Precio con Iva</th>
    					<th>Cantidad</th>
    				</thead>
                   @foreach ($entradas as $entra)
            <tr>
    					<td>{{ $entra->id}}</td>
              <td>{{ $entra->fecha_ingreso}}</td>
              <td>
                @if('0'  == $entra->cantidad)
                  <span class="label label-warning">{{ $entra->descripcion}}</span>
                @endif
                @if('0'  < $entra->cantidad)
                  {{ $entra->descripcion}}
                @endif
              </td>
              <td>{{ $entra->marca}}</td>
    					<td>$ {{ $entra->precio_iva}}</td>
              <td>
                @if('0'  == $entra->cantidad)
                  <span class="label label-warning">{{ $entra->cantidad}}</span>
                @endif
                @if('0'  < $entra->cantidad)
                  {{ $entra->cantidad}}
                @endif
              </td>
    				</tr>
            </span>
    				@endforeach
    			</table>
    		</div>
    		{{$entradas->render()}}
    	</div>
    </div>


  </div>


@endsection

@section('js')


@endsection
