<?php
require_once('./models/Manager.php');

class Livre extends Manager
{
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

    public function getLivreRayon ()
    {
        $db = $this -> dbConnect();
        if($db)
        {
            $sql = "SELECT * FROM rayon LEFT JOIN livre ON rayon.id = livre.idRayon";

            $result = $db ->prepare($sql);

            $result -> execute();

            $results = $result ->fetchAll();

            return $results;
        }
    }

    public function deleteLivre ()
    {
        $db = $this ->dbConnect();
        $id = $_GET['id'];
        if($db)
        {
            $sql = "DELETE FROM livre WHERE id = $id";
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
        $id = $_GET['id'];
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

    public function updateLivre ()
    {
        $db = $this -> dbConnect();
        $id = $_GET['id'];
        if($db)
        {
            $titre = htmlspecialchars($_POST['titre']);
            $auteur = htmlspecialchars($_POST['auteur']);
            $disponible = htmlspecialchars($_POST['disponible']);
            $idRayon = htmlspecialchars($_POST['idRayon']);
            $sql = "UPDATE livre SET 
                    titre       = ?,
                    auteur      = ?,
                    disponible  = ?,
                    idRayon     = ?
                    WHERE id = $id";

            $result =$db ->prepare($sql);

            $results = $result ->execute([$titre,$auteur,$disponible,$idRayon]);

            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }

    public function createLivre ()
    {
        $db = $this -> dbConnect();
        $titre = htmlspecialchars($_POST['titre']);
        $auteur = htmlspecialchars($_POST['auteur']);
        $disponible = true;
        $idRayon = intval($_POST['idRayon']);
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