<?php
    require("db_connect.php");
    require("head.php");
    require("header.php");
?>
    <section class="main container-fluid p-1 mt-1">
        <div class="row">
            <div class="col-md-6 text-center">
                <h1>Co chcesz zmienić?</h1>

                <ul class="list-unstyled">
                    <li class="h3"><a href="change_login.php">Zmień login</a></li>
                    <li class="h3"><a href="change_password.php">Zmień hasło</a></li>
                </ul>
            </div>
            
            <div class="col-md-6 text-center">
            <?php
            if (isset($_SESSION['change_login_success'])){
                if ($_SESSION['change_login_success']==1) {
                    echo <<<show
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            <p>Login został pomyślnie zmieniony</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    show;

                    $_SESSION['change_login_success']=0;
                }
            }

            if (isset($_SESSION['password_login_success'])){
                if ($_SESSION['password_login_success']==1) {
                    echo <<<show
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            <p>Hasło zostało pomyślnie zmienione</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    show;

                    $_SESSION['password_login_success']=0;
                }
            }
            ?>
            </div>
        </div>
    </section>
<?php
    require("footer.php");
?>