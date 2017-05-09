<?php
 require_once ('config/ConexionDB.php');

 class mCoordinadorCarrera
 {
    public function getCoordinadorCarrera()
    {
         $cn=new conexionDB();
        $query=$cn-> prepare("select u.matriculaUsuario, p.nombre, p.appaterno, p.apmaterno, p.correo, p.telefono, p.fechaAlta, p.fechaBaja, cC.departamento, p.estadoPersona from persona p inner join coordinadorCarrera cC on p.idPersona=cC.fidPersona inner join usuario u on u.fidPersona=p.idPersona");
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