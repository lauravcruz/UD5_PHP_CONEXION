<?php
declare(strict_types=1);
include_once("conexionPDO.php");

//Ejecutar al iniciar el programa para tener los usuarios insertados

$dani = ["dani", "danieh", "2023fuckhosteleria", "dani@gallito.com"];
$peter = ["peter", "peterPython", "olgadimealgodealemania", "peter@python.com"];
$luis = ["luis", "luisito", "noengañoabuelitas", "lui@lui.com"];

insertUsers($dani, $conexionPDO);
insertUsers($peter, $conexionPDO);
insertUsers($luis,  $conexionPDO);
function insertUsers($usuario, $conexionPDO)
{
    try {
        $sql = "INSERT INTO user(`name`, username, `password`, email) VALUES (:name, :username, :password, :email)";
        $insert = $conexionPDO->prepare($sql);

        if (
            $insert->execute([
                "name" => $usuario[0],
                "username" => $usuario[1],
                "password" => password_hash($usuario[2], PASSWORD_DEFAULT), //Ciframos la contraseña 
                "email" => $usuario[3]
            ])
        ) {
            echo "<h1>Usuario insertado</h1>";
            header("refresh:2;url=004login.php");
        };
    } catch (PDOException $e) {
        echo 'Falló la conexión: ' . $e->getMessage();
    }
}
