<?php
session_start();
require_once ('../../csdl/helper.php');

if(!isset($_SESSION['user_id'])){
header('location:../../index.php');	
}
    $new_date = date('Y-m-j');
    $sql1 = "UPDATE khachhang SET kiemtra = '$new_date', TT = '0'";
    $con->query($sql1);
    header('Location:index.php');
	die();
?>
