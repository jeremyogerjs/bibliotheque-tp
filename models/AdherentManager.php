<?php
require_once('./models/Manager.php');
class Adherent extends Manager
{
    private $_id;
    private $_nom;
    private $_prenom;
    private $_nbLivreEmprunt;

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
    private function setNom($nom)
    {
        if(isset($nom))
        {
            return $this -> _nom = htmlspecialchars($nom);
        }
        else
        {
            return false;
        }
    }
    private function setPrenom($prenom)
    {
        if(isset($prenom))
        {
            return $this -> _prenom = htmlspecialchars($prenom);
        }
        else
        {
            return false;
        }
    }
    private function setNbLivreEmprunt($nbLivreEmprunt)
    {
        if(isset($nbLivreEmprunt))
        {
            return $this -> _nbLivreEmprunt = $nbLivreEmprunt;
        }
        else
        {
            return false;
        }
    }
    //methods
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

    public function modifyAdherent ()
    {
        $db = $this -> dbConnect();
        $id = $this -> setId($_GET['id']);
        if($db)
        {
            $nom = $this -> setNom($_POST['nom']);
            $prenom = $this -> setPrenom($_POST['prenom']);
            $nbLivreEmprunt = $this -> setNbLivreEmprunt($_POST['nbLivreEmprunt']);

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
            $nom = $this -> setNom($_POST['nom']);
            $prenom = $this -> setPrenom($_POST['prenom']);

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
    public function delAdherent ()
    {
        $db = $this -> dbConnect();
        $id = $this -> setId($_GET['id']);
        if($db)
        {
            $sql = "DELETE FROM adherent WHERE id = $id";

            $result = $db -> exec($sql);

            return $result;
        }
        else
        {
            http_response_code(500);
        }
    }
}