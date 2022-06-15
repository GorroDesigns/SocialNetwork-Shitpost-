<?php
session_start();
if (isset($_POST["logout"])) {
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShitPost Web</title>

    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>

<body id="body">
    <div class="navbar">
        <div class="avatarIcon ">
            <?php
            $mysqli = new mysqli("localhost", "root", "", "bd_shitpost");
            if ($mysqli->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            if (isset($_SESSION["username"])) {
                $consulta = "SELECT * FROM login_register WHERE username = '" . $_SESSION["username"] . "'";
                $resultado = $mysqli->query($consulta);
                while ($fila = $resultado->fetch_assoc()) {
                    echo '
         <a href="account.php"><img class="img-fluid rounded-circle" src="imgPost/' . $fila["avatar"] . '" alt="User"></a> ';
                }
            } else {
                session_destroy();
            }
            ?>


        </div>
        <div class="register2">
            <div class="register1 ">
                <?php if (isset($_SESSION["username"])) {
                    echo "<b> <a href='account.php'> <span class='text-uppercase botonUsuario'> " .  $_SESSION["username"] . "</span></a></b>";
                } ?>
            </div>


            <a href="login.php" class="log">
                <?php if (!isset($_SESSION["username"])) {
                    echo '<button class="btnindex " data-bs-toggle="modal" data-bs-target="#myModal" id="login" name="login">Login</button>';
                }
                if (isset($_SESSION["username"])) {

                    echo '<form method="post" action="logout.php">
                 <input type="hidden" name="logout" value="1" />
                 <input class="logout" type="submit" class="btnindex" value="Logout"/> </form>';
                } ?>
            </a>
        </div>

    </div>

    <header>
        <div class="icon__menu">
            <i class="fa fa-bars" id="btn_open"></i>
        </div>
        <a href="#">
            <div class="account">Login</div>
        </a>
    </header>

    <div class="menu__side" id="menu_side">
        <a href="index.php?page=1">
            <div class="name__page nuevoBoton">
                <i class="fa-solid fa-poop"></i>
                <h4>shitpost.es</h4>
            </div>
        </a>

        <div class="options__menu">
            <?php if (!isset($_SESSION["username"])) {
                echo '';
            }
            if (isset($_SESSION["username"])) {
                echo '<button type="button" class="nuevoBoton" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <div class="option">
                <i class="fa-solid fa-circle-plus"></i>
                <h5>Nuevo post</h5>
            </div>
              </button>';
            } ?>


            <a href="index.php?page=1" class="selected">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h5>Inicio</h5>
                </div>
            </a>



            <?php if (!isset($_SESSION["username"])) {
                echo '';
            }
            if (isset($_SESSION["username"])) {
                echo '
              
            <a href="account.php" class="selected">
            <div class="option">
                    <i class="far fa-address-card" title="Account"></i>
                    <h5>Cuenta</h5>
                </div>
            </a>';
            }
            ?>
            <a href="contact.php" class="selected">
                <div class="option contactoMenu">
                    <i class="far fa-id-badge" title="Contacto"></i>
                    <h5>Contacto</h5>
                </div>
            </a>

        </div>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿NUEVO POST?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="nuevoPost.php" method="post" runat="server" enctype="multipart/form-data">
                        <div class="form-group ">

                            <div class="logoContainer">
                                <img src="http://img1.wikia.nocookie.net/__cb20130901213905/battlebears/images/9/98/Team-icon-placeholder.png">
                            </div>
                            <div class="fileContainer sprite">
                                <span>Elige tu ShitPost...</span>
                                <input name="upload_file" type="file" value="Choose File">
                            </div>
                            </br>
                            </br>
                            <label class="text-center">Mensaje</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                        </div>
                        </br>

                </div>
                <div class="modal-footer">

                    <input type="submit" class="nuevoBoton" name="upload"></input>
                </div>
            </div>
        </div>
    </div>
    </form>


    <script src="js/script.js"></script>
    <script>
        $("input:file").change(function() {
            var fileName = $(this).val();
            if (fileName.length > 0) {
                $(this).parent().children(' span').html(fileName);
            } else {
                $(this).parent().children('span').html("Choose file");
            }
        });
    </script>

    <? include "footer.php"; ?>