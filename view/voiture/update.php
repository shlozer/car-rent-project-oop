<?php 
$i = rawurlencode (htmlspecialchars($voit_immat));
$m = rawurlencode (htmlspecialchars($voit_marque));
$c = rawurlencode (htmlspecialchars($voit_couleur));
//echo $choix;
?>
<form method="get" action="index.php">
  <fieldset>
    <legend>Mon formulaire :</legend>
    <p>
      <label for="immat_id">Immatriculation</label> :
      <input type="text" value="<?php echo $i?>" name="immatriculation" id="immat_id" 
      <?php if ($choix == 'create') {echo ' required';} else {echo ' readonly';}?>/>
    </p>
    <p>
        <label for="marque_id">Marque</label> :
        <input type="text" value="<?php echo $m?>" name="marque" id="marque_id" required/>
    </p>
    <p>
      <label for="couleur_id">Couleur</label> :
      <input type="text" value="<?php echo $c?>" name="couleur" id="couleur_id" required/>
    </p>
    <p>
      <input type='hidden' name='controller' value="voiture"/>
      <input type='hidden' name='action' 
      value="<?php if ($choix == 'create') {echo 'created';} else {echo 'updated';}?>"/>
      <input type="submit" 
      value="<?php if ($choix == 'create') {echo 'Créer';} else {echo 'Mettre à jour';}?>"/>
    </p>
  </fieldset> 
</form>
