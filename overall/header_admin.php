<header>
	<nav class="navbar fixed-top navbar-expand-lg navbar-red unique-color-dark darken-2 scrolling-navbar mb-4">
		<div class="container">
			<a class="navbar-brand" href="./index.php"><strong>Pokedex</strong></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
	
					</ul>
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="" class="nav-link disabled yellow-text" ><?php echo $_SESSION['user'] ?></a>		
						</li>
						<li class="nav-item">
							<a href="session_destroy.php" class="nav-link" >Cerrar Sesión</a>		
						</li>
					</ul>
				</div>
		</div>
	</nav>
</header>