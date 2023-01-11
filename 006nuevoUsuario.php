<?php

declare(strict_types=1);

//Creamos la conexión PDO con los datos de mysql y la BBDD
$conexionPDO = new PDO('mysql:host=localhost; dbname=lol', 'root', '');

try {
    $conexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Comprobamos que no estén los campos vacíos: 
    if (isset($_POST["name"]) != "" && isset($_POST["username"]) != "" && isset($_POST["email"]) != "" && isset($_POST["password"]) != "") {
        $name = $_POST["name"];
        $user = $_POST["username"];
        $pass = $_POST["password"];
        $email = $_POST["email"];

        $sql = "INSERT INTO user(`name`, username, `password`, email) VALUES (:name, :username, :password, :email)";
        $insert = $conexionPDO->prepare($sql);
        //Insertamos los datos en la BBDD
        if ($insert->execute([
            "name" => $name,
            "username" => $user,
            "email" => $email,
            "password" => password_hash($pass, PASSWORD_DEFAULT)
        ])) {
            echo "<h2 class = 'text-center align-center'>El usuario $user ha sido registrado en el sistema con la contraseña $pass</h2>";
        };
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
    <title>006 Nuevo Usuario</title>
</head>

<body></body>

</html>