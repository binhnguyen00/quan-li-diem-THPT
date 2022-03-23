<?php
session_start();
require_once 'Model/dangnhap.php';
if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = NULL;
}
switch ($action) {
	case 'dang_ky':
		if (isset($_POST['Dangky'])) {
			$txtfirstName = $_POST['txtfirstName'];
			$txtlastName = $_POST['txtlastName'];
			$txtTen_tk = $_POST['txtTen_tk'];
			$txtEmail = $_POST['txtEmail'];
			$txtMatkhau = md5($_POST['txtMatkhau']);
			$txtCfMatkhau = md5($_POST['txtCfMatkhau']);
			$Ma_ltk = 'B01'; 

			$txtHovaten = $txtfirstName . " " . $txtlastName;

			if ($txtMatkhau == $txtCfMatkhau) {
				if (Dangnhap::ADD($txtHovaten, $txtTen_tk, $txtMatkhau, $txtEmail, $Ma_ltk)) {
					header('location:index.php?controllers=login');
				}
			} else {
				$thatbai = "<p style ='color:red'>* Đăng ký Thất bại do mặt khẩu nhập lại không khớt.!</p>";
			}
		}
		require_once 'View/register.php';
		break;
	case 'cai_dat':
		if (isset($_GET['Ten_tk'])) {
			$Ten_tk = $_GET['Ten_tk'];
			$user = Dangnhap::List_id($Ten_tk);

			if (isset($_POST['Luu'])) {
				$txtfirstName = $_POST['txtfirstName'];
				$txtTen_tk = $_POST['txtTen_tk'];
				$txtEmail = $_POST['txtEmail'];
				$txtMatkhau = md5($_POST['txtMatkhau']);

				if (Dangnhap::Edit($txtfirstName, $txtTen_tk, $txtMatkhau, $txtEmail)) {
					$_SESSION['Ten_tk'] = $txtTen_tk;
					header('location:index.php?controllers=quanly&action=Admin');
				} else {
					$thatbai = "Lưu thất bại.!";
				}
			}
		}
		foreach ($user as $value) {
			
		}
		require_once 'View/caidat.php';
		break;
	case 'Xoa_tk':
		if ($_SESSION["Ma_tk"]) {
			$text_username = $_SESSION["Ma_tk"];
			if (Dangnhap::Delete($text_username)) {
				session_destroy();
				header('location:index.php');
			}
		}
		break;
	case 'quen_mk':

		require_once 'View/forgot-password.php';
		break;
	case 'Admin':

		if (isset($_POST['login'])) {
			$text_username = $_POST['username'];
			$text_password = md5($_POST['password']);

			$list_user = Dangnhap::Login($text_username, $text_password);
			// echo "<pre>";
			// print_r($list_user);

			// foreach ($list_user as $value) {
			if ($list_user > 0) {
				$_SESSION["username"] = $text_username;
				header('location:index.php?controllers=quanly&action=Admin');
			} else {
				$thatbai = "<p style ='color:red'>* Tên đăng nhập hoặc Mật khẩu không đúng.!</p>";
				//header('location:index.php');
				require_once 'View/login.php';
			}
			//}
		}
		//require_once 'View/login.php';
		break;
	case 'logout':
		require_once 'View/logout.php';
		break;
	default:
		if (isset($_SESSION["username"])) {
			header('location:index.php?controllers=quanly&action=Admin');
		} else {
			require_once 'View/login.php';
		}
		break;
}
