<?php

session_start();
require_once ('../../csdl/helper.php');
if(($_SESSION['congviec']) != "Quản lý"){
    echo '<script>alert("Bạn không có quyền truy cập vào !!!")</script>';
    echo '<script>window.location.href = "../khachhang/index.php";</script>';
}
if(isset($_GET['id'])){
$id=$_GET['id'];
$qry="delete from thongbao where id=$id";
$result=mysqli_query($con,$qry);

if($result){
    echo"DELETED";
    header('Location:index.php');
}else{
    echo"ERROR!!";
}
}
?>