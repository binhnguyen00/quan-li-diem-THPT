<?php

require_once 'Connect/connect.php';
class Dangnhap extends Database_ql_diem
{
	public static function Login($ten_tk, $Matkhau)
	{
		$sql = "SELECT * FROM taikhoan WHERE taikhoan.ten_tk = '$ten_tk' AND taikhoan.Matkhau = '$Matkhau'";
		Dangnhap::$conn;
		return (new Database_ql_diem)->Getdata($sql);
	}
	public static function ADD($Hovaten, $Ten_tk, $Matkhau, $Email,$Ma_ltk)
	{
		$sql = "INSERT INTO taikhoan(Hovaten, Ten_tk, Matkhau, Email, Ma_ltk) VALUES ('$Hovaten','$Ten_tk','$Matkhau','$Email','$Ma_ltk')";
		return (new Database_ql_diem)->Execute($sql);
	}
	public static function Edit($Hovaten, $Ten_tk, $Matkhau, $Email, $Ma_tk, $Ma_ltk)
	{
		$sql = "UPDATE taikhoan SET Hovaten='$text_hoten',Ma_ltk='$Ma_ltk',Ten_tk='$Ten_tk',Matkhau='$Matkhau',Emai='$text_email' WHERE taikhoan.Ma_tk = '$Ma_tk'";
		return parent::Execute($sql);
	}
	public static function Delete($Ma_tk)
	{
		$sql = "DELETE FROM taikhoan WHERE taikhoan.Ma_tk = '$Ma_tk'";
		return parent::Execute($sql);
	}
	public static function List_id($Ma_tk)
	{
		$var = new Database_ql_diem;
		$sql = "SELECT * FROM taikhoan WHERE taikhoan.ma_tk = '$Ma_tk'";
		return Dangnhap::Getdata($sql);
	}
	public static function List($Ma_tk)
	{
		$sql = "SELECT * FROM taikhoan";
		return parent::Getdata($sql);
	}
}
