<?php 
session_start();
 echo 'penis';
if(isset($_POST['nr_kat'])) {
    if (!isset($_SESSION['koszyk'])) {
        $_SESSION['koszyk'][0]=$_POST['nr_kat'];
    }else
       $_SESSION['koszyk'][count($_SESSION['koszyk'])]=$_POST['nr_kat'];
}

 foreach ($_SESSION['koszyk'] as $cos) {
     echo '<p>'.$cos.'</p>';
 }
header ('location:cart.php');

?>