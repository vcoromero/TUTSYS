<?php 
require('models/mTutorado.php');
$obj=  new mTutorado();
$data=$obj->getTutoradosActivos(); 
$data2=$obj->getTutoradosInactivos(); 
$n=1;
$i=1;
if(isset($_GET['idInhabilitar']))
{
    $obj->inhabilitarTutorado($_GET['idInhabilitar']);
}
if(isset($_GET['idHabilitar']))
{
    $obj->habilitarTutorado($_GET['idHabilitar']);
}
?>

<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-primary">
        <div class="panel-heading">
                <h3 class="panel-title">Tutorados activos</h3>
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
                                <th>CARRERA</th>
                                <th>SEMESTRE</th>
                                <?php if ($_SESSION['idTipoUsuario']==1):?>
                                    <th>ACCIONES</th>
                                <?php endif;?>        
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row): ?> 
                                <tr>
                                    <td><?php echo $n++; ?></td>
                                    <td><a href="?sec=datos&id=<?php echo $row['idPersona'] ?>"><?php echo $row['nombre']." ".$row['appaterno']." ".$row['apmaterno']; ?></a></td>
                                    <td><?php echo $row['carrera'];?></td>
                                    <td><?php echo $row['semestre'];?></td>
                                    <td>
                                    <?php if ($_SESSION['idTipoUsuario']==1):?>
                                        <a type="button" class="btn btn-danger" href="?sec=tutorado&idInhabilitar=<?php echo $row["idPersona"];?>">Inhabilitar</a>
                                        <a type="button" class="btn btn-warning" href="?sec=formEditarUsuario&id=<?php echo $row["idPersona"]; ?>">Editar</a>  
                                    <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <a type="button" class="btn btn-lg btn-block btn-success" href='?sec=formNuevoUsuario'>Nuevo</a>
            </div>            
        </div>
    </div>

    <?php if ($_SESSION['idTipoUsuario']==1): ?>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Tutorados inactivos</h3>
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
                            <th>CARRERA</th>
                            <th>SEMESTRE</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data2 as $row2): ?> 
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><a href="?sec=misdatos&id=<?php echo $_SESSION["idTipoUsuario"]?>"><?php echo $row2["nombre"]." ".$row2["appaterno"]." ".$row2["apmaterno"]; ?></a></td>
                                <td><?php echo $row2["carrera"];?></td>
                                <td><?php echo $row2["semestre"];?></td>
                                <td>
                                    <a type="button" class="btn btn-success" href="?sec=tutorado&idHabilitar=<?php echo $row2["idPersona"] ?>">Habilitar</a>      
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>