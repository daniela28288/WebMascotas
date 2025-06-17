<?php
session_start();
require 'conexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email =  $_POST['email'];
    $pass = $_POST['clave'];

    $stmt =  $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $usuario =  $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($pass, $usuario['password'])) {
        $_SESSION['usuario'] = $usuario['id'];
        $_SESSION['email'] = $usuario['email'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "
        <script>
        alert('credenciales incorrectas');
        window.location.href='index.php';
        </script>
        ";
    }
}