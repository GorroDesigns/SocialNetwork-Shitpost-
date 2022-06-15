<?php
session_start();
include_once "conexionDB.php";

$consulta = "SELECT * FROM (POST, LOGIN_REGISTER), (SELECT COUNT(id_likes) AS likes FROM postlikes WHERE id_user = id_post) as likes WHERE post.id_user = login_register.id_login";
$resultado = $mysqli->query($consulta);
$fila = $resultado->fetch_assoc();
$idUser = $fila["id_login"];
$idPost = $fila["id_post"];
if (isset($_POST["like"])) {
    $insert = "INSERT INTO  postlikes (id_user, id_post) VALUES ('$idUser', '$idPost' )";
    if (mysqli_query($mysqli, $insert)) {
        header("Location: index.php?page=1");
    }
}
