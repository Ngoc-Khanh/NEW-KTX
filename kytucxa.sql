-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2024 at 05:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kytucxa`
--

-- --------------------------------------------------------

--
-- Table structure for table `chuyenphong`
--

CREATE TABLE `chuyenphong` (
  `MaDK` int(11) NOT NULL,
  `MaSV` varchar(20) NOT NULL,
  `MaPhong` varchar(20) NOT NULL,
  `MaPhongChuyen` varchar(20) NOT NULL,
  `LyDo` varchar(50) NOT NULL,
  `TinhTrang` varchar(50) NOT NULL,
  `NgayChuyen` date NOT NULL,
  `NgayDangKy` date NOT NULL,
  `LanChuyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chuyenphong`
--

INSERT INTO `chuyenphong` (`MaDK`, `MaSV`, `MaPhong`, `MaPhongChuyen`, `LyDo`, `TinhTrang`, `NgayChuyen`, `NgayDangKy`, `LanChuyen`) VALUES
(2, 'SV2', 'C101', 'A101', 'phòng quá to', 'chưa duyệt', '2023-10-30', '2023-10-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cosovatchat`
--

CREATE TABLE `cosovatchat` (
  `MaCSVC` varchar(20) NOT NULL,
  `TenCSVC` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cosovatchat`
--

INSERT INTO `cosovatchat` (`MaCSVC`, `TenCSVC`) VALUES
('csvc1', 'tủ'),
('csvc2', 'điều hòa'),
('csvc3', 'giường'),
('csvc4', 'quạt điện');

-- --------------------------------------------------------

--
-- Table structure for table `csvc_phong`
--

CREATE TABLE `csvc_phong` (
  `ID` int(11) NOT NULL,
  `MaPhong` varchar(20) NOT NULL,
  `MaCSVC` varchar(20) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GhiChu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `csvc_phong`
--

INSERT INTO `csvc_phong` (`ID`, `MaPhong`, `MaCSVC`, `SoLuong`, `GhiChu`) VALUES
(9, 'A101', 'csvc2', 2, 'tốt'),
(10, 'B101', 'csvc2', 3, 'tốt'),
(11, 'A102', 'csvc4', 2, 'tốt'),
(12, 'D102', 'csvc1', 1, 'tốt'),
(13, 'C101', 'csvc3', 2, 'tốt');

-- --------------------------------------------------------

--
-- Table structure for table `dangkyphong`
--

CREATE TABLE `dangkyphong` (
  `MaDK` int(20) NOT NULL,
  `MaSV` varchar(20) NOT NULL,
  `MaPhong` varchar(20) NOT NULL,
  `MaNV` varchar(50) DEFAULT NULL,
  `NgayDangKy` date NOT NULL,
  `NgayTraPhong` date DEFAULT NULL,
  `TinhTrang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dangkyphong`
--

INSERT INTO `dangkyphong` (`MaDK`, `MaSV`, `MaPhong`, `MaNV`, `NgayDangKy`, `NgayTraPhong`, `TinhTrang`) VALUES
(3, 'SV1', 'A102', 'NV1', '2023-10-03', NULL, 'đã duyệt'),
(4, 'SV2', 'C101', 'NV1', '2023-10-11', NULL, 'đã duyệt'),
(5, 'SV1', 'A102', NULL, '2024-09-18', NULL, 'chưa duyệt'),
(6, 'SV1', 'A102', NULL, '2024-09-18', NULL, 'chưa duyệt');

-- --------------------------------------------------------

--
-- Table structure for table `guixe`
--

CREATE TABLE `guixe` (
  `MaSV` varchar(20) NOT NULL,
  `HoTen` varchar(20) NOT NULL,
  `LoaiXe` varchar(20) NOT NULL,
  `MauXe` varchar(20) NOT NULL,
  `BienSo` varchar(20) NOT NULL,
  `TinhTrang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guixe`
--

INSERT INTO `guixe` (`MaSV`, `HoTen`, `LoaiXe`, `MauXe`, `BienSo`, `TinhTrang`) VALUES
('SV1', 'Lê Tuấn Hiệp', 'wave', 'đỏ', '14a-32846', 'Đã thanh toán'),
('SV2', 'Hoàng Hải Nam', 'vision', 'đen', '29b-453672', 'Chưa thanh toán');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(20) NOT NULL,
  `MaPhong` varchar(20) NOT NULL,
  `Thang` int(11) NOT NULL,
  `TienDien` decimal(10,0) NOT NULL,
  `TienNuoc` decimal(10,0) NOT NULL,
  `TienMang` decimal(10,0) NOT NULL,
  `TinhTrang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `MaPhong`, `Thang`, `TienDien`, `TienNuoc`, `TienMang`, `TinhTrang`) VALUES
