<?php
 require_once ('config/ConexionDB.php');

 class mTutorado
 {
    public function getTutorado($id)
    {
        $cn=new conexionDB();
        $qr=$cn-> prepare("SELECT * FROM persona p INNER JOIN tutorado cI ON p.idPersona=cI.fidPersona INNER JOIN usuario u ON u.fidPersona=p.idPersona 
                                WHERE p.idPersona=:id AND p.estadoPersona=1 AND u.estadoUsuario=1");
        $qr->bindParam(":id", $id);
        $qr->execute();

        if ($qr)
        {
            return $qr->fetch();
        }
        else
        {
            return 0;
        }
    }
    public function getTutoradosActivos()
    {
        $cn=new conexionDB();
        $qr=$cn-> prepare("SELECT * FROM persona p INNER JOIN tutorado cI ON p.idPersona=cI.fidPersona INNER JOIN usuario u ON u.fidPersona=p.idPersona 
                            WHERE p.estadoPersona=1 AND u.estadoUsuario=1");
        $qr->execute();

        if ($qr)
        {
            return $qr->fetchAll();
        }
        else
        {
            return 0;
        }
    }
    public function getTutoradosInactivos()
    {
        $cn=new conexionDB();
        $qr=$cn-> prepare("SELECT * FROM persona p INNER JOIN tutorado cI ON p.idPersona=cI.fidPersona INNER JOIN usuario u ON u.fidPersona=p.idPersona 
                            WHERE p.estadoPersona=0 AND u.estadoUsuario=0");
        $qr->execute();

        if ($qr)
        {
            return $qr->fetchAll();
        }
        else
        {
            return 0;
        }
    }
    public function inhabilitarTutorado($id)
    {
        $cn=new conexionDB();
		$qr=$cn->prepare('UPDATE persona SET estadoPersona=0, fechaBaja=now() WHERE idPersona=:id');
		$qr->bindParam(':id',$id);
		$qr->execute();
		if($qr)
		{
			$qr2=$cn->prepare('UPDATE usuario SET estadoUsuario=0 WHERE idUsuario=:id AND fidPersona=:id AND fidTipoUsuario=5');
			$qr2->bindParam(':id',$id);
			$qr2->execute();
			if($qr2)
			{
				$msg="<strong>¡Cambio realizado!</strong> Se inhabilito al tutorado";
                header("location: ?sec=tutorado&msg=".$msg);
            	return true;
			}
		} 
    }
	
	public function habilitarTutorado($id)
    {
        $cn=new conexionDB();
		$qr=$cn->prepare('UPDATE persona SET estadoPersona=1, fechaAlta=now() WHERE idPersona=:id');
		$qr->bindParam(':id',$id);
		$qr->execute();
		if($qr)
		{
			$qr2=$cn->prepare('UPDATE usuario SET estadoUsuario=1 WHERE idUsuario=:id AND fidPersona=:id AND fidTipoUsuario=5');
			$qr2->bindParam(':id',$id);
			$qr2->execute();
			if($qr2)
			{
				$msg2="<strong>¡Cambio realizado!</strong> Se habilito al tutorado";
                header("location: ?sec=tutorado&msg2=".$msg2);
            	return true;
			}
		} 
    }
 }
?>