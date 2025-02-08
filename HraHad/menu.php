<?php
session_start();
if ((!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true ) && basename($_SERVER['PHP_SELF']) !== 'login.php' && basename($_SERVER['PHP_SELF']) !== 'register.php') {
    header("Location: login.php");
    exit();
  }
  
  if ((isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ) && basename($_SERVER['PHP_SELF']) !== 'index.php') {
    header("Location: index.php");
    exit();
  }
?>

<nav class="menu">
    <ul>
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
            <li>Hraje: <?php echo htmlspecialchars($_SESSION['username']); ?></li>
            <li><a href="logout.php">Odhlásit se</a></li>
        <?php else: ?>
            <li><a href="login.php">Přihlásit se</a></li>
            <li><a href="register.php">Registrovat</a></li>
        <?php endif; ?>
    </ul>
</nav>
