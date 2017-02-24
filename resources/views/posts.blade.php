@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Auth::check())
            <form action="posts" class="form-horizontal" method="post">
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
                        <input type="text" class="form-control" name="contenido" placeholder="Write Something..." value="{{old('contenido')}}">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="GoldFinch It" >
            </form>
       @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">News</div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            @foreach($posts as $post)
                            <tr>
                                <th>{{$post->nombre_usuario}}
                                    <br>
                                    {{$post->contenido}}
                                </th>
                                <th>
                                    @if(Auth::check() && Auth::user()->id == $post->id_usuario)
                                        <form action="/posts/editposts" class="form-horizontal" method="post">
                                            <input type="hidden" class="form-control" name="id" value="{{ $post->id }}">
                                            <input type="submit" class="btn btn-primary" value="Edit">
                                        </form></th>
                                <th>

                                   <form action="posts" class="form-horizontal" method="get">
                                       <input type="hidden" class="form-control" name="id" value="{{ $post->id }}">
                                       <input type="submit" class="btn btn-danger" value="Delete">
                                   </form>
                                    @endif
                                </th>
                            </tr>
                                @endforeach
                            </thead>
                        </table>
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
