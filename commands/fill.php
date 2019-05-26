<?php
require dirname(__DIR__) . '/vendor/autoload.php';

// Initialisation de la librairie Faker
$faker = Faker\Factory::create('fr_FR');

// Connexion à la bdd
$pdo = new PDO('mysql:host=localhost;dbname=portfolio;charset=utf8', 'root', '',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO:: ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

// PREPARATION DES TABLE AVANT DE LES REMPLIR 
$pdo->exec('SET FOREIGN_KEY_CHECKS = 0'); // On supprime les clés étrangères (pour les tables qui ont des liens entre elles)
// On vide les tables de la bdd
$pdo->exec('TRUNCATE TABLE blog_post_category');
$pdo->exec('TRUNCATE TABLE blog_post');
$pdo->exec('TRUNCATE TABLE blog_category');
$pdo->exec('TRUNCATE TABLE user');
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1'); // On remet les clés étrangères (après la suppression de toute donnée des tables)

// Tableaux qui vont contenir les id des table blog_post et blog category (dans le but de les utiliser pour remplir la table blog_post_category)
$posts = [];
$categories = [];

// REMPLISSAGE DES TABLES (Pour executer la requête, taper dans l'invite de commande: php commands/fill.php)
// Boucle de 50 pour remplir la table blog_post
for($i=0; $i<50; $i++){
    // TABLE blog_post
    //$pdo->exec("INSERT INTO blog_post SET picture='Picture-$i', name='Article-$i', slug='article-$i', created_at='2019-05-17 14:00:00', content='lorem ipsum' ");
    $pdo->exec("INSERT INTO blog_post SET 
        picture='{$faker->imageUrl(400, 300)}', 
        name='{$faker->sentence()}', 
        slug='{$faker->slug}', 
        created_at='{$faker->date} {$faker->time}', 
        content='{$faker->paragraphs(rand(3, 15), true)}' 
    ");
    // On insère dans le tableau le dernier id enregistré dans la bdd (à chaque tour de boucle va remplir le tableau de l'id de l'entrée)
    $posts[] = $pdo->lastInsertId(); 
}
// Boucle de 5 pour remplir la table blog_category
for($i=0; $i<5; $i++){
    // TABLE blog_category
    //$pdo->exec("INSERT INTO blog_post SET picture='Picture-$i', name='Article-$i', slug='article-$i', created_at='2019-05-17 14:00:00', content='lorem ipsum' ");
    $pdo->exec("INSERT INTO blog_category SET 
        name='{$faker->sentence(3)}', 
        slug='{$faker->slug}'
    ");
    // On insère dans le tableau le dernier id enregistré dans la bdd (à chaque tour de boucle va remplir le tableau de l'id de l'entrée)
    $categories[] = $pdo->lastInsertId(); 
}

// Boucle de remplissage de la table blog_post_category
foreach($posts as $post){
    // $randomCategories contiendra des catégories 'fake' entre 0 et le nb de categories
    $randomCategories = $faker->randomElements($categories, rand(0, count($categories))); 
    foreach($randomCategories as $category){
        $pdo->exec("INSERT INTO blog_post_category SET post_id = '$post', category_id = '$category' ");
    }
}
    
// Remplissage de la table user (avec admin admin)
$password = password_hash('admin', PASSWORD_BCRYPT);
$pdo->exec("INSERT INTO user SET username = 'admin', password = '$password' ");

