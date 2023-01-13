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

    //Si el usuario existe en la BBDD: 
    if ($usuario) {
      //verificamos la contraseña. Verify vuelve a cifrar para comparar 
      if (password_verify($pass, $usuario['password'])) {
        echo "<h2 class = 'text-center align-center text-primary pt-5'>Bienvenid@ $usuario[name]</h2>";
        header("refresh:4;url=002campeones.php");
      } else {
        echo "<h2 class = 'text-danger text-center pt-5'>Contraseña incorrecta</h2>";
      };
    } else {
      echo "<h2 class = 'text-danger text-center pt-5'>El usuario $user no existe</h2>";
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
  <title>004 Login</title>
</head>

<body class="bg-secondary">
  <div class="bg-secondary">
    <div class="text-center py-5"><img src="img/logo.PNG" alt="logo"></div>
    <div class="container gap-5 w-50 pb-5">
      <form class="px-5 py-3 text-center position-relative" method="POST">
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
          <button class="btn bg-primary" type="submit">Iniciar Sesión</button>
        </div>
      </form>

      <div class="text-end">
        <a class="text-primary" href="005register.php">O regístrate aquí</a>
      </div>
    </div>
  </div>
</body>

</html>