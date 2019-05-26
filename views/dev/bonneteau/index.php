<?php
use App\Path;

$title = 'Jeu du Bonneteau';
$path = new Path();
$path->getStyle("../css/dev/bonneteau/bonneteau.css");

?>

<div class="container accueil_bonneteau">
    
    <h1 class="title_bonneteau text-center mb-5"><strong>Jeu de Bonneteau</strong></h1>
    <div class="row form_bonneteau">

        <div class="col-md-12">
            

            <form action="<?= $router->generate('game_bonneteau') ?>" method="POST" accept-charset="utf-8" class="form-group ">
                <label><strong>Entrez votre Nom :</strong></label>
                <!-- L'attribut required oblige l'utilisateur du champ à remplir s'il veut continuer-->
                <input type="text" class="form-control" name="nom" value="Votre nom ..." required/>
                <!-- &rArr  permet d'afficher une flèche vers la droite -->
                <input type="submit" class="btn btn-primary form-control mt-2" value="Démarrer le jeu &rArr;" />
            </form>
        </div>
    </div>

    <?php
        // Messages d'erreur envoyé si le nom entré est en chiffre ou en espace (voir index.php ligne 11 à 23)
        if( !empty($_GET['erreur']) ){
            $erreur = $_GET['erreur'];
            if($erreur == 1){
                $msg = $_GET['nom']." n'est pas un nom valide !";
            } else{
                $msg = "Merci de bien vouloir remplir le champ nom avec votre nom !";
            }
            echo '<h1 class="erreur">'.$msg.'</h1>';
        }

    ?>
</div>
