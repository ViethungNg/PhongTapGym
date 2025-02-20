<?php
session_start();
require_once ('../../csdl/helper.php');
if(($_SESSION['congviec']) != "Quản lý" AND $_SESSION['congviec'] != "Thu ngân"){
header('location:../index.php');	

}

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['user_id'])) {
					$user_id = $_POST['user_id'];
					$sql = 'delete from khachhang where user_id = '.$user_id;
					execute($sql);
				}
				break;
		}
	}
}
?>
