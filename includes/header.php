<header id="cabeceraInicio">
		<div id="cabeceraTitulo">
			<h1>TUTSYS</h1>
		</div>
		<div id="cabeceraUsuario">
			<img src="assets/img/userico2.png">
			<p><strong><?php  echo $_SESSION['tipoUsuario']." / ".$_SESSION['nombreUsuario']; ?></strong></p>
			<a href="salir.php" >Mis datos</a>
			<br>
			<a href="salir.php" >Cerrar sesión</a>    
		</div>
</header>