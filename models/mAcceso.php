<?php
require_once ('config/conexionDB.php');

class mAcceso{

    function validarLogin($matricula, $contrasena)
    {
        $cn=new conexionDB();
        $query=$cn-> prepare("SELECT u.matriculaUsuario, u.contrasenaUsuario, p.idPersona,  p.nombre, tu.nombreTipoUsuario from usuario u 
            INNER  JOIN  persona p on u.fidPersona=p.idPersona INNER JOIN tipoUsuario tu on u.fidTipoUsuario=tu.idTipoUsuario 
            where u.matriculaUsuario=:matricula and u.contrasenaUsuario=:contrasena and u.estadoUsuario=1");
        $query->bindParam(':matricula',$matricula);
        $query->bindParam(':contrasena',$contrasena);
        $query->execute();
        if($query)
        {
            session_start(); 
            if($row= $query->fetch())
            {
                $_SESSION['matriculaUsuario'] = $row['matriculaUsuario'];	
                $_SESSION['tipoUsuario'] =  utf8_encode($row['nombreTipoUsuario']);
                $_SESSION['nombreUsuario'] = utf8_encode($row['nombre']);	
                $_SESSION['idPersona'] = $row['idPersona'];	
                
                header("location: home.php");             
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