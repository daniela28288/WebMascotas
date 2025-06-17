<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
require 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu mejor amigo en casa - Add</title>
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
    <main class="add">
        <header>
            <h2>Adicionar Mascota</h2>
            <a href="dashboard.php" class="back"></a>
            <a href="index.html" class="close"></a>
        </header>
        <figure class="photo-preview">
            <img src="imgs/photo-lg-0.svg" alt="">
        </figure>
        <form action="insertPet.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Nombre"  required>

            <?php 
            $stmt = $pdo->query("SELECT * FROM race");
            $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="select">
                <select name="raza" required>
                    <option value="">Seleccione Raza</option>
                    <?php foreach ($usuario as $user) : ?>
                    <option value="<?= $user['id']?>"> <?= $user['name']  ?> </option>
                     <?php endforeach; ?>
                </select>
            </div>
           

             <?php 

            $stmt = $pdo->query("SELECT * FROM categories");
            $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="select">
                <select name="categoria" required>
                    <option value="">Seleccione Categoría...</option>
                    <?php foreach ($usuario as $user) : ?>
                    <option value="<?= $user['id']?>"><?= $user['name']  ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="button" id="file" class="upload">Subir Foto</button>
            <input type="file" name="file" id="file-input" style="display: none;">

             <?php 

            $stmt = $pdo->query("SELECT * FROM genders");
            $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="select" required>
                <select name="genero">
                    <option value="">Seleccione Genero...</option>
                    <?php foreach ($usuario as $user) : ?>
                    <option value="<?= $user['id']?>"> <?php echo $user['name']  ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button  type="submit" class="save">Guardar</button>
        </form>
    </main>

    <script>
         document.getElementById('file').addEventListener('click', function () {
            document.getElementById('file-input').click();
        });

        const input = document.getElementById('file-input');
        const fileName = document.getElementById('file');

        input.addEventListener('change', function () {
            fileName.textContent = this.files.length > 0 ? this.files[0].name : 'Ningún archivo seleccionado';
        });

    </script>
</body>
</html>