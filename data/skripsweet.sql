-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: 192.168.99.100
-- Generation Time: Dec 20, 2017 at 05:44 AM
-- Server version: 8.0.3-rc-log
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsweet`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_account` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(11) DEFAULT NULL COMMENT '1: manajemen, 2: expert',
  `id_expert` int(11) DEFAULT NULL,
  `remember_token` varchar(256) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_account`, `username`, `password`, `role`, `id_expert`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sysadmin', '$2y$10$ZCTGSBDswi1tIgV5EwdOIumZIPQBlNqENhq4460hoQyOfFIhjSU0C', 1, NULL, 'xYfmQQsMzpH6b5tjGdjXwHqD32Ol7xfHUvVLRDu5HOeznXPdcOHiT1hC9Mhz', '2017-12-18 17:23:48', '2017-12-18 17:23:48', NULL),
(5, 'ekaapriliano3', '$2y$10$zTPYQCkdmCEhSSJDlBqF9.vdEj8G6W1LXaOsVU1p4pGkGctjHN4g2', 2, 3, 'BQiJeJarxt0fcDM29d20c2jAV6DJwfBgb4B31Nw5Qoas6SuPQHOvV6ZSH1aM', '2017-12-20 05:07:04', '2017-12-20 05:07:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `kode` varchar(8) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `kode`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'a1', 'a1', '2017-12-16 11:07:44', '2017-12-16 11:07:44', NULL),
(2, 'a2', 'a2', '2017-12-16 11:07:56', '2017-12-16 11:07:56', NULL),
(3, 'a3', 'a3', '2017-12-16 11:08:08', '2017-12-16 11:08:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comparison_kriteria`
--

