<?php
use App\Path;

$title = "cv et infos";

$path = new Path();
$path->getStyle("../css/cv/cv.css");
$path->getStyle("../css/common/font-awesome/css/all.min.css");
?>

<div class="container-fluid" id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Clarence Taylor</span>
        <span class="d-none d-lg-block">
            <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="../asset/cv/photo_cv2.jpg" alt="">
        </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= $router->generate('home') ?>">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#about">PRESENTATION</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#experience">Experience</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#education">FORMATION</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#skills">COMPETENCES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#interests">CENTRE D'INTERET</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" target="_blank" href="../asset/cv/cv2019.pdf">CV PDF</a>
            </li>
        </ul>
        </div>
    </nav>

    <div class="container p-0">

        <!-- PRESENTATION -->
        <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
            <div class="w-100">
                <h1 class="mb-0">Jérémie
                <span class="text-primary">GENET</span>
                </h1>
                <div class="subheading mb-5">5 rue de la fontaine 52310 Oudincourt
                    <a href="mailto:jeremiesamuel.genet@gmail.com">jeremiesamuel.genet@gmail.com</a>
                </div>
                <p class="lead mb-5">
                    Je suis quelqu'un de motivé, dynamique, curieux de comprendre ce qui l'entoure. 
                    Je sais travailler seul, mais j'ai l'esprit d'équipe et suis capable d'assumer des responsabilités. <br>
                    Jusqu'ici j'ai pu travailler dans des secteurs d'activité très variés (menuiserie, livraison, commerce, informatique...), en équipe ou en solo. 
                    Ces différentes expériences m'ont rendu polyvalent et m'ont permis de prendre du recul sur le travail en entreprise.
                </p>
                <div class="social-icons">
                    <a href="#">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>
        </section>

        <hr class="m-0">

        <!-- EXPERIENCES -->
        <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="experience">
            <div class="w-100">
                <h2 class="mb-5">Experience</h2>

                <!-- RESPONSABLE MULTI-RAYONS -->
                <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="resume-content">
                        <p class="job">
                            RESPONSABLE MULTI-RAYONS 
                            <span class="job_location">&nbsp;à Leclerc Chaumont</span>
                        </p>
                        
                        <div class="subheading">
                            Rayons : <span class="rayons">&nbsp;Informatique, Téléphonie, Jeux vidéo, électroménager(PEM, GEM), Tv et Son</span>
                        </div>
                        <p></p>
                        <p>Description :</p>
                        <ul>
                            <li>
                                Management d'un équipe de 12 personnes (élargie en période de grande influence)
                            </li>
                            <li>
                                Gestion de l'approvisionnement, des stocks et de la rentabilité
                            </li>
                            <li>
                                Formation des collaborateurs
                            </li>
                            <li>
                                Participation aux réunions d'achats de la centrale d'achats (ScapAlsaces) et <br>
                                participation à la création de la centrale d'achat multimédia (particulièrement son site)
                            </li>
                        </ul>
                    </div>
                    <div class="resume-date text-md-right">
                        <span class="text-primary">Mai 2014 à Juillet 2017</span>
                    </div>
                </div>
                <!-- RESPONSABLE RAYONS -->
                <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="resume-content">
                        <p class="job">
                            RESPONSABLE RAYONS 
                            <span class="job_location">&nbsp;à Leclerc Chaumont</span>
                        </p>
                        
                        <div class="subheading">
                            Rayons : <span class="rayons">&nbsp;Informatique, Jeux vidéo, électroménager(PEM, GEM), Tv et Son</span>
                        </div>
                        <p></p>
                        <p>Description :</p>
                        <ul>
                            <li>
                                Management d'un équipe de 9 personnes (élargie en période de grande influence)
                            </li>
                            <li>
                                Gestion de l'approvisionnement et des stocks
                            </li>
                            <li>
                                Formation des nouveaux collaborateurs
                            </li>
                        </ul>
                    </div>
                    <div class="resume-date text-md-right">
                        <span class="text-primary">Avril 2010 à Mai 2014</span>
                    </div>
                </div>
                <!-- ADJOINT RESPONSABLE DE RAYONS -->
                <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="resume-content">
                        <p class="job">
                            ADJOINT RESPONSABLE RAYONS 
                            <span class="job_location">&nbsp;à Leclerc Chaumont</span>
                        </p>
                        
                        <div class="subheading">
                            Rayons : <span class="rayons">&nbsp;Informatique, Jeux vidéo, Tv et Son</span>
                        </div>
                        <p></p>
                        <p>Description :</p>
                        <ul>
                            <li>
                                Management d'un équipe de 4 personnes 
                            </li>
                            <li>
                                Gestion de l'approvisionnement, et des stocks
                            </li>
                        </ul>
                    </div>
                    <div class="resume-date text-md-right">
                        <span class="text-primary">Septembre 2008 à Avril 2010</span>
                    </div>
                </div>
                <!-- EMPLOYE COMMERCIAL -->
                <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="resume-content">
                        <p class="job">
                            Employé COMMERCIAL
                            <span class="job_location">&nbsp;à Leclerc Chaumont</span>
                        </p>
                        
                        <div class="subheading">
                            Rayons : <span class="rayons">&nbsp;Bazar Permanent et Saisonnier, puis Bazar Technique</span>
                        </div>
                        <p></p>
                        <p>Description :</p>
                        <ul>
                            <li>
                                Remplissage rayon, s'assurer des prix, traitement des arrivages, rangement des réserves...
                            </li>
                        </ul>
                    </div>
                    <div class="resume-date text-md-right">
                        <span class="text-primary">Mars 2005 à Septembre 2008</span>
                    </div>
                </div>
                <!-- LIVREUR ADA-->
                <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="resume-content">
                        <p class="job">
                            LIVREUR
                            <span class="job_location">&nbsp;pour ADA à Chaumont</span>
                        </p>
                        <p>Description :</p>
                        <ul>
                            <li>
                                Livraison des garages affiliés pour leur approvisionnement rapide de pièces détachées
                            </li>
                        </ul>
                    </div>
                    <div class="resume-date text-md-right">
                        <span class="text-primary">Février 2004 à Mars 2005</span>
                    </div>
                </div>
                <!-- MENUISIER-->
                <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="resume-content">
                        <p class="job">
                            MENUISIER
                            <span class="job_location">&nbsp;pour Matfor à Rimaucourt</span>
                        </p>
                        <p>Description :</p>
                        <ul>
                            <li>
                                Livraison des garages environnent pour leur approvisionnement rapide de pièces détachées
                            </li>
                        </ul>
                    </div>
                    <div class="resume-date text-md-right">
                        <span class="text-primary">Juillet 1999 à Février 2004</span>
                    </div>
                </div>

                

            </div>
        </section>

        <hr class="m-0">

        <!-- SECTION FORMATION -->
        <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="education">
            <div class="w-100">
                <h2 class="mb-5">FORMATION</h2>

                <!-- FORMATION WEB -->
                <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="resume-content">
                        <p class="job">
                        Bac + 2 WEBDESIGNER/WEBMASTER
                            <span class="job_location">&nbsp;Formation 31</span>
                        </p>
                        <p>Description :</p>
                        <ul>
                            <li>
                                Formation Diplômante de 4 mois (400 heures de cours + 200 heures stage) 
                            </li>
                            <li>
                                Diplôme de Niv III (bac+2) certifié par le ministère du travail, obtenu en Mai 2018
                            </li>
                            <li>
                                Stage fait à Reims et le projet était l'aide à la restructuration du site de l'association bénévole "Papillons Blancs en Champagne"
                            </li>
                        </ul>
                    </div>
                    <div class="resume-date text-md-right">
                        <span class="text-primary">Septembre 2017 à fin Décembre 2017</span>
                    </div>
                </div>
                    <!-- BAC PRO CAB -->
                <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="resume-content">
                        <p class="job">
                        Bac Pro CAB (Construction et Aménagement du Batiment)
                            <span class="job_location">&nbsp;à Chaumont</span>
                        </p>
                    </div>
                    <div class="resume-date text-md-right">
                        <span class="text-primary">1997-1999</span>
                    </div>
                </div>
                    <!-- BEP CAP -->
                <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="resume-content">
                        <p class="job">
                            BEP et CAP Menuiserie
                            <span class="job_location">&nbsp;à Romilly sur Seine</span>
                        </p>
                    </div>
                    <div class="resume-date text-md-right">
                        <span class="text-primary">1995-1997</span>
                    </div>
                </div>

            </div>
        </section>

        <hr class="m-0">
        
        <!-- SECTION COMPETENCES -->
        <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="skills">
            <div class="w-100">
                <h2 class="mb-5">COMPETENCES</h2>

                <div class="subheading mb-3">
                    Informatique :
                </div>
                <p class="competences_explication">
                    J'ai de bonnes connaissances sur la suite de <strong>Office de Microsoft</strong>.
                </p>
                <ul class="list-inline dev-icons">
                    <li class="list-inline-item">
                        <i class="far fa-file-word"></i>
                    </li>
                    <li class="list-inline-item">
                        <i class="far fa-file-excel"></i>
                    </li>
                    <li class="list-inline-item">
                        <i class="far fa-file-powerpoint"></i>
                    </li>
                </ul>

                <div class="subheading mb-3">
                    Langages de Programation &amp; outils/technos :
                </div>
                <p class="competences_explication">
                    Les langages que j'ai le plus pratiqué sont le <strong>PHP</strong>
                    et Le <strong>JS</strong>, associés au <strong>HTML et CSS</strong> dans des projets web (sites ou applications).
                </p>
                <p class="competences_explication">
                    J'ai aussi pu découvrir <strong>Symfony</strong> au cours de deux projets dont le dernier est dans mon portfolio.
                    <a href="jeremie-genet.fr" target="_blank">Projet Symfony</a>
                </p>
                <p class="competences_explication">
                    <strong>REACT</strong> est un frameWork que j'ai découvert récemment grâce à un tuto sur la création d'un YouTube-like.   
                </p>
                <p class="competences_explication">
                    Je travail en ce moment sur un petit projet perso qui utilise <strong>REACT</strong>,
                    et auquel je voudrais associé <strong>REDUX</strong> pour en comprendre son fonctionnment.
                </p>
                <p class="competences_explication">
                    J'ai aussi pu m'amuser avec le langage <strong>Lua</strong> et son environement associé <strong>LOVE</strong> pour la réalisation de jeux-vidéo.
                </p>
                <p class="competences_explication">
                    Lua est un langage se script très facile à découvrir et à utiliser avec LOVE. Il permet de réaliser des petits jeux rapidement.
                </p>
                <ul class="list-inline dev-icons">
                    <li class="list-inline-item">
                        <i class="fab fa-html5"></i>
                    </li>
                    <li class="list-inline-item">
                        <i class="fab fa-css3-alt"></i>
                    </li>
                    <li class="list-inline-item">
                        <i class="fab fa-php"></i>
                    </li>
                    <li class="list-inline-item">
                        <i class="fab fa-symfony"></i>
                    </li>
                    <li class="list-inline-item">
                        <i class="fab fa-js-square"></i>
                    </li>
                    <li class="list-inline-item">
                        <i class="fab fa-react"></i>
                    </li>
                    <li class="list-inline-item">
                        <i class="fab fa-node-js"></i>
                    </li>
                    <li class="list-inline-item">
                        <i class="fab fa-sass"></i>
                    </li>
                    <li class="list-inline-item">
                        <i class="fab fa-wordpress"></i>
                    </li>
                    <li class="list-inline-item">
                        <i class="fab fa-npm"></i>
                    </li>
                </ul>

                <div class="subheading mb-3">Autre</div>
                <ul class="fa-ul mb-0">
                    <li class="mb-1">
                        <i class="fa-li fa fa-check"></i>
                        Expérience de la conduite de chariot élévateur
                    </li>
                    <li class="mb-1">
                        <i class="fa-li fa fa-check"></i>
                        Expérience en management
                    </li>
                    <li class="mb-1">
                        <i class="fa-li fa fa-check"></i>
                        Connaissance de la gestion de stock et de l'approvisionnement
                    </li>
                </ul>
            </div>
        </section>

        <hr class="m-0">

        <!-- SECTION CENTRES D'INTERET -->
        <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="interests">
            <div class="w-100">
                <h2 class="mb-5">CENTRES D'intérêt</h2>
                <p class="mb-1">
                    Le sport en général, le football, le tennis et la pétanque égalemnent :)
                </p>
                <p class="mb-1">
                    Je suis community manager du site hedge.fr
                </p>
                <p class="mb-1">
                    Le sport électronique et les jeux vidéo
                </p>
                <p class="mb-1">
                    La culture web et geekerie en tout genre
                </p>
            </div>
        </section>

        <hr class="m-0">

    </div>

</div>

  <!-- Bootstrap core JavaScript 
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  -->

  <!-- Plugin JavaScript 
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  -->

  <!-- Custom scripts for this template 
  <script src="js/resume.js"></script>
  -->

<?php
$path->getJs("../js/common/bootstrap/jquery.min.js");
$path->getJs("../js/common/bootstrap/bootstrap.bundle.js");
$path->getJs("../js/common/jquery-easing/jquery.easing.min.js");
$path->getJs("../js/cv/cv.js");
?>
