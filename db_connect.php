<?php
    $connection=mysqli_connect('localhost','root','root','projekt_jhtswww');
    /*if (!$conn) {
        die ('Błąd połączenia z bazą! '. mysqli_connect_error());
    }*/

    mysqli_query($connection,"SET CHARSET utf8");
?>