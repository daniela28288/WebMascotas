<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $raza = $_POST['raza'];
    $categoria = $_POST['categoria'];
    $genero = $_POST['genero'];


    if (!empty($_FILES['file']['tmp_name'])) {
        $carpeta = 'uploads/';

        //crea la carpeta si no existe
        if (!is_dir($carpeta)) {
            mkdir($carpeta, 0777, true);
        }

        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $nombre = uniqid('img_', true) . '.' . $ext;
        $rutaFinal = $carpeta . $nombre;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $rutaFinal)) {
            $ruta = $rutaFinal; // Solo si se movió correctamente
        } else {
            $ruta = 'uploads/perfil.jpg'; 
        }
    } else {
        $ruta = 'uploads/perfil.jpg'; 
    }

    $sql = "INSERT INTO pets(name, race_id, categories_id, photo, genders_id) VALUES(?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $raza, $categoria, $ruta, $genero]);

    echo "
    <script>
    alert('Mascota registrada con éxito');
    window.location.href = 'dashboard.php';
    </script>
    ";
}
?>