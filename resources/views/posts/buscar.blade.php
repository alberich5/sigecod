@extends('layouts.app')

@section('content')
  <div class="container" id="historial">
   <div class="form-group">
              <form action="buscarfolio" class="form-horizontal" method="post">
              <div class="col-sm-3">
                Folio:
                  <input type="text" class="form-control"  name="folio" placeholder="Folio" style="text-transform: uppercase;" >
              </div>
               <div class="col-sm-3">
                Fecha Inicial:
                  <input type="date" class="form-control" name="fecha_ini" value="<?php echo date("Y-m-d");?>" >
              </div>
              <div class="col-sm-3">
                Fecha Final:
                  <input type="date" class="form-control" name="fecha_final" value="<?php echo date("Y-m-d");?>" >
              </div>
              <div class="col-sm-3">
                <input type="submit" class="btn btn-primary" value="Buscar">
              </div>
              
              </form>
          </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-condensed table-hover">
            <thead>

              <th>Id</th>
              <th>Folio</th>
              <th>Tipo</th>
              <th>Asunto</th>
              <th>Fecha Recepcion</th>
              <th>Turna</th>
              <th>Termino</th>
              <th>Actualizar</th>
              <th>Reimprimir</th>
            </thead>
                   @foreach ($vola as $vo)
            <tr>

              <td>{{ $vo->folio}}</td>
              <td>{{ $vo->num}}/{{ $vo->anio}}</td>
              <td>{{ $vo->tipo}}</td>
              <td>{{ $vo->asunto}}</td>
              <td width="30">{{ $vo->fecha_recepcion}}</td>
              <td>{{ $vo->turna}}</td>
              <td>{{ $vo->termino}}</td>
              <td><form action="editar" method="post">
                <input type="hidden" class="form-control" name="id" value="{{ $vo->id_datos }}">
                <button type="submit" class="btn btn-info">Actualizar</button>
              </form></td>
              <td><form action="imprimir" method="post">
                <input type="hidden" class="form-control" name="id" value="{{ $vo->id_datos }}">
                <button type="submit" class="btn btn-success">imprimrir</button>
              </form></td>
            </tr>

            @endforeach
          </table>
        </div>
        {{$vola->render()}}
      </div>
    </div>
  </div>


@endsection
