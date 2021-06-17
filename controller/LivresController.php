<?php

require ('./models/LivreManager.php');


class LivresController extends Livre
{
    public function AllLivre ()
    {
        $results = $this -> getLivre();

        require ('./views/listes/listeLivre.php');
    }

    public function deleteLivre ()
    {
        if(isset($_GET['id']) && $_GET['id'] >=0 )
        {
            $this -> delLivre();
            echo "deleted succes !!";
            header("location:index.php?action=list&target=livre"); 
        }
    }
    public function addLivre ()
    {
        if(!empty($_POST))
        {
            $results = $this -> createLivre();
            header("location:index.php?action=list&target=livre");
        }
        else
        {
            $options = $this -> getRayons();
            require('./views/forms/formLivre.php');
        }
    }
    public function updateLivre ()
    {
        if(!empty($_POST) && isset($_GET['id']) && $_GET['id'] >= 0)
        {
            $test = $this -> modifyLivre();
            header("location:index.php?action=list&target=livre");
        }
        else
        {
            $options = $this -> getRayons();
            $results = $this -> getLivreRayon();
            require('./views/forms/formLivre.php');
        }
    }
    public function singleLivre ()
    {
        if(isset($_GET['id']) && $_GET['id'] >= 0)
        {
            $results = $this -> getSingleLivre();
            require('./views/singles/singleLivre.php');
        }
    }
    public function searchLivre()
    {
        $results = $this -> searchLivres();
        require('./views/listes/listeLivre.php');
    }
}