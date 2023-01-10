<?php

declare(strict_types=1);
include_once("database.php");

/* Modifica el archivo 001campeones.php y guárdalo como 003campeones.php para que se 
muestre como una tabla con las columnas de la propia tabla de la base de datos, es decir; id, 
nombre, rol, dificultad, descripción.*/

$consulta = "SELECT * FROM champ";
$champs = mysqli_query($conexion, $consulta);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <script defer src="js/bootstrap.bundle.js"></script>
    <title>003 Campeones</title>
</head>

<body>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>Dificultad</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($champs) {
                        foreach ($champs as $champ) {
                            echo "<tr>
                    <td>$champ[id]</td> 
                    <td>$champ[name]</td>
                    <td>$champ[rol]</td>
                    <td>$champ[difficulty]</td>
                    <td>$champ[description]</td>
                    </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>