<?php
namespace App\portfolio;

/////////////////////////////// NE FONCTIONNE PAS ET PAS UTILISE DANS LE SITE (je garde au cas ou je la retravaillerais)
class Html
{
    /*
    public $fileMainPicture;
    public $mainTitle;

    public function __construct(string $fileMainPicture, string $mainTitle){
        $this->fileMainPicture = $fileMainPicture;
        $this->mainTitle = $mainTitle;
    }
    */

    public function folio(
        string $fileMainPicture,
        string $mainTitle, 
        string $titleUnroll, 
        string $description,
        array $logos
        )
    {
        // Image principale
        // nom du projet 
        // Titre du projet (pour le déroulé)
        // Descriptif du déroulé
        // logos des technos utilisées (tableau boucle)
        // Description complète
        // Bouton (le contenu, essayer-moi ou mon github)

        //dump($this->logos($logos));
        
        echo 
        '<div class="project js-item ESSAI" tabindex="0">'.
            ' <img class="project__image" src='.$fileMainPicture.' alt="" >'.
            '<h2 class="project__name mt-2">'.$mainTitle.'</h2>'.
            '<div class="project__body js-body">'.
                '<h2 class="text-center">'.$titleUnroll.'</h2>'.
                '<div class="project__description">'.
                    '<p>'.
                        '<strong>Description : </strong>'. $description .
                    '</p>'.
                '</div>'.
                '<div class="row languages py-2">'.
                    'HALLO!!!'.
                    $this->essai().
                    //$this->logos($logos).
                    //$this->essai().
                '</div>'.
            '</div>'.
        '</div>'
        ;
        
    }
    public function essai(){
        echo 'allo!!!!!!!';
    }

    public function logos($logos){

        //dump($logos);
        foreach($logos as $logo){
            //dump($logo);
            echo
            '<div class="col-md-1">'.
                //'<img src="../asset/portfolio/logo/CSS_128x128.png" alt="" class="logo">'.
                '<img src='."../asset/portfolio/logo/" .$logo. ' alt="" class="logo BOUCLE">'.
            '</div>'
            ;
        }

    }
    /*
    <div class="row languages py-2">
        <div class="col-md-5">
            <h3 class="mt-2">Langages/Technos utilisées :</h3>
        </div>
        <div class="col-md-1">
            <img src="../asset/home_portfolio/logo/composer_128x128.png" alt="" class="logo">
        </div>
        <div class="col-md-1">
            <img src="../asset/home_portfolio/logo/CSS_128x128.png" alt="" class="logo">
        </div>
        <div class="col-md-1">
            <img src="../asset/home_portfolio/logo/Bootstrap_128x128.png" alt="" class="logo">
        </div>
        <div class="col-md-1">
            <img src="../asset/home_portfolio/logo/PHP_128x128.png" alt="" class="logo">
        </div>
        <div class="col-md-1">
            <img src="../asset/home_portfolio/logo/symfony_128x128.png" alt="" class="logo">
        </div>
        <div class="col-md-1">
            <img src="../asset/home_portfolio/logo/doctrine_128x128.png" alt="" class="logo">
        </div>
        <div class="col-md-1">
            <img src="../asset/home_portfolio/logo/twig_128x128.png" alt="" class="logo">
        </div>
    </div>
    <div class="description_link">
        <p>
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
    */
    
}