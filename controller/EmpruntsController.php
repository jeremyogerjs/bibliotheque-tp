<?php

require('./models/EmpruntManager.php');

class EmpruntController 
{

    public function allEmprunt ()
    {
        require('./db-config.php');
        $db = new Emprunt($config);
        if($db -> getAllEmprunt())
        {
            $results = $db ->getAllEmprunt();

            require ('./views/liste.php');
        }
    }
}