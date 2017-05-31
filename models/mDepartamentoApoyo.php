<?php
require_once('config/conexionDB.php');

class mDepartamentoApoyo
{
    public function getDepartamentosApoyo()
    {
        $cn=new conexionDB();
        $qr=$cn->prepare('SELECT * FROM departamentoApoyo WHERE estado=1');
        $qr->execute();
        if($qr) 
        {
            return $qr->fetchAll();
        }
    }
    
}
?>