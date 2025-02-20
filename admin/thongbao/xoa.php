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
				if (isset($_POST['id'])) {
					$id = $_POST['id'];
					$sql = 'delete from thongbao where id = '.$id;
					execute($sql);
				}
				break;
		}
	}
}
?>
