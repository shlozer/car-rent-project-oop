<?php
//require_once ('../config/conf.php');
/*chdir(__DIR__);
$file_to_require = realpath('../config/conf.php');
require_once ($file_to_require);
unset($file_to_require);*/
require_once File::build_path(['config','conf.php']);

class Model {
    
static public $pdo;
public static function Init(){

    $hostname = Conf::getHostname();
    $database_name = Conf::getDatabase();
    $login = Conf::getLogin();
    $password = Conf::getPassword();
    
    try {
        self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password, 
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        if (Conf::getDebug()) {
            echo $e->getMessage();
        }
        else {
            echo 'Une erreur est arrivée<a href=""> retour a la page d\'accueil </a>';
        }      
        die();
    }

}    

public static function selectAll(){

    $table_name = static::$object;
    $class_name = 'Model'. ucfirst($table_name);
    try {
        $rep = Model::$pdo -> query('SELECT * FROM '. $table_name);
        $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        $tab_element = $rep->fetchAll();
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
    return $tab_element;
    
}

public static function select($primary_value) {
    $table_name = static::$object;
    $class_name = 'Model'. ucfirst($table_name);
    $primary_key = static::$primary;
    
    try {
        $sql = 'SELECT * from '. $table_name . ' WHERE '. $primary_key . ' =:val_tag';
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "val_tag" => $primary_value
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        $tab_element = $req_prep->fetchAll();
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

    if (empty($tab_element))
        {return false;}
    return $tab_element[0];
}

public static function delete($primary_value) {
    $table_name = static::$object;
    $primary_key = static::$primary;
    
    try {
        $sql = 'DELETE from '. $table_name . ' WHERE '. $primary_key . ' =:val_tag';
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "val_tag" => $primary_value
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
    $table_name = static::$object;
    $primary_key = static::$primary;
    $class_name = 'Model'. ucfirst($table_name);
    $set_string= null;
    foreach ($data as $cle => $value){
        if (property_exists($class_name, $cle ) && ($cle != $primary_key)){
            $set_string .= ' '.$cle.' = :'.$cle.',';
        }
    }
    $set_string = rtrim($set_string, ',');

    try {
        $sql = 'UPDATE '. $table_name . ' SET'. $set_string.
        ' WHERE '.$primary_key.' = :'.$primary_key;     
        $req_prep = Model::$pdo->prepare($sql);
/*        $values = array(
            'immatriculation_sql' => $data['immatriculation'],
            'marque_sql' =>  $data['marque'],
            'couleur_sql' => $data['couleur']
        );*/
        $values = $data;
//        echo $sql; echo '<br />'; var_dump($data);
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
public function save($data){
    $table_name = static::$object;
    $primary_key = static::$primary;
    $class_name = 'Model'. ucfirst($table_name);
    $champs_string= null;
    $tags_string= null;
    foreach ($data as $cle => $value){
        if (property_exists($class_name, $cle )){
            $champs_string .= ' '.$cle.',';
            $tags_string   .= ' :'.$cle.',';
        }
    }
    $champs_string = rtrim($champs_string, ',');
    $tags_string = rtrim($tags_string, ',');

    try {
//        $sql = 'INSERT INTO voiture (immatriculation, marque, couleur) 
//        VALUES (:immatriculation_sql, :marque_sql, :couleur_sql)';     
        $sql = 'INSERT INTO '.$table_name.' ('.$champs_string.') VALUES ('.
        $tags_string.')';     
        $req_prep = Model::$pdo->prepare($sql);
        $values = $data;
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
}
Model::Init();
?>        
   