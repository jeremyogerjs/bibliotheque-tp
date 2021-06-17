<?php
require_once('./models/Manager.php');


class Emprunt extends Manager
{
    private $_id;
    private $_idLivre;
    private $_idAdherent;
    private $_dateEmprunt;
    private $_dateRetourMax;
    private $_dateRetour;
    private $db;
    

    //getter
    private function getDb ()
    {
        return $this -> db = $this ->dbConnect();
    }
    //Setter
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
    private function setIdLivre($idLivre)
    {
        if(isset($idLivre))
        {
            return $this -> _idLivre = $idLivre;
        }
        else
        {
            return false;
        }
    }
    private function setIdAdherent($idAdherent)
    {
        if(isset($idAdherent))
        {
            return $this -> _idAdherent = $idAdherent;
        }
        else
        {
            return false;
        }
    }
    private function setDateEmprunt($dateEmprunt)
    {
        if(strtotime($dateEmprunt))
        {
            return $this -> _dateEmprunt = htmlspecialchars($dateEmprunt); // ajouter test SI DATEEMPRUNT >= DATENOW
        }
        else
        {
            return false;
        }
    }
    private function setDateRetourMax($dateRetourMax)
    {
        if(strtotime($dateRetourMax))
        {
            $week = 3;
            $dateTime = DateTime::createFromFormat("Y-m-d",$dateRetourMax);
            $dateTime -> add(DateInterval::createFromDateString($week .'weeks'));
            return $this -> _dateRetourMax = htmlspecialchars($dateTime -> format("Y-m-d"));
        }
        else
        {
            return false;
        }
    }
    private function setDateRetour($dateRetour)
    {
        if(isset($dateRetour))
        {
            return $this -> _dateRetour = htmlspecialchars($dateRetour);
        }
        else
        {
            return false;
        }
    }
    //getters
    private function getDateEmprunt()
    {
        return $this -> _dateEmprunt;
    }
    //methods
    public function getAllEmprunt()
    {

        if($this -> getDb())
        {
            $sql = "SELECT e.dateRetour, e.dateRetourMax,e.dateRetour,l.titre,a.nom,a.prenom,e.id,e.dateEmprunt
                    FROM emprunt AS e INNER JOIN adherent AS a ON e.idAdherent = a.id INNER JOIN livre AS l ON e.idLivre = l.id";
            $result = $this -> getDb() ->prepare($sql);

            $result ->execute();

            $results = $result ->fetchAll();

            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }
    public function getAllEmpruntDispo()
    {

        if($this -> getDb())
        {
            $sql = "SELECT e.dateRetour, e.dateRetourMax,e.dateRetour,l.titre,a.nom,a.prenom,e.id,e.dateEmprunt
                    FROM emprunt AS e INNER JOIN adherent AS a ON e.idAdherent = a.id INNER JOIN livre AS l ON e.idLivre = l.id HAVING l.disponible = true";
            $result = $this -> getDb() ->prepare($sql);

            $result ->execute();

            $results = $result ->fetchAll();

            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }
    public function getAllEmpruntIndispo()
    {

        if($this -> getDb())
        {
            $sql = "SELECT e.dateRetour, e.dateRetourMax,e.dateRetour,l.titre,a.nom,a.prenom,e.id,e.dateEmprunt
                    FROM emprunt AS e INNER JOIN adherent AS a ON e.idAdherent = a.id INNER JOIN livre AS l ON e.idLivre = l.id HAVING l.disponible = false";
            $result = $this -> getDb() ->prepare($sql);

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
        
        if($this ->getDb())
        {
            $sql = "SELECT * FROM adherent HAVING nbLivreEmprunt < 5";

            $result = $this ->getDb() -> prepare($sql);
    
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
        
        if($this ->getDb())
        {
            $sql = "SELECT * FROM livre HAVING disponible = 1";

            $result = $this ->getDb() -> prepare($sql);
    
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
        
        $id = $this -> setId($_GET['id']);
        if($this ->getDb())
        {
            $sql = "SELECT e.dateRetour, e.dateRetourMax,e.dateRetour,l.titre,a.nom,a.prenom,e.id,e.dateEmprunt,a.nbLivreEmprunt
                    FROM emprunt AS e INNER JOIN adherent AS a ON e.idAdherent = a.id INNER JOIN livre AS l ON e.idLivre = l.id WHERE e.id = $id";

            $result = $this ->getDb() -> prepare($sql);

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
        
        $id = $this -> setId($_POST['idAdherent']);
        if($this ->getDb())
        {
            $sql = "UPDATE adherent SET nbLivreEmprunt = nbLivreEmprunt +1 WHERE id = $id";

            $result = $this ->getDb() -> prepare($sql);

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
        
        $id = $this -> setId($_GET['id']);
        if($this ->getDb())
        {
            $sql = "UPDATE adherent AS a , emprunt AS e  SET a.nbLivreEmprunt = a.nbLivreEmprunt -1 WHERE e.id = $id AND  e.idAdherent = a.id";

            $result = $this ->getDb() -> prepare($sql);

            $results = $result -> execute();

            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }
    public function searchEmprunt()
    {
        $search = $_POST['search'];
        $sql = "SELECT e.dateRetour, e.dateRetourMax,e.dateRetour,l.titre,a.nom,a.prenom,e.id,e.dateEmprunt
        FROM emprunt AS e INNER JOIN adherent AS a ON e.idAdherent = a.id INNER JOIN livre AS l ON e.idLivre = l.id WHERE l.titre LIKE ? OR a.nom LIKE ? OR a.prenom LIKE ?";

        $result = $this ->dbConnect() ->prepare($sql);

        $result ->execute(["%$search%","%$search%","%$search%"]);

        $results = $result ->fetchAll();

        return $results;
    }
    public function updateEmpruntLivre ($val)
    {
        
       // $id = $this -> setId($_GET['id']);
        if($this ->getDb())
        {
            $sql = "UPDATE livre AS l , emprunt AS e SET l.disponible = :dispo WHERE l.id = e.idLivre";

            $result = $this ->getDb() ->prepare($sql);
            $result ->bindParam(':dispo',$val, PDO::PARAM_BOOL);
            $results = $result ->execute();

            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }
    public function modifyEmprunt ()
    {
        
        $id = $this -> setId($_GET['id']);
        $idLivre = $this -> setIdLivre($_POST['idLivre']);
        $idAdherent = $this -> setIdAdherent($_POST['idAdherent']);
        $dateEmprunt = $this ->setDateEmprunt($_POST['dateEmprunt']);
        $dateRetourMax = $this ->setDateRetourMax($_POST['dateRetourMax']);
        $dateRetour = $this -> setDateRetour($_POST['dateRetour']); 

        if($this ->getDb())
        {
            $sql = "UPDATE emprunt SET
                    idLivre         = ?,
                    idAdherent      = ?,
                    dateEmprunt     = ?,
                    dateRetourMax   = ?,
                    dateRetour      = ?
                    WHERE id = $id";
            
            $result = $this ->getDb() -> prepare($sql);

            $results = $result -> execute([$idLivre, $idAdherent, $dateEmprunt, $dateRetourMax, $dateRetour]);

            return $results;
        }
        else
        {
            http_response_code(500);
        }
    }
    public function addEmprunt ()
    {
        

        if($this ->getDb())
        {
            $idLivre =  $this -> setIdLivre($_POST['idLivre']);
            $idAdherent = $this -> setIdAdherent($_POST['idAdherent']);
            $dateEmprunt = $this ->setDateEmprunt($_POST['dateEmprunt']);
            $dateRetourMax = $this ->setDateRetourMax($this -> getDateEmprunt());
            $dateRetour = $this -> setDateRetour($_POST['dateRetour']);

            $sql = "INSERT INTO emprunt (idLivre,idAdherent,dateEmprunt,dateRetourMax,dateRetour)
                    VALUES (?, ?, ?, ?, ?)";

            $result = $this ->getDb() ->prepare($sql);

            $results = $result -> execute([$idLivre, $idAdherent, $dateEmprunt, $dateRetourMax, $dateRetour]);

            return $results;
        }
        else
        {
            throw new Exception("erreur lros de la cr&ation d'un emprunt !");
        }
    }

    public function delEmprunt ()
    {
        
        $id = $this -> setId($_GET['id']);
        if($this ->getDb())
        {
            $sql = "DELETE FROM emprunt WHERE id =$id";
            $this ->getDb() ->exec($sql);
            return;
        }
        else
        {
            http_response_code(500);
        }
    }
}