<?php
use App\Blog\URL;
use App\Manager;
use App\Model\Post;
use App\Model\Category;
use App\Blog\PaginatedQuery;

$path->getStyle("../../css/blog/blog.css");

$db = Manager::dbConnect();

//dump($match);
// On récup l'id et le slug (passés par l'url)
$id = $match['params']['id'];
$slug = $match['params']['slug'];

// Requete pour récup les catégories via l'id passé dans l'url
$query = $db->prepare("SELECT * FROM blog_category WHERE id = ?");
$query->execute([$id]);
// Permet de récup la requete sous forme de classe et on lui donne la classe que l'on veut récup, (PDO::FETCH_OBJ permet lui de récup la req sous forme d'objet)
$query->setFetchMode(PDO::FETCH_CLASS, Category::class);
/** @var Category|false */
$category = $query->fetch();

// Vérif si $category vaut bien true ($query->fetch() retourne false si le post n'existe pas)
if($category === false){
    throw new Exception('Aucune catégorie ne correspont à cet Id !');
}

// Vérif si le slug de l'url est différent du slug de la catégorie (sinon redirection avec le slug qui correspond à l'id du post)
if($category->getSlug() !== $slug){
    $url = $router->generate('category', ['slug' => $category->getSlug() , 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}






$title = "Categorie {$category->getName()}";

/*
$paginatedQuery = new PaginatedQuery(
    "SELECT bp.* 
        FROM blog_post bp
        JOIN blog_post_category bpc ON bpc.post_id = bp.id
        WHERE bpc.category_id = {$category->getId()}
        ORDER BY created_at DESC",
    "SELECT COUNT(category_id) FROM blog_post_category WHERE category_id = {$category->getId()}",
    Post::class
);

$posts = $paginatedQuery->getItems($category->getId());
dump($posts);
dump($paginatedQuery->getItems());
*/


// Page actuel dans l'url : On vérif si $currentPage est un entier positif (sup à 0)
$currentPage = URL::getPositiveInt('page', 1);

// Récup le nb d'articles de la catégorie (fetch(PDO::FETCH_NUM[0]) permet de récup les infos sous forme de tableau numérique, indéxé par le numéro et seulement la première colonne)
$count = (int)$db
    ->query("SELECT COUNT(category_id) FROM blog_post_category WHERE category_id = {$category->getId()}")
    ->fetch(PDO::FETCH_NUM)[0]; // $count retourne le nb d'article de la categorie (le (int) pour le mettre sous forme d'entier)
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
// Requete pour récup les post qui correspondent à la categorie via l'id des post de la table blog_post qui ont le même id que la table blog_post_category
$query = $db->query("
    SELECT bp.* 
    FROM blog_post bp
    JOIN blog_post_category bpc ON bpc.post_id = bp.id
    WHERE bpc.category_id = {$category->getId()}
    ORDER BY created_at DESC 
    LIMIT $perPage OFFSET $offset
");
// Permet de récup la requête sous forme de classe et on lui donne la classe que l'on veut récup, (PDO::FETCH_OBJ permet lui de récup la req sous forme d'objet)
$posts = $query->fetchAll(PDO::FETCH_CLASS, Post::class); 
//dump($posts); // Affiche les (12max ou moins) articles de la page actuelle (sous forme de tableau)

$linkRouter = $router->generate('category',['slug' => $category->getSlug() , 'id' => $category->getId()]);
?>



<h1 class="title_category">Catégorie : <?= $category->getName() ?> </h1>

<!-- PAGINATION (page suivante/précédente) -->
<div class="d-flex justify-content-between my-4">
    <?php if($currentPage > 1): ?>
        <a href="<?= $linkRouter ?>?page=<?= $currentPage - 1 ?>" class="btn btn-info btn-lg">&laquo; Page précédente</a>
    <?php endif ?>
    <?php if($currentPage < $nbPages): ?>
        <a href="<?= $linkRouter ?>?page=<?= $currentPage + 1 ?>" class="btn btn-info ml-auto btn-lg">Page suivante &raquo;</a>
    <?php endif ?>
</div>

<!-- LISTE DES ARTICLES DU BLOG -->
<div class="row">
    <?php foreach($posts as $post): ?>
    <div class="col-md-3 mb-3">
        <!-- HTML D'UN POST DE LA LISTE -->
        <?php require 'card.php' ?>
    </div>
    <?php endforeach ?>
</div>

<!-- PAGINATION (page suivante/précédente) -->
<div class="d-flex justify-content-between my-4">
    <?php if($currentPage > 1): ?>
        <a href="<?= $linkRouter ?>?page=<?= $currentPage - 1 ?>" class="btn btn-info btn-lg">&laquo; Page précédente</a>
    <?php endif ?>
    <?php if($currentPage < $nbPages): ?>
        <a href="<?= $linkRouter ?>?page=<?= $currentPage + 1 ?>" class="btn btn-info ml-auto btn-lg">Page suivante &raquo;</a>
    <?php endif ?>
</div>





