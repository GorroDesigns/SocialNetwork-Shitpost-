<?php
include_once("header.php");

if (isset($_POST["logout"])) {
    session_destroy();
}
$titulo = "SHITPOST";

include_once "conexionDB.php";
?>

<section class="hero">
    <div class="container">
        <div class="row">
            <?php
            // $limit = 5;
            // $start = (int)(($page - 1 ) * $limit);
            // $page = mysql_real_escape_string($_GET["page"]);
            // $query = "SELECT * FROM post LIMIT $start, {(int)$page + $limit}"
            $consulta1 = "SELECT * FROM login_register,post WHERE login_register.username = '{$_SESSION["username"]}' AND login_register.id_login = post.id_user ORDER BY post.id_post DESC";
            $resultado = $mysqli->query($consulta1);
            $consulta2 = "SELECT * FROM login_register,post WHERE login_register.username = '{$_SESSION["username"]}'";
            $resultado2 = $mysqli->query($consulta2);
            if ($fila2 = $resultado2->fetch_assoc()) {
                echo ' <h1 class="text-wrap text-capitalize"> MIS POSTS: ' . $fila2["username"] . ' </h1>';
            }
            echo '<div class=" bg-white col-5"><div class="cardbox shadow-lg bg-white">';

            while ($fila = $resultado->fetch_assoc()) {
                echo '<div class="cardbox">
                    <div class="cardbox-heading">
            <div class="media m-0">
                 <div class="media-body">        
                             <small><span><i class="icon ion-md-time"></i> ' . $fila["date"] . '</span></small>
                 </div>
                </div>
             </div>
             </div>
             
            <div class="cardbox-item">
        <img class="img-fluid" src="imgPost/' . $fila["file"] . '" alt="Image">
                </div>
               
 <div class="messagePost">
    <ul> 
    <li><a><span>' . $fila["message"] . '</span></a> </li>
    </ul>
    </div>

    ';
            } ?>
        </div>
    </div>

    <div class="totalLikes offset-3 col-3">

        <ul>
            <li><a><span>TOTAL LIKES: <? $fila["likes"] ?></span></a></li>
            <li><a><span>TOTAL DISLIKES:<? $fila["dislikes"] ?></span></a></li>
        </ul>


    </div>
    </div>

</section>