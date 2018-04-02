@extends('layouts.app')

@section('content')
@if(Auth::user()->rol == 'admin')
  <div class="container" id="app">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><center>Cierre de Folios</center></div>
                <div class="panel-body">
                  <h3>ESTA A PUNTO DE REALIZAR EL CIERRE ANUAL DE FOLIOS.</h3>

                  Para comenzar con el foliado del siguiente año presione el boton

                  en la parte inferior a continuacion
                    <br><br>
                    <center><button type="" class="btn btn-primary btn-lg" v-on:click="finalizar">Finalizar</button></center>
                </div>
            </div>
        </div>
    </div>
    	@include('cierre')
     <!----<div class="row">
       <div class="col-xs-12">
         <pre>@{{$data}}</pre>
       </div>
     </div>-->
  </div>

@endif
@endsection

@section('js')
<script type="text/javascript">
  var vm = new Vue({
          //id asignado al div en el que funcionara vue
          el: '#app',
          //funcion al crear el objet
          created: function() {
            this.personals();
          },
          data:{
              anios:[{'nombre':'2018'},{'nombre':'2019'},{'nombre':'2020'}],
              personal:[],
              anio:'',
              recibe:'',
              respuesta:'',
              totalCargado:[],
                  },
          methods:{
              finalizar:function(){
                  $('#create').modal('show');
              },

              guardarDB:function(){
                if(!this.anio){
                  swal("No as Seleccionado Año", "", "error");
                }else{
                  var urlStatus = '/guardarAnio?anio='+this.anio;
                  axios.get(urlStatus).then(response => {
                  this.respuesta = response.data
                });
                $('#create').modal('hide');
                swal("Se Actualizo el Año", "", "success");
                }

              },
      }});
  </script>

@endsection
