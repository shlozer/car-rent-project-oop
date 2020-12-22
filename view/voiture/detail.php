<div id ="detail" style ="width: 100%; display: flex; flex-direction: row; 
    justify-content: space-around;">
<?php
    $vImmatriculation = htmlspecialchars($voit->getImmatriculation());
    $vMarque = htmlspecialchars($voit->getMarque());
    $vCouleur = htmlspecialchars($voit->getCouleur());
    $uImmatriculation = rawurlencode ($vImmatriculation);
    echo '<span>La voiture est une '. $vMarque.' de couleur '.$vCouleur.' et immatriculée '.
    $vImmatriculation.'</span>';
    echo '<a href = "index.php?action=delete&immatriculation='.$uImmatriculation.'">Supprimer cette voiture</a>';
    echo '<a href = "index.php?action=update&immatriculation='.$uImmatriculation.'">Modifier cette voiture</a>';
?>
</div>