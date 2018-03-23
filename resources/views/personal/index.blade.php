@extends('layouts.app')

@section('content')
  <div class="container" id="app">
    <center><h1>Listado de Personal</h1></center>
    <div id="articulo">
    <div class="row">
      
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <form action="crearpersonal" method="post">
                
                <input type="submit" class="btn btn-success" value="Crear Personal" >
        </form>
        <br>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-condensed table-hover">
            <thead>
              <th>Id</th>
              <th>Nombre</th>
              <th>Apellido Paterno</th>
              <th>Apellido Materno</th>
              <th>Tipo</th>
              <th>Status</th>
              <th>Opciones</th>
            </thead>
             @foreach ($personal as $per)
            <tr>
              <td>{{ $per->id}}</td>
              <td>{{ $per->nombre}}</td>
              <td>{{ $per->apellido_paterno}}</td>
              <td>{{ $per->apellido_materno}}</td>
              <td>{{ $per->tipo}}</td>
              <td>{{ $per->activo}}</td>
              <td>
              <form action="editarpersonal" method="post">
                <input type="hidden" class="form-control" name="id_personal" value="{{ $per->id }}" >
                <input type="submit" class="btn btn-primary" value="Editar" >
              </form>
              </td>
            </tr>

            @endforeach

          </table>
        </div>
       {{$personal->render()}}
      </div>
    </div>

    </div>
    
  </div>


@endsection

@section('js')


@endsection