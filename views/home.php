<?php ob_start(); ?>
<div class="container row align-items-middle mx-auto mt-5 justify-content-center">
    <div class="row align-items-middle justify-content-center">
        <div class="card bg-success col-2 p-5 mx-2 h-75">
            <div class="d-flex flex-column text-center">
                <a href="index.php?action=create&target=adherent" class="text-decoration-none text-dark">
                    <i class="fas fa-users fa-2x mx-auto"></i>
                    <p class="text-white text-center ">Ajouter adherent</p>
                </a>
            </div>
        </div>
        <div class="card bg-success col-2 p-5 mx-2 h-75">
            <div class="d-flex flex-column text-center">
                <a href="index.php?action=create&target=livre" class="text-decoration-none text-dark">
                    <i class="fas fa-book fa-2x mx-auto"></i>
                    <p class="text-white text-center">Ajouter Livre</p>
                </a>
            </div>
        </div>
        <div class="card bg-success col-2 p-5 mx-2 h-75">
            <div class="d-flex flex-column text-center">
                <a href="index.php?action=create&target=emprunt" class="text-decoration-none text-dark">
                    <i class="fas fa-cart-arrow-down fa-2x mx-auto"></i>
                    <p class="text-white text-center">Ajouter Emprunt</p>
                </a>
            </div>
        </div>
        <div class="card bg-success col-2 p-5 mx-2 h-75">
            <div class="d-flex flex-column text-center">
                <a href="index.php?action=create&target=rayon" class="text-decoration-none text-dark">
                    <i class="fas fa-shapes fa-2x mx-auto"></i>
                    <p class="text-white text-center">Ajouter Rayon</p>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-middle mt-2 justify-content-center">
        <div class="card bg-info col-2 p-5 mx-2 h-75">
            <div class="d-flex flex-column text-center">
                <a href="index.php?action=list&target=adherent" class="text-decoration-none text-dark">
                    <i class="fas fa-users fa-2x mx-auto"></i>
                    <p class="text-white text-center ">Liste adherent</p>
                </a>
            </div>
        </div>
        <div class="card bg-info col-2 p-5 mx-2 h-75">
            <div class="d-flex flex-column  text-center">
                <a href="index.php?action=create&target=livre" class="text-decoration-none text-dark">
                    <i class="fas fa-book fa-2x mx-auto"></i>
                    <p class="text-white text-center">Liste Livre</p>
                </a>
            </div>
        </div>
        <div class="card bg-info col-2 p-5 mx-2 h-75">
            <div class="d-flex flex-column text-center">
                <a href="index.php?action=list&target=emprunt" class="text-decoration-none text-dark">
                    <i class="fas fa-cart-arrow-down fa-2x mx-auto"></i>
                    <p class="text-white text-center">Liste Emprunt</p>
                </a>
            </div>
        </div>
        <div class="card bg-info col-2 p-5 mx-2 h-75">
            <div class="d-flex flex-column text-center">
                <a href="index.php?action=list&target=rayon" class="text-decoration-none text-dark">
                    <i class="fas fa-shapes fa-2x mx-auto"></i>
                    <p class="text-white text-center">Liste Rayon</p>
                </a>
            </div>
        </div>

    </div>
    
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>