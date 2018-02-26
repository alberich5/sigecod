@extends('layouts.app')

@section('content')
  <div class="container" id="app">
    <form action="entradas" class="form-horizontal" method="get">
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
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-10">
              <label for="fecha">Fecha de Ingreso:</label>
                <input type="date" class="form-control" name="fecha" value="<?php echo date("Y-m-d");?>" >
            </div>
        </div>



        <div class="form-group">
            <div class="col-sm-10">
              <label for="descripcion">Descripcion:</label>
                <input type="text" class="form-control" name="descripcion" placeholder="Descripcion del producto..." value="{{old('domicilio')}}" style="text-transform: uppercase;" required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
              <label for="marca">Marca:</label>
                <input type="text" class="form-control" name="marca" placeholder="Marca del producto..." value="{{old('domicilio')}}" style="text-transform: uppercase;" required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
              <label for="status">Unidad:</label>
              <select name="unidad" class="form-control">
                <option v-for="uni in unidad" v-bind:value="uni.id" class="lista">
                  @{{ uni.nombre}}
                </option>
              </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
              <label for="precio">Precio:</label>
                <input type="text" class="form-control" name="precio" placeholder="Precio del producto..." value="{{old('domicilio')}}" onkeypress="return valida(event)" required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
              <label for="cantidad">Cantidad:</label>
                <input type="text" class="form-control" name="cantidad" placeholder="Cantidad del producto..." value="{{old('domicilio')}}" onkeypress="return valida(event)" required>
            </div>
        </div>


        <input type="submit" class="btn btn-primary" value="Guardar" >
    </form>
    </div>
    <!--
    <div class="row">
       <div class="col-xs-12">
         <pre>@{{$data}}</pre>
       </div>
     </div>
  </div>-->
@endsection

@section('js')
<script>
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>
  <script type="text/javascript">
    var vm = new Vue({
            //id asignado al div en el que funcionara vue
            el: '#app',
            //funcion al crear el objet
            created: function() {
              this.enviar();
            },
            data:{
                errors:[],
                unidad:[],
                fecha:'',
                searchUsuario:{'username':'','nombre':'','paterno':'','materno':''},
                    },
            methods:{
                enviar:function(){
                    var urlStatus = 'traerUnidad';
                    axios.get(urlStatus).then(response => {
                    this.unidad = response.data
                  });
                },
        }});
    </script>
@endsection
