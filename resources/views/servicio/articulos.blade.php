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
              <td>{{ $entra->descripcion}}</td>
              <td>{{ $entra->marca}}</td>
    					<td>$ {{ $entra->precio_iva}}</td>
              <td>{{ $entra->cantidad}}</td>

    				</tr>

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
