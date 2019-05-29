<?php
/*
    ROUTE UTILISEES (Librairie externe) => altorouter
*/

// 1. UTILISATION DE LA LIBRARIE "altorouter"
$router = new AltoRouter();

// 2. LISTE DES ROUTE (paramètres = la méthode, l'url désirée, la direction du fichier (a partir du dossier "view"), et le nom qui est optionel (utile pour les liens))

/*
    ROUTING NAV BAR
*/
// Routing à la racine du projet (Accueil du site)
$router->map('GET', '/', 'home.php', 'home'); 
// Routing DEVELOPPEMENT
$router->map('GET', '/developpement', 'dev/portfolio_dev.php', 'portfolio_dev'); 
// Routing DESIGN
$router->map('GET', '/design', 'design/portfolio_design.php', 'portfolio_design'); 
// Routing SUR MOI cv et info (One page)
$router->map('GET', '/cv', 'cv/cv.php', 'cv'); 

/*
    ROUTING DU BLOG
*/
// Accueil du blog (listing des posts)
$router->map('GET', '/blog', 'blog/home_blog.php', 'home_blog'); 
// Routing vers les post de la catégorie sélectionnée (à partir le la page post.php)
$router->map('GET', '/blog_category/[*:slug]-[i:id]', 'blog/category.php', 'category');
// Visu du Post sélectionner 
$router->map('GET', '/blog/[*:slug]-[i:id]', 'blog/post.php', 'post');


/*
    ROUTING PORTFOLIO DEV
*/
// Route pour le hamburger css/jquery
$router->map('GET', '/developpement/menu-hamburger', 'dev/hamburger/hamburger.php', 'hamburger');
// Route pour le néon
$router->map('GET', '/developpement/neon', 'dev/neon/neon.php', 'neon');
// Route pour Fenêtre Modale
$router->map('GET', '/developpement/fenetre-modale', 'dev/fenetre_modale/fenetre_modale.php', 'fenetre_modale');
// Route du Snake
$router->map('GET', '/developpement/snake', 'dev/snake/snake.php', 'snake');
// Routing du portfolio en js
$router->map('GET', '/developpement/portfolio', 'dev/portfolio/portfolio.php', 'portfolio'); 
// Route vers la page d'affichage du calendrier
$router->map('GET', '/developpement/calendrier', 'dev/calendrier/calendrier.php', 'calendrier');
// Route vers la page d'accueil du jeu de bonneteau
$router->map('GET', '/developpement/bonneteau', 'dev/bonneteau/index.php', 'home_bonneteau');
// Route vers la page d'accueil du jeu spaceInvaders
$router->map('GET', '/developpement/spaceInvaders', 'dev/spaceInvaders/spaceInvaders.php', 'spaceInvaders');

/*
    ROUTING DES ERREURS
*/
// Route vers erreur 404
$router->map('GET', '/erreur', 'error/error.php', 'error'); 

/* 
    ROUTING DU CALENDRIER 
*/
// Route vers la pagination du calendrier (mois par mois)
$router->map('GET', '/developpement/calendrier?month=[i:month]&year=[i:year]', 'dev/calendrier/calendrier.php', 'calendrier_pagination');
// Route vers la page de visualisation/modification de l'évènement
$router->map('GET', '/developpement/calendrier-edit-event=[i:id]', 'dev/calendrier/editEvent.php', 'event');
// Soumet le formulaire de modification de l'évènement
$router->map('POST', '/developpement/calendrier-edit-event=[i:id]', 'dev/calendrier/editEvent.php', 'editEvent_post');
// Soumet la suppression de l'évènement
$router->map('POST', '/developpement/calendrier-delete-event=[i:id]', 'dev/calendrier/editEvent.php', 'deleteEvent');
// Route vers la page de créaction d'un évènement (via le bouton bleu sur le calendrier)
$router->map('GET', '/developpement/calendrier-add-event', 'dev/calendrier/addEvent.php', 'addEvent_button');
// Route vers la page de créaction d'un évènement (via le jour cliqué sur le calendrier)
$router->map('GET', '/developpement/calendrier-add-event=[i:id]', 'dev/calendrier/addEvent.php', 'addEvent_day');
// Soumet le formulaire de création d'évènement
$router->map('POST', '/developpement/calendrier-add-event', 'dev/calendrier/addEvent.php', 'addEvent_post');

/*
    ROUTING DU JEU DE BONNETEAU
*/
// Route vers le jeu de bonneteau
$router->map('POST', '/developpement/bonneteau', 'dev/bonneteau/jeu.php', 'game_bonneteau');
// Route vers la page d'accueil du jeu de bonneteau
$router->map('POST', '/developpement/bonneteau', 'dev/bonneteau/config.php', 'config_bonneteau');

// 3. TEST DE LA ROUTE (en fonction de l'url, puisque ici méthode get)
// match() vaudra 'false' si la route d'url n'est pas bonne (ne correspond à rien)
$match = $router->match(); 

//dump($match); // Affichera null si la route n'existe pas sinon affiche un tableau de 3 informations (target, params, et name) du routing

// 4. TRAITEMENT DU ROUTING (qui se fait dans index.php)