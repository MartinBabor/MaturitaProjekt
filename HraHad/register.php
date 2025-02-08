<?php require 'databaze.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrace</title>
    <link rel="stylesheet" href="Had.css">
   
</head>
<body>

  <?php include "menu.php" ?>

    <div class="prihlaseni">
      <h1>Registrace</h1>
      <form method="POST" action="">
          <input type="text" name="username" placeholder="Uživatelské jméno"><br><br>
          <input type="password" name="password" placeholder="Heslo"><br><br>
          <button type="submit" name="register">Registrovat se</button>
      </form>
    </div>

<?php 
if (isset($_POST['register'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $hashed_password = password_hash($pass, PASSWORD_BCRYPT);
    $sql = "INSERT INTO hraci (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user, $hashed_password);
    if ($stmt->execute()) {
        echo "<script>alert('Registrace úspěšná.'); window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Chyba při registraci.');</script>";
    }
    $stmt->close();
}
$conn->close();
?>
</body>
</html>
