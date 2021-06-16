<?php

require ('./models/LivreManager.php');


class LivresController
{
    private $model;

    public function __construct()
    {
        $this -> loadModel();
    }
    public function loadModel ()
    {

        $this -> model = new Livre();
    }
    public function AllLivre ()
    {
        $results = $this -> model -> getLivre();

        require ('./views/listes/listeLivre.php');
    }

    public function deleteLivre ()
    {
        if(isset($_GET['id']) && $_GET['id'] >=0 )
        {
            $this -> model -> deleteLivre();
            echo "deleted succes !!";
            header("location:index.php?action=list&target=livre"); 
        }
    }
    public function addLivre ()
    {
        if(!empty($_POST))
        {
            $results = $this -> model -> createLivre();
            header("location:index.php?action=list&target=livre");
        }
        else
        {
            $options = $this -> model -> getRayons();
            require('./views/forms/formLivre.php');
        }
    }
    public function updateLivre ()
    {
        if(!empty($_POST) && isset($_GET['id']) && $_GET['id'] >= 0)
        {
            $test = $this -> model -> updateLivre();
            header("location:index.php?action=list&target=livre");
        }
        else
        {
            $options = $this -> model -> getRayons();
            $results = $this -> model -> getLivreRayon();
            require('./views/forms/formLivre.php');
        }
    }
    public function singleLivre ()
    {
        if(isset($_GET['id']) && $_GET['id'] >= 0)
        {
            $results = $this -> model -> getSingleLivre();
            require('./views/singles/singleLivre.php');
        }
    }
}