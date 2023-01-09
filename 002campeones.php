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
    <script defer src="js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <title>002 Campeones</title>
</head>

<body>
    <div class="d-flex flex-row flex-wrap container gap-5 py-5">
        <?php
        $consulta = "SELECT * FROM `champ`";

        $champs = mysqli_query($conexion, $consulta);
        if ($champs) {
            foreach ($champs as $champ) {
                echo "<div class='card bg-secondary text-white'>
                <h5 class='card-title text-center text-primary my-2'>$champ[name]</h5>
                <h6 class='card-subtitle text-center'>$champ[rol] $champ[difficulty]</h6>
                <p class='card-text p-3'>$champ[description]</p>

                <a class = 'btn btn-info' href='003editando.php?id=$champ[id]'>Editar</a>
                <a
                type='button' class = 'btn bg-danger'
                class='text-decoration-none'
                data-bs-toggle='modal' data-bs-target='#modalDelete'
              >
                Eliminar
              </a>

              <div class='modal fade' id='modalDelete' tabindex='-1' role='dialog' aria-labelledby='modalDelete' aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                <div class='modal-content'>

                <div class='modal-body text-center'>
                    ¿Está seguro de que desea borrar a $champ[name]>
                </div>
                <div class='modal-footer'>
                    <button type='button'  class='btn' data-bs-dismiss='modal'>Cancelar</button>
                    <a class='btn' href = 'delete.php?id=$champ[id]'>Aceptar</a>
                </div>
                </div>
                </div>
            </div>
        </div>";
            }
        }
        ?>
    </div>
</body>

</html>