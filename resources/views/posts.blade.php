@extends('layouts.app')
@section('css')
  <link href="{{ asset('css/slider.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container" id="app">
    <form  class="form-horizontal" method="get">
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
          <br><br>
          <div class="panel panel-info">
            <div class="panel-heading">DATOS DE VOLANTE</div>
            <div class="panel-body">
              <div class="form-group">
                  <div class="col-sm-10">
                      <input type="hidden" class="form-control" name="id_usuario" value="{{ Auth::user()->id }}">
                      <input type="hidden" class="form-control" name="nombre_usuario" value="{{ Auth::user()->name }}">
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-8">
                    <label for="">FOLIO:{{ $numero}}/{{ $anio}}</label>
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-sm-4">
                    Tipo:
                      <select v-model="tipo" class="form-control" >
                        <option v-for="ti in tipos" v-bind:value="ti.nombre" class="lista">
                          @{{ ti.nombre}}
                        </option>
                      </select>
                  </div>
                  <div class="col-sm-4">
                    Referencia:
                      <input type="text" class="form-control" v-model="referencia" placeholder="Referencia" style="text-transform: uppercase;" >
                  </div>
                   <div class="col-sm-4">
                    Fecha Repcion:
                      <input type="date" class="form-control" v-model="fecha_recepcion" value="<?php echo date("Y-m-d");?>" >
                  </div>
              </div>


              <div class="form-group">
                  <div class="col-sm-6">
                    Procedencias:
                      <select v-model="procedencia" class="form-control" >
                        <option v-for="pro in procedencias" v-bind:value="pro.nombre" class="lista">
                          @{{ pro.nombre}}
                        </option>
                      </select>

                  </div>
                  <div class="col-sm-4">
                    Otro:
                      <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
                  </div>

                  <div class="col-sm-4" >
                    <p v-show="checkedNames">
                       <input type="text" class="form-control" v-model="otro1"   style="text-transform: uppercase;" ></p>
                  </div>

              </div>

              <div class="form-group">
                  <div class="col-sm-12">
                    Asunto:
                        <textarea class="form-control"   v-model="asunto" cols="50" rows="5" style="text-transform: uppercase;"  ></textarea>
                  </div>
              </div>
            </div>
          </div>


            <br><br>
            <div class="panel panel-info">
              <div class="panel-heading">DATOS DE ATENCION</div>
              <div class="panel-body">
                  <!---AQUI VA LA INFORMACION PARA LA SEGUNDA PARTE DE FORMULARIO-->
                  <div class="form-group">
                      <div class="col-sm-6">
                        Area turnada:
                          <select v-model="area_turnada" class="form-control">
                            <option v-for="a in area" v-bind:value="a.nombre" class="lista">
                              @{{ a.nombre}}
                            </option>
                          </select>
                      </div>
                      <div class="col-sm-4">
                        Otro:
                          <input type="checkbox" id="jack" value="Jack" v-model="checkedNames2">
                      </div>
                      <div class="col-sm-4">
                          <p v-show="checkedNames2">
                           <input type="text" class="form-control" v-model="otro2"   style="text-transform: uppercase;" ></p>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-sm-4">
                        Fecha de Entrega:
                          <input type="date" class="form-control" v-model="fecha_entrega" value="<?php echo date("Y-m-d");?>" >
                      </div>
                       <div class="col-sm-4">
                        Fecha Limite:
                          <input type="date" class="form-control" v-model="fecha_limite" value="<?php echo date("Y-m-d");?>" >
                      </div>
                      <div class="col-sm-4">
                        Termino:
                          <select v-model="termino" class="form-control">
                            <option v-for="ter in terminos" v-bind:value="ter.nombre" class="lista">
                              @{{ ter.nombre}}
                            </option>
                          </select>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-sm-4">
                        Copias para:
                          <select v-model="copias" class="form-control" id="">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                          </select>
                      </div>
                      <div class="col-sm-7">
                           <input type="text" class="form-control" v-model="para"   style="text-transform: uppercase;" >
                      </div>
                  </div>

                   <div class="form-group">
                      <div class="col-sm-10">
                        Intrucciones:
                            <textarea class="form-control"   v-model="instrucciones" cols="50" rows="5" style="text-transform: uppercase;"  ></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-sm-4">
                         Turna:
                          <select v-model="turna" class="form-control" required>
                            <option v-for="per in personal" v-bind:value="per.id " class="lista">
                              @{{ per.nombre}} @{{ per.apellido_paterno}} @{{ per.apellido_materno}}
                            </option>
                          </select>
                      </div>
                      <div class="col-sm-7">
                        Recibe:
                           <input type="text" class="form-control" v-model="recibe"   style="text-transform: uppercase;" >
                      </div>
                  </div>
              </div>
          </div>


        <input type="submit" class="btn btn-primary" value="Guardar" v-on:click="agregar()">

        </div>



    </form>
    </div>

    <!--<div class="row">
       <div class="col-xs-12">
         <pre>@{{$data}}</pre>
       </div>
     </div>-->

  </div>
