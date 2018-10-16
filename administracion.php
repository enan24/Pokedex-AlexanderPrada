<?php
	session_start();

	if(!isset($_COOKIE['session']) && !isset($_SESSION['user'])){
		 	header("location:index.php");
	}

	if(isset($_COOKIE['session']) && !isset($_SESSION['user'])){
		$_SESSION['user'] = $_COOKIE['session'];
	}

	require_once('class/PokemonModel.php');

	$indice = 0;
	if(isset($_GET['indice'])){
		$indice = $_GET['indice'];
	}
	$pokemon = new PokemonModel();
	$rows= $pokemon->getContenidoPaginado($indice);
	$registrosTotales= $pokemon->getFilasDeLaTabla();

	include('overall/head.php');

	$color_header = "unique-color-dark";

	include('overall/header_admin.php');
?>

	
		<h1 class="alert-heading text-center" style="color:#1C2331;margin-top:100px">Registro de Pokemones</h1>

     <div class="container">
	 <a href="alta.php" class="btn-success float-right m-2 pt-2 text-white text-center" style="font-size:1.5em;width:50px;height:50px;border-radius:50%">+</a>
	 	<table class="table table-striped table-responsive-md btn-table text-center">
			<thead class="special-color white-text">
			<tr style="">
				<th>Imagen</th>
				<th>Nombre</th>
				<th>tipo</th>
				<th>Operacion</th>
			</tr>
			</thead>
			<tbody >
			    <?php 
				foreach ($rows as $row) {
					echo '<tr>';
				    echo '<td class="align-middle justify-content-center"><img src="'.$row->getImgUrl().'" width=125></td>';
					echo '<td class="align-middle">'.$row->getNombre().'</td>';
					echo '<td class="align-middle">'.$row->getTipo().'</td>';
					echo '<td class="align-middle">
						<div class="btn-group" role="group">
							<a href="modificacion.php?imgurl='.$row->getImgUrl().'&nombre='.$row->getNombre().'&tipo='.$row->getTipo().'" class="btn text-white btn-primary">Modificar</a>
							<a href="baja.php?imgurl='.$row->getImgUrl().'&nombre='.$row->getNombre().'&tipo='.$row->getTipo().'" class="btn text-white btn-danger">Eliminar</a>
				  		</div></td>';
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
	 </div>	 

	<?php $paginado = 3; ?>

	 <div class="container">
		 <div class="row justify-content-center">
	 		<div class="column-xs-12 column-md-6">
			 <nav aria-label="...">
				<ul class="pagination">
					<li class="page-item <?php echo (($indice-$paginado)<0)?'disabled':'';?>">
						<a class="page-link" href='administracion.php?indice=<?php echo $indice - $paginado ; ?>'>Previous</a>
					</li>
					<?php
					$i = 1;
					$active = "active";
					for($j = 0 ; $j < $registrosTotales ; $j +=$paginado){
						 if($indice == $j ) echo '<li class="page-item active">';
						 else echo '<li class="page-item">';
						  echo '<a class="page-link" href="administracion.php?indice='.$j.'">'.$i.'</a>
						  </li>';
						 $i++;
					}
					?>
					<li class="page-item <?php echo (($indice+$paginado)>=$registrosTotales)?'disabled':'';?>">
						<a class="page-link" href='administracion.php?indice=<?php echo $indice + $paginado ; ?>'>Next</a>
					</li>
				</ul>
			 </nav>		 
			</div>	 
		</div>
	</div>
<?php
	include('overall/footer.php');
?>