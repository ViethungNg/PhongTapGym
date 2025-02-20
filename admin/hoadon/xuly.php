<?php
session_start();
require_once ('../../csdl/helper.php');
if(!isset($_SESSION['user_id'])){
header('location:../../index.php');	}
if(isset($_POST['Hoten'])){
    $iduser = $_POST['id'];
    $Hoten = $_POST["Hoten"];    
    $dv = $_POST["Tongtien"];
    $ngaythanhtoan = date('Y-m-j');
    $ghichu = 'Đã thanh toán';
    $Giathue = $_POST["Giathue"];
    $qry = "SELECT ngaythue, ngayktthue FROM khachhang WHERE user_id = '$iduser'";
    $result = mysqli_query($con, $qry);
    $row = mysqli_fetch_array($result);
    $ngaybd = new DateTime($row['ngaythue']);
    $ngaykt = new DateTime($row['ngayktthue']);
    $thoiGianThue = $ngaybd->diff($ngaykt);
    $soThangThue = $thoiGianThue->m;
    $tien = $dv + ($Giathue * $soThangThue);
    $qry = "INSERT INTO hoadon(user_id,tongtien,ngaythanhtoan,ghichu) values ('$iduser','$tien','$ngaythanhtoan','$ghichu')";
    $result = mysqli_query($con,$qry); 

    $sql = "UPDATE khachhang set Trangthai = '1', Loinhac = '0' where user_id = '$iduser'  ";
    $result = mysqli_query($con,$sql);
    header('Location:index.php');
	die();

}
