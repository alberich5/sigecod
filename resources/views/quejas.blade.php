@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Auth::check())



       @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Quejas</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            @foreach($posts as $post)
                            <tr>
                                <th><h4>{{$post->nombre_usuario}}</h4>
                                    <br>
                                    FECHA RECIBIO:{{$post->fecha}}
                                    <br>
                                    TIPO:{{$post->tipo}}
                                    <br>
                                    Tipo de Entrada:{{$post->entrada}}
                                    <br>
                                    MES:{{$post->mes}}
                                    <br>
                                    EMPRESA:{{$post->empresa}}
                                    <br>
                                    REPRESENTANTE:{{$post->representante}}
                                    <br>
                                    DOMICILIO:{{$post->domicilio}}
                                    <br>
                                    AMBITO:{{$post->ambito}}
                                    <br>
                                    DELEGACION:{{$post->delegacion}}
                                    <br>
                                    CODIGO:{{$post->codigo}}
                                    <br>
                                    CODIGO QUEJA:{{$post->codigoqueja}}
                                    <br>
                                    STATUS:{{$post->status}}
                                    <br>
                                    DESCRIPCION DE LA QUEJA:{{$post->contenido}}
                                </th>
                                <th>
                                    @if(Auth::check() && Auth::user()->id == $post->id_usuario || Auth::check() && Auth::user()->rol == 'admin')
                                <a href="/posts/editposts/{{$post->id}}" ><button class="btn btn-primary">Edit</button> </a>
                                </th>
                                <th>
                                    <!--<a href="/posts/delete/{{$post->id}}" ><button class="btn btn-danger">Delete</button> </a>-->
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
