<form method="POST" v-on:submit.prevent="crearvalidacion">
<div class="modal fade" id="create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
				<h4>Motivo de Reactivacion</h4>
			</div>
			<div class="modal-body">
				<label for="keep">Motivo</label>
				<input type="text"  class="form-control" v-model="motivo">
        <label for="keep">Contraseña del Admin</label>
				<input type="password"  class="form-control" v-model="contra">
				<span v-for="error in errors" class="text-danger">@{{ error }}</span>
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="Guardar">
			</div>
		</div>
	</div>
</div>
</form>
