<?php
/*
    PORTFOLIO DES REALISATIONS DESIGN
*/
use App\Path;

$title = "Réalisations en design";
$path = new Path();
$path->getStyle("../css/design/portfolio_design.css");
?>


<!-- PORTFOLIO EN GRILLE -->
<div class="container" id="myPortfolio">

    <h1 class="text-center my-4">Mes réalisations en <strong>Design</strong></h1>

    <div class="portfolio" id="js-portfolio">

        <!-- PS flou -->
        <div class="project js-item" tabindex="0">
            <img class="project__image" src="../asset/portfolio/design/flou_bg.png" alt="" >
            <h2 class="project__name mt-2">Madame en rouge!</h2>
            <div class="project__body js-body">
                <h2 class="text-center"></h2>
                <div class="project__description">
                    <p>
                        <strong>Description :</strong> Incorporer un personnage à un décor avec bel arrière plan flou.
                </div>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Logiciel utilisé :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/Ps_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p>
                        Un rapide <strong>détourage</strong> de la femme en rouge, puis on l'inclue dans un décor.
                    </p>
                    <p>
                        Et pour faire ressortir notre femmme en rouge, il suffit d'utiliser d'utiliser le flou gaussiens de photoshop,
                        un peu comme on si avec un appareil photo on shootait avec le diaphragme ouvert à fond ou presque.
                        Ensuite travailler l'intensité de ce flou pour le nullifier au premier plan, puis l'augmenter jusqu'en arrière plan.
                    </p>

                    
                    
                    
                    
                </div>
            </div>
        </div>
        <!-- Ville engloutie -->
        <div class="project js-item" tabindex="0">
            <img src="../asset/portfolio/design/ville_engloutie.png" alt="" class="project__image">
            <h2 class="project__name mt-2">Ville engloutie</h2>
            
            <div class="project__body js-body mb-3">
                <h2 class="text-center">Ville engloutie</h2>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Logiciel utilisé :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/Ps_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p>
                        Photo montage d'une ville engloutie par les eaux avec <strong>Photoshop</strong>
                    </p>
                    <p>
                        Ici pas mal de travail, deux images principale et 5 <strong>'brush'</strong> utilisées.
                    </p>
                </div>
            </div>
        </div>
        <!-- Le chat d'halloween -->
        <div class="project js-item" tabindex="0">
            <img src="../asset/portfolio/design/chat_ps.png" alt="" class="project__image">
            <h2 class="project__name mt-2">Le chat d'Halloween</h2>
            
            <div class="project__body js-body">
                <h2 class="text-center">Chat d'halloween</h2>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Logiciels utilisés :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/PS_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/Ai_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p>
                        Le dessin est fait avec <strong>Illustrator</strong>, donc entièrement vectoriel, et ensuite un retravail sur
                        <strong>Photoshop</strong> pour le texte et l'ajout de filtres d'ensemble.
                    </p>
                </div>

            </div>
        </div>
        <!-- Ampoule d'eau -->
        <div class="project js-item" tabindex="0">
            <img src="../asset/portfolio/design/ampoule.png" alt="" class="project__image">
            <h2 class="project__name mt-2">Ampoule d'eau</h2>
            
            <div class="project__body js-body">
                <h2 class="text-center">Ampoule d'eau</h2>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Logiciels utilisés :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/PS_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p>
                        Petit photo montage à partir d'une ampoule toute simple, et d'une photo de poissons.
                        Ici on s'ammuse à rendre trasparent la photo de l'ampoule tout en gardant un maximum de 'matière',
                        et on incorpore un image d'eau de mer que l'on rend très bleue, puis des poissons.
                    </p>
                </div>

            </div>
        </div>
        <!-- Logo -->
        <div class="project js-item" tabindex="0">
            <img src="../asset/portfolio/design/Logo_site.png" alt="" class="project__image">
            <h2 class="project__name mt-2">Logo</h2>
            
            <div class="project__body js-body">
                <h2 class="text-center">Logo</h2>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Logiciel utilisé :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/Ai_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p>
                        Création d'un logo avec <strong>Illustrator</strong>.
                        Le but ici est de travailler avec des cercles, les déformer, puis les répéter de façon régulière.
                    </p>
                </div>

            </div>
        </div>
        <!-- Effet Destructuration -->
        <div class="project js-item" tabindex="0">
            <img src="../asset/portfolio/design/effet_destructuration.png" alt="" class="project__image">
            <h2 class="project__name mt-2">Effet de destructuration</h2>
            
            <div class="project__body js-body">
                <h2 class="text-center">Effet de desctructuration</h2>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Logiciel utilisé :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/Ps_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p>
                        Deux photos utilisées ici (le visage et une texture de glace), avec <strong>Photoshop</strong> pour ce montage.
                    </p>
                    <p>
                        On joue avec les masques de fusion et l'outil pinceau pour réaliser l'effet de destructuration.
                    </p>
                </div>

            </div>
        </div>
        <!-- Parallax Photoshop -->
        <div class="project js-item" tabindex="0">
            
            <img src="../asset/portfolio/design/parallax.jpg" alt="" class="project__image">
        
            <h2 class="project__name mt-2">Parallaxe avec Photoshop</h2>
            
            <div class="project__body js-body">
                <h2 class="text-center">Parallaxe</h2>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Logiciel utilisé :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/Ps_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p>
                        Nous avons deux images (mais il pourrait il y en avoir plus), et le but est de superposer
                        l'image de notre personnage sur l'arrière plan.
                    </p>
                    <p>
                        Puis de jouer avec le zoom et déplacement de celles-ci en décaler.
                    </p>
                    <video controls id="videos">
                        <source src="../asset/portfolio/design/parallax.mp4">
                    </video>
                </div>

            </div>
        </div>
        <!-- LANDSCAPE -->
        <div class="project js-item" tabindex="0">
            <img src="../asset/portfolio/design/landscape.jpg" alt="" class="project__image">
            <h2 class="project__name mt-2">Paysage Mexicain</h2>
            
            <div class="project__body js-body">
                <h2 class="text-center">Paysage avec After Effect</h2>
                <div class="row languages py-2">
                    <div class="col-md-5">
                        <h3 class="mt-2">Logiciel utilisé :</h3>
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/Ps_128x128.png" alt="" class="logo">
                    </div>
                    <div class="col-md-1">
                        <img src="../asset/portfolio/logo/Ae_128x128.png" alt="" class="logo">
                    </div>
                </div>
                <div class="description_link">
                    <p>
                        Montage vidéo fait avec <strong>After Effect</strong>.
                    </p>
                    <p>
                        Ici rien de compliqué, on utilise <strong>Photoshop</strong> pour créer les différents calques de fond,
                        et les éléments de décors (rocher, cactus, nuages et oiseaux). Puis on les récupère dans <strong>AfterEffect</strong>.
                    </p>
                    <p>
                        Les oiseaux ont eux une <strong>animation</strong> un peu plus travaillé (zoom, et animation des ailes) et le soleil
                        un zoom avec effet flare-lens pour augmenter son intensité.
                    </p>
                    <video controls id="videos">
                        <source src="../asset/portfolio/design/paysage.mp4">
                    </video>
                </div>

            </div>
        </div>
        
        
        
    </div> <!-- Fin de div class="portfolio" id="js-portfolio" -->

</div> <!-- Fin de div class="container myPortfolio"-->

<?php
    // Chemin des script JS utiles
    $path->getJs("../js/portfolio_dev/portfolio.js");
    $path->getJs("../js/portfolio_dev/polyfill_portfolio.js");
    
?>