(1, 'A101', 10, 500000, 200000, 100000, 'chưa thanh toán'),
(2, 'A102', 10, 300000, 100000, 100000, 'chưa thanh toán');

-- --------------------------------------------------------

--
-- Table structure for table `khu`
--

CREATE TABLE `khu` (
  `MaKhu` varchar(20) NOT NULL,
  `TenKhu` varchar(20) NOT NULL,
  `GioiTinh` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khu`
--

INSERT INTO `khu` (`MaKhu`, `TenKhu`, `GioiTinh`) VALUES
('A', 'Khu A', 'nam'),
('B', 'Khu B', 'nam'),
('C', 'Khu C', 'nữ'),
('D', 'Khu D', 'nữ');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `created_at`, `image_url`) VALUES
(1, 'Lời chúc đến mọi người', 'Chúc mọi người thi tốt nhé', '2023-10-17 18:08:10', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.studytienganh.vn%2Fnews%2F2260%2Fchuc-mung-trong-tieng-anh-la-gi-dinh-nghia-vi-du-anh-viet&psig=AOvVaw3bwAsH91VzssDJwpyoM5x0&ust=1697652469907000&source=images&cd=vfe&opi=89978449&ved=0CBMQjRxqFwoTCODO');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` varchar(20) NOT NULL,
  `HoTen` varchar(20) NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `SDT` text NOT NULL,
  `TenDangNhap` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `HoTen`, `NgaySinh`, `DiaChi`, `SDT`, `TenDangNhap`) VALUES
('NV1', 'Nguyễn Hải Ninh', '2014-09-01', 'Thanh Hóa', '0987456378', 'NV1');

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `MaPhong` varchar(20) NOT NULL,
  `MaKhu` varchar(20) NOT NULL,
  `SoNguoiToiDa` int(11) NOT NULL,
  `SoNguoiHienTai` int(11) NOT NULL,
  `Gia` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`MaPhong`, `MaKhu`, `SoNguoiToiDa`, `SoNguoiHienTai`, `Gia`) VALUES
('A101', 'A', 8, 0, 600000),
('A102', 'A', 6, 1, 700000),
('B101', 'B', 8, 0, 600000),
('C101', 'C', 6, 1, 700000),
('D102', 'D', 6, 0, 700000);

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MaSV` varchar(20) NOT NULL,
  `HoTen` varchar(20) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` varchar(20) DEFAULT NULL,
  `DiaChi` varchar(20) DEFAULT NULL,
  `SDT` int(11) DEFAULT NULL,
  `Mail` varchar(20) DEFAULT NULL,
  `MaPhong` varchar(20) DEFAULT NULL,
  `TenKhu` varchar(20) DEFAULT NULL,
  `TenDangNhap` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`MaSV`, `HoTen`, `NgaySinh`, `GioiTinh`, `DiaChi`, `SDT`, `Mail`, `MaPhong`, `TenKhu`, `TenDangNhap`) VALUES
('SV1', 'Lê Tuấn Hiệp', '2013-08-14', 'nam', 'quang ninh', 345678985, 'letuanhiep@gmail.com', 'A102', 'Khu A', 'SV1'),
('SV2', 'Hoàng Hải Nam', '2014-10-06', 'nam', 'ý yên', 356758474, 'hoanghainam@gmail.co', 'C101', 'Khu C', 'SV2'),
('SV3', 'Nguyễn Như Quỳnh', '2015-09-06', 'nữ', 'quang ninh', 345678321, 'nguyennhuquynh@gmail', NULL, NULL, 'SV3');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `TenDangNhap` varchar(20) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `TenLTK` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`TenDangNhap`, `MatKhau`, `TenLTK`) VALUES
('NV1', 'NV1', 'nv'),
('NV2', 'NV2', 'nv'),
('SV1', 'SV1', 'sv'),
('SV2', 'SV2', 'sv'),
('SV3', 'SV3', 'sv'),
('SV4', 'SV4', 'sv');

-- --------------------------------------------------------

--
-- Table structure for table `thongbao`
--

