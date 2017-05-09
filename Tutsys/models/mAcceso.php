<?php
require_once ('config/conexionDB.php');

class mAcceso{

    function validarLogin($matricula, $contrasena)
    {
        $cn=new conexionDB();
        $query=$cn-> prepare("select u.matriculaUsuario, u.contrasenaUsuario, p.nombre, tu.nombreTipoUsuario from usuario u 
            INNER  JOIN  persona p on u.fidPersona=p.idPersona INNER JOIN tipoUsuario tu on u.fidTipoUsuario=tu.idTipoUsuario where u.matriculaUsuario=:matriculaUsuario and u.contrasenaUsuario=:contrasenaUsuario LIMIT 1");
        $query->execute(['matriculaUsuario'=>$matricula, 'contrasenaUsuario'=>$contrasena]);
        if($query)
        {
            session_start(); 
            if($row= $query->fetch()){

                $_SESSION['tipoUsuario']=  utf8_encode($row['nombreTipoUsuario']);
                $_SESSION['matriculaUsuario'] = $row['matriculaUsuario'];	
                $_SESSION['nombreUsuario'] = utf8_encode($row['nombre']);	
                
                header("location: inicio.php");             
            }
            return true;
        }
        else
        {
            header("location: index.php");             
            return false;
        }
    }
}