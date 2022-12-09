<?php
    require ("head.php");
    require ("header.php")
?>

<section class="main container-fluid p-1 mt-1">
    <div class="row p-1">
        <div class="col-md-6">
            <h2 class="text-center">Logowanie</h2>

            <form action="login.php" method="post">
                <label for="login_input" class="form-label">Login</label>
                <input type="text" name="log_login" id="login_input" class="form-control" required>

                <label for="password_input" class="form-label">Hasło</label>
                <input type="password" name="log_haslo" id="password_input" class="form-control" required>

                <button type="submit" class="btn btn-primary mt-2">Zaloguj</button>
            </form>

            <?php
            if (isset($_SESSION['log_login_error'])){
                if ($_SESSION['log_login_error']==1) {
                    echo <<<show
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            <p>Błędny login lub hasło</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    show;

                    $_SESSION['log_login_error']=0;
                }
            }
            ?>
        </div>

        <div class="col-md-6">
            <h2 class="text-center">Rejestracja</h2>

            <form action="register.php" method="post">
                <label for="login_input" class="form-label">Login</label>
                <input type="text" name="reg_login" id="login_input" class="form-control" required>

                <label for="password_input" class="form-label">Hasło</label>
                <input type="password" name="reg_haslo" id="password_input" class="form-control" required>

                <label for="password_check" class="form-label">Powtórz hasło</label>
                <input type="password" name="reg_haslo_check" id="password_check" class="form-control" required>

                <button type="submit" class="btn btn-primary mt-2">Utwórz konto</button>
            </form>
            <?php
            if (isset ($_SESSION['reg_haslo_error'])){
                if ($_SESSION['reg_haslo_error']==1) {
                    echo <<<show
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            <p>Podane hasła się różnią</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    show;

                    $_SESSION['reg_haslo_error']=0;
                }
            }

            if (isset ($_SESSION['reg_login_error'])){
                if ($_SESSION['reg_login_error']==1) {
                    echo <<<show
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            <p>Podany login jest zajęty</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    show;

                    $_SESSION['reg_login_error']=0;
                }
            }
            ?>
        </div>
    </div>
</section>

<?php
    require ("footer.php");
?>