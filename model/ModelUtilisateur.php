<?php
//require_once ('model.php');
require_once File::build_path(['model','model.php']);
class ModelUtilisateur extends Model{

protected $login;
protected $nom;
protected $prenom;

protected static $object = 'utilisateur';
protected static $primary = 'login';

public function __construct($l = NULL, $n = NULL, $p = NULL)  {
    if (!is_null($l) && !is_null($n) && !is_null($p) ){
//        if (strlen($i) <= 8) {
            $this->login = $l;
//        }
        $this->nom = $n;
        $this->prenom = $p;
    }
}

public function getNom() {
    return $this->nom;  
}
public function getPrenom() {
    return $this->prenom;  
}
public function getLogin() {
    return $this->login;  
}

public function setNom($nom2) {
    $this->nom = $nom2;
}
public function setPrenom($prenom2) {
    $this->prenom = $prenom2;
}
public function setLogin($login2) {
    $this->login = $login2;
}

/*
public static function getUtilisateurByLogin($login) {
    
    try {
        $sql = 'SELECT * from utilisateur WHERE login = :nom_tag';
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "nom_tag" => $login
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
        $tab_ut = $req_prep->fetchAll();
    }
    catch (PDOException $e) {
        if (Conf::getDebug()) {
            echo $e->getMessage();
        }
        else {
            echo 'Une erreur est arrivée<a href="index.php"> retour a la page d\'accueil </a>';
        }      
        die();
    }    

    if (empty($tab_ut))
        {return false;}
    return $tab_ut[0];
}

public static function deleteByLogin($login) {
    
    try {
        $sql = 'DELETE from utilisateur WHERE login = :nom_tag';
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "nom_tag" => $login
        );
        $req_prep->execute($values);
    }
    catch (PDOException $e) {
        if (Conf::getDebug()) {
            echo $e->getMessage();
        }
        else {
            echo 'Une erreur est arrivée<a href="index.php"> retour a la page d\'accueil </a>';
        }      
        die();
    }    

}

public function save(){

    try {
        $sql = 'INSERT INTO utilisateur (login, nom, prenom) 
        VALUES (:login_sql, :nom_sql, :prenom_sql)';     
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            'login_sql' => $this -> login,
            'nom_sql' => $this -> nom,
            'prenom_sql' => $this -> prenom
        );
        $req_prep->execute($values);
    }
    catch (PDOException $e) {
        if (Conf::getDebug()) {
            echo $e->getMessage();
        }
        else {
            echo 'Une erreur est arrivée<a href="index.php"> retour a la page d\'accueil </a>';
        }      
        die();
    }    

}*/

/*public function update(){

    try {
        $sql = 'UPDATE  utilisateur SET nom = :nom_sql, prenom = :prenom_sql
        WHERE login = :login_sql';     
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            'login_sql' => $this -> login,
            'nom_sql' => $this -> nom,
            'prenom_sql' => $this -> prenom
        );
        $req_prep->execute($values);
    }
    catch (PDOException $e) {
        if (Conf::getDebug()) {
            echo $e->getMessage();
        }
        else {
            echo 'Une erreur est arrivée<a href="index.php"> retour a la page d\'accueil </a>';
        }      
        die();
    }    

}

public function update($data){

    try {
        $sql = 'UPDATE  utilisateur SET nom = :nom_sql, prenom = :prenom_sql
        WHERE login = :login_sql';     
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            'login_sql' => $data['login'],
            'nom_sql' =>  $data['nom'],
            'prenom_sql' => $data['prenom']
        );
        $req_prep->execute($values);
    }
    catch (PDOException $e) {
        if (Conf::getDebug()) {
            echo $e->getMessage();
        }
        else {
            echo 'Une erreur est arrivée<a href="index.php"> retour a la page d\'accueil </a>';
        }      
        die();
    }    

}*/
}
  ?>