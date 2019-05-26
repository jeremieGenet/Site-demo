<?php
/*
    PAGE DE TRAITEMENT DU ROUTING (les routes sont définis dans le fichier routing.php)
*/
use App\Path;

require '../vendor/autoload.php';
$path = new Path;
require 'routing.php'; // On appel le fichier qui défini les routes (altorouter)

// Ligne qui permet le calcul du temps d'affichage d'une page
define('DEBUG_TIME', microtime(true));

// Librairie Whoops qui permet un affichage clair des erreurs
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// Gestion des urls (ici le but est de supprimer le ?page=1 le l'url pour répondre aux exigences du référencement)
if(isset($_GET['page']) && $_GET['page'] === '1'){
    echo 'essai';
    //$uri = $_SERVER['REQUEST_URI'];
    $uri = explode('?', $_SERVER['REQUEST_URI'])[0]; // On récup la première partie de l'url (avant le ? de la variable 'page')
    // On récup la ou les variables de l'url et on les supprime
    $get = $_GET; 
    unset($get['page']);
    $query = http_build_query($get);
    //dump($query); // Affiche la suite de l'url après le premier "?"
    // Si la variable d'url n'est pas vide (si d'autre param d'url sont passé on les ajoutes, mais ?page=1 aura disparu)
    if(!empty($query)){
        $uri = $uri . '?' . $query;
    }
    http_response_code(301); // On signifie que c'est une url redirigée de façon permanente
    header('Location: ' . $uri); // Redirection
    exit();
}






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
            require "../views/{$match['target']}";
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
require '../views/inc/base.php';


