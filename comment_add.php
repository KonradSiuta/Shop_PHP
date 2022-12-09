<?php
    session_start();

    require ("db_connect.php");

    if (isset ($_POST['comment_rate'])) {
        $ocena=$_POST['comment_rate'];
        $produkt=$_POST['prod_id'];
        $uzytkownik=$_POST['comment_user'];
        $tekst=mysqli_real_escape_string($connection, $_POST['comment_text']);

        mysqli_query($connection, "INSERT INTO `komentarze`(`prod_nr_katalogowy`, `user`, `tresc`, `ocena`) VALUES ('$produkt','$uzytkownik','$tekst',$ocena)");
    }

    header("location:product.php?it=$produkt");
?>