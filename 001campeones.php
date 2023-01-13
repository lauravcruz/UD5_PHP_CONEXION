<?php

declare(strict_types=1);
include_once("database.php");

/* Crea el archivo 001campeones.php donde listes todos los campeones del LOL que has metido 
en tu base de datos. Acuérdate que para ello deberás hacer una conexión con la base de datos 
y un foreach para cada campeón que tengas albergado en la tabla champ.*/

$consulta = "SELECT * FROM champ";

$champs = mysqli_query($conexion, $consulta);

if ($champs) {
    //Por cada champ imprimimos una lista con sus datos
    echo "<ul>";
    foreach ($champs as $champ) {
        echo "<li>$champ[id] $champ[name]<ul>
        <li>Rol: $champ[rol]</li>
        <li>Dificultad: $champ[difficulty]</li>
        <li>Descripción: $champ[description]</li></ul><br>";
    }
    echo "</ul>";
}
