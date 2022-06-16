<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div>

                    <!-- (SELECT COUNT(*) AS likes FROM postlikes, post WHERE post.id_user = postlikes.id_user) as likes, (SELECT COUNT(*) AS dislikes FROM postdislikes,post WHERE post.id_user = postdislikes.id_user) as dislikes -->

                </div>
            </div>
            <?php
            $mysqli = new mysqli("localhost", "root", "", "bd_shitpost");
            if ($mysqli->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }

            $page = 1;
            if (!empty($_GET['page'])) {
                $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
                if (false === $page) {
                    $page = 1;
                }
            }

            $items_per_page = 3;
            $offset = ($page - 1) * $items_per_page;
            $consulta1 = "SELECT * FROM POST, LOGIN_REGISTER  WHERE post.id_user = login_register.id_login ORDER BY post.id_post DESC LIMIT " . $offset . "," . $items_per_page;
            $resultado = $mysqli->query($consulta1);
            echo '<div class=" bg-white col-5">';
            while ($fila = $resultado->fetch_assoc()) {
                // $consulta2 = "SELECT * FROM POST, LOGIN_REGISTER, (SELECT post.id_post,COUNT(*) AS likes FROM postlikes, post WHERE post.id_user = postlikes.id_user ) as likes , (SELECT post.id_post,COUNT(*) AS dislikes FROM postdislikes,post WHERE post.id_user = postdislikes.id_user ) as dislikes WHERE post.id_post = likes.id_post";

                echo '<div class="cardbox shadow-lg">
                <div class="cardbox-heading">
        <div class="media m-0">
        <div class="d-flex mr-3">
            <img class="img-fluid rounded-circle" src="imgPost/' . $fila["avatar"] . '" alt="User">
        </div>
             <div class="media-body">
                        <p class="m-0 text-uppercase botonUsuario">' . $fila["username"] . '</p>
                       
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
        <li><a><i class="fa fa-thumbs-up"><input type="submit" name="like" value="hola"/></i></a></li>
        <li><a><span></span></a></li>
       
    </ul>
    </form>
    <form method="post" action="dislikeOk.php" class="like";>
    <ul>
        <li><a><i class="fa fa-thumbs-down"><input type="submit" name="dislike" value="dssa"/></i></a></li>
        <li><a><span></span></a></li>
    </ul>
    </form>
            </div>
<div class="messagePost">
<ul> 
<li><a><span>' . $fila["message"] . '</span></a> </li>
</ul>
</div>

</div>


    ';
            }

            ?>




            <!--PAGINAS -->
            <?php
            $total = 3;
            if (isset($_GET["page"])) {
                $page  = $_GET["page"];
            } else {
                $page = 1;
            }
            $start = ($page - 1) * $total;
            $slt = "select * from post LIMIT $start,$total";
            $rec = mysqli_query($mysqli, $slt);
            while ($row = mysqli_fetch_array($rec)) {
            }
            ?>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item <?php if ($page == 1) {
                                                echo 'disabled';
                                            } ?>">
                        <a class="page-link " href="<?php if ($page == 1) {
                                                        echo '#';
                                                    } else { ?><?php echo $_SERVER['PHP_SELF'] ?>?page=<?php echo $page - 1;
                                                                                                    } ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>

                    <?php
                    $slt = "select * from post";
                    $rec = mysqli_query($mysqli, $slt);
                    $total1 = mysqli_num_rows($rec);
                    $total_pages = ceil($total1 / $total);
                    for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <li class="page-item <?php if ($_GET["page"] == $i) {
                                                    echo 'active';
                                                }
                                                ?>"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] ?>?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>

                    <?php } ?>

                    <li class="page-item <?php if ($page == $total_pages) {
                                                echo 'disabled';
                                            } ?>">
                        <a class="page-link " href="<?php if ($page == $total_pages) {
                                                        echo '#';
                                                    } else { ?><?php echo $_SERVER['PHP_SELF'] ?>?page=<?php echo $page + 1;
                                                                                                    } ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- chat -->
            <div id="Element" class="col-3 d-md-block">

                <script>
                    let chatango = document.createElement('script');
                    chatango.setAttribute('type', 'text/javascript');
                    chatango.setAttribute('id', 'cid0020000316279404619');
                    chatango.setAttribute('data-cfasync', 'false');
                    chatango.setAttribute('async', true);
                    chatango.setAttribute('src', '//st.chatango.com/js/gz/emb.js');
                    chatango.setAttribute('style', 'width: 500px;height: 800px;');
                    chatango.innerHTML = '{"handle":"shitpostes","arch":"js","styles":{"a":"000000","b":100,"c":"FFFFFF","d":"FFFFFF","k":"000000","l":"000000","m":"000000","n":"FFFFFF","p":"10","q":"000000","r":100,"pos":"br","cv":1,"cvfntsz":"14px","cvbg":"000000","cvw":400,"cvh":30,"surl":0,"allowpm":0,"cnrs":"0.35","ticker":1,"fwtickm":1}}';
                    document.body.appendChild(chatango);

                    toggle();
                    window.onresize = function() {
                        toggle();
                    }

                    function toggle() {
                        if (window.innerWidth < 1000) {
                            document.querySelector('chatango').style.display = 'none';
                        } else {
                            document.querySelector('chatango').style.display = 'block';
                        }
                    }
                </script>


            </div>
        </div>
</section>


<!--PAGINAS -->