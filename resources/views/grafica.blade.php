@extends('layouts.app')

@section('content')
    <div class="container" id="salida">

      <div class="descargas">



      <form action="export-users" class="form-horizontal" method="get">
        <center><h3>Reportes</h3></center>
        <input type="submit" class="btn btn-primary" value="Usuarios Registrados" >
    </form>
    <br><br>
    <form action="export-cancelado" class="form-horizontal" method="get">

      <input type="submit" class="btn btn-primary" value="Entradas Canceladas" >
  </form>
  <br><br>
    <form action="export-entradas" class="form-horizontal" method="get">
    <div class="form-group">
        <div class="col-sm-6">
          <label for="fecha">Entradas del Dia:</label>
            <input type="date" class="form-control" name="fecha" value="<?php echo date("Y-m-d");?>" >
            <input type="submit" class="btn btn-primary" value="Entradas del Dia" >
        </div>

    </div>
    </form>
    <br>
    <form action="export-salidas" class="form-horizontal" method="get">
    <div class="form-group">
        <div class="col-sm-6">
          <label for="fecha">Salidas del Dia:</label>
            <input type="date" class="form-control" name="fecha" value="<?php echo date("Y-m-d");?>" >
            <input type="submit" class="btn btn-primary" value="salidas del Dia" >
        </div>

    </div>
    </form>

    <br>
    <form action="export-productos" class="form-horizontal" method="get">
    <div class="form-group">
        <div class="col-sm-6">
          <label for="fecha">Productos en 0:</label><br>
            <input type="submit" class="btn btn-primary" value="Productos en Cero" >
        </div>

    </div>
    </form>

    <br>
    <form action="export-mensual" class="form-horizontal" method="get">
    <div class="form-group">
        <div class="col-sm-6">
          <label for="fecha">Reporte Mensual:</label>
            <select class="form-control" name="mes">
              <option value="1">Enero</option>
              <option value="2">Febrero</option>
              <option value="3">Marzo</option>
              <option value="4">Abril</option>
              <option value="5">Mayo</option>
              <option value="6">Junio</option>
              <option value="7">Julio</option>
              <option value="8">Agosto</option>
              <option value="9">Septiembre</option>
              <option value="10">Octubre</option>
              <option value="11">Noviembre</option>
              <option value="12">Diciembre</option>
            </select><br>
            <input type="submit" class="btn btn-primary" value="Reporte Mensual" >
        </div>

    </div>
    </form>
</div>
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
