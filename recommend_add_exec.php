<?php
    session_start();

    require("db_connect.php");

    if (isset ($_POST['prod_nr_kat'])) {
        $nr_kat=$_POST['prod_nr_kat'];

        mysqli_query($connection,"INSERT INTO polecane (`nr_katalogowy`) VALUES ('$nr_kat')");

        $_SESSION['recommend_add_success']=1;
        header("location:admin_panel.php");
    } else {
        $_SESSION['recommend_add_success']=-1;
        header("location:recommended_add.php");
    }

    
?>