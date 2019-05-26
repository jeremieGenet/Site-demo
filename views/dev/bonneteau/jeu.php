<?php 

require_once ("config.php");
$title = "Jeu du bonneteau";
$path->getStyle('../css/dev/bonneteau/bonneteau.css');

?> 

                        
<div class="container table"> 
    <h1 class="my-5 text-center bonneteau_title">
        <strong>Jeu du Bonneteau</strong>
    </h1>
    <form action="<?= $router->generate('config_bonneteau') ?>" method="POST" accept-charset="utf-8">
        
        <!--TAPIS DE JEU et INFO JEU-->
        <div class="row my-2">

            <!-- TAPIS -->
            <div class="col-md-9 tapis"> 
                <h3 class="trouver_le_roi text-center mt-3">Trouver le roi pour remporter la mise...</h3>
                <?php if($partie) : ?> <!-- La variable $partie vaut true si on ne lui donne pas de valeur (BOOLEAN)-->
                    <!-- Pour rappel: $tabCarte = [$carte1,$carte2,$carte3];-->
                    <?php for($i=0; $i < count($tabCarte); $i++) :?> <!--Boucle for, avec la fonction count qui permet de compter les élément d'un tableau soit ($tabCarte) vaut 3-->  
                            <div class="cartes">   
                                <div class="carte <?= $tabCarte[$i]; ?>"> <!-- Dans cette div, nous avons la variable $tabCarte avec un index de [$i] soit $i= 1,2 ou 3 -->
                                </div>         
                            
                                <div class="choix">
                                    <!-- BOUTONS RADIO -->
                                    <?php if($tour != 0): ?> <!-- si tour est différent de 0, on affiche le boutton sinon il disparait (pour la fin de partie)-->
                                        <input type="radio" name="carte" id="radio" value="<?= $i + 1; ?>"/> <!-- Le but de $i+1 c'est que $i ne vale pas 0, value ne doit valoir que 1, 2 ou 3 -->
                                    <?php endif; ?>
                                </div>
                            </div>
                    <?php endfor; ?>                          
                
                <?php else : ?>                                                          
                    <div id="partie">
                        <h1> <?= $reponse; ?></h1>
                        <h2> <a href="<?= $router->generate('game_bonneteau') ?>"> Rejouer? </a> </h2> <!-- Affichage de Rejouer ou terminé -->
                        <h2> <a href="<?= $router->generate('home') ?>"> Terminé? </a> </h2>
                    </div>
                <?php endif ; ?>
            </div>
            <!-- Fin de div tapis -->  

            <!-- INFOS DU JEU (mises,  pot de départ...) -->
            <div class="col-md-3" id="infos"> 
                                                                    
                <div class="infos_jeu"> <!-- Un peu de php pour inclure les variables $nom $gain et $chance -->
                    <p class="mt-3"><strong>Nom du joueur : </strong> <b><?= $nom; ?></b> </p>
                    <p><strong>Pot de départ : </strong> <b><?= $gain; ?></b> </p>
                    <p><strong>Nombre de chance : </strong> <b><?= $chance; ?></b> </p>
                </div>
                <?php if($tour == 0) : ?>                                                                          
                <div>                           
                    <p><input type="text" name="mise" class="form-control" placeholder="Entrer votre mise"/></p>
                    <p><input type="submit" class="form-control btn btn-primary" value="Enregistrer votre mise"/></p>
                    <!-- AFFICHAGE DES ERREURS -->                                
                    <?php if(!empty($erreur)) : ?> 
                        <h4 class="text-warning"> 
                            <?= $erreur ; ?> 
                        </h4>
                    <?php endif; ?>                                                       
                </div>                       
                <?php else : ?>
                        <?php if(!empty($mise)) :?>
                            <p><b>Mise en cours: </b> <?= $mise; ?> </p> <!---- mise est indéfinie ----->
                        <?php else : ?>
                            <?php $erreur = 'essai'; ?>
                        <?php endif ;?>
                        <br/>
                <?php endif; ?>
                <div>
                        <?php afficheBtn($tour); ?>
                </div>
                
                <!-- MESSAGE D'AIDE -->
                <div class="text-info indicateur mb-3">
                    <strong><?= $indicateur;?></strong>
                </div>  
            </div>
        </div>

        

    </form> 
    <div class="row regle_debug">
    
        <div class="col-md-9 regle">
            <h2 class="my-4 text-info"><strong>Les régles du jeu de bonneteau</strong></h2>
            <ul class="">
                <li>
                    <p>
                        Trois cartes vue de dos font face sur le tapis, sur ces trois cartes
                        il y a deux <strong>As</strong> et un <strong>Roi</strong>, le but étant de retrouver <strong>le roi</strong> après mélange virtuel.
                    </p>     
                </li>
                <li>
                    <p>
                        Le joueur choisit sa carte, alors il est retourné une des deux cartes qui n'a pas été choisi.
                        Enfin il est proposé au joueur une dernière chance de pouvoir changer de choix.
                    </p>
                </li>
                <li>
                    <p>
                        Si le joueur ne change pas de choix depuis le début et qu'il gagne,
                        alors il triple sa mise, si il fait un changement de choix, et qu'il gagne alors on double sa mise, sinon il a perdu.
                    </p>
                </li>
                <li>
                    <p>
                        Pour gagner la partie, le joueur doit obtenir <strong>10000 points</strong>,
                        si le joueur a 0 point alors le jeu est fini et le joueur a perdu.
                    </p>
                </li>
                <li>
                    <p>
                        La mise minimum est de 100 et que la mise maximun est celle de vos gains en cours.
                    </p>
                </li>
            </ul>
        </div>

        <!-- DEBUG -->
        <div class="col-md-3 debug">
            
            <pre> <!--fonction php de debug (si $_POST est différent de vide on fait un print_r ) et session-->
                <?php 
                
                if(!empty($_POST)) {  // Debug $_POST
                    echo "POST <br>";
                    print_r($_POST);   
                } 

                echo '<br>';

                
                if(!empty($_SESSION)) {  // Debug de $_SESSION
                    echo "SESSION <br>";
                    var_dump($_SESSION);    
                }

                /*echo "<br>"."mise = ".$mise;*/
                /*echo "<br>".$nom;
                echo "<br>".$ale;
                echo "<br>".$gain;
                echo "<br>".$chance;  // Debug des variables
                echo "<br>".$tour;
                echo "<br>".$choix; 
                echo "<br>"."mise ".$mise;
                echo "<br>"."etat ".$etat;*/

                //echo "<br>".mt_getrandmax();  Debug des Random
                //echo "<br>".mt_rand(); 
                ?>
            </pre>
        </div>

    </div>
</div> <!-- Fin de div table (container) -->        