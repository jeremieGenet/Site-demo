window.onload = () => {
    const canvasWidth = 700;
    const canvasHeight = 400;
    const blockSize = 20;

    const contentSnake = document.getElementById('snake');
    //const canvas = document.createElement('canvas');
    const canvas = document.getElementById('c');
    const ctx = canvas.getContext('2d');
    const widthInBlocks = canvasWidth/blockSize;
    const heightInBlocks = canvasHeight/blockSize;
    const centreX = canvasWidth / 2;
    const centreY = canvasHeight / 2;
    let delay = 100; // En millisecondes
    let snakee;
    let applee; 
    let score;
    let timeOut;
     
    class Snake {
        
        constructor(body, direction) {
            this.body = body;
            this.direction = direction;
            this.ateApple = false;
        }
        
        advance() {
            const nextPosition = this.body[0].slice();
            switch(this.direction){
                case "left":
                    nextPosition[0] -= 1;
                    break;
                case "right":
                    nextPosition[0] += 1;
                    break;
                case "down":
                    nextPosition[1] += 1;
                    break;
                case "up":
                    nextPosition[1] -= 1;
                    break;
                default:
                    throw("invalid direction");
            }
            this.body.unshift(nextPosition);
            if (!this.ateApple)
                this.body.pop();
            else
                this.ateApple = false;
        }
        
        setDirection(newDirection) {
            let allowedDirections;
            switch(this.direction){
                case "left":
                case "right":
                    allowedDirections=["up","down"];
                    break;
                case "down":
                case "up":
                    allowedDirections=["left","right"];
                    break;  
               default:
                    throw("invalid direction");
            }
            if (allowedDirections.indexOf(newDirection) > -1){
                this.direction = newDirection;
            }
        }
        
        checkCollision() {
            let wallCollision = false;
            let snakeCollision = false;
            const head = this.body[0]; // Tête du snakee
            const rest = this.body.slice(1); // Rest du corps du snakee (tout sauf la tête)
            const snakeX = head[0]; // Position X de la tête du snakee
            const snakeY = head[1]; // Position Y de la tête du snakee
            const minX = 0;
            const minY = 0;
            const maxX = widthInBlocks - 1;
            const maxY = heightInBlocks - 1;
            const isNotBetweenHorizontalWalls = snakeX < minX || snakeX > maxX;
            const isNotBetweenVerticalWalls = snakeY < minY || snakeY > maxY;
            
            if (isNotBetweenHorizontalWalls || isNotBetweenVerticalWalls)
                wallCollision = true;
            
            for (let i=0 ; i<rest.length ; i++){
                if (snakeX === rest[i][0] && snakeY === rest[i][1])
                    snakeCollision = true;
            }
            
            return wallCollision || snakeCollision;        
        }
        
        isEatingApple(appleToEat) {
            const head = this.body[0];
            if (head[0] === appleToEat.position[0] && head[1] === appleToEat.position[1])
                return true;
            else
                return false;
        }
        
    }
    
    class Apple {
        
        constructor(position = [0, 0]) { // Param par défaut de la pomme à 0 et 0 en x et y
            this.position = position;
        }
        
        setNewPosition() {
            const newX = Math.round(Math.random()*(widthInBlocks-1));
            const newY = Math.round(Math.random()*(heightInBlocks-1));
            this.position = [newX,newY];
        }
        
        isOnSnake(snakeToCheck) {
            let isOnSnake = false;
            for (let i=0 ; i < snakeToCheck.body.length ; i++){
                if(this.position[0] === snakeToCheck.body[i][0] && this.position[1] === snakeToCheck.body[i][1]){
                    isOnSnake = true;     
                }
            }
            return isOnSnake;
        }

    }
    
    class Drawing{
        
        // Dessine le mot gameOver
        static gameOver(ctx, centreX, centreY){
            ctx.save();
            ctx.font = "bold 50px sans-serif";
            ctx.fillStyle = "#000";
            ctx.textAlign = "center";
            ctx.textBaseline = "middle";
            ctx.strokeStyle = "white";
            ctx.lineWidth = 5;
            ctx.strokeText("Game Over", centreX, centreY - 150);
            ctx.fillText("Game Over", centreX, centreY - 150);
            ctx.font = "bold 20px sans-serif";
            ctx.strokeText("Appuyer sur la touche Espace pour rejouer", centreX, centreY - 100);
            ctx.fillText("Appuyer sur la touche Espace pour rejouer", centreX, centreY - 100);
            ctx.restore();
        };
        
        // Dessine le score
        static drawScore(ctx, centreX, centreY, score){
            ctx.save();
            ctx.font = "bold 100px sans-serif";
            ctx.fillStyle = "black";
            ctx.textAlign = "center";
            ctx.textBaseline = "middle";
            ctx.fillText(score.toString(), centreX, centreY); // On centre le score
            ctx.restore();
        };
        
        // Dessine le snakee
        static drawSnake(ctx, blockSize, Snake) {
            ctx.save();
            ctx.fillStyle="#ff0000"; // couleur rouge
            // Boucle qui parcours le corps du snakee et le rempli de 'blocks'
            for (let block of Snake.body){
                this.drawBlock(ctx, block, blockSize);
            }
            ctx.restore();
        }
        
        static drawApple(ctx, blockSize, Apple) {
          const radius = blockSize/2;
          const x = Apple.position[0] * blockSize + radius;
          const y = Apple.position[1] * blockSize + radius;
          ctx.save();
          ctx.fillStyle = "#33cc33";
          ctx.beginPath();
          ctx.arc(x, y, radius, 0, Math.PI*2, true);
          ctx.fill();
          ctx.restore();
        }
        
        // Dessine un carré rouge du snakee
        static drawBlock(ctx, position, blockSize){
            const x = position[0]*blockSize;
            const y = position[1]*blockSize;
            ctx.fillRect(x,y,blockSize,blockSize);
        };
        
    }
    
    const init = () => {
        canvas.width = canvasWidth;
        canvas.height = canvasHeight;
        canvas.style.border = "30px solid black";
        canvas.style.margin = "50px auto";
        canvas.style.display = "block";
        canvas.style.backgroundColor = "#ddd";
        contentSnake.appendChild(canvas);
        launch();
    };
    
    // Paramètres de lancement du jeu
    const launch = () => {
        snakee = new Snake([[6,4],[5,4],[4,4],[3,4],[2,4]],"right"); // Position de départ et direction du snakee
        applee = new Apple([10,10]); // Position de départ de la pomme x et y
        score = 0;
        clearTimeout(timeOut); // Mise à zero du timer
        delay = 200; // Définition du rafraîchissement d'image
        refreshCanvas(); // Lancement du jeu
    };
    
    // Lancement du jeux
    const refreshCanvas = () => {
        snakee.advance();
        if (snakee.checkCollision()){
            Drawing.gameOver(ctx, centreX, centreY); // Utilisation de la méthode static gameOver de la class Drawing (qui utilise les attributs définis au début du code)
        } else {
            if (snakee.isEatingApple(applee)){
                score++;
                snakee.ateApple = true;
                
                do {
                    applee.setNewPosition(); 
                } while(applee.isOnSnake(snakee));
                
                if(score % 5 == 0){
                    speedUp();
                }
            }
            ctx.clearRect(0,0,canvasWidth,canvasHeight);
            Drawing.drawScore(ctx, centreX, centreY, score); // Utilisation de la méthode static drawScore de la class Drawing (qui utilise les attributs définis au début du code)
            Drawing.drawSnake(ctx, blockSize, snakee);
            Drawing.drawApple(ctx, blockSize, applee);
            timeOut = setTimeout(refreshCanvas,delay);
         }
    };
    
    const speedUp = () => {
        delay /= 2;
    };
    
    // On récup les touches du clavier (pour le déplacement)
    document.onkeydown = (e) => {
        const key = e.keyCode;
        let newDirection;
        switch(key){
            case 37:
                newDirection = "left";
                break;
            case 38:
                newDirection = "up";
                break;
            case 39:
                newDirection = "right";
                break;
            case 40:
                newDirection = "down";
                break;
            // 32 = touche "espace"
            case 32:
                launch();
                return;
            default:
                return;
        }
        snakee.setDirection(newDirection); // Modification des déplacements du snakee
    };
    
    init();
    
}

