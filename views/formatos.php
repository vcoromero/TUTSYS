<?php

require_once('models/mFormato.php');
$obj=new mFormato();
$data = $obj->getFormatos();
$n=1;
if(isset($_GET['idInhabilitar']))
{
    $obj->inhabilitarFormato($_GET['idInhabilitar']);
}
?>
<div class="col-md-6 col-md-offset-3">
    <?php if(isset($_GET['msg']))
    {
        echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$_GET['msg'].'</div>';
    }
    ?>
    <legend>Reportes vigentes</legend>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NOMBRE</th>
                    <th>FECHA SUBIDO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($data as $row): ?>
                <tr>
                    <td><?php echo $n++;?></td>
                    <td><a><?php echo $row['nombreFormato'];?></a></td>
                    <td><?php echo $row['fechaFormato'];?></td>
                    <td>
                        <a class="btn btn-danger" data-toggle="modal" href='#modal-id'>Inhabilitar</a>                        
                        <a class="btn btn-warning" href="#" role="button">Cambiar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>    
        </table>
    </div>
    <div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">¿Desea ihnabilitar el formato seleccionado?</h4>
            </div>
            <div class="modal-body">
                <a class="btn btn-danger" href="?sec=formatos&idInhabilitar=<?php echo $row['idFormato']?>" role="button">Aceptar</a>
            </div>
        </div>
    </div>
</div>
</div>

