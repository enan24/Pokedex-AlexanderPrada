<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>POKEDEX</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="src/css/bootstrap.min.css" rel="stylesheet">
	<link href="src/css/mdb.min.css" rel="stylesheet">
	<style>
		body{
			background: url(src/images/fondo.jpg) no-repeat;
			background-size: cover;
		}
	</style>
</head>
<body class="mdb-color lighten-5">

	<?php 
		session_start();
		$color_header = "red";
		include_once('overall/header.php');
	?>
	
	<h1 class="text-center mt-5 mb-5">.</h1> 
	
	
	<?php 
	
		include('overall/login.php');
		include('overall/footer.php');
	
	?>
	
	