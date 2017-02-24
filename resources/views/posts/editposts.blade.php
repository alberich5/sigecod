@extends('layouts.app')

@section('content')
    <div class="container">
            <form action="editposts" class="form-horizontal" method="post">
                @if(count($errors) > 0)
                    <div class="errors">
                        <ul class="alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            </form>
        @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editing Post</div>
                    <div class="panel-body">
                        <form action="editposts" class="form-horizontal" method="put">
                            <label>Author:</label>
                            <input type="hidden" class="form-control" name="id" value="{{ $post['id'] }}">
                            <input type="text" class="form-control" name="nombre_usuario" readonly="readonly" value="{{ Auth::user()->name }}">
                            <label>Content:</label>
                            <input type="text" class="form-control" name="contenido" value="{{$post['contenido']}}">
                            <br>
                            <input type="submit" class="btn btn-primary" value="Edit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
