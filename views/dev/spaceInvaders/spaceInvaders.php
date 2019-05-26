<?php
use App\Path;

$title = "SpaceInvaders";
$path = new Path();
$path->getStyle("../css/dev/spaceInvaders/spaceInvaders.css");
?>

<div id="spaceInvaders">
    <p>EN DEVELOPEMENT (flèches pour se déplacer et espace pour tirer)</p>

    <?php
        $path->getJs("../js/dev/spaceInvaders/jeux.js");
        $path->getJs("../js/dev/spaceInvaders/main.js");
    ?>

</div>


