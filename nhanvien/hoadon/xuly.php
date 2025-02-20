<?php
session_start();
require_once ('../../csdl/helper.php');
if(($_SESSION['congviec']) != "Quản lý" AND $_SESSION['congviec'] != "Thu ngân"){
header('location:../index.php');	
}

if(isset($_POST['Hoten'])){
    $iduser = $_POST['id'];
    $Hoten = $_POST["Hoten"];    
    $dv = $_POST["Tongtien"];
    $ngaythanhtoan = date('Y-m-j');
    $ghichu = 'Đã thanh toán';
    $Giathue = $_POST["Giathue"];
    // echo $_POST['hlv'];
    // echo $Giathue;
    // echo $dv;
    $tien = $dv + $Giathue;
    $qry = "INSERT INTO hoadon(user_id,tongtien,ngaythanhtoan,ghichu) values ('$iduser','$tien','$ngaythanhtoan','$ghichu')";
    $result = mysqli_query($con,$qry); 

    $sql = "UPDATE khachhang set Trangthai = '1', Loinhac = '0' where user_id = '$iduser'  ";
    $result = mysqli_query($con,$sql);
    header('Location:index.php');
	die();

}
