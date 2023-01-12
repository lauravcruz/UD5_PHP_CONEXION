<?php

$dani = ["dani", "danieh", "2023fuckhosteleria", "dani@gallito.com"];
$peter = ["peter", "peterPython", "olgadimealgodealemania", "peter@python.com"];
$luis = ["luis", "luisito", "noengañoabuelitas", "lui@lui.com"];

insertUsers($dani);
insertUsers($peter);
insertUsers($luis);
function insertUsers($usuario)
{
    include("conexionPDO.php");

    $sql = "INSERT INTO user(`name`, username, `password`, email) VALUES (:name, :username, :password, :email)";
    $insert = $conexionPDO->prepare($sql);

    $insert->execute([
        "name" => $usuario[0],
        "username" => $usuario[1],
        "password" => password_hash($usuario[2], PASSWORD_DEFAULT),
        "email" => $usuario[3]
    ]);
}
