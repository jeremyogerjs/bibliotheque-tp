<?php

require_once('./models/AdherentManager.php');



class AdherentController extends Adherent
{
    public function getAllAd ()
    {
        $results = $this ->getAllAdherent();

        require ('./views/listes/listeAdherent.php');
    }

    public function addAdherent ()
    {

            if(!empty($_POST))
            {
                $this -> createAdherent();
                header("location:index.php?action=list&target=adherent");
            }
            else
            {
                require('./views/forms/formAdherent.php');
            }
 
    }
    public function singleAdherent ()
    {
        if(isset($_GET['id']) && $_GET['id'] >= 0)
        {
            $results = $this -> getSingleAdherent();
            require('./views/singles/singleAdherent.php');
        }
    }
    public function deleteAdherent ()
    {
        if(isset($_GET['id']) && $_GET['id'] >= 0)
        {
            $this -> delAdherent();
            header("location:index.php?action=list&target=adherent");

        }
    }
    public function updateAdherent ()
    {
        if(!empty($_POST))
        {
            if(isset($_GET['id']) && $_GET['id'] >= 0)
            {
                $this -> modifyAdherent();
                header("location:index.php?action=list&target=adherent");
            }
        }
        else
        {
            $results = $this -> getSingleAdherent();
            require('./views/forms/formAdherent.php');
        }
    }
}