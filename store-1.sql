-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 28, 2021 lúc 03:17 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(0, 'Vy', 'phuongvy012456@gmail.com', 'vyvy000', 'e10adc3949ba59abbe56e057f20f883e', 0),
(1, 'DinhVy', 'phuongvy012456@gmail.com', 'dinhvy789', '21b95a0f90138767b0fd324e6be3457b', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'DELL'),
(2, 'SAMSUNG'),
(3, 'Xiaomi'),
(5, 'OPPO'),
(6, 'Lenovo'),
(7, 'Iphone'),
(8, 'Panasonic'),
(9, 'SONY'),
(10, 'Canon'),
(11, 'Nakzen');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(2, 'Laptop'),
(3, 'Clock'),
(7, 'Phone'),
(8, 'Air-conditioner');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `phone`, `email`, `password`) VALUES
(2, 'Vy', 'Tòa Nhà VeroHomes, 7A/5/44 Thành Thái, P.14, Q.10, TP.HCM', '0827900045', 'phuongvy012468@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Lê Thị An Bình', 'Tòa Nhà VeroHomes, 7A/5/44 Thành Thái, P.14, Q.10, TP.HCM', '0957549381', 'lethianbinh2001@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productId`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`) VALUES
(25, 24, 'Điện thoại iPhone 12 Pro 256GB', 2, 1, '33990000', '94eff32b93.jpg', 0, '2021-05-20 15:20:39'),
(26, 9, 'Lenovo - ceneral due core', 2, 1, '16690000', '4c8d42e0b1.jpg', 0, '2021-05-20 16:05:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` tinytext NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`) VALUES
(9, 'Lenovo - ceneral due core', 2, 6, '<p>Thương hiệu: Lenovo T&ecirc;n: Lenovo Ideapad 110-15IBR (80T7000HUS) Laptop (Celeron Dual Core/4 GB/500 GB/Windows 10) Model: 110-15ibr (80t7000hus) Hệ Điều H&agrave;nh: windows 10 home basic Bộ Xử L&yacute;: intel celeron dual core n3060 M&agrave;u Sắc: black Trọng Lượng: 2.19 kg Ram: 4 gb ddr3 ram Bộ Xử L&yacute; Đồ Họa: intel hd graphics 400</p>', 1, '16690000 ', '4c8d42e0b1.jpg'),
(12, 'Đồng hồ Nữ Nakzen SL9287LBK-7', 3, 11, '<p>- Đến từ thương hiệu&nbsp;<a title=\"Đồng hồ Nakzen ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dong-ho-deo-tay-nakzen\" target=\"_blank\">đồng hồ Nakzen</a>&nbsp;c&oacute; tiếng của Nhật Bản</p>\r\n<p>-&nbsp;<a title=\"Đồng hồ ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dong-ho-deo-tay\" target=\"_blank\">Đồng hồ</a>&nbsp;sở hữu đường k&iacute;nh mặt 33 mm c&ugrave;ng độ rộng d&acirc;y 16 mm</p>\r\n<p>- Khung viền th&eacute;p kh&ocirc;ng gỉ&nbsp;chắc chắn, chống ăn m&ograve;n, chịu được mọi thời tiết khắc nghiệt. D&acirc;y da&nbsp;nhẹ nh&agrave;ng, năng động, cho bạn thoải m&aacute;i khi đeo</p>\r\n<p>- Hệ số chống nước 30m gi&uacute;p&nbsp;<a title=\"Đồng hồ nữ ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dong-ho-deo-tay-nu\" target=\"_blank\">đồng hồ nữ</a>&nbsp;n&agrave;y an to&agrave;n khi rửa tay v&agrave; đi mưa nhỏ, kh&ocirc;ng n&ecirc;n đeo khi tắm rửa</p>', 1, '990000  ', 'b00d344275.jpg'),
(13, 'Đồng hồ Nữ Nakzen SL4118LBN-7NR', 3, 11, '<div class=\"article__content short\">\r\n<p>- L&agrave; một sản phẩm c&oacute; chất lượng đến từ thương hiệu&nbsp;<a title=\"Đồng hồ Nakzen ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dong-ho-deo-tay-nakzen\" target=\"_blank\">đồng hồ Nakzen</a>&nbsp;- Nhật Bản</p>\r\n<p>- Sở hữu đường k&iacute;nh mặt 30 mm c&ugrave;ng độ rộng d&acirc;y 15 mm</p>\r\n<p>-&nbsp;<a title=\"Đồng hồ ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dong-ho-deo-tay\" target=\"_blank\">Đồng hồ</a>&nbsp;c&oacute;&nbsp;khung viền th&eacute;p kh&ocirc;ng gỉ cứng c&aacute;p, chống ăn m&ograve;n, bảo vệ tốt c&aacute;c chi tiết b&ecirc;n trong. D&acirc;y da bền bỉ,&nbsp;trọng lượng nhẹ, cho cảm gi&aacute;c &ecirc;m tay khi đeo</p>\r\n<p>- Thoải m&aacute;i đeo&nbsp;<a title=\"Đồng hồ nữ ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dong-ho-deo-tay-nu\" target=\"_blank\">đồng hồ nữ</a>&nbsp;khi đi mưa nhỏ, rửa tay nhờ&nbsp;c&oacute; hệ số chống nước 3 ATM, kh&ocirc;ng n&ecirc;n mang đồng hồ khi tắm rửa</p>\r\n<div>&nbsp;</div>\r\n</div>', 1, '1090000 ', '9a8b254f57.jpg'),
(14, 'Đồng hồ Nữ Nakzen SL4118LBK-1', 3, 11, '<p>- L&agrave; m&oacute;n phụ kiện thời trang thanh lịch đến từ thương hiệu&nbsp;<a title=\"Đồng hồ Nakzen ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dong-ho-deo-tay-nakzen\" target=\"_blank\">đồng hồ Nakzen</a>&nbsp;của Nhật Bản</p>\r\n<p>-&nbsp;<a title=\"Đồng hồ ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dong-ho-deo-tay\" target=\"_blank\">Đồng hồ</a>&nbsp;gọn nhẹ với&nbsp;đường k&iacute;nh mặt 30 mm c&ugrave;ng độ rộng d&acirc;y 15 mm</p>\r\n<p>- Khung viền th&eacute;p kh&ocirc;ng gỉ c&oacute; độ bền cao, kh&oacute; m&oacute;p m&eacute;o trước những va đập th&ocirc;ng thường. D&acirc;y da mềm mại v&agrave; &ecirc;m tay, kh&ocirc;ng g&acirc;y kh&oacute; chịu khi đeo cả ng&agrave;y</p>\r\n<p>- Người d&ugrave;ng thoải m&aacute;i đeo&nbsp;<a title=\"Đồng hồ nữ ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dong-ho-deo-tay-nu\" target=\"_blank\">đồng hồ nữ</a>&nbsp;n&agrave;y khi rửa tay v&agrave; đi mưa nhỏ với hệ số chống nước 3 ATM, kh&ocirc;ng n&ecirc;n mang khi đi tắm</p>', 1, '1090000 ', '31583f3294.jpg'),
(15, 'Đồng hồ Nam Nakzen SL4118GBN-7NR', 3, 11, '<p>- Đến từ h&atilde;ng&nbsp;<a title=\"Đồng hồ Nakzen ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dong-ho-deo-tay-nakzen\" target=\"_blank\">đồng hồ Nakzen</a>&nbsp;của Nhật Bản</p>\r\n<p>-&nbsp;<a title=\"Đồng hồ ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dong-ho-deo-tay\" target=\"_blank\">Đồng hồ</a>&nbsp;sở hữu đường k&iacute;nh mặt 40 mm c&ugrave;ng độ rộng d&acirc;y 20 mm</p>\r\n<p>-&nbsp;Khung viền th&eacute;p kh&ocirc;ng gỉ bền chắc, chống ăn m&ograve;n, an to&agrave;n khi bị rơi rớt ở độ cao vừa phải. D&acirc;y da nhẹ nh&agrave;ng, &ocirc;m tay tốt, &ecirc;m dịu cổ tay khi đeo</p>\r\n<p>-&nbsp;<a title=\"Đồng hồ nam ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dong-ho-deo-tay-nam\" target=\"_blank\">Đồng hồ nam</a>&nbsp;an to&agrave;n&nbsp;khi rửa tay v&agrave; đi mưa nhỏ nhờ c&oacute; hệ số chống nước 3 ATM, kh&ocirc;ng n&ecirc;n đeo khi tắm, bơi lội</p>', 1, '1090000 ', '734a7ac01d.jpg'),
(16, 'Đồng hồ Nữ Nakzen SL4118LBN-7 ', 3, 11, '<p>- Mang thiết kế nữ t&iacute;nh đến từ thương hiệu&nbsp;<a title=\"Đồng hồ Nakzen ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dong-ho-deo-tay-nakzen\" target=\"_blank\">đồng hồ Nakzen</a>&nbsp;- Nhật Bản</p>\r\n<p>- Sở hữu đường k&iacute;nh mặt 30 mm c&ugrave;ng độ rộng d&acirc;y 15 mm</p>\r\n<p>-&nbsp;<a title=\"Đồng hồ ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dong-ho-deo-tay\" target=\"_blank\">Đồng hồ</a>&nbsp;c&oacute;&nbsp;khung viền th&eacute;p kh&ocirc;ng gỉ cứng c&aacute;p, chịu lực tốt, dễ lau ch&ugrave;i khi b&aacute;m bụi bẩn. D&acirc;y da &ecirc;m nhẹ, thiết kế &ocirc;m tay tốt cho bạn thoải m&aacute;i suốt ng&agrave;y d&agrave;i</p>\r\n<p>- Nhờ c&oacute; hệ số chống nước 3 ATM m&agrave;&nbsp;<a title=\"Đồng hồ nữ ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dong-ho-deo-tay-nu\" target=\"_blank\">đồng hồ nữ</a>&nbsp;n&agrave;y an to&agrave;n khi rửa tay v&agrave; đi mưa nhỏ, kh&ocirc;ng n&ecirc;n đeo khi tắm, bơi lội</p>', 1, '1090000 ', '857cbe6280.jpg'),
(17, 'Đồng hồ Nữ Nakzen SS4109L-7NR ', 3, 11, '<p>- Đến từ thương hiệu&nbsp;<a title=\"Đồng hồ Nakzen ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dong-ho-deo-tay-nakzen\" target=\"_blank\">đồng hồ Nakzen</a>&nbsp;của Nhật Bản - uy t&iacute;n v&agrave; nổi tiếng về chất lượng</p>\r\n<p>- Chiếc&nbsp;<a title=\"Đồng hồ nữ ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" type=\"xem th&ecirc;m đồng hồ nam\" href=\"https://www.thegioididong.com/dong-ho-deo-tay-nu\" target=\"_blank\">đồng hồ nữ</a>&nbsp;n&agrave;y&nbsp;c&oacute; đường k&iacute;nh mặt 29 mm, độ rộng d&acirc;y 16 mm, ph&ugrave; hợp với cổ tay c&oacute; chu vi khoảng 13 - 13.5 cm</p>\r\n<p>- D&acirc;y&nbsp;<a title=\"Đồng hồ ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" type=\"xem th&ecirc;m đồng hồ nam\" href=\"https://www.thegioididong.com/dong-ho-deo-tay\" target=\"_blank\">đồng hồ</a>&nbsp;v&agrave; khung viền l&agrave;m bằng th&eacute;p chống gỉ, bền bỉ với thời gian, chống ăn m&ograve;n, chịu được mọi thời tiết khắc nghiệt</p>\r\n<p>- Chỉ số chống nước 3 ATM: bạn thoải m&aacute;i đeo đồng hồ&nbsp;khi đi mưa, rửa tay, kh&ocirc;ng mang khi tắm rửa, bơi lội hay lặn</p>\r\n<p>- &Ocirc; lịch ng&agrave;y ở vị tr&iacute; 3 giờ c&ugrave;ng kim dạ quang hiện đại gi&uacute;p bạn xem ng&agrave;y giờ trong điều kiện thiếu &aacute;nh s&aacute;ng</p>', 1, '1980000  ', 'a0c3cd5620.jpg'),
(18, 'Đồng hồ Nữ Nakzen SS4102LD-7N3 ', 3, 11, '<p>- Thương hiệu&nbsp;<a title=\"Đồng hồ Nakzen ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dong-ho-deo-tay-nakzen\" target=\"_blank\">đồng hồ Nakzen</a>&nbsp;uy t&iacute;n v&agrave; chất lượng của Nhật Bản.</p>\r\n<p>-&nbsp;<a title=\"Đồng hồ ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" type=\"xem th&ecirc;m đồng hồ nam\" href=\"https://www.thegioididong.com/dong-ho-deo-tay\" target=\"_blank\">Đồng hồ</a>&nbsp;c&oacute; đường k&iacute;nh mặt 30 mm, độ rộng d&acirc;y 14 mm, ph&ugrave; hợp với cổ tay c&oacute; chu vi khoảng 13 - 14 cm.</p>\r\n<p>- Mẫu&nbsp;<a title=\"Đồng hồ nữ ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" type=\"xem th&ecirc;m đồng hồ nam\" href=\"https://www.thegioididong.com/dong-ho-deo-tay-nu\" target=\"_blank\">đồng hồ nữ</a>&nbsp;n&agrave;y sở hữu d&acirc;y&nbsp;v&agrave; khung viền l&agrave;m bằng th&eacute;p chống gỉ, bền bỉ, chống ăn m&ograve;n, chống oxi h&oacute;a hiệu quả.</p>\r\n<p>- Chống nước 3 ATM: bạn y&ecirc;n t&acirc;m đeo đồng hồ&nbsp;khi đi mưa, rửa tay, kh&ocirc;ng mang khi tắm rửa, bơi lội hay lặn.</p>\r\n<p>- &Ocirc; lịch thứ, lịch ng&agrave;y ở vị tr&iacute; 3 giờ gi&uacute;p bạn l&agrave;m chủ thời gian của m&igrave;nh.</p>', 1, '1980000   ', 'c86b2b9660.jpg'),
(19, 'Đồng hồ Nam Nakzen SS4099GD-7N3', 3, 11, '<p>- Thương hiệu&nbsp;<a title=\"Đồng hồ Nakzen ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dong-ho-deo-tay-nakzen\" target=\"_blank\">đồng hồ Nakzen</a>&nbsp;nổi tiếng đến từ Nhật Bản, uy t&iacute;n v&agrave; chất lượng h&agrave;ng đầu thế giới.</p>\r\n<p>- Đường k&iacute;nh mặt 40 mm, độ rộng d&acirc;y 21 mm.&nbsp;Mẫu&nbsp;<a title=\"Đồng hồ nam ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" type=\"xem th&ecirc;m đồng hồ nam\" href=\"https://www.thegioididong.com/dong-ho-deo-tay-nam\" target=\"_blank\">đồng hồ nam</a>&nbsp;n&agrave;y&nbsp;ph&ugrave; hợp với những người c&oacute; k&iacute;ch thước cổ tay trung b&igrave;nh (chu vi khoảng từ 17 - 19 cm).</p>\r\n<p>- D&acirc;y v&agrave; khung viền được l&agrave;m bằng th&eacute;p chống oxi h&oacute;a, giữ cho&nbsp;<a title=\"Đồng hồ ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" type=\"xem th&ecirc;m đồng hồ nam\" href=\"https://www.thegioididong.com/dong-ho-deo-tay\" target=\"_blank\">đồng hồ</a>&nbsp;lu&ocirc;n s&aacute;ng b&oacute;ng, tạo cảm gi&aacute;c sang trọng v&agrave; đẳng cấp.</p>\r\n<p>- Chống nước 3 ATM: An to&agrave;n khi đeo rửa tay hay đi dưới trời mưa nhỏ,&nbsp;kh&ocirc;ng đeo khi tắm rửa, bơi lội.</p>\r\n<p>- Lịch thứ, ng&agrave;y trang bị tr&ecirc;n đồng hồ gi&uacute;p bạn dễ d&agrave;ng nắm bắt thời gian. Kim dạ quang hỗ trợ xem giờ trong b&oacute;ng tối.</p>', 1, '1980000  ', '1cffba7fc0.jpg'),
(20, 'Đồng hồ Nữ Nakzen SS8012LD-7N3 ', 3, 11, '<p>- Đến từ thương hiệu&nbsp;<a title=\"Đồng hồ Nakzen ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dong-ho-deo-tay-nakzen\" target=\"_blank\">đồng hồ Nakzen</a>&nbsp;uy t&iacute;n v&agrave; chất lượng của Nhật Bản</p>\r\n<p>-&nbsp;Mẫu&nbsp;<a title=\"Đồng hồ nữ ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" type=\"xem th&ecirc;m đồng hồ nam\" href=\"https://www.thegioididong.com/dong-ho-deo-tay-nu\" target=\"_blank\">đồng hồ nữ</a>&nbsp;n&agrave;y&nbsp;c&oacute; đường k&iacute;nh mặt 32 mm, độ rộng d&acirc;y 16 mm, ph&ugrave; hợp với cổ tay c&oacute; chu vi khoảng 14 - 15 cm</p>\r\n<p>- D&acirc;y&nbsp;v&agrave; khung viền l&agrave;m bằng th&eacute;p chống gỉ bền chắc, chống ăn m&ograve;n, cho đồng hồ lu&ocirc;n s&aacute;ng b&oacute;ng, sang trọng</p>\r\n<p>- Chỉ số chống nước 3 ATM: bạn y&ecirc;n t&acirc;m đeo&nbsp;<a title=\"Đồng hồ ch&iacute;nh h&atilde;ng, gi&aacute; rẻ, b&aacute;n tại Thế Giới Di Động\" type=\"xem th&ecirc;m đồng hồ nam\" href=\"https://www.thegioididong.com/dong-ho-deo-tay\" target=\"_blank\">đồng hồ</a>&nbsp;khi đi mưa, rửa tay, kh&ocirc;ng mang khi tắm rửa, bơi lội hay lặn</p>\r\n<p>- Đồng hồ c&oacute; lịch ng&agrave;y hữu dụng gi&uacute;p bạn l&agrave;m chủ hơn trong c&ocirc;ng việc</p>', 1, '1980000    ', '897c5f0bf8.jpg'),
(21, 'Điện thoại iPhone 12 64GB', 7, 7, '<h3>Trong những th&aacute;ng cuối năm 2020&nbsp;<a title=\"Tham khảo sản phẩm ch&iacute;nh h&atilde;ng của Apple tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/apple\" target=\"_blank\">Apple</a>&nbsp;đ&atilde; ch&iacute;nh thức giới thiệu đến người d&ugrave;ng cũng như iFan thế hệ iPhone&nbsp;12&nbsp;series&nbsp;mới với h&agrave;ng loạt t&iacute;nh năng bức ph&aacute;, thiết kế được lột x&aacute;c ho&agrave;n to&agrave;n, hiệu năng đầy mạnh mẽ v&agrave; một trong số đ&oacute; ch&iacute;nh l&agrave;&nbsp;<a title=\"Tham khảo điện thoại iPhone 12 ch&iacute;nh h&atilde;ng tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dtdd/iphone-12\" target=\"_blank\">iPhone 12 64GB</a>.</h3>\r\n<h3>Hiệu năng vượt xa mọi giới hạn</h3>\r\n<p>Apple đ&atilde; trang bị con chip mới nhất của h&atilde;ng (t&iacute;nh đến 11/2020) cho iPhone 12 đ&oacute; l&agrave;&nbsp;<a title=\"T&igrave;m hiểu chip A14 Bionic l&agrave; g&igrave;?\" href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-ve-chip-apple-a14-bionic-tren-iphone-12-va-ipad-1290695\" target=\"_blank\">A14 Bionic</a>, được sản xuất tr&ecirc;n tiến tr&igrave;nh 5 nm với hiệu suất ổn định hơn so với chip A13 được trang bị tr&ecirc;n phi&ecirc;n bản tiền nhiệm&nbsp;<a title=\"Tham khảo điện thoại iPhone 11 ch&iacute;nh h&atilde;ng tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dtdd/iphone-11\" target=\"_blank\">iPhone 11</a>.</p>', 1, '23490000  ', '9f4fe4aa48.jpg'),
(22, 'Điện thoại iPhone 12 Pro Max 128GB ', 7, 7, '<h3><a title=\"Tham khảo điện thoại iPhone 12 Pro Max 128GB ch&iacute;nh h&atilde;ng tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dtdd/iphone-12-pro-max\" target=\"_blank\">iPhone 12 Pro Max 128 GB</a>&nbsp;một si&ecirc;u phẩm&nbsp;<a title=\"Tham khảo điện thoại smartphone ch&iacute;nh h&atilde;ng tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\">smartphone</a>&nbsp;đến từ&nbsp;<a title=\"Tham khảo sản phẩm ch&iacute;nh h&atilde;ng của Apple tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/apple\" target=\"_blank\">Apple</a>. M&aacute;y c&oacute; một hiệu năng ho&agrave;n to&agrave;n mạnh mẽ đ&aacute;p ứng tốt nhiều nhu cầu đến từ người d&ugrave;ng v&agrave; mang trong m&igrave;nh một thiết kế đầy vu&ocirc;ng vức, sang trọng.</h3>\r\n<h3>Thay đổi thiết kế mới sau 6 năm</h3>\r\n<p>Theo chu kỳ cứ mỗi 3 năm th&igrave; iPhone lại thay đổi thiết kế v&agrave; 2020 l&agrave; năm đ&aacute;nh dấu cột mốc quan trong n&agrave;y, v&igrave; thế rất c&oacute; thể đ&acirc;y l&agrave; thời điểm c&aacute;c mẫu&nbsp;<a title=\"Tham khảo c&aacute;c mẫu điện thoại iPhone 12 ch&iacute;nh h&atilde;ng, gi&aacute; tốt tại Thegioididong.com\" type=\"Tham khảo c&aacute;c mẫu điện thoại iPhone 12 ch&iacute;nh h&atilde;ng, gi&aacute; tốt tại Thegioididong.com\" href=\"https://www.thegioididong.com/dtdd/iphone-12\" target=\"_blank\">iPhone 12</a>&nbsp;sẽ c&oacute; một sự thay đổi mạnh mẽ về thiết kế.</p>\r\n<p>iPhone 12 Pro Max sở hữu diện mạo mới mới với khung viền được v&aacute;t thẳng v&agrave; mạnh mẽ như tr&ecirc;n&nbsp;<a title=\"Tham khảo gi&aacute; m&aacute;y t&iacute;nh bảng Apple iPad Pro 12.9 inch Wifi 128GB (2020)\" type=\"Tham khảo gi&aacute; m&aacute;y t&iacute;nh bảng Apple iPad Pro 12.9 inch Wifi 128GB (2020)\" href=\"https://www.thegioididong.com/may-tinh-bang/ipad-pro-12-9-inch-wifi-128gb-2020\" target=\"_blank\">iPad Pro 2020</a>, chấm dứt hơn 6 năm với kiểu thiết kế bo cong tr&ecirc;n&nbsp;<a title=\"Tham khảo gi&aacute; điện thoại iPhone 6 ch&iacute;nh h&atilde;ng tại Thegioididong.com\" type=\"Tham khảo gi&aacute; điện thoại iPhone 6 ch&iacute;nh h&atilde;ng tại Thegioididong.com\" href=\"https://www.thegioididong.com/dtdd/iphone-6-32gb-gold\" target=\"_blank\">iPhone 6</a>&nbsp;được ra mắt lần đầu ti&ecirc;n v&agrave;o năm 2014.</p>', 1, '30990000  ', '8ef23dc09c.jpg'),
(23, 'Điện thoại iPhone 12 Pro Max 512GB', 7, 7, '<h3><a title=\"Tham khảo điện thoại iPhone 12 Pro Max 512GB ch&iacute;nh h&atilde;ng tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dtdd/iphone-12-pro-max-512gb\" target=\"_blank\">iPhone 12 Pro Max 512GB</a>&nbsp;- đẳng cấp từ t&ecirc;n gọi đến từng chi tiết. Ngay từ khi chỉ l&agrave; tin đồn th&igrave; chiếc&nbsp;<a title=\"Tham khảo điện thoại ch&iacute;nh h&atilde;ng tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\">smartphone</a>&nbsp;n&agrave;y đ&atilde; l&agrave;m đứng ngồi kh&ocirc;ng y&ecirc;n bao &ldquo;fan cứng&rdquo; nh&agrave;&nbsp;<a title=\"Tham khảo mẫu sản phẩm Apple ch&iacute;nh h&atilde;ng tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/apple\" target=\"_blank\">Apple</a>, với những n&acirc;ng cấp v&ocirc; c&ugrave;ng nổi bật hứa hẹn sẽ mang đến những trải nghiệm tốt nhất về mọi mặt m&agrave; chưa một chiếc&nbsp;<a title=\"Tham khảo điện thoại iPhone ch&iacute;nh h&atilde;ng tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dtdd-apple-iphone\" target=\"_blank\">iPhone</a>&nbsp;tiền nhiệm n&agrave;o c&oacute; được.</h3>\r\n<h3>Thu h&uacute;t từ c&aacute;i nh&igrave;n đầu ti&ecirc;n</h3>\r\n<p>Quay trở lại đầy ho&agrave;i niệm với thiết kế phẳng, vu&ocirc;ng vức tương tự&nbsp;<a title=\"Tham khảo th&ocirc;ng tin iPhone 4 tại thegioididong.com\" href=\"https://www.thegioididong.com/dtdd/iphone-4-8gb\" target=\"_blank\">iPhone 4</a>&nbsp;nhưng kh&ocirc;ng hề cho cảm gi&aacute;c lỗi thời m&agrave; ho&agrave;n to&agrave;n sang trọng với thiết kế tinh tế v&agrave; được cấu tạo từ những vật liệu cao cấp hơn.</p>', 1, '41490000   ', '17b625bdac.jpg'),
(24, 'Điện thoại iPhone 12 Pro 256GB', 7, 7, '<h3><a title=\"Tham khảo gi&aacute; điện thoại iPhone 12 Pro 256 GB ch&iacute;nh h&atilde;ng VN/A gi&aacute; tốt tại Thegioididong.com\" type=\"Tham khảo gi&aacute; điện thoại iPhone 12 Pro 256 GB ch&iacute;nh h&atilde;ng VN/A gi&aacute; tốt tại Thegioididong.com\" href=\"https://www.thegioididong.com/dtdd/iphone-12-pro-256gb\" target=\"_blank\">iPhone 12 Pro 256 GB</a>&nbsp;đ&atilde; ch&iacute;nh thức được ra mắt với sự thay đổi lớn về thiết kế b&ecirc;n ngo&agrave;i chứa đựng một hiệu năng cực khủng b&ecirc;n trong, k&egrave;m theo đ&oacute; l&agrave; một loạt c&aacute;c c&ocirc;ng nghệ ấn tượng về camera, kết nối 5G lần đầu được xuất hiện.</h3>\r\n<h3>Giống iPhone 5 nhưng ph&oacute;ng to với m&agrave;n h&igrave;nh tr&agrave;n viền</h3>\r\n<p>Kh&ocirc;ng nằm ngo&agrave;i dự đo&aacute;n, iPhone 12 Pro quay lại thiết kế dạng hộp với phần khung viền vu&ocirc;ng vức, mạnh mẽ đ&atilde; từng xuất hiện tr&ecirc;n iPhone 5, đồng thời kết th&uacute;c kỷ nguy&ecirc;n &ldquo;bo cong&rdquo; từ thế hệ iPhone 6.</p>', 1, '33990000  ', '94eff32b93.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
