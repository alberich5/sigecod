<div class="modal fade" id="modalmostrar">
	<div class="modal-dialog" id="mdialTamanio">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
        <center><h4>Agregar Nuevos Elementos Policiales con fecha <?php echo  date('d') . ' del ' . date('m') . ' de ' . date('Y');?></h4></center>
			</div>
			<div class="modal-body">
        <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Fotografia</th>
            <th scope="col">nombre</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Apellido Materno</th>
						<th scope="col">RFC</th>
						<th scope="col">Genero</th>
						<th scope="col">Domicilio</th>
						<th scope="col">Fecha de Naciemiento</th>
						<th scope="col">Edad</th>
          </tr>
        </thead>
        <tbody>
          <tr  v-for="fil in filtro">
            <th scope="row">@{{ fil.id_elemento_policial }}</th>
						<td><img src="{{ asset('img/pruebafoto.jpg') }}" width="80px"></td>
						<td>@{{ fil.nombre }}</td>
            <td>@{{ fil.apellido_paterno }}</td>
            <td>@{{ fil.apellido_materno }}</td>
            <td>@{{ fil.rfc }}</td>
            <td>@{{ fil.genero }}</td>
						<td>@{{ fil.calle }}</td>
						<td>@{{ fil.fecha_nacimiento }}</td>
          </tr>
        </tbody>
      </table>

			</div>
			<div class="modal-footer">
				<div class="col-xs-7">
		        	<pre>@{{$data}}</pre>
		    	</div>
			</div>
		</div>
	</div>
</div>
