<?php 
$l = rawurlencode (htmlspecialchars($ut_login));
$n = rawurlencode (htmlspecialchars($ut_nom));
$p = rawurlencode (htmlspecialchars($ut_prenom));

?>
<form method="get" action="index.php">
  <fieldset>
    <legend>Mon formulaire :</legend>
    <p>
      <label for="login_id">Login</label> :
      <input type="text" value="<?php echo $l?>" name="login" id="login_id" 
      <?php if ($choix == 'create') {echo ' required';} else {echo ' readonly';}?>/>
    </p>
    <p>
        <label for="nom_id">Nom</label> :
        <input type="text" value="<?php echo $n?>" name="nom" id="nom_id" required/>
      </p>
      <p>
        <label for="prenom_id">Prénom</label> :
        <input type="text" value="<?php echo $p?>" name="prenom" id="prenom_id" required/>
      </p>
        <p>
        <input type='hidden' name='controller' value="utilisateur"/>
        <input type='hidden' name='action' 
        value="<?php if ($choix == 'create') {echo 'created';} else {echo 'updated';}?>"/>
        <input type="submit" 
        value="<?php if ($choix == 'create') {echo 'Créer';} else {echo 'Mettre à jour';}?>"/>
    </p>
  </fieldset> 
</form>
