<?php
declare(strict_types=1);
include_once("database.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script defer src="js/bootstrap.bundle.js"></script>
    <title>003 Editando</title>
</head>

<body>
    <?php
    /*Al pinchar en editar, el usuario será redirigido al archivo 003editando.php donde mostrará un 
    formulario con los campos rellenos por los datos del campeón seleccionado. Al darle al botón 
    de guardar los datos se guardarán en la base de datos y el usuario será redirigido a la lista de 
    champs para poder ver los cambios.*/

    $id = $_GET["id"] ?? $_POST["id"];

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

    //Si se ha enviado el formulario: 
    if (isset($_POST["submit"])) {

        //Comprobamos que todos los campos estén rellenos: 
        if (isset($_POST["id"]) && $_POST["name"] && $_POST["rol"] && $_POST["difficulty"] && $_POST["description"]) {
            //Hacemos el update:
            $update = "UPDATE champ SET name = '$_POST[name]', rol = '$_POST[rol]', difficulty = '$_POST[difficulty]', `description` = '$_POST[description]'
            WHERE id = $_POST[id]";

            if (mysqli_query($conexion, $update)) {
                echo "Insertado correctamente";
                //Volvemos a la página anterior: 
                header("Location:/UD5_PHP_Conexion/002campeones.php");
            } else {
                echo "Error en la inserción";
            }
        } else {
            echo "Hay campos vacíos";
        }
    }
    ?>

    <form name="edit" id="edit" method="POST">

        <!--El valor de cada input es el que está en la base de datos-->
        <input type="text" name="id" id="id" value="<?= $id ?>" hidden>
        <label for="name">Nombre: </label>
        <input type="text" name="name" id="name" value="<?= $champ["name"]; ?>"><br>
        <label for="rol">Rol: </label>
        <!--Para los select, marcamos como selected la opción registrada-->
        <select name="rol" id="rol">
            <option <?php if ($champ["rol"] == "Asesino")
                        echo "selected"; ?>>Asesino</option>
            <option>Luchador</option>
            <option <?php if ($champ["rol"] == "Mago")
                        echo "selected"; ?>>Mago</option>
            <option <?php if ($champ["rol"] == "Tirador")
                        echo "selected"; ?>>Tirador</option>
            <option <?php if ($champ["rol"] == "Apoyo")
                        echo "selected"; ?>>Apoyo</option>
            <option <?php if ($champ["rol"] == "Tanque")
                        echo "selected";
                    ?>>Tanque</option>
        </select>

        <label for="difficulty">Dificultad: </label>
        <select id="difficulty" name="difficulty">
            <option <?php if ($champ["difficulty"] == "Baja")
                        echo "selected = 'selected'";; ?>>Baja</option>
            <option <?php if ($champ["difficulty"] == "Moderada")
                        echo "selected = 'selected'";; ?>>Moderada</option>
            <option <?php if ($champ["difficulty"] == "Alta")
                        echo "selected = 'selected'";; ?>>Alta</option>
        </select><br>
        <label for="description">Descripción: </label>
        <input type="text" name="description" id="description" value="<?= $champ["description"]; ?>"><br>
        <button type="submit" name="submit">Enviar</button>
    </form>    
</body>

</html>