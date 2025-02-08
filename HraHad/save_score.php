<?php
session_start();
require 'databaze.php';

if (isset($_SESSION['user_id']) && isset($_POST['score'])) {
    $user_id = $_SESSION['user_id'];
    $score = intval($_POST['score']);

    $stmt = $conn->prepare("INSERT INTO tophraci (id, score) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $score);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "invalid";
}
?>