<?php
use App\Path;

$title = "Snake-like";
$path = new Path();
//$path->getStyle("css/snake.css");
/*
$path = new Path();
$path->getStyle("css/spaceInvaders.css");
$path->getJs("js/spaceInvaders/jeu.js");
$path->getJs("js/spaceInvaders/main.js");
*/

?>

<div id="snake">

    <h1 class="text-center my-4">Le jeu du Snake</h1>
    <p class="text-center">Utiliser les flèches pour déplacer le serpent et manger la pomme !</p>

    <canvas id="c"></canvas>
    
</div>


<?php
    $path->getJs("../js/snake/snake.js");
?>
