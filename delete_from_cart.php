<?php 
session_start();
unset($_SESSION['koszyk']);
header ("location:cart.php");
?>