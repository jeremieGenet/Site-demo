<?php

use App\Path;
use App\Manager;
use App\Calendar\Event;
use App\Calendar\Events;
use App\Calendar\EventValidator;


$errors = [];

// RECUP DE L'EVENEMENT A MODIFIER (dans le but de l'afficher, et de pré-remplir les champs du formulaire)
$events = new Events();
// On récup l'évènement via son id
$event = $events->find($match['params']['id']);
//dump($event);

// Permettra d'avoir les champs du formulaire pré-remplis (avec les données de l'évènement à modifier)
$data = [
    'name' => $event->getName(),
    'date' =>$event->getStart()->format('Y-m-d'),
    'start' => $event->getStart()->format('H:i'),
    'end' => $event->getEnd()->format('H:i'),
    'description' => $event->getDescription()
];



// Si une méthode (reçue par le serveur) est 'POST' alors...
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(isset($_POST['delete'])){
        
        // SUPPRESSION L'EVENEMENT DE LA BDD
        $events->delete($event);
        // REDIRECTION
        header('location: /calendrier?message=delete');
        exit();
    }
    
    // On stock les données postées dans la variable $data
    $data = $_POST; 

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
        
        // MODIFICATION DES CHAMPS
        $events->hydrate($event, $data);
        //dump($event);

        // INSERTION DE L'EVENEMENT DANS LA BDD
        $events->update($event);

        // REDIRECTION
        header('location: /calendrier?message=edit');
        exit();
    }

    
}


$title = 'Modifier un évènement';
?>

<div class="container">
    
    <!-- AFFICHAGE DE L'EVENEMENT -->
    <h1 class="my-4">Mon évènement :</h1>

    <div class="card text-white bg-dark my-4" style="max-width: 20rem;">
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
        <div class="card-header text-center">
            <a href="<?= $router->generate('calendrier', ['id' => $event->getID() ]) ?>">Retour au calendrier</a>
        </div>
    </div>


    <h1 class="my-4">Formulaire de modification :</h1>

    <!-- MESSAGE D'ERREUR -->
    <?php if(!empty($errors)): ?>
    <div class="alert alert-warning">
        <p>Merci de corriger vos erreurs</p>
    </div>
    <?php endif;?>

    <!-- FORMULAIRE DE MODIFICATION D'UN EVENEMENT -->
    <form action="<?= $router->generate('editEvent_post', ['id' => $event->getID() ] ) ?>" method="POST" class="form">
        
        <!-- On inclu la base du formulaire + les variables utiles (pour le pré-remplissage du formulaire) -->
        <?php Path::render('calendrier/baseForm.php', ['data' => $data, 'errors' => $errors]); ?>

        <div class="row">
            <div class="col-sm-6 form-group">
                <button class="btn btn-success">Modifier l'évènement</button>
            </div>
            <div class="col-sm-6 form-group">
                <button type="submit" name="delete" class="btn__delete btn btn-danger">Supprimer l'évènement</button>
            </div>
        </div>
        
    </form>

</div>