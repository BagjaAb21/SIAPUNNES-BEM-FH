-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2021 at 06:44 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_unnes`
--

-- --------------------------------------------------------

--
-- Table structure for table `aduan`
--

CREATE TABLE `aduan` (
  `id` int(11) NOT NULL,
  `no_aduan` varchar(11) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_handphone` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `isi_aduan` text NOT NULL,
  `img_bukti` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aduan`
--

INSERT INTO `aduan` (`id`, `no_aduan`, `nim`, `email`, `no_handphone`, `id_kategori`, `isi_aduan`, `img_bukti`, `date_created`, `id_status`) VALUES
(7, '499828275', '065120003', 'kritimauludin24@gmail.com', '08393842333', 1, 'test', 'Capture.PNG', '2021-02-02', 1),
(9, '1383348325', '065120003', 'ahmadludhiana007@gmail.com', '08381288823', 2, 'nilai saya gaada', 'KTM.PNG', '2021-03-01', 3),
(10, '358946704', '065120003', 'kritimauludin24@gmail.com', '0838172883', 3, 'percobaan', '151cffd7-64f0-4e1c-8076-4e23c0574d9f.jpg', '2021-03-04', 2),
(11, '1178766786', '065120003', 'kritimauludin24@gmail.com', '0838188221', 1, 'test', 'fancybox_sprite@2x.png', '2021-03-11', 2),
(12, '460166948', '065120003', 'kritimauludin24@gmail.com', '0838188221', 1, 'test', 'fancybox_sprite@2x1.png', '2021-03-07', 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_info`
--

CREATE TABLE `data_info` (
  `id` int(11) NOT NULL,
  `judul_info` text NOT NULL,
  `img_info` varchar(255) NOT NULL,
  `isi_info` text NOT NULL,
  `penulis` text NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_info`
--

INSERT INTO `data_info` (`id`, `judul_info`, `img_info`, `isi_info`, `penulis`, `date_created`) VALUES
(1, 'Biaya Kuliah diskon', 'ktm.png', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book. It usually begins with:\r\n\r\n“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”\r\nThe purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn\'t distract from the layout. A practice not without controversy, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.\r\n\r\nThe passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it\'s seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum.', 'Kriti Mauludin', '1614600110'),
(3, 'Libur perkuliahan', 'Capture_materi_pkkmb_akhir.PNG', '<p><em>Lorem ipsum</em>, or&nbsp;<em>lipsum</em>&nbsp;as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s&nbsp;<em>De Finibus Bonorum et Malorum</em>&nbsp;for use in a type specimen book. It usually begins with:</p>\r\n\r\n<blockquote>&ldquo;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&rdquo;</blockquote>\r\n\r\n<p>The purpose of&nbsp;<em>lorem ipsum</em>&nbsp;is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn&#39;t distract from the layout. A practice not without&nbsp;<a href=\"https://loremipsum.io/#controversy\">controversy</a>, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.</p>\r\n\r\n<p>The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it&#39;s seen all around the web; on templates, websites, and stock designs. Use our&nbsp;<a href=\"https://loremipsum.io/#generator\">generator</a>&nbsp;to get your own, or read on for the authoritative history of&nbsp;<em>lorem ipsum</em>.</p>\r\n', 'Kriti Mauludin', '1614692425');

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nama` text NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`id`, `nim`, `nama`, `jurusan`, `tahun`) VALUES
(177, '065120003', 'Kriti Mauludin', 'ilkom', 2020),
(185, '06521211', 'Kriti', 'ilkom', 2028),
(186, '06521212', 'Kriti', 'ilkom', 2029),
(187, '06521213', 'Kriti', 'ilkom', 2030),
(188, '06521214', 'Kriti', 'ilkom', 2031),
(189, '06521215', 'Kriti', 'ilkom', 2032),
(190, '06521216', 'Kriti', 'ilkom', 2033),
(191, '06521217', 'Kriti', 'ilkom', 2034),
(192, '06521218', 'Kriti', 'ilkom', 2035),
(193, '06521219', 'Kriti', 'ilkom', 2036),
(194, '06521220', 'Kriti', 'ilkom', 2037),
(195, '06521221', 'Kriti', 'ilkom', 2038),
(196, '065120002', 'Test', 'Rekayasa Perangkat Lunak', 2020),
(197, '20113351', 'Bagja', 'Ilmu komputer', 2020),
(198, '06521203', 'Kriti', 'ilkom', 2020),
(200, '06521205', 'Kriti', 'ilkom', 2022),
(201, '06521206', 'Kriti', 'ilkom', 2023),
(202, '06521207', 'Kriti', 'ilkom', 2024),
(203, '06521208', 'Kriti', 'ilkom', 2025);

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa_gagal`
--

CREATE TABLE `data_mahasiswa_gagal` (
  `id` int(11) NOT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `nama` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_aduan`
