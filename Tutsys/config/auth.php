<?php

	session_start();
	
	if(!isset($_SESSION['MatriculaUsuario']) || (trim($_SESSION['MatriculaUsuario']) == '')) {
		header("location: index.php");
		exit();
	} 

	?>