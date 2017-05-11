<?php

	session_start();
	
	if(!isset($_SESSION['matriculaUsuario']) || (trim($_SESSION['matriculaUsuario']) == '')) {
		header("location: index.php");
		exit();
	} 

?>