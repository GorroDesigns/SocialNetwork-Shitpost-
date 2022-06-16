<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "bd_shitpost");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
if (isset($_POST["upload"])) {
    // Validate if not empty
    if (!empty($_FILES['upload_file']["name"])) {
        if (isset($_SESSION["username"])) {
            date_default_timezone_set('Europe/Madrid');
            $fecha = date('Y-m-d H:i');
            $fileName = $_FILES["upload_file"]["name"];
            $message = $_POST["message"];
            $consulta = "SELECT * FROM login_register WHERE username = '" . $_SESSION["username"] . "'";
            $resultado = $mysqli->query($consulta);
            while ($fila = $resultado->fetch_assoc()) {
                $user = $fila["id_login"];
                $insert = "INSERT INTO post (id_user, file, message, date) VALUES ('$user', '$fileName','$message', '$fecha')";
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
