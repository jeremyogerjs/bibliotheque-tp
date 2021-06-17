<?php
require_once('./models/Manager.php');

class Livre extends Manager
{
    private $_id;
    private $_titre;
    private $_auteur;
    private $_disponible;
    private $_idRayon;

    //setter
    private function setId($id)
    {
        if(isset($id))
        {
            return $this -> _id = $id;
        }
        else
        {
            return false;
        }
    }
    private function setTitre ($titre)
    {
        if(isset($titre))
        {
            return $this -> _titre = htmlspecialchars($titre);
        }
        else
        {
            return false;
        }
    }
    private function setAuteur ($auteur)
    {
        if(isset($auteur))
        {
            return $this -> _auteur = htmlspecialchars($auteur);
        }
        else
        {
            return false;
        }
    }
    private function setDisponible ($disponible)
    {
        if(isset($disponible))
        {
            return $this -> _disponible = $disponible;
        }
        else
        {
            return;
        }
    }
    private function setIdRayon ($idRayon)
    {
        if(isset($idRayon))
        {
            return $this -> _idRayon = $idRayon;
        }
        else
        {
            return false; 
        }
    }

    //methods
    public function getLivre ()
    {
        $db = $this -> dbConnect();

        if($db)
        {
            $sql = "SELECT * FROM rayon RIGHT JOIN livre ON livre.idRayon = rayon.id";

            $result = $db ->prepare($sql);

            $result -> execute();

            $results = $result ->fetchAll();

            return $results;
        }
    }
    public function getRayons ()
    {
        $db = $this -> dbConnect();
        if($db)
        {
            return $this -> getAll("rayon",$db);
        }
    }
    public function getLivreRayon ()
    {
        $db = $this -> dbConnect();
        $id = $this -> setId($_GET['id']);
        if($db)
        {
            $sql = "SELECT * FROM rayon RIGHT JOIN livre ON livre.idRayon = rayon.id WHERE livre.id = $id";

            $result = $db -> prepare($sql);

            $result -> execute();

            $results = $result ->fetchAll();

            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }
    public function delLivre ()
    {
        $db = $this ->dbConnect();
        $id = $this -> setId($_GET['id']);
        if($db)
        {
            $sql = "DELETE FROM livre WHERE id = $id AND disponible = 1";
            $db -> exec($sql);

            echo "deleted success !";
        }
        else
        {
            http_response_code(500);
        }
    }
    public function getSingleLivre ()
    {
        $db = $this -> dbConnect();
        $id = $this -> setId($_GET['id']);
        if($db)
        {
            $sql = "SELECT * FROM rayon LEFT JOIN livre ON rayon.id = livre.idRayon WHERE livre.id = $id";

            $result = $db -> prepare($sql);

            $result -> execute();

            $results = $result ->fetch();

            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }
    public function modifyLivre ()
    {
        $db = $this -> dbConnect();
        $id = $this -> setId($_GET['id']);
        if($db)
        {
            $titre = $this -> setTitre($_POST['titre']);
            $auteur = $this -> setAuteur($_POST['auteur']);
            $disponible = $this -> setDisponible(true);
            $idRayon = $this -> setIdRayon($_POST['idRayon']);
            $sql = "UPDATE livre SET 
                    titre       = :titre,
                    auteur      = :auteur,
                    disponible  = :disponible,
                    idRayon     = :idRayon
                    WHERE id = $id";

            $result =$db ->prepare($sql);
            $result ->bindParam(':titre',$titre,PDO::PARAM_STR);
            $result ->bindParam(':auteur',$auteur,PDO::PARAM_STR);
            $result ->bindParam(':disponible',$disponible,PDO::PARAM_BOOL);
            $result ->bindParam(':idRayon',$idRayon,PDO::PARAM_INT);
            $results = $result ->execute();

            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }
    public function addLivre ()
    {
        $db = $this -> dbConnect();
        $titre = $this -> setTitre($_POST['titre']);
        $auteur = $this -> setAuteur($_POST['auteur']);
        $disponible = $this -> setDisponible(true);
        $idRayon = $this -> setIdRayon($_POST['idRayon']);
        if($db)
        {
            $sql = "INSERT INTO livre (
                            titre, 
                            auteur, 
                            disponible, 
                            idRayon)
                    VALUES (:titre, :auteur,:disponible,:idRayon)";
            
            $result = $db -> prepare($sql);

            $result ->bindParam(':titre',$titre,PDO::PARAM_STR);
            $result ->bindParam(":auteur",$auteur,PDO::PARAM_STR);
            $result ->bindParam(':disponible',$disponible,PDO::PARAM_BOOL);
            $result ->bindParam(":idRayon",$idRayon,PDO::PARAM_INT);
            $result -> execute();
            return $result;
        }
    }
}