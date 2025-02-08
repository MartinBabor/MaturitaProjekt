<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hra Had</title>
    <link rel="stylesheet" href="Had.css">
</head>
<body>

<?php include "menu.php" ?>
  
<div class="app">

    <div class="herni-stranka">
        <h1>Hra Had</h1>
        <div id="skore">Skóre: 0</div>
        <div class="HraciPole" id="HraciPole"></div>

        <button id="restartButton" onclick="initializeGame()">Restartovat hru</button>
    </div>

    <div class="vysledky">
      <?php include "tabulka.php" ?>
    </div>
</div>



    <script src="Had.js"></script> 
</body>
</html>