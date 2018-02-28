@extends('layouts.app')

@section('content')
  <div class="container" id="articulos">
 <h1>Estas dentro de las graficas</h1>
 <button type="button" name="button" v-on:click="mos()">mostrar grafica</button>
 <button type="button" name="button" v-on:click="borrar()">exampe</button>
 <div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
<div class="row">
   <div class="col-xs-12">
     <pre>@{{$data}}</pre>
   </div>
 </div>



  </div>


@endsection

@section('js')
<script src="{{ asset('js/grafica/highcharts.js') }}"></script>
<script src="{{ asset('js/grafica/exporting.js') }}"></script>

<script type="text/javascript">
  var vm = new Vue({
          //id asignado al div en el que funcionara vue
          el: '#articulos',
          //funcion al crear el objeto
          created: function() {
              this.articuloscancelados();
              this.borrar();
          },
          data:{
              cancelados:[],
              unidad:[],
              mensaje:'',
              original:'',
              searchUsuario:{'username':'','nombre':'','paterno':'','materno':''},
                  },
          methods:{
              mos:function(){

                $(function () {
                		$('#container').highcharts({
                				chart: {
                						type: 'bar'
                				},
                				title: {
                						text: 'Productos Cancelados'
                				},
                				subtitle: {
                						text: ''
                				},
                				xAxis: {
                						categories: ['hojas1', 'hojas2'],
                						title: {
                								text: null
                						}
                				},
                				yAxis: {
                						min: 0,
                						title: {
                								text: 'Population (millions)',
                								align: 'high'
                						},
                						labels: {
                								overflow: 'justify'
                						}
                				},
                				tooltip: {
                						valueSuffix: ' cuartos'
                				},
                				plotOptions: {
                						bar: {
                								dataLabels: {
                										enabled: true
                								}
                						}
                				},
                				legend: {
                						layout: 'vertical',
                						align: 'right',
                						verticalAlign: 'top',
                						x: -40,
                						y: 80,
                						floating: true,
                						borderWidth: 1,
                						backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                						shadow: true
                				},
                				credits: {
                						enabled: false
                				},
                				series: [{
                						name: 'Año 2018',
                						data: [107, 31]
                				}]
                		});
                });
              },
              articuloscancelados:function(){
                var urlStatus = '/cargarcancelados';
                axios.get(urlStatus).then(response => {
                this.cancelados = response.data
              });
              },
              borrar:function(){
                var cadena = this.cancelados,
                  inicio = 2,
                  fin    = 20,
                  subCadena = cadena.substring(inicio, fin);
                  this.original=subCadena;
              },
      }});
  </script>

@endsection
