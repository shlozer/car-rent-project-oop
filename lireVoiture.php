<?php
chdir(__DIR__);
$file_to_require1 = realpath('./model/model.php');
$file_to_require2 = realpath('./model/ModelVoiture.php');
require_once ($file_to_require1);
require_once ($file_to_require2);
unset($file_to_require1);
unset($file_to_require2);
//require_once ('./model/model.php');
//require_once ('./model/ModelVoiture.php');
//require_once ('config/conf.php');
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
//$immat = 'gf';
//$voiture = new Voiture;
$tab_v = ModelVoiture::getAllVoitures();
/*if (!$tab_v){
    echo 'Il n\' y a pas de voitures'; 
}else{*/
    //var_dump($tab_v);
    foreach ($tab_v as $v){
        $v -> afficher();
        echo '<br />';
    }
    

//$v2 = new Voiture ('45678gh4', 'peugeot', 'rouge');
//$v2 -> save();

