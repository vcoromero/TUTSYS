<?php
 require_once ('config/ConexionDB.php');

 class mTutorado
 {
    public function getTutorado()
    {
        $cn=new conexionDB();
        $query=$cn-> prepare("select u.matriculaUsuario, p.idPersona, p.nombre, p.appaterno, p.apmaterno, p.correo, p.telefono, p.fechaAlta, 
                p.fechaBaja, tdo.carrera, tdo.semestre, p.estadoPersona from persona p inner join tutorado tdo on p.idPersona=tdo.fidPersona 
                inner join usuario u on u.fidPersona=p.idPersona where p.estadoPersona=1");
        $query->execute();

        if ($query)
        {
            return $query->fetchAll();
        }
        else
        {
            return 0;
        }
    }

    public function insertTutorado($nombre, $appaterno, $apmaterno, $correo, $telefono, $carrera, $semestre, $matriculaUsuario, $contrasenaUsuario)
    {
        $cn= new conexionDB();
        //Inserto en mi tabla persona, ya que es la tabla generica
        $qr=$cn->prepare("insert into persona(nombre, appaterno, apmaterno, correo, telefono, fechaAlta, estadoPersona) 
        values(:nombre,:appaterno, :apmaterno, :correo, :telefono, now(), 1)");
        $qr->bindParam(":nombre",$nombre);
        $qr->bindParam(":appaterno",$appaterno);
        $qr->bindParam(":apmaterno",$apmaterno);
        $qr->bindParam(":correo",$correo);
        $qr->bindParam(":telefono",$telefono);
        $qr->execute();
        //Si se hizo bien esta inserción, voy a insertar en la tabla de tutorado porque es el de tipo de persona que inserte
        if($qr)
        {
            $last_id = $cn->lastInsertId();//Por lo que investigue, así obtengo el ultimo id de lo que se inserto en la tabla persona
            //ahora hago la inserción en la tabla de tutorado
            $qr=$cn->prepare("insert into tutorado(fidPersona, fidTutor, carrera, semestre) value(:fidPersona, 4, :carrera, :semestre)");
            $qr->bindParam(":fidPersona",$last_id);
            $qr->bindParam(":carrera",$carrera);
            $qr->bindParam(":semestre",$semestre);
            //y si todo sale bien, se hace la siguiente inserción que sería darle una matricula y contraseña al nuevo tutorado
            if($qr)
            {
                 //vuelvo a tomar el ultimo id (pero siento que este valor cambia con la ultima inserción)
                $qr=$cn->prepare("insert into usuario(matriculaUsuario, contrasenaUsuario, fidPersona, fidTipoUsuario, estadoUsuario) 
                value(:matriculaUsuario, :contrasenaUsuario, :fidPersona, 5, 1)");
                $qr->bindParam(":matriculaUsuario",$matriculaUsuario);
                $qr->bindParam(":contrasenaUsuario",$contrasenaUsuario);
                $qr->bindParam(":fidPersona",$last_id);
                
                header("location: home.php?sec=tutorado");
                return true;
            }
        }
    }
    public function deleteTutorado($idTutorado)
    {
        
        $cn=new conexionDB();
        $query=$cn->prepare("update persona set estadoPersona=0, fechaBaja=now() where idPersona=:id");
        $query->bindParam(":id",$idTutorado);
        $query->execute();


        if($query)
        {
            $msg="Se ha eliminado correctamente";
            header("location: home.php?sec=tutorado&msg=".$msg);
            return true;
        }  
    }
    // public function updateTutorado()
    // {

    // }
 }
?>