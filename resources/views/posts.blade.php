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
                      <label for="">Fecha que recibio la queja:</label>
                        <input type="date" class="form-control" name="contenido" >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="">Tipo de queja:</label>
                      <select name="tipo" class="form-control">
                          <option value="Queja">Queja</option>
        	            		<option value="Sugerencia">Sugerencia</option>
                    	</select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="">Entrada:</label>
                      <select name="tipo" class="form-control">
                          <option value="Llamada">Llamada Telefónica</option>
                          <option value="Correo">Correo Electrónico</option>
                          <option value="Escrito">Escrito</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="tipo">Mes:</label>
                      <select name="tipo" class="form-control">
                          <option value="enero">Enero</option>
                          <option value="febrero">Febrero</option>
                          <option value="marzo">Marzo</option>
                          <option value="abril">Abril</option>
                          <option value="mayo">Mayo</option>
                          <option value="junio">Junio</option>
                          <option value="julio">Julio</option>
                          <option value="agosto">Agosto</option>
                          <option value="septiembre">Septiembre</option>
                          <option value="octubre">Octubre</option>
                          <option value="noviembre">Noviembre</option>
                          <option value="diciembre">Diciembre</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="empresa">Empresa:</label>
                        <input type="text" class="form-control" name="empresa" placeholder="Empresa..." value="{{old('contenido')}}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="representante">Representante legal:</label>
                        <input type="text" class="form-control" name="representante" placeholder="Empresa..." value="{{old('contenido')}}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="domicilio">Domicilio del Servicio:</label>
                        <input type="text" class="form-control" name="domicilio" placeholder="Empresa..." value="{{old('contenido')}}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="Ambito">Ambito:</label>
                      <select name="Ambito" class="form-control">
                          <option value="privada">Privada</option>
                          <option value="federal">Federal</option>
                          <option value="estatal">Estatal</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="delegacion">Delegacion o Sub Delegacion:</label>
                      <select name="delegacion" class="form-control">
                          <option value="valles">Valles Centrales</option>
                          <option value="huajuapam">Huajuapam de leon</option>
                          <option value="matias">Matias Romero</option>
                          <option value="salina">Salina Cruz</option>
                          <option value="pinotepa">Pinotepa Nacional</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="delegacion">Codigo:</label>
                      <select name="delegacion" class="form-control">
                          <option value="problemas_operatividad">PROBLEMAS DE OPERATIVIDAD</option>

                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="delegacion">Codigo de Queja:</label>
                      <select name="delegacion" class="form-control">
                          <option value="mala_atencion">MALA ATENCION DE LA DELEGACIÓN</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="delegacion">Status:</label>
                      <select name="delegacion" class="form-control">
                          <option value="atendida">Atendida</option>
                          <option value="pendiente">Pendiente</option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                      <label for="delegacion">Quejas</label>
                        <input type="text-area" class="form-control" name="contenido" placeholder="Escribe la Queja..." value="{{old('contenido')}}">
                    </div>
                </div>

                <input type="submit" class="btn btn-primary" value="Guardar" >
            </form>


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
                                <th>{{$post->nombre_usuario}}
                                    <br>
                                    {{$post->contenido}}
                                </th>
                                <th>
                                    @if(Auth::check() && Auth::user()->id == $post->id_usuario || Auth::check() && Auth::user()->rol == 'admin')
                                <a href="/posts/editposts/{{$post->id}}" ><button class="btn btn-primary">Edit</button> </a>
                                </th>
                                <th>
                                    <a href="/posts/delete/{{$post->id}}" ><button class="btn btn-danger">Delete</button> </a>
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
