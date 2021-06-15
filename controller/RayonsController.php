<?php
require ('./models/RayonManager.php');


class RayonController
{
    private $model;

    public function __construct()
    {
        $this -> loadModel();
    }
    public function loadModel ()
    {
        $this -> model = new Rayon();
    }
    public function getAllRy ()
    {
        $results = $this -> model -> getAllRayon();
        require ('./views/listes/listeRayon.php');
    }
    public function getOne ()
    {
        if(isset($_GET['id']) && $_GET['id'] >=0)
        {
            $results = $this -> model -> getSingleRayon();
            require('./views/singles/singleRayon.php');

        }
    }
    public function createRayon ()
    {
        if(!empty($_POST))
        {
            $this -> model -> createRayon();
            header("location:index.php?action=list&target=rayon");
        }
        else
        {
            require('./views/forms/formRayon.php');
        }
    }
    public function updateRayon ()
    {
        if(!empty($_POST))
        {
            $this -> model -> updateRayon();
            header("location:index.php?action=list&target=rayon");
        }
        else
        {
            require('./views/forms/formRayon.php');
        }
    }
    public function deleteRayon ()
    {
        if(isset($_GET['id']) && $_GET['id'] >= 0)
        {
            $this -> model -> deleteRayon();
            header("location:index.php?action=list&target=rayon");
        }
    }
}