<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
        <style type="text/css" media="screen">
            .menu li {    
                display: inline-block ;
                border: 1px solid black;
                text-align:right;
            }
            .menu {    
                display: flex;
                flex-direction: row;
                justify-content: space-around;
            }
            .core {    
                display: flex;
                flex-direction: row;
                justify-content: left;
            }
            
        </style>
        </head>
        <body><?php //var_dump($controller_class); var_dump($object); ?>
        <ul class="menu">
        <li>
            <a href="index.php?action=readAll">Accueil/liste des voitures</a>
        </li>
        <li>
            <a href="index.php?action=readAll&controller=utilisateur">Visiteurs</a>
        </li>
        <li>
            <a href="index.php?action=readAll&controller=trajet">Trajets</a>
        </li>
        </ul>
        <div class = "core">
<?php

//$filepath = File::build_path(array("view", $controller, "$view.php"));
/*var_dump($controller_class);
var_dump($object);
var_dump($view);
require_once File::build_path(['controller','ControllerVoiture.php']);
require_once File::build_path(['controller','ControllerUtilisateur.php']);*/

$filepath = File::build_path(array("view", self::$object, "$view.php"));
require $filepath;
?>
    </div>
    <p style="border: 1px solid black;text-align:right;padding-right:1em;">
        Site de covoiturage de bibi champion du monde
    </p>
    </body>
</html>