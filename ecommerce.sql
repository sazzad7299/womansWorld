-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 22, 2023 at 06:40 PM
-- Server version: 5.7.36
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=inacive,1=active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_name_unique` (`name`),
  UNIQUE KEY `brands_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(11, 'New Brand', 'new-brand', 'public/images/brands/2023040304264820230330084303logo.png', 1, '2023-04-02 22:26:48', '2023-04-02 22:26:48'),
(12, 'sbdj', 'sbdj', 'public/images/brands/20230403043015logo.png', 0, '2023-04-02 22:30:15', '2023-04-02 22:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=inactive,1=active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_parent_id_index` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'impedit', 'impedit', NULL, 'public/images/categories/vFgJPBVfbPUMpVmurnxcRa8Pl3n37ElMjm03zu7j.jpg', 1, '2023-04-02 01:13:40', '2023-09-27 14:28:48'),
(2, 'animi', 'name', NULL, 'public/images/categories/nM4gOiQsXFbmFkjUNpGRgACkwGaOM7bdoGfakPel.jpg', 0, '2023-04-02 01:13:40', '2023-04-02 01:13:40'),
(3, 'atque', 'name', 1, 'public/images/categories/TfGDBFaQloZrkdMvSgT90qSiYqwxzYI1rwAvb0U9.jpg', 1, '2023-04-02 01:13:40', '2023-09-27 13:35:28'),
(4, 'voluptas', 'name', NULL, 'public/images/categories/pWMPq40INubbhuQntxpZ4jC1fnLdln0pqrAj3nCW.jpg', 0, '2023-04-02 01:13:40', '2023-04-02 01:13:40'),
(5, 'repellendus', 'name', 1, 'public/images/categories/AynNSi0hTbRa5K5jd9uSw0Cln3NBsqRvfBwH0CqS.jpg', 0, '2023-04-02 01:13:40', '2023-04-02 01:13:40'),
(6, 'qui', 'name', 1, 'public/images/categories/pOaAk8sXcmHs4yDxF1TOxm8d25a273vmVRljorDv.jpg', 1, '2023-04-02 01:13:40', '2023-04-02 01:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `color_products`
--

DROP TABLE IF EXISTS `color_products`;
CREATE TABLE IF NOT EXISTS `color_products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `color_products_product_id_foreign` (`product_id`),
  KEY `color_products_color_id_foreign` (`color_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=flat,2=>category,3=brand,4=products',
  `limit` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Amount,1=Percent',
  `expires_at` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=inactive,1=active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `coupons_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `title`, `details`, `type`, `limit`, `code`, `amount`, `amount_type`, `expires_at`, `status`, `created_at`, `updated_at`) VALUES
(2, 'harum', 'Impedit qui quos et est eius iure qui accusantium. Enim dolorem repellendus ut quibusdam. Ea soluta provident ipsum eaque.', 4, 32, '469074', 204, 1, '2024-03-13', 1, '2023-04-02 01:13:41', '2023-04-02 01:13:41'),
(3, 'dolores', 'Qui nulla qui minus. Eius quod saepe et omnis. Quisquam dicta delectus exercitationem consequatur autem numquam harum. Vel et ut odit a iure ullam tenetur. Ad doloribus aliquam rerum et earum.', 3, 88, '663006', 83, 2, '2023-12-12', 1, '2023-04-02 01:13:41', '2023-04-02 01:13:41'),
(4, 'quaerat', 'Ipsa minus dolores a mollitia autem. Provident quam quod dolore. Delectus et itaque ea quia. Delectus eos esse nemo et. Aut nihil a qui.', 3, 59, '924938', 76, 2, '2023-11-30', 1, '2023-04-02 01:13:41', '2023-04-02 01:13:41'),
(5, 'delectus', 'Qui nesciunt veniam iste distinctio aspernatur officia odio. Tempora qui molestias exercitationem aut ducimus excepturi quia odio. Et fuga architecto recusandae porro. Est nostrum officia at non asperiores modi.', 4, 82, '885556', 42, 2, '2023-06-11', 1, '2023-04-02 01:13:41', '2023-04-02 01:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, '13c724a2-293e-459b-b6e1-bb3b191853c9', 'database', 'default', '{\"uuid\":\"13c724a2-293e-459b-b6e1-bb3b191853c9\",\"displayName\":\"App\\\\Mail\\\\OrderConfirmationPDF\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":13:{s:8:\\\"mailable\\\";O:29:\\\"App\\\\Mail\\\\OrderConfirmationPDF\\\":30:{s:9:\\\"\\u0000*\\u0000orders\\\";s:2:\\\"15\\\";s:7:\\\"\\u0000*\\u0000data\\\";a:5:{s:6:\\\"_token\\\";s:40:\\\"OfjCFi2OHKu8h56PdJvXQkBjpGmRaZSLankf1vOW\\\";s:8:\\\"order_id\\\";s:2:\\\"15\\\";s:5:\\\"email\\\";s:27:\\\"sazzadurrahman580@gmail.com\\\";s:7:\\\"subject\\\";s:2:\\\"Hi\\\";s:7:\\\"message\\\";s:13:\\\"NOthing to do\\\";}s:6:\\\"locale\\\";N;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:27:\\\"sazzadurrahman580@gmail.com\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:8:\\\"markdown\\\";N;s:7:\\\"\\u0000*\\u0000html\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:15:\\\"diskAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:5:\\\"theme\\\";N;s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";s:29:\\\"\\u0000*\\u0000assertionableRenderStrings\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Swift_TransportException: Failed to authenticate on SMTP server with username \"orders@perfumesomahar.com\" using 2 possible authenticators. Authenticator LOGIN returned Expected response code 235 but got code \"535\", with message \"535 Incorrect authentication data\r\n\". Authenticator PLAIN returned Expected response code 235 but got code \"535\", with message \"535 Incorrect authentication data\r\n\". in /home/amar-lodge/Documents/Sites/singlevendor/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/Esmtp/AuthHandler.php:191\nStack trace:\n#0 /home/amar-lodge/Documents/Sites/singlevendor/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/EsmtpTransport.php(371): Swift_Transport_Esmtp_AuthHandler->afterEhlo()\n#1 /home/amar-lodge/Documents/Sites/singlevendor/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/AbstractSmtpTransport.php(148): Swift_Transport_EsmtpTransport->doHeloCommand()\n#2 /home/amar-lodge/Documents/Sites/singlevendor/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mailer.php(65): Swift_Transport_AbstractSmtpTransport->start()\n#3 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Mail/Mailer.php(521): Swift_Mailer->send()\n#4 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Mail/Mailer.php(288): Illuminate\\Mail\\Mailer->sendSwiftMessage()\n#5 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Mail/Mailable.php(187): Illuminate\\Mail\\Mailer->send()\n#6 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Support/Traits/Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#7 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Mail/Mailable.php(188): Illuminate\\Mail\\Mailable->withLocale()\n#8 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Mail/SendQueuedMailable.php(65): Illuminate\\Mail\\Mailable->send()\n#9 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Mail\\SendQueuedMailable->handle()\n#10 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#11 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#12 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#13 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Container/Container.php(653): Illuminate\\Container\\BoundMethod::call()\n#14 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(128): Illuminate\\Container\\Container->call()\n#15 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}()\n#16 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#17 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Bus/Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then()\n#18 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow()\n#19 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}()\n#20 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#21 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then()\n#22 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Queue/CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware()\n#23 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Queue/Jobs/Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call()\n#24 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#25 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(378): Illuminate\\Queue\\Worker->process()\n#26 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Queue/Worker.php(172): Illuminate\\Queue\\Worker->runJob()\n#27 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon()\n#28 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Queue/Console/WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker()\n#29 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#30 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Container/Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#31 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure()\n#32 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Container/BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod()\n#33 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Container/Container.php(653): Illuminate\\Container\\BoundMethod::call()\n#34 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Console/Command.php(136): Illuminate\\Container\\Container->call()\n#35 /home/amar-lodge/Documents/Sites/singlevendor/vendor/symfony/console/Command/Command.php(298): Illuminate\\Console\\Command->execute()\n#36 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Console/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run()\n#37 /home/amar-lodge/Documents/Sites/singlevendor/vendor/symfony/console/Application.php(1040): Illuminate\\Console\\Command->run()\n#38 /home/amar-lodge/Documents/Sites/singlevendor/vendor/symfony/console/Application.php(301): Symfony\\Component\\Console\\Application->doRunCommand()\n#39 /home/amar-lodge/Documents/Sites/singlevendor/vendor/symfony/console/Application.php(171): Symfony\\Component\\Console\\Application->doRun()\n#40 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Console/Application.php(94): Symfony\\Component\\Console\\Application->run()\n#41 /home/amar-lodge/Documents/Sites/singlevendor/vendor/laravel/framework/src/Illuminate/Foundation/Console/Kernel.php(129): Illuminate\\Console\\Application->run()\n#42 /home/amar-lodge/Documents/Sites/singlevendor/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()\n#43 {main}', '2023-05-04 05:09:23'),
(2, '50801ce9-9981-4b30-ba54-ff5d0f80bc0a', 'database', 'default', '{\"uuid\":\"50801ce9-9981-4b30-ba54-ff5d0f80bc0a\",\"displayName\":\"App\\\\Mail\\\\OrderConfirmationPDF\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":13:{s:8:\\\"mailable\\\";O:29:\\\"App\\\\Mail\\\\OrderConfirmationPDF\\\":30:{s:9:\\\"\\u0000*\\u0000orders\\\";s:2:\\\"15\\\";s:7:\\\"\\u0000*\\u0000data\\\";a:5:{s:6:\\\"_token\\\";s:40:\\\"jYPXQplJbNfWdmnvdDDde8a3P7WFU1Iaj7MIhJRh\\\";s:8:\\\"order_id\\\";s:2:\\\"15\\\";s:5:\\\"email\\\";s:27:\\\"sazzadurrahman580@gmail.com\\\";s:7:\\\"subject\\\";s:3:\\\"hhi\\\";s:7:\\\"message\\\";s:3:\\\"sds\\\";}s:6:\\\"locale\\\";N;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:27:\\\"sazzadurrahman580@gmail.com\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:8:\\\"markdown\\\";N;s:7:\\\"\\u0000*\\u0000html\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:15:\\\"diskAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:5:\\\"theme\\\";N;s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";s:29:\\\"\\u0000*\\u0000assertionableRenderStrings\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'ErrorException: file_get_contents(http://localhost/public/images/2023040209414520230330084303logo.png): Failed to open stream: HTTP request failed! HTTP/1.1 404 Not Found\r\n in E:\\wamp64\\www\\amrlogde\\perfumesomahar\\app\\Mail\\OrderConfirmationPDF.php:55\nStack trace:\n#0 [internal function]: Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'file_get_conten...\', \'E:\\\\wamp64\\\\www\\\\a...\', 55)\n#1 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\app\\Mail\\OrderConfirmationPDF.php(55): file_get_contents(\'http://localhos...\', false, Resource id #762)\n#2 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Mail\\OrderConfirmationPDF->build()\n#3 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(175): Illuminate\\Container\\Container->call(Array)\n#8 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#9 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(188): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#10 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\SendQueuedMailable.php(65): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\MailManager))\n#11 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Mail\\SendQueuedMailable->handle(Object(Illuminate\\Mail\\MailManager))\n#12 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#13 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#14 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#15 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#16 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#17 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#18 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#19 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#20 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Mail\\SendQueuedMailable), false)\n#21 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#22 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#23 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#24 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Mail\\SendQueuedMailable))\n#25 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#26 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#27 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#28 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#29 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#30 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#31 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#32 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#33 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#34 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#35 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#36 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#37 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#38 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#39 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\symfony\\console\\Application.php(1040): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\symfony\\console\\Application.php(301): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 {main}', '2023-05-04 06:36:58'),
(3, '1dbeac17-300f-452a-97cc-935c06f169e7', 'database', 'default', '{\"uuid\":\"1dbeac17-300f-452a-97cc-935c06f169e7\",\"displayName\":\"App\\\\Mail\\\\OrderConfirmationPDF\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":13:{s:8:\\\"mailable\\\";O:29:\\\"App\\\\Mail\\\\OrderConfirmationPDF\\\":30:{s:9:\\\"\\u0000*\\u0000orders\\\";s:2:\\\"15\\\";s:7:\\\"\\u0000*\\u0000data\\\";a:5:{s:6:\\\"_token\\\";s:40:\\\"xvShJSjQVjnEfZK9MyUtnax3XAxvsyYcYFaqNKDS\\\";s:8:\\\"order_id\\\";s:2:\\\"15\\\";s:5:\\\"email\\\";s:27:\\\"sazzadurrahman580@gmail.com\\\";s:7:\\\"subject\\\";s:4:\\\"fgff\\\";s:7:\\\"message\\\";s:3:\\\"dfg\\\";}s:6:\\\"locale\\\";N;s:4:\\\"from\\\";a:0:{}s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:27:\\\"sazzadurrahman580@gmail.com\\\";}}s:2:\\\"cc\\\";a:0:{}s:3:\\\"bcc\\\";a:0:{}s:7:\\\"replyTo\\\";a:0:{}s:7:\\\"subject\\\";N;s:8:\\\"markdown\\\";N;s:7:\\\"\\u0000*\\u0000html\\\";N;s:4:\\\"view\\\";N;s:8:\\\"textView\\\";N;s:8:\\\"viewData\\\";a:0:{}s:11:\\\"attachments\\\";a:0:{}s:14:\\\"rawAttachments\\\";a:0:{}s:15:\\\"diskAttachments\\\";a:0:{}s:9:\\\"callbacks\\\";a:0:{}s:5:\\\"theme\\\";N;s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";s:29:\\\"\\u0000*\\u0000assertionableRenderStrings\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'ErrorException: file_get_contents(http://localhost/public/images/2023040209414520230330084303logo.png): Failed to open stream: HTTP request failed! HTTP/1.1 404 Not Found\r\n in E:\\wamp64\\www\\amrlogde\\perfumesomahar\\app\\Mail\\OrderConfirmationPDF.php:55\nStack trace:\n#0 [internal function]: Illuminate\\Foundation\\Bootstrap\\HandleExceptions->handleError(2, \'file_get_conten...\', \'E:\\\\wamp64\\\\www\\\\a...\', 55)\n#1 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\app\\Mail\\OrderConfirmationPDF.php(55): file_get_contents(\'http://localhos...\', false, Resource id #764)\n#2 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Mail\\OrderConfirmationPDF->build()\n#3 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#4 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#5 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#6 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#7 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(175): Illuminate\\Container\\Container->call(Array)\n#8 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#9 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(188): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#10 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\SendQueuedMailable.php(65): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\MailManager))\n#11 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Mail\\SendQueuedMailable->handle(Object(Illuminate\\Mail\\MailManager))\n#12 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#13 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#14 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#15 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#16 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#17 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#18 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#19 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#20 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Illuminate\\Mail\\SendQueuedMailable), false)\n#21 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#22 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Mail\\SendQueuedMailable))\n#23 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#24 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Mail\\SendQueuedMailable))\n#25 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#26 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(428): Illuminate\\Queue\\Jobs\\Job->fire()\n#27 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#28 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#29 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#30 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#31 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#32 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#33 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#34 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#35 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#36 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#37 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#38 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#39 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\symfony\\console\\Application.php(1040): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#40 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\symfony\\console\\Application.php(301): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#41 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#42 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 E:\\wamp64\\www\\amrlogde\\perfumesomahar\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 {main}', '2023-05-04 06:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `generals`
--

DROP TABLE IF EXISTS `generals`;
CREATE TABLE IF NOT EXISTS `generals` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `generals_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_10_070333_create_categories_table', 1),
(6, '2021_12_19_070323_create_permission_tables', 1),
(7, '2021_12_19_070363_create_colors_table', 1),
(8, '2021_12_19_070373_create_sizes_table', 1),
(9, '2021_12_19_070383_create_brands_table', 1),
(10, '2021_12_19_070393_create_faqs_table', 1),
(11, '2021_12_19_070423_create_contacts_table', 1),
(12, '2021_12_19_070523_create_pages_table', 1),
(13, '2021_12_19_070623_create_products_table', 1),
(14, '2021_12_19_070723_create_product_sizes_table', 1),
(15, '2021_12_19_070923_create_product_photos_table', 1),
(16, '2021_12_19_071323_create_generals_table', 1),
(17, '2021_12_19_072323_create_services_table', 1),
(18, '2021_12_19_073323_create_sliders_table', 1),
(19, '2021_12_19_074118_create_color_products_table', 1),
(20, '2023_03_15_041045_create_reviews_table', 1),
(21, '2023_03_16_062332_create_pay_options_table', 1),
(22, '2023_03_20_060914_create_coupons_table', 1),
(23, '2023_03_22_080314_create_shipping_options_table', 1),
(24, '2023_03_27_043308_create_user_shippings_table', 1),
(25, '2023_03_29_045801_create_product_requests_table', 1),
(26, '2023_03_29_084323_create_orders_table', 1),
(27, '2023_03_29_085323_create_order_details_table', 1),
(28, '2023_03_30_064656_create_web_infos_table', 1),
(29, '2023_03_30_103255_create_wishlists_table', 1),
(30, '2023_04_05_073427_create_jobs_table', 2),
(31, '2023_05_07_092515_add_new__product_requests_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 15),
(2, 'App\\Models\\User', 16),
(2, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 18),
(2, 'App\\Models\\User', 19),
(2, 'App\\Models\\User', 20),
(2, 'App\\Models\\User', 21);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_address` longtext COLLATE utf8mb4_unicode_ci,
  `billing_info` longtext COLLATE utf8mb4_unicode_ci,
  `pay_options_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=pending,1=confirmed,2=packed,3=shipped,4=delivered,5=cancle',
  `shipping_options_id` bigint(20) UNSIGNED NOT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=pending,1=review,2=invalid,3=completed,4=unpaid',
  `grand_total` double(20,2) DEFAULT NULL,
  `total` double(20,2) DEFAULT NULL,
  `coupon_discount` double(20,2) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trns_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `viewed` tinyint(4) NOT NULL DEFAULT '0',
  `delivery_viewed` tinyint(4) NOT NULL DEFAULT '0',
  `payment_status_viewed` int(11) NOT NULL DEFAULT '0',
  `shipping_charge` double(8,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 =pending, 1=delivered, 2 =canceled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_pay_options_id_foreign` (`pay_options_id`),
  KEY `orders_shipping_options_id_foreign` (`shipping_options_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shipping_address`, `billing_info`, `pay_options_id`, `delivery_status`, `shipping_options_id`, `payment_status`, `grand_total`, `total`, `coupon_discount`, `code`, `tracking_code`, `payment_number`, `trns_id`, `date`, `viewed`, `delivery_viewed`, `payment_status_viewed`, `shipping_charge`, `status`, `created_at`, `updated_at`) VALUES
(14, 21, '123 Main St<br>Anythana,Anytown,12345', '123 Main St<br>Anythana,Anytown,12345', 7, 4, 1, 3, 2000.00, 900.00, 300.00, 'hijibiji', '39358', '01786740107', NULL, '2023-04-04', 1, 0, 0, 400.00, 0, '2023-04-04 00:07:31', '2023-04-05 02:20:06'),
(15, 21, '123 Main St<br>Anythana,Anytown,12345', '123 Main St<br>Anythana,Anytown,12345', 7, 4, 1, 1, 2000.00, 900.00, 300.00, 'hijibiji', '32175', '01786740107', NULL, '2023-04-05', 1, 0, 0, 400.00, 0, '2023-04-05 01:46:56', '2023-05-06 05:45:14'),
(17, 21, '123 Main St<br>Anythana,Anytown,12345', '123 Main St<br>Anythana,Anytown,12345', 1, 4, 1, 1, 2000.00, NULL, 300.00, 'hijibiji', '57039', '01786740107', NULL, '2023-05-06', 1, 0, 0, 140.00, 0, '2023-05-06 07:02:51', '2023-06-01 04:32:28'),
(18, 21, '123 Main St<br>Anythana,Anytown,12345', '123 Main St<br>Anythana,Anytown,12345', 1, 4, 1, 0, 2000.00, NULL, 300.00, 'hijibiji', '75961', '01786740107', NULL, '2023-05-06', 1, 0, 0, 140.00, 0, '2023-05-06 07:12:15', '2023-06-01 04:31:16'),
(19, 21, '123 Main St<br>Anythana,Anytown,12345', '123 Main St<br>Anythana,Anytown,12345', 1, 4, 1, 0, 2000.00, NULL, 300.00, 'hijibiji', '48035', '01786740107', NULL, '2023-05-06', 1, 0, 0, 140.00, 0, '2023-05-06 07:13:22', '2023-05-07 04:45:01'),
(20, 21, '123 Main St<br>Anythana,Anytown,12345', '123 Main St<br>Anythana,Anytown,12345', 1, 4, 1, 0, 2000.00, NULL, 300.00, 'hijibiji', '91082', '01786740107', NULL, '2023-05-06', 1, 0, 0, 140.00, 0, '2023-05-06 07:14:31', '2023-05-07 04:44:47'),
(21, 21, '123 Main St<br>Anythana,Anytown,12345', '123 Main St<br>Anythana,Anytown,12345', 1, 4, 1, 1, 2000.00, NULL, 300.00, 'hijibiji', '81561', '01786740107', NULL, '2023-05-06', 1, 0, 0, 140.00, 0, '2023-05-06 07:15:27', '2023-05-07 04:43:06'),
(22, 21, '123 Main St<br>Anythana,Anytown,12345', '123 Main St<br>Anythana,Anytown,12345', 1, 4, 1, 0, 2000.00, NULL, 300.00, 'hijibiji', '51299', '01786740107', NULL, '2023-05-06', 1, 0, 0, 140.00, 0, '2023-05-06 07:18:21', '2023-05-06 07:24:31'),
(23, 21, '123 Main St<br>Anythana,Anytown,12345', '123 Main St<br>Anythana,Anytown,12345', 1, 4, 1, 0, 2000.00, NULL, 300.00, 'hijibiji', '49916', '01786740107', NULL, '2023-05-06', 1, 0, 0, 140.00, 0, '2023-05-06 07:26:43', '2023-05-07 04:44:33'),
(24, 21, '123 Main St<br>Anythana,Anytown,12345', '123 Main St<br>Anythana,Anytown,12345', 1, 4, 1, 0, 2000.00, NULL, 300.00, 'hijibiji', '90744', '01786740107', NULL, '2023-05-06', 1, 0, 0, 140.00, 0, '2023-05-06 07:30:25', '2023-05-07 03:52:49'),
(25, 21, '123 Main St<br>Anythana,Anytown,12345', '123 Main St<br>Anythana,Anytown,12345', 1, 4, 1, 0, 2000.00, NULL, 300.00, 'hijibiji', '22310', '01786740107', NULL, '2023-05-06', 1, 0, 0, 140.00, 0, '2023-05-06 07:34:34', '2023-05-06 22:48:52'),
(26, 21, '123 Main St<br>Anythana,Anytown,12345', '123 Main St<br>Anythana,Anytown,12345', 1, 4, 1, 1, 2000.00, NULL, 300.00, 'hijibiji', '75476', '01786740107', NULL, '2023-05-07', 1, 0, 0, 140.00, 0, '2023-05-07 04:02:42', '2023-05-07 04:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(11,2) NOT NULL,
  `quantity` double(11,2) NOT NULL,
  `total` double(11,2) NOT NULL,
  `order_date_time` datetime NOT NULL,
  `delivered_date_time` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0 =pending, 1=delivered, 2=canceled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  KEY `order_details_user_id_foreign` (`user_id`),
  KEY `order_details_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `user_id`, `product_id`, `size`, `color`, `price`, `quantity`, `total`, `order_date_time`, `delivered_date_time`, `status`, `created_at`, `updated_at`) VALUES
(39, 14, 21, 61, NULL, NULL, 10.99, 2.00, 21.98, '2023-04-04 00:00:00', NULL, 1, '2023-04-04 00:07:31', NULL),
(40, 14, 21, 62, NULL, NULL, 12.99, 1.00, 12.99, '2023-04-04 00:00:00', NULL, 1, '2023-04-04 00:07:31', NULL),
(41, 15, 21, 61, NULL, NULL, 10.99, 2.00, 21.98, '2023-04-05 00:00:00', NULL, 1, '2023-04-05 01:46:56', NULL),
(42, 15, 21, 62, NULL, NULL, 12.99, 1.00, 12.99, '2023-04-05 00:00:00', NULL, 1, '2023-04-05 01:46:56', NULL),
(45, 17, 21, 61, NULL, NULL, 10.99, 2.00, 21.98, '2023-05-06 00:00:00', NULL, 1, '2023-05-06 07:02:51', NULL),
(46, 17, 21, 62, NULL, NULL, 12.99, 1.00, 12.99, '2023-05-06 00:00:00', NULL, 1, '2023-05-06 07:02:51', NULL),
(47, 18, 21, 61, NULL, NULL, 10.99, 2.00, 21.98, '2023-05-06 00:00:00', NULL, 1, '2023-05-06 07:12:15', NULL),
(48, 18, 21, 62, NULL, NULL, 12.99, 1.00, 12.99, '2023-05-06 00:00:00', NULL, 1, '2023-05-06 07:12:15', NULL),
(49, 19, 21, 61, NULL, NULL, 10.99, 2.00, 21.98, '2023-05-06 00:00:00', NULL, 1, '2023-05-06 07:13:22', NULL),
(50, 19, 21, 62, NULL, NULL, 12.99, 1.00, 12.99, '2023-05-06 00:00:00', NULL, 1, '2023-05-06 07:13:22', NULL),
(51, 20, 21, 61, NULL, NULL, 10.99, 2.00, 21.98, '2023-05-06 00:00:00', NULL, 1, '2023-05-06 07:14:31', NULL),
(52, 20, 21, 62, NULL, NULL, 12.99, 1.00, 12.99, '2023-05-06 00:00:00', NULL, 1, '2023-05-06 07:14:31', NULL),
(53, 21, 21, 61, NULL, NULL, 10.99, 2.00, 21.98, '2023-05-06 00:00:00', NULL, 1, '2023-05-06 07:15:27', NULL),
(54, 21, 21, 62, NULL, NULL, 12.99, 1.00, 12.99, '2023-05-06 00:00:00', NULL, 1, '2023-05-06 07:15:27', NULL),
(55, 22, 21, 61, NULL, NULL, 10.99, 2.00, 21.98, '2023-05-06 00:00:00', NULL, 1, '2023-05-06 07:18:21', NULL),
(56, 22, 21, 62, NULL, NULL, 12.99, 1.00, 12.99, '2023-05-06 00:00:00', NULL, 1, '2023-05-06 07:18:21', NULL),
(57, 23, 21, 61, NULL, NULL, 10.99, 2.00, 21.98, '2023-05-06 00:00:00', NULL, 1, '2023-05-06 07:26:43', NULL),
(58, 23, 21, 62, NULL, NULL, 12.99, 1.00, 12.99, '2023-05-06 00:00:00', NULL, 1, '2023-05-06 07:26:43', NULL),
(59, 24, 21, 61, NULL, NULL, 10.99, 2.00, 21.98, '2023-05-06 00:00:00', NULL, 1, '2023-05-06 07:30:25', NULL),
(60, 24, 21, 62, NULL, NULL, 12.99, 1.00, 12.99, '2023-05-06 00:00:00', NULL, 1, '2023-05-06 07:30:25', NULL),
(61, 25, 21, 61, NULL, NULL, 10.99, 2.00, 21.98, '2023-05-06 00:00:00', NULL, 1, '2023-05-06 07:34:34', NULL),
(62, 25, 21, 62, NULL, NULL, 12.99, 1.00, 12.99, '2023-05-06 00:00:00', NULL, 1, '2023-05-06 07:34:34', NULL),
(63, 26, 21, 61, NULL, NULL, 10.99, 2.00, 21.98, '2023-05-07 00:00:00', NULL, 1, '2023-05-07 04:02:42', NULL),
(64, 26, 21, 62, NULL, NULL, 12.99, 1.00, 12.99, '2023-05-07 00:00:00', NULL, 1, '2023-05-07 04:02:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_name_unique` (`name`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_options`
--

DROP TABLE IF EXISTS `pay_options`;
CREATE TABLE IF NOT EXISTS `pay_options` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=inactive,1=active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pay_options`
--

INSERT INTO `pay_options` (`id`, `name`, `type`, `account`, `status`, `created_at`, `updated_at`) VALUES
(1, 'COD', 'cod', 'cod', 1, '2023-04-02 01:13:41', '2023-04-02 01:13:41'),
(2, 'bKash', 'Agent', '92379792324', 1, '2023-04-02 01:13:41', '2023-04-02 01:13:41'),
(3, 'Rocket', 'Personal', '923740924', 1, '2023-04-02 01:13:41', '2023-04-02 01:13:41'),
(4, 'Nagad', 'Marchent', '937598634', 1, '2023-04-02 01:13:41', '2023-04-02 01:13:41'),
(5, 'Upay', 'Marchent', '937598634', 1, '2023-04-02 01:13:41', '2023-04-02 01:13:41'),
(6, 'Bank', 'Marchent', '937598634', 1, '2023-04-02 01:13:41', '2023-04-02 01:13:41'),
(7, 'Card', 'Marchent', '937598634', 1, '2023-04-02 01:13:41', '2023-04-02 01:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 16, 'API Token', '706165fa5240b263fd72b23e95e3aa658e34ed0d86a771cd2206f6b37cce6dab', '[\"*\"]', '2023-04-04 00:03:53', '2023-04-03 23:50:24', '2023-04-04 00:03:53'),
(2, 'App\\Models\\User', 21, 'API Token', 'd489877979b256191156da20e07a996a96b687e94d4b18b9fc234c8a59e7392e', '[\"*\"]', '2023-04-04 00:07:31', '2023-04-04 00:07:10', '2023-04-04 00:07:31'),
(3, 'App\\Models\\User', 21, 'API Token', 'ec457f85c6fda1df6a9d276cd95fb6ba6b86398a36ca3a50a66fce24cb58647f', '[\"*\"]', '2023-04-05 01:46:56', '2023-04-05 01:46:42', '2023-04-05 01:46:56'),
(4, 'App\\Models\\User', 21, 'API Token', '74c4ec38c2a8c63a39ba881234fab477c9f314dd37f1b1c2c2bf9652f717ae1f', '[\"*\"]', '2023-05-06 06:44:47', '2023-05-06 06:42:15', '2023-05-06 06:44:47'),
(5, 'App\\Models\\User', 21, 'API Token', 'ebc95190e0f10306bd8c526bdb4363206c7967d36245f53b6c87b2e138997ef7', '[\"*\"]', '2023-05-07 04:02:42', '2023-05-06 06:51:16', '2023-05-07 04:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(355) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(11,2) NOT NULL,
  `old_price` double(11,2) DEFAULT NULL,
  `discount_type` tinyint(4) DEFAULT NULL COMMENT '0=regular,1=percent',
  `discount` double(11,2) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `featured` int(11) DEFAULT NULL,
  `new` int(11) DEFAULT NULL,
  `p_set` int(11) DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=inactive,1=active,2=pending',
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `display` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_brand_id_foreign` (`brand_id`),
  KEY `products_slug_index` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `slug`, `price`, `old_price`, `discount_type`, `discount`, `stock`, `featured`, `new`, `p_set`, `tags`, `status`, `description`, `display`, `created_at`, `updated_at`) VALUES
(61, 5, 12, 'Colleen Porter', 'Blanditiis repellend', 684.00, 841.00, 2, 213.00, 119, NULL, 1, NULL, 'Velit dolor perferen', 1, NULL, 'public/images/products/20231013213723.jpg', '2023-04-03 02:08:32', '2023-10-13 15:37:23'),
(62, 3, 11, 'Jelani Chan', 'Proident reiciendis', 577.00, 325.00, 1, NULL, 284, 1, 1, NULL, 'Molestiae dolore con', 1, '<p>dssdfasdfas</p>', 'public/images/products/20231013213807.jpg', '2023-04-03 02:09:38', '2023-10-13 15:38:07'),
(63, 1, 12, 'Ori Jennings', 'Voluptas odio volupt', 771.00, 689.00, 0, NULL, 66, 1, 1, 1, 'Dolore quis qui cons', 1, '<p>sgsdfgsdfgs</p>', 'public/images/products/20231013213751.jpg', '2023-04-03 02:12:15', '2023-10-13 15:37:51'),
(64, 2, 12, 'Jerome Barnes', 'Duis quas pariatur', 288.00, 61.00, 1, 1.00, 460, NULL, NULL, NULL, 'Placeat quibusdam e', 1, NULL, 'public/images/products/20231013213940.jpg', '2023-10-13 15:39:40', '2023-10-13 15:39:40'),
(65, 2, 12, 'Caldwell Suarez', 'Et neque velit et an', 814.00, 105.00, 2, 20.00, 892, 1, 1, 1, 'Voluptas velit ut a', 1, NULL, 'public/images/products/20231013213951.jpg', '2023-10-13 15:39:51', '2023-10-13 15:39:51'),
(66, 4, 12, 'Glenna Humphrey', 'Voluptas ex eiusmod', 646.00, 854.00, 2, 11.00, 461, 1, 1, 1, 'Quae pariatur Volup', 1, NULL, 'public/images/products/20231013214007.jpg', '2023-10-13 15:40:07', '2023-10-13 15:40:07'),
(67, 3, 11, 'Jennifer Mcdaniel', 'Voluptatum eius reru', 315.00, 780.00, 2, 31.00, 130, NULL, NULL, 1, 'Excepteur quod perfe', 1, NULL, 'public/images/products/20231013214035.jpg', '2023-10-13 15:40:35', '2023-10-13 15:40:35'),
(68, 5, 11, 'Stacey Reese', 'Eveniet anim dignis', 284.00, 534.00, 2, 93.00, 668, 1, 1, 1, 'In dolores laboris q', 1, NULL, 'public/images/products/20231013214139.jpg', '2023-10-13 15:41:39', '2023-10-13 15:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_photos`
--

DROP TABLE IF EXISTS `product_photos`;
CREATE TABLE IF NOT EXISTS `product_photos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_photos_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_photos`
--

INSERT INTO `product_photos` (`id`, `product_id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 61, 'public/images/products/20230403080832_fav.ico', '2023-04-03 02:08:32', '2023-04-03 02:08:32'),
(2, 61, 'public/images/products/20230403080832_fav-icon.png', '2023-04-03 02:08:32', '2023-04-03 02:08:32'),
(3, 61, 'public/images/products/20230403080832_20230330084303logo.png', '2023-04-03 02:08:32', '2023-04-03 02:08:32'),
(4, 62, 'public/images/products/20230403080938_6bfb2ae7-3841-467f-8a4b-b5f2f4448446.jpeg', '2023-04-03 02:09:38', '2023-04-03 02:09:38'),
(5, 63, 'public/images/products/20230403081215_Screenshot from 2023-04-02 13-34-55.png', '2023-04-03 02:12:15', '2023-04-03 02:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `product_requests`
--

DROP TABLE IF EXISTS `product_requests`;
CREATE TABLE IF NOT EXISTS `product_requests` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `quantity` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `viewed` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_requests_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_requests`
--

INSERT INTO `product_requests` (`id`, `name`, `message`, `quantity`, `user_id`, `image`, `status`, `created_at`, `updated_at`, `viewed`) VALUES
(1, 'This si product', 'dgdfdfdf', 2, 1, NULL, 0, NULL, '2023-05-08 09:14:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

DROP TABLE IF EXISTS `product_sizes`;
CREATE TABLE IF NOT EXISTS `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_sizes_product_id_foreign` (`product_id`),
  KEY `product_sizes_size_id_foreign` (`size_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_user_id_foreign` (`user_id`),
  KEY `reviews_product_id_foreign` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-04-02 01:13:39', '2023-04-02 01:13:39'),
(2, 'User', 'web', '2023-04-02 01:13:39', '2023-04-02 01:13:39'),
(3, 'Marchant', 'web', '2023-04-02 01:13:39', '2023-04-02 01:13:39'),
(4, 'Seller', 'web', '2023-04-02 01:13:39', '2023-04-02 01:13:39'),
(5, 'eStore', 'web', '2023-04-02 01:13:39', '2023-04-02 01:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_options`
--

DROP TABLE IF EXISTS `shipping_options`;
CREATE TABLE IF NOT EXISTS `shipping_options` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=inactive,1=active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shipping_options_title_unique` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_options`
--

INSERT INTO `shipping_options` (`id`, `title`, `details`, `cost`, `status`, `created_at`, `updated_at`) VALUES
(1, 'qui', 'Ipsum dignissimos id animi sunt unde optio nisi.', 338.03, 1, '2023-04-02 01:13:41', '2023-04-02 01:13:41'),
(2, 'temporibus', 'Laborum adipisci repellat beatae.', 571.46, 1, '2023-04-02 01:13:41', '2023-04-02 01:13:41'),
(3, 'mollitia', 'Et exercitationem rerum ut minima.', 710.34, 1, '2023-04-02 01:13:41', '2023-04-02 01:13:41'),
(4, 'eos', 'Iusto corrupti quis et iure aut voluptas.', 143.13, 1, '2023-04-02 01:13:41', '2023-04-02 01:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
CREATE TABLE IF NOT EXISTS `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `link` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `address`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Amos Morar', 'admin@gmail.com', '708745339', '2023-04-02 01:13:39', '$2y$10$YsQbVjCK7CDjsIaXkkzPmOz8JhJ9QMv.lD9nMuVwkRlv.STWo0dy6', NULL, NULL, '5VE5vcEjNIHgBrq7rmzP3LPBcE1bKzYU7ywPdx4Jho8glUQnt5CJLaOF6qNe', '2023-04-02 01:13:40', '2023-04-02 01:13:40'),
(21, 'Md Sazzadur Rahman', 'sazzadurrahman580@gmail.com', '01786740107', NULL, '$2y$10$YsQbVjCK7CDjsIaXkkzPmOz8JhJ9QMv.lD9nMuVwkRlv.STWo0dy6', 'Dinajpur', 'public/images/users/20230404060652.png', NULL, '2023-04-04 00:06:52', '2023-04-04 00:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_shippings`
--

DROP TABLE IF EXISTS `user_shippings`;
CREATE TABLE IF NOT EXISTS `user_shippings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apartment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_shippings_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_shippings`
--

INSERT INTO `user_shippings` (`id`, `user_id`, `name`, `address`, `city`, `apartment`, `zip`, `thana`, `phone`, `created_at`, `updated_at`) VALUES
(1, 1, 'Eula Morar', '5432 Andy Park Suite 219', 'Port Eusebioport', 'Apt. 372', '83721', 'West Carissaside', '(203) 620-6183', '2023-04-02 01:13:40', '2023-04-02 01:13:40'),
(3, 1, 'Mara Stanton', '174 Lowe Island Apt. 243', 'Henriettetown', 'Suite 968', '54861', 'Port Skylarville', '+1 (484) 230-0546', '2023-04-02 01:13:40', '2023-04-02 01:13:40'),
(12, 21, 'John Doe', '123 Main St', 'Anytown', 'Apt 1', '12345', 'Anythana', '555-12343479', '2023-04-04 00:07:31', '2023-04-04 00:07:31');

-- --------------------------------------------------------

--
-- Table structure for table `web_infos`
--

DROP TABLE IF EXISTS `web_infos`;
CREATE TABLE IF NOT EXISTS `web_infos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_infos`
--

INSERT INTO `web_infos` (`id`, `logo`, `icon`, `name`, `title`, `about`, `address`, `email`, `number`, `created_at`, `updated_at`) VALUES
(1, 'public/images/2023040209414520230330084303logo.png', 'public/images/20230402094145fav-icon.png', 'Lockman LLC', 'Provident ducimus non expedita voluptatem.', 'Inventore repudiandae odio nulla eligendi non ut. Autem quam corrupti quaerat voluptatem provident. Itaque qui nulla cum labore animi.', '70103 Elta Vista Apt. 229\r\nMyahfurt, SC 04930', 'turner09@nader.com', '(559) 726-0104', '2023-04-02 01:13:41', '2023-04-02 03:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlists_user_id_foreign` (`user_id`),
  KEY `wishlists_product_id_foreign` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `color_products`
--
ALTER TABLE `color_products`
  ADD CONSTRAINT `color_products_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `color_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_pay_options_id_foreign` FOREIGN KEY (`pay_options_id`) REFERENCES `pay_options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_shipping_options_id_foreign` FOREIGN KEY (`shipping_options_id`) REFERENCES `shipping_options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_photos`
--
ALTER TABLE `product_photos`
  ADD CONSTRAINT `product_photos_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_requests`
--
ALTER TABLE `product_requests`
  ADD CONSTRAINT `product_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_sizes_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_shippings`
--
ALTER TABLE `user_shippings`
  ADD CONSTRAINT `user_shippings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
