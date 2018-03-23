@extends('layouts.app')

@section('content')
  <div class="container" id="historial">

  	<div class="form-group">
              <div class="col-sm-10">
                  <input type="hidden" class="form-control" name="id_usuario" value="{{ Auth::user()->id }}">
                  <input type="hidden" class="form-control" name="nombre_usuario" value="{{ Auth::user()->name }}">
              </div>
          </div>


          <div class="form-group">
              <div class="col-sm-4">
                Tipo:
                  <select name="tipo" class="form-control" required>
                    <option value=""></option>}
                    
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
              <div class="col-sm-7">
                Procedencias:
                  <select v-model="procedencia" class="form-control" required>
                    <option v-for="pro in procedencias" v-bind:value="pro.nombre" class="lista">
                      @{{ pro.nombre}}
                    </option>
                  </select>
              </div>
              <div class="col-sm-4">
                Otro:
                   <input type="text" class="form-control" v-model="otro1"   style="text-transform: uppercase;" required>
              </div>
          </div>

          <div class="form-group">
              <div class="col-sm-12">
                Asunto:
                    <textarea class="form-control"   v-model="asunto" cols="50" rows="5" style="text-transform: uppercase;"  required></textarea> 
              </div>
          </div>
            <br><br>
          <div class="form-group">
              <div class="col-sm-7">
                Area turnada:
                  <select v-model="area_turnada" class="form-control">
                    <option v-for="a in area" v-bind:value="a.nombre" class="lista">
                      @{{ a.nombre}}
                    </option>
                  </select>
              </div>
              <div class="col-sm-4">
                Otro:
                   <input type="text" class="form-control" v-model="otro2"   style="text-transform: uppercase;" required>
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
                    <option v-for="per in personal" v-bind:value="per.nombre" class="lista">
                      @{{ per.nombre}} @{{ per.apellido_paterno}} @{{ per.apellido_materno}}
                    </option>
                  </select>
              </div>
              <div class="col-sm-7">
                Recibe:
                   <input type="text" class="form-control" v-model="recibe"   style="text-transform: uppercase;" required>
              </div>
   
  </div>


@endsection