@extends('layouts.app')

@section('content')
  <div class="container" id="app">
        @if(count($errors) > 0)
            <div class="errors">
                <ul class="alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <div id="unidad">





    <center><h2>Salidas</h2></center>
    <div class="row">
    	<div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
    		<div class="table-responsive">
    			<table class="table table-striped table-bordered table-condensed table-hover">
    				<thead>
              <th>Id Entrada</th>
              <th>Nombre del Cliente</th>
              <th>Nombre del Usuario</th>
              <th>Cantidad</th>
              <th>Fecha_salida</th>
    				</thead>
                   @foreach ($salidas as $sali)
    				<tr>
              <td>{{ $sali->id_entrada}}</td>
                <td>{{ $sali->nombre}}</td>
              <td>{{ $sali->name}}</td>
              <td>{{ $sali->cantidad}}</td>
              <td>{{ $sali->fecha_salida}}</td>
    				</tr>

    				@endforeach
    			</table>
    		</div>
        {{$salidas->render()}}
    	</div>
    </div>

  </div>
  </div>







@endsection

@section('js')


@endsection
