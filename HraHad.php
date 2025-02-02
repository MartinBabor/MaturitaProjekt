<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hra Had</title>
    <link rel="stylesheet" href="Had.css">
</head>
<body>
      
    <div class="herni-stranka">
        <h1>Hra Had</h1>
        <div id="skore">Skóre: 0</div>
        <div class="HraciPole" id="HraciPole"></div>
        <button id="zobrazitTabulkuB">Zobrazit tabulku</button>
        <button id="restartButton" onclick="initializeGame()">Restartovat hru</button>
    </div>

    <div class="prihlaseni">
    <h1>Registrace</h1>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Uživatelské jméno"><br><br>
        <input type="password" name="password" placeholder="Heslo"><br><br>
        <button type="submit" name="register">Registrovat se</button>
    </form>

    <h1>Přihlášení</h1>
    <form method="POST" action="">
        <input type="text" id="username" name="username" placeholder="Uživatelské jméno"><br><br>
        <input type="password" id="password" name="password" placeholder="Heslo"><br><br>
        <button type="submit" name="login" id="prihlaseniB" onclick="initializeGame()">Přihlásit se</button>
    </form>


</div>

    <button id="odhlaseniB">Odhlásit se</button>

    


    <script src="Had.js"></script>
</body>
</html>
