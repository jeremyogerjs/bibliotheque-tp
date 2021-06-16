<?php
require_once('./models/Manager.php');
class Adherent extends Manager
{
    public function getAllAdherent ()
    {
        $db = $this -> dbConnect();
        if($db)
        {
            return $this -> getAll("adherent",$db);
        }
        else
        {
            http_response_code(500);
        }
    }

    public function getSingleAdherent ()
    {
        $db = $this -> dbConnect();

        if($db)
        {
            return $this -> getSingle("adherent",$db);
        }
        else
        {
            http_response_code(500);
        }
    }

    public function updateAdherent ()
    {
        $db = $this -> dbConnect();
        $id = $_GET['id'];
        if($db)
        {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $nbLivreEmprunt = htmlspecialchars($_POST['nbLivreEmprunt']);

            $sql = "UPDATE adherent SET nom = ? , prenom = ?, nbLivreEmprunt = ?)
                    WHERE id = ?";
            $result = $db ->prepare($sql);

            $results = $result ->execute([$nom,$prenom,$nbLivreEmprunt,$id]);

            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }

    public function createAdherent ()
    {
        $db = $this -> dbConnect();
        if($db)
        {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);

            $sql = "INSERT INTO adherent (nom,prenom)
                    VALUES (?, ?)";

            $result = $db -> prepare($sql);

            $results = $result -> execute([$nom,$prenom]);

            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }
    public function deleteAdherent ()
    {
        $db = $this -> dbConnect();
        $id = $_GET['id'];
        if($db)
        {
            $sql = "DELETE FROM adherent WHERE id = $id";

            $db -> exec($sql);

            return "deleted success !";
        }
        else
        {
            http_response_code(500);
        }
    }
}