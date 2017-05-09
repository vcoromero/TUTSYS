<?php
 require_once ('config/ConexionDB.php');

 class mTutorado
 {
    public function getTutorado()
    {
         $cn=new conexionDB();
        $query=$cn-> prepare("select u.matriculaUsuario, p.nombre, p.appaterno, p.apmaterno, p.correo, p.telefono, p.fechaAlta, p.fechaBaja, tdo.carrera, tdo.semestre, p.estadoPersona from persona p inner join tutorado tdo on p.idPersona=tdo.fidPersona inner join usuario u on u.fidPersona=p.idPersona");
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
 }

?>