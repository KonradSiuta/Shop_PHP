<?php
    session_start();

    require("db_connect.php");

    if (isset ($_POST['prod_nr_kat'])) {
        $nr_kat=$_POST['prod_nr_kat'];
        $cena=$_POST['prod_cena'];

        if ($nr_kat!="0") {
            mysqli_query($connection, "UPDATE promocja SET nr_katalogowy='$nr_kat' WHERE id_promocji=1");
        }

        mysqli_query($connection, "UPDATE promocja SET nowa_cena='$cena' WHERE id_promocji=1");

        $_SESSION['prom_mod_success']=1;
        header("location:admin_panel.php");
    } else {
        $_SESSION['prom_mod_success']=-1;
        header("location:product_delete.php");
    }

    
?>