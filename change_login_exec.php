<?php
    session_start();
    require("db_connect.php");

    if (isset ($_POST['new_login'])) {
        mysqli_query($connection, "UPDATE users SET `login`='".$_POST['new_login']."' WHERE `login`='".$_SESSION['login']."';");
        // echo "UPDATE users SET `login`='".$_POST['new_login']."' WHERE `login`='".$_SESSION['login']."';";
        $_SESSION['login'] = $_POST['new_login'];
        $_SESSION['change_login_success'] = 1;
        header("location:user_edit.php");
    }
?>