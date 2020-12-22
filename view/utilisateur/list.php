<div id = "list">
<?php
foreach ($tab_ut as $ut){
    //var_dump($voit);
    $l = htmlspecialchars($ut -> getLogin()); 
    $lurl = rawurlencode ($l);
    echo '<p> Utilisateur de login <a href = "index.php?action=read&controller=utilisateur&login='.$lurl.'">'.$l.'</a></p>';
}
?>
</div>
