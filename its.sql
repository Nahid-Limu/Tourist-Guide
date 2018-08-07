-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2018 at 09:29 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `its`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placelocation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placedesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `placelocation`, `placedesc`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Dia Bari', 'Dia Bari - Bot tola, Dhaka, Bangladesh', 'To environmental site of uttara is better than other place of dhaka city. the place is eligible for living, studying and adda.\r\nExcellence in creative solution for every moments.\r\n\r\nBot Tola, Uttara, Dhakar moddhe ekti monorom poribeshe somoy katanor Upojukto jaiga eta.', 'diabari.jpg', '2018-06-05 02:41:20', '2018-06-05 02:41:20'),
(2, 'MeghBari Resort', 'MeghBari Resort, Rayerdia - Ulukhola Road, Nagarvala, Bangladesh', 'Meghbari will bring you closer to nature. It is a calm and fun place to be for a nice family vacation. \r\n\r\nEntry- 100 TK\r\nSwimming-300 TK\r\nNight stay 1 time swimming free for two person\r\nSwimming last time 9pm for room night stay\r\nNormal visit time 9am to 6pm.\r\nBreakfast last time for room guest 8.30am to 10am.\r\nDinner last time 10pm', 'resort.jpg', '2018-06-05 02:48:28', '2018-06-05 02:48:28'),
(3, 'হাতিরঝিল', 'Hatirjheel Bridge, Hatir Jheel Link Road, Dhaka, Bangladesh', 'Walk along Hatirjheel, sit by the peaceful lakefront, and enjoy the views of sky, city, and bridges. The Bangladeshi Army constructed the area to ease traffic and minimize congestion, with locals using the spot to get away from the crowded city and enjoy some recreational activities. Cycle around the waterfront, enjoy the views, and grab some fresh air. If visiting at night, make sure you go as part of group, as the lakefront has a somewhat unsafe reputation after dark.', 'Hatirjheel_view.PNG', '2018-07-28 06:47:24', '2018-07-28 06:47:24'),
(4, 'Jamuna Resorts', 'Jamuna Resort, Jamuna Bridge Approach Road, Elenga, Bangladesh', 'you can feel the rich and exotic atmosphere of the tropics and the might of the legendary river Jamuna. When you enter the place you will naturally feel the new concept of warmth hospitality, luxury and comfort. Nestled by the Mythological Jamuna River', 'Jamuna-Resort1.jpg', '2018-07-28 06:59:41', '2018-07-28 06:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(20) NOT NULL,
  `place_id` int(20) NOT NULL,
  `hotel_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_price` int(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `user_id`, `place_id`, `hotel_name`, `hotel_type`, `hotel_price`, `created_at`, `updated_at`) VALUES
(4, 4, 1, 'Hotel Al-Prince And Bar', 'High', 1500, '2018-07-26 13:28:46', '2018-07-26 13:28:46'),
(5, 4, 1, 'Momtaz Hotel', 'Medium', 800, '2018-07-26 13:28:46', '2018-07-26 13:28:46'),
(6, 4, 2, 'Hotel Seagull', 'High', 4000, '2018-07-26 13:46:40', '2018-07-26 13:46:40'),
(7, 4, 2, 'Hotel Sea Palace', 'Medium', 2000, '2018-07-26 13:46:40', '2018-07-26 13:46:40'),
(8, 4, 2, 'Hotel Sayeman', 'Low', 1500, '2018-07-26 13:46:40', '2018-07-26 13:46:40'),
(9, 4, 3, 'পর্যটন-মোটেল-দিনাজপুর', 'High', 2000, '2018-07-26 14:20:52', '2018-07-26 14:20:52'),
(10, 4, 3, 'হোটেল ডায়মন্ড', 'Medium', 1000, '2018-07-26 14:20:52', '2018-07-26 14:20:52'),
(11, 12, 4, 'Nilachol Nilambori Resort', 'High', 2500, '2018-07-26 16:35:45', '2018-07-26 16:35:45'),
(12, 12, 4, 'Meghalaya Hill Resort', 'Low', 1500, '2018-07-26 16:35:45', '2018-07-26 16:35:45'),
(13, 12, 5, 'Hotel Suite Sadaf', 'Medium', 2700, '2018-07-26 16:56:56', '2018-07-26 16:56:56'),
(14, 12, 5, 'Exotica Sampan', 'High', 4000, '2018-07-26 16:56:56', '2018-07-26 16:56:56'),
(15, 4, 6, 'Hotel Favour Inn International', 'High', 2400, '2018-07-26 17:21:28', '2018-07-26 17:21:28'),
(16, 4, 6, 'Hotel Shanghai International', 'Medium', 1400, '2018-07-26 17:21:28', '2018-07-26 17:21:28'),
(17, 4, 6, 'Hotel Green Castle', 'Low', 600, '2018-07-26 17:21:28', '2018-07-26 17:21:28'),
(18, 12, 7, 'Barsa Resorts Sundarban', 'Medium', 1500, '2018-07-26 17:32:39', '2018-07-26 17:32:39'),
(19, 12, 7, 'Hotel Castle Salam', 'High', 5000, '2018-07-26 17:32:39', '2018-07-26 17:32:39'),
(20, 28, 8, 'Center Rest House', 'High', 1000, '2018-07-27 05:13:10', '2018-07-27 05:13:10'),
(21, 28, 8, 'Hotel Mowchak', 'Medium', 500, '2018-07-27 05:13:10', '2018-07-27 05:13:10'),
(22, 28, 9, 'Grand Palace Hotel & Resorts', 'High', 11000, '2018-07-27 05:23:04', '2018-07-27 05:23:04'),
(23, 28, 9, 'GM Suites', 'Low', 1000, '2018-07-27 05:23:04', '2018-07-27 05:23:04'),
(24, 28, 10, 'Hiltown Hotel', 'Medium', 800, '2018-07-27 05:29:49', '2018-07-27 05:29:49'),
(25, 32, 11, 'new hotel', 'Medium', 300, '2018-07-29 09:47:07', '2018-07-29 09:47:07'),
(26, 32, 11, 'hotel green', 'High', 500, '2018-07-29 09:47:07', '2018-07-29 09:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `like_dislikes`
--

CREATE TABLE `like_dislikes` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `like_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `like_dislikes`
--

INSERT INTO `like_dislikes` (`id`, `created_at`, `updated_at`, `user_id`, `place_id`, `like_status`) VALUES
(16, '2018-07-27 15:50:18', '2018-07-27 15:50:23', 28, 1, 1),
(17, '2018-07-27 15:50:21', '2018-07-27 15:50:24', 28, 2, 0),
(18, '2018-07-27 16:26:04', '2018-07-29 07:50:32', 4, 1, 1),
(19, '2018-07-27 16:26:08', '2018-07-29 07:51:14', 4, 2, 1),
(20, '2018-07-29 00:43:43', '2018-07-29 00:43:46', 4, 3, 0),
(21, '2018-07-29 07:51:09', '2018-07-29 07:51:11', 4, 4, 0),
(22, '2018-07-29 09:42:56', '2018-07-29 09:42:56', 32, 1, 1),
(23, '2018-07-29 09:42:59', '2018-07-29 09:42:59', 32, 3, 0),
(24, '2018-07-29 09:43:01', '2018-07-29 09:43:01', 32, 2, 1);

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
(1, '2018_04_15_211228_create_posts_table', 1),
(2, '2018_04_16_113310_create_contacts_table', 2),
(3, '2018_06_02_175552_create_places_table', 3),
(4, '2018_06_04_084402_create_logins_table', 4),
(5, '2018_06_05_082011_create_blogs_table', 5),
(6, '2018_06_28_222636_create_userdetails_table', 6),
(7, '2018_07_21_125133_create_reviews_table', 7),
(8, '2018_07_21_130945_create_reviews_table', 8),
(9, '2018_07_25_160401_create_hotels_table', 9),
(10, '2018_07_27_131150_create_user_suggestions_table', 10),
(11, '2018_07_27_172907_create_like_dislikes_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(20) NOT NULL,
  `cityname` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placename` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overview` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `train` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `air` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placeimage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `user_id`, `cityname`, `placename`, `overview`, `bus`, `train`, `air`, `ship`, `placeimage`, `tag`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Khulna', 'Shatgombuj Mosque Pond, Bagerhat - Khulna Road, Bangladesh', 'ষাট গম্বুজ মসজিদ বাংলাদেশের বাগেরহাট জেলার দক্ষিণ-পশ্চিমে অবস্থিত একটি প্রাচীন মসজিদ। মসজিদটির গায়ে কোনো শিলালিপি নেই। তাই এটি কে নির্মাণ করেছিলেন বা কোন সময়ে নির্মাণ করা হয়েছিল সে সম্বন্ধে সঠিক কোনো তথ্য পাওয়া যায় না।', '500', 'null', 'null', 'null', '1200px-Sixty_Dome_Mosque,Bagerhat.jpg', 'historical', 1, '2018-07-26 13:28:46', '2018-07-26 17:00:59'),
(2, 4, 'Chattagram', 'Cox''s Bazar, Bangladesh', 'কক্সবাজার বাংলাদেশের দক্ষিণ-পূর্বাঞ্চলে অবস্হিত একটি পর্যটন শহর। এটি চট্টগ্রাম বিভাগের কক্সবাজার জেলার অন্তর্গত। কক্সবাজার তার নৈসর্গিক সৌন্দর্য্যের জন্য বিখ্যাত।', '900', '500', '6000', 'null', 'Cox''s_Baza.jpg', 'beach', 1, '2018-07-26 13:46:40', '2018-07-29 09:48:04'),
(3, 4, 'Rangpur', 'Kantajeu Temple, Bangladesh', 'কান্তজীউ মন্দির বা কান্তজির মন্দির বা কান্তনগর মন্দির বাংলাদেশের দিনাজপুরে অবস্থিত একটি প্রাচীন মন্দির। এটি নবরত্ন মন্দির নামেও পরিচিত কারণ তিনতলাবিশিষ্ট এই মন্দিরের নয়টি চূড়া বা রত্ন ছিলো।', '800', '430', 'null', 'null', 'kantaji-temple-full-view-800.jpg', 'temple', 0, '2018-07-26 14:20:52', '2018-07-26 14:20:52'),
(4, 12, 'Chattagram', 'Bandarban, Bangladesh', 'বান্দরবান জেলা বাংলাদেশের দক্ষিণ-পূর্বাঞ্চলে অবস্থিত চট্টগ্রাম বিভাগের একটি প্রশাসনিক অঞ্চল। এটি একটি পার্বত্য জেলা।', '700', '500', '4000', 'null', 'bandorban.jpg', 'hill', 1, '2018-07-26 16:35:45', '2018-07-26 16:35:45'),
(5, 12, 'Chattagram', 'Himchori Waterfall, Marine Dr Himchori, Cox''s Bazar, Bangladesh', 'কক্সবাজার সমুদ্র সৈকত থেকে মাত্র ১২ কিলোমিটার দক্ষিনে অবস্থিত হিমছড়ি ইকোপার্ক পর্যটন কেন্দ্র। টিকেট কেটে এখানে ঢুকতে হয়। ভীতরের পরিবেশটা বেশ সুন্দর। এখানে একটি ছোট ঝর্না রয়েছে যা হিমছড়ি ঝর্ণা নামে পরিচিত। ঝর্নাটি ছোট কিন্তু বর্ষামৌসুমে এটি দারুন রূপ ধারন করে।', '900', 'null', '7000', 'null', 'himchori.jpg', 'waterfall', 1, '2018-07-26 16:56:56', '2018-07-26 16:56:56'),
(6, 4, 'Chattagram', 'Rangamati, Bangladesh', 'রাঙ্গামাটি জেলা বাংলাদেশের দক্ষিণ-পূর্বাঞ্চলে অবস্থিত চট্টগ্রাম বিভাগের একটি প্রশাসনিক অঞ্চল। এটি একটি পার্বত্য জেলা।', '550', '500', '7000', 'null', 'Rangamati.jpg', 'hill', 0, '2018-07-26 17:21:28', '2018-07-26 17:21:28'),
(7, 12, 'Khulna', 'sundarban satkhira bangladesh', 'সুন্দরবন হলো বঙ্গোপসাগর উপকূলবর্তী অঞ্চলে অবস্থিত একটি প্রশস্ত বনভূমি যা বিশ্বের প্রাকৃতিক বিস্ময়াবলীর অন্যতম।', '950', '400', '4000', 'null', 'sundarban.jpg', 'natural', 1, '2018-07-26 17:32:39', '2018-07-26 17:32:39'),
(8, 28, 'Rangpur', 'পঞ্চগড় পাথর যাদুঘর, Panchagarh, Bangladesh', 'পাথর যাদুঘর পঞ্চগড় সরকারি মহিলা কলেজ চত্ত্বরে ১৯৯৭ খ্রিস্টাব্দে উক্ত কলেজের তৎকালীন অধ্যক্ষ নাজমুল হকের প্রচেষ্টায় পাথর জাদুঘর প্রতিষ্ঠিত হয়। উক্ত জাদুঘরে পঞ্চগড় জেলার প্রত্নতাত্ত্বিক ও লোকজ সংগ্রহ রয়েছে প্রায় ১,০০০ (এক হাজার) সংখ্যক এরও বেশী।', '650', '500', 'null', 'null', 'rocks-museum-panchagar.jpg', 'museum', 0, '2018-07-27 05:13:10', '2018-07-27 05:13:10'),
(9, 28, 'Rangpur', 'Tajhat Rajbari, Tajhat Road, Rangpur, Bangladesh', 'তাজহাট রাজবাড়ি বা তাজহাট জমিদারবাড়ি বাংলাদেশের রংপুর শহরের অদূরে তাজহাটে অবস্থিত একটি ঐতিহাসিক প্রাসাদ যা এখন একটি জাদুঘর হিসেবে ব্যবহৃত হচ্ছে। রংপুরের পর্যটকদের কাছে এটি একটি আকর্ষণীয় স্থান।', '450', 'null', 'null', 'null', 'tajhat.JPG', 'historical', 0, '2018-07-27 05:23:04', '2018-07-27 05:23:04'),
(10, 28, 'Sylhet', 'Bisnakandi, Bangladesh', 'বিছানাকান্দি বাংলাদেশের সিলেট জেলার গোয়াইনঘাট উপজেলায় অবস্থিত রুস্তমপুর ইউনিয়নের একটি গ্রামের মধ্যে অবস্থিত। সাম্প্রতিক বছরগুলোতে এখানকার নদী দেখতে পর্যটকদের উপচে পড়া ভিড় লক্ষ্য করা যাচ্ছে।', '800', 'null', 'null', 'null', 'bisnakandi.jpg', 'hill', 0, '2018-07-27 05:29:49', '2018-07-27 05:29:49'),
(11, 32, 'Dhaka', 'Ahasan Manzil, Kalkot, Bangladesh', 'some info', '50', 'null', 'null', 'null', 'ahsan.jpg', 'historical', 0, '2018-07-29 09:47:07', '2018-07-29 09:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(20) NOT NULL,
  `place_id` int(20) NOT NULL,
  `rate` int(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `place_id`, `rate`, `created_at`, `updated_at`) VALUES
(1, 4, 67, 4, '2018-07-21 09:20:13', '2018-07-21 09:20:13'),
(2, 4, 66, 5, '2018-07-21 09:21:47', '2018-07-21 09:21:47'),
(3, 4, 5, 3, '2018-07-21 09:24:04', '2018-07-21 09:24:04'),
(4, 12, 67, 4, '2018-07-21 12:47:28', '2018-07-21 12:47:28'),
(5, 28, 67, 3, '2018-07-22 01:18:08', '2018-07-22 01:18:08'),
(6, 4, 1, 4, '2018-07-24 03:08:14', '2018-07-24 03:08:14'),
(7, 4, 7, 5, '2018-07-24 03:30:23', '2018-07-24 03:30:23'),
(8, 4, 9, 4, '2018-07-25 09:59:10', '2018-07-25 09:59:10'),
(9, 4, 10, 3, '2018-07-25 10:13:58', '2018-07-25 10:13:58'),
(10, 4, 11, 2, '2018-07-25 10:14:34', '2018-07-25 10:14:34'),
(11, 4, 73, 5, '2018-07-26 11:54:43', '2018-07-26 11:54:43'),
(12, 32, 1, 4, '2018-07-29 09:44:18', '2018-07-29 09:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `beach` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hill` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `museum` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temple` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `historical_place` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `water_fall` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `natural_place` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `user_id`, `beach`, `hill`, `museum`, `temple`, `historical_place`, `water_fall`, `natural_place`, `created_at`, `updated_at`) VALUES
(1, 4, 'beach', 'hill', 'null', 'null', 'historical', 'null', 'natural', '2018-06-28 17:02:35', '2018-07-28 17:06:02'),
(13, 12, 'beach', 'hill', 'null', 'null', 'null', 'water', 'natural', '2018-07-21 12:42:12', '2018-07-21 12:42:12'),
(14, 28, 'null', 'null', 'null', 'null', 'historical', 'null', 'null', '2018-07-21 16:07:28', '2018-07-21 16:07:28'),
(15, 29, 'beach', 'hill', 'museum', 'null', 'historical', 'null', 'null', '2018-07-29 09:21:09', '2018-07-29 09:21:09'),
(16, 32, 'beach', 'null', 'null', 'temple', 'historical', 'null', 'natural', '2018-07-29 09:42:38', '2018-07-29 09:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `name`, `email`, `password`, `role`, `user_img`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'nahid limu', 'Nahid Limu', 'limu@gmail.com', '$2y$10$aPLG61BSmFgc5wHkSZVziegyZcfzixunLj7YzYeJhMaDwsUMMJld.', 'User', 'limu.jpg', 'q6vprkBlUdOKeS7wobTOXBv4vBe57OV0vgZAWpMJFDbbRCbVeyrwPRSzY4OP', '2018-06-04 02:57:16', '2018-07-21 17:11:23'),
(12, 'mehedi', 'mehedi', 'mehedi@gmail.com', '$2y$10$.s2kj1D9GHHe0uVNrBJJi.E4TQ6uzlLs8GeAVImsKKnACMex/VVyK', 'Admin', 'mahedi.jpg', '0TnzjBTNfWGzRE1rl5OhttZfSK1ciChKvMfXKMDBrEu9XnrGiPQfz85y4EHw', '2018-06-30 09:46:51', '2018-06-30 13:24:09'),
(27, 'rayhan himu', 'himu', 'himu@gmail.com', '$2y$10$P6Cn6Sh5QZi3xDFliibExO615Rmho7KhF63/zbGD2cEgAkEEFtuj6', 'User', 'null', NULL, '2018-07-17 16:58:21', '2018-07-17 16:59:33'),
(28, 'Naznin Sultana', 'Naznin', 'naznin@gmail.com', '$2y$10$CMPqPdlXRKM8kz6kx1aG3.LFXW50quGqWSC/6.3kG7VVLHIas6rXe', 'User', 'naznin maam.jpg', 'h1Z5Py6bHhbakbLGxhiovCabG28v5RjYVEaD8Cur4Chf4TiTjYBZDlsVqy7R', '2018-07-21 16:04:17', '2018-07-21 16:06:27'),
(32, 'Naimul Islamn', 'Naimcse256', 'naimcse56@gmail.com', '$2y$10$JE4fqlOZQLfU/IL3l3JUGemsrF4e4mq7DemAGu1z3RRP1A7c1sKj2', 'User', '11016695_1550274438574196_1326254417_n.jpg', 'TTHeQxznBrnaZlulM56LRcOfNAvmmj9HNN4HgF5oaM2RLrm9cflJPqlMFuQ1', '2018-07-29 09:42:03', '2018-07-29 09:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_suggestions`
--

CREATE TABLE `user_suggestions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(20) NOT NULL,
  `user_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_suggestions`
--

INSERT INTO `user_suggestions` (`id`, `user_id`, `user_name`, `message`, `status`, `created_at`, `updated_at`) VALUES
(2, 32, 'Naimul Islamn', 'to admin to improve the system', 0, '2018-07-29 09:45:33', '2018-07-29 09:45:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_dislikes`
--
ALTER TABLE `like_dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_suggestions`
--
ALTER TABLE `user_suggestions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `like_dislikes`
--
ALTER TABLE `like_dislikes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `user_suggestions`
--
ALTER TABLE `user_suggestions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
