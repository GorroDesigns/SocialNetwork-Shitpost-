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

        <?php
        $consulta1 = "SELECT * FROM login_register,post WHERE login_register.username = '{$_SESSION["username"]}' AND login_register.id_login = post.id_user ORDER BY post.id_post DESC";
        $resultado = $mysqli->query($consulta1);
        $consulta2 = "SELECT * FROM login_register,post WHERE login_register.username = '{$_SESSION["username"]}'";
        $resultado2 = $mysqli->query($consulta2);
        if ($fila2 = $resultado2->fetch_assoc()) {
            echo ' <h1 class="text-wrap text-capitalize accountTitle"> MIS POSTS (' . $fila2["username"] . ') </h1></br>';
        }
        echo '<div class="row">';
        while ($fila = $resultado->fetch_assoc()) {
            $noseve = '';
            if (empty(trim($fila["message"]))) $noseve = 'style="display:none";';
            echo '<div class="col-4"> <div class="cardbox">
                <div class="cardbox-heading">
                 <div class="media m-0">
                <div class="media-body">
       
            <small><span><i class="icon ion-md-time"></i> ' . $fila["date"] . '</span></small>
                 </div>
               </div>
             </div>
        <div class="cardbox-item">
             <img class="img-fluid" src="imgPost/' . $fila["file"] . '" alt="Image">
         </div>
        <div class="cardbox-base like">
        <form method="post" action="likeOk.php" class="like">
    <ul>
        
        <li><a><span></span></a></li>
       
    </ul>
    </form>
    <form method="post" action="dislikeOk.php" class="like";>
    <ul>
  
        <li><a><span></span></a></li>
    </ul>
    </form>
            </div>
<div class="messagePost bg-white"' . $noseve . ' >
<ul> 
<li><a><span>' . $fila["message"] . '</span></a> </li>
</ul>
</div>
</div>
</div>
    ';
        } ?>

    </div>
    <!-- 
    <div class="totalLikes offset-3 col-3">

        <ul>
            <li><a><span>TOTAL LIKES: <? $fila["likes"] ?></span></a></li>
            <li><a><span>TOTAL DISLIKES:<? $fila["dislikes"] ?></span></a></li>
        </ul>


    </div> -->
    </div>

</section>

<?php include_once "footer.php" ?>