<?php
use App\Path;

$title = 'Bouton Hamburger';
$path = new Path();
$path->getStyle("css/hamburger/sass/styleGenerate.css");

?>


<div class="container">

    <h1 class='text-center my-5'>Envie d'un Hamburger ?</h1>
    <p>Cliquez moi !</p>
    
    <div class="menu-icon menu-icon-cross mb-5">
        <span></span>
        <svg x="0" y="0" width="54px" height="54px" viewbox="0 0 54 54">
            <circle cx="27" cy="27" r="26"></circle>
        </svg>
    </div>

    <p>
        Le hamburger est dessiner en html avec les <strong>"svg"</strong> (images vectorielles). Il est fixe ici, mais rien n'empèche de le rendre responsive.
    </p>
    <p>
        Toutes les transformations se font à base de <strong>pseudo-élément et de transformation en CSS</strong>.
    </p>
    <p>
        <strong>Jquery</strong> est utiliser uniquement ici pour changer la classe du bouton.
        Selon si il y a click ou survol du bouton, différents événements sont provoqués!
    </p>

</div>

<?php
    $path->getJs("../js/hamburger/jquery-3.3.1.min.js");
    $path->getJs("../js/hamburger/main.js");
?>