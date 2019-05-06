<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>
            <?= $title ?> 
        </title>

        
        <!-- Style Bootstrap   $style_bootstrap  -->
        <link rel="stylesheet" href="<?= $path->getBootstrap() ?>">

        <!--
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        -->

        <link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">

        <?php
        //dump( dirname(__DIR__, 2) . "/public/css/bootstrap.min.css");
        //dump(../../public/css/bootstrap.min.css);
        //dump($path->getBootstrap());
        //dump(__DIR__);
        ?>

    </head>

    <body>

        <!-- HEADER DU SITE -->
        <header>
            
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="#">Mon Site</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $router->generate('home') ?>">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $router->generate('article') ?>">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $router->generate('portfolio') ?>">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $router->generate('calendrier') ?>">Calendrier</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $router->generate('home_bonneteau') ?>">Jeu de Bonneteau</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $router->generate('spaceInvaders') ?>">Space Invaders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $router->generate('space') ?>">Space X</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link bg-secondary my-2">
                                Déconnexion
                            </a> 
                        </li>
                    </ul>
                </div>
            </nav>
            
        </header>

        <!-- Debug session utilisateur (affichage) -->
        <?php 
            /*
            if(isset($_SESSION)){
                var_dump($_SESSION);
            }
            if(isset($_SESSION['flash'])){
                var_dump($_SESSION['flash']);
            }
            if(isset($_SESSION['infoUser'])){
                var_dump($_SESSION['infoUser']);
            }
            */
        ?>

        <!-- CONTENU DU SITE -->
        <div class="container-fluid">

            <!-- Contenu dynamique du site -->
            <?= $content ?>

        </div> <!-- Fin de div container -->    

    <!-- FOOTER DE L'ENSEMBLE DES PAGES DE L'ESPACE MEMBRES -->
    <footer class="bg-primary py-5 text-center">
        <p>© 2018 - 2019 by me. <strong>Proudly</strong> created with by my fingers</p>
    </footer>

    <!-- Les 3 scripts suivants servent au fonctionnement de bootstrap (chemin dynamique)-->
    <script src="<?= $path->getJsJquery() ?>"></script>
    <script src="<?= $path->getJsPopper() ?>"></script>
    <script src="<?= $path->getJsBootstrap() ?>"></script>

    <!-- Mon javascript -->
    <script src="<?= $path->getCustomJs() ?>"></script>

    </body>

</html>