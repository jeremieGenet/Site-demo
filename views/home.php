<?php
/*
    PAGE D'ACCUEIL
*/
use App\Path;

$title = "Accueuil";

$path = new Path();
$path->getStyle("../css/home.css");
?>

<div class="container">

    <div class="description">
        <h1>Page d'accueil</h1>

        <p>
            Dans ce <strong>portfolio</strong> je présente une partie des <strong>projets</strong> (tuto, cours, essais perso...) 
            que j'ai pu réaliser pour apprendre et perfectionner mes connaissances en programmation et qui ont un intérêt d'un point de vue "rendu/visuel".
        </p>
        <p>
            Il s'agit pour moi d'un <strong>bac à sable</strong>, dans lequel je peux facilement intégrer des petites <strong>'applications/jeux...'</strong>
            et tester différentes configurations.
        </p>
        <p>
            Ce site est un petit <strong>frameWork</strong> maison construit avec <strong>bootstrap</strong> et un thème gratuit de <strong>bootswatch (slate)</strong> 
            pour la partie front.
            Pour la partie back, j'utilise <strong>'Composer'</strong> très pratique pour son autoloader, la librairie <strong>'altorouter'</strong> 
            pour la gestion du rooting, et une achitecture en <strong>MVC</strong> pour l'organisation.
            <strong>Les applications</strong> qui utilisent une base de données (comme l'agenda ou le blog) sont administrées avec <strong>MySQL</strong>.
        </p>
    </div>

</div>
