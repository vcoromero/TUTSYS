<?php 
require('models/mCoordinadorCarrera.php');
$obj=  new mCoordinadorCarrera();
$data=$obj->getCoordinadoresCarreraActivos(); 
$data2=$obj->getCoordinadoresCarreraInactivos(); 
$n=1;
$i=1;
if(isset($_GET['idInhabilitar']))
{
    $obj->inhabilitarCoordinadorCarrera($_GET['idInhabilitar']);
}
if(isset($_GET['idHabilitar']))
{
    $obj->habilitarCoordinadorCarrera($_GET['idHabilitar']);
}
?>

<div class="col-md-8 col-md-offset-2">    
    <div class="panel panel-primary">
          <div class="panel-heading">
                <h3 class="panel-title">Coordinadores de carrera activos</h3>
          </div>
          <div class="panel-body">
            <?php if(isset($_GET['msg']))
            {
                echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>'.$_GET['msg'].'</div>';
            }
            ?>
            <div class="table-responsive">
                <table class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOMBRE</th>
                            <th>DEPARTAMENTO</th>
                            <?php if ($_SESSION['idTipoUsuario']==1):?>
                                <th>ACCIONES</th>
                            <?php endif;?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $row): ?> 
                        <tr>
                            <td><?php echo $n++; ?></td>
                            <td><a href="?sec=datos&id=<?php echo $row['idPersona'] ?>"><?php echo$row['nombre']." ".$row['appaterno']." ".$row['apmaterno']; ?></a></td>
                            <td><?php echo $row['departamento'];?></td>
                            <td>
                            <?php if ($_SESSION['idTipoUsuario']==1):?>
                                <a type="button" class="btn btn-danger" href='?sec=coordinadorCarrera&idInhabilitar=<?php echo $row['idPersona'] ?>'>Inhabilitar</a>
                                <a type="button" class="btn btn-warning" href="?sec=formEditarUsuario&id=<?php echo $row['idPersona'] ?>">Editar</a>
                            <?php endif;?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a type="button" class="btn btn-lg btn-block btn-success" href='?sec=formNuevoUsuario'>Nuevo</a>
            </div>
          </div>
    </div>
    <?php
    if ($_SESSION['idTipoUsuario']==1):?>
      <div class="panel panel-danger">
          <div class="panel-heading">
                <h3 class="panel-title">Coordinadores de carrera inactivos</h3>
          </div>
          <div class="panel-body">
            <?php if(isset($_GET["msg2"]))
                {
                    echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>'.$_GET["msg2"].'</div>';
                }
            ?>
            <div class="table-responsive">
                <table class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOMBRE</th>
                            <th>DEPARTAMENTO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data2 as $row2): ?> 
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><a><?php echo$row2["nombre"]." ".$row2["appaterno"]." ".$row2["apmaterno"]; ?></a></td>
                            <td><?php echo $row2["departamento"];?></td>
                            <td>
                                <a type="button" class="btn btn-success" href="?sec=coordinadorCarrera&idHabilitar=<?php echo $row2["idPersona"] ?>">Habilitar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>                 
          </div>
    </div>
    <?php endif;?>
 </div>