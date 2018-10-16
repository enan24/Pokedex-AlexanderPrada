<?php
  require_once('overall/head.php');
  require_once('class/TipoModel.php');

  $tipo = new TipoModel();
  $rows = $tipo->getContenidoDeLaTabla();

  echo'
		<div class="container mt-4">
			<div class="row justify-content-center">
				<div class="col-xs-12 col-md-6 ">
				  <div class="card p-4">
				  	<h2 class="text-center text-success">Agregar un nuevo Pókemon</h2>
					<form action="funcion-alta.php" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="imgurl">Imagen</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="fileImagen" id="fileImagen" aria-describedby="inputGroupFileAddon01" required>
								<label class="custom-file-label" for="fileImagen">Elija Imágen</label>
							</div>
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" name="nombre" placeholder="nombre" required>
						</div>
						<div class="form-group">
							<label for="tipo">Tipo de Pokemon</label>
							<select class="form-control" name="tipo" id="tipo">
							';
							foreach($rows as $row){
								echo '<option>'.$row->getDescripcion().'</option>';
							}
							echo '</select>
						  </div>
						<input type="submit" value="Agregar" class="btn btn-md btn-primary">
						<a class="btn bg-warning text-white" href="administracion.php">Cancelar</a>
					</form>
				  </div>
				</div>
			</div>
		</div>
	';
  require_once('overall/footer.php');