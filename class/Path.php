<?php

namespace App;

// Gère les différents chemins du Template Html de base et le rendu
class Path{

    // Style bootstrap
    private $style_bootstrap = "../css/bootstrap.min.css";

    // Les attributs suivants servent au fonctionnement de bootstrap
    private $jsJquery = "js/jquery.min.js";
    private $jsPopper = "js/popper.min.js";
    private $jsBootstrap = "js/bootstrap.min.js";
    private $customJs = "js/custom.js";


    public function getBootstrap(){
        return $this->style_bootstrap;
    }

    // Renvoi une balise style (pour les fichiers css)
    public function getStyle($file){
        echo '<link rel="stylesheet" href='. $file .'>';
    }

    public function getJs($file){
        echo '<script src='. $file .'></script>';
    }

    public function getJsJquery(){
        return $this->jsJquery;
    }

    public function getJsPopper(){
        return $this->jsPopper;
    }

    public function getJsBootstrap(){
        return $this->jsBootstrap;
    }

    public function getCustomJs(){
        return $this->customJs;
    }

    /**
     * Permet d'afficher une page et de lui donner les paramètres utiles à sont affichage
     *
     * @param string $file (fichier à inclure)
     * @param array $parameters (les paramètres utiles au fichier)
     * @return void
     */
    static function render(string $file, $parameters = []){
        // extract() permet d'extraire les données d'un tableau associatif
        extract($parameters); 
        // Permet d'inclure le fichier passé en param dans le dossier 'view'
        include "../view/{$file}";
    }


}
