<?php
require_once('config/conexionDB.php');
class Menus
{
	public function getMenus($matriculaUsuario)
	{
		$cn=new conexionDB();
		$query=$cn->prepare("select o.nombreOpcion, o.rutaOpcion from usuario u inner join tipoUsuario tu on u.fidTipoUsuario=tu.idTipoUsuario inner join usuarioOpcion uo on tu.idTipoUsuario=uo.fidTipoUsuario inner join opcion o on uo.fidUsuarioOpcion=o.idOpcion where u.estadoUsuario=1 and tu.estadoTipoUsuario=1 and o.estadoOpcion=1 and u.matriculaUsuario=:matriculaUsuario");
		$query->execute([
			'matriculaUsuario'=>$matriculaUsuario
			]);

		if($query)
		{
			return $query-> fetchAll();

		} 
		else 
		{
			return 0;
		}
		
	}
}
