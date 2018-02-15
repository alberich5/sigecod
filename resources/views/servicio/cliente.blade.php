@extends('layouts.app')

@section('content')
  <div class="container" id="app">
    <form action="clientes" class="form-horizontal" method="get">
        @if(count($errors) > 0)
            <div class="errors">
                <ul class="alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <div id="entrada">
        <div class="form-group">
            <div class="col-sm-10">
                <input type="hidden" class="form-control" name="id_usuario" value="{{ Auth::user()->id }}">
                <input type="hidden" class="form-control" name="nombre_usuario" value="{{ Auth::user()->name }}">
                <input type="hidden" class="form-control" name="fecha" value="<?php echo date("Y-m-d");?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
              <label for="cliente">Nombre del cliente:</label>
                <input type="text" class="form-control" name="cliente" placeholder="Nombre del cliente..." value="{{old('domicilio')}}" required style="text-transform: uppercase;">
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Guardar" v-on:click="mostrarAlert">
    </form>
  </div>



  </div>







@endsection

@section('js')
  <script type="text/javascript">
    var vm = new Vue({
            //id asignado al div en el que funcionara vue
            el: '#app',
            //funcion al crear el objet
            created: function() {
              this.mostrarStatu();
            },
            data:{
                errors:[],
                status:[],
                fecha:'',
                searchUsuario:{'username':'','nombre':'','paterno':'','materno':''},
                    },
            methods:{
                mostrarAlert:function(id){

                },
                mostrarCancelar:function(){
                    toastr.success('Eliminado');
                },
                mostrarStatu:function(){
                    var urlStatus = 'status';
                    axios.get(urlStatus).then(response => {
                    this.status = response.data
                  });
                },
        }});
    </script>

@endsection
