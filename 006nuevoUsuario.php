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