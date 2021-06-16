<?php
require_once('./models/Manager.php');


class Emprunt extends Manager
{
    public function getAllEmprunt()
    {
        $db = $this -> dbConnect();
        if($db)
        {
            $sql = "SELECT e.dateRetour, e.dateRetourMax,e.dateRetour,l.titre,a.nom,a.prenom,e.id,e.dateEmprunt
                    FROM emprunt AS e INNER JOIN adherent AS a ON e.idAdherent = a.id INNER JOIN livre AS l ON e.idLivre = l.id";
            $result = $db ->prepare($sql);

            $result ->execute();

            $results = $result ->fetchAll();

            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }
    public function getEmpruntAdherent ()
    {
        $db = $this -> dbConnect();
        if($db)
        {
            $sql = "SELECT * FROM adherent HAVING nbLivreEmprunt < 5";

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
    public function getEmpruntLivre ()
    {
        $db = $this -> dbConnect();
        if($db)
        {
            $sql = "SELECT * FROM livre HAVING disponible = 1";

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
    public function getSingleEmprunt ()
    {
        $db = $this -> dbConnect();
        $id = $_GET['id'];
        if($db)
        {
            $sql = "SELECT e.dateRetour, e.dateRetourMax,e.dateRetour,l.titre,a.nom,a.prenom,e.id,e.dateEmprunt,a.nbLivreEmprunt
                    FROM emprunt AS e INNER JOIN adherent AS a ON e.idAdherent = a.id INNER JOIN livre AS l ON e.idLivre = l.id WHERE e.id = $id";

            $result = $db -> prepare($sql);

            $result -> execute();

            $results = $result -> fetch();
            
            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }
    public function addEmpruntAdherent ()
    {
        $db = $this -> dbConnect();
        $id = $_POST['idAdherent'];
        if($db)
        {
            $sql = "UPDATE adherent SET nbLivreEmprunt = nbLivreEmprunt +1 WHERE id = $id";

            $result = $db -> prepare($sql);

            $results = $result -> execute();

            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }
    public function subEmpruntAdherent ()
    {
        $db = $this -> dbConnect();
        $id = $_GET['id'];
        if($db)
        {
            $sql = "UPDATE adherent AS a , emprunt AS e  SET a.nbLivreEmprunt = a.nbLivreEmprunt -1 WHERE e.id = $id AND  e.idAdherent = a.id";

            $result = $db -> prepare($sql);

            $results = $result -> execute();

            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }
    public function updateEmpruntLivre ($val)
    {
        $db = $this -> dbConnect();
        $id = $_GET['id'];
        if($db)
        {
        $sql = "UPDATE livre AS l , emprunt AS e SET l.disponible = :dispo WHERE l.id = e.idLivre";

            $result = $db ->prepare($sql);
            $result ->bindParam(':dispo',$val, PDO::PARAM_BOOL);
            $results = $result ->execute();

            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }
    public function updateEmprunt ()
    {
        $db = $this -> dbConnect();
        $id = $_GET['id'];
        $idLivre = htmlspecialchars($_POST['idLivre']);
        $idAdherent = htmlspecialchars($_POST['idAdherent']);
        $dateEmprunt = htmlspecialchars($_POST['dateEmprunt']);
        $dateRetourMax = htmlspecialchars($_POST['dateRetourMax']);
        $dateRetour = empty($_POST['dateRetour']) ? NULL : $_POST['dateRetour']; // marche pas

        if($db)
        {
            $sql = "UPDATE emprunt SET
                    idLivre         = ?,
                    idAdherent      = ?,
                    dateEmprunt     = ?,
                    dateRetourMax   = ?,
                    dateRetour      = ?
                    WHERE id = $id";
            
            $result = $db -> prepare($sql);

            $results = $result -> execute([$idLivre, $idAdherent, $dateEmprunt, $dateRetourMax, $dateRetour]);

            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }
    public function createEmprunt ()
    {
        $db = $this -> dbConnect();

        if($db)
        {
            $idLivre = htmlspecialchars($_POST['idLivre']);
            $idAdherent = htmlspecialchars($_POST['idAdherent']);
            //format Date
            $week = 3;
            $dateEmprunt = htmlspecialchars($_POST['dateEmprunt']);
            $dateTime = DateTime::createFromFormat("Y-m-d",$dateEmprunt);
            $dateTime -> add(DateInterval::createFromDateString($week .'weeks'));
            $dateRetourMax = $dateTime -> format("Y-m-d");
            $dateRetour = empty($_POST['dateRetour']) ? NULL : htmlspecialchars($_POST['dateRetour']);

            $sql = "INSERT INTO emprunt (idLivre,idAdherent,dateEmprunt,dateRetourMax,dateRetour)
                    VALUES (?, ?, ?, ?, ?)";

            $result = $db ->prepare($sql);

            $results = $result -> execute([$idLivre, $idAdherent, $dateEmprunt, $dateRetourMax, $dateRetour]);

            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }

    public function deleteEmprunt ()
    {
        $db = $this -> dbConnect();
        $id = $_GET['id'];
        if($db)
        {
            $sql = "DELETE FROM emprunt WHERE id =$id";
            $db ->exec($sql);

            return "deleted success !";
        }
        else
        {
            http_response_code(500);
        }
    }
}