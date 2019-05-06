<?php
session_start(); // Activation de la session, obligatoire sinon la session ne fonctionnera pas.

/* Les variables du jeu */
$erreur = "";
$indicateur = "";
$partie = true;
$reponse = "";

// Création d'un tableau pour les cartes.
$tabImg = ['dos','as','roi']; // Autre syntaxe de tableau $tabImg = array('dos','as','roi');

$carte1 = $tabImg[0]; 
$carte2 = $tabImg[0]; 
$carte3 = $tabImg[0];
$tabCarte = [$carte1,$carte2,$carte3];

// Rejouer une partie ou non:
// On redirige en fin de jeu avec Rejouer, et on réinitialise les gains si le choix est oui(voir lignes 276,277)
if(!empty($_GET['rejouer']) ) {
    $rejoue = $_GET['rejouer'];
    if($rejoue == 'oui'){
       $gain = 500;
       $_SESSION['gain'] = $gain;
    }else{
        header("location: http://localhost/bonneteau/");
    }
}

//Si l'obtention du nom ($_POST['nom']) n'est pas vide (!empty) alors echo bonjour bienvenue...
// On vérifie si la variable nom n'est pas vide 
if( !empty($_POST['nom']) ) {
    
    // On créé une variable "$nom" qui remplace $_POST['nom'] pour simplifier le code
    $nom = $_POST['nom'];
    
    // On vérifie si la variable $nom est numérique
    if(is_numeric($nom) ) {  
        // Redirection vers index.php avec notification du contenu de l'erreur 1
        header("location: http://localhost/1_Mon_PHP/bonneteau/index.php?erreur=1&nom=$nom");  

    // On vérifie si $nom est vide et suppression des espaces en debut et fin de chaine (trim)   
    }else if(empty(trim($nom)) ) {
        header("location: http://localhost/bonneteau/index.php?erreur=2");    
    }else{ 
        $_SESSION['nom'] = $nom; // Stockage du nom dans la session PHP
        $_SESSION['ale'] = 0; // Stockage dans la session de 0.
        
        $gain = 500;
        $chance = 2;
        $tour = 0;
        $choix = 0;
        $ale = 0;
        $mise = 0;
        $_SESSION['gain'] = $gain;
        $_SESSION['chance'] = $chance;
        $_SESSION['tour'] = $tour;
        $_SESSION['choix'] = $choix;
        $_SESSION['mise'] = $mise;
        $_SESSION['ale'] = $ale; // réinitialisation de ale (aléaoire)
    }
  }
