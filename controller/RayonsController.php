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
            header("location:index.php?action=list&target=rayon&actioned=create&statut=success");
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
            
            $result = $this -> modifyRayon();
            if($result)
            {
                header("location:index.php?action=list&target=rayon&actioned=update&statut=success");
            }
            else
            {
                header("location:index.php?action=list&target=rayon&actioned=update&statut=fail");
            }
        }
        else
        {
            $results = $this -> getSingleRayon();
            require('./views/forms/formRayon.php');
        }
    }
    public function searchRayon()
    {
        $results = $this -> searchRayons();

        require('./views/listes/listeRayon.php');
    }
    public function deleteRayon ()
    {
        if(isset($_GET['id']) && $_GET['id'] >= 0)
        {
            $result = $this -> delRayon();
            if($result > 0)
            {
                header("location:index.php?action=list&actioned=delete&target=rayon&statut=success");
            }
            else
            {
                throw new Exception("Impossible de supprimer ce rayon !");
                header("location:index.php?action=list&actioned=delete&target=rayon&statut=fail");

            }
        }
        else
        {
            http_response_code(404);
        }
    }
}