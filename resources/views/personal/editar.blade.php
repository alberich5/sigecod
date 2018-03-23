@extends('layouts.app')

@section('content')
@if(Auth::user()->rol == 'admin')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading"><center>Editar Personal</center></div>
                    <div class="panel-body">
                        <form action="actualizapersonal" class="form-horizontal" method="get">
                            @if(count($errors) > 0)
                                <div class="errors">
                                    <ul class="alert-danger">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <input type="hidden" class="form-control" name="id_personal" value="{{ $personal->id }}" >
                            <label>Nombre:</label>
                            <input type="text" class="form-control" name="nombre" value="{{ $personal->nombre }}" style="text-transform: uppercase;">
                            <label>Apellido Parteno:</label>
                            <input type="text" class="form-control" name="ap" value="{{ $personal->apellido_paterno }}" style="text-transform: uppercase;">
                            <label>Apellido Marteno:</label>
                            <input type="text" class="form-control" name="am" value="{{ $personal->apellido_materno }}" style="text-transform: uppercase;">
                            <label>Tipo:</label>
                            <select name="tipo" class="form-control">
                                <option value="administrativo">Administrativo</option>
                                <option value="operativo">Operativo</option>
                            </select>

                            <label>Status:</label>
                            <select name="status" class="form-control">
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>

                            <br>
                            <input type="submit" class="btn btn-primary" value="Actualizar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
