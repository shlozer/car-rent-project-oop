<?php

require_once File::build_path(['controller','ControllerVoiture.php']);
require_once File::build_path(['controller','ControllerUtilisateur.php']);

if (!isset($_GET['action'])){
    $_GET['action'] = 'readAll';
}
if (!isset($_GET['controller'])){
    $_GET['controller'] = 'voiture';
}
$action = rawurlencode (htmlspecialchars($_GET['action']));
$controller = rawurlencode (htmlspecialchars($_GET['controller']));
$controller_class = 'Controller'.ucfirst($controller);

if (!class_exists($controller_class)){
    $controller_class = 'ControllerVoiture';
    $action = 'error';
}

$aClassMethods = get_class_methods($controller_class);
if (!in_array($action, $aClassMethods)){
    $controller_class = 'ControllerVoiture';
    $action = 'error';
}
//var_dump($action);
//var_dump($controller);
//var_dump($controller_class);


switch ($controller){
case 'voiture':{

switch ($action){
    case 'readAll':
    case 'create':
    case 'error':
        {
            
            $controller_class::$action(); break;
        }

/*    case 'delete':
    case 'update':
            {
            $immat = rawurlencode (htmlspecialchars($_GET['immatriculation']));
            $controller_class::$action($immat); break;
        }*/
    case 'delete':
    case 'update':
    case 'read':
            {
            $immat = htmlspecialchars($_GET['immatriculation']);
            $controller_class::$action($immat); break;
        }
    case 'created':
    case 'updated':
        {
            var_dump($_GET);
/*            $immat = rawurlencode (htmlspecialchars($_GET['immatriculation']));
            $marque = rawurlencode (htmlspecialchars($_GET['marque']));
            $couleur = rawurlencode (htmlspecialchars($_GET['couleur']));*/
            $immat = htmlspecialchars($_GET['immatriculation']);
            $marque = htmlspecialchars($_GET['marque']);
            $couleur = htmlspecialchars($_GET['couleur']);
            $keys = array('immatriculation', 'marque', 'couleur');
            $data = array_combine($keys, array($immat, $marque, $couleur));
            var_dump($data);
            $controller_class::$action($data); break;
//            $controller_class::$action($immat, $marque, $couleur); break;
        }
}
break;}

case 'utilisateur':{

switch ($action){
    case 'readAll':
    case 'create':
    case 'error':
        {
            $controller_class::$action(); break;
        }

 /*   case 'delete':
    case 'update':
            {
            $login = rawurlencode (htmlspecialchars($_GET['login']));
            $controller_class::$action($login); break;
        }*/
    case 'delete':
    case 'update':
    case 'read':
            {
            $login = htmlspecialchars($_GET['login']);
            $controller_class::$action($login); break;
        }
    case 'created':
    case 'updated':
        {
 /*           $login = rawurlencode (htmlspecialchars($_GET['login']));
            $nom = rawurlencode (htmlspecialchars($_GET['nom']));
            $prenom = rawurlencode (htmlspecialchars($_GET['prenom']));*/
            var_dump($_GET);
            $login = htmlspecialchars($_GET['login']);
            $nom = htmlspecialchars($_GET['nom']);
            $prenom = htmlspecialchars($_GET['prenom']);
            $keys = array('login', 'nom', 'prenom');
            $data = array_combine($keys, array($login, $nom, $prenom));
            var_dump($data);
            $controller_class::$action($data); break;
//            $controller_class::$action($login, $nom, $prenom); break;
        }
}
break;}
}

?>