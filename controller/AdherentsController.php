<?php

require_once('./models/AdherentManager.php');



class AdherentController
{
    private $model;

    public function __construct()
    {
        $this -> loadModel();
    }
    public function loadModel ()
    {

        $this -> model = new Adherent();
    }
    public function getAllAd ()
    {
        $results = $this -> model ->getAllAdherent();

        require ('./views/listes/listeAdherent.php');
    }

    public function addAdherent ()
    {
        if($this -> model)
        {
            if(!empty($_POST))
            {
                $this -> model -> createAdherent();
                header("location:index.php?action=list&target=adherent");
            }
            else
            {
                require('./views/forms/formAdherent.php');
            }
        }
    }
    public function singleAdherent ()
    {
        if(isset($_GET['id']) && $_GET['id'] >= 0)
        {
            $results = $this -> model -> getSingleAdherent();
            require('./views/singles/singleAdherent.php');
        }
    }
    public function deleteAdherent ()
    {
        if(isset($_GET['id']) && $_GET['id'] >= 0)
        {
            $this -> model -> deleteAdherent();
            header("location:index.php?action=list&target=adherent");
        }
    }
    public function updateAdherent ()
    {
        if(!empty($_POST))
        {
            if(isset($_GET['id']) && $_GET['id'] >= 0)
            {
                $this -> model -> updateAdherent();
                header("location:index.php?action=list&target=adherent");
            }
        }
        else
        {
            $results = $this -> model -> getSingleAdherent();
            require('./views/forms/formAdherent.php');
        }
    }
}