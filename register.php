<?php
    session_start();
    require ("db_connect.php");

    if (isset ($_POST['reg_login'])) {
        if ($_POST['reg_haslo'] != $_POST['reg_haslo_check']) {
            $_SESSION['reg_haslo_error'] = 1;
            echo "blad";
            header("location:login_panel.php");
        } else {
            $login_rep=mysqli_query($connection, "SELECT login FROM users WHERE `login`='".$_POST['reg_login']."'");
            
            if (mysqli_num_rows($login_rep)>0) {
                $_SESSION['reg_login_error'] = 1;
                echo "blad";
                header("location:login_panel.php");
            } else {
                $login=mysqli_real_escape_string($connection,$_POST['reg_login']);
                $haslo=mysqli_real_escape_string($connection,$_POST['reg_haslo']);
                mysqli_query($connection, "INSERT INTO `users`(`login`, `haslo`, `typ`) VALUES ('".$login."','".$haslo."','klient');");
                echo "INSERT INTO `users`(`login`, `haslo`, `typ`) VALUES ('".$login."','".$haslo."','klient');";
                header("location:login_panel.php");
            }
        } 
    }
?>