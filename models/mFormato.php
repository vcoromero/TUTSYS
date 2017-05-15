<?php

require_once('config/conexionDB.php');

class mFormato
{
    public function getFormatos()
    {
        $cn = new conexionDB();
        $qr=$cn->prepare('SELECT * FROM formato WHERE estadoFormato=1');
        $qr->execute();
        if($qr)
        {
            return $qr->fetchAll();
        }
    }
    public function inhabilitarFormato($id)
    {
        $cn = new conexionDB();
        $qr=$cn->prepare('UPDATE formato set estadoFormato=0 WHERE idFormato=:id');
        $qr->bindParam(":id", $id);
        $qr->execute();
        if($qr)
        {
            $msg="<strong>¡Cambio realizado!</strong> Se inhabilito el formato.";
            header("location: ?sec=formatos&msg=".$msg);
            return true;
        }
    }
}
?>