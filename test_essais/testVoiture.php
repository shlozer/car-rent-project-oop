<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Test de la voiture</title>

</head>
<body>
<?php
    require_once 'voiture.php';
    $voiture1 = new Voiture('renault', 'rouge', '4589ml58');
    $voiture1 -> afficher();






?>
</body>
</html>