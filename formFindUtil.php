<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Formulaire de recherche d' un utilisateur d'un trajet</title>

</head>
<body>
<form method="post" action="testFindUtil.php">
  <fieldset>
    <legend>Mon formulaire :</legend>
    <p>
      <label for="id_trajet">Identifiant de trajet</label> :
      <input type="text" placeholder="Ex : 45" name="id_trajet" id="id_trajet" required/>
    </p>
    <p>
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset> 
</form>
</body>
</html>