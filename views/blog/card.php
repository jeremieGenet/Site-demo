<!-- HTML POUR UN POST -->

<div class="card">
    <div class="card-body">
    <!-- TITRE DU POST -->
    <h5 class="card-title title_posts"><?= htmlentities($post->getName()) ?></h5>
    <!-- DATE DE CREATION DU POST -->
    <p class="text-muted">le <?= $post->getCreatedAt()->format('d F Y') ?></p>
    <!-- IMAGE DU POST -->
    <div class="text-center">
        <!-- Lien vers Le post (param slug et id) -->
        <a href="<?= $router->generate('post', ['slug' => $post->getSlug() , 'id' => $post->getId() ]) ?>" >
            <img src="<?= $post->getPicture() ?>" class="img-fluid rounded home_blog_img" alt="">
        </a>
    </div>
    <!-- CONTENU DU POST (auquel on applique la méthode excerpt() qui permet de n'en récup qu'un extrait) -->
    <p class="blog_content">
        <?= $post->getExcerpt() ?>
    </p>
    <p>
        <!-- Lien vers Le post (param slug et id) -->
        <a href="<?= $router->generate('post', ['slug' => $post->getSlug() , 'id' => $post->getId() ]) ?>" 
        class="btn btn-primary home_blog_button">
            Voir plus
        </a>
    </p>
    </div>
</div>