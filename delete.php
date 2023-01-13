<?php

declare(strict_types=1);
include_once("database.php");

$id = $_GET["id"];

//Eliminamos el champ seleccionado y redireccionamos a la página anterior
$delete = "DELETE FROM champ WHERE id = $id";

if (mysqli_query($conexion, $delete)) {
    header("refresh:0;url=002campeones.php");
} else {
    echo "Ha habido un error al borrar el item";
    exit();
}
