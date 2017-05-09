<?php 
require('models/mTutorado.php');
$obj=  new mTutorado();
$data=$obj->getTutorado(); 
if(isset($_GET['id']))
{
    $del=$obj->deleteTutorado($_GET['id']);
}
?>

<div>
    
    <?php if(isset($_GET['msg']))
    {
        echo '<p style="padding:10px; background:green;font-size:14px;">'.$_GET['msg'].'</p>';
    }
    ?>
    <table>
        <thead>
            <tr>

                <th>MATRICULA</th>
                <th>NOMBRE</th>
                <th>FECHA ALTA</th>
                <th>ESTADO TUTOR</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>


            <?php foreach($data as $row): ?>
                
                <tr>

                    <td><?php echo($row['matriculaUsuario']); ?></td>
                    <td><?php echo($row['nombre'])." ".($row['appaterno'])." ".($row['apmaterno']); ?></td>
                    <td><?php echo($row['fechaAlta']); ?></td>
                    <td><?php echo($row['estadoPersona']); ?></td>
                    <td>
                        <a  type="button" class="boton" href="?sec=tutorado&id=<?php echo $row['idPersona']; ?>">Eliminar</a>
                        <button type="button" class="boton">Editar</button>
                    </td>
                </tr>
                <?php

                endforeach;

                ?>

            </tbody>
        </table>
        <a  class="botonNuevo" href="?sec=nuevoUsuario">Nuevo</a>
    </div>