// Creation d'un objet SPRITE:
function Sprite(filename, left, top, width, height, zIndex){
    this._node = document.createElement("img"); // On créé une balise img
    this._node.src = filename;                  // On lui donne la propriété src
    this._node.style.position = "absolute";     // On lui donne la position absolute (css)
    document.body.appendChild(this._node); // Méthode appendChild qui insère l'élément (ajoute l'enfant) sur le body. 


    // Utilisation de la syntaxe des propriétés objet en JS qui utilise une méthode de lecture (get) et une méthode en écriture (set) :
    
    // Propriété left de l'Objet (notre sprite) par rapport à la gauche de l'écran 
    Object.defineProperty(this, "left", {  // paramètres: this (pour le sprite en cours) et le nom de propriété left.
        // En "lecture":
        get: function(){
            return this._left;  // Retournera simplement sa position left
        },
        // En "écriture" (modification):
        set: function(value){
            this._left = value;  // Récup de la position (via sa value en left)
            this._node.style.left = value + "px"; //  Et modification de la position left via paramètre value et cette modif sera en pixel (css)
        }
    });

    // Propriété top de l'Objet (notre sprite) par rapport au haut de l'écran
    Object.defineProperty(this, "top", {
        get: function(){
            return this._top;
        },
        set: function(value){
            this._top = value;
            this._node.style.top = value + "px";
        }
    });

    // Propriété display de l'Objet (notre sprite) affiché ou non (servira pour le missile par ex)
    Object.defineProperty(this, "display", {
        get: function(){
            return this._node.style.display;
        },
        set: function(value){
            this._node.style.display = value;
        }
    });
    
    // Propriété de largeur de l'Objet
    Object.defineProperty(this, "widthSprite", {
        get: function(){
            return this._node.style.width;
        },
        set: function(value){
            this._widthSprite = value;
            this._node.style.width = value + "px";
        }
    });
    
    Object.defineProperty(this, "heightSprite", {
        get: function(){
            return this._node.style.height;
        },
        set: function(value){
            this._heightSprite = value;
            this._node.style.height = value + "px";
        }
    });
    
    Object.defineProperty(this, "index", {
        get: function(){
            return this._node.style.zIndex;
        },
        set: function(value){
            this._index = value;
            this._node.style.zIndex = value;
        }
    });
    

    // Ici on définit les noms des paramétres de la fonction Sprite (filename a été definis plus haut) et on leur attribut la propriété voulue.
    this.left = left; 
    this.top = top;
    this.widthSprite = width;
    this.heightSprite = height;
    this.index = zIndex;
    
}


// Ici on crée des méthodes sur notre objet Sprite, (tout objet en js posséde un tableau de méthodes appellé prototype) dans le prototype de l'objet.

// Ajout d'une méthode au Sprite pour démarrer les animations:
Sprite.prototype.startAnimation = function(fct, interval){
    if(this._clock) window.clearInterval(this._clock); // 
    var _this = this;
    this._clock = window.setInterval(function(){
        fct(_this);  
    }, interval );
};

// Ajout d'une méthode au Sprite pour terminer les animations:
Sprite.prototype.stopAnimation = function(){
    window.clearInterval(this._clock);
};


// GESTION DES COLLISION ENTRE CHAQUE SPRITE
Sprite.prototype.checkCollision = function(other){
    console.log("collision1");
    // retourne l'inverse (return !)
    return ! ((this.top + this._node.height < other.top) ||
             this.top > (other.top + other._node.height) ||
             (this.left + this._node.width < other.left) ||
             this.left > (other.left + other._node.width));
    //console.log("collision2");
};



























