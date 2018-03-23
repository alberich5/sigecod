@extends('layouts.app')

@section('content')
@if(Auth::user()->rol == 'admin')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading"><center>Crear Personal</center></div>
                    <div class="panel-body">
                        <form action="insertarpersonal" class="form-horizontal" method="post">
                            @if(count($errors) > 0)
                                <div class="errors">
                                    <ul class="alert-danger">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            <label>Nombre:</label>
                            <input type="text" class="form-control" name="nombre" required>
                            <label>Apellido Parteno:</label>
                            <input type="text" class="form-control" name="ap" required>
                            <label>Apellido Marteno:</label>
                            <input type="text" class="form-control" name="am" required>
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
                            <input type="submit" class="btn btn-primary" value="Crear">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
