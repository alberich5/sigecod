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
                  <select v-model="tipo" class="form-control" required>
                    <option v-for="ti in tipos" v-bind:value="ti.nombre" class="lista">
                      @{{ ti.nombre}}
                    </option>
                  </select>
              </div>
              <div class="col-sm-4">
                Referencia:
                  <input type="text" class="form-control" v-model="referencia" placeholder="Referencia" style="text-transform: uppercase;" required>
              </div>
               <div class="col-sm-4">
                Fecha Repcion:
                  <input type="date" class="form-control" v-model="fecha_recepcion" value="<?php echo date("Y-m-d");?>" >
              </div>
          </div>


          <div class="form-group">
              <div class="col-sm-6">
                Procedencias:
                  <select v-model="procedencia" class="form-control" required>
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
                   <input type="text" class="form-control" v-model="otro1"   style="text-transform: uppercase;" required></p>
              </div>

          </div>

          <div class="form-group">
              <div class="col-sm-12">
                Asunto:
                    <textarea class="form-control"   v-model="asunto" cols="50" rows="5" style="text-transform: uppercase;"  required></textarea>
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
                           <input type="text" class="form-control" v-model="otro2"   style="text-transform: uppercase;" required></p>
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
                           <input type="text" class="form-control" v-model="para"   style="text-transform: uppercase;" required>
                      </div>
                  </div>

                   <div class="form-group">
                      <div class="col-sm-10">
                        Intrucciones:
                            <textarea class="form-control"   v-model="instrucciones" cols="50" rows="5" style="text-transform: uppercase;"  required></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-sm-4">
                         Turna:
                          <select v-model="turna" class="form-control">
                            <option v-for="per in personal" v-bind:value="per.id " class="lista">
                              @{{ per.nombre}} @{{ per.apellido_paterno}} @{{ per.apellido_materno}}
                            </option>
                          </select>
                      </div>
                      <div class="col-sm-7">
                        Recibe:
                           <input type="text" class="form-control" v-model="recibe"   style="text-transform: uppercase;" required>
                      </div>
                  </div>
              </div>
          </div>


        <input type="submit" class="btn btn-primary" value="Guardar" v-on:click.prevent="agregar()">

        </div>



    </form>
    </div>

    <div class="row">
       <div class="col-xs-12">
         <pre>@{{$data}}</pre>
       </div>
     </div>
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
                terminos:[{'nombre':'TERMINO'},{'nombre':'URGENTE'},{'nombre':'PARA CONOCIMIENTO'}],
                area:[{'nombre':'UNIDAD ADMINISTRATIVA'},{'nombre':'RECURSOS HUMANOS'},{'nombre':'OPERACION Y CONTROL'},{'nombre':'RECLUTAMIENTO'},{'nombre':'AUDITORIA'},{'nombre':'SISTEMAS'},{'nombre':'COBRANZAS'},{'nombre':'RECURSOS FINANCIEROS'},{'nombre':'JURIDICO'},{'nombre':'SERVICIOS GENERALES'},{'nombre':'COORDINACION OPERATIVA'},{'nombre':'ARMAMENTO'},{'nombre':'DELEGACION DE VALLES CENTRALES'}],
                tipos:[{'nombre':'OFICIO'},{'nombre':'ATENTA NOTA'},{'nombre':'ESCRITO'},{'nombre':'TARJETA INFORMATIVA'},{'nombre':'VOLANTE'}],
               procedencias:[{'nombre':'DIRECCION GENERAL DE ASUNTOS JURIDICOS'}
               ,{'nombre':'OFICIALIA MAYOR'}
               ,{'nombre':'LICENCIA OFICIAL COLECTIVA'}
               ,{'nombre':'FISCALIA GENERAL DEL ESTADO'}
               ,{'nombre':'PROCURADURIA GENERAL DE LA REPLUBLICA'}
               ,{'nombre':'JUZGADO DE DISTRITO'}
               ,{'nombre':'JUZGADO CIVIL'}
               ,{'nombre':'JUZGADO PENAL'}
               ,{'nombre':'SECRETARIA DE ADMINISTRACION'}
               ,{'nombre':'SECRETARIA DE LA CONTRALORIA Y TRANSPARENCIA GUBERNAMENTAL'}
               ,{'nombre':'SECRETARIA DE SEGURIDAD PUBLICA'}
               ,{'nombre':'SECRETARIA DE FINANZAS '}
               ,{'nombre':'CENTRO DE CONTROL, COMANDO Y COMUNICACION '}
               ,{'nombre':'CENTRO ESTATAL DE EVALUACION Y CONTROL DE CONFIANZA '}
               ,{'nombre':'CONSEJO ESTATAL DE DESARROLLO POLICIAL '}
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
                  this.recibe='';
                  this.totalCargado='';
                },
                agregar:function(){
                  if(!this.fecha_recepcion){
                    alert("Rellena los campos");
                  }else{
                    if(this.turna == 1){
                      this.turna2='EDGAR JAIME HERNÁNDEZ ZÁRATE';
                    }
                    if(this.turna == 2){
                      this.turna2='MAYRA EDITH CORTEZ REYES';
                    }
                    if(this.turna == 3){
                      this.turna2='SHAARON ANDREA LÓPEZ ZÁRATE';
                    }

                    if(this.turna == 4){
                      this.turna2='NADIA BERENICE AGUIRRE HERNANDEZ';
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
                    swal("Agregado Correctamente", "Se agrego bien", "success");
                    this.limpiar();
                    //this.totalCargado='';
                  }

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
