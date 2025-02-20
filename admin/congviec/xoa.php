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
				if (isset($_POST['idCv'])) {
					$idCv = $_POST['idCv'];
					$sql = 'delete from congviec where idCv = '.$idCv;
					execute($sql);
				}
				break;
		}
	}
}
?>
