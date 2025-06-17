<?php

require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nombre'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(fullname, email, password) VALUES(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name,$email,$pass]);

    echo "
    <script>
    alert('USUARIO REGISTRADO CON EXITO');
    window.location.href = 'index.html';
    </script>
    ";
}