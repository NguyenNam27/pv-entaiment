-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2022 at 11:32 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pv_entaiment`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `image`, `url`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(5, 'PhạmVinh', 'uploads/banner/-1648779577.jpg', NULL, 'mới', 1, '2022-04-01 02:19:37', NULL),
(6, 'Nguyen Nguyen', 'uploads/banner/-1648779593.jpg', NULL, 'mới', 1, '2022-04-01 02:19:53', NULL),
(7, 'Sản Phẩm', 'uploads/banner/-1648779612.jpg', NULL, 'mới', 1, '2022-04-01 02:20:12', NULL),
(8, 'MatKhau', 'uploads/banner/MatKhau-1648808544.jpg', NULL, 'mới', 1, '2022-04-01 10:22:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `massage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2022_03_22_015727_create_database', 1);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategories_id` int(10) UNSIGNED DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_word` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `subcategories_id`, `short_description`, `content`, `image`, `key_word`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'SKY TOUR MOVIE MANG VỀ DOANH THU 11.5 TỶ ĐỒNG SAU 10 NGÀY CÔNG CHIẾU', 'sky-tour-movie-mang-ve-doanh-thu-115-ty-dong-sau-10-ngay-cong-chieu', NULL, '<p>Vậy là sau 10 ngày công chiếu phim tài liệu điện ảnh SKY TOUR đã thu về con số 11,5 tỷđồng.</p>', '<p>Sau 10 ngày công chiếu, phim tài liệu điện ảnh&nbsp;SKY TOUR của nghệ sĩ Sơn Tùng M-TP chính thức rời khỏi rạp với con số doanh thu là 11,5 tỷ đồng.<br />\r\n<img alt=\"\" src=\"/ckfinder/userfiles/files/a7.jpg\" style=\"height:960px; width:639px\" /></p>', 'uploads/post/a7.jpg', 'SKY TOUR', 1, '2022-03-30 17:20:21', '2022-03-30 17:20:21'),
(4, 'Đạt 10.000 vé chỉ sau hai ngày, SKY TOUR MOVIE của Sơn Tùng M-TP xô đổ mọi kỉ lục phim Việt', 'dat-10000-ve-chi-sau-hai-ngay-sky-tour-movie-cua-son-tung-m-tp-xo-do-moi-ki-luc-phim-viet', NULL, '<p>Số lượng vé SKY TOUR MOVIE bán ra sau 48h đã phá vỡ mọi kỉ lục phim Việt.</p>', '<p>Là phim tài liệu âm nhạc về tour diễn của&nbsp;Sơn Tùng M-TP,<strong><em>&nbsp;SKY TOUR MOVIE</em></strong>&nbsp;nhận được rất nhiều sự quan tâm của cộng đồng fan hâm mộ Sơn Tùng nói riêng và cả khán giả mê điện ảnh nói chung. Bằng chứng là ngay sau khi các rạp mở bán vé, khán giả đã thi nhau lấp đầy rạp phim. Chiều ngày 11/6, sau 48h mở bán vé online và còn gần một ngày trước khi suất chiếu đầu tiên ra mắt, SKY TOUR đạt 10.000 vé bán ra – con số kỷ lục mà chưa bộ phim Việt Nam nào làm được. Vậy mới thấy sức ảnh hưởng của Sơn Tùng mạnh mẽ đến thế nào.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/a3.jpg\" style=\"height:960px; width:640px\" /></p>', 'uploads/post/a9.jpg', 'SKY TOUR', 1, '2022-03-31 16:15:57', '2022-03-31 16:15:57'),
(5, 'Sơn Tùng M-TP mướt mồ hôi tập luyện tại Đà Nẵng đến tận nửa đêm cho SKY TOUR', 'son-tung-m-tp-muot-mo-hoi-tap-luyen-tai-da-nang-den-tan-nua-dem-cho-sky-tour', NULL, '<p><em>Các khán giả tại Đà Nẵng đã sẵn sàng bùng nổ cùng đêm diễn thứ hai của Sky Tour? aaaaâ</em></p>', '<p>Tối 3/8, Sơn Tùng M-TP có mặt tại Cung Thể Thao Tiên Sơn, Đà Nẵng để tổng duyệt cho điểm diễn thứ 2 của SKY TOUR. Anh diện trang phục bụi bặm với áo sơ mi freezise phối cùng quần bò. Cũng như show ở TP.HCM, nam ca sĩ khá cẩn thận trong các khâu chuẩn bị để chương trình diễn ra một cách trọn vẹn nhất. Trước khi lên sân khấu tổng duyệt, anh ngồi bàn bạc kỹ lưỡng với đạo diễn chương trình Long Halo, đưa ra thêm các ý kiến hiệu ứng sân khấu phải thật hoàn hảo tại điểm đến thứ hai này.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/a13.jpg\" style=\"height:960px; width:720px\" /></p>\r\n\r\n<p>Hơn 22h, phần tổng duyệt của Sơn Tùng M-TP diễn ra. Nam ca sĩ tập trung chú ý đến phần âm thanh trong các tiết mục, thời điểm xuất hiện sau từng phần giao lưu hay bố trí các đạo cụ, vũ đoàn sao cho không mắc phải lỗi gì. Phần tổng duyệt diễn ra đến hơn 0h đêm, nhưng ekip đều nỗ lực tập trung để mang đến những phần biểu diễn tốt nhất vào ngày 4/8, đúng như tiêu chí chương trình là mang lại cho khán giả trải nghiệm đẹp mắt, đã tai khi tham dự SKY TOUR.</p>\r\n\r\n<p>Tương tự như ở TP.HCM, sáng ngày 4/8, những khán giả sở hữu tấm vé VVIP sẽ tham gia sự kiện Meet&amp;Greet. Họ sẽ được xem trước một số tiết mục tổng duyệt, nhận poster có chữ ký của toàn bộ nghệ sĩ trong chương trình SKY TOUR 2019 và giao lưu thân mật cùng Sơn Tùng M-TP. Buổi giao lưu cũng tuyệt đối không cho phép quay phim, chụp ảnh. Ban tổ chức cũng sẽ thu giữ điện thoại cá nhân và hoàn trả lại sau khi sự kiện kết thúc.</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/a13.jpg\" style=\"height:960px; width:720px\" /></p>', 'uploads/post/Sơn Tùng M-TP mướt mồ hôi tập luyện tại Đà Nẵng đến tận nửa đêm cho SKY TOUR-1648784591.jpg', 'SKY TOUR', 1, '2022-04-01 02:17:53', '2022-04-01 02:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategories_id` int(10) UNSIGNED DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `subcategories_id`, `price`, `image`, `short_description`, `content`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 'PREMIUM DIGITAL PACKAGE', 'premium-digital-package', 7, '120000', 'uploads/product/PREMIUM DIGITAL PACKAGE-1648808937.jpg', '<p>GÓI SẢN PHẨM SẼ ĐƯỢC GỬI QUA EMAIL CỦA BẠN. VUI LÒNG NHẬP CHÍNH XÁC ĐỊA CHỈ EMAIL CỦA BẠN KHI ĐẶT HÀNG</p>', '<p>Gói sản phẩm gồm có:</p>\n\n<ol>\n	<li>21 hình nền chất lượng cao dành cho điện thoại và laptop</li>\n	<li>Photobook phiên bản kỹ thuật số</li>\n	<li>Poster phiên bản kỹ thuật số kèm chữ ký của nghệ sĩ</li>\n	<li>Video lời cám ơn của nghệ sĩ Sơn Tùng M-TP và Hải Tú</li>\n	<li>File M/V Chúng Ta Của Hiện Tại chất lượng cao, độ phân giải 2K</li>\n	<li>File Audio Chúng Ta Của Hiện Tại định dạng WAV</li>\n	<li>File video Behind The Scenes M/V Chúng Ta Của Hiện Tại</li>\n	<li>File video chất lượng cao M/V Chúng Ta Của Hiện Tại phiên bản Karaoke</li>\n</ol>\n\n<p>*Giá sau ngày 20/12/2020: 870,000 vnd</p>', 1, '2022-04-01 10:28:57', '2022-04-01 10:28:57'),
(4, 'STANDARD DIGITAL PACKAGE', 'standard-digital-package', 7, '120000', 'uploads/product/STANDARD DIGITAL PACKAGE-1648809104.jpg', '<p>GÓI SẢN PHẨM SẼ ĐƯỢC GỬI QUA EMAIL CỦA BẠN. VUI LÒNG NHẬP CHÍNH XÁC ĐỊA CHỈ EMAIL CỦA BẠN KHI ĐẶT HÀNG</p>', '<p>Gói sản phẩm gồm có:</p>\r\n\r\n<ol>\r\n	<li>14 hình nền chất lượng cao dành cho điện thoại và laptop.</li>\r\n	<li>Photobook phiên bản kỹ thuật số</li>\r\n	<li>Poster phiên bản kỹ thuật số kèm chữ ký của nghệ sĩ</li>\r\n	<li>Video lời cám ơn của nghệ sĩ Sơn Tùng M-TP và Hải Tú</li>\r\n	<li>File M/V Chúng Ta Của Hiện Tại chất lượng Full HD</li>\r\n	<li>File Audio Chúng Ta Của Hiện Tại định dạng MP3</li>\r\n</ol>\r\n\r\n<p>*Giá sau ngày 20/12/2020: 450,000 vnd</p>', NULL, '2022-04-01 10:31:44', '2022-04-01 10:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `introduce` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company`, `address`, `image`, `hotline`, `email`, `introduce`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Công Ty TNHH Hoàng Vinh .co,ltd.', 'Q.Đống Đa , Hà Nội', 'uploads/setting/1606824641_Logo VNNIC Final_VNNIC LOGO 1.jpg', '18001166', 'admin@gmail.com', 'ko', 1, NULL, '2020-12-01 05:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(7, 'Sản Phẩm', 1, '2022-04-01 09:47:43', '2022-04-01 09:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyen Nguyen', 'nguyenngocnam00770@gmail.com', '$2y$10$S7ng7mDX4Ou2uuSI5b9HKOSfBfnGumqBQjtq5PFigtS3i/zsY1tPG', 'uploads/user/-1648387733.jpg', 'MdpDIaMEH3mqD3oljBwwyJ9kt82p96R2dbMtR8e6Voy4OjyseTZW2i3RG9Lo', '2022-03-27 06:28:53', '2022-03-27 06:28:53'),
(3, 'PhạmVinh', 'nguyennam00@gmail.com', '$2y$10$WctkcD93EFHDKAn8vY5H4.FELjJXweWK94efR4gNUpsSSiXou2kzS', 'uploads/user/-1648625453.jpg', 'BPky4HMB3sqfqjMytpQ4YbZbN9TJ6CYMxGmYeN4pMpnskCLRjZnebR6HOUaH', '2022-03-30 00:30:53', '2022-03-30 00:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `URL` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_name_unique` (`name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_email_unique` (`email`),
  ADD UNIQUE KEY `contacts_phone_unique` (`phone`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_title_unique` (`title`),
  ADD KEY `posts_subcategories_id_foreign` (`subcategories_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_subcategories_id_foreign` (`subcategories_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_subcategories_id_foreign` FOREIGN KEY (`subcategories_id`) REFERENCES `subcategories` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_subcategories_id_foreign` FOREIGN KEY (`subcategories_id`) REFERENCES `subcategories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
