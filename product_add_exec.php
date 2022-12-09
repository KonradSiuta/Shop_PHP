<?php
    session_start();

    require("db_connect.php");

    $id_zap=mysqli_query($baza,"SELECT count(*) AS id_max FROM produkty");

    while($eluwa=mysqli_fetch_array($id_zap)){
        $id=$eluwa['id_max']+1;
    }

    if (isset ($_POST['prod_kategoria'])) {
        $kategoria=mysqli_real_escape_string($connection, $_POST['prod_kategoria']);
        $prod_kategoria=mysqli_real_escape_string($connection, $_POST['prod_producent']);
        $nazwa=mysqli_real_escape_string($connection,$_POST['prod_nazwa']);
        $opis=mysqli_real_escape_string($connection,$_POST['prod_opis']);
        $cena=mysqli_real_escape_string($connection,$_POST['prod_cena']);
        $zdjecie=mysqli_real_escape_string($connection,$_POST['prod_zdj']);

        mysqli_query($connection,"INSERT INTO produkty (id_kategorii,nr_katalogowy,producent,nazwa,opis,cena,zdjecie) VALUES ($prod_kategoria,'$kategoria/$id','$producent','$nazwa','$opis',$cena,'$zdjecie')");

        $_SESSION['add_prod_success']=1;
        header("location:admin_panel.php");
    } else {
        $_SESSION['add_prod_success']=-1;
        header("location:product_add.php");
    }

    
?>