@extends('layouts.app')

@section('content')
    <div class="container">
      <center><h1>Bienvenido al Sistema de Servicios Generales</h1></center>
    </div>
@endsection

@section('js')
  <script type="text/javascript">
    var vm = new Vue({
            //id asignado al div en el que funcionara vue
            el: '#app',
            //funcion al crear el objet
            created: function() {
              this.mostrarStatu();
            },
            data:{
                errors:[],
                status:[],
                fecha:'',
                searchUsuario:{'username':'','nombre':'','paterno':'','materno':''},
                    },
            methods:{
                mostrarAlert:function(){
                  swal(
                'Listo',
                'Se a guardado la queja',
                'success'
              );
                },
                mostrarCancelar:function(){
                    toastr.success('Eliminado');
                },
                mostrarStatu:function(){
                    var urlStatus = 'status';
                    axios.get(urlStatus).then(response => {
                    this.status = response.data
                  });
                },
        }});
    </script>
@endsection
