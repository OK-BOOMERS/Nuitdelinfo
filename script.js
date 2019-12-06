const canvas = document.getElementById("breakout");
const context = canvas.getContext("2d");

canvas.style.border = "2px solid black";
context.lineWidth = 3;

const L_BATTE = 100;
const H_BATTE = 20;
const MARGE_BATTE_BOTTOM = 50 - H_BATTE;
const R_BALLE = 8;

let VIE = 3;
let SCORE = 0;
let SCORE_UNIT = 10;
let NIVEAU = 1;
let MAX_NIVEAU = 3;
let GAMEOVER = false;
let leftArrow=false;
let rightArrow=false;

const batte = {
  x: canvas.width/2-L_BATTE/2,
  y: canvas.height - MARGE_BATTE_BOTTOM - H_BATTE,
  width: L_BATTE,
  height: H_BATTE,
  dx: 5//pas de déplacement
}

const balle = {
  x: canvas.width/2,
  y: batte.y-R_BALLE,
  r: R_BALLE,
  speed: 4,
  dx: 3 * (Math.random()*2-1),//pas de déplacement x avec direction initiale aléatoire
  dy: -3,//pas de déplacement y
}

const brique = {
  row: 1,
  column: 5,
  width: 55,
  height : 20,
  offSetLeft: 20,
  offSetTop: 20,
  marginTop: 40,
  fillColor: "yellow",
  strokeColor: "purple",
}

let bricks = [];

function createBricks(){
  for(let r = 0; r<brique.row; r++){
    bricks[r]=[];
    for(let c=0; c<brique.column; c++){
      bricks[r][c] = {
        x: c*(brique.offSetLeft + brique.width)+brique.offSetLeft,
        y: r*(brique.offSetTop + brique.height)+brique.offSetTop+brique.marginTop,
        status: true //cassé ou pas
      }
    }
  }
}

createBricks();

function drawBriques(){
  for(let r = 0; r<brique.row; r++){
    for(let c=0; c<brique.column; c++){
      if(bricks[r][c].status){//si la brique n'est pas cassé
        context.fillStyle = brique.fillColor;
        context.fillRect(bricks[r][c].x, bricks[r][c].y, brique.width, brique.height);
        context.strokeStyle = brique.strokeColor;
        context.strokeRect(bricks[r][c].x, bricks[r][c].y, brique.width, brique.height);
      }
    }
  }
}

function drawBatte(){
  context.fillStyle = "red";
  context.fillRect(batte.x, batte.y, batte.width, batte.height);
  context.strokeStyle = "blue";
  context.strokeRect(batte.x, batte.y, batte.width, batte.height);
}

function drawBalle(){
  context.beginPath();
  context.arc(balle.x,balle.y,balle.r,0,Math.PI*2);
  context.fillStyle = "green";
  context.fill();
  context.strokeStyle = "pink";
  context.stroke();
  context.closePath();
}

document.addEventListener("keydown", function(event){
   if(event.keyCode == 37)//fleche gauche
     leftArrow=true;
   else if (event.keyCode == 39)//fleche droite
     rightArrow=true;
});

document.addEventListener("keyup", function(event){
   if(event.keyCode == 37)//fleche gauche
     leftArrow=false;
   else if (event.keyCode == 39)//fleche droite
     rightArrow=false;
});

function resetBalle(){
  balle.x= canvas.width/2;
  balle.y= batte.y-R_BALLE;
  balle.dx= 3 * (Math.random()*2-1);
  balle.dy= -3;
}

function balleMurCollision(){
  if(balle.x+balle.r > canvas.width || balle.x-balle.r < 0)//si collision droite OU gauche on inverse le déplacement x
    balle.dx= -balle.dx;
  if(balle.y - balle.r<0)//si collision haut on inverse le déplacement y
    balle.dy= -balle.dy;
  if(balle.y+balle.r > canvas.height){//si la  balle tombe en bas on reset
   VIE--;
   resetBalle();
  }
}

function balleBatteCollision(){
  if(balle.x<batte.x+batte.width && balle.x>batte.x
    && batte.y < batte.y+batte.height && balle.y>batte.y){//si la balle touche la H_BATTE
      let collisionPoint = balle.x - (batte.x+batte.width/2);
      collisionPoint = collisionPoint / (batte.width/2);

      let angle = collisionPoint * Math.PI/3;


      balle.dx = balle.speed * Math.sin(angle);
      balle.dy = -balle.speed * Math.cos(angle);
    }
}

function balleBriqueCollision(){
  for(let r = 0; r<brique.row; r++){
    for(let c=0; c<brique.column; c++){
      let b = bricks[r][c];
      if(b.status){//si la brique n'est pas cassé
        if(balle.x+balle.r > b.x && balle.x-balle.r < b.x+brique.width &&
        balle.y+balle.r > b.y && balle.y-balle.r<b.y+brique.height){
          balle.dy = - balle.dy;
          b.status =false;//la brique devient cassée
          SCORE+=SCORE_UNIT;
        }
      }
    }
  }
}

function showStats(texte, texteX, texteY, img, imgX, imgY){
  context.fillStyle = "white"
  context.font="30 px Roboto"
  context.fillText(texte, texteX, texteY);
}

function moveBatte(){
  if(rightArrow && batte.x + batte.width < canvas.width)//verif que l'on ne sort pas du canvas
    batte.x+=batte.dx;
  else if(leftArrow && batte.x > 0)
    batte.x-=batte.dx;
}

function moveBalle(){
  balle.x+=balle.dx;
  balle.y+=balle.dy;
}

function draw(){
  drawBatte();
  drawBalle();
  drawBriques();
  showStats("Score "+SCORE, 25, 25);
  showStats("Vie "+VIE, canvas.width-35, 25);
  showStats("Niveau "+NIVEAU, canvas.width/2, 25);
}

function gameOver(){
 if(VIE==0){
    GAMEOVER=true;
    showStats("GAME OVER", canvas.width/2-20, canvas.height/2);
  }
  if(NIVEAU > MAX_NIVEAU){
    GAMEOVER=true;
    showStats("VICTOIRE", canvas.width/2-20, canvas.height/2);
  }
}

function levelUp(){
  let termine = true;
  for(let r = 0; r<brique.row; r++){
    for(let c=0; c<brique.column; c++){
      if(bricks[r][c].status)
        termine = false;
    }
  }
  //si toutes les briques sont cassés
  if(termine){
    brique.row++;
    createBricks();
    balle.speed+=0.5;
    resetBalle();
    NIVEAU++;
  }
}

function update(){
  moveBatte();
  moveBalle();
  balleMurCollision();
  balleBatteCollision();
  balleBriqueCollision();
  gameOver();
  levelUp();
}

function loop(){
  context.drawImage(background,0,0);
  draw();
  update();
  if(!GAMEOVER)
    requestAnimationFrame(loop);
}

loop();
