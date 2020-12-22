<?php
require_once 'model.php';
require_once 'trajet.php';

/*$rep = Model::$pdo -> query('SELECT * FROM voiture');
$rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
$tab_voit = $rep->fetchAll();

foreach ($tab_voit  as $voit){
    //var_dump($obj);
    echo 'Immatriculation: '.$obj -> immatriculation. ', Marque: '.$obj -> marque.
    ', Couleur: '.$obj -> couleur;
    echo '<br />';
    $voit -> afficher();
    echo '<br />';
}*/
$u = new Trajet;
$u -> getAllTrajets();

