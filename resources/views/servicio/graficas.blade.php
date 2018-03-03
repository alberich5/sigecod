@extends('layouts.app')

@section('content')
  <div class="container" id="articulos">
 <h1>Estas dentro de las graficas</h1>
 <button type="button" name="button" v-on:click="mos()" class="btn btn-success">Entradas Canceladas</button><br>
  <button type="button" name="button" v-on:click="mosActivas()" class="btn btn-success">Entradas Activas</button><br>
  <div class="col-sm-4">
    <label for="buscar">SELECIONA CLIENTE:</label>
    <select name="unidad" class="form-control" v-model="clienteSelecionado">
      <option v-for="cli in clients" v-bind:value="cli.id" class="lista" v-on:click="omar()">
        @{{ cli.nombre}}
      </option>
    </select>
  </div>
 <?php

 function conectarse(){
     $servidor = "localhost";
     $usuario = "postgres";
     $password ="jarvis";
     $bd ="servicio";

     $conectar = new mysqli($servidor,$usuario,$password,$bd);
     return $conectar;
 }
 $conexion = conectarse();

?>
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
              this.clientes();
          },
          data:{
              cancelados:[],
              clients:[],
              clientes:[],
              clienteSelecionado:'',
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
                          categories: [

                             <?php
                                  $consulta="SELECT * FROM entrada where status = 'cancelado'";

                                  $ejecutar  = $conexion->query(utf8_encode($consulta));

                                  while ($registros = mysqli_fetch_array($ejecutar))
                                  {
                                  ?>
                                      '<?php echo $registros[4]; ?>',
                                  <?php
                                  }
                              ?>

                          ],
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
                						valueSuffix: ' productos'
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
                            data: [

                                <?php
                                    $consulta="SELECT * FROM entrada where status = 'cancelado'";
                                    $ejecutar  = $conexion->query(utf8_encode($consulta));
                                    while ($registros = mysqli_fetch_array($ejecutar))
                                    {
                                    ?>
                                        <?php echo $registros[8]; ?>,
                                    <?php
                                    }
                                ?>

                            ]
                				}]
                		});
                });
              },
              articuloscancelados:function(){
                var urlStatus = '/cargarcancelados';
                axios.get(urlStatus).then(response => {
                this.cancelados = response.data
              });
              var urlStatus = '/cargarclientes';
              axios.get(urlStatus).then(response => {
              this.clients = response.data
            });
              },
              clientes:function(){
                var urlStatus = '/cargarclientes';
                axios.get(urlStatus).then(response => {
                this.unidad = response.data
              });
              },
              omar:function(){
                switch (this.clienteSelecionado) {
                  case 1:
                  $(function () {
                      $('#container').highcharts({
                          chart: {
                              type: 'bar'
                          },
                          title: {
                              text: 'salidas por Cliente'
                          },
                          subtitle: {
                              text: ''
                          },
                          xAxis: {
                              categories: [

                                 <?php
                                      $consulta="SELECT * FROM cliente WHERE id=1";

                                      $ejecutar  = $conexion->query(utf8_encode($consulta));

                                      while ($registros = mysqli_fetch_array($ejecutar))
                                      {
                                      ?>
                                          '<?php echo $registros[2]; ?>',
                                      <?php
                                      }
                                  ?>

                              ],
                              title: {
                                  text: null
                              }
                          },
                          yAxis: {
                              min: 0,
                              title: {
                                  text: 'Cantidad',
                                  align: 'high'
                              },
                              labels: {
                                  overflow: 'justify'
                              }
                          },
                          tooltip: {
                              valueSuffix: ' articulos'
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
                              data: [

                                  <?php
                                      $consulta="SELECT count(*) FROM salida WHERE id_cliente=1";
                                      $ejecutar  = $conexion->query(utf8_encode($consulta));
                                      while ($registros = mysqli_fetch_array($ejecutar))
                                      {
                                      ?>
                                          <?php echo $registros[0]; ?>,
                                      <?php
                                      }
                                  ?>

                              ]
                          }]
                      });
                  });
                    break;
                    case 2:
                    $(function () {
                        $('#container').highcharts({
                            chart: {
                                type: 'bar'
                            },
                            title: {
                                text: 'salidas por Cliente'
                            },
                            subtitle: {
                                text: ''
                            },
                            xAxis: {
                                categories: [

                                   <?php
                                        $consulta="SELECT * FROM cliente WHERE id=2";

                                        $ejecutar  = $conexion->query(utf8_encode($consulta));

                                        while ($registros = mysqli_fetch_array($ejecutar))
                                        {
                                        ?>
                                            '<?php echo $registros[2]; ?>',
                                        <?php
                                        }
                                    ?>

                                ],
                                title: {
                                    text: null
                                }
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Cantidad',
                                    align: 'high'
                                },
                                labels: {
                                    overflow: 'justify'
                                }
                            },
                            tooltip: {
                                valueSuffix: ' articulos'
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
                                data: [

                                    <?php
                                        $consulta="SELECT count(*) FROM salida WHERE id_cliente=2";
                                        $ejecutar  = $conexion->query(utf8_encode($consulta));
                                        while ($registros = mysqli_fetch_array($ejecutar))
                                        {
                                        ?>
                                            <?php echo $registros[0]; ?>,
                                        <?php
                                        }
                                    ?>

                                ]
                            }]
                        });
                    });
                    break;
                    case 3:
                    $(function () {
                        $('#container').highcharts({
                            chart: {
                                type: 'bar'
                            },
                            title: {
                                text: 'salidas por Cliente'
                            },
                            subtitle: {
                                text: ''
                            },
                            xAxis: {
                                categories: [

                                   <?php
                                        $consulta="SELECT * FROM cliente WHERE id=3";

                                        $ejecutar  = $conexion->query(utf8_encode($consulta));

                                        while ($registros = mysqli_fetch_array($ejecutar))
                                        {
                                        ?>
                                            '<?php echo $registros[2]; ?>',
                                        <?php
                                        }
                                    ?>

                                ],
                                title: {
                                    text: null
                                }
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Cantidad',
                                    align: 'high'
                                },
                                labels: {
                                    overflow: 'justify'
                                }
                            },
                            tooltip: {
                                valueSuffix: ' articulos'
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
                                data: [

                                    <?php
                                        $consulta="SELECT count(*) FROM salida WHERE id_cliente=3";
                                        $ejecutar  = $conexion->query(utf8_encode($consulta));
                                        while ($registros = mysqli_fetch_array($ejecutar))
                                        {
                                        ?>
                                            <?php echo $registros[0]; ?>,
                                        <?php
                                        }
                                    ?>

                                ]
                            }]
                        });
                    });
                    break;
                    case 4:
                    break;
                    case 5:
                    break;
                    case 6:
                    break;
                    case 7:
                    break;
                    case 8:
                    break;
                    case 9:
                    break;
                  default:

                }
              },
              mosActivas:function(){
                $(function () {
                		$('#container').highcharts({
                				chart: {
                						type: 'bar'
                				},
                				title: {
                						text: 'Productos Activos'
                				},
                				subtitle: {
                						text: ''
                				},
                				xAxis: {
                          categories: [

                             <?php
                                  $consulta="SELECT * FROM entrada where status = 'activo'";

                                  $ejecutar  = $conexion->query(utf8_encode($consulta));

                                  while ($registros = mysqli_fetch_array($ejecutar))
                                  {
                                  ?>
                                      '<?php echo $registros[4]; ?>',
                                  <?php
                                  }
                              ?>

                          ],
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
                						valueSuffix: ' productos'
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
                            data: [

                                <?php
                                    $consulta="SELECT * FROM entrada where status = 'activo'";
                                    $ejecutar  = $conexion->query(utf8_encode($consulta));
                                    while ($registros = mysqli_fetch_array($ejecutar))
                                    {
                                    ?>
                                        <?php echo $registros[8]; ?>,
                                    <?php
                                    }
                                ?>

                            ]
                				}]
                		});
                });
              },
      }});
  </script>

@endsection
