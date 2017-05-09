<?php
 require_once ('config/ConexionDB.php');

 class mTutor
 {
    public function getTutor()
    {
         $cn=new conexionDB();
        $query=$cn-> prepare("select u.matriculaUsuario, p.nombre, p.appaterno, p.apmaterno, p.correo, p.telefono, p.fechaAlta, p.fechaBaja, tu.carrera, p.estadoPersona 
from persona p inner join tutor tu on p.idPersona=tu.fidPersona inner join usuario u on u.fidPersona=p.idPersona");
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