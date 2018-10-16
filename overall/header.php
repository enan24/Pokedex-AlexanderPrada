<header>
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark red darken-2 scrolling-navbar ">
		<div class="container">
			<form action="busqueda-pokemon.php" method="GET" class="form-inline">
                <input type="text" class="form-control mr-sm-2" name="nombrePokemon" id="nombrePokemon" placeholder="Ingrese POKEMON">
                <input type="submit" name="buscar" value="Buscar" class="btn btn-sm red darken-1">
            </form>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
				    <a class="navbar-brand" href="./index.php"><strong>Pokedex</strong></a>
					<ul class="navbar-nav mr-auto">
					</ul>
					<ul class="navbar-nav nav-flex-icons">
					<li class="nav-item">
						<?php 
						if(isset($_COOKIE['session']) || isset($_SESSION['user'])){?>
						<a href="administracion.php"  class="nav-link" >Iniciar sesion</a>
						<?php }else{?>
						<a href=""  data-toggle="modal" class="nav-link" data-target="#modalLoginForm">Iniciar sesion<i class="fa fa-user-circle"></i></a>	
						<?php } ?>		
					</li>
				</ul>
		</div>
	</nav>
</header>