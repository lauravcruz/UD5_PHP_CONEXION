<?php
declare(strict_types=1);
include_once("database.php");

/* Modifica el archivo 001campeones.php y guárdalo como 003campeones.php para que se 
muestre como una tabla con las columnas de la propia tabla de la base de datos, es decir; id, 
nombre, rol, dificultad, descripción.*/

$consulta = "SELECT * FROM champ";

$champs = mysqli_query($conexion, $consulta); 

if($champs){
    foreach($champs as $champ){
        echo "<li>$champ[id] $champ[name]<ul>
        <li>Rol: $champ[rol]</li>
        <li>Dificultad: $champ[difficulty]</li>
        <li>Descripción: $champ[description]</li></ul><br>";
    }
    echo "</ul>"; 
}
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
    <table>
        <thead>
            <tr></tr>
        </thead>
    </table>


</body>
