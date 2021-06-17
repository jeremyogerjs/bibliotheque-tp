<?php
require ('./models/RayonManager.php');


class RayonController extends Rayon
{
    public function getAllRy ()
    {
        $results = $this -> getAllRayon();
        require ('./views/listes/listeRayon.php');
    }
    public function getOne ()
    {
        if(isset($_GET['id']) && $_GET['id'] >=0)
        {
            $results = $this -> getSingleRayon();
            require('./views/singles/singleRayon.php');

        }
    }
    public function createRayon ()
    {
        if(!empty($_POST))
        {
            $this -> addRayon();
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
            
            $this -> modifyRayon();
            header("location:index.php?action=list&target=rayon&id=5");
        }
        else
        {
            $results = $this -> getSingleRayon();
            require('./views/forms/formRayon.php');
        }
    }
    public function deleteRayon ()
    {
        if(isset($_GET['id']) && $_GET['id'] >= 0)
        {
            $this -> delRayon();
            header("location:index.php?action=list&target=rayon");
        }
    }
}