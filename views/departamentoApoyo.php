<?php
require('models/mDepartamentoApoyo.php');

$obj=new mDepartamentoApoyo();
$data=$obj->getDepartamentosApoyo();
$n=1;
?>
<div class="col-md-6 col-md-offset-3">
    
    <div class="panel panel-primary">
          <div class="panel-heading">
                <h3 class="panel-title">DEPARTAMENTOS DE APOYO</h3>
          </div>
          <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NOMBRE</th>
                                <?php if ($_SESSION['idTipoUsuario']==1):?>
                                <th>ACCIONES</th>
                                <?php endif;?>                             
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data as $row):?>
                            <tr>
                                <td><?php echo($n++);?></td>
                                <td><a><?php echo($row['nombre'])?></a></td>
                                <td>
                                <?php if ($_SESSION['idTipoUsuario']==1):?>
                                    <a class="btn btn-danger" href='?sec=departamentoApoyo&idInhabilitar=<?php echo $row['idDepartamentoApoyo'] ?>'>Inhabilitar</a>
                                    <a class="btn btn-warning" href="?sec=&id=<?php echo $row['idDepartamentoApoyo'] ?>">Editar</a>
                                </td>
                                <?php endif;?>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                
          </div>
    </div>
</div>
