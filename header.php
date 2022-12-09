<?php

require ("db_connect.php");

?>

<header class="container-fluid clearfix p-1">

    <a href="index.php">
        <div class="float-start">
                <img src="obrazy/logo.svg" alt="360noscope-najlepszy sklep ze sprzętem dla graczy">
                <h2 class="d-inline-block">360noscope</h2>
        </div>
    </a>
    <?php
        if (isset ($_SESSION['login'])) {
            echo <<<show
            <div class="float-end">
                <figure class="d-inline-block m-1 text-center" data-bs-toggle="modal" data-bs-target="#loginModal">
                <i class="bi bi-person-fill header-icons"></i>
                    <figcaption>Konto</figcaption>
                </figure>
            show;
        } else {
                echo <<<show
                <div class="float-end">
                <a href="login_panel.php">
                  <figure class="d-inline-block m-1 text-center">
                      <i class="bi bi-person-fill header-icons" ></i>
                      <figcaption>Konto</figcaption>
                  </figure>
                </a>
                show;
        }
        ?>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <?php
         echo ("<h5 class=\"modal-title\" id=\"loginModalLabel\">Witaj ".$_SESSION['login']."</h5>");
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>Co chcesz zrobić?</h5>
        <form action="user_edit.php">
        <button class="btn btn-primary">Edytuj ustawienia konta</button>
        </form>
        <?php
            $czy_admin=mysqli_query($connection, "SELECT typ FROM users WHERE `login`='".$_SESSION['login']."' AND `typ`='admin'");
            // echo "SELECT typ FROM users WHERE `login`='".$_SESSION['login']."' AND `typ`='admin'";

            if (mysqli_num_rows ($czy_admin) > 0) {
              echo ("<form action=\"admin_panel.php\"><button class=\"btn btn-primary mt-1\">Przejdź do panelu administracyjnego</button></form>");
            }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
        <form action="logout.php">
        <button class="btn btn-danger">Wyloguj</button>
        </form>
      </div>
    </div>
  </div>
</div>
        <a href="cart.php">
        <figure class="d-inline-block m-1 text-center">
            <i class="bi bi-cart-fill header-icons"></i>
            <figcaption>Koszyk (<?php
              if (isset ($_SESSION['koszyk'])) {
                echo (count($_SESSION['koszyk']));
              } else echo "0";
          ?>)</figcaption>
        </figure>
        </a>
    </div>
</header>