<?php
namespace App\Calendar;

// Représente un mois
class Month{

    public $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    private $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    public $month;
    public $year;


    public function __construct(?int $month = null, ?int $year = null) // Les paramètres sont des entier 'nullable'
    {
        // Si le paramètre $month n'est pas donné (ou inférieur à 1 ou supérieur à 12) à la contruction de l'objet on lui donne le mois en cours
        if($month === null || $month < 1 || $month > 12){
            $month = intval(date('m'));
        }
        // Si le paramètre $year n'est pas donné à la construction de l'objet on lui donne l'année en cours
        if($year === null){
            $year = intval(date('Y'));
        }
        // Si le paramètre $year est inférieur à 1970 on lance une exeption (qu'il faudra attrapper pour l'afficher)
        if($year < 1970){
            throw new Exeption("L'année est inférieure à 1970 !");
        }

        // On donne comme valeur à nos attribut $month et $year la valeur entrée à la contruction de l'objet
        $this->month = $month;
        $this->year = $year;
    }

    // Permet de récup le premier jour du mois passé en param à la construct de l'objet
    public function getFirstDay(): \DateTime{
        // $start sera le jour 1 du mois et année passé en paramètre de la construct de l'objet
        return $start = new \DateTime("{$this->year}-{$this->month}-01");
    }

    // Permet de récup le dernier jour du mois passé en param à la construct de l'objet
    public function getLastDay(): \DateTime{
        $start = new \DateTime("{$this->year}-{$this->month}-01"); // 
        // 2. $end sera le dernier jour du mois passé en param à la construct de l'objet (clone) permet de ne pas modifier le contenu de $start (seulement le cloner ponctuellement)
        return $end = (clone $start)->modify('+1 month -1 day');
    }

    // Retourne le mois en toute lettre (ex : Mars 2019)
    public function toString(){
        // du tableau de mois on donne comme index le paramètre passé à la construction (-1 puisque c'est un tableau)
        return $this->months[$this->month - 1] . ' ' . $this->year;

    }

    // Retourne le nb de semaines contenu dans un mois
    public function getWeeks(): int{
        /* Explication de la logique :
            1. A partir de la date du premier jour du mois,
            2. on détermine le dernier jour du mois
            3. le numéro de semaine de l'année du dernier jour du mois - le numéro de semaine de l'année du premier jour du mois = le nombre de semaines dans le mois
        */
        // 1. $start sera le jour 1 du mois et année passé en paramètre de la construct de l'objet
        $start = new \DateTime("{$this->year}-{$this->month}-01"); // 
        // 2. $end sera le dernier jour du mois passé en param à la construct de l'objet (clone) permet de ne pas modifier le contenu de $start (seulement le cloner ponctuellement)
        $end = (clone $start)->modify('+1 month -1 day'); // méthode modify() (de DateTime) qui ajoute un mois - 1 jours à la date de départ
        
        //dump((clone $start)->modify('+1 month -1 day'));
        //dump($end->format('W'));
        

        $numberEnd = $end->format('W');

        // Condition pour les années à 52 semaines
        if($numberEnd == "01"){
            $end->modify('+360 day');
        }
        //dump("Start vaut : " . $start->format('W'));
        //dump("numberEnd vaut : " . $numberEnd . " et end vaut cette fois : " . $end->format('W'));
        
        // 3. $week sera le nb de semaine du mois (numéro de semaine de dernier jour - numéro de semaine du premier jour)
        $weeks = intval($end->format('W')) - intval($start->format('W')) + 1; // méthode format() va formater notre date en numéro de semaine ('W')

        //dump(intval($end->format('W')), intval($start->format('W'))); //Affiche le numéro de semaine de la date de fin du mois et le numéro de semaine de la date de début 

        // Condition pour éviter les erreurs avec les jours du mois de janvier qui sont dans entre 2 numéro de semaine (fin d'année = s52 ou s53 début = s1)
        // $week retournera alors un nombre négatif, dans ce cas
        if($weeks < 0){
            // Alors le numéro de semaine sera égal au numéro de semaine du dernier jour du mois (simplement)
            $weeks = intval($end->format('W'));
        }
        return $weeks;
    }

    // Permet de déterminer si le jour est dans le mois en cours
    public function withinMonth(\DateTime $date): bool{
        return $this->getFirstDay()->format('Y-m') === $date->format('Y-m');
        //dump($this->getFirstDay()->format('Y-m'));
        //dump($date->format('Y-m'));
    }

    // Permet de renvoyer le mois suivant (utile à la pagination du calendrier)
    public function nextMonth(): Month{
        $month = $this->month + 1;
        $year = $this->year;
        if($month > 12){
            $month = 1;
            $year += 1;
        }
        return new Month($month, $year);
    }

    // Permet de renvoyer le mois précédent (utile à la pagination du calendrier)
    public function previousMonth(): Month{
        $month = $this->month - 1;
        $year = $this->year;
        if($month < 1){
            $month = 12;
            $year -= 1;
        }
        return new Month($month, $year);
    }


}