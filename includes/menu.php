<?php
require('models/mMenus.php');
$obj= new Menus();
$data=$obj->getMenus($_SESSION['matriculaUsuario']);
?>
<div class="container-fluid">
<nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
    <a class="navbar-brand" href="#">TUTSYS</a>
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
                    <li><a href="?sec=misdatos&">Mis datos</a></li>
                    <li><a href="salir.php">Cerrar Sesion</a></li>
                </ul>
            </li>
    </ul>

</nav>
</div>




