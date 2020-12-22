<?php
require_once File::build_path(['model','ModelVoiture.php']);

class ControllerVoiture {
    public static function readAll(){
        $tab_voit = ModelVoiture::getAllVoitures();
        $pagetitle = 'Liste des voitures';
        $controller = 'voiture';
        $view = 'list';
        require_once File::build_path(['view','view.php']);
    }

    public static function read($immat){
        $voit = ModelVoiture::getVoitureByImmat($immat);     
        $controller = 'voiture';
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
        $controller = 'voiture';
        $view = 'create';
        require_once File::build_path(['view','view.php']);
    }

    public static function update($immat){
        $voit = ModelVoiture::getVoitureByImmat($immat);
        $pagetitle = 'Formulaire de modification de la voiture';
        $controller = 'voiture';
        $view = 'update';
        $voit_immat = $voit -> getImmatriculation();
        $voit_marque = $voit -> getMarque();
        $voit_couleur = $voit -> getCouleur();
        require_once File::build_path(['view','view.php']);
    }

    public static function created($immat, $marque, $couleur){
        $voit = new ModelVoiture($immat, $marque, $couleur);
        $voit -> save();
        $tab_voit = ModelVoiture::getAllVoitures();     
        $pagetitle = 'Liste des voitures';
        $controller = 'voiture';
        $view = 'created';
        require_once File::build_path(['view','view.php']);
    }

    public static function updated($immat, $marque, $couleur){
        $voit = new ModelVoiture($immat, $marque, $couleur);
        $voit -> update();
        $tab_voit = ModelVoiture::getAllVoitures();     
        $pagetitle = 'Liste des voitures';
        $controller = 'voiture';
        $view = 'updated';
        require_once File::build_path(['view','view.php']);
    }

    public static function error(){
        $pagetitle = 'Pas de voiture trouvée';
        $controller = 'voiture';
        $view = 'error';
        require_once File::build_path(['view','view.php']);
    }
    
    public static function delete($immat){
        $voit = ModelVoiture::deleteByImmat($immat);
        $tab_voit = ModelVoiture::getAllVoitures();     
        $pagetitle = 'Liste des voitures';
        $controller = 'voiture';
        $view = 'deleted';
        require_once File::build_path(['view','view.php']);
    }
}

?>