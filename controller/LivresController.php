<?php

require ('./models/LivreManager.php');


class LivresController
{
    public function AllLivre ()
    {
        require('./db-config.php');
        $db = new Livre($config);

        $results = $db -> getLivre();

        require ('./views/liste.php');
    }

    public function deleteLivre ()
    {
        require('./db-config.php');
        $db = new Livre($config);

        if(isset($_GET['id']) && $_GET['id'] >=0 )
        {
            $db -> deleteLivre($_GET['id']);
        }

    }
}