<?php include('auth.php');?>
<!DOCTYPE html>
<html lang="es-MX">
<?php include('includes/head.php'); ?>
<body>
    <div id="agrupar">
<!--HEADER-->
<?php include('includes/header.php'); ?>
<!-- FIN HEADER-->
<!--MENU-->
<?php include('includes/menu.php'); ?>
<!--FIN MENU-->
        <div id="agrupar">
            <!--Aquí dentro va-->
            <div id="centrarContenido">
                <?php 

                if(isset($_GET['sec'])){
                    $seccion=$_GET['sec'];
                }else{
                    $seccion='home';
                }
                include('sections/'.$seccion.'.php');
                ?>
            </div>
        </div>
    </div>
</body>
</html>