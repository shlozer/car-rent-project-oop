<?php
require_once File::build_path(['model','ModelVoiture.php']);


class ControllerVoiture {
    protected static $object = 'voiture';

    public static function readAll(){
        $tab_voit = ModelVoiture::selectAll();
        $pagetitle = 'Liste des voitures';
        $view = 'list';
        require_once File::build_path(['view','view.php']);
    }

    public static function read($immat){
        $voit = ModelVoiture::select($immat);     
        if ($voit){
            $pagetitle = 'Informations détaillées sur une voiture';
            $view = 'detail';                    
        }else{
            $pagetitle = 'Pas de voiture trouvée';
            $view = 'error';  
        }
        require_once File::build_path(['view','view.php']);
    }

    public static function create(){
        $pagetitle = 'Formulaire de création de la voiture';
        $view = 'update';
        $voit_immat = null;
        $voit_marque = null;
        $voit_couleur = null;
        $choix = 'create';
        require_once File::build_path(['view','view.php']);
    }

    public static function update($immat){
        $voit = ModelVoiture::select($immat);
        $pagetitle = 'Formulaire de modification de la voiture';
        $view = 'update';
        $voit_immat = $voit -> getImmatriculation();
        $voit_marque = $voit -> getMarque();
        $voit_couleur = $voit -> getCouleur();
        $choix = 'update';
        require_once File::build_path(['view','view.php']);
    }

    public static function created($data){
//        $voit = new ModelVoiture($immat, $marque, $couleur);
        //var_dump($data);
        $voit = new ModelVoiture(null);
        $voit -> save($data);
        $tab_voit = ModelVoiture::selectAll();     
        $pagetitle = 'Liste des voitures';
        $view = 'created';
        require_once File::build_path(['view','view.php']);
    }

    public static function updated($data){
//        $voit = new ModelVoiture($data);        
        $voit = new ModelVoiture(null);        
        $voit -> update($data);
        $tab_voit = ModelVoiture::selectAll();     
        $pagetitle = 'Liste des voitures';
        $view = 'updated';
        require_once File::build_path(['view','view.php']);
    }

    public static function error(){
        $pagetitle = 'Pas de voiture trouvée';
        $view = 'error';
        require_once File::build_path(['view','view.php']);
    }
    
    public static function delete($immat){
        $voit = ModelVoiture::delete($immat);
        $tab_voit = ModelVoiture::selectAll();     
        $pagetitle = 'Liste des voitures';
        $controller = 'voiture';
        $view = 'deleted';
        require_once File::build_path(['view','view.php']);
    }
}

?>