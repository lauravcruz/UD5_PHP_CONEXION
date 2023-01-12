<?php

declare(strict_types=1);

$conexionPDO = new PDO('mysql:host=localhost; dbname=lol', 'root', '');

try {
    $conexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Comprobamos que no estén los campos vacíos: 

    $usu = $_POST["login"] ?? "";

    $sql = "SELECT * FROM user WHERE username = ?";
    $select = $conexionPDO->prepare($sql);
    $select->execute([$usu]);

    $usuario = $select->fetch();

    if ($usuario && password_verify($_POST["password"], $usuario['password'])) {
        echo "<h2 class = 'text-center align-center'>Bienvenid@ $usuario[name]</h2>";
    } else {
        echo "<h2>Contraseña incorrecta</h2>";
    };
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script defer src="js/bootstrap.bundle.js"></script>
    <script defer src="js/custom.js"></script>
    <title>007 Nuevo usuario</title>
</head>

<body></body>

</html>