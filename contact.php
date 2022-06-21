<?php
include_once("header.php");

if (isset($_POST["logout"])) {
    session_destroy();
}
$titulo = "Contacto ShitPost";

?>

<!-- Contact with Map - START -->
<div class="container contacto">
    <div class="row">
        <div class="col-md-6">
            <div>
                <form class="form-horizontal" action="mailto: gorrodesigns@gmail.com" method=”POST” enctype=”multipart/form-data” name=”EmailForm”>
                    <fieldset>
                        <legend>Contactanos</legend>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="name" name="name" type="text" placeholder="Nombre" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="email" name="email" type="text" placeholder="email@email.com" class="form-control">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <textarea class="form-control" id="message" name="message" placeholder="¿Qué nesesitas?" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">

                            </br>
                            <button type="submit" class=" botonContacto btn-lg ">Enviar</button>

                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <h4>Donde vivo:</h4>
                        <div class="textoRojo">
                            ESPAÑITA<br /></BR>
                            <h4> Correo de tipo sexy:</h4>
                            gorrodesigns@gmail.com<br />
                            <?php ?>
                        </div>
                        <hr />
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d490812.1184645911!2d-5.371585280171728!3d36.083935986517055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0cbf762714be35%3A0x384e25263600870f!2sGibraltar!5e0!3m2!1ses!2ses!4v1649693534014!5m2!1ses!2ses" width="600" height="195" style="border:3px solid rgb(125, 255, 169);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Contact with Map - END -->










<?php include_once("footer.php") ?>