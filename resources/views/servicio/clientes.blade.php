@extends('layouts.app')

@section('content')
  <div class="container" id="app">
    <center><h1>Listado de Clientes</h1></center>
    <div id="articulo">
    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		<div class="table-responsive">
    			<table class="table table-striped table-bordered table-condensed table-hover">
    				<thead>
    					<th>Id</th>
              <th>Nombre</th>
    				</thead>
                   @foreach ($clientes as $cli)
    				<tr>
    					<td>{{ $cli->id}}</td>
              <td>{{ $cli->nombre}}</td>

    				</tr>

    				@endforeach
    			</table>
    		</div>
    		{{$clientes->render()}}
    	</div>
    </div>

    </div>
  </div>


@endsection

@section('js')


@endsection
