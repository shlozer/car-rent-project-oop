<?php
require_once 'model.php';
require_once 'utilisateur.php';
class Trajet {

private $id;
private $depart;
private $arrivee;
private $date;
private $nb_places;
private $prix;
private $conducteur_login;

public function __construct($construct_tab = NULL)  {
    //$construct_tab = array(NULL);
    $keys_tab = array('id', 'depart', 'arrivee', 'date', 'nb_places', 'prix', 'conducteur_login');
    $vars_tab = array_fill_keys($keys_tab, $construct_tab);
    if (!is_null($vars_tab['id']) && !is_null($vars_tab['depart']) && !is_null($vars_tab['arrivee']) && 
    !is_null($vars_tab['date']) && !is_null($vars_tab['nb_places']) && !is_null($vars_tab['prix']) && 
    !is_null($vars_tab['conducteur_login']) ){
    //var_dump($vars_tab);
    foreach ($vars_tab as $key => $var){
        $this->$key = $var; 
    }
    }
} 
         
public function get($attribute) {
    if (property_exists($this, $attribute)){
        return $this->$attribute;  
}}

public function set($attribute, $value) {
    if (property_exists($this, $attribute)){
        $this->$attribute = $value;  
}}

public function afficher() {
    echo 'Le '.$this->date.': trajet de '.$this->depart.' à '.$this->arrivee.'. '.
    $this->nb_places.' place(s) disponibles à '. $this->prix. ' euro(s). Le conducteur sera '
    .$this->conducteur_login.'.';
}

public static function getAllTrajets(){
    
    try {
        $pdo = Model::$pdo;
        $rep = $pdo-> query('SELECT * FROM trajet');
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Trajet');
        $tab_trajet = $rep->fetchAll();
    } 
    catch (PDOException $e) {
        if (Conf::getDebug()) {
            echo $e->getMessage(); // affiche un message d'erreur
        } else {
            echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
        }
        die();
    }

    foreach ($tab_trajet  as $trajet){
        $trajet -> afficher();
        echo '<br />';
    }    
}

public static function findPassagers($id) {

    try {
        $pdo = Model::$pdo;
        $req_prep = $pdo-> prepare('SELECT utilisateur.login, utilisateur.nom, utilisateur.prenom
                            FROM trajet
                            INNER  JOIN utilisateur ON trajet.conducteur_login=utilisateur.login
                            WHERE trajet.id = :id_trajet_sql
                            UNION
                            SELECT utilisateur.login, utilisateur.nom, utilisateur.prenom
                            FROM passager
                            INNER  JOIN utilisateur ON passager.utilisateur_login=utilisateur.login
                            WHERE passager.trajet_id = :id_trajet_sql');
        $values = array(
            'id_trajet_sql' => $id
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $tab_ut_trajet = $req_prep->fetchAll();
    } 
    catch (PDOException $e) {
        if (Conf::getDebug()) {
            echo $e->getMessage(); // affiche un message d'erreur
        } else {
            echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
        }
        die();
    }

        return $tab_ut_trajet;
}




}
?>    