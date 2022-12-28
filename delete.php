<?php

declare(strict_types=1);
include_once("database.php");

$id = $_GET["id"];

$delete = "DELETE FROM champ WHERE id = $id";

if (mysqli_query($conexion, $delete)) {
    header("Location:/UD5_PHP_Conexion/002campeones.php");
} else {
    echo "Ha habido un error al borrar el item";
    exit(); 
}
