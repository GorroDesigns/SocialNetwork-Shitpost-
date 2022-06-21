<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "bd_shitpost");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
if (isset($_POST["upload"])) {
    if (empty(trim($_POST["message"]))) {
        echo '';
    }

    if (!empty($_FILES['upload_file']["name"])) {
        if (isset($_SESSION["username"])) {

            $fileName = $_FILES["upload_file"]["name"];
            $message = $_POST["message"];
            if (!empty($_POST['tag'])) {
                $tag = $_POST["tag"];
                date_default_timezone_set('Europe/Madrid');
                $fecha = date('H:i:s');
                $consulta = "SELECT * FROM login_register WHERE username = '" . $_SESSION["username"] . "'";
                $resultado = $mysqli->query($consulta);
                while ($fila = $resultado->fetch_assoc()) {
                    $user = $fila["id_login"];
                    $insert = "INSERT INTO post (id_user, file, message, tags, date) VALUES ('$user', '$fileName','$message', '$tag', '$fecha')";
                    if (mysqli_query($mysqli, $insert)) {
                        move_uploaded_file($_FILES["upload_file"]["tmp_name"], "imgPost/$fileName");
                        header("Location: index.php?page=1");
                    }
                }
            } else {
                $consulta = "SELECT * FROM login_register WHERE username = '" . $_SESSION["username"] . "'";
                $resultado = $mysqli->query($consulta);
                while ($fila = $resultado->fetch_assoc()) {
                    $user = $fila["id_login"];
                    $insert = "INSERT INTO post (id_user, file, message, tags) VALUES ('$user', '$fileName','$message', null)";
                    if (mysqli_query($mysqli, $insert)) {
                        move_uploaded_file($_FILES["upload_file"]["tmp_name"], "imgPost/$fileName");
                        header("Location: index.php?page=1");
                    }
                }
            }
        } else {
            header("Location: index.php?page=1");
        }
    } else {
        header("Location: index.php?page=1");
    }
}
