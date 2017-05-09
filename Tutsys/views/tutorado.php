<?php 
require('models/mTutorado.php');
$obj=  new mTutorado();
$data=$obj->getTutorado(); 

?>

<div>
    <table>
        <thead>
            <tr>
                <th>MATRICULA</th>
                <th>NOMBRE</th>
                <th>APELLIDO PATERNO</th>
                <th>APELLIDO MATERNO</th>
                <th>CORREO</th>
                <th>TELÉFONO</th>
                <th>FECHA ALTA</th>
                <th>FECHA BAJA</th>
                <th>CARRERA</th>
                <th>SEMESTRE</th>
                <th>ESTADO COORDINADOR</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>


            <?php foreach($data as $row): ?>
                
                <tr>
                    
                    <td><?php echo($row['matriculaUsuario']); ?></td>
                    <td><?php echo($row['nombre']); ?></td>
                    <td><?php echo($row['appaterno']); ?></td>
                    <td><?php echo($row['apmaterno']); ?></td>
                    <td><?php echo($row['correo']); ?></td>
                    <td><?php echo($row['telefono']); ?></td>
                    <td><?php echo($row['fechaAlta']); ?></td>
                    <td><?php echo($row['fechaBaja']); ?></td>
                    <td><?php echo($row['carrera']); ?></td>
                    <td><?php echo($row['semestre']); ?></td>
                    <td><?php echo($row['estadoPersona']); ?></td>
                    <td>
                        <button type="button" class="boton">Eliminar</button>
                        <button type="button" class="boton">Editar</button>
                    </td>
                </tr>
                <?php

                endforeach;

                ?>

            </tbody>
        </table>
        <button type="button" class="botonNuevo"> Nuevo </button>
    </div>