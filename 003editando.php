<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>003 Editando</title>
</head>

<body>
    <?php
    /*Al pinchar en editar, el usuario será redirigido al archivo 003editando.php donde mostrará un 
formulario con los campos rellenos por los datos del campeón seleccionado. Al darle al botón 
de guardar los datos se guardarán en la base de datos y el usuario será redirigido a la lista de 
champs para poder ver los cambios.*/
    $conexion = mysqli_connect("localhost", "root", "", "lol");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MYSQL: " . mysqli_connect_error();
        exit();
    }

    $id = $_GET["id"];

    if (isset($id)) {
        $consulta = "SELECT * FROM `champ` WHERE id = $id";

        $champs = mysqli_query($conexion, $consulta);
        if ($champs) {
            foreach ($champs as $champ) {
            }
        }
    } else {
        echo "No se ha especificado el item";
        exit();
    }

    if (isset($_POST["submit"])) {
        $insert = "UPDATE champ SET `name` = $_POST[name] WHERE id = $id";
    }

    ?>

    <form action="002campeones.php" method="POST">
        <input type="text" name="id" id="id" value="<?= $id ?>" hidden>
        <label for="name">Nombre: </label>
        <input type="text" name="name" id="name" value="<?= $champ["name"]; ?>"><br>
        <label for="rol">Rol: </label>
        <input type="text" name="rol" id="rol" value="<?= $champ["rol"]; ?>"><br>
        <label for="rol">Dificultad: </label>
        <input type="text" name="difficulty" id="difficulty" value="<?= $champ["difficulty"]; ?>"><br>
        <label for="rol">Descripción: </label>
        <input type="text" name="description" id="description" value="<?= $champ["description"]; ?>"><br>
        <button type="submit">Enviar</button>
    </form>


</body>

</html>