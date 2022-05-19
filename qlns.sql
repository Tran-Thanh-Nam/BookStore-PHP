-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 26, 2019 lúc 03:19 AM
-- Phiên bản máy phục vụ: 10.1.40-MariaDB
-- Phiên bản PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlns`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctphieunhap`
--

CREATE TABLE `ctphieunhap` (
  `ma_pn` int(11) NOT NULL,
  `ma_sach` int(11) NOT NULL,
  `so_luong` int(50) NOT NULL,
  `don_gia` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `ctphieunhap`
--

INSERT INTO `ctphieunhap` (`ma_pn`, `ma_sach`, `so_luong`, `don_gia`) VALUES
(1, 1, 50, 60),
(2, 2, 10, 5),
(1, 1, 50, 60),
(2, 2, 10, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctphieuxuat`
--

CREATE TABLE `ctphieuxuat` (
  `ma_px` int(11) NOT NULL,
  `ma_sach` int(11) NOT NULL,
  `so_luong` int(50) NOT NULL,
  `don_gia` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `ctphieuxuat`
--

INSERT INTO `ctphieuxuat` (`ma_px`, `ma_sach`, `so_luong`, `don_gia`) VALUES
(1, 1, 20, 5),
(2, 2, 50, 6),
(1, 1, 20, 5),
(2, 2, 50, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `ma_kh` int(11) NOT NULL,
  `ten_kh` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `dia_chi` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`ma_kh`, `ten_kh`, `dia_chi`, `sdt`, `username`, `password`, `quyen`) VALUES
(1, 'nam', 'long', '123', 'admin', '123', 0),
(2, 'hoang', 'quangtrung', '4567', 'hoang', '123', 1),
(3, 'son', 'q5', '1234', 'son', '123', 1),
(4, 'tu', '25/c', '456789', 'tu', '123', 1),
(5, 'vinh', 'longbinh', '123', 'vinh', '123', 1),
(6, 'toi', 'longbinh', '123', 'toi', '123', 1),
(7, 'dong', '25', '123', 'nam', '123', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `ma_nv` int(11) NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `ngay_sinh` date NOT NULL,
  `sdt` varchar(15) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`ma_nv`, `ho_ten`, `ngay_sinh`, `sdt`) VALUES
(1, 'nam', '1998-12-17', '123456'),
(2, 'hoang', '1997-06-22', '789654'),
(3, 'toi', '2019-12-03', '123'),
(4, 'tu', '2019-12-03', '123'),
(5, 'vinh', '2019-12-03', '123'),
(6, 'son', '2019-12-03', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nxb`
--

CREATE TABLE `nxb` (
  `ma_nxb` int(11) NOT NULL,
  `ten_nxb` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `dia_chi` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nxb`
--

INSERT INTO `nxb` (`ma_nxb`, `ten_nxb`, `dia_chi`, `email`) VALUES
(1, 'nam', '25/c Thái Bình 1, Phường Long Bình, Quận 9, Tp Hồ Chí Minh', 'namtt1998@gmail.com'),
(2, 'hoang', 'quangtrung', 'hoangnguyen'),
(3, 'kimdong', 'kimdong', 'kimdong@gmail'),
(4, 'namtran', 'namtran', 'namtran@gmail.com'),
(5, 'son', 'son', 'son@gmail.com'),
(6, 'toi', 'toi', 'toi@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `ma_pn` int(11) NOT NULL,
  `ma_nv` int(11) NOT NULL,
  `ngay_nhap` date NOT NULL,
  `ma_sach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`ma_pn`, `ma_nv`, `ngay_nhap`, `ma_sach`) VALUES
(1, 5, '2019-12-04', 5),
(2, 5, '2019-12-04', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxuat`
--

CREATE TABLE `phieuxuat` (
  `ma_px` int(11) NOT NULL,
  `ma_nv` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ngay_xuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phieuxuat`
--

INSERT INTO `phieuxuat` (`ma_px`, `ma_nv`, `ma_kh`, `ngay_xuat`) VALUES
(1, 5, 5, '2019-12-05'),
(2, 6, 6, '2019-12-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `ma_sach` int(11) NOT NULL,
  `ten_sach` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `ma_tac_gia` int(11) NOT NULL,
  `ma_the_loai` int(11) NOT NULL,
  `ma_nxb` int(11) NOT NULL,
  `nam_xb` datetime NOT NULL,
  `gia` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `hinhanh` varchar(225) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`ma_sach`, `ten_sach`, `ma_tac_gia`, `ma_the_loai`, `ma_nxb`, `nam_xb`, `gia`, `tinhtrang`, `hinhanh`) VALUES
(1, 'toan2', 5, 5, 5, '1998-02-02 00:00:00', 5000, 1, 'https://sachgiai.com/uploads/book/sach-giao-khoa-toan-2/sach-giao-khoa-toan-2-0.jpg'),
(2, 'truyenma', 6, 6, 6, '1998-06-22 00:00:00', 6, 0, 'https://tamlinh.org/upload/images/post/2019-10/oan%20hon%20duoi%20gieng%20p19.jpg'),
(3, 'tamcam', 6, 8, 6, '1998-06-22 00:00:00', 6, 1, 'http://huyhoangbook.vn/wp-content/uploads/2018/01/605_130001019576722500_TruyentranhCotichVNhaynhat_T3_TamCam.jpg'),
(4, 'doremon', 5, 8, 5, '1998-12-17 00:00:00', 10, 1, 'https://i.pinimg.com/736x/e3/f3/4d/e3f34de992ae4267f272550a5935447f.jpg'),
(5, 'hocvan', 6, 8, 6, '1996-02-02 00:00:00', 5, 1, 'http://butbi.hocmai.vn/wp-content/uploads/2018/01/VH1.jpg'),
(6, 'tienganh', 6, 6, 6, '1999-03-03 00:00:00', 121, 1, 'https://vcdn-vnexpress.vnecdn.net/2019/02/11/English-jpeg-7152-1549878165.jpg'),
(7, 'nam', 5, 5, 5, '0000-00-00 00:00:00', 2147483647, 0, 'jdj');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tacgia`
--

CREATE TABLE `tacgia` (
  `ma_tac_gia` int(11) NOT NULL,
  `ten_tac_gia` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `website` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `ghichu` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tacgia`
--

INSERT INTO `tacgia` (`ma_tac_gia`, `ten_tac_gia`, `website`, `ghichu`) VALUES
(1, 'nam', 'namtt1998', 'deptrai'),
(2, 'toi', 'thach', 'thach'),
(3, 'son', 'son98', 'tml'),
(4, 'binh', 'binh98', 'tml'),
(5, 'vinh', 'vinh98', 'tml'),
(6, 'nam', 'namtt1998', 'dep'),
(7, 'thach', 'thach97', 'tml');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `ma_the_loai` int(11) NOT NULL,
  `ten_the_loai` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`ma_the_loai`, `ten_the_loai`) VALUES
(1, 'sach'),
(2, 'truyenma'),
(3, 'sachthieunhi'),
(4, 'sgk'),
(5, 'tomau'),
(6, 'yoga'),
(7, 'sgk1'),
(8, 'truyencuoi'),
(9, 'p'),
(10, 'nha');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD KEY `ma_pn` (`ma_pn`);

--
-- Chỉ mục cho bảng `ctphieuxuat`
--
ALTER TABLE `ctphieuxuat`
  ADD KEY `ma_px` (`ma_px`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`ma_nv`);

--
-- Chỉ mục cho bảng `nxb`
--
ALTER TABLE `nxb`
  ADD PRIMARY KEY (`ma_nxb`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`ma_pn`),
  ADD KEY `ma_sach` (`ma_sach`);

--
-- Chỉ mục cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD PRIMARY KEY (`ma_px`),
  ADD KEY `ma_kh` (`ma_kh`),
  ADD KEY `ma_nv` (`ma_nv`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`ma_sach`),
  ADD KEY `ma_nxb` (`ma_nxb`),
  ADD KEY `ma_the_loai` (`ma_the_loai`),
  ADD KEY `ma_tac_gia` (`ma_tac_gia`);

--
-- Chỉ mục cho bảng `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`ma_tac_gia`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`ma_the_loai`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD CONSTRAINT `ctphieunhap_ibfk_1` FOREIGN KEY (`ma_pn`) REFERENCES `phieunhap` (`ma_pn`);

--
-- Các ràng buộc cho bảng `ctphieuxuat`
--
ALTER TABLE `ctphieuxuat`
  ADD CONSTRAINT `ctphieuxuat_ibfk_1` FOREIGN KEY (`ma_px`) REFERENCES `phieuxuat` (`ma_px`);

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`ma_sach`) REFERENCES `sach` (`ma_sach`);

--
-- Các ràng buộc cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD CONSTRAINT `phieuxuat_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khachhang` (`ma_kh`),
  ADD CONSTRAINT `phieuxuat_ibfk_2` FOREIGN KEY (`ma_nv`) REFERENCES `nhanvien` (`ma_nv`);

--
-- Các ràng buộc cho bảng `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`ma_nxb`) REFERENCES `nxb` (`ma_nxb`),
  ADD CONSTRAINT `sach_ibfk_2` FOREIGN KEY (`ma_the_loai`) REFERENCES `theloai` (`ma_the_loai`),
  ADD CONSTRAINT `sach_ibfk_3` FOREIGN KEY (`ma_tac_gia`) REFERENCES `tacgia` (`ma_tac_gia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
