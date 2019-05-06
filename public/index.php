<?php
/*
    PAGE DE TRAITEMENT DU ROUTING (les routes sont définis dans le fichier routing.php)
*/

use App\Path;

require '../vendor/autoload.php';
require 'routing.php'; // On appel le fichier qui défini les routes

$path = new Path;

//dump($match); // AFFICHE LES INFO SUR LE ROOTING

try{
    // TRAITEMENT DU ROUTING (qui est défini dans le fichier routing.php)
    // Si $match est un tableau (c'est qu'il existe bien) alors...
    if(is_array($match)){
        // Si $match comporte bien une fonction (une closure, comme dans le routing '/salut') alors...
        if(is_callable($match['target'])){
            // ON EXECUTE LA CLOSURE/FONCTION STOCKEE DANS '$match[target]' ET ON L'EXECUTE
            // call_user_func_array() permet d'appeler (exécuter) une fonction 'callback' avec les paramètres rassemblés en tableau
            call_user_func_array($match['target'], $match['params']); 
        // Sinon ce n'est pas une closure donc
        }else{
            // On récup le tableau des paramètres de notre url (permettra de passer les infos de l'url jusqu'aux fichiers)
            $params = $match['params']; 

            // On appelle le fichier ciblé dans le dossier view (et on le stock en mémoire tampon)
            ob_start();
            require "../view/{$match['target']}";
            $content = ob_get_clean();
        }

    // Sinon c'est que l'url ne correspond à rien (de déjà crée) alors...
    }else{
        throw new Exception("Page non trouvée, problème d'url, de rooting");
    }
}catch(Exception $e){
    $errorMessage = $e->getMessage(); // On stock le message d'erreur dans '$errorMessage'
    dump($errorMessage);
    $title = 'erreur';
    $content = $errorMessage;
}
// On appelle notre template de base
require '../view/inc/base.php';


