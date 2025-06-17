<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="insertUser.php" method="POST">
        <input type="text" name="nombre" required>
        <input type="email" name="email" required>
        <input type="password" name="pass" required>
        <button type="submit">Registrarme</button>
    </form>
</body>
</html>