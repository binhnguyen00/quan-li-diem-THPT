-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 22, 2022 lúc 10:12 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_diem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ban`
--

CREATE TABLE `ban` (
  `MaBan` varchar(10) NOT NULL,
  `TenBan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ban`
--

INSERT INTO `ban` (`MaBan`, `TenBan`) VALUES
('A', 'A'),
('A1', 'A1'),
('B', 'B'),
('C', 'C'),
('D', 'D'),
('D1', 'D1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baocao`
--

CREATE TABLE `baocao` (
  `Ma_bc` varchar(10) NOT NULL,
  `Ma_gv` varchar(10) NOT NULL,
  `Ten_tk` varchar(100) NOT NULL,
  `NgayLap` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

CREATE TABLE `diem` (
  `Ma_bd` varchar(10) NOT NULL,
  `Ma_hs` varchar(10) NOT NULL,
  `MaLop` varchar(10) NOT NULL,
  `Ma_mh` varchar(10) NOT NULL,
  `Ma_hk` varchar(10) NOT NULL,
  `Diem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `Ma_gv` varchar(10) NOT NULL,
  `MaLop` varchar(10) NOT NULL,
  `Ma_mh` varchar(10) NOT NULL,
  `Ten_gv` varchar(50) NOT NULL,
  `SĐT` varchar(10) NOT NULL,
  `DiaChi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocki`
--

CREATE TABLE `hocki` (
  `Ma_hk` varchar(10) NOT NULL,
  `Ten_hk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocki`
--

INSERT INTO `hocki` (`Ma_hk`, `Ten_hk`) VALUES
('1', 'Học kì 1'),
('2', 'Học kì 2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocsinh`
--

CREATE TABLE `hocsinh` (
  `Ma_hs` varchar(10) NOT NULL,
  `Ma_gv` varchar(10) NOT NULL,
  `Ten_hs` varchar(50) NOT NULL,
  `SĐT_PH` varchar(50) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitaikhoan`
--

CREATE TABLE `loaitaikhoan` (
  `Ma_ltk` varchar(10) NOT NULL,
  `Ten_ltk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaitaikhoan`
--

INSERT INTO `loaitaikhoan` (`Ma_ltk`, `Ten_ltk`) VALUES
('A01', 'Tài khoản giáo viên'),
('B01', 'Tài khoản học sinh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `MaLop` varchar(10) NOT NULL,
  `MaBan` varchar(10) NOT NULL,
  `TenLop` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `Ma_mh` varchar(10) NOT NULL,
  `Ten_mh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`Ma_mh`, `Ten_mh`) VALUES
('1', 'Toán'),
('10', 'GD quốc phòng & an ninh'),
('11', 'Thể dục'),
('12', 'Công nghệ'),
('13', 'Tin học'),
('2', 'Ngữ Văn '),
('3', 'Sinh học'),
('4', 'Vật lí'),
('5', 'Hóa học'),
('6', 'Lịch sử'),
('7', 'Địa lý'),
('8', 'Tiếng anh'),
('9', 'GDCD');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `Ma_tk` varchar(10) NOT NULL,
  `Ma_ltk` varchar(10) NOT NULL,
  `Ten_tk` varchar(100) NOT NULL,
  `Matkhau` varchar(100) NOT NULL,
  `Hovaten` varchar(255) NOT NULL,
  `Ngaylap` date NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`Ma_tk`, `Ma_ltk`, `Ten_tk`, `Matkhau`, `Hovaten`, `Ngaylap`, `Email`) VALUES
('', 'B01', 'A', '827ccb0eea8a706c4c34a16891f84e7b', 'Phạm  Tiến Đạt', '0000-00-00', 'tiendatpham655@gmail.com'),
('1', 'A01', 'Nguyễn Văn A', '123456', '', '2022-03-16', 'tiendatpham2000@gmail.com'),
('2', 'B01', 'Nguyễn Hoàng C', '654321', '', '2022-03-16', 'tiendatpham655@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`MaBan`);

--
-- Chỉ mục cho bảng `baocao`
--
ALTER TABLE `baocao`
  ADD PRIMARY KEY (`Ma_bc`),
  ADD KEY `Ma_gv` (`Ma_gv`);

--
-- Chỉ mục cho bảng `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`Ma_bd`),
  ADD KEY `MaLop` (`MaLop`),
  ADD KEY `Ma_hk` (`Ma_hk`),
  ADD KEY `Ma_hs` (`Ma_hs`),
  ADD KEY `Ma_mh` (`Ma_mh`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`Ma_gv`),
  ADD KEY `MaLop` (`MaLop`),
  ADD KEY `Ma_mh` (`Ma_mh`);

--
-- Chỉ mục cho bảng `hocki`
--
ALTER TABLE `hocki`
  ADD PRIMARY KEY (`Ma_hk`);

--
-- Chỉ mục cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`Ma_hs`),
  ADD KEY `Ma_gv` (`Ma_gv`);

--
-- Chỉ mục cho bảng `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  ADD PRIMARY KEY (`Ma_ltk`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MaLop`),
  ADD KEY `MaBan` (`MaBan`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`Ma_mh`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`Ma_tk`),
  ADD KEY `Ma_ltk` (`Ma_ltk`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baocao`
--
ALTER TABLE `baocao`
  ADD CONSTRAINT `baocao_ibfk_1` FOREIGN KEY (`Ma_gv`) REFERENCES `giaovien` (`Ma_gv`);

--
-- Các ràng buộc cho bảng `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `diem_ibfk_1` FOREIGN KEY (`MaLop`) REFERENCES `lop` (`MaLop`),
  ADD CONSTRAINT `diem_ibfk_2` FOREIGN KEY (`Ma_hk`) REFERENCES `hocki` (`Ma_hk`),
  ADD CONSTRAINT `diem_ibfk_3` FOREIGN KEY (`Ma_hs`) REFERENCES `hocsinh` (`Ma_hs`),
  ADD CONSTRAINT `diem_ibfk_4` FOREIGN KEY (`Ma_mh`) REFERENCES `monhoc` (`Ma_mh`);

--
-- Các ràng buộc cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD CONSTRAINT `giaovien_ibfk_1` FOREIGN KEY (`MaLop`) REFERENCES `lop` (`MaLop`),
  ADD CONSTRAINT `giaovien_ibfk_2` FOREIGN KEY (`Ma_mh`) REFERENCES `monhoc` (`Ma_mh`);

--
-- Các ràng buộc cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD CONSTRAINT `hocsinh_ibfk_1` FOREIGN KEY (`Ma_gv`) REFERENCES `giaovien` (`Ma_gv`);

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`MaBan`) REFERENCES `ban` (`MaBan`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`Ma_ltk`) REFERENCES `loaitaikhoan` (`Ma_ltk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
