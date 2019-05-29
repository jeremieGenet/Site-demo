<?php
use App\Blog\URL;
use App\Manager;
use App\Model\Post;

$title = "Mon blog";
$path->getStyle("../css/blog/blog.css");
$path->getStyle("../css/common/font-awesome/css/all.min.css");

// Connexion à la bdd
$db = Manager::dbConnect();

// On vérif si $currentPage est un entier positif (sup à 0)
$currentPage = URL::getPositiveInt('page', 1);

// Requete pour récup le nb de post total (fetch(PDO::FETCH_NUM[0]) permet de récup les infos sous forme de tableau numérique, indéxé par le numéro et seulement la première colonne)
$count = (int)$db->query('SELECT COUNT(id) FROM blog_post')->fetch(PDO::FETCH_NUM)[0]; // $count retourne le nb de post total (le (int) pour le mettre sous forme d'entier)
// On défini le nb d'article par page
$perPage = 12;
// Calcul du nb de page (nb d'article / nb d'articles par page) et ceil() pour arrondir à l'entier supérieur
$nbPages = ceil($count / $perPage);
// Si le numero passé dans l'url est supérieur au nb total de page alors on jette une exception
if($currentPage > $nbPages){
    throw new Exception('Il n\' existe pas autant d\'articles !');
}
// $offset va permettre de faire un décallage tout les 12 post soit une page (si page vaut 1 offset vaudra 12 si page vaut 2 offset vaudra 24 ...)
$offset = $perPage * ($currentPage - 1);
// Requete pour récup les 12 post les plus récents
$query = $db->query("SELECT * FROM blog_post ORDER BY created_at DESC LIMIT $perPage OFFSET $offset");
// Permet de récup la requete sous forme de classe et on lui donne la classe que l'on veut récup, (PDO::FETCH_OBJ permet lui de récup la req sous forme d'objet)
$posts = $query->fetchAll(PDO::FETCH_CLASS, Post::class); 

dump($posts);
?>




<h1 class="title_home_blog">Liste des Articles</h1>

<!-- PAGINATION (page suivante/précédente) -->
<div class="d-flex justify-content-between my-4">
    <?php if($currentPage > 1): ?>
        <a href="<?= $router->generate('home_blog') ?>?page=<?= $currentPage - 1 ?>" class="btn btn-info btn-lg">&laquo; Page précédente</a>
    <?php endif ?>
    <?php if($currentPage < $nbPages): ?>
        <a href="<?= $router->generate('home_blog') ?>?page=<?= $currentPage + 1 ?>" class="btn btn-info ml-auto btn-lg">Page suivante &raquo;</a>
    <?php endif ?>
</div>

<!-- LISTE DES ARTICLES DU BLOG -->
<div class="row">
    <?php foreach($posts as $post): ?>
    <div class="col-md-3 mb-3">
        <!-- HTML D'UN POST DE LA LISTE -->
        <?php require 'inc/card.php' ?>
    </div>
    <?php endforeach ?>
</div>

<!-- PAGINATION (page suivante/précédente) -->
<div class="d-flex justify-content-between my-4">
    <?php if($currentPage > 1): ?>
        <a href="<?= $router->generate('home_blog') ?>?page=<?= $currentPage - 1 ?>" class="btn btn-info btn-lg">
            &laquo; Page précédente
        </a>
    <?php endif ?>
    <?php if($currentPage < $nbPages): ?>
        <a href="<?= $router->generate('home_blog') ?>?page=<?= $currentPage + 1 ?>" class="btn btn-info ml-auto btn-lg">Page suivante &raquo;</a>
    <?php endif ?>
</div>



<!-- On import REACT et REACT-DOM -->
<script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>

<?php
// Script js pour le composant REACT 'like'
$path->getJs("../js/blog/posts.js");
?>