--

CREATE TABLE `kategori_aduan` (
  `id` int(11) NOT NULL,
  `jenis_aduan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_aduan`
--

INSERT INTO `kategori_aduan` (`id`, `jenis_aduan`) VALUES
(1, 'Layanan Akademik'),
(2, 'Layanan Umum & Keuangan'),
(3, 'Layanan Kemahasiswaan');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Approved'),
(2, 'Pending\r\n'),
(3, 'Reject');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `no_handphone` varchar(15) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `address` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `no_handphone`, `email`, `image`, `password`, `address`, `role_id`, `is_active`, `date_created`) VALUES
(6, 'Kriti Mauludin', '089292829182', 'kritimauludin24@gmail.com', 'default.jpg', '$2y$10$ljyFpNUA9VN16of4vO2g2u1N/81g9hKShT5ynUv7topQV9rjcym8K', 'cilendek no.37', 1, 1, 1603527639),
(23, 'user test', '089292829182', 'superadmin@gmail.com', 'logo.jpg', '$2y$10$3LhKBUW9OCp5WpT0nbsT3.9tcVnbQ9NEJpYqnBpJ8MKIMKiZs3.7K', 'test ujicoba form test lagi lagi', 1, 1, 1612191679),
(28, 'admin', '08372873', 'admin@gmail.com', 'default.jpg', '$2y$10$i637p7dL.xfNYmPQgHv45uyk1OEcerscHnJu3KRVXc8N.DXoDcuHa', '', 2, 1, 1614663404);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(36, 1, 3),
(37, 1, 4),
(38, 1, 5),
(39, 2, 2),
(40, 2, 3),
(41, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'user'),
(4, 'Menu'),
(5, 'Data');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'superadmin'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'superadmin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 3, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 3, 'Edit Profile', 'user/editprofile', 'fas fa-fw fa-user-edit', 1),
(5, 4, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(6, 4, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(11, 1, 'Role', 'superadmin/role', 'fas fa-fw fa-user-tie', 1),
(12, 3, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(28, 5, 'Data Aduan', 'data/dataAduan', 'fas fa-fw fa-history', 1),
(29, 5, 'Data Mahasiswa', 'data/dataMahasiswa', 'fas fa-fw fa-users', 1),
(30, 1, 'Data Admin', 'superadmin/dataadmin', 'fas fa-fw  fa-user-plus', 1),
(31, 5, 'Data Informasi', 'data/datainfo', 'fas fa-fw fa-info-circle', 1),
(32, 2, 'Dashboard Admin', 'admin', 'fas fa-fw fa-tachometer-alt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aduan`
--
ALTER TABLE `aduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_info`
--
ALTER TABLE `data_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_mahasiswa_gagal`
--
ALTER TABLE `data_mahasiswa_gagal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_aduan`
--
ALTER TABLE `kategori_aduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aduan`
--
ALTER TABLE `aduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `data_info`
--
ALTER TABLE `data_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `data_mahasiswa_gagal`
--
ALTER TABLE `data_mahasiswa_gagal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `kategori_aduan`
--
ALTER TABLE `kategori_aduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
