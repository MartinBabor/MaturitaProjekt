<?php require 'databaze.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Přihlášení</title>
  <link rel="stylesheet" href="Had.css">
  
</head>

<body>

  <?php include "menu.php" ?>

  <div class="prihlaseni">
    <h1>Přihlášení</h1>
    <form method="POST" action="">
      <input type="text" name="username" placeholder="Uživatelské jméno"><br><br>
      <input type="password" name="password" placeholder="Heslo"><br><br>
      <button type="submit" name="login">Přihlásit se</button>
    </form>
  </div>

  <?php
  if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $sql = "SELECT id, password FROM hraci WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
      if (password_verify($pass, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $user;
        $_SESSION['logged_in'] = true;
        header("Location: index.php");
        exit;
      } else {
        echo "<script>alert('Nesprávné heslo.');</script>";
      }
    } else {
      echo "<script>alert('Uživatel není registrován.');</script>";
    }
    $stmt->close();
  }
  $conn->close();
  ?>
</body>

</html>