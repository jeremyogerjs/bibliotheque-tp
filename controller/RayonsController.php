<?php
require ('./models/RayonManager.php');


class RayonController
{
    public function getAllRy ()
    {
        require('./db-config.php');

        $db = new Rayon($config);
        $results = $db -> getAllRayon();

        require ('./views/liste.php');
    }
}