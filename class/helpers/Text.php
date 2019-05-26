<?php
namespace App\Helpers;

/* TRANSFORMATION/MANIPULATION DE TEXTE */
class Text{
    
    /**
     * Permet de récupérer un extrait de text (utilisé pour l'affichage posts de la page d'accueil du blog)
     *
     * @param string $content
     * @param integer $limit
     * @return void
     */
    public static function excerpt(string $content, int $limit = 110){

        if(mb_strlen($content) <= $limit){
            return $content;
        }
        // Pour ne pas découper au milieu d'un mot mais au premier espace trouvé à partir de notre $limite
        $lastSpace = mb_strpos($content, ' ', $limit);
        // On découpe la chaine (de 0 caractère à $lastSpace caractères)
        return mb_substr($content, 0, $lastSpace) . '...';

    }
}