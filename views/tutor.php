<?php 
require('models/mTutor.php');
$obj=  new mTutor();
$data=$obj->getTutoresActivos(); 
$data2=$obj->getTutoresInactivos(); 
$n=1;
$i=1;
if(isset($_GET['idInhabilitar']))
{
    $obj->inhabilitarTutor($_GET['idInhabilitar']);
}
if(isset($_GET['idHabilitar']))
{
    $obj->habilitarTutor($_GET['idHabilitar']);
}
?>

<div class="col-md-6 col-md-offset-3">
    <?php if(isset($_GET['msg']))
    {
        echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>'.$_GET['msg'].'</div>';
    }
    ?>
    <legend>Tutores activos</legend>
    <div class="table-responsive">
        <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>#</th>
                <th>NOMBRE</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row): ?> 
                <tr>
                    <td><?php echo $n++; ?></td>
                    <td><a><?php echo $row['nombre']." ".$row['appaterno']." ".$row['apmaterno']; ?></a></td>
                    <td>
                        <a type="button" class="btn btn-danger" href='?sec=tutor&idInhabilitar=<?php echo $row['idPersona'] ?>'>Inhabilitar</a>
                        <a type="button" class="btn btn-warning" href="?sec=formEditarUsuario&id=<?php echo $row['idPersona'] ?>">Editar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a type="button" class="btn btn-lg btn-block btn-success" href='?sec=formNuevoUsuario'>Nuevo</a>
    </div>

    <br>

    <?php if(isset($_GET['msg2']))
    {
        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>'.$_GET['msg2'].'</div>';
    }
    ?>
    <legend>Tutores inactivos</legend>
    <div class="table-responsive">
        <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>#</th>
                <th>NOMBRE</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data2 as $row2): ?> 
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row2['nombre']." ".$row2['appaterno']." ".$row2['apmaterno']; ?></td>
                    <td>
                        <a type="button" class="btn btn-success" href='?sec=tutor&idHabilitar=<?php echo $row2['idPersona'] ?>'>Inhabilitar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>