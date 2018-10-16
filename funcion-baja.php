<?php
	if(!isset($_GET['nombre']) || !isset($_GET['imgUrl'])) header('location:index.php');
	else{
		require_once('class/PokemonModel.php');
		$pokemon = new PokemonModel();
		$pokemon->eliminarRegistro('nombre',$_GET['nombre']);
		unlink($_GET['imgUrl']);
		header('location:administracion.php');
	}