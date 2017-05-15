<?php
require('models/mMenus.php');
$obj= new Menus();
$data=$obj->getMenus($_SESSION['matriculaUsuario']);
?>

<nav class="navbar navbar-inverse navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="?sec=principal">TUTSYS</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
        <?php foreach ($data as $row):?>
        <li><a href="?sec=<?php echo $row['rutaOpcion']?>"><?php echo($row['nombreOpcion'])?></a></li>
        <?php endforeach; ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  
			       <img src="assets/img/userico2.png">&nbsp;&nbsp;<?php  echo $_SESSION['tipoUsuario']." / ".$_SESSION['nombreUsuario']; ?>
                    
                 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="?sec=misdatos&id=<?php echo $_SESSION['idPersona']?>"> Mis datos</a></li>
                    <li><a href="salir.php">Cerrar Sesion</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>