CREATE TABLE `comparison_kriteria` (
  `id_comparison_kriteria` int(11) NOT NULL,
  `id_expert` int(11) NOT NULL,
  `id_kriteria_1` int(11) NOT NULL,
  `id_kriteria_2` int(11) NOT NULL,
  `id_satuan_perbandingan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comparison_kriteria`
--

INSERT INTO `comparison_kriteria` (`id_comparison_kriteria`, `id_expert`, `id_kriteria_1`, `id_kriteria_2`, `id_satuan_perbandingan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 2, 1, '2017-12-16 11:08:25', '2017-12-16 11:09:41', NULL),
(2, 1, 2, 1, 1, '2017-12-16 11:08:25', '2017-12-16 11:09:41', NULL),
(3, 1, 1, 3, 10, '2017-12-16 11:08:42', '2017-12-16 11:08:42', NULL),
(4, 1, 3, 1, 2, '2017-12-16 11:08:42', '2017-12-16 11:08:42', NULL),
(5, 1, 1, 4, 3, '2017-12-16 11:08:56', '2017-12-16 11:08:56', NULL),
(6, 1, 4, 1, 11, '2017-12-16 11:08:56', '2017-12-16 11:08:56', NULL),
(7, 1, 2, 3, 2, '2017-12-16 11:10:02', '2017-12-16 11:10:02', NULL),
(8, 1, 3, 2, 10, '2017-12-16 11:10:02', '2017-12-16 11:10:02', NULL),
(9, 1, 2, 4, 2, '2017-12-16 11:10:15', '2017-12-16 11:11:08', NULL),
(10, 1, 4, 2, 10, '2017-12-16 11:10:15', '2017-12-16 11:11:08', NULL),
(11, 1, 3, 4, 2, '2017-12-16 11:10:38', '2017-12-16 11:10:38', NULL),
(12, 1, 4, 3, 10, '2017-12-16 11:10:38', '2017-12-16 11:10:38', NULL),
(13, 2, 1, 2, 2, '2017-12-16 11:11:33', '2017-12-16 11:11:33', NULL),
(14, 2, 2, 1, 10, '2017-12-16 11:11:33', '2017-12-16 11:11:33', NULL),
(15, 2, 1, 3, 3, '2017-12-16 11:11:51', '2017-12-16 11:11:51', NULL),
(16, 2, 3, 1, 11, '2017-12-16 11:11:51', '2017-12-16 11:11:51', NULL),
(17, 2, 1, 4, 10, '2017-12-16 11:12:02', '2017-12-16 11:12:02', NULL),
(18, 2, 4, 1, 2, '2017-12-16 11:12:02', '2017-12-16 11:12:02', NULL),
(19, 2, 2, 3, 2, '2017-12-16 11:12:58', '2017-12-16 11:12:58', NULL),
(20, 2, 3, 2, 10, '2017-12-16 11:12:58', '2017-12-16 11:12:58', NULL),
(21, 2, 2, 4, 11, '2017-12-16 11:13:23', '2017-12-16 11:13:23', NULL),
(22, 2, 4, 2, 3, '2017-12-16 11:13:23', '2017-12-16 11:13:23', NULL),
(23, 2, 3, 4, 14, '2017-12-16 11:14:18', '2017-12-16 11:14:18', NULL),
(24, 2, 4, 3, 6, '2017-12-16 11:14:18', '2017-12-16 11:14:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comparison_subkriteria`
--

CREATE TABLE `comparison_subkriteria` (
  `id_comparison_subkriteria` int(11) NOT NULL,
  `id_expert` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `id_subkriteria_1` int(11) DEFAULT NULL,
  `id_subkriteria_2` int(11) DEFAULT NULL,
  `id_satuan_perbandingan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comparison_subkriteria`
--

INSERT INTO `comparison_subkriteria` (`id_comparison_subkriteria`, `id_expert`, `id_kriteria`, `id_subkriteria_1`, `id_subkriteria_2`, `id_satuan_perbandingan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 2, 12, '2017-12-16 11:14:53', '2017-12-16 11:14:53', NULL),
(2, 1, 1, 2, 1, 4, '2017-12-16 11:14:53', '2017-12-16 11:14:53', NULL),
(3, 1, 2, 3, 4, 2, '2017-12-16 11:15:43', '2017-12-16 11:15:43', NULL),
(4, 1, 2, 4, 3, 10, '2017-12-16 11:15:43', '2017-12-16 11:15:43', NULL),
(5, 1, 2, 3, 6, 3, '2017-12-16 11:16:13', '2017-12-16 11:16:13', NULL),
(6, 1, 2, 6, 3, 11, '2017-12-16 11:16:13', '2017-12-16 11:16:13', NULL),
(7, 1, 2, 4, 6, 2, '2017-12-16 11:16:27', '2017-12-16 11:16:27', NULL),
(8, 1, 2, 6, 4, 10, '2017-12-16 11:16:27', '2017-12-16 11:16:27', NULL),
(9, 1, 4, 5, 8, 11, '2017-12-16 11:17:02', '2017-12-16 11:17:02', NULL),
(10, 1, 4, 8, 5, 3, '2017-12-16 11:17:02', '2017-12-16 11:17:02', NULL),
(11, 2, 1, 1, 2, 2, '2017-12-16 11:17:33', '2017-12-16 11:17:33', NULL),
(12, 2, 1, 2, 1, 10, '2017-12-16 11:17:33', '2017-12-16 11:17:33', NULL),
(13, 2, 2, 3, 4, 2, '2017-12-16 11:17:45', '2017-12-16 11:19:38', NULL),
(14, 2, 2, 4, 3, 10, '2017-12-16 11:17:45', '2017-12-16 11:19:38', NULL),
(15, 2, 2, 3, 6, 3, '2017-12-16 11:18:06', '2017-12-16 11:18:06', NULL),
(16, 2, 2, 6, 3, 11, '2017-12-16 11:18:06', '2017-12-16 11:18:06', NULL),
(17, 2, 2, 4, 6, 1, '2017-12-16 11:18:21', '2017-12-16 11:20:13', NULL),
(18, 2, 2, 6, 4, 1, '2017-12-16 11:18:21', '2017-12-16 11:20:13', NULL),
(19, 2, 4, 5, 8, 2, '2017-12-16 11:20:33', '2017-12-16 11:20:33', NULL),
(20, 2, 4, 8, 5, 10, '2017-12-16 11:20:33', '2017-12-16 11:20:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `id_expert` int(11) NOT NULL,
  `nama` varchar(16) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expert`
--

INSERT INTO `expert` (`id_expert`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ahli1', '2017-12-16 10:55:15', '2017-12-16 10:55:15', NULL),
(2, 'ahli2', '2017-12-16 10:55:27', '2017-12-16 10:55:27', NULL),
(3, 'Eka apriliano', '2017-12-20 04:43:15', '2017-12-20 04:43:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fuzzy_weight_kriteria`
--

CREATE TABLE `fuzzy_weight_kriteria` (
  `id_fuzzy_weight_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `bobot` double NOT NULL DEFAULT '0',
  `bobot_tfn_1` double NOT NULL DEFAULT '0',
  `bobot_tfn_2` double NOT NULL DEFAULT '0',
  `bobot_tfn_3` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fuzzy_weight_kriteria`
--

INSERT INTO `fuzzy_weight_kriteria` (`id_fuzzy_weight_kriteria`, `id_kriteria`, `bobot`, `bobot_tfn_1`, `bobot_tfn_2`, `bobot_tfn_3`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0.27044919818055224, 0.17481318400241247, 0.26493498154162975, 0.4005841980318984, '2017-12-16 11:20:49', '2017-12-20 04:51:07', NULL),
(2, 2, 0.23439386431543907, 0.1547017254812093, 0.23925028065817253, 0.35506177066020483, '2017-12-16 11:20:49', '2017-12-20 04:51:07', NULL),
(3, 3, 0.21162297699617869, 0.14395677618382802, 0.22031085192030342, 0.3445599356512545, '2017-12-16 11:20:49', '2017-12-20 04:51:07', NULL),
(4, 4, 0.28353396050783003, 0.1821353158560414, 0.2755038858798943, 0.42509812333818414, '2017-12-16 11:20:49', '2017-12-20 04:51:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fuzzy_weight_subkriteria`
--

CREATE TABLE `fuzzy_weight_subkriteria` (
  `id_fuzzy_weight_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `id_subkriteria` int(11) DEFAULT NULL,
  `bobot_awal` double NOT NULL DEFAULT '0',
  `bobot_akhir` double NOT NULL DEFAULT '0',
  `bobot_tfn_1` double NOT NULL DEFAULT '0',
  `bobot_tfn_2` double NOT NULL DEFAULT '0',
  `bobot_tfn_3` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fuzzy_weight_subkriteria`
--

INSERT INTO `fuzzy_weight_subkriteria` (`id_fuzzy_weight_subkriteria`, `id_kriteria`, `id_subkriteria`, `bobot_awal`, `bobot_akhir`, `bobot_tfn_1`, `bobot_tfn_2`, `bobot_tfn_3`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 0.34896708983887154, 0.09401108024705403, 0.276393202250021, 0.4142135623730951, 0.5801787282954641, '2017-12-16 11:21:29', '2017-12-16 11:21:29', NULL),
(2, 1, 2, 0.6510329101611285, 0.17538704635124996, 0.38196601125010515, 0.585786437626905, 0.9387489019317513, '2017-12-16 11:21:29', '2017-12-16 11:21:29', NULL),
(3, 2, 3, 0.3813482017765874, 0.0887956659245824, 0.20594847685170536, 0.3818181818181817, 0.6258457585024721, '2017-12-16 11:21:49', '2017-12-16 11:21:49', NULL),
(4, 2, 4, 0.33365754376062945, 0.07769105413624776, 0.19555001039055625, 0.3272727272727272, 0.5875641463367774, '2017-12-16 11:21:49', '2017-12-16 11:21:49', NULL),
(5, 2, 6, 0.28499425446278315, 0.06635996837485646, 0.19083157698969938, 0.2909090909090909, 0.4748380170295149, '2017-12-16 11:21:49', '2017-12-16 11:21:49', NULL),
(6, 3, 7, 1, 0.2132098839873481, 1, 1, 1, '2017-12-16 11:23:38', '2017-12-16 11:23:38', NULL),
(7, 4, 5, 0.43240969804643614, 0.12304014767671523, 0.28709535813190457, 0.4494897427831781, 0.6708117488151485, '2017-12-16 11:24:43', '2017-12-16 11:24:43', NULL),
(8, 4, 8, 0.5675903019535639, 0.1615051533019461, 0.34767182429788385, 0.5505102572168218, 0.904569001292565, '2017-12-16 11:24:43', '2017-12-16 11:24:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `index_random`
--

CREATE TABLE `index_random` (
  `id_index_random` int(11) NOT NULL,
  `ordo_matriks` int(11) NOT NULL DEFAULT '0',
  `nilai` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `index_random`
--

INSERT INTO `index_random` (`id_index_random`, `ordo_matriks`, `nilai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, '2017-12-06 00:00:00', '2017-12-06 00:00:00', NULL),
(2, 2, 0, '2017-12-06 00:00:00', '2017-12-06 00:00:00', NULL),
(3, 3, 0.58, '2017-12-06 00:00:00', '2017-12-06 00:00:00', NULL),
(4, 4, 0.9, '2017-12-06 00:00:00', '2017-12-06 00:00:00', NULL),
(5, 5, 1.12, '2017-12-06 00:00:00', '2017-12-06 00:00:00', NULL),
(6, 6, 1.24, '2017-12-06 00:00:00', '2017-12-06 00:00:00', NULL),
(7, 7, 1.32, '2017-12-06 00:00:00', '2017-12-06 00:00:00', NULL),
(8, 8, 1.41, '2017-12-06 00:00:00', '2017-12-06 00:00:00', NULL),
(9, 9, 1.45, '2017-12-06 00:00:00', '2017-12-06 00:00:00', NULL),
(10, 10, 1.48, '2017-12-06 00:00:00', '2017-12-06 00:00:00', NULL),
(11, 11, 1.49, '2017-12-06 00:00:00', '2017-12-06 00:00:00', NULL),
(12, 12, 1.51, '2017-12-06 00:00:00', '2017-12-06 00:00:00', NULL),
(13, 13, 1.56, '2017-12-06 00:00:00', '2017-12-06 00:00:00', NULL),
(14, 14, 1.57, '2017-12-06 00:00:00', '2017-12-06 00:00:00', NULL),
(15, 15, 1.59, '2017-12-06 00:00:00', '2017-12-06 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode` varchar(8) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'k1', 'k1', '2017-12-16 10:55:55', '2017-12-16 10:55:55', NULL),
(2, 'k2', 'k2', '2017-12-16 10:56:07', '2017-12-16 10:56:07', NULL),
(3, 'k3', 'k3', '2017-12-16 10:56:17', '2017-12-16 10:56:17', NULL),
(4, 'k4', 'k4', '2017-12-16 10:56:28', '2017-12-16 10:56:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_expert`
--

CREATE TABLE `nilai_expert` (
  `id_nilai_expert` int(11) NOT NULL,
  `id_expert` int(11) DEFAULT NULL,
  `id_alternatif` int(11) DEFAULT NULL,
  `id_subkriteria` int(11) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `nilai_expert`
--

INSERT INTO `nilai_expert` (`id_nilai_expert`, `id_expert`, `id_alternatif`, `id_subkriteria`, `nilai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 7, '2017-12-16 11:33:45', '2017-12-16 11:33:45', NULL),
(2, 1, 1, 2, 7.5, '2017-12-16 11:34:18', '2017-12-16 11:56:10', NULL),
(3, 1, 1, 3, 8, '2017-12-16 11:34:29', '2017-12-16 11:34:29', NULL),
(4, 1, 1, 4, 9, '2017-12-16 11:34:40', '2017-12-16 11:34:40', NULL),
(5, 1, 1, 5, 10, '2017-12-16 11:35:30', '2017-12-16 11:55:07', NULL),
(6, 1, 1, 6, 9, '2017-12-16 11:51:22', '2017-12-16 11:58:34', NULL),
(7, 1, 1, 8, 5, '2017-12-16 11:51:49', '2017-12-16 11:51:49', NULL),
(8, 1, 1, 7, 7, '2017-12-16 11:54:56', '2017-12-16 11:54:56', NULL),
(9, 1, 2, 1, 5, '2017-12-16 11:55:33', '2017-12-16 11:55:33', NULL),
(10, 1, 3, 1, 8, '2017-12-16 11:55:54', '2017-12-16 11:55:54', NULL),
(11, 1, 2, 2, 5, '2017-12-16 11:56:30', '2017-12-16 11:56:30', NULL),
(12, 1, 3, 2, 9, '2017-12-16 11:56:59', '2017-12-16 11:56:59', NULL),
(13, 1, 2, 3, 6, '2017-12-16 11:57:13', '2017-12-16 11:57:13', NULL),
(14, 1, 3, 3, 7, '2017-12-16 11:57:25', '2017-12-16 11:57:25', NULL),
(15, 1, 2, 4, 7, '2017-12-16 11:57:39', '2017-12-16 11:57:39', NULL),
(16, 1, 3, 4, 5, '2017-12-16 11:57:58', '2017-12-16 11:57:58', NULL),
(17, 1, 2, 6, 8, '2017-12-16 11:58:24', '2017-12-16 11:58:24', NULL),
(18, 1, 3, 6, 10, '2017-12-16 11:58:59', '2017-12-16 11:58:59', NULL),
(19, 1, 2, 5, 7, '2017-12-16 11:59:15', '2017-12-16 11:59:15', NULL),
(20, 1, 3, 5, 8, '2017-12-16 11:59:32', '2017-12-16 11:59:32', NULL),
(21, 1, 2, 8, 5, '2017-12-16 11:59:48', '2017-12-16 11:59:48', NULL),
(22, 1, 3, 8, 9, '2017-12-16 12:00:00', '2017-12-16 12:00:00', NULL),
(23, 1, 2, 7, 6, '2017-12-16 12:00:16', '2017-12-16 12:00:16', NULL),
(24, 1, 3, 7, 4, '2017-12-16 12:00:34', '2017-12-16 12:00:34', NULL),
(25, 2, 1, 1, 6, '2017-12-16 12:00:51', '2017-12-16 12:00:51', NULL),
(26, 2, 2, 1, 7, '2017-12-16 12:01:18', '2017-12-16 12:01:18', NULL),
(27, 2, 3, 1, 8, '2017-12-16 12:01:37', '2017-12-16 12:01:37', NULL),
(28, 2, 1, 2, 12, '2017-12-16 12:01:58', '2017-12-16 12:01:58', NULL),
(29, 2, 1, 3, 6, '2017-12-16 12:02:26', '2017-12-16 12:02:26', NULL),
(30, 2, 2, 3, 4, '2017-12-16 12:03:31', '2017-12-16 12:03:31', NULL),
(31, 2, 3, 3, 5, '2017-12-16 12:03:49', '2017-12-16 12:03:49', NULL),
(32, 2, 1, 4, 9, '2017-12-16 12:04:20', '2017-12-16 12:04:20', NULL),
(33, 2, 2, 4, 7, '2017-12-16 12:04:35', '2017-12-16 12:04:35', NULL),
(34, 2, 3, 4, 3, '2017-12-16 12:04:48', '2017-12-16 12:04:48', NULL),
(35, 2, 1, 6, 2, '2017-12-16 12:05:01', '2017-12-16 12:05:01', NULL),
(36, 2, 2, 6, 5, '2017-12-16 12:05:13', '2017-12-16 12:05:13', NULL),
(37, 2, 3, 6, 4, '2017-12-16 12:05:25', '2017-12-16 12:05:25', NULL),
(38, 2, 1, 7, 7, '2017-12-16 12:05:40', '2017-12-16 12:05:40', NULL),
(39, 2, 2, 7, 7, '2017-12-16 12:05:55', '2017-12-16 12:05:55', NULL),
(40, 2, 3, 7, 7, '2017-12-16 12:06:07', '2017-12-16 12:06:07', NULL),
(41, 2, 1, 5, 8, '2017-12-16 12:06:32', '2017-12-16 12:06:32', NULL),
(42, 2, 2, 5, 4, '2017-12-16 12:06:50', '2017-12-16 12:06:50', NULL),
(43, 2, 3, 8, 7, '2017-12-16 12:07:02', '2017-12-16 12:07:02', NULL),
(44, 2, 3, 5, 7, '2017-12-16 12:07:17', '2017-12-16 12:07:17', NULL),
(45, 2, 1, 8, 6, '2017-12-16 12:07:30', '2017-12-16 12:07:30', NULL),
(46, 2, 2, 8, 8, '2017-12-16 12:07:46', '2017-12-16 12:07:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_linguistik`
--

CREATE TABLE `nilai_linguistik` (
  `id_nilai_linguistik` int(11) NOT NULL,
  `linguistik` char(8) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `nilai_linguistik`
--

INSERT INTO `nilai_linguistik` (`id_nilai_linguistik`, `linguistik`, `nilai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'VB', 1, '2017-12-08 00:00:00', '2017-12-08 00:00:00', NULL),
(2, 'VB', 2, '2017-12-08 00:00:00', '2017-12-08 00:00:00', NULL),
(3, 'B', 3, '2017-12-08 00:00:00', '2017-12-08 00:00:00', NULL),
(4, 'B', 4, '2017-12-08 00:00:00', '2017-12-08 00:00:00', NULL),
(5, 'I', 5, '2017-12-08 00:00:00', '2017-12-08 00:00:00', NULL),
(6, 'I', 6, '2017-12-08 00:00:00', '2017-12-08 00:00:00', NULL),
(7, 'G', 7, '2017-12-08 00:00:00', '2017-12-08 00:00:00', NULL),
(8, 'G', 8, '2017-12-08 00:00:00', '2017-12-08 00:00:00', NULL),
(9, 'VG', 9, '2017-12-08 00:00:00', '2017-12-08 00:00:00', NULL),
(10, 'VG', 10, '2017-12-08 00:00:00', '2017-12-08 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `satuan_perbandingan`
--

CREATE TABLE `satuan_perbandingan` (
  `id_satuan_perbandingan` int(11) NOT NULL,
  `text` varchar(8) NOT NULL,
  `nilai` double NOT NULL,
  `tfn_t1` varchar(8) NOT NULL,
  `tfn_t2` varchar(8) NOT NULL,
  `tfn_t3` varchar(8) NOT NULL,
  `tfn_n1` double NOT NULL,
  `tfn_n2` double NOT NULL,
  `tfn_n3` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan_perbandingan`
--

INSERT INTO `satuan_perbandingan` (`id_satuan_perbandingan`, `text`, `nilai`, `tfn_t1`, `tfn_t2`, `tfn_t3`, `tfn_n1`, `tfn_n2`, `tfn_n3`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 1, '1', '1', '1', 1, 1, 1, '2017-10-02 00:00:00', '2017-10-02 00:00:00', NULL),
(2, '2', 2, '1/2', '1', '3/2', 0.5, 1, 1.5, '2017-10-02 00:00:00', '2017-10-02 00:00:00', NULL),
(3, '3', 3, '1', '3/2', '2', 1, 1.5, 2, '2017-10-02 00:00:00', '2017-10-02 00:00:00', NULL),
(4, '4', 4, '3/2', '2', '5/2', 1.5, 2, 2.5, '2017-10-02 00:00:00', '2017-10-02 00:00:00', NULL),
(5, '5', 5, '2', '5/2', '3', 2, 2.5, 3, '2017-10-02 00:00:00', '2017-10-02 00:00:00', NULL),
(6, '6', 6, '5/2', '3', '7/2', 2.5, 3, 3.5, '2017-10-02 00:00:00', '2017-10-02 00:00:00', NULL),
(7, '7', 7, '3', '7/2', '4', 3, 3.5, 4, '2017-10-02 00:00:00', '2017-10-02 00:00:00', NULL),
(8, '8', 8, '7/2', '4', '9/2', 3.5, 4, 4.5, '2017-10-02 00:00:00', '2017-10-02 00:00:00', NULL),
(9, '9', 9, '4', '9/2', '9/2', 4, 4.5, 4.5, '2017-10-02 00:00:00', '2017-10-02 00:00:00', NULL),
(10, '1/2', 0.5, '2/3', '1', '2', 0.666666666666667, 1, 2, '2017-10-02 00:00:00', '2017-10-02 00:00:00', NULL),
(11, '1/3', 0.333333333333333, '1/2', '2/3', '1', 0.5, 0.666666666666667, 1, '2017-10-02 00:00:00', '2017-10-02 00:00:00', NULL),
(12, '1/4', 0.25, '2/5', '1/2', '2/3', 0.4, 0.5, 0.666666666666667, '2017-10-02 00:00:00', '2017-10-02 00:00:00', NULL),
(13, '1/5', 0.2, '1/3', '2/5', '1/2', 0.333333333333333, 0.4, 0.5, '2017-10-02 00:00:00', '2017-10-02 00:00:00', NULL),
(14, '1/6', 0.166666666666667, '2/7', '1/3', '2/5', 0.285714285714286, 0.333333333333333, 0.4, '2017-10-02 00:00:00', '2017-10-02 00:00:00', NULL),
(15, '1/7', 0.142857142857143, '1/4', '2/7', '1/3', 0.25, 0.285714285714286, 0.333333333333333, '2017-10-02 00:00:00', '2017-10-02 00:00:00', NULL),
(16, '1/8', 0.125, '2/9', '1/4', '2/7', 0.222222222222222, 0.25, 0.285714285714286, '2017-10-02 00:00:00', '2017-10-02 00:00:00', NULL),
(17, '1/9', 0.111111111111111, '2/9', '2/9', '1/4', 0.222222222222222, 0.222222222222222, 0.25, '2017-10-02 00:00:00', '2017-10-02 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `kode` varchar(8) DEFAULT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '1 = max fuzzy; 2 = max crisp; 3 = min fuzzy; 4 = min crisp;',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `id_kriteria`, `kode`, `nama`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'k11', 'k11', 1, '2017-12-16 11:02:10', '2017-12-20 04:38:37', NULL),
(2, 1, 'k12', 'k12', 2, '2017-12-16 11:02:50', '2017-12-20 04:38:37', NULL),
(3, 2, 'k21', 'k21', 1, '2017-12-16 11:03:57', '2017-12-20 04:38:37', NULL),
(4, 2, 'k22', 'k22', 1, '2017-12-16 11:04:31', '2017-12-20 04:38:37', NULL),
(5, 4, 'k41', 'k41', 1, '2017-12-16 11:04:53', '2017-12-20 04:38:37', NULL),
(6, 2, 'k23', 'k23', 1, '2017-12-16 11:05:53', '2017-12-20 04:38:37', NULL),
(7, 3, 'k3', 'k3', 1, '2017-12-16 11:06:25', '2017-12-20 04:38:37', NULL),
(8, 4, 'k42', 'k42', 1, '2017-12-16 11:07:12', '2017-12-20 04:38:37', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `comparison_kriteria`
--
ALTER TABLE `comparison_kriteria`
  ADD PRIMARY KEY (`id_comparison_kriteria`);

--
-- Indexes for table `comparison_subkriteria`
--
ALTER TABLE `comparison_subkriteria`
  ADD PRIMARY KEY (`id_comparison_subkriteria`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`id_expert`);

--
-- Indexes for table `fuzzy_weight_kriteria`
--
ALTER TABLE `fuzzy_weight_kriteria`
  ADD PRIMARY KEY (`id_fuzzy_weight_kriteria`);

--
-- Indexes for table `fuzzy_weight_subkriteria`
--
ALTER TABLE `fuzzy_weight_subkriteria`
  ADD PRIMARY KEY (`id_fuzzy_weight_subkriteria`);

--
-- Indexes for table `index_random`
--
ALTER TABLE `index_random`
  ADD PRIMARY KEY (`id_index_random`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_expert`
--
ALTER TABLE `nilai_expert`
  ADD PRIMARY KEY (`id_nilai_expert`);

--
-- Indexes for table `nilai_linguistik`
--
ALTER TABLE `nilai_linguistik`
  ADD PRIMARY KEY (`id_nilai_linguistik`);

--
-- Indexes for table `satuan_perbandingan`
--
ALTER TABLE `satuan_perbandingan`
  ADD PRIMARY KEY (`id_satuan_perbandingan`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comparison_kriteria`
--
ALTER TABLE `comparison_kriteria`
  MODIFY `id_comparison_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comparison_subkriteria`
--
ALTER TABLE `comparison_subkriteria`
  MODIFY `id_comparison_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `id_expert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fuzzy_weight_kriteria`
--
ALTER TABLE `fuzzy_weight_kriteria`
  MODIFY `id_fuzzy_weight_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fuzzy_weight_subkriteria`
--
ALTER TABLE `fuzzy_weight_subkriteria`
  MODIFY `id_fuzzy_weight_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `index_random`
--
ALTER TABLE `index_random`
  MODIFY `id_index_random` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai_expert`
--
ALTER TABLE `nilai_expert`
  MODIFY `id_nilai_expert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `nilai_linguistik`
--
ALTER TABLE `nilai_linguistik`
  MODIFY `id_nilai_linguistik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `satuan_perbandingan`
--
ALTER TABLE `satuan_perbandingan`
  MODIFY `id_satuan_perbandingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
