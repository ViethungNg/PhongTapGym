<?php
session_start();
require_once ('../../csdl/helper.php');
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
if(isset($_GET['id'])){
$id=$_GET['id'];

$qry="UPDATE khachhang SET Loinhac = '1' where user_id=$id";
$result=mysqli_query($con,$qry);

if($result){
    echo '<script>alert("Lời nhắc đã được chuyển đến khách hàng!")</script>';
    echo '<script>window.location.href = "index.php";</script>';
    
}else{
    echo"ERROR!!";
}
}
?>