CREATE TABLE `thongbao` (
  `MaTB` int(11) NOT NULL,
  `MaSV` varchar(20) DEFAULT NULL,
  `TieuDe` varchar(50) DEFAULT NULL,
  `NoiDung` varchar(500) DEFAULT NULL,
  `NgayTB` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thongbao`
--

INSERT INTO `thongbao` (`MaTB`, `MaSV`, `TieuDe`, `NoiDung`, `NgayTB`) VALUES
(1, 'SV1', 'Thông báo thanh toán hóa đơn', 'Thông báo bạn đã thanh toán hóa đơn thành công', '2023-10-18'),
(2, 'SV1', 'Thông báo đăng kí phòng', 'Thông báo bạn đã đăng kí phòng thành công', '2023-10-18'),
(3, 'SV1', 'Thông Báo Trả Phòng', 'Yêu cầu trả phòng của bạn không được phê duyệt. Mọi thắc mắc vui lòng lên gặp Nhân viên Ký túc xá để biết thêm chi tiết. Xin cảm ơn !2023-10-18 4:1:32', '2023-10-18'),
(4, 'SV1', 'Thông Báo Trả Phòng', 'Yêu cầu trả phòng của bạn không được phê duyệt. Mọi thắc mắc vui lòng lên gặp Nhân viên Ký túc xá để biết thêm chi tiết. Xin cảm ơn !2023-10-18 4:3:14', '2023-10-18'),
(5, 'SV1', 'Thông Báo Chuyển Phòng', 'Yêu cầu chuyển phòng của bạn không được phê duyệt. Mọi thắc mắc vui lòng lên gặp Nhân viên Ký túc xá để biết thêm chi tiết. Xin cảm ơn !2023-10-18 4:4:20', '2023-10-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chuyenphong`
--
ALTER TABLE `chuyenphong`
  ADD PRIMARY KEY (`MaDK`),
  ADD KEY `MaPhong` (`MaPhong`),
  ADD KEY `MaSV` (`MaSV`);

--
-- Indexes for table `cosovatchat`
--
ALTER TABLE `cosovatchat`
  ADD PRIMARY KEY (`MaCSVC`);

--
-- Indexes for table `csvc_phong`
--
ALTER TABLE `csvc_phong`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MaPhong` (`MaPhong`),
  ADD KEY `MaCSVC` (`MaCSVC`);

--
-- Indexes for table `dangkyphong`
--
ALTER TABLE `dangkyphong`
  ADD PRIMARY KEY (`MaDK`),
  ADD KEY `MaSV` (`MaSV`),
  ADD KEY `MaPhong` (`MaPhong`),
  ADD KEY `MaNV` (`MaNV`);

--
-- Indexes for table `guixe`
--
ALTER TABLE `guixe`
  ADD PRIMARY KEY (`BienSo`),
  ADD KEY `MaSV` (`MaSV`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `MaPhong` (`MaPhong`);

--
-- Indexes for table `khu`
--
ALTER TABLE `khu`
  ADD PRIMARY KEY (`MaKhu`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD KEY `TenDangNhap` (`TenDangNhap`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MaPhong`),
  ADD KEY `MaKhu` (`MaKhu`) USING BTREE;

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MaSV`),
  ADD KEY `MaPhong` (`MaPhong`) USING BTREE,
  ADD KEY `TenDangNhap` (`TenDangNhap`) USING BTREE;

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`TenDangNhap`);

--
-- Indexes for table `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`MaTB`),
  ADD KEY `MaSV` (`MaSV`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chuyenphong`
--
ALTER TABLE `chuyenphong`
  MODIFY `MaDK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `csvc_phong`
--
ALTER TABLE `csvc_phong`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dangkyphong`
--
ALTER TABLE `dangkyphong`
  MODIFY `MaDK` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `MaTB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chuyenphong`
--
ALTER TABLE `chuyenphong`
  ADD CONSTRAINT `chuyenphong_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`),
  ADD CONSTRAINT `chuyenphong_ibfk_2` FOREIGN KEY (`MaSV`) REFERENCES `sinhvien` (`MaSV`);

--
-- Constraints for table `csvc_phong`
--
ALTER TABLE `csvc_phong`
  ADD CONSTRAINT `csvc_phong_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`),
  ADD CONSTRAINT `csvc_phong_ibfk_2` FOREIGN KEY (`MaCSVC`) REFERENCES `cosovatchat` (`MaCSVC`);

--
-- Constraints for table `dangkyphong`
--
ALTER TABLE `dangkyphong`
  ADD CONSTRAINT `dangkyphong_ibfk_1` FOREIGN KEY (`MaSV`) REFERENCES `sinhvien` (`MaSV`),
  ADD CONSTRAINT `dangkyphong_ibfk_2` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`),
  ADD CONSTRAINT `dangkyphong_ibfk_3` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`);

--
-- Constraints for table `guixe`
--
ALTER TABLE `guixe`
  ADD CONSTRAINT `guixe_ibfk_1` FOREIGN KEY (`MaSV`) REFERENCES `sinhvien` (`MaSV`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`TenDangNhap`) REFERENCES `taikhoan` (`TenDangNhap`);

--
-- Constraints for table `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`MaKhu`) REFERENCES `khu` (`MaKhu`);

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`),
  ADD CONSTRAINT `sinhvien_ibfk_2` FOREIGN KEY (`TenDangNhap`) REFERENCES `taikhoan` (`TenDangNhap`);

--
-- Constraints for table `thongbao`
--
ALTER TABLE `thongbao`
  ADD CONSTRAINT `thongbao_ibfk_1` FOREIGN KEY (`MaSV`) REFERENCES `sinhvien` (`MaSV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
