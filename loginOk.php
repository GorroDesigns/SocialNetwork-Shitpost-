  <?php
    include_once "conexionDB.php";
    session_start();
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $usuario = $_POST["username"];
        $contrasena = $_POST["password"];
        $consulta = "SELECT * FROM login_register WHERE username = '$usuario' AND password = '$contrasena'";
        $resultado = $mysqli->query($consulta);

        if (mysqli_num_rows($resultado) > 0) {
            $_SESSION["username"] = $usuario;
            $_SESSION["password"] = $contrasena;
            //ROL
            $consulta = "SELECT * FROM login_register WHERE username = '$username' ";
            $resultado = $mysqli->query($consulta);
            $fila = mysqli_fetch_array($resultado);

            $rol = $fila["rol"];
            $_SESSION["rol"] = $rol;

            if ($rol == "1") {
                header("Location: admin.php");
            } else {
                header("Location: index.php?page=1");
            }
        } else {
            header('Location: errorUsuario.php');
            session_destroy();
        }

        //LOG
        date_default_timezone_set('Europe/Madrid');
        $fecha = date('H:i:s');

        $consulta2 = "INSERT INTO log_info (date, username) VALUES ('$fecha', '$username')";
        $resultado2 = $mysqli->query($consulta);

        mysqli_free_result($resultado2);
        mysqli_close($mysqli);
    }

    ?>

<?php include_once("header.php"); ?>
  <?php include_once("footer.php") ?>



