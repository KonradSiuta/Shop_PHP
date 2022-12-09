<?php
    session_start();
    require ("db_connect.php");

    if (isset ($_POST['log_login'])) {
        $login=mysqli_real_escape_string($connection,$_POST['log_login']);
        $login_zap=mysqli_query($connection, "SELECT `login`,`haslo` FROM users WHERE `login`='".$login."';");
        echo "SELECT `login`,`haslo` FROM users WHERE `login`='".$login."';";

        if (mysqli_num_rows($login_zap)==0) {
            $_SESSION['log_login_error']=1;
            header("location:login_panel.php");
        } else {
            while ($row=mysqli_fetch_assoc($login_zap)){
                $haslo_cmp=$row['haslo'];
            }
            
            if ($haslo_cmp!=$_POST['log_haslo']){
                $_SESSION['log_login_error']=1;
                header("location:login_panel.php");
            } else {
                $_SESSION['login']=$_POST['log_login'];
                header("location:index.php");
            }
        }
    }
?>