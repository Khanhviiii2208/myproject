-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 05, 2024 lúc 04:09 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `learn_blog`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `meta_keyword`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(2, 'Xã hội', 'xa-hoi', '[{\"value\":\"hot\"}]', 'Tin thứ nhất', 'rgjnjgbnj', '2024-07-18 07:40:19', '2024-07-18 07:40:19'),
(4, 'Chính trị', 'chinh-tri', '[{\"value\":\"nhà nước\"},{\"value\":\"đảng\"}]', 'Tin thứ nhất chính trị', 'egnren', '2024-07-21 08:40:10', '2024-07-21 08:40:10'),
(5, 'dfb', 'dfb', '[{\"value\":\"re\"}]', 'fsdb', NULL, '2024-07-23 06:47:13', '2024-07-23 06:47:13'),
(7, 'nô nô', 'no-no', NULL, NULL, NULL, '2024-07-31 11:06:12', '2024-07-31 11:06:12'),
(8, 'Quân sự', 'quan-su', '[{\"value\":\"qs\"}]', 'Test', 'quân sự', '2024-08-02 21:03:29', '2024-08-02 21:03:29'),
(9, 'Showbiz', 'showbiz', '[{\"value\":\"showbiz\"}]', 'showbiz', 'showbiz', '2024-08-03 07:35:04', '2024-08-03 07:35:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_post`
--

CREATE TABLE `category_post` (
  `category_id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_post`
--

INSERT INTO `category_post` (`category_id`, `post_id`, `created_at`, `updated_at`) VALUES
(2, 19, NULL, NULL),
(4, 19, NULL, NULL),
(2, 20, NULL, NULL),
(4, 20, NULL, NULL),
(2, 21, NULL, NULL),
(2, 22, NULL, NULL),
(4, 22, NULL, NULL),
(2, 23, NULL, NULL),
(5, 25, NULL, NULL),
(2, 26, NULL, NULL),
(4, 27, NULL, NULL),
(8, 30, NULL, NULL),
(2, 31, NULL, NULL),
(4, 31, NULL, NULL),
(2, 32, NULL, NULL),
(4, 34, NULL, NULL),
(9, 35, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 2),
(11, '2019_08_19_000000_create_failed_jobs_table', 2),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(13, '2024_07_10_162728_create_categories_table', 2),
(15, '2024_07_17_162932_create_posts_table', 3),
(16, '2024_07_20_145402_create_category_post_table', 4),
(17, '2024_07_29_152256_create_permission_tables', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 9),
(1, 'App\\Models\\User', 26),
(1, 'App\\Models\\User', 28),
(1, 'App\\Models\\User', 29),
(3, 'App\\Models\\User', 30),
(1, 'App\\Models\\User', 31),
(1, 'App\\Models\\User', 32),
(2, 'App\\Models\\User', 34),
(2, 'App\\Models\\User', 35);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view post', 'web', '2024-07-29 08:51:04', '2024-07-29 08:51:04'),
(2, 'create post', 'web', '2024-07-29 08:51:04', '2024-07-29 08:51:04'),
(3, 'delete post', 'web', '2024-07-29 08:51:04', '2024-07-29 08:51:04'),
(4, 'edit post', 'web', '2024-07-29 08:51:04', '2024-07-29 08:51:04'),
(5, 'view category', 'web', '2024-08-01 08:54:17', '2024-08-01 08:54:17'),
(6, 'create category', 'web', '2024-08-01 08:54:17', '2024-08-01 08:54:17'),
(7, 'delete category', 'web', '2024-08-01 08:54:17', '2024-08-01 08:54:17'),
(8, 'edit category', 'web', '2024-08-01 08:54:17', '2024-08-01 08:54:17'),
(9, 'view user', 'web', '2024-08-01 08:54:38', '2024-08-01 08:54:38'),
(10, 'create user', 'web', '2024-08-01 08:54:38', '2024-08-01 08:54:38'),
(11, 'delete user', 'web', '2024-08-01 08:54:38', '2024-08-01 08:54:38'),
(12, 'edit user', 'web', '2024-08-01 08:54:38', '2024-08-01 08:54:38'),
(13, 'view role', 'web', '2024-08-01 09:46:01', '2024-08-01 09:46:01'),
(14, 'create role', 'web', '2024-08-01 09:46:01', '2024-08-01 09:46:01'),
(15, 'delete role', 'web', '2024-08-01 09:46:01', '2024-08-01 09:46:01'),
(16, 'edit role', 'web', '2024-08-01 09:46:01', '2024-08-01 09:46:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_content` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'pending',
  `rank` int NOT NULL DEFAULT '1',
  `views` int DEFAULT '0',
  `user_id` bigint UNSIGNED NOT NULL,
  `meta_keyword` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(160) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `name`, `slug`, `short_content`, `thumbnail`, `content`, `status`, `rank`, `views`, `user_id`, `meta_keyword`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(16, 'gtjguierjoejrofjeirghioerhoih dryh r6uh 5u  rgtger thyg', 'nkljguierjoejrofjeirghioerhoih', NULL, '/userfiles/image/abc/66ffc248a32167be54316144732917d4.jpg', 'Theo hãng tin AP, đoạn video trên thu hút sự chú ý sau khi được tỷ phú công nghệ 53 tuổi chia sẻ trên mạng xã hội X tối 26/7. Video được làm giống như một đoạn quảng cáo chiến dịch tranh cử tổng thống của bà Harris, song có nội dung mang tính đả kích phó tổng thống Mỹ, Tổng thống Joe Biden và đảng Dân Chủ.\n\nĐáng chú ý, video có giọng nói dẫn dắt giống hệt giọng nói của bà Kamala Harris. Song trên thực tế, đây hoàn toàn là một sản phẩm của trí tuệ nhân tạo.', 'accept', 1, 0, 1, '[{\"value\":\"gethg\"}]', '4gr', 'qfdg4r', '2024-07-21 08:17:02', '2024-08-02 10:33:56'),
(19, 'Thiết kế tên lửa mạnh nhất thế giới chưa từng phóng', 'thiet-ke-ten-lua-manh-nhat-the-gioi-chua-tung-phong', NULL, '/userfiles/image/abc/sp3.jpg', NULL, 'reject', 1, 0, 1, '[{\"value\":\"Mỹ\"},{\"value\":\"Nasa\"}]', 'Tên lửa của Mỹ', 'Thiết kế tên lửa mạnh nhất thế giới chưa từng phóng', '2024-07-23 07:19:20', '2024-08-02 20:15:44'),
(20, 'Giao thông shfuihruif hhh jhh hhh hhh hhh hhh jhh hhh hhh ', 'giao-thong-gff', NULL, '/userfiles/image/abc/66ffc248a32167be54316144732917d4.jpg', NULL, 'pending', 1, 0, 1, '[{\"value\":\"sss\"}]', 'sss', 'ss', '2024-07-23 07:50:04', '2024-07-23 07:50:04'),
(21, 'Từ 1/8, BV Bạch Mai khám bệnh ngoài giờ, chi phí khám có thay đổi?', 'tu-18-bv-bach-mai-kham-benh-ngoai-gio-chi-phi-kham-co-thay-doi', NULL, '/userfiles/image/abc/1kv.jpg', 'jfduibguigvj fbfvviehroigheroi ẻergh9erjgiergn êurhgjerig  ỉ', 'pending', 1, 0, 1, '[{\"value\":\"y tế\"},{\"value\":\"bệnh viện\"}]', 'BV Bạch Mai khám bệnh ngoài giờ', 'BV Bạch Mai khám bệnh ngoài giờ', '2024-07-30 19:53:00', '2024-07-30 19:53:00'),
(22, 'Ông chủ mạng X sử dụng AI đả kích Phó Tổng thống Mỹ', 'ong-chu-mang-x-su-dung-ai-da-kich-pho-tong-thong-my', NULL, '/userfiles/image/abc/ea529402910345e1e91cab04def213ce.jpg', NULL, 'accept', 1, 0, 1, '[{\"value\":\"x\"},{\"value\":\"tổng thống Mỹ\"}]', 'Tin thứ nhất', 'hehe', '2024-07-30 19:59:30', '2024-08-02 20:35:12'),
(23, 'Giao thông shfuihruif hhh jhh hhh hhh hhh hhh hh', 'giao-thong-shfuihruif', NULL, '/userfiles/image/abc/Gradient%20Now%20or%20Never%20Quote%20Wallpaper%20Dekstop%20(1).jpg', 'hiện lên', 'accept', 1, 0, 1, '[{\"value\":\"nono\"}]', 'nono', 'nono', '2024-07-30 20:56:34', '2024-08-02 20:35:23'),
(24, 'Nguyễn Trần Khánh Vi Nguyễn Trần Khánh', 'nguyen-tran-khanh-vi-nguyen-tran-khanh', NULL, '/userfiles/image/abc/ea529402910345e1e91cab04def213ce.jpg', NULL, 'accept', 1, 0, 1, '[{\"value\":\"t\"}]', 'hêh', 'e', '2024-07-30 21:16:32', '2024-08-03 05:55:16'),
(25, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhh fff hhh hhh ', 'hhhh', NULL, '/userfiles/image/abc/ea529402910345e1e91cab04def213ce.jpg', '<p>kh&aacute;nh vi 20 tuổi</p>', 'pending', 1, 0, 1, '[{\"value\":\"ê\"}]', 'ede', 'ê', '2024-07-30 21:22:36', '2024-07-30 21:22:36'),
(26, 'hrh', 'hrh', NULL, '/userfiles/image/abc/1kv.jpg', '<p>gg</p>', 'reject', 1, 0, 1, '[{\"value\":\"ff\"}]', 'ff', 'ff', '2024-07-30 22:45:14', '2024-08-03 06:03:36'),
(27, 'ngày 3 tháng 8', 'ngay-3-thang-8', NULL, '/userfiles/image/abc/6e7563be67275d44b60428dbdae21b4e.png', '<p>l&agrave; t&ocirc;i đ&acirc;y</p>', 'accept', 1, 0, 1, '[{\"value\":\"rr\"}]', 'rr', 'rr', '2024-08-02 10:44:51', '2024-08-02 23:00:50'),
(28, 'Giao thông việt nam đông đúc', 'giao-thong-viet-nam-dong-duc', NULL, '/userfiles/image/abc/6e7563be67275d44b60428dbdae21b4e.png', '<p>vveffr ff gegeg</p>', 'accept', 1, 0, 1, '[{\"value\":\"ffw\"}]', 'ff', 'ê', '2024-08-02 11:17:30', '2024-08-02 20:12:41'),
(29, 'How to', 'how-to', NULL, '/userfiles/image/abc/6e7563be67275d44b60428dbdae21b4e.png', '<p>ngộ</p>', 'pending', 1, 0, 1, '[{\"value\":\"ê\"}]', 'hêhe', 'fff', '2024-08-02 20:37:10', '2024-08-02 20:37:10'),
(30, 'Bài viết quân sự 1', 'bai-viet-quan-su-1', NULL, '/userfiles/image/abc/334d046dd38514071aefa2d58d32800c.png', '<p>B&agrave;i viết qu&acirc;n sự 1</p>', 'accept', 1, 0, 1, '[{\"value\":\"qs\"}]', 'Test qs', 'qs', '2024-08-02 21:05:21', '2024-08-02 21:09:09'),
(31, 'Chủ tịch nước Tô Lâm được bầu giữ chức Tổng Bí thư BCH Trung ương ĐCS Việt Nam', 'chu-tich-nuoc-to-lam-duoc-bau-giu-chuc-tong-bi-thu-bch-trung-uong-dcs-viet-nam', NULL, '/userfiles/image/abc/334d046dd38514071aefa2d58d32800c.png', '<h1>Chủ tịch nước T&ocirc; L&acirc;m được bầu giữ chức Tổng B&iacute; thư BCH Trung ương ĐCS Việt Nam</h1>', 'accept', 1, 0, 1, '[{\"value\":\"ff\"}]', 'hhh', 'dd', '2024-08-02 23:03:23', '2024-08-02 23:49:55'),
(32, 'Chung kết Miss Grand Vietnam 2024: \"Bùng nổ\" màn đọ sắc vóc, một nàng Hậu xuất hiện cùng hai mỹ nam \"Đảo thiên đường\"', 'chung-ket-miss-grand-vietnam-2024-bung-no-man-do-sac-voc-mot-nang-hau-xuat-hien-cung-hai-my-nam-dao-thien-duong', NULL, '/userfiles/image/abc/1467cbd8233ed599e1bd3d94512a1669.jpg', '<p id=\"\">Tối 3/8, chung kết&nbsp;<i><a href=\"https://kenh14.vn/miss-grand-vietnam-2024.html\" target=\"_blank\" title=\"Miss Grand Vietnam 2024\">Miss Grand Vietnam 2024</a>&nbsp;</i>diễn ra tại TP Phan Thiết, B&igrave;nh Thuận. Trước khi bước v&agrave;o đ&ecirc;m thi, chương tr&igrave;nh thảm đỏ đ&atilde; đặc biệt thu h&uacute;t sự ch&uacute; &yacute; của cộng đồng fan sắc đẹp với sự xuất hiện của d&agrave;n mỹ nam, mỹ nữ đ&igrave;nh đ&aacute;m showbiz Việt.</p>\r\n\r\n<figure type=\"Photo\">\r\n<p><a data-fancybox=\"img-lightbox\" data-fancybox-group=\"img-lightbox\" href=\"https://kenh14cdn.com/203336854389633024/2024/8/3/img7622-1722686384713656781643-1722690775434-1722690776236483535939.jpg\" title=\"Hoa hậu Lê Hoàng Phương nổi bật trong chiếc đầm xuyên thấu có phần đính kết ánh kim tỉ mỉ, khoe thân hình gợi cảm. Đêm nay, cô sẽ trao lại vương miện Miss Grand Vietnam cho người kế nhiệm.\"><img alt=\"Chung kết Miss Grand Vietnam 2024: \" b=\"\" c=\"\" data-author=\"\" data-original=\"https://kenh14cdn.com/203336854389633024/2024/8/3/img7622-1722686384713656781643-1722690775434-1722690776236483535939.jpg\" h=\"2517\" hai=\"\" height=\"2517\" hi=\"\" id=\"img_105183076083232768\" loading=\"lazy\" m=\"\" n=\"\" nam=\"\" photoid=\"105183076083232768\" rel=\"lightbox\" s=\"\" src=\"https://kenh14cdn.com/203336854389633024/2024/8/3/img7622-1722686384713656781643-1722690775434-1722690776236483535939.jpg\" thi=\"\" title=\"Chung kết Miss Grand Vietnam 2024: \" type=\"photo\" v=\"\" w=\"1600\" width=\"1600\" xu=\"\" /></a></p>\r\n\r\n<figcaption>\r\n<p data-placeholder=\"Nhập chú thích ảnh\"><i>Hoa hậu L&ecirc; Ho&agrave;ng Phương nổi bật trong chiếc đầm xuy&ecirc;n thấu c&oacute; phần đ&iacute;nh kết &aacute;nh kim tỉ mỉ, khoe th&acirc;n h&igrave;nh gợi cảm. Đ&ecirc;m nay, c&ocirc; sẽ trao lại vương miện Miss Grand Vietnam cho người kế nhiệm.</i></p>\r\n</figcaption>\r\n</figure>\r\n\r\n<figure type=\"Photo\">\r\n<p><a data-fancybox=\"img-lightbox\" data-fancybox-group=\"img-lightbox\" href=\"https://kenh14cdn.com/203336854389633024/2024/8/3/img7673-17226863848731934650270-1722690777417-17226907778111667288268.jpg\" title=\"Hoa hậu Thùy Tiên dịu dàng nhưng không kém phần cá tính trên thảm đỏ.\"><img alt=\"Chung kết Miss Grand Vietnam 2024: \" b=\"\" c=\"\" data-author=\"\" data-original=\"https://kenh14cdn.com/203336854389633024/2024/8/3/img7673-17226863848731934650270-1722690777417-17226907778111667288268.jpg\" h=\"2481\" hai=\"\" height=\"2481\" hi=\"\" id=\"img_105183076443217920\" loading=\"lazy\" m=\"\" n=\"\" nam=\"\" photoid=\"105183076443217920\" rel=\"lightbox\" s=\"\" src=\"https://kenh14cdn.com/203336854389633024/2024/8/3/img7673-17226863848731934650270-1722690777417-17226907778111667288268.jpg\" thi=\"\" title=\"Chung kết Miss Grand Vietnam 2024: \" type=\"photo\" v=\"\" w=\"1600\" width=\"1600\" xu=\"\" /></a></p>\r\n\r\n<figcaption>\r\n<p data-placeholder=\"Nhập chú thích ảnh\"><i>Hoa hậu Th&ugrave;y Ti&ecirc;n dịu d&agrave;ng nhưng kh&ocirc;ng k&eacute;m phần c&aacute; t&iacute;nh tr&ecirc;n thảm đỏ.</i></p>\r\n</figcaption>\r\n</figure>', 'pending', 1, 0, 1, '[{\"value\":\"ff\"}]', 'hhh', 'bbg', '2024-08-03 07:02:37', '2024-08-03 07:02:37'),
(33, 'Chung kết Miss Grand Vietnam 2024: Bùng nổ màn đọ sắc vóc, một nàng Hậu xuất hiện cùng hai mỹ nam \"Đảo thiên đường', 'chung-ket-miss-grand-vietnam-2024-bung-no-man-do-sac-voc-mot-nang-hau-xuat-hien-cung-hai-my-nam-dao-thien-duong', NULL, '/userfiles/image/abc/0e4c6b00dbfdd9524a1b17d5f1bdcf08.jpg', '<p>ssss</p>', 'pending', 1, 0, 1, '[{\"value\":\"ss\"}]', 'ss', 'ss', '2024-08-03 07:26:27', '2024-08-03 07:26:27'),
(34, 'Chung kết Miss Grand Vietnam 2024 Bùng nổ màn đọ sắc vóc, một nàng Hậu xuất hiện cùng hai mỹ nam', 'chung-ket-miss-grand-vietnam-2024-bung-no-man-do-sac-voc-mot-nang-hau-xuat-hien-cung-hai-my-nam', NULL, '/userfiles/image/abc/0e4c6b00dbfdd9524a1b17d5f1bdcf08.jpg', '<p id=\"\">Tối 3/8, chung kết&nbsp;<i><a href=\"https://kenh14.vn/miss-grand-vietnam-2024.html\" target=\"_blank\" title=\"Miss Grand Vietnam 2024\">Miss Grand Vietnam 2024</a>&nbsp;</i>diễn ra tại TP Phan Thiết, B&igrave;nh Thuận. Trước khi bước v&agrave;o đ&ecirc;m thi, chương tr&igrave;nh thảm đỏ đ&atilde; đặc biệt thu h&uacute;t sự ch&uacute; &yacute; của cộng đồng fan sắc đẹp với sự xuất hiện của d&agrave;n mỹ nam, mỹ nữ đ&igrave;nh đ&aacute;m showbiz Việt.</p>\r\n\r\n<figure type=\"Photo\">\r\n<p><a data-fancybox=\"img-lightbox\" data-fancybox-group=\"img-lightbox\" href=\"https://kenh14cdn.com/203336854389633024/2024/8/3/img7622-1722686384713656781643-1722690775434-1722690776236483535939.jpg\" title=\"Hoa hậu Lê Hoàng Phương nổi bật trong chiếc đầm xuyên thấu có phần đính kết ánh kim tỉ mỉ, khoe thân hình gợi cảm. Đêm nay, cô sẽ trao lại vương miện Miss Grand Vietnam cho người kế nhiệm.\"><img alt=\"Chung kết Miss Grand Vietnam 2024: \" b=\"\" c=\"\" data-author=\"\" data-original=\"https://kenh14cdn.com/203336854389633024/2024/8/3/img7622-1722686384713656781643-1722690775434-1722690776236483535939.jpg\" h=\"2517\" hai=\"\" height=\"2517\" hi=\"\" id=\"img_105183076083232768\" loading=\"lazy\" m=\"\" n=\"\" nam=\"\" photoid=\"105183076083232768\" rel=\"lightbox\" s=\"\" src=\"https://kenh14cdn.com/203336854389633024/2024/8/3/img7622-1722686384713656781643-1722690775434-1722690776236483535939.jpg\" thi=\"\" title=\"Chung kết Miss Grand Vietnam 2024: \" type=\"photo\" v=\"\" w=\"1600\" width=\"1600\" xu=\"\" /></a></p>\r\n\r\n<figcaption>\r\n<p data-placeholder=\"Nhập chú thích ảnh\"><i>Hoa hậu L&ecirc; Ho&agrave;ng Phương nổi bật trong chiếc đầm xuy&ecirc;n thấu c&oacute; phần đ&iacute;nh kết &aacute;nh kim tỉ mỉ, khoe th&acirc;n h&igrave;nh gợi cảm. Đ&ecirc;m nay, c&ocirc; sẽ trao lại vương miện Miss Grand Vietnam cho người kế nhiệm.</i></p>\r\n</figcaption>\r\n</figure>\r\n\r\n<figure type=\"Photo\">\r\n<p><a data-fancybox=\"img-lightbox\" data-fancybox-group=\"img-lightbox\" href=\"https://kenh14cdn.com/203336854389633024/2024/8/3/img7673-17226863848731934650270-1722690777417-17226907778111667288268.jpg\" title=\"Hoa hậu Thùy Tiên dịu dàng nhưng không kém phần cá tính trên thảm đỏ.\"><img alt=\"Chung kết Miss Grand Vietnam 2024: \" b=\"\" c=\"\" data-author=\"\" data-original=\"https://kenh14cdn.com/203336854389633024/2024/8/3/img7673-17226863848731934650270-1722690777417-17226907778111667288268.jpg\" h=\"2481\" hai=\"\" height=\"2481\" hi=\"\" id=\"img_105183076443217920\" loading=\"lazy\" m=\"\" n=\"\" nam=\"\" photoid=\"105183076443217920\" rel=\"lightbox\" s=\"\" src=\"https://kenh14cdn.com/203336854389633024/2024/8/3/img7673-17226863848731934650270-1722690777417-17226907778111667288268.jpg\" thi=\"\" title=\"Chung kết Miss Grand Vietnam 2024: \" type=\"photo\" v=\"\" w=\"1600\" width=\"1600\" xu=\"\" /></a></p>\r\n\r\n<figcaption>\r\n<p data-placeholder=\"Nhập chú thích ảnh\"><i>Hoa hậu Th&ugrave;y Ti&ecirc;n dịu d&agrave;ng nhưng kh&ocirc;ng k&eacute;m phần c&aacute; t&iacute;nh tr&ecirc;n thảm đỏ.</i></p>\r\n</figcaption>\r\n</figure>', 'accept', 1, 0, 1, '[{\"value\":\"hh\"}]', 'jegjrj', 'ss', '2024-08-03 07:29:33', '2024-08-03 07:31:46'),
(35, 'Chung kết Miss Grand Vietnam 2024: Bùng nổ màn đọ sắc, một nàng Hậu xuất hiện cùng hai mỹ nam Đảo thiên đường', 'chung-ket-miss-grand-vietnam-2024-bung-no-man-do-sac-mot-nang-hau-xuat-hien-cung-hai-my-nam-dao-thien-duong', NULL, '/userfiles/image/abc/1467cbd8233ed599e1bd3d94512a1669.jpg', '<p id=\"\">Tối 3/8, chung kết&nbsp;<i><a href=\"https://kenh14.vn/miss-grand-vietnam-2024.html\" target=\"_blank\" title=\"Miss Grand Vietnam 2024\">Miss Grand Vietnam 2024</a>&nbsp;</i>diễn ra tại TP Phan Thiết, B&igrave;nh Thuận. Trước khi bước v&agrave;o đ&ecirc;m thi, chương tr&igrave;nh thảm đỏ đ&atilde; đặc biệt thu h&uacute;t sự ch&uacute; &yacute; của cộng đồng fan sắc đẹp với sự xuất hiện của d&agrave;n mỹ nam, mỹ nữ đ&igrave;nh đ&aacute;m showbiz Việt.</p>\r\n\r\n<figure type=\"Photo\">\r\n<p><a data-fancybox=\"img-lightbox\" data-fancybox-group=\"img-lightbox\" href=\"https://kenh14cdn.com/203336854389633024/2024/8/3/img7622-1722686384713656781643-1722690775434-1722690776236483535939.jpg\" title=\"Hoa hậu Lê Hoàng Phương nổi bật trong chiếc đầm xuyên thấu có phần đính kết ánh kim tỉ mỉ, khoe thân hình gợi cảm. Đêm nay, cô sẽ trao lại vương miện Miss Grand Vietnam cho người kế nhiệm.\"><img alt=\"Chung kết Miss Grand Vietnam 2024: \" b=\"\" c=\"\" data-author=\"\" data-original=\"https://kenh14cdn.com/203336854389633024/2024/8/3/img7622-1722686384713656781643-1722690775434-1722690776236483535939.jpg\" h=\"2517\" hai=\"\" height=\"2517\" hi=\"\" id=\"img_105183076083232768\" loading=\"lazy\" m=\"\" n=\"\" nam=\"\" photoid=\"105183076083232768\" rel=\"lightbox\" s=\"\" src=\"https://kenh14cdn.com/203336854389633024/2024/8/3/img7622-1722686384713656781643-1722690775434-1722690776236483535939.jpg\" thi=\"\" title=\"Chung kết Miss Grand Vietnam 2024: \" type=\"photo\" v=\"\" w=\"1600\" width=\"1600\" xu=\"\" /></a></p>\r\n\r\n<figcaption>\r\n<p data-placeholder=\"Nhập chú thích ảnh\"><i>Hoa hậu L&ecirc; Ho&agrave;ng Phương nổi bật trong chiếc đầm xuy&ecirc;n thấu c&oacute; phần đ&iacute;nh kết &aacute;nh kim tỉ mỉ, khoe th&acirc;n h&igrave;nh gợi cảm. Đ&ecirc;m nay, c&ocirc; sẽ trao lại vương miện Miss Grand Vietnam cho người kế nhiệm.</i></p>\r\n</figcaption>\r\n</figure>\r\n\r\n<figure type=\"Photo\">\r\n<p><a data-fancybox=\"img-lightbox\" data-fancybox-group=\"img-lightbox\" href=\"https://kenh14cdn.com/203336854389633024/2024/8/3/img7673-17226863848731934650270-1722690777417-17226907778111667288268.jpg\" title=\"Hoa hậu Thùy Tiên dịu dàng nhưng không kém phần cá tính trên thảm đỏ.\"><img alt=\"Chung kết Miss Grand Vietnam 2024: \" b=\"\" c=\"\" data-author=\"\" data-original=\"https://kenh14cdn.com/203336854389633024/2024/8/3/img7673-17226863848731934650270-1722690777417-17226907778111667288268.jpg\" h=\"2481\" hai=\"\" height=\"2481\" hi=\"\" id=\"img_105183076443217920\" loading=\"lazy\" m=\"\" n=\"\" nam=\"\" photoid=\"105183076443217920\" rel=\"lightbox\" s=\"\" src=\"https://kenh14cdn.com/203336854389633024/2024/8/3/img7673-17226863848731934650270-1722690777417-17226907778111667288268.jpg\" thi=\"\" title=\"Chung kết Miss Grand Vietnam 2024: \" type=\"photo\" v=\"\" w=\"1600\" width=\"1600\" xu=\"\" /></a></p>\r\n\r\n<figcaption>\r\n<p data-placeholder=\"Nhập chú thích ảnh\"><i>Hoa hậu Th&ugrave;y Ti&ecirc;n dịu d&agrave;ng nhưng kh&ocirc;ng k&eacute;m phần c&aacute; t&iacute;nh tr&ecirc;n thảm đỏ.</i></p>\r\n</figcaption>\r\n</figure>', 'accept', 1, 0, 1, '[{\"value\":\"omg\"}]', 'omg', 'omg', '2024-08-03 07:36:33', '2024-08-03 07:37:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Ban biên tập', 'web', '2024-07-29 08:38:23', '2024-07-29 08:38:23'),
(2, 'Tác giả', 'web', '2024-07-30 08:06:34', '2024-07-30 08:06:34'),
(3, 'Admin', 'web', '2024-07-30 08:16:35', '2024-07-30 08:16:35'),
(5, '=)))', 'web', '2024-07-31 10:21:39', '2024-07-31 10:21:39'),
(9, 'Nguyễn Trần Khánh Vi', 'web', '2024-07-31 10:42:51', '2024-07-31 10:42:51'),
(10, 'User', 'web', '2024-08-03 10:29:58', '2024-08-03 10:29:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(9, 3),
(1, 5),
(9, 5),
(1, 9),
(2, 9),
(1, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'thor ', 'khanhvi12344321@gmail.com', '$2y$10$o/YWbRKC.l3fVQkGZlpJh.mk0sP5YrzeBk1DsaMJfh.mBI5Y1SO22', 'Ban biên tập', '1', NULL, 'f9EwCQzJVTDSuAYPATByfTrm0ZCGsP3zgCQGBW7yETnj5Jc8dJmOKJthIA9w', NULL, NULL),
(3, 'Tuyet Ngan', 'agutkowski@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '1', '2024-07-04 08:48:53', 'BVfovkEAaL', '2024-07-04 08:48:53', '2024-07-10 09:08:25'),
(4, 'Ngộ Ha', 'regan.kirlin@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '1', '2024-07-04 08:48:53', 'g5GRT0LAwf', '2024-07-04 08:48:53', '2024-07-21 08:31:36'),
(6, 'Roscoe Osinski', 'cremin.kristina@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '1', '2024-07-04 08:48:53', 'Spjb1d3YYn', '2024-07-04 08:48:53', '2024-07-21 08:40:42'),
(7, 'Fritz McKenzie', 'damore.lupe@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '1', '2024-07-04 08:48:53', 'Wt80qsF1kJ', '2024-07-04 08:48:53', '2024-07-04 08:48:53'),
(8, 'Alec Hermann', 'bertrand35@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '1', '2024-07-04 08:48:53', 'NreQXvijVl', '2024-07-04 08:48:53', '2024-07-21 08:51:22'),
(9, 'Mr. Will Nolan', 'mckenzie.maryse@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '1', '2024-07-04 08:48:53', 'BkbzwbESWzes2fMFKYukGOzB9NiXwgtbJTgA6Kuj6f01AVn2bEXBifabRlYx', '2024-07-04 08:48:53', '2024-07-04 08:48:53'),
(10, 'Teagan Dach', 'jevon26@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '1', '2024-07-04 08:48:53', 'uxenqVkvwO', '2024-07-04 08:48:53', '2024-07-04 08:48:53'),
(11, 'Cleta Bahringer', 'cronin.sonia@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '1', '2024-07-04 08:48:53', 'HkWHGDUyz2', '2024-07-04 08:48:53', '2024-07-04 08:48:53'),
(12, 'Terrance Kozey', 'alfreda34@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '1', '2024-07-04 08:50:07', 'nrn0moqnwY', '2024-07-04 08:50:07', '2024-07-04 08:50:07'),
(16, 'Ola Schowalter', 'hettinger.murray@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '1', '2024-07-04 08:50:07', 'N5RbvQvOXW', '2024-07-04 08:50:07', '2024-07-04 08:50:07'),
(17, 'Dr. Gerald Johnson DVM', 'mante.merle@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '1', '2024-07-04 08:50:07', 'PFVFLQaq86', '2024-07-04 08:50:07', '2024-07-04 08:50:07'),
(18, 'Mr. Stephen Stark DVM', 'fwisoky@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '1', '2024-07-04 08:50:07', 'z4ER6xQNLj', '2024-07-04 08:50:07', '2024-07-04 08:50:07'),
(19, 'Gennaro Williamson', 'zjerde@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '1', '2024-07-04 08:50:07', 'HTRzIKOLue', '2024-07-04 08:50:07', '2024-07-04 08:50:07'),
(20, 'Nash Kautzer', 'grace.ebert@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '1', '2024-07-04 08:50:07', 'TzlfDo2BxS', '2024-07-04 08:50:07', '2024-07-04 08:50:07'),
(22, 'Bùi Tuyết Ngân', 'nganbtpd07553@fpt.edu.vn', '$2y$10$mx/YLuyQ6ay6P8ctYG.HYOMn/b.qSA8qx33QrjMJ1g6yTyWE19r7S', 'user', '1', NULL, NULL, NULL, '2024-07-10 22:53:57'),
(24, 'Tuyết Ngân', 'ngan111@gmail.com', 'admin', 'user', '1', '2024-07-16 16:50:16', NULL, NULL, '2024-07-23 02:05:33'),
(25, 'Khánh Vi', 'khanhvi123@gmail.com', '$2y$10$tKPhPknmZgdvnMqaimvNeutmH1jnn8G17/tvWmaUb/taT7RKQ6xuW', 'Admin', '1', NULL, NULL, NULL, '2024-08-04 20:58:02'),
(28, 'Khánh Vi', 'khanhvi@gmail.com', '$2y$10$WiKvGj7d8M52/UMZGJcA2O7OVvwCgeKN4epvTeXW6tgrFgeT4VFZK', 'user', '1', NULL, NULL, '2024-07-30 19:49:02', '2024-07-30 19:49:02'),
(29, 'Khánh Zi', 'k@gmail.com', '$2y$10$Z1ctZJ6VUtrPV0xni6WXleeWUSNIBNe3stPu5UqkJxlgWUsrrXmKO', 'user', '1', NULL, NULL, '2024-07-30 20:01:46', '2024-07-30 20:01:46'),
(30, 'nô nô', 'nono@gmail.com', '$2y$10$pX0KAjjM9EtSLtPU3oszS.JrpBJrWwiCCnaCKyQOUluRMMUeLsOXS', 'user', '2', NULL, NULL, '2024-07-31 11:07:35', '2024-07-31 11:07:35'),
(31, 'Vi', 'vi@gmail.com', '$2y$10$CsoouRyPMD526HKChosAnuS8LVza1Focsva6fadKbP7A75KuvBVD.', 'Ban biên tập', '1', NULL, NULL, '2024-08-03 09:34:03', '2024-08-03 09:42:19'),
(32, 'Khánh', 'khanh@gmail.com', '$2y$10$LrQQQLctPeg6b3pXaIXjj.wMmIfv9VM5WMtgieredHIbAvshAmrKm', 'Tác giả', '1', NULL, NULL, '2024-08-03 10:55:40', '2024-08-03 10:56:09'),
(33, 'Khánh Trần', 'khanhtran@gmail.com', '$2y$10$sCpjOS0jNXYeZI7ss7AxLOBoAXfAfaoOzcARiQGgi9dBsnQclcedW', 'user', '1', NULL, NULL, '2024-08-04 20:45:49', '2024-08-04 20:45:49'),
(34, 'Tuyết', 'tuyet@gmail.com', '$2y$10$nKJEcVKVIa8yDVXO8dA4PuNzVsa9Bq88F/hhqBVJH0aV2Q8yDghA2', 'Tác giả', '1', NULL, NULL, '2024-08-04 20:47:20', '2024-08-04 21:05:11'),
(35, 'Ly', 'ly@gmail.com', '$2y$10$37yv3OyiW42uaFMSzhJhY.6A/j2qUyfujUqUasiKxGBdkDgaAHxKS', 'user', '1', NULL, NULL, '2024-08-04 21:03:16', '2024-08-04 21:03:16');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_post`
--
ALTER TABLE `category_post`
  ADD KEY `category_post_category_id_foreign` (`category_id`),
  ADD KEY `category_post_post_id_foreign` (`post_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `roles_foreign` (`role`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `category_post`
--
ALTER TABLE `category_post`
  ADD CONSTRAINT `category_post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
