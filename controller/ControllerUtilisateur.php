<?php
require_once File::build_path(['model','ModelUtilisateur.php']);


class ControllerUtilisateur {
    protected static $object = 'utilisateur';
    
    public static function readAll(){
        $tab_ut = ModelUtilisateur::selectAll();
        $pagetitle = 'Liste des utilisateurs';
        $view = 'list';
        require_once File::build_path(['view','view.php']);
    }

    public static function read($login){
        $ut = ModelUtilisateur::select($login);     
        if ($ut){
            $pagetitle = 'Informations détaillées sur un utilisateur';
            $view = 'detail';                    
        }else{
            $pagetitle = 'Pas d\'utilisateur trouvé';
            $view = 'error';  
        }
        require_once File::build_path(['view','view.php']);
    }

    public static function create(){
        $pagetitle = 'Formulaire de création de l\' utilisateur';
        $view = 'update';
        $ut_login = null;
        $ut_nom = null;
        $ut_prenom = null;
        $choix = 'create';
        require_once File::build_path(['view','view.php']);
    }

    public static function update($login){
        $ut = ModelUtilisateur::select($login);
        $pagetitle = 'Formulaire de modification de l\' utilisateur';
        $view = 'update';
        $ut_login = $ut -> getLogin();
        $ut_nom = $ut -> getNom();
        $ut_prenom = $ut -> getPrenom();
        $choix = 'update';
        require_once File::build_path(['view','view.php']);
    }

    public static function created($data){
//        $voit = new ModelUtilisateur($immat, $marque, $couleur);
        $ut = new ModelUtilisateur(null);
        $ut -> save($data);
        $tab_ut = ModelUtilisateur::selectAll();     
        $pagetitle = 'Liste des utilisateurs';
        $view = 'created';
        require_once File::build_path(['view','view.php']);
    }

    public static function updated($data){
        $ut = new ModelUtilisateur(null);
        $ut -> update($data);
        $tab_ut = ModelUtilisateur::selectAll();     
        $pagetitle = 'Liste des utilisateurs';
        $view = 'updated';
        require_once File::build_path(['view','view.php']);
    }

    public static function error(){
        $pagetitle = 'Pas d\' utilisateur trouvé';
        $view = 'error';
        require_once File::build_path(['view','view.php']);
    }
    
    public static function delete($login){
        $ut = ModelUtilisateur::delete($login);
        $tab_ut = ModelUtilisateur::selectAll();     
        $pagetitle = 'Liste des utilisateurs';
        $view = 'deleted';
        require_once File::build_path(['view','view.php']);
    }
}

?>