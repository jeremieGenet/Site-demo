<?php
namespace App;

use PDO; // IMPORTANT (comme on a un namespace, il faut déclarer l'utilisation de PDO (classe native de php))

// Permet de retourner les info de la bdd
class Manager
{
    public function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=calendar;charset=utf8', 'root', '',[
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO:: ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ]);
        return $db;
    }

    // Permet du protèger une valeur (le champs d'un formulaire pour notre app) de l'injection de code
    static function h(?string $value): string{ // ainsi $valeur est nullable
        if($value === null){
            return '';
        }
        return htmlentities($value);
    }


}

