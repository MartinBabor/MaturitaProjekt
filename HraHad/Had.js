const prihlaseni = document.querySelector(".prihlaseni");
const herniStranka = document.querySelector(".herni-stranka");
const restartButton = document.getElementById("restartButton");
const HraciPole = document.getElementById("HraciPole");


let Had = [{ x: 8, y: 8 }];
let Jablko = { x: 12, y: 12 };
let direction = "UP";
let gameOver = false;
let rows = 17;
let cols = 17;
let score = 0; 
let gameInterval;


function drawGameBoard() {
    HraciPole.innerHTML = ''; 
    for (let i = 0; i < rows * cols; i++) {
        let div = document.createElement('div');
        div.classList.add('policko'); 
        HraciPole.appendChild(div);
    }
}

function drawHad() {
    const allDivs = document.querySelectorAll(".policko");
    allDivs.forEach(div => div.classList.remove("had", "hlava")); 

    let headIndex = Had[0].y * cols + Had[0].x;
    allDivs[headIndex].classList.add("hlava"); 

    for (let i = 1; i < Had.length; i++) {
        let bodyIndex = Had[i].y * cols + Had[i].x;
        allDivs[bodyIndex].classList.add("had"); 
    }
}

function drawJablko() {
    const allDivs = document.querySelectorAll(".policko");
    allDivs.forEach(div => div.classList.remove("jablko"));
    let JablkoIndex = Jablko.y * cols + Jablko.x;
    allDivs[JablkoIndex].classList.add("jablko");
}




function pohybHad() {
    const head = { ...Had[0] };

    switch (direction) {
        case "LEFT":
            head.x -= 1;
            break;
        case "RIGHT":
            head.x += 1;
            break;
        case "UP":
            head.y -= 1;
            break;
        case "DOWN":
            head.y += 1;
            break;
    }

    
    if (head.x === Jablko.x && head.y === Jablko.y) {
        score++; 
        updateScore(); 
        placeJablko(); 
    } else {
        Had.pop(); 
    }

    Had.unshift(head);
}

function placeJablko() {
    let newJablkoPosition; 
    do {
        newJablkoPosition = {
            x: Math.floor(Math.random() * cols),
            y: Math.floor(Math.random() * rows)
        };
    } while (Had.some(segment => segment.x === newJablkoPosition.x && segment.y === newJablkoPosition.y));
    Jablko = newJablkoPosition;
}

function sendScoreToDatabase() {
  if (!gameOver) return; 

  fetch('save_score.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: `score=${score}`
  })
  .catch(() => alert("Nepodařilo se uložit výsledek."));
}


function checkGameOver() {
    const head = Had[0];

    
    if (head.x < 0 || head.x >= cols || head.y < 0 || head.y >= rows) {
        gameOver = true;
    }

    
    for (let i = 1; i < Had.length; i++) {
        if (Had[i].x === head.x && Had[i].y === head.y) {
            gameOver = true;
        }
    }

    if (gameOver) {
      clearInterval(gameInterval);
      restartButton.style.display = "block"; 
      sendScoreToDatabase();
  }
}


function changeDirection(event) {
    if (event.key === "ArrowLeft" && direction !== "RIGHT" && direction !== "LEFT") {
        direction = "LEFT";
    } else if (event.key === "ArrowRight" && direction !== "LEFT" && direction !== "RIGHT") {
        direction = "RIGHT";
    } else if (event.key === "ArrowUp" && direction !== "DOWN" && direction !== "UP") {
        direction = "UP";
    } else if (event.key === "ArrowDown" && direction !== "UP" && direction !== "DOWN") {
        direction = "DOWN";
    }
}


function gameLoop() {
    if (gameOver) {
        clearInterval(gameInterval);
        restartButton.style.display = "block"; 
        return;
    }

    pohybHad();
    checkGameOver();
    drawHad();
    drawJablko();
}


function updateScore() {
    document.getElementById("skore").textContent = `Skóre: ${score}`;
}


function initializeGame() {
    Had = [{ x: 8, y: 8 }];
    Jablko = { x: 12, y: 12 };
    direction = "UP";
    gameOver = false;
    score = 0; 
    updateScore(); 

    
    if (gameInterval) {
        clearInterval(gameInterval);
    }

   
    restartButton.style.display = "none";

    drawGameBoard();
    gameInterval = setInterval(gameLoop, 200); 
    document.addEventListener("keydown", changeDirection);
}

initializeGame()
