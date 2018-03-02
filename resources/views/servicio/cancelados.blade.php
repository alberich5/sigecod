@extends('layouts.app')

@section('content')
  <div class="container" id="cancelados">
    <center><h1>Entradas Canceladas</h1></center>
<div id="articulo">
    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		<div class="table-responsive">
    			<table class="table table-striped table-bordered table-condensed table-hover">
    				<thead>
    					<th>Id</th>
              <th>Fecha Ingreso</th>
    					<th>Descripcion</th>
    					<th>Marca</th>
    					<th>Precio con Iva</th>
    					<th>Status</th>
              <th>Opcion</th>
    				</thead>
            <tr v-for="art in articulos">
             <td >@{{ art.id }}</td>
             <td >@{{ art.fecha_ingreso }}</td>
             <td >@{{ art.descripcion }}</td>
             <td >@{{ art.marca }}</td>
             <td >@{{ art.precio_iva }}</td>
               <td ><span class="label label-warning">@{{ art.status }}</span></td>
             <td>
               @if (Auth::user()->rol == 'admin')
                       <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="rea(art)">Reativar</a>
             		@endif
                @if (Auth::user()->rol == 'user')
                        <span class="label label-primary">Reactivar Entrada Admin</span>
                 @endif

             </td>
           </tr>
    			</table>
    		</div>
    		{{$entradas->render()}}
    	</div>
    </div>

    @include('servicio.revalidacion')
    <!--<div class="row">
       <div class="col-xs-12">
         <pre>@{{$data}}</pre>
       </div>
     </div>-->

</div>


  </div>




  </div>


@endsection

@section('js')

<script type="text/javascript">
  var vm = new Vue({
          //id asignado al div en el que funcionara vue
          el: '#cancelados',
          //funcion al crear el objet
          created: function() {
              this.mostrar();
          },
          data:{
              articulos:[],
              motivo:'',
              contra:'',
              idtemporal:'',
              mensaje:'',
              searchUsuario:{'username':'','nombre':'','paterno':'','materno':''},
                  },
          methods:{
              Eliminar:function(id){
                var msj = id;
                alert("eliminar"+msj);
              },
              rea:function(art){
                this.idtemporal=art.id;
                $('#create').modal('show');
              },
              mostrar:function(){
                var urlStatus = '/canceladosvue';
                  axios.get(urlStatus).then(response => {
                  this.articulos = response.data
                });
              },
              crearvalidacion:function(){
                if (this.contra=='12345') {
                  var urlStatus = '/reactivar?motivo=' + this.motivo+'&id='+this.idtemporal;
                    axios.get(urlStatus).then(response => {
                    this.mensaje = response.data
                    this.idtemporal='';
                  });
                  swal('Se reactivo','Se reactivo producto','success');
                }else{

                  swal('Contraseña Incorrecta...','No se puede reactivar producto','error');
                }
              },
      }});
  </script>


@endsection
