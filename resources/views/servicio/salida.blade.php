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
      <div class="salida">


        <div class="col-md-8 col-md-offset-2">
        <div class="form-group">
            <div class="col-sm-6">
              <label for="buscar">Seleciona Cliente:</label>
              <select name="unidad" class="form-control" v-model="clienteSelecionado">
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
                          <th>Stock</th>
                          <th>Cantidad</th>
                          <th>Opciones</th>
                        </thead>
                        <tbody>
                          <tr v-for="(art, index) in articulos">
                            <td>@{{ art.id }}</td>
                            <td>@{{ art.fecha_ingreso }}</td>
                            <td>@{{ art.descripcion }}</td>
                            <td>@{{ art.marca }}</td>
                            <td>@{{ art.precio_iva }}</td>
                            <td>@{{ art.cantidad }}</td>
                            <td>
                              <div v-if="art.cantidad > 0">
                                <input type="number" min="1" max="5" value="1" name="cantidad" v-model="cantidad">
                              </div>
                              <div v-else>
                                0
                              </div>
                            </td>
                            <td>
                              <div v-if="art.cantidad > 0">
                                <button class="btn btn-primary" v-on:click.prevent="agregar(art, index)">Agregar</button>
                              </div>
                              <div v-else>
                                No Hay articulos
                              </div>

                            </td>
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
                          <th>Opciones</th>
                        </thead>
                        <tbody>

                          <tr v-for="(total, index) in totalCargado">
                            <form action="guardarBD" class="form-horizontal" method="get">
                            <td name="fecha_ingreso" v-model="fecha_ingreso">@{{ total.fecha_ingreso }}</td>
                            <td name="descripcion" >@{{ total.descripcion }}</td>
                            <td name="marca" >@{{ total.marca }}</td>
                            <td name="precio" v-model="precio">@{{ total.precio_iva }}</td>
                            <td>@{{ total.otro }}</td>
                            <td><button type="button" class="btn btn-danger" v-on:click.prevent="quitarEl(index)">Eliminar</button>
                                <input type="submit"  class="btn btn-success" value="ok" v-on:click.prevent="guadarBD()">
                            </td>

                          </tr>

                        </tbody>
                      </table>
                    </div>




                </div>
            </div>
            <div v-if="respuesta > 0">

              <a href="http://localhost:8000/php/formato1.php?2"><button class="btn btn-success">Descargar</button></a>
            </div>
            <div v-else>

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
                respuesta:'2',
                descripcion:'',
                marca:'',
                precio:'',
                cantidad:'1',
                buscar:'',
                clienteSelecionado:'',
                cantidad:'',
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
                agregar:function(art, index){
                  this.totalCargado.push({
                    "id": art.id,
                    "id_usuario": art.id_usuario,
                    "id_unidad": art.id_unidad,
                    "fecha_ingreso": art.fecha_ingreso,
                    "descripcion": art.descripcion,
                    "marca": art.marca,
                    "precio": art.precio,
                    "precio_iva": art.precio_iva,
                    "cantidad": art.cantidad,
                    "otro": this.cantidad,
                    "cliente": this.clienteSelecionado
                  });
                  //this.totalCargado[index].otro=this.cantidad;
                  swal("Agregado Correctamente", "Se agrego bien", "success");
                },

                quitarEl: function(index) {
                  this.totalCargado.splice(index, 1);
                  swal('Removido...','Se quito elemento','error');

                },

                guadarBD:function(){
                  //var querystr = jQuery.param(this.totalCargado); // hacemos el querystring tomando los valores
                    //alert(querystr);
                  //  alert("entro");
                    var urlGuardar = 'guardarBD';
                    axios.post(urlGuardar,{
                      variable:this.totalCargado
                    }).then(response => {
                     this.respuesta = response.data
                       swal("Se Agregaron "+this.respuesta+" Productos", "Muy Bien", "success");

                  });


                },
        }});
    </script>
@endsection
