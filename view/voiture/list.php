<div id = "list">
<?php
foreach ($tab_voit as $voit){
    //var_dump($voit);
    $i = htmlspecialchars($voit -> getImmatriculation()); 
    $iurl = rawurlencode ($i);
    echo '<p> Voiture d\'immatriculation <a href = "index.php?action=read&immatriculation='.$iurl.'">'.$i.'</a></p>';
}
?>
</div>
