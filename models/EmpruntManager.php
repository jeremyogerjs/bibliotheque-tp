<?php
require_once('./models/Manager.php');


class Emprunt extends Manager
{
    public function getAllEmprunt()
    {
        $db = $this -> dbConnect();

        if($db)
        {
            $sql = "SELECT * FROM emprunt LEFT JOIN livre ON emprunt.idLivre = livre.id LEFT JOIN adherent ON emprunt.idAdherent = adherent.id";
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
    public function updateEmprunt ()
    {
        $db = $this -> dbConnect();
        $id = $_GET['id'];
        $idLivre = htmlspecialchars($_POST['idLivre']);
        $idAdherent = htmlspecialchars($_POST['idAdherent']);
        $dateEmprunt = htmlspecialchars($_POST['dateEmprunt']);
        $dateRetourMax = htmlspecialchars($_POST['dateRetourMax']);
        $dateRetour = htmlspecialchars($_POST['dateRetour']);

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
            $dateEmprunt = htmlspecialchars($_POST['dateEmprunt']);
            $dateRetourMax = htmlspecialchars($_POST['dateRetourMax']);
            $dateRetour = htmlspecialchars($_POST['dateRetour']);

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

    public function deleteEmprunt ($id)
    {
        $db = $this -> dbConnect();

        if($db)
        {
            $sql = "DELETE FROM emprunt WHERE id =$id";
            $db ->exec($sql);

            return "deleted success !";
        }
    }
}