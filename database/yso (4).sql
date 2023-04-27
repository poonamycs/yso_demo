-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 01:02 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yso`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_id` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `admin_role` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `google_id` bigint(20) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role_id`, `email`, `password`, `name`, `admin_role`, `image`, `google_id`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'manoj@ycstech.in', '$2y$10$yTzLkJeIYksIrdZe2bLy2OwiXd.xhuT/0/Ph01Rae44D7ngmsOG9e', 'Manoj Gonte', 'Superadmin', NULL, NULL, 1, '2020-06-20 00:00:00', '2022-01-25 01:53:16'),
(18, NULL, 'sales@chemdist.in', '56dd81c2a4ff3c68c11f275902b604ed', 'Pallavi Kanawade', 'Superadmin', NULL, NULL, 1, '2021-06-15 14:30:48', '2022-04-14 13:33:40'),
(19, NULL, 'project19@chemdist.in', 'c5385bf22dc1755a6e32e52e5312364b', 'Ketaki Talanikar', 'Sales', NULL, NULL, 1, '2021-06-16 10:59:26', '2022-04-14 13:33:40'),
(20, NULL, 'project2@chemdist.in', '69c7abfd91c4115b0ab2890e02b073a0', 'Shailesh Kharade', 'Sales', NULL, NULL, 1, '2021-06-16 11:25:52', '2022-04-14 13:33:40'),
(21, NULL, 'sales1@chemdist.in', '27543805669f079fa3b56bfdd330b39a', 'khushabu Badhe', 'Superadmin', NULL, NULL, 1, '2021-06-16 11:29:50', '2022-04-14 13:33:39'),
(22, NULL, 'sales2@chemdist.in', '58cb23ac8540ac2548a5dd6752336dac', 'Payal shewale', 'Sales', NULL, NULL, 1, '2021-06-16 11:30:31', '2021-08-12 16:19:49'),
(23, NULL, 'project14@chemdist.in', '11caaf2f8e7fed2cf19ba3df0b231d7c', 'Yogesh Shelake', 'Sales', NULL, NULL, 1, '2021-06-16 11:32:15', '2021-06-16 11:32:15'),
(25, '1', 'purchase1@chemdist.in', 'a27dec1b5f900cdd9aa86e3463ca62eb', 'Ajay Ingale', NULL, '', NULL, 1, '2021-06-28 15:05:02', '2023-01-30 11:22:28'),
(27, NULL, 'project1@chemdist.in', '4a12ac3b0e938a4673a423673a86c7df', 'Nikhil Barde', 'Sales', NULL, NULL, 1, '2021-09-03 14:15:29', '2021-09-03 14:15:29'),
(28, NULL, 'sales3@chemdist.in', 'a34bdd416ca1ba83fe24446444e2bbab', 'Pankaj Diwate', 'Sales', NULL, NULL, 1, '2021-09-03 14:16:12', '2021-09-03 14:16:12'),
(29, NULL, 'bhagwan@chemdist.in', 'be8bdbe9045bb8d14b3f3de8139b4ef0', 'Bhagwan Patil', 'Production', NULL, NULL, 1, '2021-09-03 14:17:05', '2021-09-03 14:17:05'),
(30, NULL, 'nilesh.rajguru@chemdist.in', 'c2a238baf275b6b4d21e1989acfc41a7', 'Nilesh Rajguru', 'Production', NULL, NULL, 1, '2021-09-03 14:17:51', '2021-09-03 14:17:51'),
(32, NULL, 'production@chemdist.in', '308a39423f711a2d5cadc320f44b047e', 'Production Team', 'Production', NULL, NULL, 1, '2021-09-06 14:18:14', '2021-09-06 14:18:14'),
(33, NULL, 'manufacturing@chemdist.in', 'd636601ffd292eaadb31f91d074258aa', 'Manufacturing Team', 'Production', NULL, NULL, 1, '2021-09-06 14:19:01', '2021-09-06 14:19:01'),
(34, NULL, 'quality1@chemdist.in', '5b9822ac37bd48a7cfa7e1f51f930b96', 'Pravin Shelke', 'Quality', NULL, NULL, 1, '2021-09-06 14:19:53', '2021-09-06 14:19:53'),
(36, NULL, 'quality@chemdist.in', '987423d08b4fbc38a46f5401d0772ca7', 'Quality Team', 'Quality', NULL, NULL, 1, '2021-09-06 14:21:38', '2021-09-06 14:21:38'),
(37, NULL, 'project5@chemdist.in', 'b355bb9da6c945c63314744a716a72f7', 'Mahesh Navghane', 'Projects', NULL, NULL, 1, '2021-09-06 14:22:34', '2021-09-06 14:22:34'),
(38, NULL, 'project7@chemdist.in', '0edc3d39ba523b91166554b925f345e0', 'Ishwar Dhere', 'Projects', NULL, NULL, 1, '2021-09-06 14:23:18', '2021-09-06 14:23:18'),
(39, NULL, 'project4@chemdist.in', '3eae3fa2b1f474725a979e6c5770aaf2', 'Tushar Sant', 'Projects', NULL, NULL, 1, '2021-09-06 14:24:00', '2021-09-06 14:24:00'),
(40, NULL, 'project12@chemdist.in', 'afa7c1872b4690f27f20485ee3a65b3d', 'Kishor Thalkar', 'Projects', NULL, NULL, 1, '2021-09-06 14:24:48', '2021-09-06 14:24:48'),
(41, NULL, 'project6@chemdist.in', '16a60e81a42382df437aadb5643d0317', 'Govind Shinde', 'Projects', NULL, NULL, 1, '2021-09-06 14:25:53', '2021-09-06 14:25:53'),
(42, NULL, 'project13@chemdist.in', '4718a6ba9e77e677e9d018389786e25a', 'Omkar Shinde', 'Projects', NULL, NULL, 1, '2021-09-06 14:26:58', '2021-09-06 14:26:58'),
(43, NULL, 'rakesh@chemdist.in', 'f7f3e02ab059d3269a4d836641162868', 'Rakesh Chavan', 'Projects', NULL, NULL, 1, '2021-09-06 14:32:00', '2021-09-06 14:32:00'),
(45, NULL, 'project15@chemdist.in', 'afe1ddfc008c71fa1cbc6247a8c5dbe8', 'Shreya Doijad', 'Projects', NULL, NULL, 1, '2021-09-06 14:36:26', '2021-09-06 14:36:26'),
(46, NULL, 'piping@chemdist.in', '855bb6a58a022da767cb93e38f4d58ab', 'Ravindra Shelke', 'Projects', NULL, NULL, 1, '2021-09-06 14:37:58', '2021-09-06 14:37:58'),
(47, NULL, 'piping1@chemdist.in', 'a298dcbb8402ab2a529d95d43ef2cf88', 'Omkar Kumbhar', 'Projects', NULL, NULL, 1, '2021-09-06 14:40:12', '2021-09-06 14:40:12'),
(48, NULL, 'piping2@chemdist.in', '9e72114be32d6196de93b13041cee656', 'Omkar Mandre', 'Projects', NULL, NULL, 1, '2021-09-06 14:40:52', '2021-09-06 14:40:52'),
(49, NULL, 'piping3@chemdist.in', '4376fd21b18de4cdaec8e11970b41479', 'Vinayak Chudunge', 'Projects', NULL, NULL, 1, '2021-09-06 14:41:52', '2021-09-06 14:41:52'),
(51, NULL, 'stores@chemdist.in', '22ef98839e00ebc69382a450895cda58', 'Stores Team', 'Store', NULL, NULL, 1, '2021-09-06 14:44:17', '2021-09-06 14:44:17'),
(52, NULL, 'logistics@chemdist.in', 'dc87f181c0237e78acee6322ef59593b', 'Santosh Kapase', 'Dispatch', NULL, NULL, 1, '2021-09-06 14:45:38', '2021-09-06 14:45:38'),
(53, NULL, 'project18@chemdist.in', 'fc0634f1031b4f9562eb3a60688c1294', 'Tukaram Mande', 'Projects', NULL, NULL, 1, '2021-09-22 13:52:26', '2021-09-22 13:52:26'),
(54, NULL, 'yogesh@chemdist.in', 'a63c40d21a95d88e09277db3500438fb', 'Yogesh Jantre', 'Projects', NULL, NULL, 1, '2021-09-22 13:53:02', '2021-09-22 13:53:02'),
(55, NULL, 'purchase2@chemdist.in', '77414f285a4159ea217b33ab4228d8bd', 'Tanaji Bhairat', 'Purchase', NULL, NULL, 1, '2021-09-22 14:20:16', '2021-09-22 14:20:16'),
(56, NULL, 'tushar@chemdist.in', 'c4b80465c4e54988c62fc5bdad28a0a3', 'Tushar Wagh', 'Superadmin', NULL, NULL, 1, '2021-09-22 14:42:36', '2021-09-22 14:42:36'),
(57, NULL, 'nilesh@chemdist.in', '7599f6edd882068f9c4a8f4b843e13a8', 'Nilesh Joshi', 'Superadmin', NULL, NULL, 1, '2021-09-22 14:43:01', '2021-09-22 14:43:01'),
(60, '2', 'manoj@yopmail.com', '$2y$10$tOIgOLfnSh4swoxuJDjQPuJpUqhN2PaOSZVIPdu8lYbTpxsoL0sCq', 'MNJ', 'Design', '163549039856584.png', NULL, 1, '2021-10-28 15:36:12', '2022-02-05 23:43:30'),
(63, '1', 'john@yopmail.com', '$2y$10$6WtPo5VNNKrqTjQW3aC5N.HOkbBjeJiCqP9OYTvb7tiD615C8VmFu', 'John Doe', '2', '164207463534407.jpg', NULL, 1, '2022-01-13 11:50:36', '2022-01-14 05:33:11'),
(65, '2', 'shubham@ycstech.in', '$2y$10$nBbuY0GHwU6kjvhnOA0I4OyrsQhvsC5DJ7UCXNAm06UBORbYeO9Gu', 'Shubham B', '', '164481739239789.png', NULL, 1, '2022-02-14 05:43:13', '2022-04-13 05:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `stage_id` varchar(255) NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `attachments` varchar(255) DEFAULT NULL,
  `admin_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `stage_id`, `order_id`, `attachments`, `admin_id`, `created_at`, `updated_at`) VALUES
(62, '1', 367, 'MM logo.png', 1, '2021-12-15 13:23:14', '2021-12-15 13:41:17'),
(63, '1', 367, 'IMG-20211123-WA0007.jpg', 1, '2021-12-15 13:23:14', '2021-12-15 13:41:20'),
(69, '1', 367, '1639658151-Addhar Card.PNG', 1, '2021-12-16 12:35:51', '2021-12-16 07:05:51'),
(71, '30', 367, '1640176129-logo.png', 1, '2021-12-22 12:28:49', '2021-12-22 06:58:49'),
(72, '30', 367, '1640176195-123.png', 1, '2021-12-22 12:29:55', '2021-12-22 06:59:55'),
(73, '29', 368, '1644840800-YSO FINAL LOGO-01.png', 1, '2022-02-14 12:13:21', '2022-02-14 06:43:21'),
(74, '30', 368, '1644840817-YSO FINAL LOGO-01 (1).png', 1, '2022-02-14 12:13:37', '2022-02-14 06:43:37'),
(75, '188', 382, '1647322434-image-uploader-master.zip', 1, '2022-03-15 11:03:54', '2022-03-15 05:33:54'),
(76, '188', 382, '1647322434-YSO Admin Dashboard.xlsx', 1, '2022-03-15 11:03:54', '2022-03-15 05:33:54'),
(77, '189', 382, 'image-uploader-master.zip', 1, '2022-03-15 11:26:31', '2022-03-15 05:56:31'),
(78, '188', 382, '1647329358-304197.jpg', 1, '2022-03-15 12:59:18', '2022-03-15 07:29:18'),
(79, '2', 367, '1649827558-cdbanner.jpg', 1, '2022-04-13 10:55:58', '2022-04-13 05:25:58'),
(80, '2', 367, '1649827651-nexmo_pricing.xlsx', 1, '2022-04-13 10:57:31', '2022-04-13 05:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `code` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 1, '2021-04-06 01:06:30', '2021-10-11 00:34:13'),
(2, 'AL', 'Albania', 1, '2021-04-06 01:06:30', NULL),
(3, 'DZ', 'Algeria', 1, '2021-04-06 01:06:30', NULL),
(10, 'AR', 'Argentina', 1, '2021-04-06 01:06:30', NULL),
(11, 'AM', 'Armenia', 1, '2021-04-06 01:06:30', NULL),
(12, 'AW', 'Aruba', 1, '2021-04-06 01:06:30', NULL),
(13, 'AU', 'Australia', 1, '2021-04-06 01:06:30', NULL),
(14, 'AT', 'Austria', 1, '2021-04-06 01:06:30', NULL),
(15, 'AZ', 'Azerbaijan', 1, '2021-04-06 01:06:30', NULL),
(17, 'BH', 'Bahrain', 1, '2021-04-06 01:06:30', NULL),
(18, 'BD', 'Bangladesh', 1, '2021-04-06 01:06:30', NULL),
(19, 'BB', 'Barbados', 1, '2021-04-06 01:06:30', NULL),
(20, 'BY', 'Belarus', 1, '2021-04-06 01:06:30', NULL),
(21, 'BE', 'Belgium', 1, '2021-04-06 01:06:30', NULL),
(22, 'BZ', 'Belize', 1, '2021-04-06 01:06:30', NULL),
(23, 'BJ', 'Benin', 1, '2021-04-06 01:06:30', NULL),
(24, 'BM', 'Bermuda', 1, '2021-04-06 01:06:30', NULL),
(25, 'BT', 'Bhutan', 1, '2021-04-06 01:06:30', NULL),
(26, 'BO', 'Bolivia', 1, '2021-04-06 01:06:30', NULL),
(28, 'BW', 'Botswana', 1, '2021-04-06 01:06:30', NULL),
(30, 'BR', 'Brazil', 1, '2021-04-06 01:06:30', NULL),
(32, 'BN', 'Brunei', 1, '2021-04-06 01:06:30', NULL),
(33, 'BG', 'Bulgaria', 1, '2021-04-06 01:06:30', NULL),
(34, 'BF', 'Burkina Faso', 1, '2021-04-06 01:06:30', NULL),
(35, 'BI', 'Burundi', 1, '2021-04-06 01:06:30', NULL),
(36, 'KH', 'Cambodia', 1, '2021-04-06 01:06:30', NULL),
(37, 'CM', 'Cameroon', 1, '2021-04-06 01:06:30', NULL),
(38, 'CA', 'Canada', 1, '2021-04-06 01:06:30', NULL),
(43, 'CL', 'Chile', 1, '2021-04-06 01:06:30', NULL),
(44, 'CN', 'China', 1, '2021-04-06 01:06:30', NULL),
(47, 'CO', 'Colombia', 1, '2021-04-06 01:06:30', NULL),
(48, 'KM', 'Comoros', 1, '2021-04-06 01:06:30', NULL),
(49, 'CG', 'Republic Of The Congo', 1, '2021-04-06 01:06:30', NULL),
(51, 'CK', 'Cook Islands', 1, '2021-04-06 01:06:30', NULL),
(52, 'CR', 'Costa Rica', 1, '2021-04-06 01:06:30', NULL),
(54, 'HR', 'Croatia (Hrvatska)', 1, '2021-04-06 01:06:30', NULL),
(55, 'CU', 'Cuba', 1, '2021-04-06 01:06:30', NULL),
(56, 'CY', 'Cyprus', 1, '2021-04-06 01:06:30', NULL),
(57, 'CZ', 'Czech Republic', 1, '2021-04-06 01:06:30', NULL),
(58, 'DK', 'Denmark', 1, '2021-04-06 01:06:30', NULL),
(60, 'DM', 'Dominica', 1, '2021-04-06 01:06:30', NULL),
(61, 'DO', 'Dominican Republic', 1, '2021-04-06 01:06:30', NULL),
(62, 'TP', 'East Timor', 1, '2021-04-06 01:06:30', NULL),
(64, 'EG', 'Egypt', 1, '2021-04-06 01:06:30', NULL),
(68, 'EE', 'Estonia', 1, '2021-04-06 01:06:30', NULL),
(71, 'FK', 'Falkland Islands', 1, '2021-04-06 01:06:30', NULL),
(72, 'FO', 'Faroe Islands', 1, '2021-04-06 01:06:30', NULL),
(74, 'FI', 'Finland', 1, '2021-04-06 01:06:30', NULL),
(75, 'FR', 'France', 1, '2021-04-06 01:06:30', NULL),
(79, 'GA', 'Gabon', 1, '2021-04-06 01:06:30', NULL),
(81, 'GE', 'Georgia', 1, '2021-04-06 01:06:30', NULL),
(82, 'DE', 'Germany', 1, '2021-04-06 01:06:30', NULL),
(83, 'GH', 'Ghana', 1, '2021-04-06 01:06:30', NULL),
(84, 'GI', 'Gibraltar', 1, '2021-04-06 01:06:30', NULL),
(85, 'GR', 'Greece', 1, '2021-04-06 01:06:30', NULL),
(86, 'GL', 'Greenland', 1, '2021-04-06 01:06:30', NULL),
(89, 'GU', 'Guam', 1, '2021-04-06 01:06:30', NULL),
(90, 'GT', 'Guatemala', 1, '2021-04-06 01:06:30', NULL),
(92, 'GN', 'Guinea', 1, '2021-04-06 01:06:30', NULL),
(93, 'GW', 'Guinea-Bissau', 1, '2021-04-06 01:06:30', NULL),
(94, 'GY', 'Guyana', 1, '2021-04-06 01:06:30', NULL),
(95, 'HT', 'Haiti', 1, '2021-04-06 01:06:30', NULL),
(98, 'HK', 'Hong Kong S.A.R.', 1, '2021-04-06 01:06:30', NULL),
(99, 'HU', 'Hungary', 1, '2021-04-06 01:06:30', NULL),
(100, 'IS', 'Iceland', 1, '2021-04-06 01:06:30', NULL),
(101, 'IN', 'India', 1, '2021-04-06 01:06:30', NULL),
(102, 'ID', 'Indonesia', 1, '2021-04-06 01:06:30', NULL),
(103, 'IR', 'Iran', 1, '2021-04-06 01:06:30', NULL),
(104, 'IQ', 'Iraq', 1, '2021-04-06 01:06:30', NULL),
(105, 'IE', 'Ireland', 1, '2021-04-06 01:06:30', NULL),
(106, 'IL', 'Israel', 1, '2021-04-06 01:06:30', NULL),
(107, 'IT', 'Italy', 1, '2021-04-06 01:06:30', NULL),
(108, 'JM', 'Jamaica', 1, '2021-04-06 01:06:30', NULL),
(109, 'JP', 'Japan', 1, '2021-04-06 01:06:30', NULL),
(110, 'XJ', 'Jersey', 1, '2021-04-06 01:06:30', NULL),
(111, 'JO', 'Jordan', 1, '2021-04-06 01:06:30', NULL),
(112, 'KZ', 'Kazakhstan', 1, '2021-04-06 01:06:30', NULL),
(113, 'KE', 'Kenya', 1, '2021-04-06 01:06:30', NULL),
(114, 'KI', 'Kiribati', 1, '2021-04-06 01:06:30', NULL),
(115, 'KP', 'Korea North', 1, '2021-04-06 01:06:30', NULL),
(116, 'KR', 'Korea South', 1, '2021-04-06 01:06:30', NULL),
(117, 'KW', 'Kuwait', 1, '2021-04-06 01:06:30', NULL),
(118, 'KG', 'Kyrgyzstan', 1, '2021-04-06 01:06:30', NULL),
(121, 'LB', 'Lebanon', 1, '2021-04-06 01:06:30', NULL),
(122, 'LS', 'Lesotho', 1, '2021-04-06 01:06:30', NULL),
(123, 'LR', 'Liberia', 1, '2021-04-06 01:06:30', NULL),
(124, 'LY', 'Libya', 1, '2021-04-06 01:06:30', NULL),
(126, 'LT', 'Lithuania', 1, '2021-04-06 01:06:30', NULL),
(129, 'MK', 'Macedonia', 1, '2021-04-06 01:06:30', NULL),
(130, 'MG', 'Madagascar', 1, '2021-04-06 01:06:30', NULL),
(131, 'MW', 'Malawi', 1, '2021-04-06 01:06:30', NULL),
(132, 'MY', 'Malaysia', 1, '2021-04-06 01:06:30', NULL),
(133, 'MV', 'Maldives', 1, '2021-04-06 01:06:30', NULL),
(134, 'ML', 'Mali', 1, '2021-04-06 01:06:30', NULL),
(135, 'MT', 'Malta', 1, '2021-04-06 01:06:30', NULL),
(140, 'MU', 'Mauritius', 1, '2021-04-06 01:06:30', NULL),
(141, 'YT', 'Mayotte', 1, '2021-04-06 01:06:30', NULL),
(142, 'MX', 'Mexico', 1, '2021-04-06 01:06:30', NULL),
(143, 'FM', 'Micronesia', 1, '2021-04-06 01:06:30', NULL),
(144, 'MD', 'Moldova', 1, '2021-04-06 01:06:30', NULL),
(145, 'MC', 'Monaco', 1, '2021-04-06 01:06:30', NULL),
(146, 'MN', 'Mongolia', 1, '2021-04-06 01:06:30', NULL),
(148, 'MA', 'Morocco', 1, '2021-04-06 01:06:30', NULL),
(149, 'MZ', 'Mozambique', 1, '2021-04-06 01:06:30', NULL),
(150, 'MM', 'Myanmar', 1, '2021-04-06 01:06:30', NULL),
(151, 'NA', 'Namibia', 1, '2021-04-06 01:06:30', NULL),
(153, 'NP', 'Nepal', 1, '2021-04-06 01:06:30', NULL),
(156, 'NC', 'New Caledonia', 1, '2021-04-06 01:06:30', NULL),
(157, 'NZ', 'New Zealand', 1, '2021-04-06 01:06:30', NULL),
(160, 'NG', 'Nigeria', 1, '2021-04-06 01:06:30', NULL),
(164, 'NO', 'Norway', 1, '2021-04-06 01:06:30', NULL),
(165, 'OM', 'Oman', 1, '2021-04-06 01:06:30', NULL),
(166, 'PK', 'Pakistan', 1, '2021-04-06 01:06:30', NULL),
(167, 'PW', 'Palau', 1, '2021-04-06 01:06:30', NULL),
(168, 'PS', 'Palestinian Territory Occupied', 1, '2021-04-06 01:06:30', NULL),
(169, 'PA', 'Panama', 1, '2021-04-06 01:06:30', NULL),
(170, 'PG', 'Papua new Guinea', 1, '2021-04-06 01:06:30', NULL),
(171, 'PY', 'Paraguay', 1, '2021-04-06 01:06:30', NULL),
(172, 'PE', 'Peru', 1, '2021-04-06 01:06:30', NULL),
(173, 'PH', 'Philippines', 1, '2021-04-06 01:06:30', NULL),
(174, 'PN', 'Pitcairn Island', 1, '2021-04-06 01:06:30', NULL),
(175, 'PL', 'Poland', 1, '2021-04-06 01:06:30', NULL),
(176, 'PT', 'Portugal', 1, '2021-04-06 01:06:30', NULL),
(177, 'PR', 'Puerto Rico', 1, '2021-04-06 01:06:30', NULL),
(178, 'QA', 'Qatar', 1, '2021-04-06 01:06:30', NULL),
(179, 'RE', 'Reunion', 1, '2021-04-06 01:06:30', NULL),
(180, 'RO', 'Romania', 1, '2021-04-06 01:06:30', NULL),
(181, 'RU', 'Russia', 1, '2021-04-06 01:06:30', NULL),
(183, 'SH', 'Saint Helena', 1, '2021-04-06 01:06:30', NULL),
(189, 'SM', 'San Marino', 1, '2021-04-06 01:06:30', NULL),
(191, 'SA', 'Saudi Arabia', 1, '2021-04-06 01:06:30', NULL),
(192, 'SN', 'Senegal', 1, '2021-04-06 01:06:30', NULL),
(193, 'RS', 'Serbia', 1, '2021-04-06 01:06:30', NULL),
(194, 'SC', 'Seychelles', 1, '2021-04-06 01:06:30', NULL),
(195, 'SL', 'Sierra Leone', 1, '2021-04-06 01:06:30', NULL),
(196, 'SG', 'Singapore', 1, '2021-04-06 01:06:30', NULL),
(197, 'SK', 'Slovakia', 1, '2021-04-06 01:06:30', NULL),
(198, 'SI', 'Slovenia', 1, '2021-04-06 01:06:30', NULL),
(201, 'SO', 'Somalia', 1, '2021-04-06 01:06:30', NULL),
(202, 'ZA', 'South Africa', 1, '2021-04-06 01:06:30', NULL),
(203, 'GS', 'South Georgia', 1, '2021-04-06 01:06:30', NULL),
(204, 'SS', 'South Sudan', 1, '2021-04-06 01:06:30', NULL),
(205, 'ES', 'Spain', 1, '2021-04-06 01:06:30', NULL),
(206, 'LK', 'Sri Lanka', 1, '2021-04-06 01:06:30', NULL),
(207, 'SD', 'Sudan', 1, '2021-04-06 01:06:30', NULL),
(208, 'SR', 'Suriname', 1, '2021-04-06 01:06:30', NULL),
(210, 'SZ', 'Swaziland', 1, '2021-04-06 01:06:30', NULL),
(211, 'SE', 'Sweden', 1, '2021-04-06 01:06:30', NULL),
(212, 'CH', 'Switzerland', 1, '2021-04-06 01:06:30', NULL),
(213, 'SY', 'Syria', 1, '2021-04-06 01:06:30', NULL),
(214, 'TW', 'Taiwan', 1, '2021-04-06 01:06:30', NULL),
(215, 'TJ', 'Tajikistan', 1, '2021-04-06 01:06:30', NULL),
(216, 'TZ', 'Tanzania', 1, '2021-04-06 01:06:30', NULL),
(217, 'TH', 'Thailand', 1, '2021-04-06 01:06:30', NULL),
(218, 'TG', 'Togo', 1, '2021-04-06 01:06:30', NULL),
(219, 'TK', 'Tokelau', 1, '2021-04-06 01:06:30', NULL),
(220, 'TO', 'Tonga', 1, '2021-04-06 01:06:30', NULL),
(223, 'TR', 'Turkey', 1, '2021-04-06 01:06:30', NULL),
(224, 'TM', 'Turkmenistan', 1, '2021-04-06 01:06:30', NULL),
(226, 'TV', 'Tuvalu', 1, '2021-04-06 01:06:30', NULL),
(227, 'UG', 'Uganda', 1, '2021-04-06 01:06:30', NULL),
(228, 'UA', 'Ukraine', 1, '2021-04-06 01:06:30', NULL),
(229, 'AE', 'United Arab Emirates', 1, '2021-04-06 01:06:30', NULL),
(230, 'GB', 'United Kingdom', 1, '2021-04-06 01:06:30', NULL),
(231, 'US', 'United States', 1, '2021-04-06 01:06:30', NULL),
(233, 'UY', 'Uruguay', 1, '2021-04-06 01:06:30', NULL),
(234, 'UZ', 'Uzbekistan', 1, '2021-04-06 01:06:30', NULL),
(235, 'VU', 'Vanuatu', 1, '2021-04-06 01:06:30', NULL),
(237, 'VE', 'Venezuela', 1, '2021-04-06 01:06:30', NULL),
(238, 'VN', 'Vietnam', 1, '2021-04-06 01:06:30', NULL),
(239, 'VG', 'Virgin Islands (British)', 1, '2021-04-06 01:06:30', NULL),
(240, 'VI', 'Virgin Islands (US)', 1, '2021-04-06 01:06:30', NULL),
(241, 'WF', 'Wallis And Futuna Islands', 1, '2021-04-06 01:06:30', NULL),
(242, 'EH', 'Western Sahara', 1, '2021-04-06 01:06:30', NULL),
(243, 'YE', 'Yemen', 1, '2021-04-06 01:06:30', NULL),
(245, 'ZM', 'Zambia', 1, '2021-04-06 01:06:30', NULL),
(246, 'ZW', 'Zimbabwe', 1, '2021-04-06 01:06:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `crud_events`
--

CREATE TABLE `crud_events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `allday` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crud_events`
--

INSERT INTO `crud_events` (`id`, `title`, `description`, `start`, `end`, `allday`, `color`, `created_at`, `updated_at`) VALUES
(16, 'New event', NULL, '0000-00-00', '0000-00-00', 'true', NULL, '2023-03-09 11:11:47', '2023-03-09 11:11:47'),
(17, 'New event', NULL, '0000-00-00', '0000-00-00', 'true', NULL, '2023-03-09 11:16:26', '2023-03-09 11:16:26'),
(18, 'New event', NULL, '0000-00-00', '0000-00-00', 'true', NULL, '2023-03-09 11:41:29', '2023-03-09 11:41:29'),
(19, 'New event', NULL, '0000-00-00', '0000-00-00', 'true', NULL, '2023-03-09 11:42:24', '2023-03-09 11:42:24'),
(20, 'New event', NULL, '0000-00-00', '0000-00-00', 'true', NULL, '2023-03-09 11:56:16', '2023-03-09 11:56:16'),
(21, 'New event', NULL, '0000-00-00', '0000-00-00', 'true', NULL, '2023-03-09 12:01:57', '2023-03-09 12:01:57'),
(22, 'New event', NULL, '0000-00-00', '0000-00-00', 'true', NULL, '2023-03-09 12:02:59', '2023-03-09 12:02:59'),
(23, 'New event', NULL, '0000-00-00', '0000-00-00', 'true', NULL, '2023-03-09 12:03:13', '2023-03-09 12:03:13'),
(24, 'New event', NULL, '0000-00-00', '0000-00-00', 'true', NULL, '2023-03-09 12:04:00', '2023-03-09 12:04:00'),
(25, 'New event', NULL, '0000-00-00', '0000-00-00', 'true', NULL, '2023-03-09 12:04:25', '2023-03-09 12:04:25'),
(26, 'New event', NULL, '0000-00-00', '0000-00-00', 'true', NULL, '2023-03-09 12:05:37', '2023-03-09 12:05:37'),
(27, 'New event', NULL, '0000-00-00', '0000-00-00', 'true', NULL, '2023-03-09 12:06:08', '2023-03-09 12:06:08'),
(28, 'New event', NULL, '0000-00-00', '0000-00-00', 'true', NULL, '2023-03-09 12:08:15', '2023-03-09 12:08:15'),
(29, 'New event', NULL, '0000-00-00', '0000-00-00', 'true', NULL, '2023-03-09 13:00:31', '2023-03-09 13:00:31'),
(30, 'New event', NULL, '0000-00-00', '0000-00-00', 'true', NULL, '2023-03-09 13:21:23', '2023-03-09 13:21:23'),
(31, 'New event', NULL, '0000-00-00', '0000-00-00', 'true', NULL, '2023-03-09 13:23:21', '2023-03-09 13:23:21'),
(32, 'New event', NULL, '0000-00-00', '0000-00-00', 'true', NULL, '2023-03-09 13:24:45', '2023-03-09 13:24:45'),
(33, 'New event', NULL, '0000-00-00', '0000-00-00', 'true', NULL, '2023-03-09 16:03:54', '2023-03-09 16:03:54'),
(34, 'New event', NULL, '0000-00-00', '0000-00-00', '', NULL, '2023-03-10 05:13:38', '2023-03-10 05:13:38'),
(35, 'New event', NULL, '0000-00-00', '0000-00-00', '', NULL, '2023-03-10 05:16:48', '2023-03-10 05:16:48'),
(36, 'New event', NULL, '0000-00-00', '0000-00-00', '', NULL, '2023-03-10 05:20:48', '2023-03-10 05:20:48'),
(37, 'New event', NULL, '0000-00-00', '0000-00-00', '', NULL, '2023-03-13 12:07:55', '2023-03-13 12:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `subscription_start` varchar(255) NOT NULL,
  `subscription_end` varchar(255) NOT NULL,
  `subscription_type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sale', '2023-01-04 05:55:33', NULL),
(2, 'Purchase', '2023-01-04 05:55:55', NULL),
(3, 'Material', '2023-01-04 05:55:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `engineers`
--

CREATE TABLE `engineers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `abbr` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `engineers`
--

INSERT INTO `engineers` (`id`, `name`, `abbr`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Tushar Wagh', 'TW', 1, '2021-06-19 10:36:06', '2021-11-17 09:03:07'),
(4, 'Nilesh Joshi', 'NJ', 1, '2021-06-19 10:36:25', '2021-06-19 10:36:25'),
(5, 'Khushabu Badhe', 'KVB', 1, '2021-06-19 10:36:56', '2021-06-19 10:36:56'),
(6, 'Payal Shewale', 'PS', 1, '2021-06-19 10:37:17', '2021-06-19 10:37:17'),
(7, 'Manesh Pardeshi', 'MJP', 1, '2021-06-19 10:37:43', '2021-06-19 10:37:43'),
(8, 'Nikita Muley', 'NSM', 1, '2021-06-19 10:37:55', '2021-06-19 10:38:35'),
(9, 'Nikhil Barde', 'NB', 1, '2021-06-19 10:38:19', '2021-06-19 10:38:19'),
(10, 'Pallavi Kanawade', 'PK', 1, '2021-06-19 10:39:19', '2021-06-19 10:39:19'),
(11, 'Mahesh Navghane', 'MN', 1, '2021-06-19 10:39:33', '2021-06-19 10:39:33'),
(12, 'Ishwar Dhere', 'ID', 1, '2021-06-19 10:39:43', '2021-11-17 08:26:58'),
(13, 'Kishor Thalkar', 'KT', 1, '2021-06-19 10:39:53', '2021-06-19 10:39:53'),
(14, 'Yogesh Shelke', 'YS', 1, '2021-06-19 10:40:03', '2021-06-19 10:40:03'),
(15, 'Shailesh Kharade', 'SSK', 1, '2021-06-19 10:40:16', '2021-06-19 10:40:16'),
(16, 'Prajnal Desale', 'PHD', 1, '2021-06-19 10:41:09', '2021-06-19 10:41:09'),
(17, 'Pankaj Diwate', 'PMD', 1, '2021-06-19 10:41:33', '2021-06-19 10:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) UNSIGNED NOT NULL,
  `qrn` varchar(255) DEFAULT NULL,
  `enq_from` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `enq_date` varchar(255) DEFAULT NULL,
  `qte_date` varchar(255) DEFAULT NULL,
  `engineer` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `admin_id` int(11) UNSIGNED DEFAULT NULL,
  `assignee` int(11) UNSIGNED DEFAULT NULL,
  `reminder_note` varchar(255) DEFAULT NULL,
  `reminder_date` varchar(255) DEFAULT NULL,
  `enq_labels` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `so no` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `qrn`, `enq_from`, `customer_name`, `city`, `region`, `address`, `enq_date`, `qte_date`, `engineer`, `description`, `price`, `status`, `contact_person`, `email`, `phone`, `admin_id`, `assignee`, `reminder_note`, `reminder_date`, `enq_labels`, `created_at`, `updated_at`, `so no`, `remark`) VALUES
(12, 'QRN-6300', NULL, 'Poly Chem Fabricators', 'Mumbai', 'MH', NULL, '2021-06-16', '2021-06-17', 'YS', 'Agitator', '4515000', 'WARM', 'Vaibhavi Kokate', 'vaibhavi@polychemfab.com', '8369700242', 1, 1, NULL, NULL, NULL, '2022-02-18 12:00:50', '2022-03-17 10:05:46', NULL, NULL),
(15, 'QRN-6301', NULL, 'Sai Bio Med', 'Nashik', 'MH', NULL, '2021-06-18', '2021-06-18', 'PHD', 'Packing', '20000', 'WARM', 'Amol Ghadge', 'saibiomed9@gmail.com', '9511778194', 1, NULL, NULL, NULL, NULL, '2021-06-18 12:30:49', '2021-11-08 10:53:50', NULL, NULL),
(16, 'QRN-6302', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-10', '2021-06-10', 'KVB', 'Metallic Tanks', '13765000', 'LOST', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-06-18 12:34:31', '2021-11-08 10:53:50', NULL, NULL),
(17, 'QRN-6303', NULL, 'MTPI Products Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-06-10', '2021-06-10', 'PS', 'Design and Hydralic of LLE', '80000', 'BUDGETARY', 'Vishal Jadhav', 'vjadhav@mtpi.net.in', '8108613237', 1, NULL, NULL, NULL, NULL, '2021-06-18 12:38:00', '2021-11-08 10:53:50', NULL, NULL),
(18, 'QRN-6304', NULL, 'Thssenkrupp Industrial Solutions India Pvt ltd', 'Pune', 'MH', NULL, '2021-06-09', '2021-07-05', 'PMD', 'Columns / Scrubbers', '293877000', 'BUDGETARY', 'Sachin Bhat', 'sachin.bhat@thyssenkrupp.com', '9890038923', 1, NULL, NULL, NULL, NULL, '2021-06-18 12:41:49', '2021-11-08 10:53:50', NULL, NULL),
(19, 'QRN-6305', NULL, 'Xytel  India Pvt Ltd', 'Pune', 'MH', NULL, '2021-06-11', NULL, 'PHD', 'Packing', NULL, NULL, 'Shailesh Kulkarni', 'shailesh@xytelindia.com', '9822441844', 1, NULL, NULL, NULL, NULL, '2021-06-18 14:51:17', '2021-11-08 10:53:50', NULL, NULL),
(20, 'QRN-6306', NULL, 'UPL Ltd', 'Jhagadia', 'WEST', NULL, '2021-05-08', NULL, 'PHD', 'Internals', '319000', 'BUDGETARY', 'Shobha Thakur', 'shobha.thakur@shroffindia.com', '7045517526', 1, NULL, NULL, NULL, NULL, '2021-06-18 14:53:24', '2021-11-08 10:53:50', NULL, NULL),
(21, 'QRN-6307', NULL, 'Hemani Industries Ltd', 'Mumbai', 'MH', NULL, '2021-06-12', '2021-06-14', 'PHD', 'Packing', '1585250', 'HOLD', 'Manoj Pande', 'purchase1@hemanigroup.com', '9377064871', 1, NULL, NULL, NULL, NULL, '2021-06-22 10:50:59', '2021-11-08 10:53:50', NULL, NULL),
(22, 'QRN-6308', NULL, 'Pleiad Design & Engineering', 'Pune', 'MH', NULL, '2021-05-14', NULL, 'NSM', 'Demister Pads', NULL, NULL, 'Manisha Burde', 'manisha.b@pleiad.in', '8956439809', 1, NULL, NULL, NULL, NULL, '2021-06-22 10:53:43', '2021-11-08 10:53:50', NULL, NULL),
(23, 'QRN-6309', NULL, 'Optimum Engineers', 'Vadodara', 'WEST', NULL, '2021-05-15', '2021-05-15', 'NSM', 'Structured Packing', '40000', 'BUDGETARY', 'Parth Patel', 'optimumengineers06@gmail.com', '9586180599', 1, NULL, NULL, NULL, NULL, '2021-06-22 12:02:35', '2021-11-08 10:53:50', NULL, NULL),
(24, 'QRN-6310', NULL, 'Pleiad Design & Engineering', 'Pune', 'MH', NULL, '2021-05-16', NULL, 'NSM', 'Demister', NULL, NULL, 'Manisha Burde', 'manisha.b@pleiad.in', '8956439809', 1, NULL, NULL, NULL, NULL, '2021-06-22 12:05:02', '2021-11-08 10:53:50', NULL, NULL),
(25, 'QRN-6311', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-05-14', '2021-06-22', 'PS', 'Vessel & Heat Exchanger', '800000', 'ORDER', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-06-22 12:07:16', '2021-11-08 10:53:50', NULL, NULL),
(26, 'QRN-6312', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-05-14', '2021-06-22', 'KVB', 'Column', '7055000', 'ORDER', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-06-22 12:16:43', '2021-11-08 10:53:50', NULL, NULL),
(27, 'QRN-6313', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-05-14', '2021-06-23', 'PHD', 'Internals', '68000', 'LOST', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-06-22 12:17:35', '2021-11-08 10:53:50', NULL, NULL),
(28, 'QRN-6314', NULL, 'CSIR-Institute of Minerals and Materials Technology', 'Bhubaneswar', 'NORTH', NULL, '2021-05-03', NULL, 'YS', 'Reactor', NULL, NULL, 'Dr V. Aishvarya', 'v.aishvarya@gmail.com', '7735849811', 1, NULL, NULL, NULL, NULL, '2021-06-22 12:20:22', '2021-11-08 10:53:50', NULL, NULL),
(29, 'QRN-6315', NULL, 'HAT-11133', 'UK', 'EXPORT', NULL, '2021-05-06', '2021-05-06', 'NSM', 'VID & Vane Pack', '184000', 'BUDGETARY', 'Daniel Matthews', 'daniel@hatltd.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-06-22 12:29:31', '2021-11-08 10:53:50', NULL, NULL),
(30, 'QRN-6316', NULL, 'Air Poll Engineering', 'Ahmedabad', 'WEST', NULL, '2021-05-18', '2021-05-22', 'NSM', 'Structured Packing', '487000', NULL, 'Rahul Suryavanshi', 'sales@airpoll.co.in', '9712827889', 1, NULL, NULL, NULL, NULL, '2021-06-22 12:33:57', '2021-11-08 10:53:50', NULL, NULL),
(31, 'QRN-6317', NULL, 'Rand Polyproducts Pvt Ltd', 'Pune', 'MH', NULL, '2021-06-15', NULL, 'YS', 'Reactor', NULL, NULL, 'Nishant Inamdar', 'ninamdar@randpoly.com', '8275271473', 1, NULL, NULL, NULL, NULL, '2021-06-22 12:35:48', '2021-11-08 10:53:50', NULL, NULL),
(32, 'QRN-6318', NULL, 'Alcon Biosciences Pvt Ltd', 'Vapi', 'WEST', NULL, '2021-07-15', NULL, 'PHD', 'Structured packing and internals', NULL, NULL, 'Gyana ranjan Sethi', NULL, '9723648503', 1, NULL, NULL, NULL, NULL, '2021-06-22 12:37:12', '2021-11-08 10:53:50', NULL, NULL),
(33, 'QRN-6319', NULL, 'Pallavi Techno Foods Pvt Ltd', 'Pune', 'MH', NULL, '2021-05-14', '2021-05-19', 'PMD', 'MEE', '17480000', NULL, 'Shekhar Gadgil', 'sgadgil1@yahoo.co.in', '9823051616', 1, NULL, NULL, NULL, NULL, '2021-06-22 12:39:26', '2021-11-08 10:53:50', NULL, NULL),
(34, 'QRN-6320', NULL, 'Skyl and Metal', 'Mumbai', 'MH', NULL, '2021-05-18', '2021-05-18', 'PHD', 'Bubble cap', '5295000', 'WARM', 'Piyush Bhansali', 'sales@skylandmetal.in', '9930552852', 1, NULL, NULL, NULL, NULL, '2021-06-22 12:41:06', '2021-11-08 10:53:50', NULL, NULL),
(35, 'QRN-6321', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-05-18', NULL, 'KVB', 'Column , Vessels & Heat Exchanger', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-06-22 12:44:00', '2021-11-08 10:53:50', NULL, NULL),
(36, 'QRN-6322', NULL, 'Wanburry ltd', 'Panvel', 'MH', NULL, '2021-04-19', NULL, 'PHD', 'Structured Packing', NULL, NULL, 'Manoj Bhadoriya', 'manoj.bhadoriya@wanbury.com', '7774009459', 1, NULL, NULL, NULL, NULL, '2021-06-22 12:45:52', '2021-11-08 10:53:50', NULL, NULL),
(37, 'QRN-6323', NULL, 'Pemac Projects Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-05-19', NULL, 'PHD', 'Structured Packing', NULL, NULL, 'Anjali Joshi', 'purchase.pemac@gmail.com', '9324966750', 1, NULL, NULL, NULL, NULL, '2021-06-22 12:54:54', '2021-11-08 10:53:50', NULL, NULL),
(38, 'QRN-6324', NULL, 'Kutch Chemicals Industries Ltd', 'Vadodara', 'WEST', NULL, '2021-06-12', NULL, 'YS', 'Vent Scrubber', NULL, NULL, 'Vivek Jain', 'vivek.jain@kcil.co.in', '7987764963', 1, NULL, NULL, NULL, NULL, '2021-06-22 12:58:07', '2021-11-08 10:53:50', NULL, NULL),
(39, 'QRN-6325', NULL, 'Oil India', 'Bagajan Assam', 'NORTH', NULL, '2021-05-21', NULL, 'NB', 'Gas Dehydration Package', NULL, NULL, 'tender', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-06-22 14:29:44', '2021-11-08 10:53:50', NULL, NULL),
(40, 'QRN-6326', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-18', '2021-06-21', 'KVB', 'Gasket', '56000', NULL, 'Ramakant Singh', 'ramakant.singh@gfl.co.in', '9560337908', 1, NULL, NULL, NULL, NULL, '2021-06-22 15:15:37', '2021-11-08 10:53:50', NULL, NULL),
(41, 'QRN-6327', NULL, 'SRF Ltd', 'Dahej', 'WEST', NULL, '2021-06-21', NULL, 'NSM', 'Packing & Internal', NULL, NULL, 'Raghav Asthana', 'raghav.asthana@srf.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-06-22 15:58:23', '2021-11-08 10:53:50', NULL, NULL),
(42, 'QRN-6328', NULL, 'Godavari Biorefineries Ltd', 'Mumbai', 'MH', NULL, '2021-06-18', NULL, 'PS', 'Column', NULL, NULL, 'Somnath Nalawade', 'nalawade.somnath@somaiya.com', '9920342731', 1, NULL, NULL, NULL, NULL, '2021-06-22 16:00:38', '2021-11-08 10:53:50', NULL, NULL),
(43, 'QRN-6329', NULL, 'Balaji Amines', 'Solapur', 'MH', NULL, '2021-06-11', NULL, 'NSM', 'Demister', NULL, NULL, 'GRM', 'grm@balajiamines.in', NULL, 1, NULL, NULL, NULL, NULL, '2021-06-22 16:01:36', '2021-11-08 10:53:50', NULL, NULL),
(44, 'QRN-6330', NULL, 'SRF Ltd', 'Dahej', 'WEST', NULL, '2021-06-21', NULL, 'PMD', 'Column & Heat Exchanger', NULL, NULL, 'Raghav Asthana', 'raghav.asthana@srf.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-06-22 16:02:38', '2021-11-08 10:53:50', NULL, NULL),
(45, 'QRN-6331', NULL, 'Jaguar Paints', 'Ankaleshwar', 'WEST', NULL, '2021-06-18', NULL, 'YS', 'Agitator', NULL, NULL, 'Shabuddin Sutar', NULL, '9822080607', 1, NULL, NULL, NULL, NULL, '2021-06-22 16:03:33', '2021-11-08 10:53:50', NULL, NULL),
(46, 'QRN-6332', NULL, 'Jubilant Ingrevia Limited', 'Vilayat', 'WEST', NULL, '2021-06-22', '2021-06-22', 'NB', 'Tank', '2775000', NULL, 'Baljeet Singh', 'baljeet.singh@jubl.com', '9822080607', 1, NULL, NULL, NULL, NULL, '2021-06-22 16:36:52', '2021-11-08 10:53:50', NULL, NULL),
(47, 'QRN-6333', NULL, 'Startpoint', 'Kuwait', 'EXPORT', NULL, '2021-06-22', NULL, 'NSM', 'Internals & Packing', NULL, NULL, 'Talal Alburaias', 'talalmh74@hotmail.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-06-28 15:54:27', '2021-11-08 10:53:50', NULL, NULL),
(48, 'QRN-6334', NULL, 'Energy Works Technology Limited', 'Nigeria', 'EXPORT', NULL, '2021-06-14', NULL, 'NB', 'Tanks', NULL, NULL, 'Chinelo Anisiobi', 'c.anisiobi@energyworkstechnology.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-06-28 15:55:28', '2021-11-08 10:53:50', NULL, NULL),
(49, 'QRN-6335', NULL, 'Privi Speciality Chemical Ltd', 'Mahad', 'MH', NULL, '2021-05-26', '2021-06-23', 'PS', 'Acetic Acid Recovery System', '100000000', NULL, 'Uttam kumar Sinha', 'uttam.sinha@privi.co.in', '9930262733', 1, NULL, NULL, NULL, NULL, '2021-06-28 15:57:09', '2021-11-08 10:53:50', NULL, NULL),
(50, 'QRN-6336', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-22', NULL, 'KVB', 'Column, HE and Vessel', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-06-29 16:33:26', '2021-11-08 10:53:50', NULL, NULL),
(51, 'QRN-6337', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-22', NULL, 'KVB', 'Heat Exchangers', '1588000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-06-29 16:34:39', '2021-11-08 10:53:50', NULL, NULL),
(52, 'QRN-6338', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-22', '2021-07-06', 'KVB', 'Column', '12970000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-06-29 16:35:22', '2021-11-08 10:53:50', NULL, NULL),
(53, 'QRN-6339', NULL, 'Eternis fine chemicals', 'Pune', 'MH', NULL, '2021-06-21', '2021-06-24', 'PHD', 'Random Packing', NULL, NULL, 'Mr. sulay shaha', 'sulay.shah@eternis.com', '8412009933', 1, NULL, NULL, NULL, NULL, '2021-06-29 16:36:31', '2021-11-08 10:53:50', NULL, NULL),
(54, 'QRN-6340', NULL, 'AF Engineering', 'Japan', 'EXPORT', NULL, '2021-06-04', NULL, 'PHD', 'Random Packing', NULL, NULL, 'Kazuo Watari', 'watari@afengineering.jp', NULL, 1, NULL, NULL, NULL, NULL, '2021-06-29 16:46:09', '2021-11-08 10:53:50', NULL, NULL),
(55, 'QRN-6341', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-25', NULL, 'PS', 'Vessel', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-06-29 16:46:56', '2021-11-08 10:53:50', NULL, NULL),
(56, 'QRN-6342', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-25', NULL, 'PS', 'Vessel 2 Nos.', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-06-29 16:47:36', '2021-11-08 10:53:50', NULL, NULL),
(57, 'QRN-6343', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-25', NULL, 'PS', 'Heat Exchanger', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-06-29 16:48:21', '2021-11-08 10:53:50', NULL, NULL),
(58, 'QRN-6344', NULL, 'Simtech Separation Technologies', 'Pune', 'MH', NULL, '2021-06-27', NULL, 'PHD', 'Lab Packing', NULL, NULL, 'Jitendra Nivargi', NULL, '9371275504', 1, NULL, NULL, NULL, NULL, '2021-06-29 16:49:50', '2021-11-08 10:53:50', NULL, NULL),
(59, 'QRN-6345', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-24', '2021-06-28', 'PS', 'Reflux Dryer', '790000', 'ORDER', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-06-29 16:52:42', '2021-11-08 10:53:50', NULL, NULL),
(60, 'QRN-6346', NULL, 'Gujarat Fluorochemicals Limited', 'Dahej', 'WEST', NULL, '2021-06-28', NULL, 'PHD', 'Structured packing and internals', NULL, NULL, 'H.R.Patel', 'hrpatel@gfl.co.in', '9925090560', 1, NULL, NULL, NULL, NULL, '2021-06-29 16:54:51', '2021-11-08 10:53:50', NULL, NULL),
(61, 'QRN-6347', NULL, 'D Technology Pvt Ltd', 'Pune', 'MH', NULL, '2021-06-25', NULL, 'NB', 'Mixing Package', NULL, NULL, 'Atul Chavan', 'atul.chavan@dtechnology.ooo', '7506942061', 1, NULL, NULL, NULL, NULL, '2021-06-29 16:57:42', '2021-11-08 10:53:50', NULL, NULL),
(62, 'QRN-6348', NULL, 'Global Turnaround Services Company', 'Pune', 'MH', NULL, '2021-06-29', NULL, 'PHD', 'Structure packing', NULL, NULL, 'Siddharth Daware', 'info.gtascompany@gmail.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-06-29 16:59:29', '2021-11-08 10:53:50', NULL, NULL),
(63, 'QRN-6349', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-29', NULL, 'PS', 'Vessel', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-06-29 17:01:08', '2021-11-08 10:53:50', NULL, NULL),
(64, 'QRN-6350', NULL, 'Poly Chem Fabricators', 'Thane', 'MH', NULL, '2021-06-24', NULL, 'YS', 'Agitator', NULL, NULL, 'Vaibhavi Kokate', 'vaibhavi@polychemfab.com', '8369700242', 1, NULL, NULL, NULL, NULL, '2021-06-29 17:02:44', '2021-11-08 10:53:50', NULL, NULL),
(65, 'QRN-6351', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-22', '1970-01-01', 'PHD', 'Structured Packing', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-06-30 11:49:34', '2021-11-08 10:53:50', NULL, NULL),
(66, 'QRN-6352', NULL, 'Gabriel India Ltd', 'Nashik', 'MH', NULL, '2021-06-28', '2021-06-30', 'SSK', 'MEE and ATFD', '5430000', NULL, 'Mr.Sudam Pawar', 'sudam.pawar@gabriel.co.in', NULL, 1, NULL, NULL, NULL, NULL, '2021-07-03 15:10:39', '2021-11-08 10:53:50', NULL, NULL),
(67, 'QRN-6353', NULL, 'Eternis Fine Chemical Ltd', 'Pune', 'MH', NULL, '2021-06-30', '2021-07-01', 'PHD', 'Wire Mesh Packing', '300000', NULL, 'Mr. sulay shaha', 'sulay.shah@eternis.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-07-03 15:11:45', '2021-11-08 10:53:50', NULL, NULL),
(68, 'QRN-6354', NULL, 'Peri Nitrates Pvt Ltd', 'Kurkumbh', 'MH', NULL, '2021-06-28', '2021-07-01', 'YS', 'WFE', '4900000', NULL, 'T. V Sarma', 'perinitrates@yahoo.co.in', '8830687251', 1, NULL, NULL, NULL, NULL, '2021-07-03 15:13:02', '2021-11-08 10:53:50', NULL, NULL),
(69, 'QRN-6354', NULL, 'Peri Nitrates Pvt Ltd', 'Kurkumbh', 'MH', NULL, '2021-06-28', '2021-07-01', 'YS', 'WFE', '4900000', NULL, 'T. V Sarma', 'perinitrates@yahoo.co.in', '8830687251', 1, NULL, NULL, NULL, NULL, '2021-07-03 15:13:09', '2021-11-08 10:53:50', NULL, NULL),
(70, 'QRN-6355', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-01', '2021-07-03', 'PHD', 'Random Packing', '330000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-07-03 15:16:23', '2021-11-08 10:53:50', NULL, NULL),
(71, 'QRN-6356', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-01', '2021-07-01', 'PS', 'Heat exchanger and vessels', '2654000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-07-03 15:17:50', '2021-11-08 10:53:50', NULL, NULL),
(72, 'QRN-6357', NULL, 'Enpro Industries Pvt Ltd', 'Pimpri', 'MH', NULL, '2021-06-30', '2021-07-05', 'PMD', 'Condensate Pot', '2260000', NULL, 'Rashmi Bhosale', 'rashmi.bhosale@enproindia.com', '9673005236', 1, NULL, NULL, NULL, NULL, '2021-07-03 15:33:34', '2021-11-08 10:53:50', NULL, NULL),
(73, 'QRN-6358', NULL, 'Arvind Envisol Pvt Ltd', 'Ahmedabad', 'WEST', NULL, '2021-06-30', '2021-07-02', 'YS', 'Static Mixer', '805000', NULL, 'Jitendra Nagar', 'jitendra.nagar@arvind.in', '9833069488', 1, NULL, NULL, NULL, NULL, '2021-07-03 15:38:47', '2021-11-08 10:53:50', NULL, NULL),
(74, 'QRN-6359', NULL, 'Balaji Amines', 'Solapur', 'MH', NULL, '2021-07-02', NULL, 'PHD', 'Demister', NULL, NULL, 'Mr.  Laxman V. Limkar', NULL, '9623444386', 1, NULL, NULL, NULL, NULL, '2021-07-03 15:42:27', '2021-11-08 10:53:50', NULL, NULL),
(75, 'QRN-6360', NULL, 'Orlin Stefanov', 'Turkey', 'EXPORT', NULL, '2021-06-30', '2021-07-02', 'MJP', 'Wiped Film Evaporator', '2920000', NULL, 'Orlin Stefanov', 'orlin.stefonov59@gmail.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-07-03 15:45:56', '2021-11-08 10:53:50', NULL, NULL),
(76, 'QRN-6361', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-28', NULL, 'KVB', 'Scrubber Package', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-07-03 15:49:38', '2021-11-08 10:53:50', NULL, NULL),
(77, 'QRN-6362', NULL, 'Neilsoft Ltd', 'Pune', 'MH', NULL, '2021-07-01', NULL, 'PMD', 'CIP tank', NULL, NULL, 'Tushar Gaikwad', 'nbrprocurement@neilsoft.com', '9975753145', 1, NULL, NULL, NULL, NULL, '2021-07-03 15:51:07', '2021-11-08 10:53:50', NULL, NULL),
(78, 'QRN-6363', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'MH', NULL, '2021-07-01', NULL, 'PS', 'Vessels', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-07-03 15:51:50', '2021-11-08 10:53:50', NULL, NULL),
(79, 'QRN-6364', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-03', NULL, 'PS', 'Heat Exchanger', '4400000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-07-03 15:52:36', '2021-11-08 10:53:50', NULL, NULL),
(80, 'QRN-6365', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-03', NULL, 'PS', 'Heat Exchanger', NULL, NULL, 'Dipanshi Singh', 'dipanshi.singh@gfl.co.in', '8318422636', 1, NULL, NULL, NULL, NULL, '2021-07-03 15:53:32', '2021-11-08 10:53:50', NULL, NULL),
(81, 'QRN-6366', NULL, 'SRF Limited', 'Gurugram', 'NORTH', NULL, '2021-06-29', '2021-07-03', 'PHD', 'Structured packing and internals', '5030000', NULL, 'Abhishek Girdhar', 'Abhishek.Girdhar1@srf.com', '9311661548', 1, NULL, NULL, NULL, NULL, '2021-07-05 10:55:41', '2021-11-08 10:53:50', NULL, NULL),
(82, 'QRN-6367', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-03', '2021-06-05', 'KVB', 'Heat Exchanger', '1110000', 'LOST', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-07-15 15:03:52', '2021-11-08 10:53:50', NULL, NULL),
(83, 'QRN-6367', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-03', '2021-06-05', 'KVB', 'Heat Exchanger', '1110000', 'LOST', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-07-15 15:03:57', '2021-11-08 10:53:50', NULL, NULL),
(84, 'QRN-6368', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-05', '2021-07-05', 'KVB', 'Hairpin Type Heat Exchanger', '200000', 'LOST', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-07-15 15:10:12', '2021-11-08 10:53:50', NULL, NULL),
(85, 'QRN-6369', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-05', NULL, 'PS', 'CANCEL QRN', NULL, NULL, 'Pankaj Karnatak', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-07-15 15:11:31', '2021-11-08 10:53:50', NULL, NULL),
(86, 'QRN-6370', NULL, 'AF Engineering', 'Japan', 'EXPORT', NULL, '2021-07-02', NULL, 'NSM', 'Tarys', NULL, NULL, 'Kazuo', 'watari@afengineering.jp', NULL, 1, NULL, NULL, NULL, NULL, '2021-07-15 15:14:33', '2021-11-08 10:53:50', NULL, NULL),
(87, 'QRN-6371', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-09', '2021-07-12', 'KVB', 'IPA Water Distillation Column', '3000000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-07-22 11:17:04', '2021-11-08 10:53:50', NULL, NULL),
(88, 'QRN-6372', NULL, 'Oriental Aromatics', 'Bareilly', 'NORTH', NULL, '2021-06-30', '2021-07-07', 'NB', 'Heat Exchanger', '345000', NULL, 'Nikita Sawant', 'purchase_engg@orientalaromatics.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-07-22 11:20:40', '2021-11-08 10:53:50', NULL, NULL),
(89, 'QRN-6373', NULL, 'Peri Nitrates Pvt Ltd', 'Kurkumbh', 'MH', NULL, '2021-07-07', '2021-07-07', 'YS', 'Static Mixer', '152500', NULL, 'T. V Sarma', 'perinitrates@yahoo.co.in', '8830687251', 1, NULL, NULL, NULL, NULL, '2021-07-22 11:25:26', '2021-11-08 10:53:50', NULL, NULL),
(90, 'QRN-6374', NULL, 'Vidyan Biocommerce Pvt Ltd', 'Navi Mumbai', 'MH', NULL, '2021-07-06', '2021-07-07', 'PMD', 'Condensate Tank', '375000', 'WARM', 'Payal Niswade', 'payal.niswade@vidyanbio.com', '7620646275', 1, NULL, NULL, NULL, NULL, '2021-07-22 11:40:22', '2021-11-08 10:53:50', NULL, NULL),
(91, 'QRN-6375', NULL, 'Raks Pharma', 'Dahej', 'WEST', NULL, '2021-07-06', '2021-07-08', 'PMD', 'Solvent Recovery System', '9850000', 'BUDGETARY', 'Mr. Tapas', 'production@rakspharma.in', NULL, 1, NULL, NULL, NULL, NULL, '2021-07-22 11:44:28', '2021-11-08 10:53:50', NULL, NULL),
(92, 'QRN-6376', NULL, 'Cadila Pharmaceuticals Ltd', 'Ankleshwar', 'WEST', NULL, '2021-07-08', '2021-07-09', 'PHD', 'Structured Packing', '356000', NULL, 'Faizanul Haque', 'faizanul.haque@cadilapharma.co.in', '8583921039', 1, NULL, NULL, NULL, NULL, '2021-07-22 11:57:24', '2021-11-08 10:53:50', NULL, NULL),
(93, 'QRN-6377', NULL, 'Arslan Engineering Ltd', 'Mumbai', 'MH', NULL, '2021-06-29', '2021-07-12', 'YS', 'ATFE & WFE', '5250000', NULL, 'Malik', 'malik@arslanenginery.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-07-22 11:59:47', '2021-11-08 10:53:50', NULL, NULL),
(94, 'QRN-6378', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-12', '2021-07-12', 'NSM', 'Packing and Internals', '660000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', 1, NULL, NULL, NULL, NULL, '2021-07-23 14:56:39', '2021-11-08 10:53:50', NULL, NULL),
(95, 'QRN-6379', NULL, 'Chemion Engineering', 'Pune', 'MH', NULL, '2021-07-05', '2021-07-12', 'YS', 'Static Mixer', '123750', NULL, 'V M Gopalakrishnan', 'support@chemionengg.com', '9923751310', 1, NULL, NULL, NULL, NULL, '2021-07-23 14:59:22', '2021-11-08 10:53:50', NULL, NULL),
(96, 'QRN-6380', NULL, 'Syed Zaheer Ahmed', 'Hyderabad', 'SOUTH', NULL, '2021-01-07', '2021-07-12', 'PMD', 'Steam Distillation', '3300000', 'BUDGETARY', 'Syed Zaheer Ahmed', 'zaheer77@gmail.com', '8310337856', 1, NULL, NULL, NULL, NULL, '2021-07-23 15:01:39', '2021-11-08 10:53:50', NULL, NULL),
(97, 'QRN-6381', NULL, 'Air Science Technologies', 'Faridabad', 'NORTH', NULL, '2021-07-12', '2021-07-14', 'PMD', 'Piping Material', '1060000', 'WARM', 'Harish Sharma', 'hsharma@airscience.net', '8287491124', 1, NULL, NULL, NULL, NULL, '2021-07-23 15:11:49', '2021-11-08 10:53:50', NULL, NULL),
(98, 'QRN-6382', NULL, 'Air Science Technologies', 'Faridabad', 'NORTH', NULL, '2021-06-24', '2021-07-14', 'PMD', 'Filter housings', '1780000', NULL, 'Harish Sharma', 'hsharma@airscience.net', '8287491124', 1, NULL, NULL, NULL, NULL, '2021-07-23 15:16:33', '2021-11-08 10:53:50', NULL, NULL),
(99, 'QRN-6383', NULL, 'Gujarat Fluorochemicals Limited', 'Jolva', 'WEST', NULL, '2021-07-09', '2021-07-17', 'KVB', 'HF & OFF-GAS Scrubber', '68530000', 'WARM', 'Ravindra kumar', 'ravindra.kumar@gfl.co.in', '8287833334', 1, NULL, NULL, NULL, NULL, '2021-07-23 15:22:35', '2021-11-08 10:53:50', NULL, NULL),
(100, 'QRN-6384', NULL, 'Saudi Multichem', 'Saudi Arabia', 'EXPORT', NULL, '2021-07-23', NULL, 'MJP', 'MEG Distillation System Supply', NULL, 'BUDGETARY', 'Sahir Honda', 'sahir.honda@saudi-multichem.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-07-26 11:16:55', '2021-11-08 10:53:50', NULL, NULL),
(101, 'QRN-6385', NULL, 'ENPRO Industries Pvt Ltd', 'Pune', 'MH', NULL, '2021-07-08', NULL, 'NB', '2 Phase Separator', NULL, 'BUDGETARY', 'Umair Haidey', 'umair.haidery@enproindia.com', '9372513244', 1, NULL, NULL, NULL, NULL, '2021-07-26 11:19:45', '2021-11-08 10:53:50', NULL, NULL),
(102, 'QRN-6386', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-07-13', '2021-07-15', 'NSM', 'Tray', '4465000', NULL, 'Sharad Kadam', 'Sharad.Kadam@laxmi.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-07-26 11:22:55', '2021-11-08 10:53:50', NULL, NULL),
(103, 'QRN-6387', NULL, 'Benzo Chem Industries Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-07-14', NULL, 'PHD', 'Random Packing Internals', NULL, NULL, 'Shrimant Kembhavi', 'purchasedahej@benzochem.co.in', '7021857761', 1, NULL, NULL, NULL, NULL, '2021-07-26 11:30:42', '2021-11-08 10:53:50', NULL, NULL),
(104, 'QRN-6388', NULL, 'Matrix Fine Science Pvt Ltd', 'Aurangabad', 'MH', NULL, '2021-07-14', '2021-07-16', 'YS', 'Column, Vessel, ATFE & FFE', '19420000', 'WARM', 'Kalim Inamdar', 'kalim@matrixfinesciences.com', '7767812182', 1, NULL, NULL, NULL, NULL, '2021-07-26 11:37:47', '2021-11-08 10:53:50', NULL, NULL),
(105, 'QRN-6389', NULL, 'Triplan  India Pvt Ltd', 'Pune', 'MH', NULL, '2021-06-29', NULL, 'PS', 'Distillation System', NULL, NULL, 'Sudeep Gaikwad', 'sudeep.gaikwad@triplan.com', '9004394338', 1, NULL, NULL, NULL, NULL, '2021-07-26 12:00:12', '2021-11-08 10:53:50', NULL, NULL),
(106, 'QRN-6390', NULL, 'Eternis Fine Chemicals', 'Kurkumbh', 'MH', NULL, '2021-07-14', NULL, 'NSM', 'Structured Packing', NULL, NULL, 'Sulay Shah', 'sulay.shah@eternis.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-07-26 15:39:49', '2021-11-08 10:53:50', NULL, NULL),
(107, 'QRN-6391', NULL, 'IPS Mehtalia Pvt Ltd', 'Dahej', 'WEST', NULL, '2021-07-07', '2021-07-15', 'PMD', 'Column', NULL, 'BUDGETARY', 'Anil Sharma', 'anils@ips-mehtalia.com', '9819577916', 1, NULL, NULL, NULL, NULL, '2021-07-26 15:45:48', '2021-11-08 10:53:50', NULL, NULL),
(108, 'QRN-6392', NULL, 'Corel Pharma Chem India Pvt Ltd', 'Ahmedabad', 'WEST', NULL, '2021-07-15', '2021-07-16', 'NB', 'Tank (150 KL)', '48300000', 'BUDGETARY', 'Piyush Patel', 'purchase@corelpharmachem.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-07-26 15:48:39', '2021-11-08 10:53:50', NULL, NULL),
(109, 'QRN-6393', NULL, 'Carbon Technolgy', 'Bengaluru', 'SOUTH', NULL, '2021-07-20', NULL, 'NSM', 'Packing', NULL, NULL, 'Shihabudeen.j', 'shihabjamal1@yahoo.com', '9637841060', 1, NULL, NULL, NULL, NULL, '2021-07-26 15:51:07', '2021-11-08 10:53:50', NULL, NULL),
(110, 'QRN-6394', NULL, 'Vinati Organics Ltd', 'Ratnagiri', 'MH', NULL, '2021-07-15', '2021-07-19', 'NB', 'Distillation Column', '1982000', 'BUDGETARY', 'Tukaram Desai', 'tukaram.desai@vinatiorganics.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-07-26 15:52:40', '2021-11-08 10:53:50', NULL, NULL),
(111, 'QRN-6395', NULL, 'Emerson', 'Pune', 'MH', NULL, '2021-07-15', '1970-01-01', 'NSM', 'Demister', NULL, NULL, 'Mani.N', 'Manikandan.N@emerson.com', '9345770854', 1, NULL, NULL, NULL, NULL, '2021-07-30 14:37:51', '2021-11-08 10:53:50', NULL, NULL),
(112, 'QRN-6396', NULL, 'Green Energy', 'Export', 'EXPORT', NULL, '2021-07-18', NULL, 'YS', 'Agitator', NULL, NULL, '.', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-08-12 15:52:24', '2021-11-08 10:53:50', NULL, NULL),
(113, 'QRN-6396', NULL, 'Green Energy', 'Export', 'EXPORT', NULL, '2021-07-18', NULL, 'YS', 'Agitator', NULL, NULL, '.', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-08-12 15:52:26', '2021-11-08 10:53:50', NULL, NULL),
(114, 'QRN-6397', NULL, 'Charms Chem Private Limited', 'Pune', 'MH', NULL, '2021-07-19', '2021-07-20', 'SSK', 'Supply of Matching flange', '11000', NULL, 'Mr. Milind Honavar', 'milindhonavar@gmail.com', '9890247473', 1, NULL, NULL, NULL, NULL, '2021-08-12 15:54:24', '2021-11-08 10:53:50', NULL, NULL),
(115, 'QRN-6398', NULL, 'Mass Transfer Products', 'Mumbai', 'MH', NULL, '2021-07-19', NULL, 'NSM', 'Vane Packs', NULL, NULL, 'Vishal Jadhav', 'vjadhav@mtpi.net.in', '8108613237', 1, NULL, NULL, NULL, NULL, '2021-08-12 15:55:35', '2021-11-08 10:53:50', NULL, NULL),
(116, 'QRN-6399', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-10', '2021-07-22', 'KVB', 'IPA Water Distilllation System', '22750000', 'WARM', 'Amey  Deshpande', 'amey.deshpande@gfl.co.in', '7700986610', 1, NULL, NULL, NULL, NULL, '2021-08-12 15:56:56', '2021-11-08 10:53:50', NULL, NULL),
(117, 'QRN-6400', NULL, 'Wel Head Equipment Engineers', 'Vadodara', 'WEST', NULL, '2021-07-21', NULL, 'PHD', '2 Phase Seperator', NULL, NULL, 'Kumar Abhishek', 'kumar.a@wellheadequipmentengineers.com', '7903457563', 1, NULL, NULL, NULL, NULL, '2021-08-12 15:58:14', '2021-11-08 10:53:50', NULL, NULL),
(118, 'QRN-6401', NULL, 'RESOLVERS', 'NA', 'MH', NULL, '2021-07-19', '2021-07-23', 'PHD', 'Demister Pad', '380000', NULL, 'Ajay M N', 'designexpert99@outlook.com', '7980707917', 1, NULL, NULL, NULL, NULL, '2021-09-27 15:51:42', '2021-11-08 10:53:50', NULL, NULL),
(119, 'QRN-6402', NULL, 'Polychem Fabricator', 'Mumbai', 'MH', NULL, '2021-07-20', '2021-07-20', 'YS', 'MS Tank', '310000', 'WARM', 'Mangesh Kene', 'mangesh@polychemfab.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-27 15:53:06', '2021-11-08 10:53:50', NULL, NULL),
(120, 'QRN-6403', NULL, 'WS Engineering & Fabrication Pte Ltd', 'NA', 'EXPORT', NULL, '2021-07-20', NULL, 'NSM', 'NA', NULL, NULL, 'Elaimuthu Mahesh Kumar', 'mahesh.kumar@wascoenergy.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-27 15:54:10', '2021-11-08 10:53:50', NULL, NULL),
(121, 'QRN-6404', NULL, 'Arobindo Phrama Ltd', 'Cyberabad', 'NORTH', NULL, '2021-06-28', '2021-07-28', 'MN', 'Glacial Acetic Acid Plant', '140000000', 'WARM', 'V.P Singh', 'pulsingh.vadithe@aurobindo.com', '9989253444', 1, NULL, NULL, NULL, NULL, '2021-09-27 15:56:25', '2021-11-08 10:53:50', NULL, NULL),
(122, 'QRN-6405', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnager', 'WEST', NULL, '2021-07-21', '2021-07-27', 'KVB', 'Hopper', '7120000', NULL, 'Abhijeet Gupta', 'abhijeet.gupta@gfl.co.in', '8950847698', 1, NULL, NULL, NULL, NULL, '2021-09-27 15:57:54', '2021-11-08 10:53:50', NULL, NULL),
(123, 'QRN-6406', NULL, 'Jacobs', 'Mumbai', 'MH', NULL, '2021-07-22', '2021-07-23', 'PMD', 'Heat Exchanger', '1415000', 'BUDGETARY', 'Aniket More', 'aniket.more1@jacobs.com', '8424015715', 1, NULL, NULL, NULL, NULL, '2021-09-27 16:10:59', '2021-11-08 10:53:50', NULL, NULL),
(124, 'QRN-6407', NULL, 'Anthem Bioscience', 'Bangalore', 'SOUTH', NULL, '2021-07-23', NULL, 'MJP', 'Heat Exchanger', NULL, NULL, 'Venkadesh D', 'venkadesh.d@anthembio.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-27 16:12:17', '2021-11-08 10:53:50', NULL, NULL),
(125, 'QRN-6408', NULL, 'Aarti Industries Ltd', 'Vadodara', 'WEST', NULL, '2021-07-26', NULL, 'NSM', 'Column Internal', NULL, NULL, 'Deep Desai', 'deep.desai@aarti-industries.com', '9687338907', 1, NULL, NULL, NULL, NULL, '2021-09-27 16:28:31', '2021-11-08 10:53:50', NULL, NULL),
(126, 'QRN-6409', NULL, 'Vitech Equipments Pvt Ltd', 'Navi Mumbai', 'MH', NULL, '2021-07-27', '2021-07-29', 'PHD', 'Internals', '140000', 'BUDGETARY', 'Ryan Fernandes', 'ryan@vitechgroupindia.com', '9372766460', 1, NULL, NULL, NULL, NULL, '2021-09-27 17:03:34', '2021-11-08 10:53:50', NULL, NULL),
(127, 'QRN-6409', NULL, 'Vitech Equipments Pvt Ltd', 'Navi Mumbai', 'MH', NULL, '2021-07-27', '2021-07-29', 'PHD', 'Internals', '140000', 'BUDGETARY', 'Ryan Fernandes', 'ryan@vitechgroupindia.com', '9372766460', 1, NULL, NULL, NULL, NULL, '2021-09-27 17:03:35', '2021-11-08 10:53:50', NULL, NULL),
(128, 'QRN-6410', NULL, 'Tandon Solvents and Chemicals', 'New Delhi', 'NORTH', NULL, '2021-07-02', '2021-07-28', 'PMD', 'Glycol Recovery System', '42520000', 'BUDGETARY', 'Mr. Aarush Tandon', 'aarush@tandongroup.in', '9911373888', 1, NULL, NULL, NULL, NULL, '2021-09-27 17:05:32', '2021-11-08 10:53:50', NULL, NULL),
(129, 'QRN-6411', NULL, 'Matrix Fine Science Pvt Ltd', 'Aurangabad', 'MH', NULL, '2021-07-26', '2021-07-28', 'YS', 'Condenser', '3493000', NULL, 'Kalim Inamdar', 'kalim@matrixfinesciences.com', '7767812182', 1, NULL, NULL, NULL, NULL, '2021-09-27 17:07:26', '2021-11-08 10:53:50', NULL, NULL),
(130, 'QRN-6412', NULL, 'Chemdist Membrane System', 'Pune', 'MH', NULL, '2021-07-21', NULL, 'SSK', '6M2 WFE', '1600000', NULL, 'NA', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-09-27 17:09:47', '2021-11-08 10:53:50', NULL, NULL),
(131, 'QRN-6413', NULL, 'Wel Head Equipment Engineers', 'Vadodara', 'WEST', NULL, '2021-07-21', NULL, 'NSM', '3 Phase Seperator', NULL, NULL, 'Kumar Abhishek', 'kumar.a@wellheadequipmentengineers.com', '7903457563', 1, NULL, NULL, NULL, NULL, '2021-09-27 17:14:14', '2021-11-08 10:53:50', NULL, NULL),
(132, 'QRN-6414', NULL, 'Willowood Industries Pvt. Ltd', 'Dahej', 'WEST', NULL, '2021-07-27', '2021-07-30', 'NB', 'Tank', '8020000', NULL, 'Amrut Chauhan', 'amrutchauhan@willowood.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 10:46:08', '2021-11-08 10:53:50', NULL, NULL),
(133, 'QRN-6415', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnager', 'WEST', NULL, '2021-07-29', '2021-07-30', 'PHD', 'Distributor', '25000', 'BUDGETARY', 'Sumit Patil', 'sumit.patil@gfl.co.in', '9023732327', 1, NULL, NULL, NULL, NULL, '2021-09-28 10:49:44', '2021-11-08 10:53:50', NULL, NULL),
(134, 'QRN-6416', NULL, 'Mott Macdonald', 'Mumbai', 'MH', NULL, '2021-07-30', '2021-08-06', 'NB', 'Reactor', '8020000', 'WARM', 'Mr. Parag Gandhi', 'parag.gandhi@mottmac.com', '9819017191', 1, NULL, NULL, NULL, NULL, '2021-09-28 10:51:02', '2021-11-08 10:53:50', NULL, NULL),
(135, 'QRN-6417', NULL, 'Pragya life science', 'Mumbai', 'MH', NULL, '2021-07-30', '2021-07-31', 'PS', 'PTFE Strutured Packing', '3425000', 'WARM', 'Dipak Kumar Patel', 'dipak.sp@gmail.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 10:52:25', '2021-11-08 10:53:50', NULL, NULL),
(136, 'QRN-6418', NULL, 'Funke Heatex Engineering India Pvt Ltd.', 'Surat', 'WEST', NULL, '2021-07-29', '2021-08-11', 'YS', 'Agitators', '2990000', NULL, 'Pratik Modi', 'sales@funkeheatex.com', '7046062270', 1, NULL, NULL, NULL, NULL, '2021-09-28 10:58:49', '2021-11-08 10:53:50', NULL, NULL),
(137, 'QRN-6419', NULL, 'Spectec Techno Projects Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-07-30', '2021-08-12', 'PHD', 'Strutured Packing', '486000', 'ORDER', 'Ms. Tejal', 'purchasespectec@gmail.com', '8929632125', 1, NULL, NULL, NULL, NULL, '2021-09-28 11:04:37', '2021-11-08 10:53:50', NULL, NULL),
(138, 'QRN-6420', NULL, 'Kumar Metal Industries Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-08-02', '2021-08-13', 'PHD', 'Strutured Packing', '785000', 'BUDGETARY', 'Yatin Jayawant', 'yatin@kumarmetal.com', '9769773527', 1, NULL, NULL, NULL, NULL, '2021-09-28 11:06:51', '2021-11-08 10:53:50', NULL, NULL),
(139, 'QRN-6421', NULL, 'Sandeep industries', 'Mumbai', 'MH', NULL, '2021-08-02', NULL, 'NSM', 'Packing Internals', NULL, NULL, 'Sandeep Mody', 'sandeep_mody@yahoo.co.in', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 11:12:20', '2021-11-08 10:53:50', NULL, NULL),
(140, 'QRN-6422', NULL, 'PEMAC Projects Pvt Ltd', 'Navi Mumbai', 'MH', NULL, '2021-08-02', '2021-08-06', 'PHD', 'Structured Packing and Internals', '337000', 'BUDGETARY', 'Mr. Vikram Daur', 'purchase.pemac@gmail.com', '7045341212', 1, NULL, NULL, NULL, NULL, '2021-09-28 11:14:00', '2021-11-08 10:53:50', NULL, NULL),
(141, 'QRN-6423', NULL, 'Kedia Carbon Private Limited', 'Odisha', 'WEST', NULL, '2021-08-03', '2021-08-03', 'PHD', 'Structured Packing and Internals', '3310000', NULL, 'Tanmay Kumar', 'acpl.tanmoy@gmail.com', '8319853644', 1, NULL, NULL, NULL, NULL, '2021-09-28 11:17:32', '2021-11-08 10:53:50', NULL, NULL),
(142, 'QRN-6424', NULL, 'Air Science Technologies', 'Faridabad', 'NORTH', NULL, '2021-07-23', NULL, 'PMD', 'Flare Column', NULL, NULL, 'Harish Sharma', 'hsharma@airscience.net', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 11:19:26', '2021-11-08 10:53:50', NULL, NULL),
(143, 'QRN-6425', NULL, 'Synergie Ingredient', 'Bangalore', 'SOUTH', NULL, '2021-08-03', '2021-08-04', 'PHD', 'Structured Packing and Internals', '100000', NULL, 'Ram Prasad', 'ramprasad@synergieingredients.com', '7019465042', 1, NULL, NULL, NULL, NULL, '2021-09-28 11:21:43', '2021-11-08 10:53:50', NULL, NULL),
(144, 'QRN-6426', NULL, 'Jacobs', 'Mumbai', 'MH', NULL, '2021-08-03', '2021-08-10', 'PMD', 'Heat Exchangers', '6667000', 'BUDGETARY', 'Aniket More', 'aniket.more1@jacobs.com', '8424015715', 1, NULL, NULL, NULL, NULL, '2021-09-28 11:24:13', '2021-11-08 10:53:50', NULL, NULL),
(145, 'QRN-6427', NULL, 'Sudarshan Chemicals', 'Roha', 'MH', NULL, '2021-07-31', '2021-08-03', 'PS', 'Batch Distillation System', '840000', 'LOST', 'Ganesh Bhoj', 'gmbhoj@sudarshan.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 11:45:06', '2021-11-08 10:53:50', NULL, NULL),
(146, 'QRN-6428', NULL, 'HAT-11378/001', 'UK', 'EXPORT', NULL, '2021-08-06', '2021-08-11', 'PHD', 'Structured Packing', '221000', NULL, 'Daniel Matthews', 'daniel@hatltd.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 11:46:24', '2021-11-08 10:53:50', NULL, NULL),
(147, 'QRN-6429', NULL, 'Air Science Technologies', 'Faridabad', 'NORTH', NULL, '2021-08-06', '2021-08-10', 'NSM', 'Demister Pad', '60000', 'ORDER', 'Harish Sharma', 'hsharma@airscience.net', '8287491124', 1, NULL, NULL, NULL, NULL, '2021-09-28 11:53:15', '2021-11-08 10:53:50', NULL, NULL),
(148, 'QRN-6430', NULL, 'Mott Macdonald', 'Mumbai', 'MH', NULL, '2021-07-27', '2021-08-09', 'PMD', 'Distillation Columns', NULL, 'BUDGETARY', 'Parag Gandhi', 'parag.gandhi@mottmac.com', '9819017191', 1, NULL, NULL, NULL, NULL, '2021-09-28 11:54:41', '2021-11-08 10:53:50', NULL, NULL),
(149, 'QRN-6431', NULL, 'Tatva Chintan Pharma Chem Pvt Ltd', 'Dahej', 'WEST', NULL, '2021-07-31', '2021-08-09', 'YS', 'Solvent Recovery System with Reboiler', '20490000', NULL, 'Mr. Piyushbhi ( Technical )  / Mr. Rakesh', 'projects@tatvachintan.com', '7573046258', 1, NULL, NULL, NULL, NULL, '2021-09-28 11:56:32', '2021-11-08 10:53:50', NULL, NULL),
(150, 'QRN-6432', NULL, 'Balaji Amines Limited', 'Secunderabad', 'SOUTH', NULL, '2021-08-07', '2021-08-11', 'PHD', 'Static Mixer', '150000', 'ORDER', 'LN Mohanty', 'projects@balajiamines.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 12:09:24', '2021-11-08 10:53:50', NULL, NULL),
(151, 'QRN-6433', NULL, 'Emcure  Pharmaceutical  Ltd', 'Kurkumbh', 'MH', NULL, '2021-08-06', NULL, 'NSM', 'Packed column and condenser', NULL, NULL, 'Gahineenath', 'Anand.Kulkarni@emcure.co.in', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 12:25:35', '2021-11-08 10:53:50', NULL, NULL),
(152, 'QRN-6434', NULL, 'WOG Technologies Pvt Ltd', 'Gurgoan', 'NORTH', NULL, '2021-08-07', '2021-08-07', 'MJP', 'Static Mixer', '45000', NULL, 'Nitin Patni', 'procurement@woggroup.com', '8178014220', 1, NULL, NULL, NULL, NULL, '2021-09-28 12:28:02', '2021-11-08 10:53:50', NULL, NULL),
(153, 'QRN-6435', NULL, 'Polyplast Chemi Plant Pvt Ltd', 'Vadodara', 'WEST', NULL, '2021-08-06', NULL, 'PS', 'Reactor', NULL, NULL, 'Ashiwin Antiya', NULL, '9322588085', 1, NULL, NULL, NULL, NULL, '2021-09-28 12:32:15', '2021-11-08 10:53:50', NULL, NULL),
(154, 'QRN-6436', NULL, 'Emcure  Pharmaceutical  Ltd', 'Mumbai', 'MH', NULL, '2021-08-07', NULL, 'NB', 'Column, HE and Packing', NULL, NULL, 'Anand Kulkarni', 'anand.kulkarni@emcure.co.in', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 12:35:13', '2021-11-08 10:53:50', NULL, NULL),
(155, 'QRN-6437', NULL, 'Delpro Equipments Pvt Ltd', 'Bhosari', 'MH', NULL, '2021-08-09', NULL, 'NSM', 'Mist Eliminator', NULL, NULL, 'Prashant Tiwari', 'purchase@delproequipments.com', '7620605757', 1, NULL, NULL, NULL, NULL, '2021-09-28 12:37:43', '2021-11-08 10:53:50', NULL, NULL),
(156, 'QRN-6438', NULL, 'Salasar Synthetics', 'New Delhi', 'NORTH', NULL, '2021-08-09', NULL, 'NSM', 'Structured Packing and Internals', NULL, NULL, 'Pramod Kr. Aryan', 'purchase.parnamigroup@gmail.com', '9643191019', 1, NULL, NULL, NULL, NULL, '2021-09-28 12:40:00', '2021-11-08 10:53:50', NULL, NULL),
(157, 'QRN-6439', NULL, 'Atul Ltd', 'Gujarat', 'WEST', NULL, '2021-08-16', '2021-08-16', 'PS', 'Ethanol Recovery System', '4600000', 'WARM', 'Rajiv Davda', 'rajiv_davda@atul.co.in', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 12:58:25', '2021-11-08 10:53:50', NULL, NULL),
(158, 'QRN-6440', NULL, 'Vertellus Specialty Materials (India) Private Limited', 'Vapi', 'WEST', NULL, '2021-08-13', NULL, 'YS', 'Static Mixer', NULL, NULL, 'Riki Patel', 'RPatel@Vertellus.com', '2536699959', 1, NULL, NULL, NULL, NULL, '2021-09-28 12:59:41', '2021-11-08 10:53:50', NULL, NULL),
(159, 'QRN-6441', NULL, 'Grasim Industries Limited', 'Bharuch', 'WEST', NULL, '2021-08-16', '2021-08-16', 'PHD', 'Static Mixer', '24000', 'ORDER', 'Nirav Mehta', 'nirav.mehta@adityabirla.com', '8347004636', 1, NULL, NULL, NULL, NULL, '2021-09-28 15:13:17', '2021-11-08 10:53:50', NULL, NULL),
(160, 'QRN-6442', NULL, 'John Bean Technologies India Private Limited', 'Pune', 'MH', NULL, '2021-09-08', NULL, 'KVB', 'Dish Ends', NULL, NULL, 'Vishal D. Wayal', 'vishal.wayal@jbtc.com', '9987212161', 1, NULL, NULL, NULL, NULL, '2021-09-28 15:14:59', '2021-11-08 10:53:50', NULL, NULL),
(161, 'QRN-6443', NULL, 'UPL Ltd', 'Dahej', 'WEST', NULL, '2021-08-13', NULL, 'NSM', 'Column Internals', NULL, NULL, 'Shobha Thakur', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 15:16:10', '2021-11-08 10:53:50', NULL, NULL),
(162, 'QRN-6444', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-08-14', '2021-08-20', 'NSM', '1000 Dia Tray with fittings', '1343000', NULL, 'Sharad Kadam', 'Sharad.Kadam@laxmi.com', '2067381200', 1, NULL, NULL, NULL, NULL, '2021-09-28 15:17:47', '2021-11-08 10:53:50', NULL, NULL),
(163, 'QRN-6445', NULL, 'Atul Ltd', 'Gujarat', 'WEST', NULL, '2021-09-04', NULL, 'KVB', 'Methanol -EDC-Water', NULL, NULL, 'Harshit Shaha', NULL, '7383335025', 1, NULL, NULL, NULL, NULL, '2021-09-28 15:29:05', '2021-11-08 10:53:50', NULL, NULL),
(164, 'QRN-6446', NULL, 'Bhagyoday tubes', 'Pune', 'MH', NULL, '2021-08-14', '2021-08-18', 'PHD', 'Random Packing', NULL, NULL, '207000', 'bhagyodaytubes@yahoo.com', '9873560176', 1, NULL, NULL, NULL, NULL, '2021-09-28 15:32:15', '2021-11-08 10:53:50', NULL, NULL),
(165, 'QRN-6447', NULL, 'Meghmani Finechem Limited', 'Ahmedabad', 'WEST', NULL, '2021-08-14', '2021-08-17', 'PHD', 'Structured Packing and internals', '198000', 'ORDER', 'Virat Prajapati', 'virat.prajapati@meghmani.com', '7971761000', 1, NULL, NULL, NULL, NULL, '2021-09-28 15:34:25', '2021-11-08 10:53:50', NULL, NULL),
(166, 'QRN-6448', NULL, 'NCPI', 'Kuwait', 'EXPORT', NULL, '2021-08-15', '2021-09-19', 'YS', 'Blender', '10290445', NULL, 'Tushar Das', 'tdas@ncpiq8.com', '9665946977', 1, NULL, NULL, NULL, NULL, '2021-09-28 15:37:23', '2021-11-08 10:53:50', NULL, NULL),
(167, 'QRN-6449', NULL, 'UPL Ltd', 'Dahej', 'WEST', NULL, '2021-08-16', NULL, 'NB', 'Column', NULL, NULL, 'Shobha Thakur (Shroff)', NULL, '2266020929', 1, NULL, NULL, NULL, NULL, '2021-09-28 15:38:53', '2021-11-08 10:53:50', NULL, NULL),
(168, 'QRN-6450', NULL, 'V B Engineers', 'Nashik', 'MH', NULL, '2021-08-16', NULL, 'PHD', 'Pall Ring random Packing', NULL, NULL, 'Vijay B. Patil', 'vbenggoffice@gmail.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 15:54:41', '2021-11-08 10:53:50', NULL, NULL),
(169, 'QRN-6451', NULL, 'Aarti Industries Ltd', 'Dahej', 'WEST', NULL, '2021-08-17', '2021-08-19', 'PHD', 'Structured Packing', '336000', 'WARM', 'Manal Mehta', 'manalmehta2@gmail.com', '9727713081', 1, NULL, NULL, NULL, NULL, '2021-09-28 15:56:15', '2021-11-08 10:53:50', NULL, NULL),
(170, 'QRN-6452', NULL, 'Aarti Industries Ltd', 'Dahej', 'WEST', NULL, '2021-08-17', NULL, 'KVB', 'Column', NULL, NULL, 'Manal Mehta', 'manalmehta2@gmail.com', '9727713081', 1, NULL, NULL, NULL, NULL, '2021-09-28 15:58:03', '2021-11-08 10:53:50', NULL, NULL),
(171, 'QRN-6453', NULL, 'Polychem Fabricator', 'Bhiwandi', 'MH', NULL, '2021-08-12', '2021-08-17', 'YS', 'Agitator', '175000', NULL, 'Vaibhavi Kokate', 'info@polychemfab.com', '8369700242', 1, NULL, NULL, NULL, NULL, '2021-09-28 16:02:29', '2021-11-08 10:53:50', NULL, NULL),
(172, 'QRN-6454', NULL, 'Anshul Specialty Molecules Ltd', 'Roha', 'MH', NULL, '2021-08-17', '2021-08-17', 'PS', 'Top shaft', '60000', 'ORDER', 'Nandkumar Telange', 'telange@anshulchemicals.com', '8303878882', 1, NULL, NULL, NULL, NULL, '2021-09-28 16:05:06', '2021-11-08 10:53:50', NULL, NULL),
(173, 'QRN-6455', NULL, 'Cadila Pharmaceuticals Ltd', 'Ankleshwar', 'WEST', NULL, '2021-08-14', '2021-08-18', 'PHD', 'Strutured Packing', '190000', NULL, 'Faizanul Haque', 'faizanul.haque@cadilapharma.co.in', '8583921039', 1, NULL, NULL, NULL, NULL, '2021-09-28 16:07:16', '2021-11-08 10:53:50', NULL, NULL),
(174, 'QRN-6456', NULL, 'Gujarat Fluorochemicals Limited', 'Dahej', 'WEST', NULL, '2021-08-17', '2021-08-19', 'KVB', 'Vessel', '2725000', NULL, 'Vishakha Singh Negi', 'vishakha.singh@gfl.co.in', '8130043259', 1, NULL, NULL, NULL, NULL, '2021-09-28 16:09:26', '2021-11-08 10:53:50', NULL, NULL),
(175, 'QRN-6457', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-08-11', '2021-08-18', 'NB', 'Tanks', '4837000', NULL, 'Sharad Kadam', 'sharad.kadam@laxmi.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 16:10:34', '2021-11-08 10:53:50', NULL, NULL),
(176, 'QRN-6458', NULL, 'Terraquaer Venture Pvt Ltd', 'Ahmeddabad', 'WEST', NULL, '2021-08-14', NULL, 'PHD', 'Statix Mixer', NULL, NULL, 'NA', 'hoterraquaer@gmail.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 16:11:45', '2021-11-08 10:53:50', NULL, NULL),
(177, 'QRN-6459', NULL, 'Green Joules', 'Pune', 'MH', NULL, '2021-08-14', '2021-08-18', 'PHD', 'Structured Packing', '13000', 'ORDER', 'Mr. Akash Patil', 'pakash@greenjoules.in', '9922384357', 1, NULL, NULL, NULL, NULL, '2021-09-28 16:13:12', '2021-11-08 10:53:50', NULL, NULL),
(178, 'QRN-6460', NULL, 'Neevs Project', 'Pune', 'MH', NULL, '2021-08-18', '2021-08-18', 'PMD', 'Mixing Tank', '100000', 'CANCELLED', 'Mr. Nikhil Shah', 'info@neevs.co.in', '9823124444', 1, NULL, NULL, NULL, NULL, '2021-09-28 16:14:21', '2021-11-08 10:53:50', NULL, NULL),
(179, 'QRN-6461', NULL, 'Arvind Envisol Ltd', 'Mumbai', 'MH', NULL, '2021-08-18', NULL, 'YS', 'Static Mixer', '634000', NULL, 'Jitendra Nagar', 'jitendra.nagar@arvind.in', '9833069488', 1, NULL, NULL, NULL, NULL, '2021-09-28 16:16:05', '2021-11-08 10:53:50', NULL, NULL),
(180, 'QRN-6462', NULL, 'Y-Chem Consulting', 'Mumbai', 'MH', NULL, '2021-08-08', '2021-08-19', 'NB', 'Separation Package', '55078000', NULL, 'Yaqoob Ali', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 16:17:10', '2021-11-08 10:53:50', NULL, NULL),
(181, 'QRN-6463', NULL, 'Sarna chemicals', 'Vapi', 'WEST', NULL, '2021-08-16', '2021-08-19', 'PHD', 'Demister pad', '8000', 'ORDER', 'Pravat Kumar Sahoo', 'sm1@sarnachemicals.com', '8160548575', 1, NULL, NULL, NULL, NULL, '2021-09-28 16:18:14', '2021-11-08 10:53:50', NULL, NULL),
(182, 'QRN-6464', NULL, 'Hat-11368/001', 'UK', 'EXPORT', NULL, '2021-08-17', NULL, 'NSM', 'VV type Plain Vane', NULL, NULL, 'Daniel Matthews', 'daniel@hatltd.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 16:19:13', '2021-11-08 10:53:50', NULL, NULL),
(183, 'QRN-6465', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-08-12', NULL, 'NSM', 'Packing', NULL, NULL, 'Rajan Gol', 'rajan.gol@gfl.co.in', '8849931897', 1, NULL, NULL, NULL, NULL, '2021-09-28 16:20:43', '2021-11-08 10:53:50', NULL, NULL),
(184, 'QRN-6466', NULL, 'Azista Composites', 'Kerala', 'SOUTH', NULL, '2021-08-18', '2021-08-25', 'PHD', 'Vane Mist Eliminator', '103000', 'BUDGETARY', 'Rahul R', 'rahul.r@azistaindustries.com', '9633825109', 1, NULL, NULL, NULL, NULL, '2021-09-28 16:22:25', '2021-11-08 10:53:50', NULL, NULL),
(185, 'QRN-6467', NULL, 'Aarti Industries Ltd', 'Vadodara', 'WEST', NULL, '2021-08-16', NULL, 'NSM', 'Rasching Ring', NULL, NULL, 'Pragi Shukla', 'pragi.shukla@aarti-industries.com', '9638231280', 1, NULL, NULL, NULL, NULL, '2021-09-28 16:23:54', '2021-11-08 10:53:50', NULL, NULL),
(186, 'QRN-6468', NULL, 'PEMAC Projects Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-08-23', '2021-08-23', 'PHD', 'Structured Packing', '920000', 'ORDER', 'Anjali Joshi', 'purchase.pemac@gmail.com', '9324966750', 1, NULL, NULL, NULL, NULL, '2021-09-28 16:26:13', '2021-11-08 10:53:50', NULL, NULL),
(187, 'QRN-6469', NULL, 'ACC GCI', 'Saudi Arabia', 'EXPORT', NULL, '2021-08-17', '2021-08-24', 'MJP', 'Heat Exchanger', '1168000', NULL, 'Md Inam Ur Rahman', 'm.rahman@acc-chemicals.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 16:27:53', '2021-11-08 10:53:50', NULL, NULL),
(188, 'QRN-6470', NULL, 'Anthem Bioscience', 'Banglore', 'SOUTH', NULL, '2021-08-20', '2021-08-26', 'MJP', 'Vessels', '6500000', NULL, 'Mr Venkadesh', 'venkadesh.d@anthembio.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 16:29:52', '2021-11-08 10:53:50', NULL, NULL),
(189, 'QRN-6471', NULL, 'Honor Lab Ltd', 'Hyderabad', 'SOUTH', NULL, '2021-08-25', '2021-08-31', 'MJP', 'Design Service', '400000', NULL, 'Mr Venu Madhav', 'venumadhav.s@honourlab.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 16:35:03', '2021-11-08 10:53:50', NULL, NULL);
INSERT INTO `enquiry` (`id`, `qrn`, `enq_from`, `customer_name`, `city`, `region`, `address`, `enq_date`, `qte_date`, `engineer`, `description`, `price`, `status`, `contact_person`, `email`, `phone`, `admin_id`, `assignee`, `reminder_note`, `reminder_date`, `enq_labels`, `created_at`, `updated_at`, `so no`, `remark`) VALUES
(190, 'QRN-6472', NULL, 'Ingenero Technologies India Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-08-30', '2021-09-04', 'MJP', 'Heat Exchangers', '401500', NULL, 'Mr Shardul Shindadkar', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 16:48:33', '2021-11-08 10:53:50', NULL, NULL),
(191, 'QRN-6473', NULL, 'Cosmo Speciality Chemical Pvt Ltd', 'Aurangabad', 'MH', NULL, '2021-08-21', '2021-08-25', 'NB', 'Reactor, Heat Exchanger, Column, Vessel Package', '5637000', NULL, 'Prashant Waghmare', 'prashant.waghmare@cosmochem.in', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 16:49:38', '2021-11-08 10:53:50', NULL, NULL),
(192, 'QRN-6474', NULL, 'Atul Ltd', 'Gujarat', 'WEST', NULL, '2021-07-23', '2021-08-25', 'KVB', 'Recovery System', '6600000', NULL, 'Rajiv Davda', 'Saurabh_Mamtora@atul.co.in', '9879570315', 1, NULL, NULL, NULL, NULL, '2021-09-28 16:50:57', '2021-11-08 10:53:50', NULL, NULL),
(193, 'QRN-6475', NULL, 'Pragna  Life Science', 'Bharuch', 'WEST', NULL, '2021-08-23', NULL, 'NSM', 'Strutured Packing', NULL, NULL, 'jignesh patel', 'pragnalifescience@gmail.com', '9723812606', 1, NULL, NULL, NULL, NULL, '2021-09-28 16:52:25', '2021-11-08 10:53:50', NULL, NULL),
(194, 'QRN-6476', NULL, 'Bodal Chemicals Ltd Unit VII', 'Vadodara', 'WEST', NULL, '2021-08-21', '2021-08-26', 'YS', 'AA Recovery System', '12545000', NULL, 'Waris Chaudhary', 'waris@bodal.com', '9512021573', 1, NULL, NULL, NULL, NULL, '2021-09-28 16:53:56', '2021-11-08 10:53:50', NULL, NULL),
(195, 'QRN-6477', NULL, 'Navin Fluorine International Limited', 'Dewas', 'NORTH', NULL, '2021-08-23', '2021-08-30', 'YS', 'Reactor', '25300000', NULL, 'Shashank Vaidya', 'shashank.v@nfil.in', '8358920077', 1, NULL, NULL, NULL, NULL, '2021-09-28 16:55:48', '2021-11-08 10:53:50', NULL, NULL),
(196, 'QRN-6478', NULL, 'Camline Fine Sciences Ltd', 'Mumbai', 'MH', NULL, '2021-06-14', '2021-08-25', 'PHD', 'Internals', '103000', NULL, 'Sushant Bhingarde', 'sushant.bhingarde@camlinfs.com', '9152727610', 1, NULL, NULL, NULL, NULL, '2021-09-28 16:58:41', '2021-11-08 10:53:50', NULL, NULL),
(197, 'QRN-6479', NULL, 'Aarti Industries Ltd', 'Vapi', 'WEST', NULL, '2021-08-25', NULL, 'NSM', 'PTFE Flange', NULL, NULL, 'Aakash Patel', 'am.patel@aarti-industries.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 17:00:11', '2021-11-08 10:53:50', NULL, NULL),
(198, 'QRN-6480', NULL, 'Hypro Engineers  Pvt Ltd', 'Pune', 'MH', NULL, '2021-08-25', NULL, 'NSM', 'Structured Packings', NULL, NULL, 'Umesh Pawar', 'ced04@hypro.co.in', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 17:01:00', '2021-11-08 10:53:50', NULL, NULL),
(199, 'QRN-6481', NULL, 'PEMAC Projects Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-08-25', '2021-08-27', 'PHD', 'Structured Packing', '397000', 'ORDER', 'Anjali Joshi', 'purchase.pemac@gmail.com', '9324966750', 1, NULL, NULL, NULL, NULL, '2021-09-28 17:02:52', '2021-11-08 10:53:50', NULL, NULL),
(200, 'QRN-6482', NULL, 'Allen Petrochemicals Pvt', 'Uttar Pradesh', 'NORTH', NULL, '2021-08-20', '2021-08-31', 'PMD', 'Solvent Recovery System', '46500000', 'BUDGETARY', 'Mr. Ankur Allen', 'info@allenpetro.com', '9837095799', 1, NULL, NULL, NULL, NULL, '2021-09-28 17:05:00', '2021-11-08 10:53:50', NULL, NULL),
(201, 'QRN-6483', NULL, 'Jubilant Ingrevia Limited', 'Dahej', 'WEST', NULL, '2021-08-25', '2021-08-31', 'NB', 'Tanks', '8711000', NULL, 'Viraj Vinkar', 'viraj.vankar@jubl.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 17:05:54', '2021-11-08 10:53:50', NULL, NULL),
(202, 'QRN-6484', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-08-29', '2021-09-01', 'PHD', 'Bubble Cap Trays', '6850000', 'BUDGETARY', 'Vijay Wayal', 'vijay.wayal@laxmi.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 17:07:21', '2021-11-08 10:53:50', NULL, NULL),
(203, 'QRN-6485', NULL, 'SSEPL Techno Pvt Ltd', 'Pune', 'MH', NULL, '2021-08-31', '2021-08-31', 'YS', 'Agitator', '1460000', NULL, 'Shrikrishna Avdhut', 'sdavdhut@ssepl.co.in', '9168694265', 1, NULL, NULL, NULL, NULL, '2021-09-28 17:10:49', '2021-11-08 10:53:50', NULL, NULL),
(204, 'QRN-6486', NULL, 'Pleiad  Design & Engineering', 'Pune', 'MH', NULL, '2021-08-28', NULL, 'NSM', 'Mesh + Vane Demister Pads', NULL, NULL, 'Manisha Burde', 'manisha.b@pleiad.in', '8956439809', 1, NULL, NULL, NULL, NULL, '2021-09-28 17:12:01', '2021-11-08 10:53:50', NULL, NULL),
(205, 'QRN-6487', NULL, 'AF Engineering', 'Japan', 'EXPORT', NULL, '2021-08-28', '2021-09-02', 'PHD', 'Structured Packings and internals', '28000', NULL, 'Kazuo Watari', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 17:14:00', '2021-11-08 10:53:50', NULL, NULL),
(206, 'QRN-6488', NULL, 'UPL Ltd', 'Dahej', 'WEST', NULL, '2021-08-30', NULL, 'NB', 'Scrubber and Internals', NULL, NULL, 'Shobha Thakur', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 17:16:18', '2021-11-08 10:53:50', NULL, NULL),
(207, 'QRN-6489', NULL, 'Polyplast Chemi Plant Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-08-31', NULL, 'NSM', 'Titanium Distributor, hold down grid plate, Support grid plate', NULL, NULL, 'NA', 'purchase@polyplast.co.in', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 17:17:05', '2021-11-08 10:53:50', NULL, NULL),
(208, 'QRN-6490', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-08-11', '2021-09-01', 'NB', 'Column', '1558000', NULL, 'Vijay Wayal', 'vijay.wayal@laxmi.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 17:21:20', '2021-11-08 10:53:50', NULL, NULL),
(209, 'QRN-6491', NULL, 'Simon India Ltd', 'Delhi', 'NORTH', NULL, '2021-08-31', '2021-09-03', 'PMD', 'Stripper Column With Packing', '1106000', 'BUDGETARY', 'Ayush Sharma', 'Ayush.Sharma@adventz.com', '9953664916', 1, NULL, NULL, NULL, NULL, '2021-09-28 17:22:39', '2021-11-08 10:53:50', NULL, NULL),
(210, 'QRN-6492', NULL, 'UPL Ltd', 'Dahej', 'WEST', NULL, '2021-08-30', NULL, 'NB', 'Column', NULL, NULL, 'Parag Gandhi', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 17:23:21', '2021-11-08 10:53:50', NULL, NULL),
(211, 'QRN-6493', NULL, 'Deccan Finechemicals (India) Pvt. Ltd', 'Hyderabad', 'SOUTH', NULL, '2021-08-23', '2021-09-01', 'NSM', 'Structured Packing (PTFE)', NULL, NULL, 'Amol Disale', 'amol.disale@deccanchemicals.com', '9121229227', 1, NULL, NULL, NULL, NULL, '2021-09-28 17:26:56', '2021-11-08 10:53:50', NULL, NULL),
(212, 'QRN-6494', NULL, 'Fine Arc Engineering', 'Ahemadnagar', 'MH', NULL, '2021-08-28', '2021-07-01', 'PHD', 'Column Packing and internals', '10000', 'BUDGETARY', 'Mr. Amol Rahane', 'finearceng@gmail.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 17:29:35', '2021-11-08 10:53:50', NULL, NULL),
(213, 'QRN-6495', NULL, 'Eternis Fine Chemicals', 'Pune', 'MH', NULL, '2021-09-02', NULL, 'PHD', 'Random Packing and internals', '101000', 'ORDER', 'Sulay shah', 'sulay.shah@eternis.com', '8412009933', 1, NULL, NULL, NULL, NULL, '2021-09-28 17:30:43', '2021-11-08 10:53:50', NULL, NULL),
(214, 'QRN-6496', NULL, 'Servotech India Ltd', 'Mumbai', 'MH', NULL, '2021-08-25', '2021-09-03', 'PS', 'Column', '4187000', 'WARM', 'Bhagyashree Pandhare', 'purchase@servotech-india.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-28 17:32:28', '2021-11-08 10:53:50', NULL, NULL),
(215, 'QRN-6497', NULL, 'Simon India Ltd', 'Delhi', 'NORTH', NULL, '2021-09-02', '2021-09-02', 'PMD', 'Knock out drum', '980000', 'BUDGETARY', 'Mr. Ayush Sharma', 'ayush.sharma@adventz.com', '9953664916', 1, NULL, NULL, NULL, NULL, '2021-09-28 17:43:07', '2021-11-08 10:53:50', NULL, NULL),
(216, 'QRN-6498', NULL, 'Camlin Fine Sciences Ltd', 'Mumbai', 'MH', NULL, '2021-09-02', '2021-09-21', 'PHD', 'Static Mixer', '1362000', 'BUDGETARY', 'Sushant Bhingarde', 'sushant.bhingarde@camlinfs.com', '9152727610', 1, NULL, NULL, NULL, NULL, '2021-09-28 17:45:31', '2021-11-08 10:53:50', NULL, NULL),
(217, 'QRN-6499', NULL, 'Harmony Organics Pvt Ltd', 'Kurkumbh', 'MH', NULL, '2021-09-02', '2021-09-04', 'PHD', 'Structured Packing', '2861000', 'ORDER', 'Sharad Rupnawar', 'engineering@harmonyorganics.in', '7709138262', 1, NULL, NULL, NULL, NULL, '2021-09-28 17:47:18', '2021-11-08 10:53:50', NULL, NULL),
(218, 'QRN-6500', NULL, 'Sandip Industries', 'Mumbai', 'MH', NULL, '2021-09-01', '2021-09-03', 'PHD', 'Structured Packing', '230000', 'BUDGETARY', 'Sandeep Mody', 'sandeep_mody@yahoo.co.in', '9867212300', 1, NULL, NULL, NULL, NULL, '2021-09-28 17:48:26', '2021-11-08 10:53:50', NULL, NULL),
(219, 'QRN-6501', NULL, 'Constro Solutions Pvt Ltd', 'Sinnar', 'MH', NULL, '2021-08-30', '2021-09-06', 'NB', 'Tank & Heat Exchanger', '1310000', NULL, 'Sanjay Deshpande', NULL, '8007771006', 1, NULL, NULL, NULL, NULL, '2021-09-28 17:49:30', '2021-11-08 10:53:50', NULL, NULL),
(220, 'QRN-6502', NULL, 'Servotech India Ltd', 'Mumbai', 'MH', NULL, '2021-08-25', NULL, 'NSM', 'Structured Packing', NULL, NULL, 'Sandeep Agiwal', 'sandeep@servotech-india.com', '9821381810', 1, NULL, NULL, NULL, NULL, '2021-09-29 15:35:10', '2021-11-08 10:53:50', NULL, NULL),
(221, 'QRN-6503', NULL, 'Nalco Water India Limited', 'Pune', 'MH', NULL, '2021-09-02', '2021-09-02', 'YS', 'Static Mixer', '225000', NULL, 'Rohan Gujar', 'rohan.gujar@ecolab.com', '9850005190', 1, NULL, NULL, NULL, NULL, '2021-09-29 15:36:32', '2021-11-08 10:53:50', NULL, NULL),
(222, 'QRN-6504', NULL, 'Deccan Fine  Chemicals', 'Hyderabad', 'SOUTH', NULL, '2021-09-03', NULL, 'MJP', 'Static Mixer', '175000', NULL, 'Mr A.Bhuvana Chandar', 'bhuvana.chandar@deccanchemicals.com', '8886012335', 1, NULL, NULL, NULL, NULL, '2021-09-29 15:42:31', '2021-11-08 10:53:50', NULL, NULL),
(223, 'QRN-6505', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-09-03', '2021-09-09', 'KVB', 'Neutralization Reactors', '21170000', NULL, 'Ravindra Kumar', 'ravindra.kumar@gfl.co.in', '8287833334', 1, NULL, NULL, NULL, NULL, '2021-09-29 15:44:41', '2021-11-08 10:53:50', NULL, NULL),
(224, 'QRN-6506', NULL, 'Ingenero Technologies India Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-08-30', '2021-09-10', 'MJP', 'Heat Exchanger', '31390000', NULL, 'Mr Shardul Shindadkar', 'sshindadkar@ingenero.com', '7718819650', 1, NULL, NULL, NULL, NULL, '2021-09-29 15:50:42', '2021-11-08 10:53:50', NULL, NULL),
(225, 'QRN-6507', NULL, 'EPP Composites Pvt Ltd', 'Gujarat', 'WEST', NULL, '2021-09-04', '2021-09-06', 'YS', 'Agitator', '132000', NULL, 'Khojema Diwasali', 'marketing@epp.co.in', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-29 15:54:46', '2021-11-08 10:53:50', NULL, NULL),
(226, 'QRN-6508', NULL, 'SSEPL Techno Pvt Ltd', 'Pune', 'MH', NULL, '2021-09-04', NULL, 'YS', 'Agitator', NULL, NULL, 'Shrikrishna Avdhut', 'sdavdhut@ssepl.co.in', '9168694265', 1, NULL, NULL, NULL, NULL, '2021-09-29 15:59:00', '2021-11-08 10:53:50', NULL, NULL),
(227, 'QRN-6508', NULL, 'SSEPL Techno Pvt Ltd', 'Pune', 'MH', NULL, '2021-09-04', NULL, 'YS', 'Agitator', NULL, NULL, 'Shrikrishna Avdhut', 'sdavdhut@ssepl.co.in', '9168694265', 1, NULL, NULL, NULL, NULL, '2021-09-29 15:59:00', '2021-11-08 10:53:50', NULL, NULL),
(228, 'QRN-6509', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-09-03', '2021-09-20', 'YS', 'Static Mixer', '130000', NULL, 'Dipanshi Singh', 'dipanshi.singh@gfl.co.in', '8318422636', 1, NULL, NULL, NULL, NULL, '2021-09-29 16:03:10', '2021-11-08 10:53:50', NULL, NULL),
(229, 'QRN-6510', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-09-04', '2021-09-07', 'PHD', 'Bubble Cap tray', '8000000', 'BUDGETARY', 'Manoj Malaviya', 'manoj.malaviya@laxmi.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-29 16:05:20', '2021-11-08 10:53:50', NULL, NULL),
(230, 'QRN-6511', NULL, 'Matrix Fine Sciences Pvt. Ltd.', 'Aurangabad', 'MH', NULL, '2021-09-06', '2021-09-08', 'YS', 'Column, & Heat Exchanger', NULL, NULL, 'Kalim Inamdar', 'kalim@matrixfinesciences.com', '7767812182', 1, NULL, NULL, NULL, NULL, '2021-09-29 16:29:25', '2021-11-08 10:53:50', NULL, NULL),
(231, 'QRN-6512', NULL, 'Servotex Engineers India Pvt. Ltd', 'Mumbai', 'MH', NULL, '2021-09-06', '2021-09-09', 'NSM', 'Methanol Column Internals', '912000', NULL, 'Tushar Rai', 'tushar.rai@servotexengineers.in', '7506176698', 1, NULL, NULL, NULL, NULL, '2021-09-29 16:35:18', '2021-11-08 10:53:50', NULL, NULL),
(232, 'QRN-6513', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-09-07', '2021-09-09', 'NB', 'Column (2 Section)', '4100000', NULL, 'Manoj Malaviya', 'manoj.malaviya@laxmi.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-29 16:49:43', '2021-11-08 10:53:50', NULL, NULL),
(233, 'QRN-6514', NULL, 'Nalini Design And Solutions LLP', 'Pune', 'MH', NULL, '2021-09-09', '2021-09-17', 'PHD', 'Extraction Packing', '473000', 'BUDGETARY', 'Shirish Bhole', 'shirish.bhole@nalinids.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-29 16:51:38', '2021-11-08 10:53:50', NULL, NULL),
(234, 'QRN-6515', NULL, 'Supreme Industries', 'Chhattisgarh', 'NORTH', NULL, '2021-09-10', NULL, 'NSM', 'Structured Packing', NULL, NULL, 'Ks Bedi', 'ksbedit2@gmail.com', '9425234342', 1, NULL, NULL, NULL, NULL, '2021-09-29 16:54:37', '2021-11-08 10:53:50', NULL, NULL),
(235, 'QRN-6516', NULL, 'Balaji Amines Ltd', 'Solapur', 'MH', NULL, '2021-09-12', NULL, 'NSM', 'Demister', NULL, NULL, 'G. Swapna', 'unit4purchase@balajiamines.in', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-29 16:55:51', '2021-11-08 10:53:50', NULL, NULL),
(236, 'QRN-6517', NULL, 'M.T.P.I Products Pvt. Ltd.', 'Mumbai', 'MH', NULL, '2021-09-14', '2021-09-14', 'PHD', 'Structured Packing & Internals', '2000000', NULL, 'Vikrant Bakshi', NULL, '9594968489', 1, NULL, NULL, NULL, NULL, '2021-09-29 16:57:33', '2021-11-08 10:53:50', NULL, NULL),
(237, 'QRN-6518', NULL, 'AdichemTech', 'Mumbai', 'MH', NULL, '2021-09-13', NULL, 'YS', 'Autoclave', NULL, NULL, 'Mr. Sandip', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-09-29 17:00:34', '2021-11-08 10:53:50', NULL, NULL),
(238, 'QRN-6519', NULL, 'SSEPL  Techno Pvt Ltd', 'Pune', 'MH', NULL, '2021-09-14', '2021-09-15', 'YS', 'Agitator', '863000', NULL, 'Shrikrishna Avdhut', 'sdavdhut@ssepl.co.in', '9168694265', 1, NULL, NULL, NULL, NULL, '2021-09-29 17:02:13', '2021-11-08 10:53:50', NULL, NULL),
(239, 'QRN-6520', NULL, 'Parmar Engineers', 'Mumbai', 'MH', NULL, '2021-09-14', NULL, 'NSM', 'NA', NULL, NULL, 'Ketan Parmar', 'contact@parmarengg.com', '8104924521', 1, NULL, NULL, NULL, NULL, '2021-09-29 17:06:06', '2021-11-08 10:53:50', NULL, NULL),
(240, 'QRN-6521', NULL, 'Matrix Fine Sciences Pvt Ltd', 'Aurangabad', 'MH', NULL, '2021-09-15', '2021-09-17', 'PHD', 'Liquid Separator', '1593000', NULL, 'Kalim Inamdar', 'kalim@matrixfinesciences.com', '7767812182', 1, NULL, NULL, NULL, NULL, '2021-09-29 17:09:03', '2021-11-08 10:53:50', NULL, NULL),
(241, 'QRN-6522', NULL, 'M.T.P.I Products Pvt. Ltd.', 'Mumbai', 'MH', NULL, '2021-09-14', NULL, 'NSM', 'Structured Packing', NULL, NULL, 'Romit Sawant', 'rsawant@mtpi.net.in', '8511987630', 1, NULL, NULL, NULL, NULL, '2021-09-29 17:11:33', '2021-11-08 10:53:50', NULL, NULL),
(242, 'QRN-6523', NULL, 'Anupam Rasayan', 'Gujarat', 'WEST', NULL, '2021-09-16', '2021-09-16', 'YS', 'Reactor', NULL, NULL, 'Viral Muchhala', 'viral.muchhala@anupamrasayan.com', '8460881226', 1, NULL, NULL, NULL, NULL, '2021-09-29 17:13:04', '2021-11-08 10:53:50', NULL, NULL),
(243, 'QRN-6524', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-09-16', NULL, 'KVB', 'Column & Kettle', NULL, NULL, 'Ravindra Kumar', 'ravindra.kumar@gfl.co.in', '8287833334', 1, NULL, NULL, NULL, NULL, '2021-09-29 17:14:03', '2021-11-08 10:53:50', NULL, NULL),
(244, 'QRN-6525', NULL, 'Balaji Amines Limited', 'Solapur', 'MH', NULL, '2021-09-16', NULL, 'NSM', 'Poll Ring', NULL, NULL, 'G. Swapna', 'unit4purchase@balajiamines.in', NULL, 1, NULL, NULL, NULL, NULL, '2021-09-29 17:16:01', '2021-11-08 10:53:50', NULL, NULL),
(245, 'QRN-6526', NULL, 'Pleiad  Design & Engineering', 'Pune', 'MH', NULL, '2021-09-09', '2021-09-17', 'NSM', 'Mesh + Vane Demister Pads', NULL, NULL, 'Manisha Burde', 'manisha.b@pleiad.in', '8956439809', 1, NULL, NULL, NULL, NULL, '2021-09-29 17:17:14', '2021-11-08 10:53:50', NULL, NULL),
(246, 'QRN-6527', NULL, 'Charms Chem Private Limited', 'Pune', 'MH', NULL, '2021-09-17', '2021-09-17', 'SSK', '8 m2 WFE', '1600000', NULL, 'Mr. Milind Honavar', 'milindhonavar@gmail.com', '9890247473', 1, NULL, NULL, NULL, NULL, '2021-09-29 17:21:07', '2021-11-08 10:53:50', NULL, NULL),
(247, 'QRN-6528', NULL, 'Bio Pharma Specialist', 'Pune', 'MH', NULL, '2021-09-17', '2021-09-18', 'NB', 'Reactor', '395000', NULL, 'Arun Kumar', 'biopharmaspecialists@gmail.com', '7887888018', 1, NULL, NULL, NULL, NULL, '2021-09-29 17:22:30', '2021-11-08 10:53:50', NULL, NULL),
(248, 'QRN-6529', NULL, 'Jindal Specialty Chemicals India Pvt Ltd', 'Ahmedabad', 'WEST', NULL, '2021-09-16', '2021-09-23', 'YS', 'Top Mounted Condenser', '1330000', NULL, 'E D', 'ed@jindalfinechem.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-10-04 14:03:05', '2021-11-08 10:53:50', NULL, NULL),
(249, 'QRN-6530', NULL, 'Bodal Chemicals Ltd Unit VII', 'Vadodara', 'WEST', NULL, '2021-08-01', '2021-09-17', 'YS', 'Engineering of Existing Methanol Process', '300000', NULL, 'Waris Chaudhary', 'waris@bodal.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-10-04 14:04:54', '2021-11-08 10:53:50', NULL, NULL),
(250, 'QRN-6531', NULL, 'Apex Pharma', 'Dahej', 'WEST', NULL, '2021-09-17', '2021-09-18', 'PHD', 'Structured Packing', '335000', 'BUDGETARY', 'Manal Mehta', 'manalmehta2@gmail.com', '9727713081', 1, NULL, NULL, NULL, NULL, '2021-10-04 14:06:44', '2021-11-08 10:53:50', NULL, NULL),
(251, 'QRN-6532', NULL, 'Aarti Industries Ltd', 'Vapi', 'WEST', NULL, '2021-09-04', '2021-10-01', 'PS', 'Striper Column', '25500000', NULL, 'Ankit Sharma', 'ankit.sharma@aarti-industries.com', '9643560070', 1, NULL, NULL, NULL, NULL, '2021-10-04 14:09:00', '2021-11-08 10:53:50', NULL, NULL),
(252, 'QRN-6533', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-09-18', NULL, 'NB', 'Reaction Kettle', NULL, NULL, 'Manoj Malaviya', 'manoj.malaviya@laxmi.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-10-04 14:58:27', '2021-11-08 10:53:50', NULL, NULL),
(253, 'QRN-6534', NULL, 'Indofil Industries Limited', 'Mumbai', 'MH', NULL, '2021-09-20', '2021-09-21', 'PHD', 'Structured Packing & Internal', '48000', NULL, 'Prasad Kurkure', 'pkurkure@indofil.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-10-04 15:19:10', '2021-11-08 10:53:50', NULL, NULL),
(254, 'QRN-6535', NULL, 'Sandip Industries', 'Mumbai', 'MH', NULL, '2021-09-21', NULL, 'PHD', 'Structured Packing', NULL, NULL, 'Sandeep Mody', 'sandeep_mody@yahoo.co.in', '9867212300', 1, NULL, NULL, NULL, NULL, '2021-10-04 15:44:39', '2021-11-08 10:53:50', NULL, NULL),
(255, 'QRN-6536', NULL, 'Ecolab', 'Hadpsar', 'MH', NULL, '2021-09-21', '2021-09-21', 'YS', 'SS 316 Static Mixer', '67000', NULL, 'Rahul Hajare', 'rahul.hajare@ecolab.com', '9975494413', 1, NULL, NULL, NULL, NULL, '2021-10-04 15:46:08', '2021-11-08 10:53:50', NULL, NULL),
(256, 'QRN-6537', NULL, 'Spectec Techno Projects Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-09-21', NULL, 'PHD', 'Structured Packing', NULL, NULL, 'Ms. Tejal', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-10-04 15:47:39', '2021-11-08 10:53:50', NULL, NULL),
(257, 'QRN-6538', NULL, 'Harmony Organics Pvt Ltd', 'Pune', 'MH', NULL, '2021-09-22', NULL, 'PHD', 'Internals', NULL, NULL, 'Sharad Rupnawar', NULL, '7709138262', 1, NULL, NULL, NULL, NULL, '2021-10-04 15:49:34', '2021-11-08 10:53:50', NULL, NULL),
(258, 'QRN-6539', NULL, 'BEC Chemicals', 'Mumbai', 'MH', NULL, '2021-09-21', '2021-10-01', 'NB', 'Reactor Package', '30140000', NULL, 'Pratap Shinde', NULL, '9920258547', 1, NULL, NULL, NULL, NULL, '2021-10-04 15:52:10', '2021-11-08 10:53:50', NULL, NULL),
(259, 'QRN-6540', NULL, 'Deccan fine Chemicals', 'Hyderabad', 'SOUTH', NULL, '2021-09-28', '2021-09-29', 'MJP', 'Static Mixer', '350000', NULL, 'Mr A.Bhuvana chandar', 'bhuvana.chandar@deccanchemicals.com', '8886012335', 1, NULL, NULL, NULL, NULL, '2021-10-04 15:59:45', '2021-11-08 10:53:50', NULL, NULL),
(260, 'QRN-6541', NULL, 'Granules India Ltd', 'Hyderabad', 'SOUTH', NULL, '2021-09-23', NULL, 'MN', 'NA', NULL, NULL, 'NA', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-10-04 16:03:34', '2021-11-08 10:53:50', NULL, NULL),
(261, 'QRN-6542', NULL, 'Synergie Ingredient', 'Bangalore', 'SOUTH', NULL, '2021-09-22', '2021-09-23', 'KVB', 'Column', '550000', NULL, 'Ram Prasad', 'ramprasad@synergieingredients.com', '7019465042', 1, NULL, NULL, NULL, NULL, '2021-10-04 16:05:41', '2021-11-08 10:53:50', NULL, NULL),
(262, 'QRN-6543', NULL, 'Mendas Pharma Pvt Ltd', 'Dahej', 'WEST', NULL, '2021-09-23', '2021-09-23', 'NB', 'Heat Exchanger', '6380000', NULL, 'Parth Mendpara', 'parth@mendas.in', NULL, 1, NULL, NULL, NULL, NULL, '2021-10-04 16:09:10', '2021-11-08 10:53:50', NULL, NULL),
(263, 'QRN-6544', NULL, 'Ingenero Technologies India Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-09-22', '2021-09-23', 'KVB', 'Degion Charges', '200000', NULL, 'Deshik R Char', 'dchar@ingenero.com', '9930331316', 1, NULL, NULL, NULL, NULL, '2021-10-04 16:10:21', '2021-11-08 10:53:50', NULL, NULL),
(264, 'QRN-6545', NULL, 'LNT Industrial Engineering Services', 'Bhosari', 'MH', NULL, '2021-09-17', NULL, 'NSM', 'Vane Pack', NULL, NULL, 'Ritesh Tolia', 'info@lntindustries.in', '9822210965', 1, NULL, NULL, NULL, NULL, '2021-10-04 16:12:01', '2021-11-08 10:53:50', NULL, NULL),
(265, 'QRN-6546', NULL, 'Aarti Industires Ltd', 'Bharuch', 'WEST', NULL, '2021-09-20', '2021-09-24', 'KVB', 'Scrubber', '2350000', NULL, 'Yash M. Godhani', 'yashkumar.godhani@aarti-industries.com', '7575029096', 1, 1, NULL, NULL, NULL, '2021-10-04 16:18:56', '2022-02-15 10:53:43', NULL, NULL),
(266, 'QRN-6547', NULL, 'An Cryo Instruments Pvt Ltd', 'NA', 'MH', NULL, '2021-09-21', '2021-09-30', 'YS', 'Syngas to  Methanol Production Plant', '65000000', NULL, 'Mr. Amit Mukharjee', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-10-13 12:29:20', '2021-11-08 10:53:50', NULL, NULL),
(267, 'QRN-6548', NULL, 'Sumaha Chemical', 'Mumbai', 'MH', NULL, '2021-09-28', NULL, 'NSM', 'CY Packing', '273000', NULL, 'Mahadev Raut', 'sumaha.chem@gmail.com', NULL, 1, NULL, NULL, NULL, NULL, '2021-10-13 12:32:53', '2021-11-08 10:53:50', NULL, NULL),
(270, 'QRN-6549', 'Direct', 'YCS', 'Pune', 'MH', NULL, '2021-11-24', '2021-12-04', 'PS', 'Test desc', '98798', 'HOT', 'Manoj G', 'manoj@ycstech.in', '+1 9797897899', 1, 25, NULL, '2021-12-09', NULL, '2021-11-17 13:31:41', '2023-02-09 17:58:08', NULL, NULL),
(271, '2021366607', 'IndiaMart', 'Robert', NULL, NULL, NULL, '18 Dec 2021', NULL, NULL, 'I am looking for service provider for Website Development Services, With Online Support.\r\nThe main purpose of the site is to List Escorts, Content sellers, Agencies, and members. Escorts can either choose how they want to provide their personal Services. ', NULL, NULL, NULL, 'maxwellgis@gmail.com', '+27-658950174', 1, 1, NULL, NULL, NULL, '2021-12-18 00:00:00', '2022-02-15 10:47:50', NULL, NULL),
(272, '2021223028', 'IndiaMart', 'Zafer', NULL, NULL, NULL, '18 Dec 2021', NULL, NULL, 'I am looking for service provider for Adsense Account Service.\r\n\r\nKindly send me price and other details.', NULL, NULL, NULL, 'zaf_gunay@hotmail.com', '+90-5393751441', 38, 1, NULL, NULL, '[\"\"]', '2021-12-18 00:00:00', '2022-02-15 10:41:49', NULL, NULL),
(273, '416782094', 'IndiaMart', 'Ibrahim Shaikh', 'Mumbai', 'Maharashtra', NULL, '18 Dec 2021', NULL, NULL, 'I am looking for B2B Portal Design Services.\r\nwhite label\r\nKindly send me price and other details.<br>Service Location : Pan India', NULL, 'HOT', NULL, 'ibbushaikh40@gmail.com', '+91-7738282644', 1, NULL, NULL, NULL, '[\"\",\"14\"]', '2021-12-18 00:00:00', '2022-01-27 11:15:40', NULL, NULL),
(274, '416781997', 'IndiaMart', 'Harsh', 'Jalandhar', 'Punjab', NULL, '18 Dec 2021', NULL, NULL, 'I am looking for service provider for Ecommerce Solutions.\r\n\r\nKindly send me price and other details.<br>Service Location : Jalandhar<br>Usage/Application : Flipkart', NULL, NULL, NULL, 'harshsarangal438@gmail.com', '+91-7009010696', 60, 1, NULL, NULL, '[\"\",\"12\",\"13\"]', '2021-12-18 00:00:00', '2022-01-27 07:31:27', NULL, NULL),
(275, '2020407940', 'IndiaMart', 'Raju', NULL, NULL, NULL, '17 Dec 2021', NULL, NULL, 'I am looking for service provider for Online Lottery Website Designing.\r\n\r\nKindly send me price and other details.\r\n\r\n Service Location:   Kolkata', NULL, 'HOT', NULL, 'Raju.khan019238@gmail.com', NULL, 60, 1, NULL, NULL, '[\"\",\"11\",\"14\"]', '2021-12-17 00:00:00', '2022-01-27 11:15:56', NULL, NULL),
(276, '431275379', 'IndiaMart', 'Manoj Chauhan', 'Jammu', 'Jammu & Kashmir', NULL, '25 Jan 2022', NULL, NULL, 'I am looking for service provider for ERP Software Development.\r\n\r\nKindly send me price and other details.<br>I am interested in : ERP Software Development<br>Service Location : University Of Jammu, Jammu<br>Usage/Application : University Finance Use<br>T', NULL, NULL, NULL, 'mkcritu@rediffmail.com', '+91-9419151203', 1, 1, 'enq reminder note', '2022-02-01', NULL, '2022-01-25 00:00:00', '2022-02-15 10:52:34', NULL, NULL),
(277, '2071458403', 'IndiaMart', 'Prashant Joshi', 'Nagpur', 'Maharashtra', NULL, '15 Feb 2022', NULL, NULL, 'I am looking for Business to Consumer (B2C). \r\n\r\nKindly send me price and other details.\r\n\r\n Service Location:   Nagpur \r\n Usage/Application:   Heat Resistant Coating For Building \r\n\r\n\r\nAdditional Updates on Buyer\'s Requirement :\r\nPreferred Location: Serv', NULL, 'HOT', NULL, 'jjeminence@gmail.com', '+91-9403572478', 1, 60, NULL, NULL, '[[],\"11\"]', '2022-02-15 00:00:00', '2022-03-17 10:06:41', NULL, NULL),
(278, 'QRN-6300', 'Direct', 'Test', 'Pune', 'MH', NULL, '2022-02-22', '2022-02-02', 'TW', 'test', '4000000', 'PO AWAITED', 'tsdes', 'test@yrdf.ddgf', '+91 9879879879', 1, 1, NULL, NULL, NULL, '2022-02-22 17:18:15', '2022-03-31 06:55:59', NULL, NULL),
(279, 'QRN-6300', 'Direct', 'Client 2', 'Pune', 'MH', NULL, '2022-02-22', '2022-02-02', 'TW', 'test', '2000000', 'PO AWAITED', 'tsdes', 'test@yrdf.ddgf', '+91 9879879879', 1, 1, NULL, NULL, NULL, '2022-02-22 17:18:15', '2022-03-31 06:55:59', NULL, NULL),
(284, '2140421910', 'IndiaMart', 'Zaz Enterprises', 'Delhi', 'Delhi', 'Shop No. 89, Begumpur, Naraina, Delhi, Delhi,         110008', '2022-05-11', NULL, NULL, 'Seller log in<br>Service Location : All india<br>Usage/Application : Multi<br>', NULL, NULL, 'Mohd Imran Warsi', 'imranwa67@gmail.com', '+91-9643585081', 1, 1, NULL, NULL, NULL, '2022-05-11 10:10:01', '2022-05-11 04:40:01', NULL, NULL),
(285, '2140313653', 'IndiaMart', 'Krishna Rao Mundel Lok Sewa Foundation', 'Pune', 'Maharashtra', 'Krishna Kunj Building, Opposite, Shobha Corner Kothrud, Karve Nagar, Pune, Maharashtra,         411052', '2022-05-11', NULL, NULL, 'I am interested in Google Adwords Service<br>', NULL, NULL, 'Vikaram Krishnarao Mundhe', 'manishagawari18@gmail.com', '+91-9011908548', 1, 1, NULL, NULL, NULL, '2022-05-11 10:10:01', '2022-05-11 04:40:01', NULL, NULL),
(286, '472698401', 'IndiaMart', 'Bhimashankar Desai', 'Solapur', 'Maharashtra', 'Solapur, Maharashtra', '2022-05-09', NULL, NULL, 'I am looking for service provider for Graphic Design Service,Kannada language class Kindly send me price and other details.<br>Service Location : Solapur<br>Probable Requirement Type : Business Use<br>', '5000', NULL, 'Bhimashankar Desai', 'desaibhimashankar757@gmail.com', '+91-9529304435', 1, 1, 'send quotation', '2022-05-13T14:47', NULL, '2022-05-11 10:57:25', '2022-06-15 07:46:57', NULL, NULL),
(287, 'QRN-6301', 'Direct', 'demo', 'pune', 'WEST', NULL, '2022-12-02', '2022-12-13', NULL, 'demo', '100', 'HOT', 'demo', 'demo@demo.com', '9898987898', 1, 1, NULL, NULL, NULL, '2022-12-30 17:15:54', '2022-12-30 11:45:54', NULL, NULL),
(288, 'QRN-6302', 'Direct', 'demo', 'pune', 'WEST', NULL, '2022-12-08', NULL, NULL, 'demo', NULL, NULL, 'demo', NULL, '+91 989878987', 1, 29, NULL, NULL, NULL, '2022-12-30 17:16:35', '2022-12-30 11:46:35', NULL, NULL),
(289, 'QRN-6300', NULL, 'Poly Chem Fabricators', 'Mumbai', 'MH', NULL, '2021-06-16', '2021-06-17', 'YS', 'Agitator', '4515000', 'WARM', 'Vaibhavi Kokate', 'vaibhavi@polychemfab.com', '8369700242', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(290, 'QRN-6301', NULL, 'Sai Bio Med', 'Nashik', 'MH', NULL, '2021-06-18', '2021-06-18', 'PHD', 'Packing', '20000', 'WARM', 'Amol Ghadge', 'saibiomed9@gmail.com', '9511778194', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(291, 'QRN-6302', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-10', '2021-06-10', 'KVB', 'Metallic Tanks', '13765000', 'LOST', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(292, 'QRN-6303', NULL, 'MTPI Products Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-06-10', '2021-06-10', 'PS', 'Design and Hydralic of LLE', '80000', 'BUDGETARY', 'Vishal Jadhav', 'vjadhav@mtpi.net.in', '8108613237', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(293, 'QRN-6304', NULL, 'Thssenkrupp Industrial Solutions India Pvt ltd', 'Pune', 'MH', NULL, '2021-06-09', '2021-07-05', 'PMD', 'Columns / Scrubbers', '293877000', 'BUDGETARY', 'Sachin Bhat', 'sachin.bhat@thyssenkrupp.com', '9890038923', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(294, 'QRN-6305', NULL, 'Xytel  India Pvt Ltd', 'Pune', 'MH', NULL, '2021-06-11', NULL, 'PHD', 'Packing', NULL, NULL, 'Shailesh Kulkarni', 'shailesh@xytelindia.com', '9822441844', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(295, 'QRN-6306', NULL, 'UPL Ltd', 'Jhagadia', 'WEST', NULL, '2021-05-08', NULL, 'PHD', 'Internals', '319000', 'BUDGETARY', 'Shobha Thakur', 'shobha.thakur@shroffindia.com', '7045517526', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(296, 'QRN-6307', NULL, 'Hemani Industries Ltd', 'Mumbai', 'MH', NULL, '2021-06-12', '2021-06-14', 'PHD', 'Packing', '1585250', 'HOLD', 'Manoj Pande', 'purchase1@hemanigroup.com', '9377064871', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(297, 'QRN-6308', NULL, 'Pleiad Design & Engineering', 'Pune', 'MH', NULL, '2021-05-14', NULL, 'NSM', 'Demister Pads', NULL, NULL, 'Manisha Burde', 'manisha.b@pleiad.in', '8956439809', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(298, 'QRN-6309', NULL, 'Optimum Engineers', 'Vadodara', 'WEST', NULL, '2021-05-15', '2021-05-15', 'NSM', 'Structured Packing', '40000', 'BUDGETARY', 'Parth Patel', 'optimumengineers06@gmail.com', '9586180599', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(299, 'QRN-6310', NULL, 'Pleiad Design & Engineering', 'Pune', 'MH', NULL, '2021-05-16', NULL, 'NSM', 'Demister', NULL, NULL, 'Manisha Burde', 'manisha.b@pleiad.in', '8956439809', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(300, 'QRN-6311', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-05-14', '2021-06-22', 'PS', 'Vessel & Heat Exchanger', '800000', 'ORDER', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(301, 'QRN-6312', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-05-14', '2021-06-22', 'KVB', 'Column', '7055000', 'ORDER', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(302, 'QRN-6313', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-05-14', '2021-06-23', 'PHD', 'Internals', '68000', 'LOST', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(303, 'QRN-6314', NULL, 'CSIR-Institute of Minerals and Materials Technology', 'Bhubaneswar', 'NORTH', NULL, '2021-05-03', NULL, 'YS', 'Reactor', NULL, NULL, 'Dr V. Aishvarya', 'v.aishvarya@gmail.com', '7735849811', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(304, 'QRN-6315', NULL, 'HAT-11133', 'UK', 'EXPORT', NULL, '2021-05-06', '2021-05-06', 'NSM', 'VID & Vane Pack', '184000', 'BUDGETARY', 'Daniel Matthews', 'daniel@hatltd.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(305, 'QRN-6316', NULL, 'Air Poll Engineering', 'Ahmedabad', 'WEST', NULL, '2021-05-18', '2021-05-22', 'NSM', 'Structured Packing', '487000', NULL, 'Rahul Suryavanshi', 'sales@airpoll.co.in', '9712827889', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(306, 'QRN-6317', NULL, 'Rand Polyproducts Pvt Ltd', 'Pune', 'MH', NULL, '2021-06-15', NULL, 'YS', 'Reactor', NULL, NULL, 'Nishant Inamdar', 'ninamdar@randpoly.com', '8275271473', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(307, 'QRN-6318', NULL, 'Alcon Biosciences Pvt Ltd', 'Vapi', 'WEST', NULL, '2021-07-15', NULL, 'PHD', 'Structured packing and internals', NULL, NULL, 'Gyana ranjan Sethi', NULL, '9723648503', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(308, 'QRN-6319', NULL, 'Pallavi Techno Foods Pvt Ltd', 'Pune', 'MH', NULL, '2021-05-14', '2021-05-19', 'PMD', 'MEE', '17480000', NULL, 'Shekhar Gadgil', 'sgadgil1@yahoo.co.in', '9823051616', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(309, 'QRN-6320', NULL, 'Skyl and Metal', 'Mumbai', 'MH', NULL, '2021-05-18', '2021-05-18', 'PHD', 'Bubble cap', '5295000', 'WARM', 'Piyush Bhansali', 'sales@skylandmetal.in', '9930552852', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(310, 'QRN-6321', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-05-18', NULL, 'KVB', 'Column , Vessels & Heat Exchanger', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(311, 'QRN-6322', NULL, 'Wanburry ltd', 'Panvel', 'MH', NULL, '2021-04-19', NULL, 'PHD', 'Structured Packing', NULL, NULL, 'Manoj Bhadoriya', 'manoj.bhadoriya@wanbury.com', '7774009459', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(312, 'QRN-6323', NULL, 'Pemac Projects Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-05-19', NULL, 'PHD', 'Structured Packing', NULL, NULL, 'Anjali Joshi', 'purchase.pemac@gmail.com', '9324966750', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(313, 'QRN-6324', NULL, 'Kutch Chemicals Industries Ltd', 'Vadodara', 'WEST', NULL, '2021-06-12', NULL, 'YS', 'Vent Scrubber', NULL, NULL, 'Vivek Jain', 'vivek.jain@kcil.co.in', '7987764963', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(314, 'QRN-6325', NULL, 'Oil India', 'Bagajan Assam', 'NORTH', NULL, '2021-05-21', NULL, 'NB', 'Gas Dehydration Package', NULL, NULL, 'tender', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(315, 'QRN-6326', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-18', '2021-06-21', 'KVB', 'Gasket', '56000', NULL, 'Ramakant Singh', 'ramakant.singh@gfl.co.in', '9560337908', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(316, 'QRN-6327', NULL, 'SRF Ltd', 'Dahej', 'WEST', NULL, '2021-06-21', NULL, 'NSM', 'Packing & Internal', NULL, NULL, 'Raghav Asthana', 'raghav.asthana@srf.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(317, 'QRN-6328', NULL, 'Godavari Biorefineries Ltd', 'Mumbai', 'MH', NULL, '2021-06-18', NULL, 'PS', 'Column', NULL, NULL, 'Somnath Nalawade', 'nalawade.somnath@somaiya.com', '9920342731', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(318, 'QRN-6329', NULL, 'Balaji Amines', 'Solapur', 'MH', NULL, '2021-06-11', NULL, 'NSM', 'Demister', NULL, NULL, 'GRM', 'grm@balajiamines.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(319, 'QRN-6330', NULL, 'SRF Ltd', 'Dahej', 'WEST', NULL, '2021-06-21', NULL, 'PMD', 'Column & Heat Exchanger', NULL, NULL, 'Raghav Asthana', 'raghav.asthana@srf.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(320, 'QRN-6331', NULL, 'Jaguar Paints', 'Ankaleshwar', 'WEST', NULL, '2021-06-18', NULL, 'YS', 'Agitator', NULL, NULL, 'Shabuddin Sutar', NULL, '9822080607', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(321, 'QRN-6332', NULL, 'Jubilant Ingrevia Limited', 'Vilayat', 'WEST', NULL, '2021-06-22', '2021-06-22', 'NB', 'Tank', '2775000', NULL, 'Baljeet Singh', 'baljeet.singh@jubl.com', '9822080607', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(322, 'QRN-6333', NULL, 'Startpoint', 'Kuwait', 'EXPORT', NULL, '2021-06-22', NULL, 'NSM', 'Internals & Packing', NULL, NULL, 'Talal Alburaias', 'talalmh74@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(323, 'QRN-6334', NULL, 'Energy Works Technology Limited', 'Nigeria', 'EXPORT', NULL, '2021-06-14', NULL, 'NB', 'Tanks', NULL, NULL, 'Chinelo Anisiobi', 'c.anisiobi@energyworkstechnology.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(324, 'QRN-6335', NULL, 'Privi Speciality Chemical Ltd', 'Mahad', 'MH', NULL, '2021-05-26', '2021-06-23', 'PS', 'Acetic Acid Recovery System', '100000000', NULL, 'Uttam kumar Sinha', 'uttam.sinha@privi.co.in', '9930262733', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(325, 'QRN-6336', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-22', NULL, 'KVB', 'Column, HE and Vessel', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(326, 'QRN-6337', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-22', NULL, 'KVB', 'Heat Exchangers', '1588000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(327, 'QRN-6338', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-22', '2021-07-06', 'KVB', 'Column', '12970000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(328, 'QRN-6339', NULL, 'Eternis fine chemicals', 'Pune', 'MH', NULL, '2021-06-21', '2021-06-24', 'PHD', 'Random Packing', NULL, NULL, 'Mr. sulay shaha', 'sulay.shah@eternis.com', '8412009933', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(329, 'QRN-6340', NULL, 'AF Engineering', 'Japan', 'EXPORT', NULL, '2021-06-04', NULL, 'PHD', 'Random Packing', NULL, NULL, 'Kazuo Watari', 'watari@afengineering.jp', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(330, 'QRN-6341', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-25', NULL, 'PS', 'Vessel', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(331, 'QRN-6342', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-25', NULL, 'PS', 'Vessel 2 Nos.', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(332, 'QRN-6343', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-25', NULL, 'PS', 'Heat Exchanger', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(333, 'QRN-6344', NULL, 'Simtech Separation Technologies', 'Pune', 'MH', NULL, '2021-06-27', NULL, 'PHD', 'Lab Packing', NULL, NULL, 'Jitendra Nivargi', NULL, '9371275504', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(334, 'QRN-6345', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-24', '2021-06-28', 'PS', 'Reflux Dryer', '790000', 'ORDER', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(335, 'QRN-6346', NULL, 'Gujarat Fluorochemicals Limited', 'Dahej', 'WEST', NULL, '2021-06-28', NULL, 'PHD', 'Structured packing and internals', NULL, NULL, 'H.R.Patel', 'hrpatel@gfl.co.in', '9925090560', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(336, 'QRN-6347', NULL, 'D Technology Pvt Ltd', 'Pune', 'MH', NULL, '2021-06-25', NULL, 'NB', 'Mixing Package', NULL, NULL, 'Atul Chavan', 'atul.chavan@dtechnology.ooo', '7506942061', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(337, 'QRN-6348', NULL, 'Global Turnaround Services Company', 'Pune', 'MH', NULL, '2021-06-29', NULL, 'PHD', 'Structure packing', NULL, NULL, 'Siddharth Daware', 'info.gtascompany@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(338, 'QRN-6349', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-29', NULL, 'PS', 'Vessel', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(339, 'QRN-6350', NULL, 'Poly Chem Fabricators', 'Thane', 'MH', NULL, '2021-06-24', NULL, 'YS', 'Agitator', NULL, NULL, 'Vaibhavi Kokate', 'vaibhavi@polychemfab.com', '8369700242', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(340, 'QRN-6351', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-22', '1970-01-01', 'PHD', 'Structured Packing', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(341, 'QRN-6352', NULL, 'Gabriel India Ltd', 'Nashik', 'MH', NULL, '2021-06-28', '2021-06-30', 'SSK', 'MEE and ATFD', '5430000', NULL, 'Mr.Sudam Pawar', 'sudam.pawar@gabriel.co.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(342, 'QRN-6353', NULL, 'Eternis Fine Chemical Ltd', 'Pune', 'MH', NULL, '2021-06-30', '2021-07-01', 'PHD', 'Wire Mesh Packing', '300000', NULL, 'Mr. sulay shaha', 'sulay.shah@eternis.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(343, 'QRN-6354', NULL, 'Peri Nitrates Pvt Ltd', 'Kurkumbh', 'MH', NULL, '2021-06-28', '2021-07-01', 'YS', 'WFE', '4900000', NULL, 'T. V Sarma', 'perinitrates@yahoo.co.in', '8830687251', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(344, 'QRN-6354', NULL, 'Peri Nitrates Pvt Ltd', 'Kurkumbh', 'MH', NULL, '2021-06-28', '2021-07-01', 'YS', 'WFE', '4900000', NULL, 'T. V Sarma', 'perinitrates@yahoo.co.in', '8830687251', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(345, 'QRN-6355', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-01', '2021-07-03', 'PHD', 'Random Packing', '330000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(346, 'QRN-6356', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-01', '2021-07-01', 'PS', 'Heat exchanger and vessels', '2654000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(347, 'QRN-6357', NULL, 'Enpro Industries Pvt Ltd', 'Pimpri', 'MH', NULL, '2021-06-30', '2021-07-05', 'PMD', 'Condensate Pot', '2260000', NULL, 'Rashmi Bhosale', 'rashmi.bhosale@enproindia.com', '9673005236', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(348, 'QRN-6358', NULL, 'Arvind Envisol Pvt Ltd', 'Ahmedabad', 'WEST', NULL, '2021-06-30', '2021-07-02', 'YS', 'Static Mixer', '805000', NULL, 'Jitendra Nagar', 'jitendra.nagar@arvind.in', '9833069488', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(349, 'QRN-6359', NULL, 'Balaji Amines', 'Solapur', 'MH', NULL, '2021-07-02', NULL, 'PHD', 'Demister', NULL, NULL, 'Mr.  Laxman V. Limkar', NULL, '9623444386', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(350, 'QRN-6360', NULL, 'Orlin Stefanov', 'Turkey', 'EXPORT', NULL, '2021-06-30', '2021-07-02', 'MJP', 'Wiped Film Evaporator', '2920000', NULL, 'Orlin Stefanov', 'orlin.stefonov59@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(351, 'QRN-6361', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-28', NULL, 'KVB', 'Scrubber Package', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(352, 'QRN-6362', NULL, 'Neilsoft Ltd', 'Pune', 'MH', NULL, '2021-07-01', NULL, 'PMD', 'CIP tank', NULL, NULL, 'Tushar Gaikwad', 'nbrprocurement@neilsoft.com', '9975753145', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(353, 'QRN-6363', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'MH', NULL, '2021-07-01', NULL, 'PS', 'Vessels', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(354, 'QRN-6364', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-03', NULL, 'PS', 'Heat Exchanger', '4400000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(355, 'QRN-6365', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-03', NULL, 'PS', 'Heat Exchanger', NULL, NULL, 'Dipanshi Singh', 'dipanshi.singh@gfl.co.in', '8318422636', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(356, 'QRN-6366', NULL, 'SRF Limited', 'Gurugram', 'NORTH', NULL, '2021-06-29', '2021-07-03', 'PHD', 'Structured packing and internals', '5030000', NULL, 'Abhishek Girdhar', 'Abhishek.Girdhar1@srf.com', '9311661548', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(357, 'QRN-6367', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-03', '2021-06-05', 'KVB', 'Heat Exchanger', '1110000', 'LOST', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(358, 'QRN-6367', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-03', '2021-06-05', 'KVB', 'Heat Exchanger', '1110000', 'LOST', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(359, 'QRN-6368', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-05', '2021-07-05', 'KVB', 'Hairpin Type Heat Exchanger', '200000', 'LOST', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(360, 'QRN-6369', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-05', NULL, 'PS', 'CANCEL QRN', NULL, NULL, 'Pankaj Karnatak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(361, 'QRN-6370', NULL, 'AF Engineering', 'Japan', 'EXPORT', NULL, '2021-07-02', NULL, 'NSM', 'Tarys', NULL, NULL, 'Kazuo', 'watari@afengineering.jp', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(362, 'QRN-6371', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-09', '2021-07-12', 'KVB', 'IPA Water Distillation Column', '3000000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(363, 'QRN-6372', NULL, 'Oriental Aromatics', 'Bareilly', 'NORTH', NULL, '2021-06-30', '2021-07-07', 'NB', 'Heat Exchanger', '345000', NULL, 'Nikita Sawant', 'purchase_engg@orientalaromatics.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(364, 'QRN-6373', NULL, 'Peri Nitrates Pvt Ltd', 'Kurkumbh', 'MH', NULL, '2021-07-07', '2021-07-07', 'YS', 'Static Mixer', '152500', NULL, 'T. V Sarma', 'perinitrates@yahoo.co.in', '8830687251', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(365, 'QRN-6374', NULL, 'Vidyan Biocommerce Pvt Ltd', 'Navi Mumbai', 'MH', NULL, '2021-07-06', '2021-07-07', 'PMD', 'Condensate Tank', '375000', 'WARM', 'Payal Niswade', 'payal.niswade@vidyanbio.com', '7620646275', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL);
INSERT INTO `enquiry` (`id`, `qrn`, `enq_from`, `customer_name`, `city`, `region`, `address`, `enq_date`, `qte_date`, `engineer`, `description`, `price`, `status`, `contact_person`, `email`, `phone`, `admin_id`, `assignee`, `reminder_note`, `reminder_date`, `enq_labels`, `created_at`, `updated_at`, `so no`, `remark`) VALUES
(366, 'QRN-6375', NULL, 'Raks Pharma', 'Dahej', 'WEST', NULL, '2021-07-06', '2021-07-08', 'PMD', 'Solvent Recovery System', '9850000', 'BUDGETARY', 'Mr. Tapas', 'production@rakspharma.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(367, 'QRN-6376', NULL, 'Cadila Pharmaceuticals Ltd', 'Ankleshwar', 'WEST', NULL, '2021-07-08', '2021-07-09', 'PHD', 'Structured Packing', '356000', NULL, 'Faizanul Haque', 'faizanul.haque@cadilapharma.co.in', '8583921039', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(368, 'QRN-6377', NULL, 'Arslan Engineering Ltd', 'Mumbai', 'MH', NULL, '2021-06-29', '2021-07-12', 'YS', 'ATFE & WFE', '5250000', NULL, 'Malik', 'malik@arslanenginery.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(369, 'QRN-6378', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-12', '2021-07-12', 'NSM', 'Packing and Internals', '660000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(370, 'QRN-6379', NULL, 'Chemion Engineering', 'Pune', 'MH', NULL, '2021-07-05', '2021-07-12', 'YS', 'Static Mixer', '123750', NULL, 'V M Gopalakrishnan', 'support@chemionengg.com', '9923751310', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(371, 'QRN-6380', NULL, 'Syed Zaheer Ahmed', 'Hyderabad', 'SOUTH', NULL, '2021-01-07', '2021-07-12', 'PMD', 'Steam Distillation', '3300000', 'BUDGETARY', 'Syed Zaheer Ahmed', 'zaheer77@gmail.com', '8310337856', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(372, 'QRN-6381', NULL, 'Air Science Technologies', 'Faridabad', 'NORTH', NULL, '2021-07-12', '2021-07-14', 'PMD', 'Piping Material', '1060000', 'WARM', 'Harish Sharma', 'hsharma@airscience.net', '8287491124', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(373, 'QRN-6382', NULL, 'Air Science Technologies', 'Faridabad', 'NORTH', NULL, '2021-06-24', '2021-07-14', 'PMD', 'Filter housings', '1780000', NULL, 'Harish Sharma', 'hsharma@airscience.net', '8287491124', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(374, 'QRN-6383', NULL, 'Gujarat Fluorochemicals Limited', 'Jolva', 'WEST', NULL, '2021-07-09', '2021-07-17', 'KVB', 'HF & OFF-GAS Scrubber', '68530000', 'WARM', 'Ravindra kumar', 'ravindra.kumar@gfl.co.in', '8287833334', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(375, 'QRN-6384', NULL, 'Saudi Multichem', 'Saudi Arabia', 'EXPORT', NULL, '2021-07-23', NULL, 'MJP', 'MEG Distillation System Supply', NULL, 'BUDGETARY', 'Sahir Honda', 'sahir.honda@saudi-multichem.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(376, 'QRN-6385', NULL, 'ENPRO Industries Pvt Ltd', 'Pune', 'MH', NULL, '2021-07-08', NULL, 'NB', '2 Phase Separator', NULL, 'BUDGETARY', 'Umair Haidey', 'umair.haidery@enproindia.com', '9372513244', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(377, 'QRN-6386', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-07-13', '2021-07-15', 'NSM', 'Tray', '4465000', NULL, 'Sharad Kadam', 'Sharad.Kadam@laxmi.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(378, 'QRN-6387', NULL, 'Benzo Chem Industries Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-07-14', NULL, 'PHD', 'Random Packing Internals', NULL, NULL, 'Shrimant Kembhavi', 'purchasedahej@benzochem.co.in', '7021857761', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(379, 'QRN-6388', NULL, 'Matrix Fine Science Pvt Ltd', 'Aurangabad', 'MH', NULL, '2021-07-14', '2021-07-16', 'YS', 'Column, Vessel, ATFE & FFE', '19420000', 'WARM', 'Kalim Inamdar', 'kalim@matrixfinesciences.com', '7767812182', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(380, 'QRN-6389', NULL, 'Triplan  India Pvt Ltd', 'Pune', 'MH', NULL, '2021-06-29', NULL, 'PS', 'Distillation System', NULL, NULL, 'Sudeep Gaikwad', 'sudeep.gaikwad@triplan.com', '9004394338', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(381, 'QRN-6390', NULL, 'Eternis Fine Chemicals', 'Kurkumbh', 'MH', NULL, '2021-07-14', NULL, 'NSM', 'Structured Packing', NULL, NULL, 'Sulay Shah', 'sulay.shah@eternis.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(382, 'QRN-6391', NULL, 'IPS Mehtalia Pvt Ltd', 'Dahej', 'WEST', NULL, '2021-07-07', '2021-07-15', 'PMD', 'Column', NULL, 'BUDGETARY', 'Anil Sharma', 'anils@ips-mehtalia.com', '9819577916', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(383, 'QRN-6392', NULL, 'Corel Pharma Chem India Pvt Ltd', 'Ahmedabad', 'WEST', NULL, '2021-07-15', '2021-07-16', 'NB', 'Tank (150 KL)', '48300000', 'BUDGETARY', 'Piyush Patel', 'purchase@corelpharmachem.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(384, 'QRN-6393', NULL, 'Carbon Technolgy', 'Bengaluru', 'SOUTH', NULL, '2021-07-20', NULL, 'NSM', 'Packing', NULL, NULL, 'Shihabudeen.j', 'shihabjamal1@yahoo.com', '9637841060', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(385, 'QRN-6394', NULL, 'Vinati Organics Ltd', 'Ratnagiri', 'MH', NULL, '2021-07-15', '2021-07-19', 'NB', 'Distillation Column', '1982000', 'BUDGETARY', 'Tukaram Desai', 'tukaram.desai@vinatiorganics.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(386, 'QRN-6395', NULL, 'Emerson', 'Pune', 'MH', NULL, '2021-07-15', '1970-01-01', 'NSM', 'Demister', NULL, NULL, 'Mani.N', 'Manikandan.N@emerson.com', '9345770854', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(387, 'QRN-6396', NULL, 'Green Energy', 'Export', 'EXPORT', NULL, '2021-07-18', NULL, 'YS', 'Agitator', NULL, NULL, '.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(388, 'QRN-6396', NULL, 'Green Energy', 'Export', 'EXPORT', NULL, '2021-07-18', NULL, 'YS', 'Agitator', NULL, NULL, '.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(389, 'QRN-6397', NULL, 'Charms Chem Private Limited', 'Pune', 'MH', NULL, '2021-07-19', '2021-07-20', 'SSK', 'Supply of Matching flange', '11000', NULL, 'Mr. Milind Honavar', 'milindhonavar@gmail.com', '9890247473', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(390, 'QRN-6398', NULL, 'Mass Transfer Products', 'Mumbai', 'MH', NULL, '2021-07-19', NULL, 'NSM', 'Vane Packs', NULL, NULL, 'Vishal Jadhav', 'vjadhav@mtpi.net.in', '8108613237', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(391, 'QRN-6399', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-10', '2021-07-22', 'KVB', 'IPA Water Distilllation System', '22750000', 'WARM', 'Amey  Deshpande', 'amey.deshpande@gfl.co.in', '7700986610', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(392, 'QRN-6400', NULL, 'Wel Head Equipment Engineers', 'Vadodara', 'WEST', NULL, '2021-07-21', NULL, 'PHD', '2 Phase Seperator', NULL, NULL, 'Kumar Abhishek', 'kumar.a@wellheadequipmentengineers.com', '7903457563', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(393, 'QRN-6401', NULL, 'RESOLVERS', 'NA', 'MH', NULL, '2021-07-19', '2021-07-23', 'PHD', 'Demister Pad', '380000', NULL, 'Ajay M N', 'designexpert99@outlook.com', '7980707917', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(394, 'QRN-6402', NULL, 'Polychem Fabricator', 'Mumbai', 'MH', NULL, '2021-07-20', '2021-07-20', 'YS', 'MS Tank', '310000', 'WARM', 'Mangesh Kene', 'mangesh@polychemfab.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(395, 'QRN-6403', NULL, 'WS Engineering & Fabrication Pte Ltd', 'NA', 'EXPORT', NULL, '2021-07-20', NULL, 'NSM', 'NA', NULL, NULL, 'Elaimuthu Mahesh Kumar', 'mahesh.kumar@wascoenergy.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(396, 'QRN-6404', NULL, 'Arobindo Phrama Ltd', 'Cyberabad', 'NORTH', NULL, '2021-06-28', '2021-07-28', 'MN', 'Glacial Acetic Acid Plant', '140000000', 'WARM', 'V.P Singh', 'pulsingh.vadithe@aurobindo.com', '9989253444', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(397, 'QRN-6405', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnager', 'WEST', NULL, '2021-07-21', '2021-07-27', 'KVB', 'Hopper', '7120000', NULL, 'Abhijeet Gupta', 'abhijeet.gupta@gfl.co.in', '8950847698', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(398, 'QRN-6406', NULL, 'Jacobs', 'Mumbai', 'MH', NULL, '2021-07-22', '2021-07-23', 'PMD', 'Heat Exchanger', '1415000', 'BUDGETARY', 'Aniket More', 'aniket.more1@jacobs.com', '8424015715', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(399, 'QRN-6407', NULL, 'Anthem Bioscience', 'Bangalore', 'SOUTH', NULL, '2021-07-23', NULL, 'MJP', 'Heat Exchanger', NULL, NULL, 'Venkadesh D', 'venkadesh.d@anthembio.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(400, 'QRN-6408', NULL, 'Aarti Industries Ltd', 'Vadodara', 'WEST', NULL, '2021-07-26', NULL, 'NSM', 'Column Internal', NULL, NULL, 'Deep Desai', 'deep.desai@aarti-industries.com', '9687338907', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(401, 'QRN-6409', NULL, 'Vitech Equipments Pvt Ltd', 'Navi Mumbai', 'MH', NULL, '2021-07-27', '2021-07-29', 'PHD', 'Internals', '140000', 'BUDGETARY', 'Ryan Fernandes', 'ryan@vitechgroupindia.com', '9372766460', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(402, 'QRN-6409', NULL, 'Vitech Equipments Pvt Ltd', 'Navi Mumbai', 'MH', NULL, '2021-07-27', '2021-07-29', 'PHD', 'Internals', '140000', 'BUDGETARY', 'Ryan Fernandes', 'ryan@vitechgroupindia.com', '9372766460', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(403, 'QRN-6410', NULL, 'Tandon Solvents and Chemicals', 'New Delhi', 'NORTH', NULL, '2021-07-02', '2021-07-28', 'PMD', 'Glycol Recovery System', '42520000', 'BUDGETARY', 'Mr. Aarush Tandon', 'aarush@tandongroup.in', '9911373888', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(404, 'QRN-6411', NULL, 'Matrix Fine Science Pvt Ltd', 'Aurangabad', 'MH', NULL, '2021-07-26', '2021-07-28', 'YS', 'Condenser', '3493000', NULL, 'Kalim Inamdar', 'kalim@matrixfinesciences.com', '7767812182', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(405, 'QRN-6412', NULL, 'Chemdist Membrane System', 'Pune', 'MH', NULL, '2021-07-21', NULL, 'SSK', '6M2 WFE', '1600000', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(406, 'QRN-6413', NULL, 'Wel Head Equipment Engineers', 'Vadodara', 'WEST', NULL, '2021-07-21', NULL, 'NSM', '3 Phase Seperator', NULL, NULL, 'Kumar Abhishek', 'kumar.a@wellheadequipmentengineers.com', '7903457563', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:43', '2023-01-13 06:56:43', NULL, NULL),
(407, 'QRN-6414', NULL, 'Willowood Industries Pvt. Ltd', 'Dahej', 'WEST', NULL, '2021-07-27', '2021-07-30', 'NB', 'Tank', '8020000', NULL, 'Amrut Chauhan', 'amrutchauhan@willowood.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(408, 'QRN-6415', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnager', 'WEST', NULL, '2021-07-29', '2021-07-30', 'PHD', 'Distributor', '25000', 'BUDGETARY', 'Sumit Patil', 'sumit.patil@gfl.co.in', '9023732327', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(409, 'QRN-6416', NULL, 'Mott Macdonald', 'Mumbai', 'MH', NULL, '2021-07-30', '2021-08-06', 'NB', 'Reactor', '8020000', 'WARM', 'Mr. Parag Gandhi', 'parag.gandhi@mottmac.com', '9819017191', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(410, 'QRN-6417', NULL, 'Pragya life science', 'Mumbai', 'MH', NULL, '2021-07-30', '2021-07-31', 'PS', 'PTFE Strutured Packing', '3425000', 'WARM', 'Dipak Kumar Patel', 'dipak.sp@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(411, 'QRN-6418', NULL, 'Funke Heatex Engineering India Pvt Ltd.', 'Surat', 'WEST', NULL, '2021-07-29', '2021-08-11', 'YS', 'Agitators', '2990000', NULL, 'Pratik Modi', 'sales@funkeheatex.com', '7046062270', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(412, 'QRN-6419', NULL, 'Spectec Techno Projects Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-07-30', '2021-08-12', 'PHD', 'Strutured Packing', '486000', 'ORDER', 'Ms. Tejal', 'purchasespectec@gmail.com', '8929632125', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(413, 'QRN-6420', NULL, 'Kumar Metal Industries Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-08-02', '2021-08-13', 'PHD', 'Strutured Packing', '785000', 'BUDGETARY', 'Yatin Jayawant', 'yatin@kumarmetal.com', '9769773527', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(414, 'QRN-6421', NULL, 'Sandeep industries', 'Mumbai', 'MH', NULL, '2021-08-02', NULL, 'NSM', 'Packing Internals', NULL, NULL, 'Sandeep Mody', 'sandeep_mody@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(415, 'QRN-6422', NULL, 'PEMAC Projects Pvt Ltd', 'Navi Mumbai', 'MH', NULL, '2021-08-02', '2021-08-06', 'PHD', 'Structured Packing and Internals', '337000', 'BUDGETARY', 'Mr. Vikram Daur', 'purchase.pemac@gmail.com', '7045341212', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(416, 'QRN-6423', NULL, 'Kedia Carbon Private Limited', 'Odisha', 'WEST', NULL, '2021-08-03', '2021-08-03', 'PHD', 'Structured Packing and Internals', '3310000', NULL, 'Tanmay Kumar', 'acpl.tanmoy@gmail.com', '8319853644', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(417, 'QRN-6424', NULL, 'Air Science Technologies', 'Faridabad', 'NORTH', NULL, '2021-07-23', NULL, 'PMD', 'Flare Column', NULL, NULL, 'Harish Sharma', 'hsharma@airscience.net', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(418, 'QRN-6425', NULL, 'Synergie Ingredient', 'Bangalore', 'SOUTH', NULL, '2021-08-03', '2021-08-04', 'PHD', 'Structured Packing and Internals', '100000', NULL, 'Ram Prasad', 'ramprasad@synergieingredients.com', '7019465042', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(419, 'QRN-6426', NULL, 'Jacobs', 'Mumbai', 'MH', NULL, '2021-08-03', '2021-08-10', 'PMD', 'Heat Exchangers', '6667000', 'BUDGETARY', 'Aniket More', 'aniket.more1@jacobs.com', '8424015715', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(420, 'QRN-6427', NULL, 'Sudarshan Chemicals', 'Roha', 'MH', NULL, '2021-07-31', '2021-08-03', 'PS', 'Batch Distillation System', '840000', 'LOST', 'Ganesh Bhoj', 'gmbhoj@sudarshan.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(421, 'QRN-6428', NULL, 'HAT-11378/001', 'UK', 'EXPORT', NULL, '2021-08-06', '2021-08-11', 'PHD', 'Structured Packing', '221000', NULL, 'Daniel Matthews', 'daniel@hatltd.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(422, 'QRN-6429', NULL, 'Air Science Technologies', 'Faridabad', 'NORTH', NULL, '2021-08-06', '2021-08-10', 'NSM', 'Demister Pad', '60000', 'ORDER', 'Harish Sharma', 'hsharma@airscience.net', '8287491124', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(423, 'QRN-6430', NULL, 'Mott Macdonald', 'Mumbai', 'MH', NULL, '2021-07-27', '2021-08-09', 'PMD', 'Distillation Columns', NULL, 'BUDGETARY', 'Parag Gandhi', 'parag.gandhi@mottmac.com', '9819017191', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(424, 'QRN-6431', NULL, 'Tatva Chintan Pharma Chem Pvt Ltd', 'Dahej', 'WEST', NULL, '2021-07-31', '2021-08-09', 'YS', 'Solvent Recovery System with Reboiler', '20490000', NULL, 'Mr. Piyushbhi ( Technical )  / Mr. Rakesh', 'projects@tatvachintan.com', '7573046258', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(425, 'QRN-6432', NULL, 'Balaji Amines Limited', 'Secunderabad', 'SOUTH', NULL, '2021-08-07', '2021-08-11', 'PHD', 'Static Mixer', '150000', 'ORDER', 'LN Mohanty', 'projects@balajiamines.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(426, 'QRN-6433', NULL, 'Emcure  Pharmaceutical  Ltd', 'Kurkumbh', 'MH', NULL, '2021-08-06', NULL, 'NSM', 'Packed column and condenser', NULL, NULL, 'Gahineenath', 'Anand.Kulkarni@emcure.co.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(427, 'QRN-6434', NULL, 'WOG Technologies Pvt Ltd', 'Gurgoan', 'NORTH', NULL, '2021-08-07', '2021-08-07', 'MJP', 'Static Mixer', '45000', NULL, 'Nitin Patni', 'procurement@woggroup.com', '8178014220', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(428, 'QRN-6435', NULL, 'Polyplast Chemi Plant Pvt Ltd', 'Vadodara', 'WEST', NULL, '2021-08-06', NULL, 'PS', 'Reactor', NULL, NULL, 'Ashiwin Antiya', NULL, '9322588085', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(429, 'QRN-6436', NULL, 'Emcure  Pharmaceutical  Ltd', 'Mumbai', 'MH', NULL, '2021-08-07', NULL, 'NB', 'Column, HE and Packing', NULL, NULL, 'Anand Kulkarni', 'anand.kulkarni@emcure.co.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(430, 'QRN-6437', NULL, 'Delpro Equipments Pvt Ltd', 'Bhosari', 'MH', NULL, '2021-08-09', NULL, 'NSM', 'Mist Eliminator', NULL, NULL, 'Prashant Tiwari', 'purchase@delproequipments.com', '7620605757', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(431, 'QRN-6438', NULL, 'Salasar Synthetics', 'New Delhi', 'NORTH', NULL, '2021-08-09', NULL, 'NSM', 'Structured Packing and Internals', NULL, NULL, 'Pramod Kr. Aryan', 'purchase.parnamigroup@gmail.com', '9643191019', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(432, 'QRN-6439', NULL, 'Atul Ltd', 'Gujarat', 'WEST', NULL, '2021-08-16', '2021-08-16', 'PS', 'Ethanol Recovery System', '4600000', 'WARM', 'Rajiv Davda', 'rajiv_davda@atul.co.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(433, 'QRN-6440', NULL, 'Vertellus Specialty Materials (India) Private Limited', 'Vapi', 'WEST', NULL, '2021-08-13', NULL, 'YS', 'Static Mixer', NULL, NULL, 'Riki Patel', 'RPatel@Vertellus.com', '2536699959', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(434, 'QRN-6441', NULL, 'Grasim Industries Limited', 'Bharuch', 'WEST', NULL, '2021-08-16', '2021-08-16', 'PHD', 'Static Mixer', '24000', 'ORDER', 'Nirav Mehta', 'nirav.mehta@adityabirla.com', '8347004636', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(435, 'QRN-6442', NULL, 'John Bean Technologies India Private Limited', 'Pune', 'MH', NULL, '2021-09-08', NULL, 'KVB', 'Dish Ends', NULL, NULL, 'Vishal D. Wayal', 'vishal.wayal@jbtc.com', '9987212161', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(436, 'QRN-6443', NULL, 'UPL Ltd', 'Dahej', 'WEST', NULL, '2021-08-13', NULL, 'NSM', 'Column Internals', NULL, NULL, 'Shobha Thakur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(437, 'QRN-6444', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-08-14', '2021-08-20', 'NSM', '1000 Dia Tray with fittings', '1343000', NULL, 'Sharad Kadam', 'Sharad.Kadam@laxmi.com', '2067381200', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(438, 'QRN-6445', NULL, 'Atul Ltd', 'Gujarat', 'WEST', NULL, '2021-09-04', NULL, 'KVB', 'Methanol -EDC-Water', NULL, NULL, 'Harshit Shaha', NULL, '7383335025', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(439, 'QRN-6446', NULL, 'Bhagyoday tubes', 'Pune', 'MH', NULL, '2021-08-14', '2021-08-18', 'PHD', 'Random Packing', NULL, NULL, '207000', 'bhagyodaytubes@yahoo.com', '9873560176', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(440, 'QRN-6447', NULL, 'Meghmani Finechem Limited', 'Ahmedabad', 'WEST', NULL, '2021-08-14', '2021-08-17', 'PHD', 'Structured Packing and internals', '198000', 'ORDER', 'Virat Prajapati', 'virat.prajapati@meghmani.com', '7971761000', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(441, 'QRN-6448', NULL, 'NCPI', 'Kuwait', 'EXPORT', NULL, '2021-08-15', '2021-09-19', 'YS', 'Blender', '10290445', NULL, 'Tushar Das', 'tdas@ncpiq8.com', '9665946977', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(442, 'QRN-6449', NULL, 'UPL Ltd', 'Dahej', 'WEST', NULL, '2021-08-16', NULL, 'NB', 'Column', NULL, NULL, 'Shobha Thakur (Shroff)', NULL, '2266020929', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(443, 'QRN-6450', NULL, 'V B Engineers', 'Nashik', 'MH', NULL, '2021-08-16', NULL, 'PHD', 'Pall Ring random Packing', NULL, NULL, 'Vijay B. Patil', 'vbenggoffice@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(444, 'QRN-6451', NULL, 'Aarti Industries Ltd', 'Dahej', 'WEST', NULL, '2021-08-17', '2021-08-19', 'PHD', 'Structured Packing', '336000', 'WARM', 'Manal Mehta', 'manalmehta2@gmail.com', '9727713081', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(445, 'QRN-6452', NULL, 'Aarti Industries Ltd', 'Dahej', 'WEST', NULL, '2021-08-17', NULL, 'KVB', 'Column', NULL, NULL, 'Manal Mehta', 'manalmehta2@gmail.com', '9727713081', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(446, 'QRN-6453', NULL, 'Polychem Fabricator', 'Bhiwandi', 'MH', NULL, '2021-08-12', '2021-08-17', 'YS', 'Agitator', '175000', NULL, 'Vaibhavi Kokate', 'info@polychemfab.com', '8369700242', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(447, 'QRN-6454', NULL, 'Anshul Specialty Molecules Ltd', 'Roha', 'MH', NULL, '2021-08-17', '2021-08-17', 'PS', 'Top shaft', '60000', 'ORDER', 'Nandkumar Telange', 'telange@anshulchemicals.com', '8303878882', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(448, 'QRN-6455', NULL, 'Cadila Pharmaceuticals Ltd', 'Ankleshwar', 'WEST', NULL, '2021-08-14', '2021-08-18', 'PHD', 'Strutured Packing', '190000', NULL, 'Faizanul Haque', 'faizanul.haque@cadilapharma.co.in', '8583921039', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(449, 'QRN-6456', NULL, 'Gujarat Fluorochemicals Limited', 'Dahej', 'WEST', NULL, '2021-08-17', '2021-08-19', 'KVB', 'Vessel', '2725000', NULL, 'Vishakha Singh Negi', 'vishakha.singh@gfl.co.in', '8130043259', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(450, 'QRN-6457', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-08-11', '2021-08-18', 'NB', 'Tanks', '4837000', NULL, 'Sharad Kadam', 'sharad.kadam@laxmi.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(451, 'QRN-6458', NULL, 'Terraquaer Venture Pvt Ltd', 'Ahmeddabad', 'WEST', NULL, '2021-08-14', NULL, 'PHD', 'Statix Mixer', NULL, NULL, 'NA', 'hoterraquaer@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(452, 'QRN-6459', NULL, 'Green Joules', 'Pune', 'MH', NULL, '2021-08-14', '2021-08-18', 'PHD', 'Structured Packing', '13000', 'ORDER', 'Mr. Akash Patil', 'pakash@greenjoules.in', '9922384357', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(453, 'QRN-6460', NULL, 'Neevs Project', 'Pune', 'MH', NULL, '2021-08-18', '2021-08-18', 'PMD', 'Mixing Tank', '100000', 'CANCELLED', 'Mr. Nikhil Shah', 'info@neevs.co.in', '9823124444', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(454, 'QRN-6461', NULL, 'Arvind Envisol Ltd', 'Mumbai', 'MH', NULL, '2021-08-18', NULL, 'YS', 'Static Mixer', '634000', NULL, 'Jitendra Nagar', 'jitendra.nagar@arvind.in', '9833069488', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(455, 'QRN-6462', NULL, 'Y-Chem Consulting', 'Mumbai', 'MH', NULL, '2021-08-08', '2021-08-19', 'NB', 'Separation Package', '55078000', NULL, 'Yaqoob Ali', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(456, 'QRN-6463', NULL, 'Sarna chemicals', 'Vapi', 'WEST', NULL, '2021-08-16', '2021-08-19', 'PHD', 'Demister pad', '8000', 'ORDER', 'Pravat Kumar Sahoo', 'sm1@sarnachemicals.com', '8160548575', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(457, 'QRN-6464', NULL, 'Hat-11368/001', 'UK', 'EXPORT', NULL, '2021-08-17', NULL, 'NSM', 'VV type Plain Vane', NULL, NULL, 'Daniel Matthews', 'daniel@hatltd.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(458, 'QRN-6465', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-08-12', NULL, 'NSM', 'Packing', NULL, NULL, 'Rajan Gol', 'rajan.gol@gfl.co.in', '8849931897', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(459, 'QRN-6466', NULL, 'Azista Composites', 'Kerala', 'SOUTH', NULL, '2021-08-18', '2021-08-25', 'PHD', 'Vane Mist Eliminator', '103000', 'BUDGETARY', 'Rahul R', 'rahul.r@azistaindustries.com', '9633825109', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(460, 'QRN-6467', NULL, 'Aarti Industries Ltd', 'Vadodara', 'WEST', NULL, '2021-08-16', NULL, 'NSM', 'Rasching Ring', NULL, NULL, 'Pragi Shukla', 'pragi.shukla@aarti-industries.com', '9638231280', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(461, 'QRN-6468', NULL, 'PEMAC Projects Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-08-23', '2021-08-23', 'PHD', 'Structured Packing', '920000', 'ORDER', 'Anjali Joshi', 'purchase.pemac@gmail.com', '9324966750', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(462, 'QRN-6469', NULL, 'ACC GCI', 'Saudi Arabia', 'EXPORT', NULL, '2021-08-17', '2021-08-24', 'MJP', 'Heat Exchanger', '1168000', NULL, 'Md Inam Ur Rahman', 'm.rahman@acc-chemicals.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(463, 'QRN-6470', NULL, 'Anthem Bioscience', 'Banglore', 'SOUTH', NULL, '2021-08-20', '2021-08-26', 'MJP', 'Vessels', '6500000', NULL, 'Mr Venkadesh', 'venkadesh.d@anthembio.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(464, 'QRN-6471', NULL, 'Honor Lab Ltd', 'Hyderabad', 'SOUTH', NULL, '2021-08-25', '2021-08-31', 'MJP', 'Design Service', '400000', NULL, 'Mr Venu Madhav', 'venumadhav.s@honourlab.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(465, 'QRN-6472', NULL, 'Ingenero Technologies India Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-08-30', '2021-09-04', 'MJP', 'Heat Exchangers', '401500', NULL, 'Mr Shardul Shindadkar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(466, 'QRN-6473', NULL, 'Cosmo Speciality Chemical Pvt Ltd', 'Aurangabad', 'MH', NULL, '2021-08-21', '2021-08-25', 'NB', 'Reactor, Heat Exchanger, Column, Vessel Package', '5637000', NULL, 'Prashant Waghmare', 'prashant.waghmare@cosmochem.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(467, 'QRN-6474', NULL, 'Atul Ltd', 'Gujarat', 'WEST', NULL, '2021-07-23', '2021-08-25', 'KVB', 'Recovery System', '6600000', NULL, 'Rajiv Davda', 'Saurabh_Mamtora@atul.co.in', '9879570315', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(468, 'QRN-6475', NULL, 'Pragna  Life Science', 'Bharuch', 'WEST', NULL, '2021-08-23', NULL, 'NSM', 'Strutured Packing', NULL, NULL, 'jignesh patel', 'pragnalifescience@gmail.com', '9723812606', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(469, 'QRN-6476', NULL, 'Bodal Chemicals Ltd Unit VII', 'Vadodara', 'WEST', NULL, '2021-08-21', '2021-08-26', 'YS', 'AA Recovery System', '12545000', NULL, 'Waris Chaudhary', 'waris@bodal.com', '9512021573', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(470, 'QRN-6477', NULL, 'Navin Fluorine International Limited', 'Dewas', 'NORTH', NULL, '2021-08-23', '2021-08-30', 'YS', 'Reactor', '25300000', NULL, 'Shashank Vaidya', 'shashank.v@nfil.in', '8358920077', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(471, 'QRN-6478', NULL, 'Camline Fine Sciences Ltd', 'Mumbai', 'MH', NULL, '2021-06-14', '2021-08-25', 'PHD', 'Internals', '103000', NULL, 'Sushant Bhingarde', 'sushant.bhingarde@camlinfs.com', '9152727610', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(472, 'QRN-6479', NULL, 'Aarti Industries Ltd', 'Vapi', 'WEST', NULL, '2021-08-25', NULL, 'NSM', 'PTFE Flange', NULL, NULL, 'Aakash Patel', 'am.patel@aarti-industries.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(473, 'QRN-6480', NULL, 'Hypro Engineers  Pvt Ltd', 'Pune', 'MH', NULL, '2021-08-25', NULL, 'NSM', 'Structured Packings', NULL, NULL, 'Umesh Pawar', 'ced04@hypro.co.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(474, 'QRN-6481', NULL, 'PEMAC Projects Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-08-25', '2021-08-27', 'PHD', 'Structured Packing', '397000', 'ORDER', 'Anjali Joshi', 'purchase.pemac@gmail.com', '9324966750', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(475, 'QRN-6482', NULL, 'Allen Petrochemicals Pvt', 'Uttar Pradesh', 'NORTH', NULL, '2021-08-20', '2021-08-31', 'PMD', 'Solvent Recovery System', '46500000', 'BUDGETARY', 'Mr. Ankur Allen', 'info@allenpetro.com', '9837095799', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(476, 'QRN-6483', NULL, 'Jubilant Ingrevia Limited', 'Dahej', 'WEST', NULL, '2021-08-25', '2021-08-31', 'NB', 'Tanks', '8711000', NULL, 'Viraj Vinkar', 'viraj.vankar@jubl.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(477, 'QRN-6484', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-08-29', '2021-09-01', 'PHD', 'Bubble Cap Trays', '6850000', 'BUDGETARY', 'Vijay Wayal', 'vijay.wayal@laxmi.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(478, 'QRN-6485', NULL, 'SSEPL Techno Pvt Ltd', 'Pune', 'MH', NULL, '2021-08-31', '2021-08-31', 'YS', 'Agitator', '1460000', NULL, 'Shrikrishna Avdhut', 'sdavdhut@ssepl.co.in', '9168694265', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(479, 'QRN-6486', NULL, 'Pleiad  Design & Engineering', 'Pune', 'MH', NULL, '2021-08-28', NULL, 'NSM', 'Mesh + Vane Demister Pads', NULL, NULL, 'Manisha Burde', 'manisha.b@pleiad.in', '8956439809', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(480, 'QRN-6487', NULL, 'AF Engineering', 'Japan', 'EXPORT', NULL, '2021-08-28', '2021-09-02', 'PHD', 'Structured Packings and internals', '28000', NULL, 'Kazuo Watari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(481, 'QRN-6488', NULL, 'UPL Ltd', 'Dahej', 'WEST', NULL, '2021-08-30', NULL, 'NB', 'Scrubber and Internals', NULL, NULL, 'Shobha Thakur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(482, 'QRN-6489', NULL, 'Polyplast Chemi Plant Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-08-31', NULL, 'NSM', 'Titanium Distributor, hold down grid plate, Support grid plate', NULL, NULL, 'NA', 'purchase@polyplast.co.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(483, 'QRN-6490', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-08-11', '2021-09-01', 'NB', 'Column', '1558000', NULL, 'Vijay Wayal', 'vijay.wayal@laxmi.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(484, 'QRN-6491', NULL, 'Simon India Ltd', 'Delhi', 'NORTH', NULL, '2021-08-31', '2021-09-03', 'PMD', 'Stripper Column With Packing', '1106000', 'BUDGETARY', 'Ayush Sharma', 'Ayush.Sharma@adventz.com', '9953664916', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(485, 'QRN-6492', NULL, 'UPL Ltd', 'Dahej', 'WEST', NULL, '2021-08-30', NULL, 'NB', 'Column', NULL, NULL, 'Parag Gandhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(486, 'QRN-6493', NULL, 'Deccan Finechemicals (India) Pvt. Ltd', 'Hyderabad', 'SOUTH', NULL, '2021-08-23', '2021-09-01', 'NSM', 'Structured Packing (PTFE)', NULL, NULL, 'Amol Disale', 'amol.disale@deccanchemicals.com', '9121229227', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(487, 'QRN-6494', NULL, 'Fine Arc Engineering', 'Ahemadnagar', 'MH', NULL, '2021-08-28', '2021-07-01', 'PHD', 'Column Packing and internals', '10000', 'BUDGETARY', 'Mr. Amol Rahane', 'finearceng@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(488, 'QRN-6495', NULL, 'Eternis Fine Chemicals', 'Pune', 'MH', NULL, '2021-09-02', NULL, 'PHD', 'Random Packing and internals', '101000', 'ORDER', 'Sulay shah', 'sulay.shah@eternis.com', '8412009933', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(489, 'QRN-6496', NULL, 'Servotech India Ltd', 'Mumbai', 'MH', NULL, '2021-08-25', '2021-09-03', 'PS', 'Column', '4187000', 'WARM', 'Bhagyashree Pandhare', 'purchase@servotech-india.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(490, 'QRN-6497', NULL, 'Simon India Ltd', 'Delhi', 'NORTH', NULL, '2021-09-02', '2021-09-02', 'PMD', 'Knock out drum', '980000', 'BUDGETARY', 'Mr. Ayush Sharma', 'ayush.sharma@adventz.com', '9953664916', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(491, 'QRN-6498', NULL, 'Camlin Fine Sciences Ltd', 'Mumbai', 'MH', NULL, '2021-09-02', '2021-09-21', 'PHD', 'Static Mixer', '1362000', 'BUDGETARY', 'Sushant Bhingarde', 'sushant.bhingarde@camlinfs.com', '9152727610', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(492, 'QRN-6499', NULL, 'Harmony Organics Pvt Ltd', 'Kurkumbh', 'MH', NULL, '2021-09-02', '2021-09-04', 'PHD', 'Structured Packing', '2861000', 'ORDER', 'Sharad Rupnawar', 'engineering@harmonyorganics.in', '7709138262', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(493, 'QRN-6500', NULL, 'Sandip Industries', 'Mumbai', 'MH', NULL, '2021-09-01', '2021-09-03', 'PHD', 'Structured Packing', '230000', 'BUDGETARY', 'Sandeep Mody', 'sandeep_mody@yahoo.co.in', '9867212300', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(494, 'QRN-6501', NULL, 'Constro Solutions Pvt Ltd', 'Sinnar', 'MH', NULL, '2021-08-30', '2021-09-06', 'NB', 'Tank & Heat Exchanger', '1310000', NULL, 'Sanjay Deshpande', NULL, '8007771006', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(495, 'QRN-6502', NULL, 'Servotech India Ltd', 'Mumbai', 'MH', NULL, '2021-08-25', NULL, 'NSM', 'Structured Packing', NULL, NULL, 'Sandeep Agiwal', 'sandeep@servotech-india.com', '9821381810', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(496, 'QRN-6503', NULL, 'Nalco Water India Limited', 'Pune', 'MH', NULL, '2021-09-02', '2021-09-02', 'YS', 'Static Mixer', '225000', NULL, 'Rohan Gujar', 'rohan.gujar@ecolab.com', '9850005190', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(497, 'QRN-6504', NULL, 'Deccan Fine  Chemicals', 'Hyderabad', 'SOUTH', NULL, '2021-09-03', NULL, 'MJP', 'Static Mixer', '175000', NULL, 'Mr A.Bhuvana Chandar', 'bhuvana.chandar@deccanchemicals.com', '8886012335', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(498, 'QRN-6505', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-09-03', '2021-09-09', 'KVB', 'Neutralization Reactors', '21170000', NULL, 'Ravindra Kumar', 'ravindra.kumar@gfl.co.in', '8287833334', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(499, 'QRN-6506', NULL, 'Ingenero Technologies India Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-08-30', '2021-09-10', 'MJP', 'Heat Exchanger', '31390000', NULL, 'Mr Shardul Shindadkar', 'sshindadkar@ingenero.com', '7718819650', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(500, 'QRN-6507', NULL, 'EPP Composites Pvt Ltd', 'Gujarat', 'WEST', NULL, '2021-09-04', '2021-09-06', 'YS', 'Agitator', '132000', NULL, 'Khojema Diwasali', 'marketing@epp.co.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(501, 'QRN-6508', NULL, 'SSEPL Techno Pvt Ltd', 'Pune', 'MH', NULL, '2021-09-04', NULL, 'YS', 'Agitator', NULL, NULL, 'Shrikrishna Avdhut', 'sdavdhut@ssepl.co.in', '9168694265', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(502, 'QRN-6508', NULL, 'SSEPL Techno Pvt Ltd', 'Pune', 'MH', NULL, '2021-09-04', NULL, 'YS', 'Agitator', NULL, NULL, 'Shrikrishna Avdhut', 'sdavdhut@ssepl.co.in', '9168694265', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(503, 'QRN-6509', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-09-03', '2021-09-20', 'YS', 'Static Mixer', '130000', NULL, 'Dipanshi Singh', 'dipanshi.singh@gfl.co.in', '8318422636', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(504, 'QRN-6510', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-09-04', '2021-09-07', 'PHD', 'Bubble Cap tray', '8000000', 'BUDGETARY', 'Manoj Malaviya', 'manoj.malaviya@laxmi.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(505, 'QRN-6511', NULL, 'Matrix Fine Sciences Pvt. Ltd.', 'Aurangabad', 'MH', NULL, '2021-09-06', '2021-09-08', 'YS', 'Column, & Heat Exchanger', NULL, NULL, 'Kalim Inamdar', 'kalim@matrixfinesciences.com', '7767812182', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(506, 'QRN-6512', NULL, 'Servotex Engineers India Pvt. Ltd', 'Mumbai', 'MH', NULL, '2021-09-06', '2021-09-09', 'NSM', 'Methanol Column Internals', '912000', NULL, 'Tushar Rai', 'tushar.rai@servotexengineers.in', '7506176698', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(507, 'QRN-6513', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-09-07', '2021-09-09', 'NB', 'Column (2 Section)', '4100000', NULL, 'Manoj Malaviya', 'manoj.malaviya@laxmi.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(508, 'QRN-6514', NULL, 'Nalini Design And Solutions LLP', 'Pune', 'MH', NULL, '2021-09-09', '2021-09-17', 'PHD', 'Extraction Packing', '473000', 'BUDGETARY', 'Shirish Bhole', 'shirish.bhole@nalinids.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(509, 'QRN-6515', NULL, 'Supreme Industries', 'Chhattisgarh', 'NORTH', NULL, '2021-09-10', NULL, 'NSM', 'Structured Packing', NULL, NULL, 'Ks Bedi', 'ksbedit2@gmail.com', '9425234342', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(510, 'QRN-6516', NULL, 'Balaji Amines Ltd', 'Solapur', 'MH', NULL, '2021-09-12', NULL, 'NSM', 'Demister', NULL, NULL, 'G. Swapna', 'unit4purchase@balajiamines.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(511, 'QRN-6517', NULL, 'M.T.P.I Products Pvt. Ltd.', 'Mumbai', 'MH', NULL, '2021-09-14', '2021-09-14', 'PHD', 'Structured Packing & Internals', '2000000', NULL, 'Vikrant Bakshi', NULL, '9594968489', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(512, 'QRN-6518', NULL, 'AdichemTech', 'Mumbai', 'MH', NULL, '2021-09-13', NULL, 'YS', 'Autoclave', NULL, NULL, 'Mr. Sandip', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(513, 'QRN-6519', NULL, 'SSEPL  Techno Pvt Ltd', 'Pune', 'MH', NULL, '2021-09-14', '2021-09-15', 'YS', 'Agitator', '863000', NULL, 'Shrikrishna Avdhut', 'sdavdhut@ssepl.co.in', '9168694265', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(514, 'QRN-6520', NULL, 'Parmar Engineers', 'Mumbai', 'MH', NULL, '2021-09-14', NULL, 'NSM', 'NA', NULL, NULL, 'Ketan Parmar', 'contact@parmarengg.com', '8104924521', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(515, 'QRN-6521', NULL, 'Matrix Fine Sciences Pvt Ltd', 'Aurangabad', 'MH', NULL, '2021-09-15', '2021-09-17', 'PHD', 'Liquid Separator', '1593000', NULL, 'Kalim Inamdar', 'kalim@matrixfinesciences.com', '7767812182', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(516, 'QRN-6522', NULL, 'M.T.P.I Products Pvt. Ltd.', 'Mumbai', 'MH', NULL, '2021-09-14', NULL, 'NSM', 'Structured Packing', NULL, NULL, 'Romit Sawant', 'rsawant@mtpi.net.in', '8511987630', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(517, 'QRN-6523', NULL, 'Anupam Rasayan', 'Gujarat', 'WEST', NULL, '2021-09-16', '2021-09-16', 'YS', 'Reactor', NULL, NULL, 'Viral Muchhala', 'viral.muchhala@anupamrasayan.com', '8460881226', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(518, 'QRN-6524', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-09-16', NULL, 'KVB', 'Column & Kettle', NULL, NULL, 'Ravindra Kumar', 'ravindra.kumar@gfl.co.in', '8287833334', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(519, 'QRN-6525', NULL, 'Balaji Amines Limited', 'Solapur', 'MH', NULL, '2021-09-16', NULL, 'NSM', 'Poll Ring', NULL, NULL, 'G. Swapna', 'unit4purchase@balajiamines.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(520, 'QRN-6526', NULL, 'Pleiad  Design & Engineering', 'Pune', 'MH', NULL, '2021-09-09', '2021-09-17', 'NSM', 'Mesh + Vane Demister Pads', NULL, NULL, 'Manisha Burde', 'manisha.b@pleiad.in', '8956439809', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(521, 'QRN-6527', NULL, 'Charms Chem Private Limited', 'Pune', 'MH', NULL, '2021-09-17', '2021-09-17', 'SSK', '8 m2 WFE', '1600000', NULL, 'Mr. Milind Honavar', 'milindhonavar@gmail.com', '9890247473', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(522, 'QRN-6528', NULL, 'Bio Pharma Specialist', 'Pune', 'MH', NULL, '2021-09-17', '2021-09-18', 'NB', 'Reactor', '395000', NULL, 'Arun Kumar', 'biopharmaspecialists@gmail.com', '7887888018', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(523, 'QRN-6529', NULL, 'Jindal Specialty Chemicals India Pvt Ltd', 'Ahmedabad', 'WEST', NULL, '2021-09-16', '2021-09-23', 'YS', 'Top Mounted Condenser', '1330000', NULL, 'E D', 'ed@jindalfinechem.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(524, 'QRN-6530', NULL, 'Bodal Chemicals Ltd Unit VII', 'Vadodara', 'WEST', NULL, '2021-08-01', '2021-09-17', 'YS', 'Engineering of Existing Methanol Process', '300000', NULL, 'Waris Chaudhary', 'waris@bodal.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(525, 'QRN-6531', NULL, 'Apex Pharma', 'Dahej', 'WEST', NULL, '2021-09-17', '2021-09-18', 'PHD', 'Structured Packing', '335000', 'BUDGETARY', 'Manal Mehta', 'manalmehta2@gmail.com', '9727713081', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(526, 'QRN-6532', NULL, 'Aarti Industries Ltd', 'Vapi', 'WEST', NULL, '2021-09-04', '2021-10-01', 'PS', 'Striper Column', '25500000', NULL, 'Ankit Sharma', 'ankit.sharma@aarti-industries.com', '9643560070', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(527, 'QRN-6533', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-09-18', NULL, 'NB', 'Reaction Kettle', NULL, NULL, 'Manoj Malaviya', 'manoj.malaviya@laxmi.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(528, 'QRN-6534', NULL, 'Indofil Industries Limited', 'Mumbai', 'MH', NULL, '2021-09-20', '2021-09-21', 'PHD', 'Structured Packing & Internal', '48000', NULL, 'Prasad Kurkure', 'pkurkure@indofil.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(529, 'QRN-6535', NULL, 'Sandip Industries', 'Mumbai', 'MH', NULL, '2021-09-21', NULL, 'PHD', 'Structured Packing', NULL, NULL, 'Sandeep Mody', 'sandeep_mody@yahoo.co.in', '9867212300', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(530, 'QRN-6536', NULL, 'Ecolab', 'Hadpsar', 'MH', NULL, '2021-09-21', '2021-09-21', 'YS', 'SS 316 Static Mixer', '67000', NULL, 'Rahul Hajare', 'rahul.hajare@ecolab.com', '9975494413', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(531, 'QRN-6537', NULL, 'Spectec Techno Projects Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-09-21', NULL, 'PHD', 'Structured Packing', NULL, NULL, 'Ms. Tejal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(532, 'QRN-6538', NULL, 'Harmony Organics Pvt Ltd', 'Pune', 'MH', NULL, '2021-09-22', NULL, 'PHD', 'Internals', NULL, NULL, 'Sharad Rupnawar', NULL, '7709138262', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(533, 'QRN-6539', NULL, 'BEC Chemicals', 'Mumbai', 'MH', NULL, '2021-09-21', '2021-10-01', 'NB', 'Reactor Package', '30140000', NULL, 'Pratap Shinde', NULL, '9920258547', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(534, 'QRN-6540', NULL, 'Deccan fine Chemicals', 'Hyderabad', 'SOUTH', NULL, '2021-09-28', '2021-09-29', 'MJP', 'Static Mixer', '350000', NULL, 'Mr A.Bhuvana chandar', 'bhuvana.chandar@deccanchemicals.com', '8886012335', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(535, 'QRN-6541', NULL, 'Granules India Ltd', 'Hyderabad', 'SOUTH', NULL, '2021-09-23', NULL, 'MN', 'NA', NULL, NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(536, 'QRN-6542', NULL, 'Synergie Ingredient', 'Bangalore', 'SOUTH', NULL, '2021-09-22', '2021-09-23', 'KVB', 'Column', '550000', NULL, 'Ram Prasad', 'ramprasad@synergieingredients.com', '7019465042', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(537, 'QRN-6543', NULL, 'Mendas Pharma Pvt Ltd', 'Dahej', 'WEST', NULL, '2021-09-23', '2021-09-23', 'NB', 'Heat Exchanger', '6380000', NULL, 'Parth Mendpara', 'parth@mendas.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(538, 'QRN-6544', NULL, 'Ingenero Technologies India Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-09-22', '2021-09-23', 'KVB', 'Degion Charges', '200000', NULL, 'Deshik R Char', 'dchar@ingenero.com', '9930331316', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(539, 'QRN-6545', NULL, 'LNT Industrial Engineering Services', 'Bhosari', 'MH', NULL, '2021-09-17', NULL, 'NSM', 'Vane Pack', NULL, NULL, 'Ritesh Tolia', 'info@lntindustries.in', '9822210965', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL);
INSERT INTO `enquiry` (`id`, `qrn`, `enq_from`, `customer_name`, `city`, `region`, `address`, `enq_date`, `qte_date`, `engineer`, `description`, `price`, `status`, `contact_person`, `email`, `phone`, `admin_id`, `assignee`, `reminder_note`, `reminder_date`, `enq_labels`, `created_at`, `updated_at`, `so no`, `remark`) VALUES
(540, 'QRN-6546', NULL, 'Aarti Industires Ltd', 'Bharuch', 'WEST', NULL, '2021-09-20', '2021-09-24', 'KVB', 'Scrubber', '2350000', NULL, 'Yash M. Godhani', 'yashkumar.godhani@aarti-industries.com', '7575029096', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(541, 'QRN-6547', NULL, 'An Cryo Instruments Pvt Ltd', 'NA', 'MH', NULL, '2021-09-21', '2021-09-30', 'YS', 'Syngas to  Methanol Production Plant', '65000000', NULL, 'Mr. Amit Mukharjee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(542, 'QRN-6548', NULL, 'Sumaha Chemical', 'Mumbai', 'MH', NULL, '2021-09-28', NULL, 'NSM', 'CY Packing', '273000', NULL, 'Mahadev Raut', 'sumaha.chem@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(543, 'QRN-6549', NULL, 'YCS', 'Pune', 'MH', NULL, '2021-11-24', '2021-12-04', 'PS', 'Test desc', '98798', 'HOT', 'Manoj G', 'manoj@ycstech.in', '+1 9797897899', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(544, '2021366607', NULL, 'Robert', NULL, NULL, NULL, '18 Dec 2021', NULL, NULL, 'I am looking for service provider for Website Development Services, With Online Support.\nThe main purpose of the site is to List Escorts, Content sellers, Agencies, and members. Escorts can either choose how they want to provide their personal Services. ', NULL, NULL, NULL, 'maxwellgis@gmail.com', '+27-658950174', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(545, '2021223028', NULL, 'Zafer', NULL, NULL, NULL, '18 Dec 2021', NULL, NULL, 'I am looking for service provider for Adsense Account Service.\n\nKindly send me price and other details.', NULL, NULL, NULL, 'zaf_gunay@hotmail.com', '+90-5393751441', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(546, '416782094', NULL, 'Ibrahim Shaikh', 'Mumbai', 'Maharashtra', NULL, '18 Dec 2021', NULL, NULL, 'I am looking for B2B Portal Design Services.\nwhite label\nKindly send me price and other details.<br>Service Location : Pan India', NULL, 'HOT', NULL, 'ibbushaikh40@gmail.com', '+91-7738282644', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(547, '416781997', NULL, 'Harsh', 'Jalandhar', 'Punjab', NULL, '18 Dec 2021', NULL, NULL, 'I am looking for service provider for Ecommerce Solutions.\n\nKindly send me price and other details.<br>Service Location : Jalandhar<br>Usage/Application : Flipkart', NULL, NULL, NULL, 'harshsarangal438@gmail.com', '+91-7009010696', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(548, '2020407940', NULL, 'Raju', NULL, NULL, NULL, '17 Dec 2021', NULL, NULL, 'I am looking for service provider for Online Lottery Website Designing.\n\nKindly send me price and other details.\n\n Service Location:   Kolkata', NULL, 'HOT', NULL, 'Raju.khan019238@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(549, '431275379', NULL, 'Manoj Chauhan', 'Jammu', 'Jammu & Kashmir', NULL, '25 Jan 2022', NULL, NULL, 'I am looking for service provider for ERP Software Development.\n\nKindly send me price and other details.<br>I am interested in : ERP Software Development<br>Service Location : University Of Jammu, Jammu<br>Usage/Application : University Finance Use<br>T', NULL, NULL, NULL, 'mkcritu@rediffmail.com', '+91-9419151203', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(550, '2071458403', NULL, 'Prashant Joshi', 'Nagpur', 'Maharashtra', NULL, '15 Feb 2022', NULL, NULL, 'I am looking for Business to Consumer (B2C). \n\nKindly send me price and other details.\n\n Service Location:   Nagpur \n Usage/Application:   Heat Resistant Coating For Building \n\n\nAdditional Updates on Buyer\'s Requirement :\nPreferred Location: Serv', NULL, 'HOT', NULL, 'jjeminence@gmail.com', '+91-9403572478', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(551, 'QRN-6300', NULL, 'Test', 'Pune', 'MH', NULL, '2022-02-22', '2022-02-02', 'TW', 'test', '4000000', 'PO AWAITED', 'tsdes', 'test@yrdf.ddgf', '+91 9879879879', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(552, 'QRN-6300', NULL, 'Client 2', 'Pune', 'MH', NULL, '2022-02-22', '2022-02-02', 'TW', 'test', '2000000', 'PO AWAITED', 'tsdes', 'test@yrdf.ddgf', '+91 9879879879', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(553, '2140421910', NULL, 'Zaz Enterprises', 'Delhi', 'Delhi', NULL, '2022-05-11', NULL, NULL, 'Seller log in<br>Service Location : All india<br>Usage/Application : Multi<br>', NULL, NULL, 'Mohd Imran Warsi', 'imranwa67@gmail.com', '+91-9643585081', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(554, '2140313653', NULL, 'Krishna Rao Mundel Lok Sewa Foundation', 'Pune', 'Maharashtra', NULL, '2022-05-11', NULL, NULL, 'I am interested in Google Adwords Service<br>', NULL, NULL, 'Vikaram Krishnarao Mundhe', 'manishagawari18@gmail.com', '+91-9011908548', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(555, '472698401', NULL, 'Bhimashankar Desai', 'Solapur', 'Maharashtra', NULL, '2022-05-09', NULL, NULL, 'I am looking for service provider for Graphic Design Service,Kannada language class Kindly send me price and other details.<br>Service Location : Solapur<br>Probable Requirement Type : Business Use<br>', '5000', NULL, 'Bhimashankar Desai', 'desaibhimashankar757@gmail.com', '+91-9529304435', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(556, 'QRN-6301', NULL, 'demo', 'pune', 'WEST', NULL, '2022-12-02', '2022-12-13', NULL, 'demo', '100', 'HOT', 'demo', 'demo@demo.com', '9898987898', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(557, 'QRN-6302', NULL, 'demo', 'pune', 'WEST', NULL, '2022-12-08', NULL, NULL, 'demo', NULL, NULL, 'demo', NULL, '+91 989878987', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:26:44', '2023-01-13 06:56:44', NULL, NULL),
(558, 'QRN-6300', NULL, 'Poly Chem Fabricators', 'Mumbai', 'MH', NULL, '2021-06-16', '2021-06-17', 'YS', 'Agitator', '4515000', 'WARM', 'Vaibhavi Kokate', 'vaibhavi@polychemfab.com', '8369700242', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:30:26', '2023-01-13 07:00:26', NULL, NULL),
(559, 'QRN-6301', NULL, 'Sai Bio Med', 'Nashik', 'MH', NULL, '2021-06-18', '2021-06-18', 'PHD', 'Packing', '20000', 'WARM', 'Amol Ghadge', 'saibiomed9@gmail.com', '9511778194', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:30:26', '2023-01-13 07:00:26', NULL, NULL),
(560, 'QRN-6302', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-10', '2021-06-10', 'KVB', 'Metallic Tanks', '13765000', 'LOST', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:30:26', '2023-01-13 07:00:26', NULL, NULL),
(561, 'QRN-6303', NULL, 'MTPI Products Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-06-10', '2021-06-10', 'PS', 'Design and Hydralic of LLE', '80000', 'BUDGETARY', 'Vishal Jadhav', 'vjadhav@mtpi.net.in', '8108613237', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:30:26', '2023-01-13 07:00:26', NULL, NULL),
(562, 'QRN-6304', NULL, 'Thssenkrupp Industrial Solutions India Pvt ltd', 'Pune', 'MH', NULL, '2021-06-09', '2021-07-05', 'PMD', 'Columns / Scrubbers', '293877000', 'BUDGETARY', 'Sachin Bhat', 'sachin.bhat@thyssenkrupp.com', '9890038923', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:30:26', '2023-01-13 07:00:26', NULL, NULL),
(563, 'QRN-6305', NULL, 'Xytel  India Pvt Ltd', 'Pune', 'MH', NULL, '2021-06-11', NULL, 'PHD', 'Packing', NULL, NULL, 'Shailesh Kulkarni', 'shailesh@xytelindia.com', '9822441844', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:30:26', '2023-01-13 07:00:26', NULL, NULL),
(564, 'QRN-6306', NULL, 'UPL Ltd', 'Jhagadia', 'WEST', NULL, '2021-05-08', NULL, 'PHD', 'Internals', '319000', 'BUDGETARY', 'Shobha Thakur', 'shobha.thakur@shroffindia.com', '7045517526', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:30:26', '2023-01-13 07:00:26', NULL, NULL),
(565, 'QRN-6307', NULL, 'Hemani Industries Ltd', 'Mumbai', 'MH', NULL, '2021-06-12', '2021-06-14', 'PHD', 'Packing', '1585250', 'HOLD', 'Manoj Pande', 'purchase1@hemanigroup.com', '9377064871', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:30:26', '2023-01-13 07:00:26', NULL, NULL),
(566, 'QRN-6308', NULL, 'Pleiad Design & Engineering', 'Pune', 'MH', NULL, '2021-05-14', NULL, 'NSM', 'Demister Pads', NULL, NULL, 'Manisha Burde', 'manisha.b@pleiad.in', '8956439809', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:30:26', '2023-01-13 07:00:26', NULL, NULL),
(567, 'QRN-6309', NULL, 'Optimum Engineers', 'Vadodara', 'WEST', NULL, '2021-05-15', '2021-05-15', 'NSM', 'Structured Packing', '40000', 'BUDGETARY', 'Parth Patel', 'optimumengineers06@gmail.com', '9586180599', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:30:26', '2023-01-13 07:00:26', NULL, NULL),
(568, 'QRN-6301', NULL, 'demo', 'pune', 'WEST', NULL, '2022-12-02', '2022-12-13', NULL, 'demo', '100', 'HOT', 'demo', 'demo@demo.com', '9898987898', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:30:26', '2023-01-13 07:00:26', NULL, NULL),
(569, 'QRN-6302', NULL, 'demo', 'pune', 'WEST', NULL, '2022-12-08', NULL, NULL, 'demo', NULL, NULL, 'demo', NULL, '+91 989878987', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:30:26', '2023-01-13 07:00:26', NULL, NULL),
(570, 'QRN-6300', NULL, 'Poly Chem Fabricators', 'Mumbai', 'MH', NULL, '2021-06-16', '2021-06-17', 'YS', 'Agitator', '4515000', 'WARM', 'Vaibhavi Kokate', 'vaibhavi@polychemfab.com', '8369700242', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(571, 'QRN-6301', NULL, 'Sai Bio Med', 'Nashik', 'MH', NULL, '2021-06-18', '2021-06-18', 'PHD', 'Packing', '20000', 'WARM', 'Amol Ghadge', 'saibiomed9@gmail.com', '9511778194', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(572, 'QRN-6302', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-10', '2021-06-10', 'KVB', 'Metallic Tanks', '13765000', 'LOST', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(573, 'QRN-6303', NULL, 'MTPI Products Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-06-10', '2021-06-10', 'PS', 'Design and Hydralic of LLE', '80000', 'BUDGETARY', 'Vishal Jadhav', 'vjadhav@mtpi.net.in', '8108613237', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(574, 'QRN-6304', NULL, 'Thssenkrupp Industrial Solutions India Pvt ltd', 'Pune', 'MH', NULL, '2021-06-09', '2021-07-05', 'PMD', 'Columns / Scrubbers', '293877000', 'BUDGETARY', 'Sachin Bhat', 'sachin.bhat@thyssenkrupp.com', '9890038923', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(575, 'QRN-6305', NULL, 'Xytel  India Pvt Ltd', 'Pune', 'MH', NULL, '2021-06-11', NULL, 'PHD', 'Packing', NULL, NULL, 'Shailesh Kulkarni', 'shailesh@xytelindia.com', '9822441844', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(576, 'QRN-6306', NULL, 'UPL Ltd', 'Jhagadia', 'WEST', NULL, '2021-05-08', NULL, 'PHD', 'Internals', '319000', 'BUDGETARY', 'Shobha Thakur', 'shobha.thakur@shroffindia.com', '7045517526', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(577, 'QRN-6307', NULL, 'Hemani Industries Ltd', 'Mumbai', 'MH', NULL, '2021-06-12', '2021-06-14', 'PHD', 'Packing', '1585250', 'HOLD', 'Manoj Pande', 'purchase1@hemanigroup.com', '9377064871', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(578, 'QRN-6308', NULL, 'Pleiad Design & Engineering', 'Pune', 'MH', NULL, '2021-05-14', NULL, 'NSM', 'Demister Pads', NULL, NULL, 'Manisha Burde', 'manisha.b@pleiad.in', '8956439809', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(579, 'QRN-6309', NULL, 'Optimum Engineers', 'Vadodara', 'WEST', NULL, '2021-05-15', '2021-05-15', 'NSM', 'Structured Packing', '40000', 'BUDGETARY', 'Parth Patel', 'optimumengineers06@gmail.com', '9586180599', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(580, 'QRN-6310', NULL, 'Pleiad Design & Engineering', 'Pune', 'MH', NULL, '2021-05-16', NULL, 'NSM', 'Demister', NULL, NULL, 'Manisha Burde', 'manisha.b@pleiad.in', '8956439809', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(581, 'QRN-6311', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-05-14', '2021-06-22', 'PS', 'Vessel & Heat Exchanger', '800000', 'ORDER', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(582, 'QRN-6312', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-05-14', '2021-06-22', 'KVB', 'Column', '7055000', 'ORDER', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(583, 'QRN-6313', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-05-14', '2021-06-23', 'PHD', 'Internals', '68000', 'LOST', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(584, 'QRN-6314', NULL, 'CSIR-Institute of Minerals and Materials Technology', 'Bhubaneswar', 'NORTH', NULL, '2021-05-03', NULL, 'YS', 'Reactor', NULL, NULL, 'Dr V. Aishvarya', 'v.aishvarya@gmail.com', '7735849811', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(585, 'QRN-6315', NULL, 'HAT-11133', 'UK', 'EXPORT', NULL, '2021-05-06', '2021-05-06', 'NSM', 'VID & Vane Pack', '184000', 'BUDGETARY', 'Daniel Matthews', 'daniel@hatltd.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(586, 'QRN-6316', NULL, 'Air Poll Engineering', 'Ahmedabad', 'WEST', NULL, '2021-05-18', '2021-05-22', 'NSM', 'Structured Packing', '487000', NULL, 'Rahul Suryavanshi', 'sales@airpoll.co.in', '9712827889', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(587, 'QRN-6317', NULL, 'Rand Polyproducts Pvt Ltd', 'Pune', 'MH', NULL, '2021-06-15', NULL, 'YS', 'Reactor', NULL, NULL, 'Nishant Inamdar', 'ninamdar@randpoly.com', '8275271473', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(588, 'QRN-6318', NULL, 'Alcon Biosciences Pvt Ltd', 'Vapi', 'WEST', NULL, '2021-07-15', NULL, 'PHD', 'Structured packing and internals', NULL, NULL, 'Gyana ranjan Sethi', NULL, '9723648503', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(589, 'QRN-6319', NULL, 'Pallavi Techno Foods Pvt Ltd', 'Pune', 'MH', NULL, '2021-05-14', '2021-05-19', 'PMD', 'MEE', '17480000', NULL, 'Shekhar Gadgil', 'sgadgil1@yahoo.co.in', '9823051616', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(590, 'QRN-6320', NULL, 'Skyl and Metal', 'Mumbai', 'MH', NULL, '2021-05-18', '2021-05-18', 'PHD', 'Bubble cap', '5295000', 'WARM', 'Piyush Bhansali', 'sales@skylandmetal.in', '9930552852', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(591, 'QRN-6321', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-05-18', NULL, 'KVB', 'Column , Vessels & Heat Exchanger', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(592, 'QRN-6322', NULL, 'Wanburry ltd', 'Panvel', 'MH', NULL, '2021-04-19', NULL, 'PHD', 'Structured Packing', NULL, NULL, 'Manoj Bhadoriya', 'manoj.bhadoriya@wanbury.com', '7774009459', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(593, 'QRN-6323', NULL, 'Pemac Projects Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-05-19', NULL, 'PHD', 'Structured Packing', NULL, NULL, 'Anjali Joshi', 'purchase.pemac@gmail.com', '9324966750', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(594, 'QRN-6324', NULL, 'Kutch Chemicals Industries Ltd', 'Vadodara', 'WEST', NULL, '2021-06-12', NULL, 'YS', 'Vent Scrubber', NULL, NULL, 'Vivek Jain', 'vivek.jain@kcil.co.in', '7987764963', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(595, 'QRN-6325', NULL, 'Oil India', 'Bagajan Assam', 'NORTH', NULL, '2021-05-21', NULL, 'NB', 'Gas Dehydration Package', NULL, NULL, 'tender', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(596, 'QRN-6326', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-18', '2021-06-21', 'KVB', 'Gasket', '56000', NULL, 'Ramakant Singh', 'ramakant.singh@gfl.co.in', '9560337908', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(597, 'QRN-6327', NULL, 'SRF Ltd', 'Dahej', 'WEST', NULL, '2021-06-21', NULL, 'NSM', 'Packing & Internal', NULL, NULL, 'Raghav Asthana', 'raghav.asthana@srf.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(598, 'QRN-6328', NULL, 'Godavari Biorefineries Ltd', 'Mumbai', 'MH', NULL, '2021-06-18', NULL, 'PS', 'Column', NULL, NULL, 'Somnath Nalawade', 'nalawade.somnath@somaiya.com', '9920342731', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(599, 'QRN-6329', NULL, 'Balaji Amines', 'Solapur', 'MH', NULL, '2021-06-11', NULL, 'NSM', 'Demister', NULL, NULL, 'GRM', 'grm@balajiamines.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(600, 'QRN-6330', NULL, 'SRF Ltd', 'Dahej', 'WEST', NULL, '2021-06-21', NULL, 'PMD', 'Column & Heat Exchanger', NULL, NULL, 'Raghav Asthana', 'raghav.asthana@srf.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(601, 'QRN-6331', NULL, 'Jaguar Paints', 'Ankaleshwar', 'WEST', NULL, '2021-06-18', NULL, 'YS', 'Agitator', NULL, NULL, 'Shabuddin Sutar', NULL, '9822080607', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(602, 'QRN-6332', NULL, 'Jubilant Ingrevia Limited', 'Vilayat', 'WEST', NULL, '2021-06-22', '2021-06-22', 'NB', 'Tank', '2775000', NULL, 'Baljeet Singh', 'baljeet.singh@jubl.com', '9822080607', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(603, 'QRN-6333', NULL, 'Startpoint', 'Kuwait', 'EXPORT', NULL, '2021-06-22', NULL, 'NSM', 'Internals & Packing', NULL, NULL, 'Talal Alburaias', 'talalmh74@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(604, 'QRN-6334', NULL, 'Energy Works Technology Limited', 'Nigeria', 'EXPORT', NULL, '2021-06-14', NULL, 'NB', 'Tanks', NULL, NULL, 'Chinelo Anisiobi', 'c.anisiobi@energyworkstechnology.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(605, 'QRN-6335', NULL, 'Privi Speciality Chemical Ltd', 'Mahad', 'MH', NULL, '2021-05-26', '2021-06-23', 'PS', 'Acetic Acid Recovery System', '100000000', NULL, 'Uttam kumar Sinha', 'uttam.sinha@privi.co.in', '9930262733', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(606, 'QRN-6336', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-22', NULL, 'KVB', 'Column, HE and Vessel', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(607, 'QRN-6337', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-22', NULL, 'KVB', 'Heat Exchangers', '1588000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(608, 'QRN-6338', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-22', '2021-07-06', 'KVB', 'Column', '12970000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(609, 'QRN-6339', NULL, 'Eternis fine chemicals', 'Pune', 'MH', NULL, '2021-06-21', '2021-06-24', 'PHD', 'Random Packing', NULL, NULL, 'Mr. sulay shaha', 'sulay.shah@eternis.com', '8412009933', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(610, 'QRN-6340', NULL, 'AF Engineering', 'Japan', 'EXPORT', NULL, '2021-06-04', NULL, 'PHD', 'Random Packing', NULL, NULL, 'Kazuo Watari', 'watari@afengineering.jp', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(611, 'QRN-6341', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-25', NULL, 'PS', 'Vessel', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(612, 'QRN-6342', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-25', NULL, 'PS', 'Vessel 2 Nos.', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(613, 'QRN-6343', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-25', NULL, 'PS', 'Heat Exchanger', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(614, 'QRN-6344', NULL, 'Simtech Separation Technologies', 'Pune', 'MH', NULL, '2021-06-27', NULL, 'PHD', 'Lab Packing', NULL, NULL, 'Jitendra Nivargi', NULL, '9371275504', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(615, 'QRN-6345', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-24', '2021-06-28', 'PS', 'Reflux Dryer', '790000', 'ORDER', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(616, 'QRN-6346', NULL, 'Gujarat Fluorochemicals Limited', 'Dahej', 'WEST', NULL, '2021-06-28', NULL, 'PHD', 'Structured packing and internals', NULL, NULL, 'H.R.Patel', 'hrpatel@gfl.co.in', '9925090560', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(617, 'QRN-6347', NULL, 'D Technology Pvt Ltd', 'Pune', 'MH', NULL, '2021-06-25', NULL, 'NB', 'Mixing Package', NULL, NULL, 'Atul Chavan', 'atul.chavan@dtechnology.ooo', '7506942061', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(618, 'QRN-6348', NULL, 'Global Turnaround Services Company', 'Pune', 'MH', NULL, '2021-06-29', NULL, 'PHD', 'Structure packing', NULL, NULL, 'Siddharth Daware', 'info.gtascompany@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(619, 'QRN-6349', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-29', NULL, 'PS', 'Vessel', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(620, 'QRN-6350', NULL, 'Poly Chem Fabricators', 'Thane', 'MH', NULL, '2021-06-24', NULL, 'YS', 'Agitator', NULL, NULL, 'Vaibhavi Kokate', 'vaibhavi@polychemfab.com', '8369700242', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(621, 'QRN-6351', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-22', '1970-01-01', 'PHD', 'Structured Packing', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(622, 'QRN-6352', NULL, 'Gabriel India Ltd', 'Nashik', 'MH', NULL, '2021-06-28', '2021-06-30', 'SSK', 'MEE and ATFD', '5430000', NULL, 'Mr.Sudam Pawar', 'sudam.pawar@gabriel.co.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(623, 'QRN-6353', NULL, 'Eternis Fine Chemical Ltd', 'Pune', 'MH', NULL, '2021-06-30', '2021-07-01', 'PHD', 'Wire Mesh Packing', '300000', NULL, 'Mr. sulay shaha', 'sulay.shah@eternis.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(624, 'QRN-6354', NULL, 'Peri Nitrates Pvt Ltd', 'Kurkumbh', 'MH', NULL, '2021-06-28', '2021-07-01', 'YS', 'WFE', '4900000', NULL, 'T. V Sarma', 'perinitrates@yahoo.co.in', '8830687251', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(625, 'QRN-6354', NULL, 'Peri Nitrates Pvt Ltd', 'Kurkumbh', 'MH', NULL, '2021-06-28', '2021-07-01', 'YS', 'WFE', '4900000', NULL, 'T. V Sarma', 'perinitrates@yahoo.co.in', '8830687251', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(626, 'QRN-6355', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-01', '2021-07-03', 'PHD', 'Random Packing', '330000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(627, 'QRN-6356', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-01', '2021-07-01', 'PS', 'Heat exchanger and vessels', '2654000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(628, 'QRN-6357', NULL, 'Enpro Industries Pvt Ltd', 'Pimpri', 'MH', NULL, '2021-06-30', '2021-07-05', 'PMD', 'Condensate Pot', '2260000', NULL, 'Rashmi Bhosale', 'rashmi.bhosale@enproindia.com', '9673005236', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(629, 'QRN-6358', NULL, 'Arvind Envisol Pvt Ltd', 'Ahmedabad', 'WEST', NULL, '2021-06-30', '2021-07-02', 'YS', 'Static Mixer', '805000', NULL, 'Jitendra Nagar', 'jitendra.nagar@arvind.in', '9833069488', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(630, 'QRN-6359', NULL, 'Balaji Amines', 'Solapur', 'MH', NULL, '2021-07-02', NULL, 'PHD', 'Demister', NULL, NULL, 'Mr.  Laxman V. Limkar', NULL, '9623444386', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(631, 'QRN-6360', NULL, 'Orlin Stefanov', 'Turkey', 'EXPORT', NULL, '2021-06-30', '2021-07-02', 'MJP', 'Wiped Film Evaporator', '2920000', NULL, 'Orlin Stefanov', 'orlin.stefonov59@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(632, 'QRN-6361', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-28', NULL, 'KVB', 'Scrubber Package', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(633, 'QRN-6362', NULL, 'Neilsoft Ltd', 'Pune', 'MH', NULL, '2021-07-01', NULL, 'PMD', 'CIP tank', NULL, NULL, 'Tushar Gaikwad', 'nbrprocurement@neilsoft.com', '9975753145', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(634, 'QRN-6363', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'MH', NULL, '2021-07-01', NULL, 'PS', 'Vessels', NULL, NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(635, 'QRN-6364', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-03', NULL, 'PS', 'Heat Exchanger', '4400000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(636, 'QRN-6365', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-03', NULL, 'PS', 'Heat Exchanger', NULL, NULL, 'Dipanshi Singh', 'dipanshi.singh@gfl.co.in', '8318422636', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(637, 'QRN-6366', NULL, 'SRF Limited', 'Gurugram', 'NORTH', NULL, '2021-06-29', '2021-07-03', 'PHD', 'Structured packing and internals', '5030000', NULL, 'Abhishek Girdhar', 'Abhishek.Girdhar1@srf.com', '9311661548', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(638, 'QRN-6367', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-03', '2021-06-05', 'KVB', 'Heat Exchanger', '1110000', 'LOST', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(639, 'QRN-6367', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-03', '2021-06-05', 'KVB', 'Heat Exchanger', '1110000', 'LOST', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(640, 'QRN-6368', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-05', '2021-07-05', 'KVB', 'Hairpin Type Heat Exchanger', '200000', 'LOST', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(641, 'QRN-6369', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-05', NULL, 'PS', 'CANCEL QRN', NULL, NULL, 'Pankaj Karnatak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(642, 'QRN-6370', NULL, 'AF Engineering', 'Japan', 'EXPORT', NULL, '2021-07-02', NULL, 'NSM', 'Tarys', NULL, NULL, 'Kazuo', 'watari@afengineering.jp', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(643, 'QRN-6371', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-09', '2021-07-12', 'KVB', 'IPA Water Distillation Column', '3000000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(644, 'QRN-6372', NULL, 'Oriental Aromatics', 'Bareilly', 'NORTH', NULL, '2021-06-30', '2021-07-07', 'NB', 'Heat Exchanger', '345000', NULL, 'Nikita Sawant', 'purchase_engg@orientalaromatics.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(645, 'QRN-6373', NULL, 'Peri Nitrates Pvt Ltd', 'Kurkumbh', 'MH', NULL, '2021-07-07', '2021-07-07', 'YS', 'Static Mixer', '152500', NULL, 'T. V Sarma', 'perinitrates@yahoo.co.in', '8830687251', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(646, 'QRN-6374', NULL, 'Vidyan Biocommerce Pvt Ltd', 'Navi Mumbai', 'MH', NULL, '2021-07-06', '2021-07-07', 'PMD', 'Condensate Tank', '375000', 'WARM', 'Payal Niswade', 'payal.niswade@vidyanbio.com', '7620646275', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(647, 'QRN-6375', NULL, 'Raks Pharma', 'Dahej', 'WEST', NULL, '2021-07-06', '2021-07-08', 'PMD', 'Solvent Recovery System', '9850000', 'BUDGETARY', 'Mr. Tapas', 'production@rakspharma.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(648, 'QRN-6376', NULL, 'Cadila Pharmaceuticals Ltd', 'Ankleshwar', 'WEST', NULL, '2021-07-08', '2021-07-09', 'PHD', 'Structured Packing', '356000', NULL, 'Faizanul Haque', 'faizanul.haque@cadilapharma.co.in', '8583921039', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(649, 'QRN-6377', NULL, 'Arslan Engineering Ltd', 'Mumbai', 'MH', NULL, '2021-06-29', '2021-07-12', 'YS', 'ATFE & WFE', '5250000', NULL, 'Malik', 'malik@arslanenginery.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(650, 'QRN-6378', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-12', '2021-07-12', 'NSM', 'Packing and Internals', '660000', NULL, 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(651, 'QRN-6379', NULL, 'Chemion Engineering', 'Pune', 'MH', NULL, '2021-07-05', '2021-07-12', 'YS', 'Static Mixer', '123750', NULL, 'V M Gopalakrishnan', 'support@chemionengg.com', '9923751310', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(652, 'QRN-6380', NULL, 'Syed Zaheer Ahmed', 'Hyderabad', 'SOUTH', NULL, '2021-01-07', '2021-07-12', 'PMD', 'Steam Distillation', '3300000', 'BUDGETARY', 'Syed Zaheer Ahmed', 'zaheer77@gmail.com', '8310337856', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(653, 'QRN-6381', NULL, 'Air Science Technologies', 'Faridabad', 'NORTH', NULL, '2021-07-12', '2021-07-14', 'PMD', 'Piping Material', '1060000', 'WARM', 'Harish Sharma', 'hsharma@airscience.net', '8287491124', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(654, 'QRN-6382', NULL, 'Air Science Technologies', 'Faridabad', 'NORTH', NULL, '2021-06-24', '2021-07-14', 'PMD', 'Filter housings', '1780000', NULL, 'Harish Sharma', 'hsharma@airscience.net', '8287491124', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(655, 'QRN-6383', NULL, 'Gujarat Fluorochemicals Limited', 'Jolva', 'WEST', NULL, '2021-07-09', '2021-07-17', 'KVB', 'HF & OFF-GAS Scrubber', '68530000', 'WARM', 'Ravindra kumar', 'ravindra.kumar@gfl.co.in', '8287833334', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(656, 'QRN-6384', NULL, 'Saudi Multichem', 'Saudi Arabia', 'EXPORT', NULL, '2021-07-23', NULL, 'MJP', 'MEG Distillation System Supply', NULL, 'BUDGETARY', 'Sahir Honda', 'sahir.honda@saudi-multichem.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(657, 'QRN-6385', NULL, 'ENPRO Industries Pvt Ltd', 'Pune', 'MH', NULL, '2021-07-08', NULL, 'NB', '2 Phase Separator', NULL, 'BUDGETARY', 'Umair Haidey', 'umair.haidery@enproindia.com', '9372513244', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(658, 'QRN-6386', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-07-13', '2021-07-15', 'NSM', 'Tray', '4465000', NULL, 'Sharad Kadam', 'Sharad.Kadam@laxmi.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(659, 'QRN-6387', NULL, 'Benzo Chem Industries Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-07-14', NULL, 'PHD', 'Random Packing Internals', NULL, NULL, 'Shrimant Kembhavi', 'purchasedahej@benzochem.co.in', '7021857761', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(660, 'QRN-6388', NULL, 'Matrix Fine Science Pvt Ltd', 'Aurangabad', 'MH', NULL, '2021-07-14', '2021-07-16', 'YS', 'Column, Vessel, ATFE & FFE', '19420000', 'WARM', 'Kalim Inamdar', 'kalim@matrixfinesciences.com', '7767812182', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(661, 'QRN-6389', NULL, 'Triplan  India Pvt Ltd', 'Pune', 'MH', NULL, '2021-06-29', NULL, 'PS', 'Distillation System', NULL, NULL, 'Sudeep Gaikwad', 'sudeep.gaikwad@triplan.com', '9004394338', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(662, 'QRN-6390', NULL, 'Eternis Fine Chemicals', 'Kurkumbh', 'MH', NULL, '2021-07-14', NULL, 'NSM', 'Structured Packing', NULL, NULL, 'Sulay Shah', 'sulay.shah@eternis.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(663, 'QRN-6391', NULL, 'IPS Mehtalia Pvt Ltd', 'Dahej', 'WEST', NULL, '2021-07-07', '2021-07-15', 'PMD', 'Column', NULL, 'BUDGETARY', 'Anil Sharma', 'anils@ips-mehtalia.com', '9819577916', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(664, 'QRN-6392', NULL, 'Corel Pharma Chem India Pvt Ltd', 'Ahmedabad', 'WEST', NULL, '2021-07-15', '2021-07-16', 'NB', 'Tank (150 KL)', '48300000', 'BUDGETARY', 'Piyush Patel', 'purchase@corelpharmachem.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(665, 'QRN-6393', NULL, 'Carbon Technolgy', 'Bengaluru', 'SOUTH', NULL, '2021-07-20', NULL, 'NSM', 'Packing', NULL, NULL, 'Shihabudeen.j', 'shihabjamal1@yahoo.com', '9637841060', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(666, 'QRN-6394', NULL, 'Vinati Organics Ltd', 'Ratnagiri', 'MH', NULL, '2021-07-15', '2021-07-19', 'NB', 'Distillation Column', '1982000', 'BUDGETARY', 'Tukaram Desai', 'tukaram.desai@vinatiorganics.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(667, 'QRN-6395', NULL, 'Emerson', 'Pune', 'MH', NULL, '2021-07-15', '1970-01-01', 'NSM', 'Demister', NULL, NULL, 'Mani.N', 'Manikandan.N@emerson.com', '9345770854', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(668, 'QRN-6396', NULL, 'Green Energy', 'Export', 'EXPORT', NULL, '2021-07-18', NULL, 'YS', 'Agitator', NULL, NULL, '.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(669, 'QRN-6396', NULL, 'Green Energy', 'Export', 'EXPORT', NULL, '2021-07-18', NULL, 'YS', 'Agitator', NULL, NULL, '.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(670, 'QRN-6397', NULL, 'Charms Chem Private Limited', 'Pune', 'MH', NULL, '2021-07-19', '2021-07-20', 'SSK', 'Supply of Matching flange', '11000', NULL, 'Mr. Milind Honavar', 'milindhonavar@gmail.com', '9890247473', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(671, 'QRN-6398', NULL, 'Mass Transfer Products', 'Mumbai', 'MH', NULL, '2021-07-19', NULL, 'NSM', 'Vane Packs', NULL, NULL, 'Vishal Jadhav', 'vjadhav@mtpi.net.in', '8108613237', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(672, 'QRN-6399', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-07-10', '2021-07-22', 'KVB', 'IPA Water Distilllation System', '22750000', 'WARM', 'Amey  Deshpande', 'amey.deshpande@gfl.co.in', '7700986610', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(673, 'QRN-6400', NULL, 'Wel Head Equipment Engineers', 'Vadodara', 'WEST', NULL, '2021-07-21', NULL, 'PHD', '2 Phase Seperator', NULL, NULL, 'Kumar Abhishek', 'kumar.a@wellheadequipmentengineers.com', '7903457563', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(674, 'QRN-6401', NULL, 'RESOLVERS', 'NA', 'MH', NULL, '2021-07-19', '2021-07-23', 'PHD', 'Demister Pad', '380000', NULL, 'Ajay M N', 'designexpert99@outlook.com', '7980707917', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(675, 'QRN-6402', NULL, 'Polychem Fabricator', 'Mumbai', 'MH', NULL, '2021-07-20', '2021-07-20', 'YS', 'MS Tank', '310000', 'WARM', 'Mangesh Kene', 'mangesh@polychemfab.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(676, 'QRN-6403', NULL, 'WS Engineering & Fabrication Pte Ltd', 'NA', 'EXPORT', NULL, '2021-07-20', NULL, 'NSM', 'NA', NULL, NULL, 'Elaimuthu Mahesh Kumar', 'mahesh.kumar@wascoenergy.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(677, 'QRN-6404', NULL, 'Arobindo Phrama Ltd', 'Cyberabad', 'NORTH', NULL, '2021-06-28', '2021-07-28', 'MN', 'Glacial Acetic Acid Plant', '140000000', 'WARM', 'V.P Singh', 'pulsingh.vadithe@aurobindo.com', '9989253444', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(678, 'QRN-6405', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnager', 'WEST', NULL, '2021-07-21', '2021-07-27', 'KVB', 'Hopper', '7120000', NULL, 'Abhijeet Gupta', 'abhijeet.gupta@gfl.co.in', '8950847698', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(679, 'QRN-6406', NULL, 'Jacobs', 'Mumbai', 'MH', NULL, '2021-07-22', '2021-07-23', 'PMD', 'Heat Exchanger', '1415000', 'BUDGETARY', 'Aniket More', 'aniket.more1@jacobs.com', '8424015715', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(680, 'QRN-6407', NULL, 'Anthem Bioscience', 'Bangalore', 'SOUTH', NULL, '2021-07-23', NULL, 'MJP', 'Heat Exchanger', NULL, NULL, 'Venkadesh D', 'venkadesh.d@anthembio.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(681, 'QRN-6408', NULL, 'Aarti Industries Ltd', 'Vadodara', 'WEST', NULL, '2021-07-26', NULL, 'NSM', 'Column Internal', NULL, NULL, 'Deep Desai', 'deep.desai@aarti-industries.com', '9687338907', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(682, 'QRN-6409', NULL, 'Vitech Equipments Pvt Ltd', 'Navi Mumbai', 'MH', NULL, '2021-07-27', '2021-07-29', 'PHD', 'Internals', '140000', 'BUDGETARY', 'Ryan Fernandes', 'ryan@vitechgroupindia.com', '9372766460', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(683, 'QRN-6409', NULL, 'Vitech Equipments Pvt Ltd', 'Navi Mumbai', 'MH', NULL, '2021-07-27', '2021-07-29', 'PHD', 'Internals', '140000', 'BUDGETARY', 'Ryan Fernandes', 'ryan@vitechgroupindia.com', '9372766460', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(684, 'QRN-6410', NULL, 'Tandon Solvents and Chemicals', 'New Delhi', 'NORTH', NULL, '2021-07-02', '2021-07-28', 'PMD', 'Glycol Recovery System', '42520000', 'BUDGETARY', 'Mr. Aarush Tandon', 'aarush@tandongroup.in', '9911373888', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(685, 'QRN-6411', NULL, 'Matrix Fine Science Pvt Ltd', 'Aurangabad', 'MH', NULL, '2021-07-26', '2021-07-28', 'YS', 'Condenser', '3493000', NULL, 'Kalim Inamdar', 'kalim@matrixfinesciences.com', '7767812182', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(686, 'QRN-6412', NULL, 'Chemdist Membrane System', 'Pune', 'MH', NULL, '2021-07-21', NULL, 'SSK', '6M2 WFE', '1600000', NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(687, 'QRN-6413', NULL, 'Wel Head Equipment Engineers', 'Vadodara', 'WEST', NULL, '2021-07-21', NULL, 'NSM', '3 Phase Seperator', NULL, NULL, 'Kumar Abhishek', 'kumar.a@wellheadequipmentengineers.com', '7903457563', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(688, 'QRN-6414', NULL, 'Willowood Industries Pvt. Ltd', 'Dahej', 'WEST', NULL, '2021-07-27', '2021-07-30', 'NB', 'Tank', '8020000', NULL, 'Amrut Chauhan', 'amrutchauhan@willowood.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(689, 'QRN-6415', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnager', 'WEST', NULL, '2021-07-29', '2021-07-30', 'PHD', 'Distributor', '25000', 'BUDGETARY', 'Sumit Patil', 'sumit.patil@gfl.co.in', '9023732327', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(690, 'QRN-6416', NULL, 'Mott Macdonald', 'Mumbai', 'MH', NULL, '2021-07-30', '2021-08-06', 'NB', 'Reactor', '8020000', 'WARM', 'Mr. Parag Gandhi', 'parag.gandhi@mottmac.com', '9819017191', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(691, 'QRN-6417', NULL, 'Pragya life science', 'Mumbai', 'MH', NULL, '2021-07-30', '2021-07-31', 'PS', 'PTFE Strutured Packing', '3425000', 'WARM', 'Dipak Kumar Patel', 'dipak.sp@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(692, 'QRN-6418', NULL, 'Funke Heatex Engineering India Pvt Ltd.', 'Surat', 'WEST', NULL, '2021-07-29', '2021-08-11', 'YS', 'Agitators', '2990000', NULL, 'Pratik Modi', 'sales@funkeheatex.com', '7046062270', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(693, 'QRN-6419', NULL, 'Spectec Techno Projects Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-07-30', '2021-08-12', 'PHD', 'Strutured Packing', '486000', 'ORDER', 'Ms. Tejal', 'purchasespectec@gmail.com', '8929632125', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(694, 'QRN-6420', NULL, 'Kumar Metal Industries Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-08-02', '2021-08-13', 'PHD', 'Strutured Packing', '785000', 'BUDGETARY', 'Yatin Jayawant', 'yatin@kumarmetal.com', '9769773527', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(695, 'QRN-6421', NULL, 'Sandeep industries', 'Mumbai', 'MH', NULL, '2021-08-02', NULL, 'NSM', 'Packing Internals', NULL, NULL, 'Sandeep Mody', 'sandeep_mody@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(696, 'QRN-6422', NULL, 'PEMAC Projects Pvt Ltd', 'Navi Mumbai', 'MH', NULL, '2021-08-02', '2021-08-06', 'PHD', 'Structured Packing and Internals', '337000', 'BUDGETARY', 'Mr. Vikram Daur', 'purchase.pemac@gmail.com', '7045341212', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(697, 'QRN-6423', NULL, 'Kedia Carbon Private Limited', 'Odisha', 'WEST', NULL, '2021-08-03', '2021-08-03', 'PHD', 'Structured Packing and Internals', '3310000', NULL, 'Tanmay Kumar', 'acpl.tanmoy@gmail.com', '8319853644', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(698, 'QRN-6424', NULL, 'Air Science Technologies', 'Faridabad', 'NORTH', NULL, '2021-07-23', NULL, 'PMD', 'Flare Column', NULL, NULL, 'Harish Sharma', 'hsharma@airscience.net', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(699, 'QRN-6425', NULL, 'Synergie Ingredient', 'Bangalore', 'SOUTH', NULL, '2021-08-03', '2021-08-04', 'PHD', 'Structured Packing and Internals', '100000', NULL, 'Ram Prasad', 'ramprasad@synergieingredients.com', '7019465042', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(700, 'QRN-6426', NULL, 'Jacobs', 'Mumbai', 'MH', NULL, '2021-08-03', '2021-08-10', 'PMD', 'Heat Exchangers', '6667000', 'BUDGETARY', 'Aniket More', 'aniket.more1@jacobs.com', '8424015715', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(701, 'QRN-6427', NULL, 'Sudarshan Chemicals', 'Roha', 'MH', NULL, '2021-07-31', '2021-08-03', 'PS', 'Batch Distillation System', '840000', 'LOST', 'Ganesh Bhoj', 'gmbhoj@sudarshan.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(702, 'QRN-6428', NULL, 'HAT-11378/001', 'UK', 'EXPORT', NULL, '2021-08-06', '2021-08-11', 'PHD', 'Structured Packing', '221000', NULL, 'Daniel Matthews', 'daniel@hatltd.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(703, 'QRN-6429', NULL, 'Air Science Technologies', 'Faridabad', 'NORTH', NULL, '2021-08-06', '2021-08-10', 'NSM', 'Demister Pad', '60000', 'ORDER', 'Harish Sharma', 'hsharma@airscience.net', '8287491124', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(704, 'QRN-6430', NULL, 'Mott Macdonald', 'Mumbai', 'MH', NULL, '2021-07-27', '2021-08-09', 'PMD', 'Distillation Columns', NULL, 'BUDGETARY', 'Parag Gandhi', 'parag.gandhi@mottmac.com', '9819017191', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(705, 'QRN-6431', NULL, 'Tatva Chintan Pharma Chem Pvt Ltd', 'Dahej', 'WEST', NULL, '2021-07-31', '2021-08-09', 'YS', 'Solvent Recovery System with Reboiler', '20490000', NULL, 'Mr. Piyushbhi ( Technical )  / Mr. Rakesh', 'projects@tatvachintan.com', '7573046258', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(706, 'QRN-6432', NULL, 'Balaji Amines Limited', 'Secunderabad', 'SOUTH', NULL, '2021-08-07', '2021-08-11', 'PHD', 'Static Mixer', '150000', 'ORDER', 'LN Mohanty', 'projects@balajiamines.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(707, 'QRN-6433', NULL, 'Emcure  Pharmaceutical  Ltd', 'Kurkumbh', 'MH', NULL, '2021-08-06', NULL, 'NSM', 'Packed column and condenser', NULL, NULL, 'Gahineenath', 'Anand.Kulkarni@emcure.co.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(708, 'QRN-6434', NULL, 'WOG Technologies Pvt Ltd', 'Gurgoan', 'NORTH', NULL, '2021-08-07', '2021-08-07', 'MJP', 'Static Mixer', '45000', NULL, 'Nitin Patni', 'procurement@woggroup.com', '8178014220', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(709, 'QRN-6435', NULL, 'Polyplast Chemi Plant Pvt Ltd', 'Vadodara', 'WEST', NULL, '2021-08-06', NULL, 'PS', 'Reactor', NULL, NULL, 'Ashiwin Antiya', NULL, '9322588085', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL);
INSERT INTO `enquiry` (`id`, `qrn`, `enq_from`, `customer_name`, `city`, `region`, `address`, `enq_date`, `qte_date`, `engineer`, `description`, `price`, `status`, `contact_person`, `email`, `phone`, `admin_id`, `assignee`, `reminder_note`, `reminder_date`, `enq_labels`, `created_at`, `updated_at`, `so no`, `remark`) VALUES
(710, 'QRN-6436', NULL, 'Emcure  Pharmaceutical  Ltd', 'Mumbai', 'MH', NULL, '2021-08-07', NULL, 'NB', 'Column, HE and Packing', NULL, NULL, 'Anand Kulkarni', 'anand.kulkarni@emcure.co.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(711, 'QRN-6437', NULL, 'Delpro Equipments Pvt Ltd', 'Bhosari', 'MH', NULL, '2021-08-09', NULL, 'NSM', 'Mist Eliminator', NULL, NULL, 'Prashant Tiwari', 'purchase@delproequipments.com', '7620605757', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(712, 'QRN-6438', NULL, 'Salasar Synthetics', 'New Delhi', 'NORTH', NULL, '2021-08-09', NULL, 'NSM', 'Structured Packing and Internals', NULL, NULL, 'Pramod Kr. Aryan', 'purchase.parnamigroup@gmail.com', '9643191019', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(713, 'QRN-6439', NULL, 'Atul Ltd', 'Gujarat', 'WEST', NULL, '2021-08-16', '2021-08-16', 'PS', 'Ethanol Recovery System', '4600000', 'WARM', 'Rajiv Davda', 'rajiv_davda@atul.co.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(714, 'QRN-6440', NULL, 'Vertellus Specialty Materials (India) Private Limited', 'Vapi', 'WEST', NULL, '2021-08-13', NULL, 'YS', 'Static Mixer', NULL, NULL, 'Riki Patel', 'RPatel@Vertellus.com', '2536699959', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(715, 'QRN-6441', NULL, 'Grasim Industries Limited', 'Bharuch', 'WEST', NULL, '2021-08-16', '2021-08-16', 'PHD', 'Static Mixer', '24000', 'ORDER', 'Nirav Mehta', 'nirav.mehta@adityabirla.com', '8347004636', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(716, 'QRN-6442', NULL, 'John Bean Technologies India Private Limited', 'Pune', 'MH', NULL, '2021-09-08', NULL, 'KVB', 'Dish Ends', NULL, NULL, 'Vishal D. Wayal', 'vishal.wayal@jbtc.com', '9987212161', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(717, 'QRN-6443', NULL, 'UPL Ltd', 'Dahej', 'WEST', NULL, '2021-08-13', NULL, 'NSM', 'Column Internals', NULL, NULL, 'Shobha Thakur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(718, 'QRN-6444', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-08-14', '2021-08-20', 'NSM', '1000 Dia Tray with fittings', '1343000', NULL, 'Sharad Kadam', 'Sharad.Kadam@laxmi.com', '2067381200', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(719, 'QRN-6445', NULL, 'Atul Ltd', 'Gujarat', 'WEST', NULL, '2021-09-04', NULL, 'KVB', 'Methanol -EDC-Water', NULL, NULL, 'Harshit Shaha', NULL, '7383335025', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(720, 'QRN-6446', NULL, 'Bhagyoday tubes', 'Pune', 'MH', NULL, '2021-08-14', '2021-08-18', 'PHD', 'Random Packing', NULL, NULL, '207000', 'bhagyodaytubes@yahoo.com', '9873560176', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(721, 'QRN-6447', NULL, 'Meghmani Finechem Limited', 'Ahmedabad', 'WEST', NULL, '2021-08-14', '2021-08-17', 'PHD', 'Structured Packing and internals', '198000', 'ORDER', 'Virat Prajapati', 'virat.prajapati@meghmani.com', '7971761000', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(722, 'QRN-6448', NULL, 'NCPI', 'Kuwait', 'EXPORT', NULL, '2021-08-15', '2021-09-19', 'YS', 'Blender', '10290445', NULL, 'Tushar Das', 'tdas@ncpiq8.com', '9665946977', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(723, 'QRN-6449', NULL, 'UPL Ltd', 'Dahej', 'WEST', NULL, '2021-08-16', NULL, 'NB', 'Column', NULL, NULL, 'Shobha Thakur (Shroff)', NULL, '2266020929', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(724, 'QRN-6450', NULL, 'V B Engineers', 'Nashik', 'MH', NULL, '2021-08-16', NULL, 'PHD', 'Pall Ring random Packing', NULL, NULL, 'Vijay B. Patil', 'vbenggoffice@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(725, 'QRN-6451', NULL, 'Aarti Industries Ltd', 'Dahej', 'WEST', NULL, '2021-08-17', '2021-08-19', 'PHD', 'Structured Packing', '336000', 'WARM', 'Manal Mehta', 'manalmehta2@gmail.com', '9727713081', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(726, 'QRN-6452', NULL, 'Aarti Industries Ltd', 'Dahej', 'WEST', NULL, '2021-08-17', NULL, 'KVB', 'Column', NULL, NULL, 'Manal Mehta', 'manalmehta2@gmail.com', '9727713081', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(727, 'QRN-6453', NULL, 'Polychem Fabricator', 'Bhiwandi', 'MH', NULL, '2021-08-12', '2021-08-17', 'YS', 'Agitator', '175000', NULL, 'Vaibhavi Kokate', 'info@polychemfab.com', '8369700242', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(728, 'QRN-6454', NULL, 'Anshul Specialty Molecules Ltd', 'Roha', 'MH', NULL, '2021-08-17', '2021-08-17', 'PS', 'Top shaft', '60000', 'ORDER', 'Nandkumar Telange', 'telange@anshulchemicals.com', '8303878882', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(729, 'QRN-6455', NULL, 'Cadila Pharmaceuticals Ltd', 'Ankleshwar', 'WEST', NULL, '2021-08-14', '2021-08-18', 'PHD', 'Strutured Packing', '190000', NULL, 'Faizanul Haque', 'faizanul.haque@cadilapharma.co.in', '8583921039', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(730, 'QRN-6456', NULL, 'Gujarat Fluorochemicals Limited', 'Dahej', 'WEST', NULL, '2021-08-17', '2021-08-19', 'KVB', 'Vessel', '2725000', NULL, 'Vishakha Singh Negi', 'vishakha.singh@gfl.co.in', '8130043259', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(731, 'QRN-6457', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-08-11', '2021-08-18', 'NB', 'Tanks', '4837000', NULL, 'Sharad Kadam', 'sharad.kadam@laxmi.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(732, 'QRN-6458', NULL, 'Terraquaer Venture Pvt Ltd', 'Ahmeddabad', 'WEST', NULL, '2021-08-14', NULL, 'PHD', 'Statix Mixer', NULL, NULL, 'NA', 'hoterraquaer@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(733, 'QRN-6459', NULL, 'Green Joules', 'Pune', 'MH', NULL, '2021-08-14', '2021-08-18', 'PHD', 'Structured Packing', '13000', 'ORDER', 'Mr. Akash Patil', 'pakash@greenjoules.in', '9922384357', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(734, 'QRN-6460', NULL, 'Neevs Project', 'Pune', 'MH', NULL, '2021-08-18', '2021-08-18', 'PMD', 'Mixing Tank', '100000', 'CANCELLED', 'Mr. Nikhil Shah', 'info@neevs.co.in', '9823124444', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(735, 'QRN-6461', NULL, 'Arvind Envisol Ltd', 'Mumbai', 'MH', NULL, '2021-08-18', NULL, 'YS', 'Static Mixer', '634000', NULL, 'Jitendra Nagar', 'jitendra.nagar@arvind.in', '9833069488', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(736, 'QRN-6462', NULL, 'Y-Chem Consulting', 'Mumbai', 'MH', NULL, '2021-08-08', '2021-08-19', 'NB', 'Separation Package', '55078000', NULL, 'Yaqoob Ali', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(737, 'QRN-6463', NULL, 'Sarna chemicals', 'Vapi', 'WEST', NULL, '2021-08-16', '2021-08-19', 'PHD', 'Demister pad', '8000', 'ORDER', 'Pravat Kumar Sahoo', 'sm1@sarnachemicals.com', '8160548575', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(738, 'QRN-6464', NULL, 'Hat-11368/001', 'UK', 'EXPORT', NULL, '2021-08-17', NULL, 'NSM', 'VV type Plain Vane', NULL, NULL, 'Daniel Matthews', 'daniel@hatltd.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(739, 'QRN-6465', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-08-12', NULL, 'NSM', 'Packing', NULL, NULL, 'Rajan Gol', 'rajan.gol@gfl.co.in', '8849931897', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(740, 'QRN-6466', NULL, 'Azista Composites', 'Kerala', 'SOUTH', NULL, '2021-08-18', '2021-08-25', 'PHD', 'Vane Mist Eliminator', '103000', 'BUDGETARY', 'Rahul R', 'rahul.r@azistaindustries.com', '9633825109', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(741, 'QRN-6467', NULL, 'Aarti Industries Ltd', 'Vadodara', 'WEST', NULL, '2021-08-16', NULL, 'NSM', 'Rasching Ring', NULL, NULL, 'Pragi Shukla', 'pragi.shukla@aarti-industries.com', '9638231280', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(742, 'QRN-6468', NULL, 'PEMAC Projects Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-08-23', '2021-08-23', 'PHD', 'Structured Packing', '920000', 'ORDER', 'Anjali Joshi', 'purchase.pemac@gmail.com', '9324966750', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(743, 'QRN-6469', NULL, 'ACC GCI', 'Saudi Arabia', 'EXPORT', NULL, '2021-08-17', '2021-08-24', 'MJP', 'Heat Exchanger', '1168000', NULL, 'Md Inam Ur Rahman', 'm.rahman@acc-chemicals.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(744, 'QRN-6470', NULL, 'Anthem Bioscience', 'Banglore', 'SOUTH', NULL, '2021-08-20', '2021-08-26', 'MJP', 'Vessels', '6500000', NULL, 'Mr Venkadesh', 'venkadesh.d@anthembio.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(745, 'QRN-6471', NULL, 'Honor Lab Ltd', 'Hyderabad', 'SOUTH', NULL, '2021-08-25', '2021-08-31', 'MJP', 'Design Service', '400000', NULL, 'Mr Venu Madhav', 'venumadhav.s@honourlab.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(746, 'QRN-6472', NULL, 'Ingenero Technologies India Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-08-30', '2021-09-04', 'MJP', 'Heat Exchangers', '401500', NULL, 'Mr Shardul Shindadkar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(747, 'QRN-6473', NULL, 'Cosmo Speciality Chemical Pvt Ltd', 'Aurangabad', 'MH', NULL, '2021-08-21', '2021-08-25', 'NB', 'Reactor, Heat Exchanger, Column, Vessel Package', '5637000', NULL, 'Prashant Waghmare', 'prashant.waghmare@cosmochem.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(748, 'QRN-6474', NULL, 'Atul Ltd', 'Gujarat', 'WEST', NULL, '2021-07-23', '2021-08-25', 'KVB', 'Recovery System', '6600000', NULL, 'Rajiv Davda', 'Saurabh_Mamtora@atul.co.in', '9879570315', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(749, 'QRN-6475', NULL, 'Pragna  Life Science', 'Bharuch', 'WEST', NULL, '2021-08-23', NULL, 'NSM', 'Strutured Packing', NULL, NULL, 'jignesh patel', 'pragnalifescience@gmail.com', '9723812606', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(750, 'QRN-6476', NULL, 'Bodal Chemicals Ltd Unit VII', 'Vadodara', 'WEST', NULL, '2021-08-21', '2021-08-26', 'YS', 'AA Recovery System', '12545000', NULL, 'Waris Chaudhary', 'waris@bodal.com', '9512021573', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(751, 'QRN-6477', NULL, 'Navin Fluorine International Limited', 'Dewas', 'NORTH', NULL, '2021-08-23', '2021-08-30', 'YS', 'Reactor', '25300000', NULL, 'Shashank Vaidya', 'shashank.v@nfil.in', '8358920077', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(752, 'QRN-6478', NULL, 'Camline Fine Sciences Ltd', 'Mumbai', 'MH', NULL, '2021-06-14', '2021-08-25', 'PHD', 'Internals', '103000', NULL, 'Sushant Bhingarde', 'sushant.bhingarde@camlinfs.com', '9152727610', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(753, 'QRN-6479', NULL, 'Aarti Industries Ltd', 'Vapi', 'WEST', NULL, '2021-08-25', NULL, 'NSM', 'PTFE Flange', NULL, NULL, 'Aakash Patel', 'am.patel@aarti-industries.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(754, 'QRN-6480', NULL, 'Hypro Engineers  Pvt Ltd', 'Pune', 'MH', NULL, '2021-08-25', NULL, 'NSM', 'Structured Packings', NULL, NULL, 'Umesh Pawar', 'ced04@hypro.co.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(755, 'QRN-6481', NULL, 'PEMAC Projects Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-08-25', '2021-08-27', 'PHD', 'Structured Packing', '397000', 'ORDER', 'Anjali Joshi', 'purchase.pemac@gmail.com', '9324966750', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(756, 'QRN-6482', NULL, 'Allen Petrochemicals Pvt', 'Uttar Pradesh', 'NORTH', NULL, '2021-08-20', '2021-08-31', 'PMD', 'Solvent Recovery System', '46500000', 'BUDGETARY', 'Mr. Ankur Allen', 'info@allenpetro.com', '9837095799', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(757, 'QRN-6483', NULL, 'Jubilant Ingrevia Limited', 'Dahej', 'WEST', NULL, '2021-08-25', '2021-08-31', 'NB', 'Tanks', '8711000', NULL, 'Viraj Vinkar', 'viraj.vankar@jubl.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(758, 'QRN-6484', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-08-29', '2021-09-01', 'PHD', 'Bubble Cap Trays', '6850000', 'BUDGETARY', 'Vijay Wayal', 'vijay.wayal@laxmi.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(759, 'QRN-6485', NULL, 'SSEPL Techno Pvt Ltd', 'Pune', 'MH', NULL, '2021-08-31', '2021-08-31', 'YS', 'Agitator', '1460000', NULL, 'Shrikrishna Avdhut', 'sdavdhut@ssepl.co.in', '9168694265', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(760, 'QRN-6486', NULL, 'Pleiad  Design & Engineering', 'Pune', 'MH', NULL, '2021-08-28', NULL, 'NSM', 'Mesh + Vane Demister Pads', NULL, NULL, 'Manisha Burde', 'manisha.b@pleiad.in', '8956439809', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(761, 'QRN-6487', NULL, 'AF Engineering', 'Japan', 'EXPORT', NULL, '2021-08-28', '2021-09-02', 'PHD', 'Structured Packings and internals', '28000', NULL, 'Kazuo Watari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(762, 'QRN-6488', NULL, 'UPL Ltd', 'Dahej', 'WEST', NULL, '2021-08-30', NULL, 'NB', 'Scrubber and Internals', NULL, NULL, 'Shobha Thakur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(763, 'QRN-6489', NULL, 'Polyplast Chemi Plant Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-08-31', NULL, 'NSM', 'Titanium Distributor, hold down grid plate, Support grid plate', NULL, NULL, 'NA', 'purchase@polyplast.co.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(764, 'QRN-6490', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-08-11', '2021-09-01', 'NB', 'Column', '1558000', NULL, 'Vijay Wayal', 'vijay.wayal@laxmi.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(765, 'QRN-6491', NULL, 'Simon India Ltd', 'Delhi', 'NORTH', NULL, '2021-08-31', '2021-09-03', 'PMD', 'Stripper Column With Packing', '1106000', 'BUDGETARY', 'Ayush Sharma', 'Ayush.Sharma@adventz.com', '9953664916', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(766, 'QRN-6492', NULL, 'UPL Ltd', 'Dahej', 'WEST', NULL, '2021-08-30', NULL, 'NB', 'Column', NULL, NULL, 'Parag Gandhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(767, 'QRN-6493', NULL, 'Deccan Finechemicals (India) Pvt. Ltd', 'Hyderabad', 'SOUTH', NULL, '2021-08-23', '2021-09-01', 'NSM', 'Structured Packing (PTFE)', NULL, NULL, 'Amol Disale', 'amol.disale@deccanchemicals.com', '9121229227', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(768, 'QRN-6494', NULL, 'Fine Arc Engineering', 'Ahemadnagar', 'MH', NULL, '2021-08-28', '2021-07-01', 'PHD', 'Column Packing and internals', '10000', 'BUDGETARY', 'Mr. Amol Rahane', 'finearceng@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(769, 'QRN-6495', NULL, 'Eternis Fine Chemicals', 'Pune', 'MH', NULL, '2021-09-02', NULL, 'PHD', 'Random Packing and internals', '101000', 'ORDER', 'Sulay shah', 'sulay.shah@eternis.com', '8412009933', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(770, 'QRN-6496', NULL, 'Servotech India Ltd', 'Mumbai', 'MH', NULL, '2021-08-25', '2021-09-03', 'PS', 'Column', '4187000', 'WARM', 'Bhagyashree Pandhare', 'purchase@servotech-india.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(771, 'QRN-6497', NULL, 'Simon India Ltd', 'Delhi', 'NORTH', NULL, '2021-09-02', '2021-09-02', 'PMD', 'Knock out drum', '980000', 'BUDGETARY', 'Mr. Ayush Sharma', 'ayush.sharma@adventz.com', '9953664916', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(772, 'QRN-6498', NULL, 'Camlin Fine Sciences Ltd', 'Mumbai', 'MH', NULL, '2021-09-02', '2021-09-21', 'PHD', 'Static Mixer', '1362000', 'BUDGETARY', 'Sushant Bhingarde', 'sushant.bhingarde@camlinfs.com', '9152727610', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(773, 'QRN-6499', NULL, 'Harmony Organics Pvt Ltd', 'Kurkumbh', 'MH', NULL, '2021-09-02', '2021-09-04', 'PHD', 'Structured Packing', '2861000', 'ORDER', 'Sharad Rupnawar', 'engineering@harmonyorganics.in', '7709138262', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(774, 'QRN-6500', NULL, 'Sandip Industries', 'Mumbai', 'MH', NULL, '2021-09-01', '2021-09-03', 'PHD', 'Structured Packing', '230000', 'BUDGETARY', 'Sandeep Mody', 'sandeep_mody@yahoo.co.in', '9867212300', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(775, 'QRN-6501', NULL, 'Constro Solutions Pvt Ltd', 'Sinnar', 'MH', NULL, '2021-08-30', '2021-09-06', 'NB', 'Tank & Heat Exchanger', '1310000', NULL, 'Sanjay Deshpande', NULL, '8007771006', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(776, 'QRN-6502', NULL, 'Servotech India Ltd', 'Mumbai', 'MH', NULL, '2021-08-25', NULL, 'NSM', 'Structured Packing', NULL, NULL, 'Sandeep Agiwal', 'sandeep@servotech-india.com', '9821381810', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(777, 'QRN-6503', NULL, 'Nalco Water India Limited', 'Pune', 'MH', NULL, '2021-09-02', '2021-09-02', 'YS', 'Static Mixer', '225000', NULL, 'Rohan Gujar', 'rohan.gujar@ecolab.com', '9850005190', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(778, 'QRN-6504', NULL, 'Deccan Fine  Chemicals', 'Hyderabad', 'SOUTH', NULL, '2021-09-03', NULL, 'MJP', 'Static Mixer', '175000', NULL, 'Mr A.Bhuvana Chandar', 'bhuvana.chandar@deccanchemicals.com', '8886012335', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(779, 'QRN-6505', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-09-03', '2021-09-09', 'KVB', 'Neutralization Reactors', '21170000', NULL, 'Ravindra Kumar', 'ravindra.kumar@gfl.co.in', '8287833334', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(780, 'QRN-6506', NULL, 'Ingenero Technologies India Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-08-30', '2021-09-10', 'MJP', 'Heat Exchanger', '31390000', NULL, 'Mr Shardul Shindadkar', 'sshindadkar@ingenero.com', '7718819650', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(781, 'QRN-6507', NULL, 'EPP Composites Pvt Ltd', 'Gujarat', 'WEST', NULL, '2021-09-04', '2021-09-06', 'YS', 'Agitator', '132000', NULL, 'Khojema Diwasali', 'marketing@epp.co.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(782, 'QRN-6508', NULL, 'SSEPL Techno Pvt Ltd', 'Pune', 'MH', NULL, '2021-09-04', NULL, 'YS', 'Agitator', NULL, NULL, 'Shrikrishna Avdhut', 'sdavdhut@ssepl.co.in', '9168694265', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(783, 'QRN-6508', NULL, 'SSEPL Techno Pvt Ltd', 'Pune', 'MH', NULL, '2021-09-04', NULL, 'YS', 'Agitator', NULL, NULL, 'Shrikrishna Avdhut', 'sdavdhut@ssepl.co.in', '9168694265', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(784, 'QRN-6509', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-09-03', '2021-09-20', 'YS', 'Static Mixer', '130000', NULL, 'Dipanshi Singh', 'dipanshi.singh@gfl.co.in', '8318422636', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(785, 'QRN-6510', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-09-04', '2021-09-07', 'PHD', 'Bubble Cap tray', '8000000', 'BUDGETARY', 'Manoj Malaviya', 'manoj.malaviya@laxmi.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(786, 'QRN-6511', NULL, 'Matrix Fine Sciences Pvt. Ltd.', 'Aurangabad', 'MH', NULL, '2021-09-06', '2021-09-08', 'YS', 'Column, & Heat Exchanger', NULL, NULL, 'Kalim Inamdar', 'kalim@matrixfinesciences.com', '7767812182', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(787, 'QRN-6512', NULL, 'Servotex Engineers India Pvt. Ltd', 'Mumbai', 'MH', NULL, '2021-09-06', '2021-09-09', 'NSM', 'Methanol Column Internals', '912000', NULL, 'Tushar Rai', 'tushar.rai@servotexengineers.in', '7506176698', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(788, 'QRN-6513', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-09-07', '2021-09-09', 'NB', 'Column (2 Section)', '4100000', NULL, 'Manoj Malaviya', 'manoj.malaviya@laxmi.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(789, 'QRN-6514', NULL, 'Nalini Design And Solutions LLP', 'Pune', 'MH', NULL, '2021-09-09', '2021-09-17', 'PHD', 'Extraction Packing', '473000', 'BUDGETARY', 'Shirish Bhole', 'shirish.bhole@nalinids.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(790, 'QRN-6515', NULL, 'Supreme Industries', 'Chhattisgarh', 'NORTH', NULL, '2021-09-10', NULL, 'NSM', 'Structured Packing', NULL, NULL, 'Ks Bedi', 'ksbedit2@gmail.com', '9425234342', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(791, 'QRN-6516', NULL, 'Balaji Amines Ltd', 'Solapur', 'MH', NULL, '2021-09-12', NULL, 'NSM', 'Demister', NULL, NULL, 'G. Swapna', 'unit4purchase@balajiamines.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(792, 'QRN-6517', NULL, 'M.T.P.I Products Pvt. Ltd.', 'Mumbai', 'MH', NULL, '2021-09-14', '2021-09-14', 'PHD', 'Structured Packing & Internals', '2000000', NULL, 'Vikrant Bakshi', NULL, '9594968489', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(793, 'QRN-6518', NULL, 'AdichemTech', 'Mumbai', 'MH', NULL, '2021-09-13', NULL, 'YS', 'Autoclave', NULL, NULL, 'Mr. Sandip', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(794, 'QRN-6519', NULL, 'SSEPL  Techno Pvt Ltd', 'Pune', 'MH', NULL, '2021-09-14', '2021-09-15', 'YS', 'Agitator', '863000', NULL, 'Shrikrishna Avdhut', 'sdavdhut@ssepl.co.in', '9168694265', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(795, 'QRN-6520', NULL, 'Parmar Engineers', 'Mumbai', 'MH', NULL, '2021-09-14', NULL, 'NSM', 'NA', NULL, NULL, 'Ketan Parmar', 'contact@parmarengg.com', '8104924521', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(796, 'QRN-6521', NULL, 'Matrix Fine Sciences Pvt Ltd', 'Aurangabad', 'MH', NULL, '2021-09-15', '2021-09-17', 'PHD', 'Liquid Separator', '1593000', NULL, 'Kalim Inamdar', 'kalim@matrixfinesciences.com', '7767812182', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(797, 'QRN-6522', NULL, 'M.T.P.I Products Pvt. Ltd.', 'Mumbai', 'MH', NULL, '2021-09-14', NULL, 'NSM', 'Structured Packing', NULL, NULL, 'Romit Sawant', 'rsawant@mtpi.net.in', '8511987630', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(798, 'QRN-6523', NULL, 'Anupam Rasayan', 'Gujarat', 'WEST', NULL, '2021-09-16', '2021-09-16', 'YS', 'Reactor', NULL, NULL, 'Viral Muchhala', 'viral.muchhala@anupamrasayan.com', '8460881226', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(799, 'QRN-6524', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-09-16', NULL, 'KVB', 'Column & Kettle', NULL, NULL, 'Ravindra Kumar', 'ravindra.kumar@gfl.co.in', '8287833334', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(800, 'QRN-6525', NULL, 'Balaji Amines Limited', 'Solapur', 'MH', NULL, '2021-09-16', NULL, 'NSM', 'Poll Ring', NULL, NULL, 'G. Swapna', 'unit4purchase@balajiamines.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(801, 'QRN-6526', NULL, 'Pleiad  Design & Engineering', 'Pune', 'MH', NULL, '2021-09-09', '2021-09-17', 'NSM', 'Mesh + Vane Demister Pads', NULL, NULL, 'Manisha Burde', 'manisha.b@pleiad.in', '8956439809', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(802, 'QRN-6527', NULL, 'Charms Chem Private Limited', 'Pune', 'MH', NULL, '2021-09-17', '2021-09-17', 'SSK', '8 m2 WFE', '1600000', NULL, 'Mr. Milind Honavar', 'milindhonavar@gmail.com', '9890247473', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(803, 'QRN-6528', NULL, 'Bio Pharma Specialist', 'Pune', 'MH', NULL, '2021-09-17', '2021-09-18', 'NB', 'Reactor', '395000', NULL, 'Arun Kumar', 'biopharmaspecialists@gmail.com', '7887888018', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(804, 'QRN-6529', NULL, 'Jindal Specialty Chemicals India Pvt Ltd', 'Ahmedabad', 'WEST', NULL, '2021-09-16', '2021-09-23', 'YS', 'Top Mounted Condenser', '1330000', NULL, 'E D', 'ed@jindalfinechem.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(805, 'QRN-6530', NULL, 'Bodal Chemicals Ltd Unit VII', 'Vadodara', 'WEST', NULL, '2021-08-01', '2021-09-17', 'YS', 'Engineering of Existing Methanol Process', '300000', NULL, 'Waris Chaudhary', 'waris@bodal.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(806, 'QRN-6531', NULL, 'Apex Pharma', 'Dahej', 'WEST', NULL, '2021-09-17', '2021-09-18', 'PHD', 'Structured Packing', '335000', 'BUDGETARY', 'Manal Mehta', 'manalmehta2@gmail.com', '9727713081', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(807, 'QRN-6532', NULL, 'Aarti Industries Ltd', 'Vapi', 'WEST', NULL, '2021-09-04', '2021-10-01', 'PS', 'Striper Column', '25500000', NULL, 'Ankit Sharma', 'ankit.sharma@aarti-industries.com', '9643560070', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(808, 'QRN-6533', NULL, 'Laxmi Organic Industries Ltd', 'Mahad', 'MH', NULL, '2021-09-18', NULL, 'NB', 'Reaction Kettle', NULL, NULL, 'Manoj Malaviya', 'manoj.malaviya@laxmi.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(809, 'QRN-6534', NULL, 'Indofil Industries Limited', 'Mumbai', 'MH', NULL, '2021-09-20', '2021-09-21', 'PHD', 'Structured Packing & Internal', '48000', NULL, 'Prasad Kurkure', 'pkurkure@indofil.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(810, 'QRN-6535', NULL, 'Sandip Industries', 'Mumbai', 'MH', NULL, '2021-09-21', NULL, 'PHD', 'Structured Packing', NULL, NULL, 'Sandeep Mody', 'sandeep_mody@yahoo.co.in', '9867212300', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(811, 'QRN-6536', NULL, 'Ecolab', 'Hadpsar', 'MH', NULL, '2021-09-21', '2021-09-21', 'YS', 'SS 316 Static Mixer', '67000', NULL, 'Rahul Hajare', 'rahul.hajare@ecolab.com', '9975494413', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(812, 'QRN-6537', NULL, 'Spectec Techno Projects Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-09-21', NULL, 'PHD', 'Structured Packing', NULL, NULL, 'Ms. Tejal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(813, 'QRN-6538', NULL, 'Harmony Organics Pvt Ltd', 'Pune', 'MH', NULL, '2021-09-22', NULL, 'PHD', 'Internals', NULL, NULL, 'Sharad Rupnawar', NULL, '7709138262', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(814, 'QRN-6539', NULL, 'BEC Chemicals', 'Mumbai', 'MH', NULL, '2021-09-21', '2021-10-01', 'NB', 'Reactor Package', '30140000', NULL, 'Pratap Shinde', NULL, '9920258547', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(815, 'QRN-6540', NULL, 'Deccan fine Chemicals', 'Hyderabad', 'SOUTH', NULL, '2021-09-28', '2021-09-29', 'MJP', 'Static Mixer', '350000', NULL, 'Mr A.Bhuvana chandar', 'bhuvana.chandar@deccanchemicals.com', '8886012335', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(816, 'QRN-6541', NULL, 'Granules India Ltd', 'Hyderabad', 'SOUTH', NULL, '2021-09-23', NULL, 'MN', 'NA', NULL, NULL, 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(817, 'QRN-6542', NULL, 'Synergie Ingredient', 'Bangalore', 'SOUTH', NULL, '2021-09-22', '2021-09-23', 'KVB', 'Column', '550000', NULL, 'Ram Prasad', 'ramprasad@synergieingredients.com', '7019465042', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(818, 'QRN-6543', NULL, 'Mendas Pharma Pvt Ltd', 'Dahej', 'WEST', NULL, '2021-09-23', '2021-09-23', 'NB', 'Heat Exchanger', '6380000', NULL, 'Parth Mendpara', 'parth@mendas.in', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(819, 'QRN-6544', NULL, 'Ingenero Technologies India Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-09-22', '2021-09-23', 'KVB', 'Degion Charges', '200000', NULL, 'Deshik R Char', 'dchar@ingenero.com', '9930331316', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(820, 'QRN-6545', NULL, 'LNT Industrial Engineering Services', 'Bhosari', 'MH', NULL, '2021-09-17', NULL, 'NSM', 'Vane Pack', NULL, NULL, 'Ritesh Tolia', 'info@lntindustries.in', '9822210965', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(821, 'QRN-6546', NULL, 'Aarti Industires Ltd', 'Bharuch', 'WEST', NULL, '2021-09-20', '2021-09-24', 'KVB', 'Scrubber', '2350000', NULL, 'Yash M. Godhani', 'yashkumar.godhani@aarti-industries.com', '7575029096', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(822, 'QRN-6547', NULL, 'An Cryo Instruments Pvt Ltd', 'NA', 'MH', NULL, '2021-09-21', '2021-09-30', 'YS', 'Syngas to  Methanol Production Plant', '65000000', NULL, 'Mr. Amit Mukharjee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(823, 'QRN-6548', NULL, 'Sumaha Chemical', 'Mumbai', 'MH', NULL, '2021-09-28', NULL, 'NSM', 'CY Packing', '273000', NULL, 'Mahadev Raut', 'sumaha.chem@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(824, 'QRN-6549', NULL, 'YCS', 'Pune', 'MH', NULL, '2021-11-24', '2021-12-04', 'PS', 'Test desc', '98798', 'HOT', 'Manoj G', 'manoj@ycstech.in', '+1 9797897899', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(825, '2021366607', NULL, 'Robert', NULL, NULL, NULL, '18 Dec 2021', NULL, NULL, 'I am looking for service provider for Website Development Services, With Online Support.\nThe main purpose of the site is to List Escorts, Content sellers, Agencies, and members. Escorts can either choose how they want to provide their personal Services. ', NULL, NULL, NULL, 'maxwellgis@gmail.com', '+27-658950174', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(826, '2021223028', NULL, 'Zafer', NULL, NULL, NULL, '18 Dec 2021', NULL, NULL, 'I am looking for service provider for Adsense Account Service.\n\nKindly send me price and other details.', NULL, NULL, NULL, 'zaf_gunay@hotmail.com', '+90-5393751441', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(827, '416782094', NULL, 'Ibrahim Shaikh', 'Mumbai', 'Maharashtra', NULL, '18 Dec 2021', NULL, NULL, 'I am looking for B2B Portal Design Services.\nwhite label\nKindly send me price and other details.<br>Service Location : Pan India', NULL, 'HOT', NULL, 'ibbushaikh40@gmail.com', '+91-7738282644', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(828, '416781997', NULL, 'Harsh', 'Jalandhar', 'Punjab', NULL, '18 Dec 2021', NULL, NULL, 'I am looking for service provider for Ecommerce Solutions.\n\nKindly send me price and other details.<br>Service Location : Jalandhar<br>Usage/Application : Flipkart', NULL, NULL, NULL, 'harshsarangal438@gmail.com', '+91-7009010696', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(829, '2020407940', NULL, 'Raju', NULL, NULL, NULL, '17 Dec 2021', NULL, NULL, 'I am looking for service provider for Online Lottery Website Designing.\n\nKindly send me price and other details.\n\n Service Location:   Kolkata', NULL, 'HOT', NULL, 'Raju.khan019238@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(830, '431275379', NULL, 'Manoj Chauhan', 'Jammu', 'Jammu & Kashmir', NULL, '25 Jan 2022', NULL, NULL, 'I am looking for service provider for ERP Software Development.\n\nKindly send me price and other details.<br>I am interested in : ERP Software Development<br>Service Location : University Of Jammu, Jammu<br>Usage/Application : University Finance Use<br>T', NULL, NULL, NULL, 'mkcritu@rediffmail.com', '+91-9419151203', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(831, '2071458403', NULL, 'Prashant Joshi', 'Nagpur', 'Maharashtra', NULL, '15 Feb 2022', NULL, NULL, 'I am looking for Business to Consumer (B2C). \n\nKindly send me price and other details.\n\n Service Location:   Nagpur \n Usage/Application:   Heat Resistant Coating For Building \n\n\nAdditional Updates on Buyer\'s Requirement :\nPreferred Location: Serv', NULL, 'HOT', NULL, 'jjeminence@gmail.com', '+91-9403572478', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(833, 'QRN-6300', NULL, 'Client 2', 'Pune', 'MH', NULL, '2022-02-22', '2022-02-02', 'TW', 'test', '2000000', 'PO AWAITED', 'tsdes', 'test@yrdf.ddgf', '+91 9879879879', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(834, '2140421910', NULL, 'Zaz Enterprises', 'Delhi', 'Delhi', NULL, '2022-05-11', NULL, NULL, 'Seller log in<br>Service Location : All india<br>Usage/Application : Multi<br>', NULL, NULL, 'Mohd Imran Warsi', 'imranwa67@gmail.com', '+91-9643585081', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(835, '2140313653', NULL, 'Krishna Rao Mundel Lok Sewa Foundation', 'Pune', 'Maharashtra', NULL, '2022-05-11', NULL, NULL, 'I am interested in Google Adwords Service<br>', NULL, NULL, 'Vikaram Krishnarao Mundhe', 'manishagawari18@gmail.com', '+91-9011908548', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(836, '472698401', NULL, 'Bhimashankar Desai', 'Solapur', 'Maharashtra', NULL, '2022-05-09', NULL, NULL, 'I am looking for service provider for Graphic Design Service,Kannada language class Kindly send me price and other details.<br>Service Location : Solapur<br>Probable Requirement Type : Business Use<br>', '5000', NULL, 'Bhimashankar Desai', 'desaibhimashankar757@gmail.com', '+91-9529304435', NULL, NULL, NULL, NULL, NULL, '2023-01-13 12:33:46', '2023-01-13 07:03:46', NULL, NULL),
(839, 'QRN-6300', NULL, 'Poly Chem Fabricators', 'Mumbai', 'MH', NULL, '2021-06-16', '2021-06-17', 'YS', 'Agitator', '4515000', 'WARM', 'Vaibhavi Kokate', 'vaibhavi@polychemfab.com', '8369700242', NULL, NULL, NULL, NULL, NULL, '2023-01-13 13:14:24', '2023-01-13 07:44:24', NULL, NULL),
(840, 'QRN-6301', NULL, 'Sai Bio Med', 'Nashik', 'MH', NULL, '2021-06-18', '2021-06-18', 'PHD', 'Packing', '20000', 'WARM', 'Amol Ghadge', 'saibiomed9@gmail.com', '9511778194', NULL, NULL, NULL, NULL, NULL, '2023-01-13 13:14:24', '2023-01-13 07:44:24', NULL, NULL),
(841, 'QRN-6302', NULL, 'Gujarat Fluorochemicals Limited', 'Ranjitnagar', 'WEST', NULL, '2021-06-10', '2021-06-10', 'KVB', 'Metallic Tanks', '13765000', 'LOST', 'Pankaj Karnatak', 'pankaj.karnatak@gfl.co.in', '8860057973', NULL, NULL, NULL, NULL, NULL, '2023-01-13 13:14:24', '2023-01-13 07:44:24', NULL, NULL),
(842, 'QRN-6303', NULL, 'MTPI Products Pvt Ltd', 'Mumbai', 'MH', NULL, '2021-06-10', '2021-06-10', 'PS', 'Design and Hydralic of LLE', '80000', 'BUDGETARY', 'Vishal Jadhav', 'vjadhav@mtpi.net.in', '8108613237', NULL, NULL, NULL, NULL, NULL, '2023-01-13 13:14:24', '2023-01-13 07:44:24', NULL, NULL),
(843, 'QRN-6304', NULL, 'Thssenkrupp Industrial Solutions India Pvt ltd', 'Pune', 'MH', NULL, '2021-06-09', '2021-07-05', 'PMD', 'Columns / Scrubbers', '293877000', 'BUDGETARY', 'Sachin Bhat', 'sachin.bhat@thyssenkrupp.com', '9890038923', NULL, NULL, NULL, NULL, NULL, '2023-01-13 13:14:24', '2023-01-13 07:44:24', NULL, NULL),
(844, 'QRN-6305', NULL, 'Xytel  India Pvt Ltd', 'Pune', 'MH', NULL, '2021-06-11', NULL, 'PHD', 'Packing', NULL, NULL, 'Shailesh Kulkarni', 'shailesh@xytelindia.com', '9822441844', NULL, NULL, NULL, NULL, NULL, '2023-01-13 13:14:24', '2023-01-13 07:44:24', NULL, NULL),
(845, 'QRN-6306', NULL, 'UPL Ltd', 'Jhagadia', 'WEST', NULL, '2021-05-08', NULL, 'PHD', 'Internals', '319000', 'BUDGETARY', 'Shobha Thakur', 'shobha.thakur@shroffindia.com', '7045517526', NULL, NULL, NULL, NULL, NULL, '2023-01-13 13:14:24', '2023-01-13 07:44:24', NULL, NULL),
(846, 'QRN-6307', NULL, 'Hemani Industries Ltd', 'Mumbai', 'MH', NULL, '2021-06-12', '2021-06-14', 'PHD', 'Packing', '1585250', 'HOLD', 'Manoj Pande', 'purchase1@hemanigroup.com', '9377064871', NULL, NULL, NULL, NULL, NULL, '2023-01-13 13:14:24', '2023-01-13 07:44:24', NULL, NULL),
(847, 'QRN-6308', NULL, 'Pleiad Design & Engineering', 'Pune', 'MH', NULL, '2021-05-14', NULL, 'NSM', 'Demister Pads', NULL, NULL, 'Manisha Burde', 'manisha.b@pleiad.in', '8956439809', NULL, NULL, NULL, NULL, NULL, '2023-01-13 13:14:24', '2023-01-13 07:44:24', NULL, NULL),
(848, 'QRN-6309', NULL, 'Optimum Engineers', 'Vadodara', 'WEST', NULL, '2021-05-15', '2021-05-15', 'NSM', 'Structured Packing', '40000', 'Budgetary', 'Parth Patel', 'optimumengineers06@gmail.com', '9586180599', NULL, NULL, NULL, NULL, NULL, '2023-01-13 13:14:24', '2023-02-21 06:32:53', NULL, NULL),
(852, 'QRN-6303', 'Direct', 'demo', 'pune', 'WEST', NULL, '2023-02-10', NULL, NULL, 'asdasd', '200000', NULL, 'demo', NULL, '+91 2342342332', 1, 41, 'hello', '2023-02-21T10:16', NULL, '2023-02-10 16:12:24', '2023-02-21 04:44:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_notes`
--

CREATE TABLE `enquiry_notes` (
  `id` int(11) NOT NULL,
  `enquiry_id` int(11) UNSIGNED NOT NULL,
  `note` text NOT NULL,
  `admin_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiry_notes`
--

INSERT INTO `enquiry_notes` (`id`, `enquiry_id`, `note`, `admin_id`, `created_at`, `updated_at`) VALUES
(31, 270, 'Sed porttitor lectus nibh. Pellentesque in ipsum id orci porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.', 1, '0000-00-00 00:00:00', '2021-12-09 06:31:40'),
(37, 267, 'asdad', 1, '0000-00-00 00:00:00', '2021-12-09 10:24:11'),
(38, 266, 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus suscipit tortor eget felis porttitor volutpat. Nulla porttitor accumsan tincidunt. Pellentesque in ipsum id orci porta dapibus. Donec sollicitudin molestie malesuada.\r\n\r\nSed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur aliquet quam id dui posuere blandit. Quisque velit nisi, pretium ut lacinia in, elementum id enim.', 1, '0000-00-00 00:00:00', '2021-12-09 10:24:50'),
(43, 270, 'called on 23 dec 2am', 1, '0000-00-00 00:00:00', '2021-12-21 07:13:12'),
(46, 276, 'test', 1, '0000-00-00 00:00:00', '2022-02-14 08:29:49'),
(47, 277, 'test', 1, '0000-00-00 00:00:00', '2022-02-15 14:37:14'),
(48, 278, 'test', 1, '0000-00-00 00:00:00', '2022-02-24 12:07:05'),
(49, 278, 'test', 1, '0000-00-00 00:00:00', '2022-04-28 06:50:18'),
(50, 278, 'adsad', 1, '0000-00-00 00:00:00', '2022-04-28 07:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `enq_labels`
--

CREATE TABLE `enq_labels` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enq_labels`
--

INSERT INTO `enq_labels` (`id`, `title`, `code`, `created_at`, `updated_at`) VALUES
(11, 'Important', '#050dff', '0000-00-00 00:00:00', '2021-12-21 05:16:10'),
(12, 'Fake', '#ff0000', '0000-00-00 00:00:00', '2021-12-21 05:16:23'),
(13, 'Warm', '#ff7300', '0000-00-00 00:00:00', '2021-12-21 05:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_type`
--

CREATE TABLE `equipment_type` (
  `id` int(11) NOT NULL,
  `equipment_type` varchar(255) NOT NULL,
  `abbr` varchar(255) DEFAULT NULL,
  `agitator` int(11) NOT NULL DEFAULT 0,
  `admin_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipment_type`
--

INSERT INTO `equipment_type` (`id`, `equipment_type`, `abbr`, `agitator`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Column', 'C', 0, 18, '2020-09-07 12:37:35', '2021-11-08 07:18:05'),
(2, 'Vessel', 'V', 0, 1, '2020-09-07 12:37:50', '2021-11-08 06:56:46'),
(3, 'Reactor', 'R', 1, 1, '2020-09-07 12:38:08', '2021-11-18 05:18:00'),
(4, 'Agitator', 'A', 0, 1, '2020-09-07 12:38:15', '2021-11-08 06:56:54'),
(8, 'ATFD', 'ATFD', 1, 1, '2021-04-11 08:57:11', '2021-11-08 06:56:56'),
(9, 'Heat Exchanger', 'E', 0, 1, '2021-04-23 11:22:32', '2021-11-08 06:56:59'),
(13, 'ATFE', 'E', 0, 1, '2021-04-23 11:28:34', '2021-11-08 06:57:01'),
(14, 'WFE', 'E', 0, 1, '2021-04-23 11:28:49', '2021-11-08 06:57:03'),
(15, 'Static Mixer', 'SM', 0, 1, '2021-07-15 12:41:08', '2021-11-08 06:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `color_code` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start`, `end`, `color_code`, `time`, `created_at`, `updated_at`) VALUES
(119, 'pp', '2023-04-09', '2023-04-13', 'rgb(87, 184, 28)', '20:20', '2023-04-13 09:21:37', '2023-04-13 09:21:37'),
(120, 'vv', '2023-04-26', '2023-04-29', 'rgb(31, 52, 178)', '20:20', '2023-04-13 10:40:57', '2023-04-13 10:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kanban`
--

CREATE TABLE `kanban` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) UNSIGNED NOT NULL,
  `tye` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `description` mediumtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kanban`
--

INSERT INTO `kanban` (`id`, `admin_id`, `tye`, `title`, `description`, `created_at`, `updated_at`) VALUES
(3, 1, 'Backlog', 'a', 'b', '2022-01-07 14:43:53', '2022-01-08 05:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `url` text DEFAULT NULL,
  `isread` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `url`, `isread`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'New payment cycle added', 'payment-cashflow/Mzcw', 0, 1, '0000-00-00 00:00:00', '2022-02-01 13:05:28'),
(2, 'New payment cycle added', 'payment-cashflow/MzY3', 0, 1, '0000-00-00 00:00:00', '2022-03-14 09:55:51'),
(3, 'New payment cycle added', 'payment-cashflow/MzY3', 0, 1, '0000-00-00 00:00:00', '2022-04-13 05:35:46'),
(4, 'New payment cycle added', 'payment-cashflow/Mzgy', 0, 1, '0000-00-00 00:00:00', '2022-12-29 10:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `admin_id` int(11) UNSIGNED DEFAULT NULL,
  `so` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `po` varchar(255) NOT NULL,
  `po_date` varchar(255) NOT NULL,
  `delivery_date` varchar(255) NOT NULL,
  `tpi` varchar(255) NOT NULL,
  `tpi_agency` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `order_size` float DEFAULT NULL,
  `po_amt` float DEFAULT NULL,
  `po_amt_received` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `payment_terms` text DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `completed_on` varchar(255) DEFAULT NULL,
  `new_field` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `admin_id`, `so`, `client_name`, `po`, `po_date`, `delivery_date`, `tpi`, `tpi_agency`, `attachment`, `order_size`, `po_amt`, `po_amt_received`, `tax`, `payment_terms`, `description`, `country`, `region`, `status`, `updated_by`, `completed_on`, `new_field`, `created_at`, `updated_at`) VALUES
(367, 1, '1', 'YCS TexSoft 1', 'test12', '2021-10-13', '2022-03-13', 'No', '123', NULL, 100, 50, 1, 18, 'PT 1', NULL, 'India', 'EXPORT', 'In Process', 1, NULL, NULL, '2021-12-15 13:14:23', '2022-03-24 05:22:53'),
(368, 1, '2', 'YCS TehSoft', 'test12', '2021-08-12', '2021-12-12', 'Yes', NULL, '1639632870-National Online training on Laboratory Animal in Biomedical Research (2).pdf.pdf', 100, 60, 1, 18, 'PT 2', NULL, 'India', 'SOUTH', 'In Process', 1, NULL, NULL, '2021-12-16 05:34:30', '2023-01-13 09:57:57'),
(370, 19, '3', 'Chemical Ltd', 'PO123', '2021-04-02', '2022-03-03', 'Yes', 'TPI12', '1641197125-Camping.gif.gif', 100000, 40000, NULL, 18, 'PT 3', NULL, 'India', 'WEST', 'In Process', 1, NULL, NULL, '2022-01-03 08:05:25', '2022-03-30 05:03:35'),
(371, 1, '4', 'Raven Ind.', 'ABC-101', '2021-11-14', '2022-05-16', 'Yes', NULL, NULL, 50000000, 2000000, NULL, 18, 'Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Nulla quis lorem ut libero malesuada feugiat.', NULL, 'India', 'MH', 'In Process', 1, NULL, NULL, '2022-02-15 05:31:14', '2023-01-14 11:56:56'),
(378, 18, '5', 'Test 123', '123', '2022-03-17', '2022-02-17', 'Yes', NULL, NULL, 1000, 200, NULL, 18, '<p><strong>test terms </strong><i>adadad</i></p>', NULL, 'India', 'NORTH', 'In Process', 1, NULL, NULL, '2022-02-17 11:18:08', '2023-01-13 09:56:33'),
(382, 1, '6', 'Test 12345', '123', '2021-09-22', '2022-02-22', 'Yes', NULL, NULL, 100000, 10, NULL, 18, '<p>test terms</p>', NULL, 'India', 'EXPORT', 'In Process', 1, NULL, NULL, '2022-02-22 15:43:50', '2023-01-14 11:57:00'),
(383, 1, '7', 'John Ind', 'Q123', '2022-04-02', '2022-07-20', 'Yes', NULL, NULL, 100000000, NULL, NULL, NULL, '<p><b>test</b></p>', NULL, 'Pune', 'MH', NULL, 1, NULL, NULL, '2022-04-01 10:52:20', '2022-04-01 10:00:58'),
(402, 1, '8', 'Poonam', '123', '2023-02-14', '2023-03-14', 'Yes', NULL, NULL, 2000000000, NULL, NULL, NULL, NULL, NULL, 'Pune', 'MH', 'In Process', 1, NULL, NULL, '2023-02-14 11:29:56', '2023-02-14 05:59:56'),
(403, 1, '9', 'Poonam', 'Q123', '2023-04-01', '2023-04-07', 'Yes', NULL, NULL, 2000, NULL, NULL, NULL, NULL, NULL, 'pune', 'WEST', 'In Process', 1, NULL, NULL, '2023-04-04 20:46:47', '2023-04-04 15:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_equipments`
--

CREATE TABLE `order_equipments` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `equipment_type` varchar(255) NOT NULL,
  `equipment_name` varchar(255) NOT NULL,
  `mfr` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_equipments`
--

INSERT INTO `order_equipments` (`id`, `order_id`, `equipment_type`, `equipment_name`, `mfr`, `tag`, `created_at`, `updated_at`) VALUES
(8, 367, 'Column', 'c eq', '123', 'sfdsd', '2021-12-15 13:14:24', '2021-12-15 07:44:24'),
(9, 367, 'Vessel', 'v1 eq', '555', 'dfs', '2021-12-15 13:14:25', '2021-12-15 07:44:25'),
(10, 367, 'Vessel', 'wqe 1 1', '123 1', 'wqeqweq 1', '2021-12-15 13:14:26', '2021-12-16 04:24:13'),
(11, 368, 'Column', '2', '1', NULL, '2021-12-16 05:34:30', '2021-12-16 00:04:30'),
(13, 370, 'Column', 'Column Equipment', 'MFR123', 'TAG123', '2022-01-03 08:05:25', '2022-01-03 02:35:25'),
(14, 370, 'Vessel', 'Vessel Equipment', 'MFR456', 'TAG456', '2022-01-03 08:05:26', '2022-01-03 02:35:26'),
(15, 371, 'Column', 'Column Equip', 'CDPS-C-1-2022', '101', '2022-02-15 05:31:15', '2022-02-15 00:01:15'),
(16, 371, 'Vessel', 'Vessel Equip', 'CDPS-V-2-2022', '102', '2022-02-15 05:31:16', '2022-02-15 00:01:16'),
(17, 371, 'Reactor', 'Reactor Equip', 'CDPS-R-1-2022', '103', '2022-02-15 05:31:18', '2022-02-15 00:01:18'),
(18, 378, 'Column', 'col equip', 'CDPS-C-1-2022', '101', '2022-02-17 11:18:08', '2022-02-17 05:48:08'),
(23, 382, 'Reactor', '2', 'CDPS-R-1-2022', NULL, '2022-02-22 15:43:50', '2022-10-03 12:10:15'),
(24, 383, 'Column', 'Column Equip 20L', 'CDPS-C-1-2022', '11', '2022-04-01 10:52:20', '2022-04-01 05:22:20'),
(25, 383, 'Heat Exchanger', 'Heat Ex Equip 1KW', 'CDPS-E-2-2022', '12', '2022-04-01 10:52:20', '2022-04-01 05:22:20'),
(41, 402, 'ATFD', 'poonam-equip', 'CDPS-ATFD-2023', NULL, '2023-02-14 11:29:56', '2023-02-14 05:59:56'),
(42, 403, 'Heat Exchanger', 'poonam-equip', 'CDPS-E-2023', NULL, '2023-04-04 20:46:47', '2023-04-04 15:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_stages`
--

CREATE TABLE `order_stages` (
  `id` int(11) NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `equip_id` int(11) UNSIGNED NOT NULL,
  `stage_id` int(11) UNSIGNED NOT NULL,
  `stage_name` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `started_at` varchar(255) DEFAULT NULL,
  `completed_at` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_stages`
--

INSERT INTO `order_stages` (`id`, `order_id`, `equip_id`, `stage_id`, `stage_name`, `status`, `admin_id`, `remark`, `started_at`, `completed_at`, `created_at`, `updated_at`) VALUES
(10011, 367, 8, 29, 'SO Release', 'Pending', 1, 'done', '2022-04-13 20:08:12', NULL, '2022-01-04 10:52:20', '2022-04-14 19:07:00'),
(10012, 367, 8, 30, 'QAP Submission & Approval', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-22 12:29:33'),
(10013, 367, 8, 31, 'GA drawing Preparation & Submission', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-20 14:01:29'),
(10014, 367, 8, 161, 'GA drawing approval', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-22 08:00:56'),
(10015, 367, 8, 162, 'Fabrication drawing preparation & released for Manufacturing', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-22 09:43:09'),
(10016, 367, 8, 163, 'Material Procurement', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-22 09:43:11'),
(10017, 367, 8, 164, 'Shell and Dish end material receipt', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-28 05:23:13'),
(10018, 367, 8, 165, 'Body Flanges material receipt', 'Completed', 1, NULL, NULL, '2022-04-13 19:40:59', '0000-00-00 00:00:00', '2022-04-13 19:40:59'),
(10019, 367, 8, 166, 'Nozzle flanges material receipt', 'Completed', 1, NULL, NULL, '2022-04-13 19:41:11', '0000-00-00 00:00:00', '2022-04-13 19:41:11'),
(10020, 367, 8, 167, 'Nozzle pipes material receipt', 'Completed', 1, NULL, '2022-04-09 19:06:43', '2022-04-14 19:06:43', '0000-00-00 00:00:00', '2022-04-14 19:06:43'),
(10021, 367, 8, 168, 'Hardware and Gaskets material receipt', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10022, 367, 8, 169, 'Packing material (wooden saddles/Boxes) receipt', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10023, 367, 8, 170, 'Shell & Dish end Material cutting', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10024, 367, 8, 171, 'Shell  Rolling', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10025, 367, 8, 172, 'Dish end forming', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10026, 367, 8, 173, 'Body flange machining and drilling', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10027, 367, 8, 174, 'Shell L Seam setup & welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10028, 367, 8, 175, 'Shell C Seam Setup & Welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10029, 367, 8, 176, 'Shell to One side Dish end Setup & Welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10030, 367, 8, 177, 'Shell to Second side Dish end Setup & Welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10031, 367, 8, 178, 'Shell to body flanges setup & welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10032, 367, 8, 179, 'Nozzle Fabrication on ground', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10033, 367, 8, 180, 'Nozzle Marking & Opening', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10034, 367, 8, 181, 'Nozzle setup & Welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10035, 367, 8, 182, 'Manhole Setup & Welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10036, 367, 8, 183, 'Support & External attachement on shell Setup welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10037, 367, 8, 184, 'Hydro Test', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10038, 367, 8, 185, 'Surface Preparation', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10039, 367, 8, 186, 'Painting', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10040, 367, 8, 187, 'Dispatch', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10041, 367, 9, 1, 'SO Release', 'Completed', 1, 'done', NULL, '2022-04-13 11:03:36', '2022-01-04 10:52:20', '2022-04-13 11:03:36'),
(10042, 367, 9, 2, 'QAP Submission & Approval', 'Completed', 1, NULL, NULL, '2022-04-13 10:56:07', '0000-00-00 00:00:00', '2022-04-13 10:56:07'),
(10043, 367, 9, 3, 'GA drawing Preparation & Submission', 'Pending', 1, NULL, '2022-04-13 10:56:32', '2022-04-13 10:56:29', '0000-00-00 00:00:00', '2022-04-13 10:56:32'),
(10044, 367, 9, 127, 'GA Drawing approval', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10045, 367, 9, 128, 'Fabrication drawing preparation & released for Manufacturing', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10046, 367, 9, 129, 'Material Procurement', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10047, 367, 9, 130, 'Shell and Dish end material receipt', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10048, 367, 9, 131, 'Body Flanges material receipt', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10049, 367, 9, 132, 'Nozzle flanges material receipt', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10050, 367, 9, 133, 'Nozzle pipes material receipt', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10051, 367, 9, 134, 'Hardware and Gaskets material receipt', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10052, 367, 9, 135, 'Packing material (wooden saddles/Boxes) receipt', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10053, 367, 9, 136, 'Shell, Jacket & Dish end Material cutting', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10054, 367, 9, 137, 'Shell & Jacket Rolling', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10055, 367, 9, 138, 'Dish end forming', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10056, 367, 9, 139, 'Body flange machining and drilling', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10057, 367, 9, 140, 'Shell L Seam setup & welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10058, 367, 9, 141, 'Shell C Seam Setup & Welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10059, 367, 9, 142, 'Shell to One side Dishned Setup & Welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10060, 367, 9, 143, 'Shell to body flanges setup & welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10061, 367, 9, 144, 'Jacket to shell Welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10062, 367, 9, 145, 'Limpet Setup to shell & dishend', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10063, 367, 9, 146, 'Limpet welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10064, 367, 9, 147, 'Internal Coil Rolling', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10065, 367, 9, 148, 'Internal Coil Welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10066, 367, 9, 149, 'Internal Coil Hydro test', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10067, 367, 9, 150, 'Internal Coil Assembly inside Shell', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10068, 367, 9, 151, 'Shell to Second side Dishned Setup & Welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10069, 367, 9, 152, 'Nozzle Fabrication on ground', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10070, 367, 9, 153, 'Nozzle Marking & Opening', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10071, 367, 9, 154, 'Nozzle setup & Welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10072, 367, 9, 155, 'Manhole Setup & Welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10073, 367, 9, 156, 'Support & External attachement on shell Setup welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10074, 367, 9, 157, 'Hydro Test', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10075, 367, 9, 158, 'Surface Preparation', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10076, 367, 9, 159, 'Painting', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10077, 367, 9, 160, 'Dispatch', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10078, 367, 10, 1, 'SO Release', 'Completed', 1, NULL, NULL, NULL, '2022-01-04 10:52:20', '2021-12-21 12:13:49'),
(10079, 367, 10, 2, 'QAP Submission & Approval', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10080, 367, 10, 3, 'GA drawing Preparation & Submission', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-21 12:14:00'),
(10081, 367, 10, 127, 'GA Drawing approval', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10082, 367, 10, 128, 'Fabrication drawing preparation & released for Manufacturing', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10083, 367, 10, 129, 'Material Procurement', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10084, 367, 10, 130, 'Shell and Dish end material receipt', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10085, 367, 10, 131, 'Body Flanges material receipt', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10086, 367, 10, 132, 'Nozzle flanges material receipt', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10087, 367, 10, 133, 'Nozzle pipes material receipt', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10088, 367, 10, 134, 'Hardware and Gaskets material receipt', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10089, 367, 10, 135, 'Packing material (wooden saddles/Boxes) receipt', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10090, 367, 10, 136, 'Shell, Jacket & Dish end Material cutting', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10091, 367, 10, 137, 'Shell & Jacket Rolling', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10092, 367, 10, 138, 'Dish end forming', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10093, 367, 10, 139, 'Body flange machining and drilling', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10094, 367, 10, 140, 'Shell L Seam setup & welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10095, 367, 10, 141, 'Shell C Seam Setup & Welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10096, 367, 10, 142, 'Shell to One side Dishned Setup & Welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10097, 367, 10, 143, 'Shell to body flanges setup & welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10098, 367, 10, 144, 'Jacket to shell Welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10099, 367, 10, 145, 'Limpet Setup to shell & dishend', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10100, 367, 10, 146, 'Limpet welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10101, 367, 10, 147, 'Internal Coil Rolling', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10102, 367, 10, 148, 'Internal Coil Welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10103, 367, 10, 149, 'Internal Coil Hydro test', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10104, 367, 10, 150, 'Internal Coil Assembly inside Shell', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10105, 367, 10, 151, 'Shell to Second side Dishned Setup & Welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10106, 367, 10, 152, 'Nozzle Fabrication on ground', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10107, 367, 10, 153, 'Nozzle Marking & Opening', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10108, 367, 10, 154, 'Nozzle setup & Welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10109, 367, 10, 155, 'Manhole Setup & Welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10110, 367, 10, 156, 'Support & External attachement on shell Setup welding', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10111, 367, 10, 157, 'Hydro Test', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10112, 367, 10, 158, 'Surface Preparation', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10113, 367, 10, 159, 'Painting', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10114, 367, 10, 160, 'Dispatch', 'Pending', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10115, 368, 11, 29, 'SO Release', 'Completed', 1, NULL, '2022-05-05 12:42:53', '2022-05-05 12:42:55', '2022-01-04 10:52:20', '2022-05-05 12:42:55'),
(10116, 368, 11, 30, 'QAP Submission & Approval', 'Completed', 1, NULL, NULL, '2022-02-14 12:13:41', '0000-00-00 00:00:00', '2022-02-14 12:13:41'),
(10117, 368, 11, 31, 'GA drawing Preparation & Submission', 'Skip', 1, NULL, '2022-11-28 18:24:57', '2022-11-28 18:25:00', '0000-00-00 00:00:00', '2022-11-28 18:25:00'),
(10118, 368, 11, 161, 'GA drawing approval', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-20 13:48:28'),
(10119, 368, 11, 162, 'Fabrication drawing preparation & released for Manufacturing', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-20 13:48:30'),
(10120, 368, 11, 163, 'Material Procurement', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-20 13:48:32'),
(10121, 368, 11, 164, 'Shell and Dish end material receipt', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-20 13:48:33'),
(10122, 368, 11, 165, 'Body Flanges material receipt', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-20 13:48:34'),
(10123, 368, 11, 166, 'Nozzle flanges material receipt', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-20 13:48:36'),
(10124, 368, 11, 167, 'Nozzle pipes material receipt', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-20 13:48:42'),
(10125, 368, 11, 168, 'Hardware and Gaskets material receipt', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-20 13:48:46'),
(10126, 368, 11, 169, 'Packing material (wooden saddles/Boxes) receipt', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-20 13:48:47'),
(10127, 368, 11, 170, 'Shell & Dish end Material cutting', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-20 13:48:48'),
(10128, 368, 11, 171, 'Shell  Rolling', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-20 13:48:50'),
(10129, 368, 11, 172, 'Dish end forming', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-20 13:48:51'),
(10130, 368, 11, 173, 'Body flange machining and drilling', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-20 13:48:56'),
(10131, 368, 11, 174, 'Shell L Seam setup & welding', 'Completed', 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-12-20 13:59:23'),
(10132, 368, 11, 175, 'Shell C Seam Setup & Welding', 'Completed', 1, NULL, NULL, '2022-02-14 12:13:47', '0000-00-00 00:00:00', '2022-02-14 12:13:47'),
(10133, 368, 11, 176, 'Shell to One side Dish end Setup & Welding', 'Completed', 1, NULL, NULL, '2022-02-14 12:13:48', '0000-00-00 00:00:00', '2022-02-14 12:13:48'),
(10134, 368, 11, 177, 'Shell to Second side Dish end Setup & Welding', 'Completed', 1, NULL, NULL, '2022-02-14 12:13:50', '0000-00-00 00:00:00', '2022-02-14 12:13:50'),
(10135, 368, 11, 178, 'Shell to body flanges setup & welding', 'Completed', 1, NULL, NULL, '2022-02-14 12:13:56', '0000-00-00 00:00:00', '2022-02-14 12:13:56'),
(10136, 368, 11, 179, 'Nozzle Fabrication on ground', 'Completed', 1, NULL, NULL, '2022-02-14 12:14:07', '0000-00-00 00:00:00', '2022-02-14 12:14:07'),
(10137, 368, 11, 180, 'Nozzle Marking & Opening', 'Completed', 1, NULL, NULL, '2022-02-14 12:14:13', '0000-00-00 00:00:00', '2022-02-14 12:14:13'),
(10138, 368, 11, 181, 'Nozzle setup & Welding', 'Completed', 1, NULL, NULL, '2022-02-14 12:14:14', '0000-00-00 00:00:00', '2022-02-14 12:14:14'),
(10139, 368, 11, 182, 'Manhole Setup & Welding', 'Completed', 1, NULL, NULL, '2022-02-14 12:14:15', '0000-00-00 00:00:00', '2022-02-14 12:14:15'),
(10140, 368, 11, 183, 'Support & External attachement on shell Setup welding', 'Completed', 1, NULL, NULL, '2022-02-14 12:14:17', '0000-00-00 00:00:00', '2022-02-14 12:14:17'),
(10141, 368, 11, 184, 'Hydro Test', 'Completed', 1, NULL, NULL, '2022-02-14 12:14:18', '0000-00-00 00:00:00', '2022-02-14 12:14:18'),
(10142, 368, 11, 185, 'Surface Preparation', 'Completed', 1, NULL, NULL, '2022-02-14 12:14:25', '0000-00-00 00:00:00', '2022-02-14 12:14:25'),
(10143, 368, 11, 186, 'Painting', 'Completed', 1, NULL, '2022-02-14 12:14:27', '2022-02-14 12:14:28', '0000-00-00 00:00:00', '2022-02-14 12:14:28'),
(10144, 368, 11, 187, 'Dispatch', 'Completed', 1, NULL, NULL, '2022-02-14 12:15:39', '0000-00-00 00:00:00', '2022-02-14 12:15:39'),
(10145, 370, 13, 29, 'SO Release', 'Pending', 1, NULL, NULL, NULL, '2022-03-01 08:05:25', '2022-02-10 13:02:56'),
(10146, 370, 13, 30, 'QAP Submission & Approval', 'Pending', 1, NULL, '2022-11-28 19:00:54', '2022-11-28 19:00:40', '2022-03-01 08:05:25', '2022-11-28 19:00:54'),
(10147, 370, 13, 31, 'GA drawing Preparation & Submission', 'Completed', 1, NULL, NULL, '2022-02-10 07:20:18', '2022-03-01 08:05:25', '2022-02-10 07:20:18'),
(10148, 370, 13, 161, 'GA drawing approval', 'Completed', 1, NULL, NULL, '2022-02-22 13:22:27', '2022-03-01 08:05:25', '2022-02-22 13:22:27'),
(10149, 370, 13, 162, 'Fabrication drawing preparation & released for Manufacturing', 'Skip', 1, NULL, '2022-01-08 05:31:08', '2022-11-28 19:01:20', '2022-03-01 08:05:25', '2022-11-28 19:01:20'),
(10150, 370, 13, 163, 'Material Procurement', 'Pending', 1, NULL, '2022-02-10 07:18:12', NULL, '2022-03-01 08:05:25', '2022-02-10 07:18:12'),
(10151, 370, 13, 164, 'Shell and Dish end material receipt', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10152, 370, 13, 165, 'Body Flanges material receipt', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10153, 370, 13, 166, 'Nozzle flanges material receipt', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10154, 370, 13, 167, 'Nozzle pipes material receipt', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10155, 370, 13, 168, 'Hardware and Gaskets material receipt', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10156, 370, 13, 169, 'Packing material (wooden saddles/Boxes) receipt', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10157, 370, 13, 170, 'Shell & Dish end Material cutting', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10158, 370, 13, 171, 'Shell  Rolling', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10159, 370, 13, 172, 'Dish end forming', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10160, 370, 13, 173, 'Body flange machining and drilling', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10161, 370, 13, 174, 'Shell L Seam setup & welding', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10162, 370, 13, 175, 'Shell C Seam Setup & Welding', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10163, 370, 13, 176, 'Shell to One side Dish end Setup & Welding', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10164, 370, 13, 177, 'Shell to Second side Dish end Setup & Welding', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10165, 370, 13, 178, 'Shell to body flanges setup & welding', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10166, 370, 13, 179, 'Nozzle Fabrication on ground', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10167, 370, 13, 180, 'Nozzle Marking & Opening', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10168, 370, 13, 181, 'Nozzle setup & Welding', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10169, 370, 13, 182, 'Manhole Setup & Welding', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10170, 370, 13, 183, 'Support & External attachement on shell Setup welding', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:25', NULL),
(10171, 370, 13, 184, 'Hydro Test', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10172, 370, 13, 185, 'Surface Preparation', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10173, 370, 13, 186, 'Painting', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10174, 370, 13, 187, 'Dispatch', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10175, 370, 14, 1, 'SO Release', 'Pending', 1, NULL, '2022-01-03 09:49:02', NULL, '2022-03-01 08:05:26', '2022-01-03 09:49:02'),
(10176, 370, 14, 2, 'QAP Submission & Approval', 'Pending', 1, NULL, '2022-01-03 09:48:31', NULL, '2022-03-01 08:05:26', '2022-01-03 09:48:31'),
(10177, 370, 14, 3, 'GA drawing Preparation & Submission', 'Completed', 1, NULL, '2022-01-03 10:10:54', '2022-01-03 10:10:56', '2022-03-01 08:05:26', '2022-01-03 10:10:56'),
(10178, 370, 14, 127, 'GA Drawing approval', 'Pending', 1, NULL, '2022-01-03 10:15:00', '2022-01-03 10:05:43', '2022-03-01 08:05:26', '2022-01-03 10:15:00'),
(10179, 370, 14, 128, 'Fabrication drawing preparation & released for Manufacturing', 'Pending', 1, NULL, '2022-01-10 09:49:19', NULL, '2022-03-01 08:05:26', '2022-01-10 09:49:19'),
(10180, 370, 14, 129, 'Material Procurement', 'Pending', 1, NULL, '2022-01-10 09:49:20', NULL, '2022-03-01 08:05:26', '2022-01-10 09:49:20'),
(10181, 370, 14, 130, 'Shell and Dish end material receipt', 'Pending', 1, NULL, '2022-01-10 09:49:28', NULL, '2022-03-01 08:05:26', '2022-01-10 09:49:28'),
(10182, 370, 14, 131, 'Body Flanges material receipt', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10183, 370, 14, 132, 'Nozzle flanges material receipt', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10184, 370, 14, 133, 'Nozzle pipes material receipt', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10185, 370, 14, 134, 'Hardware and Gaskets material receipt', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10186, 370, 14, 135, 'Packing material (wooden saddles/Boxes) receipt', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10187, 370, 14, 136, 'Shell, Jacket & Dish end Material cutting', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10188, 370, 14, 137, 'Shell & Jacket Rolling', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10189, 370, 14, 138, 'Dish end forming', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10190, 370, 14, 139, 'Body flange machining and drilling', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10191, 370, 14, 140, 'Shell L Seam setup & welding', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10192, 370, 14, 141, 'Shell C Seam Setup & Welding', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10193, 370, 14, 142, 'Shell to One side Dishned Setup & Welding', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10194, 370, 14, 143, 'Shell to body flanges setup & welding', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10195, 370, 14, 144, 'Jacket to shell Welding', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10196, 370, 14, 145, 'Limpet Setup to shell & dishend', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10197, 370, 14, 146, 'Limpet welding', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10198, 370, 14, 147, 'Internal Coil Rolling', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10199, 370, 14, 148, 'Internal Coil Welding', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10200, 370, 14, 149, 'Internal Coil Hydro test', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10201, 370, 14, 150, 'Internal Coil Assembly inside Shell', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10202, 370, 14, 151, 'Shell to Second side Dishned Setup & Welding', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:26', NULL),
(10203, 370, 14, 152, 'Nozzle Fabrication on ground', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:27', NULL),
(10204, 370, 14, 153, 'Nozzle Marking & Opening', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:27', NULL),
(10205, 370, 14, 154, 'Nozzle setup & Welding', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:27', NULL),
(10206, 370, 14, 155, 'Manhole Setup & Welding', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:27', NULL),
(10207, 370, 14, 156, 'Support & External attachement on shell Setup welding', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:27', NULL),
(10208, 370, 14, 157, 'Hydro Test', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:27', NULL),
(10209, 370, 14, 158, 'Surface Preparation', NULL, 1, NULL, NULL, NULL, '2022-03-01 08:05:27', NULL),
(10210, 370, 14, 159, 'Painting', NULL, 1, NULL, '2022-01-03 09:55:23', '2022-01-03 09:55:29', '2022-03-01 08:05:27', '2022-01-08 05:31:54'),
(10211, 370, 14, 160, 'Dispatch', NULL, 1, NULL, '2022-01-03 09:55:03', '2022-01-03 09:52:59', '2022-03-01 08:05:27', '2022-01-03 09:55:03'),
(10212, 371, 15, 29, 'SO Release', NULL, 1, NULL, '2022-02-16 09:55:03', '2022-02-22 09:52:59', '2022-01-04 10:52:20', NULL),
(10213, 371, 15, 30, 'QAP Submission & Approval', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10214, 371, 15, 31, 'GA drawing Preparation & Submission', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10215, 371, 15, 161, 'GA drawing approval', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10216, 371, 15, 162, 'Fabrication drawing preparation & released for Manufacturing', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10217, 371, 15, 163, 'Material Procurement', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10218, 371, 15, 164, 'Shell and Dish end material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10219, 371, 15, 165, 'Body Flanges material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10220, 371, 15, 166, 'Nozzle flanges material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10221, 371, 15, 167, 'Nozzle pipes material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10222, 371, 15, 168, 'Hardware and Gaskets material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10223, 371, 15, 169, 'Packing material (wooden saddles/Boxes) receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10224, 371, 15, 170, 'Shell & Dish end Material cutting', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10225, 371, 15, 171, 'Shell  Rolling', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10226, 371, 15, 172, 'Dish end forming', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10227, 371, 15, 173, 'Body flange machining and drilling', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10228, 371, 15, 174, 'Shell L Seam setup & welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10229, 371, 15, 175, 'Shell C Seam Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10230, 371, 15, 176, 'Shell to One side Dish end Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10231, 371, 15, 177, 'Shell to Second side Dish end Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10232, 371, 15, 178, 'Shell to body flanges setup & welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10233, 371, 15, 179, 'Nozzle Fabrication on ground', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10234, 371, 15, 180, 'Nozzle Marking & Opening', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10235, 371, 15, 181, 'Nozzle setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10236, 371, 15, 182, 'Manhole Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10237, 371, 15, 183, 'Support & External attachement on shell Setup welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10238, 371, 15, 184, 'Hydro Test', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10239, 371, 15, 185, 'Surface Preparation', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10240, 371, 15, 186, 'Painting', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10241, 371, 15, 187, 'Dispatch', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10242, 371, 16, 1, 'SO Release', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10243, 371, 16, 2, 'QAP Submission & Approval', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10244, 371, 16, 3, 'GA drawing Preparation & Submission', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10245, 371, 16, 127, 'GA Drawing approval', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10246, 371, 16, 128, 'Fabrication drawing preparation & released for Manufacturing', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10247, 371, 16, 129, 'Material Procurement', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10248, 371, 16, 130, 'Shell and Dish end material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10249, 371, 16, 131, 'Body Flanges material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10250, 371, 16, 132, 'Nozzle flanges material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10251, 371, 16, 133, 'Nozzle pipes material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10252, 371, 16, 134, 'Hardware and Gaskets material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10253, 371, 16, 135, 'Packing material (wooden saddles/Boxes) receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10254, 371, 16, 136, 'Shell, Jacket & Dish end Material cutting', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10255, 371, 16, 137, 'Shell & Jacket Rolling', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10256, 371, 16, 138, 'Dish end forming', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10257, 371, 16, 139, 'Body flange machining and drilling', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10258, 371, 16, 140, 'Shell L Seam setup & welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10259, 371, 16, 141, 'Shell C Seam Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10260, 371, 16, 142, 'Shell to One side Dishned Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10261, 371, 16, 143, 'Shell to body flanges setup & welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10262, 371, 16, 144, 'Jacket to shell Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10263, 371, 16, 145, 'Limpet Setup to shell & dishend', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10264, 371, 16, 146, 'Limpet welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10265, 371, 16, 147, 'Internal Coil Rolling', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10266, 371, 16, 148, 'Internal Coil Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10267, 371, 16, 149, 'Internal Coil Hydro test', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10268, 371, 16, 150, 'Internal Coil Assembly inside Shell', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10269, 371, 16, 151, 'Shell to Second side Dishned Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10270, 371, 16, 152, 'Nozzle Fabrication on ground', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10271, 371, 16, 153, 'Nozzle Marking & Opening', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10272, 371, 16, 154, 'Nozzle setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10273, 371, 16, 155, 'Manhole Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10274, 371, 16, 156, 'Support & External attachement on shell Setup welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10275, 371, 16, 157, 'Hydro Test', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10276, 371, 16, 158, 'Surface Preparation', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10277, 371, 16, 159, 'Painting', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10278, 371, 16, 160, 'Dispatch', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10279, 371, 17, 188, 'SO Release', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10280, 371, 17, 189, 'QAP Submission & Approval', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10281, 371, 17, 190, 'GA drawing Preparation & Submission', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10282, 371, 17, 191, 'GA Drawing approval', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10283, 371, 17, 192, 'Fabrication drawing preperation & released for Manufacturing', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10284, 371, 17, 193, 'Material Procurement', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10285, 371, 17, 194, 'Shell and Dish end material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10286, 371, 17, 195, 'Body Flanges material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10287, 371, 17, 196, 'Nozzle flanges material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10288, 371, 17, 197, 'Nozzle pipes material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10289, 371, 17, 198, 'Hardware and Gaskets material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10290, 371, 17, 199, 'Packing material (wooden saddles/Boxes) receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10291, 371, 17, 200, 'Shell, Jacket & Dish end Material cutting', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10292, 371, 17, 201, 'Shell & Jacket Rolling', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10293, 371, 17, 202, 'Dish end forming', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10294, 371, 17, 203, 'Body flange machining and drilling', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10295, 371, 17, 204, 'Shell L Seam setup & welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10296, 371, 17, 205, 'Shell C Seam Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10297, 371, 17, 206, 'Shell to One side Dish end Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10298, 371, 17, 207, 'Shell to body flanges setup & welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10299, 371, 17, 208, 'Jacket to shell Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10300, 371, 17, 209, 'Limpet Setup to shell & dish end', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10301, 371, 17, 210, 'Limpet welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10302, 371, 17, 211, 'Internal Coil Rolling', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10303, 371, 17, 212, 'Internal Coil Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10304, 371, 17, 213, 'Internal Coil Hydro test', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10305, 371, 17, 214, 'Internal Coil Assembly inside Shell', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10306, 371, 17, 215, 'Shell to Second side Dish end Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10307, 371, 17, 216, 'Nozzle Fabrication on ground', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10308, 371, 17, 217, 'Nozzle Marking & Opening', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10309, 371, 17, 218, 'Nozzle setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10310, 371, 17, 219, 'Manhole Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10311, 371, 17, 220, 'Support & External attachement on shell Setup welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10312, 371, 17, 221, 'Hydro Test', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10313, 371, 17, 222, 'Surface Preparation', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10314, 371, 17, 223, 'Painting', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10315, 371, 17, 224, 'Dispatch', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10317, 378, 18, 29, 'SO Release', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10318, 378, 18, 30, 'QAP Submission & Approval', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10319, 378, 18, 31, 'GA drawing Preparation & Submission', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10320, 378, 18, 161, 'GA drawing approval', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10321, 378, 18, 162, 'Fabrication drawing preparation & released for Manufacturing', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10322, 378, 18, 163, 'Material Procurement', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10323, 378, 18, 164, 'Shell and Dish end material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10324, 378, 18, 165, 'Body Flanges material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10325, 378, 18, 166, 'Nozzle flanges material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10326, 378, 18, 167, 'Nozzle pipes material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10327, 378, 18, 168, 'Hardware and Gaskets material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10328, 378, 18, 169, 'Packing material (wooden saddles/Boxes) receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10329, 378, 18, 170, 'Shell & Dish end Material cutting', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10330, 378, 18, 171, 'Shell  Rolling', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10331, 378, 18, 172, 'Dish end forming', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10332, 378, 18, 173, 'Body flange machining and drilling', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10333, 378, 18, 174, 'Shell L Seam setup & welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10334, 378, 18, 175, 'Shell C Seam Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10335, 378, 18, 176, 'Shell to One side Dish end Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10336, 378, 18, 177, 'Shell to Second side Dish end Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10337, 378, 18, 178, 'Shell to body flanges setup & welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10338, 378, 18, 179, 'Nozzle Fabrication on ground', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10339, 378, 18, 180, 'Nozzle Marking & Opening', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10340, 378, 18, 181, 'Nozzle setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10341, 378, 18, 182, 'Manhole Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10342, 378, 18, 183, 'Support & External attachement on shell Setup welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10343, 378, 18, 184, 'Hydro Test', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10344, 378, 18, 185, 'Surface Preparation', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10345, 378, 18, 186, 'Painting', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10346, 378, 18, 187, 'Dispatch', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10490, 382, 23, 188, 'SO Release', 'Completed', 1, NULL, '2022-04-13 19:40:21', '2022-04-13 19:40:23', '2022-01-04 10:52:20', '2022-04-13 19:40:23'),
(10491, 382, 23, 189, 'QAP Submission & Approval', 'Completed', 1, NULL, NULL, '2022-04-13 19:40:34', '0000-00-00 00:00:00', '2022-04-13 19:40:34'),
(10492, 382, 23, 190, 'GA drawing Preparation & Submission', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2023-01-03 11:02:49'),
(10493, 382, 23, 191, 'GA Drawing approval', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2022-12-29 16:38:31'),
(10494, 382, 23, 192, 'Fabrication drawing preperation & released for Manufacturing', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2022-12-29 16:38:34'),
(10495, 382, 23, 193, 'Material Procurement', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10496, 382, 23, 194, 'Shell and Dish end material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10497, 382, 23, 195, 'Body Flanges material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10498, 382, 23, 196, 'Nozzle flanges material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10499, 382, 23, 197, 'Nozzle pipes material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10500, 382, 23, 198, 'Hardware and Gaskets material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10501, 382, 23, 199, 'Packing material (wooden saddles/Boxes) receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10502, 382, 23, 200, 'Shell, Jacket & Dish end Material cutting', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10503, 382, 23, 201, 'Shell & Jacket Rolling', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10504, 382, 23, 202, 'Dish end forming', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10505, 382, 23, 203, 'Body flange machining and drilling', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10506, 382, 23, 204, 'Shell L Seam setup & welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10507, 382, 23, 205, 'Shell C Seam Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10508, 382, 23, 206, 'Shell to One side Dish end Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10509, 382, 23, 207, 'Shell to body flanges setup & welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10510, 382, 23, 208, 'Jacket to shell Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10511, 382, 23, 209, 'Limpet Setup to shell & dish end', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10512, 382, 23, 210, 'Limpet welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10513, 382, 23, 211, 'Internal Coil Rolling', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10514, 382, 23, 212, 'Internal Coil Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10515, 382, 23, 213, 'Internal Coil Hydro test', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10516, 382, 23, 214, 'Internal Coil Assembly inside Shell', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10517, 382, 23, 215, 'Shell to Second side Dish end Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10518, 382, 23, 216, 'Nozzle Fabrication on ground', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10519, 382, 23, 217, 'Nozzle Marking & Opening', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10520, 382, 23, 218, 'Nozzle setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10521, 382, 23, 219, 'Manhole Setup & Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10522, 382, 23, 220, 'Support & External attachement on shell Setup welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10523, 382, 23, 221, 'Hydro Test', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10524, 382, 23, 222, 'Surface Preparation', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10525, 382, 23, 223, 'Painting', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10527, 382, 23, 78, 'Agitator-SO Release', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10528, 382, 23, 79, 'Agitator-GA drawing Preperation', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10529, 382, 23, 225, 'Agitator-GA Drawing approval', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10530, 382, 23, 226, 'Agitator-Fabrication drawing preparation & released for Manufacturing', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10531, 382, 23, 227, 'Agitator-Material Procurement', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10532, 382, 23, 228, 'Agitator-Gear Box Procurement', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10533, 382, 23, 229, 'Agitator-Mechanical seal Procurement', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10534, 382, 23, 230, 'Agitator-Mechanical seal drawing approval', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10535, 382, 23, 231, 'Agitator-Motor Procurement', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10536, 382, 23, 232, 'Agitator-Shaft machining, key way, shaft polishing', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10537, 382, 23, 233, 'Agitator-Mounting stool fabrication & Machining', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10538, 382, 23, 234, 'Agitator-Bearing Housing Fabrication & Machining', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10539, 382, 23, 235, 'Agitator-Impeller blades Manufacturing & Balancing', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10540, 382, 23, 236, 'Agitator-Agitator Assembly', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10541, 382, 23, 237, 'Agitator-Agitator Running trial - without Load and with Load trial', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(10542, 383, 24, 29, 'SO Release', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10543, 383, 24, 30, 'QAP Submission & Approval', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10544, 383, 24, 31, 'GA drawing Preparation & Submission', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10545, 383, 24, 161, 'GA drawing approval', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10546, 383, 24, 162, 'Fabrication drawing preparation & released for Manufacturing', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10547, 383, 24, 163, 'Material Procurement', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10548, 383, 24, 164, 'Shell and Dish end material receipt', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10549, 383, 24, 165, 'Body Flanges material receipt', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10550, 383, 24, 166, 'Nozzle flanges material receipt', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10551, 383, 24, 167, 'Nozzle pipes material receipt', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10552, 383, 24, 168, 'Hardware and Gaskets material receipt', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10553, 383, 24, 169, 'Packing material (wooden saddles/Boxes) receipt', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10554, 383, 24, 170, 'Shell & Dish end Material cutting', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10555, 383, 24, 171, 'Shell  Rolling', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10556, 383, 24, 172, 'Dish end forming', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10557, 383, 24, 173, 'Body flange machining and drilling', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10558, 383, 24, 174, 'Shell L Seam setup & welding', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10559, 383, 24, 175, 'Shell C Seam Setup & Welding', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10560, 383, 24, 176, 'Shell to One side Dish end Setup & Welding', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10561, 383, 24, 177, 'Shell to Second side Dish end Setup & Welding', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10562, 383, 24, 178, 'Shell to body flanges setup & welding', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10563, 383, 24, 179, 'Nozzle Fabrication on ground', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10564, 383, 24, 180, 'Nozzle Marking & Opening', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10565, 383, 24, 181, 'Nozzle setup & Welding', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10566, 383, 24, 182, 'Manhole Setup & Welding', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10567, 383, 24, 183, 'Support & External attachement on shell Setup welding', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10568, 383, 24, 184, 'Hydro Test', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10569, 383, 24, 185, 'Surface Preparation', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10570, 383, 24, 186, 'Painting', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10571, 383, 24, 187, 'Dispatch', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10572, 383, 25, 238, 'SO Release', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10573, 383, 25, 239, 'QAP Submission & Approval', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10574, 383, 25, 240, 'GA drawing Preparation & Submission', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10575, 383, 25, 241, 'GA Drawing approval', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10576, 383, 25, 242, 'Fabrication drawing preparation & released for Manufacturing', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10577, 383, 25, 243, 'Material Procurement', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10578, 383, 25, 244, 'Shell and Dish end material receipt', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10579, 383, 25, 245, 'Tube and Tubesheet material receipt', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10580, 383, 25, 246, 'Body flange material receipt', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10581, 383, 25, 247, 'Nozzle flanges material receipt', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10582, 383, 25, 248, 'Nozzle pipes material receipt', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10583, 383, 25, 249, 'Hardware and Gaskets material receipt', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10584, 383, 25, 250, 'Packing material (wooden saddles/Boxes) receipt', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL);
INSERT INTO `order_stages` (`id`, `order_id`, `equip_id`, `stage_id`, `stage_name`, `status`, `admin_id`, `remark`, `started_at`, `completed_at`, `created_at`, `updated_at`) VALUES
(10585, 383, 25, 251, 'Shell, Bonnet & Dish end Material cutting', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10586, 383, 25, 252, 'Shell Rolling', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10587, 383, 25, 253, 'Dish end forming', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10588, 383, 25, 254, 'Tube Sheet & Bonnet Flange Machining', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10589, 383, 25, 255, 'Tube Sheet & Bonnet Flange Drilling', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10590, 383, 25, 256, 'Main Shell & Bonnet Shell L Seam Setup & welding', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10591, 383, 25, 257, 'Main Shell & Bonnet Shell C Seam Setup & welding', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10592, 383, 25, 258, 'Bonnet Shell to Dish end setup & welding', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10593, 383, 25, 259, 'Partition Plate Profile Cutting Setup & Welding', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10594, 383, 25, 260, 'Bonnet Flange to Bonnet shell welding', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10595, 383, 25, 261, 'Tube Bundle Making', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10596, 383, 25, 262, 'Tube bundle assembly in shell', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10597, 383, 25, 263, 'Tube to Tube sheet setup & welding', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10598, 383, 25, 264, 'Shell & Tube side Nozzle Fabrication on ground', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10599, 383, 25, 265, 'Shell & Tube Side Nozzle Marking & Opening', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10600, 383, 25, 266, 'Shell & Tube side Nozzle Setup & Welding', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10601, 383, 25, 267, 'Support & External attachment on shell Setup welding', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10602, 383, 25, 268, 'Shell side Hydro Test', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10603, 383, 25, 269, 'Tube side Hydro Test', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10604, 383, 25, 270, 'Surface Preparation', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10605, 383, 25, 271, 'Painting', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(10606, 383, 25, 272, 'Dispatch', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', NULL),
(11078, 402, 41, 126, 'Stage 1', 'Completed', 1, NULL, '2023-02-14 20:17:29', '2023-02-18 20:17:32', '0000-00-00 00:00:00', '2023-02-14 20:17:32'),
(11079, 402, 41, 312, 'SO Release', NULL, 1, NULL, NULL, NULL, '2022-01-04 10:52:20', '2023-04-04 12:09:20'),
(11081, 402, 41, 314, 'GA drawing Preparation & Submission', NULL, 1, NULL, NULL, NULL, '2023-03-23 00:00:00', '2023-04-04 00:06:24'),
(11082, 402, 41, 315, 'GA drawing approval', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2023-04-03 23:02:06'),
(11083, 402, 41, 316, 'Fabrication drawing preparation & released for Manufacturing', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2023-04-03 23:02:08'),
(11084, 402, 41, 317, 'Material Procurement', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11085, 402, 41, 318, 'Shell and Dish end material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11086, 402, 41, 319, 'Nozzle flanges material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11087, 402, 41, 320, 'Nozzle pipes material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11088, 402, 41, 321, 'Hardware and Gaskets material receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2023-04-03 23:48:06'),
(11089, 402, 41, 322, 'Packing material (wooden saddles/Boxes) receipt', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11090, 402, 41, 323, 'Shell, Bonnet, Jacket & Dish end Material cutting', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11091, 402, 41, 324, 'Shell, Bonnet & Jacket Rolling', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11092, 402, 41, 325, 'Shell and Jacket C Seam and L seam welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11093, 402, 41, 326, 'Shell and Jacket Re-rolling', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11094, 402, 41, 327, 'Nozzle fabrication on ground', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11095, 402, 41, 328, 'Nozzle Marking & Opening on shell and Jacket', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11096, 402, 41, 329, 'Nozzle welding to shell & Jacket', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11097, 402, 41, 330, 'Spiral mounting on shell', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11098, 402, 41, 331, 'Body Flange Machining', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11099, 402, 41, 332, 'Body Flange Welding', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11100, 402, 41, 333, 'Complete Shell Machining from both side', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11101, 402, 41, 334, 'Internal Drum Fabrication', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11102, 402, 41, 335, 'Scrappers assembly', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11103, 402, 41, 336, 'Internal Drum Machining', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11104, 402, 41, 337, 'Bottom Cone bonnet Fabrication', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11105, 402, 41, 338, 'Jacket mounting on shell', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11106, 402, 41, 339, 'Jacket side Pneumatic /Hydro Test', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11107, 402, 41, 340, 'Rotor running trial inside the shell', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11108, 402, 41, 341, 'Complete assembly of the equipment', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11109, 402, 41, 342, 'Complete assembly running trial - Without load and with Load', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11110, 402, 41, 343, 'Shell side Pneumatic/Hydro Test', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11111, 402, 41, 344, 'Surface Preparation', 'Completed', 1, NULL, '2023-02-14 20:17:29', '2023-03-10 20:17:32', '2022-08-04 10:19:26', '2023-04-04 12:13:24'),
(11112, 402, 41, 345, 'Painting', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11113, 402, 41, 346, 'Dispatch', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11114, 402, 41, 78, 'Agitator-SO Release', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11115, 402, 41, 79, 'Agitator-GA drawing Preperation', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11116, 402, 41, 225, 'Agitator-GA Drawing approval', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11117, 402, 41, 226, 'Agitator-Fabrication drawing preparation & released for Manufacturing', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11118, 402, 41, 227, 'Agitator-Material Procurement', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11119, 402, 41, 228, 'Agitator-Gear Box Procurement', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11120, 402, 41, 229, 'Agitator-Mechanical seal Procurement', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11121, 402, 41, 230, 'Agitator-Mechanical seal drawing approval', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11122, 402, 41, 231, 'Agitator-Motor Procurement', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11123, 402, 41, 232, 'Agitator-Shaft machining, key way, shaft polishing', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11124, 402, 41, 233, 'Agitator-Mounting stool fabrication & Machining', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11125, 402, 41, 234, 'Agitator-Bearing Housing Fabrication & Machining', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11126, 402, 41, 235, 'Agitator-Impeller blades Manufacturing & Balancing', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11127, 402, 41, 236, 'Agitator-Agitator Assembly', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11128, 402, 41, 237, 'Agitator-Agitator Running trial - without Load and with Load trial', NULL, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(11129, 403, 42, 238, 'SO Release', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:47', NULL),
(11130, 403, 42, 239, 'QAP Submission & Approval', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:47', NULL),
(11131, 403, 42, 240, 'GA drawing Preparation & Submission', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:47', NULL),
(11132, 403, 42, 241, 'GA Drawing approval', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11133, 403, 42, 242, 'Fabrication drawing preparation & released for Manufacturing', 'Completed', 1, NULL, '2023-04-05 23:00:35', '2023-04-08 23:00:37', '2023-04-04 08:46:48', '2023-04-04 23:00:37'),
(11134, 403, 42, 243, 'Material Procurement', 'Completed', 1, NULL, '2023-04-04 20:47:40', '2023-04-10 20:48:27', '2023-04-04 08:46:48', '2023-04-04 20:48:27'),
(11135, 403, 42, 244, 'Shell and Dish end material receipt', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11136, 403, 42, 245, 'Tube and Tubesheet material receipt', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11137, 403, 42, 246, 'Body flange material receipt', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11138, 403, 42, 247, 'Nozzle flanges material receipt', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11139, 403, 42, 248, 'Nozzle pipes material receipt', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11140, 403, 42, 249, 'Hardware and Gaskets material receipt', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11141, 403, 42, 250, 'Packing material (wooden saddles/Boxes) receipt', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11142, 403, 42, 251, 'Shell, Bonnet & Dish end Material cutting', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11143, 403, 42, 252, 'Shell Rolling', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11144, 403, 42, 253, 'Dish end forming', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11145, 403, 42, 254, 'Tube Sheet & Bonnet Flange Machining', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11146, 403, 42, 255, 'Tube Sheet & Bonnet Flange Drilling', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11147, 403, 42, 256, 'Main Shell & Bonnet Shell L Seam Setup & welding', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11148, 403, 42, 257, 'Main Shell & Bonnet Shell C Seam Setup & welding', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11149, 403, 42, 258, 'Bonnet Shell to Dish end setup & welding', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11150, 403, 42, 259, 'Partition Plate Profile Cutting Setup & Welding', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11151, 403, 42, 260, 'Bonnet Flange to Bonnet shell welding', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11152, 403, 42, 261, 'Tube Bundle Making', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11153, 403, 42, 262, 'Tube bundle assembly in shell', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11154, 403, 42, 263, 'Tube to Tube sheet setup & welding', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11155, 403, 42, 264, 'Shell & Tube side Nozzle Fabrication on ground', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11156, 403, 42, 265, 'Shell & Tube Side Nozzle Marking & Opening', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:48', NULL),
(11157, 403, 42, 266, 'Shell & Tube side Nozzle Setup & Welding', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:49', NULL),
(11158, 403, 42, 267, 'Support & External attachment on shell Setup welding', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:49', NULL),
(11159, 403, 42, 268, 'Shell side Hydro Test', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:49', NULL),
(11160, 403, 42, 269, 'Tube side Hydro Test', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:49', NULL),
(11161, 403, 42, 270, 'Surface Preparation', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:49', NULL),
(11162, 403, 42, 271, 'Painting', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:49', NULL),
(11163, 403, 42, 272, 'Dispatch', NULL, 1, NULL, NULL, NULL, '2023-04-04 08:46:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_sub_stages`
--

CREATE TABLE `order_sub_stages` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `equip_id` int(11) DEFAULT NULL,
  `sub_stage_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `started_at` varchar(255) DEFAULT NULL,
  `completed_at` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_sub_stages`
--

INSERT INTO `order_sub_stages` (`id`, `order_id`, `equip_id`, `sub_stage_id`, `status`, `admin_id`, `started_at`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 402, 41, 1, NULL, 1, NULL, '', '0000-00-00 00:00:00', '2023-03-20 07:57:29'),
(2, 402, 41, 2, 'completed', 1, NULL, '2023-03-20 10:13:16', '0000-00-00 00:00:00', '2023-03-20 04:43:16'),
(3, 402, 41, 4, 'completed', 1, '2023-20-03 02:00:40', '2023-03-20 14:00:40', '0000-00-00 00:00:00', '2023-03-20 08:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_cashflow`
--

CREATE TABLE `payment_cashflow` (
  `id` int(11) NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 0,
  `remark` text DEFAULT NULL,
  `admin_id` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_cashflow`
--

INSERT INTO `payment_cashflow` (`id`, `order_id`, `payment_type`, `amount`, `date`, `status`, `remark`, `admin_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(15, 367, 'Amendment', 20, '2021-12-15', 1, NULL, 1, NULL, '0000-00-00 00:00:00', '2022-01-31 14:12:02'),
(16, 367, 'Installment', 30, '2021-12-31', 1, 'remark', 1, NULL, '0000-00-00 00:00:00', '2022-03-14 11:53:10'),
(17, 368, 'Installment', 50, '2022-03-12', 0, 'date extended', NULL, NULL, '0000-00-00 00:00:00', '2022-02-11 02:05:32'),
(18, 370, 'Amendment', 10000, '2022-01-03', 1, '123', 1, 1, '0000-00-00 00:00:00', '2022-02-15 14:44:41'),
(19, 370, 'Installment', 30000, '2023-01-26', 1, 'test\r\ntest 1', 1, NULL, '0000-00-00 00:00:00', '2023-01-12 05:03:04'),
(20, 370, 'Installment', 10000, '2022-01-31', 1, NULL, 1, NULL, '0000-00-00 00:00:00', '2022-01-06 11:51:35'),
(22, 370, 'Installment', 10000, '2023-02-11', 0, NULL, 1, NULL, '0000-00-00 00:00:00', '2023-01-12 05:02:46'),
(25, 367, 'Installment', 20, '2023-01-31', 0, NULL, 1, NULL, '0000-00-00 00:00:00', '2023-01-12 05:01:27'),
(27, 370, 'Installment', 1, '2022-02-01', 1, NULL, 1, NULL, '2022-01-02 01:05:28', '2022-02-16 05:59:29'),
(28, 378, 'Amendment', 100, '2022-02-17', 0, NULL, NULL, NULL, '0000-00-00 00:00:00', '2022-02-17 05:48:10'),
(30, 382, 'Amendment', 50, '2022-02-22', 1, NULL, 1, NULL, '0000-00-00 00:00:00', '2022-12-29 10:08:34'),
(31, 367, 'Installment', 50, '2022-04-01', 0, 'Wrong amount input', NULL, 1, '0000-00-00 00:00:00', '2022-03-15 10:56:28'),
(32, 383, 'Amendment', 1000000, '2022-04-01', 0, NULL, NULL, NULL, '2022-01-04 10:52:20', '2022-04-01 05:22:20'),
(33, 383, 'Installment', 5000000, '2022-04-28', 0, NULL, NULL, NULL, '2022-01-04 10:52:20', '2022-04-01 05:22:20'),
(34, 383, 'Installment', 3000000, '2022-05-02', 0, NULL, NULL, NULL, '2022-01-04 10:52:20', '2022-04-01 05:22:20'),
(35, 383, 'Installment', 3000000, '2023-05-10', 0, NULL, NULL, NULL, '2022-01-04 10:52:20', '2023-01-12 05:01:13'),
(54, 402, 'Amendment', 50, '2023-02-14', 0, NULL, 1, NULL, '0000-00-00 00:00:00', '2023-02-22 06:31:31'),
(55, 403, 'Amendment', 2000, '2023-04-02', 0, NULL, NULL, NULL, '2023-04-04 08:46:49', '2023-04-04 15:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `planning`
--

CREATE TABLE `planning` (
  `id` int(11) NOT NULL,
  `type_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `admin_id` int(11) UNSIGNED NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `planning`
--

INSERT INTO `planning` (`id`, `type_id`, `title`, `content`, `status`, `admin_id`, `attachment`, `created_at`, `updated_at`) VALUES
(1, '1', 'tes', 'des', NULL, 1, NULL, '2022-02-05 10:30:29', '2022-02-05 10:30:57'),
(2, '1', 'tet', 'tes', NULL, 1, NULL, '2022-02-07 15:41:43', '2022-02-07 10:11:43'),
(3, '1', 'test', 'test d', NULL, 1, NULL, '2022-02-14 06:38:04', '2022-02-14 01:08:04'),
(4, '1', 'card 2', 'desc 2', NULL, 1, NULL, '2022-02-14 06:48:24', '2022-02-14 01:18:24'),
(5, '1', 'card 1', 'desc 1', NULL, 1, NULL, '2022-02-14 06:49:55', '2022-02-14 01:19:55'),
(6, '1', 'card 3', 'card desc', NULL, 1, NULL, '2022-02-14 07:07:44', '2022-02-14 01:37:44'),
(7, '1', 'test', 'desc', NULL, 1, NULL, '2022-02-14 07:24:40', '2022-02-14 01:54:40'),
(8, '1', 'test', 'tes', NULL, 1, NULL, '2022-02-14 10:30:51', '2022-02-14 05:00:51'),
(9, '1', 'fd', 'dfg', NULL, 1, NULL, '2022-02-14 12:40:44', '2022-02-14 07:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `planning_types`
--

CREATE TABLE `planning_types` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `admin_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `planning_types`
--

INSERT INTO `planning_types` (`id`, `title`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Backlog', 1, '0000-00-00 00:00:00', '2022-02-05 08:19:16'),
(2, 'To Do', 1, '0000-00-00 00:00:00', '2022-02-05 08:19:16'),
(4, 'In Progress', 1, '2022-02-05 00:00:00', '2022-02-05 08:20:34'),
(5, 'Testing', 1, '2022-02-05 00:00:00', '2022-02-05 08:20:34'),
(6, 'Done', 1, '2022-02-05 00:00:00', '2022-02-05 08:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `permissions` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Account', '[\"1\",\"2\",\"3\"]', '2022-01-13 07:17:43', '2022-01-13 10:17:24'),
(2, 'Sales', '[\"2\",\"3\",\"9\",\"10\"]', '2022-01-13 07:29:27', '2022-01-14 05:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `sale_target`
--

CREATE TABLE `sale_target` (
  `id` int(11) NOT NULL,
  `fy` varchar(255) NOT NULL,
  `target` int(11) DEFAULT NULL,
  `btarget` text DEFAULT NULL,
  `starget` varchar(255) DEFAULT NULL,
  `ly_carryforw` int(11) DEFAULT NULL,
  `cy_carryforw` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_target`
--

INSERT INTO `sale_target` (`id`, `fy`, `target`, `btarget`, `starget`, `ly_carryforw`, `cy_carryforw`, `created_at`, `updated_at`) VALUES
(1, '2021-2022', 5000, '{\"bq1\":\"1250\",\"bq2\":\"1250\",\"bq3\":\"1250\",\"bq4\":\"1250\"}', '{\"sq1\":\"1500\",\"sq2\":\"1250\",\"sq3\":\"1000\",\"sq4\":\"1250\"}', 150, 200, '2022-03-28 12:42:35', '2022-03-28 11:11:31'),
(3, '2022-2023', 5500, '{\"bq1\":\"1500\",\"bq2\":\"1500\",\"bq3\":\"1500\",\"bq4\":\"1000\"}', '{\"sq1\":\"1500\",\"sq2\":\"1500\",\"sq3\":\"1500\",\"sq4\":\"1000\"}', NULL, NULL, '2022-04-01 11:03:14', '2023-01-13 10:02:09'),
(4, '2023-2024', 5500, '{\"bq1\":\"1500\",\"bq2\":\"1500\",\"bq3\":\"1500\",\"bq4\":\"1000\"}', '{\"sq1\":\"1500\",\"sq2\":\"1500\",\"sq3\":\"1500\",\"sq4\":\"1000\"}', NULL, NULL, '2022-04-01 11:03:14', '2023-01-13 10:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `type`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'delivery_warning_days', '15', 1, '0000-00-00 00:00:00', '2022-02-18 05:18:51'),
(2, 'indiamart_api', '9890220852-mR22E79p5H/IT/ej4XSK7l6Ho1fAnzNi', 1, '2022-01-27 00:00:00', '2022-05-04 05:17:30'),
(3, 'admin_email', 'gontemanoj@gmail.com', 1, '2022-02-02 00:00:00', '2022-02-18 05:18:51'),
(4, 'payment_upcming_months', '5', 1, '2022-02-03 00:00:00', '2022-02-18 05:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `se_target`
--

CREATE TABLE `se_target` (
  `id` int(11) NOT NULL,
  `fy` varchar(255) NOT NULL,
  `target` int(11) NOT NULL,
  `region` text NOT NULL,
  `sengg` text NOT NULL,
  `per` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `se_target`
--

INSERT INTO `se_target` (`id`, `fy`, `target`, `region`, `sengg`, `per`, `created_at`, `updated_at`) VALUES
(2, '2022-2023', 100, '[\"MH\"]', '[\"19\"]', '[\"1\"]', '2022-03-29 13:10:19', '2022-05-24 13:24:36'),
(5, '2021-2022', 200, '[\"SOUTH\",\"EAST\"]', '[\"1\",\"18\",\"19\"]', NULL, '2022-03-29 17:16:52', '2022-03-29 11:46:52'),
(6, '2025-2026', 500, '[\"EXPORT\"]', '[\"1\",\"22\"]', NULL, '2022-03-30 11:00:15', '2022-04-27 09:12:26'),
(7, '2021-2022', 200, '[\"MH\",\"SOUTH\"]', '[\"1\",\"18\"]', NULL, '2022-03-30 13:34:56', '2022-03-30 08:04:56'),
(8, '2021-2022', 100, '[\"MH\"]', '[\"1\"]', NULL, '2022-03-30 16:01:28', '2022-03-30 10:31:28'),
(9, '2024-2025', 100, '[\"EAST\",\"EXPORT\"]', '[\"1\",\"20\"]', NULL, '2022-04-26 13:17:52', '2022-04-26 07:47:52'),
(10, '2026-2027', 100, '[\"EAST\"]', '[\"1\"]', NULL, '2022-04-26 13:18:23', '2022-04-26 07:48:23'),
(12, '2022-2023', 100, '[\"EXPORT\"]', '[\"1\"]', '[\"1\"]', '2022-04-26 13:30:47', '2022-05-24 13:25:03'),
(13, '2023-2024', 500, '[\"EAST\",\"NORTH\",\"SOUTH\"]', '[\"1\",\"19\",\"20\"]', NULL, '2022-04-26 13:36:27', '2022-04-26 08:06:27'),
(14, '2023-2024', 100, '[\"EAST\",\"EXPORT\",\"MH\"]', '[\"1\",\"18\"]', NULL, '2022-04-26 14:34:18', '2022-04-26 09:04:18'),
(15, '2022-2023', 300, '[\"EAST\",\"EXPORT\"]', '[\"1\",\"18\"]', '[\"0.5\",\"0.5\"]', '2022-04-26 14:35:16', '2022-05-25 08:03:19'),
(19, '2022-2023', 100, '[\"EAST\",\"EXPORT\"]', '[\"25\",\"41\",\"63\"]', '[\"0.5\",\"0.25\",\"0.25\"]', '2022-05-24 18:30:48', '2022-05-24 13:27:06'),
(20, '2022-2023', 200, '[\"EAST\",\"EXPORT\",\"MH\",\"SOUTH\"]', '[\"25\",\"29\",\"41\",\"38\"]', '[\"0.25\",\"0.25\",\"0.25\",\"0.25\"]', '2022-05-25 15:42:50', '2022-05-25 10:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `admin_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 60, 1, '2022-01-13 00:00:00', '2022-01-13 11:16:56'),
(2, 63, 2, '2022-01-13 11:50:36', '2022-01-13 06:20:36'),
(4, 65, 2, '2022-02-14 05:43:14', '2022-02-14 00:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` int(11) UNSIGNED NOT NULL,
  `stage_no` int(11) DEFAULT NULL,
  `equipment_name` varchar(255) NOT NULL,
  `stage` varchar(255) NOT NULL,
  `days` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `department_id` bigint(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `stage_no`, `equipment_name`, `stage`, `days`, `created_at`, `updated_at`, `department_id`) VALUES
(1, NULL, 'Vessel', 'SO Release', '4', '2020-06-30 15:36:33', '2021-12-22 07:39:37', NULL),
(2, NULL, 'Vessel', 'QAP Submission & Approval', '4', '2020-06-30 15:36:34', '2021-12-22 07:39:37', NULL),
(3, NULL, 'Vessel', 'GA drawing Preparation & Submission', '4', '2020-06-30 15:36:34', '2021-12-22 07:39:37', NULL),
(29, NULL, 'Column', 'SO Release', '3', '2020-06-30 15:41:41', '2023-01-29 12:07:51', NULL),
(30, NULL, 'Column', 'QAP Submission & Approval', '4', '2020-06-30 15:41:41', '2021-12-22 07:39:37', NULL),
(31, NULL, 'Column', 'GA drawing Preparation & Submission', '4', '2020-06-30 15:41:41', '2021-12-22 07:39:37', NULL),
(78, 1, 'Agitator', 'SO Release', '2', '2020-06-30 15:53:06', '2023-01-30 11:06:50', 2),
(79, 2, 'Agitator', 'GA drawing Preperation', '4', '2020-06-30 15:53:06', '2023-01-27 06:01:28', 2),
(126, NULL, 'ATFD', 'Stage 1', '4', '2020-09-05 17:54:39', '2021-12-22 07:39:37', NULL),
(127, NULL, 'Vessel', 'GA Drawing approval', '4', '2021-08-03 15:51:41', '2021-12-22 07:39:37', NULL),
(128, NULL, 'Vessel', 'Fabrication drawing preparation & released for Manufacturing', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(129, NULL, 'Vessel', 'Material Procurement', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(130, NULL, 'Vessel', 'Shell and Dish end material receipt', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(131, NULL, 'Vessel', 'Body Flanges material receipt', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(132, NULL, 'Vessel', 'Nozzle flanges material receipt', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(133, NULL, 'Vessel', 'Nozzle pipes material receipt', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(134, NULL, 'Vessel', 'Hardware and Gaskets material receipt', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(135, NULL, 'Vessel', 'Packing material (wooden saddles/Boxes) receipt', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(136, NULL, 'Vessel', 'Shell, Jacket & Dish end Material cutting', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(137, NULL, 'Vessel', 'Shell & Jacket Rolling', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(138, NULL, 'Vessel', 'Dish end forming', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(139, NULL, 'Vessel', 'Body flange machining and drilling', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(140, NULL, 'Vessel', 'Shell L Seam setup & welding', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(141, NULL, 'Vessel', 'Shell C Seam Setup & Welding', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(142, NULL, 'Vessel', 'Shell to One side Dishned Setup & Welding', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(143, NULL, 'Vessel', 'Shell to body flanges setup & welding', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(144, NULL, 'Vessel', 'Jacket to shell Welding', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(145, NULL, 'Vessel', 'Limpet Setup to shell & dishend', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(146, NULL, 'Vessel', 'Limpet welding', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(147, NULL, 'Vessel', 'Internal Coil Rolling', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(148, NULL, 'Vessel', 'Internal Coil Welding', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(149, NULL, 'Vessel', 'Internal Coil Hydro test', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(150, NULL, 'Vessel', 'Internal Coil Assembly inside Shell', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(151, NULL, 'Vessel', 'Shell to Second side Dishned Setup & Welding', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(152, NULL, 'Vessel', 'Nozzle Fabrication on ground', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(153, NULL, 'Vessel', 'Nozzle Marking & Opening', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(154, NULL, 'Vessel', 'Nozzle setup & Welding', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(155, NULL, 'Vessel', 'Manhole Setup & Welding', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(156, NULL, 'Vessel', 'Support & External attachement on shell Setup welding', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(157, NULL, 'Vessel', 'Hydro Test', '4', '2021-08-03 16:36:40', '2021-12-22 07:39:37', NULL),
(158, NULL, 'Vessel', 'Surface Preparation', '4', '2021-08-03 16:37:08', '2021-12-22 07:39:37', NULL),
(159, NULL, 'Vessel', 'Painting', '4', '2021-08-03 16:37:08', '2021-12-22 07:39:37', NULL),
(160, NULL, 'Vessel', 'Dispatch', '4', '2021-08-03 16:37:08', '2021-12-22 07:39:37', NULL),
(161, NULL, 'Column', 'GA drawing approval', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(162, NULL, 'Column', 'Fabrication drawing preparation & released for Manufacturing', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(163, NULL, 'Column', 'Material Procurement', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(164, NULL, 'Column', 'Shell and Dish end material receipt', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(165, NULL, 'Column', 'Body Flanges material receipt', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(166, NULL, 'Column', 'Nozzle flanges material receipt', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(167, NULL, 'Column', 'Nozzle pipes material receipt', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(168, NULL, 'Column', 'Hardware and Gaskets material receipt', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(169, NULL, 'Column', 'Packing material (wooden saddles/Boxes) receipt', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(170, NULL, 'Column', 'Shell & Dish end Material cutting', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(171, NULL, 'Column', 'Shell  Rolling', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(172, NULL, 'Column', 'Dish end forming', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(173, NULL, 'Column', 'Body flange machining and drilling', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(174, NULL, 'Column', 'Shell L Seam setup & welding', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(175, NULL, 'Column', 'Shell C Seam Setup & Welding', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(176, NULL, 'Column', 'Shell to One side Dish end Setup & Welding', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(177, NULL, 'Column', 'Shell to Second side Dish end Setup & Welding', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(178, NULL, 'Column', 'Shell to body flanges setup & welding', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(179, NULL, 'Column', 'Nozzle Fabrication on ground', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(180, NULL, 'Column', 'Nozzle Marking & Opening', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(181, NULL, 'Column', 'Nozzle setup & Welding', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(182, NULL, 'Column', 'Manhole Setup & Welding', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(183, NULL, 'Column', 'Support & External attachement on shell Setup welding', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(184, NULL, 'Column', 'Hydro Test', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(185, NULL, 'Column', 'Surface Preparation', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(186, NULL, 'Column', 'Painting', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(187, NULL, 'Column', 'Dispatch', '4', '2021-08-03 16:44:09', '2021-12-22 07:39:37', NULL),
(188, NULL, 'Reactor', 'SO Release', '4', '2021-08-03 17:00:49', '2023-01-12 10:19:47', 2),
(189, NULL, 'Reactor', 'QAP Submission & Approval', '4', '2021-08-03 17:00:49', '2023-01-12 10:20:06', 2),
(190, NULL, 'Reactor', 'GA drawing Preparation & Submission', '4', '2021-08-03 17:00:49', '2023-01-12 10:20:09', 2),
(191, NULL, 'Reactor', 'GA Drawing approval', '4', '2021-08-03 17:00:49', '2023-01-12 10:20:13', 2),
(192, NULL, 'Reactor', 'Fabrication drawing preperation & released for Manufacturing', '4', '2021-08-03 17:00:49', '2023-01-12 10:21:57', 1),
(193, NULL, 'Reactor', 'Material Procurement', '4', '2021-08-03 17:00:49', '2023-01-12 10:22:01', 1),
(194, NULL, 'Reactor', 'Shell and Dish end material receipt', '4', '2021-08-03 17:00:49', '2023-01-12 10:22:06', 3),
(195, NULL, 'Reactor', 'Body Flanges material receipt', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(196, NULL, 'Reactor', 'Nozzle flanges material receipt', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(197, NULL, 'Reactor', 'Nozzle pipes material receipt', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(198, NULL, 'Reactor', 'Hardware and Gaskets material receipt', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(199, NULL, 'Reactor', 'Packing material (wooden saddles/Boxes) receipt', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(200, NULL, 'Reactor', 'Shell, Jacket & Dish end Material cutting', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(201, NULL, 'Reactor', 'Shell & Jacket Rolling', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(202, NULL, 'Reactor', 'Dish end forming', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(203, NULL, 'Reactor', 'Body flange machining and drilling', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(204, NULL, 'Reactor', 'Shell L Seam setup & welding', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(205, NULL, 'Reactor', 'Shell C Seam Setup & Welding', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(206, NULL, 'Reactor', 'Shell to One side Dish end Setup & Welding', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(207, NULL, 'Reactor', 'Shell to body flanges setup & welding', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(208, NULL, 'Reactor', 'Jacket to shell Welding', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(209, NULL, 'Reactor', 'Limpet Setup to shell & dish end', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(210, NULL, 'Reactor', 'Limpet welding', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(211, NULL, 'Reactor', 'Internal Coil Rolling', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(212, NULL, 'Reactor', 'Internal Coil Welding', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(213, NULL, 'Reactor', 'Internal Coil Hydro test', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(214, NULL, 'Reactor', 'Internal Coil Assembly inside Shell', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(215, NULL, 'Reactor', 'Shell to Second side Dish end Setup & Welding', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(216, NULL, 'Reactor', 'Nozzle Fabrication on ground', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(217, NULL, 'Reactor', 'Nozzle Marking & Opening', '4', '2021-08-03 17:00:49', '2021-12-22 07:39:37', NULL),
(218, NULL, 'Reactor', 'Nozzle setup & Welding', '4', '2021-08-03 17:01:41', '2021-12-22 07:39:37', NULL),
(219, NULL, 'Reactor', 'Manhole Setup & Welding', '4', '2021-08-03 17:01:41', '2021-12-22 07:39:37', NULL),
(220, NULL, 'Reactor', 'Support & External attachement on shell Setup welding', '4', '2021-08-03 17:01:41', '2021-12-22 07:39:37', NULL),
(221, NULL, 'Reactor', 'Hydro Test', '4', '2021-08-03 17:01:41', '2021-12-22 07:39:37', NULL),
(222, NULL, 'Reactor', 'Surface Preparation', '4', '2021-08-03 17:01:41', '2021-12-22 07:39:37', NULL),
(223, NULL, 'Reactor', 'Painting', '4', '2021-08-03 17:01:41', '2021-12-22 07:39:37', NULL),
(224, NULL, 'Reactor', 'Dispatch', '4', '2021-08-03 17:01:41', '2021-12-22 07:39:37', NULL),
(225, 3, 'Agitator', 'GA Drawing approval', '4', '2021-08-03 17:47:59', '2023-01-27 06:01:25', 2),
(226, 4, 'Agitator', 'Fabrication drawing preparation & released for Manufacturing', '4', '2021-08-03 17:47:59', '2023-01-27 06:01:25', 2),
(227, 5, 'Agitator', 'Material Procurement', '4', '2021-08-03 17:47:59', '2023-01-27 06:01:25', 2),
(228, 6, 'Agitator', 'Gear Box Procurement', '4', '2021-08-03 17:47:59', '2023-01-27 06:01:25', 2),
(229, 7, 'Agitator', 'Mechanical seal Procurement', '4', '2021-08-03 17:47:59', '2023-01-27 06:01:25', 2),
(230, 8, 'Agitator', 'Mechanical seal drawing approval', '4', '2021-08-03 17:47:59', '2023-01-27 06:01:25', 2),
(231, 9, 'Agitator', 'Motor Procurement', '4', '2021-08-03 17:47:59', '2023-01-27 06:01:25', 2),
(232, 10, 'Agitator', 'Shaft machining, key way, shaft polishing', '4', '2021-08-03 17:47:59', '2023-01-04 06:41:54', 2),
(233, 11, 'Agitator', 'Mounting stool fabrication & Machining', '4', '2021-08-03 17:47:59', '2023-01-04 06:41:56', 2),
(234, 12, 'Agitator', 'Bearing Housing Fabrication & Machining', '4', '2021-08-03 17:47:59', '2023-01-04 06:41:59', 2),
(235, 13, 'Agitator', 'Impeller blades Manufacturing & Balancing', '4', '2021-08-03 17:47:59', '2023-01-04 06:42:02', 2),
(236, 15, 'Agitator', 'Agitator Assembly', '4', '2021-08-03 17:47:59', '2023-01-04 06:42:05', 2),
(237, 14, 'Agitator', 'Agitator Running trial - without Load and with Load trial', '4', '2021-08-03 17:47:59', '2023-01-04 06:42:08', 2),
(238, NULL, 'Heat Exchanger', 'SO Release', '4', '2021-08-03 17:52:43', '2021-12-22 07:39:37', NULL),
(239, NULL, 'Heat Exchanger', 'QAP Submission & Approval', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(240, NULL, 'Heat Exchanger', 'GA drawing Preparation & Submission', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(241, NULL, 'Heat Exchanger', 'GA Drawing approval', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(242, NULL, 'Heat Exchanger', 'Fabrication drawing preparation & released for Manufacturing', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(243, NULL, 'Heat Exchanger', 'Material Procurement', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(244, NULL, 'Heat Exchanger', 'Shell and Dish end material receipt', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(245, NULL, 'Heat Exchanger', 'Tube and Tubesheet material receipt', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(246, NULL, 'Heat Exchanger', 'Body flange material receipt', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(247, NULL, 'Heat Exchanger', 'Nozzle flanges material receipt', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(248, NULL, 'Heat Exchanger', 'Nozzle pipes material receipt', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(249, NULL, 'Heat Exchanger', 'Hardware and Gaskets material receipt', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(250, NULL, 'Heat Exchanger', 'Packing material (wooden saddles/Boxes) receipt', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(251, NULL, 'Heat Exchanger', 'Shell, Bonnet & Dish end Material cutting', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(252, NULL, 'Heat Exchanger', 'Shell Rolling', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(253, NULL, 'Heat Exchanger', 'Dish end forming', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(254, NULL, 'Heat Exchanger', 'Tube Sheet & Bonnet Flange Machining', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(255, NULL, 'Heat Exchanger', 'Tube Sheet & Bonnet Flange Drilling', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(256, NULL, 'Heat Exchanger', 'Main Shell & Bonnet Shell L Seam Setup & welding', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(257, NULL, 'Heat Exchanger', 'Main Shell & Bonnet Shell C Seam Setup & welding', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(258, NULL, 'Heat Exchanger', 'Bonnet Shell to Dish end setup & welding', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(259, NULL, 'Heat Exchanger', 'Partition Plate Profile Cutting Setup & Welding', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(260, NULL, 'Heat Exchanger', 'Bonnet Flange to Bonnet shell welding', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(261, NULL, 'Heat Exchanger', 'Tube Bundle Making', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(262, NULL, 'Heat Exchanger', 'Tube bundle assembly in shell', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(263, NULL, 'Heat Exchanger', 'Tube to Tube sheet setup & welding', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(264, NULL, 'Heat Exchanger', 'Shell & Tube side Nozzle Fabrication on ground', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(265, NULL, 'Heat Exchanger', 'Shell & Tube Side Nozzle Marking & Opening', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(266, NULL, 'Heat Exchanger', 'Shell & Tube side Nozzle Setup & Welding', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(267, NULL, 'Heat Exchanger', 'Support & External attachment on shell Setup welding', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(268, NULL, 'Heat Exchanger', 'Shell side Hydro Test', '4', '2021-08-03 17:56:36', '2021-12-22 07:39:37', NULL),
(269, NULL, 'Heat Exchanger', 'Tube side Hydro Test', '4', '2021-08-03 17:57:07', '2021-12-22 07:39:37', NULL),
(270, NULL, 'Heat Exchanger', 'Surface Preparation', '4', '2021-08-03 17:57:07', '2021-12-22 07:39:37', NULL),
(271, NULL, 'Heat Exchanger', 'Painting', '4', '2021-08-03 17:57:07', '2021-12-22 07:39:37', NULL),
(272, NULL, 'Heat Exchanger', 'Dispatch', '4', '2021-08-03 17:57:07', '2021-12-22 07:39:37', NULL),
(273, NULL, 'WFE', 'SO Release', '4', '2021-08-04 10:06:30', '2021-12-22 07:39:37', NULL),
(274, NULL, 'WFE', 'QAP Submission & Approval', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(275, NULL, 'WFE', 'GA drawing Preparation & Submission', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(276, NULL, 'WFE', 'GA drawing approval', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(277, NULL, 'WFE', 'Fabrication drawing preparation & released for Manufacturing', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(278, NULL, 'WFE', 'Material Procurement', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(279, NULL, 'WFE', 'Shell and Dish end material receipt', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(280, NULL, 'WFE', 'Tube & Tubesheet material receipt', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(281, NULL, 'WFE', 'Nozzle flanges material receipt', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(282, NULL, 'WFE', 'Nozzle pipes material receipt', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(283, NULL, 'WFE', 'Hardware and Gaskets material receipt', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(284, NULL, 'WFE', 'Packing material (wooden saddles/Boxes) receipt', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(285, NULL, 'WFE', 'Shell, Bonnet, Jacket & Dish end Material cutting', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(286, NULL, 'WFE', 'Shell, Bonnet & Jacket Rolling', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(287, NULL, 'WFE', 'Shell and Jacket C Seam and L seam welding', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(288, NULL, 'WFE', 'Shell and Jacket Re-rolling', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(289, NULL, 'WFE', 'Nozzle fabrication on ground', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(290, NULL, 'WFE', 'Nozzle Marking & Opening on shell and Jacket', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(291, NULL, 'WFE', 'Nozzle welding to shell & Jacket', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(292, NULL, 'WFE', 'Spiral mounting on shell', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(293, NULL, 'WFE', 'Body Flange Machining', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(294, NULL, 'WFE', 'Body Flange Welding', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(295, NULL, 'WFE', 'Complete Shell Machining from both side', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(296, NULL, 'WFE', 'Internal Drum Fabrication', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(297, NULL, 'WFE', 'Scrapper Assembly', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(298, NULL, 'WFE', 'Internal Drum Machining', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(299, NULL, 'WFE', 'Bottom Cone bonnet Fabrication', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(300, NULL, 'WFE', 'Jacket mounting on shell', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(301, NULL, 'WFE', 'Jacket side Pneumatic / Hydro Test', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(302, NULL, 'WFE', 'Tube Bundle making', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(303, NULL, 'WFE', 'Tube to Tubesheet welding', '4', '2021-08-04 10:11:02', '2021-12-22 07:39:37', NULL),
(304, NULL, 'WFE', 'Tube bundle & Shell assembly', '4', '2021-08-04 10:11:51', '2021-12-22 07:39:37', NULL),
(305, NULL, 'WFE', 'Rotor running trial inside the shell', '4', '2021-08-04 10:11:51', '2021-12-22 07:39:37', NULL),
(306, NULL, 'WFE', 'Complete assembly of the equipment', '4', '2021-08-04 10:11:51', '2021-12-22 07:39:37', NULL),
(307, NULL, 'WFE', 'Complete assembly running trial - Without load and with Load', '4', '2021-08-04 10:11:51', '2021-12-22 07:39:37', NULL),
(308, NULL, 'WFE', 'Shell side Pneumatic/Hydro Test', '4', '2021-08-04 10:11:51', '2021-12-22 07:39:37', NULL),
(309, NULL, 'WFE', 'Surface Preparation', '4', '2021-08-04 10:11:51', '2021-12-22 07:39:37', NULL),
(310, NULL, 'WFE', 'Painting', '4', '2021-08-04 10:11:51', '2021-12-22 07:39:37', NULL),
(311, NULL, 'WFE', 'Dispatch', '4', '2021-08-04 10:11:51', '2021-12-22 07:39:37', NULL),
(312, NULL, 'ATFD', 'SO Release', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(313, NULL, 'ATFD', 'QAP Submission & Approval', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(314, NULL, 'ATFD', 'GA drawing Preparation & Submission', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(315, NULL, 'ATFD', 'GA drawing approval', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(316, NULL, 'ATFD', 'Fabrication drawing preparation & released for Manufacturing', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(317, NULL, 'ATFD', 'Material Procurement', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(318, NULL, 'ATFD', 'Shell and Dish end material receipt', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(319, NULL, 'ATFD', 'Nozzle flanges material receipt', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(320, NULL, 'ATFD', 'Nozzle pipes material receipt', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(321, NULL, 'ATFD', 'Hardware and Gaskets material receipt', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(322, NULL, 'ATFD', 'Packing material (wooden saddles/Boxes) receipt', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(323, NULL, 'ATFD', 'Shell, Bonnet, Jacket & Dish end Material cutting', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(324, NULL, 'ATFD', 'Shell, Bonnet & Jacket Rolling', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(325, NULL, 'ATFD', 'Shell and Jacket C Seam and L seam welding', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(326, NULL, 'ATFD', 'Shell and Jacket Re-rolling', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(327, NULL, 'ATFD', 'Nozzle fabrication on ground', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(328, NULL, 'ATFD', 'Nozzle Marking & Opening on shell and Jacket', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(329, NULL, 'ATFD', 'Nozzle welding to shell & Jacket', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(330, NULL, 'ATFD', 'Spiral mounting on shell', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(331, NULL, 'ATFD', 'Body Flange Machining', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(332, NULL, 'ATFD', 'Body Flange Welding', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(333, NULL, 'ATFD', 'Complete Shell Machining from both side', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(334, NULL, 'ATFD', 'Internal Drum Fabrication', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(335, NULL, 'ATFD', 'Scrappers assembly', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(336, NULL, 'ATFD', 'Internal Drum Machining', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(337, NULL, 'ATFD', 'Bottom Cone bonnet Fabrication', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(338, NULL, 'ATFD', 'Jacket mounting on shell', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(339, NULL, 'ATFD', 'Jacket side Pneumatic /Hydro Test', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(340, NULL, 'ATFD', 'Rotor running trial inside the shell', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(341, NULL, 'ATFD', 'Complete assembly of the equipment', '4', '2021-08-04 10:18:51', '2021-12-22 07:39:37', NULL),
(342, NULL, 'ATFD', 'Complete assembly running trial - Without load and with Load', '4', '2021-08-04 10:19:26', '2021-12-22 07:39:37', NULL),
(343, NULL, 'ATFD', 'Shell side Pneumatic/Hydro Test', '4', '2021-08-04 10:19:26', '2021-12-22 07:39:37', NULL),
(344, NULL, 'ATFD', 'Surface Preparation', '4', '2020-09-05 17:54:39', '2023-04-04 07:04:34', NULL),
(345, NULL, 'ATFD', 'Painting', '4', '2021-08-04 10:19:26', '2021-12-22 07:39:37', NULL),
(346, NULL, 'ATFD', 'Dispatch', '4', '2021-08-04 10:19:26', '2021-12-22 07:39:37', NULL),
(347, NULL, 'ATFE', 'SO Release', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(348, NULL, 'ATFE', 'QAP Submission & Approval', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(349, NULL, 'ATFE', 'GA drawing Preparation & Submission', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(350, NULL, 'ATFE', 'GA drawing approval', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(351, NULL, 'ATFE', 'Fabrication drawing preparation & released for Manufacturing', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(352, NULL, 'ATFE', 'Material Procurement', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(353, NULL, 'ATFE', 'Shell and Dish end material receipt', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(354, NULL, 'ATFE', 'Nozzle flanges material receipt', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(355, NULL, 'ATFE', 'Nozzle pipes material receipt', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(356, NULL, 'ATFE', 'Hardware and Gaskets material receipt', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(357, NULL, 'ATFE', 'Packing material (wooden saddles/Boxes) receipt', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(358, NULL, 'ATFE', 'Shell, Bonnet, Jacket & Dish end Material cutting', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(359, NULL, 'ATFE', 'Shell, Bonnet & Jacket Rolling', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(360, NULL, 'ATFE', 'Shell and Jacket C Seam and L seam welding', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(361, NULL, 'ATFE', 'Shell and Jacket Re-rolling', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(362, NULL, 'ATFE', 'Nozzle fabrication on ground', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(363, NULL, 'ATFE', 'Nozzle Marking & Opening on shell and Jacket', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(364, NULL, 'ATFE', 'Nozzle welding to shell & Jacket', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(365, NULL, 'ATFE', 'Spiral mounting on shell', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(366, NULL, 'ATFE', 'Body Flange Machining', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(367, NULL, 'ATFE', 'Body Flange Welding', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(368, NULL, 'ATFE', 'Complete Shell Machining from both side', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(369, NULL, 'ATFE', 'Internal Drum Fabrication', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(370, NULL, 'ATFE', 'Scrappers assembly', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(371, NULL, 'ATFE', 'Internal Drum Machining', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(372, NULL, 'ATFE', 'Bottom Cone bonnet Fabrication', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(373, NULL, 'ATFE', 'Jacket mounting on shell', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(374, NULL, 'ATFE', 'Jacket side Pneumatic /Hydro Test', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(375, NULL, 'ATFE', 'Rotor running trial inside the shell', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(376, NULL, 'ATFE', 'Complete assembly of the equipment', '4', '2021-08-04 10:38:06', '2021-12-22 07:39:37', NULL),
(377, NULL, 'ATFE', 'Complete assembly running trial - Without load and with Load', '4', '2021-08-04 10:38:36', '2021-12-22 07:39:37', NULL),
(378, NULL, 'ATFE', 'Shell side Pneumatic/Hydro Test', '4', '2021-08-04 10:38:36', '2021-12-22 07:39:37', NULL),
(379, NULL, 'ATFE', 'Surface Preparation', '4', '2021-08-04 10:38:36', '2021-12-22 07:39:37', NULL),
(380, NULL, 'ATFE', 'Painting', '4', '2021-08-04 10:38:36', '2021-12-22 07:39:37', NULL),
(381, NULL, 'ATFE', 'Dispatch', '4', '2021-08-04 10:38:36', '2021-12-22 07:39:37', NULL),
(382, NULL, 'Static Mixer', 'SO Release', '4', '2021-08-04 10:43:09', '2021-12-22 07:39:37', NULL),
(383, NULL, 'Static Mixer', 'QAP Submission & Approval', '4', '2021-08-04 10:43:10', '2021-12-22 07:39:37', NULL),
(384, NULL, 'Static Mixer', 'GA drawing Preparation & Submission', '4', '2021-08-04 10:43:10', '2021-12-22 07:39:37', NULL),
(385, NULL, 'Static Mixer', 'GA drawing approval', '4', '2021-08-04 10:43:10', '2021-12-22 07:39:37', NULL),
(386, NULL, 'Static Mixer', 'Material Procurement.', '4', '2021-08-04 10:43:10', '2021-12-22 07:39:37', NULL),
(387, NULL, 'Static Mixer', 'Material Receipt', '4', '2021-08-04 10:43:10', '2021-12-22 07:39:37', NULL),
(388, NULL, 'Static Mixer', 'Sheet Laser Cutting for Element', '4', '2021-08-04 10:43:10', '2021-12-22 07:39:37', NULL),
(389, NULL, 'Static Mixer', 'Pipe cutting and drilling', '4', '2021-08-04 10:43:10', '2021-12-22 07:39:37', NULL),
(390, NULL, 'Static Mixer', 'Element and Housing Fit-up', '4', '2021-08-04 10:43:10', '2021-12-22 07:39:37', NULL),
(391, NULL, 'Static Mixer', 'Hydro test', '4', '2021-08-04 10:43:10', '2021-12-22 07:39:37', NULL),
(392, NULL, 'Static Mixer', 'Cleaning', '4', '2021-08-04 10:43:10', '2021-12-22 07:39:37', NULL),
(393, NULL, 'Static Mixer', 'Dispatch', '4', '2021-08-04 10:43:10', '2021-12-22 07:39:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_stages`
--

CREATE TABLE `sub_stages` (
  `id` int(11) NOT NULL,
  `sub_stage` varchar(255) NOT NULL,
  `equipment_name` varchar(255) DEFAULT NULL,
  `stage` varchar(255) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_stages`
--

INSERT INTO `sub_stages` (`id`, `sub_stage`, `equipment_name`, `stage`, `days`, `created_at`, `updated_at`) VALUES
(1, 'Sub Stage', 'Agitator', 'SO Release', 2, '2023-03-14 13:24:36', '2023-03-14 13:24:36'),
(2, 'Sub Stage1', 'Agitator', 'SO Release', 2, '2023-03-14 13:24:36', '2023-03-14 13:24:36'),
(3, 'Sub Stage in drawing', 'Agitator', 'GA drawing Preperation', 2, '2023-03-20 08:00:28', '2023-03-20 08:00:28'),
(4, 'Sub Stage for fabrication', 'Agitator', 'Fabrication drawing preparation & released for Manufacturing', 2, '2023-03-20 08:30:27', '2023-03-20 08:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Manoj G', 'manoj@ycstech.in', NULL, '$2y$10$ecsZv49BXCZogsFjMcgbWOBWP6MdaqaUvPjiFeoaUt22PqbztAs.m', NULL, '2020-06-20 02:12:47', '2020-06-20 02:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `wpms`
--

CREATE TABLE `wpms` (
  `id` int(11) NOT NULL,
  `order_so` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `equipment` varchar(255) DEFAULT NULL,
  `baseline_target_date` varchar(255) DEFAULT NULL,
  `completion_date` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `action_user` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `task_name` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wpms`
--

INSERT INTO `wpms` (`id`, `order_so`, `description`, `equipment`, `baseline_target_date`, `completion_date`, `category`, `action_user`, `priority`, `task_name`, `status`, `created_at`, `updated_at`) VALUES
(7, '1', 'desc', '8', '2023-01-17', '2023-01-17', 'Action', '[\"1\",\"18\"]', '1', 'task', 'Completed', '2023-01-17 12:59:13', '2023-02-15 12:10:58'),
(8, '1', 'desc', '9', '2023-01-24', '2023-01-24', 'Action', '[\"20\",\"22\"]', '1', 'task', 'Pending', '2023-01-24 05:08:43', '2023-01-24 05:09:29'),
(10, '1', 'dsadsadas', '8', '2023-01-24', '2023-01-24', 'Action', '[\"19\"]', '2', 'task', 'Pending', '2023-01-24 06:48:14', '2023-01-24 06:48:14'),
(11, '1', 'desc', '8', '2023-01-24', '2023-01-24', 'Info', '[\"22\"]', '1', 'task name', 'Pending', '2023-02-22 09:35:42', '2023-02-22 09:35:42'),
(12, '1', 'description', '8', '2023-01-24', '2023-01-24', 'Action', '[\"1\",\"18\"]', '2', 'task name', 'Pending', '2023-02-22 09:34:45', '2023-02-22 10:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `wpm_comments`
--

CREATE TABLE `wpm_comments` (
  `id` int(11) NOT NULL,
  `wpm_id` int(11) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wpm_comments`
--

INSERT INTO `wpm_comments` (`id`, `wpm_id`, `comments`, `admin_id`, `created_at`, `updated_at`) VALUES
(2, 13, 'sdfsdffsfsffd', 1, '2023-02-16 05:31:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_attachment_fk` (`order_id`),
  ADD KEY `attachment_admin_id_fk` (`admin_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_name` (`name`,`code`);

--
-- Indexes for table `crud_events`
--
ALTER TABLE `crud_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `engineers`
--
ALTER TABLE `engineers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminenq_fk` (`admin_id`),
  ADD KEY `enquiry_name_index` (`customer_name`),
  ADD KEY `assignee_fk` (`assignee`);

--
-- Indexes for table `enquiry_notes`
--
ALTER TABLE `enquiry_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enq_id_fk` (`enquiry_id`),
  ADD KEY `admin_id_note_fk` (`admin_id`);

--
-- Indexes for table `enq_labels`
--
ALTER TABLE `enq_labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_type`
--
ALTER TABLE `equipment_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminetype_fk` (`admin_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kanban`
--
ALTER TABLE `kanban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kanban_admin_id-FK` (`admin_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminidorder_fk` (`admin_id`);

--
-- Indexes for table `order_equipments`
--
ALTER TABLE `order_equipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipments_order_index` (`order_id`,`equipment_name`,`equipment_type`);

--
-- Indexes for table `order_stages`
--
ALTER TABLE `order_stages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stageid_fkey` (`stage_id`),
  ADD KEY `orderid_fkey` (`order_id`),
  ADD KEY `equip_id_fk` (`equip_id`);

--
-- Indexes for table `order_sub_stages`
--
ALTER TABLE `order_sub_stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `payment_cashflow`
--
ALTER TABLE `payment_cashflow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cashflow_order_id_fk` (`order_id`),
  ADD KEY `admin_id_payment_updated` (`admin_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id`),
  ADD KEY `planning_admin_id_fk` (`admin_id`);

--
-- Indexes for table `planning_types`
--
ALTER TABLE `planning_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_type_aid_fk` (`admin_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_target`
--
ALTER TABLE `sale_target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `se_target`
--
ALTER TABLE `se_target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role_fk` (`role_id`),
  ADD KEY `amin_role_fk` (`admin_id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_stages`
--
ALTER TABLE `sub_stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wpms`
--
ALTER TABLE `wpms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wpm_comments`
--
ALTER TABLE `wpm_comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `crud_events`
--
ALTER TABLE `crud_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `engineers`
--
ALTER TABLE `engineers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=853;

--
-- AUTO_INCREMENT for table `enquiry_notes`
--
ALTER TABLE `enquiry_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `enq_labels`
--
ALTER TABLE `enq_labels`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `equipment_type`
--
ALTER TABLE `equipment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kanban`
--
ALTER TABLE `kanban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=404;

--
-- AUTO_INCREMENT for table `order_equipments`
--
ALTER TABLE `order_equipments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `order_stages`
--
ALTER TABLE `order_stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11164;

--
-- AUTO_INCREMENT for table `order_sub_stages`
--
ALTER TABLE `order_sub_stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_cashflow`
--
ALTER TABLE `payment_cashflow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `planning`
--
ALTER TABLE `planning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `planning_types`
--
ALTER TABLE `planning_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sale_target`
--
ALTER TABLE `sale_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `se_target`
--
ALTER TABLE `se_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;

--
-- AUTO_INCREMENT for table `sub_stages`
--
ALTER TABLE `sub_stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wpms`
--
ALTER TABLE `wpms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wpm_comments`
--
ALTER TABLE `wpm_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachment_admin_id_fk` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_attachment_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD CONSTRAINT `adminenq_fk` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `assignee_fk` FOREIGN KEY (`assignee`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `enquiry_notes`
--
ALTER TABLE `enquiry_notes`
  ADD CONSTRAINT `admin_id_note_fk` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enq_id_fk` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipment_type`
--
ALTER TABLE `equipment_type`
  ADD CONSTRAINT `adminetype_fk` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kanban`
--
ALTER TABLE `kanban`
  ADD CONSTRAINT `kanban_admin_id-FK` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `adminidorder_fk` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_equipments`
--
ALTER TABLE `order_equipments`
  ADD CONSTRAINT `orderEquipmentID_FK` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_stages`
--
ALTER TABLE `order_stages`
  ADD CONSTRAINT `equip_id_fk` FOREIGN KEY (`equip_id`) REFERENCES `order_equipments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderid_fkey` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stageid_fkey` FOREIGN KEY (`stage_id`) REFERENCES `stages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_cashflow`
--
ALTER TABLE `payment_cashflow`
  ADD CONSTRAINT `admin_id_payment_updated` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `cashflow_order_id_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `planning`
--
ALTER TABLE `planning`
  ADD CONSTRAINT `planning_admin_id_fk` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `planning_types`
--
ALTER TABLE `planning_types`
  ADD CONSTRAINT `plan_type_aid_fk` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `amin_role_fk` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `user_role_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
