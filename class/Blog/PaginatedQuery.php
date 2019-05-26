<?php
namespace App\Blog;

use App\Manager;
use \PDO;

class PaginatedQuery
{
    private $queryPostPerCat;         // Requête
    private $queryCount;    // Nombre de résultat
    private $classMapping;  // Classe utilisée
    private $db;            // Connecion à la bdd
    private $perPage;       // nombre d'article affiché dans une page (à l'écran)
    private $count;         // nb d'élément total ne base de donnée

    public function __construct(
        string $queryPostPerCat,
        string $queryCount,
        string $classMapping,
        ?PDO $db = null,     // $db type = une instance de PDO ou null
        int $perPage = 12    // $perPage type = un entier qui vaut par défaut 12
    )
    {
        $this->queryPostPerCat = $queryPostPerCat;
        $this->queryCount = $queryCount;
        $this->classMapping = $classMapping;
        $this->db = $db ?: Manager::dbConnect();
        $this->perPage = $perPage;
    }

    // Permet de récup l'ensemble des éléments (le nb d'article d'une page)
    public function getItems(): array
    {
        // Page actuelle dans l'url : On vérif si $currentPage est un entier positif (sup à 0)
        $currentPage = $this->getCurrentPage();
        
        //
        $nbPages = $this->getPages();

        // Si le numéro passé dans l'url est supérieur au nb total de page alors on jette une exception
        if($currentPage > $nbPages){
            echo 'CurrentPage vaut = ' . $currentPage;
            echo ' NbPages vaut ' . $nbPages;
            throw new \Exception('Il n\' existe pas autant d\'articles !');
        }
        // $offset va permettre de faire un décallage tout les 12 post soit une page (si page vaut 1 offset vaudra 12 si page vaut 2 offset vaudra 24 ...)
        $offset = $this->perPage * ($currentPage - 1);
        // Requete pour récup les post qui correspondent à la categorie via l'id des post de la table blog_post qui ont le même id que la table blog_post_category
        echo 'NBPAGES vaut = ' .$nbPages;
        return $this->db->query(
            $this->queryPostPerCat . " LIMIT {$this->perPage} OFFSET $offset")
            ->fetchAll(PDO::FETCH_CLASS, $this->classMapping);// Permet de récup la requête sous forme de classe et on lui donne la classe que l'on veut récup, (PDO::FETCH_OBJ permet lui de récup la req sous forme d'objet)
    }

    // Gestion de l'affichage du bouton "précédent" de la pagination
    public function previousLink(string $link): ?string
    {
        $currentPage = $this->getCurrentPage();
        if($currentPage <= 1) return null; // Si la page actuelle est inférieur ou égal à 1 on retourne null (pas besoin de bouton précédent)
        if($currentPage > 2) $link .= "?page=" . ($currentPage - 1);
        // syntaxe HEREDOC
        //return "<a href=.$link class="btn btn-info btn-lg">&laquo; Page précédente</a>"
        //return '<a href=" '. $link .' " class="btn btn-info btn-lg">&laquo; Page précédente</a>';
        return <<<HTML
            <a href="{$link}" class="btn btn-info btn-lg">&laquo; Page précédente</a>
HTML;
    }

    // Gestion de l'affichage du bouton "suivant" de la pagination
    public function nextLink(string $link): ?string
    {
        $currentPage = $this->getCurrentPage();
        $nbPages = $this->getPages();
        echo 'Dans nextLink nbPages = ' . $nbPages;
        if($currentPage >= $nbPages) return null; // Si la page actuelle est inférieur ou égal à 1 on retourne null (pas besoin de bouton précédent)

        $link .= "?page=" . ($currentPage + 1);
        // syntaxe HEREDOC
        return <<<HTML
            <a href="{$link}" class="btn btn-info ml-auto btn-lg">Page suivante &raquo;</a>
HTML;
    }

    // Retourne la page actuelle sous forme d'un entier positif sup à 0 (après vérif de la méthode getPositiveInt())
    private function getCurrentPage(): int
    {
        return URL::getPositiveInt('page', 1);
    }

    // Retourne le nb de pages (nb de post d'une catégorie)
    private function getPages()
    {

        if($this->count === null){
            //Requete pour compter le nb de post d'une categorie
            $this->count = (int)$this->db
                ->query($this->queryCount)
                ->fetch(PDO::FETCH_NUM[0]);
        }
        dump('$count vaut = ' .$this->count); // Retourne 1
        dump($this->db); //objet PDO{16}
        dump('La requete vaut = ' . $this->queryCount); // requete ok
        //echo 'COUNT vaut : '.$this->count .' et ';
        // Calcul du nb de page (nb d'article de la categorie / nb d'articles par page) et ceil() pour arrondir à l'entier supérieur
        return ceil($this->count / $this->perPage);
    }
}