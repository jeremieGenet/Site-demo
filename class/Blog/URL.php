<?php
namespace App\Blog;

class URL
{
    // Vérifie la variable d'url et la retourne (si elle est null elle prendra la valeur $default sinon sa valeur sera tranformée en un entier)
    public static function getInt(string $name, ?int $default = null): ?int
    {
        // S'il n'y a rien dans l'url on retourne la valeur par défaut
        if(!isset($_GET[$name])) return $default;

        if($_GET[$name] === '0') return 0;
        // On filtre la valeur de la variable d'url pour s'assurer que se soit uniquement un entier sinon on renvoi une exeption
        if(!filter_var($_GET[$name], FILTER_VALIDATE_INT)){
            throw new \Exception("Le paramètre '$name' dans l'url n'est pas un entier !");
        } 
        // On transforme la variable d'url en un entier (int)
        return(int)$_GET[$name];
    }

    // Vérifie si 
    public static function getPositiveInt(string $name, ?int $default = null): ?int
    {
        $param = self::getInt($name, $default);
        
        if($param !== null && $param <= 0){
            throw new \Exception("Le paramètre '$name' dans l'url n'est pas un entier positif !");
        }
        return $param;

        /*
        if($currentPage <= 0){
            throw new Exception('Numéro de page invalide !');
        }
        */
    }
}