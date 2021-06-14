<?php

require_once('./models/AdherentManager.php');



class AdherentController
{
    public function getAllAd ()
    {
        require('./db-config.php');
        $db = new Adherent($config);

        $results = $db ->getAllAdherent();

        require ('./views/liste.php');
    }
}