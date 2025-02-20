<?php
session_start();
require_once ('../../csdl/helper.php');
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
    if(isset($_GET['id'])){
    $id=$_GET['id'];
    $tg = date('Y-m-j');
    $qry="UPDATE vieccanlam SET Status = 'Hoàn Thành', Ngayhoanthanh = '$tg' where id=$id";
    $result=mysqli_query($con,$qry);

    if($result){
        echo"sửa";
        header('Location:../pages/index.php');
    }else{
        echo"ERROR!!";
    }
}
?>