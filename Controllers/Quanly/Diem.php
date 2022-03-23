<?php
session_start();
require_once 'Model/lop.php';
require_once 'Model/sinhvien.php';
require_once 'Model/Diemchitiep.php';
require_once 'Model/diemhocpham.php';
require_once 'Model/monhocphan.php';
error_reporting(0);
if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = NULL;
}
switch ($action) {
	case 'List_Diem':
		if (isset($_GET['maSV'])) {
			$maSV = $_GET['maSV'];

			$dHP = (new TongDiemChitiet)->DiemHP($maSV);
		}
		require_once 'View/Diem/list_diem.php';
		break;
	case 'Add_Diem_HP':
		//
		if (isset($_GET['maSV'])) {
			$maLop = $_GET['maLop'];

			$list_sv = (new Sinhvien)->List();
		}

		$list_sv = (new Sinhvien)->List();
		$list_hp = (new MonHP)->List();
		if (isset($_POST['themDiem'])) {
			$maSV = $_POST['sellist1'];
			$maM = $_POST['sellist2'];
			$txt_diemGK = $_POST['txt_diemGK'];
			$txt_diemTHK = $_POST['txt_diemTHK'];

			if ((new DiemMHP)->ADD($maSV, $maM, $txt_diemGK, $txt_diemTHK)) {
				$thanhcong = "Thêm điểm thành công";
			} else {
				$thatbai = "Thêm điểm thất bại";
			}
		}
		require_once 'View/Diem/add_diem.php';
		break;
	case 'Edit_Diem_HP':
		if (isset($_GET['maMon'])) {
			$text_masv = $_GET['maSV'];
			$text_mamon = $_GET['maMon'];
			$list_diem_lop_sinhvien = (new DiemMHP)->D_M_SV($text_masv, $text_mamon);

			// echo "<pre>";
			// print_r($list_diem_lop_sinhvien);

			if (isset($_POST['suaDiem'])) {
				$txt_diemGK = $_POST['txt_diemGK'];
				$txt_diemTHK = $_POST['txt_diemTHK'];

				if ((new DiemMHP)->Edit($text_masv, $text_mamon, $txt_diemGK, $txt_diemTHK)) {
					header('location:index.php?controllers=diem&action=QL_Diem');
				} else {
					$thatbai = "Sửa điểm thất bại";
				}
			}
		}
		require_once 'View/Diem/edit_diem.php';
		break;
	case 'Delete_Diem_HP':

		if (isset($_GET['maMon'])) {
			$text_masv = $_GET['maSV'];
			$text_mamon = $_GET['maMon'];

			// echo "Mã sinh viên là: ".$text_masv."<br/>";
			// echo "Mã Môn là: ".$text_mamon."<br/>";
			if ((new DiemMHP)->Delete($text_masv, $text_mamon)) {
				header('location:index.php?controllers=diem&action=QL_Diem');
			} else {
				echo "Xóa thất bại";
			}
		}
		break;
	case 'QL_Diem':
		$list_lop = (new Lop)->List();
		if (isset($_GET['maLop'])) {
			$maLop = $_GET['maLop'];
			$list_sv = (new DiemMHP)->Lop_Sinhvien($maLop);
		}
		if (isset($_GET['maSV'])) {
			$text_masv = $_GET['maSV'];
			$dHP = (new DiemMHP)->List($text_masv);
		}

		require_once 'View/Diem/xl_diem.php';
		break;
	case 'Tonghopdiem':
		$list_lop = (new Lop)->List();
		if (isset($_POST["Hienthi"])) {
			$txt_malop = $_POST['txt_malop'];
			$list_lop_sinhvien = (new Lop)->Lop_Sinhvien($txt_malop);
		}
		if (isset($_POST["xem"])) {
			if (isset($_POST['txt_masinhvien'])) {
				$txt_masinhvien = $_POST['txt_masinhvien'];

				$sv = (new Sinhvien)->GetId($txt_masinhvien);
				$ttDiem = (new TongDiemChitiet)->TDiem($txt_masinhvien);
			}
		}
		require_once 'View/Tonghopdiemsinhvien.php';
		break;
	case 'Thong_ke':
		$sv = (new Sinhvien)->List();
		$dem = 0;
		$monhoc = 0;
		foreach ($sv as $value) {
			$ma_sv_l[] = $value['ma_sv'];
			$dem = $dem + 1;
		}
		for ($i = 0; $i < $dem; $i++) {
			//echo "Mã sinh viên [$i] là: ".$ma_sv_l[$i]."<br/>";
			$sv_tc_sv = (new TongDiemChitiet)->TDiem($ma_sv_l[$i]);

			$TongSTC = 0;
			$TongHDS = 0;

			foreach ($sv_tc_sv as $value) {
				$diemHP = round((($value['diem_giua_ky']) + ($value['diem_thi_hp'])) / 2, 1);
				$diemchu = (new TongDiemChitiet)->DC($diemHP);
				$diemheso = (new TongDiemChitiet)->HDS($diemHP);
				$monhoc += 1;
				$TinhDHS = $diemheso;
				$TongHDS += $TinhDHS;
			}

			$tbtk = round($TongHDS / $monhoc, 2);
			$xltk = (new TongDiemChitiet)->XL_TK($TongHDS / $monhoc);
			$TB_Toankhoa = $tbtk;
			$XL_Toankhoa = $xltk;

			array_push($sv[$i], $TB_Toankhoa, $XL_Toankhoa);
			$sv[$i] += ['TB_Toankhoa' => $TB_Toankhoa, 'XL_Toankhoa' => $XL_Toankhoa];
		}

		//$taokey = array_combine($keyarr, $TSTC);
		// $ktra_key = array_keys($TSTC);
		// $gopmang = array_merge($sv, $arr);
		// echo "<pre>";
		// print_r($sv);
		require_once 'View/thongke.php';
		break;
	default:
		echo "Trang không tồn tại";
		break;
}
