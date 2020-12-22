<?php
//require_once ('model.php');
require_once File::build_path(['model','model.php']);
class ModelVoiture extends Model{

protected $immatriculation;
protected $marque;
protected $couleur;

protected static $object = 'voiture';
protected static $primary = 'immatriculation';

public function __construct($i = NULL, $m = NULL, $c = NULL)  {
    if (!is_null($i) && !is_null($m) && !is_null($c) ){
//        if (strlen($i) <= 8) {
            $this->immatriculation = $i;
//        }
        $this->marque = $m;
        $this->couleur = $c;
    }
}

public function getMarque() {
        return $this->marque;  
}
public function getCouleur() {
    return $this->couleur;  
}
public function getImmatriculation() {
    return $this->immatriculation;  
}

public function setMarque($marque2) {
        $this->marque = $marque2;
}
public function setCouleur($couleur2) {
    $this->couleur = $couleur2;
}
public function setImmatriculation($immatriculation2) {
    if (strlen($immatriculation2) <= 8) {
        $this->immatriculation = $immatriculation2;
    }
}


/*public static function deleteByImmat($immat) {
    
    try {
        $sql = 'DELETE from voiture WHERE immatriculation = :nom_tag';
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "nom_tag" => $immat
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
        $sql = 'INSERT INTO voiture (immatriculation, marque, couleur) 
        VALUES (:immatriculation_sql, :marque_sql, :couleur_sql)';     
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            'immatriculation_sql' => $this -> immatriculation,
            'marque_sql' => $this -> marque,
            'couleur_sql' => $this -> couleur
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

/*
public function update($data){

    try {
        $sql = 'UPDATE voiture SET marque = :marque_sql, couleur = :couleur_sql
        WHERE immatriculation = :immatriculation_sql';     
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            'immatriculation_sql' => $data['immatriculation'],
            'marque_sql' =>  $data['marque'],
            'couleur_sql' => $data['couleur']
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