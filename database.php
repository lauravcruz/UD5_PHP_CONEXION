<?php

declare(strict_types=1);
//Creamos la conexión aparte y la insertamos cada vez que la necesitemos para no repetir código
$conexion = mysqli_connect("localhost", "root", "", "lol");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MYSQL: " . mysqli_connect_error();
    exit();
}
