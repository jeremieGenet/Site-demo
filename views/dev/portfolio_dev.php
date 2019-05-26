<?php
/*
    PORTFOLIO DES REALISATIONS DEVELOPPEMENT
*/
use App\Path;

$title = "Réalisations en développement";
$path = new Path();
$path->getStyle("../css/dev/portfolio_dev.css");
$path->getStyle("../css/dev/matrix.css");
?>

<!-- EFFET MATRIX en js (en position absolute) -->
<canvas id="c"></canvas>

<!-- PORTFOLIO EN GRILLE -->
<div class="container myPortfolio" id="myPortfolio">

    <h1 class="text-center my-4">Mes réalisations en <strong>Développement</strong></h1>
    
    <div class="portfolio" id="js-portfolio">

        <!-- Symbnb -->
        <div class="project js-item" tabindex="0">
            <img class="project__image" src="../asset/portfolio/screen-shot_dev/symbnb.jpg" alt="" >
            <h2 class="project__name mt-2">Site d'annonces avec Symfony 4</h2>
            <div class="project__body js-body">
                <h2 class="text-center">Site d'annonces</h2>
                <div class="project__description">
                    <p>
                        <strong>Description :</strong> Agenda avec ajout et suppression d'évènements
                    </p>
                </div>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Langages/Technos utilisées :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/composer_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/CSS_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/Bootstrap_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/PHP_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/symfony_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/doctrine_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/twig_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p class="description_top">
                        Ce <strong>site d'annonces</strong> est un site qui permet la location <strong>d'appartements/maisons</strong>. 
                        Un <strong>espace membres</strong> permet de s'inscrire comme <strong>locataire ou comme propriétaire</strong>.
                    </p>
                    <p>
                        Le <strong>propriétaire</strong> peut alors créer des annonces et les illustrer avec des photos 
                        (<strong>une image principale, et une collection d'image au besoin</strong>).
                    </p>
                    <p>
                        Le <strong>locataire</strong> peut s'inscrire pour réserver une location d'un bien puis, 
                        <strong>noter</strong> les appartements/maisons après son séjour.
                    </p>
                    <p>
                        Les notes apparaîssent sur les biens dynamiquement, permettant aux futurs locataires de se forger une idée plus précise du bien.
                        Les appartements/maisons les mieux notés sont ainsi mis en avant.
                        Le site comporte <strong>une partie administration</strong> (avec restriction), pour permettre la modération des annonces,
                        et récupérer les statistiques des annonces les mieux notés.
                    </p>
                    <a href="http://jeremie-genet.fr" target="_blank">
                        <button type="text" class="btn btn-info text-primary my-2 button_try"><strong>Essayer moi !</strong></button>
                    </a> 
                </div>
            </div>
        </div>
        <!-- NEON -->
        <div class="project js-item" tabindex="0">
            <img src="../asset/portfolio/screen-shot_dev/neon.jpg" alt="" class="project__image">
            <h2 class="project__name mt-2">Animation texte Néon</h2>
            <div class="project__body js-body mb-3">
                <h2 class="text-center">Texte 'Néon'</h2>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Langages/Technos utilisées :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/HTML_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/CSS_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p class="description_top">
                        Ici on s'amuse avec un texte que s'affiche de <strong>façon dynamique et lumineux</strong>.
                        Le tous est animé uniquement en <strong>CSS</strong> à base de keyframe, 
                        <strong>la couleur néon</strong> est obtenue en jouant sur la multiplication des couches de couleur grâce aux <strong>pseudo-éléments</strong>
                        et à <strong>l'effet blur</strong>.
                        <br>
                    </p>
                    <a href="<?= $router->generate('neon') ?>">
                        <button type="text" class="btn btn-info text-primary my-2 button_try"><strong>Essayer moi !</strong></button>
                    </a>
                </div>
            </div>
        </div>
        <!-- AGENDA -->
        <div class="project js-item" tabindex="0">
            <img src="../asset/portfolio/screen-shot_dev/calendrier.jpg" alt="" class="project__image">
            <h2 class="project__name mt-2">Agenda dynamique</h2>
            
            <div class="project__body js-body">
                <h2 class="text-center">Agenda</h2>
                <div class="project__description">
                    <p>
                        <strong>Description : </strong> <strong> Agenda</strong> avec ajout et suppression d'évènements
                    </p>
                </div>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Langages/Technos utilisées :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/HTML_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/CSS_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/Bootstrap_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/PHP_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/mysql_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p class="description_top">
                        Voici une <strong>application</strong> qui sert de <strong>calendrier et d'agenda</strong>. 
                        Elle permet de visualiser <strong>jours/mois/années</strong>,
                        mais surtout permet dynamiquement de <strong>créer ou de supprimer des événements</strong>.
                        Pour cela l'application est réliée à <strong>une base de donnée</strong>, et elle est gérer par une classe appellée calendrier.
                    </p>
                    <a href="<?= $router->generate('calendrier') ?>">
                        <button type="text" class="btn btn-info text-primary my-2 button_try"><strong>Essayer moi !</strong></button>
                    </a> 
                </div>

            </div>
        </div>
        <!-- BONNETEAU -->
        <div class="project js-item" tabindex="0">
            <img src="../asset/portfolio/screen-shot_dev/bonneteau.jpg" alt="" class="project__image">
            <h2 class="project__name mt-2">Jeu du Bonneteau</h2>
            
            <div class="project__body js-body">
                <h2 class="text-center">Bonneteau</h2>
                <div class="project__description">
                    <p>
                        <strong>Description : </strong>Le <strong>célèbre jeu</strong> d'arnaque de rue en php vanilla.
                    </p>
                </div>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Langages/Technos utilisées :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/HTML_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/CSS_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/Bootstrap_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/PHP_128x128.png" alt="" class="logo">
                    </div>
                    
                </div>
                <div class="description_link">
                    <p class="description_top">
                        Voici une représentation <strong>'un peu imaginée'</strong> du <strong>célèbre jeu de bonneteau</strong>, 
                        qui consite à trouver une carte sur les trois présentées face de dos, et ainsi remporter sa mise.
                        Le jeu est entièrement développer <strong>en php vanilla (pas de POO)</strong> le but était de le faire fonctionner vite!
                        Il n'en reste pas moins qu'il était amusant à développer.
                        J'ai laissé le tableau de debug, car il reste un bug que je n'ai pas encore identifier mais il ne gêne en rien l'éxpérience.
                    </p>
                    <a href="<?= $router->generate('home_bonneteau') ?>">
                        <button type="text" class="btn btn-info text-primary my-2 button_try"><strong>Essayer moi !</strong></button>
                    </a> 
                </div>
            </div>
        </div>
        <!-- HAMBURGER -->
        <div class="project js-item" tabindex="0">
            <img src="../asset/portfolio/screen-shot_dev/hamburger_anime.png" alt="" class="project__image">
            <h2 class="project__name my-2">Bouton de menu animé</h2>
            
            <div class="project__body js-body mb-3">
                <h2 class="text-center">Hamburger Animé</h2>
                <div class="project__description">
                    <p><strong>Description : </strong> Animation qui a pour but d'améliorer l'expérience utilisateur, avec feedback lors de l'interaction.</p>
                </div>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Langages/Technos utilisées :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/HTML_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/CSS_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/Sass_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/jQuery_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p class="description_top">
                        Le but est de donner une indication claire à l'utilisateur lors de son interaction avec le <strong>bouton de hamburger</strong>,
                        afin de lui donner, de la façon la plus visuelle possible
                        un <strong>feedback</strong> sur son action et les possibilités à suivre (ici la fermeture du menu).
                    </p>
                    <a href="<?= $router->generate('hamburger') ?>">
                        <button type="text" class="btn btn-info text-primary my-2 button_try"><strong>Essayer moi !</strong></button>
                    </a>
                </div>
            </div>
        </div>
        <!-- SpaceInvaders -->
        <div class="project js-item" tabindex="0">
            <img src="../asset/portfolio/screen-shot_dev/spaceInvaders.jpg" alt="" class="project__image">
            <h2 class="project__name mt-2">SpaceInvaders-like</h2>
            
            <div class="project__body js-body">
                <h2 class="text-center">SpaceInvaders</h2>
                <div class="project__description">
                    <p>
                        <strong>Description : </strong>Le célèbre jeu <strong>SpaceInvaders</strong> ré-inventé...
                    </p>
                </div>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Langages/Technos utilisées :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/HTML_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/CSS_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/javascript_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p class="description_top">
                        Un jeu culte !!! 
                        Entièrement développer en <strong>Javascript</strong>, avec l'utilisation de d'objets,
                        mais je l'ai développer avant ES6 et cela mériterais d'être entièrement repenser.
                        les assets sont à retravailler, et le système de collision ne fonctionne pas du tous.
                        Mais le déplacement et le tir du vaisseau fonctionne bien ! lol
                        <strong>WORK-In-PROGRESS</strong>
                    </p>
                    <a href="<?= $router->generate('spaceInvaders') ?>">
                        <button type="text" class="btn btn-info text-primary my-2 button_try"><strong>Essayer moi !</strong></button>
                    </a> 
                </div>
            </div>
        </div>
        <!-- React Lecteur Video -->
        <div class="project js-item" tabindex="0">
            <img src="../asset/portfolio/screen-shot_dev/react_lecteur_video.jpg" alt="" class="project__image">
            <h2 class="project__name mt-2">Lecteur vidéo de trailers</h2>
            
            <div class="project__body js-body">
                <h2 class="text-center">Lecteur Vidéo</h2>
                <div class="project__description">
                    <p>
                        <strong>Description : </strong>Un lecteur video de trailers de films en React et l'Api 'The Movie DB'
                    </p>
                </div>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Langages/Technos utilisées :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/nodeJs_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/javascript_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/React.js_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/movieDb_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p>
                        Une petite <strong>application</strong> qui copie le lecteur video <strong>YouTube</strong>.
                        Entièrement développée avec <strong>React</strong> et l'api <strong>The Movie DB</strong>.
                    </p>
                    <p>
                        La barre de recherche permet de trouver un trailer de film,
                        et la colonne de proposition de film à droite est générer dynamiquement en fonction du film recherché.
                    </p>
                    <p>
                        Le projet n'est pas testable ici puisqu'il utilise NodeJs, mais le code est disponible sur mon GitHub.
                    </p>
                    <a href="https://github.com/jeremieGenet/Lecteur-video-React" target="_blank">
                        <button type="text" class="btn btn-info text-primary my-2 button_try"><strong>Le code sur mon GitHub</strong></button>
                    </a> 
                </div>
            </div>
        </div>
        <!-- Wordpress persona 5 -->
        <div class="project js-item" tabindex="0">
            <img src="../asset/portfolio/screen-shot_dev/wordpress_persona5.jpg" alt="" class="project__image">
            <h2 class="project__name mt-2">Un site avec Worpress</h2>
            
            <div class="project__body js-body">
                <h2 class="text-center">Wordpress_Persona 5</h2>
                <div class="project__description">
                    <p>
                        <strong>Description :</strong> Un site crée avec Wordpressle le célèbre CMS.
                    </p>
                </div>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Langages/Technos utilisées :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/wordpress_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p class="description_top">
                        Un site vitrine créer avec <strong>Wordpress</strong>.
                    </p>
                    <p>
                        Le site n'est pas en ligne, je n'y vois pas l'intèret! Il était pour moi l'occasion de tester à nouveau <strong>Wordpress</strong> 
                        que je n'avais pas touché depuis quelques années. Beaucoup de choses on changées notamment son éditeur de texte.
                    </p>
                    <p>
                        Pour moi, <strong>Wordpress</strong> est un jeu de légo, mais pour avoir toutes les pièces, il faut payer, et la maintenance
                        d'un site avec <strong>Wordpress</strong> reste discutable.
                        Malgré tout il est toujours drôle de jouer aux légo.
                    </p>
                </div>
            </div>
        </div>
        <!-- Portfolio en grille -->
        <div class="project js-item" tabindex="0">
            <img src="../asset/portfolio/screen-shot_dev/portfolio.jpg" alt="" class="project__image">
            <h2 class="project__name mt-2">Portfolio avec déroulé</h2>
            
            <div class="project__body js-body">
                <h2 class="text-center">Portfolio</h2>
                <div class="project__description">
                    <p>
                        <strong>Description : </strong> Création d'un portfolio en javascript.
                    </p>
                </div>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Langages/Technos utilisées :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/HTML_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/CSS_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/javascript_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p class="description_top">
                        Le but de ce <strong>portfolio</strong> est lorsqu'on click sur l'image,
                        obtenir des informations (en déroulé) sur le projet.
                    </p>
                    <p>
                        Le portfolio est utilisé pour contenir les projets de démonstration du site!
                    </p>
                    <p>
                        Pour cela, en javascript on créer un div cachée et qui s'affichera à l'évenement click.
                        La <strong>difficulté</strong> ici était la gestion de l'affichage de la div, mais avec le calcul du scroll
                        et de la taille l'écran cela fonctionne parfaitement!
                    </p>
                    <a href="<?= $router->generate('portfolio') ?>">
                        <button type="text" class="btn btn-info text-primary my-2 button_try"><strong>Essayer moi !</strong></button>
                    </a> 
                </div>
            </div>
        </div>
        <!-- Fenêtre Modale -->
        <div class="project js-item" tabindex="0">
            <img src="../asset/portfolio/screen-shot_dev/fenetre_modale.jpg" alt="" class="project__image">
            <h2 class="project__name mt-2">Fenêtre Modale</h2>
            
            <div class="project__body js-body">
                <h2 class="text-center">Fenêtre Modale</h2>
                <div class="project__description">
                    <p>
                        <strong>Description :</strong> Création d'une Fenêtre Modale en Javascript
                    </p>
                </div>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Langages/Technos utilisées :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/HTML_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/CSS_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/javascript_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p class="description_top">
                        Le but ici était de créer une <strong>fenêtre d'affichage</strong> pour des informations supplémentaires,
                        agrandir une image, donner des information sur les cookies, bref une fenêtre informative comme on peut en avoir souvent besoin sur un site.
                    </p>
                    <p>
                        Cette fenêtre s'affiche lors du click sur un lien, et disparaît si on click dessus ou même à coté.
                        Et elle dissimule le reste de l'écran.
                    </p>
                    <a href="<?= $router->generate('fenetre_modale') ?>">
                        <button type="text" class="btn btn-info text-primary my-2 button_try"><strong>Essayer moi !</strong></button>
                    </a> 
                </div>
            </div>
        </div>
        <!-- Snake -->
        <div class="project js-item" tabindex="0">
            <img src="../asset/portfolio/screen-shot_dev/snake.jpg" alt="" class="project__image">
            <h2 class="project__name mt-2">Snake-like</h2>
            
            <div class="project__body js-body">
                <h2 class="text-center">Snake</h2>
                <div class="project__description">
                    <p>
                        <strong>Description : </strong> Le célèbre jeu <strong>du Snake</strong> de votre ancien Nokia 3310...
                    </p>
                </div>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Langages/Technos utilisées :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/HTML_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/CSS_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/javascript_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p class="description_top">
                        Encore un jeu culte !!! 
                        Entièrement développer en <strong>Javascript</strong>, avec l'utilisation des objets,
                        et des classes ES6. L'interface est simpliste mais cela fonctionne parfaitement.
                    </p>
                    <a href="<?= $router->generate('snake') ?>">
                        <button type="text" class="btn btn-info text-primary my-2 button_try"><strong>Essayer moi !</strong></button>
                    </a> 
                </div>
            </div>
        </div>
        <!-- PlateFormer -->
        <div class="project js-item" tabindex="0">
            <img src="../asset/portfolio/screen-shot_dev/plateformer.jpg" alt="" class="project__image">
            <h2 class="project__name mt-2">Plateformer</h2>
            
            <div class="project__body js-body">
                <h2 class="text-center">Plateformer</h2>
                <div class="project__description">
                    <p>
                        <strong>Description : </strong> Un Jeu de <strong>Plateforme</strong> crée en <strong>Lua et Love</strong>.
                    </p>
                </div>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Langages/Technos utilisées :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/Lua_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/love_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p class="description_top">
                        Voici un jeu de <strong>plate-forme</strong> tout ce qu'il y a de plus classique.
                        La particularité est qu'il est développer en <strong>Lua</strong>, un language de script très malléable.
                    </p>
                    <p>
                        Son interpréteur est <strong>LOVE</strong> qui est aussi une librairie "basique".
                    </p>
                    <p>
                        Les niveaux sont <strong>des fichiers texte (.txt)</strong> qui sont parcourus
                        dans une boucle en lua et en remplaçant chaque caractère par une tuile (image en jpg).
                    </p>
                    <p>
                        Le code est sur mon github, je pense compiler le tout et le rendre dispo bientôt.
                    </p>
                    <a href="https://github.com/jeremieGenet/plateformer-lua/tree/master" target="_blank">
                        <button type="text" class="btn btn-info text-primary my-2 button_try"><strong>Voir le code sur GitHub</strong></button>
                    </a> 
                </div>
            </div>
        </div>
        
        <!-- BLOG -->
        <div class="project js-item" tabindex="0">
            <img src="../asset/portfolio/screen-shot_dev/blog.jpg" alt="" class="project__image">
            <h2 class="project__name mt-2">Blog en POO</h2>
            
            <div class="project__body js-body">
                <h2 class="text-center">Blog générique en programmation orienté objet</h2>
                <div class="project__description">
                    <p>
                        <strong>Description : On reprend se que l'on a appris sur la <strong>programmation orienté objet</strong>
                            et sur les <strong>relation entre tables</strong>, avec un blog générique. 
                    </p>
                </div>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Langages/Technos utilisées :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/HTML_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/CSS_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/PHP_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/mysql_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p class="description_top">
                        C'est l'un des premiers exercices que j'ai réalisé lorsque appris à programmer en <strong>PHP</strong> avec une base de donnée.
                        <strong>Un Blog simple</strong> avec un titre et un contenu.
                    </p>
                    <p>
                        Ici, pour le visuel, j'ai ajouté des photos (de la librairie 'Faker') et une date, mais le principe est le même qu'à mes début.
                    </p>
                    <p>
                        Le challenge était de reprendre ce code écrit de façon <strong>"procédural"</strong> et de l'orienté objet.
                        Mais aussi d'utilisé les notions du jointure entre tables en language <strong>SQL</strong> en créant des catégorie d'article.
                    </p>
                    <p>
                        J'ai vu un tuto en anglais sur la possiblité d'ajouté <strong>REACT</strong> dans un projet crée avec<strong>Composer</strong>,
                        comme c'est le cas pour celui-ci. Donc je pense dans le futur tester l'ajout d'un système de 'j'aime' ou d'étoiles en
                        <strong>REACT</strong>, pour les articles.
                    </p>
                    <a href="<?= $router->generate('home_blog') ?>" target="_blank">
                        <button type="text" class="btn btn-info text-primary my-2 button_try"><strong>Essayez moi !</strong></button>
                    </a> 
                </div>
            </div>
        </div>
        <!-- IA ZOMBIES -->
        <div class="project js-item" tabindex="0">
            <img src="../asset/portfolio/screen-shot_dev/ia_zombies.jpg" alt="" class="project__image">
            <h2 class="project__name mt-2">Zombies en Lua</h2>
            
            <div class="project__body js-body">
                <h2 class="text-center">Attack Zombies !!!</h2>
                <div class="project__description">
                    <p>
                        <strong>Description : Création d'une horde de zombies, mais avec un comportement individuel pour chaque zombie.
                    </p>
                </div>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Langages/Technos utilisées :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/Lua_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/love_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p class="description_top">
                        Le but ici était de crée une <strong>horde de zombies</strong>, ou chacun d'eux se déplace aléatoirement sur l'écran.
                        Mais si le perso principal approche de l'un d'entre eux, il prend l'aggro et risque au contact de se faire mordre.
                    </p>
                    <p>
                        Pour rendre la horde plus 'réaliste', il fallait rendre le comportement des zombies différent les uns des autres.
                    </p>
                    <p>
                        <strong>Lua</strong> ne permet pas la programmation orienté objet, mais en créant une <strong>"Machine à état"</strong> (une fonction) qui agit sur les zombies crées,
                        on peut s'ammuser à leurs donner un comportement différent individuellement.
                    </p>
                    <p>
                        Ainsi, lorsque le perso s'approche des zombies, certains le décterons uniquement à courte distance, d'autre de beaucoup plus loin.
                        Certain courons sur lui pour le mordre, alors que d'autre plus lent ne s'approcheront qu'en marchant.
                        Mais attention, s'il y a contact le perso se fait modre et perd de la vie, et si sa vie arrive à zéro, une animation est déclenchée
                        et le cadavre du perso s'affiche dans une marre de sang.
                    </p>
                    <p>
                        Alors, les zombies repartent vaquer à leur état d'origine individuellement. 
                    </p>
                    <a href="https://github.com/jeremieGenet/IA-Zombies" target="_blank">
                        <button type="text" class="btn btn-info text-primary my-2 button_try"><strong>Voir le code sur GitHub</strong></button>
                    </a> 
                </div>
            </div>
        </div>
        
        
    </div> <!-- Fin de div class="portfolio" id="js-portfolio" -->

</div> <!-- Fin de div class="container myPortfolio"-->

<?php
    // Chemin des script JS utiles
    $path->getJs("../js/portfolio_dev/matrix.js");
    $path->getJs("../js/portfolio_dev/portfolio.js");
    $path->getJs("../js/portfolio_dev/polyfill_portfolio.js");
?>









