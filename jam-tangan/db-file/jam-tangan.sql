-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 06:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jam-tangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` varchar(25) NOT NULL,
  `id_invoice` varchar(30) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`) VALUES
(29, '11', 'INV-56198869', 7, 'G-Shock GA-700CM-3ADR Army', 1, 700000),
(30, '11', 'INV-56198869', 9, 'G_Shock_GA700-1A.jpg', 1, 700000),
(31, '11', 'INV-56198869', 12, 'Daniel Wellington DW Classic Reading Rosegold', 1, 4000000),
(32, '12', 'INV-44155731', 7, 'G-Shock GA-700CM-3ADR Army', 1, 700000),
(33, '12', 'INV-75177210', 15, 'DW Classiic Durham Rose Gold', 1, 4000000),
(34, '12', 'INV-65027830', 16, 'DW Classiic Durham', 1, 2000000),
(35, '12', 'INV-19498005', 12, 'Daniel Wellington DW Classic Reading Rosegold', 1, 4000000),
(36, '12', 'INV-103741213', 12, 'Daniel Wellington DW Classic Reading Rosegold', 1, 4000000),
(37, '12', 'INV-26536380', 16, 'DW Classiic Durham', 1, 2000000),
(38, '12', 'INV-78036093', 12, 'Daniel Wellington DW Classic Reading Rosegold', 1, 4000000);

--
-- Triggers `cart`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `cart` FOR EACH ROW BEGIN
	UPDATE product SET stok = stok-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(10) NOT NULL,
  `nama` text NOT NULL,
  `pesan` text NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(7, 'G-Shock GA-700CM-3ADR Army', 'Jam Tangan', 'Gshock', 700000, 20, 'G_Shock_GA-700CM-3ADR_Army.jpg'),
(9, 'G_Shock_GA700-1A', 'Jam Tangan', 'Gshock', 700000, 22, 'G_Shock_GA700-1A1.jpg'),
(12, 'Daniel Wellington DW Classic Reading Rosegold', 'Jam Tangan', 'Danielwellington', 4000000, 20, 'Daniel_Wellington_DW_Classic_Reading_Rosegold.jpg'),
(13, 'G-SHOCK GA-835 1ADR', 'Jam Tangan', 'Gshock', 835000, 15, 'G-SHOCK_GA-835_1ADR.jpg'),
(14, 'DW Clasic Sheffield', 'Jam Tangan', 'Danielwellington', 4000000, 15, 'dw_classic_sheffield.jpg'),
(15, 'DW Classiic Durham Rose Gold', 'Jam Tangan', 'Danielwellington', 4000000, 22, 'dw_classic_durham_special_rose_gold.jpg'),
(16, 'DW Classiic Durham', 'Jam Tangan', 'Danielwellington', 2000000, 22, 'dw_classic_durham.jpg'),
(17, 'DW Classiic Sheffield Special Black', 'Jam Tangan', 'Danielwellington', 2000000, 10, 'dw_classic_sheffield_special_black.jpg'),
(18, 'G-Shock G-8900A 1DR', 'Jam Tangan', 'Gshock', 700000, 23, 'G-SHOCK_G-8900A_1DR.jpg'),
(19, 'G-Shock DW-5600BB-1D', 'Jam Tangan', 'Gshock', 560000, 15, 'G-shock_DW-5600BB-1D.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `order_id` char(30) NOT NULL,
  `id_user` varchar(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `mobile_phone` varchar(15) NOT NULL,
  `city` varchar(255) NOT NULL,
  `kode_pos` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `ekspedisi` varchar(100) NOT NULL,
  `tracking_id` varchar(30) NOT NULL,
  `transaction_time` datetime DEFAULT NULL,
  `payment_limit` datetime DEFAULT NULL,
  `status` varchar(2) NOT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`order_id`, `id_user`, `name`, `email`, `alamat`, `mobile_phone`, `city`, `kode_pos`, `payment_method`, `ekspedisi`, `tracking_id`, `transaction_time`, `payment_limit`, `status`, `gambar`) VALUES
('INV-26536380', '12', 'customer', 'customer@gmail.com', 'Subang nih Deck', '0858-5576-9838', 'Subang', '19921', 'Direct Bank Transfer', 'ANTERAJA', '826043051434', '2022-12-10 18:56:07', '2022-12-11 18:56:07', '0', 'bukti10.png'),
('INV-75177210', '12', 'customer', 'customer@gmail.com', 'Jl.aziza rahma', '0858-xxxx-xxxx', 'Bekasi', '17123', 'Direct Bank Transfer', 'JNE', '1016795357016', '2022-12-10 08:48:02', '2022-12-11 08:48:02', '1', 'bukti7.png'),
('INV-78036093', '12', 'customer', 'customer@gmail.com', 'gayatri', '085159807765', 'Bogor', '19928', 'Direct Bank Transfer', 'GRAB-SEND', '769622995988', '2022-12-10 18:57:17', '2022-12-11 18:57:17', '0', 'bukti12.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`, `level`, `avatar`) VALUES
(6, 'Miskin Pride', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1', 'user.png'),
(12, 'customer', 'customer@gmail.com', '7815696ecbf1c96e6894b779456d330e', '2', 'user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
