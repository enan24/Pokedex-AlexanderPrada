<?php 
	include_once('overall/head.php');
	include_once('overall/header.php');
	include_once('class/PokemonModel.php'); 

	$pokemones = new PokemonModel();
	$pokemonBuscado = $pokemones->buscarPokemon(strtolower($_GET['nombrePokemon']));
?>

<h1 class="text-center mb-5" style="margin-top:100px">Información del pokemón</h1>

<?php
echo '<div class="container">
		<div class="row justify-content-center">
			<div class="col-xs-12 col-md-8">
			    
	   			<div class="table-responsive">
		  			 <table class="table lighten-3 text-center">
			  			 <thead class="unique-color text-white">
				   			<tr>
								<th>Imagen</th>
								<th class="th-lg">Nombre</th>
								<th class="th-lg">Tipo</th>
							</tr>
						</thead>
						<tbody>
						';
	if(!isset($_GET['nombrePokemon']) || empty($_GET['nombrePokemon'])){
		echo '<div class="alert alert-dismissible alert-warning">
				<p class="mb-0">No ingreso un nombre, mostrando todos. Busque nuevamente el pokemon deseado.</p>
			</div>';
		$tabla = $pokemones->getContenidoDeLaTabla();
			foreach($tabla as $row){
				echo '<tr>
						<th scope="row"><img class="img-fluid w-50" src="'.$row->getImgUrl().'" alt=""></th>
						<td class="align-middle deep-red-text"><p class="font-weight-bold">'.strtoupper($row->getNombre()).'</p></td>
						<td class="align-middle deep-red-text"><p class="font-weight-bold">'.strtoupper($row->getTipo()).'</p></td>
					  <tr>';
			}
		}else{
			if($pokemonBuscado != null){
				echo '<tr>
							<th scope="row"><img class="img-fluid w-50" src="'.$pokemonBuscado->getImgUrl().'" alt=""></th>
							<td class="align-middle deep-red-text"><p class="font-weight-bold">'.strtoupper($pokemonBuscado->getNombre()).'</p></td>
							<td class="align-middle deep-red-text"><p class="font-weight-bold">'.strtoupper($pokemonBuscado->getTipo()).'</p></td>
						<tr>';
			}else{
				echo '<div class="alert alert-dismissible alert-danger">
							<p class="mb-0">El pokemón no se encuentra en nuestros datos, vuelva a intentarlo.</p>
						</div>';
			}
				echo '</tbody>
					</table>';
		}	
			echo'</div>
			</div>
		</div>	
	</div>';
	
	include('overall/login.php');
	include('overall/footer.php');
?>


