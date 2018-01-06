@extends('layouts.app')

@section('content')
<div id="filtro">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><center><h4>Filtro</h4></center></div>
                    <div class="panel-body">
	                   <div class="form-group">
	                    <div class="col-sm-9">
	                      <label for="status">Status:</label>
	                      <select name="status" class="form-control">
	                        <option value="pendiente">Pendiente</option>
	                          <option value="atendida">Atendida</option>
	                      </select>
	                    </div>
	                  </div>
					
	                    <div class="col-sm-3">
	                     <button class="btn btn-primary">Mostrar</button>
	                    </div>
	                  

	               </div>
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
            el: '#filtro',
            //funcion al crear el objet
            data:{
                errors:[],
                usuarios:[],
                fecha:'',
                searchUsuario:{'username':'','nombre':'','paterno':'','materno':''},
                    },
            methods:{
               
                mostrarCancelar:function(){
                    toastr.success('Eliminado');
                },
        }});
    </script>
@endsection
