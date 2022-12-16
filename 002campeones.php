<?php

declare(strict_types=1);
include_once("database.php");

/* Modifica el archivo 001campeones.php y guárdalo como 002campeones.php pero pon al lado 
de cada uno de los campeones listados un botón para editar y otro para borrar. Cada uno de 
esos botones hará la correspondiente función dependiendo del id del campeón seleccionado.*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script defer src="js/bootstrap.bundle.js"></script>
    <title>002 Campeones</title>
</head>

<body>
    <ul>
        <?php

        $consulta = "SELECT * FROM `champ`";

        $champs = mysqli_query($conexion, $consulta);
        if ($champs) {
            foreach ($champs as $champ) {
                echo "<li>$champ[name]<ul>
                <li>Rol: $champ[rol]</li>
                <li>Dificultad: $champ[difficulty]</li>
                <li>Descripción: $champ[description]</li></ul>";

                //Pasamos por GET el id: 
                echo "<a class = 'btn btn-info' href='003editando.php?id=$champ[id]'>Editar</a>";
                echo "<a
                type='button'
                class='nav-link text-decoration-none'
                data-bs-toggle='modal'
                data-bs-target='#modalDelete'
                data-bs-whatever='@mdo'
              >
                Eliminar
              </a>";
            }
        }
        ?>
    </ul>

</body>

</html>