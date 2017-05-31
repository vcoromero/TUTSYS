<?php

require_once('models/mMisDatos.php');

$obj=new mMisDatos();   
$row=$obj->getDato($_GET['id']);
$row2=$obj->getTipoUsuario($_GET['id']);

?>

<div class="col-md-8 col-md-offset-2">

    
    <div class="panel panel-success">
          <div class="panel-heading">
                <h3 class="panel-title">Mis datos</h3>
          </div>
          <div class="panel-body">
                <label for="">Nombre</label>
                <p><?php echo $row['nombre']." ".$row['appaterno']." ".$row['apmaterno'];?></p>
                <label for="">Correo personal</label>
                <p><?php echo $row['correoPersonal'];?></p>
                <label for="">Correo institucional</label>
                <p><?php echo $row['correoInstitucional'];?></p>
                <label for="">Teléfono</label>
                <p><?php echo $row['telefono'];?></p>
                <label for="">Sexo</label>
                <p><?php echo $row['sexo'];?></p>
                <label for="">Fecha alta</label>
                <p><?php echo $row['fechaAlta'];?></p>
                <?php if ($row2['fidTipoUsuario']==1):?>
                <?php endif;?>
                <?php if ($row2['fidTipoUsuario']==2):?>
                    <label for="">Área</label>
                    <p><?php echo $row['area'];?></p>
                <?php endif; ?>
                <?php if ($row2['fidTipoUsuario']==3):?>
                    <label for="">Departamento</label>
                    <p><?php echo $row['departamento'];?></p>
                <?php endif;?>
                <?php if ($row2['fidTipoUsuario']==4):?>
                    <label for="">Carrera</label>
                    <p><?php echo $row['carrera'];?></p>
                    <label for="">Periodo</label>
                    <p><?php echo $row['periodo'];?></p>
                <?php endif;?>
                <?php if ($row2['fidTipoUsuario']==5):?>
                    <label for="">Carrera</label>
                    <p><?php echo $row['carrera'];?></p>
                    <label for="">Semestre</label>
                    <p><?php echo $row['semestre'];?></p>
                    <label for="">Tutor</label>
                    <p><?php echo $row['fidTutor'];?></p>
                <?php endif;?>
          </div>
    </div>
</div>