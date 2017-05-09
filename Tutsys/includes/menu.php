<?php
require('models/mMenus.php');
$obj= new Menus();
$data=$obj->getMenus($_SESSION['IDUsuario']);
?>


<nav>
    <ul>
        <?php foreach ($data as $row):?>
        <li><a href="?sec=<?php echo $row['rutaOpcion']?>"><?php echo($row['nombreOpcion'])?></a></li>            
        <?php endforeach; ?>
    </ul>
</nav>

