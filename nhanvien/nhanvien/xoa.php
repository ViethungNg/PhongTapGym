<?php
session_start();
require_once ('../../csdl/helper.php');
if(!isset($_SESSION['user_id'])){
    echo '<script>alert("Bạn không có quyền truy cập vào !!!")</script>';
    echo '<script>window.location.href = "../khachhang/index.php";</script>';
}

if(isset($_GET['id'])){
$id=$_GET['id'];

$qry="delete from nhanvien where id_nhanvien=$id";
$result=mysqli_query($con,$qry);

if($result){
    echo"DELETED";
    header('Location:index.php');
}else{
    echo"ERROR!!";
}
}
?>