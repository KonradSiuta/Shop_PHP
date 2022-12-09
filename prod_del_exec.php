<?php
    session_start();

    require("db_connect.php");

    if (isset ($_POST['prod_nr_kat'])) {
        $nr_kat=$_POST['prod_nr_kat'];

        mysqli_query($connection,"DELETE FROM produkty WHERE nr_katalogowy='$nr_kat'");

        $_SESSION['prod_del_success']=1;
        header("location:admin_panel.php");
    } else {
        $_SESSION['prod_del_success']=-1;
        header("location:product_delete.php");
    }

    
?>