@endsection

@section('js')
</script>
  <script type="text/javascript">
    var vm = new Vue({
            //id asignado al div en el que funcionara vue
            el: '#app',
            //funcion al crear el objet
            created: function() {
              this.personals();
            },
            data:{
                errors:[],
                checkedNames: '',
                checkedNames2: '',
                personal:[],
                idusuario:'',
                terminos:[{'nombre':'TERMINO'},{'nombre':'URGENTE'},{'nombre':'PARA CONOCIMIENTO'}],
                area:[{'nombre':'UNIDAD ADMINISTRATIVA'},{'nombre':'RECURSOS HUMANOS'},{'nombre':'OPERACIÓN Y CONTROL'},{'nombre':'RECLUTAMIENTO'},{'nombre':'AUDITORIA'},{'nombre':'SISTEMAS'},{'nombre':'COMUNICACIÓN SOCIAL'},{'nombre':'COMERCIALIZACIÓN'},{'nombre':'COBRANZAS'},{'nombre':'RECURSOS FINANCIEROS'},{'nombre':'JURÍDICO'},{'nombre':'SERVICIOS GENERALES'},{'nombre':'COORDINACIÓN OPERATIVA'},{'nombre':'ARMAMENTO'},{'nombre':'DELEGACION DE VALLES CENTRALES'}],
                tipos:[{'nombre':'OFICIO'},{'nombre':'ATENTA NOTA'},{'nombre':'ESCRITO'},{'nombre':'TARJETA INFORMATIVA'},{'nombre':'VOLANTE'}],
               procedencias:[{'nombre':'DIRECCIÓN DE ASUNTOS INTERNOS'}
               ,{'nombre':'DIRECCIÓN GENERAL DE ASUNTOS JURIDICOS'}
               ,{'nombre':'OFICIALÍA MAYOR'}
               ,{'nombre':'LICENCIA OFICIAL COLECTIVA'}
               ,{'nombre':'FISCALÍA GENERAL DEL ESTADO'}
               ,{'nombre':'PROCURADURÍA GENERAL DE LA REPLUBLICA'}
               ,{'nombre':'JUZGADO DE DISTRITO'}
               ,{'nombre':'JUZGADO CIVIL'}
               ,{'nombre':'JUZGADO PENAL'}
               ,{'nombre':'SECRETARIA DE ADMINISTRACIÓN'}
               ,{'nombre':'SECRETARIA DE LA CONTRALORÍA Y TRANSPARENCIA GUBERNAMENTAL'}
               ,{'nombre':'SECRETARIA DE SEGURIDAD PÚBLICA'}
               ,{'nombre':'SECRETARIA DE FINANZAS '}
               ,{'nombre':'SECRETARÍA DE ECONOMÍA'}
               ,{'nombre':'CENTRO DE CONTROL, COMANDO Y COMUNICACIÓN '}
               ,{'nombre':'CENTRO ESTATAL DE EVALUACION Y CONTROL DE CONFIANZA '}
               ,{'nombre':'CONSEJO ESTATAL DE DESARROLLO POLICIAL '}
               ,{'nombre':'TRIBUNAL DE JUSTICIA ADMINISTRATIVA DEL ESTADO DE OAXACA'}
               ,{'nombre':'POLICÍA VIAL ESTATAL '}
               ],
                tipo:'',
                referencia:'',
                fecha_recepcion:'',
                procedencia:'',
                otro1:'',
                asunto:'',
                area_turnada:'',
                otro2:'',
                fecha_entrega:'',
                fecha_limite:'',
                termino:'',
                copias:'',
                para:'',
                instrucciones:'',
                turna:'',
                turna2:'',
                recibe:'',
                respuesta:'',
                totalCargado:[],
                    },
            methods:{
                personals:function(){
                    var urlPersonal = '/traerpersonal';
                    axios.get(urlPersonal).then(response => {
                    this.personal = response.data
                  });
                },
                pnuevo:function(){
                    var urlPersonal = '/traerusuario';
                    axios.get(urlPersonal).then(response => {
                    this.idusuario = response.data
                  });
                },
                guardar:function(){
                    alert("entro");
                },
                limpiar:function(){
                  this.tipo='';
                  this.referencia='';
                  this.fecha_recepcion='';
                  this.procedencia='';
                  this.otro1='';
                  this.asunto='';
                  this.area_turnada='';
                  this.otro2='';
                  this.fecha_entrega='';
                  this.fecha_limite='';
                  this.termino='';
                  this.copias='';
                  this.para='';
                  this.instrucciones='';
                  this.turna='';
                  this.turna2='';
                  this.recibe='';
                  this.totalCargado=[];
                  this.checkedNames='';
                  this.checkedNames2='';
                },
                agregar:function(){
                  if(!this.fecha_recepcion){
                      swal("FALTO SELECCIONAR", "FECHA RECEPCION", "error");
                  }else{
                    if(!this.tipo){
                      swal("FALTO SELECCIONAR", "TIPO", "error");
                    }else{
                        if(!this.referencia){
                          swal("FALTO AGREGAR", "REFERENCIA", "error");
                        }else{
                          if(!this.asunto){
                              swal("FALTO AGREGAR", "ASUNTO", "error");
                          }else{
                            if(!this.fecha_entrega){
                              swal("FALTO AGREGAR", "FECHA ENTREGA", "error");
                            }else{
                              if(!this.fecha_limite){
                                  swal("FALTO AGREGAR", "FECHA LIMITE", "error");
                              }else{
                                if(!this.termino){
                                  swal("FALTO SELECCIONAR", "TERMINO", "error");
                                }else{
                                  if(!this.copias){
                                    swal("FALTO AGREGAR", "COPIAS", "error");
                                  }else{
                                    if(!this.instrucciones){
                                      swal("FALTO AGREGAR", "INSTRUCCIONES", "error");
                                    }else{
                                      if(!this.turna){
                                        swal("FALTO SELECCIONAR", "TURNA", "error");
                                      }else{
                                        //Aqui ya se puede mandar
                                        if(this.turna == 1){
                                          this.turna2='EDGAR JAIME HERNÁNDEZ ZÁRATE';
                                        }
                                        if(this.turna == 2){
                                          this.turna2='MAYRA EDITH CORTEZ REYES';
                                        }
                                        if(this.turna == 4){
                                          this.turna2='SHAARON ANDREA LÓPEZ ZÁRATE';
                                        }

                                        if(this.turna == 5){
                                          this.turna2='NADIA BERENICE AGUIRRE HERNANDEZ';
                                        }
                                        if(this.checkedNames=='true'){
                                          this.procedencia='';
                                        }
                                        this.totalCargado.push({
                                          "tipo": this.tipo,
                                          "referencia": this.referencia,
                                          "fecha_recepcion": this.fecha_recepcion,
                                          "procedencia": this.procedencia,
                                          "otro1": this.otro1,
                                          "asunto": this.asunto,
                                          "area_turnada": this.area_turnada,
                                          "otro2": this.otro2,
                                          "fecha_entrega": this.fecha_entrega,
                                          "fecha_limite": this.fecha_limite,
                                          "termino": this.termino,
                                          "copias": this.copias,
                                          "para": this.para,
                                          "instrucciones": this.instrucciones,
                                          "turna": this.turna2,
                                          "recibe": this.recibe
                                        });
                                        this.guardarDB();
                                        this.descargar();
                                        swal("Agregado Correctamente", "Se agrego bien", "success");
                                        this.limpiar();
                                        //this.totalCargado='';
                                      }
                                    }
                                  }
                                }
                              }
                            }
                          }

                        }
                    }
                  }

                },
                descargar: function() {
                   window.open('descargardoc');

                },
                guardarDB:function(){
                  var urlGuardar = 'guardarBD';
                      axios.post(urlGuardar,{
                        variable:this.totalCargado
                      }).then(response => {
                       this.respuesta = response.data
                    });
                },

        }});
    </script>

@endsection
