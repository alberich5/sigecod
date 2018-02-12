@extends('layouts.app')

@section('content')
  <div class="container" id="app">
    <form action="unidades" class="form-horizontal" method="get">
        @if(count($errors) > 0)
            <div class="errors">
                <ul class="alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <div class="col-sm-10">
                <input type="hidden" class="form-control" name="id_usuario" value="{{ Auth::user()->id }}">
                <input type="hidden" class="form-control" name="nombre_usuario" value="{{ Auth::user()->name }}">

            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
              <label for="nombre">Nueva Unidad:</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nueva Unidad..." value="{{old('domicilio')}}" required style="text-transform: uppercase;">
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Guardar">
    </form>




  </div>







@endsection

@section('js')


@endsection
