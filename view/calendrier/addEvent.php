<?php

use App\Path;
use App\Calendar\Event;
use App\Calendar\Events;
use App\Calendar\EventValidator;



// On donne à notre tableau de donnée la date du jour J (dans le but de pré-remplir l'attribut de l'input date dans le formulaire)
$data = [
    // Date du jour ou null
    'date' =>date('Y-m-d') ?? null
];

$errors = [];

// Si une méthode (reçue par le serveur) est 'POST' alors...
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $data = $_POST; // données postées

    // VALIDATION DES DONNEES (via la class EventValidator())
    $validator = new EventValidator();
    // On passe les infos postées à notre méthode validates() (retournera 'true' ou une $errors si il y en a une)
    $errors = $validator->valid($_POST); // On récup les erreurs produites dans $errors

    //dump($errors);
    //dump($validator);
    //dump($validator->validates($_POST));
    //dump($errors['name']);
    
    // S'il n'y a pas d'erreur (on peut enregistrer les données)...
    if(empty($errors)){
        // INITIALISATION DES CHAMPS
        $events = new Events(); 
        $event = $events->hydrate(new Event(), $data);

        // INSERTION DE L'EVENEMENT DANS LA BDD
        $events->create($event);

        // REDIRECTION
        header('location: /calendrier?message=add');
        exit();
    }
    
}

$title = 'Ajouter un évènement';
?>

<div class="container">
    <h1 class="my-4">Ajouter un évènement</h1>

    <!-- MESSAGE D'ERREUR -->
    <?php if(!empty($errors)): ?>
    <div class="alert alert-warning">
        <p>Merci de corriger vos erreurs</p>
    </div>
    <?php endif;?>

    <!-- FORMULAIRE DE CREATION D'UN EVENEMENT -->
    <form action="<?= $router->generate('addEvent_post') ?>" method="POST" class="form">
        
        <!-- On inclu la base du formulaire + le variables utiles -->
        <?php Path::render('calendrier/baseForm.php', ['data' => $data, 'errors' => $errors]); ?>

        <div class="form-group">
            <button class="btn btn-success">Ajouter l'évènement</button>
        </div>
    </form>

    
</div>