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
  <title>005 Register</title>
</head>

<body class="bg-secondary">
  <div class="bg-secondary">
    <div class="text-center p-3"><img src="img/logo.PNG" alt="logo"></div>
    <div class="container gap-5 w-50 pb-5">
      <form class="px-5 py-3 text-center position-relative" method="POST" action="006nuevoUsuario.php">
        <div>
          <label for="name" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div>
          <label for="username" class="form-label">Username</label>
          <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="inputGroupPrepend" required>
          </div>
        </div>

        <div>
          <label for="password" class="form-label">Password</label>
          <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend"><i class="bi-eye" id="eyePassword" onclick="seePassword()"></i></span>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
        </div>

        <div>
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div>
          <button class="btn bg-primary" type="submit">Registrar</button>
        </div>
      </form>
      <div class="text-end">
        <a class="text-primary" href="004login.php">O inicia sesión aquí</a>
      </div>

    </div>
  </div>
</body>

</html>