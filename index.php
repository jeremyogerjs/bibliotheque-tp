

<?php
require('./controller/EmpruntsController.php');
require('./controller/AdherentsController.php');
require('./controller/RayonsController.php');
require('./controller/LivresController.php');
$livre = new LivresController();
$rayon = new RayonController();
$adherent = new AdherentController();
$emprunt = new EmpruntController();
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
                //appeler le controller create
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
                $livre -> updateLivre(); //marche pas
                break;
            case "rayon" :
                $rayon -> updateRayon(); //marche pas
                break;
            case "emprunt" :
                //appeler l'update d'emprunt
                break;
            case "adherent" :
                //appeler l'update de l'adherent
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
                //appeler le delete de l'emprunt
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
                $emprunt -> singleEmprunt(); // marche pas
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

