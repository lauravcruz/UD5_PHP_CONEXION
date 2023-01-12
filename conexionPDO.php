<?php

declare(strict_types=1);

$conexionPDO = new PDO('mysql:host=localhost; dbname=lol', 'root', '');

try {
    $conexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}
