@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">New Post</div>
                    @if(count($errors) > 0)
                        <div class="errors">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="panel-body">
                        <form action="/posts/createpost" class="form-horizontal" method="post">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Author:</label>
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" name="id_usuario" value="{{ Auth::user()->id }}" readonly="readonly">
                                    <input type="text" class="form-control" name="nombre_usuario" value="{{ Auth::user()->name }}" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Title:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="titulo" value="{{old('titulo')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Content:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="contenido" value="{{old('contenido')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Private:</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker" name="privado" value="{{old('privado')}}">
                                        <option>0</option>
                                        <option>1</option>
                                    </select>                                </div>
                            </div>
                            <input type="submit" class="btn btn-default" value="GoldFinch It" >
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection