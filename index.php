<?php
 
 if(isset($_POST['matricula']) && isset($_POST['contrasena'])){

 include 'models/mAcceso.php';
 $obj=  new mAcceso();
 $data=$obj->validarLogin($_POST['matricula'],$_POST['contrasena']); 

 }
?>


    <!DOCTYPE html>
    <html lang="es">
    <?php include("includes/head.php") ?>

    <body class="jumbotron">
        <div class="container">
            <div class="row">


                <div style="margin-top:7%" class="col-md-4 col-md-offset-4">
                    <div class="panel panel-success">
                        <div class="panel-body">
                        <img style="max-width:230px;margin:auto;" src="assets/img/tutsys.png" class="img-responsive">
                            <form id="formulario-login" method="POST">
                                <div class="form-group">
                                    <label for="">Matricula</label>
                                    <input type="text" class="form-control" name="matricula" placeholder="Ingrega tu matricula">
                                </div>
                                <div class="form-group">
                                    <label for="">Contraseña</label>
                                    <input type="password" class="form-control" name="contrasena" placeholder="Ingresa tu contraseña">
                                </div>

                                <button type="submit" name="btnenviar" class="btn btn-lg btn-block btn-success">Enviar</button>
                            </form>
                            <br>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>

    </html>