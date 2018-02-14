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
        <div class="col-md-8 col-md-offset-2">
        <div class="form-group">
            <div class="col-sm-6">
              <label for="buscar">Seleciona Cliente:</label>
              <select name="unidad" class="form-control">
                <option v-for="cli in clientes" v-bind:value="cli.id" class="lista">
                  @{{ cli.nombre}}
                </option>
              </select>
            </div>
        </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
                <input type="hidden" class="form-control" name="id_usuario" value="{{ Auth::user()->id }}">
                <input type="hidden" class="form-control" name="nombre_usuario" value="{{ Auth::user()->name }}">
            </div>
        </div>
        <br>





        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Articulos Buscados</div>
                    <div class="panel-body">
                      <div class="col-sm-5">
                        <label for="buscar">Buscar:</label>
                          <input type="search" class="form-control" name="buscar" v-model="buscar" style="text-transform: uppercase;">
                      </div>
                      <div class="col-sm-3">
                          <input type="submit" class="btn btn-primary" value="buscar" v-on:click="mostrarArticulos()">
                      </div>
                      <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                          <th>Id</th>
                          <th>Fecha Ingreso</th>
                          <th>Descripcion</th>
                          <th>Marca</th>
                          <th>Precio con Iva</th>
                          <th>Cantidad</th>
                          <th>Opciones</th>
                        </thead>
                        <tbody>
                          <tr v-for="art in articulos">
                            <td>@{{ art.id }}</td>
                            <td>@{{ art.fecha_ingreso }}</td>
                            <td>@{{ art.descripcion }}</td>
                            <td>@{{ art.marca }}</td>
                            <td>@{{ art.precio_iva }}</td>
                            <td>@{{ art.cantidad }}</td>
                            <td><button class="btn btn-danger" v-on:click.prevent="agregar(art)">Agregar</button></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <center><div class="panel-heading"><h4>Articulos Agregados</h4></div></center>
                    <div class="panel-body">
                      <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                          <th>Fecha Ingreso</th>
                          <th>Descripcion</th>
                          <th>Marca</th>
                          <th>Precio con Iva</th>
                          <th>Cantidad</th>
                        </thead>
                        <tbody>
                          <tr v-for="total in totalCargado">
                            <td>@{{ total.fecha_ingreso }}</td>
                            <td>@{{ total.descripcion }}</td>
                            <td>@{{ total.marca }}</td>
                            <td>@{{ total.precio_iva }}</td>
                            <td><input type="number" min="1" max="5" value="1" >
                            </td>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>


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
                totalCargado:[],
                fecha:'',
                searchUsuario:{'username':'','nombre':'','paterno':'','materno':''},
                    },
            methods:{
                enviar:function(){
                  var urlStatus = '/traerCliente';
                  axios.get(urlStatus).then(response => {
                  this.clientes = response.data
                });
                },
                mostrarArticulos:function(){
                    var urlStatus = '/mostrararticulos?query=' + this.buscar;
                  axios.get(urlStatus).then(response => {
                  this.articulos = response.data
                });
                },
                agregar:function(art){
                  this.totalCargado.push(art);
                  swal("Agregado Correctamente", "Se agrego bien", "success");
                },
        }});
    </script>
@endsection
