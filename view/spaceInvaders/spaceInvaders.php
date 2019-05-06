<?php
use App\Path;

$title = "SpaceInvaders";
$path = new Path();
$path->getStyle("css/spaceInvaders/spaceInvaders.css");
?>

<div id="spaceInvaders">
    <p>EN DEVELOPEMENT (flèches pour se déplacer et espace pour tirer)</p>

    <?php
        $path->getJs("../js/spaceInvaders/jeux.js");
        $path->getJs("../js/spaceInvaders/main.js");
    ?>

</div>


