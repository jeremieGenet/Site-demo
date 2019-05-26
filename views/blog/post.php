<?php
use App\Manager;
use App\Model\Post;
use App\Model\Category;

$title = "article";
$path->getStyle("../css/blog/blog.css");

$db = Manager::dbConnect();

// On récup l'id et le slug (passés par l'url)
$id = $match['params']['id'];
$slug = $match['params']['slug'];

// Requete pour récup les post via l'id passé en param dans l'url
$query = $db->prepare("SELECT * FROM blog_post WHERE id = ?");
$query->execute([$id]);
// Permet de récup la requete sous forme de classe et on lui donne la classe que l'on veut récup, (PDO::FETCH_OBJ permet lui de récup la req sous forme d'objet)
$query->setFetchMode(PDO::FETCH_CLASS, Post::class);
$post = $query->fetch();

// Vérif si $post vaut bien true ($query->fetch() retourne false si le post n'existe pas)
if($post === false){
    throw new Exception('Aucun article ne correspont à cet Id !');
}

// Vérif si le slug de l'url est différent du slug de l'article (sinon redirection avec le slug qui correspond à l'id du post)
if($post->getSlug() !== $slug){
    $url = $router->generate('post', ['slug' => $post->getSlug() , 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}


// Requete avec jointure entre la table blog_category et la table blog_post_category POUR RECUP L'ID, LE NOM ET SLUG DE LA CATEGORIE DU POST
$query = $db->prepare("
SELECT bc.id, bc.slug, bc.name 
FROM blog_post_category bpc
JOIN blog_category bc ON bpc.category_id = bc.id
WHERE bpc.post_id = ?");
$query->execute([$post->getId()]);

$query->setFetchMode(PDO::FETCH_CLASS, Category::class);
/** @var Category[] */
$categories= $query->fetchAll();

//dump($categories);

?>

<!-- VISU D'UN POST (sur toute la page)------------------------------------>
<div class="container">
    <div class="card border-light my-3">
        <!-- NOM DU POST -->
        <h3 class="card-header text-center"><?= $post->getName() ?></h3>
        <div class="card-body">
            <!-- DATE DU POST -->
            <h5 class="card-title">Date de l'article : <?= $post->getCreatedAt()->format('d F Y') ?></h5>
            <!-- NOM DE LA CATEGORIE DU POST -->
            <p>
                Catégorie(s) de l'article : 
                <?php 
                if($categories === []){
                    echo ' SANS CATEGORIE';
                }
                foreach($categories as $k => $category): 
                    if($k>0):
                        echo ', ';
                    endif;
                ?>
                    <!-- Lien vers les post de la même catégorie -->
                    <a href="<?= $router->generate('category',['slug' => $category->getSlug() , 'id' => $category->getId()]) ?>">
                        <?= $category->getName() ?>
                    </a>
                <?php endforeach; ?>
            </p>
        </div>
        <div class="content_post_img text-center">
            <!-- IMAGE DU POST -->
            <img  src="<?= $post->getPicture() ?>" class="img-fluid rounded post_img"  alt="">
        </div>
        <div class="card-body">
            <p class="card-text">
                <!-- CONTENU DU POST -->
                <?= $post->getContent() ?>
            </p>
        </div>
        <div class="card-footer">
            <!-- Lien vers home_blog -->
            <a href="<?= $router->generate('home_blog') ?>" class="card-link">Liste des articles &raquo;</a>
        </div>
    </div>
    
</div>
