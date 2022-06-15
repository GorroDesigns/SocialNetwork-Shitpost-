<?php
session_start();
include_once "conexionDB.php";
if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["photo"])) {
    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["photo"])) {
        $usuario = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $avatar = $_POST["photo"];
        $insert = "INSERT INTO login_register (avatar, username, password, email) VALUES ('$avatar','$usuario', '$password', '$email')";
        if (mysqli_query($mysqli, $insert)) {
            move_uploaded_file($_FILES["photo"]["tmp_name"], "imgPost/$avatar");
            $_SESSION["username"] = $usuario;
            $_SESSION["password"] = $contrasena;
            header("Location: index.php?page=1");
        }
    }
} else {
    echo "<script>";
    echo "console.log('No inicia')";
    echo "</script>";
    header('Location: register.php');
}
