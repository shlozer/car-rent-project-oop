<?php
require_once 'trajet.php';
require_once 'utilisateur.php';

if (isset($_POST)){
    $t = new Trajet;
    $tab_ut = $t -> findPassagers($_POST['id_trajet']);
    foreach ($tab_ut as $utilisateur_trajet) {
        $utilisateur_trajet -> afficher();
        echo '<br />';
    }
}




