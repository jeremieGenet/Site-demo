<?php
/*
    UTILISATION D'UN ROUTEUR (d'une librairie externe) => altorouter
    (pour que cela fonctionne il faut taper en invite de commande : "php -S localhost:8000 -t public"
    pour ainsi se connecté au serveur et lui définir comme dossier racine le dossier "public")
*/

// 1. UTILISATION DE LA LIBRARIE "altorouter"
$router = new AltoRouter();

// 2. LISTE DES ROUTE (paramètres = la méthode, l'url désirée, la direction du fichier (a partir du dossier "view"), et le nom qui est optionel (utile pour les liens))

/*
    ROUTING NAV BAR
*/
// Routing à la racine du projet (Accueil du site)
$router->map('GET', '/', 'home/home.php', 'home'); 
// Routing DEVELOPPEMENT
//$router->map('GET', '/developpement', 'dev/portfolio_dev.php', 'portfolio_dev'); 
// Routing DESIGN
//$router->map('GET', '/design', 'design/portfolio_design.php', 'portfolio_design'); 



// Routing vers le blog
$router->map('GET', '/blog', 'blog/article.php', 'article'); 
// Routing du portfolio en js
$router->map('GET', '/portfolio', 'portfolio/index.php', 'portfolio'); 
// Route vers la page d'affichage du calendrier
$router->map('GET', '/calendrier', 'calendrier/calendrier.php', 'calendrier');
// Route vers la page d'accueil du jeu de bonneteau
$router->map('GET', '/bonneteau', 'bonneteau/index.php', 'home_bonneteau');
// Route vers la page d'accueil du jeu spaceInvaders
$router->map('GET', '/spaceInvaders', 'spaceInvaders/spaceInvaders.php', 'spaceInvaders');


$router->map('GET', '/dev/newSpace', 'dev/space.php', 'space');

/*
    ROUTING HOME (portfolio)
*/
// Route pour le hamburger css/jquery
$router->map('GET', '/menu-hamburger', 'hamburger/hamburger.php', 'hamburger');
// Route pour le néon
$router->map('GET', '/neon', 'neon/neon.php', 'neon');
// Route pour Fenêtre Modale
$router->map('GET', '/fenetre-modale', 'fenetre_modale/index.php', 'fenetre_modale');
// Route du Snake
$router->map('GET', '/snake', 'snake/snake.php', 'snake');





/*
    ROUTING DES ERREURS
*/
// Route vers erreur 404
$router->map('GET', '/erreur', 'error/error.php', 'error'); 


/* 
    ROUTING DU CALENDRIER 
*/
// Route vers la pagination du calendrier (mois par mois)
$router->map('GET', '/calendrier?month=[i:month]&year=[i:year]', 'calendrier/calendrier.php', 'calendrier_pagination');
// Route vers la page de visualisation/modification de l'évènement
$router->map('GET', '/calendrier-edit-event=[i:id]', 'calendrier/editEvent.php', 'event');
// Soumet le formulaire de modification de l'évènement
$router->map('POST', '/calendrier-edit-event=[i:id]', 'calendrier/editEvent.php', 'editEvent_post');
// Soumet la suppression de l'évènement
$router->map('POST', '/calendrier-delete-event=[i:id]', 'calendrier/editEvent.php', 'deleteEvent');
// Route vers la page de créaction d'un évènement (via le bouton bleu sur le calendrier)
$router->map('GET', '/calendrier-add-event', 'calendrier/addEvent.php', 'addEvent_button');
// Route vers la page de créaction d'un évènement (via le jour cliqué sur le calendrier)
$router->map('GET', '/calendrier-add-event=[i:id]', 'calendrier/addEvent.php', 'addEvent_day');
// Soumet le formulaire de création d'évènement
$router->map('POST', '/calendrier-add-event', 'calendrier/addEvent.php', 'addEvent_post');

/*
    ROUTING DU JEU DE BONNETEAU
*/
// Route vers le jeu de bonneteau
$router->map('POST', '/bonneteau', 'bonneteau/jeu.php', 'game_bonneteau');
// Route vers la page d'accueil du jeu de bonneteau
$router->map('POST', '/bonneteau', 'bonneteau/config.php', 'config_bonneteau');



// 3. TEST DE LA ROUTE (en fonction de l'url, puisque ici méthode get)
// match() vaudra 'false' si la route d'url n'est pas bonne (ne correspond à rien)
$match = $router->match(); 

//dump($match); // Affichera null si la route n'existe pas sinon affiche un tableau de 3 informations (target, params, et name) du routing

// 4. TRAITEMENT DU ROUTING (qui se fait dans index.php)