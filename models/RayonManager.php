<?php
require_once('./models/Manager.php');

class Rayon extends Manager
{
    private $_id;
    private $_nom;
    
    //setters
    private function setId ($id)
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
    private function setNom ($nom)
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

    //methods
    public function getAllRayon ()
    {
        $db = $this ->dbConnect();

        if($db)
        {
            return $this -> getAll("rayon",$db);
        }
        else
        {
            http_response_code(500);
        }
    }
    public function getSingleRayon ()
    {
        $db = $this -> dbConnect();
        if($db)
        {
            return $this -> getSingle("rayon",$db);
        }
        else
        {
            http_response_code(500);
        }
    }
    public function modifyRayon ()
    {
        $db = $this -> dbConnect();
        if($db)
        {
            $id = $this -> setId($_GET['id']);
            $nom = $this -> setNom($_POST['nom']);

            $sql = "UPDATE rayon SET nom = ? WHERE id = ?";
            $result = $db ->prepare($sql);
            $results = $result -> execute([$nom,$id]);

            return $results;

        }
        else
        {
            http_response_code(500);
        }
    }
    public function addRayon ()
    {
        $db = $this -> dbConnect();
        if($db)
        {
            $nom = $this -> setNom($_POST['nom']);
            $sql = "INSERT INTO rayon (nom) VALUES (?) ";

            $result = $db -> prepare($sql);

            $results = $result -> execute([$nom]);

            return $results;
        }
    }
    public function delRayon ()
    {
        $db = $this -> dbConnect();
        $id = $this -> setId($_GET['id']);
        if($db)
        {
            $sql = "DELETE FROM rayon WHERE id = $id";

            $result = $db -> exec($sql);
            return $result;
        }
        else
        {
            http_response_code(500);
        }
    }
}