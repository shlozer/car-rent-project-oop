<div id ="detail" style ="width: 100%; display: flex; flex-direction: row; 
    justify-content: space-around;">
<?php
    $vLogin = htmlspecialchars($ut->getLogin());
    $vNom = htmlspecialchars($ut->getNom());
    $vPrenom = htmlspecialchars($ut->getPrenom());
    $uLogin = rawurlencode ($vLogin);
    echo '<span>L\'utilisateur à pour login '. $vLogin.'. Il s\'appelle '.$vPrenom.' '.$vNom.'</span>';
    echo '<a href = "index.php?action=delete&controller=utilisateur&login='.$uLogin.'">Supprimer cet utilisateur</a>';
    echo '<a href = "index.php?action=update&controller=utilisateur&login='.$uLogin.'">Modifier cet utilisateur</a>';
?>
</div>