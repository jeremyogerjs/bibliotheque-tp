<?php
require_once('./models/Manager.php');

class Livre extends Manager
{
    public function getLivre ()
    {
        $db = $this -> dbConnect();

        if($db)
        {
            $sql = "SELECT * FROM livre";

            $result = $db ->prepare($sql);

            $result -> execute();

            $results = $result ->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        }
    }

    public function deleteLivre ($id)
    {
        $db = $this ->dbConnect();

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

    public function getSingleLivre ($id)
    {
        $db = $this -> dbConnect();

        if($db)
        {
            $sql = "SELECT * FROM livre WHERE id = $id";

            $result = $db -> prepare($sql);

            $result -> execute();

            $results = $result ->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }

    public function updateLivre ($id)
    {
        $db = $this -> dbConnect();

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

        if($db)
        {
            $titre = htmlspecialchars($_POST['titre']);
            $auteur = htmlspecialchars($_POST['auteur']);
            $disponible = htmlspecialchars($_POST['disponible']);
            $idRayon = htmlspecialchars($_POST['idRayon']);

            $sql = "INSERT INTO livre (titre,auteur,disponible,idRayon)
                    VALUES (?, ?, ?, ?)";
            
            $result = $db -> prepare($sql);

            $result -> execute([$titre, $auteur, $disponible, $idRayon]);
        }
    }
}