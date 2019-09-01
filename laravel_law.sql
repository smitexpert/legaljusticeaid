-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2019 at 05:53 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_law`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'Category One', 'category-one', '2019-08-31 11:50:45', NULL, NULL),
(6, 'Category Two', 'category-two', '2019-08-31 11:52:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `reply_id` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_cover.jpg',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_categories`
--

CREATE TABLE `blog_post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cateogry_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_tags`
--

CREATE TABLE `blog_post_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courts`
--

CREATE TABLE `courts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courts`
--

INSERT INTO `courts` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Supreme Court', 'supreme-court', '2019-08-14 23:28:30', NULL, NULL),
(9, 'Central Administrative Tribunal (CAT) Delhi', 'central-administrative-tribunal-cat-delhi', '2019-08-16 05:44:28', NULL, NULL),
(10, 'Delhi High Court', 'delhi-high-court', '2019-08-16 05:44:35', NULL, NULL),
(11, 'District Court', 'district-court', '2019-08-16 05:44:45', '2019-08-18 02:23:22', NULL),
(12, 'Dwarka', 'dwarka', '2019-08-16 05:44:50', NULL, NULL),
(13, 'Faridabad', 'faridabad', '2019-08-16 05:45:05', NULL, NULL),
(14, 'Gautambuddha Nagar', 'gautambuddha-nagar', '2019-08-16 05:45:36', NULL, NULL),
(15, 'Gautambuddha Nagar, District Court', 'gautambuddha-nagar-district-court', '2019-08-16 05:45:46', NULL, NULL),
(16, 'High Court', 'high-court', '2019-08-17 02:56:14', '2019-08-18 02:08:39', NULL),
(17, 'Judge Court', 'judge-court', '2019-08-17 02:56:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lawyers`
--

CREATE TABLE `lawyers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` double(10,2) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyers`
--

INSERT INTO `lawyers` (`id`, `name`, `slug`, `email`, `phone`, `location`, `experience`, `description`, `gender`, `picture`, `created_at`, `updated_at`, `verified`, `deleted_at`) VALUES
(6, 'Sujan Molla', 'sujan-molla-6', 'sujan@mail.com', '01960621073', 'Dhaka, Bangladesh', 2.30, '<p style=\"box-sizing: inherit; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 16px; line-height: 25px; font-family: Catamaran, sans-serif; padding: 0px; border: 0px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; vertical-align: baseline; letter-spacing: 0.3px;\">In this tutorial, we will explain the easiest and cleanest way to make your blog posts URL’s with unique slugs created from the title of the particular post. For the purposes of this tutorial, the PHP based Laravel framework will be used.</p><p style=\"box-sizing: inherit; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 16px; line-height: 25px; font-family: Catamaran, sans-serif; padding: 0px; border: 0px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; vertical-align: baseline; letter-spacing: 0.3px;\">For more information about the framework, please visit the official documentation of the framework website, by clicking the following&nbsp;<a href=\"https://laravel.com/docs/5.6/installation\" style=\"box-sizing: inherit; font: inherit; padding: 0px; border: 0px; margin: 0px; vertical-align: baseline; color: rgb(201, 37, 46);\">link</a>.</p><p style=\"box-sizing: inherit; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 16px; line-height: 25px; font-family: Catamaran, sans-serif; padding: 0px; border: 0px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; vertical-align: baseline; letter-spacing: 0.3px;\">Also, you can refer to Laravel skeleton application created in my previous&nbsp;<a href=\"https://interworks.com.mk/laravel-spam-detection-step-by-step-guide/?preview_id=6947&amp;preview_nonce=67a51f890d&amp;_thumbnail_id=7010&amp;preview=true\" style=\"box-sizing: inherit; font: inherit; padding: 0px; border: 0px; margin: 0px; vertical-align: baseline; color: rgb(201, 37, 46);\">post</a>.</p>', 'male', '6.jpg', '2019-08-16 05:41:05', '2019-08-18 01:36:43', 0, NULL),
(7, 'sunny', 'sunny-7', 'sunny@gmail.com', '0172585891', 'bnagladesh,dhaka', 10.20, '<p style=\"margin: 22px 0px 1.2em; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 16px; line-height: 1.3em; font-family: proxima_nova_rgregular; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(85, 85, 85);\">If you are going to “ensure” something, you are going to guarantee it.</p><p style=\"margin: 22px 0px 1.2em; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 16px; line-height: 1.3em; font-family: proxima_nova_rgregular; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(85, 85, 85);\">For example, “I ensure that you will get a raise by the end of the quarter” means you are promising&nbsp;a raise within three months.</p><p style=\"margin: 22px 0px 1.2em; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 16px; line-height: 1.3em; font-family: proxima_nova_rgregular; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(85, 85, 85);\">The quote by Blakely means that you should not feel like you are unqualified to do something. Your unique experiences can help you find new solutions and methods—which are different from everyone else.</p>', 'male', '7.png', '2019-08-17 01:38:11', '2019-08-18 01:36:44', 0, NULL),
(8, 'Unknown', 'unknown-8', 'Unknown@gmail.com', '013887299210', 'narayanganj, Hajiganj Fort', 18.10, '<h2 style=\"margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 20px; line-height: 1.5em; font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(34, 34, 34);\">“Fearlessness is like a muscle. I know from my own life that the more I exercise it, the more natural it becomes to not let my fears run me.”</h2><p style=\"margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 20px; line-height: 1.5em; font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(34, 34, 34);\"><br></p><p style=\"margin: 22px 0px 1.2em; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 16px; line-height: 1.3em; font-family: proxima_nova_rgregular; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(85, 85, 85);\">“To run” something means to control or lead it.&nbsp;For example, “He runs the business” means he is the boss or the one in control of the company.</p><p style=\"margin: 22px 0px 1.2em; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 16px; line-height: 1.3em; font-family: proxima_nova_rgregular; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(85, 85, 85);\">When you are fearless, then you are not afraid.&nbsp;For example, the sentence “He will do anything because he is fearless” means that he&nbsp;is not afraid, so he will do anything.</p><p style=\"margin: 22px 0px 1.2em; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 16px; line-height: 1.3em; font-family: proxima_nova_rgregular; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(85, 85, 85);\">This quote compares muscles to being fearless. When we exercise our weak muscles, they become strong. Likewise, if we practice being&nbsp;fearless, then it only gets easier to&nbsp;be less afraid.</p>', 'male', '8.jpg', '2019-08-17 01:45:18', '2019-08-18 01:36:46', 0, NULL),
(9, 'Rana', 'rana-9', 'Rana@gmail.com', '01983664492', 'rangpur,major', 13.10, '<h2 style=\"margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 20px; line-height: 1.5em; font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(34, 34, 34);\">“One does not discover new lands without consenting to lose sight of the shore for a very long time.”</h2><p style=\"margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 20px; line-height: 1.5em; font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(34, 34, 34);\"><br></p><p style=\"margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 20px; line-height: 1.5em; font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(34, 34, 34);\"><br></p><p style=\"margin: 22px 0px 1.2em; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 16px; line-height: 1.3em; font-family: proxima_nova_rgregular; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(85, 85, 85);\">“To lose sight” means your ability to see gets worse and worse. If you completely lose sight of something, as&nbsp;in this quote, it means you can’t see it any longer.</p><p style=\"margin: 22px 0px 1.2em; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 16px; line-height: 1.3em; font-family: proxima_nova_rgregular; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(85, 85, 85);\">The phrase&nbsp;can also mean to become unfocused.&nbsp;For example, “He lost sight of the original plan” means that he has forgotten what he set out to do, and is now doing something else. In this situation, it has a negative meaning.</p><p style=\"margin: 22px 0px 1.2em; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 16px; line-height: 1.3em; font-family: proxima_nova_rgregular; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(85, 85, 85);\">If you give your consent, then you agree to something.&nbsp;For example, “I gave my consent to hire him” means that you agreed to hire him.</p><p style=\"margin: 22px 0px 1.2em; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 16px; line-height: 1.3em; font-family: proxima_nova_rgregular; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(85, 85, 85);\">So the&nbsp;quote above means you have to be ready to move&nbsp;forward even when you may not know what is going to happen. You have to leave behind what you know. This quote applies to business because if you want to “discover new lands” (do something that no one else has done yet; start a new business), you must leave&nbsp;“the shore” (the known). It may be scary at times, but in the end you will find or do something new, and it might be amazing!</p>', 'male', '9.jpg', '2019-08-17 01:48:52', '2019-08-18 01:36:47', 0, NULL),
(10, 'Rakib', 'rakib-10', 'Rakib@gmail.com', '01238639264', 'chandpur,monirgong', 21.00, '<h2 style=\"margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 20px; line-height: 1.5em; font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(34, 34, 34);\">“Surround yourself with only people who are going to lift you higher.”</h2><div><br></div><div><span style=\"color: rgb(85, 85, 85); font-family: proxima_nova_rgregular;\">This quote means that you should be around people who are going to encourage you to do better. You should spend time with people who want to see you succeed.</span><br></div>', 'male', '10.jpg', '2019-08-17 01:51:28', '2019-08-18 01:36:48', 0, NULL),
(11, 'Noah', 'noah-11', 'Noah@gmail.com', '0183726648', 'Dhaka, mohamadpr', 23.00, '<h2 style=\"margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 20px; line-height: 1.5em; font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(34, 34, 34);\">“Sweating the details is more important than anything else.”</h2><p style=\"margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 20px; line-height: 1.5em; font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(34, 34, 34);\"><br></p><p style=\"margin: 22px 0px 1.2em; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 16px; line-height: 1.3em; font-family: proxima_nova_rgregular; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(85, 85, 85);\">“To sweat” something means to worry about it. This is because when we worry, we often sweat.&nbsp;For example, the informal phrase “Don’t sweat it” means don’t worry about it.</p><p style=\"margin: 22px 0px 1.2em; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 16px; line-height: 1.3em; font-family: proxima_nova_rgregular; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(85, 85, 85);\">“Sweating the details” means to take care of all the small details rather than overlook them.</p><p style=\"margin: 22px 0px 1.2em; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 16px; line-height: 1.3em; font-family: proxima_nova_rgregular; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(85, 85, 85);\">This quote by Nooyi means&nbsp;that in order to be successful or to grow a company, you need to look after all of the small details. It’s those small things that will make or break you.</p>', 'male', '11.jpg', '2019-08-17 01:53:40', '2019-08-18 01:36:50', 0, NULL),
(12, 'Ryan', 'ryan-12', 'Ryan@gmail.com', '01727384975', 'america, new york', 25.10, '<h2 style=\"margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 20px; line-height: 1.5em; font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(34, 34, 34);\"><u>“You shouldn’t blindly accept a leader’s advice. You’ve got to question leaders on occasion.”</u></h2><h2 style=\"margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 20px; line-height: 1.5em; font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(34, 34, 34);\"><u><br></u></h2><h2 style=\"margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 20px; line-height: 1.5em; font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(34, 34, 34);\"><p style=\"margin: 22px 0px 1.2em; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: 400; font-stretch: normal; font-size: 16px; line-height: 1.3em; font-family: proxima_nova_rgregular; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(85, 85, 85);\">“To be blind” means to not be able to see. However, to do something&nbsp;<em style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">blindly</em>&nbsp;means to do it without thinking or preparing.</p><p style=\"margin: 22px 0px 1.2em; padding: 0px; border: 0px; outline: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: 400; font-stretch: normal; font-size: 16px; line-height: 1.3em; font-family: proxima_nova_rgregular; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(85, 85, 85);\">This quote says we should question advice that people give us—even if they are a leader. We should think for ourselves and then make a decision, rather than just accepting what another person tells us simply because they are “important.”</p></h2>', 'female', '12.jpg', '2019-08-17 01:55:20', '2019-08-18 01:36:51', 0, NULL),
(13, 'Levi', 'levi-13', 'Levi@yahoo.com', '01836390201', 'Bangladesh, josor', 28.20, '<p><span style=\"color: rgb(51, 51, 51); font-family: lato, Arial, Helvetica, sans-serif; font-size: 16px;\">“When one door of happiness closes, another opens; but often we look so long at the closed door that we do not see the one which has been opened for us.”</span><br></p><div><span style=\"color: rgb(51, 51, 51); font-family: lato, Arial, Helvetica, sans-serif;\">“The first step toward success is taken when you refuse to be a captive of the environment in which you first find yourself.”</span><span style=\"color: rgb(51, 51, 51); font-family: lato, Arial, Helvetica, sans-serif; font-size: 1rem; font-weight: initial;\">“When I dare to be powerful – to use my strength in the service of my vision, then it becomes less and less important whether I am afraid.”</span><span style=\"color: rgb(51, 51, 51); font-family: lato, Arial, Helvetica, sans-serif; font-size: 16px;\"><br></span></div><div><span style=\"color: rgb(51, 51, 51); font-family: lato, Arial, Helvetica, sans-serif; font-size: 1rem; font-weight: initial;\"><br></span></div>', 'female', '13.jpg', '2019-08-17 02:24:12', '2019-08-18 01:36:52', 0, NULL),
(14, 'Lincoln', 'lincoln-14', 'Lincoln@gmail.com', '01937362373', 'Bangladesh, gopalgong', 29.30, '<p><span style=\"color: rgb(51, 51, 51); font-family: lato, Arial, Helvetica, sans-serif; font-size: 16px;\">“Great minds discuss ideas; average minds discuss events; small minds discuss people.”</span><span style=\"color: rgb(51, 51, 51); font-family: lato, Arial, Helvetica, sans-serif; font-size: 1rem; font-weight: initial;\">“A successful man is one who can lay a firm foundation with the bricks others have thrown at him.”</span><span style=\"color: rgb(51, 51, 51); font-family: lato, Arial, Helvetica, sans-serif; font-size: 1rem; font-weight: initial;\">“Those who dare to fail miserably can achieve greatly.”</span><span style=\"color: rgb(51, 51, 51); font-family: lato, Arial, Helvetica, sans-serif; font-size: 1rem; font-weight: initial;\">“I can’t give you a sure-fire formula for success, but I can give you a formula for failure: try to please everybody all the time.”</span><br></p><div><span style=\"color: rgb(51, 51, 51); font-family: lato, Arial, Helvetica, sans-serif; font-size: 1rem; font-weight: initial;\"><br></span></div>', 'male', '14.jpg', '2019-08-17 02:30:06', '2019-08-18 01:36:53', 0, NULL),
(15, 'Rafi', 'rafi-15', 'Rafi@gmail.com', '01829839012', 'bnagladesh,gazipur', 14.30, '<ul class=\"i8Z77e\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px;\"><li class=\"TrT0Xe\" style=\"margin: 0px 0px 4px; padding: 0px; border: 0px; list-style-type: disc;\">Change your thoughts and you change your world. ...</li><li class=\"TrT0Xe\" style=\"margin: 0px 0px 4px; padding: 0px; border: 0px; list-style-type: disc;\">Those who realize their folly are not true fools. ...</li><li class=\"TrT0Xe\" style=\"margin: 0px 0px 4px; padding: 0px; border: 0px; list-style-type: disc;\"><b>Life</b>&nbsp;is too important to be taken seriously. ...</li><li class=\"TrT0Xe\" style=\"margin: 0px 0px 4px; padding: 0px; border: 0px; list-style-type: disc;\"><b>Life</b>&nbsp;can only be understood backwards; but it must be lived forwards. ...</li><li class=\"TrT0Xe\" style=\"margin: 0px 0px 4px; padding: 0px; border: 0px; list-style-type: disc;\">It always seems impossible until it\'s done. ...</li><li class=\"TrT0Xe\" style=\"margin: 0px 0px 4px; padding: 0px; border: 0px; list-style-type: disc;\">It\'s better to be a lion for a day than a sheep all your&nbsp;<b>life</b>.</li></ul>', 'male', '15.jpg', '2019-08-17 02:32:32', '2019-08-18 01:36:54', 0, NULL),
(16, 'James', 'james-16', 'James@gmail.com', '01833746383', 'america, Los Angeles', 32.10, '<div>Lorem ipsum dolor sit amet, adhuc quaestio assueverit an mea, prima nominati eum in, deleniti lucilius sit ei. Mea reprimique honestatis ei, nec id alii sumo suas, falli iusto necessitatibus nec no. Accusata explicari sea in, laudem propriae te mea. Cu aliquip feugiat molestie vis. Ut sint nostro concludaturque per, equidem detracto percipitur eos ex, at mazim posidonium omittantur nam.</div><div><br></div><div>His persius nominati ea, vide indoctum in pro. Pro ut justo prompta percipit. Eos ex putent oportere, qui ignota everti patrioque eu. Nihil singulis mediocrem eam ex, posse dicam tantas et sea, ex nam legimus urbanitas. Bonorum dolorum patrioque et usu, quaeque delicata euripidis ea eam. Ius ex veri habemus adipiscing.</div><div><br></div><div>Dicat imperdiet sed at, sit et scaevola persequeris. Ne tota copiosae inciderint qui, ut rationibus neglegentur per, eu libris eligendi sea. Mei everti rationibus eu, vel ad aeterno accumsan. An est elitr essent oportere, est id facer epicurei. Nam ea eruditi reprehendunt, ne cum integre explicari, an numquam indoctum mea.</div><div><br></div><div>An eam facilisis voluptaria, impetus accusamus reprimique qui eu. An pri autem lucilius intellegebat, vel ne quidam feugait deterruisset. Vim facilisi platonem id, an audire integre sea. Dolores comprehensam no est, ad errem graeco utroque per.</div><div><br></div><div>Tantas quaerendum ei eum. His cu harum omnes mucius, ea est modo vivendum intellegat. Qui ea mutat mnesarchum dissentiunt, vidisse saperet vim te. Perfecto mandamus in pri, ne ius ceteros perfecto, ad mea error vivendo. Mei impetus integre ad, noluisse torquatos qui id.</div>', 'male', '16.jpg', '2019-08-17 07:52:20', '2019-08-18 01:36:55', 0, NULL),
(17, 'Oliver', 'oliver-17', 'Oliver@gmail.com', '01927377364', 'america,Chicago', 23.30, '<p style=\"margin: 0.5em 0px; line-height: inherit;\"><font face=\"verdana, arial, sans serif\"><span style=\"font-size: 12px;\"><b style=\"\">Lorem ipsum dolor sit amet, no enim homero explicari has. Vero nihil salutandi eam ad, zril inimicus cum et. Mel cu eros prima sonet, est in graecis incorrupte. Mea cu zril iisque consequuntur, ea tollit apeirian conceptam sea, vix in nusquam patrioque.</b></span></font></p><p style=\"margin: 0.5em 0px; line-height: inherit;\"><font face=\"verdana, arial, sans serif\"><span style=\"font-size: 12px;\"><b><br></b></span></font></p><p style=\"margin: 0.5em 0px; line-height: inherit;\"><font face=\"verdana, arial, sans serif\"><span style=\"font-size: 12px;\"><b>Euripidis adipiscing has ad, mutat laudem vel ex, no quo quas quando tritani. Ius id option numquam, mundi possit epicurei sea at. At mei ubique euismod adipisci, diceret adolescens reformidans an vim, est dolore ancillae te. In per assum interesset necessitatibus, mea ignota perfecto quaerendum id, ad causae detracto sententiae eum.</b></span></font></p><p style=\"margin: 0.5em 0px; line-height: inherit;\"><font face=\"verdana, arial, sans serif\"><span style=\"font-size: 12px;\"><b><br></b></span></font></p><p style=\"margin: 0.5em 0px; line-height: inherit;\"><font face=\"verdana, arial, sans serif\"><span style=\"font-size: 12px;\"><b>Quo an tractatos accusamus, eu vel dolores intellegam, qui ludus postea officiis ne. Qui probo malorum an, eum at verterem tincidunt accommodare. Cum novum hendrerit ei, expetenda assentior ex quo, justo aperiri vix ex. No alia detracto vel. Quem quis ignota sit ei, sit iusto omnium legimus eu, ex aeque facilisis quaerendum eam.</b></span></font></p><p style=\"margin: 0.5em 0px; line-height: inherit;\"><font face=\"verdana, arial, sans serif\"><span style=\"font-size: 12px;\"><b><br></b></span></font></p><p style=\"margin: 0.5em 0px; line-height: inherit;\"><font face=\"verdana, arial, sans serif\"><span style=\"font-size: 12px;\"><b>Sed ex fabellas gloriatur. Eos id eruditi erroribus, ut duo putent audire mediocrem. Te est zril populo, ei noluisse pericula interpretaris mei. Te eam paulo integre. Nullam mollis intellegam mei ex, qui invidunt repudiandae id. Eu vis timeam consulatu consequuntur, ea meis cetero per.</b></span></font></p><p style=\"margin: 0.5em 0px; line-height: inherit;\"><font face=\"verdana, arial, sans serif\"><span style=\"font-size: 12px;\"><b><br></b></span></font></p><p style=\"margin: 0.5em 0px; line-height: inherit;\"><font face=\"verdana, arial, sans serif\"><span style=\"font-size: 12px;\"><b style=\"\">Posse mollis persequeris has ei, per ex erat utinam instructior, duo inani aperiri ne. In eam dicant delectus appellantur. Pro movet persius deterruisset ut. Vis eu eius tamquam consulatu, etiam eirmod mel et, an duo iuvaret sapientem. Cum principes corrumpit ne, mel agam omnes ea. At aeque verear efficiendi eum, at his lorem ridens inciderint, ex mutat eleifend periculis pri.</b></span></font></p>', 'male', '17.jpg', '2019-08-17 07:59:22', '2019-08-18 01:36:57', 0, NULL),
(18, 'Cameron', 'cameron-18', 'Cameron@gmail.com', '01783224638', 'Houston', 22.70, '<p>Lorem ipsum dolor sit amet, putent propriae at usu, cu qui altera deseruisse. Cu graeci nostrum vulputate duo, vix ei purto nibh graeco. Sale consul docendi ea sea, quot consetetur ius ut. Ut assum denique persecuti nam, an per mentitum expetendis quaerendum, diam oporteat pertinacia est ei. Eum no libris impetus, enim minimum at sea. Prima malorum incorrupte his ea, eu quo prima putant, mea cu sumo porro.</p><p><br></p><p>Quo debitis mandamus ea. Eos zril consectetuer cu. Eu nam prima facete atomorum, elit adhuc sadipscing sea no, ea qui unum delectus sententiae. Vis causae luptatum scribentur in, ei vix ipsum liber omnesque. Convenire incorrupte ex duo.</p><p><br></p><p>Labitur convenire ei duo. Choro constituam ex vis, nec quem purto petentium te, nam at quando consetetur. Ne vis fabulas scaevola mediocritatem. An repudiare voluptatum definitionem vel, ignota numquam voluptua mel ei, impetus mandamus inimicus eu mea.</p><p><br></p><p>Aeque docendi facilisis in pri. Sed eu assum delenit contentiones. Usu ne ludus commune, wisi graece eos no. At est vivendum consectetuer, pro perpetua assentior dissentiet cu.</p><p><br></p><p>Nonumes persecuti ad ius, qui deserunt percipitur ne, qui te quidam mnesarchum. Sit ad probo atomorum voluptatibus, in salutatus posidonium nec. At integre deseruisse vim, ut quo solum sonet senserit. Vim cu causae iuvaret. Doming sapientem mei no, sed falli percipit adipiscing ei.</p><p><br></p><p>Ne offendit perpetua temporibus nec, eos sumo falli ex. Nec maiestatis interesset in. Pri te zril facete scripserit, mei quem eros te, ius no legimus delicata. Te postea admodum atomorum his, pri ut eius reprehendunt. Vim te sale voluptaria, an vide omnium has. Vim nulla suavitate an, in commodo similique ius.</p><p><br></p><p>Minim torquatos ad duo, est ei timeam maluisset. Nibh ferri incorrupte nec ut, fierent noluisse per ne, in cum minim graecis. Ex putant neglegentur sed. Usu tritani dolorem euripidis ad, ut eos agam dictas commune. Nec eu salutatus urbanitas, mea in tamquam convenire consectetuer. Ex tantas laudem nec, fierent gloriatur nam in, maiorum vulputate ea nec.</p><p><br></p><p>Et sit persius verterem, no eruditi oporteat duo. Nec elit sensibus ex, qui cu dicam delectus disputationi, fabellas eleifend appellantur vis an. Wisi justo usu ea, per albucius facilisi an, no vulputate inciderint nec. Eam in errem voluptua, sed ex ubique laoreet. Mea ei case ridens eirmod, qui ne admodum salutatus. Eam affert soleat sensibus in, purto quidam mentitum vix ex. Ex ius dico adversarium.</p><p><br></p><p>Duo et diceret volutpat, agam ocurreret nam ne. Etiam ignota ex mel, dicit philosophia cu mea. Consul eleifend id nec, impetus invenire eam ut. Et eam tollit quaeque, vis patrioque euripidis ad. Urbanitas neglegentur et pri, impetus epicuri his ex, per errem persequeris ut. Duo eu facer temporibus philosophia. Sea legimus fierent perpetua cu.</p><p><br></p><p>Eam ad malis ullum tollit. Animal consulatu mnesarchum quo id. Cu vero accusata mel. Solum aliquam ei vis. At vix dicunt aeterno definitionem. An quo audiam appetere reprehendunt, eum eu euripidis definitiones.</p>', 'female', '18.jpg', '2019-08-17 08:03:14', '2019-08-18 01:36:59', 0, NULL),
(19, 'Theodore', 'theodore-19', 'Theodore@gmail.com', '01882933478', 'Memphis', 32.30, '<p>Lorem ipsum dolor sit amet, munere moderatius nam ne, ignota luptatum inimicus cum at. Ex sed habeo denique postulant, duo hinc putent no. Et cum homero omnium, sed ea mucius consetetur, ex prodesset scribentur cum. Eam dicit latine cu, his prima eirmod explicari eu, sumo tation meliore at mel. Has no rebum discere. Ut mollis accommodare eam, id est option vivendo, no vis splendide voluptatum.</p><p><br></p><p>Sit scripserit omittantur in. Forensibus scriptorem ad nec, eam aeque vocent constituam ei. Ei bonorum liberavisse qui, id amet affert mel, id unum tantas per. No pro aperiri alienum, aliquando theophrastus et eum, adhuc inciderint ne vix.</p><p><br></p><p>Quis erant imperdiet ut qui, mutat error harum et pri. Laudem tibique nec cu. Facilis pericula mea ea, meis tritani dissentiunt at sea. An vidit dolor assentior sea, probo ignota cum ex, nec in fabellas consequat delicatissimi. Vel ei aliquam volumus, case cetero euripidis at vim.</p><p><br></p><p>Eu nonumy luptatum evertitur mei, solet reformidans te est. Atqui nominati persequeris no cum, at modus accusamus sea. Mazim qualisque ut qui, vel iusto volumus concludaturque eu, ea vide iisque labitur mei. In hinc alienum tractatos vis. Eu est impedit concludaturque.</p><p><br></p><p>Ius ut justo graece putent, odio perfecto repudiandae an nam, usu no lucilius reprimique. Possim prodesset no eam, vix in nisl minim tritani. Nemore animal oporteat vis ne, et nec minim ridens graecis. Ne eum aeterno dissentiunt, commodo electram id vis. Est oportere expetenda reformidans at, cu mei eligendi repudiandae, zril omnes eligendi ut per.</p><p><br></p><p>Cu pri minim euismod consulatu, autem causae epicuri cum in. Ignota mandamus nec in. Epicuri assueverit per ex, eam ea duis nullam ullamcorper. Alii expetenda abhorreant cu nam, cum id possim scripserit.</p><p><br></p><p>At mea albucius tacimates sensibus. Ne vel definiebas neglegentur theophrastus, no mea falli ridens. Quod noster percipitur in sea, habeo error verterem sea ex, quaestio philosophia vel ne. Vix an quot prompta, eu constituto concludaturque vis, et nec elitr ludus admodum.</p><p><br></p><p>An mel lorem graece reformidans. Ei dicat indoctum posidonium vix. Mea assum mediocrem philosophia et. Erant doctus nam ei.</p><p><br></p><p>Dicant intellegat cu nam, primis pericula sea ne. At ius adhuc labitur sententiae, delicata perpetua incorrupte mea cu. Quo euismod expetendis voluptatum in, et mei nihil deserunt. Ne tota praesent gubergren eam. Populo scaevola cu nec, per altera euripidis ei, et corrumpit efficiantur sea.</p><p><br></p><p>Id eum vero labores iudicabit. Mel an modo sumo, minimum intellegat consectetuer ius ut. Pri ex labitur evertitur accommodare. Option volumus an est, pri agam praesent id.</p>', 'male', '19.jpg', '2019-08-17 08:04:46', '2019-08-18 01:37:00', 0, NULL),
(20, 'Jeremiah', 'jeremiah-20', 'Jeremiah@gmail.com', '01763577395', 'Las Vegas', 29.90, '<p>Lorem ipsum dolor sit amet, cum in brute alterum reprimique. Vim adhuc sententiae cu, duo vocent perfecto at, nisl oratio efficiendi quo eu. Pri te vitae utinam, mel eu cetero platonem. Pri cu justo sonet oratio. Docendi euripidis sed id. Sed ex tale altera deserunt, sed dicat meliore ad, cum verear consulatu ea.</p><p><br></p><p>Ea mea referrentur instructior, an iuvaret insolens per. Ei odio persecuti sententiae per. Id cum prima dolor, his id dicam laboramus. Pro et admodum forensibus, has id dolorem definitiones, quo soleat intellegam definitiones ex.</p><p><br></p><p>Minim omnesque reformidans vel in. Ius exerci dolorem persequeris in, eum populo omnium salutandi ei, ei mei amet nobis omittam. Ex soleat noster nec, etiam fastidii et eum. No mea saperet appetere consetetur, no ludus feugait lobortis mel. Ne agam temporibus qui, eam cu legere periculis splendide.</p><p><br></p><p>Nec eu quem deleniti, torquatos assentior vel ut. Legimus deserunt gubergren vix at, sed senserit petentium an. At fabulas accusam qui, ius te habeo dolorem efficiendi, eu solet neglegentur vel. Per no adhuc legimus volutpat, reque soleat suavitate vim no. Ad zril accommodare vim, nec ne efficiendi omittantur, doctus audiam usu no.</p><p><br></p><p>Ad per dolore vivendo. Vix et nulla soluta insolens, mea at oratio detracto verterem. Deleniti elaboraret eum eu, zril fierent sit ea, illum iuvaret instructior vim ut. Munere ornatus vel ne, cum id diam iudicabit voluptatibus. Ei est quis harum homero, eu brute minimum eleifend his. Munere verterem accusata sea ad, diam exerci iudicabit ex usu.</p><p><br></p><p>Saperet accusata qualisque at vel, sit ignota instructior no. Ut illum laudem eloquentiam vis, ut has stet vitae complectitur. Id omnes antiopam incorrupte vel. Ludus aliquip petentium per ut, tollit legere mandamus et vix. Et corpora percipit eos, minim affert homero mea ex. Sit oratio iudicabit ne, cum populo assentior ei. Modus alienum ei eos.</p><p><br></p><p>Accusata elaboraret nec et. Iudico homero iisque qui ne. Cu has nonumy appellantur, nam an nihil eirmod cetero. Eum case eloquentiam cu. Appareat posidonium no eum, inimicus splendide in eos. Mutat elaboraret nec in.</p><p><br></p><p>Est te dico tollit ponderum, ex pro delicata euripidis, virtute delenit pertinax sit no. Usu an aliquando scripserit, duo semper reprimique in. Explicari dissentias id duo, no rebum officiis dignissim ius. His idque indoctum id, dicit comprehensam has eu. An per quando dicant, est natum feugait eu. Qui eu option diceret invidunt, et mea velit suscipit sapientem. Mucius invenire intellegat usu in, integre detracto cum id.</p><p><br></p><p>Vis cu saperet mnesarchum. Nam ut meliore contentiones, sed cu maiestatis reprehendunt. Ut sea munere vivendum lucilius. Cu cum quot percipitur.</p><p><br></p><p>Habemus constituam ne mei, pro tale recusabo eu. Has quodsi accusamus deseruisse no, nam ad albucius sapientem. Mel ex erat omnes dissentiunt. Impedit maiorum reprehendunt vis an.</p><p><br></p>', 'male', '20.jpg', '2019-08-17 08:05:59', '2019-08-18 01:37:01', 0, NULL),
(21, 'Adam', 'adam-21', 'Adam@gmail.com', '01728364758', 'Milwaukee', 25.20, '<p>Lorem ipsum dolor sit amet, vel cu solet postea, et utamur fierent cum, ne qui augue liber. Has duis forensibus consetetur ei, pri ea elitr copiosae mandamus, enim purto ne mei. Te dicant assueverit pri, per illum minimum ex, ut eius diceret percipit sea. Nec cu bonorum indoctum referrentur, no falli invenire eos.</p><p><br></p><p>Essent tractatos no his. Vidit fabellas usu an, ne sit tation causae vivendo. Novum dicam viderer est at, et mutat harum honestatis eos. Ne perfecto definitiones nec, mei et causae adipisci, ei sea etiam timeam definitiones. Viris affert duo ei. Pri ei debet fabulas dissentias, graeco nemore aliquip ut sea. At nibh torquatos ius.</p><p><br></p><p>Populo gubergren an eum, eos vide nihil omnesque eu. Aperiri maiestatis ea eos, id lorem euripidis pri, accumsan partiendo id eum. Cetero delenit offendit an nam. Quidam iriure invidunt et sed, ex eam posse delicatissimi. Quo id iudico aeterno praesent, no pri aperiam vocibus, no sea primis everti prompta.</p><p><br></p><p>His in scaevola oporteat euripidis, pri ea suas inermis. Quot doctus iuvaret vel et, vim animal singulis senserit et, iriure legimus nam ad. Ei eam illud verear. Zril iudico ius ea, velit dolore option no quo, mei ad copiosae accusamus. Vix saepe viderer deterruisset in, has at reque libris omittantur. Ut usu quodsi iudicabit evertitur, ei nec clita noster docendi, cu pro deleniti temporibus reprehendunt. Tibique adipiscing ius te.</p><p><br></p><p>Pri debet atomorum prodesset ad, te eos purto dictas apeirian, at purto debet choro pri. Id eos lorem persius, atqui disputando an has. In veri tacimates facilisis est. Duis dicant deserunt ius ea, cu eum wisi scripta albucius, tritani percipit contentiones ad eam.</p><p><br></p><p>Ea sumo recteque pro. Duo eu iisque docendi accusamus, invenire omittantur quo te. Cum populo bonorum appareat et. Timeam iisque sed ut, ex has nostrum invidunt efficiendi, et usu ridens essent dictas. Duo cu minimum patrioque scriptorem, eu quo facete maluisset, eu fierent inimicus cum. Velit voluptua ei pro, vix ne ubique postea deleniti.</p><p><br></p><p>Quidam splendide in est, cum idque officiis constituto cu. Fugit paulo verterem at his, an his modus denique dissentiunt. No qui purto recteque, mea nihil accumsan comprehensam eu. Eam eu partem doming honestatis, natum idque tation eum et.</p><p><br></p><p>Ea veri harum errem mei, albucius maiestatis accommodare est no, scripserit disputando ad pri. Aeterno vivendum ei vel, causae persecuti eu nam. Duo ei affert tempor, no nullam platonem sed. Solet molestie eloquentiam eam eu, convenire torquatos pro ad, suas doctus eum et.</p><p><br></p><p>Cu atqui rationibus efficiantur usu. His mucius quaerendum eu, nec eius tempor ad. No sea graecis honestatis vituperatoribus, mea ex omnis prima labore, cu malis iudico eripuit sit. Et quo deleniti electram.</p><p><br></p><p>Usu ex nibh facilisi, decore dissentiunt eos te, his rebum consequuntur ad. Est ne malorum delicata mnesarchum. Ius alienum petentium patrioque no, duo nobis offendit eu. Cu semper instructior nec. An illud dignissim pertinacia nam, aeterno persequeris vim eu. Persius disputationi duo no, soluta recteque est id.</p>', 'female', '21.jpg', '2019-08-17 08:07:26', '2019-08-18 01:37:03', 0, NULL),
(22, 'Jaxson', 'jaxson-22', 'Jaxson@gmail.com', '01736473932', 'Fresno', 23.10, '<p>Lorem ipsum dolor sit amet, blandit hendrerit no per, quis sonet propriae nec ex. Mea meliore denique praesent id, cum cu vero facilis civibus, tempor mandamus intellegam ex eam. Dicunt scaevola oportere eam no. In oportere molestiae sed. Ne duo solet nullam putant, in erant iisque commodo qui.</p><p><br></p><p>Integre facilis nam te, alii dolores percipitur at sed. Facer aliquid evertitur in his. Sonet facilisi adipisci usu et, abhorreant comprehensam nam ne, equidem fierent omittantur ex sea. Qui consequuntur definitionem an, ea consul assentior has. No pro doctus civibus oportere, in euismod molestie sit.</p><p><br></p><p>Iuvaret sanctus ius no, nostro dicunt in vis, eu sed omnes graeci concludaturque. Postulant erroribus consequat mei ut, in mea posse tollit sapientem. Est quis reque recusabo an, regione scribentur mel ne. At graeco aperiam assueverit usu. His et tamquam bonorum posidonium.</p><p><br></p><p>His veri eleifend in. Liber labores explicari vel et. Timeam moderatius his in, evertitur conceptam an vim. Alia utroque noluisse cu vel, per zril cotidieque eu.</p><p><br></p><p>Solum illud quaeque eum in. Tractatos gubergren cum ut. Ne stet vidit eruditi sit, eum an deserunt iracundia consetetur. Vel vidit deseruisse ad, iriure torquatos id sed. Vel id meis liber denique.</p><p><br></p><p>Oratio scripta liberavisse ne has, natum denique pertinacia eum at. Congue decore sapientem ea ius, summo nihil perpetua nec et. Idque veniam placerat ius ex, et habeo facer suscipiantur ius, eos in modus dolor similique. Pro omnesque offendit liberavisse eu, ridens luptatum sit ad. Ne ludus mediocritatem per, vel no dicit nusquam omnesque.</p><p><br></p><p>Sea iudicabit deseruisse no, iudico dolorem detracto sed an. At graecis luptatum singulis has, quo te partem discere repudiare, admodum comprehensam per eu. No sonet mentitum mel. In has wisi periculis. Aperiam epicurei ad pro, vim illum commodo prodesset eu.</p><p><br></p><p>Sed id libris laoreet. Nec assentior scripserit ad. Suavitate hendrerit reprimique nam ea, his iusto ridens oporteat an. Eius ignota commodo at vis. Cum iriure molestie ad.</p><p><br></p><p>Eos exerci delenit appellantur an, te aliquam facilisi mei, te est persecuti repudiandae. Brute iudicabit et eum, ea commune delicata his, his nostrum delicata ex. Nostrum definiebas sadipscing eos id. Reque vivendo te usu, id qui adhuc atqui. Mel et quod patrioque consequat, te antiopam laboramus vel, cetero equidem vocibus sea ad. Regione nominavi an vis, legimus menandri nec te.</p><p><br></p><p>Sale decore usu cu, prima nulla mediocrem te mel, dicat utamur cotidieque sed no. Alterum luptatum id his. Alii tale nominavi qui ad. Iriure sententiae qui ad, melius facilisis mei no. Omnes commune ancillae pro et, id novum iuvaret nam.</p>', 'female', '22.jpg', '2019-08-17 08:08:39', '2019-08-18 01:37:04', 0, NULL),
(23, 'Ezekiel', 'ezekiel-23', 'Ezekiel@gmail.com', '01773665993', 'Tucson', 32.20, '<p>Lorem ipsum dolor sit amet, an recusabo pertinax sententiae duo. Probo vocent cu vis, at electram theophrastus sed. Ne sit sanctus docendi, dolore recusabo delicatissimi an sit, mazim vitae iudico quo ne. Sea ad veniam semper admodum. Est no purto instructior, case iriure offendit eos eu.</p><p><br></p><p>Ius cu etiam everti, pro cu sonet invidunt, epicuri tractatos concludaturque an vel. Ut per purto habeo pertinacia, sit ut omnium eloquentiam. Antiopam persecuti intellegat cu eam, sea ex insolens mandamus, usu nulla mazim patrioque eu. Dolor aliquam reprehendunt ut per, ex dico vide usu, per cu primis deleniti pertinax. An est wisi menandri ocurreret, te unum ubique duo.</p><p><br></p><p>Accusam inciderint no est, te duo nibh intellegam. An scaevola maluisset persecuti nam. Et quo vocibus iracundia laboramus, in eos integre scaevola ponderum. Te summo sapientem euripidis eum, eam mandamus imperdiet cu. Ad quas deserunt volutpat vim. Utamur efficiantur ex duo, cum doming epicurei ut, an inermis recusabo vis.</p><p><br></p><p>Vitae labitur vel et, legere utroque rationibus has eu, sit an nulla affert indoctum. Ea ius nisl modo saperet. Rebum accommodare per ex, elit volumus eos ei. Pro te nusquam probatus, modo gubergren interesset ut sed. Semper euismod et mei, ignota feugiat consulatu qui ad. Te vel reque similique ullamcorper, mel ei qualisque forensibus.</p><p><br></p><p>Per lobortis dignissim ad, agam euismod vivendo eu quo. Ei cum denique epicuri conclusionemque. Facilisi quaestio nec an, mea at quodsi percipitur. Debet verear eruditi at eum, id deleniti recusabo mei. Pri magna dolor animal id. Ex laudem percipitur sea.</p><p><br></p><p>Ne porro accumsan omittantur qui, vocent eleifend constituto sed in. Ne vocent molestie vis, ei vocibus feugait forensibus quo, sadipscing liberavisse instructior ius eu. Quidam consequat nec ne, ea mei odio stet, justo ludus graeco eam et. Habeo delenit pertinacia ut usu, te est cetero timeam, has putant oportere no.</p><p><br></p><p>Ea utamur lucilius eum, elaboraret conclusionemque qui ne, in mundi solet delicata sit. Nec id dolores ocurreret. Ad graece luptatum sapientem per, mei alterum consectetuer ei. Enim sonet antiopam ea eam, ei legimus mnesarchum usu. Delectus consequat vel ut, qualisque signiferumque cu vis.</p><p><br></p><p>Eum ut maiestatis neglegentur, mazim omnium mentitum nam ut. Ea quis omittam iracundia duo, ne affert doctus concludaturque nec. Ut qui legere luptatum torquatos. Doming verear inimicus an vim.</p><p><br></p><p>Nibh soluta eripuit id usu. Ad duo quaeque meliore. Hinc tractatos te nec. Cu sed quidam ponderum, an labores postulant principes has, saepe salutandi cotidieque ut usu. Ne sea iuvaret recteque, causae quaestio scriptorem pro in, duo ut amet facer facilisi.</p><p><br></p><p>Choro qualisque duo ad. Sed noluisse phaedrum torquatos at, nam an prima tamquam. Id affert aperiri ancillae usu, cu illud harum sit. Partem populo molestiae eam ne. Duo sonet graece fierent et, vim prompta pericula erroribus ei. Eum nonumes reprimique efficiendi in. Nam impedit docendi deterruisset ea, essent appareat vel cu, qui augue iusto maiestatis an.</p>', 'male', '23.png', '2019-08-17 08:10:08', '2019-08-18 01:37:06', 0, NULL);
INSERT INTO `lawyers` (`id`, `name`, `slug`, `email`, `phone`, `location`, `experience`, `description`, `gender`, `picture`, `created_at`, `updated_at`, `verified`, `deleted_at`) VALUES
(24, 'Max', 'max-24', 'Max@gmail.com', '01772854243', 'Mesa', 30.80, '<p>Lorem ipsum dolor sit amet, an sed odio aliquip nostrud, dolorem signiferumque quo te, omittam invenire per id. Mei cu sonet consul postea, facer falli pro ei. Ex per sumo saperet nusquam, te mel iusto electram. Ex alii principes ius, no admodum suscipit sit, vitae ocurreret id mel. Quem meis accusam in mei, ea quaeque eripuit vis.</p><p><br></p><p>Sea cu numquam intellegebat, eam dicat movet vivendo id, quo in ridens inimicus voluptatibus. Mazim aliquam ei eum, duo ex modus nobis, ubique sapientem ex vel. Has an aperiam numquam propriae, ei pro tritani eleifend maiestatis. Labore eligendi invidunt et vim. Mea ut nostrum suscipit efficiantur, eu nam verear singulis. Volumus ponderum temporibus quo an.</p><p><br></p><p>Eu nam lorem atomorum, an tation inermis ius. Duo illum eripuit in, eu nam alienum percipit assentior. Id vidisse tamquam nam, probo consequuntur ut vel. Congue soleat an vix, illum deleniti moderatius te has, no quo falli iriure quaestio. An ullum congue laoreet mea. Nec debet delenit scriptorem no.</p><p><br></p><p>Per veritus liberavisse delicatissimi ea. Sed malis error et, per ornatus delicata an. Eius dicant quodsi ut per, usu ne quot vidit ullamcorper, ut per antiopam petentium explicari. Hinc iriure indoctum an ius, no aeque dicant ornatus vis. Qui tale accusata et, ferri doming vivendo qui no. Eam ut bonorum erroribus. Nisl molestie periculis ei pri, eu sea homero labore concludaturque.</p><p><br></p><p>Clita option admodum sed ea, cu latine concludaturque sit, et vix habeo dicta signiferumque. Te pri malis deserunt, iudico accumsan ne qui. Ex eros indoctum appellantur sea, erat ornatus utroque ut vis, id quem nonumes per. An doming persius delicatissimi eam. Ullum mucius te mel, reque inciderint ne sed.</p><p><br></p><p>Cum ei vide cotidieque, vide salutandi adversarium ei eum. Vel semper luptatum deterruisset an, id integre recusabo qui. Nisl nonumy melius ius ad, at mei oportere principes aliquando, no vim iisque aperiam mentitum. Sea alii ullum consetetur cu.</p><p><br></p><p>Mei ut epicuri commune intellegat, mea sale inani ei. Ne atqui mundi ridens qui. No iriure scripta nostrum vix, te adhuc legendos eam. Est at saepe fabellas, ea nam ullum tollit putant. Mel possim singulis assueverit ea, his ad ludus referrentur. Nostrud phaedrum consetetur has eu, probo intellegat no pri. Ut nobis aperiam contentiones pri, congue salutandi te cum.</p><p><br></p><p>Et sonet volumus efficiendi vim, no eos ubique omnium dissentias, mei ne quis pertinacia. Eos euismod insolens ei, epicurei luptatum eos no. Ius natum option postulant ut. Option malorum insolens no cum.</p><p><br></p><p>At pro autem scripta. Cu pro eripuit vivendo. Eros facer vocent eos ne, primis torquatos ei vis. Quem phaedrum tincidunt usu cu, an tota nulla dissentiunt eam. Mei ea alii oportere.</p><p><br></p><p>In everti nostrud qui. Alienum deterruisset duo ut, nobis fierent contentiones ad vix, eros equidem ad pro. Summo mandamus eu cum. Lorem iudico mnesarchum eum ut, has lorem verear option te. Ad mel noster aperiam rationibus. Dico rebum mundi nam ei, nonumes salutatus nam ea.</p>', 'male', '24.png', '2019-08-17 08:12:04', '2019-08-18 01:37:07', 0, NULL),
(25, 'Carlos', 'carlos-25', 'Carlos@gmail.com', '01923473482', 'Tucson', 26.20, '<p>Lorem ipsum dolor sit amet, ei oblique appareat recteque mei. Ut vix quas reformidans, essent probatus moderatius ius ei. Eu per ludus mucius, mei cu verterem percipitur, augue verear nusquam usu ex. Et legere disputando sit.</p><p><br></p><p>Id sea wisi intellegam liberavisse, ut eam eros justo erroribus. Mei ad posse veniam deterruisset, in duis facer velit mea, ut dicant consequat per. Mea iuvaret assueverit in. Ut cum propriae antiopam inimicus, ea vim modo platonem convenire, ea populo probatus vis. Aliquip pertinax ad sed, ex illud offendit cum. Quo cu accusamus urbanitas gloriatur, dicunt lucilius eam ad, aeque accusata ut has.</p><p><br></p><p>Detracto percipitur deterruisset ex mea, at nam nibh dicit. Cum ne inermis luptatum principes. Ad mea adipisci intellegam, no elitr platonem mandamus nam. Ne ius amet commodo antiopam, vel magna libris in, mea eu meliore erroribus neglegentur. Alii error sed ne, per eius expetenda neglegentur ei.</p><p><br></p><p>Dicit consul est ad. Ei ipsum falli democritum qui, sed labitur vivendo complectitur an, has inciderint instructior id. Eam ex alii adipisci aliquando, ut eam dicant timeam labitur. An est impedit periculis voluptatibus. Cetero utamur reprimique mei et. Soleat posidonium ut ius. Vel solum dolor at.</p><p><br></p><p>Ut est oblique delectus iudicabit, ex eam persius alienum ponderum, nibh facete aliquando cum ne. At eligendi periculis vel, dolores signiferumque pri an. Cu nec fuisset lucilius mnesarchum, eum idque democritum ei. No mucius voluptua vis. No illum constituto intellegebat nam, vis laudem apeirian at. Est vide repudiare in, mutat dicant ocurreret ut duo.</p><p><br></p><p>Vix et labore recusabo consequat, ancillae sensibus id quo, an essent philosophia qui. Erat legere duo ad. Invidunt explicari conceptam et pro. Ne duo quas periculis, delenit sensibus sadipscing vel at.</p><p><br></p><p>Velit numquam albucius no per. Sanctus tractatos facilisis qui te, prompta efficiantur ne eum. Dicunt detracto vis ne. Te decore postea aliquid usu. Ut quem doctus postulant has, ius ea natum zril voluptatum. Eros summo mei et. His ad wisi tempor, esse oblique delenit ut ius, mei ea quis docendi interesset.</p><p><br></p><p>Ferri sanctus te vis, everti persecuti in nec. Debet everti dignissim sit te, modo disputando eam cu, ut quot facilis urbanitas mel. Ex pri quis admodum, quo te vide vocibus maluisset, his natum oblique eleifend et. Usu ne homero cetero. An sed atqui altera. Feugiat facilisis duo cu, feugiat corpora maiestatis sed in.</p><p><br></p><p>Usu accusata persecuti at, ne nam ferri pertinacia reprimique. Cu labitur verterem has. Vis odio atqui fastidii in. Ei mei agam posidonium, saepe neglegentur vix ei. Nibh doctus adolescens vis ad. Et mel idque regione delicata.</p><p><br></p><p>Cum facer aeterno tacimates ad. Euismod feugiat salutatus vel et. Ex dicta deleniti suscipiantur has. Et nulla civibus iracundia his, melius disputando sit ex.</p>', 'male', '25.jpg', '2019-08-17 08:13:31', '2019-08-18 01:37:08', 0, NULL),
(26, 'Jayce', 'jayce-26', 'Jayce@gmail.com', '01746973234', 'Aurora', 23.00, '<p>Lorem ipsum dolor sit amet, at eruditi maluisset sea. Tibique atomorum ea vix. Vim id nonumy omnium percipitur. Et vim placerat erroribus, eam in nullam dolorem insolens. Aeterno definiebas scriptorem at est, at ius volumus antiopam.</p><p><br></p><p>His te ipsum dicat sadipscing. Officiis dignissim cum an, audiam mandamus democritum in mea. Ad elit liberavisse vis, an quo debet efficiantur. Ex soluta delicatissimi sea.</p><p><br></p><p>Usu ea habemus atomorum intellegam, pro ad invenire assueverit dissentiet. His ea omnis malis. Nam alterum molestiae ut. Alia nulla reprehendunt duo ei, vix sadipscing interpretaris ad.</p><p><br></p><p>Cu cum dico instructior. At tantas noluisse usu, nam rebum verear ad. Case choro dicunt cum ea, mel mutat regione no. Iudico constituto concludaturque ut est, ad nec possit patrioque. Ne fierent accumsan lobortis nam, ne quis debet sed, sit ea fierent accusamus quaerendum.</p><p><br></p><p>Vel ex sale perpetua, eum in purto aperiam, no vis aliquam liberavisse. Sit hinc invenire ei. Tation omittantur pro ex, nullam saperet legimus et eum. Cu pro soleat dissentiet, ferri integre mea ut, clita commune mel id.</p><p><br></p><p>Labitur voluptatum qui ne. In mutat option vel. Cu cum quas nobis mandamus, ut est nibh offendit. Dolorem nominavi luptatum vix et. Vidit detracto fabellas pro te, ei diceret reprimique sea.</p><p><br></p><p>Id graeco conceptam abhorreant duo. Vix graece efficiantur an, ne has error decore salutatus, sea eu paulo graece sadipscing. Qui ex summo audire conclusionemque, id nec vide nonumy prompta. Diam accusamus vituperata at sit, eam ea dicat soluta appellantur.</p><p><br></p><p>Ea eam liber iudicabit, ex error gubergren sed. Clita epicuri epicurei at eum. Mei ex dicta suscipiantur. Cum ne fugit dicta zril. Liber suscipit appareat vim et, ad vis audiam epicuri, id eruditi definitionem mel. Consul insolens iracundia in per.</p><p><br></p><p>Eum partem interesset id, ne cum nonumy invenire, eu velit solet labore his. Tractatos suscipiantur eos cu, dolor dicam congue no mei. An eum exerci doming, vix ipsum invenire qualisque ad. His no nullam pertinax erroribus, ferri iusto albucius no eos. Eu his timeam inermis graecis, usu cu iriure recteque mediocrem. Mea ut minim nullam percipit, mutat iudico putent ius ea.</p><p><br></p><p>Sed blandit offendit sententiae ea, vis amet adipiscing mediocritatem an. His ea docendi splendide, ex est viris ludus probatus, ad ancillae vituperata qui. Eam an omnis volumus fastidii, no vis dolore concludaturque, has at vero nostro. Vix dico laudem ei. Vel te inciderint referrentur, ei utinam aliquip interpretaris ius, clita regione discere in qui. Vis no insolens assueverit disputationi, sit et mazim accusam forensibus. Pro id stet tamquam liberavisse, justo percipit lucilius at usu.</p>', 'male', '26.jpg', '2019-08-17 08:14:33', '2019-08-18 01:37:10', 0, NULL),
(27, 'Giovanni', 'giovanni-27', 'Giovanni@gmail.com', '01738239453', 'Santa Ana', 32.00, '<p>Lorem ipsum dolor sit amet, ad eum iudicabit assentior, labitur aliquid ponderum mei ad, vis tantas scripserit no. Utroque adipisci adolescens eos an, ignota populo tamquam ne sea. Eam at inani labitur numquam. Mei facilis fastidii convenire in, ex corpora oportere conceptam his, ei fabulas maiestatis vituperata eum.</p><p><br></p><p>In vis petentium consulatu, nam mentitum ocurreret accusamus ut. Nulla praesent cum ad, ferri quidam timeam nam eu, suas atqui incorrupte te his. Summo aeque nemore nam te. Qui perpetua forensibus te, ne cum rebum fabulas salutandi, purto saperet delectus duo ne. Mei et duis libris mnesarchum.</p><p><br></p><p>Quo porro commodo scribentur ne, qui ne commodo posidonium, ad alii evertitur quo. Vocibus accommodare ne mel, vel maluisset reformidans ea. Soluta fabellas phaedrum ius id. Odio vide no cum, an has malis probatus neglegentur. An eos feugait intellegat neglegentur.</p><p><br></p><p>Assentior rationibus consequuntur sed ea, nam decore lobortis consectetuer in, ea mei magna eligendi. Id eleifend convenire accommodare sea. Ut nostro quaeque adipiscing vix, te sea iisque scriptorem. Ne qui cibo molestiae, tamquam partiendo usu ex. In dictas detraxit delicata eos, recteque gubergren dissentiunt duo in.</p><p><br></p><p>Mei alterum laoreet quaerendum cu, in tacimates euripidis nam. Te nihil laudem tincidunt est. Labore quodsi vituperatoribus in nam, vide inani aliquip cum ea. Falli docendi imperdiet at est, equidem pericula ad duo, vel minim luptatum nominati ei.</p><p><br></p><p>Vis ea animal invidunt, ius ei alia adipisci erroribus. Has ex malis novum sanctus. Nec posse adversarium cu. Ne erant suscipit mei, ea feugiat propriae eum. Ex quo indoctum sapientem, est modo affert quaeque ne, ea est nisl voluptua vulputate.</p><p><br></p><p>Autem vocent delectus at nam. Ei dico delectus antiopam duo. Per ne recteque petentium conceptam, vix ex affert nullam persecuti. Graece bonorum blandit mei no. Eos tantas prodesset ex, liber dicit scriptorem per ad.</p><p><br></p><p>Et noster conceptam suscipiantur usu, ei semper pertinax ius. Ut sea sanctus gubergren definitiones. Hendrerit persecuti consectetuer eu cum, ex aeque nostrud eos. Te per virtute neglegentur, harum tritani complectitur in pro. Dolor fierent ea usu.</p><p><br></p><p>Vix at omnesque deserunt, eum fugit iriure admodum cu. Civibus expetenda gloriatur et nec. Te brute invidunt usu. Vim ei ferri evertitur. Ne mei tale natum. Autem laudem epicurei et duo.</p><p><br></p><p>Nam principes consectetuer ei. An everti accusata adipiscing mea, ex deleniti delectus repudiare ius. Ei harum ludus noluisse per, cum cu summo utroque mandamus. Ei his persius phaedrum, dolorem hendrerit quo eu. Nibh partem scripta vel ad, qui voluptua concludaturque te, pri te nobis regione philosophia. Sumo atqui quaestio id vix, in ius stet lorem eloquentiam.</p>', 'male', '27.jpg', '2019-08-17 08:17:34', '2019-08-18 01:37:11', 0, NULL),
(28, 'Eric', 'eric-28', 'Eric@gmail.com', '01987897654', 'Plano', 23.00, '<p>Lorem ipsum dolor sit amet, an dicit putent adipisci pro, solum eripuit eos ad. Sit harum solet ridens in, ei nam nihil dolore. Ea quas tractatos signiferumque vix, ne vel diam ferri paulo. At eos ceteros maiestatis democritum, qui scripta alterum ne, et eos amet eirmod. Ne his utroque constituam, saperet oportere eloquentiam per at, no per quidam diceret maiorum. Populo scaevola deterruisset ad mea, ex sit nemore dignissim suscipiantur. Eam meis movet ne, no veri inermis referrentur his.</p><p><br></p><p>Vel habemus vituperata posidonium id, possit singulis electram eam at. Ius mundi iudico patrioque eu, admodum vivendo vel at. Eam id illum evertitur, qui ad mundi utroque vivendo. Pri delenit sensibus ex.</p><p><br></p><p>Unum accusam facilisis eos ex, usu ex legendos voluptatum. Has case veri eleifend ea, ex voluptua delectus torquatos est. Integre concludaturque vix ad, mel denique perfecto ei. Cu laoreet volumus sit. Duo clita latine ne, rebum definiebas et mei.</p><p><br></p><p>Ex probo imperdiet euripidis nec, qui lucilius percipitur theophrastus an. Cum cu corpora adipiscing, nonumy delicata dissentias mel ex, duo te posse oratio rationibus. Mei te paulo elitr, essent verterem nam te, justo volumus inimicus sit et. Id sea posse accumsan, cum cetero probatus gloriatur eu. Ea affert civibus gloriatur pro. Sea te quodsi intellegam.</p><p><br></p><p>Doctus neglegentur ne duo, duo debitis accumsan hendrerit ne, dicta pertinax persequeris nam ne. Ei omnis simul reprehendunt sit, vis idque vulputate in. Nec at liber consulatu, sea ut veniam eirmod. Vidit fabulas eu pri. Pro splendide delicatissimi ad.</p><p><br></p><p>Nisl munere option ea vim, diceret evertitur id ius, his lorem simul suscipit ea. Quaerendum accommodare cu vix, vel adhuc placerat at. Cu mandamus praesent vim, ei sit etiam veniam. Graeco quaeque disputationi eum ea, his te animal audire numquam.</p><p><br></p><p>Sed salutatus dignissim id, qui et laoreet fierent. Mea ubique disputando ex, et agam temporibus qui. Mea id solet saepe verterem, homero commodo ea pro. Id qui illud complectitur. Eam eu dico illud, et dicta iuvaret intellegat pro, sale vituperata cu his.</p><p><br></p><p>Eos dicit semper graecis an. Doctus iisque nec ne, brute repudiare moderatius mea no, duo decore gloriatur ne. Vix omnium postulant intellegat te, no cibo nonumes adipisci duo. Gloriatur scriptorem in pri, dicunt vidisse hendrerit quo ne.</p><p><br></p><p>Vel idque democritum ut, mei vivendo tincidunt ea, in nam quodsi forensibus. Est id adhuc petentium, mea purto delectus ea. Nonumy dignissim est in, wisi facer id nam. Te facete disputando nam, unum natum instructior ei vim. Ius stet ornatus consequuntur no, in mazim primis elaboraret mea, te vim fierent eleifend.</p><p><br></p><p>His adhuc suscipit ex. Feugiat sententiae complectitur te per, ius cu partem democritum, id liber tation habemus qui. Pro an viderer consequuntur, fugit corrumpit at per. Nonumy putant intellegam quo ea.</p>', 'male', '28.png', '2019-08-17 08:18:30', '2019-08-18 01:37:13', 0, NULL),
(29, 'Jesus', 'jesus-29', 'Jesus@gmail.com', '01734254574', 'Toledo', 35.00, '<p>Lorem ipsum dolor sit amet, ius conceptam expetendis id. Wisi quidam persecuti ea has. Pri in causae contentiones, simul veritus ad eos. Congue invidunt evertitur vix at, te quidam reformidans his. Libris epicuri mei eu. Eu vim clita convenire.</p><p><br></p><p>Ut sonet integre fabulas qui, eu vel mazim regione. Ea ocurreret rationibus eam. Has ne postulant conclusionemque. Mel cu quas omittam delectus, ne erant intellegat complectitur vis. An mea ludus feugiat. Ex ius maiorum habemus intellegebat, nam admodum propriae ad, novum accusata in mea.</p><p><br></p><p>Alii assum voluptaria sed at. Debet congue vis no, magna singulis signiferumque ut sea, sint mutat aliquid ex quo. Fugit choro expetendis ius te, eum vidit perfecto vituperata id. Postea invidunt mediocritatem cu per.</p><p><br></p><p>Vero libris tritani est an, ius ne alienum consetetur, qui sonet suscipit scaevola no. Mel ne laudem delicatissimi. Tota vivendo suscipit eam ne, mea timeam platonem conclusionemque an, te his decore vituperatoribus. Ex quaeque bonorum scribentur duo, in sumo animal theophrastus sed. Dolor adipiscing elaboraret ut his.</p><p><br></p><p>Te est regione scriptorem. Cu sit alienum nostrum offendit, corpora iudicabit vim et. Usu ignota maiorum et, ei sea solum eleifend. Affert splendide eu vel. Inimicus torquatos eu vel, pro integre consequat percipitur at, magna justo philosophia ea vix.</p><p><br></p><p>Et sit nullam vivendo gloriatur, eum percipit persecuti te. An qui mucius quaestio vituperatoribus. Mazim laudem legere eam in, ne sea harum fuisset epicuri. Corpora omittam accumsan nam in, mel eu vide oporteat accommodare.</p><p><br></p><p>Id aliquid appellantur vis. Eam nullam tibique an, pro porro velit choro eu. Usu eu augue salutatus, est antiopam cotidieque eu. Ne numquam menandri necessitatibus per. Natum singulis referrentur pro no, mei sale aeterno vituperata id. Eam ea erat possim debitis, similique temporibus per ut.</p><p><br></p><p>In usu aliquam forensibus. Ut has nihil detracto rationibus, ut vis wisi magna, vel vocent perfecto eu. Mundi quando vis ei. Ad omnium vivendum volutpat vel, eu esse petentium has, pri ut unum errem maluisset. Utamur volumus complectitur nec ex. Ex qui tibique scaevola, congue sapientem vis ne, qui ei libris explicari.</p><p><br></p><p>Eu cum labore maiorum intellegat, unum accumsan prodesset ea ius. Duo ex case dolorum. Ipsum oportere ei cum. Qui ne scaevola oportere abhorreant. Ut mel vide probatus, euismod oporteat ad his, has id omnes diceret. Ne mel tibique vituperatoribus, ut eos facete dolores. Vis in prima ludus interpretaris.</p><p><br></p><p>Zril eloquentiam sed te. Ei modo fabellas quo, quod paulo ei mei. Ei porro dolores suscipiantur his, eos at tota qualisque, usu eu aperiri maiestatis. Sit dicat nemore propriae ne. Dicat aliquip tritani cu per. In aliquip laoreet nam, animal voluptaria in eos.</p>', 'male', '29.jpg', '2019-08-17 08:19:22', '2019-08-18 01:37:14', 0, NULL),
(30, 'Blake', 'blake-30', 'Blake@gmail.com', '01237453645', 'Plano', 24.00, '<p>Lorem ipsum dolor sit amet, no mea invenire percipitur, congue maluisset est cu. Pri molestie intellegebat id. Movet graeci nec ut. Facer dicam explicari sed ne.</p><p><br></p><p>Vim dicam quando adipisci ex. Aliquam consequat scripserit ne sea, et mundi democritum persequeris sit. Ad omnium concludaturque his, magna essent explicari ut duo, usu graecis accusam accommodare id. Option aperiam voluptaria at per, his ad consul invenire consequat. Cu pri paulo probatus, te falli probatus pri.</p><p><br></p><p>Eius tollit mea id, modo stet ad sit, mutat euripidis mediocritatem sed id. Numquam dolorem civibus id vim, qui an persius nonumes liberavisse. Mel id facete everti reformidans, ut everti nostrum epicurei vim. Nemore impedit has an. Docendi salutatus delicatissimi sit ei, euismod corpora per at.</p><p><br></p><p>Ferri dolore aperiam per no, harum neglegentur contentiones ius eu. Unum accusamus ea usu. Has legimus theophrastus contentiones et, vel oblique eripuit interpretaris no. Est pericula percipitur quaerendum ea. Blandit comprehensam ut eos.</p><p><br></p><p>Nonumy sanctus mediocritatem eum te, ius noster pertinacia te. Falli exerci latine ex eos. Ornatus convenire eloquentiam duo te, an vis fierent voluptaria inciderint, quem fuisset corrumpit an pro. In eos nisl dolorum instructior, erat justo summo pro ut, te nibh quas prodesset vix. Mei at soluta iuvaret, dicit dolore intellegebat te vim, quo dicam delicata omittantur et. Mel eu congue mediocrem consequat, his ne numquam accusata sensibus. Eu vix essent mandamus appellantur, inani partiendo an nec.</p><p><br></p><p>Et eam alterum epicuri euripidis, ea lorem error sed. Usu ad verterem gubergren, mei cetero nostrud necessitatibus in. Quem quot diceret in mei, duis deleniti accusata eum at. Ea sed quem tritani, vix eu utinam ornatus, cu ius munere noster essent. Id eum elaboraret accommodare, elit feugait gloriatur vim at.</p><p><br></p><p>Ius et diceret dolorum, ius equidem delectus menandri id. Duo oratio ridens sadipscing ex. Habeo libris eirmod nam id, putent probatus ne eum. Invidunt verterem et has. Sea quas affert ne.</p><p><br></p><p>Id nec facer soluta graecis. Ea docendi oporteat cum, labitur aliquando est an. Pri labitur nostrud convenire at, sed duis elaboraret at, volumus scribentur no mea. At per splendide percipitur, mel ne hinc vero electram. Sale tollit necessitatibus at sea, fugit nostrud ea mel. Pro et tation maiorum mediocritatem.</p><p><br></p><p>His an dicta labitur ornatus, eos te suas malis forensibus. Et mea quodsi assentior, ex eos paulo consul option. An invenire sapientem concludaturque sit. Vel platonem efficiantur an, quas legere suscipiantur in per. Ex zril nonumes est, his dissentiet referrentur et, commodo interpretaris ne eum.</p><p><br></p><p>Mea dolore principes ad, et mei prompta percipit. Altera cetero reformidans quo eu, nibh fierent nec te, qui in autem virtute assueverit. Quo iisque periculis an, has posse graecis corrumpit ei. Mea id delenit legimus, et quot prodesset mel. Mazim clita recteque an sit, pri veri apeirian ad. Officiis intellegam his id, iuvaret imperdiet adolescens nec no. Stet novum nec at, mel brute idque complectitur ad.</p>', 'male', '30.jpg', '2019-08-17 08:20:09', '2019-08-18 01:37:15', 0, NULL),
(31, 'Alex', 'alex-31', 'Alex@gmail.com', '01673748324', 'Jersey City', 23.10, '<p>Lorem ipsum dolor sit amet, at patrioque adipiscing vis. Decore homero contentiones vix ut, diam legere persequeris cum cu, vix minim bonorum consetetur no. Ei his zril tritani, latine cotidieque intellegebat usu ea. Ex saperet ponderum est, cu mei decore similique disputando. Eam ne libris patrioque, at qui ceteros dignissim.</p><p><br></p><p>Cu ludus doming suscipit pro, te mea tamquam percipitur. Ne utamur minimum offendit his, ut minim pertinacia signiferumque sed. Invenire democritum cu vis, no sea vero altera definitiones. In est percipit convenire, usu ubique bonorum debitis ei. Quot docendi mei at.</p><p><br></p><p>Feugiat sententiae persequeris in cum, his eu accusam evertitur. Ad modus platonem expetenda duo, vis et dicunt malorum aliquid, an vix tota augue inimicus. Ne sea minim error habemus, dolor adversarium sed at. Nam viris oblique in. Id vim quod expetendis, in quo suscipit lucilius.</p><p><br></p><p>In eam simul feugait, no his tritani sapientem. Tation consectetuer id est, denique nominavi quo ut, graece aliquam omittantur et cum. Nobis nusquam convenire est ut, legere necessitatibus sed an, est an vocent oblique appetere. Latine civibus ius in, dicam maiestatis consequuntur pri cu. Alii diceret no vel, ei ius fabulas tractatos, ne his tota viderer oblique.</p><p><br></p><p>Est cu fugit repudiare adipiscing. Paulo saepe at sed. Qualisque ocurreret mei cu, nec alii aliquid ad. Ignota viderer sensibus ei nec, an usu novum luptatum verterem.</p><p><br></p><p>Cu vis populo utamur indoctum. Per solum dicam dictas ea, stet impetus ius te, vel indoctum posidonium at. Vim partem dignissim interpretaris id, quo cu assum vocibus accommodare. Nec cu ubique tritani, aliquid dissentiet nam ea, vix te copiosae similique. Partem euismod atomorum in quo. Rebum dicant apeirian et eos.</p><p><br></p><p>Sea suas vocibus ut, luptatum partiendo pertinacia at vis. Usu et lobortis mediocrem definitiones, viris munere rationibus nam cu, saepe invidunt intellegam ea pro. Probo primis te sea, fastidii inciderint contentiones sed te. Nec id debet graece erroribus, est fugit explicari voluptatibus cu, causae suavitate necessitatibus mei eu. Sea no ceteros consequat, augue cetero percipitur ei quo, ei eum convenire temporibus.</p><p><br></p><p>Eum novum mazim minimum et. Eos consul phaedrum ex. Per cu homero repudiare, vel prompta sanctus no. Nullam delectus id has. Vis an dictas scriptorem.</p><p><br></p><p>Pri no nostrud invenire delicatissimi, populo sapientem ocurreret ad sit. Labore quidam et mei. Ut omittam ancillae sit, vis iisque admodum eu, eu has meis albucius gubergren. Ad rebum decore melius mea, mel mucius maiorum ut. Ei pro illum tollit.</p><p><br></p><p>Primis insolens definitionem an cum, eu nec petentium complectitur. Ad vim minimum urbanitas, et novum tacimates pri. Solum possit aliquando et quo. Vim ad tempor causae, eu saepe alterum usu. Ut has alii illud, ferri dicant iuvaret quo no, sea sale accusamus temporibus id. Rationibus elaboraret id sea, te has habeo posidonium dissentiet, mei ea duis fugit urbanitas.</p>', 'male', '31.jpeg', '2019-08-17 08:20:52', '2019-08-18 01:37:17', 0, NULL),
(32, 'Malachi', 'malachi-32', 'Malachi@gmail.com', '01734673834', 'Reno', 34.00, '<p>Lorem ipsum dolor sit amet, te mutat expetenda nec, utamur ornatus nec ad. Vocent maluisset appellantur eum ei, vel melius platonem ad. Noluisse comprehensam ex pri. Vim quodsi indoctum et, graeci putant verterem ea vix, cu sed adhuc mazim incorrupte. Ad vim consetetur quaerendum, idque putant volumus vim eu.</p><p><br></p><p>Pri persius nostrud salutandi cu, nihil perfecto ut nec, id exerci altera est. Pri dicam partem aperiam cu, odio delectus platonem ei vel. Nam aeque omnium repudiandae et. Ne per denique insolens tractatos, sea eruditi convenire concludaturque et, mei et lorem paulo. In usu meis ocurreret. Est consul mollis eu, magna dicant eruditi ad qui.</p><p><br></p><p>Eu reque perpetua per, ut albucius recteque vix. In vix agam commodo, probo alienum accusata has ea, meliore complectitur in qui. Amet rationibus ea mea, et debet paulo blandit mel. Platonem electram ei vis, no case nihil eos. Ei atomorum delicata qui, ei erat saepe soluta duo, aeterno qualisque ei sed. In malis exerci sea, abhorreant moderatius ea eum.</p><p><br></p><p>Ne harum affert tempor has, modus decore inermis mel ad. Per quidam viderer ei, eum accusamus prodesset at. Vidit tempor consequuntur ne qui, ius antiopam electram id, movet corpora eu mei. Ut pri munere phaedrum, latine copiosae conclusionemque at eum. Vim molestie eloquentiam contentiones ut, mea ei malis repudiare.</p><p><br></p><p>Mei alienum disputando ex, facilisi dissentiet deterruisset vel ut. Ex euripidis democritum quo, sea ex tota reque sanctus. No persecuti necessitatibus eam, adhuc aperiam honestatis at mel. Case fabellas pro id, unum dignissim suscipiantur id sit. Falli libris eirmod id per.</p><p><br></p><p>Nam tation oblique salutandi in, ne est copiosae consequuntur, ea ius omnium lucilius. Mea ei affert munere inimicus, id qui malis meliore, eu per esse iusto. Erat vidit novum usu cu. Eam modus denique convenire ea, et sed fabulas feugait convenire.</p><p><br></p><p>Graeci aeterno no mel, magna vitae euismod eum et. Cum timeam scribentur ad, ius ut natum errem singulis. Cum at labore praesent, at vix augue labores similique, habeo appellantur conclusionemque duo ex. Cum tota periculis et, eam nisl feugait omittantur in. Ut placerat electram sit, enim euismod no duo.</p><p><br></p><p>Eu veri fastidii tractatos eum, sint laudem nonumes vix eu, feugait sadipscing et vim. Mutat sanctus constituam at mel, per ut quod brute accusamus. Modus elitr eum cu. Duo invenire incorrupte consectetuer in, zril commodo cotidieque no pro. Integre habemus cu mei, quando vidisse voluptatum quo ex.</p><p><br></p><p>No quem convenire sit, tantas definitionem pri ei. Te malis errem sed, ea essent imperdiet eloquentiam mea. Nam mutat fabulas consectetuer cu. Veritus alienum intellegebat ea usu, modo vidit congue ne per, vix omnes menandri laboramus ea. Eum cu reque integre, qui no dicunt pericula convenire, per cu quidam omnium salutandi.</p><p><br></p><p>Partem iuvaret incorrupte sed id. Mei ei veniam homero consequat, amet inermis explicari eam ea. Ad nec natum munere laboramus, sea at reque labore. Ut vidit officiis splendide cum, magna assum percipitur quo te, no nemore aperiri vix.</p>', 'male', '32.jpg', '2019-08-17 08:23:09', '2019-08-18 01:37:18', 0, NULL),
(33, 'Brody', 'brody-33', 'Brody@gmail.com', '01734832454', 'Irving', 34.30, '<p>Lorem ipsum dolor sit amet, his repudiare laboramus et. Quo cu prima nobis, ut has soleat nonumes intellegebat. Placerat platonem persequeris cu quo, ut sint harum expetenda nec, eam ea noster nusquam consequuntur. Posse deleniti ei est, in vis modus timeam. Has rebum nulla ei, cu nostro civibus nam. Consul nostro mea cu. Eam vidit feugiat in, no nec animal scripserit.</p><p><br></p><p>Graeco alterum atomorum his ea, qui paulo postulant an. Nisl dicam no vix, everti gubergren nec ne. Quod omnium expetendis at sea. An eum commodo lobortis, sea diam convenire id. Graecis theophrastus usu ad, nec possit impetus senserit eu, pri euismod accumsan cu. Tempor scaevola patrioque eam an, ad vix omnis numquam.</p><p><br></p><p>Delicata laboramus pro id. Vis vitae evertitur adversarium et. Facer causae scripserit mel cu, eam ne nemore feugait disputando. Cum aliquip admodum tacimates ex. Sumo sint dicam ea usu, ius numquam argumentum ei. Eum no pertinax volutpat molestiae, vim paulo interpretaris cu, tantas eligendi vix ei.</p><p><br></p><p>Ut timeam adversarium ius. Eum omnis partiendo efficiendi eu, in praesent efficiantur vis. Ex usu brute facilis urbanitas, vel te natum conceptam intellegam. Dolor definiebas delicatissimi sit at, eos et nulla vitae. Te vix ignota qualisque, id nisl impetus similique his, mei eu omnis propriae.</p><p><br></p><p>Menandri petentium vituperatoribus vix et. Audiam consetetur vel ex, adhuc mazim fabellas vix at, vivendum mediocrem gloriatur an pri. At nam iudico corrumpit, dicta necessitatibus vel cu. Mea nonumy equidem an, mei ut partem commune, ad copiosae necessitatibus sit. Mel iudico oratio no.</p><p><br></p><p>An mea urbanitas definiebas, ea vis quem phaedrum gubergren. Pri mediocrem dissentias id, apeirian ullamcorper ut eam. Elit exerci fuisset ea mei. Decore verear at eam. Cum te sumo facete, cu vim equidem tincidunt. Assentior similique et has.</p><p><br></p><p>Meis utinam officiis an est, constituam efficiantur mea no, per vero congue iracundia at. Dicunt incorrupte ne mel. Aeterno platonem an mei, reque nostro facilisi mel at, quo ne elit mollis iracundia. In dico inermis ponderum sit, te vis cetero commune recusabo. Lobortis scribentur pri ea.</p><p><br></p><p>Sit inani philosophia ex, sumo mazim ut qui, ne consetetur definitiones vis. Assum liber molestiae qui an. Eos te habemus maluisset, eu tibique facilisi adversarium eam. Nonumy eruditi moderatius ad per. Nostro aperiam docendi at sed, et mei modo vocent reformidans.</p><p><br></p><p>Altera iuvaret repudiare nam an, inani aliquip ei vix, nec ne vitae suscipit dissentiunt. Pro eu quis decore epicurei. Graece omnium constituam eum ad, sed et discere detracto lucilius. Dolor legimus ullamcorper ius id. In eum veri rationibus, ut impedit contentiones eam, legere postea recusabo ei sea. Adipisci argumentum sadipscing mea ne.</p><p><br></p><p>Ut his velit harum hendrerit. No democritum interesset nam, has ei iuvaret blandit. At ius nibh paulo voluptua, iisque referrentur ius id. Id sonet sanctus mea. Vix dicta adolescens et, vim graeci melius et.</p>', 'male', '33.jpg', '2019-08-17 08:24:19', '2019-08-18 01:37:19', 0, NULL),
(34, 'Brantley', 'brantley-34', 'Brantley@gmail.com', '01734823923', 'Garland', 32.00, '<p>Lorem ipsum dolor sit amet, an porro postulant sit, an qui nostrum dolores. At his graeco utroque convenire, usu essent erroribus ut. Virtute fabellas eu vis. Pro te elitr euripidis suscipiantur. In est magna dicat docendi.</p><p><br></p><p>Mei no paulo placerat, eius affert accusamus qui an. Nec et erant dolorem, eu duo altera propriae copiosae. Eam no laudem noluisse sensibus, at blandit corrumpit pertinacia mel. Ad sed rebum perpetua, eum ad enim putant. Ut vis nibh debitis reprehendunt, eum paulo commune ut.</p><p><br></p><p>Minimum hendrerit an qui. Ei usu legere adversarium, has recteque deseruisse ei. Ad pri odio petentium, quo aliquid intellegat in, vix ludus convenire delicatissimi et. An ius urbanitas omittantur, nec cu utroque accusam. Facer legendos erroribus ad sea, mei at dicit dolorem. Ea mel etiam inimicus.</p><p><br></p><p>Pro nobis noluisse ad. Eum erant labitur in, ei vel iusto noster, eum quas mazim munere no. Dicant veniam melius ex quo. Sensibus constituto eu has. Qui ei simul admodum accumsan, dicit incorrupte eu mei, labores apeirian insolens te eum. Qui alia primis in, est et diceret eruditi, facer menandri reprehendunt ea vim.</p><p><br></p><p>Minim affert tollit ea vix. Esse laudem partem an vel. Est falli aperiam abhorreant ad, ex eius dicunt molestiae eam, est labores detraxit ut. Expetenda incorrupte his ei, ex malis denique maluisset vis, posse labores accusamus id quo.</p><p><br></p><p>Sit ut nisl ceteros, vocent abhorreant conclusionemque te eos. Te usu autem malis. Ut nec dicunt molestie voluptatum, vix deseruisse honestatis appellantur et. Has patrioque constituto cu, ea est iusto graecis recusabo. Sed cu quod dolorum, ne vis ullum nullam commodo. Labore omittantur cu has. Reque nobis mnesarchum an vis.</p><p><br></p><p>Ut pro aperiam facilis tincidunt, in partem inermis pri, usu alienum menandri assentior at. Ex discere persequeris his, sed et laoreet adipiscing. Congue cetero disputationi id nec. Dolorem honestatis in eum.</p><p><br></p><p>Platonem intellegam id vel. Est magna iuvaret in, tritani prodesset vim cu. Mei ex unum dolor salutandi, eum ad dicunt atomorum dissentiet. Tale labore nominati duo ea.</p><p><br></p><p>His eu saepe verear, vim hinc iracundia ea. Ex ludus debitis fuisset vel, ea semper docendi vituperata eam, sit libris assueverit no. Ex pro omnis mediocritatem, aliquam legimus ponderum est ea, pro ei placerat electram. Id vim nibh choro. Ad vis perpetua comprehensam, in copiosae referrentur nam. Eu per paulo doming, purto repudiandae pro ea.</p><p><br></p><p>Usu ipsum civibus expetendis et, splendide scripserit in mea. Vim mundi dolorem in, scripta appareat conceptam an nam. Eos aeque oblique singulis ad, id prima voluptua vel, diceret denique te eum. Sint possim mollis vel at, cum ex option qualisque aliquando.</p>', 'male', '34.jpg', '2019-08-17 08:26:38', '2019-08-18 01:37:20', 0, NULL),
(35, 'MH Hridoy', 'mh-hridoy-35', 'mg@mail.com', '018529637410', 'Mirpur, Dhaka, Bangladesh', 18.60, '<p>Conscious of its spiritual and moral heritage, the Union is founded on the indivisible, universal values of human dignity, freedom, equality and solidarity; it is based on the principles of democracy and the rule of law. It places the individual at the heart of its activities, by establishing the citizenship of the Union and by creating an area of freedom, security and justice.</p><p>Conscious of its spiritual and moral heritage, the Union is founded on the indivisible, universal values of human dignity, freedom, equality and solidarity; it is based on the principles of democracy and the rule of law. It places the individual at the heart of its activities, by establishing the citizenship of the Union and by creating an area of freedom, security and justice.</p><p><br></p><p>Conscious of its spiritual and moral heritage, the Union is founded on the indivisible, universal values of human dignity, freedom, equality and solidarity; it is based on the principles of democracy and the rule of law. It places the individual at the heart of its activities, by establishing the citizenship of the Union and by creating an area of freedom, security and justice.</p><p><br></p><p>Conscious of its spiritual and moral heritage, the Union is founded on the indivisible, universal values of human dignity, freedom, equality and solidarity; it is based on the principles of democracy and the rule of law. It places the individual at the heart of its activities, by establishing the citizenship of the Union and by creating an area of freedom, security and justice.</p><p>Conscious of its spiritual and moral heritage, the Union is founded on the indivisible, universal values of human dignity, freedom, equality and solidarity; it is based on the principles of democracy and the rule of law. It places the individual at the heart of its activities, by establishing the citizenship of the Union and by creating an area of freedom, security and justice.</p><p>Conscious of its spiritual and moral heritage, the Union is founded on the indivisible, universal values of human dignity, freedom, equality and solidarity; it is based on the principles of democracy and the rule of law. It places the individual at the heart of its activities, by establishing the citizenship of the Union and by creating an area of freedom, security and justice.</p><p><br></p><p>Conscious of its spiritual and moral heritage, the Union is founded on the indivisible, universal values of human dignity, freedom, equality and solidarity; it is based on the principles of democracy and the rule of law. It places the individual at the heart of its activities, by establishing the citizenship of the Union and by creating an area of freedom, security and justice.</p><p><br></p><p>Conscious of its spiritual and moral heritage, the Union is founded on the indivisible, universal values of human dignity, freedom, equality and solidarity; it is based on the principles of democracy and the rule of law. It places the individual at the heart of its activities, by establishing the citizenship of the Union and by creating an area of freedom, security and justice.</p><p><br></p><hr><p>Conscious of its spiritual and moral heritage, the Union is founded on the indivisible, universal values of human dignity, freedom, equality and solidarity; it is based on the principles of democracy and the rule of law. It places the individual at the heart of its activities, by establishing the citizenship of the Union and by creating an area of freedom, security and justice.<br></p>', 'male', 'default.png', '2019-08-17 21:13:28', '2019-08-18 01:37:21', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_courts`
--

CREATE TABLE `lawyer_courts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lawyers_id` bigint(20) UNSIGNED NOT NULL,
  `courts_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyer_courts`
--

INSERT INTO `lawyer_courts` (`id`, `lawyers_id`, `courts_id`, `created_at`, `updated_at`) VALUES
(42, 6, 6, NULL, NULL),
(43, 6, 9, NULL, NULL),
(44, 6, 11, NULL, NULL),
(45, 6, 12, NULL, NULL),
(46, 7, 10, NULL, NULL),
(47, 7, 13, NULL, NULL),
(48, 7, 15, NULL, NULL),
(49, 8, 9, NULL, NULL),
(50, 8, 10, NULL, NULL),
(51, 8, 12, NULL, NULL),
(52, 8, 13, NULL, NULL),
(53, 9, 13, NULL, NULL),
(54, 9, 14, NULL, NULL),
(55, 9, 15, NULL, NULL),
(56, 10, 10, NULL, NULL),
(57, 10, 12, NULL, NULL),
(63, 11, 9, NULL, NULL),
(64, 11, 11, NULL, NULL),
(65, 11, 12, NULL, NULL),
(66, 11, 14, NULL, NULL),
(67, 12, 6, NULL, NULL),
(68, 12, 11, NULL, NULL),
(69, 12, 14, NULL, NULL),
(70, 13, 6, NULL, NULL),
(71, 13, 13, NULL, NULL),
(72, 14, 6, NULL, NULL),
(73, 14, 14, NULL, NULL),
(74, 14, 15, NULL, NULL),
(75, 15, 9, NULL, NULL),
(76, 15, 11, NULL, NULL),
(77, 15, 12, NULL, NULL),
(78, 15, 13, NULL, NULL),
(86, 18, 6, NULL, NULL),
(87, 18, 9, NULL, NULL),
(88, 18, 11, NULL, NULL),
(89, 18, 12, NULL, NULL),
(90, 18, 13, NULL, NULL),
(91, 19, 9, NULL, NULL),
(92, 19, 11, NULL, NULL),
(93, 19, 13, NULL, NULL),
(94, 19, 14, NULL, NULL),
(95, 20, 10, NULL, NULL),
(96, 20, 11, NULL, NULL),
(97, 20, 12, NULL, NULL),
(98, 20, 13, NULL, NULL),
(99, 21, 9, NULL, NULL),
(100, 21, 11, NULL, NULL),
(101, 21, 12, NULL, NULL),
(102, 21, 13, NULL, NULL),
(103, 21, 15, NULL, NULL),
(104, 22, 9, NULL, NULL),
(105, 22, 10, NULL, NULL),
(106, 22, 12, NULL, NULL),
(107, 22, 13, NULL, NULL),
(108, 22, 14, NULL, NULL),
(109, 23, 10, NULL, NULL),
(110, 23, 12, NULL, NULL),
(111, 23, 13, NULL, NULL),
(112, 23, 15, NULL, NULL),
(113, 23, 17, NULL, NULL),
(114, 24, 13, NULL, NULL),
(115, 24, 14, NULL, NULL),
(116, 24, 15, NULL, NULL),
(121, 25, 6, NULL, NULL),
(122, 25, 9, NULL, NULL),
(123, 25, 10, NULL, NULL),
(124, 25, 14, NULL, NULL),
(125, 26, 11, NULL, NULL),
(126, 26, 12, NULL, NULL),
(127, 26, 14, NULL, NULL),
(128, 26, 15, NULL, NULL),
(129, 27, 13, NULL, NULL),
(130, 27, 14, NULL, NULL),
(131, 27, 15, NULL, NULL),
(132, 28, 11, NULL, NULL),
(133, 28, 13, NULL, NULL),
(134, 28, 15, NULL, NULL),
(135, 29, 12, NULL, NULL),
(136, 29, 13, NULL, NULL),
(137, 29, 15, NULL, NULL),
(138, 30, 9, NULL, NULL),
(139, 30, 10, NULL, NULL),
(140, 30, 11, NULL, NULL),
(141, 32, 11, NULL, NULL),
(142, 32, 12, NULL, NULL),
(143, 32, 13, NULL, NULL),
(148, 34, 6, NULL, NULL),
(149, 34, 9, NULL, NULL),
(150, 34, 13, NULL, NULL),
(151, 16, 6, NULL, NULL),
(152, 16, 10, NULL, NULL),
(153, 16, 11, NULL, NULL),
(154, 16, 13, NULL, NULL),
(155, 17, 13, NULL, NULL),
(156, 17, 14, NULL, NULL),
(157, 17, 15, NULL, NULL),
(158, 33, 10, NULL, NULL),
(159, 33, 12, NULL, NULL),
(160, 33, 13, NULL, NULL),
(161, 33, 14, NULL, NULL),
(162, 33, 15, NULL, NULL),
(163, 33, 17, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_practice_areas`
--

CREATE TABLE `lawyer_practice_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lawyers_id` bigint(20) UNSIGNED NOT NULL,
  `practice_areas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyer_practice_areas`
--

INSERT INTO `lawyer_practice_areas` (`id`, `lawyers_id`, `practice_areas_id`, `created_at`, `updated_at`) VALUES
(14, 6, 10, NULL, NULL),
(15, 6, 11, NULL, NULL),
(16, 6, 12, NULL, NULL),
(17, 6, 13, NULL, NULL),
(18, 6, 14, NULL, NULL),
(19, 7, 12, NULL, NULL),
(20, 8, 10, NULL, NULL),
(21, 9, 12, NULL, NULL),
(22, 10, 11, NULL, NULL),
(24, 11, 11, NULL, NULL),
(25, 11, 12, NULL, NULL),
(27, 12, 12, NULL, NULL),
(28, 13, 11, NULL, NULL),
(29, 13, 12, NULL, NULL),
(30, 14, 12, NULL, NULL),
(31, 14, 14, NULL, NULL),
(32, 15, 12, NULL, NULL),
(33, 15, 13, NULL, NULL),
(40, 18, 7, NULL, NULL),
(42, 18, 11, NULL, NULL),
(43, 19, 10, NULL, NULL),
(44, 19, 11, NULL, NULL),
(45, 20, 7, NULL, NULL),
(47, 20, 10, NULL, NULL),
(48, 21, 10, NULL, NULL),
(49, 21, 11, NULL, NULL),
(50, 21, 12, NULL, NULL),
(52, 22, 10, NULL, NULL),
(53, 22, 11, NULL, NULL),
(54, 22, 13, NULL, NULL),
(55, 23, 10, NULL, NULL),
(56, 23, 11, NULL, NULL),
(57, 23, 12, NULL, NULL),
(58, 24, 12, NULL, NULL),
(59, 24, 13, NULL, NULL),
(62, 25, 11, NULL, NULL),
(63, 25, 12, NULL, NULL),
(64, 26, 12, NULL, NULL),
(65, 26, 13, NULL, NULL),
(66, 27, 12, NULL, NULL),
(68, 28, 10, NULL, NULL),
(69, 28, 13, NULL, NULL),
(70, 29, 11, NULL, NULL),
(71, 29, 12, NULL, NULL),
(72, 30, 10, NULL, NULL),
(73, 30, 11, NULL, NULL),
(74, 32, 11, NULL, NULL),
(75, 32, 12, NULL, NULL),
(78, 34, 10, NULL, NULL),
(79, 34, 11, NULL, NULL),
(80, 16, 10, NULL, NULL),
(81, 16, 11, NULL, NULL),
(82, 16, 12, NULL, NULL),
(83, 17, 12, NULL, NULL),
(84, 17, 13, NULL, NULL),
(85, 33, 6, NULL, NULL),
(86, 33, 7, NULL, NULL),
(87, 33, 8, NULL, NULL),
(89, 33, 10, NULL, NULL),
(90, 33, 11, NULL, NULL),
(91, 33, 12, NULL, NULL),
(92, 33, 13, NULL, NULL),
(93, 33, 14, NULL, NULL),
(94, 33, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_ratings`
--

CREATE TABLE `lawyer_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lawyers_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `ratings` double(8,2) NOT NULL,
  `feedback` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyer_ratings`
--

INSERT INTO `lawyer_ratings` (`id`, `lawyers_id`, `users_id`, `ratings`, `feedback`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 6, 3, 5.00, 'This is very nice lawyers.', 1, NULL, '2019-08-29 11:51:09', NULL),
(9, 29, 1, 5.00, 'Laravel Partners are elite shops providing top-notch Laravel development and consulting. Each of our partners can help you craft a beautiful, well-architected project.', 1, '2019-08-29 12:10:54', '2019-08-29 12:11:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_specializations`
--

CREATE TABLE `lawyer_specializations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lawyers_id` bigint(20) UNSIGNED NOT NULL,
  `specializations_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyer_specializations`
--

INSERT INTO `lawyer_specializations` (`id`, `lawyers_id`, `specializations_id`, `created_at`, `updated_at`) VALUES
(12, 6, 4, NULL, NULL),
(13, 6, 5, NULL, NULL),
(14, 6, 6, NULL, NULL),
(15, 6, 8, NULL, NULL),
(16, 6, 9, NULL, NULL),
(17, 6, 10, NULL, NULL),
(18, 6, 11, NULL, NULL),
(19, 6, 13, NULL, NULL),
(20, 7, 15, NULL, NULL),
(21, 8, 5, NULL, NULL),
(22, 8, 7, NULL, NULL),
(23, 8, 9, NULL, NULL),
(24, 8, 10, NULL, NULL),
(25, 9, 7, NULL, NULL),
(26, 9, 10, NULL, NULL),
(27, 9, 11, NULL, NULL),
(28, 10, 4, NULL, NULL),
(29, 10, 5, NULL, NULL),
(30, 10, 7, NULL, NULL),
(34, 11, 8, NULL, NULL),
(35, 11, 9, NULL, NULL),
(36, 12, 7, NULL, NULL),
(37, 13, 7, NULL, NULL),
(38, 13, 9, NULL, NULL),
(39, 14, 11, NULL, NULL),
(40, 14, 12, NULL, NULL),
(41, 15, 6, NULL, NULL),
(42, 15, 7, NULL, NULL),
(43, 15, 8, NULL, NULL),
(44, 15, 10, NULL, NULL),
(52, 18, 7, NULL, NULL),
(53, 18, 8, NULL, NULL),
(54, 18, 9, NULL, NULL),
(55, 19, 6, NULL, NULL),
(56, 19, 7, NULL, NULL),
(57, 20, 6, NULL, NULL),
(58, 20, 7, NULL, NULL),
(59, 20, 9, NULL, NULL),
(60, 20, 10, NULL, NULL),
(61, 21, 8, NULL, NULL),
(62, 22, 6, NULL, NULL),
(63, 22, 7, NULL, NULL),
(64, 22, 8, NULL, NULL),
(65, 22, 11, NULL, NULL),
(66, 23, 9, NULL, NULL),
(67, 23, 10, NULL, NULL),
(68, 23, 11, NULL, NULL),
(69, 24, 7, NULL, NULL),
(70, 24, 8, NULL, NULL),
(71, 24, 11, NULL, NULL),
(75, 25, 7, NULL, NULL),
(76, 25, 9, NULL, NULL),
(77, 25, 10, NULL, NULL),
(78, 26, 7, NULL, NULL),
(79, 26, 10, NULL, NULL),
(80, 26, 11, NULL, NULL),
(81, 27, 4, NULL, NULL),
(82, 27, 5, NULL, NULL),
(83, 27, 7, NULL, NULL),
(84, 28, 5, NULL, NULL),
(85, 28, 7, NULL, NULL),
(86, 28, 10, NULL, NULL),
(87, 29, 7, NULL, NULL),
(88, 29, 8, NULL, NULL),
(89, 29, 9, NULL, NULL),
(90, 30, 6, NULL, NULL),
(91, 30, 7, NULL, NULL),
(92, 30, 8, NULL, NULL),
(93, 32, 7, NULL, NULL),
(94, 32, 8, NULL, NULL),
(95, 32, 9, NULL, NULL),
(96, 32, 10, NULL, NULL),
(100, 34, 7, NULL, NULL),
(101, 34, 9, NULL, NULL),
(102, 16, 6, NULL, NULL),
(103, 16, 8, NULL, NULL),
(104, 16, 9, NULL, NULL),
(105, 17, 9, NULL, NULL),
(106, 17, 10, NULL, NULL),
(107, 17, 11, NULL, NULL),
(108, 33, 4, NULL, NULL),
(109, 33, 5, NULL, NULL),
(110, 33, 6, NULL, NULL),
(111, 33, 8, NULL, NULL),
(112, 33, 9, NULL, NULL),
(113, 33, 10, NULL, NULL),
(114, 33, 11, NULL, NULL),
(115, 33, 12, NULL, NULL),
(116, 33, 13, NULL, NULL);

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
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2019_08_14_060634_create_specializations_table', 1),
(25, '2019_08_14_060701_create_courts_table', 1),
(27, '2019_08_14_095418_create_user_roles_table', 1),
(28, '2019_08_14_095701_create_practice_areas_table', 1),
(34, '2019_08_14_060715_create_lawyers_table', 2),
(40, '2019_08_16_095100_create_lawyer_courts_table', 3),
(41, '2019_08_16_095928_create_lawyer_specializations_table', 3),
(42, '2019_08_16_100340_create_lawyer_practice_areas_table', 3),
(47, '2019_08_18_060300_create_sites_table', 5),
(48, '2019_08_17_075618_create_lawyer_ratings_table', 6),
(49, '2019_08_31_154414_create_blog_posts_table', 7),
(50, '2019_08_31_154725_create_blog_comments_table', 7),
(51, '2019_08_31_154806_create_blog_categories_table', 7),
(52, '2019_08_31_154826_create_blog_post_categories_table', 8),
(53, '2019_08_31_154902_create_blog_post_tags_table', 8);

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
-- Table structure for table `practice_areas`
--

CREATE TABLE `practice_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `practice_areas`
--

INSERT INTO `practice_areas` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Arbitration', 'arbitration', '2019-08-16 05:30:43', '2019-08-16 05:51:24', NULL),
(7, 'Cheque Bounce', 'cheque-bounce', '2019-08-16 05:30:51', NULL, NULL),
(8, 'Child Custody', 'child-custody', '2019-08-16 05:30:58', NULL, NULL),
(10, 'Documentation', 'documentation', '2019-08-16 05:31:11', NULL, NULL),
(11, 'Domestic Violence', 'domestic-violence', '2019-08-16 05:31:23', NULL, NULL),
(12, 'Family', 'family', '2019-08-16 05:31:30', '2019-08-18 02:27:11', NULL),
(13, 'Muslim Law', 'muslim-law', '2019-08-16 05:31:40', NULL, NULL),
(14, 'Property', 'property', '2019-08-16 05:31:47', NULL, NULL),
(15, 'Recovery', 'recovery', '2019-08-16 05:31:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mysite',
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-logo.jpg',
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-footer-logo.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `slug`, `name`, `phone`, `email`, `address`, `description`, `logo`, `footer_logo`, `created_at`, `updated_at`) VALUES
(1, 'mysite', 'Legal Justice Aid', '01994387497', 'smitexpert@gmail.com', 'Haji Muktijuddha Joynal Abedin Market, Dhaka, Bangladesh', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'legal-justice-aid.png', 'default-footer-logo.jpg', '2019-08-18 04:12:56', '2019-08-18 04:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'File for Divorce', 'file-for-divorce', '2019-08-16 05:49:04', NULL, NULL),
(5, 'Reply / Send Legal Notice for Divorce', 'reply-send-legal-notice-for-divorce', '2019-08-16 05:49:10', NULL, NULL),
(6, 'Contest / Appeal in Divorce Case', 'contest-appeal-in-divorce-case', '2019-08-16 05:49:17', NULL, NULL),
(7, 'Dowry Demand / Domestic Violence / Abuse', 'dowry-demand-domestic-violence-abuse', '2019-08-16 05:49:23', NULL, NULL),
(8, 'Alimony / Maintenance Issue', 'alimony-maintenance-issue', '2019-08-16 05:49:30', NULL, NULL),
(9, 'Child Custody Issue', 'child-custody-issue', '2019-08-16 05:49:36', NULL, NULL),
(10, 'Extramarital Affair / Cheating', 'extramarital-affair-cheating', '2019-08-16 05:49:41', '2019-08-18 02:25:08', NULL),
(11, 'Muslim Marriage Issues', 'muslim-marriage-issues', '2019-08-16 05:49:47', NULL, NULL),
(12, 'Marital Finance / Property Issues', 'marital-finance-property-issues', '2019-08-16 05:49:54', NULL, NULL),
(13, 'Family / In-law Problems', 'family-in-law-problems', '2019-08-16 05:50:00', NULL, NULL),
(14, 'Property Documentation / Verification', 'property-documentation-verification', '2019-08-16 05:50:09', NULL, NULL),
(15, 'Family Property Dispute', 'family-property-dispute', '2019-08-16 05:50:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_role` bigint(20) NOT NULL DEFAULT 7,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `user_role`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sujan Molla', 'smitexpert@gmail.com', NULL, 1, '$2y$10$OrBGSSTw.istf96Mrp.j1O1uJ5.rq9bl16UBuM6YpBKGvire2OO5G', 'tJsDqm5pHWHoJlMXgbqXYGeGUHHeuHjFbSiiOr0kYORvGo404gD3ibF6AjOg', '2019-08-14 04:35:53', '2019-08-14 04:35:53', NULL),
(3, 'MH Hridoy', 'mh@gmail.com', NULL, 2, '$2y$10$aQJocDPg80KL0H4vZiL96ukwwhbsSwFxs0bnfA/AT3dpfUOwTfcdq', NULL, NULL, '2019-08-16 06:24:03', NULL),
(4, 'AM Sezan', 'amsezan.bd@gmail.com', NULL, 1, '$2y$10$biyjpoyt5Ce//J4FN9LJSe5SCFX86dXQvQbSgt2FM/sblla02gMdm', NULL, '2019-08-15 01:32:45', '2019-08-15 01:33:36', NULL),
(5, 'Sujan Molla', 'sm@gmail.com', NULL, 7, '$2y$10$B.kCYYsh8zR.AK.2JcsxFOg2LQ8cY7wpExmz/M0OANhS4NwL9ASAe', 'AS6J07YCIogQV6zf4C42AqYsVCEDJ25Xuq4tWW82S2P06TRnpIGnFRlrHAIB', '2019-08-17 00:31:06', '2019-08-17 00:32:25', NULL),
(6, 'SMSunny', 'rohoman.bd.com@gmail.com', NULL, 3, '$2y$10$wq0hnxDSh76rjMs/fq8B9OAWosPaw5kNvBgSCGd70v6b9Inh2Gt2m', NULL, '2019-08-17 01:31:00', '2019-08-17 01:32:04', NULL),
(7, 'Sujan Trail', 'sujantr@mail.com', NULL, 2, '$2y$10$duqJQ0lENsILhjoxh9/u8eYddm7i2KOpVZw.Ih.C6bN0N0XR/X3la', NULL, '2019-08-30 02:24:55', '2019-08-30 02:24:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rule_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `rule_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '2019-08-13 18:00:00', NULL, NULL),
(2, 'Manager', '2019-08-15 18:00:00', NULL, NULL),
(3, 'Author', '2019-08-13 18:00:00', NULL, NULL),
(4, 'Moderator', '2019-08-13 18:00:00', NULL, NULL),
(5, 'User', '2019-08-13 18:00:00', NULL, NULL),
(6, 'Client', '2019-08-13 18:00:00', NULL, NULL),
(7, 'Subscriber', '2019-08-13 18:00:00', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post_categories`
--
ALTER TABLE `blog_post_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_post_categories_cateogry_id_foreign` (`cateogry_id`),
  ADD KEY `blog_post_categories_post_id_foreign` (`post_id`);

--
-- Indexes for table `blog_post_tags`
--
ALTER TABLE `blog_post_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_post_tags_post_id_foreign` (`post_id`);

--
-- Indexes for table `courts`
--
ALTER TABLE `courts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyers`
--
ALTER TABLE `lawyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_courts`
--
ALTER TABLE `lawyer_courts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lawyer_courts_lawyers_id_foreign` (`lawyers_id`),
  ADD KEY `lawyer_courts_courts_id_foreign` (`courts_id`);

--
-- Indexes for table `lawyer_practice_areas`
--
ALTER TABLE `lawyer_practice_areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lawyer_practice_areas_lawyers_id_foreign` (`lawyers_id`),
  ADD KEY `lawyer_practice_areas_practice_areas_id_foreign` (`practice_areas_id`);

--
-- Indexes for table `lawyer_ratings`
--
ALTER TABLE `lawyer_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lawyer_ratings_lawyers_id_foreign` (`lawyers_id`),
  ADD KEY `lawyer_ratings_users_id_foreign` (`users_id`);

--
-- Indexes for table `lawyer_specializations`
--
ALTER TABLE `lawyer_specializations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lawyer_specializations_lawyers_id_foreign` (`lawyers_id`),
  ADD KEY `lawyer_specializations_specializations_id_foreign` (`specializations_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `practice_areas`
--
ALTER TABLE `practice_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_post_categories`
--
ALTER TABLE `blog_post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_post_tags`
--
ALTER TABLE `blog_post_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courts`
--
ALTER TABLE `courts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `lawyers`
--
ALTER TABLE `lawyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `lawyer_courts`
--
ALTER TABLE `lawyer_courts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `lawyer_practice_areas`
--
ALTER TABLE `lawyer_practice_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `lawyer_ratings`
--
ALTER TABLE `lawyer_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lawyer_specializations`
--
ALTER TABLE `lawyer_specializations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `practice_areas`
--
ALTER TABLE `practice_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_post_categories`
--
ALTER TABLE `blog_post_categories`
  ADD CONSTRAINT `blog_post_categories_cateogry_id_foreign` FOREIGN KEY (`cateogry_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_post_categories_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog_post_tags`
--
ALTER TABLE `blog_post_tags`
  ADD CONSTRAINT `blog_post_tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lawyer_courts`
--
ALTER TABLE `lawyer_courts`
  ADD CONSTRAINT `lawyer_courts_courts_id_foreign` FOREIGN KEY (`courts_id`) REFERENCES `courts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lawyer_courts_lawyers_id_foreign` FOREIGN KEY (`lawyers_id`) REFERENCES `lawyers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lawyer_practice_areas`
--
ALTER TABLE `lawyer_practice_areas`
  ADD CONSTRAINT `lawyer_practice_areas_lawyers_id_foreign` FOREIGN KEY (`lawyers_id`) REFERENCES `lawyers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lawyer_practice_areas_practice_areas_id_foreign` FOREIGN KEY (`practice_areas_id`) REFERENCES `practice_areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lawyer_ratings`
--
ALTER TABLE `lawyer_ratings`
  ADD CONSTRAINT `lawyer_ratings_lawyers_id_foreign` FOREIGN KEY (`lawyers_id`) REFERENCES `lawyers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lawyer_ratings_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lawyer_specializations`
--
ALTER TABLE `lawyer_specializations`
  ADD CONSTRAINT `lawyer_specializations_lawyers_id_foreign` FOREIGN KEY (`lawyers_id`) REFERENCES `lawyers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lawyer_specializations_specializations_id_foreign` FOREIGN KEY (`specializations_id`) REFERENCES `specializations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
