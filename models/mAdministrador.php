<?php 

require_once('config/conexionDB.php');

class mAdministrador
{

	public function getAdministrador($id)
	{
		$cn=new conexionDB();
		$qr=$cn->prepare("SELECT * FROM persona p INNER JOIN administrador a ON p.idPersona=a.fidPersona INNER JOIN usuario u ON u.fidPersona=p.idPersona 
							WHERE p.idPersona=:id AND p.estadoPersona=1 AND u.estadoUsuario=1");
		$qr->bindParam(":id",$id);
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
	
	public function getAdministradoresActivos()
	{
		$cn=new conexionDB();
		$qr=$cn->prepare("SELECT * FROM persona p INNER JOIN administrador a ON p.idPersona=a.fidPersona INNER JOIN usuario u ON u.fidPersona=p.idPersona 
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

	public function getAdministradoresInactivos()
	{
		$cn=new conexionDB();
		$qr=$cn->prepare("SELECT * FROM persona p INNER JOIN administrador a ON p.idPersona=a.fidPersona INNER JOIN usuario u ON u.fidPersona=p.idPersona 
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

	public function inhabilitarAdministrador($id)
    {
        $cn=new conexionDB();
		$qr=$cn->prepare('UPDATE persona SET estadoPersona=0, fechaBaja=now() WHERE idPersona=:id');
		$qr->bindParam(':id',$id);
		$qr->execute();
		if($qr)
		{
			$qr2=$cn->prepare('UPDATE usuario SET estadoUsuario=0 WHERE idUsuario=:id AND fidPersona=:id AND fidTipoUsuario=1');
			$qr2->bindParam(':id',$id);
			$qr2->execute();
			if($qr2)
			{
				$msg="<strong>¡Cambio realizado!</strong> Se inhabilito al administrador";
                header("location: ?sec=administrador&msg=".$msg);
            	return true;
			}
		} 
    }
	
	public function habilitarAdministrador($id)
    {
        $cn=new conexionDB();
		$qr=$cn->prepare('UPDATE persona SET estadoPersona=1, fechaAlta=now() WHERE idPersona=:id');
		$qr->bindParam(':id',$id);
		$qr->execute();
		if($qr)
		{
			$qr2=$cn->prepare('UPDATE usuario SET estadoUsuario=1 WHERE idUsuario=:id AND fidPersona=:id AND fidTipoUsuario=1');
			$qr2->bindParam(':id',$id);
			$qr2->execute();
			if($qr2)
			{
				$msg2="<strong>¡Cambio realizado!</strong> Se habilito al administrador";
                header("location: ?sec=administrador&msg2=".$msg2);
            	return true;
			}
		} 
    }
}