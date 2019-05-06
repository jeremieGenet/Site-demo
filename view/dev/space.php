<?php
use App\Path;

$title = "Space X";
$path = new Path();
$path->getStyle("../css/dev/space.css");
?>

<div id="spaceInvaders">
    <p>EN DEVELOPEMENT (flèches pour se déplacer et espace pour tirer)</p>

    <?php
        $path->getJs("../js/dev/essai.js");
    ?>

</div>

