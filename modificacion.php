<?php
 include('overall/head.php');
 require_once('class/TipoModel.php');

 $tipo = new TipoModel();
 $rows = $tipo->getContenidoDeLaTabla();
	echo'
		<div class="container mt-4">
			<div class="row justify-content-center">
				<div class="col-xs-12 col-md-6 ">
				  <div class="card p-4">
				  	<h2 class="text-center">Modificación de Pokemon</h2>
					<form action="funcion-modificacion.php" method="POST" enctype="multipart/form-data">
						<div class="form-group d-flex align-items-center">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="fileImagen" id="fileImagen" aria-describedby="inputGroupFileAddon01">
								<input type="hidden" name="fileImagenActual" value="'.$_GET['imgurl'].'">
								<label class="custom-file-label" for="fileImagen">Elija Otra Imágen</label>
							</div>
							<img src="'.$_GET['imgurl'].'" width="125">			
						</div>
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" name="nombre" placeholder="'.$_GET['nombre'].'">
							<input type="hidden" class="form-control" name="nombreActual" value="'.$_GET['nombre'].'">	
						</div>
						<div class="form-group">
							<label for="tipo">Tipo de Pokemon</label>
							<select class="form-control" name="tipo" id="tipo">
								<option >'.$_GET["tipo"].'</option>';
								foreach($rows as $row){
									echo '<option>'.$row->getDescripcion().'</option>';
								}
							echo '</select>
							<input type="hidden" name="tipoActual" value="'.$_GET['tipo'].'">
						</div>
						<input type="submit" value="Modificar" class="btn btn-primary">
						<a class="btn bg-warning text-white" href="administracion.php">Cancelar</a>
					</form>
				  </div>
				</div>
			</div>
		</div>
	';
 include('overall/footer.php');