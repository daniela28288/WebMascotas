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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu mejor amigo en casa - Show</title>
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
    <main class="show">
        <header>
            <h2>Consultar Mascota</h2>
            <a href="dashboard.php" class="back"></a>
            <a href="logout.php" class="close"></a>
        </header>
        <?php
        require 'conexion.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $stmt = $pdo->prepare("SELECT * FROM pets WHERE id = ?");
            $stmt->execute(['id']);
            $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);

            
        }

        
        ?>
        <figure class="photo-preview">
            <img src="imgs/photo-lg-1.svg" alt="">
        </figure>
        <div>
            <article class="info-name"><p>Reigner</p></article>
            <article class="info-race"><p>Bulldog</p></article>
            <article class="info-category"><p>Perro</p></article>
            <article class="info-gender"><p>Macho</p></article>
        </div>
    </main>
</body>
</html>