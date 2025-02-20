<?php
require_once ('../../csdl/helper.php');
session_start();
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['id_nhanvien'])) {
					$id_nhanvien = $_POST['id_nhanvien'];
					$sql = 'delete from nhanvien where id_nhanvien = '.$id_nhanvien;
					execute($sql);
				}
				break;
		}
	}
}
?>
