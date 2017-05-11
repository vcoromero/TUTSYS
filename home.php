<?php include('auth.php');?>
<!DOCTYPE html>
<html lang="es">
<?php include('includes/head.php'); ?>
<body>
    <div id="agrupar">
<!--HEADER-->
<!-- FIN HEADER-->
<!--MENU-->
<?php include('includes/menu.php'); ?>
<!--FIN MENU-->
        <div class="container" id="agrupar">
            <!--Aquí dentro va-->
            <div style="margin-top:70px;" id="centrarContenido">
                <?php 

                if(isset($_GET['sec'])){
                    $view=$_GET['sec'];
                }else{
                    $view='principal';
                }
                include('views/'.$view.'.php');
                ?>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php') ?>
</body>
</html>