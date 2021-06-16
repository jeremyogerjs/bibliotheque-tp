<?php
require_once('./models/Manager.php');

class Rayon extends Manager
{
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
    public function updateRayon ()
    {
        $db = $this -> dbConnect();
        if($db)
        {
            $id = $_GET['id'];
            $nom = htmlspecialchars($_POST['nom']);

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
    public function createRayon ()
    {
        $db = $this -> dbConnect();
        if($db)
        {
            $nom = htmlspecialchars($_POST['nom']);
            $sql = "INSERT INTO rayon (nom) VALUES (?) ";

            $result = $db -> prepare($sql);

            $results = $result -> execute([$nom]);

            return $results;
        }
    }
    public function deleteRayon ()
    {
        $db = $this -> dbConnect();
        $id = $_GET['id'];
        if($db)
        {
            $sql = "DELETE FROM rayon WHERE id = $id";

            $db -> exec($sql);

        }
        else
        {
            http_response_code(500);
        }
    }
}