<?php


$conexion = mysqli_connect("localhost", "root", "", "lol"); 

if(mysqli_connect_errno()){
    echo "Failed to connect to MYSQL: " . mysqli_connect_error();
    exit(); 
}

/* Crea el archivo 001campeones.php donde listes todos los campeones del LOL que has metido 
en tu base de datos. Acuérdate que para ello deberás hacer una conexión con la base de datos 
y un foreach para cada campeón que tengas albergado en la tabla champ.*/

$consulta = "SELECT * FROM champ";

$champs = mysqli_query($conexion, $consulta); 

if($champs){
    echo "<ul>";
    foreach($champs as $champ){
        echo "<li>$champ[id] $champ[name]<ul>
        <li>Rol: $champ[rol]</li>
        <li>Dificultad: $champ[difficulty]</li>
        <li>Descripción: $champ[description]</li></ul><br>";
    }
    echo "</ul>"; 
}
