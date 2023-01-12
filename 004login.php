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

<body>
  <div class="container gap-5 p-5">
    <h2 class="text-secondary text-center">Iniciar Sesión</h2>
    <form class="p-5 text-center" method="POST" action="007comprobarLogin.php" name = "login">
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
        <button class="btn bg-primary" type="submit">Submit form</button>
      </div>
    </form>
    <div class="text-end">
      <a class="text-decoration-none text-secondary" href="005register.php">O regístrate aquí</a>
    </div>
  </div>
</body>

</html>