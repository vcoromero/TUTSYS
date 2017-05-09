<?php
 require_once ('config/ConexionDB.php');

 class mCoordinadorInstitucional
 {
    public function getCoordinadorInstitucional()
    {
         $cn=new conexionDB();
        $query=$cn-> prepare("select u.matriculaUsuario, p.nombre, p.appaterno, p.apmaterno, p.correo, p.telefono, p.fechaAlta, p.fechaBaja, ci.area, p.estadoPersona from persona p inner join coordinadorInstitucional cI on p.idPersona=cI.fidPersona inner join usuario u on u.fidPersona=p.idPersona");
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