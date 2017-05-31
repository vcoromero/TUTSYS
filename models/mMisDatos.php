<?php

require_once('config/conexionDB.php');


class mMisDatos
{
    public function getTipoUsuario($idPersona)
    {
        $cn=new conexionDB();
        $qr=$cn->prepare('SELECT u.fidTipoUsuario FROM persona p INNER JOIN usuario u on p.idPersona= u.fidPersona where p.idPersona=:id and p.estadoPersona=1');
        $qr->bindParam(':id',$idPersona);
        $qr->execute();
        if ($qr) 
        {
            return $qr->fetch();   
        }
    }
    public function getDatos($idPersona, $idtipoPersona)
    {
        $cn = new conexionDB();
        if ($idtipoPersona==1)
        {
            $qr=$cn->prepare('SELECT * FROM persona p INNER JOIN administrador a ON p.idPersona=a.fidPersona WHERE p.idPersona=:id and p.estadoPersona=1');
            $qr->bindParam(':id',$idPersona);
        } 
        elseif ($idtipoPersona==2)
        {
            $qr=$cn->prepare('SELECT * FROM persona p INNER JOIN coordinadorInstitucional cI ON p.idPersona=ci.fidPersona WHERE p.idPersona=:id and p.estadoPersona=1');
            $qr->bindParam(':id',$idPersona);
        }
        elseif ($idtipoPersona==3)
        {
            $qr=$cn->prepare('SELECT * FROM persona p INNER JOIN coordinadorCarrera cC ON p.idPersona=cC.fidPersona WHERE p.idPersona=:id and p.estadoPersona=1');
            $qr->bindParam(':id',$idPersona);
        }
        elseif ($idtipoPersona==4)
        {
            $qr=$cn->prepare('SELECT * FROM persona p INNER JOIN tutor t ON p.idPersona=t.fidPersona WHERE p.idPersona=:id and p.estadoPersona=1');
            $qr->bindParam(':id',$idPersona);
        }
        elseif ($idtipoPersona==5)
        {
            $qr=$cn->prepare('SELECT * FROM persona p INNER JOIN tutorado td ON p.idPersona=td.fidPersona WHERE p.idPersona=:id and p.estadoPersona=1');
            $qr->bindParam(':id',$idPersona);
        }
        $qr->execute();
        if ($qr) 
        {
            return $qr->fetchAll();   
        }
    }
    public function getDato($idPersona)
    {
        $cn = new conexionDB();
        $qr=$cn->prepare('SELECT u.fidTipoUsuario FROM persona p INNER JOIN usuario u on p.idPersona= u.fidPersona where p.idPersona=:id and p.estadoPersona=1');
        $qr->bindParam(':id', $idPersona);
        $qr->execute();
        if ($row= $qr->fetch())
        {
            if ($row['fidTipoUsuario']==1)
            {
                $qr2=$cn->prepare('SELECT * FROM persona p INNER JOIN administrador a ON p.idPersona=a.fidPersona WHERE p.idPersona=:id and p.estadoPersona=1');
                $qr2->bindParam(':id',$idPersona);
            } 
            elseif ($row['fidTipoUsuario']==2)
            {
                $qr2=$cn->prepare('SELECT * FROM persona p INNER JOIN coordinadorInstitucional cI ON p.idPersona=ci.fidPersona WHERE p.idPersona=:id and p.estadoPersona=1');
                $qr2->bindParam(':id',$idPersona);
            }
            elseif ($row['fidTipoUsuario']==3)
            {
                $qr2=$cn->prepare('SELECT * FROM persona p INNER JOIN coordinadorCarrera cC ON p.idPersona=cC.fidPersona WHERE p.idPersona=:id and p.estadoPersona=1');
                $qr2->bindParam(':id',$idPersona);
            }
            elseif ($row['fidTipoUsuario']==4)
            {
                $qr2=$cn->prepare('SELECT * FROM persona p INNER JOIN tutor t ON p.idPersona=t.fidPersona WHERE p.idPersona=:id and p.estadoPersona=1');
                $qr2->bindParam(':id',$idPersona);
            }
            elseif ($row['fidTipoUsuario']==5)
            {
                $qr2=$cn->prepare('SELECT * FROM persona p INNER JOIN tutorado td ON p.idPersona=td.fidPersona WHERE p.idPersona=:id and p.estadoPersona=1');
                $qr2->bindParam(':id',$idPersona);
            }
            $qr2->execute();
            if ($qr2) 
            {
                return $qr2->fetch();   
            }
        }
       
    }
}

?>