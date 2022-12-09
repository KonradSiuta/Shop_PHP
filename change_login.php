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
                <form action="change_login_exec.php" method="post">
                    <label for="new_login" class="form-label">Podaj nowy login</label>
                    <input type="text" name="new_login" id="new_login" class="form-control" required>
                    <button type="submit" class="btn btn-primary mt-2">Zmień login</button>
                </form>
            </div>
            
        </div>
    </section>
<?php
    require("footer.php");
?>