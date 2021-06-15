<?php

require('./models/EmpruntManager.php');

class EmpruntController 
{
    private $model;

    public function __construct()
    {
        $this -> loadModel();
    }
    public function loadModel ()
    {

        $this -> model = new Emprunt();
    }
    public function allEmprunt ()
    {
        if($this -> model -> getAllEmprunt())
        {
            $results = $this -> model ->getAllEmprunt();

            require('./views/listes/listeEmprunt.php');
        }
        else
        {
            $results = $this -> model ->getAllEmprunt();
            var_dump($results);
        }
    }
    public function singleEmprunt()
    {
        if(isset($_GET['id']) && $_GET['id'] >= 0)
        {
            $results = $this -> model -> getSingleEmprunt();
            require('./views/singles/singleEmprunt.php');
        }
    }
    public function createEmprunt ()
    {
        if(!empty($_POST))
        {
            $results = $this -> model -> createEmprunt();
            //header("location:index.ph?action=list&target=emprunt");
            require('./views/forms/formEmprunt.php');
        }
        else
        {
            $optionsAdherent = $this -> model -> getEmpruntAdherent();
            $optionsLivre = $this -> model -> getEmpruntLivre();
            require('./views/forms/formEmprunt.php');
        }
    }
}