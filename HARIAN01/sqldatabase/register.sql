-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 12:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `order_session` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `id_menus_image` int(11) NOT NULL,
  `menus_name` varchar(100) NOT NULL,
  `price_list` double DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`order_session`, `id`, `id_menus_image`, `menus_name`, `price_list`, `date`) VALUES
('64bead022e0e1', 11, 3, 'Mie Godok kaldu sosis', 15000, '2023-07-24 23:55:30'),
('64bead2690894', 11, 2, 'Mie Ayam Jamur', 12000, '2023-07-24 23:56:06'),
('64bead387f99e', 11, 4, 'Indomie Jumbo Mie Goreng nikmat', 4000, '2023-07-24 23:56:24'),
('64bead41986fe', 11, 2, 'Mie Ayam Jamur', 12000, '2023-07-24 23:56:33'),
('64beae01479ff', 11, 9, 'Mie Goreng urak arik', 9000, '2023-07-24 23:59:45'),
('64beae7362e0f', 11, 14, 'Es Teh', 3000, '2023-07-25 00:01:39'),
('64beaf3b84417', 11, 8, 'Kwentiau udang rebus', 17000, '2023-07-25 00:04:59'),
('64beaf722f379', 13, 13, 'Es Jeruk', 4000, '2023-07-25 00:05:54'),
('64beb824cd421', 11, 4, 'Indomie Jumbo Mie Goreng nikmat', 4000, '2023-07-25 00:43:00'),
('64beba005d6c8', 13, 3, 'Mie Godok kaldu sosis', 15000, '2023-07-25 00:50:56'),
('64beba0956cff', 13, 14, 'Es Teh', 3000, '2023-07-25 00:51:05'),
('64bebb4e26ad3', 14, 2, 'Mie Ayam Jamur', 12000, '2023-07-25 00:56:30'),
('64bebb74b3a10', 14, 3, 'Mie Godok kaldu sosis', 15000, '2023-07-25 00:57:08'),
('64bebbf5bc6e3', 14, 14, 'Es Teh', 3000, '2023-07-25 00:59:17'),
('64bebc004947f', 14, 9, 'Mie Goreng urak arik', 9000, '2023-07-25 00:59:28'),
('64bebc542dd89', 14, 2, 'Mie Ayam Jamur', 12000, '2023-07-25 01:00:52'),
('64bebc5ee16bf', 14, 2, 'Mie Ayam Jamur', 12000, '2023-07-25 01:01:02'),
('64bebc98eaa8f', 14, 13, 'Es Jeruk', 4000, '2023-07-25 01:02:00'),
('64bef191b2f5d', 14, 3, 'Mie Godok kaldu sosis', 15000, '2023-07-25 04:48:01'),
('64c7e02552234', 13, 14, 'Es Teh', 3000, '2023-07-31 23:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `menus_image`
--

CREATE TABLE `menus_image` (
  `id_menus_image` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `kind` varchar(150) DEFAULT NULL,
  `tag` varchar(30) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `path` varchar(150) NOT NULL,
  `ext` varchar(10) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menus_image`
--

INSERT INTO `menus_image` (`id_menus_image`, `name`, `kind`, `tag`, `price`, `path`, `ext`, `size`, `date`) VALUES
(2, 'Mie Ayam Jamur', 'Mie ayam jamur merupakan olahan mie goreng Indomie dengan tambahan jamur tiram, kuah dan kaldu yang menggoda', 'mie goreng', 12000, 'media/images/64b7d7e598f50.png', 'image/png', 544703, '2023-07-19 19:32:37'),
(3, 'Mie Godok kaldu sosis', 'Mie Godok kali ini sangat spesial dengan taburan bawang, dan irisan sosis SoNice, kuah dengan perpaduan kaldu ayam dan saus macha', 'mie goreng', 15000, 'media/images/64b7d8e414ae6.png', 'image/png', 636290, '2023-07-19 19:36:52'),
(4, 'Indomie Jumbo Mie Goreng nikmat', 'Produk indomie yang ini merupakan unggulan untuk menyaingi produk mie instan rivalnya, Mie yang katanya sedap itulohh', 'mie goreng', 4000, 'media/images/64b7da0bec001.png', 'image/png', 483134, '2023-07-19 19:41:47'),
(5, 'Mie Indomie Goreng Telur Kecap', 'Gaada bosen-bosennya Indomie berkreatifitas membuat jajanan unik satu ini, telur ayam atau bebek menambah cita rasa kaldu mie khas negara plus 62', 'mie goreng', 7000, 'media/images/64b7da810382b.png', 'image/png', 269958, '2023-07-19 19:43:45'),
(6, 'Indomie Kuah kaldu ayam', 'Indomie kali ini berinofasi dengan menghadirkan mie godok kaldu ayam, rasakan nikmat kaldu bumbu bawang pilihan', 'mie goreng', 7000, 'media/images/64b7dc800ce28.png', 'image/png', 707607, '2023-07-19 19:52:16'),
(7, 'Samyang Onigiri', 'Pernah makan samyang toping onigiri, pasti tidak dapat dibayangkan, namun menu ini buktinya', 'mie goreng', 10000, 'media/images/64b7dd8d5bded.png', 'image/png', 220743, '2023-07-19 19:56:45'),
(8, 'Kwentiau udang rebus', 'Kwentiau yang direbus hampir 24 jam dengan toping udang rebus dengan berbagai pilihan saus, saus yang paling diandalkan saus thai', 'mie goreng', 17000, 'media/images/64b7dfdf002b2.png', 'image/png', 346745, '2023-07-19 20:06:39'),
(9, 'Mie Goreng urak arik', 'Mie Goreng urak arik dengan perpaduan toping telur mata keranjang, timun, tomat, dan selada, bumbu yang diracik bukan bumbu sembarangan, peracik bumbu', 'mie goreng', 9000, 'media/images/64b7e19c113fe.png', 'image/png', 618180, '2023-07-19 20:14:04'),
(10, 'Mie Ayam Arema 88', 'Terinspirasi dari Mie Ayam Arema 88 depan kampus STIE, murah, nikmat, dan toping andalan yaitu pangsitðŸ˜…', 'mie goreng', 7000, 'media/images/64b7e25315335.png', 'image/png', 130662, '2023-07-19 20:17:07'),
(11, 'Mie Ayam 8 BIT', 'Anak Moba pasti taulah mie ayam satu ini, apalagi kalo enga mie ayam 8 bit, toping ayam andalan ini berupa 8 bit / 1 byte bumbu kaldu ayam', 'mie goreng', 111000, 'media/images/64b7e2bf90a43.png', 'image/png', 15451, '2023-07-19 20:18:55'),
(12, 'Mie Ayam Baso Sapi', 'Mie Ayam baso sapi, menu emak-emak apabila datang ke resto Mie ayam, kenapa begitu diidam-idamkan?ðŸ¤”', 'mie goreng', 13000, 'media/images/64b7e3161102b.png', 'image/png', 348909, '2023-07-19 20:20:22'),
(13, 'Es Jeruk', 'Es Jeyuk atau kerap dipanggil jerus diperas merupakan menu minuman andalan disaat puncak dahaga panasnya siang hari', 'mie goreng', 4000, 'media/images/64b89ba38f6e1.png', 'image/png', 195800, '2023-07-20 09:27:47'),
(14, 'Es Teh', 'Berbincang minuman satu ini, mustahil orang ga suka sama minuman satu ini, kecuali sedang RabiesðŸ¶', 'mie goreng', 3000, 'media/images/64b89c6d3c932.png', 'image/png', 402937, '2023-07-20 09:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$GgeUMFaV64Hpio3jQBXRG.dIPkpGWgU1qk6r51LVz7h'),
(2, 'user', '$2y$10$imaCJ6BBmFvJRBM2XzuvCOV6pNLGsF5Yq9OeM7PXAG0'),
(4, 'satu', '$2y$10$uDetnuPt39AC3xWHOCr2j.Tj9qaF25c/LWno7afY3T2'),
(10, 'wahyu', '$2y$10$NWwmY.LZb//GBXr1nhIKUOmxCwIA1JooB4wkyz04Fcz'),
(11, 'test', '$2y$10$WwCSt.NQrJYdiyzbU3dLU.5qKhasadtuKZnUPee.XogxoGIdqdzG.'),
(12, 'root', '$2y$10$clIp/66HHUugPKh/U/UnVO0Fj42n/JogvonnMDXccXdIkKmlKmPe.'),
(13, 'hawkxc', '$2y$10$i2rI4Jb5FR01xt/JGtPZp.Rsed5uFPA0xj5qq.S2FciyHQOFPsEci'),
(14, 'fitriku', '$2y$10$aDDctf0tUnABiF6ha2Tlr.NWrJhHUUDlawfDWGl7C1Ejjg/HchNgC');

-- --------------------------------------------------------

--
-- Table structure for table `user_desc`
--

CREATE TABLE `user_desc` (
  `decs_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mail` varchar(100) DEFAULT 'N/A',
  `phone` varchar(50) DEFAULT 'N/A',
  `address` varchar(100) DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_image`
--

CREATE TABLE `user_image` (
  `image_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `path` varchar(100) NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`order_session`),
  ADD KEY `fk_menu` (`id_menus_image`);

--
-- Indexes for table `menus_image`
--
ALTER TABLE `menus_image`
  ADD PRIMARY KEY (`id_menus_image`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_desc`
--
ALTER TABLE `user_desc`
  ADD PRIMARY KEY (`decs_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_image`
--
ALTER TABLE `user_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `FK_user_id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus_image`
--
ALTER TABLE `menus_image`
  MODIFY `id_menus_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_desc`
--
ALTER TABLE `user_desc`
  MODIFY `decs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_image`
--
ALTER TABLE `user_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_menu` FOREIGN KEY (`id_menus_image`) REFERENCES `menus_image` (`id_menus_image`);

--
-- Constraints for table `user_desc`
--
ALTER TABLE `user_desc`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_image`
--
ALTER TABLE `user_image`
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
