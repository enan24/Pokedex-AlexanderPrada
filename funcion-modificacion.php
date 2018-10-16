<?php

 define('urlPokemons',"src/images/pokemones/");
 include('overall/head.php');

 if(isset($_FILES['fileImagen']) && isset($_POST['nombre']) 
	&& isset($_POST['tipo'])  && isset($_POST['nombreActual'])){
	 
	require_once('class/PokemonModel.php');
		 
	$imagen = (isset($_FILES['fileImagen']) && $_FILES['fileImagen']['tmp_name'] != "") ? urlPokemons . $_FILES['fileImagen']['name'] : $_POST['fileImagenActual'];
 	$nombre = (isset($_POST['nombre']) && $_POST['nombre'] != "") ? $_POST['nombre'] : $_POST['nombreActual'];
 	$tipo = $_POST['tipo'];

	$pokemon = new PokemonModel();
	$pokemon->modificarRegistro($imagen,strtolower($nombre),$tipo,$_POST['nombreActual']);

	if($_FILES['fileImagen']['tmp_name'] != ""){
	  unlink($_POST['fileImagenActual']);
	  if(file_exists($imagen)) unlink($imagen);
		 
	   move_uploaded_file($_FILES["fileImagen"]["tmp_name"], $imagen);
	  
	}
	echo '
	<div class="container pt-4">
		<div class="alert alert-dismissible alert-success">
		<p class="mb-0">Se modifico el pokemon, <a href="administracion.php" class="alert-link">voler al inicio</a>.</p>
		</div>
	</div>
	';
	}else{
		
		echo '
		<div class="container pt-4">
		  <div class="alert alert-dismissible alert-warning">
			<h4 class="alert-heading">Warning!</h4>
			<p class="mb-0">No se pudo modificar el pokemon, <a href="iadministracion.php" class="alert-link">vuelva a intentarlo</a>.</p>
		  </div>
		</div>
		';
	}
	include('overall/footer.php');