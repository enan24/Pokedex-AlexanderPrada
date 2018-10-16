<?php

define('urlPokemons',"src/images/pokemones/");
 
include('overall/head.php');
	if(!isset($_FILES['fileImagen']) || !isset($_POST['nombre']) || !isset($_POST['tipo']) ){	
		echo '
		<div class="row justify-content-center">
			<div class="col-xs-12 col-sm-6">
				<div class="container pt-4">
					<div class="alert alert-dismissible alert-warning">
						<p class="mb-0">Se produjo un error al intentar guardar el pokemon, vuelva a intentarlo!.</p>
					</div>
				</div>
			</div>
		</div>
		';
	}else{
		 require_once('class/PokemonModel.php');
				
		$imagen = urlPokemons. $_FILES['fileImagen']['name'];
		$nombre = strtolower($_POST['nombre']) ;
		$tipo = $_POST['tipo'] ;

		$pokemon = new PokemonModel();
		$tabla = $pokemon->getContenidoDeLaTabla();
		require_once('overall/funciones.php');

		if(verificarPokemon($tabla,$nombre)){
			echo '
			<div class="container pt-4">
				<div class="row justify-content-center">
					<div class="col-xs-12 col-sm-6">
						<div class="alert alert-dismissible alert-warning">
							<h4 class="alert-heading">El pokemon ya se encuentra guardado</h4>
							<p class="mb-0">Ir al <a href="administracion.php" class="alert-link">inicio</a>.</p>
						</div>
					</div>
				</div>
			</div>
			';
		}else{
			$pokemon->agregarRegistro($imagen,$nombre,$tipo);

			if(file_exists($imagen)) unlink($imagen);
            
			echo '
			<div class="row justify-content-center">
				<div class="col-xs-12 col-sm-6">
					<div class="container pt-4">
						<div class="alert alert-dismissible alert-success">
						<p class="mb-0">Pokemon agregado, <a href="administracion.php" class="alert-link">volver al menu</a>.</p>
						</div>
					</div>
				</div>
			</div>
			';
		}
	}

	include('overall/footer.php');