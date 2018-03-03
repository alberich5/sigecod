@extends('layouts.app')

@section('content')
  <div class="container" id="historial">
    <form action="historial" class="form-horizontal" method="get">
    <div class="form-group">
        <div class="col-sm-8">
      <label for="">Selecion cliente:</label>
      <select class="form-control" name="cliente">
        @foreach($cliente as $client)
          <option value="{{$client->id}}">{{{$client->nombre}}} </option>

        @endforeach
      </select>
      </div>
   </div>
    <div class="form-group">
      <div class="col-sm-8">
     <label for="">Fecha Inicial</label>
     <input type="date" class="form-control" name="fechaini" value="<?php echo date("Y-m-d");?>" v-model="fecha_ini" required>
     </div>
   </div>
   <div class="form-group">
     <div class="col-sm-8">
    <label for="">Fecha Final</label>
    <input type="date" class="form-control" name="fechafinal" value="<?php echo date("Y-m-d");?>" v-model="fecha_final" required>
    </div>
  </div>
  <input type="submit" class="btn btn-primary" value="Ver" >
  </form>

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
          el: '#historial',
          //funcion al crear el objet
          created: function() {
              this.mostrar();
          },
          data:{
              bitacora:[],
              fecha_ini:'',
              fecha_final:'',
              idcliente:'',
              mensaje:'',
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

      }});
  </script>

@endsection
