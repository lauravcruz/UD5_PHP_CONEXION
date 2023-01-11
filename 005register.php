<?php

declare(strict_types=1);
/* Aprovecha lo que hiciste de los ejercicios con MySQLi, pero utilizando PDO.
Crea una tabla nueva dentro de la base de datos lol que ya tienes y crea un sistema de login con 
usuarios. Introduce en la base de datos al menos 3 usuarios diferentes con sus contraseñas 
distintas. Recuerda que:
La tabla nueva ha de llamarse user. Los campos a crear en la nueva tabla deben ser:
• id
• name
• username
• password
• email
Las contraseñas deben ser cifradas antes de guardar el datos en la base de datos.
Crea el formulario 005registro.php donde el usuario introduzca los datos de registro y vincúlalo 
con 006nuevoUsuario.php para que recoja los datos mediante POST y los inserte en la base de 
datos si todo ha ido bien.*/
$conexionPDO = new PDO('mysql:host=localhost; dbname=lol', 'root', '');

try {
    $conexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
    <script defer src="js/bootstrap.bundle.js"></script>
    <title>003 Editando</title>
</head>

<body>
    <form class="needs-validation p-5" novalidate>
      <div>
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" value="Mark" required>
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
      
      <div>
        <label for="username" class="form-label">Username</label>
        <div class="input-group">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
          <input type="text" class="form-control" id="username" aria-describedby="inputGroupPrepend" required>
          <div class="invalid-feedback">
            Please choose a username.
          </div>
        </div>
      </div>
      
      <div>
        <label for="password" class="form-label">Password</label>
        <input type="text" class="form-control" id="password" required>
        <div class="invalid-feedback">
          Please provide a valid zip.
        </div>
      </div>

      <div>
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" required>
        <div class="invalid-feedback">
          Please provide a valid zip.
        </div>
      </div>
    
      <div>
        <button class="btn bg-primary" type="submit">Submit form</button>
      </div>
    </form>


</body>

</html>