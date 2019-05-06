<?php
namespace App\calendar;

// Permet l'affichage d'un message
Class Messages{

    static $message = [
        'add' => "L'évènement à bien été ajouter !",
        'edit' => "L'évènement à bien été modifié !",
        'delete' => "L'évènement à bien été supprimé !"
    ];

    static function getMessage($action){
        if(isset($action)){
            return self::$message[$action];
        }else{
            self::$message = 'il faut mettre qqch dans le paramètre de l\'objet, jérémie !';
        }
    }

}