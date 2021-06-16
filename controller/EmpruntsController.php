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
            $this -> model -> updateEmpruntAdherent();
            $this -> model -> updateEmpruntLivre();
            header("location:index.php?action=list&target=emprunt");
        }
        else
        {
            $optionsAdherent = $this -> model -> getEmpruntAdherent();
            $optionsLivre = $this -> model -> getEmpruntLivre();
            require('./views/forms/formEmprunt.php');
        }
    }
    public function updateEmprunt()
    {
        if(!empty($_POST))
        {
            $results = $this -> model -> updateEmprunt ();
            header("location:index.php?action=list&target=emprunt");

        }
        else
        {
            $optionsAdherent = $this -> model -> getEmpruntAdherent();
            $optionsLivre = $this -> model -> getEmpruntLivre();
            $results = $this -> model -> getSingleEmprunt();
            require('./views/forms/formEmprunt.php');
        }
    }
    public function deleteEmprunt()
    {
        $this -> model -> deleteEmprunt();
        header("location:index.php?action=list&target=emprunt");

    }
}