-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 08:37 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citygroup`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `banner_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision_mission_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `core_value_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `banner_image`, `about_text`, `vision_text`, `mission_text`, `vision_mission_img`, `core_value_img`, `created_at`, `updated_at`) VALUES
(3, 'public/backEnd/img/about/16111329551531989618about-us-page-banner.jpg', '<p>City Group is one of Bangladesh&rsquo;s leading conglomerates and trusted consumer goods manufacturers. With 49 years of business legacy, the group has grown substantially over the period in value creation and production. At present there are 40 sister concerns, each specializing in different products and services.&nbsp;<br /><br />The group&rsquo;s strength lies in devotion to meet our promises of delivery, uncompromising attitude for quality, and cherished relationship with customers, employees and all social groups.</p>', '\"To become leading Bangladeshi conglomerate in global arena operating responsibly and sustainably for making a better society\"', '\"Blending world class technology, innovation and local entrepreneurship to provide hygiene, health and excellence to consumers \"', 'public/backEnd/img/about/16111329551531989618mission.jpg', 'public/backEnd/img/about/16111329551531989618core-value.png', '2021-01-20 08:55:55', '2021-01-20 08:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `achieves`
--

CREATE TABLE `achieves` (
  `id` int(10) UNSIGNED NOT NULL,
  `achieve_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `achieve_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `achieve_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achieves`
--

INSERT INTO `achieves` (`id`, `achieve_name`, `achieve_image`, `achieve_desc`, `created_at`, `updated_at`) VALUES
(1, 'Business Person of the year 2005', 'public/backEnd/img/achieve/1531995196Business-20Award_2005.jpg', 'Starting after the Liberation war, City Group has established itself as one of the leading Group of industries in the corporate arena of Bangladesh and has managed to gain recognition overseas as well. Efforts of the Group are recognized by consumers, suppliers and the community at large. As a recognition of overall business performance, Mr. Fazlur Rahman, Chairman of the Group was honored with the award of the \"Business Person of the year 2005\" by DHL-Daily Star. This has been a huge achievement for the company as well.', '2018-07-19 10:13:16', '2018-07-19 10:13:16'),
(2, 'Best Saskatchewan Pulse Importer 2009', 'public/backEnd/img/achieve/1531995214Best-Importer-of-of-Saskechewan-Pulses.jpg', 'For importing significant volume of Saskatchewan pulses, City Group was recognized by Saskatchewan Pulse Growers, Canada in 2009. Importing from global pulse markets ensures that growing pulses continues to be profitable for producers in Saskatchewan and Canada.', '2018-07-19 10:13:34', '2018-07-19 10:13:34'),
(3, 'Best Brand Awards', 'public/backEnd/img/achieve/1531995274Best-Brand-Award.jpg', 'City Group has received Best Brand Award numerous times in different categories arranged by Bangladesh Brand Forum. Its top three brands- TEER Advanced Soyabean Oil, TEER Atta Maida Suji and TEER Sugar received Best Brand Awards several times. These brands were also recognized as one of the “Top 10 local brands” and “Top 20 brands” in overall brand category. These awards are given on the basis of brand equity.', '2018-07-19 10:13:50', '2018-07-19 10:14:34'),
(4, 'Prestigious Brand of Asia 2017-18', 'public/backEnd/img/achieve/1531995246Prestigious-Brnads.jpg', 'TEER has been awarded the Prestigious Brands of Asia 2017-18 award in 2017 making it the only brand of Bangladesh to receive this recognition. After research and evaluation conducted by Herald Global, BARC and ERTC Media, TEER Advanced Soyabean Oil and TEER Atta Maida Suji were recognized as the “Prestigious Brands of Asia 2017-18”. The jury panel consists of eminent members from world’s top organizations.', '2018-07-19 10:14:06', '2018-07-19 10:14:06'),
(5, 'World Greatest Brands & Leaders 2017-18', 'public/backEnd/img/achieve/1540727074World_Greatest_Brand.jpg', 'Mr. Fazlur Rahman, Honorable Chairman of City Group, along with his brand TEER have been recognized as one of the world’s greatest leaders and brands by United Research Service and PricewaterhuseCoopers P.L. for his sharp business acumen in the trade and industrial enterprise in Bangladesh. This strategic visionary has steered the group to new height while revolutionizing Bangladesh’s food industry.', '2018-10-28 11:44:34', '2018-10-28 11:44:34'),
(6, 'Best Taxpayer of 2018-19', 'public/backEnd/img/achieve/1574166038citygroup3.jpg', 'Mr. Fazlur Rahman, Honorable Chairman of City Group, has been awarded as the \"Best Taxpayer\" of the fiscal year 2018-19. This has been possible because of his immense hard work and planning for the growth of industries in the country. This is a great achievement for the company as well.', '2019-11-19 10:41:07', '2019-11-19 12:20:38'),
(7, 'Best Sports Sponsor of the Year 2019', 'public/backEnd/img/achieve/1580119919Best Sports Sponsor of the Year 2019.jpg', 'TEER GO for Gold has successfully changed the paradigm of Archery sport in Bangladesh. This has been recognized by Bangladesh Sports Journalism Association, and City Group has been awarded “SPONSOR OF THE YEAR 2019” in Kool BSPA Sports Award. City Group got this award for being 360° Development Partner of Archery under TEER Go for Gold project.', '2020-01-27 10:11:59', '2020-01-27 10:11:59'),
(8, 'Asia’s Greatest Brands & Leaders 2020-21', 'public/backEnd/img/achieve/1630839351rsz_wgb_image.jpg', 'AsiaOne Magazine & URS Media Consulting PL has awarded Mr. Fazlur Rahman, Honorable Chairman of City Group as Asia’s greatest leader and his brand TEER as Asia’s greatest brand. He has been awarded for his sharp business acumen in the trade and industrial enterprise in Bangladesh. His strategic visionary has steered the group to new height while revolutionizing Bangladesh’s food industry.', '2021-09-05 10:55:51', '2021-09-05 10:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_logo`, `brand_logo2`, `brand_desc`, `created_at`, `updated_at`) VALUES
(1, 'sun', 'public/backEnd/img/band/1532596750Sun-Logo-English.png', 'public/backEnd/img/band/1532596750sun.png', 'One of the most promising brands catering wide range of products with exciting price-quality proposition for aspiring needs of mass people.', '2018-07-19 12:09:01', '2018-07-26 09:19:10'),
(2, 'Natural', 'public/backEnd/img/band/1532596727Natural-Logo-English.png', 'public/backEnd/img/band/1532596727natural.png', 'Natural presents its finest quality of palm olein; free from cholesterol, rich in vitamin E, antioxidants that makes is safe and nourishing among edible oils.', '2018-07-19 12:09:44', '2018-07-26 09:18:47'),
(3, 'Jibon', 'public/backEnd/img/band/1532596707jibon-logo-english.png', 'public/backEnd/img/band/1532596707jibon.png', 'Admired as symbol of life, every drop of JIBON pure drinking water is purified though Reverse Osmosis and bottled with highest level of care that ensures safest drinking water for healthy hydration.', '2018-07-19 12:10:04', '2018-07-26 09:18:27'),
(4, 'Bengal', 'public/backEnd/img/band/1532596686Bengal-Logo.png', 'public/backEnd/img/band/1532596686bengal.png', 'Exhibiting glorious Bangladeshi heritage, BENGAL Tea is all the way natural from plucking to packaging that ensures a pleasant and authentic tea experience.', '2018-07-19 12:10:28', '2018-07-26 09:18:06'),
(5, 'Teer', 'public/backEnd/img/band/1532596671TEER-LogoEnglish.png', 'public/backEnd/img/band/1532596671teer.png', 'TEER is the most acclaimed brand of City Group with footprint in edible oil, atta, flour, semolina, rice, lentil, sugar and animal feed products. The brand is synonymous to health, hygiene and excellence.', '2018-07-19 12:10:45', '2018-07-26 09:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `brand_categories`
--

CREATE TABLE `brand_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `precedence` int(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_categories`
--

INSERT INTO `brand_categories` (`id`, `brand_id`, `category_name`, `created_at`, `updated_at`, `precedence`) VALUES
(1, 5, 'Edible Oil', '2018-07-19 12:11:48', '2018-07-19 12:11:48', 1),
(2, 5, 'Flour', '2018-07-19 12:12:01', '2018-07-19 12:12:01', 2),
(3, 5, 'Sugar', '2018-07-19 12:12:14', '2018-07-19 12:12:14', 3),
(4, 5, 'Rice', '2018-07-19 12:12:24', '2018-07-19 12:12:24', 4),
(5, 5, 'Lentil', '2018-07-19 12:12:35', '2018-07-19 12:12:35', 5),
(6, 5, 'Others', '2018-07-19 12:12:59', '2021-07-08 08:10:48', 1000),
(7, 4, 'Black Tea', '2018-07-19 12:46:16', '2019-01-30 05:59:13', 1),
(8, 3, 'Pure Drinking Water', '2018-07-19 12:59:49', '2018-07-19 12:59:49', 1),
(9, 2, 'Palm Olein', '2018-07-19 13:00:03', '2018-07-19 13:00:03', 1),
(10, 1, 'Edible Oil', '2018-07-19 13:00:22', '2018-07-19 13:00:22', 1),
(11, 1, 'flour', '2021-06-07 09:44:04', '2021-06-07 09:44:04', 2),
(12, 1, 'lentil', '2021-06-07 09:45:18', '2021-06-07 09:46:07', 3),
(13, 1, 'rice', '2021-06-07 09:45:28', '2021-06-07 09:45:28', 4),
(14, 1, 'sugar', '2021-06-07 09:45:40', '2021-06-07 09:45:40', 5),
(15, 1, 'tea', '2021-06-07 09:46:19', '2021-06-07 09:46:19', 6),
(16, 5, 'Ready Mix', '2021-06-26 06:26:00', '2021-07-07 12:34:52', 6);

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(10) UNSIGNED NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacancy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_nature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `educational_req` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_certificate` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_req` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_req` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_range` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_benefit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_on` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `instruction` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BD_job_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chairmen`
--

CREATE TABLE `chairmen` (
  `id` int(10) UNSIGNED NOT NULL,
  `chairman_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chairman_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chairman_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chairman_designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chairmen`
--

INSERT INTO `chairmen` (`id`, `chairman_name`, `chairman_message`, `chairman_image`, `chairman_designation`, `created_at`, `updated_at`) VALUES
(1, 'MR. FAZLUR RAHMAN', '<p>It gives me great honor and pleasure to introduce City Group to you. For over 49 years our company has made valiant efforts to provide quality products to the general consumers and premium market. From the initial days till now, we strive always to achieve customer satisfaction by providing quality consumables at rational price.<br /><br />Welcome and wish you a pleasant browsing experience.</p>', 'public/backEnd/img/chairman/16111331771549953242chairman.jpg', 'CHAIRMAN AND MANAGING DIRECTOR', '2018-07-19 10:08:13', '2021-01-20 08:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `commercials`
--

CREATE TABLE `commercials` (
  `id` int(10) UNSIGNED NOT NULL,
  `commercial_iframe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commercial_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commercials`
--

INSERT INTO `commercials` (`id`, `commercial_iframe`, `commercial_text`, `created_at`, `updated_at`) VALUES
(3, 'https://www.youtube.com/embed/goXzOITBxg4?rel=0', 'TEER Sugar- Jelabi', '2018-07-19 10:26:05', '2018-07-19 10:26:05'),
(4, 'https://www.youtube.com/embed/91J3rHlpRXg?rel=0', 'TEER Sugar- Semai', '2018-07-19 10:26:25', '2018-07-19 10:26:25'),
(5, 'https://www.youtube.com/embed/oA2iLMgfWNo?rel=0', 'TEER Sugar Falooda', '2018-07-23 08:49:09', '2018-07-23 08:49:09'),
(6, 'https://www.youtube.com/embed/9WfBbKm9WVk?rel=0', 'TEER Sugar Sarbat', '2018-07-23 08:49:34', '2018-07-23 08:49:34'),
(7, 'https://www.youtube.com/embed/w6I4MruaFmQ?rel=0', 'TEER Atta Maida Suji TVC', '2018-07-23 08:49:53', '2018-07-23 08:49:53'),
(8, 'https://www.youtube.com/embed/XQuGtpw85N8?rel=0', 'TEER Advanced Kitchen for Wife', '2018-07-23 08:50:10', '2018-07-23 08:50:10'),
(9, 'https://www.youtube.com/embed/q_FuJQI17uA?rel=0', 'TEER Mustard Oil TVC', '2018-07-23 08:50:27', '2018-07-23 08:50:27'),
(10, 'https://www.youtube.com/embed/csvXVqksrRQ', 'TEER Advanced Soyabean Oil TVC', '2018-07-23 08:50:44', '2021-01-07 11:13:07'),
(11, 'https://www.youtube.com/embed/3EG50XLZEj0?rel=0', 'TEER Chinigura Rice TVC', '2018-07-23 08:51:02', '2018-07-23 08:51:02'),
(12, 'https://www.youtube.com/embed/lPCW_TVdseU?rel=0', 'TEER Whole Wheat Atta TVC', '2018-07-23 08:51:17', '2018-07-23 08:51:17'),
(13, 'https://www.youtube.com/embed/KYIwKeiyxuY?rel=0', 'Mother’s Day OVC: Maa Sharadin Ki Kore!', '2018-07-23 08:51:33', '2018-07-23 08:51:33'),
(14, 'https://www.youtube.com/embed/tcZXScgHftc?rel=0', 'Mother’s Day OVC: Love You Maa', '2018-07-23 08:51:52', '2018-07-23 08:51:52'),
(15, 'https://www.youtube.com/embed/9OkwQd47W_A', 'BENGAL Tea Launch  TVC', '2018-10-30 09:49:50', '2018-11-01 12:46:18'),
(17, 'https://www.youtube.com/embed/lhiUVs4292k', 'TEER Prothom Alo Krishi Award', '2018-11-10 05:47:40', '2018-11-10 05:47:40'),
(18, 'https://www.youtube.com/embed/ufWDdv0f6QY', 'TEER Little Chef Coming up on Duronto TV', '2018-11-10 09:55:12', '2018-11-10 09:55:12'),
(19, 'https://www.youtube.com/embed/3fIyfmIqWTs?rel=0', 'TEER Little Chef Promo', '2019-02-24 12:50:22', '2019-02-24 12:50:22'),
(20, 'https://www.youtube.com/embed/p8AmWOT7L3k?rel=0', 'TEER Little Chef Teaser', '2019-02-24 12:51:42', '2019-02-24 12:52:29'),
(21, 'https://www.youtube.com/embed/2l2hrtK3LjE?rel=0', 'TEER Sugar TVC-Drishtibhongi (Marriage)', '2019-02-24 12:54:59', '2019-02-24 12:54:59'),
(22, 'https://www.youtube.com/embed/LXEoxheb8P8?rel=0', 'TEER Sugar TVC-Drishtibhongi (Result)', '2019-02-24 12:56:20', '2019-02-24 12:56:20'),
(23, 'https://www.youtube.com/embed/qEUUJTdNAjg?rel=0', 'TEER Prothom Alo Krishi Award', '2019-04-08 09:58:18', '2019-04-08 09:58:18'),
(24, 'https://www.youtube.com/embed/QGiydd4lK-c?rel=0', 'City Economic Zone Inauguration Ceremony', '2019-04-10 11:23:38', '2019-04-10 11:23:38'),
(25, 'https://www.youtube.com/embed/xA7sN-_B80c?rel=0', 'City Economic Zone AV', '2019-04-10 11:25:16', '2019-04-10 11:25:16'),
(26, 'https://www.youtube.com/embed/HtJ_A3dKrNs?rel=0', 'TEER Mother\'s Day OVC- Maa\'er Chawa', '2019-05-12 10:50:41', '2019-05-12 10:50:41'),
(28, 'https://www.youtube.com/embed/P5PSXhpGm_c', 'TEER Go For Gold OVC', '2019-11-12 12:35:39', '2019-11-12 12:35:39'),
(29, 'https://www.youtube.com/embed/A-ccWPmhqz0', 'Teer Little Chef Season 2', '2020-03-11 08:13:46', '2020-03-11 08:17:27'),
(30, 'https://www.youtube.com/embed/0zIVrYs79eM', 'TEER Mother\'s Day OVC 2020', '2020-05-13 07:09:11', '2020-05-13 07:09:11'),
(31, 'https://www.youtube.com/embed/3ay3ZGsbe9k', 'BENGAL Classic Tea Bag TVC', '2020-11-22 09:52:53', '2020-11-22 09:53:50'),
(32, 'https://www.youtube.com/embed/6uxSYh4xTV4', 'Bijoy Achey Sobar Majhey | Teer', '2021-01-07 06:08:04', '2021-01-07 06:08:04'),
(33, 'https://www.youtube.com/embed/wwJgfHR1pWM', 'TEER Advanced Soyabean Oil', '2021-01-07 11:15:09', '2021-01-07 11:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `c_v_careers`
--

CREATE TABLE `c_v_careers` (
  `id` int(10) UNSIGNED NOT NULL,
  `career_designation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `id` int(10) UNSIGNED NOT NULL,
  `director_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id`, `director_name`, `director_image`, `director_designation`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Fazlur Rahman', NULL, 'Chairman and Managing Director', '2018-07-23 07:57:45', '2018-07-23 07:57:45'),
(2, 'Mr. Md. Hasan', NULL, 'Director', '2018-07-23 07:56:42', '2018-07-23 07:56:42'),
(3, 'Ms. Shampa Rahman', NULL, 'Director', '2018-07-23 07:55:42', '2018-07-23 07:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `history_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `history_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `history_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `history_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `history_name`, `history_year`, `history_image`, `history_desc`, `created_at`, `updated_at`) VALUES
(1, 'The Journey Began by Establishing City Oil Mills', '1972', 'public/backEnd/img/history/1624872269city.jpg', 'The day 6 February 1972 marks the beginning of a journey in Gandaria, Dhaka - one which marked the beginning of the company known as \"CITY OIL MILLS\" by the founder Chairman, Mr. Fazlur Rahman. The group literally started from scraps. The initial period was marked with a lot of hardships due to the post war era when the country faced an economic fallout. Initially the mission of the company was to produce mustard oil for the local market. The overwhelming demand for the product continued to increase and the company soon found its way into the business arena of Bangladesh.', '2018-07-19 08:43:41', '2021-06-28 09:24:29'),
(2, 'Launched Soyabean Oil', '1992', 'public/backEnd/img/history/15319898731991-soyabean_oil.jpg', 'City Group started refining soyabean oil in its new production unit. At that time, the soyabean oil was sold in bulk pack only. The plant refined imported CDSO to produce quality Soya Bean Oil to meet increasing demand of the local market.', '2018-07-19 08:44:33', '2018-07-19 08:44:33'),
(3, 'Launched TEER Atta, Maida, Suji', '1995', 'public/backEnd/img/history/15319900421997-atta_maida_suji.JPG', 'TEER is the first brand to introduce Atta, Maida (Flour), Suji (Semolina) in branded consumer pack among the available brands in Bangladesh. In 1997 City Group has set up automated production unit to support the increasing demand for best quality Atta, Flour (Maida) and Semolina (Suji).', '2018-07-19 08:47:22', '2018-07-19 08:47:22'),
(4, 'Established Printing and Packaging Unit', '1999', 'public/backEnd/img/history/15319901891999-printing_container.jpg', 'As part of the backward integration, City Group established Hasan Printing and Packaging Ltd. and Hasan Containers Ltd. All kinds of carton, label and other paper-based packaging and promotion materials, plain & printed tin containers are made in these two plants.', '2018-07-19 08:49:49', '2018-07-19 08:49:49'),
(5, 'City Navigation Started Operation', '2000', 'public/backEnd/img/history/15322626212000-city_navigation.JPG', 'City Navigations Ltd. started its journey in 2000 to support carriage of raw material from mother vessel to production unit. Thirty-seven lighterage vessels, each having capacity of 3,000- 3,500 MT, are now in operation.', '2018-07-22 12:29:01', '2018-07-22 12:30:21'),
(6, 'Launched JIBON Pure Drinking Water', '2001', 'public/backEnd/img/history/15322627882001-jibon-water-launched.jpg', 'City PET industries started its operation in 2001 and at the same time a new pure drinking water brand named JIBON was introduced. This water plant extracts water from a depth of 600 ft. to ensure purity. Reverse Osmosis and German Ozone technology are used for further purification.', '2018-07-22 12:33:08', '2018-07-22 12:33:08'),
(7, 'Introduced Natural Super Refined Palm Olein', '2002', 'public/backEnd/img/history/15322629532002-natural_palm.jpg', 'Natural Super Refined Palm Olein was launched in the market to cater the growing demand of mass consumers. This category extension flourished the brand portfolio of City Group. The palm oil is imported from Malaysia and Indonesia and processed using European Alfa Laval and Westphalia machines.', '2018-07-22 12:35:53', '2018-07-22 12:35:53'),
(8, 'Production of TEER Feed', '2004', 'public/backEnd/img/history/15322637672004-feed-product.jpg', 'TEER Feed includes Poultry, Cattle and Fish feeds. To meet customer satisfaction, raw materials are selected carefully and processed using Buhler machines in controlled environment. The top quality feed products ensures health and growth of poultry, fish and cattle.', '2018-07-22 12:49:27', '2018-07-22 12:49:27'),
(9, 'Soymeal and Rapeseed Cake Production', '2005', 'public/backEnd/img/history/15322638222005-soymeal_rapeseed1.JPG', 'Soymeal and rapeseed cakes, produced in City Seed Crushing Ltd were added in City Group’s product portfolio. A portion of the output is being used for making TEER Feed products and rest of the output is sold to external customers.', '2018-07-22 12:50:22', '2018-07-22 12:50:22'),
(10, 'Sugar Refinery', '2006', 'public/backEnd/img/history/15322638712006-city_sugar.JPG', 'City Sugar Industries Ltd., the largest sugar refinery unit of the country, was set up in 2006 which uses European SUTECH technology. The imported raw sugar is refined and packed in utmost care for the consumers. Different types and grades of sugar are also available for institutional customers. This sugar refinery is HACCP and ISO 22000 certified.', '2018-07-22 12:51:11', '2018-07-22 12:51:11'),
(11, 'PP Woven Bag Production', '2007', 'public/backEnd/img/history/15322639062007-pp_woven_bag.JPG', 'To meet large internal demand for PP woven bag, City Group started a production unit of PP woven bags and Plastic linings. High capacity machineries are used for flawless production to ensure minimum wastage and best quality.', '2018-07-22 12:51:46', '2018-07-22 12:51:46'),
(12, 'Launch of TEER Whole Wheat Atta', '2016', 'public/backEnd/img/history/15322639532016-LaunchedTEER_Whole_Wheat_Atta.jpg', 'The landscape of Atta in Bangladesh was upgraded in 2016 with the introduction of TEER Whole Wheat Atta which was a remarkable innovation in consumer goods industry. Bringing Whole Wheat Atta technology to Bangladesh is a testament of City Group’s quest for health, hygiene and excellence.', '2018-07-22 12:52:33', '2018-07-22 12:52:33'),
(13, 'Re-launch of TEER Logo and TEER Advanced Soyabean Oil', '2017', 'public/backEnd/img/history/160603835215322640112017-re-launched-teer.jpg', 'To emphasize the changing life style of consumers, City Group revamped the logo of its flagship brand TEER in 2017 with a commitment to satisfy the needs of modern consumers with the value and assurance remaining intact. TEER Advanced Soyabean Oil is fortified with Vitamin A, rich in Vitamin E&K, Omega 3, 6, 9.', '2018-07-22 12:53:31', '2020-11-22 09:45:52'),
(14, 'City Economic Zone', '2018', 'public/backEnd/img/history/15322640672018-city-economic-zone.jpg', 'City Group received a license from Bangladesh Economic Zone Authority (BEZA) to set up ‘City Economic Zone’ on 78 acres of land in Rupshi, Narayanganj. The zone expects to employ 3,000 people within the first year of commercial production increasing it to over 20,000 in the next five years.', '2018-07-22 12:54:27', '2018-07-22 12:54:27'),
(15, 'Fully Automated Rice and Dal Mill', '2018', 'public/backEnd/img/history/15322641232018-rice_dal_mills.jpg', 'City Auto Rice and Dal Mills Ltd. is the country’s largest and first ever fully automated rice and dal mill. This automated plant is fully operated using the top-notch technology from Buhler to process different categories of rice and lentil. It houses one and only hi-tech laboratory of Bangladesh to ensure top quality grains for consumers.', '2018-07-22 12:55:23', '2018-07-22 12:55:23'),
(16, 'Rupshi Flour Mills Ltd', '2021', 'public/backEnd/img/history/1618122433Rupshi Flour Mills-2.png', 'Rupshi Flour Mills Ltd. is South Asia’s largest flour mill. With world renowned Swiss machineries, this state-of–the art technology, this fully automated mill is an invaluable addition in City Group’s arsenal in catering to the ever-increasing quality food products made from wheat.', '2021-04-11 06:27:13', '2021-04-11 06:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `manage_teams`
--

CREATE TABLE `manage_teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `manageTeam_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manageTeam_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manageTeam_designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_teams`
--

INSERT INTO `manage_teams` (`id`, `manageTeam_name`, `manageTeam_image`, `manageTeam_designation`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Fazlur Rahman', NULL, 'Chairman and Managing Director', '2018-07-23 08:00:37', '2018-07-23 08:00:37'),
(2, 'Mr. Md. Hasan', NULL, 'Director', '2018-07-23 08:00:25', '2018-07-23 08:00:25'),
(3, 'Ms. Shampa Rahman', NULL, 'Director', '2018-07-23 08:00:15', '2018-07-23 08:00:15'),
(4, 'Mr. Md. Imran Uddin', NULL, 'Director: Planning and Business Development', '2018-07-23 08:00:04', '2018-07-23 08:00:04'),
(5, 'Mr. Zafor Uddin Siddiqui', NULL, 'Executive Director: Marketing and Sales', '2018-07-23 07:59:51', '2018-07-23 07:59:51'),
(6, 'Mr. M. Shabbir Ali', NULL, 'Director: Group HR', '2018-07-23 07:59:40', '2018-07-23 07:59:40'),
(7, 'Mr. Tanvir Hydar Pavel', NULL, 'Director: Finance & Commercial', '2018-07-23 07:59:27', '2018-07-23 07:59:27'),
(8, 'Mr. Biswajit Saha', NULL, 'Director: Corporate and Regulatory Affairs', '2019-01-30 05:51:50', '2020-01-06 05:31:36'),
(9, 'Mr. Khizir Hayat Khan', NULL, 'Director: Import', '2020-01-06 05:32:07', '2020-01-06 05:48:25');

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
(4, '2018_07_05_040855_create_about_uses_table', 1),
(17, '2018_07_09_065713_create_c_s_rs_table', 10),
(18, '2018_07_09_070604_create_social_relations_table', 11),
(19, '2018_07_09_070832_create_c_s_rs_table', 12),
(97, '2014_10_12_000000_create_users_table', 13),
(98, '2014_10_12_100000_create_password_resets_table', 13),
(99, '2018_07_03_114143_create_sliders_table', 13),
(100, '2018_07_05_042105_create_abouts_table', 13),
(101, '2018_07_05_070941_create_commercials_table', 13),
(102, '2018_07_05_080414_create_press_releases_table', 13),
(103, '2018_07_05_084842_create_brands_table', 13),
(104, '2018_07_05_111437_create_brand_categories_table', 13),
(105, '2018_07_05_113130_create_products_table', 13),
(106, '2018_07_07_095840_create_product_youtube_links_table', 13),
(107, '2018_07_09_051727_create_news_events_table', 13),
(108, '2018_07_09_051959_create_news_event_images_table', 13),
(109, '2018_07_09_071018_create_social_responses_table', 13),
(110, '2018_07_09_080245_create_achieves_table', 13),
(111, '2018_07_09_091517_create_sister_cons_table', 13),
(112, '2018_07_09_103456_create_histories_table', 13),
(113, '2018_07_10_042228_create_chairmen_table', 13),
(114, '2018_07_10_052848_create_directors_table', 13),
(115, '2018_07_10_062223_create_manage_teams_table', 13),
(116, '2018_07_16_060952_create_careers_table', 13),
(117, '2018_07_16_122211_create_c_v_careers_table', 13),
(118, '2021_08_11_102048_create_sustain_abilities_table', 14),
(119, '2021_08_11_102633_create_sustain_ability_pdfs_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `news_events`
--

CREATE TABLE `news_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `news_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_events`
--

INSERT INTO `news_events` (`id`, `news_name`, `news_desc`, `created_at`, `updated_at`) VALUES
(1, 'TEER Advanced Kitchen', 'The first ever kitchen renovation-based TV reality show in Bangladesh. TEER Advanced kitchen aims at recognizing effort of the home maker, usually overlooked in our society. First season will cover transformations of 10 ordinary kitchen into Advanced Kitchen. Channel-I will telecast the reality show.', '2018-07-19 10:22:15', '2018-07-19 10:22:15'),
(2, 'City Economic Zone', 'City Group received a license from Bangladesh Economic Zone Authority (BEZA) to set up ‘City Economic Zone’ on 78 acres of land in Rupshi, Narayanganj. The zone expects to employ 3,000 people within the first year of commercial production and increasing it to over 20,000 in the next five years.', '2018-07-19 10:22:38', '2018-07-19 10:22:38'),
(3, 'TEER Go for Gold', 'Eyeing for a gold medal in `Tokyo Olympic 2020’, City Group, in partnership with Bangladesh Archery Federation (BAF) are preparing the archers to fulfill untouched dreams. This five-year performance-based sponsorship program encompasses wide range of activities from talent hunt, development of archery training center to recruitment of foreign coach.', '2018-07-19 10:23:52', '2018-07-19 10:23:52'),
(4, 'TEER- the Most Chosen Consumer Brand', 'World renowned marketing research organization Kantar Worldpanel’s recent report “Kantar Worldpanel Brand Footprint 2018” has recognized TEER as the most chosen food product brand in Bangladesh. TEER gains the first position in ranking with Consumer Reach Point (CRP) of 57.', '2018-07-23 11:00:10', '2018-07-23 11:00:10'),
(5, 'TEER Prothom Alo Krishi Award', 'TEER and Prothom Alo awarded farmers, agricultural researchers, innovators and scientists for their vital contributions and effort to promote the best practices and assisting agricultural sector with knowledge and information for future development. Dr. Kazi M. Badruddoza has been awarded with Lifetime Achievement Award in the same event.', '2018-08-11 05:54:40', '2019-04-08 09:46:26'),
(6, 'Kids Cooking Competition- TEER Little Chef', 'For the first time, TEER is organizing kids cooking competition based reality show “TEER Little Chef”. Anyone within age limit 12-16 can participate in this competition. The participants can register through SMS or message to facebook page- <a style=\"color:#0083cb;\" href=\"https://www.facebook.com/TEER1972\">facebook/TEER1972</a>. For detail please call to: <a style=\"color:#0083cb;\" href=\"tel:01309-002887\">01309-002887</a>.', '2018-11-04 10:25:01', '2018-11-04 10:25:01'),
(8, 'BENGAL Classic Tea & iflix: Ushnotar Notun Golpo', 'BENGAL Classic Tea in partnership with iflix presents Ushnotar Notun Golpo, A short film series that will revolve around stories of love, and bonding. The series kicked off on February 7. On the commencement event, Zafor Uddin Siddiqui, Executive Director (Sales & Marketing), City Group attended as the Chief Guest.', '2019-02-10 10:46:15', '2019-02-10 12:19:47'),
(9, 'City Economic Zone Inauguration', 'Prime Minister Sheikh Hasina inaugurated and laid foundation stones of City Economic Zone through a video conferencing from her official residence Gono Bhaban. The zone expects to employ 3,000 people within the first year of commercial production and increasing it to over 20,000 in the next five years.', '2019-04-10 11:31:03', '2019-04-10 11:31:03'),
(10, 'Jui- First TEER Little Chef', 'After immense competition among 12-16 years children at “TEER Little Chef’s” kitchen, Jui from Bogura won the first ever title of TEER Little Chef and received certificate, crest and prize money of BDT 5,00,000 by defeating Abdullah from Chattogram in the Grand Finale.', '2019-04-17 09:21:47', '2019-04-17 09:21:47'),
(11, 'Ruman Overwhelmed with reception', 'Archer Ruman Sana accorded warm reception by City Group for winning a bronze in the World Archery Championships in Netherlands along with the honour of directly qualifying for 2020 Tokyo Olympics. The first target of project TEER Go for Gold is achieved; now City Group and BAF aiming for Olympic Medal.', '2019-06-22 12:48:59', '2019-06-22 12:48:59'),
(13, 'Hosendi Economic Zone gets pre-qualification certificate', 'Hosendi Economic Zone received Bangladesh Economic Zones Authority’s (BEZA) pre-qualification certificate.\r\nBEZA Executive Chairman Paban Chowdhury handed over the certificate to Hosendi Economic Zone Chairman and Managing Director Shampa Rahman at a function at BEZA office in Dhaka. Tk10,000 crore has been invested initially.', '2020-01-07 04:57:57', '2020-01-07 04:57:57'),
(14, 'TEER Little Chef: Season 2', 'TEER Little Chef is back with new and exciting second season.\r\nWho will be the next TEER Little Chef and win BDT 5 lac prize money?\r\nTo see, please keep your eyes on NTV every Saturday at 9:25 pm.', '2020-05-04 03:10:14', '2020-05-04 03:10:14'),
(16, 'City Group: Thank You Day', 'City Group designates 16th May of every year as Thank You Day- an occasion to mark the birthday of the visionary business icon and chairman of the group Mr. Fazlur Rahman. The Group plans to observe this day with gratitude to every stakeholders by engaging in various employee and CSR activities.', '2020-05-18 07:41:20', '2020-05-18 07:41:20'),
(17, 'RAFIA-The New TEER Little Chef', 'After the hardened competition among 12-16 years children at “TEER Little Chef’s” kitchen, Rafia from Chattogram won the title of TEER Little Chef in the season Two and received certificate, crest and prize money of BDT 5,00,000. Tripa from Bogura became 1st runner-up and Humaira from Dhaka became the 2nd runner-up.', '2020-06-25 08:51:37', '2020-06-25 08:51:37'),
(18, 'TEER Advanced Soyabean Oil in new bottle', 'TEER Advanced Soyabean Oil is now available in new advanced bottle. The bottle is now more handy and easy to use. The oil is fortified with Vitamin A and rich in Vitamin E and K. It has the triple power of Omega 3.6.9. The state of the art Nutrients Retained Technology (NRT) keeps the goodness of the micronutrients intact.', '2020-10-19 08:04:11', '2020-10-19 08:04:11'),
(22, 'City Group Unveils South Asia’s Largest Flour Mill', 'Rupshi Flour Mills Ltd., the largest in South Asia and the 2nd largest stand-alone flour mill in the world, was inaugurated in 12 March 2021 under City Economic Zone. The inauguration was led by jute and textile minister Mr. Golam Dastagir Gazi, Chairman of BEZA Mr. Paban Chowdhury and Chairman and Managing Director of City Group Mr. Fazlur Rahman.', '2021-04-11 05:15:35', '2021-04-11 05:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `news_event_images`
--

CREATE TABLE `news_event_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `news_event_id` int(11) NOT NULL,
  `news_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_event_images`
--

INSERT INTO `news_event_images` (`id`, `news_event_id`, `news_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'public/backEnd/img/news_event/1531995735TEER-advanced-kitchen.jpg', '2018-07-19 10:22:15', '2018-07-19 10:22:15'),
(2, 1, 'public/backEnd/img/news_event/1531995736TEER-advanced-kitchen1.jpg', '2018-07-19 10:22:16', '2018-07-19 10:22:16'),
(3, 1, 'public/backEnd/img/news_event/1531995736TEER-advanced-kitchen2.jpg', '2018-07-19 10:22:16', '2018-07-19 10:22:16'),
(4, 1, 'public/backEnd/img/news_event/1531995736TEER-advanced-kitchen3.jpg', '2018-07-19 10:22:16', '2018-07-19 10:22:16'),
(5, 2, 'public/backEnd/img/news_event/1531995758city-economic-zone.jpg', '2018-07-19 10:22:38', '2018-07-19 10:22:38'),
(6, 2, 'public/backEnd/img/news_event/1531995758city-economic-zone1.jpg', '2018-07-19 10:22:38', '2018-07-19 10:22:38'),
(7, 2, 'public/backEnd/img/news_event/1531995758city-economic-zone2.jpg', '2018-07-19 10:22:38', '2018-07-19 10:22:38'),
(8, 2, 'public/backEnd/img/news_event/1531995758city-economic-zone3.jpg', '2018-07-19 10:22:38', '2018-07-19 10:22:38'),
(9, 3, 'public/backEnd/img/news_event/1531995832go-for-gold.jpg', '2018-07-19 10:23:52', '2018-07-19 10:23:52'),
(10, 3, 'public/backEnd/img/news_event/1531995832go-for-gold-1.jpg', '2018-07-19 10:23:52', '2018-07-19 10:23:52'),
(11, 3, 'public/backEnd/img/news_event/1531995832go-for-gold-2.jpg', '2018-07-19 10:23:52', '2018-07-19 10:23:52'),
(12, 3, 'public/backEnd/img/news_event/15783728411_final_HEZ.jpg', '2018-07-19 10:23:52', '2020-01-07 04:54:01'),
(13, 3, 'public/backEnd/img/news_event/1531995832go-for-gold-4.jpg', '2018-07-19 10:23:52', '2018-07-19 10:23:52'),
(14, 3, 'public/backEnd/img/news_event/1531995832go-for-gold-5.jpg', '2018-07-19 10:23:52', '2018-07-19 10:23:52'),
(15, 3, 'public/backEnd/img/news_event/1531995832go-for-gold-6.jpg', '2018-07-19 10:23:52', '2018-07-19 10:23:52'),
(16, 4, 'public/backEnd/img/news_event/1532343610most-chosen-brand.jpg', '2018-07-23 11:00:10', '2018-07-23 11:00:10'),
(17, 5, 'public/backEnd/img/news_event/1554717260TPKA.jpg', '2018-08-11 05:54:40', '2019-04-08 09:54:20'),
(18, 6, 'public/backEnd/img/news_event/1541327101TEER-Little-Chef-Image-Edited.jpg', '2018-11-04 10:25:01', '2018-11-04 10:25:01'),
(20, 8, 'public/backEnd/img/news_event/1549795575Picture_Bengal Classic Tea - iflix Short Film Series.png', '2019-02-10 10:46:15', '2019-02-10 10:46:15'),
(21, 9, 'public/backEnd/img/news_event/1554895863city-economic-zone.jpg', '2019-04-10 11:31:03', '2019-04-10 11:31:03'),
(22, 10, 'public/backEnd/img/news_event/1555492907TEER Little Chef Image2.jpg', '2019-04-17 09:21:47', '2019-04-17 09:21:47'),
(23, 11, 'public/backEnd/img/news_event/15612077391Image 1 Front.jpg', '2019-06-22 12:48:59', '2019-06-22 12:48:59'),
(24, 11, 'public/backEnd/img/news_event/15612077392Image 2- Inner page.jpg', '2019-06-22 12:48:59', '2019-06-22 12:48:59'),
(25, 11, 'public/backEnd/img/news_event/15612077393Image 3- Inner page.jpg', '2019-06-22 12:48:59', '2019-06-22 12:48:59'),
(27, 13, 'public/backEnd/img/news_event/15783730771_final_HEZ.jpg', '2020-01-07 04:57:57', '2020-01-07 04:57:57'),
(28, 14, 'public/backEnd/img/news_event/15885618143TLC for News.jpg', '2020-05-04 03:10:14', '2020-05-04 03:10:14'),
(29, 16, 'public/backEnd/img/news_event/158978777211IMG_2951.jpg', '2020-05-18 07:41:20', '2020-05-18 07:42:52'),
(30, 17, 'public/backEnd/img/news_event/1593075097finalnews.jpg', '2020-06-25 08:51:37', '2020-06-25 08:51:37'),
(31, 18, 'public/backEnd/img/news_event/1603094651News Image.jpg', '2020-10-19 08:04:11', '2020-10-19 08:04:11'),
(37, 22, 'public/backEnd/img/news_event/16181181351.Rupshi Flour Mills-1.png', '2021-04-11 05:15:35', '2021-04-11 05:15:35'),
(38, 22, 'public/backEnd/img/news_event/1618118135News01.jpg', '2021-04-11 05:15:35', '2021-04-11 05:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('shafi@gmail.com', '$2y$10$YcsbGlYVkd3xS6KmDc7Zsefn6fdFhhx/uLeWtgmpHSxozPIx08uMi', '2018-07-21 04:31:58'),
('shafi@weaverbd.com', '$2y$10$GCYczm6CasyNssucrLBSL.YqpP1RXQXl5zJg7iS.dtFN9vE6wf85C', '2018-07-21 05:07:36'),
('alshafi2016@gmail.com', '$2y$10$A6p16bsvlVTN8D46euy5ruRHz3jscp9ph27LlUuzoO3zolCqNhuCS', '2018-07-22 11:34:48'),
('abdullahalshafi1212@gmail.com', '$2y$10$wfwmmKTsrwlT1m80BrXX3eDGfoRPq0UTwaz52su.fmGDDT80y/2r.', '2018-07-23 15:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `press_releases`
--

CREATE TABLE `press_releases` (
  `id` int(10) UNSIGNED NOT NULL,
  `press_release_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `press_release_place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `press_release_date` date NOT NULL,
  `press_release_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `press_release_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `press_releases`
--

INSERT INTO `press_releases` (`id`, `press_release_title`, `press_release_place`, `press_release_date`, `press_release_image`, `press_release_desc`, `created_at`, `updated_at`) VALUES
(1, 'Special Sales Program for Ramadan', 'Dhaka', '2017-06-01', 'public/backEnd/img/press_release/1531996251press-release3.jpg', '<p>For Ramadan, City Group has taken special sales program under which TEER Soyabean Oil, TEER Sugar, TEER Red Lentils and peas will be sold at special discount price. TEER Soyabean Oil will be sold at TK 85 per liter (TK 17 less), TEER Sugar at TK 60 per KG (TK 12 less), TEER Red Lentils at TK 75 and peas at TK 30 per KG. These special discounted products will be available at 10 specific points in Dhaka city. These areas are- Jatrabari, Motijheel, Press Club, Kawranbazar, Mirpur 1 and 10, Gabtoli, Jhigatola, Ashkona and Khilgoan. This special campaign for Ramadan is part of City Group&rsquo;s corporate social responsibility.</p>', '2018-07-19 10:30:51', '2018-07-19 10:30:51'),
(2, 'Stiff competition for selection', 'Dhaka', '2018-01-04', 'public/backEnd/img/press_release/1531996288press-release2.jpg', '<p>The top archers of the country reached pre-quarterfinals stage in both recurve and compound events on the opening day of the Teer 9th National Archery Championships at the Shaheed Ahsan Ullah Master Stadium in Tongi yesterday.<br />Ahead of long-term training for national archery teams sponsored by City Group, the championships have turned into a really competitive one, with archers fighting it hard to grab attention of the selection committee for inclusion into the national team.<br />The country\'s top recurve archer Roman Sana set a new national record yesterday, scoring 654 out of 720 points in the qualification round, surpassing his previous record by two points. However, his score was 12 points less than what he had achieved in the Asian Archery Championships held in Dhaka in November 2017.<br />As expected Sana, Tamimul Islam, Hakim Ahmed Rubel and Ibrahim Rezowan, all part of the national team in November\'s event, won their respective matches to book pre-quarterfinals berth in men\'s recruve bow event, which will be held today. Roksana Akter, Susmita Banik, Bonna Akter and Bipasha Akter, who fought for the bronze medal match in the compound team event of the same championships in November, also moved to the pre-quarterfinals stage in women\'s compound events.<br />The fight for men\'s recurve bow title is usually confined to within four national players, but the scenario is different this time due to the return of experienced archers Sheikh Sajib and Durul Huda, both of whom did not take part in the selection process for November\'s event due to exams. However, they are back and posing threats to the national archers by having confirmed pre-quarterfinal berths.<br />Sana admitted that they are facing tough challenge in every stage because all archers are determined to deliver their best to draw attention of the selection committee.<br />&ldquo;To be honest, my heart starts pumping when I take part in competitions at home even though I do not feel any pressure competing in international events because all local archers are determined to beat each other, whether it is the ranking round or the elimination round,&rdquo; said Sana, who became 11th out of 79 archers in the ranking round of Asian Archery Championship.<br />Sana believes the national archery championships are getting more competitive every day because a lot of archers are coming up and there is no way to take those competitors lightly anymore.<br />&ldquo;You can say top 16 archers in recurve bow are very good and they have the ability to upset anyone. Archers from Army, BKSP and a few clubs are doing well at this level,&rdquo; Sana said. &ldquo;We had previously competed against only a few good archers but this time we are fighting against some 20 good archers.&rdquo;<br />Sana, who had also qualified for the quarterfinals in men\'s recurve bow event in 19th Asian Archery Championship in Thailand in 2015, believes the national team will be a strong one and produce good results in near future.</p>', '2018-07-19 10:31:28', '2018-07-19 10:31:28'),
(3, 'City Group gets license to set up economic zone', 'Dhaka', '2018-01-24', 'public/backEnd/img/press_release/1531996342press-release1.jpg', '<p>City Group got a license from Bangladesh Economic Zone Authority (BEZA) to set up &ldquo;City Economic Zone Limited&rdquo; on 77.96 acres of land in Narayanganj&rsquo;s Rupshi.<br />The group has already opened letters of credit to import machineries for their industrial units inside the zone, according to a press statement.<br />With electricity connections already in palce for investors, the zone expects to employ 3,000 people within the first year of commercial production and take it to over 20,000 in the next five years.<br />Industries expected to open plants include food and baverage and export oriented business organizations.<br />The government plans to set up 100 new economic zones to generate one crore new jobs, earn $40 billion in additional exports and attract $20 billion in foreign direct investment (FDI), all by 2030.<br />Paban Chowdhury, executive chairman of Beza, and Fazlur Rahman, chairman of City Group, were present at the awarding program in the Beza headquarters in the capital.</p>', '2018-07-19 10:32:22', '2018-07-19 10:32:22'),
(5, 'TEER Appoints New German Coach for BAF', 'Dhaka', '2018-07-24', 'public/backEnd/img/press_release/1532426038Back Image 1.jpg', '<p>Renowned coach Martin Frederick has been appointed as the head coach of Bangladesh Archery team. Fredrick set short, mid and long term targets in order to develop the standard of the game in the country. He was signed under the project &ldquo;TEER Go for Gold&rdquo; with a vision of Tokyo Olympics 2020.</p>', '2018-07-24 09:53:58', '2018-07-24 09:53:58'),
(6, 'KANTAR WORLDPANEL-BRAND FOOTPRINT 2018', 'Dhaka', '2018-07-26', 'public/backEnd/img/press_release/1537619250Kantar_BBF_Report.jpg', '<p>Published on Bangladesh Brand Forum, July 2018 Issue</p>\r\n<p>Kantar Worldpanel&rsquo;s annual Brand Footprint study is based on research from 73% of the global population; a total of one billion households in 43 countries across five continents covering 75% of the global GDP. As part of the study, Kantar Worldpanel tracks more than 18,000 brands across beverages, food, dairy, health and beauty and homecare.</p>\r\n<p>The Brand Footprint rankings measure which brands are being bought by the most consumers the most often. Coca-Cola is the world&rsquo;s most chosen brand, picked from the shelves 5.8 bn times in a year. Colgate and Maggi both achieve podium positions, being also the world&rsquo;s most chosen personal care and food brands.</p>\r\n<p>In the local ranking of Bangladesh in FMCG category, UNILEVER topped other brands with its most selling shampoo brand Sunsilk where its own brand Lux and Rin got the second and third position respectively. Renowned hair oil brand Parachute is in the 4th position with CRP of 181 (7% growth from 2016). UNILEVER&rsquo;s Wheel got the 5th position though it lost 10% in CRP compared to last year. The top 4 brands stays in same position in terms of Consumer Choice as well.</p>\r\n<p>In Food category, TEER gains the first position in ranking with a Consumer Reach Points (CRP) of 57. The second position occupied by Cocola having CRP of 54. All the top 5 brands in this category have gained in terms of CRP. On the other hand, 6 brands in the top 20 list didn&rsquo;t see CRP growth. Mr. Noodles and Bonoful both achieved podium positions in terms of CRP growth rate, lagging behind from penetration perspective. In terms of overall CRP ranking, Fresh and Rupchanda got 3rd and 4th ranking respectively. Improvement in product formulations and enhancement of distribution structure have paved the way for TEER to become top brand in the category.&nbsp;</p>\r\n<p>Popular Tea brand Ispahani has the top score in Consumer Reach Points (CRP) yet showing a 2% negative growth from last year. Other two of the top five positions have been occupied by Brooke Bond and Seylon. Soft drinks brand 7 UP is ranked in 2nd position with a CRP of 32 while its competing brand Sprite is in the 8th. However, in terms of CRP growth, Tetley has topped other brands with a remarkable 49% growth compared to 2016.</p>\r\n<p>In dairy product category, Marks was successful to attain 40 points in consumer reach which is the top score for this category. This brand has also seen a 4% growth in CRP. Diploma is in the second position in terms of CRP, but penetration perspective it fall behind Fresh and Dano. According to CRP, Fresh is in 3rd position while Dano is in 4th Position. Fresh has fall behind due to negative CRP growth of 7% and decrease in penetration.</p>\r\n<p>In the Health &amp; Beauty category Sunsilk holds its 1st position having CRP (M) of 248.&nbsp; 3 Brands of Unilever are in the top 5 includes Sunsilk, LUX &amp; Fair &amp; Lovely. Lux has better penetration than Sunsilk but in terms of CRP Sunsilk beats LUX. Lux is in 2nd position with 1% negative growth whether Sunsilk has got 1% positive growth.</p>\r\n<p>Wheel Laundry Soap was re branded as RIN few years back, later Unilever continues both of the brand in Bangladesh Market and successfully both the brands are now in 1st &amp; 2nd position. RIN scores 195 CRP (M) and wheel scores 152. TOP 3 brands in Home Care Category are RIN, WHEEL, and VIM.</p>\r\n<p>Category wise CRP varies a lot. Health &amp; beauty and home care category have high CRP as these category toppers have higher percentage in penetration than the other three categories. Food, beverage and dairy category are being dominated by mostly local brands. The report also shows that companies that are consistently performing well in brand building activities are achieving higher points in consumer choice.</p>\r\n<p>For any brand, there are many ways to improve CRP-</p>\r\n<ul>\r\n<li>Long term, sustainable investment in brand development</li>\r\n<li>360* approaches in brand building</li>\r\n<li>Improved and innovative trade marketing</li>\r\n<li>Finding cost effective solutions for increasing numeric and weighted distribution.</li>\r\n</ul>', '2018-09-22 12:27:30', '2018-09-22 12:27:30'),
(7, 'TEER Archery Talent Hunt 2018- Final Selection', 'Dhaka', '2018-11-02', 'public/backEnd/img/press_release/1541247917TGFG-Talent-Hunt-Image-edited.jpg', '<p>Keeping the target for the 2020 Olympics in mind, the Bangladesh Archery Federation (BAF), in association with sponsors City Group, selected 10 archers from the 2,555 participants in a talent hunt programme to strengthen the pipeline for the national archery team.</p>\r\n<p>Under the \'TEER Go For Gold\' project, the game\'s local governing body launched the programme in July across 12 different districts.</p>\r\n<p>Two archers -- a boy and a girl -- were selected from each of the participating districts for a training camp in Dhaka, which was completed in two phases over two months at the Master Ahsanullah Stadium in Gazipur.</p>\r\n<p>Bangladesh coach Fredrick Martin then chose the final 10 archers, which features one girl, for long term training on Wednesday.</p>\r\n<p>\"There were different stages of grooming the archers. Firstly, they were beginners who needed time to grow and needed experience of competing at the international level. These [the 10 archers] are talented ones who possess the physical strength to play archery. But it is also a mental game and we now need to groom their mental strength, motivation and personality to help them grow,\" said Martin, adding that Germany had taken 12 years to win a silver medal after launching their talent hunt programme.</p>\r\n<p>BAF president Lt Gen (rtd) Mainul Islam, BOA secretary Syed Shahed Reza, City Group executive director Shoeb Md. Asaduzzaman and BAF general secretary Kazi Razibuddin Ahmed Chapal were, among others, present during the distribution of training certificates among the 24 archers.</p>', '2018-11-03 12:25:17', '2018-11-03 12:25:17'),
(8, 'Children’s culinary competition “TEER Little Chef” is about to commence', 'Dhaka', '2018-11-04', 'public/backEnd/img/press_release/1541419024TLC-1-new.jpg', '<p>Teer has been nominated as the number one consumer brand in Kantar WorldPanel Brand Footprint 2018. Growing up from &ldquo;Bishuddhotay shera, momotay ghera&rdquo; TEER is now organizing the &ldquo;Teer Little Chef&rdquo;. Children from 12-16 year olds are eligible to participate in the event and the winner will take home 5 lakh taka.</p>\r\n<p>Based on this occasion, Duronto TV held a press conference at their office. City Group Executive Director (Sales and Marketing) Shoeb Md. Ashaduzzaman, Marketing Manager Farjanul Hoque and Duronto TV&rsquo;s Director Abhijit Chowdhury, Head of Program Mohammad Ali Haider and Head of Marketing &amp; Sales Amjed Hossain Arzu.<br /><br />Shoeb Md. Ashaduzzaman quoted &ldquo;It is our responsibility to create a platform where students not only receive education but also can ignite their inner talent&rdquo;. Participants in the competition can showcase their culinary expertise where simultaneously, both the participants and the audience can know a lot more about balanced diet and nutritional values. <br /><br />To register, participants need to type &lt;space&gt; Division Code &lt;space&gt; Age &lt;space&gt; Name, and SMS to 22010. Participants can also inbox on the Facebook/TEER1972 page to complete the registration process. For more information, call 01309002887.</p>\r\n<p><br />Bangladesh&rsquo;s first Child special television Channel Duronto TV will telecast the event &ldquo;Teer Little Chef &ldquo;.</p>\r\n<p><br />Duronto TV Director Mr. Abhjit Chowdhury said, &ldquo;Children can express their full potential through creativity in different ways. The way children can express their creativity through drawing, singing, poetry, the same way they can express themselves through cooking. If children can get involved in cooking from a very young age, this not only raises their morale spirits but also are extremely vital to enlighten their future.&rdquo;</p>\r\n<p>30 candidates will be short-listed in the regional round from 6 divisional cities. From the short-listed candidates, the top 10 will be selected for final round. <br /><br /></p>\r\n<p>Judge panel will include senior dietitian Shaila Sabrin, food connoisseur Alpona Habib and famous chef Syed Tajjamul Haque. Apart from the above judge panel, the program will be anchored by everyone&rsquo;s favorite Safa Kabir.</p>', '2018-11-05 11:55:43', '2018-11-05 11:57:04'),
(9, 'TEER 2nd National Youth Archery C’ship commences', 'Dhaka', '2018-11-19', 'public/backEnd/img/press_release/1543040791TGFG_2nd_Youth_Arcehry_Champ.JPG', '<p>TEER 2nd National Youth Archery Championship 2018 is all set to commence amid a festive environment at Shaheed Ahsan Ullah Master Stadium in Tongi from 19 November 2018. The event is organised by Bangladesh Archery Federation (BAF) with the sponsorship of City Group under &lsquo;TEER Go for Gold&rsquo; project. The two-day event is scheduled to start and close at 10:00am and 03:00pm respectively and will continue till November 20. Ahead of the inauguration ceremony of the championship, a press-conference took place at Bangladesh Olympic Association (BOA) auditorium in the capital on Sunday. Bangladesh Archery Federation Vice-President Anisur Rahman, General Secretary Kazi Rajib Uddin Ahmed Chapol, City Group Marketing Manager Farjanul Hoque and Senior Deputy Brand Manager Rubaiyat Ahmed and other officials were present in the press-conference.</p>', '2018-11-24 06:26:31', '2018-11-24 06:26:31'),
(10, 'City Group Sponsors Food and Hospitality Expo’19', 'Dhaka', '2019-01-29', 'public/backEnd/img/press_release/1550488053press.jpeg', '<p>For the first ever in Bangladesh, a three-day-long \"Food and Hospitality Bangladesh Expo 2019\" will take place at the International Convention Center Bangladesh\'s (ICCB) from February 14 to 16, 2019.</p>\r\n<p>Bangladesh International Hospitality Association (BIHA) and Wem Bangladesh Limited organized the expo under the supervision of Bangladesh Parjatan Corporation.&nbsp;</p>\r\n<p>The Principal Sponsor of the program is City Group. New Zealand Dairy Products Bangladesh and Euro Processed Food Products are gold sponsors. Foodex International Village and Noor Trade House are silver sponsors.&nbsp;</p>\r\n<p>Organizers announced about the event at a press conference held at the Lahori Hall of Radisson Blu Hotel in Dhaka on January 29, 2019.&nbsp;Akhtaruzzaman Khan Kabir, chairperson of Bangladesh International Hotel Association (BIHA), and CEO of Hotel Agrabad H M Hakim Ali, Chairperson of Bangladesh Restaurant Owners Association and Director of&nbsp; FBCCI Khandakar Ruhul Amin, GM of Radisson Blu Water Garden Alexander Haslar, Principal of National Hotel and Tourism Training Institute (NHTTI) Parvez A Chowdhury, MD of Hotel Sarina Mashkur Sarwar, Director of Dhaka Regency (FNB) ATM Ahmed Hossain, Acting GM of Westin Dhaka Sakawat Hossain were present at the program. About 70 exhibitors from 7 countries, 150 brands, 200 international delegates and 50 hosted buyers will be showcasing at the event.&nbsp;</p>\r\n<p>Speakers shared that apart from Bangladeshi exhibitors, delegates, exhibitors and buyers from India, Thailand, Malaysia, China, Italy and Spain are going to participate at the event. Among them hotel, restaurant and caf&eacute; importer and distributor, housekeepers, spa specialists, architect and interior designer, CIO, CTO, hotel suppliers, chef, government employees and others are important.</p>\r\n<p>The fair is also going to have live shows such as chef challenges, workshops on food of different countries, roundtables with CEOs and job fairs.</p>', '2019-02-18 11:05:41', '2019-02-18 11:07:33'),
(11, 'TEER 3rd Bangladesh Qualifying Round\' of Philip C Jessup International Law Moot Court Competition-2019', 'Dhaka', '2019-02-21', 'public/backEnd/img/press_release/155091631252690343_354650418460560_6400785436196732928_n.jpg', '<p>The inauguration ceremony of the national round of \'3rd Bangladesh Qualifying Round\' of Philip C Jessup International Law Moot Court Competition-2019 was held on Thursday at a city hotel.</p>\r\n<p>International Law Students Association Bangladesh (ILSA) in association with the Office of Overseas Prosecutorial Development Assistance and Training (OPDAT)-US Department of Justice (DoJ), TEER- City Group, Independent University, Bangladesh, and Bangladesh Chapter of the Asian Society of International Law (AsianSIL Bangladesh) organized the competition in Bangladesh, said a press release on Thursday.</p>\r\n<p>Attorney General Mahbubey Alam addressed the inaugural session as the chief guest while Md Farjanul Hoque, Marketing Manager, City Group, ASM Sayem Ali Pathan, Advocate, Supreme Court of Bangladesh, Prof Dr Borhan Uddin Khan, Adviser, Department of Law, IUB and President, AsianSIL Bangladesh, among others, spoke at the function.</p>\r\n<p>Eric Opanga, Resident Legal Advisor, US Department of Justice, OPDAT, U. Embassy Dhaka, graced the event while Dr Mohammad Nazmuzzaman Bhuian, Professor of Law, University of Dhaka also the Vice President of AsianSIL Bangladesh moderated the inaugural session.</p>\r\n<p>However Jessup moot court competition is one of the most renowned competitions of law students in where law students from more than 100 countries in the international round gather.</p>\r\n<p>This is the third time that Bangladesh is hosting a national qualifying round. International Law Students Association Bangladesh (ILSA) in association with the Office of Overseas Prosecutorial Development Assistance and Training (OPDAT)- U.S. Department of Justice (DoJ), TEER- City Group, Independent University, Bangladesh, and Bangladesh Chapter of the Asian Society of International Law (AsianSIL Bangladesh), are organizing the most reputed moot court competition in Bangladesh.</p>', '2019-02-23 09:57:56', '2019-02-23 10:05:12'),
(12, 'Ruman overwhelmed with reception', 'Dhaka', '2019-06-18', 'public/backEnd/img/press_release/15612081491Image 1.jpg', '<p>Mohammad Ruman Shana, who won Bangladesh&rsquo;s first-ever bronze medal in the World Archery Championship, got warm reception after his arrival in Dhaka with Bangladesh team on Tuesday morning.</p>\r\n<p>Shana also qualified for the Tokyo Olympics 2020 as the first Bangladeshi archer on merit.</p>\r\n<p>Soon after his arrival at Hazrat Shah Jalal International airport in Dhaka Tuesday morning from the Netherlands after participating in the World Archery Championship, Shana was greeted by officials from sponsor company City Group along with State Minister for Youth and Sports Zahid Ahsan Russell MP and officials from Bangladesh Archery Federation.</p>\r\n<p>Later, Shana was taken to Sheikh Russell Roller Skating Complex on the Bangabandhu National Stadium premises for a grand reception at noon.</p>\r\n<p>Bangladesh Olympic Association, National Sports Council, BKSP, Bangladesh Ansar &amp; VDP and country&rsquo;s other federations welcomed Shana with bouquets in the occasion.</p>\r\n<p>City Group (Teer), the sponsor of Bangladesh Archery Federation, awarded Tk 2 lakh to Ruman Shana for his feat in the World Championship.</p>\r\n<p>Shana said also &ldquo;My main target was to qualify for the Olympics and I achieved the target, now, my next target is to win Olympics medal.&rdquo;</p>\r\n<p>City Group has been working with Bangladesh Archery Federation since 2017 under a five years development program TEER Go for Gold. This five-year performance-based sponsorship program encompasses wide range of activities from talent hunt, development of archery training center, recruitment of renowned German coach to health development, education and scholarship program.</p>', '2019-06-22 12:55:49', '2019-06-22 12:55:49'),
(13, 'City Group Continues to Support Bangladesh Archery Federation', 'Dhaka', '2019-11-09', 'public/backEnd/img/press_release/1573561828Archery-pic.jpg', '<p>In a press conference November 9, Saturday at the Bangladesh Olympic Association auditorium in Dhaka, Executive Director of City Group (marketing and sales) Zafar Uddin Siddiqui praised the performances of the Bangladesh archers, especially Mohammad Ruman Shana, and pledged further support in future.</p>\r\n<p>City Group had earlier inked a five-year deal with the BAF on October 23, 2017, to improve the prospects of archery in the country.</p>\r\n<p>City Group would provide Bangladesh Archery Federation Tk2.41 crores for the 2019-20 season, which will be the sponsor&rsquo;s third year of the five-year deal with the federation. The amount includes Tk 72 lakhs for event management and Tk 1.61 crores for development purposes of the Archers and federation.</p>\r\n<p>In the last two years, Bangladesh garnered 15 gold, 18 silver and 10 bronze medals in international tournaments and City Group has played a pivotal role behind the successes.</p>\r\n<p>BAF general secretary Kazi Razib Uddin Ahmed Chapal and Bangladesh team&rsquo;s German head coach Martin Frederick were also present among others during the presser.</p>', '2019-11-12 12:30:28', '2019-11-12 12:30:28'),
(14, 'City Group reduces the price of Soyabean oil and Sugar', 'Dhaka', '2020-05-18', 'public/backEnd/img/press_release/1589787294oil.jpg', '<p style=\"font-weight: 400;\">City group has reduced the maximum retail price of their soyabean oil and sugar.&nbsp;The Teer Advanced soyabean oi and TEER refined sugar both got their price reduce by respectively&nbsp;5&nbsp;tk and&nbsp;3&nbsp;tk. In this moment of national crisis, and also for the holy month of ramadan Citygroup has done this to remain beside their valuable consumers.</p>\r\n<p style=\"font-weight: 400;\">One litre Soyabean oil is now priced at&nbsp;105&nbsp;tk,&nbsp;2&nbsp;litre is&nbsp;208&nbsp;tk,&nbsp;5&nbsp;litre is&nbsp;505&nbsp;tk. Per Kg sugar is now priced at&nbsp;69&nbsp;tk.</p>', '2020-05-18 07:34:54', '2020-05-18 07:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_add` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consumer_pack` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulk_pack` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_image`, `product_desc`, `product_tag`, `product_add`, `consumer_pack`, `bulk_pack`, `created_at`, `updated_at`) VALUES
(1, 1, 'TEER Advanced Soyabean Oil', 'public/backEnd/img/product/1603011435Teer-Advanced-Soyabean-Oil-5-ltr.png', 'TEER Advanced Soyabean Oil is one of the largest brands in the premium segment of refined oil consumer packs. The top graded imported crude oil goes thorough world class refining process to ensure healthy cooking without cutting back on flavor and taste. TEER offers the goodness of vitamin A, E and K and Triple power of Omega 3,6,9 which makes it the ideal choice for people looking for a healthy lifestyle.', 'TEER Advanced Soyabean Oil is processed through NRT (Nutrients Retained Technology) to ensure adequate nutrients.', 'public/backEnd/img/product/1532157498teer-advance-soyabin-oil.jpg', '500 ml, 1 Ltr., 2 Ltr., 3 Ltr., 5 Ltr., 8 Ltr.', '16 kg Tin, 186 kg Drum', '2018-07-19 12:51:32', '2020-10-18 08:57:15'),
(2, 1, 'TEER Sunflower Oil', 'public/backEnd/img/product/1532156960Teer-Sumflower-oil.png', 'Imported from Europe and refined with highly specialized refining mercenaries from Desmet, Belgium, TEER Sunflower Oil is light, healthy, nutritious and high in essential vitamin E and K and low in saturated fat. Its high smoke point makes cooking easy and makes the food easy to digest.', 'TEER sunflower oil provides nutrients in every drop and ensures taste and lightness of the food.', 'public/backEnd/img/product/1532156960sunflower-oil.jpg', '2 Ltr., 5 Ltr.', NULL, '2018-07-21 07:03:11', '2019-04-28 05:49:09'),
(3, 1, 'TEER Canola Oil', 'public/backEnd/img/product/1624688036TCO 5 ltr 01.png', 'Because of its light flavor, high smoke point, and smooth texture, TEER Canola Oil is one of the most versatile and best tasting cooking oils. The oil is derived from imported hi-grade rapeseed that is low in erucic acid and saturated fats but high in healthier unsaturated fats, Omega- 3 and 6. Canola oil is made at a processing facility by slightly heating and then crushing the seed. The hi-tech and healthy refining process ensures all the necessary nutrition facts to be intact. The packed TEER Canola Oil provides the best nutritional balance of all popular cooking oils. It’s light, delicate taste makes it the perfect oil to be used in every recipe that calls for vegetable oil.', 'The oil is derived from imported hi-grade rapeseed that is low in erucic acid and saturated fats but high in healthier unsaturated fats, Omega- 3', 'public/backEnd/img/product/1624688036Product all 2021final 24.06.21 - Copy.png', '500 ml, 1 Ltr., 2 Ltr., 3 Ltr.,5 Ltr., 8 Ltr.', NULL, '2018-07-21 07:09:20', '2021-06-26 06:13:56'),
(4, 1, 'TEER Mustard Oil', 'public/backEnd/img/product/1556430549Teer-Mustard-Oil-2-ltr.png', 'TEER is the first branded mustard oil in Bangladesh. This oil is usually extracted from the first press of finest quality mustard seeds using GHANI, a traditional cold press system. In this process, seeds are crushed at low temperature so natural properties, antioxidants and essential micro nutrients are retained in the oil. The natural pungency and aroma spice up pickle making and cooking.\r\n', 'Processing with GHANI ensures natural pungency and aroma of TEER Mustard Oil', 'public/backEnd/img/product/1532156591teer-mastard-oil.jpg', '80 ml, 250 ml, 500 ml, 1 Ltr., 2 Ltr., 3 Ltr., 5 Ltr., 8 Ltr.', '8 kg Tin, 16 kg Tin.', '2018-07-21 07:11:05', '2018-07-21 07:11:05'),
(5, 2, 'TEER Atta', 'public/backEnd/img/product/16237332891532157444Teer-atta-pack.png', 'TEER Atta is milled from selected high protein wheat from Canada, America, Australia and Russia using top-notch Swiss technologies from Buhler. TEER Atta is the result of attention to detail, consistency in milling, and desire to ensure the very best baking experience possible, every time. Only selected fine Atta is packed for the consumers to ensure taste as well as nutrition.', 'Consumers can’t think of anything other than TEER for Atta', 'public/backEnd/img/product/1532157444Atta-Moyda-Suji-Full-Ad.jpg', '1 kg, 2 kg', '10 kg, 50 kg', '2018-07-21 07:17:25', '2021-06-15 05:01:29'),
(6, 2, 'TEER Flour', 'public/backEnd/img/product/16237333551532157618Teer-Flour-Pack.png', 'TEER Flour is milled from selected high protein wheat from Canada, America, Australia and Russia using top-notch Swiss technologies from Buhler. TEER Flour is the result of attention to detail, consistency in milling, and desire to ensure the very best baking experience possible, every time. Only selected fine flour is packed for the consumers to ensure taste as well as nutrition.', 'Consumers can’t think of anything other than TEER for Flour', 'public/backEnd/img/product/1532157618Atta-Moyda-Suji-Full-Ad.jpg', '1 kg, 2 kg', '10 kg, 50 kg', '2018-07-21 07:20:18', '2021-06-15 05:02:35'),
(7, 2, 'TEER Semolina', 'public/backEnd/img/product/16237332181532157842Teer-Semolinan-Pack.png', 'TEER Semolina is milled from selected high protein wheat from Canada, America, Australia and Russia using top-notch Swiss technologies from Buhler. TEER Semolina is the result of attention to detail, consistency in milling, and desire to ensure the very best baking experience possible, every time. Only selected fine semolina is packed for the consumers to ensure taste as well as nutrition.', 'Consumers can’t think of anything other than TEER for Semolina (Suji)', 'public/backEnd/img/product/1532157842Atta-Moyda-Suji-Full-Ad.jpg', '250 g, 500 g', '10 kg, 50 kg', '2018-07-21 07:24:02', '2021-06-15 05:00:18'),
(8, 2, 'TEER Whole Wheat Atta', 'public/backEnd/img/product/1532157943Teer-Whole_Wheat-Atta.png', 'All the nutrients of Bran, Endosperm and Wheat Germ stay intact and protected, TEER Whole Wheat Atta Provides the wholesome goodness of fine, fiber-rich, vitamin-and-mineral-loaded atta for healthier foods. TEER is the first brand to introduce Whole Wheat Atta in Bangladesh. This top selling whole wheat atta is pantry all-star, rich in flavor and healthy to boot.', 'TEER Whole Wheat Atta keeps all the nutrients of wheat intact and contributes to daily requirements of dietary fiber', 'public/backEnd/img/product/1532157943teer-whole-wheat-atta.jpg', '1 kg, 2 kg', '50 kg', '2018-07-21 07:25:43', '2018-07-21 07:25:43'),
(9, 3, 'TEER Sugar', 'public/backEnd/img/product/1532158240Teer-Sugar.png', 'TEER Sugar is extra fine granulated, free-flowing and of the highest quality. TEER Sugar retains its original flavor & properties of cane sugar due to optimum degree of refining by European technology under hygienic conditions. Its uniform size of the sugar crystals gives a regular texture and consistency, making it the perfect ingredient for table use, baking, preserving, canning, and for sweetening beverages.', 'TEER gives the best refined sugar that simply makes the life sweet', 'public/backEnd/img/product/1532158240Teer-Sugar-Side-Img.jpg', '1 kg', '50 kg', '2018-07-21 07:30:40', '2018-07-21 07:30:40'),
(10, 4, 'TEER Chinigura Rice', 'public/backEnd/img/product/1532158501Teer-Rice.png', 'TEER Chinigura rice stands for its pristine, white grains and rich aroma. The rice is sorted from the finest locally produced paddy. The top-notch technology of Buhler machines from Switzerland ensures the best processing of this Rice. The world’s latest Crosshair Targeting Technology of Sortex machine removes even the smallest defected rice and other foreign particles by using multi-chromatic optical lenses.', 'For excellent non-sticky rice and unforgettable aroma, TEER Chinigura Rice is the only option.', 'public/backEnd/img/product/1532158501teer-chinigura-rice.jpg', '1 kg, 2 kg, 5 kg, 10 kg, 25 kg', '50 kg', '2018-07-21 07:35:01', '2018-07-21 07:35:01'),
(11, 4, 'TEER Miniket Rice', 'public/backEnd/img/product/1532158801Minicate-Rice-Pack-1-kg.png', 'TEER Miniket Rice is the best choice for everyday dishes. This product prided itself in sourcing the best and the finest quality rice grain. Only the best grains are packed for excellent non-sticky rice that cook perfectly every time.', 'TEER Miniket Rice is the best option for everyday dishes', 'public/backEnd/img/product/1532158801teer-minicate-rice.jpg', '1 kg, 2 kg, 5 kg, 10 kg, 25 kg', '50 kg', '2018-07-21 07:40:01', '2018-07-21 07:40:01'),
(12, 5, 'TEER Red Lentil', 'public/backEnd/img/product/1624688257Teer Mosur dal 3D Packaging New 12.04.2021 copy - Copy.png', 'The selected best breed lentil that is collected from local and international market is packed for TEER Red Lentil. TEER Red lentil is low in Glycemic index and high in fiber, iron and protein that is excellent for soup, Dal and spicy curries.', 'TEER Red Lentil is excellent source of protein and fiber that makes a healthy and nutritious meal', 'public/backEnd/img/product/1624688257Product all 2021final 24.06.21 - Copy.png', '500 g, 1 kg, 2 kg', '25 kg, 50 kg', '2018-07-21 07:41:37', '2021-06-26 06:17:37'),
(13, 5, 'TEER Split Red Lentil', 'public/backEnd/img/product/16246884121532158986split-red-lentil.png', 'TEER Split red lentil is made from splitting the whole red lentil. The skin is removed and the remaining reddish-orange seed is then split into two halves resulting in a product that can be boiled faster than other lentil category. The top notch technology of Buhler machines from Switzerland ensures the best quality in processing of TEER Split Red Lentil. The world’s latest Crosshair Targeting TechnologyTM of Sortex machine removes even the subtlest defected lentil and other foreign particles by using multi-chromatic optical lenses. TEER Split Red lentil is low in Glycemic index and high in fiber, iron and protein that is excellent for soup, Dal and spicy curries.', 'The world’s latest Crosshair Targeting TechnologyTM of Sortex machine removes even the subtlest defected lentil and other foreign particles by using multi-chromatic optical lenses.', 'public/backEnd/img/product/1624688412Product all 2021final 24.06.21 - Copy.png', '500 g, 1 kg, 2 kg', '25 kg, 50 kg', '2018-07-21 07:43:06', '2021-06-26 06:20:12'),
(14, 7, 'BENGAL Classic Tea', 'public/backEnd/img/product/162468888616227253571540902654bengal-tea.png', 'BENGAL Classic Tea is handpicked premium black tea that comes from the best leaves of our own gardens. The Master Blenders and state-of-the art machineries ensure delicious blend for a superior taste of best-brewed BENGAL Classic Tea. Its amazing flavor complements any exciting gathering with friends or family.', 'BENGAL Classic Tea is all the way natural from plucking to packaging to ensure the best ever tea experience', 'public/backEnd/img/product/1624688886Bengal Tea.jpg', '10gm, 50gm, 100gm, 200gm, 400gm, Tea Bag', NULL, '2018-07-21 07:55:16', '2021-06-26 06:28:06'),
(15, 8, 'JIBON Pure Drinking Water', 'public/backEnd/img/product/1532159868Products-05.png', 'Jibon Drinking Water is a source of vitality, as part of essential hydration. This bottled water provides consumers the purest water possible. The purification process includes reverse osmosis and other filtering and purification methods. To make sure the consumer stay well hydrated day and night, wherever they go and whatever they’re up to, Jibon has a convenient bottle that’s right for them.', 'Jibon stands for the purest drinking water for healthy hydration', 'public/backEnd/img/product/1532159868Products-01.png', '250 ml, 500 ml, 1 Ltr., 2 Ltr., 5 Ltr.', '20 ltr Jar', '2018-07-21 07:57:48', '2018-07-21 07:57:48'),
(16, 9, 'NATURAL Palm Olein', 'public/backEnd/img/product/1532160115Natural-Palm-Olein.png', 'Natural Super Refined Palm Olein is perfect all-purpose cooking and frying oil. It contains saturated and unsaturated fats, vitamin E and Beta Carotene. Natural Super Refined Palm Olein has a light taste that lets cooking flavor shine through.', 'Natural Super Refined Palm Olein is rich in Vitamin E and Beta Carotene and fortified with Vitamin A.', 'public/backEnd/img/product/1532160115natural_palm_description.jpg', '500 ml, 1 Ltr., 2 Ltr., 5 Ltr.', '16 kg Tin     ....     186 kg Drum', '2018-07-21 08:01:55', '2018-07-21 08:01:55'),
(17, 10, 'SUN Soyabean Oil', 'public/backEnd/img/product/16230606671591938577sun-edibol-oil.png', 'SUN Soyabean Oil, fortified with vitamin A, is a mass market product, introduced to provide consumers with the finest quality oil at an affordable price. The super refined soyabean oil comes from imported Crude Soyabean Oil and refined with utmost care using European technology.', 'SUN Refined Soyabean Oil is renowned for its finest quality and affordability that ensures healthy living at reasonable price.', 'public/backEnd/img/product/16230606671591938577sun-oil.jpg', '500 ml, 1 Ltr., 2 Ltr., 3 Ltr., 4 Ltr.', '16 kg Tin, 186 kg Drum', '2018-07-21 08:03:37', '2021-06-07 10:11:07'),
(18, 10, 'SUN Vanaspati', 'public/backEnd/img/product/1591936941sun-vanaspati.png', 'SUN Vanaspati is processed properly using the state of the art technological machinery. We maintain the quality to ensure highest level of satisfaction of the consumers after using our product. Used as an alternative to butter oil and margarine, SUN Vanaspati maintains the health and quality aspects that makes it widely demanded for bakery item production. As this product provides many bakeries in the local market with the potentials to produce quality bread and bakery products, we are always keen to maintain the best health & hygiene quality.', 'SUN Vanaspati maintains the health and quality aspects that makes it widely demanded for bakery item production', NULL, NULL, '16 kg Tin', '2018-07-21 08:17:40', '2020-06-12 04:42:21'),
(19, 6, NULL, 'public/backEnd/img/product/1532408002Vasoman-Pangash9.png', NULL, NULL, NULL, NULL, NULL, '2018-07-24 04:51:05', '2018-07-24 04:51:05'),
(20, 6, NULL, 'public/backEnd/img/product/1532408002Vasoman-Pangash9.png', NULL, NULL, NULL, NULL, NULL, '2018-07-24 04:51:58', '2018-07-24 04:51:58'),
(21, 6, NULL, 'public/backEnd/img/product/1532408002Vasoman-Pangash9.png', NULL, NULL, NULL, NULL, NULL, '2018-07-24 04:52:14', '2018-07-24 04:52:14'),
(22, 4, 'TEER Muri (Puffed Rice)', 'public/backEnd/img/product/1625379628Teer Muri 246 px x 320 px.png', 'TEER puffed rice comes from the selected best rice grains which ensures the utmost quality. It is processed with state-of-art-technology to keep its crispiness and best taste intact. TEER puffed rice is 100% Urea and gluten free and processed without any harmful preservative. The crispy TEER Puffed Rice makes a great choice of snack for any occasion; any time!', 'The crispy TEER Muri is a great choice in breakfast cereals and other snack foods.', 'public/backEnd/img/product/1625379628Product all 2021final 24.06.21 - Copy.png', '250 gm', '500 gm', '2021-06-26 06:23:36', '2021-07-04 06:20:28'),
(24, 16, 'TEER Haleem Mix', 'public/backEnd/img/product/1625041599THM 246 x320.png', 'Haleem is a traditional, high-protein cereal-based cuisine, primarily cooked with beef/ mutton which has become a spicy staple of many people. TEER Haleem Mix uses the best quality lentils and spices and the exquisite blend ensures the taste of age old Haleem that we always love to consume in traditional restaurants.', 'TEER Haleem- Taste of restaurant, now in home', 'public/backEnd/img/product/1625041599Product all 2021final 24.06.21 - Copy.png', '200 gm', NULL, '2021-06-26 06:26:48', '2021-06-30 08:26:39'),
(25, 16, 'TEER Firni Mix', 'public/backEnd/img/product/1625041505TFM 246 x320.png', 'Firni is the go to dessert for Bangladeshi people in every occasion. TEER Firni mix is served in a ready-to-cook pack with best quality Chinigura rice, almonds, cardamom and without any artificial color or harmful preservatives to make it healthy and tasty. TEER Firni mix makes the most delicious firni that anyone can make.', 'TEER Firni, so delicious firni in such ease, you won’t believe.', 'public/backEnd/img/product/1625041505Product all 2021final 24.06.21 - Copy.png', '150 gm', NULL, '2021-06-26 06:27:19', '2021-06-30 08:25:05'),
(26, 13, 'SUN Chinigura Rice', 'public/backEnd/img/product/1625381207Sun Chinigura Rice pack 1 kg final.png', 'SUN Chinigura rice stands for its pristine, white grains and rich aroma. The rice is sorted from the finest locally produced paddy. The top-notch technology of Buhler machines from Switzerland ensures the best processing of this Rice. The world’s latest Crosshair Targeting Technology of Sortex machine removes even the smallest defected rice and other foreign particles by using multi-chromatic optical lenses.', 'For excellent non-sticky rice and unforgettable aroma, SUN Chinigura Rice is the only option.', 'public/backEnd/img/product/1625381207Product all 2021final 24.06.21 - Copy.png', '1 kg, 2 kg, 5 kg, 10 kg, 25 kg', '50 kg', '2021-07-04 06:46:47', '2021-07-04 06:46:47'),
(27, 13, 'SUN Kataribhog Rice', 'public/backEnd/img/product/1625381323Sun Kataribhog Rice 5kg pack final.png', 'SUN Kataribhog Rice is the best choice for your eveeryday Dishes. This product prided itself in sourcing the best and the finest quality rice grain. Only the best grains are packed for excellent non-sticky rice that cook perfectly every time.', 'SUN Kataribhog Rice is the best option for everyday dishes', 'public/backEnd/img/product/1625381323Product all 2021final 24.06.21 - Copy.png', '1 kg, 2 kg, 5 kg, 10 kg, 25 kg', '50 kg', '2021-07-04 06:48:43', '2021-07-04 06:48:43'),
(28, 13, 'SUN Miniket Rice', 'public/backEnd/img/product/1625381423Sun Miniket rice 3D Pack.png', 'SUN Miniket Rice is the best choice for everyday dishes. This product prided itself in sourcing the best and the finest quality rice grain. Only the best grains are packed for excellent non-sticky rice that cook perfectly every time.', 'SUN Miniket Rice is the best option for everyday dishes', 'public/backEnd/img/product/1625381423Product all 2021final 24.06.21 - Copy.png', '1 kg, 2 kg, 5 kg, 10 kg, 25 kg', '50 kg', '2021-07-04 06:50:23', '2021-07-04 06:50:23'),
(29, 15, 'SUN BOP Tea', 'public/backEnd/img/product/1625381586Sun tea BOP.png', 'SUN BOP Tea is handpicked premium black tea that comes from the best leaves of our own gardens. The Master Blenders and state-of-the art machineries ensure delicious blend for a superior taste of best-brewed SUN BOP Tea. The BOP tea leaves spreads liquor slowly over time to give the rich flavor and aroma.', 'SUN BOP Tea is all the way natural from plucking to packaging to ensure the best ever tea experience', 'public/backEnd/img/product/1625381586Product all 2021final 24.06.21 - Copy.png', '500 gm', NULL, '2021-07-04 06:53:06', '2021-07-04 06:53:06'),
(30, 15, 'SUN CD Tea', 'public/backEnd/img/product/1625381699Sun tea CD.png', 'SUN CD Tea is handpicked premium black tea that comes from the best leaves of our own gardens. The Master Blenders and state-of-the art machineries ensure delicious blend for a superior taste of best-brewed SUN CD Tea. The CD tea leaves are used in tea stalls who serves their consumers who wants liquor directly from the leaves to get the authentic flavor and aroma of the tea.', 'SUN CD Tea is all the way natural from plucking to packaging to ensure the best ever tea experience', 'public/backEnd/img/product/1625381699Product all 2021final 24.06.21 - Copy.png', '500 gm', NULL, '2021-07-04 06:54:59', '2021-07-04 06:54:59'),
(31, 15, 'SUN PD Tea', 'public/backEnd/img/product/1625389433Sun tea PD.png', 'SUN PD Tea is handpicked premium black tea that comes from the best leaves of our own gardens. The Master Blenders and state-of-the art machineries ensure delicious blend for a superior taste of best-brewed SUN PD Tea which releases color and liquor fast and gives superior flavor and aroma.', 'SUN PD Tea is all the way natural from plucking to packaging to ensure the best ever tea experience', 'public/backEnd/img/product/1625389433Product all 2021final 24.06.21 - Copy.png', '500 gm', NULL, '2021-07-04 09:03:53', '2021-07-04 09:03:53'),
(32, 15, 'SUN RD Tea', 'public/backEnd/img/product/1625389537Sun tea RD.png', 'SUN RD Tea is handpicked premium black tea that comes from the best leaves of our own gardens. The Master Blenders and state-of-the art machineries ensure delicious blend for a superior taste of best-brewed SUN RD Tea. The RD tea leaves are used in tea stalls who serves their consumers who wants liquor directly from the leaves to get the authentic flavor and aroma of the tea.', 'SUN RD Tea is all the way natural from plucking to packaging to ensure the best ever tea experience', 'public/backEnd/img/product/1625389537Product all 2021final 24.06.21 - Copy.png', '500 gm', NULL, '2021-07-04 09:05:37', '2021-07-04 09:05:37'),
(33, 15, 'SUN Premium Tea', 'public/backEnd/img/product/1625389637Sun Premium tea.png', 'SUN Premium Tea is handpicked premium black tea that comes from the best leaves of our own gardens. The Master Blenders and state-of-the art machineries ensure delicious blend for a superior taste of best-brewed SUN Premium Tea. Its amazing flavor complements any exciting gathering with friends or family.', 'SUN Premium Tea is all the way natural from plucking to packaging to ensure the best ever tea experience', 'public/backEnd/img/product/1625389637Product all 2021final 24.06.21 - Copy.png', '10gm, 50gm, 100gm, 200gm, 400gm', NULL, '2021-07-04 09:07:17', '2021-07-04 09:07:17'),
(34, 15, 'SUN Premium Tea Bag', 'public/backEnd/img/product/1625389755Sun premium Tea bag.png', 'SUN Premium Tea bag is handpicked premium black tea packed in food grade double chamber bags. The tea is produced from the best leaves of our own gardens. The Master Blenders and state-of-the art machineries ensure delicious blend for a superior taste of best-brewed SUN Premium Tea bag which releases color and liquor fast. Its amazing flavor complements any exciting gathering with friends or family.', 'SUN Premium Tea bag is all the way natural from plucking to food grade packaging to ensure the best ever tea experience.', 'public/backEnd/img/product/1625389755Product all 2021final 24.06.21 - Copy.png', '100 gm', NULL, '2021-07-04 09:09:15', '2021-07-04 09:09:15'),
(35, 15, 'SUN Leaf Tea', 'public/backEnd/img/product/1625389879Sun tea leaf.png', 'SUN Leaf Tea is handpicked premium black tea that comes from the best leaves of our own gardens. The Master Blenders and state-of-the art machineries ensure delicious blend for a superior taste of best-brewed SUN Leaf Tea. Its amazing flavor complements any exciting gathering with friends or family.', 'SUN Leaf Tea is all the way natural from plucking to packaging to ensure the best ever tea experience', 'public/backEnd/img/product/1625389879Product all 2021final 24.06.21 - Copy.png', '10gm, 50gm, 100gm, 200gm, 400gm', NULL, '2021-07-04 09:11:19', '2021-07-04 09:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `product_youtube_links`
--

CREATE TABLE `product_youtube_links` (
  `id` int(10) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `youtube_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_youtube_links`
--

INSERT INTO `product_youtube_links` (`id`, `p_id`, `youtube_link`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://www.youtube.com/embed/wwJgfHR1pWM', '2018-07-19 12:58:40', '2021-01-06 15:32:49'),
(2, 4, 'https://www.youtube.com/embed/q_FuJQI17uA?rel=0', '2018-07-21 07:04:36', '2018-07-21 07:04:36'),
(3, 5, 'https://www.youtube.com/embed/w6I4MruaFmQ?rel=0', '2018-07-21 07:22:00', '2018-07-21 07:22:00'),
(4, 5, 'https://www.youtube.com/embed/DyOX8ZFhxu4?rel=0', '2018-07-21 07:22:00', '2018-07-21 07:22:00'),
(5, 5, 'https://www.youtube.com/embed/w7hTGBs4978?rel=0', '2018-07-21 07:22:00', '2018-07-21 07:22:00'),
(6, 8, 'https://www.youtube.com/embed/lPCW_TVdseU?rel=0', '2018-07-21 07:26:15', '2018-07-21 07:26:15'),
(7, 6, 'https://www.youtube.com/embed/w6I4MruaFmQ?rel=0', '2018-07-21 07:28:33', '2018-07-21 07:28:33'),
(8, 6, 'https://www.youtube.com/embed/DyOX8ZFhxu4?rel=0', '2018-07-21 07:28:33', '2018-07-21 07:28:33'),
(9, 6, 'https://www.youtube.com/embed/w7hTGBs4978?rel=0', '2018-07-21 07:28:33', '2018-07-21 07:28:33'),
(10, 7, 'https://www.youtube.com/embed/w6I4MruaFmQ?rel=0', '2018-07-21 07:28:36', '2018-07-21 07:28:36'),
(11, 7, 'https://www.youtube.com/embed/DyOX8ZFhxu4?rel=0', '2018-07-21 07:28:36', '2018-07-21 07:28:36'),
(12, 7, 'https://www.youtube.com/embed/w7hTGBs4978?rel=0', '2018-07-21 07:28:36', '2018-07-21 07:28:36'),
(13, 9, 'https://www.youtube.com/embed/oA2iLMgfWNo?rel=0', '2018-07-21 07:32:20', '2018-07-21 07:32:20'),
(14, 9, 'https://www.youtube.com/embed/91J3rHlpRXg?rel=0', '2018-07-21 07:32:20', '2018-07-21 07:32:20'),
(15, 9, 'https://www.youtube.com/embed/goXzOITBxg4?rel=0', '2018-07-21 07:32:20', '2018-07-21 07:32:20'),
(16, 9, 'https://www.youtube.com/embed/4zGGmAReaog?rel=0', '2018-07-21 07:32:21', '2018-07-21 07:32:21'),
(17, 10, 'https://www.youtube.com/embed/3EG50XLZEj0?rel=0', '2018-07-21 07:35:27', '2018-07-21 07:35:27'),
(18, 15, 'https://www.youtube.com/embed/BH8tIEGr6f4?rel=0', '2018-07-21 07:58:31', '2018-07-21 07:58:31'),
(19, 15, 'https://www.youtube.com/embed/tljmYnbhIZ4?rel=0', '2018-07-21 07:58:31', '2018-07-21 07:58:31'),
(20, 14, 'https://www.youtube.com/embed/3ay3ZGsbe9k', '2018-10-30 10:18:08', '2021-06-03 12:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `sister_cons`
--

CREATE TABLE `sister_cons` (
  `id` int(10) UNSIGNED NOT NULL,
  `sister_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `started_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sister_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sister_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sister_functionality` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sister_cons`
--

INSERT INTO `sister_cons` (`id`, `sister_name`, `started_type`, `sister_year`, `sister_image`, `sister_functionality`, `created_at`, `updated_at`) VALUES
(1, 'City Oil Mil', 'Started Operations', '1972', 'public/backEnd/img/sister_concern/1531994638CityOilMillsLtd.jpg', 'This unit produces premium quality mustard oil from hi-grade mustard seed using GHANI, a traditional cold press system. Processing with GHANI ensures natural pungency and aroma of the Mustard Oil.', '2018-07-19 10:03:58', '2018-07-19 10:03:58'),
(2, 'City Vegetable Oil Mills Ltd.', 'Started Operations', '1990', 'public/backEnd/img/sister_concern/1531994723CityVegetableOilMillsLtd.JPG', 'City Vegetable Oil Mills Ltd. refines quality soyabean oil from imported CDSO and Super Refined Palm Olein from imported CPO to meet increasing demand of the local market.', '2018-07-19 10:05:23', '2018-07-19 10:05:23'),
(3, 'City Fibers Ltd.', 'Started Operations', '1992', 'public/backEnd/img/sister_concern/1532334080City-Fibers-Ltd.jpg', 'City Fibers Ltd. supplies all sorts of PP woven bags and Plastic linings to meet in-house demands', '2018-07-23 08:21:20', '2018-07-23 08:21:20'),
(4, 'Hasan Plastic Industries Ltd.', 'Started Operations', '1998', 'public/backEnd/img/sister_concern/1532334135HasanPlasticContainers.JPG', 'Hasan Plastic Industries ltd produces PET container to meet the in-house demand.', '2018-07-23 08:22:15', '2018-07-23 08:22:15'),
(5, 'Hasan Flour Mills Ltd.', 'Started Operations', '1995', 'public/backEnd/img/sister_concern/1532334179hasan_flour_mills.JPG', 'Hasan Flour Mills Ltd. is the largest of its kind producing the finest and most popular brand of Atta, Flour and Semolina- TEER. Finest quality wheat are processed with world renowned automatic Buhler Machine of Switzerland ensuring 100% purity.', '2018-07-23 08:22:59', '2018-07-23 08:22:59'),
(6, 'Hasan Printing and Packaging', 'Started Operations', '1999', 'public/backEnd/img/sister_concern/1532334217hasan_printing_and_packaging.JPG', 'Hasan Printing and Packaging meets the Group’s own requirement and also supports printing of labels, stickers and other promotional materials', '2018-07-23 08:23:37', '2018-07-23 08:23:37'),
(7, 'Hasan Containers Ltd.', 'Started Operations', '1999', 'public/backEnd/img/sister_concern/1532334328HasanContainersLtd.jpg', 'Hasan Containers Ltd supports the Group with quality plain & printed tin containers made from plain tin sheets for marketing its own products i.e. refined oils, Vanaspati etc.', '2018-07-23 08:25:28', '2018-07-23 08:25:28'),
(8, 'City Navigation Ltd.', 'Started Operations', '2000', 'public/backEnd/img/sister_concern/1532334382CityNavigationsLtd.JPG', 'City Navigation Ltd. has 37 maritime vessels which are engaged in carrying raw materials from Chittagong port and other places. Also there are 2 mother ship which transport the food grains from other countries to Bangladesh.', '2018-07-23 08:26:22', '2018-07-23 08:26:22'),
(9, 'City PET Industries Ltd.', 'Started Operations', '2001', 'public/backEnd/img/sister_concern/1532334418CityPETIndustries.JPG', 'City PET Industries Ltd., the FDA approved factory lifts water from a depth of 600 feet and purifies it using German Ozone technology and Reverse Osmosis system to process around 1,00,000 litres of truly hygienic pure drinking water per day.', '2018-07-23 08:26:58', '2018-07-23 08:26:58'),
(10, 'Shampa Oil Mills Ltd.', 'Started Operations', '2001', 'public/backEnd/img/sister_concern/1532334477ShampaOilMillsLtd.JPG', 'Shampa Oil Mills Limited, was set up as an expansion of the most popular “Teer Mustard Oil” in the country. The hand-picked and graded mustard seeds are crushed, refined and packed in automatic plant to maintain its unparalleled popularity.', '2018-07-23 08:27:57', '2018-07-23 08:27:57'),
(11, 'Farzana Oil Refineries Ltd.', 'Started Operations', '2002', 'public/backEnd/img/sister_concern/1532334542FarzanaOilRefineries.jpg', 'Farzana Oil Refineries Limited, has got Vanaspati and Canola Oil in their product range. The raw materials are directly imported from world’s finest sources and refined with latest technology to ensure that the product reaches the consumers in perfect conditions.', '2018-07-23 08:29:02', '2018-07-23 08:29:02'),
(12, 'VOTT Oil Refineries Ltd.', 'Acquired', '2004', 'public/backEnd/img/sister_concern/1624873016vot.jpg', 'VOTT Oil Refineries Ltd. terminal has more than 50 tanks, including bonded ones, with a total storage capacity of about 1.5 Lac Tons of Crude Oil, Bitumen, Lubricants etc. The Oil Refinery unit has a refining capacity of about 1100 M.Tons of Crude Oil per day.', '2018-07-23 08:30:13', '2021-06-28 09:36:56'),
(13, 'City feed Products Ltd.', 'Started Operations', '2004', 'public/backEnd/img/sister_concern/1532334670CityFeedProductsLtd.jpg', 'Ensures a constant quality of full range poultry, fish and cattle feeds. The carefully selected raw materials are processed in modern Buhler machines in controlled environment.', '2018-07-23 08:31:10', '2018-07-23 08:31:10'),
(14, 'Deepa Food Products Ltd.', 'Started Operations', '2005', 'public/backEnd/img/sister_concern/1532334712DeepaFoodProducts.JPG', 'Deepa Food Products Ltd., has got Vanaspati and Canola Oil in their product range. The raw materials are directly imported from world’s finest sources and refined with latest technology to ensure quality products.', '2018-07-23 08:31:52', '2018-07-23 08:31:52'),
(15, 'City Seed Crushing Industries Ltd.', 'Started Operations', '2005', 'public/backEnd/img/sister_concern/1532334752CitySeedCrushingIndustries.JPG', 'City Seed Crushing Industries Ltd produces Soya meals and Rapeseed cakes everyday. The raw materials of Latin America and Europe are processed with technologically superior DESMET BALLESTRA machines to ensure a rich protein source for poultry and fish.', '2018-07-23 08:32:32', '2018-07-23 08:32:32'),
(16, 'City Sugar Industries', 'Started Operations', '2006', 'public/backEnd/img/sister_concern/1532334795city_sugar_industries.JPG', 'Functionality: This is the largest sugar refinery of the country that which uses European SUTECH technology. The imported raw sugar is refined and packed in utmost care for the consumers. This unit produces different types and grades of sugar for different purposes.', '2018-07-23 08:33:15', '2018-07-23 08:33:15'),
(17, 'C.S.I Power & Energy Ltd.', 'Started Operations', '2006', 'public/backEnd/img/sister_concern/1532334845CSIPowerandEnergy.JPG', 'C.S.I Power & Energy Ltd capable of supplying 37 M.W of electricity per day for running different industrial units of the group.', '2018-07-23 08:34:05', '2018-07-23 08:34:05'),
(18, 'Rahman Synthetics Ltd.', 'Started Operations', '2007', 'public/backEnd/img/sister_concern/1532334917RahmanSylthetics.JPG', 'Rahman Synthetics Ltd supplies all sorts of PP woven bags and Plastic linings to meet in-house demands.', '2018-07-23 08:35:17', '2018-07-23 08:35:17'),
(19, 'Shampa Flour Mills Ltd.', 'Started Operations', '2007', 'public/backEnd/img/sister_concern/1532334975shampa_flour_mills_ltd.jpg', 'With world renowned Buhler machines of Switzerland, this state-of–the art technology is a valuable addition in City Group’s arsenal in catering to the ever-increasing quality food products of choice.', '2018-07-23 08:36:15', '2018-07-23 08:36:15'),
(20, 'City Tea Estate Ltd.', 'Started Operations', '1990', 'public/backEnd/img/sister_concern/1532335026city_tea_estate_ltd.jpg', 'City Group has three tea gardens located in Srimongol and Chittagong. Handpicked tea leaf are processed in its own production unit inside the garden and packed for the consumers to ensure the best essence and taste of tea.', '2018-07-23 08:37:06', '2018-07-23 08:37:06'),
(21, 'Khan Brothers Ship Buildings Ltd.', 'Started Operations', '2015', 'public/backEnd/img/sister_concern/1532335086KhanBrothersShipBuildings.jpg', 'This unit is located in Munshigonj and covers a total area of 100 acres wholly used for making sea going vessels. These vessels are used for raw material and finished goods transportation.', '2018-07-23 08:38:06', '2018-07-23 08:38:06'),
(22, 'City Auto Rice and Dal Mills Ltd.', 'Started Operations', '2018', 'public/backEnd/img/sister_concern/1532335153city_auto_rice_and_dal_mills_ltd.jpg', 'This is the only fully automated rice and dal mill in Bangladesh. World renowned Buhler machineries are used in this unit to process rice and dal. It houses one and only hi-tech laboratory of Bangladesh to ensure top quality grains for consumers.', '2018-07-23 08:39:13', '2018-07-23 08:39:13'),
(23, 'City Economic Zone Ltd.', 'Started Operations', '2018', 'public/backEnd/img/sister_concern/1624872403rup.jpg', 'This economic zone is situated in Rupganj, Narayanganj covering a total area of 78 acres. This area is suitable for any large scale foreign investment and it is well equipped with all utility facilities.', '2018-07-23 08:40:03', '2021-06-28 09:26:43'),
(25, 'City Edible Oil Ltd.', 'Started Operations', '2019', 'public/backEnd/img/sister_concern/1617700331City Edible Oil-1.png', 'City Edible Oil Ltd. has got Soyabean oil and Super palm olein in their product range. The raw materials; CDSO and CPO are directly imported from world’s best sources and refined with latest technology to ensure quality products that reaches the consumers in perfect condition.', '2021-04-06 09:12:11', '2021-04-06 09:12:11'),
(26, 'Rupshi Flour Mills Ltd.', 'Started Operations', '2021', 'public/backEnd/img/sister_concern/1617700379Rupshi Flour Mills-1.png', 'Rupshi Flour Mills Ltd. is South Asia’s largest flour mill. With world renowned Swiss machineries, this state-of–the art technology, this fully automated mill is an invaluable addition in City Group’s arsenal in catering to the ever-increasing quality food products made from wheat.', '2021-04-06 09:12:59', '2021-04-06 09:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `sliderText1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sliderText2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sliderImage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `sliderText1`, `sliderText2`, `sliderImage`, `created_at`, `updated_at`) VALUES
(4, 'Beloved & Iconic', 'Brands', 'public/backEnd/img/slider/1556430603slider2.jpg', '2018-07-19 08:32:41', '2018-07-19 08:32:41'),
(5, 'State of the art', 'Technology', 'public/backEnd/img/slider/1531989161slider3.jpg', '2018-07-19 08:33:00', '2018-07-19 08:33:00'),
(7, '21st century', 'conglomerate', 'public/backEnd/img/slider/1531989180slider4.jpg', '2019-06-16 05:08:12', '2019-06-16 05:08:12'),
(8, 'A Quest for', 'Excellence', 'public/backEnd/img/slider/1531989110slider1.jpg', '2020-10-19 08:12:38', '2020-10-19 08:12:38'),
(9, NULL, NULL, 'public/backEnd/img/slider/1603095158FB_C_1600 x700 (1).jpg', '2020-10-19 08:12:38', '2020-10-19 08:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `social_responses`
--

CREATE TABLE `social_responses` (
  `id` int(10) UNSIGNED NOT NULL,
  `csr_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_responses`
--

INSERT INTO `social_responses` (`id`, `csr_desc`, `created_at`, `updated_at`) VALUES
(4, '<p>COMPANY, CUSTOMERS and SOCIETY are the three prime concerns of City Group&rsquo;s activities.&nbsp;<br /><br />In order to care for the consumers, City Group is always engaged in a variety of corporate activities in the country. Serving the country for more than four decades and being proactive in social arena to improve the quality of life around us.<br /><br />It\'s about corporate responsibilities through positive contributions to environmental quality and to the communities in which we live and operate our businesses. We believe in the society around us and in the power of all.&nbsp;<br /><br />Few examples of City Group&rsquo;s charity work include providing financial support for needy students to continue his/her education in Dhaka University and medical support to those who needed it most.<br /><br />If you believe City Group can help you as a corporate entity please do let us know. We will certainly incorporate any social suggestion you have for us or how we may be able to take part in the social development. Please write to us at:&nbsp;<a href=\"mailto:info@citygroupbd.com\">info@citygroupbd.com</a>&nbsp;or&nbsp;<a href=\"mailto:corporate@citygroupbd.com\">corporate@citygroupbd.com</a></p>', '2021-08-11 07:36:14', '2021-08-11 07:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `sustain_abilities`
--

CREATE TABLE `sustain_abilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sustain_abilities`
--

INSERT INTO `sustain_abilities` (`id`, `description`, `created_at`, `updated_at`) VALUES
(12, '<p><span style=\"font-weight: 400;\">We are committed to providing quality products in a manner that ensures a safe and healthy workplace for our employees and minimizes the potential impact on the environment. We are operating in compliance with all relevant environmental legislation and we strive to use pollution prevention and environmental best practices in all we do. Our Policy therefore, is to:&nbsp;</span></p>\r\n<ul>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">integrate the consideration of environmental concerns and impacts into our decision making and activities</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">minimize the waste and then reuse or recycle as much of it as is possible.&nbsp;</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">minimize energy and water use within our buildings and processes in order to conserve supplies and minimize the consumption of natural resources.&nbsp;</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">As far as is possible, purchase products and services that do the least damage to the environment.&nbsp;</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">train, educate and inform our employees about environmental issues that may affect their work,&nbsp;</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">promote environmental awareness among our employees and encourage them to work in an environmentally responsible manner,&nbsp;</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">communicate our environmental commitment to stake holders and encourage them to support it&nbsp;</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><span style=\"font-weight: 400;\">where required by legislation or where significant health, safety or environmental hazards exist, develop and maintain appropriate emergency and spill response programs</span></li>\r\n</ul>', '2021-08-12 11:44:14', '2021-08-12 12:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `sustain_ability_pdfs`
--

CREATE TABLE `sustain_ability_pdfs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sustain_ability_pdfs`
--

INSERT INTO `sustain_ability_pdfs` (`id`, `name`, `pdf`, `created_at`, `updated_at`) VALUES
(14, 'Environmental and Social Impact Assessment (ESIA) on City Edible Oil Captive Power Plant Ltd', 'public/backEnd/files/1628681960ESIA- City Edible Oil Captive power plant.pdf', '2021-08-11 11:39:20', '2021-08-12 13:17:00'),
(24, 'Environmental and Social Impact Assessment (ESIA) on City Seed Crushing Uni-2 Captive Power Plant', 'public/backEnd/files/1628762602ESIA- City Seed Crushing Captive Power Plant.pdf', '2021-08-12 10:03:22', '2021-08-12 13:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'City Group', 'weav@admin.com', '$2y$12$VIbOpocUIMMj9d8zV.SnSOGc3f13VxrzYl.8SbrWKh0GrMMRXAjEa', 'bPneNxZ5pRtWgxPTIrWjGddBR8xuRmsMMCS7gtznSdBB14F7cS7mf0b6PhbS', '2018-07-19 08:29:29', '2018-07-22 17:31:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `achieves`
--
ALTER TABLE `achieves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_categories`
--
ALTER TABLE `brand_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chairmen`
--
ALTER TABLE `chairmen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commercials`
--
ALTER TABLE `commercials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_v_careers`
--
ALTER TABLE `c_v_careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_teams`
--
ALTER TABLE `manage_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_events`
--
ALTER TABLE `news_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_event_images`
--
ALTER TABLE `news_event_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `press_releases`
--
ALTER TABLE `press_releases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_youtube_links`
--
ALTER TABLE `product_youtube_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sister_cons`
--
ALTER TABLE `sister_cons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_responses`
--
ALTER TABLE `social_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sustain_abilities`
--
ALTER TABLE `sustain_abilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sustain_ability_pdfs`
--
ALTER TABLE `sustain_ability_pdfs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `achieves`
--
ALTER TABLE `achieves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brand_categories`
--
ALTER TABLE `brand_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chairmen`
--
ALTER TABLE `chairmen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `commercials`
--
ALTER TABLE `commercials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `c_v_careers`
--
ALTER TABLE `c_v_careers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `manage_teams`
--
ALTER TABLE `manage_teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `news_events`
--
ALTER TABLE `news_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `news_event_images`
--
ALTER TABLE `news_event_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `press_releases`
--
ALTER TABLE `press_releases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product_youtube_links`
--
ALTER TABLE `product_youtube_links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sister_cons`
--
ALTER TABLE `sister_cons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `social_responses`
--
ALTER TABLE `social_responses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sustain_abilities`
--
ALTER TABLE `sustain_abilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sustain_ability_pdfs`
--
ALTER TABLE `sustain_ability_pdfs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
