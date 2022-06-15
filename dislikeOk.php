<?php
session_start();
include_once "conexionDB.php";

$consulta = "SELECT * FROM (POST, LOGIN_REGISTER), (SELECT COUNT(id_dislikes) AS dislikes FROM postdislikes WHERE id_user = id_post) as dislikes WHERE post.id_user = login_register.id_login";
$resultado = $mysqli->query($consulta);
$fila = $resultado->fetch_assoc();
$idUser = $fila["id_login"];
$idPost = $fila["id_post"];
if (isset($_POST["dislike"])) {
    $insert = "INSERT INTO  postdislikes (id_user, id_post) VALUES ('$idUser', '$idPost' )";
    if (mysqli_query($mysqli, $insert)) {
        header("Location: index.php?page=1");
    }
}
