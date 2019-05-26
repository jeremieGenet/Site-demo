<?php 
use App\Calendar\Month;
use App\Calendar\Events;
use App\calendar\Messages;
use App\Path;


try{
    // On donne des paramètres d'url (le mois et l'année), sinon null à notre objet $month (utile pour les lien de pagination)
    $month = new Month($_GET['month'] ?? null, $_GET['year'] ?? null); 

    //dump($month);
    //dump($_GET['month']);

    $events = new Events();

}catch(Exeption $e){
    echo 'Gestion des erreur!';
}


// On récup le premier jour du mois
$firstDay = $month->getFirstDay();
//dump($month);
//dump($firstDay);
//dump($firstDay->format('N'));
// Condition qui permet un affichage complet des jours du mois pour les mois qui commencent un lundi
// CONDITION TERNAIRE : Si le premier jour du mois === 1 (donc un lundi) on renvoie ce même jour, sinon on renvoie le lundi dernier par rapport à ce jour
$firstDay = $firstDay->format('N') === '1' ? $firstDay : $month->getFirstDay()->modify('last monday');

$weeks = $month->getWeeks();
/*  
    Explication du calcul du jour de fin ($endDay) du mois en cours du calendrier :
Soit : le jour du début (un lundi), auquel on ajoute 6 (ce qui fait la 1ere semaine), 
auquel on ajoute 7 fois le nb de semaine -1 (puisque la 1ere semaine est déjà comptée)
*/
$endDay = (clone $firstDay)->modify('+' . (6 + 7 * ($weeks -1)) . 'days');

// On récup tous les évènements entre la date de début et fin du mois en cours de notre calendrier
$events = $events->getEventsBetweenByDay($firstDay, $endDay);
//dump($events); // Affiche un tableau vide si il n'y a pas d'évènement dans le mois en cours, sinon affiche un tableau avec les évènements


$title = 'Calendrier';
$path = new Path();
$path->getStyle("../css/dev/calendrier/calendrier.css");
?>


<div class="container calendar">
    <h1 class="calendar_title my-3"><strong>Mon Calendrier</strong></h1>

    <div class="d-flex flex-row align-items-center justify-content-between mx-sm-4">

        <div>
            <!-- LIEN DE PAGINATION dynamique qui permet de passer de mois en mois (mois précédents) -->
            <a href="<?= $router->generate('calendrier_pagination', [
                'month' => $month->previousMonth()->month, 
                'year' => $month->previousMonth()->year
                ]) ?>" class="btn btn-primary mb-2">
                &lt;
            </a>
            <!-- LIEN DE PAGINATION de mois en mois dynamique qui permet de passer de mois en mois (mois suivants) -->
            <a href="<?= $router->generate('calendrier_pagination', [
                'month' => $month->nextMonth()->month, 
                'year' => $month->nextMonth()->year
                ]) ?>" class="btn btn-primary mb-2">
                &gt;
            </a>
        </div>

        <div>
            <!-- AFFICHAGE DU MOIS DYNAMIQUE -->
            <h2><strong><?= $month->toString(); ?></strong></h2>
        </div>

        <!-- MESSAGE DE SUCCES (lors de la réussite de l'ajout/modif/suppression d'un évènement) -->
        <div class="calendar__message">
            <?php if(isset($_GET['message'])): ?>
            <div class="alert alert-success">
                <?= Messages::getMessage($_GET['message']); ?>
            </div>
            <?php endif; ?>
        </div>
        
        <!-- BOUTON BLEU POUR AJOUTER UN EVENEMENT -->
        <a href="<?= $router->generate('addEvent_button') ?>" class="calendar__button">+</a>

    </div>

    <table class="calendar__table">

    <!-- Boucle qui affichera dynamiquement en fonction du nombre du semaine du mois -->
    <?php for($i = 0;$i < $month->getWeeks() ; $i++): ?>

    <tr>
        <!-- Affichage des jours dynamique -->
        <?php foreach($month->days as $k => $day): ?>

        <?php
        // Reprèsente le premier jours de la semaine qui sera incrémenté par l'index de nb de jour de la semaine ($k), auquel on ajoute le numéro de semaine x 7
        $dateNumber = (clone$firstDay)->modify("+" .($k + $i * 7) . "days");

        // $eventForDay représente les évènements à la date du jour formater ou un tableau vide (s'il n'y a pas d'évènements)
        $eventsForDay = $events[$dateNumber->format('Y-m-d')] ?? [];

        // $isToday sera un booleen qui va déterminer si la date sectionnée est la même que la date du jour j (now),
        // dans le but de la différencier des autre jours dans le calendrier (retournera true si ok sinon false)
        $isToday = $dateNumber->format('Y-m-d') === date('Y-m-d');
        ?>

        <!-- Classe 'calendar__othermonth' dynamique, activée si la date fait partie du mois en cours (withinMonth() renvoie true ou false), et
        Classe 'calendar__today' et 'table-primary' dynamique, activée si la date du jour J est la même que $dateNumber (renvoie true ou false)) -->
        <td class="<?= $month->withinMonth($dateNumber) ? '' : 'calendar__othermonth'?>
        
            <?= $isToday ? 'calendar__today' : ''?>"
        >
            <!-- Affichage du nom du jour seulement sur la premier rangée des jours de la semaine -->
            <?php if($i === 0): ?>
            <div class="calendar__weekday">
                <!-- AFFICHAGE DU NOM DU JOUR DYNAMYQUE-->
                <?= $day ?>
            </div>
            <?php endif;?>

            <div class="calendar__day">

                <?php
                    //dump($match);
                    //dump($dateNumber);
                    //dump($dateNumber->format('d'));
                    //dump($eventsForDay);
                    //dump($eventsForDay[0]['id']);
                    //dump($date->format('Y-m-d'));
                ?>

                <!-- AFFICHAGE DE N° DU JOUR DE LA SEMAINE DYNAMIQUE (avec lien pour crée un évènement à ce même jour -->
                
                <!-- Lien vers le formulaire pour l'ajout d'un nouvel évent -->
                <a href="<?= $router->generate('addEvent_button') ?>">
                    <!-- N° DU JOUR -->
                    <?= $dateNumber->format('d'); ?>
                </a>

                <!-- Boucle sur les évènements du jour actuel (now) -->
                <?php foreach($eventsForDay as $event): ?>

                    <!-- AFFICHAGE DES EVENEMENTS (début, fin, et nom) AVEC LIEN VERS L'EVENEMENT -->    
                    <div class="calendar__event">
                        <div class="calendar_event-hours">
                            <strong>
                                <?= (new DateTime($event['start']))->format('H:i') ?> - 
                                <?= (new DateTime($event['end']))->format('H:i') ?>
                            </strong>
                        </div>
                        <a class="calendar_event-name"
                        href="<?= $router->generate('event', ['id' => $event['id']]) ?>">
                            <?= $event['name']; ?>
                        </a>
                    </div>

                <?php endforeach; ?>
                

            </div>
        </td>
        <?php endforeach; ?>
    </tr>

    <?php endfor; ?>

    </table>

</div>



