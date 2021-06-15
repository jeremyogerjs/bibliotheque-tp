<?php
require_once('./models/Manager.php');

class Rayon extends Manager
{
    public function getAllRayon ()
    {
        $db = $this ->dbConnect();

        if($db)
        {
            $sql = "SELECT * FROM rayon";

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
    public function getSingleRayon ()
    {
        $db = $this -> dbConnect();
        $id = $_GET['id'];
        if($db)
        {
            $sql = "SELECT (nom) FROM rayon WHERE id = $id";

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
    public function updateRayon ()
    {
        $db = $this -> dbConnect();
        $id = $_GET['id'];
        if($db)
        {
            $nom = htmlspecialchars($_POST['nom']);

            $sql = "UPDATE rayon SET (nom) VALUES (?) WHERE id = $id";
            $result = $db ->prepare($sql);

            $results = $result -> execute([$nom]);

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