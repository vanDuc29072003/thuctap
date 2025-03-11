-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2025 at 05:07 AM
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
-- Database: `thuctap`
--

-- --------------------------------------------------------

--
-- Table structure for table `bophan`
--

CREATE TABLE `bophan` (
  `MaBoPhan` int(11) NOT NULL,
  `TenBoPhan` varchar(100) DEFAULT NULL,
  `MaPhanQuyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bophan`
--

INSERT INTO `bophan` (`MaBoPhan`, `TenBoPhan`, `MaPhanQuyen`) VALUES
(1, 'Bo phan quan ly', 2),
(2, 'Bo phan van hanh', 3),
(3, 'Bo phan ki thuat ', 4),
(4, 'Bo phan kho', 5),
(5, 'Quan tri vien', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lichbaotri`
--

CREATE TABLE `lichbaotri` (
  `MaLichBaoTri` int(11) NOT NULL,
  `TenLichBaoTri` varchar(100) DEFAULT NULL,
  `MoTa` varchar(255) DEFAULT NULL,
  `NgayBaoTri` datetime DEFAULT NULL,
  `TinhTrang` varchar(50) DEFAULT NULL,
  `MaMay` int(11) DEFAULT NULL,
  `MaNhanVien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `linhkiensuachua`
--

CREATE TABLE `linhkiensuachua` (
  `MaLinhKien` int(11) NOT NULL,
  `TenLinhKien` varchar(100) DEFAULT NULL,
  `MoTa` varchar(255) DEFAULT NULL,
  `GiaThanh` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `DonViTinh` varchar(100) DEFAULT NULL,
  `NhaCungCap` varchar(100) DEFAULT NULL,
  `Kho` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `linhkiensuachua`
--

INSERT INTO `linhkiensuachua` (`MaLinhKien`, `TenLinhKien`, `MoTa`, `GiaThanh`, `SoLuong`, `DonViTinh`, `NhaCungCap`, `Kho`) VALUES
(1, 'Đầu in', 'Bộ phận in chính của máy in offset', 5000000, 101, 'Cái', 'Công ty Ajiko', 'Kho 1'),
(2, 'Trục lô mực', 'Trục quay giúp chuyển mực lên bề mặt in', 1200000, 20, 'Cái', 'Công ty Simsum', 'Kho 2'),
(3, 'Hệ thống cấp mực', 'Cung cấp mực in từ hộp chứa đến trục lô mực', 800000, 15, 'Bộ', 'Công ty Croka\r\n', 'Kho 3'),
(4, 'Bản in offset', 'Tấm bản in bằng kim loại dùng trong in offset', 300000, 50, 'Tấm', 'Công ty Daiko', 'Kho 1'),
(5, 'Motor kéo giấy', 'Động cơ kéo giấy qua các trục lô trong quá trình in', 2500000, 5, 'Cái', 'Công ty Baiko', 'Kho 2'),
(6, 'Lưỡi dao cắt', 'Lưỡi dao chuyên dụng để cắt giấy theo yêu cầu', 700000, 30, 'Cái', 'Công ty Fuji', 'Kho 1'),
(7, 'Khuôn bế', 'Khuôn dùng để dập và tạo hình sản phẩm in', 1500000, 10, 'Bộ', 'Công ty Fuji', 'Kho 3'),
(8, 'Trục ép nhiệt', 'Trục lăn có tác dụng ép nhiệt trong quá trình in', 2200000, 8, 'Cái', 'Công ty Ajiko', 'Kho 2'),
(9, 'Con lăn ép keo', 'Con lăn giúp dán keo lên bề mặt sản phẩm', 900000, 25, 'Cái', 'Công ty Ajiko', 'Kho 3'),
(10, 'Hệ thống hút giấy', 'Dùng để hút giấy từ khay và đưa vào máy in', 3200000, 7, 'Bộ', 'Công ty Simsum', 'Kho 1'),
(11, 'Hệ thống làm khô', 'Bộ phận giúp sấy khô mực in nhanh chóng', 2800000, 6, 'Bộ', 'Công ty Baiko', 'Kho 2'),
(12, 'Bộ điều khiển điện', 'Mạch điện điều khiển hoạt động của máy', 1800000, 12, 'Bộ', 'Công ty Baiko', 'Kho 3'),
(13, 'Cảm biến giấy', 'Cảm biến giúp nhận diện giấy trong máy in', 450000, 40, 'Cái', 'Công ty Baiko', 'Kho 1'),
(14, 'Dây curoa truyền động', 'Dây curoa kết nối và truyền lực giữa các bộ phận', 600000, 20, 'Sợi', 'Công ty Simsum', 'Kho 2'),
(15, 'Bộ phận phun dầu', 'Bộ phận giúp bôi trơn các trục quay', 750000, 15, 'Bộ', 'Công ty Croka', 'Kho 3'),
(16, 'Pin', 'Pin cho máy bắn vít', 500000, 70, 'Cái', 'Pinny', 'Kho 1 ');

-- --------------------------------------------------------

--
-- Table structure for table `may`
--

CREATE TABLE `may` (
  `MaMay` int(11) NOT NULL,
  `TenMay` varchar(100) DEFAULT NULL,
  `SeriMay` varchar(50) DEFAULT NULL,
  `ChuKyBaoTri` float DEFAULT NULL,
  `NamSanXuat` year(4) NOT NULL,
  `HangSanXuat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `may`
--

INSERT INTO `may` (`MaMay`, `TenMay`, `SeriMay`, `ChuKyBaoTri`, `NamSanXuat`, `HangSanXuat`) VALUES
(1, 'Máy in ', 'OF12345XYZ', 4, '2000', 'Ajax'),
(2, 'Máy bế ', 'CG98765ABC', 101, '2001', 'Cannon'),
(3, 'May cắt giấy', 'BH45678DEF', 2, '2005', 'Bimmum'),
(4, 'Máy ép kim', 'EK78901PQR', 7, '2023', 'Konica Minolta'),
(5, 'Máy cán màng', 'CM65432STU', 5, '2021', 'Roland'),
(6, 'Máy xén giấy', 'XG32109VWX', 8, '2019', 'Mimaki'),
(7, 'Máy dập nổi', 'DN23456YZA', 1, '2022', 'Fuji'),
(8, 'Máy in Flexo', 'FL87654BCD', 1, '2020', 'Heidelberg'),
(9, 'Máy ghép màng', 'GM43210EFG', 2, '2018', 'Kodak'),
(10, 'Máy bế ', 'TKHT2001HQ ', 2, '2023', 'Fuji'),
(17, 'Máy ép UV', 'TKHT2000HQ ', 2, '2023', 'Nagato'),
(42, 'Máy in', 'TKHT2009HQ ', 2, '2023', 'Toyota\r\n'),
(43, 'Máy ép sóng', 'TKHT2008HQ ', 2, '2023', 'Fuji');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` int(11) NOT NULL,
  `TenNhanVien` varchar(100) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `GioiTinh` varchar(10) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `SDT` bigint(20) DEFAULT NULL,
  `MaBoPhan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `TenNhanVien`, `DiaChi`, `Email`, `GioiTinh`, `NgaySinh`, `SDT`, `MaBoPhan`) VALUES
(101, 'Le Van Luyen', 'thon Trang Bang - huyen Trang Tan - tp Hue', 'luyen98989@gmail.com', 'Nam', '1997-03-03', 123432333, 5),
(102, 'Lo Van Hoa', 'xa Meo Ban - huyen Tuong Trung - tp Yen Bai', 'hoa2121@gmail.com', 'Nam', '1995-02-07', 987777456, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phanquyen`
--

CREATE TABLE `phanquyen` (
  `MaPhanQuyen` int(11) NOT NULL,
  `TenPhanQuyen` varchar(100) DEFAULT NULL,
  `MoTa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phanquyen`
--

INSERT INTO `phanquyen` (`MaPhanQuyen`, `TenPhanQuyen`, `MoTa`) VALUES
(1, 'admin', 'Quan tri vien he thong\r\n'),
(2, 'Quan ly', 'Quan ly xuong'),
(3, 'Nhan vien van hanh', NULL),
(4, 'Nhan vien ki thuat', NULL),
(5, 'Nhan vien kho', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `TenTaiKhoan` varchar(100) NOT NULL,
  `MatKhau` varchar(255) DEFAULT NULL,
  `MaNhanVien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`TenTaiKhoan`, `MatKhau`, `MaNhanVien`) VALUES
('ad101', 'admin101', 101);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bophan`
--
ALTER TABLE `bophan`
  ADD PRIMARY KEY (`MaBoPhan`),
  ADD KEY `MaPhanQuyen` (`MaPhanQuyen`);

--
-- Indexes for table `lichbaotri`
--
ALTER TABLE `lichbaotri`
  ADD PRIMARY KEY (`MaLichBaoTri`),
  ADD KEY `MaMay` (`MaMay`),
  ADD KEY `MaNhanVien` (`MaNhanVien`);

--
-- Indexes for table `linhkiensuachua`
--
ALTER TABLE `linhkiensuachua`
  ADD PRIMARY KEY (`MaLinhKien`);

--
-- Indexes for table `may`
--
ALTER TABLE `may`
  ADD PRIMARY KEY (`MaMay`),
  ADD UNIQUE KEY `SeriMay` (`SeriMay`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`),
  ADD KEY `MaBoPhan` (`MaBoPhan`);

--
-- Indexes for table `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`MaPhanQuyen`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`TenTaiKhoan`),
  ADD UNIQUE KEY `MaNhanVien` (`MaNhanVien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bophan`
--
ALTER TABLE `bophan`
  MODIFY `MaBoPhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lichbaotri`
--
ALTER TABLE `lichbaotri`
  MODIFY `MaLichBaoTri` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `linhkiensuachua`
--
ALTER TABLE `linhkiensuachua`
  MODIFY `MaLinhKien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `may`
--
ALTER TABLE `may`
  MODIFY `MaMay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `MaPhanQuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bophan`
--
ALTER TABLE `bophan`
  ADD CONSTRAINT `bophan_ibfk_1` FOREIGN KEY (`MaPhanQuyen`) REFERENCES `phanquyen` (`MaPhanQuyen`) ON DELETE SET NULL;

--
-- Constraints for table `lichbaotri`
--
ALTER TABLE `lichbaotri`
  ADD CONSTRAINT `lichbaotri_ibfk_1` FOREIGN KEY (`MaMay`) REFERENCES `may` (`MaMay`) ON DELETE CASCADE,
  ADD CONSTRAINT `lichbaotri_ibfk_2` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`) ON DELETE SET NULL;

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`MaBoPhan`) REFERENCES `bophan` (`MaBoPhan`) ON DELETE SET NULL;

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
