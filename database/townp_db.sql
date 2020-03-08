-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2019 at 09:39 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `townp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `planning_rate` decimal(8,2) UNSIGNED NOT NULL,
  `inspection_rate` decimal(8,2) UNSIGNED NOT NULL,
  `registration_fee` decimal(8,2) UNSIGNED NOT NULL,
  `charting_fee` decimal(8,2) UNSIGNED NOT NULL,
  `fencing_fee` decimal(8,2) UNSIGNED NOT NULL,
  `stages_permit_fee` decimal(8,2) UNSIGNED NOT NULL,
  `igr_fee` decimal(8,2) UNSIGNED NOT NULL,
  `penalty_fee` decimal(8,2) UNSIGNED NOT NULL,
  `total` decimal(8,2) UNSIGNED NOT NULL,
  `approved` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`id`, `app_id`, `staff_id`, `planning_rate`, `inspection_rate`, `registration_fee`, `charting_fee`, `fencing_fee`, `stages_permit_fee`, `igr_fee`, `penalty_fee`, `total`, `approved`, `approved_by`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '233.00', '333.00', '444.00', '555.00', '444.00', '555.00', '555.00', '555.00', '3674.00', 'YES', 7, '2019-09-05 00:24:36', '2019-09-17 17:18:35'),
(2, 6, 3, '20.00', '100.00', '12000.00', '200.00', '200.00', '2000.00', '900.00', '20000.00', '35420.00', 'YES', 7, '2019-09-12 20:06:40', '2019-09-17 17:19:41'),
(3, 2, 3, '2000.00', '1000.00', '200.00', '300.00', '355.00', '123.00', '2000.00', '123.00', '6101.00', 'YES', 7, '2019-09-21 14:45:44', '2019-09-21 14:50:52'),
(4, 9, 3, '200.00', '150.00', '100.00', '150.00', '100.00', '500.00', '100.00', '200.00', '1500.00', 'YES', 7, '2019-10-13 10:46:26', '2019-10-13 10:47:28'),
(5, 7, 3, '100.00', '788.00', '778.00', '7775.00', '555.00', '55.00', '66.00', '334.00', '10451.00', 'YES', 7, '2019-10-13 11:16:50', '2019-10-13 11:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `bp_applications`
--

CREATE TABLE `bp_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `developer_user_id` bigint(20) UNSIGNED NOT NULL,
  `application_number` bigint(20) NOT NULL,
  `super_zone` bigint(20) UNSIGNED NOT NULL,
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `village_id` bigint(20) UNSIGNED NOT NULL,
  `file_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_stage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_stage_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_building_height` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bp_applications`
--

INSERT INTO `bp_applications` (`id`, `developer_user_id`, `application_number`, `super_zone`, `zone_id`, `village_id`, `file_no`, `app_stage`, `app_stage_status`, `app_building_height`, `building_type`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 4, 8, 6, 'OS/TPA/AN/G/UE/1', 'IDPA', 'AWAITING-IDPA-DISPATCH', '2', 'Duplex', '2019-08-27 21:51:05', '2019-10-13 10:30:08'),
(2, 3, 2, 4, 8, 1, 'OS/TPA/AN/G/L2/2', 'IDPA', 'AWAITING-SIGNATORY', '2', 'Residential', '2019-08-29 17:58:48', '2019-10-13 11:11:15'),
(3, 7, 3, 4, 8, 6, 'OS/TPA/AN/G/UU/3', 'REGISTERED', 'AWAITING-DOCUMENTS-UPLOAD', '2', 'Residential', '2019-09-01 06:49:25', '2019-09-01 06:49:25'),
(4, 8, 4, 4, 8, 7, 'OS/TPA/AN/G/UU/4', 'REGISTERED', 'AWAITING-DOCUMENTS-UPLOAD', '1', 'Industrial', '2019-09-01 06:55:04', '2019-09-01 06:55:04'),
(5, 9, 5, 4, 8, 1, 'OS/TPA/AN/G/L2/5', 'REGISTERED', 'AWAITING-DOCUMENTS-UPLOAD', '4', 'Commercial', '2019-09-01 06:56:09', '2019-09-01 06:56:09'),
(6, 13, 6, 4, 8, 6, 'OS/TPA/AN/G/UE/6', 'IDPA', 'AWAITING-SIGNATORY', '5', 'Residential', '2019-09-12 19:00:04', '2019-10-13 11:11:08'),
(7, 2, 7, 4, 4, 2, 'OS/TPA/AN/D1/UI/7', 'DROPPED', 'AWAITING-DOCUMENT-REUPLOAD', '3', 'Residential', '2019-10-10 16:06:42', '2019-10-14 18:30:37'),
(8, 8, 8, 4, 8, 1, 'OS/TPA/AN/G/L2/8', 'REGISTERED', 'AWAITING-DOCUMENTS-UPLOAD', '2', 'Residential', '2019-10-11 07:33:29', '2019-10-11 07:33:29'),
(9, 7, 9, 4, 8, 1, 'OS/TPA/AN/G/L2/9', 'PAYMENT', 'AWAITING-PAYMENT-CONFIRMATION', '1', 'Residential', '2019-10-11 07:37:12', '2019-10-13 10:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `bp_application_documents`
--

CREATE TABLE `bp_application_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bp_application_id` bigint(20) UNSIGNED NOT NULL,
  `doc_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bp_application_documents`
--

INSERT INTO `bp_application_documents` (`id`, `bp_application_id`, `doc_type`, `src`, `created_at`, `updated_at`) VALUES
(8, 1, 'LETTER-OF-INCORPRATION', '1-LETTER-OF-INCORPRATION.jpg', '2019-08-29 00:16:30', '2019-08-29 00:16:30'),
(9, 1, 'CAPITATION-RATE', '1-CAPITATION-RATE.jpg', '2019-08-29 00:16:31', '2019-08-29 00:16:31'),
(10, 1, 'SITE-ANALYSIS-REPORT', '1-SITE-ANALYSIS-REPORT.jpg', '2019-08-29 00:16:31', '2019-08-29 00:16:31'),
(11, 1, 'SITE-PLAN', '1-SITE-PLAN.jpg', '2019-08-29 00:16:31', '2019-08-29 00:16:31'),
(12, 1, 'BUILDING-PLAN', '1-BUILDING-PLAN.jpg', '2019-08-29 00:16:31', '2019-08-29 00:16:31'),
(13, 1, 'C-OF-O', '1-C-OF-O.jpg', '2019-08-29 00:16:31', '2019-08-29 00:16:31'),
(14, 1, 'TAX-CLEARANCE', '1-TAX-CLEARANCE.jpg', '2019-08-29 00:16:32', '2019-08-29 00:16:32'),
(15, 2, 'LETTER-OF-INCORPRATION', '2-LETTER-OF-INCORPRATION.jpg', '2019-08-31 12:29:40', '2019-08-31 12:29:40'),
(16, 2, 'CAPITATION-RATE', '2-CAPITATION-RATE.jpg', '2019-08-31 12:29:40', '2019-08-31 12:29:40'),
(17, 2, 'SITE-ANALYSIS-REPORT', '2-SITE-ANALYSIS-REPORT.jpg', '2019-08-31 12:29:40', '2019-08-31 12:29:40'),
(18, 2, 'SITE-PLAN', '2-SITE-PLAN.jpg', '2019-08-31 12:29:40', '2019-08-31 12:29:40'),
(19, 2, 'BUILDING-PLAN', '2-BUILDING-PLAN.jpg', '2019-08-31 12:29:40', '2019-08-31 12:29:40'),
(20, 2, 'C-OF-O', '2-C-OF-O.jpg', '2019-08-31 12:29:40', '2019-08-31 12:29:40'),
(21, 2, 'TAX-CLEARANCE', '2-TAX-CLEARANCE.jpg', '2019-08-31 12:29:40', '2019-08-31 12:29:40'),
(22, 6, 'LETTER-OF-INCORPRATION', '6-LETTER-OF-INCORPRATION.jpg', '2019-09-12 19:32:07', '2019-09-12 19:32:07'),
(23, 6, 'CAPITATION-RATE', '6-CAPITATION-RATE.jpg', '2019-09-12 19:32:07', '2019-09-12 19:32:07'),
(24, 6, 'SITE-ANALYSIS-REPORT', '6-SITE-ANALYSIS-REPORT.jpg', '2019-09-12 19:32:08', '2019-09-12 19:32:08'),
(25, 6, 'SITE-PLAN', '6-SITE-PLAN.jpg', '2019-09-12 19:32:08', '2019-09-12 19:32:08'),
(26, 6, 'BUILDING-PLAN', '6-BUILDING-PLAN.jpg', '2019-09-12 19:32:08', '2019-09-12 19:32:08'),
(27, 6, 'C-OF-O', '6-C-OF-O.jpg', '2019-09-12 19:32:08', '2019-09-12 19:32:08'),
(28, 6, 'TAX-CLEARANCE', '6-TAX-CLEARANCE.JPG', '2019-09-12 19:32:08', '2019-09-12 19:32:08'),
(41, 7, 'POWER-OF-ATTORNEY', 'null', '2019-10-11 06:35:54', '2019-10-11 06:35:54'),
(42, 7, 'FLOOR-PLAN', '7-FLOOR-PLAN.jpg', '2019-10-11 06:35:54', '2019-10-11 06:35:54'),
(43, 7, 'LEFT-SIDE-ELEVATION', '7-LEFT-SIDE-ELEVATION.jpg', '2019-10-11 06:35:54', '2019-10-11 06:35:54'),
(44, 7, 'RIGTH-SIDE-ELEVATION', '7-RIGTH-SIDE-ELEVATION.jpg', '2019-10-11 06:35:54', '2019-10-11 06:35:54'),
(45, 7, 'FRONT-ELEVATION', '7-FRONT-ELEVATION.jpg', '2019-10-11 06:35:54', '2019-10-11 06:35:54'),
(46, 7, 'BACK-ELEVATION', '7-BACK-ELEVATION.jpg', '2019-10-11 06:35:55', '2019-10-11 06:35:55'),
(47, 7, 'ROOF-PLAN', '7-ROOF-PLAN.jpg', '2019-10-11 06:35:55', '2019-10-11 06:35:55'),
(48, 7, 'SECTION', '7-SECTION.jpg', '2019-10-11 06:35:55', '2019-10-11 06:35:55'),
(49, 7, 'LETTER-OF-INCORPRATION', 'null', '2019-10-11 06:35:55', '2019-10-11 06:35:55'),
(50, 7, 'CAPITATION-RATE', 'null', '2019-10-11 06:35:55', '2019-10-11 06:35:55'),
(51, 7, 'SITE-ANALYSIS-REPORT', 'null', '2019-10-11 06:35:55', '2019-10-11 06:35:55'),
(52, 7, 'SITE-PLAN', 'null', '2019-10-11 06:35:55', '2019-10-11 06:35:55'),
(53, 7, 'C-OF-O', '7-C-OF-O.jpg', '2019-10-11 06:35:55', '2019-10-11 06:35:55'),
(54, 7, 'TAX-CLEARANCE', 'null', '2019-10-11 06:35:55', '2019-10-11 06:35:55'),
(55, 9, 'POWER-OF-ATTORNEY', 'null', '2019-10-11 07:40:32', '2019-10-11 07:40:32'),
(56, 9, 'FLOOR-PLAN', '9-FLOOR-PLAN.jpg', '2019-10-11 07:40:33', '2019-10-11 07:40:33'),
(57, 9, 'LEFT-SIDE-ELEVATION', '9-LEFT-SIDE-ELEVATION.jpg', '2019-10-11 07:40:33', '2019-10-11 07:40:33'),
(58, 9, 'RIGTH-SIDE-ELEVATION', '9-RIGTH-SIDE-ELEVATION.jpg', '2019-10-11 07:40:33', '2019-10-11 07:40:33'),
(59, 9, 'FRONT-ELEVATION', '9-FRONT-ELEVATION.jpg', '2019-10-11 07:40:33', '2019-10-11 07:40:33'),
(60, 9, 'BACK-ELEVATION', '9-BACK-ELEVATION.jpg', '2019-10-11 07:40:33', '2019-10-11 07:40:33'),
(61, 9, 'ROOF-PLAN', '9-ROOF-PLAN.jpg', '2019-10-11 07:40:33', '2019-10-11 07:40:33'),
(62, 9, 'SECTION', '9-SECTION.jpg', '2019-10-11 07:40:33', '2019-10-11 07:40:33'),
(63, 9, 'LETTER-OF-INCORPRATION', 'null', '2019-10-11 07:40:33', '2019-10-11 07:40:33'),
(64, 9, 'CAPITATION-RATE', 'null', '2019-10-11 07:40:33', '2019-10-11 07:40:33'),
(65, 9, 'SITE-ANALYSIS-REPORT', 'null', '2019-10-11 07:40:33', '2019-10-11 07:40:33'),
(66, 9, 'SITE-PLAN', 'null', '2019-10-11 07:40:33', '2019-10-11 07:40:33'),
(67, 9, 'C-OF-O', '9-C-OF-O.jpg', '2019-10-11 07:40:34', '2019-10-11 07:40:34'),
(68, 9, 'TAX-CLEARANCE', 'null', '2019-10-11 07:40:34', '2019-10-11 07:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `checklists`
--

CREATE TABLE `checklists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `building_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_clearance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_analysis_report` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_of_o` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `power_of_attoney` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capitation_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_for_payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `engr_report` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ppi_certification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assessment_sheet` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dropped_application_documents`
--

CREATE TABLE `dropped_application_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_stage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_stage_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dropped_application_documents`
--

INSERT INTO `dropped_application_documents` (`id`, `app_id`, `document_id`, `remark`, `status`, `app_stage`, `app_stage_status`, `created_at`, `updated_at`) VALUES
(1, 7, 41, 'This document has not been uploaded', 'AWAITING-REUPLOAD', 'CHECKLIST', 'AWAITING-CHECKLIST-APPROVAL', '2019-10-14 21:38:25', '2019-10-14 21:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `dropped_engr_reports`
--

CREATE TABLE `dropped_engr_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `engr_report_id` bigint(20) UNSIGNED NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_stage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_stage_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dropped_engr_reports`
--

INSERT INTO `dropped_engr_reports` (`id`, `app_id`, `engr_report_id`, `remark`, `status`, `app_stage`, `app_stage_status`, `created_at`, `updated_at`) VALUES
(1, 7, 4, 'Please redo this report', 'AWAITING-REUPLOAD', 'CHECKLIST', 'AWAITING-CHECKLIST-APPROVAL', '2019-10-14 19:53:56', '2019-10-14 19:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `dropped_health_reports`
--

CREATE TABLE `dropped_health_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `health_report_id` bigint(20) UNSIGNED NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_stage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_stage_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dropped_health_reports`
--

INSERT INTO `dropped_health_reports` (`id`, `app_id`, `health_report_id`, `remark`, `status`, `app_stage`, `app_stage_status`, `created_at`, `updated_at`) VALUES
(1, 7, 4, 'This report is bad', 'AWAITING-REUPLOAD', 'CHECKLIST', 'AWAITING-CHECKLIST-APPROVAL', '2019-10-14 20:59:56', '2019-10-14 20:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `dropped_ppi_reports`
--

CREATE TABLE `dropped_ppi_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `ppi_report_id` bigint(20) UNSIGNED NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_stage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_stage_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dropped_ppi_reports`
--

INSERT INTO `dropped_ppi_reports` (`id`, `app_id`, `ppi_report_id`, `remark`, `status`, `app_stage`, `app_stage_status`, `created_at`, `updated_at`) VALUES
(1, 7, 4, 'This report is not okay', 'AWAITING-REUPLOAD', 'CHECKLIST', 'AWAITING-CHECKLIST-APPROVAL', '2019-10-14 20:24:12', '2019-10-14 20:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `dropped_sirs`
--

CREATE TABLE `dropped_sirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `sir_id` bigint(20) UNSIGNED NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_stage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_stage_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dropped_sirs`
--

INSERT INTO `dropped_sirs` (`id`, `app_id`, `sir_id`, `remark`, `status`, `app_stage`, `app_stage_status`, `created_at`, `updated_at`) VALUES
(3, 7, 4, 'This report is not okay please redo it.', 'AWAITING-REUPLOAD', 'CHECKLIST', 'AWAITING-CHECKLIST-APPROVAL', '2019-10-14 18:30:37', '2019-10-14 18:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `dropped_slps`
--

CREATE TABLE `dropped_slps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `slp_id` bigint(20) UNSIGNED NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_stage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_stage_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dropped_slps`
--

INSERT INTO `dropped_slps` (`id`, `app_id`, `slp_id`, `remark`, `status`, `app_stage`, `app_stage_status`, `created_at`, `updated_at`) VALUES
(1, 7, 5, 'This document is not okay', 'AWAITING-REUPLOAD', 'CHECKLIST', 'AWAITING-CHECKLIST-APPROVAL', '2019-10-14 19:15:39', '2019-10-14 19:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `engr_reports`
--

CREATE TABLE `engr_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `recommended` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `engr_reports`
--

