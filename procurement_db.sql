-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Feb 2020 pada 04.21
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `procurement_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_items`
--

CREATE TABLE `category_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `claim_supplier`
--

CREATE TABLE `claim_supplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `pos_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_contact_id` int(11) NOT NULL,
  `claim_form_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_remark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attached_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `complain_letter`
--

CREATE TABLE `complain_letter` (
  `id` int(10) UNSIGNED NOT NULL,
  `pos_id` int(11) NOT NULL,
  `complain_form_id` int(11) NOT NULL,
  `complain_remark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resolution_remark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resolution_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attached_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contract_supplier`
--

CREATE TABLE `contract_supplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `contract_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_start_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_end_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_contact_id` int(11) NOT NULL,
  `contact_form_id` int(11) NOT NULL,
  `contact_remark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attached_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pr_term`
--

CREATE TABLE `detail_pr_term` (
  `id` bigint(20) NOT NULL,
  `sequence_number` int(11) NOT NULL DEFAULT 0,
  `type_product_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL,
  `qty_qs` varchar(191) NOT NULL,
  `um_qs` varchar(191) NOT NULL,
  `status` varchar(191) DEFAULT NULL,
  `created_by` varchar(191) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pr_term`
--

INSERT INTO `detail_pr_term` (`id`, `sequence_number`, `type_product_id`, `product_id`, `qty_qs`, `um_qs`, `status`, `created_by`, `updated_at`, `created_at`) VALUES
(1, 0, 0, 9, '55', 'Pcs', '2', 'Firdauz Fanani', '2019-03-15 07:02:14', '2019-03-15 07:02:14'),
(3, 0, 0, 10, '22', 'yes', '2', 'Firdauz Fanani', '2019-03-15 09:46:00', '2019-03-15 09:46:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_rfq_term`
--

CREATE TABLE `detail_rfq_term` (
  `id` bigint(20) NOT NULL,
  `sequence_number` varchar(191) NOT NULL DEFAULT '0',
  `type_product_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL,
  `qty_rfi` varchar(191) NOT NULL,
  `um_rfi` varchar(191) NOT NULL,
  `status` varchar(191) DEFAULT NULL,
  `created_by` varchar(191) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hscode`
--

CREATE TABLE `hscode` (
  `id` int(10) UNSIGNED NOT NULL,
  `hscode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hscode_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ppn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pajak_import` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ppnbm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pph` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hscode`
--

INSERT INTO `hscode` (`id`, `hscode`, `hscode_desc`, `ppn`, `pajak_import`, `ppnbm`, `pph`, `status`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, '94036000', 'WOODEN FURNITURE DINING TABLE COLOR : BROWN SIZE : (1200+300) 900X750 MM', 'China', 'Chennai Sea', 'CNY', '34295', NULL, 'admin', 'admin', '2020-02-02 18:44:20', '2020-02-02 18:44:20'),
(2, '85068090', 'PARTS OF CONTROL PANEL- C9900-U330 BATTERY PACK FOR PCS WITH24 V POWER SUPPLY AND INTERGRATED UPS', 'Germany', 'Bombay Air Cargo', 'EUR', '7039', NULL, 'admin', 'admin', '2020-02-03 20:09:49', '2020-02-03 20:09:49'),
(3, '85068090', 'BTRY-MC32-02-10 BATTERY PACK, LITHIUM ION, MAH, MC3200 HIGH CAPACITY BATTERY- 10 PACK[BATTERY]', 'Singapore', 'Chennai Air Cargo', 'SGD', '61389', NULL, 'admin', 'admin', '2020-02-03 20:12:13', '2020-02-03 20:12:13'),
(4, '85068090', 'PARTS OF CONTROL PANEL- C9900-U330 BATTERY PACK FOR PCS WITH24 V POWER SUPPLY AND INTERGRATED UPS', 'Germany', 'Bombay Air Cargo', 'EUR', '21118', NULL, 'admin', 'admin', '2020-02-03 20:13:57', '2020-02-03 20:13:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_supplier`
--

CREATE TABLE `invoice_supplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `pos_id` int(11) NOT NULL,
  `rr_supplier_id` int(11) NOT NULL,
  `invoice_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_date` int(11) NOT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` smallint(6) NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_supplier_detail`
--

CREATE TABLE `invoice_supplier_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_supplier_id` int(11) NOT NULL,
  `rr_supplier_detail_id` int(11) NOT NULL,
  `pos_detail_id` int(11) NOT NULL,
  `sequence_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty_invoice_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `um_invoice_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `mfr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_part_num` smallint(6) NOT NULL,
  `part_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_um` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_curr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `break_down_price` tinyint(1) NOT NULL,
  `item_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lead_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_valid_until` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_need_qc` tinyint(1) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id`, `mfr`, `category_part_num`, `part_num`, `part_name`, `part_desc`, `default_um`, `default_curr`, `unit_cost`, `sell_price`, `break_down_price`, `item_price`, `price_date`, `lead_time`, `price_valid_until`, `item_need_qc`, `status`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 'samsung', 1, 'galaxy', 'Samsung', 'FASDF', 'Pcs', 'Rupiah', '2000', '2200', 0, '2200', '15-18-2018', 'ASDF', '2018-11-29 17:43:34', 0, 'ASDFA', 'Firdauz Fanani', 'Firdauz Fanani', '2018-12-11 10:45:41', '2019-03-11 19:12:59'),
(2, 'apple', 1, 'samsung', 'Apple', 'asdf', 'Pcs', 'Rupiah', '1000', '1200', 1, '1200', '15-18-2018', 'asdfa', '2018-11-29 17:43:34', 0, 'Good', 'Firdauz Fanani', 'Firdauz Fanani', '2018-12-11 10:46:10', '2019-03-11 19:13:44'),
(4, 'Isk', 1, '125123', 'Isk', 'tes', 'Pcs', 'Rupiah', '500', '700', 1, '700', '15-18-2018', 'tes', '2018-11-29', 0, 'tes', 'Firdauz Fanani', 'Firdauz Fanani', '2019-02-18 19:20:32', '2019-03-11 19:12:15'),
(5, 'Logitech', 1, 'Xiomi1', 'Logitech', 'xiaomi', 'Pcs', 'Rupiah', '3800', '4000', 0, '4000', '15-18-2018', 'tes', '2018-11-29', 0, 'On Progress', 'Firdauz Fanani', 'Firdauz Fanani', '2019-02-27 18:43:23', '2019-03-11 19:12:44'),
(6, 'Asus', 1, '61236', 'Asus', 'tes', 'Pcs', 'Rupiah', '5000', '5000', 0, '5000', '15-18-2018', 'tes', '2018-11-29', 0, 'On Progress', 'Firdauz Fanani', 'Firdauz Fanani', '2019-02-27 19:16:07', '2019-02-27 19:16:07'),
(7, 'ROG', 1, '61236', 'ROG', 'tes', 'Pcs', 'Rupiah', '5000', '5000', 0, '5000', '15-18-2018', 'tes', '2018-11-29', 0, 'On Progress', 'Firdauz Fanani', 'Firdauz Fanani', '2019-02-27 19:16:07', '2019-02-27 19:16:07'),
(8, 'LG', 1, '61236', 'LG', 'tes', 'Pcs', 'Rupiah', '5000', '5000', 0, '5000', '15-18-2018', 'tes', '2018-11-29', 0, 'On Progress', 'Firdauz Fanani', 'Firdauz Fanani', '2019-02-27 19:16:07', '2019-02-27 19:16:07'),
(9, 'HP', 1, '61236', 'HP', 'tes', 'Pcs', 'Rupiah', '5000', '5000', 0, '5000', '15-18-2018', 'tes', '2018-11-29', 0, 'On Progress', 'Firdauz Fanani', 'Firdauz Fanani', '2019-02-27 19:16:07', '2019-02-27 19:16:07'),
(10, 'Razer', 1, '61236', 'Razer', 'tes', 'Pcs', 'Rupiah', '5000', '5000', 0, '5000', '15-18-2018', 'tes', '2018-11-29', 0, 'On Progress', 'Firdauz Fanani', 'Firdauz Fanani', '2019-02-27 19:16:07', '2019-02-27 19:16:07'),
(11, 'Watch', 1, '61236', 'Watch', 'tes', 'Pcs', 'Rupiah', '5000', '5000', 0, '5000', '15-18-2018', 'tes', '2018-11-29', 0, 'On Progress', 'Firdauz Fanani', 'Firdauz Fanani', '2019-02-27 19:16:07', '2019-02-27 19:16:07'),
(12, 'Steel', 1, '61236', 'Steel', 'tes', 'Pcs', 'Rupiah', '5000', '5000', 0, '5000', '15-18-2018', 'tes', '2018-11-29', 0, 'On Progress', 'Firdauz Fanani', 'Firdauz Fanani', '2019-02-27 19:16:07', '2019-02-27 19:16:07'),
(13, 'sans', 1, '61236', 'Sans', 'tes', 'Pcs', 'Rupiah', '5000', '5000', 0, '5000', '15-18-2018', 'tes', '2018-11-29', 0, 'On Progress', 'Firdauz Fanani', 'Firdauz Fanani', '2019-02-27 19:16:07', '2019-02-27 19:16:07'),
(14, 'Sony', 3, '123', 'abc', 'abc', 'abc', 'abc', '123', '123', 0, '0', '123', '123', '123', 0, '123', 'admin', 'admin', '2019-05-05 20:02:24', '2019-05-05 20:02:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `items_buffer`
--

CREATE TABLE `items_buffer` (
  `id` int(10) UNSIGNED NOT NULL,
  `convert_product_id` int(11) NOT NULL,
  `category_part_num` smallint(6) NOT NULL,
  `mfr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_um` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_curr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `break_down_price` tinyint(1) NOT NULL,
  `price_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lead_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_valid_until` datetime NOT NULL,
  `item_need_qc` tinyint(1) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `items_quote`
--

CREATE TABLE `items_quote` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_part_num` smallint(6) NOT NULL,
  `mfr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_um` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_curr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `break_down_price` tinyint(1) NOT NULL,
  `price_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lead_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_valid_until` datetime NOT NULL,
  `item_need_qc` tinyint(1) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_buffer_price`
--

CREATE TABLE `item_buffer_price` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_buffer_id` int(11) NOT NULL,
  `sequence_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_valid_until` datetime NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_price`
--

CREATE TABLE `item_price` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sequence_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_date` date NOT NULL,
  `price_valid_until` date DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `item_price`
--

INSERT INTO `item_price` (`id`, `product_id`, `sequence_number`, `qty_item`, `unit_cost`, `sell_price`, `price_date`, `price_valid_until`, `status`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '500', '1000', '1200', '2019-02-19', '2019-02-22', '1', 'Firdauz Fanani', 'Firdauz Fanani', '2019-02-18 20:25:49', '2019-03-11 18:52:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_quote_price`
--

CREATE TABLE `item_quote_price` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sequence_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_valid_until` datetime NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `link_products`
--

CREATE TABLE `link_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id_1` int(11) NOT NULL,
  `link_type` smallint(6) NOT NULL,
  `product_id_2` int(11) NOT NULL,
  `reference` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(267, '2014_10_12_000000_create_users_table', 1),
(268, '2014_10_12_100000_create_password_resets_table', 1),
(269, '2018_11_15_163812_create_supplier_table', 1),
(270, '2018_11_15_164806_create_supplier_address_table', 1),
(271, '2018_11_15_165405_create_supplier_contact_table', 1),
(272, '2018_11_15_165703_create_category_items_table', 1),
(273, '2018_11_15_170040_create_sub_category_items_table', 1),
(274, '2018_11_15_174151_create_items_table', 1),
(275, '2018_11_15_174917_create_item_price_table', 1),
(276, '2018_11_15_175353_create_items_quote_table', 1),
(277, '2018_11_15_175612_create_items_price_quote_table', 1),
(278, '2018_11_15_175734_create_items_buffer_table', 1),
(279, '2018_11_15_180033_create_item_buffer_price_table', 1),
(280, '2018_11_15_180301_create_link_products_table', 1),
(281, '2018_11_15_180634_create_request_for_inquiry_table', 1),
(282, '2018_11_15_180922_create_rfi_detail_table', 1),
(283, '2018_11_15_181201_create_request_for_quotation_table', 1),
(284, '2018_11_15_181345_create_rfq_detail_table', 1),
(285, '2018_11_16_152735_create_quotation_supplier_table', 1),
(286, '2018_11_16_153404_create_quotation_supplier_detail_table', 1),
(287, '2018_11_16_154356_create_purchase_request_table', 1),
(288, '2018_11_16_154741_create_purchase_request_detail_table', 1),
(289, '2018_11_16_160723_create_po_supplier_table', 1),
(290, '2018_11_16_161336_create_po_supplier_detail_table', 1),
(291, '2018_11_16_161801_create_complain_letter_table', 1),
(292, '2018_11_16_162647_create_ponda_letter_table', 1),
(293, '2018_11_16_162853_create_claim_supplier_table', 1),
(294, '2018_11_16_163032_create_contract_supplier_table', 1),
(295, '2018_11_16_163526_create_send_inv_supplier_table', 1),
(296, '2018_11_16_164438_create_receiving_report_supplier_table', 1),
(297, '2018_11_16_171234_create_rr_supplier_detail_table', 1),
(298, '2018_11_16_171643_create_invoice_supplier_table', 1),
(299, '2018_11_16_172334_create_invoice_supplier_detail_table', 1),
(300, '2018_12_06_160657_create_posd_target_datelog_table', 1),
(301, '2018_12_06_160724_create_posd_ext_reference_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ponda_letter`
--

CREATE TABLE `ponda_letter` (
  `id` int(10) UNSIGNED NOT NULL,
  `pos_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_contact_id` int(11) NOT NULL,
  `nda_form_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nda_form_remark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attached_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posd_ext_reference`
--

CREATE TABLE `posd_ext_reference` (
  `id` int(10) UNSIGNED NOT NULL,
  `posd_id` int(11) NOT NULL,
  `reference_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `returned` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `returned_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posd_target_datelog`
--

CREATE TABLE `posd_target_datelog` (
  `id` int(10) UNSIGNED NOT NULL,
  `posd_id` int(11) NOT NULL,
  `old_target_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_target_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_supplier`
--

CREATE TABLE `po_supplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `po_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_number_seq` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pr_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_contact_id` int(11) NOT NULL,
  `shipment_term` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_term` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `import_via` smallint(6) NOT NULL,
  `cost_freight` smallint(6) NOT NULL,
  `currency` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_freight_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attached_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `invoice_status` smallint(6) NOT NULL,
  `pos_supplier_rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rejected` tinyint(1) NOT NULL DEFAULT 0,
  `reject_reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` int(11) DEFAULT NULL,
  `verified` tinyint(4) DEFAULT NULL,
  `approved_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified_by` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `null` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `po_supplier`
--

INSERT INTO `po_supplier` (`id`, `po_number`, `po_number_seq`, `pr_id`, `supplier_id`, `supplier_contact_id`, `shipment_term`, `payment_term`, `import_via`, `cost_freight`, `currency`, `cost_freight_amount`, `vat`, `remark`, `attached_file`, `status`, `invoice_status`, `pos_supplier_rating`, `rejected`, `reject_reason`, `approved`, `verified`, `approved_by`, `verified_by`, `approved_date`, `created_by`, `modified_by`, `created_at`, `updated_at`, `null`) VALUES
(12, '432', NULL, 22, 5, 5, 'Shipment test', 'tes', 0, 0, NULL, '5', '5', '5', 'E-Working Permit.pdf', 0, 2, '5', 0, '', NULL, 1, 'admin', NULL, '2019-05-07 03:29:17', 'admin', 'admin', '2019-03-19', '2019-05-06 20:29:17', NULL),
(13, '678', NULL, 23, 2, 2, 'tesss', 'tes', 0, 0, NULL, '7', '6', '5', 'Ijin VIO Bot Flow chart.pdf', 0, 0, '5', 0, NULL, NULL, 2, NULL, NULL, '2019-10-08 02:01:55', 'admin', 'admin', '2019-03-19', '2019-10-07 19:01:55', NULL),
(14, 'PO/2019/05/06/', NULL, 24, 2, 2, 'asas', 'asasasa', 0, 0, NULL, 'asasa', 'asas', 'asas', 'demo.ods', 0, 0, '3', 0, '', 1, 0, 'admin', NULL, '2019-05-07 03:24:48', 'admin', 'admin', '2019-05-06', '2019-05-06 19:19:14', NULL),
(15, 'PO/2019/10/14/', '0001', 25, 2, 2, 'sdad', 'sadasdas', 0, 0, NULL, '12131231', '3123', 'sadasd', 'index.txt', 0, 1, 'sdasda', 0, NULL, NULL, 0, NULL, NULL, '2019-10-14 03:56:49', 'admin', 'admin', '2019-10-14', '2019-10-13 20:56:49', NULL),
(17, 'PO/2019/10/14/', '0002', 27, 2, 2, 'dasdas', 'sadasda', 0, 0, NULL, '213123', '213123', '123123', 'index.txt', 0, 1, '123123', 0, NULL, NULL, 0, NULL, NULL, '2019-10-14 04:22:11', 'admin', 'admin', '2019-10-14', '2019-10-13 21:22:11', NULL),
(18, 'PO/2019/10/14/', '0003', 27, 2, 2, 'dasdas', 'sadasda', 0, 0, NULL, '213123', '213123', '123123', 'index.txt', 0, 1, '123123', 0, NULL, NULL, 0, NULL, NULL, '2019-10-14 04:30:42', 'admin', 'admin', '2019-10-14', '2019-10-13 21:30:42', NULL),
(19, 'PO/2019/10/14/', '0004', 27, 2, 2, 'dasdas', 'sadasda', 0, 0, NULL, '213123', '213123', '123123', 'index.txt', 0, 1, '123123', 0, NULL, NULL, 0, NULL, NULL, '2019-10-14 04:32:24', 'admin', 'admin', '2019-10-14', '2019-10-13 21:32:24', NULL),
(20, 'PO/2020/01/29/', '0001', 24, 2, 2, 'sdsd', 'sdsdsd', 0, 0, NULL, '121212', '31121', 'sdsdd', 'a.jpg', 0, 2, 'ssdsd', 0, NULL, NULL, 0, NULL, NULL, '2020-01-29 03:00:30', 'admin', 'admin', '2020-01-29', '2020-01-28 20:00:30', NULL),
(21, 'PO/2020/01/29/', '0002', 25, 2, 2, 'sdsd', 'sdsdsd', 0, 0, NULL, '121212', '31121', 'sdsdd', 'a.jpg', 0, 1, 'ssdsd', 0, NULL, NULL, 0, NULL, NULL, '2020-01-29 03:03:22', 'admin', 'admin', '2020-01-29', '2020-01-28 20:03:22', NULL),
(22, 'PO/2020/01/29/', '0003', 26, 2, 3, 'sdsd', 'sdsdsd', 0, 0, NULL, '3333', '3333', 'sdsdd', 'a.jpg', 0, 1, 'ssdsd', 0, NULL, NULL, 0, NULL, NULL, '2020-01-29 03:09:08', 'admin', 'admin', '2020-01-29', '2020-01-28 20:09:08', NULL),
(23, 'PO/2020/01/29/', '0004', 26, 2, 3, 'sdsd', 'sdsdsd', 0, 0, NULL, '3333', '3333', 'sdsdd', 'a.jpg', 0, 1, 'ssdsd', 0, NULL, NULL, 0, NULL, NULL, '2020-01-29 03:11:22', 'admin', 'admin', '2020-01-29', '2020-01-28 20:11:22', NULL),
(24, 'PO/2020/01/29/', '0005', 26, 2, 3, 'sdsd', 'sdsdsd', 0, 0, NULL, '3333', '3333', 'sdsdd', 'a.jpg', 0, 1, 'ssdsd', 0, NULL, NULL, 0, NULL, NULL, '2020-01-29 03:12:15', 'admin', 'admin', '2020-01-29', '2020-01-28 20:12:15', NULL),
(25, 'PO/2020/01/29/', '0006', 27, 2, 2, 'sdsd', 'sdsdsd', 0, 0, NULL, '121212', '31121', 'sdsdd', 'a.jpg', 0, 2, 'ssdsd', 0, NULL, NULL, 0, NULL, NULL, '2020-01-29 03:57:41', 'admin', 'admin', '2020-01-29', '2020-01-28 20:57:41', NULL),
(26, 'PO/2020/01/29/', '0007', 27, 2, 2, 'sdsd', 'sdsdsd', 0, 0, NULL, '121212', '31121', 'sdsdd', 'a.jpg', 0, 2, 'ssdsd', 0, NULL, NULL, 0, NULL, NULL, '2020-01-29 04:23:44', 'admin', 'admin', '2020-01-29', '2020-01-28 21:23:44', NULL),
(27, 'PO/2020/01/29/', '0008', 28, 2, 2, 'sdsd', 'sdsdsd', 0, 0, NULL, '121212', '3333', 'sdsdd', 'a.jpg', 0, 2, 'ssdsd', 0, NULL, NULL, 0, NULL, NULL, '2020-01-29 06:06:43', 'admin', 'admin', '2020-01-29', '2020-01-28 23:06:43', NULL),
(28, 'PO/2020/01/29/', '0009', 28, 2, 2, 'sdsd', 'sdsdsd', 0, 0, NULL, '121212', '3333', 'sdsdd', 'a.jpg', 0, 2, 'ssdsd', 0, NULL, NULL, 0, NULL, NULL, '2020-01-29 06:08:25', 'admin', 'admin', '2020-01-29', '2020-01-28 23:08:25', NULL),
(29, 'PO/2020/01/29/', '0010', 28, 2, 2, 'sdsd', 'sdsdsd', 0, 0, NULL, '121212', '3333', 'sdsdd', 'a.jpg', 0, 2, 'ssdsd', 0, NULL, NULL, 0, NULL, NULL, '2020-01-29 06:10:48', 'admin', 'admin', '2020-01-29', '2020-01-28 23:10:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_supplier_detail`
--

CREATE TABLE `po_supplier_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `pos_id` int(11) NOT NULL,
  `pr_detail_id` int(11) NOT NULL,
  `sequence_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `qty_pos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `um_pos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_qty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hscode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `have_external_reference` tinyint(1) NOT NULL DEFAULT 0,
  `target_date_original` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_date_new` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_arrival_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `po_supplier_detail`
--

INSERT INTO `po_supplier_detail` (`id`, `pos_id`, `pr_detail_id`, `sequence_number`, `product_id`, `qty_pos`, `um_pos`, `balance_qty`, `curr`, `unit_price`, `hscode`, `have_external_reference`, `target_date_original`, `target_date_new`, `last_arrival_date`, `status`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(4, 8, 1, NULL, 9, '100', 'Pcs', NULL, 'Rupiah', '5000', NULL, 0, NULL, NULL, NULL, '1', 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-17 20:29:19', '2019-03-18 19:17:20'),
(5, 8, 1, NULL, 1, '22', 'yes', NULL, 'Rupiah', '2000', NULL, 0, NULL, NULL, NULL, '1', 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-17 20:29:19', '2019-03-18 19:17:20'),
(6, 9, 3, NULL, 9, '55', 'Pcs', NULL, 'Rupiah', '5000', NULL, 0, NULL, NULL, NULL, '1', 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-17 20:56:32', '2019-03-18 02:33:27'),
(7, 9, 3, NULL, 1, '21', 'yes', NULL, 'Rupiah', '2000', NULL, 0, NULL, NULL, NULL, '1', 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-17 20:56:32', '2019-03-18 02:33:27'),
(8, 11, 19, NULL, 4, '200', 'Pcs', NULL, 'Rupiah', '500', NULL, 0, NULL, NULL, NULL, '1', 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-18 00:43:57', '2019-03-18 02:34:06'),
(9, 12, 22, NULL, 2, '21', 'Pcs', NULL, 'Rupiah', '1000', NULL, 0, NULL, NULL, NULL, '1', 'Firdauz Fanani', 'admin', '2019-03-19 02:28:47', '2019-05-06 20:29:17'),
(10, 12, 22, NULL, 1, '12', 'Pcs', NULL, 'Rupiah', '2000', NULL, 0, NULL, NULL, NULL, '1', 'Firdauz Fanani', 'admin', '2019-03-19 02:28:47', '2019-05-06 20:29:17'),
(11, 13, 23, NULL, 4, '22', 'Pcs', NULL, 'Rupiah', '500', NULL, 0, NULL, NULL, NULL, '1', 'Firdauz Fanani', 'admin', '2019-03-19 02:29:58', '2019-10-07 19:01:56'),
(12, 15, 25, NULL, 4, '22', 'Pcs', NULL, 'Rupiah', '500', NULL, 0, NULL, NULL, NULL, '1', 'admin', 'admin', '2019-10-13 20:56:49', '2019-10-13 20:56:49'),
(13, 15, 25, NULL, 1, '12', 'Pcs', NULL, 'Rupiah', '2000', NULL, 0, NULL, NULL, NULL, '1', 'admin', 'admin', '2019-10-13 20:56:49', '2019-10-13 20:56:49'),
(14, 16, 26, NULL, 4, '22', 'Pcs', NULL, 'Rupiah', '500', NULL, 0, NULL, NULL, NULL, '1', 'admin', 'admin', '2019-10-13 21:16:10', '2019-10-13 21:16:10'),
(15, 16, 26, NULL, 1, '12', 'Pcs', NULL, 'Rupiah', '2000', NULL, 0, NULL, NULL, NULL, '1', 'admin', 'admin', '2019-10-13 21:16:10', '2019-10-13 21:16:10'),
(16, 19, 27, NULL, 4, '22', 'Pcs', NULL, 'Rupiah', '500', NULL, 0, NULL, NULL, NULL, '1', 'admin', 'admin', '2019-10-13 21:32:24', '2019-10-13 21:32:24'),
(17, 19, 27, NULL, 1, '12', 'Pcs', NULL, 'Rupiah', '2000', NULL, 0, NULL, NULL, NULL, '1', 'admin', 'admin', '2019-10-13 21:32:24', '2019-10-13 21:32:24'),
(18, 20, 24, NULL, 4, '22', 'Pcs', NULL, 'Rupiah', '500', NULL, 0, NULL, NULL, NULL, '1', 'admin', 'admin', '2020-01-28 20:00:30', '2020-01-28 20:00:30'),
(19, 20, 24, NULL, 1, '12', 'Pcs', NULL, 'Rupiah', '2000', NULL, 0, NULL, NULL, NULL, '1', 'admin', 'admin', '2020-01-28 20:00:30', '2020-01-28 20:00:30'),
(20, 21, 25, NULL, 4, '22', 'Pcs', NULL, 'Rupiah', '121212', NULL, 0, NULL, NULL, NULL, '1', 'admin', 'admin', '2020-01-28 20:03:22', '2020-01-28 20:03:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_request`
--

CREATE TABLE `purchase_request` (
  `id` int(10) UNSIGNED NOT NULL,
  `pr_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pr_number_seq` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qs_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_mode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pr_dept` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pr_reference_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pr_reference_id` int(11) DEFAULT NULL,
  `pr_requester_id` int(11) DEFAULT NULL,
  `purpose` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose_remark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `pr_date` date NOT NULL,
  `pr_target` date DEFAULT NULL,
  `rejected` tinyint(4) DEFAULT 0,
  `reject_reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` tinyint(4) DEFAULT 0,
  `approved_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `null` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `purchase_request`
--

INSERT INTO `purchase_request` (`id`, `pr_number`, `pr_number_seq`, `qs_id`, `request_from`, `request_mode`, `pr_dept`, `pr_reference_type`, `pr_reference_id`, `pr_requester_id`, `purpose`, `purpose_remark`, `status`, `pr_date`, `pr_target`, `rejected`, `reject_reason`, `approved`, `approved_by`, `approved_date`, `created_by`, `modified_by`, `created_at`, `updated_at`, `null`) VALUES
(22, '789', NULL, '33', 'FF', '0', NULL, NULL, NULL, NULL, 'tes', 'Testing', 2, '2019-03-19', NULL, 0, NULL, 0, NULL, NULL, 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-19', '2019-03-19 02:28:47', NULL),
(23, '541', NULL, '34', 'FF', '0', NULL, NULL, NULL, NULL, 'tes', 'Testing', 0, '2019-03-19', NULL, 0, NULL, 0, NULL, NULL, 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-19', '2019-03-19 02:29:58', NULL),
(24, 'PR/Dept/2019/05/06/001', NULL, '35', 'abc', '0', NULL, NULL, NULL, NULL, 'abc', 'abc', 2, '2019-05-01', NULL, 0, '', 1, 'admin', NULL, 'admin', 'admin', '2019-05-06', '2020-01-29 00:09:19', NULL),
(25, 'PR/Dept/2019/10/10/', NULL, '34', 'test111', '0', NULL, NULL, NULL, NULL, 'Pupose', 'Remark', 2, '2019-10-11', NULL, 0, '', 1, 'admin', NULL, 'admin', 'admin', '2019-10-10', '2020-01-29 00:08:45', NULL),
(26, 'PR/Dept/2019/10/14/', '0001', '33', 'test111', '0', NULL, NULL, NULL, NULL, 'Abc', 'abc', 2, '2019-10-15', NULL, 0, '', 1, 'admin', NULL, 'admin', 'admin', '2019-10-14', '2020-01-29 00:08:32', NULL),
(27, 'PR/Dept/2019/10/14/', '0002', '35', 'test111', '0', NULL, NULL, NULL, NULL, 'asas', 'asasas', 2, '2019-10-15', NULL, 0, '', 1, 'admin', NULL, 'admin', 'admin', '2019-10-14', '2020-01-28 23:05:50', NULL),
(28, 'PR/Dept/2020/01/29/', '0001', '33', 'Angga', '1', NULL, NULL, NULL, NULL, 'asasa', 'sasas', 2, '2020-01-17', NULL, 0, '', 1, 'admin', NULL, 'admin', 'admin', '2020-01-29', '2020-01-28 23:10:48', NULL),
(29, 'PR/Dept/2020/01/30/', '0001', '34', 'test112', '0', NULL, NULL, NULL, NULL, 'asasa', 'sasas', 0, '2020-01-31', NULL, 0, '', 1, 'admin', NULL, 'admin', 'admin', '2020-01-30', '2020-01-29 23:23:13', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_request_detail`
--

CREATE TABLE `purchase_request_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `pr_id` int(11) NOT NULL,
  `sequence_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_product_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `qty_pr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `um_pr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance_qty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `target_date_new` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `purchase_request_detail`
--

INSERT INTO `purchase_request_detail` (`id`, `pr_id`, `sequence_number`, `type_product_id`, `product_id`, `qty_pr`, `um_pr`, `balance_qty`, `status`, `created_by`, `modified_by`, `created_at`, `updated_at`, `target_date_new`) VALUES
(1, 17, NULL, NULL, 4, '22', 'Pcs', NULL, '1', 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-14 18:38:28', '2019-03-14 18:38:28', NULL),
(2, 18, NULL, NULL, 2, '21', 'Pcs', NULL, '1', 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-15 02:44:40', '2019-03-15 02:44:40', NULL),
(3, 18, NULL, NULL, 1, '12', 'Pcs', NULL, '1', 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-15 02:44:40', '2019-03-15 02:44:40', NULL),
(4, 19, NULL, NULL, 4, '22', 'Pcs', NULL, '1', 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-15 02:45:34', '2019-03-15 02:45:34', NULL),
(5, 20, NULL, NULL, 9, '55', 'Pcs', NULL, '1', 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-15 02:46:17', '2019-03-15 02:46:17', NULL),
(7, 20, NULL, NULL, 1, '22', 'yes', NULL, '0', 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-15 03:09:20', '2019-03-15 03:09:20', NULL),
(8, 21, NULL, NULL, 2, '21', 'Pcs', NULL, '1', 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-19 02:12:54', '2019-03-19 02:12:54', NULL),
(9, 21, NULL, NULL, 1, '12', 'Pcs', NULL, '1', 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-19 02:12:54', '2019-03-19 02:12:54', NULL),
(10, 22, NULL, NULL, 2, '21', 'Pcs', NULL, '1', 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-19 02:14:51', '2019-03-19 02:14:51', NULL),
(11, 22, NULL, NULL, 1, '12', 'Pcs', NULL, '1', 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-19 02:14:51', '2019-03-19 02:14:51', NULL),
(12, 23, NULL, NULL, 4, '22', 'Pcs', NULL, '1', 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-19 02:16:11', '2019-03-19 02:16:11', NULL),
(13, 25, NULL, NULL, 2, '21', 'Pcs', NULL, '1', 'admin', 'admin', '2019-10-09 21:15:19', '2019-10-09 21:15:19', NULL),
(14, 25, NULL, NULL, 4, '22', 'Pcs', NULL, '1', 'admin', 'admin', '2019-10-09 21:15:19', '2019-10-09 21:15:19', NULL),
(15, 26, NULL, NULL, 2, '21', 'Pcs', NULL, '1', 'admin', 'admin', '2019-10-13 20:51:41', '2019-10-13 20:51:41', NULL),
(16, 26, NULL, NULL, 1, '12', 'Pcs', NULL, '1', 'admin', 'admin', '2019-10-13 20:51:41', '2019-10-13 20:51:41', NULL),
(17, 27, NULL, NULL, 4, '22', 'Pcs', NULL, '1', 'admin', 'admin', '2019-10-13 20:52:12', '2019-10-13 20:52:12', NULL),
(18, 27, NULL, NULL, 1, '12', 'Pcs', NULL, '1', 'admin', 'admin', '2019-10-13 20:52:13', '2019-10-13 20:52:13', NULL),
(19, 28, NULL, NULL, 2, '21', 'Pcs', NULL, '1', 'admin', 'admin', '2020-01-28 23:04:53', '2020-01-28 23:04:53', NULL),
(20, 28, NULL, NULL, 1, '12', 'Pcs', NULL, '1', 'admin', 'admin', '2020-01-28 23:04:54', '2020-01-28 23:04:54', NULL),
(21, 29, NULL, NULL, 2, '21', 'Pcs', NULL, '1', 'admin', 'admin', '2020-01-29 23:22:48', '2020-01-29 23:22:48', NULL),
(22, 29, NULL, NULL, 4, '22', 'Pcs', NULL, '1', 'admin', 'admin', '2020-01-29 23:22:48', '2020-01-29 23:22:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `quotation_supplier`
--

CREATE TABLE `quotation_supplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `qs_num` int(11) NOT NULL,
  `qs_date` date NOT NULL,
  `rfq_id` int(11) NOT NULL,
  `rejected` tinyint(1) NOT NULL DEFAULT 0,
  `reject_reason` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `approved_by` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_contact_id` int(11) NOT NULL,
  `shipment_term` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_term` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `import_via` smallint(6) NOT NULL,
  `cost_freight` smallint(6) NOT NULL,
  `cost_freight_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qs_rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attached_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `delivertime` int(50) NOT NULL,
  `discount` int(100) DEFAULT 0,
  `tax` int(100) DEFAULT 0,
  `termcondition` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `quotation_supplier`
--

INSERT INTO `quotation_supplier` (`id`, `qs_num`, `qs_date`, `rfq_id`, `rejected`, `reject_reason`, `approved`, `approved_by`, `approved_date`, `supplier_id`, `supplier_contact_id`, `shipment_term`, `payment_term`, `import_via`, `cost_freight`, `cost_freight_amount`, `qs_rating`, `remark`, `attached_file`, `status`, `delivertime`, `discount`, `tax`, `termcondition`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(33, 6124, '2019-03-19', 1, 0, NULL, 1, NULL, NULL, 2, 2, 'Shipment test', 'Payment Test', 0, 0, '5000', '5', '5', 'E-Working Permit.pdf', 2, 5, 5, 5, 'tes', 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-19 00:18:41', '2020-01-28 23:04:53'),
(34, 76123, '2019-03-19', 3, 0, NULL, 1, NULL, NULL, 5, 5, 'Shipment test 2', 'tes', 0, 0, '5000', '5', '5', 'E-Working Permit.pdf', 2, 5, 5, 5, 'Tes', 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-19 00:44:57', '2020-01-29 23:22:48'),
(35, 123, '2019-05-01', 9, 0, NULL, 1, NULL, NULL, 2, 2, '121', '1212', 1, 0, '12121', '2121', '1212', 'demo.ods', 0, 1, 1214, 212, '121212', 'admin', 'admin', '2019-05-05 20:03:42', '2019-10-13 20:52:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quotation_supplier_detail`
--

CREATE TABLE `quotation_supplier_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `qs_id` int(11) NOT NULL,
  `rfq_detail_id` int(11) NOT NULL,
  `sequence_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_product_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `qty_qs` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `um_qs` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lead_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_valid_until` datetime NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validated` tinyint(1) DEFAULT NULL,
  `validated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validated_date` datetime DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `approved_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `quotation_supplier_detail`
--

INSERT INTO `quotation_supplier_detail` (`id`, `qs_id`, `rfq_detail_id`, `sequence_no`, `type_product_id`, `product_id`, `qty_qs`, `um_qs`, `curr`, `unit_price`, `lead_time`, `price_valid_until`, `status`, `validated`, `validated_by`, `validated_date`, `approved`, `approved_by`, `approved_date`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 35, 3, NULL, NULL, 4, '22', 'Pcs', 'Rupiah', '500', 'tes', '2018-11-29 00:00:00', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-12 01:14:26', '2019-03-12 01:14:26'),
(2, 34, 3, NULL, NULL, 4, '22', 'Pcs', 'Rupiah', '500', 'tes', '2018-11-29 00:00:00', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-12 01:37:26', '2019-03-12 01:37:26'),
(3, 34, 1, NULL, NULL, 2, '21', 'Pcs', 'Rupiah', '1000', 'asdfa', '2018-11-29 17:43:34', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-12 01:41:03', '2019-03-18 01:12:58'),
(4, 35, 1, NULL, NULL, 1, '12', 'Pcs', 'Rupiah', '2000', 'ASDF', '2018-11-29 17:43:34', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-12 01:41:03', '2019-03-18 01:12:58'),
(5, 33, 1, NULL, NULL, 2, '21', 'Pcs', 'Rupiah', '1000', 'asdfa', '2018-11-29 17:43:34', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-19 00:18:41', '2019-03-19 00:18:41'),
(6, 33, 1, NULL, NULL, 1, '12', 'Pcs', 'Rupiah', '2000', 'ASDF', '2018-11-29 17:43:34', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-19 00:18:41', '2019-03-19 00:18:41'),
(7, 34, 3, NULL, NULL, 4, '22', 'Pcs', 'Rupiah', '500', 'tes', '2018-11-29 00:00:00', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-19 00:44:57', '2019-03-19 00:44:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `receiving_report_supplier`
--

CREATE TABLE `receiving_report_supplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `pos_id` int(11) NOT NULL,
  `delivery_supplier_num` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_supplier_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_for_inquiry`
--

CREATE TABLE `request_for_inquiry` (
  `id` int(10) UNSIGNED NOT NULL,
  `rfi_dept_id` int(11) NOT NULL,
  `rfi_requester_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `request_for_inquiry`
--

INSERT INTO `request_for_inquiry` (`id`, `rfi_dept_id`, `rfi_requester_id`, `customer_id`, `status`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 55, '2', '', '', NULL, '2019-10-11 03:03:21'),
(2, 2, 7, 88, '0', '', '', NULL, '2019-10-11 02:56:22'),
(3, 3, 7, 11, '0', '', '', NULL, '2019-10-11 02:57:45'),
(4, 4, 7, 12, '0', '', '', NULL, '2019-10-11 03:00:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_for_quotation`
--

CREATE TABLE `request_for_quotation` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_contact_id` int(11) NOT NULL,
  `inquiry_customer` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_reference` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rfq_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rfq_number_seq` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `termcondition` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `null` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `request_for_quotation`
--

INSERT INTO `request_for_quotation` (`id`, `supplier_id`, `supplier_contact_id`, `inquiry_customer`, `vendor_reference`, `order_date`, `rfq_number`, `rfq_number_seq`, `termcondition`, `status`, `created_by`, `modified_by`, `created_at`, `updated_at`, `null`) VALUES
(1, 2, 2, '0', 'GMF', '2019-03-06', '12345', '1', 'tes no inquiry', 2, 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-06', '2019-03-19 00:18:41', NULL),
(3, 5, 5, '4', 'Mega', '2019-03-06', '56789', '2', 'tes mega', 2, 'Firdauz Fanani', 'Firdauz Fanani', '2019-03-06', '2019-03-19 00:44:57', NULL),
(69, 2, 2, '1', 'sdasdasd', '2019-10-18', 'RFQ/2019/10/11/', '0001', 'adasdasdad', 0, 'admin', 'admin', '2019-10-11', '2019-10-11 03:03:21', NULL),
(70, 2, 2, 'Select', 'test', '2019-10-16', 'RFQ/2019/10/15/', '0001', 'test', 0, 'admin', 'admin', '2019-10-15', '2019-10-15 02:34:47', NULL),
(71, 2, 2, 'Select', 'test', '2019-10-23', 'RFQ/2019/10/15/', '0002', 'testing', 0, 'admin', 'admin', '2019-10-15', '2019-10-15 02:35:21', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rfi_detail`
--

CREATE TABLE `rfi_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `rfi_id` int(11) NOT NULL,
  `sequence_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_product_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty_rfi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `um_rfi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rfi_detail`
--

INSERT INTO `rfi_detail` (`id`, `rfi_id`, `sequence_number`, `type_product_id`, `product_id`, `qty_rfi`, `um_rfi`, `status`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(5, 1, '5', 3, 1, '55', 'Pcs', '0', '', '', NULL, NULL),
(6, 2, '6', 4, 2, '22', 'Pcs', '0', '', '', NULL, NULL),
(8, 3, '6', 4, 1, '66', 'Pcs', '0', '', '', NULL, NULL),
(9, 4, '5', 1, 4, '60', 'Pcs', '0', '', '', NULL, NULL),
(12, 4, '5', 1, 2, '60', 'Pcs', '0', '', '', NULL, NULL),
(13, 0, '5', 3, 1, '55', 'Pcs', '0', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rfq_detail`
--

CREATE TABLE `rfq_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `rfq_id` int(11) DEFAULT NULL,
  `rfi_detail_id` int(11) DEFAULT NULL,
  `sequence_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `type_product_id` int(11) DEFAULT 0,
  `product_id` int(11) DEFAULT NULL,
  `qty_rfq` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `um_rfq` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validation_needed` tinyint(1) DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rfq_detail`
--

INSERT INTO `rfq_detail` (`id`, `rfq_id`, `rfi_detail_id`, `sequence_number`, `type_product_id`, `product_id`, `qty_rfq`, `um_rfq`, `status`, `validation_needed`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '0', 0, 2, '21', 'Pcs', '1', NULL, NULL, NULL, '2019-03-06 03:03:27', '2019-03-06 03:14:40'),
(2, 1, NULL, '0', 0, 1, '12', 'Pcs', '1', NULL, NULL, NULL, '2019-03-06 03:03:27', '2019-03-06 03:14:40'),
(3, 2, NULL, '0', 0, 1, '53', 'Pcss', '1', NULL, NULL, NULL, '2019-03-06 03:04:27', '2019-03-06 03:14:56'),
(4, 3, NULL, '0', 0, 4, '22', 'Pcs', '1', NULL, NULL, NULL, '2019-03-06 03:06:19', '2019-03-06 03:15:18'),
(5, 5, NULL, '0', 0, 1, '55', 'Pcs', NULL, NULL, NULL, NULL, '2019-03-19 02:39:03', '2019-03-19 02:39:03'),
(6, 6, NULL, '0', 0, 2, '22', 'Pcs', NULL, NULL, NULL, NULL, '2019-03-19 02:40:28', '2019-03-19 02:40:28'),
(7, 7, NULL, '0', 0, 1, '66', 'Pcs', NULL, NULL, NULL, NULL, '2019-04-24 20:34:21', '2019-04-24 20:34:21'),
(8, 12, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-10 23:37:45', '2019-10-10 23:37:45'),
(9, 12, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-10 23:37:45', '2019-10-10 23:37:45'),
(10, 13, NULL, '0', 0, 1, '66', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-10 23:43:25', '2019-10-10 23:43:25'),
(11, 14, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-10 23:58:35', '2019-10-10 23:58:35'),
(12, 14, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-10 23:58:35', '2019-10-10 23:58:35'),
(13, 15, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:02:43', '2019-10-11 00:02:43'),
(14, 15, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:02:43', '2019-10-11 00:02:43'),
(15, 16, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:05:35', '2019-10-11 00:05:35'),
(16, 16, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:05:35', '2019-10-11 00:05:35'),
(17, 17, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:16:36', '2019-10-11 00:16:36'),
(18, 17, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:16:36', '2019-10-11 00:16:36'),
(19, 18, NULL, '0', 0, 1, '66', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:19:08', '2019-10-11 00:19:08'),
(20, 19, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:20:08', '2019-10-11 00:20:08'),
(21, 19, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:20:08', '2019-10-11 00:20:08'),
(22, 20, NULL, '0', 0, 2, '22', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:21:38', '2019-10-11 00:21:38'),
(23, 21, NULL, '0', 0, 1, '55', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:23:40', '2019-10-11 00:23:40'),
(24, 22, NULL, '0', 0, 1, '66', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:25:01', '2019-10-11 00:25:01'),
(25, 23, NULL, '0', 0, 2, '22', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:27:19', '2019-10-11 00:27:19'),
(26, 24, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:28:35', '2019-10-11 00:28:35'),
(27, 24, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:28:35', '2019-10-11 00:28:35'),
(28, 25, NULL, '0', 0, 1, '55', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:32:03', '2019-10-11 00:32:03'),
(29, 26, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:34:50', '2019-10-11 00:34:50'),
(30, 26, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:34:50', '2019-10-11 00:34:50'),
(31, 27, NULL, '0', 0, 2, '22', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:39:34', '2019-10-11 00:39:34'),
(32, 28, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:43:48', '2019-10-11 00:43:48'),
(33, 28, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:43:49', '2019-10-11 00:43:49'),
(34, 29, NULL, '0', 0, 2, '22', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:46:02', '2019-10-11 00:46:02'),
(35, 30, NULL, '0', 0, 1, '66', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:46:46', '2019-10-11 00:46:46'),
(36, 31, NULL, '0', 0, 1, '55', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:52:14', '2019-10-11 00:52:14'),
(37, 32, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:59:33', '2019-10-11 00:59:33'),
(38, 32, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 00:59:33', '2019-10-11 00:59:33'),
(39, 33, NULL, '0', 0, 1, '66', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:04:30', '2019-10-11 01:04:30'),
(40, 34, NULL, '0', 0, 1, '66', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:05:48', '2019-10-11 01:05:48'),
(41, 35, NULL, '0', 0, 2, '22', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:06:29', '2019-10-11 01:06:29'),
(42, 36, NULL, '0', 0, 1, '55', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:08:24', '2019-10-11 01:08:24'),
(43, 37, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:14:46', '2019-10-11 01:14:46'),
(44, 37, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:14:46', '2019-10-11 01:14:46'),
(45, 38, NULL, '0', 0, 2, '22', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:15:42', '2019-10-11 01:15:42'),
(46, 39, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:16:14', '2019-10-11 01:16:14'),
(47, 39, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:16:14', '2019-10-11 01:16:14'),
(48, 40, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:17:08', '2019-10-11 01:17:08'),
(49, 40, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:17:08', '2019-10-11 01:17:08'),
(50, 41, NULL, '0', 0, 1, '66', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:18:18', '2019-10-11 01:18:18'),
(51, 42, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:18:37', '2019-10-11 01:18:37'),
(52, 42, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:18:37', '2019-10-11 01:18:37'),
(53, 43, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:22:22', '2019-10-11 01:22:22'),
(54, 43, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:22:22', '2019-10-11 01:22:22'),
(55, 44, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:38:45', '2019-10-11 01:38:45'),
(56, 44, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:38:45', '2019-10-11 01:38:45'),
(57, 45, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:39:11', '2019-10-11 01:39:11'),
(58, 45, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:39:11', '2019-10-11 01:39:11'),
(59, 46, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:39:42', '2019-10-11 01:39:42'),
(60, 46, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:39:42', '2019-10-11 01:39:42'),
(61, 47, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:40:19', '2019-10-11 01:40:19'),
(62, 47, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:40:20', '2019-10-11 01:40:20'),
(63, 48, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:41:06', '2019-10-11 01:41:06'),
(64, 48, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:41:06', '2019-10-11 01:41:06'),
(65, 49, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:42:05', '2019-10-11 01:42:05'),
(66, 49, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:42:05', '2019-10-11 01:42:05'),
(67, 50, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:43:47', '2019-10-11 01:43:47'),
(68, 50, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:43:47', '2019-10-11 01:43:47'),
(69, 51, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:44:15', '2019-10-11 01:44:15'),
(70, 51, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:44:15', '2019-10-11 01:44:15'),
(71, 52, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:45:19', '2019-10-11 01:45:19'),
(72, 52, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 01:45:19', '2019-10-11 01:45:19'),
(73, 53, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:11:31', '2019-10-11 02:11:31'),
(74, 53, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:11:31', '2019-10-11 02:11:31'),
(75, 54, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:11:49', '2019-10-11 02:11:49'),
(76, 54, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:11:49', '2019-10-11 02:11:49'),
(77, 55, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:13:07', '2019-10-11 02:13:07'),
(78, 55, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:13:07', '2019-10-11 02:13:07'),
(79, 56, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:13:39', '2019-10-11 02:13:39'),
(80, 56, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:13:39', '2019-10-11 02:13:39'),
(81, 57, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:14:18', '2019-10-11 02:14:18'),
(82, 57, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:14:18', '2019-10-11 02:14:18'),
(83, 58, NULL, '0', 0, 1, '66', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:15:43', '2019-10-11 02:15:43'),
(84, 59, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:16:02', '2019-10-11 02:16:02'),
(85, 59, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:16:02', '2019-10-11 02:16:02'),
(86, 60, NULL, '0', 0, 2, '22', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:17:14', '2019-10-11 02:17:14'),
(87, 61, NULL, '0', 0, 1, '55', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:49:42', '2019-10-11 02:49:42'),
(88, 62, NULL, '0', 0, 1, '66', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:50:20', '2019-10-11 02:50:20'),
(89, 63, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:50:38', '2019-10-11 02:50:38'),
(90, 63, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:50:38', '2019-10-11 02:50:38'),
(91, 64, NULL, '0', 0, 1, '55', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:53:03', '2019-10-11 02:53:03'),
(92, 65, NULL, '0', 0, 1, '55', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:55:44', '2019-10-11 02:55:44'),
(93, 66, NULL, '0', 0, 2, '22', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:56:22', '2019-10-11 02:56:22'),
(94, 67, NULL, '0', 0, 1, '66', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 02:57:45', '2019-10-11 02:57:45'),
(95, 68, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 03:00:11', '2019-10-11 03:00:11'),
(96, 68, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 03:00:11', '2019-10-11 03:00:11'),
(97, 69, NULL, '0', 0, 1, '55', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-11 03:03:21', '2019-10-11 03:03:21'),
(98, 70, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-15 02:34:47', '2019-10-15 02:34:47'),
(99, 70, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-15 02:34:47', '2019-10-15 02:34:47'),
(100, 71, NULL, '0', 0, 2, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-15 02:35:21', '2019-10-15 02:35:21'),
(101, 71, NULL, '0', 0, 4, '60', 'Pcs', NULL, NULL, NULL, NULL, '2019-10-15 02:35:22', '2019-10-15 02:35:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rr_supplier_detail`
--

CREATE TABLE `rr_supplier_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `rr_suplier_id` int(11) NOT NULL,
  `pos_detail_id` int(11) NOT NULL,
  `sequence_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty_rr_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `um_rr_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `send_inv_supplier`
--

CREATE TABLE `send_inv_supplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `pos_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_contact_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_form_id` int(11) NOT NULL,
  `send_form_remark` int(11) NOT NULL,
  `inoice_id` int(11) NOT NULL,
  `attached_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_category_items`
--

CREATE TABLE `sub_category_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_type` smallint(6) NOT NULL,
  `rejected` tinyint(1) NOT NULL DEFAULT 0,
  `reject_reason` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `approved_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_Date` datetime NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `null` int(11) DEFAULT NULL,
  `del` int(11) NOT NULL DEFAULT 0,
  `npwp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_name`, `supplier_type`, `rejected`, `reject_reason`, `approved`, `approved_by`, `approved_Date`, `created_by`, `modified_by`, `created_at`, `updated_at`, `null`, `del`, `npwp`) VALUES
(2, 'test112', 1, 0, '', 1, 'admin', '2018-12-11 15:48:34', 'admin', 'admin', '2018-12-11 10:18:34', '2019-10-29 19:26:29', NULL, 0, NULL),
(3, 'gursimrat', 1, 1, 'Pengen testing Reject', 0, 'admin', '2018-12-18 14:57:43', 'admin', 'admin', '2018-12-18 09:27:43', '2019-02-20 01:03:36', NULL, 0, NULL),
(5, 'Vendor Testing AC', 1, 0, '', 1, 'Firdauz Fanani', '2019-02-19 07:10:24', 'Firdauz Fanani', 'Firdauz Fanani', '2019-02-19 00:10:24', '2019-02-19 00:10:54', NULL, 0, NULL),
(6, 'Vicky Yuliandi', 1, 0, '', 1, 'Firdauz Fanani', '2019-02-20 06:32:54', 'Firdauz Fanani', 'Firdauz Fanani', '2019-02-19 23:32:54', '2019-10-10 19:43:11', NULL, 0, NULL),
(9, 'Baru', 1, 0, NULL, 0, 'admin', '2019-10-11 02:17:45', 'admin', 'admin', '2019-10-10 19:17:45', '2019-10-10 21:35:07', NULL, 0, NULL),
(10, 'Angga', 1, 0, '', 1, 'admin', '2019-11-18 02:50:09', 'admin', 'admin', '2019-11-17 19:50:09', '2019-11-19 20:42:51', NULL, 0, 'index.txt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier_address`
--

CREATE TABLE `supplier_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `address_type` smallint(6) DEFAULT NULL,
  `address_line_1` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_2` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_3` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `supplier_address`
--

INSERT INTO `supplier_address` (`id`, `supplier_id`, `address_type`, `address_line_1`, `address_line_2`, `address_line_3`, `city`, `post_code`, `province_id`, `area_id`, `country_id`, `phone`, `fax`, `email`, `website`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '2018-12-10 11:48:02', '2018-12-10 11:48:02'),
(2, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '2018-12-10 11:48:30', '2019-10-29 19:26:29'),
(3, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '2018-12-11 10:18:34', '2019-10-29 19:26:29'),
(4, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '2018-12-18 09:27:43', '2018-12-18 09:27:43'),
(5, 4, 1, 'tes', 'tes', NULL, '2', '1234', '12', '123', '13', '75123', '123512', 'ff@ff.com', NULL, 'Firdauz Fanani', 'Firdauz Fanani', '2019-02-18 19:39:14', '2019-02-18 19:41:21'),
(6, 5, 1, 'Tekno', 'Tekno', NULL, 'Tangerang', '57169', 'Jakarta', 'Tangerang', 'Indonesia', '087512512', '81239512', 'ff@ff.com', NULL, 'Firdauz Fanani', 'Firdauz Fanani', '2019-02-19 00:10:24', '2019-02-19 00:10:54'),
(7, 6, 2, 'Intercon', 'Plaza', NULL, 'Jakarta', '56123', 'Jakarta', 'Kemangan', 'Indonesia', '087512512', '81239512', 'ff@ff.com', NULL, 'Firdauz Fanani', 'Firdauz Fanani', '2019-02-19 23:32:54', '2019-02-19 23:39:14'),
(8, 2, 1, 'Jl Merdeka', 'Jl rajawali', 'Jl Merpati', 'Jakarta', '21213', 'Jakarta', 'Jakarta', 'Indonesia', '08983928323', '232323', 'angga@angga.com', 'www.angga.co.id', 'admin', 'admin', '2019-04-22 19:58:23', '2019-04-22 19:58:23'),
(10, 9, 1, 'jakarta', 'bandung', 'surabaya', 'tangerang', '212134', 'Banten', 'Jakarta', 'Indonesia', '0808089796', '1212455', 'coba@coba.com', 'www.coba.com', 'admin', 'admin', '2019-10-10 19:17:46', '2019-10-10 19:17:46'),
(11, 10, 1, 'abc', 'abc', 'abc', 'abc', '1212', 'abc', 'abc', 'abc', '1212', '1212', 'abcz@email.com', 'www.cobacoba.com', 'admin', 'admin', '2019-11-17 19:50:09', '2019-11-17 19:50:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier_contact`
--

CREATE TABLE `supplier_contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_hand_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `null` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `supplier_contact`
--

INSERT INTO `supplier_contact` (`id`, `supplier_id`, `contact_name`, `contact_position`, `contact_hand_phone`, `contact_email`, `contact_website`, `created_by`, `modified_by`, `created_at`, `updated_at`, `null`) VALUES
(2, 2, 'Alex', 'php developer', '1234567890', 'test@test.com', NULL, 'admin', 'admin', '2018-12-18 09:27:23', '2018-12-18 09:27:23', NULL),
(3, 3, 'John', 'Developer', '1234567890', 'this@this.com', NULL, 'Firdauz Fanani', 'Firdauz Fanani', '2018-12-18 09:28:08', '2019-02-18 19:59:08', NULL),
(5, 5, 'Firdauz Fanani', 'Manager', '081567920579', 'firdauz@gspe.co.id', NULL, 'Firdauz Fanani', 'Firdauz Fanani', '2019-02-19 00:22:59', '2019-02-19 00:22:59', NULL),
(6, 2, 'Tester', 'dadada', '13131', 'dadadad', NULL, 'admin', 'admin', '2019-04-29 19:48:49', '2019-04-29 19:48:49', NULL),
(7, 7, 'Angga S', 'abc', '123', 'abc', NULL, 'admin', 'admin', '2019-05-05 20:00:54', '2019-05-05 20:00:54', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$12$ZZPj4ZGLxuKMzu5wGjzL7usx9B7Iy2UdFA1ujxcLVeSYDm3hUSC.K', '2rtSrNAJNtRWmwnwcdX1yKhmWmzLbS00PRkbNu6ImpEXUKgXhgnlMFc6hLJJ', '2018-12-06 10:48:04', '2018-12-06 10:48:04'),
(2, 'Firdauz Fanani', 'firdauzfanani@gmail.com', '$2y$10$tz6bGkYamJhCYFXxsFtnwOeVJC7OqAKe68dLFnFG/Kg9kadObpuo.', 'JbtIScxzmscPey6CzHXtJlxe5AVp9dRR8NASpENF8Qd9EQXvAbTbAtGjA94C', '2019-02-18 00:31:34', '2019-02-18 00:31:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category_items`
--
ALTER TABLE `category_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `claim_supplier`
--
ALTER TABLE `claim_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `complain_letter`
--
ALTER TABLE `complain_letter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contract_supplier`
--
ALTER TABLE `contract_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_pr_term`
--
ALTER TABLE `detail_pr_term`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_rfq_term`
--
ALTER TABLE `detail_rfq_term`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hscode`
--
ALTER TABLE `hscode`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoice_supplier`
--
ALTER TABLE `invoice_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoice_supplier_detail`
--
ALTER TABLE `invoice_supplier_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `items_buffer`
--
ALTER TABLE `items_buffer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `items_quote`
--
ALTER TABLE `items_quote`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `item_buffer_price`
--
ALTER TABLE `item_buffer_price`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `item_price`
--
ALTER TABLE `item_price`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `item_quote_price`
--
ALTER TABLE `item_quote_price`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `link_products`
--
ALTER TABLE `link_products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `ponda_letter`
--
ALTER TABLE `ponda_letter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posd_ext_reference`
--
ALTER TABLE `posd_ext_reference`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posd_target_datelog`
--
ALTER TABLE `posd_target_datelog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `po_supplier`
--
ALTER TABLE `po_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `po_supplier_detail`
--
ALTER TABLE `po_supplier_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `purchase_request`
--
ALTER TABLE `purchase_request`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `purchase_request_detail`
--
ALTER TABLE `purchase_request_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `quotation_supplier`
--
ALTER TABLE `quotation_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `quotation_supplier_detail`
--
ALTER TABLE `quotation_supplier_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `receiving_report_supplier`
--
ALTER TABLE `receiving_report_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `request_for_inquiry`
--
ALTER TABLE `request_for_inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `request_for_quotation`
--
ALTER TABLE `request_for_quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rfi_detail`
--
ALTER TABLE `rfi_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rfq_detail`
--
ALTER TABLE `rfq_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rr_supplier_detail`
--
ALTER TABLE `rr_supplier_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `send_inv_supplier`
--
ALTER TABLE `send_inv_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_category_items`
--
ALTER TABLE `sub_category_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier_address`
--
ALTER TABLE `supplier_address`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier_contact`
--
ALTER TABLE `supplier_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category_items`
--
ALTER TABLE `category_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `claim_supplier`
--
ALTER TABLE `claim_supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `complain_letter`
--
ALTER TABLE `complain_letter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `contract_supplier`
--
ALTER TABLE `contract_supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_pr_term`
--
ALTER TABLE `detail_pr_term`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_rfq_term`
--
ALTER TABLE `detail_rfq_term`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hscode`
--
ALTER TABLE `hscode`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `invoice_supplier`
--
ALTER TABLE `invoice_supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `invoice_supplier_detail`
--
ALTER TABLE `invoice_supplier_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `items_buffer`
--
ALTER TABLE `items_buffer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `items_quote`
--
ALTER TABLE `items_quote`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `item_buffer_price`
--
ALTER TABLE `item_buffer_price`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `item_price`
--
ALTER TABLE `item_price`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `item_quote_price`
--
ALTER TABLE `item_quote_price`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `link_products`
--
ALTER TABLE `link_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT untuk tabel `ponda_letter`
--
ALTER TABLE `ponda_letter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posd_ext_reference`
--
ALTER TABLE `posd_ext_reference`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posd_target_datelog`
--
ALTER TABLE `posd_target_datelog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `po_supplier`
--
ALTER TABLE `po_supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `po_supplier_detail`
--
ALTER TABLE `po_supplier_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `purchase_request`
--
ALTER TABLE `purchase_request`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `purchase_request_detail`
--
ALTER TABLE `purchase_request_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `quotation_supplier`
--
ALTER TABLE `quotation_supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `quotation_supplier_detail`
--
ALTER TABLE `quotation_supplier_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `receiving_report_supplier`
--
ALTER TABLE `receiving_report_supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `request_for_inquiry`
--
ALTER TABLE `request_for_inquiry`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `request_for_quotation`
--
ALTER TABLE `request_for_quotation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `rfi_detail`
--
ALTER TABLE `rfi_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `rfq_detail`
--
ALTER TABLE `rfq_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `rr_supplier_detail`
--
ALTER TABLE `rr_supplier_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `send_inv_supplier`
--
ALTER TABLE `send_inv_supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sub_category_items`
--
ALTER TABLE `sub_category_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `supplier_address`
--
ALTER TABLE `supplier_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `supplier_contact`
--
ALTER TABLE `supplier_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
