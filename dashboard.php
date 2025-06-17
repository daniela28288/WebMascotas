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
    <title>Tu mejor amigo en casa - Dashboard</title>
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
    <main class="dashboard">
        <header>
            <h2>Administrar mascotas</h2>
            <a href="logout.php" class="close"></a>
        </header>
       <a href="add.php" class="add"></a>   
       <table>
        <?php
            require 'conexion.php';

            $stmt = $pdo->query("
                SELECT pets.id, pets.name AS pet_name, race.name AS race_name, 
                    categories.name AS category_name, genders.name AS gender_name, pets.photo AS pet_photo
                    FROM pets
                JOIN race ON pets.race_id = race.id
                JOIN categories ON pets.categories_id = categories.id
                JOIN genders ON pets.genders_id = genders.id
            ");
            $stmt->execute();
            $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($usuario as $us):
        ?>
           <tr>
               <td>
                    <figure class="photo">
                        <img src="<?= $us['pet_photo'] ?>" alt="Foto de mascota" style="width: 79px; height:79px; border-radius:100%;">
                    </figure>
                    <div class="info">
                        <h3><?= $us['pet_name']?></h3>
                        
                        <h4><?= $us['race_name']?></h4>
                    </div>
                    <div class="controls">
                        <a href="show.php?<?= $us['id'] ?>" class="show"></a>
                        <a href="edit.php?<?= $us['id'] ?>" class="edit"></a>
                        <a href="#" class="delete"></a>
                    </div>
               </td>
           </tr>
           <?php endforeach; ?>
       </table>
    </main>
</body>
</html>