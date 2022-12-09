<?php
    session_start();
    require("db_connect.php");

    if (isset ($_POST['old_password'])) {
        $old_pass=mysqli_query($connection, "SELECT `haslo` FROM users WHERE `login`='".$_SESSION['login']."'");
        // echo "SELECT `haslo` FROM users WHERE `login`='".$_SESSION['login']."'";

        if (mysqli_num_rows($old_pass) == 0) {
            echo "error1";
            $_SESSION['old_pass_error'] = 1;
            header("location:change_password.php");
        } else if ($_POST['new_password'] != $_POST['new_password_check']) {
            $_SESSION['pass_cmp_error'] = 1;
            header("location:change_password.php");
        } else {
            mysqli_query($connection, "UPDATE `users` SET `haslo`='".$_POST['new_password']."' WHERE `login`='".$_SESSION['login']."';");
            echo "UPDATE `users` SET `haslo`='".$_POST['new_password']."' WHERE `login`='".$_SESSION['login']."';";
            $_SESSION['password_login_success'] = 1;
            header("location:user_edit.php");
        }

    }
?>