<?php 

require_once('config/conexionDB.php');

class mAdministrador
{

	public function getAdministrador()
	{
		$cn=new conexionDB();
		$query=$cn->prepare("select u.matriculaUsuario, p.nombre, p.appaterno, p.apmaterno, p.correo, p.telefono, p.fechaAlta, p.fechaBaja, p.estadoPersona from persona p inner join administrador a on p.idPersona=a.fidPersona inner join usuario u on u.fidPersona=p.idPersona");
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