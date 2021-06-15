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

            require ('./views/listes/listeEmprunt.php');
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
}