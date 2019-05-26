// On récup la div ou sera afficher notre jeu
var spaceInvaders = document.getElementById("spaceInvaders");
console.log(spaceInvaders);

// On définit 2 variables pour stocker la taille de la div qui affichera le jeu
screenWidth = spaceInvaders.clientWidth;
screenHeight = spaceInvaders.clientHeight;
console.log(screenWidth);

// Creation de notre vaisseau
var vaisseau = new Sprite("../asset/spaceInvaders/vaisseau2.1.png", 300, 600, 80, 90, 1);

//Création du missile du vaisseau
var missile = new Sprite("../asset/spaceInvaders/missile.png",10,10,25,80, 0)
missile.display = "none"; // Par défaut on cache le missile

/*
console.log(vaisseau.widthSprite);  // Affiche 80px
console.log(vaisseau._widthSprite); // Affiche 80
console.log("test index vaisseau: ");
console.log(vaisseau._index);
console.log("test index missile: ");
console.log(missile._index);
console.log(missile.index);
*/

// Création de nos aliens (params = filename, position left, position top, width, height, zIndex) :
var alien1 = new Sprite("../asset/spaceInvaders/alien1.png", 200, 40, 80, 100);
var alien2 = new Sprite("../asset/spaceInvaders/alien2.png", 600, 40, 80);
var alien3 = new Sprite("../asset/spaceInvaders/alien1.png", 1000, 40, 80, 100);
var alien4 = new Sprite("../asset/spaceInvaders/alien2.png", 1400, 40, 80);
var alien5 = new Sprite("../asset/spaceInvaders/alien1.png", 1800, 40, 80, 100);

var alien6 = new Sprite("../asset/spaceInvaders/alien1.png", 200, 90, 80, 100);
var alien7 = new Sprite("../asset/spaceInvaders/alien2.png", 600, 90, 80);
var alien8 = new Sprite("../asset/spaceInvaders/alien1.png", 1000, 90, 80, 100);
var alien9 = new Sprite("../asset/spaceInvaders/alien2.png", 1400, 90, 80);
var alien10 = new Sprite("../asset/spaceInvaders/alien1.png", 1800, 90, 80, 100);


// Fonction de gestion des évènements quand on appuie sur une touche du clavier
document.onkeydown = function(event){
    console.log(event.keyCode);  // permet d'obtenir dans la console les codes correspondant aux touches 
    //(ne pas oublier de cliquer sur l'écran pour avoir le focus et ainsi obtenir l'affichage dans la console)

    // UTILISATION DU PAVE NUMERIQUE POUR LES DEPLACEMENTS DU VAISSEAU
    if(event.keyCode == 103){               // Déplacement haut/gauche
        vaisseau.left = vaisseau.left - 10; 
        vaisseau.top = vaisseau.top - 10;
    }else if(event.keyCode == 104 || event.keyCode == 38){         // Déplacement haut
        vaisseau.top = vaisseau.top - 10;
    }else if(event.keyCode == 105){         // Déplacement haut/droite
        vaisseau.left = vaisseau.left + 10; 
        vaisseau.top = vaisseau.top - 10;
    }else if(event.keyCode == 100 || event.keyCode == 37){         // Déplacement gauche
        vaisseau.left = vaisseau.left - 10;  
    }else if(event.keyCode == 102 || event.keyCode == 39){         // Déplacement droite
        vaisseau.left = vaisseau.left + 10; 
    }else if(event.keyCode == 97){          // Déplacement bas/gauche
        vaisseau.left = vaisseau.left - 10; 
        vaisseau.top = vaisseau.top + 10;
    }else if(event.keyCode == 98 || event.keyCode == 40){          // Déplacement bas 
        vaisseau.top = vaisseau.top + 10;
    }else if(event.keyCode == 99){          // Déplacement bas/droite
        vaisseau.left = vaisseau.left + 10; 
        vaisseau.top = vaisseau.top + 10;
    }
    
    
    // Gestion de collision du vaisseau avec le bord de l'écran:
    if(vaisseau.left < 0) vaisseau.left = 0;                  // par rapport à la gauche de l'écran
    if(vaisseau.left > screenWidth - vaisseau._widthSprite)   // par rapport à la droite de l'écran
        vaisseau.left = screenWidth - vaisseau._widthSprite; 
    if(vaisseau.top < 0) vaisseau.top = 0;                    // par rapport au haut de l'écran
    if(vaisseau.top > screenHeight - vaisseau._heightSprite)  // par rapport au bas de l'écran
        vaisseau.top = screenHeight - vaisseau._heightSprite;
    
    // Condition utilisation du missile (si espace ou 5 est appuyé)
    if(event.keyCode == 101 || event.keyCode == 32){
        
        // Condition pour qu'il n'y ait que 1 missile d'afficher à la fois
        if(missile.display == "none"){
            // Affichage du missile
            missile.display = "block";
            // Positionnement du missile sur l'axe des x (au niveau du vaisseau)
            missile.left = vaisseau.left + (vaisseau._widthSprite - missile._widthSprite) /2;
            // Positionnement du missile sur l'axe des Y (au niveau du vaisseau)
            missile.top = vaisseau.top - (vaisseau._widthSprite) /2;
            // Animation du missile
            missile.startAnimation(moveMissile, 20); // En paramètre la fonction moveMissile, et le delta time (en miliseconde)
        }
    }
    
};

// Fonction qui définit la vitesse du missile, la fin de son animation , et sa collision
function moveMissile(missile){
    missile.top = missile.top - 10;
    if(missile.top < - 60){
        missile.stopAnimation();
        missile.display = "none";
    };
    /*
    // GESTION DES COLLISIONS
    // Boucle qui parcours tous nos aliens
    for(var i = 1; i <= 10; i++){
        var alien = window["alien" + i];
        //console.log("alien? : ")
        //console.log(alien);
        if(alien.display == "none") continue;  // Si un alien et caché (notament quand il est touché), on passe au tour de boucle suivant.
        if(missile.checkCollision(alien)){
            missile.stopAnimation();
            alien.stopAnimation();
            missile.display = "none";
            alien.display = "none";
        };
    };
    */
};

// Fonction qui va déplacer les aliens vers la gauche
function moveAlienToLeft(alien){
    alien.left = alien.left - 3;
    
    // Si les aliens atteignent le bord droit...
    if(alien.left <= 0){  
        alien.top = alien.top + 110; // On baisse de 110px
        alien.startAnimation(moveAlienToRight, 20);  // On lance l'animation moveAlienToRight 
    };
};


// Fonction de déplacement de aliens vers la droite
function moveAlienToRight(alien){
    alien.left = alien.left + 3;

    // Si l'alien atteint le bord gauche...
    if(alien.left > screenWidth - alien._widthSprite){
        alien.top = alien.top + 110; // On baisse de 110px
        alien.startAnimation(moveAlienToLeft, 20); // (parm 20 = vitesse de déplacement à gauche)
    };
};


// Boucle qui va chercher tous nos aliens pour les animés
for(var i = 1; i <= 10; i++){
    window["alien" + i].startAnimation(moveAlienToRight, 20); // window nous sert de variable global (parm 20 = vitesse de déplacement à droite)
}
