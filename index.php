<?php
if (isset($_POST["logout"])) {
    session_destroy();
}
$titulo = "Motivaciones.es";
include_once "header.php";
?>

<?php include "post.php"; ?>



<?php include_once "footer.php"; ?>