<?php

declare(strict_types=1);
include_once("database.php");

/* Modifica el archivo 001campeones.php y guárdalo como 003campeones.php para que se 
muestre como una tabla con las columnas de la propia tabla de la base de datos, es decir; id, 
nombre, rol, dificultad, descripción.
Al lado de cada nombre de cada columna, pon 2 iconos que sean ˄˅y que cada uno de ellos 
ordene el listado en función de cuál se haya pinchado. 
Si se ha pulsado en Nombre el icono de ˄, el listado debe aparecer ordenado por nombre 
ascendente. Si por el contrario se ha pulsado ˅tendrá que ordenarse por nombre 
descendente.
Ten en cuenta que cada icono debe llevar consigo un enlace al listado que contenga 
parámetros en la URL que satisfagan las opciones seleccionadas así que haced uso de $_GET 
para poder capturarlos y escribid las consultas SQL que sean necesarias para hacer cada uno 
de los filtros.*/

//Si el usuario ha especificado el orden de la tabla, lo insertamos. Sino, por orden del id
if (isset($_GET["order"]) && isset($_GET["col"])) {
    $consulta = "SELECT * FROM champ ORDER BY $_GET[col] $_GET[order]";
    if ($_GET["col"] == "rol") {
        $consulta = "SELECT * FROM champ ORDER BY CONCAT($_GET[col]) $_GET[order]";
    }
} else {
    $consulta = "SELECT * FROM champ";
}
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script defer src="js/bootstrap.bundle.js"></script>
    <title>003 Campeones</title>
</head>

<body>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th class="col-1">id<a href="003campeones.php?col=id&&order=DESC"><i class="mx-1 bi-caret-down-square-fill text-primary"></i></a>
                            <a href="003campeones.php?col=id&&order=ASC"><i class="bi-caret-up-square-fill"></i></a>
                        </th>
                        <th class="col-1">Nombre<a href="003campeones.php?col=name&&order=DESC"><i class="mx-1 bi-caret-down-square-fill text-primary"></i></a>
                            <a href="003campeones.php?col=name&&order=ASC"><i class="bi-caret-up-square-fill"></i></a>
                        </th>
                        <th class="col-1">Rol<a href="003campeones.php?col=rol&&order=DESC"><i class="mx-1 bi-caret-down-square-fill text-primary"></i></a>
                            <a href="003campeones.php?col=rol&&order=ASC"><i class="bi-caret-up-square-fill"></i></a>
                        </th>
                        <th class="col-1">Dificultad<a href="003campeones.php?col=difficulty&&order=DESC"><i class="mx-1 bi-caret-down-square-fill text-primary"></i></a>
                            <a href="003campeones.php?col=difficulty&&order=ASC"><i class="bi-caret-up-square-fill"></i></a>
                        </th>
                        <th class="col-3">Descripción<a href="003campeones.php?col=description&&order=DESC"><i class="mx-1 bi-caret-down-square-fill text-primary"></i></a>
                            <a href="003campeones.php?col=description&&order=ASC"><i class="bi-caret-up-square-fill"></i></a>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
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