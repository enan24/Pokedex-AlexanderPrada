<?php

if(!isset($_GET['imgurl']) && !isset($_GET['nombre']) && !isset($_GET['tipo']) ){
	header("location:index.php");
}else{
	include('overall/head.php');
echo'
	<div class="container">
		<div class= "row justify-content-center mt-4">
		<div class="alert alert-dismissible alert-warning p-2">
			<h4 class="alert-heading">Precaución!</h4>
			<p class="mb-0">Realmente quiere eliminar el pokemón?
			
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">ImgUrl</th>
						<th scope="col">Nombre</th>
						<th scope="col">Tipo</th>
				</thead>
				<tbody>
					<tr class="table-active">
						<td class="align-middle"><img src="'.$_GET["imgurl"].'" width="120"></td>
						<td class="align-middle">'.$_GET['nombre'].'</td>
						<td class="align-middle">'.$_GET['tipo'].'</td>
					</tr>
				</tbody>
			</table>
			
			<a href="funcion-baja.php?nombre='.$_GET['nombre'].'&imgUrl='.$_GET['imgurl'].'" class="alert-link btn bg-success text-white">Aceptar</a>
			<a href="administracion.php" class="alert-link btn bg-warning text-white">Cancelar</a>
		</div>
		</div> 
	</div>
	';
	include('overall/footer.php');
}

