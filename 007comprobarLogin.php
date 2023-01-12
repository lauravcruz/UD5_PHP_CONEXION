<?php

declare(strict_types=1);

include("conexionPDO.php");
//Comprobamos que no estén los campos vacíos: 
try {
    if (isset($_POST["username"])) {
        $user = $_POST["username"];
        $pass = $_POST["password"];
        $sql = "SELECT * FROM user WHERE username = ?";
        $select = $conexionPDO->prepare($sql);
        $select->bindParam(1, $user);
        $select->execute();

        $usuario = $select->fetch();

        if ($usuario) {
            if (password_verify($pass, $usuario['password'])) {
                echo "<h2 class = 'text-center align-center'>Bienvenid@ $usuario[name]</h2>";
            } else {
                echo "<h2>Contraseña incorrecta</h2>";
            };
        } else {
            echo "<h2 class = 'text-center align-center'></h2>El usuario $user no existe</h2>";
        }
    }
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