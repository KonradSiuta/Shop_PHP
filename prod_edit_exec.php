<?php
    session_start();

    require("db_connect.php");

    if (isset ($_POST['prod_prod'])) {
        $produkt=mysqli_real_escape_string($connection, $_POST['prod_prod']);
        $kategoria=mysqli_real_escape_string($connection, $_POST['prod_kategoria']);
        $producent=mysqli_real_escape_string($connection, $_POST['prod_producent']);
        $nazwa=mysqli_real_escape_string($connection,$_POST['prod_nazwa']);
        $opis=mysqli_real_escape_string($connection,$_POST['prod_opis']);
        $cena=mysqli_real_escape_string($connection,$_POST['prod_cena']);
        $zdjecie=mysqli_real_escape_string($connection,$_POST['prod_zdj']);

        if ($kategoria!="0") {
            mysqli_query($connection, "UPDATE produkty SET kategoria='$kategoria' WHERE nr_katalogowy='$produkt'");
        }

        mysqli_query($connection, "UPDATE produkty SET producent='$producent' WHERE nr_katalogowy='$produkt'");
        mysqli_query($connection, "UPDATE produkty SET nazwa='$nazwa' WHERE nr_katalogowy='$produkt'");
        mysqli_query($connection, "UPDATE produkty SET opis='$opis' WHERE nr_katalogowy='$produkt'");
        mysqli_query($connection, "UPDATE produkty SET cena='$cena' WHERE nr_katalogowy='$produkt'");
        mysqli_query($connection, "UPDATE produkty SET zdjecie='$zdjecie' WHERE nr_katalogowy='$produkt'");

        $_SESSION['edit_prod_success']=1;
        header("location:admin_panel.php");
    } else {
        $_SESSION['edit_prod_success']=-1;
        header("location:product_edit.php");
    }

    
?>