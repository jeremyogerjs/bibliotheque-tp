

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
                //Appeler le controller create
                break;
            case "rayon":
                //Appeler le controller create
                break;
            case "emprunt" :
                //appeler le controller create
                break;
            case "adherent" :
                //appeler le controller create
                break;
        }
    }
    else if ($_GET['action'] === "update")
    {
        switch ($_GET['target'])
        {
            case "livre":
                //appeler l'update livre;
                break;
            case "rayon" :
                //appeler l'update rayon
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
                //appeler le delete du livre
                break;
            case "rayon" :
                //appeler le delete du rayon
                break;
            case "emprunt" :
                //appeler le delete de l'emprunt
                break;
            case "adherent" :
                //appeler le delete de l'adherent
                break;
        }
    }
    else if ($_GET['action'] === "single")
    {
        switch($_GET['target'])
        {
            case "livre" :
                //appeler le getOne de livre
                break;
            case "rayon" :
                //appeler le getOne du rayon
                break;
            case "emprunt" :
                //appeler le getONe de l'emprunt
                break;
            case "adherent" :
                //appeler le getOne de l'adherent
                break;
        }
    }
}
else
{
    require ("./views/home.php");
}

