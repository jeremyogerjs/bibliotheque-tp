<?php

require ('./models/LivreManager.php');


class LivresController extends Livre
{
    public function AllLivre ()
    {
        $results = $this -> getLivre();

        require ('./views/listes/listeLivre.php');
    }

    public function deleteLivre ()
    {
        if(isset($_GET['id']) && $_GET['id'] >=0 )
        {
            $result = $this -> delLivre();
            if($result)
            {
                echo "deleted succes !!";
                header("location:index.php?action=list&actioned=delete&target=livre&statut=success"); 
            }
            else
            {
                header("location:index.php?action=list&actioned=delete&target=livre&statut=fail"); 
            }
        }
    }
    public function addLivre ()
    {
        if(!empty($_POST))
        {
            $results = $this -> createLivre();
            header("location:index.php?action=list&target=livre&actioned=create&statut=success");
        }
        else
        {
            $options = $this -> getRayons();
            require('./views/forms/formLivre.php');
        }
    }
    public function updateLivre ()
    {
        if(!empty($_POST) && isset($_GET['id']) && $_GET['id'] >= 0)
        {
            $test = $this -> modifyLivre();
            header("location:index.php?action=list&target=livre&actioned=update&statut=success");
        }
        else
        {
            $options = $this -> getRayons();
            $results = $this -> getLivreRayon();
            require('./views/forms/formLivre.php');
        }
    }
    public function singleLivre ()
    {
        if(isset($_GET['id']) && $_GET['id'] >= 0)
        {
            $results = $this -> getSingleLivre();
            require('./views/singles/singleLivre.php');
        }
    }
    public function filterLivreDispo()
    {
        $results = $this -> getLivreFiltered(true);

        require('./views/listes/listeLivre.php');
    }
    public function filterLivreIndispo()
    {
        $results = $this -> getLivreFiltered(false);

        require('./views/listes/listeLivre.php');
    }
    public function searchLivre()
    {
        $results = $this -> searchLivres();
        require('./views/listes/listeLivre.php');
    }
}