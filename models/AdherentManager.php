<?php
require_once('./models/Manager.php');
class Adherent extends Manager
{
    public function getAllAdherent ()
    {
        $db = $this -> dbConnect();
        if($db)
        {
            $sql = "SELECT * FROM adherent";

            $result = $db -> prepare($sql);

            $result -> execute();

            $results = $result -> fetchAll();

            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }

    public function getSingleAdherent ()
    {
        $db = $this -> dbConnect();
        $id = $_GET['id'];
        if($db)
        {
            $sql = "SELECT * FROM adherent WHERE id = $id";
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

    public function updateAdherent ($id)
    {
        $db = $this -> dbConnect();

        if($db)
        {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $nbLivreEmprunt = htmlspecialchars($_POST['nbLivreEmprunt']);

            $sql = "UPDATE adherent SET (nom, prenom, nbLivreEmprunt)
                    VALUES (?, ?, ?) WHERE id = $id";
            $result = $db ->prepare($sql);

            $results = $result ->execute([$nom,$prenom,$nbLivreEmprunt]);

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