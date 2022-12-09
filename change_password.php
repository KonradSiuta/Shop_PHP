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
                <h1>Zmiana loginu</h1>
                <form action="change_password_exec.php" method="post">
                    <label for="old_password" class="form-label">Podaj dotychczasowe hasło</label>
                    <input type="password" name="old_password" id="old_password" class="form-control" required>
                    <label for="new_password" class="form-label">Podaj nowe hasło</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" required>
                    <label for="new_password_check" class="form-label">Powtórz nowe hasło</label>
                    <input type="password" name="new_password_check" id="new_password_check" class="form-control" required>
                    <button type="submit" class="btn btn-primary mt-2">Zmień hasło</button>
                </form>

                <?php
            if (isset($_SESSION['old_pass_error'])){
                if ($_SESSION['old_pass_error']==1) {
                    echo <<<show
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            <p>Błąd w obecnie używanym haśle</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    show;

                    $_SESSION['old_pass_error']=0;
                }
            }

            if (isset($_SESSION['pass_cmp_error'])){
                if ($_SESSION['pass_cmp_error']==1) {
                    echo <<<show
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            <p>Podane nowe hasła się różnią</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    show;

                    $_SESSION['pass_cmp_error']=0;
                }
            }
            ?>
            </div>
            
        </div>
    </section>
<?php
    require("footer.php");
?>