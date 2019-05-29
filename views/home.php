<?php
/*
    PAGE D'ACCUEIL
*/
use App\Path;

$title = "Accueuil";

$path = new Path();
$path->getStyle("../css/home.css");
$path->getStyle("../css/common/font-awesome/css/all.min.css");
?>

<div class="container">
    
    <main class="home">

        <h1 class="text-center mb-4">Présentation</h1>

        <!-- SUR MOI / DESCRIPTION DU SITE -->
        <div class="description">
            <div class="row">
                <div class="col-md-4 surMoi">
                    <h3 class="surMoi_title">En savoir plus sur moi</h3>
                    <ul>
                        <li>
                            Présentation
                        </li>
                        <li>
                            Expériences
                        </li>
                        <li>
                            Formation
                        </li>
                        <li>
                            Compétences
                        </li>
                        <li>
                            Cv pdf
                        </li>
                        <li id="link_surMoi">
                            <a href="<?= $router->generate('cv') ?>"><i class="fas fa-caret-square-right"> Voir le CV</i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8 description_text">
                    <h3 class="my-3">Présentation du site et de sa construction</h3>
                    <p>
                        Codé à la main (sans frameWork ou CMS), ce <strong>site</strong> est pour moi un <strong>Bac à sable</strong> qui me sert de <strong>Portfolio</strong> et dans lequel je stocke :
                    </p>
                    <ul>
                        <li>
                            Mon <strong>CV</strong> sous forme de Template one page (et un pdf récapitulatif).
                        </li>
                        <li>
                            Les applications/projets/jeux... que j'ai pu développer pour apprendre, ou perfectionner mes compétences 
                            dans les <strong>languages, api, librairies, framework ou outils</strong>  utilisées.
                        </li>
                        <li>
                            Les réalisations en design ou montage avec <strong>Photoshop</strong>, <strong>Illustrator</strong>, ou <strong>After Effect</strong>.
                        </li>
                    </ul>
                    <p>
                        Les language de programmation principaux utilisés sont le <strong>PHP</strong> et le <strong>Javascript</strong>, mais certains projets présentés
                        utilisent d'autre languages comme <strong>Lua</strong>. Je commence à régarder du coté de <strong>C#</strong> pour réaliser des petits projets perso.
                    </p>
                    <p>
                        Un <strong>Espace Membres</strong> est implémenté, mais je suis en train de le 'refactorer' en <strong>POO</strong>,
                        ce qui explique le bouton de 'Déconnexion' inactif.
                    </p>
                    <p>
                        D'autres applications ne sont pas présentés car elles ne présentent aucun intérêt visuel, ou sont en cours de rapatriement.
                        Dans ce bac à sable, certaines applications présentes sont en cours de modification et d'autres sont ammenés à disparaître.
                    </p>
                    <p>
                        Ce site est un petit <strong>frameWork maison</strong> construit avec <strong>bootstrap</strong> et un thème gratuit de <strong>bootswatch (slate)</strong> 
                        pour la partie front.
                        Pour la partie back, j'utilise <strong>'Composer'</strong>, la librairie <strong>'altorouter'</strong> 
                        pour la gestion du rooting, et une achitecture en <strong>MVC</strong> pour l'organisation.
                        <strong>Les applications</strong> qui utilisent une base de données (comme l'agenda ou le blog) sont administrées avec <strong>MySQL</strong>.
                    </p>
                </div>
            </div>
        </div>

        <h2 class="text-center my-4">languages, Outils et Technos utilisés :</h2>

        <div class="technos">
            <!-- DEV LOGO -->
            <div class="dev">  
                <!-- 1ere ligne de logos -->
                <div class="row row-logo">
                    <div class="col-md-3 technos_dev">
                        <h3>Développement</h3>
                        <a href="<?= $router->generate('portfolio_dev') ?>"><i class="fas fa-caret-square-right"> Voir les Réalisations</i></a>
                    </div>
                    <div class="col-md-9 technos_logos">
                        <div class="row">
                            <div class="col-xs-2">
                                <img class="logo" src="asset/portfolio/logo/Bootstrap_128x128.png" alt="">
                            </div>
                            <div class="col-xs-2">
                                <img class="logo" src="asset/portfolio/logo/HTML_128x128.png" alt="">
                            </div>
                            <div class="col-xs-2">
                                <img class="logo" src="asset/portfolio/logo/CSS_128x128.png" alt="">
                            </div>
                            <div class="col-xs-2">
                                <img class="logo" src="asset/portfolio/logo/javascript_128x128.png" alt="">
                            </div>
                            <div class="col-xs-2">
                                <img class="logo" src="asset/portfolio/logo/React.js_128x128.png" alt="">
                            </div>
                            <div class="col-xs-2">
                                <img class="logo" src="asset/portfolio/logo/Redux_128x128.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 2nd ligne de logos -->
                <div class="row row-logo">
                    <div class="col-md-3 technos_dev"></div>
                    <div class="col-md-9">
                        <div class="row  technos_logos">
                            <div class="col-xs-2">
                                <img class="logo" src="asset/portfolio/logo/PHP_128x128.png" alt="">
                            </div>
                            <div class="col-xs-2">
                                <img class="logo" src="asset/portfolio/logo/mysql_128x128.png" alt="">
                            </div>
                            <div class="col-xs-2">
                                <img class="logo" src="asset/portfolio/logo/composer_128x128.png" alt="">
                            </div>
                            <div class="col-xs-2">
                                <img class="logo" src="asset/portfolio/logo/symfony_128x128.png" alt="">
                            </div>
                            <div class="col-xs-2">
                                <img class="logo" src="asset/portfolio/logo/twig_128x128.png" alt="">
                            </div>
                            <div class="col-xs-2">
                                <img class="logo" src="asset/portfolio/logo/doctrine_128x128.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 3eme ligne de logos -->
                <div class="row row-logo">
                    <div class="col-md-3 technos_dev"></div>
                    <div class="col-md-9">
                        <div class="row technos_logos">
                            <div class="col-xs-2">
                                <img class="logo" src="asset/portfolio/logo/wordpress_128x128.png" alt="">
                            </div>
                            <div class="col-xs-2">
                                <img class="logo" src="asset/portfolio/logo/nodeJs_128x128.png" alt="">
                            </div>
                            <div class="col-xs-2">
                                <img class="logo" src="asset/portfolio/logo/Lua_128x128.png" alt="">
                            </div>
                            <div class="col-xs-2">
                                <img class="logo" src="asset/portfolio/logo/love_128x128.png" alt="">
                            </div>
                            <div class="col-xs-2">
                                <img class="logo" src="asset/portfolio/logo/jQuery_128x128.png" alt="">
                            </div>
                            <div class="col-xs-2">
                                <img class="logo" src="asset/portfolio/logo/movieDb_128x128.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            <!-- DESIGN LOGO-->
            <div class="design">
                <div class="row">
                    <div class="col-md-3 design_text">
                        <h3>Design</h3>
                        
                        <a href="<?= $router->generate('portfolio_design') ?>"> <i class="fas fa-caret-square-right"> Voir les Réalisations</i></a>
                    </div>
                    <div class="col-md-9 design_logos">
                        <div class="row">
                            <div class="col-xs-3">
                                <img class="logo" src="asset/portfolio/logo/Ps_128x128.png" alt="">
                            </div>
                            <div class="col-xs-3">
                                <img class="logo" src="asset/portfolio/logo/ai_128x128.png" alt="">
                            </div>
                            <div class="col-xs-3">
                                <img class="logo" src="asset/portfolio/logo/Ae_128x128.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

</div> <!-- container -->
