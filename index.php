

<?php
require('./controller/EmpruntsController.php');
require('./controller/AdherentsController.php');
require('./controller/RayonsController.php');
require('./controller/LivresController.php');
$emprunt = new EmpruntController();
$livre = new LivresController();
$rayon = new RayonController();
$adherent = new AdherentController();
if(isset($_GET['action']))
{
    if($_GET['action'] === 'list')
    {
        switch($_GET['target'])
        {
            case "livre" :
                $livre -> AllLivre();
                break;
            case "rayon" :
                $rayon -> getAllRy();
                break;
            case "emprunt" :
                $emprunt -> allEmprunt();
                break;
            case "adherent" : 
                $adherent -> getAllAd();
                break;
        }
    }
    elseif ($_GET['action'] === "create")
    {
        switch ($_GET['target'])
        {
            case "livre" :
                $livre -> addLivre();
                break;
            case "rayon":
                $rayon -> createRayon();
                break;
            case "emprunt" :
                $emprunt -> createEmprunt(); 
                break;
            case "adherent" :
                $adherent -> addAdherent();
                break;
        }
    }
    else if ($_GET['action'] === "update")
    {
        switch ($_GET['target'])
        {
            case "livre":
                $livre -> updateLivre(); 
                break;
            case "rayon" :
                $rayon -> updateRayon();
                break;
            case "emprunt" :
                $emprunt -> updateEmprunt();
                break;
            case "adherent" :
                $adherent -> updateAdherent();
                break;
        }
    }
    else if ($_GET['action'] === "delete")
    {
        switch($_GET['target'])
        {
            case "livre":
                $livre -> deleteLivre();
                break;
            case "rayon" :
                $rayon -> deleteRayon();
                break;
            case "emprunt" :
                $emprunt -> deleteEmprunt();
                break;
            case "adherent" :
                $adherent -> deleteAdherent();
                break;
        }
    }
    else if ($_GET['action'] === "single")
    {
        switch($_GET['target'])
        {
            case "livre" :
                $livre -> singleLivre();
                break;
            case "rayon" :
                $rayon -> getOne();
                break;
            case "emprunt" :
                $emprunt -> singleEmprunt(); 
                break;
            case "adherent" :
                $adherent -> singleAdherent();
                break;
        }
    }
}
else
{
    require ("./views/home.php");
}

