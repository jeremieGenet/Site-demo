<?php
namespace App;

use \PDO; // IMPORTANT (comme on a un namespace, il faut déclarer l'utilisation de PDO (classe native de php))

// Permet de retourner les info de la bdd
class Manager
{
    public static function dbConnect()
    {
        return new PDO('mysql:host=localhost;dbname=portfolio;charset=utf8', 'root', '',[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    // Permet du protèger une valeur de l'injection de code (le champs d'un formulaire pour l' app Calendrier) 
    public static function h(?string $value): string{ // ainsi $valeur est nullable
        if($value === null){
            return '';
        }
        return htmlentities($value);
    }


}

