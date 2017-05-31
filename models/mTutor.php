<?php
 require_once ('config/ConexionDB.php');

 class mTutor
 {
    public function getTutor($id)
    {
        $cn=new conexionDB();
        $qr=$cn-> prepare("SELECT * FROM persona p INNER JOIN tutor cI ON p.idPersona=cI.fidPersona INNER JOIN usuario u ON u.fidPersona=p.idPersona 
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
    public function getTutoresActivos()
    {
        $cn=new conexionDB();
        $qr=$cn-> prepare("SELECT * FROM persona p INNER JOIN tutor cI ON p.idPersona=cI.fidPersona INNER JOIN usuario u ON u.fidPersona=p.idPersona 
                            WHERE u.idUsuario!=:id AND p.estadoPersona=1 AND u.estadoUsuario=1");
        $qr->bindParam(':id', $_SESSION['idUsuario']);
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
    public function getTutoresInactivos()
    {
        $cn=new conexionDB();
        $qr=$cn-> prepare("SELECT * FROM persona p INNER JOIN tutor cI ON p.idPersona=cI.fidPersona INNER JOIN usuario u ON u.fidPersona=p.idPersona 
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
    public function inhabilitarTutor($id)
    {
        $cn=new conexionDB();
		$qr=$cn->prepare('UPDATE persona SET estadoPersona=0, fechaBaja=now() WHERE idPersona=:id');
		$qr->bindParam(':id',$id);
		$qr->execute();
		if($qr)
		{
			$qr2=$cn->prepare('UPDATE usuario SET estadoUsuario=0 WHERE idUsuario=:id AND fidPersona=:id AND fidTipoUsuario=4');
			$qr2->bindParam(':id',$id);
			$qr2->execute();
			if($qr2)
			{
				$msg="<strong>¡Cambio realizado!</strong> Se inhabilito al tutor";
                header("location: ?sec=tutor&msg=".$msg);
            	return true;
			}
		} 
    }
	
	public function habilitarTutor($id)
    {
        $cn=new conexionDB();
		$qr=$cn->prepare('UPDATE persona SET estadoPersona=1, fechaAlta=now() WHERE idPersona=:id');
		$qr->bindParam(':id',$id);
		$qr->execute();
		if($qr)
		{
			$qr2=$cn->prepare('UPDATE usuario SET estadoUsuario=1 WHERE idUsuario=:id AND fidPersona=:id AND fidTipoUsuario=4');
			$qr2->bindParam(':id',$id);
			$qr2->execute();
			if($qr2)
			{
				$msg2="<strong>¡Cambio realizado!</strong> Se habilito al tutor";
                header("location: ?sec=tutor&msg2=".$msg2);
            	return true;
			}
		} 
    }
 }

?>