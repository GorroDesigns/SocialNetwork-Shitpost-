<?php include_once "header.php"; ?>

<div class="container fitPage">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="signup-form">
                <form action="loginOk.php" method="post">
                    <h2>Hola amigo</h2>
                    <p>兄弟起拉屎 </p>
                    <hr>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="username" placeholder="Username" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i>
                                <i class="fa fa-check"></i>
                            </span>
                            <input type="password" class="form-control" name="password" placeholder="Password here" required="required">
                        </div>
                    </div>
                    </br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
                    </div>
                    <div class="text-center">Tienes cuenta???? <a href="register.php">Registrate ya</a></div>
                </form>



            </div>
        </div>
    </div>

    <?php include_once "footer.php" ?>