<?php
$conexion = mysqli_connect("localhost", "root", "", "lol");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MYSQL: " . mysqli_connect_error();
    exit();
}

/* Crea el archivo 001campeones.php donde listes todos los campeones del LOL que has metido 
en tu base de datos. Acuérdate que para ello deberás hacer una conexión con la base de datos 
y un foreach para cada campeón que tengas albergado en la tabla champ.*/

$consulta = "SELECT * FROM `champ`";

$champs = mysqli_query($conexion, $consulta);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <?php
        if ($champs) {
            foreach ($champs as $champ) {
                echo "<li>$champ[name]<ul>
                <li>Rol: $champ[rol]</li>
                <li>Dificultad: $champ[difficulty]</li>
                <li>Descripción: $champ[description]</li></ul>";

                echo "<a href='003editando.php/?id=$champ[id]'>Editar</a>";
                echo "<button>Eliminar</button>";
            }
        }
        ?>
    </ul>
</body>

</html>