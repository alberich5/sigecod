@extends('layouts.app')

@section('content')
  <div class="container" id="salida">

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
              <label for="buscar">Seleciona Cliente:</label>
                <input type="search" class="form-control" name="buscar" >
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
                <input type="hidden" class="form-control" name="id_usuario" value="{{ Auth::user()->id }}">
                <input type="hidden" class="form-control" name="nombre_usuario" value="{{ Auth::user()->name }}">
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-10">
              <label for="buscar">Buscar:</label>
                <input type="search" class="form-control" name="buscar" v-model="buscar" >
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">

            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="buscar" v-on:click="mostrarArticulos()">


    <div class="row">
       <div class="col-xs-12">
         <pre>@{{$data}}</pre>
       </div>
     </div>
  </div>
@endsection

@section('js')
  <script type="text/javascript">
    var vm = new Vue({
            //id asignado al div en el que funcionara vue
            el: '#salida',
            //funcion al crear el objet
            created: function() {
              this.enviar();
            },
            data:{
                clientes:[],
                buscar:'',
                articulos:[],
                fecha:'',
                searchUsuario:{'username':'','nombre':'','paterno':'','materno':''},
                    },
            methods:{
                enviar:function(){
                  var urlStatus = '/traerUnidad';
                  axios.get(urlStatus).then(response => {
                  this.unidad = response.data
                });
                },
                mostrarArticulos:function(){
                    var urlStatus = '/mostrararticulos?query=' + this.buscar;
                  axios.get(urlStatus).then(response => {
                  this.articulos = response.data
                });
                },
        }});
    </script>
@endsection
