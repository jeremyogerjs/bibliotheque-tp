<?php

require('./models/EmpruntManager.php');

class EmpruntController extends Emprunt
{
    public function allEmprunt ()
    {
        if($this -> getAllEmprunt())
        {
            $results = $this ->getAllEmprunt();

            require('./views/listes/listeEmprunt.php');
        }
        else
        {
            $results = $this ->getAllEmprunt();
            require('./views/listes/listeEmprunt.php');
        }
    }
    public function singleEmprunt()
    {
        if(isset($_GET['id']) && $_GET['id'] >= 0)
        {
            $results = $this -> getSingleEmprunt();
            require('./views/singles/singleEmprunt.php');
        }
    }
    public function createEmprunt ()
    {
        if(!empty($_POST))
        {
            $results = $this -> addEmprunt();
            if($results)
            {
                $this -> addEmpruntAdherent();
                $this -> updateEmpruntLivre(false);
                header("location:index.php?action=list&target=emprunt");
            }
            else
            {
                require('./views/forms/formEmprunt.php');
            }
        }
        else
        {
            $optionsAdherent = $this -> getEmpruntAdherent();
            $optionsLivre = $this -> getEmpruntLivre();
            require('./views/forms/formEmprunt.php');
        }
    }
    public function updateEmprunt()
    {
        if(!empty($_POST))
        {
            $results = $this -> modifyEmprunt ();
            header("location:index.php?action=list&target=emprunt");

        }
        else
        {
            $optionsAdherent = $this -> getEmpruntAdherent();
            $optionsLivre = $this -> getEmpruntLivre();
            $results = $this -> getSingleEmprunt();
            require('./views/forms/formEmprunt.php');
        }
    }
    public function deleteEmprunt()
    {

            $this -> subEmpruntAdherent();
            $this -> updateEmpruntLivre(true);
            $this -> delEmprunt();
            header("location:index.php?action=list&target=emprunt");
        
    }
}