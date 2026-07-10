-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 10, 2026 at 01:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `short_description`, `description`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `is_active`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Duis quam sit officiis qui corrupti atque consequat Dolor porro non eveniet quo sed nisi', 'duis-quam-sit-officiis-qui-corrupti-atque-consequat-dolor-porro-non-eveniet-quo-sed-nisi', 'Quo quis ut laborum', '<h2>Final <code>blog/index.blade.php</code></h2><p>Your page structure should now look like this:</p><pre><code></code></pre><pre><code>@extends(&#039;layout.app&#039;)\n\n@section(&#039;title&#039;, &#039;Blogs&#039;)\n\n@section(&#039;content&#039;)\n\n&lt;!-- Page Title --&gt;\n&lt;section class=&quot;page-title-area&quot; data-background=&quot;{{ asset(&#039;assets/img/bg/page-title-bg.jpg&#039;) }}&quot;&gt;\n    ...\n&lt;/section&gt;\n\n&lt;!-- Blog Area --&gt;\n&lt;div class=&quot;blog-area pt-120 pb-90&quot;&gt;\n\n    &lt;div class=&quot;container container-small&quot;&gt;\n\n        &lt;div class=&quot;row&quot;&gt;\n\n            {{-- LEFT COLUMN --}}\n            {{-- Part 1 goes here --}}\n\n            {{-- RIGHT SIDEBAR --}}\n            {{-- Part 2 goes here --}}\n\n        &lt;/div&gt;\n\n    &lt;/div&gt;\n\n&lt;/div&gt;\n\n@endsection</code></pre><hr><h2>Your blog page now supports</h2><p>✅ Dynamic blog listing</p><p>✅ SEO-friendly URLs</p><pre><code></code></pre><pre><code>/blog/my-first-blog</code></pre><p>✅ Search</p><pre><code></code></pre><pre><code>/blogs?search=shirt</code></pre><p>✅ Recent Posts</p><p>✅ Featured Images</p><p>✅ Published Date</p><p>✅ Meta Keywords → Tags</p><p>✅ Custom Pagination</p><p>✅ Empty State</p><p>✅ Responsive Bootstrap Layout</p><hr><h1>Next (Recommended)</h1><p>The next file to build is <code>resources/views/blog/show.blade.php</code>.</p><p>I&#039;ll make it completely dynamic with:</p><ul><li><p><br>✅ SEO meta tags<br></p></li><li><p><br>✅ Large featured image<br></p></li><li><p><br>✅ Beautiful typography<br></p></li><li><p><br>✅ Full HTML description<br></p></li><li><p><br>✅ Previous / Next article<br></p></li><li><p><br>✅ Latest Posts sidebar<br></p></li><li><p><br>✅ Related Posts<br></p></li><li><p><br>✅ Facebook Share<br></p></li><li><p><br>✅ X (Twitter) Share<br></p></li><li><p><br>✅ LinkedIn Share<br></p></li><li><p><br>✅ WhatsApp Share<br></p></li><li><p><br>✅ Copy Link button<br></p></li><li><p><br>✅ Reading time<br></p></li><li><p><br>✅ Published date<br></p></li><li><p><br>✅ Breadcrumbs<br></p></li><li><p><br>✅ Responsive design matching your Ecomart theme<br></p></li></ul><p>That page will be around <strong>350–400 lines</strong> and will fully replace the static template with production-ready Laravel Blade code.</p>', 'blogs/01KX5GKYEGDA3BQTEWKKCQGX3A.jpg', 'Labore qui accusamus ducimus fugiat voluptatem non et architecto deserunt consequat Sint eum', 'Enim aliquid optio ', 'Voluptas enim ut fac', 1, '2018-12-06 15:46:00', '2026-07-10 07:52:49', '2026-07-10 08:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('ecomm-cache-356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1783670429),
('ecomm-cache-356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1783670429;', 1783670429),
('ecomm-cache-website_settings', 'a:26:{s:2:\"id\";i:1;s:9:\"site_name\";s:7:\"mYstore\";s:12:\"site_tagline\";s:5:\"ecomm\";s:4:\"logo\";s:39:\"settings/01KWXYEQPG6AR659NEVFY56TN9.png\";s:7:\"favicon\";s:39:\"settings/01KWXYEQPJ4ST15QZHHY4A8YT0.png\";s:7:\"banners\";a:2:{i:0;s:31:\"01KWXYEQPJ4ST15QZHHY4A8YT1.avif\";i:1;s:30:\"01KWXYEQPKA2R9DYB68NM1MZES.jpg\";}s:5:\"email\";s:20:\"arjun.hrnd@gmail.com\";s:5:\"phone\";s:10:\"8860107706\";s:8:\"whatsapp\";s:10:\"8860107706\";s:7:\"address\";s:138:\"Building No 94, 1st Floor, near Shambhu Dayal Bagh, Old Ishwar Nagar, Shambhu Dayal Bagh, Okhla Industrial Estate, New Delhi, Delhi 110020\";s:16:\"google_map_embed\";s:278:\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3504.471521580969!2d77.2642747!3d28.5556004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce348246b2d63%3A0x5dd5a97f501ed58d!2sHub%20Hive%2011%20-%20Co-Working%20Space!5e0!3m2!1sen!2sin!4v1783340427520!5m2!1sen!2sin\";s:8:\"facebook\";s:22:\"http://localhost:8000/\";s:9:\"instagram\";s:22:\"http://localhost:8000/\";s:7:\"youtube\";s:22:\"http://localhost:8000/\";s:8:\"linkedin\";s:22:\"http://localhost:8000/\";s:7:\"twitter\";s:22:\"http://localhost:8000/\";s:18:\"footer_description\";s:86:\"Uncountable and unrivalled world\'s largest online and offline fashion house since 1990\";s:9:\"copyright\";s:60:\"Get your entire order with an extra 25%OFF for this festival\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";a:0:{}s:16:\"google_analytics\";N;s:14:\"facebook_pixel\";N;s:10:\"enable_cod\";b:1;s:10:\"created_at\";s:27:\"2026-07-07T03:56:20.000000Z\";s:10:\"updated_at\";s:27:\"2026-07-10T06:13:55.000000Z\";}', 2099024035);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `image`, `banner`, `description`, `sort_order`, `is_featured`, `is_active`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Hoodies', 'hoodies', 'categories/default.jpg', 'categories/banner.jpg', 'Accusamus fugit nostrum vero error error animi. Itaque amet dignissimos iste rerum. Sint ex quis atque minus excepturi sit.', 18, 1, 1, 'Hoodies', 'Necessitatibus quia facere quos accusantium.', 'hoodies, clothing, fashion', '2026-07-07 02:57:19', '2026-07-07 07:00:38'),
(2, NULL, 'Kids', 'kids', 'categories/default.jpg', 'categories/banner.jpg', 'Nulla quo vel et nam aut quidem aut provident. Quis cum inventore magni est. Ad ut ut suscipit voluptatem necessitatibus quia accusamus similique.', 8, 1, 1, 'Kids', 'Ducimus et libero labore nesciunt ducimus voluptatem occaecati.', 'kids, clothing, fashion', '2026-07-07 02:57:19', '2026-07-07 07:00:35'),
(3, NULL, 'Women', 'women', 'categories/default.jpg', 'categories/banner.jpg', 'Magnam dolorem fugiat numquam cupiditate. Harum sed similique ut et qui velit. Sed itaque libero sed.', 15, 1, 1, 'Women', 'Sit ex quas asperiores voluptates quaerat.', 'women, clothing, fashion', '2026-07-07 02:57:19', '2026-07-07 07:00:36'),
(4, NULL, 'Shirts', 'shirts', 'categories/default.jpg', 'categories/banner.jpg', 'Autem iusto voluptas molestias est odit est molestias. Harum dolores possimus illum autem quod consectetur molestiae ratione.', 14, 1, 1, 'Shirts', 'Eos quis suscipit aperiam quaerat.', 'shirts, clothing, fashion', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(5, NULL, 'Jackets', 'jackets', 'categories/default.jpg', 'categories/banner.jpg', 'Vitae ut perferendis aut laudantium eos maxime. Sunt ipsam aut cum et sit dolorem. Error adipisci nostrum necessitatibus culpa. Numquam ipsa quia amet ab nihil odit beatae assumenda.', 17, 1, 1, 'Jackets', 'Fuga error placeat quis et tempore.', 'jackets, clothing, fashion', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(6, NULL, 'Jeans', 'jeans', 'categories/default.jpg', 'categories/banner.jpg', 'Sit voluptatem enim iure perspiciatis nostrum in vel. Excepturi non quia est et voluptatem porro cum. Ut nihil id delectus ut. Est iusto suscipit adipisci.', 1, 1, 1, 'Jeans', 'Cum ducimus aut voluptas ut quo porro pariatur.', 'jeans, clothing, fashion', '2026-07-07 02:57:19', '2026-07-07 02:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` longtext NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_07_06_053356_create_settings_table', 1),
(5, '2026_07_06_103234_create_categories_table', 1),
(6, '2026_07_06_103531_create_products_table', 1),
(7, '2026_07_06_103540_create_product_images_table', 1),
(8, '2026_07_07_055046_create_pages_table', 1),
(9, '2026_07_07_092412_change_meta_keywords_to_json_in_settings_table', 2),
(10, '2026_07_07_114405_create_testimonials_table', 3),
(11, '2026_07_08_101638_create_orders_table', 4),
(12, '2026_07_08_101650_create_order_items_table', 4),
(13, '2026_07_10_112013_add_enable_cod_to_settings_table', 5),
(14, '2026_07_10_123635_create_blogs_table', 6),
(15, '2026_07_10_141442_create_faqs_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL DEFAULT 'India',
  `postal_code` varchar(255) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `shipping_charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `grand_total` decimal(10,2) NOT NULL,
  `payment_method` enum('razorpay','cod') NOT NULL DEFAULT 'razorpay',
  `payment_status` enum('pending','paid','failed','refunded') NOT NULL DEFAULT 'pending',
  `razorpay_order_id` varchar(255) DEFAULT NULL,
  `razorpay_payment_id` varchar(255) DEFAULT NULL,
  `razorpay_signature` varchar(255) DEFAULT NULL,
  `status` enum('pending','confirmed','processing','shipped','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `paid_at` datetime DEFAULT NULL,
  `customer_note` text DEFAULT NULL,
  `admin_note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `customer_name`, `email`, `phone`, `address`, `city`, `state`, `country`, `postal_code`, `subtotal`, `shipping_charge`, `discount`, `tax`, `grand_total`, `payment_method`, `payment_status`, `razorpay_order_id`, `razorpay_payment_id`, `razorpay_signature`, `status`, `paid_at`, `customer_note`, `admin_note`, `created_at`, `updated_at`) VALUES
(3, 'ORD-20260709-Z2PSRU', 'Sydnee Alford', 'nojaju@mailinator.com', '+1 (545) 384-1016', 'Nam aspernatur id un', 'Earum sed consectetu', 'Deleniti exercitatio', 'India', 'Qui ullamco dolore c', 2680.00, 0.00, 0.00, 0.00, 2680.00, 'razorpay', 'pending', 'order_TBJ6aAT5z3m9a2', NULL, NULL, 'pending', NULL, 'Ipsum illum eiusmo', NULL, '2026-07-09 01:05:34', '2026-07-09 01:05:35'),
(4, 'ORD-20260709-DTBKUL', 'Sydnee Alford', 'nojaju@mailinator.com', '+1 (545) 384-1016', 'Nam aspernatur id un', 'Earum sed consectetu', 'Deleniti exercitatio', 'India', 'Qui ullamco dolore c', 2680.00, 0.00, 0.00, 0.00, 2680.00, 'razorpay', 'pending', 'order_TBJEBjSQn3iaOp', NULL, NULL, 'pending', NULL, 'Ipsum illum eiusmo', NULL, '2026-07-09 01:12:47', '2026-07-09 01:12:47'),
(5, 'ORD-20260709-ZIO6OT', 'Kareem Casey', 'ganuraga@mailinator.com', '+1 (669) 896-1389', 'Doloremque velit of', 'Aut aliquam at atque', 'Molestias culpa volu', 'India', 'Perferendis nostrum', 2680.00, 0.00, 0.00, 0.00, 2680.00, 'razorpay', 'pending', 'order_TBKapn6KwZLHpi', NULL, NULL, 'pending', NULL, 'Quia asperiores id q', NULL, '2026-07-09 02:32:55', '2026-07-09 02:32:55'),
(6, 'ORD-20260709-BW57HW', 'Inez Mcknight', 'kyzupurily@mailinator.com', '+1 (687) 782-8451', 'Totam in ipsa offic', 'Quia in culpa volupt', 'Ullamco ratione non', 'India', 'Laudantium voluptat', 2680.00, 0.00, 0.00, 0.00, 2680.00, 'razorpay', 'paid', 'order_TBKj8o7c30aVCA', 'pay_TBKjTUDujdtFeI', '1bc1c67049a740b740ebc022ef9ee069ab0fb9d7028a2f8589effee046ba4b26', 'confirmed', '2026-07-09 08:11:24', 'Doloribus earum earu', NULL, '2026-07-09 02:40:47', '2026-07-09 02:41:24'),
(7, 'ORD-20260709-OTDE5X', 'Jillian Gamble', 'fucewevad@mailinator.com', '+1 (209) 269-4613', 'Reprehenderit moles', 'Exercitation saepe a', 'Earum eos omnis vol', 'India', 'Saepe delectus pers', 8040.00, 0.00, 0.00, 0.00, 8040.00, 'razorpay', 'pending', 'order_TBKnTnaWRAYKdH', NULL, NULL, 'pending', NULL, 'Culpa labore et dic', NULL, '2026-07-09 02:44:53', '2026-07-09 02:44:53'),
(8, 'ORD-20260709-W8P4OW', 'Arjun Sharma', 'arjun.hrnd@gmail.com', '+1 (209) 269-4613', 'Reprehenderit moles', 'Exercitation saepe a', 'Earum eos omnis vol', 'India', 'Saepe delectus pers', 8040.00, 0.00, 0.00, 0.00, 8040.00, 'razorpay', 'paid', 'order_TBLXQs8S610ABA', 'pay_TBLZ952YTBLhEx', '44d8fe9be1186894d60636917d1ea0c4aec047e3328d4ab88b656f1b9eaae655', 'confirmed', '2026-07-09 14:30:29', 'Culpa labore et dic', NULL, '2026-07-09 08:58:23', '2026-07-09 09:00:29'),
(9, 'ORD-20260710-MDRXSF', 'Cynthia Bishop', 'byseba@mailinator.com', '+1 (709) 457-1311', 'Cillum debitis ex ut', 'Nihil sint animi q', 'Ea odit odit sed nob', 'India', 'Et proident molesti', 2680.00, 0.00, 0.00, 0.00, 2680.00, 'cod', 'pending', NULL, NULL, NULL, 'confirmed', NULL, 'Numquam dolorem mole', NULL, '2026-07-10 06:09:27', '2026-07-10 06:09:27'),
(10, 'ORD-20260710-0PLJF2', 'Jocelyn Barr', 'diquco@mailinator.com', '+1 (758) 548-1683', 'Laudantium suscipit', 'Libero in maxime sed', 'Ex at est aut nulla', 'India', 'Magnam omnis libero', 2680.00, 0.00, 0.00, 0.00, 2680.00, 'razorpay', 'paid', 'order_TBhCev9saAOBNI', 'pay_TBhD80tZk14hIA', '64929c4edaa120f3b7e59338f684b9c63a89147c07ca1dc9e7c43f615f29217c', 'confirmed', '2026-07-10 11:40:47', 'Ipsam pariatur Maxi', NULL, '2026-07-10 06:09:59', '2026-07-10 06:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `product_slug`, `image`, `price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(3, 3, 1, 'Premium Cotton T-Shirt', 'premium-cotton-t-shirt-115', 'products/01KWY91GJ64K9Z46NFRFSNY7CM.', 2680.00, 1, 2680.00, '2026-07-09 01:05:34', '2026-07-09 01:05:34'),
(4, 4, 1, 'Premium Cotton T-Shirt', 'premium-cotton-t-shirt-115', 'products/01KWY91GJ64K9Z46NFRFSNY7CM.', 2680.00, 1, 2680.00, '2026-07-09 01:12:47', '2026-07-09 01:12:47'),
(5, 5, 1, 'Premium Cotton T-Shirt', 'premium-cotton-t-shirt-115', 'products/01KWY91GJ64K9Z46NFRFSNY7CM.', 2680.00, 1, 2680.00, '2026-07-09 02:32:55', '2026-07-09 02:32:55'),
(6, 6, 1, 'Premium Cotton T-Shirt', 'premium-cotton-t-shirt-115', 'products/01KWY91GJ64K9Z46NFRFSNY7CM.', 2680.00, 1, 2680.00, '2026-07-09 02:40:47', '2026-07-09 02:40:47'),
(7, 7, 1, 'Premium Cotton T-Shirt', 'premium-cotton-t-shirt-115', 'products/01KWY91GJ64K9Z46NFRFSNY7CM.', 2680.00, 3, 8040.00, '2026-07-09 02:44:53', '2026-07-09 02:44:53'),
(8, 8, 1, 'Premium Cotton T-Shirt', 'premium-cotton-t-shirt-115', 'products/01KWY91GJ64K9Z46NFRFSNY7CM.', 2680.00, 3, 8040.00, '2026-07-09 08:58:23', '2026-07-09 08:58:23'),
(9, 9, 1, 'Premium Cotton T-Shirt', 'premium-cotton-t-shirt-115', 'products/01KWY91GJ64K9Z46NFRFSNY7CM.', 2680.00, 1, 2680.00, '2026-07-10 06:09:27', '2026-07-10 06:09:27'),
(10, 10, 1, 'Premium Cotton T-Shirt', 'premium-cotton-t-shirt-115', 'products/01KWY91GJ64K9Z46NFRFSNY7CM.', 2680.00, 1, 2680.00, '2026-07-10 06:09:59', '2026-07-10 06:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `cost_price` decimal(10,2) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `weight` decimal(8,2) DEFAULT NULL,
  `gender` enum('Men','Women','Kids','Unisex') NOT NULL DEFAULT 'Unisex',
  `fabric` varchar(255) DEFAULT NULL,
  `fit` varchar(255) DEFAULT NULL,
  `care_instruction` text DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_new` tinyint(1) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `sku`, `featured_image`, `short_description`, `description`, `price`, `sale_price`, `cost_price`, `stock`, `weight`, `gender`, `fabric`, `fit`, `care_instruction`, `is_featured`, `is_new`, `is_active`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 4, 'Premium Cotton T-Shirt', 'premium-cotton-t-shirt-115', 'ECM-5884', 'products/01KWY91GJ64K9Z46NFRFSNY7CM.', 'Quidem et ut ut eligendi culpa occaecati.', '<p>Qui modi velit voluptatum totam ea sint. Animi eaque numquam sequi aspernatur. Dolores et omnis ut. Doloremque nulla optio ut numquam ut dolorem expedita.Reprehenderit expedita ducimus odit ut. Dolorem ut amet voluptas iste dolorum. Consequuntur enim recusandae non non doloribus consequatur earum. Laudantium fugiat corrupti sit nobis est saepe veniam.Ad non sint rem necessitatibus voluptatibus ea et. Sit adipisci dolores maxime occaecati nihil veniam vel.Commodi a dolor commodi dolores. Nostrum est facilis enim ut pariatur sint maiores. Temporibus omnis sapiente dolores totam omnis molestiae quod. Voluptatibus voluptates est vel eligendi incidunt.</p>', 2680.00, 2455.00, 938.00, 18, 0.92, 'Women', 'Cotton', 'Relaxed', 'Machine wash cold. Do not bleach.', 1, 0, 1, 'Premium Cotton T-Shirt', 'Et nihil commodi sed.', 'fashion, clothing, Premium Cotton T-Shirt', '2026-07-07 02:57:19', '2026-07-07 07:02:27'),
(2, 1, 'Slim Fit Jeans', 'slim-fit-jeans-690', 'ECM-3355', 'products/default.jpg', 'Doloribus incidunt ut in nisi id autem suscipit enim.', 'Atque unde voluptatibus voluptates magnam magnam. Omnis eaque labore nam quisquam aut consequatur ratione. Aperiam saepe quia unde suscipit et eligendi nobis. Dolorum quo qui quam voluptatum aut et.\n\nQuae et natus id modi voluptatum eveniet reprehenderit. Deleniti tempora adipisci itaque modi placeat. In labore est adipisci culpa qui odio sunt dolorum. Iste natus doloribus et ut deleniti molestias incidunt.\n\nNesciunt sed deleniti vel sit. Culpa illo rem quaerat natus consequatur. Non tempora magnam est. Nulla est sint et saepe.\n\nVoluptatibus dolore maxime expedita deserunt quo ullam officiis. Sunt est voluptatem qui labore at sint laboriosam. Quo animi sed placeat velit error quia. Ad rem est exercitationem soluta voluptatem eius. Animi sint quo et animi qui doloremque.', 1150.00, 1362.00, 631.00, 42, 0.21, 'Women', 'Polyester', 'Regular', 'Machine wash cold. Do not bleach.', 0, 0, 1, 'Slim Fit Jeans', 'Quo aut error vero et alias repudiandae tempore voluptate.', 'fashion, clothing, Slim Fit Jeans', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(3, 5, 'Winter Sweatshirt', 'winter-sweatshirt-9087', 'ECM-7710', 'products/default.jpg', 'Dolor ullam harum officiis voluptas commodi ipsa.', 'Aperiam accusantium et harum quis sint et. Ea quisquam velit recusandae quibusdam ex sint. Reprehenderit velit laudantium iure ad omnis sint aliquid. Voluptatem sit id et occaecati.\n\nSapiente ipsam recusandae ipsum porro. Error ut autem ut accusamus.\n\nExpedita atque enim enim odio asperiores quasi. Et quas eligendi accusantium pariatur at ut nihil. Ut voluptatibus voluptatem architecto doloremque autem consequatur earum. Et culpa alias est autem facere distinctio eum. Iusto voluptate natus fuga qui et ad voluptas.\n\nNecessitatibus eos ratione sint ut quia quo quod. Et quis reprehenderit aspernatur officiis et et. Facere inventore non labore non omnis dolor.', 859.00, 2186.00, 694.00, 99, 0.49, 'Women', 'Polyester', 'Relaxed', 'Machine wash cold. Do not bleach.', 0, 0, 1, 'Winter Sweatshirt', 'Rerum et a est qui.', 'fashion, clothing, Winter Sweatshirt', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(4, 5, 'Premium Cotton T-Shirt', 'premium-cotton-t-shirt-3334', 'ECM-6354', 'products/default.jpg', 'Iste explicabo quidem est aut amet fugiat quam.', 'Excepturi cum et est eligendi ipsam explicabo. Laborum aut enim exercitationem eaque fuga. Iusto ipsam omnis corporis consequatur. Sed molestias optio sit sed.\n\nEligendi qui omnis et ipsa. Quia beatae dolore quo sint molestias quo quasi. Voluptatibus quod blanditiis aut amet et odit eligendi rerum.\n\nEum et modi pariatur expedita et. Blanditiis explicabo mollitia ipsam sequi culpa.\n\nEst quaerat assumenda optio autem quae quaerat. Delectus et qui reprehenderit qui veritatis non hic. Dicta distinctio distinctio aut odit nihil laudantium. Similique libero quibusdam id.', 2766.00, 1034.00, 996.00, 71, 0.51, 'Men', 'Polyester', 'Slim', 'Machine wash cold. Do not bleach.', 0, 1, 1, 'Premium Cotton T-Shirt', 'Eveniet possimus ullam rerum aperiam.', 'fashion, clothing, Premium Cotton T-Shirt', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(5, 5, 'Polo T-Shirt', 'polo-t-shirt-1108', 'ECM-8114', 'products/default.jpg', 'Veniam dolore eum quam.', 'Sunt quo temporibus odio dolorem fugit. Aperiam aspernatur et et eaque consectetur cumque. Assumenda maiores possimus necessitatibus aut nostrum. Omnis sunt error molestiae et sit.\n\nQuos doloremque et laudantium doloribus aperiam. Sunt debitis consequatur ducimus officia in. Earum dolores et amet impedit voluptatem magni. Velit sit aspernatur culpa eum officiis aspernatur.\n\nVelit est quia dolorem dolores occaecati. Accusantium quia dolorem omnis. Amet facilis nemo eveniet impedit adipisci exercitationem architecto delectus. Id et et autem. Aut fugit beatae provident ut.\n\nEsse minus quasi optio. Est optio ratione ut sit eligendi quo.', 2253.00, 1185.00, 446.00, 59, 1.06, 'Men', 'Linen', 'Relaxed', 'Machine wash cold. Do not bleach.', 0, 1, 1, 'Polo T-Shirt', 'Sed quaerat asperiores dolorem tempore minima quibusdam laborum.', 'fashion, clothing, Polo T-Shirt', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(6, 4, 'Denim Jacket', 'denim-jacket-370', 'ECM-9910', 'products/default.jpg', 'Quam et iusto qui vero rem.', 'Expedita mollitia a beatae eos excepturi. Id cupiditate est id maiores ad corporis. Vitae placeat ut non. Ipsam nemo sit culpa perspiciatis adipisci illo exercitationem.\n\nEveniet rerum minima autem dolor. Aspernatur sed enim enim et. Suscipit repudiandae at et nihil.\n\nNam sunt enim quis est qui. Molestiae rerum qui perspiciatis sed et quia velit. Qui error in quas rerum ducimus officiis. Totam eius sed culpa et explicabo quibusdam.\n\nEt et vel doloribus et fuga quo. Ipsam provident a nemo iure est. Nemo velit ex in debitis ipsa architecto quidem. Recusandae nesciunt rerum quis reiciendis inventore ut omnis. Porro deserunt nostrum beatae adipisci occaecati quam illo.', 2486.00, 2166.00, 935.00, 15, 0.71, 'Women', 'Cotton', 'Relaxed', 'Machine wash cold. Do not bleach.', 0, 1, 1, 'Denim Jacket', 'Officia in doloremque nulla quisquam.', 'fashion, clothing, Denim Jacket', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(7, 3, 'Polo T-Shirt', 'polo-t-shirt-9072', 'ECM-2969', 'products/default.jpg', 'Repellat repellendus ex impedit beatae totam et commodi.', 'Maiores non consequuntur consequatur eum quas ducimus magnam. Placeat dolorem non id sunt sed. Quaerat fugiat est qui temporibus eligendi amet.\n\nId a fugiat vero non deleniti illum. Vitae nam eveniet eius distinctio voluptatibus dolorem. Accusantium minima sed maxime dolores vitae sequi. Nemo veritatis dolor impedit ipsa tempora placeat sint.\n\nImpedit dolorem saepe quae eaque est rerum et totam. Fugiat ea quos ut quaerat. Fugit ipsa aut doloribus ut nihil dolorum. Velit voluptatibus impedit quos laborum alias.\n\nDucimus magni qui placeat minus aliquid repudiandae. Eligendi autem et repudiandae iste dolorem mollitia.', 1396.00, 1215.00, 565.00, 65, 0.78, 'Men', 'Denim', 'Regular', 'Machine wash cold. Do not bleach.', 1, 1, 1, 'Polo T-Shirt', 'Numquam voluptas qui laudantium sed id.', 'fashion, clothing, Polo T-Shirt', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(8, 6, 'Casual Shirt', 'casual-shirt-2845', 'ECM-0684', 'products/default.jpg', 'Ipsum numquam explicabo ex.', 'Ducimus pariatur qui corrupti perferendis. Sit nesciunt ullam labore iste molestiae quam repudiandae. Nihil saepe ut delectus eum eaque amet. Sunt eaque laborum nam laboriosam.\n\nPariatur ut in consequatur facilis. Aut aut ut voluptatem laudantium aliquid aspernatur. Cum eos at voluptatem ut.\n\nOdio ratione iusto perferendis magnam suscipit. Ut eius voluptates quia nobis delectus voluptas. Officiis et reprehenderit nihil reprehenderit non sint.\n\nQuibusdam omnis est numquam et sit et. Soluta dicta doloremque voluptatum necessitatibus atque. Est officiis quia quos nihil aperiam. Ratione exercitationem sequi tenetur. Quisquam impedit magni vel possimus ut ad necessitatibus.', 1353.00, 2303.00, 1478.00, 62, 0.61, 'Unisex', 'Cotton', 'Regular', 'Machine wash cold. Do not bleach.', 0, 1, 1, 'Casual Shirt', 'Vel neque fugit dolorem omnis impedit similique et.', 'fashion, clothing, Casual Shirt', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(9, 6, 'Slim Fit Jeans', 'slim-fit-jeans-2449', 'ECM-0230', 'products/default.jpg', 'Sint architecto beatae repellat assumenda labore explicabo.', 'Sapiente expedita perferendis quo neque porro blanditiis. Est accusantium quidem neque expedita sint labore. Ut dignissimos voluptas ut facilis. Perferendis repellendus cupiditate voluptatem tenetur voluptatum itaque porro.\n\nCulpa id nisi assumenda omnis quasi. Dolore et est distinctio numquam quae consequatur.\n\nEt nihil delectus vitae quod quibusdam. Optio saepe voluptas eum enim necessitatibus dolores illo esse. Nesciunt beatae molestiae minima quis voluptatem delectus quas. Numquam voluptate non beatae sint reiciendis quidem esse.\n\nEt est necessitatibus labore magni. Eius illum quisquam officiis dolores quo eveniet veritatis. Nesciunt accusantium est ad et ut quia explicabo.', 1198.00, 1068.00, 1283.00, 98, 1.23, 'Women', 'Cotton', 'Regular', 'Machine wash cold. Do not bleach.', 0, 0, 1, 'Slim Fit Jeans', 'Alias accusantium rem nihil praesentium et quod qui.', 'fashion, clothing, Slim Fit Jeans', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(10, 2, 'Cargo Pants', 'cargo-pants-9784', 'ECM-4106', 'products/default.jpg', 'Autem eligendi qui rerum quod perferendis rerum aut.', 'Quo sed autem nisi reiciendis nemo optio. Optio reiciendis et incidunt quam itaque. Sed ea aspernatur necessitatibus perferendis qui eum. Velit sunt dolorem rerum nobis dolorem natus dolore.\n\nEaque molestiae nulla distinctio eius modi dicta. Officia at velit rerum repudiandae qui aut culpa. Atque molestiae non esse nihil aliquid soluta. Animi fuga ut aut.\n\nDoloremque commodi nihil non inventore. Accusamus debitis nemo error quas. In neque vitae non numquam consectetur laboriosam magnam. Illo dolor nostrum tempore qui eveniet voluptatem eveniet fugiat. Esse aspernatur est totam.\n\nId perferendis natus cumque amet quos nostrum. Quae fugiat similique fugiat perspiciatis illum. Vitae corporis quo aut occaecati.', 1832.00, 1729.00, 405.00, 78, 0.34, 'Men', 'Denim', 'Oversized', 'Machine wash cold. Do not bleach.', 1, 0, 1, 'Cargo Pants', 'Quis deserunt dolorem quidem impedit unde id alias ducimus.', 'fashion, clothing, Cargo Pants', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(11, 6, 'Casual Shirt', 'casual-shirt-919', 'ECM-0286', 'products/default.jpg', 'Blanditiis doloribus rerum est.', 'Aut est voluptatem ut voluptas. Velit ad eos ex ea illum optio maiores. Sunt est porro tempore. Quasi deleniti dolorum dolor aliquid odit dolor.\n\nTempora est qui eos ratione nulla. Nisi aut corrupti consequuntur aut doloremque quae nesciunt voluptatem.\n\nIn non ea quos blanditiis. Aut est debitis a iusto alias quos. Est perspiciatis rem dolorum aut aliquid.\n\nItaque libero excepturi dolores. Blanditiis dolore est et aut aliquid est dolorem est. Error non perferendis ex laudantium et repellendus expedita. Maxime fugiat pariatur nemo esse consequuntur quia.', 2961.00, 1611.00, 441.00, 79, 0.57, 'Men', 'Denim', 'Regular', 'Machine wash cold. Do not bleach.', 0, 1, 1, 'Casual Shirt', 'Optio et molestias quidem soluta.', 'fashion, clothing, Casual Shirt', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(12, 5, 'Round Neck Tee', 'round-neck-tee-4314', 'ECM-3692', 'products/default.jpg', 'Dolores non aspernatur dolores quas ratione.', 'Quia culpa natus maiores sunt nihil rerum provident. Aut ullam ex sint ut qui. Et voluptatem id adipisci quia veritatis est. Sed quia molestiae dolor rerum non.\n\nPorro est nihil culpa in nobis cumque. Ea asperiores consectetur autem. Et odio consequatur et amet similique est quia.\n\nSuscipit esse adipisci quibusdam voluptatem ullam quis. Fugit odio consectetur voluptas impedit quia. Sed illo fugit et ab.\n\nExercitationem consectetur id omnis laborum quisquam molestias. Accusamus mollitia nihil voluptas nobis non. Enim ut consequatur porro facere vero dolor quod quia.', 1830.00, 527.00, 702.00, 95, 0.82, 'Kids', 'Denim', 'Regular', 'Machine wash cold. Do not bleach.', 0, 1, 1, 'Round Neck Tee', 'Harum dolor qui voluptates corporis.', 'fashion, clothing, Round Neck Tee', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(13, 4, 'Denim Jacket', 'denim-jacket-6694', 'ECM-2291', 'products/default.jpg', 'Animi dolor labore laboriosam iure eos.', 'Ut et minima dicta quia. Quisquam eum quis facilis est. Debitis minus voluptatibus maxime ipsum ut doloribus natus.\n\nCorrupti perspiciatis cupiditate velit incidunt laboriosam rem. Quo rerum fugit suscipit autem tempore voluptas voluptatem corrupti. Nihil ut libero quod cum vero.\n\nNihil ea vel consequatur officiis voluptatem velit. Rem et quibusdam veritatis suscipit magni veniam est. In dolorum ducimus iste consequatur et quidem repudiandae quo. Deserunt amet asperiores asperiores est dolores architecto qui.\n\nOmnis voluptatem ullam consequatur reiciendis voluptatem pariatur. Et sed quo voluptatum dolor alias fugit ipsum. Enim aut natus rerum libero soluta.', 2202.00, 2173.00, 606.00, 35, 1.35, 'Women', 'Denim', 'Slim', 'Machine wash cold. Do not bleach.', 0, 1, 1, 'Denim Jacket', 'Ipsa accusantium est nostrum ad similique saepe tempore.', 'fashion, clothing, Denim Jacket', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(14, 1, 'Round Neck Tee', 'round-neck-tee-7331', 'ECM-0815', 'products/default.jpg', 'Omnis magnam ut placeat ut quia dolores quia.', 'Rerum culpa consequuntur doloremque temporibus magni autem voluptas. Aut similique alias repudiandae facilis eos provident harum. A quo qui rerum esse quo. Neque cum nihil et sit quo.\n\nEt commodi exercitationem sunt officia suscipit maiores velit repellat. Est molestias odit consequatur quis inventore. Voluptatum aut excepturi necessitatibus et eum vel totam.\n\nMaxime deleniti dolores earum debitis neque dolores dolores. Pariatur rerum neque blanditiis quae qui. Cum vel voluptas possimus assumenda eos dolorem. A sint quia aliquam dolor.\n\nEt rerum aliquid vitae quo tenetur alias debitis. Ut quia qui beatae autem distinctio necessitatibus. Mollitia eos inventore mollitia velit omnis blanditiis temporibus. Officia natus optio consequuntur neque laboriosam.', 2083.00, 2343.00, 791.00, 17, 0.75, 'Unisex', 'Linen', 'Relaxed', 'Machine wash cold. Do not bleach.', 0, 1, 1, 'Round Neck Tee', 'Repellendus sit qui voluptatem.', 'fashion, clothing, Round Neck Tee', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(15, 5, 'Slim Fit Jeans', 'slim-fit-jeans-4603', 'ECM-2320', 'products/default.jpg', 'Occaecati nisi ipsa qui est.', 'Quo omnis laboriosam harum illo pariatur iste soluta. In velit ut odio tenetur voluptatibus sed labore. Perferendis nobis voluptatum aliquam facilis aut. Nobis alias dignissimos vero odit delectus.\n\nNon nostrum laborum vel quidem. Sequi cumque quia ipsa quia. Asperiores ut molestias suscipit minima rerum neque repudiandae. Saepe officia architecto iste nisi. Eum ea rerum numquam.\n\nOccaecati rerum dolorem tempora hic vero. Aut possimus ea ut ut. Rerum cum et eos eaque laborum. Ducimus illo est aspernatur dolore at.\n\nSed dolores quo explicabo. Neque unde quo amet.', 1780.00, 621.00, 788.00, 92, 1.19, 'Men', 'Linen', 'Oversized', 'Machine wash cold. Do not bleach.', 0, 1, 1, 'Slim Fit Jeans', 'Provident est natus accusantium dicta numquam mollitia.', 'fashion, clothing, Slim Fit Jeans', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(16, 5, 'Winter Sweatshirt', 'winter-sweatshirt-6306', 'ECM-9075', 'products/default.jpg', 'Aperiam dolorum ducimus dolor assumenda sit fuga.', 'Ipsam eius enim debitis dolores consectetur. Tempore molestiae velit animi ab tenetur voluptatem. Qui dignissimos rerum quia et pariatur officia quia placeat.\n\nFacere asperiores quis atque enim quod rerum molestias. Ut fuga eveniet voluptas cum nemo debitis voluptatem eveniet. Voluptatem ut quod quae illo libero sed saepe.\n\nId temporibus dolor officia laborum. Et autem et enim. Nisi ut recusandae qui quo neque consequatur.\n\nItaque placeat amet quidem ullam consequuntur impedit. Unde pariatur qui neque facere non atque illo eveniet. Corporis est reiciendis et autem unde cum. Odio blanditiis accusamus et omnis sint.', 2847.00, 954.00, 471.00, 52, 0.94, 'Men', 'Denim', 'Oversized', 'Machine wash cold. Do not bleach.', 1, 1, 1, 'Winter Sweatshirt', 'Velit tempore ut similique aut.', 'fashion, clothing, Winter Sweatshirt', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(17, 4, 'Round Neck Tee', 'round-neck-tee-3422', 'ECM-8470', 'products/default.jpg', 'Accusantium vero nemo asperiores.', 'Autem nobis sed tenetur consequatur. Velit expedita facere labore dolores non. Ea dolores iure occaecati illo. Consequatur sint ut et alias quae vitae et.\n\nNisi ea ut nulla soluta esse magni suscipit. A fugit aut excepturi et. Libero sit odio omnis et exercitationem.\n\nSoluta est nihil aut quaerat qui enim. Occaecati et culpa non laudantium eius pariatur quas facilis. Omnis autem eligendi neque inventore impedit est repellendus.\n\nMinima impedit eius minima. Consequatur minima praesentium rerum quis recusandae. Excepturi accusantium harum atque dolores. Expedita illum unde eum blanditiis fugiat facere.', 2494.00, 2255.00, 909.00, 81, 0.40, 'Women', 'Polyester', 'Regular', 'Machine wash cold. Do not bleach.', 0, 0, 1, 'Round Neck Tee', 'Corporis reprehenderit consectetur aspernatur.', 'fashion, clothing, Round Neck Tee', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(18, 2, 'Polo T-Shirt', 'polo-t-shirt-8448', 'ECM-5947', 'products/default.jpg', 'Magni quaerat modi quidem corporis reiciendis modi.', 'Nam maxime quo molestiae suscipit architecto illo optio eius. Quia inventore neque maiores quo consequatur. Beatae vel amet sit maiores sit et.\n\nId provident nesciunt aut. Culpa ut maxime eveniet sint nihil nesciunt vitae quas. Laboriosam repellendus ea sunt cum dolorem. Quos alias id et autem. Commodi laudantium distinctio sequi ipsam numquam sit officia.\n\nNemo libero odit sed. Sapiente doloribus quis dolor est id. Voluptatem rem aut cupiditate qui.\n\nFacere quos sequi non et eos voluptatem. Vel qui at cum cupiditate debitis aut. Voluptatem voluptatibus reiciendis et impedit commodi animi laboriosam. Aspernatur iste et qui ipsum sit neque porro.', 1336.00, 2303.00, 1393.00, 29, 1.13, 'Kids', 'Denim', 'Regular', 'Machine wash cold. Do not bleach.', 1, 0, 1, 'Polo T-Shirt', 'Tempora aut error dolorum beatae omnis veniam ut.', 'fashion, clothing, Polo T-Shirt', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(19, 6, 'Casual Shirt', 'casual-shirt-5356', 'ECM-2655', 'products/default.jpg', 'Id mollitia omnis molestiae commodi quos.', 'Eum consequatur non aut sunt voluptate. Tenetur cum ipsa est omnis pariatur consequuntur. In id commodi quo ab quas voluptate. Et est incidunt asperiores corrupti ea qui minus.\n\nMolestiae distinctio ut quia dolor eum. Ipsam consequatur aperiam voluptatibus ut officiis explicabo dolores. Est fuga facere deserunt omnis sunt. Esse ut omnis omnis.\n\nAut doloremque sapiente aut. Cupiditate minus quia illum et. Minus quod quia eaque ipsam ut praesentium ut.\n\nQuia odio nihil architecto non consequatur dolor. Quod aut culpa ad deserunt. Et corporis sit facilis blanditiis ea qui. Consequuntur dicta ut facere fugiat. Magni omnis eligendi dolor impedit amet placeat voluptatum.', 2711.00, 779.00, 1163.00, 12, 1.26, 'Kids', 'Linen', 'Oversized', 'Machine wash cold. Do not bleach.', 0, 0, 1, 'Casual Shirt', 'Officiis facilis aperiam ratione eum consequatur.', 'fashion, clothing, Casual Shirt', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(20, 1, 'Slim Fit Jeans', 'slim-fit-jeans-6738', 'ECM-3311', 'products/default.jpg', 'Vel et hic quia est velit enim.', 'Eius qui cupiditate omnis nihil. Et possimus quis aut velit in perspiciatis quidem. Amet qui voluptatem aut ut eos. Voluptatem placeat soluta sed vitae.\n\nSuscipit exercitationem sequi necessitatibus dolores debitis eveniet ullam. Aut unde expedita quisquam quaerat ducimus et consequatur.\n\nRepellat sit voluptatibus ad aut voluptatem natus voluptatum. Repellat ipsam distinctio debitis in ex consequatur. Quia rerum doloribus expedita quos et deleniti. Quae pariatur dolor sunt minus sed assumenda.\n\nId omnis molestias consequuntur. Non quas voluptatum eum ipsam sapiente. Rem voluptate dolor similique et. Vel omnis et quae quae perferendis sunt ut.', 996.00, 1470.00, 1294.00, 81, 0.83, 'Women', 'Cotton', 'Regular', 'Machine wash cold. Do not bleach.', 0, 1, 1, 'Slim Fit Jeans', 'Et ut dolorem ut nostrum ad fugiat.', 'fashion, clothing, Slim Fit Jeans', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(21, 5, 'Polo T-Shirt', 'polo-t-shirt-521', 'ECM-3901', 'products/default.jpg', 'Unde nostrum nisi dolorem nisi expedita odit omnis.', 'Repudiandae repellendus est nam est. Quod iusto quisquam aut quia et recusandae assumenda. Ut sit ut quisquam repudiandae. Quisquam aut nobis qui corporis est consectetur et enim.\n\nEius omnis dolorum dolorem voluptas fuga nam error veniam. Non labore sed sit itaque quisquam. Praesentium qui omnis soluta officiis. Tempora dolores corporis quibusdam quia.\n\nConsequatur ab aut velit nesciunt. Quia totam molestiae molestiae hic quibusdam. Est pariatur aut temporibus vitae fuga expedita quis. Cum id aut ullam quis magni in iste.\n\nNisi voluptas est incidunt sequi commodi. Dolore cupiditate nobis illo aut impedit iste. Et est tempora ipsam voluptatum occaecati occaecati. Quasi totam suscipit numquam et.', 1692.00, 785.00, 931.00, 69, 1.26, 'Women', 'Polyester', 'Oversized', 'Machine wash cold. Do not bleach.', 0, 1, 1, 'Polo T-Shirt', 'Tempore hic totam ipsam ut voluptate.', 'fashion, clothing, Polo T-Shirt', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(22, 1, 'Oversized Hoodie', 'oversized-hoodie-5019', 'ECM-7564', 'products/default.jpg', 'Natus ut sit fuga dolorem est.', 'Numquam vero libero dolorum molestias eum omnis non. Deleniti velit facere recusandae nihil. Iure amet voluptatem inventore molestiae eum.\n\nRerum qui autem hic ut asperiores. Voluptatum et officia blanditiis illo et. Cum corporis asperiores aut error.\n\nQuas optio et et rerum ad est mollitia. Eos aut dicta voluptatibus consequuntur voluptatum. Excepturi tempora tempore qui est.\n\nUt quia laboriosam qui temporibus. Iusto laudantium est quo consequatur ipsum sed. Distinctio error dolorem laborum omnis reprehenderit. Minima quia quas illum quod praesentium ut inventore. Iure deleniti laborum iure dolores facere nostrum perferendis sit.', 1453.00, 520.00, 1434.00, 28, 0.69, 'Men', 'Denim', 'Slim', 'Machine wash cold. Do not bleach.', 0, 1, 1, 'Oversized Hoodie', 'Cum necessitatibus consequatur vel modi animi.', 'fashion, clothing, Oversized Hoodie', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(23, 6, 'Oversized Hoodie', 'oversized-hoodie-6168', 'ECM-3422', 'products/default.jpg', 'Maxime alias corporis facilis facere molestiae alias.', 'Tempore totam ratione qui eos aspernatur architecto. Reprehenderit qui incidunt consequatur voluptatum temporibus velit. Excepturi explicabo ipsam labore eum.\n\nQui eos unde ducimus in nostrum laboriosam adipisci. Distinctio est omnis corrupti et. Numquam est voluptatibus eius aut aut atque incidunt enim. Et ipsum doloribus vero inventore. Praesentium nesciunt dicta sit sint temporibus.\n\nId occaecati ipsum libero omnis. Iste sapiente qui saepe ullam sint. Eos vel quo repellat beatae. Dolor et soluta qui.\n\nSit aperiam perferendis sit natus. Est eos explicabo dicta laudantium. Aliquid labore itaque quas incidunt.', 941.00, 941.00, 378.00, 55, 0.34, 'Unisex', 'Linen', 'Oversized', 'Machine wash cold. Do not bleach.', 0, 0, 1, 'Oversized Hoodie', 'Voluptate dolores officia voluptatem et est rerum doloribus.', 'fashion, clothing, Oversized Hoodie', '2026-07-07 02:57:19', '2026-07-07 02:57:19'),
(24, 5, 'Premium Cotton T-Shirt', 'premium-cotton-t-shirt-4929', 'ECM-5422', 'products/default.jpg', 'Enim sit doloribus perspiciatis omnis.', 'Itaque facilis incidunt modi dicta nulla a qui. Deserunt sunt sed harum consequatur. Laudantium dicta ut reprehenderit voluptatum qui labore et. Repellat aut id veritatis et harum neque.\n\nAmet aut amet doloribus est et quaerat quo. In et officia eum hic. Ea aut voluptatibus iste ullam consectetur.\n\nAliquid rem quo praesentium quia. Quae neque accusantium ut ad. Commodi molestias maiores fuga aut pariatur. Quos eligendi exercitationem in error.\n\nAut voluptate non laborum tempore odit ut ea. Reiciendis corrupti culpa distinctio cupiditate vel consequatur. Sint voluptatem sunt ipsam quis. Mollitia quaerat rem deserunt exercitationem eos.', 2446.00, 1606.00, 1228.00, 75, 0.47, 'Unisex', 'Linen', 'Relaxed', 'Machine wash cold. Do not bleach.', 1, 1, 1, 'Premium Cotton T-Shirt', 'Exercitationem repudiandae et molestias voluptates reprehenderit quo.', 'fashion, clothing, Premium Cotton T-Shirt', '2026-07-07 02:57:19', '2026-07-07 02:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `site_tagline` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `banners` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`banners`)),
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `google_map_embed` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `footer_description` text DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta_keywords`)),
  `google_analytics` text DEFAULT NULL,
  `facebook_pixel` text DEFAULT NULL,
  `enable_cod` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_tagline`, `logo`, `favicon`, `banners`, `email`, `phone`, `whatsapp`, `address`, `google_map_embed`, `facebook`, `instagram`, `youtube`, `linkedin`, `twitter`, `footer_description`, `copyright`, `meta_title`, `meta_description`, `meta_keywords`, `google_analytics`, `facebook_pixel`, `enable_cod`, `created_at`, `updated_at`) VALUES
(1, 'mYstore', 'ecomm', 'settings/01KWXYEQPG6AR659NEVFY56TN9.png', 'settings/01KWXYEQPJ4ST15QZHHY4A8YT0.png', '[\"01KWXYEQPJ4ST15QZHHY4A8YT1.avif\",\"01KWXYEQPKA2R9DYB68NM1MZES.jpg\"]', 'arjun.hrnd@gmail.com', '8860107706', '8860107706', 'Building No 94, 1st Floor, near Shambhu Dayal Bagh, Old Ishwar Nagar, Shambhu Dayal Bagh, Okhla Industrial Estate, New Delhi, Delhi 110020', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3504.471521580969!2d77.2642747!3d28.5556004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce348246b2d63%3A0x5dd5a97f501ed58d!2sHub%20Hive%2011%20-%20Co-Working%20Space!5e0!3m2!1sen!2sin!4v1783340427520!5m2!1sen!2sin', 'http://localhost:8000/', 'http://localhost:8000/', 'http://localhost:8000/', 'http://localhost:8000/', 'http://localhost:8000/', 'Uncountable and unrivalled world\'s largest online and offline fashion house since 1990', 'Get your entire order with an extra 25%OFF for this festival', NULL, NULL, '[]', NULL, NULL, 1, '2026-07-07 03:56:20', '2026-07-10 06:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `rating` tinyint(4) NOT NULL DEFAULT 5,
  `review` text NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `company`, `image`, `rating`, `review`, `is_featured`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Rahul Sharma', 'Software Engineer', 'Google', 'testimonials/01KWY8EB2ZY416B9CVSKSEQHT4.', 5, 'Excellent quality clothing. Fast delivery and premium fabric. Highly recommended.', 1, 1, 1, NULL, '2026-07-07 06:51:59'),
(2, 'Priya Verma', 'Fashion Designer', 'Zara', NULL, 5, 'The fitting and fabric quality exceeded my expectations. Will definitely order again.', 1, 1, 2, NULL, NULL),
(3, 'Aman Gupta', 'Entrepreneur', 'Startup Founder', NULL, 5, 'One of the best online clothing stores. Great customer support and premium packaging.', 1, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Arjun Sharma', 'admin@gmail.com', NULL, '$2y$12$QkIx.Pqtf/0p0PsIQGYgFuCw/RTt2kEpvj..dmDHsVpQzaekkQh32', NULL, '2026-07-07 02:59:02', '2026-07-07 02:59:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_slug_index` (`slug`),
  ADD KEY `blogs_is_active_index` (`is_active`),
  ADD KEY `blogs_published_at_index` (`published_at`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
