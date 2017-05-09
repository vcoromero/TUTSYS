 <?php
 
 if(isset($_POST['matricula']) && isset($_POST['contrasena'])){

 include 'models/mAcceso.php';
 $obj=  new mAcceso();
 $data=$obj->validarLogin($_POST['matricula'],$_POST['contrasena']); 

 }
?>
<!DOCTYPE html>
<html lang="es">
	<?php include("includes/head.php") ?>
<body>
	<div id="agrupar">
        <header id="cabecera">
            <h1>TUTSYS</h1>
        </header>
        <!--Contenedor central-->
        <div id="centrarContenido">
            <!--Aquí irá el logotipo-->
            <div id="divLogo">
                <img src="assets/img/tutsys.png"   class="imgCabecera">	
            </div>
            <!--Aquí irá el login-->
            <div id="divLogin">
                <form id="formulario-login" method="POST">
                    <div class="tituloFormulario">
                        <h3>Ingresa</h3>
                    </div>
                    <input type="text" name="matricula" placeholder="Matricula" class="campo">
                    <input type="password" name="contrasena" placeholder="Contraseña" class="campo">
                    <button class="botonIndex" name="btnenviar">INGRESAR</button>
                </form>
            </div>
        </div>
	</div>
</body>
</html>