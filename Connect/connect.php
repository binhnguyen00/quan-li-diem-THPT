<?php

class Database_ql_diem
{
	private static $hostname = "localhost";
	private static $username = "root";
	private static $password = "";
	private static $database = "ql_diem";
	protected static $conn = NULL;

	public static function Connect()
	{
		self::$conn = mysqli_connect(self::$hostname, self::$username, self::$password, self::$database);

		if (!self::$conn) {
			echo "kết nối thất bại";
		} else {
			//echo "kết nối thàng công";
			mysqli_set_charset(self::$conn, 'utf8');
		}
	}
	public function Execute($sql)
	{
		$retuln = self::$conn->query($sql);
		return $retuln;
	}
	public function Getdata($sql)
	{
		$retuln = self::Execute($sql);
		$arr = array();
		if (mysqli_num_rows($retuln) > 0) {
			while ($arrs = mysqli_fetch_array($retuln)) {
				$arr[] = $arrs;
			}
		} else {
			$arr = 0;
		}
		return $arr;
	}
	// xử lý Điểm

	public function XL($diem)
	{
		if ($diem >= 8.0) {
			$xl = "Giỏi";
		} elseif ($diem >= 6.5) {
			$xl = "Khá";
		} elseif ($diem >= 5.0) {
			$xl = "Trung bình";
		} elseif ($diem < 5.0) {
			$xl = "Yếu";
		}
		return $xl;
	}
}
