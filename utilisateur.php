<?php
require_once 'model.php';
class Utilisateur {

private $login;
private $nom;
private $prenom;
    
public function __construct($l = NULL, $n = NULL, $p = NULL)  {
    if (!is_null($l) && !is_null($n) && !is_null($p) ){
        $this->login = $l;
        $this->nom = $n;
        $this->prenom = $p;
    }
} 
        
public function getLogin() {
        return $this->login;  
}
public function getNom() {
    return $this->nom;  
}
public function getPrenom() {
    return $this->prenom;  
}

public function setLogin($login2) {
        $this->login = $login2;
}
public function setNom($nom2) {
    $this->nom = $nom2;
}
public function setPrenom($prenom2) {
    $this->prenom = $prenom2;
}

public function afficher() {
    echo 'User '. $this->login.' s\' appelle '.$this->prenom.' '.$this->nom.'.';
}

public static function getAllUtilisateurs(){
    try {
        $pdo = Model::$pdo;
        $rep = $pdo -> query('SELECT * FROM utilisateur');
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $tab_utilisateur = $rep->fetchAll();
    }
    catch (PDOException $e) {
        if (Conf::getDebug()) {
            echo $e->getMessage(); // affiche un message d'erreur
        } else {
            echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
        }
    die();
    }

    foreach ($tab_utilisateur  as $utilisateur){
        $utilisateur -> afficher();
        echo '<br />';
    }    
}
}
?>    