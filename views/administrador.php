<?php 
require('models/mAdministrador.php');
$obj=  new mAdministrador();
$data=$obj->getAdministrador(); 
$n=1;
?>



    <div class="table-responsive">
        <table class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO PATERNO</th>
                    <th>APELLIDO MATERNO</th>
                    <th>CORREO</th>
                    <th>TELÉFONO</th>
                    <th>FECHA ALTA</th>
                    <th>FECHA BAJA</th>
                    <th>ESTADO COORDINADOR</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $row): ?>

                <tr>
                    <td>
                        <?php echo $n++; ?>
                    </td>
                    <td>
                        <?php echo ($row['nombre']); ?>
                    </td>
                    <td>
                        <?php echo ($row['appaterno']); ?>
                    </td>
                    <td>
                        <?php echo ($row['apmaterno']); ?>
                    </td>
                    <td>
                        <?php echo ($row['correo']); ?>
                    </td>
                    <td>
                        <?php echo ($row['telefono']); ?>
                    </td>
                    <td>
                        <?php echo ($row['fechaAlta']); ?>
                    </td>
                    <td>
                        <?php echo ($row['fechaBaja']); ?>
                    </td>
                    <td>
                        <?php echo ($row['estadoPersona']); ?>
                    </td>
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


    </div>

    <button type="button" class="botonNuevo"> Nuevo </button>
</div>