// INFO: Nombre max = 2147483647
    
    // Test de la présence d'un nb aléatoire dans la session
    if(!empty($_SESSION['ale'])){
        $ale = $_SESSION['ale'];
    }else {
        // Puis Calcul de la carte gagnante dans else et stokage dans la session.
        // "ceil" est une fonction qui arrondi à l'entier supérieur. Au passage nous créons la variable $ale (le nb aléatoire) en mode random.
        $ale = ceil(mt_rand(0,3000000)/1000000);
        $_SESSION['ale'] = $ale; // On enregistre $ale dans la session.
        $ale = 0;                // Puis on remet $ale à 0 pour que les cartes en début de partie soient de dos. 
        $chance = 2;                   // Réinitialisation des chances.
        $_SESSION['chance'] = $chance; // Réinitialisation des chances dans session.
        unset($_SESSION['pile']); //  NOUVELLE Fonction: unset = suppréssion de l'index de la session pile. Fonction de débug.
    }  
     
    // Test si on reçoit une mise puis "contrôle" du montant des gains.
    if(!empty($_POST['mise']) ){  
        $tour = 0;     
        if($_POST['mise'] < 100){
           $erreur = "la mise minimum autorisée est de : 100" ;
           $_SESSION['tour'] = $tour;
           $tour = 0;
        }elseif($_POST['mise'] > $_SESSION['gain']){
           $erreur = "Le montant maximum autorisé est de : " . $_SESSION['gain'];
           $_SESSION['tour'] = $tour;
           $tour = 0;
        }else{
            $mise = $_POST['mise'];
        $tour = $_SESSION['tour'];
        $_SESSION['mise'] = $mise;  
        $tour++;
        $_SESSION['tour'] = $tour;
        $ale = 0;                
        }              
    }elseif(!isset($_POST['mise'])){
        $indicateur = 'Entrer une mise pour lancer la partie';
    }else{
        $erreur = 'Vous n\'avez pas fais de mise !';
    }       

    // Mélange des cartes si on a fait une mise. 
    if($_SESSION['tour'] == 0){
        $_SESSION['ale'] = 0; // Mélange des cartes "la bonne réponse"        
        $chance = 2;
        $tour = 0;
        $choix = 0;
        $ale = 0;
        $mise = 0;
        $_SESSION['chance'] = $chance;
        $_SESSION['choix'] = $choix;
        $_SESSION['tour'] = $tour;
        $_SESSION['mise'] = $mise;         
    }   
          
    // Test de la présence d'un nom dans la session.
    if(!empty($_SESSION['nom'])){
        $nom = $_SESSION['nom'];
    }    
    // Test des variables $gain et $chance en session
    if( !empty($_SESSION['gain'])&& !empty($_SESSION['chance']) ){
        $gain = $_SESSION['gain'];
        $chance = $_SESSION['chance'];     
    }
    
    // Test de la présence du nombre de tour et de choix.
    if($_SESSION['tour'] == 0 && $_SESSION['choix'] == 0){
        $tour = $_SESSION['tour'];
        $choix = $_SESSION['choix'];
    }else{
        $tour = $_SESSION['tour'];
        $choix = $_SESSION['choix'];
    }
          
    // Test si on reçoit une carte donc un choix (un post) 
    if(!empty($_POST['carte']) ){
        echo 'essai si le bouton radio est bien envoyé !';
        $_SESSION['tour'] = ++$tour;        
        $choix = $_POST['carte'];
        if($_SESSION['choix'] != $choix && $_SESSION['choix'] != 0){ //  Si le choix enregistré dans la session est différent de $choix (si il y a eu changement de cartes) 
            $chance--;                                               
            $_SESSION['chance'] = $chance; // Puis on remet $chance dans la session.
        }
        $_SESSION['choix'] = $choix;
        $mise = $_SESSION['mise'];
    }
    
    // Si session tour égal 3 alors session tour vaut 0 ( pour réinitialiser le jeu en fin de partie )
    if($_SESSION['tour'] == 3){
        $tour = 0;       
        $_SESSION['tour'] = $tour;
        
        if($_SESSION['choix'] == $_SESSION['ale']){ //  Gagner ou Perdu.
            if($_SESSION['chance'] == 2){     // Si gagner et chance == 2 alors on additionne à gain 2 fois la mise
                $gain = ($gain + ($mise *2));
            }else {                           // Sinon on gagne simplement la mise de départ.
                $gain = ($gain + $mise);
            }      
            $mise = 0;
            $_SESSION['mise'] = $mise;
            $_SESSION['gain'] = $gain;
        }else{
            $gain = ($gain - $mise);  // Si perdu on soustrait la mise de gain
            $mise = 0;
            $_SESSION['mise'] = $mise;
            $_SESSION['gain'] = $gain;          
        }
        
        if($gain <= 0){
           $reponse = "Dommage!!! vous avez PERDU :/";
           $partie = false;
        }
        if($gain >= 10000){
           $reponse = "Bravo!!! vous avez GAGNER :)"; 
           $partie = false;
        }
        $_SESSION['ale'] = 0;
        
    }   
    
    // Retourne toute les cartes.
    function carteDeDos(){
        global $carte1, $carte2, $carte3, $tabImg, $tabCarte;
        $carte1 = $tabImg[0]; 
        $carte2 = $tabImg[0];
        $carte3 = $tabImg[0];
        $tabCarte = [$carte1,$carte2,$carte3];
    } 

    // Retourne une carte sur les trois. 
    function melange($combinaison){
        global $carte1, $carte2, $carte3, $tabImg, $tabCarte;
        switch($combinaison){
            case 1:
            {
               $carte1 = $tabImg[0]; 
               $carte2 = $tabImg[1]; 
               $carte3 = $tabImg[0]; 
            }
            break;
            case 2:
            {
                $carte1 = $tabImg[0]; 
                $carte2 = $tabImg[0]; 
                $carte3 = $tabImg[1];
            }
            break;
            case 3:
            {
                $carte1 = $tabImg[1]; 
                $carte2 = $tabImg[0]; 
                $carte3 = $tabImg[0];
            }
            break;           
        }
        $tabCarte = [$carte1,$carte2,$carte3];
    }
    
    // Retourne toutes les cartes
    function donneReponse($resultat){
        global $carte1, $carte2, $carte3, $tabImg, $tabCarte;
        if($resultat == 1){
            $carte1 = $tabImg[2]; 
            $carte2 = $tabImg[1]; 
            $carte3 = $tabImg[1];
        }elseif($resultat == 2){
            $carte1 = $tabImg[1]; 
            $carte2 = $tabImg[2]; 
            $carte3 = $tabImg[1];
        }else{
            $carte1 = $tabImg[1]; 
            $carte2 = $tabImg[1]; 
            $carte3 = $tabImg[2];
        }
        $tabCarte = [$carte1,$carte2,$carte3];
    }
    
    // Test de $ale pour connaître sa valeur (le déroulement du jeu avec le $choix du joueur)
    switch ($ale){
        case 1:  // Pour case 1, on détermine les cartes par rapport aux choix effectué.
        {
            if($choix == 1 && $tour == 2){
                $plage = 1000000000;          // Tirage random aux ligne 183 à 185.
                $tmp = mt_rand(0,1000000000);
                $tmp = ($tmp <= $plage/2) ? 1 : 2; // variable $tmp = CONDITION OPERATEUR TERNAIRE ($tmp <= $plage/2) ? ok : no; CAD: On demande si $tmp vaut true ou false (ici 1 ou 2)
                if($tmp == 1){                    //Pour la syntaxe: la variable testée "($tmp <= $plage/2)" puis le "?" pour la demande IF, puis la valeur de la réponse true(ici 1), ELSE ":" et enfin la valeur de la réponse false (ici 2)
                    melange(1);
                }else{
                    melange(2);
                }               
            }else if($choix == 2 && $tour == 2){
                melange(2); 
            }else if($choix == 3 && $tour == 2){
                melange(1); 
            }else if($tour == 1){
                carteDeDos();
            }else {
                donneReponse(1); 
            }           
        }      
        break; 
        case 2:
        {
            if($choix == 1 && $tour == 2){
                melange(2);              
            }else if($choix == 2 && $tour == 2){               
                $plage = 1000000000;          // Tirage random aux ligne 183 à 185.
                $tmp = mt_rand(0,1000000000);
                $tmp = ($tmp <= $plage/2) ? 1 : 2; // variable $tmp = CONDITION OPERATEUR TERNAIRE ($tmp <= $plage/2) ? ok : no; CAD: On demande si $tmp vaut true ou false (ici 1 ou 2)
                if($tmp == 1){                    //Pour la syntaxe: la variable testée "($tmp <= $plage/2)" puis le "?" pour la demande IF, puis la valeur de la réponse true(ici 1), ELSE ":" et enfin la valeur de la réponse false (ici 2)
                    melange(3);
                }else{
                    melange(2);
                }
            }else if($choix == 3 && $tour == 2){
                melange(3); 
            }else if($tour == 1){
                carteDeDos();
            }else {
                donneReponse(2); 
            }           
        }       
        break;    
        case 3:
        {
            if($choix == 1 && $tour == 2){ 
                melange(1);
            }else if($choix == 2 && $tour == 2){
                melange(3); 
            }else if($choix == 3 && $tour == 2){ 
                $plage = 1000000000;          // Tirage random aux ligne 183 à 185.
                $tmp = mt_rand(0,1000000000);
                $tmp = ($tmp <= $plage/2) ? 1 : 2; // variable $tmp = CONDITION OPERATEUR TERNAIRE ($tmp <= $plage/2) ? ok : no; CAD: On demande si $tmp vaut true ou false (ici 1 ou 2)
                if($tmp == 1){                    //Pour la syntaxe: la variable testée "($tmp <= $plage/2)" puis le "?" pour la demande IF, puis la valeur de la réponse true(ici 1), ELSE ":" et enfin la valeur de la réponse false (ici 2)
                    melange(3);
                }else{
                    melange(1);
                }
            }else if($tour == 1){
                carteDeDos();
            }else {
                donneReponse(3); 
            }          
        }
        break;   
        case 0:
        {
            carteDeDos();
        }
        break;
    } 
    
    // Affiche les boutons
    function afficheBtn($nbTour){
        if($nbTour == 1){
            //echo ' <p><input type="submit" value="Mélanger les cartes" disabled></p>';
            echo ' <input type="submit" class="form-control btn btn-primary" value="Valider mon choix">';
            echo ' <input type="submit" class="form-control btn btn-primary" value="Donner la réponse" disabled>';
        }else if($nbTour == 2){
            //echo ' <p><input type="submit" value="Mélanger les cartes" disabled></p>';
            echo ' <input type="submit" class="form-control btn btn-primary" value="Valider mon choix" disabled>';
            echo ' <input type="submit" class="form-control btn btn-primary" value="Donner la réponse">';
        }
    }
    

?>