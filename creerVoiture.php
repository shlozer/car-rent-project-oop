<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>

</head>
<body>
<?php
//if (isset($_POST['immatriculation']) && isset($_POST['marque']) && isset($_POST['couleur'])){
require_once 'ModelVoiture.php';
//print_r($_POST);
if (isset($_POST)){
    $v = new ModelVoiture($_POST['immatriculation'], $_POST['marque'], $_POST['couleur']);

    $v -> afficher();
    $v -> save();

}






?>
</body>
</html>