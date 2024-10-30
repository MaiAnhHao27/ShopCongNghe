-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 11, 2024 lúc 04:59 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webcongnghe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `mahh` int(11) NOT NULL COMMENT 'Mã hàng hóa',
  `tenhh` varchar(150) NOT NULL COMMENT 'Tên hàng hóa',
  `gia` float NOT NULL COMMENT 'Giá',
  `soluong` int(11) NOT NULL COMMENT 'Số lượng',
  `hinh` varchar(150) NOT NULL COMMENT 'Hình',
  `ngaytao` date NOT NULL COMMENT 'Ngày tạo',
  `mota` text NOT NULL COMMENT 'Mô tả',
  `trangthai` int(11) NOT NULL COMMENT 'Trạng thái',
  `ngaysua` date NOT NULL COMMENT 'Ngày sửa',
  `maloai` int(11) NOT NULL COMMENT 'Mã loại'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`mahh`, `tenhh`, `gia`, `soluong`, `hinh`, `ngaytao`, `mota`, `trangthai`, `ngaysua`, `maloai`) VALUES
(1, 'Máy tính.', 90000000, 3, 'abc.webp', '2024-06-11', 'Máy tính xịn', 1, '2024-06-11', 2),
(2, 'Cây máy tính', 105000000, 4, 'aaa.webp', '2024-06-11', 'Máy tính đẹp', 0, '2024-06-11', 2),
(3, 'IP15', 35000000, 5, 'iphone-15-pro-max_3.webp', '2024-06-11', 'IP11 đẹp', 0, '2024-06-11', 1),
(4, 'Đồng hồ', 8752000, 8, 'dong-ho-thong-minh-huawei-watch-gt-4-day-silicone-thumb.webp', '2024-06-11', 'Đồng hồ đẹp', 0, '0000-00-00', 3),
(5, 'IP14 pro', 25000000, 5, 'iphone-14-pro_2__5.webp', '2024-06-11', 'Đẹp, xịn', 0, '0000-00-00', 1),
(6, 'điện thoại đẹp', 7850, 1, 'dien-thoai-tecno-camon-30-12gb-256gb_1.webp', '2024-06-11', 'dgdg', 0, '2024-06-11', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihang`
--

CREATE TABLE `loaihang` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaihang`
--

INSERT INTO `loaihang` (`maloai`, `tenloai`) VALUES
(1, 'Điện thoại'),
(2, 'Máy tính'),
(3, 'Đồng hồ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `matk` int(11) NOT NULL COMMENT 'Mã tài khoản',
  `tentk` varchar(150) NOT NULL COMMENT 'Tên tài khoản',
  `email` varchar(50) NOT NULL COMMENT 'Email',
  `matkhau` varchar(150) NOT NULL COMMENT 'Mật khẩu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`matk`, `tentk`, `email`, `matkhau`) VALUES
(1, 'hao', 'jnxsa', '123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`mahh`);

--
-- Chỉ mục cho bảng `loaihang`
--
ALTER TABLE `loaihang`
  ADD PRIMARY KEY (`maloai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `mahh` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã hàng hóa', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `loaihang`
--
ALTER TABLE `loaihang`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
