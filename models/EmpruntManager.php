<?php
require_once('./models/Manager.php');


class Emprunt extends Manager
{
    public function getAllEmprunt()
    {
        $db = $this -> dbConnect();
        if($db)
        {
            //renvoie mauvaise ID == ID du dernier join
            $sql = "SELECT * FROM emprunt INNER JOIN adherent ON emprunt.idAdherent = adherent.id INNER  JOIN livre ON emprunt.idLivre = livre.id";
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
            $sql = "SELECT * FROM emprunt LEFT JOIN adherent ON emprunt.idAdherent = adherent.id
            LEFT JOIN livre ON emprunt.idLivre = livre.id WHERE emprunt.id = $id";

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
    public function updateEmpruntAdherent ()
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
    public function updateEmpruntLivre ()
    {
        $db = $this -> dbConnect();
        $id = $_POST['idLivre'];
        if($db)
        {
            $sql = "UPDATE livre SET disponible = false WHERE id = $id";

            $result = $db ->prepare($sql);

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