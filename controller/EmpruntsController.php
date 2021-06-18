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
                $this -> updateEmpruntLivreIndispo(false);
                header("location:index.php?action=list&target=emprunt&actioned=create&statut=success");
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
            if($results)
            {
                header("location:index.php?action=list&target=emprunt&actioned=update&statut=success");
            }
            else
            {
                $optionsAdherent = $this -> getEmpruntAdherent();
                $optionsLivre = $this -> getEmpruntLivre();
                $results = $this -> getSingleEmprunt();
                require('./views/forms/formEmprunt.php');
            }

        }
        else
        {
            $optionsAdherent = $this -> getEmpruntAdherent();
            $optionsLivre = $this -> getEmpruntLivre();
            $results = $this -> getSingleEmprunt();
            require('./views/forms/formEmprunt.php');
        }
    }
    public function EmpruntValidation ()
    {
        if(!empty($_POST))
        {
            $this -> validateEmprunt();
            header("location:index.php?action=list&target=emprunt&actioned=validated&statut=success");
        }
        else
        {
            $results = $this -> getSingleEmprunt();
            require('./views/forms/formValidationEmprunt.php');
        }
    }
    public function EmpruntDispo ()
    {
        $results = $this -> getAllEmpruntDispo();

        require('./views/listes/listeEmprunt.php');

    }
    public function empruntIndispo ()
    {
        $results = $this -> getAllEmpruntIndispo();

        require('./views/listes/listeEmprunt.php');

    }
    public function deleteEmprunt()
    {
        $this -> delEmprunt();
        $this -> subEmpruntAdherent();
        $this -> updateEmpruntLivreDispo(true);
        
        header("location:index.php?action=list&target=emprunt&actioned=delete&statut=success");
    }
    public function search()
    {
        $results = $this -> searchEmprunt();
        require('./views/listes/listeEmprunt.php');
    }
}