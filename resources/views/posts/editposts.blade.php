@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Quejas</div>
                    <div class="panel-body">
                        <form action="" class="form-horizontal" method="post">
                            @if(count($errors) > 0)
                                <div class="errors">
                                    <ul class="alert-danger">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <label>Capturo:</label>
                            <input type="hidden" class="form-control" name="id" value="{{ $post->id }}">
                            <input type="hidden" class="form-control" name="id_usuario" readonly="readonly" value="{{ $post->id_usuario }}">
                            <input type="text" class="form-control" name="nombre_usuario" readonly="readonly" value="{{ Auth::user()->name }}">
                            <label>Descripcion de la queja:</label>
                            <input type="text" class="form-control" name="contenido" value="{{$post->contenido}}">
                            <label for="status">Status:</label>
                            <select name="status" class="form-control">
                                <option value="atendida">Atendida</option>
                                <option value="pendiente">Pendiente</option>
                            </select>
                            <br>
                            <input type="submit" class="btn btn-primary" value="Actualizar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
