@extends('layouts.app')

@section('content')
    <div class="container" id="salida">
        <h5>Aqui van las graficas</h5>
        <button v-on:click="salida()">Descargar salidas del dia</button>
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
                buscar:'',
                    },
            methods:{
                salida:function(){
                  swal("Agregado Correctamente", "Se agrego bien", "success");
                },
        }});
    </script>
@endsection