INSERT INTO `engr_reports` (`id`, `app_id`, `recommended`, `comment`, `src`, `staff_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'YES', 'the site is okay for the bulding.', 'OS/TPA/AN/G/UE/1-ER.jpg', 12, '2019-09-21 21:48:23', '2019-09-21 21:48:23'),
(2, 6, 'YES', 'The site is okay', 'OS/TPA/AN/G/UE/6-ER.jpg', 12, '2019-10-13 11:03:33', '2019-10-13 11:03:33'),
(3, 2, 'YES', 'The site is okay', 'OS/TPA/AN/G/L2/2-ER.jpg', 12, '2019-10-13 11:04:00', '2019-10-13 11:04:00'),
(4, 7, 'YES', 'The site is okay', '7-ER.jpg', 12, '2019-10-13 11:27:04', '2019-10-13 11:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `health_reports`
--

CREATE TABLE `health_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `recommended` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `health_reports`
--

INSERT INTO `health_reports` (`id`, `app_id`, `recommended`, `comment`, `src`, `staff_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'YES', 'The site is okay health wise.', 'OS/TPA/AN/G/UE/1-HR.jpg', 11, '2019-09-21 20:22:03', '2019-09-21 20:22:03'),
(2, 6, 'YES', 'The site is okay', 'OS/TPA/AN/G/UE/6-HR.jpg', 11, '2019-10-13 11:01:50', '2019-10-13 11:01:50'),
(3, 2, 'YES', 'The site is okay', 'OS/TPA/AN/G/L2/2-HR.jpg', 11, '2019-10-13 11:02:11', '2019-10-13 11:02:11'),
(4, 7, 'YES', 'The site is okay', '7-HR.jpg', 11, '2019-10-13 11:27:46', '2019-10-13 11:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `idpa_documents`
--

CREATE TABLE `idpa_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `signed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signatory_staff_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `date_signed` timestamp NULL DEFAULT NULL,
  `signature_src` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_11_111528_create_staff_table', 1),
(4, '2019_08_11_113943_create_super_zones_table', 1),
(5, '2019_08_11_115713_create_zones_table', 1),
(6, '2019_08_11_120402_create_villages_table', 1),
(7, '2019_08_11_121208_create_bp_applications_table', 1),
(8, '2019_08_11_123855_create_bp_application_documents_table', 1),
(9, '2019_08_11_124733_create_tasks_table', 1),
(10, '2019_08_11_130147_create_slps_table', 1),
(11, '2019_08_11_131154_create_sir_reports_table', 1),
(12, '2019_08_11_132006_create_health_reports_table', 1),
(13, '2019_08_11_132648_create_engr_reports_table', 1),
(14, '2019_08_11_132949_create_ppi_reports_table', 1),
(15, '2019_08_11_133327_create_idpa_documents_table', 1),
(16, '2019_08_11_134755_create_payments_table', 1),
(17, '2019_08_19_211448_create_assessments_table', 1),
(18, '2019_08_19_220658_create_checklists_table', 1),
(19, '2019_08_19_225709_create_not_recommended_applications_table', 1),
(20, '2019_09_16_221453_create_modified_assessments_table', 2),
(21, '2019_10_04_045142_create_dropped_application_documents_table', 3),
(22, '2019_10_04_050908_create_dropped_sirs_table', 3),
(23, '2019_10_04_051158_create_dropped_slps_table', 3),
(24, '2019_10_04_051548_create_dropped_health_reports_table', 3),
(25, '2019_10_04_051940_create_dropped_engr_reports_table', 3),
(26, '2019_10_04_052352_create_dropped_ppi_reports_table', 3),
(27, '2019_10_04_054655_create_signatures_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `modified_assessments`
--

CREATE TABLE `modified_assessments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assessment_id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `planning_rate` decimal(8,2) UNSIGNED NOT NULL,
  `inspection_rate` decimal(8,2) UNSIGNED NOT NULL,
  `registration_fee` decimal(8,2) UNSIGNED NOT NULL,
  `charting_fee` decimal(8,2) UNSIGNED NOT NULL,
  `fencing_fee` decimal(8,2) UNSIGNED NOT NULL,
  `stages_permit_fee` decimal(8,2) UNSIGNED NOT NULL,
  `igr_fee` decimal(8,2) UNSIGNED NOT NULL,
  `penalty_fee` decimal(8,2) UNSIGNED NOT NULL,
  `total` decimal(8,2) UNSIGNED NOT NULL,
  `modified_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modified_assessments`
--

INSERT INTO `modified_assessments` (`id`, `assessment_id`, `app_id`, `staff_id`, `planning_rate`, `inspection_rate`, `registration_fee`, `charting_fee`, `fencing_fee`, `stages_permit_fee`, `igr_fee`, `penalty_fee`, `total`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 2, 6, 3, '20.00', '100.00', '15000.00', '400.00', '200.00', '2000.00', '1000.00', '20000.00', '38720.00', 7, '2019-09-17 17:19:41', '2019-09-17 17:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `not_recommended_applications`
--

CREATE TABLE `not_recommended_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disapproval_date` timestamp NULL DEFAULT NULL,
  `stage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stage_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resolved_date` timestamp NULL DEFAULT NULL,
  `document_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `amount_paid` bigint(20) NOT NULL,
  `supposed_amount` bigint(20) NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `es_approval` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `es_comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt_src` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `app_id`, `amount_paid`, `supposed_amount`, `payment_status`, `es_approval`, `es_comment`, `receipt_src`, `payment_mode`, `created_at`, `updated_at`) VALUES
(1, 1, 3674, 3674, 'PAID', 'APPROVED', 'PAYMENT CONFIRMED', '1-RECEIPT.jpg', 'CASH', '2019-09-18 00:36:56', '2019-09-18 00:36:56'),
(2, 6, 35420, 35420, 'PAID', 'APPROVED', 'PAYMENT CONFIRMED', '6-RECEIPT.jpg', 'CASH', '2019-09-21 14:49:50', '2019-09-21 14:49:50'),
(3, 2, 6101, 6101, 'PAID', 'APPROVED', 'PAYMENT CONFIRMED', '2-RECEIPT.jpg', 'CASH', '2019-10-13 10:56:45', '2019-10-13 10:56:45'),
(4, 7, 10451, 10451, 'PAID', 'APPROVED', 'PAYMENT CONFIRMED', '7-RECEIPT.jpg', 'CASH', '2019-10-13 11:19:11', '2019-10-13 11:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `ppi_reports`
--

CREATE TABLE `ppi_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `recommended` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ppi_reports`
--

INSERT INTO `ppi_reports` (`id`, `app_id`, `recommended`, `comment`, `src`, `staff_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'YES', 'The site is okay.', '1-SIR.jpg', 4, '2019-09-22 07:04:02', '2019-09-22 07:04:02'),
(2, 6, 'YES', 'The site is okay.', 'OS/TPA/AN/G/UE/6-SIR.jpg', 4, '2019-10-13 11:06:22', '2019-10-13 11:06:22'),
(3, 2, 'YES', 'The site is okay', 'OS/TPA/AN/G/L2/2-SIR.jpg', 3, '2019-10-13 11:08:24', '2019-10-13 11:08:24'),
(4, 7, 'YES', 'The site is okay', '7-SIR.jpg', 4, '2019-10-13 11:28:24', '2019-10-13 11:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `signatures`
--

CREATE TABLE `signatures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `signature_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signatures`
--

INSERT INTO `signatures` (`id`, `user_id`, `signature_path`, `password`, `created_at`, `updated_at`) VALUES
(2, 12, '12SIGNATURE.jpg', '$2y$10$Bfpd4UpE3VA/xt0E8/gZjeyUNzriLBY/vowm.U5G0Tc1TEVI3pkJ2', '2019-10-13 10:12:13', '2019-10-13 10:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `sir_reports`
--

CREATE TABLE `sir_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `recommended` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sir_reports`
--

INSERT INTO `sir_reports` (`id`, `app_id`, `recommended`, `comment`, `src`, `staff_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'YES', 'The site is okay.', '1-SIR.jpg', 3, '2019-09-22 06:33:51', '2019-09-22 06:33:51'),
(2, 6, 'YES', 'The site is okay.', 'OS/TPA/AN/G/UE/6-SIR.jpg', 3, '2019-10-13 11:07:34', '2019-10-13 11:07:34'),
(3, 2, 'YES', 'The site is okay', 'OS/TPA/AN/G/L2/2-SIR.jpg', 3, '2019-10-13 11:07:54', '2019-10-13 11:07:54'),
(4, 7, 'YES', 'The site is okay', '7-SIR.jpg', 3, '2019-10-13 11:26:20', '2019-10-13 11:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `slps`
--

CREATE TABLE `slps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slps`
--

INSERT INTO `slps` (`id`, `app_id`, `description`, `src`, `staff_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Site location plan document', '1-SLP.jpg', 6, '2019-09-03 22:09:25', '2019-09-03 22:09:25'),
(2, 6, 'Site location plan document', '6-SLP.jpg', 6, '2019-09-12 20:05:29', '2019-09-12 20:05:29'),
(3, 2, 'Site location plan document', '2-SLP.jpg', 6, '2019-09-21 14:44:18', '2019-09-21 14:44:18'),
(4, 9, 'Site location plan document', '9-SLP.PNG', 6, '2019-10-13 10:44:22', '2019-10-13 10:44:22'),
(5, 7, 'Site location plan document', '7-SLP.jpg', 6, '2019-10-13 11:15:55', '2019-10-13 11:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `staff_role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `user_id`, `staff_role`, `department`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'CLERK', 'ADMIN', 'ACTIVE', '2019-08-21 22:38:13', '2019-08-21 22:38:13'),
(2, 4, 'HOA', 'ADMIN', 'ACTIVE', '2019-08-31 14:21:43', '2019-08-31 14:21:43'),
(3, 5, 'TPO', 'DEVC', 'ACTIVE', '2019-08-31 22:18:58', '2019-08-31 22:18:58'),
(4, 6, 'TPO', 'PPI', 'ACTIVE', '2019-08-31 22:21:13', '2019-08-31 22:21:13'),
(5, 10, 'ATPO', 'PPI', 'ACTIVE', '2019-09-03 01:01:04', '2019-09-03 01:01:04'),
(6, 11, 'ATPO', 'DEVC', 'ACTIVE', '2019-09-03 01:03:12', '2019-09-03 01:03:12'),
(7, 12, 'ES', 'ES', 'ACTIVE', '2019-09-04 23:19:58', '2019-09-04 23:19:58'),
(8, 14, 'HAC', 'ACCT', 'ACTIVE', '2019-09-17 16:55:37', '2019-09-17 16:55:37'),
(9, 15, 'ACO', 'ACCT', 'ACTIVE', '2019-09-17 16:58:02', '2019-09-17 16:58:02'),
(10, 16, 'ACO', 'ACCT', 'ACTIVE', '2019-09-17 17:00:59', '2019-09-17 17:00:59'),
(11, 17, 'HO', 'HEALTH', 'ACTIVE', '2019-09-20 04:26:35', '2019-09-20 04:26:35'),
(12, 18, 'ENG', 'CIVIL', 'ACTIVE', '2019-09-20 04:29:52', '2019-09-20 04:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `super_zones`
--

CREATE TABLE `super_zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `super_zones`
--

INSERT INTO `super_zones` (`id`, `name`, `key`, `created_at`, `updated_at`) VALUES
(2, 'Osisioma', 'OS', '2019-08-05 23:00:00', '2019-08-13 23:00:00'),
(3, 'Aba South', 'AS', '2019-08-07 23:00:00', '2019-08-12 23:00:00'),
(4, 'Aba North', 'AN', '2019-08-06 23:00:00', '2019-08-06 23:00:00'),
(5, 'Arochukwu', 'AR', '2019-08-06 23:00:00', '2019-08-06 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `task_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assigned_date` timestamp NULL DEFAULT NULL,
  `completed_date` timestamp NULL DEFAULT NULL,
  `app_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `staff_id`, `task_type`, `task_status`, `assigned_date`, `completed_date`, `app_id`, `created_at`, `updated_at`) VALUES
(1, 3, 'ATPO-ASSIGNMENT', 'COMPLETED', '2019-09-01 00:03:33', NULL, 1, '2019-09-01 00:03:33', '2019-09-03 01:07:13'),
(2, 6, 'SLP-UPLOAD', 'COMPLETED', '2019-09-03 01:07:13', NULL, 1, '2019-09-03 01:07:13', '2019-09-03 22:09:25'),
(9, 3, 'BP_ASSESSMENT', 'COMPLETED', '2019-09-03 22:09:25', NULL, 1, '2019-09-03 22:09:25', '2019-09-05 00:24:36'),
(12, 7, 'ASSESSMENT-APPROVAL', 'COMPLETED', '2019-09-05 00:24:36', NULL, 1, '2019-09-05 00:24:36', '2019-09-17 17:18:36'),
(13, 3, 'ATPO-ASSIGNMENT', 'COMPLETED', '2019-09-12 19:59:41', NULL, 6, '2019-09-12 19:59:41', '2019-09-12 20:03:37'),
(14, 6, 'SLP-UPLOAD', 'COMPLETED', '2019-09-12 20:03:37', NULL, 6, '2019-09-12 20:03:37', '2019-09-12 20:05:28'),
(15, 3, 'BP_ASSESSMENT', 'COMPLETED', '2019-09-12 20:05:28', NULL, 6, '2019-09-12 20:05:28', '2019-09-12 20:06:40'),
(16, 7, 'ASSESSMENT-APPROVAL', 'COMPLETED', '2019-09-12 20:06:40', NULL, 6, '2019-09-12 20:06:40', '2019-09-17 17:19:41'),
(17, 8, 'ACCOUNT-OFFICER-ASSIGNMENT', 'COMPLETED', '2019-09-17 17:18:36', NULL, 1, '2019-09-17 17:18:36', '2019-09-17 20:12:38'),
(18, 8, 'ACCOUNT-OFFICER-ASSIGNMENT', 'COMPLETED', '2019-09-17 17:19:41', NULL, 6, '2019-09-17 17:19:41', '2019-09-21 14:47:06'),
(19, 9, 'PAYMENT-CONFIRMATION', 'COMPLETED', '2019-09-17 20:12:38', NULL, 1, '2019-09-17 20:12:38', '2019-09-18 00:36:56'),
(20, 7, 'REPORTS-ASSIGNMENT', 'COMPLETED', '2019-09-18 00:36:56', NULL, 1, '2019-09-18 00:36:56', '2019-09-20 05:49:52'),
(21, 3, 'SIR-REPORT', 'COMPLETED', '2019-09-20 05:49:52', NULL, 1, '2019-09-20 05:49:52', '2019-09-22 06:33:51'),
(22, 11, 'HR-REPORT', 'COMPLETED', '2019-09-20 05:49:52', NULL, 1, '2019-09-20 05:49:52', '2019-09-21 20:22:03'),
(23, 12, 'ER-REPORT', 'COMPLETED', '2019-09-20 05:49:52', NULL, 1, '2019-09-20 05:49:52', '2019-09-21 21:48:23'),
(24, 4, 'PPI-REPORT', 'COMPLETED', '2019-09-20 05:49:52', NULL, 1, '2019-09-20 05:49:52', '2019-09-22 07:04:02'),
(25, 3, 'ATPO-ASSIGNMENT', 'COMPLETED', '2019-09-21 14:39:44', NULL, 2, '2019-09-21 14:39:44', '2019-09-21 14:42:22'),
(26, 6, 'SLP-UPLOAD', 'COMPLETED', '2019-09-21 14:42:22', NULL, 2, '2019-09-21 14:42:22', '2019-09-21 14:44:18'),
(27, 3, 'BP_ASSESSMENT', 'COMPLETED', '2019-09-21 14:44:18', NULL, 2, '2019-09-21 14:44:18', '2019-09-21 14:45:44'),
(28, 7, 'ASSESSMENT-APPROVAL', 'COMPLETED', '2019-09-21 14:45:44', NULL, 2, '2019-09-21 14:45:44', '2019-09-21 14:50:52'),
(29, 10, 'PAYMENT-CONFIRMATION', 'COMPLETED', '2019-09-21 14:47:06', NULL, 6, '2019-09-21 14:47:06', '2019-09-21 14:49:50'),
(30, 7, 'REPORTS-ASSIGNMENT', 'COMPLETED', '2019-09-21 14:49:50', NULL, 6, '2019-09-21 14:49:50', '2019-09-21 14:51:23'),
(31, 8, 'ACCOUNT-OFFICER-ASSIGNMENT', 'COMPLETED', '2019-09-21 14:50:52', NULL, 2, '2019-09-21 14:50:52', '2019-10-13 10:52:04'),
(32, 3, 'SIR-REPORT', 'COMPLETED', '2019-09-21 14:51:23', NULL, 6, '2019-09-21 14:51:23', '2019-10-13 11:07:34'),
(33, 11, 'HR-REPORT', 'COMPLETED', '2019-09-21 14:51:23', NULL, 6, '2019-09-21 14:51:23', '2019-10-13 11:01:50'),
(34, 12, 'ER-REPORT', 'COMPLETED', '2019-09-21 14:51:23', NULL, 6, '2019-09-21 14:51:23', '2019-10-13 11:03:33'),
(35, 4, 'PPI-REPORT', 'COMPLETED', '2019-09-21 14:51:23', NULL, 6, '2019-09-21 14:51:23', '2019-10-13 11:06:22'),
(37, 7, 'HOA-ASSIGNMENT', 'COMPLETED', '2019-09-22 07:04:02', NULL, 1, '2019-09-22 07:04:02', '2019-09-22 19:43:16'),
(38, 2, 'CHECKLIST-APPROVAL', 'COMPLETED', '2019-09-22 19:43:16', NULL, 1, '2019-09-22 19:43:16', '2019-10-12 16:11:31'),
(39, 7, 'IDPA-SIGNING', 'COMPLETED', '2019-10-12 16:11:31', NULL, 1, '2019-10-12 16:11:31', '2019-10-13 10:30:08'),
(43, 2, 'IDPA-DISPATCH', 'PENDING', '2019-10-13 10:30:08', NULL, 1, '2019-10-13 10:30:08', '2019-10-13 10:30:08'),
(44, 3, 'ATPO-ASSIGNMENT', 'COMPLETED', '2019-10-13 10:41:56', NULL, 9, '2019-10-13 10:41:56', '2019-10-13 10:42:50'),
(45, 6, 'SLP-UPLOAD', 'COMPLETED', '2019-10-13 10:42:50', NULL, 9, '2019-10-13 10:42:50', '2019-10-13 10:44:22'),
(46, 3, 'BP_ASSESSMENT', 'COMPLETED', '2019-10-13 10:44:22', NULL, 9, '2019-10-13 10:44:22', '2019-10-13 10:46:26'),
(47, 7, 'ASSESSMENT-APPROVAL', 'COMPLETED', '2019-10-13 10:46:26', NULL, 9, '2019-10-13 10:46:26', '2019-10-13 10:47:28'),
(48, 8, 'ACCOUNT-OFFICER-ASSIGNMENT', 'COMPLETED', '2019-10-13 10:47:28', NULL, 9, '2019-10-13 10:47:28', '2019-10-13 10:52:15'),
(49, 9, 'PAYMENT-CONFIRMATION', 'COMPLETED', '2019-10-13 10:52:04', NULL, 2, '2019-10-13 10:52:04', '2019-10-13 10:56:45'),
(50, 10, 'PAYMENT-CONFIRMATION', 'PENDING', '2019-10-13 10:52:15', NULL, 9, '2019-10-13 10:52:15', '2019-10-13 10:52:15'),
(51, 7, 'REPORTS-ASSIGNMENT', 'COMPLETED', '2019-10-13 10:56:45', NULL, 2, '2019-10-13 10:56:45', '2019-10-13 11:00:04'),
(52, 3, 'SIR-REPORT', 'COMPLETED', '2019-10-13 11:00:04', NULL, 2, '2019-10-13 11:00:04', '2019-10-13 11:07:54'),
(53, 11, 'HR-REPORT', 'COMPLETED', '2019-10-13 11:00:04', NULL, 2, '2019-10-13 11:00:04', '2019-10-13 11:02:11'),
(54, 12, 'ER-REPORT', 'COMPLETED', '2019-10-13 11:00:04', NULL, 2, '2019-10-13 11:00:04', '2019-10-13 11:04:00'),
(55, 3, 'PPI-REPORT', 'COMPLETED', '2019-10-13 11:00:04', NULL, 2, '2019-10-13 11:00:04', '2019-10-13 11:08:24'),
(56, 7, 'HOA-ASSIGNMENT', 'COMPLETED', '2019-10-13 11:07:34', NULL, 6, '2019-10-13 11:07:34', '2019-10-13 11:09:00'),
(57, 7, 'HOA-ASSIGNMENT', 'COMPLETED', '2019-10-13 11:08:24', NULL, 2, '2019-10-13 11:08:24', '2019-10-13 11:09:09'),
(58, 2, 'CHECKLIST-APPROVAL', 'COMPLETED', '2019-10-13 11:09:00', NULL, 6, '2019-10-13 11:09:00', '2019-10-13 11:11:08'),
(59, 2, 'CHECKLIST-APPROVAL', 'COMPLETED', '2019-10-13 11:09:09', NULL, 2, '2019-10-13 11:09:09', '2019-10-13 11:11:15'),
(60, 7, 'IDPA-SIGNING', 'PENDING', '2019-10-13 11:11:08', NULL, 6, '2019-10-13 11:11:08', '2019-10-13 11:11:08'),
(61, 7, 'IDPA-SIGNING', 'PENDING', '2019-10-13 11:11:15', NULL, 2, '2019-10-13 11:11:15', '2019-10-13 11:11:15'),
(62, 3, 'ATPO-ASSIGNMENT', 'COMPLETED', '2019-10-13 11:14:44', NULL, 7, '2019-10-13 11:14:44', '2019-10-13 11:15:20'),
(63, 6, 'SLP-UPLOAD', 'COMPLETED', '2019-10-13 11:15:20', NULL, 7, '2019-10-13 11:15:20', '2019-10-13 11:15:55'),
(64, 3, 'BP_ASSESSMENT', 'COMPLETED', '2019-10-13 11:15:55', NULL, 7, '2019-10-13 11:15:55', '2019-10-13 11:16:50'),
(65, 7, 'ASSESSMENT-APPROVAL', 'COMPLETED', '2019-10-13 11:16:50', NULL, 7, '2019-10-13 11:16:50', '2019-10-13 11:17:22'),
(66, 8, 'ACCOUNT-OFFICER-ASSIGNMENT', 'COMPLETED', '2019-10-13 11:17:22', NULL, 7, '2019-10-13 11:17:22', '2019-10-13 11:18:39'),
(67, 9, 'PAYMENT-CONFIRMATION', 'COMPLETED', '2019-10-13 11:18:40', NULL, 7, '2019-10-13 11:18:40', '2019-10-13 11:19:11'),
(68, 7, 'REPORTS-ASSIGNMENT', 'COMPLETED', '2019-10-13 11:19:11', NULL, 7, '2019-10-13 11:19:11', '2019-10-13 11:19:50'),
(69, 3, 'SIR-REPORT', 'COMPLETED', '2019-10-13 11:19:50', NULL, 7, '2019-10-13 11:19:50', '2019-10-13 11:26:20'),
(70, 11, 'HR-REPORT', 'COMPLETED', '2019-10-13 11:19:50', NULL, 7, '2019-10-13 11:19:50', '2019-10-13 11:27:46'),
(71, 12, 'ER-REPORT', 'COMPLETED', '2019-10-13 11:19:50', NULL, 7, '2019-10-13 11:19:50', '2019-10-13 11:27:04'),
(72, 4, 'PPI-REPORT', 'COMPLETED', '2019-10-13 11:19:50', NULL, 7, '2019-10-13 11:19:50', '2019-10-13 11:28:24'),
(73, 7, 'HOA-ASSIGNMENT', 'COMPLETED', '2019-10-13 11:28:23', NULL, 7, '2019-10-13 11:28:23', '2019-10-13 11:28:50'),
(74, 2, 'CHECKLIST-APPROVAL', 'PENDING', '2019-10-13 11:28:50', NULL, 7, '2019-10-13 11:28:50', '2019-10-13 11:28:50'),
(75, 3, 'SIR-REPORT-REUPLOAD', 'PENDING', '2019-10-14 18:30:37', NULL, 7, '2019-10-14 18:30:37', '2019-10-14 18:30:37'),
(76, 6, 'SLP-REUPLOAD', 'PENDING', '2019-10-14 19:15:39', NULL, 7, '2019-10-14 19:15:39', '2019-10-14 19:15:39'),
(77, 12, 'ER-REPORT-REUPLOAD', 'PENDING', '2019-10-14 19:53:56', NULL, 7, '2019-10-14 19:53:56', '2019-10-14 19:53:56'),
(78, 4, 'PPI-REPORT-REUPLOAD', 'PENDING', '2019-10-14 20:24:12', NULL, 7, '2019-10-14 20:24:12', '2019-10-14 20:24:12'),
(79, 11, 'HR-REPORT-REUPLOAD', 'PENDING', '2019-10-14 20:59:56', NULL, 7, '2019-10-14 20:59:56', '2019-10-14 20:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `phone`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kingsley', 'Ufoegbulam', 'Kings31', '08068489230', 'STAFF', 'Kingsleyemeka31@gmail.com', NULL, '$2y$10$kvzRPogCKcA/pXtVZBKL7u6sGfRPWG3/ZqvSgRdpVvSy31YrPC/6i', NULL, '2019-08-21 22:38:13', '2019-08-21 22:38:13'),
(2, 'Steve', 'Emmanuel', 'steve31', '08056464636', 'APPLICANT', 'steveemmanuel@gmail.com', NULL, '$2y$10$BvJwpB2SuU45zoXA8j2x..xFHs2uiDLzX.0buAbBJty3Vh8OXHgne', NULL, '2019-08-25 13:12:44', '2019-08-25 13:12:44'),
(3, 'Steve', 'Nta', 'fred21', '09094988899', 'APPLICANT', 'samuelokpanku@gmail.com', NULL, '$2y$10$AbwLs8u0Rsq3hMK9Fo4Ate2a2lgkrhac4shkIRaR1aAqGLO.3DZOu', NULL, '2019-08-29 17:53:15', '2019-08-29 17:53:15'),
(4, 'Jesse', 'Emeka', 'Jesse31', '08045623898', 'STAFF', 'jessefantasy@gmail.com', NULL, '$2y$10$gRs.fFRoIMsTKHPCKomrGOfO4hpbrLtWTFCLAqVym5R2bO1aR2GZq', NULL, '2019-08-31 14:21:43', '2019-08-31 14:21:43'),
(5, 'Chime', 'Emmanuel', 'Chime31', '08098007774', 'STAFF', 'chimeemmanuel@gmail.com', NULL, '$2y$10$np3Be1q13Sj7MBbnx6eDhOK2x8fAeJh0ZPU/xcgQcv//Mf4OFbVJ.', NULL, '2019-08-31 22:18:58', '2019-08-31 22:18:58'),
(6, 'Emmanuel', 'Kalu', 'Emmanuel31', '08094532676', 'STAFF', 'emmanuelkalu@gmail.com', NULL, '$2y$10$TqpSFmtpkuFQ/BGOjo7cfukdbz9gQ3WEn1mxLthojIrxhkQ7Nk5iK', NULL, '2019-08-31 22:21:13', '2019-08-31 22:21:13'),
(7, 'Okpanku', 'Ekene', 'Okpanku31', '09087654322', 'APPLICANT', 'reachout2nku@yahoo.com', NULL, '$2y$10$ahhtb7wjr09zZzbw.NxD4.c4rr3ebmxaj9R.GgDY2JiEOfO1Naewy', NULL, '2019-09-01 06:43:10', '2019-09-01 06:43:10'),
(8, 'precious', 'okpanku', 'PRECIOUS123', '09094988899', 'APPLICANT', 'preciousnma@gmail.com', NULL, '$2y$10$JoZ18DeYz.fFha8qEt.bo.EZD/PIFNg7CARTW.Yvn.jYD2X5CkaXS', NULL, '2019-09-01 06:52:37', '2019-09-01 06:52:37'),
(9, 'Odinaka', 'Ikedichi', 'ODINAKA123', '09094988899', 'APPLICANT', 'odinaka@gmail.com', NULL, '$2y$10$nIkafPWmGbd3KxRiTYDWKesqClCcU38wwNWcQx6mvjLXKs08G8e62', NULL, '2019-09-01 06:53:35', '2019-09-01 06:53:35'),
(10, 'Christain', 'Onyeukwu', 'Christain31', '08094532676', 'STAFF', 'christainonyeukwu@gmail.com', NULL, '$2y$10$4UovKiNzH4dVT3/2h4Aa6Oy/w3nikWXY9DhSeS3p/Lq79QxfFSRAG', NULL, '2019-09-03 01:01:04', '2019-09-03 01:01:04'),
(11, 'Olajide', 'Divine', 'Divine31', '08094532676', 'STAFF', 'olajidedivine@gmail.com', NULL, '$2y$10$lors05GCj8JZfgBr4BwVme/kJEUwErEHB48vQIimILFUP1EHibY06', NULL, '2019-09-03 01:03:12', '2019-09-03 01:03:12'),
(12, 'Happiness', 'Asuquo', 'Happiness31', '08094533462', 'STAFF', 'asuquohappiness@gmail.com', NULL, '$2y$10$LEoXyVDwIjSTuDK8nBgJm.8jQrq/U1bczY0J9ZMOPpqwof9M7xbKm', NULL, '2019-09-04 23:19:58', '2019-09-04 23:19:58'),
(13, 'Jesse', 'Emeka', 'Jessefantasy69', '09058279115', 'APPLICANT', 'jessefantasy69@gmail.com', NULL, '$2y$10$YJMEROQN1XP21mqbUP9cqeER0b/zU8i.ayuQm6lJ5.gLgbJyAPJhe', NULL, '2019-09-12 18:27:53', '2019-09-12 18:27:53'),
(14, 'Okoro', 'Mmadu', 'Okoro31', '08094533462', 'STAFF', 'okorommadu31@gmail.com', NULL, '$2y$10$vkJpwcE8k792JThBc1NKUOsIGc7gF.0Y71mu6.IK0yOLqVYMoCkzK', NULL, '2019-09-17 16:55:37', '2019-09-17 16:55:37'),
(15, 'Ifeanyi', 'Onyenkwere', 'Ifeanyi31', '08094533462', 'STAFF', 'ifeanyionyekwere31@gmail.com', NULL, '$2y$10$aYQ76w5PdMk2QomkF5vDTeAToUB01xE8NlKlk0CUrwbiGeAZ/Ny1y', NULL, '2019-09-17 16:58:02', '2019-09-17 16:58:02'),
(16, 'Juliet', 'Onyeka', 'Juliet31', '08094533462', 'STAFF', 'JulietOnyeka31@gmail.com', NULL, '$2y$10$hkisq5gakXOBlfC6Qq3xJOKZ5cVgC7StrhxfCRS01S2F/pNBPfFvq', NULL, '2019-09-17 17:00:58', '2019-09-17 17:00:58'),
(17, 'Uzochukwu', 'Ekene', 'Uzochukwu31', '08094533462', 'STAFF', 'Uzochukwuekene31@gmail.com', NULL, '$2y$10$gfwdIjYxKIFPdDjYuUT6EeHrmsU2W1ASAeJLDJl5/2sqpfe5zZmUS', NULL, '2019-09-20 04:26:35', '2019-09-20 04:26:35'),
(18, 'Bright', 'Femi', 'Bright31', '08094533462', 'STAFF', 'Brightfemi31@gmail.com', NULL, '$2y$10$4npc5UkbndoO4HsXcxqciu7FUEcbHzYkmukH2Xl8Er4JE3jEaEa2C', NULL, '2019-09-20 04:29:52', '2019-09-20 04:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `village_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `villages`
--

INSERT INTO `villages` (`id`, `zone_id`, `village_name`, `key`, `created_at`, `updated_at`) VALUES
(1, 8, 'layout_2', 'L2', '2019-08-04 23:00:00', '2019-08-04 23:00:00'),
(2, 4, 'umungasi', 'UI', '2019-08-04 23:00:00', '2019-08-04 23:00:00'),
(3, 5, 'umuocham', 'UM', '2019-08-04 23:00:00', '2019-08-04 23:00:00'),
(4, 4, 'umuatakata', 'UA', '2019-08-12 23:00:00', '2019-08-11 23:00:00'),
(5, 5, 'umuokuala', 'UL', '2019-08-12 23:00:00', '2019-08-12 23:00:00'),
(6, 8, 'umule', 'UE', '2019-08-04 23:00:00', '2019-08-11 23:00:00'),
(7, 8, 'umuehilegbu', 'UU', '2019-08-06 23:00:00', '2019-08-05 23:00:00'),
(8, 6, 'abayi_ugwuala', 'AA', '2019-08-04 23:00:00', '2019-08-04 23:00:00'),
(9, 6, 'abayi_amugwu', 'AU', '2019-08-05 23:00:00', '2019-08-04 23:00:00'),
(10, 6, 'umuodu', 'UD', '2019-08-04 23:00:00', '2019-08-11 23:00:00'),
(11, 6, 'umueze', 'UE', '2019-08-04 23:00:00', '2019-08-11 23:00:00'),
(12, 6, 'asan', 'AN', '2019-08-04 23:00:00', '2019-08-04 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `superzone_id` bigint(20) UNSIGNED NOT NULL,
  `zone_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `superzone_id`, `zone_name`, `zone_key`, `created_at`, `updated_at`) VALUES
(1, 2, 'Zone A- ( Osisioma Ngwa Industrial Layout)', 'A', '2019-07-31 23:00:00', '2019-07-31 23:00:00'),
(2, 2, 'Zone B-( Umueze Composite Layout)', 'B', '2019-07-31 23:00:00', '2019-07-31 23:00:00'),
(3, 4, 'Zone C-(Luxury Bus Terminal)', 'C', '2019-08-01 23:00:00', '2019-08-01 23:00:00'),
(4, 4, 'Zone D1-(OCHAM / NGASI)', 'D1', '2019-08-01 23:00:00', '2019-08-04 23:00:00'),
(5, 5, 'Zone D2 - (OCHAM / NGASI)', 'D2', '2019-08-04 23:00:00', '2019-08-04 23:00:00'),
(6, 5, 'Zone E- (ABAYI)', 'E', '2019-08-04 23:00:00', '2019-08-04 23:00:00'),
(7, 5, 'Zone F-(Okpu Umuobo)', 'F', '2019-08-04 23:00:00', '2019-08-04 23:00:00'),
(8, 4, 'Zone G - (Umuakpara)', 'G', '2019-08-04 23:00:00', '2019-08-11 23:00:00'),
(9, 5, 'Zone H - (Okpuala)', 'H', '2019-08-04 23:00:00', '2019-08-04 23:00:00'),
(10, 4, 'Zone I- (Umuodu)', 'I', '2019-08-04 23:00:00', '2019-08-04 23:00:00'),
(11, 2, 'Zone J-(Umuojima)', 'J', '2019-08-04 23:00:00', '2019-08-04 23:00:00'),
(12, 2, 'Zone K1 - (Ariara 1)', 'K1', '2019-08-04 23:00:00', '2019-08-04 23:00:00'),
(13, 2, 'Zone K2 - (Ariaria 2)', 'K2', '2019-08-04 23:00:00', '2019-08-04 23:00:00'),
(14, 3, 'Zone L - (Asa)', 'L', '2019-08-04 23:00:00', '2019-08-04 23:00:00'),
(15, 4, 'Zone M1 -(Amavo & Environs)', 'M1', '2019-08-04 23:00:00', '2019-08-04 23:00:00'),
(16, 4, 'Zone M2 - (Aro-Ngwa)', 'M2', '2019-08-04 23:00:00', '2019-08-04 23:00:00'),
(17, 4, 'Zone M3 - (Akpaa)', 'M3', '2019-08-04 23:00:00', '2019-08-04 23:00:00'),
(18, 2, 'Zone N - (Umuode)', 'N', '2019-08-04 23:00:00', '2019-08-04 23:00:00'),
(19, 5, 'Zone O - (Isiahia)', 'O', '2019-08-04 23:00:00', '2019-08-04 23:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assessments_app_id_foreign` (`app_id`),
  ADD KEY `assessments_staff_id_foreign` (`staff_id`),
  ADD KEY `assessments_approved_by_foreign` (`approved_by`);

--
-- Indexes for table `bp_applications`
--
ALTER TABLE `bp_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bp_applications_developer_user_id_foreign` (`developer_user_id`),
  ADD KEY `bp_applications_super_zone_foreign` (`super_zone`),
  ADD KEY `bp_applications_zone_id_foreign` (`zone_id`),
  ADD KEY `bp_applications_village_id_foreign` (`village_id`);

--
-- Indexes for table `bp_application_documents`
--
ALTER TABLE `bp_application_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bp_application_documents_bp_application_id_foreign` (`bp_application_id`);

--
-- Indexes for table `checklists`
--
ALTER TABLE `checklists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checklists_app_id_foreign` (`app_id`),
  ADD KEY `checklists_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `dropped_application_documents`
--
ALTER TABLE `dropped_application_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dropped_application_documents_app_id_foreign` (`app_id`),
  ADD KEY `dropped_application_documents_document_id_foreign` (`document_id`);

--
-- Indexes for table `dropped_engr_reports`
--
ALTER TABLE `dropped_engr_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dropped_engr_reports_app_id_foreign` (`app_id`),
  ADD KEY `dropped_engr_reports_engr_report_id_foreign` (`engr_report_id`);

--
-- Indexes for table `dropped_health_reports`
--
ALTER TABLE `dropped_health_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dropped_health_reports_app_id_foreign` (`app_id`),
  ADD KEY `dropped_health_reports_health_report_id_foreign` (`health_report_id`);

--
-- Indexes for table `dropped_ppi_reports`
--
ALTER TABLE `dropped_ppi_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dropped_ppi_reports_app_id_foreign` (`app_id`),
  ADD KEY `dropped_ppi_reports_ppi_report_id_foreign` (`ppi_report_id`);

--
-- Indexes for table `dropped_sirs`
--
ALTER TABLE `dropped_sirs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dropped_sirs_app_id_foreign` (`app_id`),
  ADD KEY `dropped_sirs_sir_id_foreign` (`sir_id`);

--
-- Indexes for table `dropped_slps`
--
ALTER TABLE `dropped_slps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dropped_slps_app_id_foreign` (`app_id`),
  ADD KEY `dropped_slps_slp_id_foreign` (`slp_id`);

--
-- Indexes for table `engr_reports`
--
ALTER TABLE `engr_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `engr_reports_app_id_foreign` (`app_id`),
  ADD KEY `engr_reports_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `health_reports`
--
ALTER TABLE `health_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `health_reports_app_id_foreign` (`app_id`),
  ADD KEY `health_reports_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `idpa_documents`
--
ALTER TABLE `idpa_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpa_documents_app_id_foreign` (`app_id`),
  ADD KEY `idpa_documents_signatory_staff_id_foreign` (`signatory_staff_id`),
  ADD KEY `idpa_documents_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modified_assessments`
--
ALTER TABLE `modified_assessments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_assessments_assessment_id_foreign` (`assessment_id`),
  ADD KEY `modified_assessments_app_id_foreign` (`app_id`),
  ADD KEY `modified_assessments_staff_id_foreign` (`staff_id`),
  ADD KEY `modified_assessments_modified_by_foreign` (`modified_by`);

--
-- Indexes for table `not_recommended_applications`
--
ALTER TABLE `not_recommended_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `not_recommended_applications_app_id_foreign` (`app_id`),
  ADD KEY `not_recommended_applications_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_app_id_foreign` (`app_id`);

--
-- Indexes for table `ppi_reports`
--
ALTER TABLE `ppi_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ppi_reports_app_id_foreign` (`app_id`),
  ADD KEY `ppi_reports_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `signatures`
--
ALTER TABLE `signatures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `signatures_user_id_foreign` (`user_id`);

--
-- Indexes for table `sir_reports`
--
ALTER TABLE `sir_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sir_reports_app_id_foreign` (`app_id`),
  ADD KEY `sir_reports_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `slps`
--
ALTER TABLE `slps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slps_app_id_foreign` (`app_id`),
  ADD KEY `slps_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_user_id_foreign` (`user_id`);

--
-- Indexes for table `super_zones`
--
ALTER TABLE `super_zones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_staff_id_foreign` (`staff_id`),
  ADD KEY `tasks_app_id_foreign` (`app_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `villages_zone_id_foreign` (`zone_id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zones_superzone_id_foreign` (`superzone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bp_applications`
--
ALTER TABLE `bp_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bp_application_documents`
--
ALTER TABLE `bp_application_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `checklists`
--
ALTER TABLE `checklists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dropped_application_documents`
--
ALTER TABLE `dropped_application_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dropped_engr_reports`
--
ALTER TABLE `dropped_engr_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dropped_health_reports`
--
ALTER TABLE `dropped_health_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dropped_ppi_reports`
--
ALTER TABLE `dropped_ppi_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dropped_sirs`
--
ALTER TABLE `dropped_sirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dropped_slps`
--
ALTER TABLE `dropped_slps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `engr_reports`
--
ALTER TABLE `engr_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `health_reports`
--
ALTER TABLE `health_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `idpa_documents`
--
ALTER TABLE `idpa_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `modified_assessments`
--
ALTER TABLE `modified_assessments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `not_recommended_applications`
--
ALTER TABLE `not_recommended_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ppi_reports`
--
ALTER TABLE `ppi_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `signatures`
--
ALTER TABLE `signatures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sir_reports`
--
ALTER TABLE `sir_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slps`
--
ALTER TABLE `slps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `super_zones`
--
ALTER TABLE `super_zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `villages`
--
ALTER TABLE `villages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessments`
--
ALTER TABLE `assessments`
  ADD CONSTRAINT `assessments_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `bp_applications` (`id`),
  ADD CONSTRAINT `assessments_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `staff` (`id`),
  ADD CONSTRAINT `assessments_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `bp_applications`
--
ALTER TABLE `bp_applications`
  ADD CONSTRAINT `bp_applications_developer_user_id_foreign` FOREIGN KEY (`developer_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bp_applications_super_zone_foreign` FOREIGN KEY (`super_zone`) REFERENCES `super_zones` (`id`),
  ADD CONSTRAINT `bp_applications_village_id_foreign` FOREIGN KEY (`village_id`) REFERENCES `villages` (`id`),
  ADD CONSTRAINT `bp_applications_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`);

--
-- Constraints for table `bp_application_documents`
--
ALTER TABLE `bp_application_documents`
  ADD CONSTRAINT `bp_application_documents_bp_application_id_foreign` FOREIGN KEY (`bp_application_id`) REFERENCES `bp_applications` (`id`);

--
-- Constraints for table `checklists`
--
ALTER TABLE `checklists`
  ADD CONSTRAINT `checklists_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `bp_applications` (`id`),
  ADD CONSTRAINT `checklists_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `dropped_application_documents`
--
ALTER TABLE `dropped_application_documents`
  ADD CONSTRAINT `dropped_application_documents_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `bp_applications` (`id`),
  ADD CONSTRAINT `dropped_application_documents_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `bp_application_documents` (`id`);

--
-- Constraints for table `dropped_engr_reports`
--
ALTER TABLE `dropped_engr_reports`
  ADD CONSTRAINT `dropped_engr_reports_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `bp_applications` (`id`),
  ADD CONSTRAINT `dropped_engr_reports_engr_report_id_foreign` FOREIGN KEY (`engr_report_id`) REFERENCES `engr_reports` (`id`);

--
-- Constraints for table `dropped_health_reports`
--
ALTER TABLE `dropped_health_reports`
  ADD CONSTRAINT `dropped_health_reports_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `bp_applications` (`id`),
  ADD CONSTRAINT `dropped_health_reports_health_report_id_foreign` FOREIGN KEY (`health_report_id`) REFERENCES `health_reports` (`id`);

--
-- Constraints for table `dropped_ppi_reports`
--
ALTER TABLE `dropped_ppi_reports`
  ADD CONSTRAINT `dropped_ppi_reports_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `bp_applications` (`id`),
  ADD CONSTRAINT `dropped_ppi_reports_ppi_report_id_foreign` FOREIGN KEY (`ppi_report_id`) REFERENCES `ppi_reports` (`id`);

--
-- Constraints for table `dropped_sirs`
--
ALTER TABLE `dropped_sirs`
  ADD CONSTRAINT `dropped_sirs_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `bp_applications` (`id`),
  ADD CONSTRAINT `dropped_sirs_sir_id_foreign` FOREIGN KEY (`sir_id`) REFERENCES `sir_reports` (`id`);

--
-- Constraints for table `dropped_slps`
--
ALTER TABLE `dropped_slps`
  ADD CONSTRAINT `dropped_slps_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `bp_applications` (`id`),
  ADD CONSTRAINT `dropped_slps_slp_id_foreign` FOREIGN KEY (`slp_id`) REFERENCES `slps` (`id`);

--
-- Constraints for table `engr_reports`
--
ALTER TABLE `engr_reports`
  ADD CONSTRAINT `engr_reports_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `bp_applications` (`id`),
  ADD CONSTRAINT `engr_reports_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `health_reports`
--
ALTER TABLE `health_reports`
  ADD CONSTRAINT `health_reports_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `bp_applications` (`id`),
  ADD CONSTRAINT `health_reports_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `idpa_documents`
--
ALTER TABLE `idpa_documents`
  ADD CONSTRAINT `idpa_documents_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `bp_applications` (`id`),
  ADD CONSTRAINT `idpa_documents_signatory_staff_id_foreign` FOREIGN KEY (`signatory_staff_id`) REFERENCES `staff` (`id`),
  ADD CONSTRAINT `idpa_documents_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `modified_assessments`
--
ALTER TABLE `modified_assessments`
  ADD CONSTRAINT `modified_assessments_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `bp_applications` (`id`),
  ADD CONSTRAINT `modified_assessments_assessment_id_foreign` FOREIGN KEY (`assessment_id`) REFERENCES `assessments` (`id`),
  ADD CONSTRAINT `modified_assessments_modified_by_foreign` FOREIGN KEY (`modified_by`) REFERENCES `staff` (`id`),
  ADD CONSTRAINT `modified_assessments_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `not_recommended_applications`
--
ALTER TABLE `not_recommended_applications`
  ADD CONSTRAINT `not_recommended_applications_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `bp_applications` (`id`),
  ADD CONSTRAINT `not_recommended_applications_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `bp_applications` (`id`);

--
-- Constraints for table `ppi_reports`
--
ALTER TABLE `ppi_reports`
  ADD CONSTRAINT `ppi_reports_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `bp_applications` (`id`),
  ADD CONSTRAINT `ppi_reports_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `signatures`
--
ALTER TABLE `signatures`
  ADD CONSTRAINT `signatures_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sir_reports`
--
ALTER TABLE `sir_reports`
  ADD CONSTRAINT `sir_reports_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `bp_applications` (`id`),
  ADD CONSTRAINT `sir_reports_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `slps`
--
ALTER TABLE `slps`
  ADD CONSTRAINT `slps_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `bp_applications` (`id`),
  ADD CONSTRAINT `slps_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `bp_applications` (`id`),
  ADD CONSTRAINT `tasks_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `villages`
--
ALTER TABLE `villages`
  ADD CONSTRAINT `villages_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`);

--
-- Constraints for table `zones`
--
ALTER TABLE `zones`
  ADD CONSTRAINT `zones_superzone_id_foreign` FOREIGN KEY (`superzone_id`) REFERENCES `super_zones` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
