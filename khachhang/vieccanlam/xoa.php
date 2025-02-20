<?php
session_start();
require_once ('../../csdl/helper.php');
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
    if(isset($_GET['id'])){
    $id=$_GET['id'];
    $qry="delete from vieccanlam where id=$id";
    $result=mysqli_query($con,$qry);

    if($result){
        echo"DELETED";
        header('Location:../pages/index.php');
    }else{
        echo"ERROR!!";
    }
}
?>