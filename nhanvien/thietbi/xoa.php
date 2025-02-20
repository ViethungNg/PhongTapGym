<?php
require_once ('../../csdl/helper.php');
session_start();
if(!isset($_SESSION['user_id'])){
    echo '<script>alert("Bạn không có quyền truy cập vào !!!")</script>';
    echo '<script>window.location.href = "../khachhang/index.php";</script>';
}

if(isset($_GET['id_thietbi'])){
$id_thietbi=$_GET['id_thietbi'];

$qry="delete from thietbi where id_thietbi=$id_thietbi";
$result=mysqli_query($con,$qry);

if($result){
    echo"DELETED";
    header('Location:index.php');
}else{
    echo"ERROR!!";
}
}
?>