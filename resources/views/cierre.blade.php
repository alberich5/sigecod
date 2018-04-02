<form method="POST" v-on:submit.prevent="Actualizar">
<div class="modal fade" id="create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
				<center><h4>Cerrar</h4></center>
			</div>
			<div class="modal-body">

        <div class="form-group">
            <div class="col-sm-4">
              Nuevo Año:
                <select v-model="anio" class="form-control" required>
                  <option v-for="a in anios" v-bind:value="a.nombre" class="lista">
                    @{{ a.nombre}}
                  </option>
                </select>
            </div>
        </div>

			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="Guardar" v-on:click="guardarDB">
			</div>
		</div>
	</div>
</div>
</form>
