<?php

use App\Calendar\Events;

$events = new Events();

//dump($match);
//dump($match['params']['id']);

$event = $events->find($match['params']['id']);
dump($event);

// Titre de la page (le titre de l'évènement)
$title = $event->getName();
?>


<div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
    <div class="card-header text-center">
        <?= $event->getName(); ?>
    </div>
    <div class="card-body">
        <h4 class="card-title">
            Description : <?= $event->getDescription(); ?>
        </h4>
        <p class="card-text">
            Crénaux de l'évènement : 
            <?= $event->getStart()->format('H:i') ?> - 
            <?= $event->getEnd()->format('H:i') ?>
        </p>
    </div>
</div>


