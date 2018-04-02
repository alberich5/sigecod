@extends('layouts.app')

@section('content')
  <div class="container" id="historial">
   <div class="form-group">
              <div class="col-sm-3">
                Tipo:
                  <select name="ano" class="form-control" required>
                    <option value="2017">2017</option>
                    <option value="2018"selected>2018</option>
                    <option  value="2019">2019</option>
                  </select>
              </div>
              <div class="col-sm-3">
                Folio:
                  <input type="text" class="form-control"  placeholder="Folio" style="text-transform: uppercase;" required>
              </div>
               <div class="col-sm-3">
                Fecha Inicial:
                  <input type="date" class="form-control"  value="<?php echo date("Y-m-d");?>" >
              </div>
              <div class="col-sm-3">
                Fecha Final:
                  <input type="date" class="form-control" value="<?php echo date("Y-m-d");?>" >
              </div>
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
              <td>{{ $vo->fecha_recepcion}}</td>
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
