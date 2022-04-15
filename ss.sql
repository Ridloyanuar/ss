CREATE DATABASE IF NOT EXISTS `db_sayursembalun` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_sayursembalun`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_information`
--

CREATE TABLE `bank_information` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank_information`
--

INSERT INTO `bank_information` (`id`, `type`, `name`, `number`, `created_at`, `updated`) VALUES
(1, 'BCA', 'Sayur Sembalu', '3280343250', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '1645460616banner.png', 1, '2022-02-21 09:23:36', '2022-02-21 09:23:36'),
(2, '1645721172banner.png', 1, '2022-02-24 09:46:16', '2022-02-24 09:46:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `products_id`, `product_name`, `product_code`, `size`, `price`, `quantity`, `user_email`, `session_id`, `created_at`, `updated_at`) VALUES
(149, 42, 'Buah Apel', 'ss-apel', NULL, 20000, 1, 'weshare@gmail.com', 'kuqd9S3FqDky0pQBkLBwmULxeEWxyAMA1DzPlteM', '2022-02-24 19:10:29', '2022-02-24 19:10:29'),
(150, 43, 'Buah Anggur Merah', 'ss-anggur', NULL, 10000, 1, 'weshare@gmail.com', 'kuqd9S3FqDky0pQBkLBwmULxeEWxyAMA1DzPlteM', '2022-02-24 19:10:36', '2022-02-24 19:10:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `url`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(32, NULL, 'Sayuran', NULL, 'http://sayursembalun.com/?category=1', 1, NULL, '2021-10-30 04:49:06', '2021-10-30 04:49:06'),
(33, NULL, 'Buah', NULL, 'http://sayursembalun.com/?category=2', 1, NULL, '2021-10-30 04:49:44', '2021-10-30 04:49:44'),
(34, NULL, 'Daging', NULL, 'http://sayursembalun.com/?category=3', 1, NULL, '2021-10-30 04:50:15', '2021-10-30 04:50:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `created_at`, `updated_at`) VALUES
(2, 'AL', 'Albania', NULL, NULL),
(3, 'DZ', 'Algeria', NULL, NULL),
(4, 'DS', 'American Samoa', NULL, NULL),
(5, 'AD', 'Andorra', NULL, NULL),
(6, 'AO', 'Angola', NULL, NULL),
(7, 'AI', 'Anguilla', NULL, NULL),
(8, 'AQ', 'Antarctica', NULL, NULL),
(9, 'AG', 'Antigua and Barbuda', NULL, NULL),
(10, 'AR', 'Argentina', NULL, NULL),
(11, 'AM', 'Armenia', NULL, NULL),
(12, 'AW', 'Aruba', NULL, NULL),
(13, 'AU', 'Australia', NULL, NULL),
(14, 'AT', 'Austria', NULL, NULL),
(15, 'AZ', 'Azerbaijan', NULL, NULL),
(16, 'BS', 'Bahamas', NULL, NULL),
(17, 'BH', 'Bahrain', NULL, NULL),
(18, 'BD', 'Bangladesh', NULL, NULL),
(19, 'BB', 'Barbados', NULL, NULL),
(20, 'BY', 'Belarus', NULL, NULL),
(21, 'BE', 'Belgium', NULL, NULL),
(22, 'BZ', 'Belize', NULL, NULL),
(23, 'BJ', 'Benin', NULL, NULL),
(24, 'BM', 'Bermuda', NULL, NULL),
(25, 'BT', 'Bhutan', NULL, NULL),
(26, 'BO', 'Bolivia', NULL, NULL),
(27, 'BA', 'Bosnia and Herzegovina', NULL, NULL),
(28, 'BW', 'Botswana', NULL, NULL),
(29, 'BV', 'Bouvet Island', NULL, NULL),
(30, 'BR', 'Brazil', NULL, NULL),
(31, 'IO', 'British Indian Ocean Territory', NULL, NULL),
(32, 'BN', 'Brunei Darussalam', NULL, NULL),
(33, 'BG', 'Bulgaria', NULL, NULL),
(34, 'BF', 'Burkina Faso', NULL, NULL),
(35, 'BI', 'Burundi', NULL, NULL),
(36, 'KH', 'Cambodia', NULL, NULL),
(37, 'CM', 'Cameroon', NULL, NULL),
(38, 'CA', 'Canada', NULL, NULL),
(39, 'CV', 'Cape Verde', NULL, NULL),
(40, 'KY', 'Cayman Islands', NULL, NULL),
(41, 'CF', 'Central African Republic', NULL, NULL),
(42, 'TD', 'Chad', NULL, NULL),
(43, 'CL', 'Chile', NULL, NULL),
(44, 'CN', 'China', NULL, NULL),
(45, 'CX', 'Christmas Island', NULL, NULL),
(46, 'CC', 'Cocos (Keeling) Islands', NULL, NULL),
(47, 'CO', 'Colombia', NULL, NULL),
(48, 'KM', 'Comoros', NULL, NULL),
(49, 'CG', 'Congo', NULL, NULL),
(50, 'CK', 'Cook Islands', NULL, NULL),
(51, 'CR', 'Costa Rica', NULL, NULL),
(52, 'AF', 'Afghanistan', NULL, NULL),
(53, 'AL', 'Albania', NULL, NULL),
(54, 'DZ', 'Algeria', NULL, NULL),
(55, 'DS', 'American Samoa', NULL, NULL),
(56, 'AD', 'Andorra', NULL, NULL),
(57, 'AO', 'Angola', NULL, NULL),
(58, 'AI', 'Anguilla', NULL, NULL),
(59, 'AQ', 'Antarctica', NULL, NULL),
(60, 'AG', 'Antigua and Barbuda', NULL, NULL),
(61, 'AR', 'Argentina', NULL, NULL),
(62, 'AM', 'Armenia', NULL, NULL),
(63, 'AW', 'Aruba', NULL, NULL),
(64, 'AU', 'Australia', NULL, NULL),
(65, 'AT', 'Austria', NULL, NULL),
(66, 'AZ', 'Azerbaijan', NULL, NULL),
(67, 'BS', 'Bahamas', NULL, NULL),
(68, 'BH', 'Bahrain', NULL, NULL),
(69, 'BD', 'Bangladesh', NULL, NULL),
(70, 'BB', 'Barbados', NULL, NULL),
(71, 'BY', 'Belarus', NULL, NULL),
(72, 'BE', 'Belgium', NULL, NULL),
(73, 'BZ', 'Belize', NULL, NULL),
(74, 'BJ', 'Benin', NULL, NULL),
(75, 'BM', 'Bermuda', NULL, NULL),
(76, 'BT', 'Bhutan', NULL, NULL),
(77, 'BO', 'Bolivia', NULL, NULL),
(78, 'BA', 'Bosnia and Herzegovina', NULL, NULL),
(79, 'BW', 'Botswana', NULL, NULL),
(80, 'BV', 'Bouvet Island', NULL, NULL),
(81, 'BR', 'Brazil', NULL, NULL),
(82, 'IO', 'British Indian Ocean Territory', NULL, NULL),
(83, 'BN', 'Brunei Darussalam', NULL, NULL),
(84, 'BG', 'Bulgaria', NULL, NULL),
(85, 'BF', 'Burkina Faso', NULL, NULL),
(86, 'BI', 'Burundi', NULL, NULL),
(87, 'KH', 'Cambodia', NULL, NULL),
(88, 'CM', 'Cameroon', NULL, NULL),
(89, 'CA', 'Canada', NULL, NULL),
(90, 'CV', 'Cape Verde', NULL, NULL),
(91, 'KY', 'Cayman Islands', NULL, NULL),
(92, 'CF', 'Central African Republic', NULL, NULL),
(93, 'TD', 'Chad', NULL, NULL),
(94, 'CL', 'Chile', NULL, NULL),
(95, 'CN', 'China', NULL, NULL),
(96, 'CX', 'Christmas Island', NULL, NULL),
(97, 'CC', 'Cocos (Keeling) Islands', NULL, NULL),
(98, 'CO', 'Colombia', NULL, NULL),
(99, 'KM', 'Comoros', NULL, NULL),
(100, 'CG', 'Congo', NULL, NULL),
(101, 'CK', 'Cook Islands', NULL, NULL),
(102, 'CR', 'Costa Rica', NULL, NULL),
(103, 'HR', 'Croatia (Hrvatska)', NULL, NULL),
(104, 'CU', 'Cuba', NULL, NULL),
(105, 'CY', 'Cyprus', NULL, NULL),
(106, 'CZ', 'Czech Republic', NULL, NULL),
(107, 'DK', 'Denmark', NULL, NULL),
(108, 'DJ', 'Djibouti', NULL, NULL),
(109, 'DM', 'Dominica', NULL, NULL),
(110, 'DO', 'Dominican Republic', NULL, NULL),
(111, 'TP', 'East Timor', NULL, NULL),
(112, 'EC', 'Ecuador', NULL, NULL),
(113, 'EG', 'Egypt', NULL, NULL),
(114, 'SV', 'El Salvador', NULL, NULL),
(115, 'GQ', 'Equatorial Guinea', NULL, NULL),
(116, 'ER', 'Eritrea', NULL, NULL),
(117, 'EE', 'Estonia', NULL, NULL),
(118, 'ET', 'Ethiopia', NULL, NULL),
(119, 'FK', 'Falkland Islands (Malvinas)', NULL, NULL),
(120, 'FO', 'Faroe Islands', NULL, NULL),
(121, 'FJ', 'Fiji', NULL, NULL),
(122, 'FI', 'Finland', NULL, NULL),
(123, 'FR', 'France', NULL, NULL),
(124, 'FX', 'France, Metropolitan', NULL, NULL),
(125, 'GF', 'French Guiana', NULL, NULL),
(126, 'PF', 'French Polynesia', NULL, NULL),
(127, 'TF', 'French Southern Territories', NULL, NULL),
(128, 'GA', 'Gabon', NULL, NULL),
(129, 'GM', 'Gambia', NULL, NULL),
(130, 'GE', 'Georgia', NULL, NULL),
(131, 'DE', 'Germany', NULL, NULL),
(132, 'GH', 'Ghana', NULL, NULL),
(133, 'GI', 'Gibraltar', NULL, NULL),
(134, 'GK', 'Guernsey', NULL, NULL),
(135, 'GR', 'Greece', NULL, NULL),
(136, 'GL', 'Greenland', NULL, NULL),
(137, 'GD', 'Grenada', NULL, NULL),
(138, 'GP', 'Guadeloupe', NULL, NULL),
(139, 'GU', 'Guam', NULL, NULL),
(140, 'GT', 'Guatemala', NULL, NULL),
(141, 'GN', 'Guinea', NULL, NULL),
(142, 'GW', 'Guinea-Bissau', NULL, NULL),
(143, 'GY', 'Guyana', NULL, NULL),
(144, 'HT', 'Haiti', NULL, NULL),
(145, 'HM', 'Heard and Mc Donald Islands', NULL, NULL),
(146, 'HN', 'Honduras', NULL, NULL),
(147, 'HK', 'Hong Kong', NULL, NULL),
(148, 'HU', 'Hungary', NULL, NULL),
(149, 'IS', 'Iceland', NULL, NULL),
(150, 'IN', 'India', NULL, NULL),
(151, 'IM', 'Isle of Man', NULL, NULL),
(152, 'ID', 'Indonesia', NULL, NULL),
(153, 'IR', 'Iran (Islamic Republic of)', NULL, NULL),
(154, 'IQ', 'Iraq', NULL, NULL),
(155, 'IE', 'Ireland', NULL, NULL),
(156, 'IL', 'Israel', NULL, NULL),
(157, 'IT', 'Italy', NULL, NULL),
(158, 'CI', 'Ivory Coast', NULL, NULL),
(159, 'JE', 'Jersey', NULL, NULL),
(160, 'JM', 'Jamaica', NULL, NULL),
(161, 'JP', 'Japan', NULL, NULL),
(162, 'JO', 'Jordan', NULL, NULL),
(163, 'KZ', 'Kazakhstan', NULL, NULL),
(164, 'KE', 'Kenya', NULL, NULL),
(165, 'KI', 'Kiribati', NULL, NULL),
(166, 'KP', 'Korea, Democratic People\'s Republic of', NULL, NULL),
(167, 'KR', 'Korea, Republic of', NULL, NULL),
(168, 'XK', 'Kosovo', NULL, NULL),
(169, 'KW', 'Kuwait', NULL, NULL),
(170, 'KG', 'Kyrgyzstan', NULL, NULL),
(171, 'LA', 'Lao People\'s Democratic Republic', NULL, NULL),
(172, 'LV', 'Latvia', NULL, NULL),
(173, 'LB', 'Lebanon', NULL, NULL),
(174, 'LS', 'Lesotho', NULL, NULL),
(175, 'LR', 'Liberia', NULL, NULL),
(176, 'LY', 'Libyan Arab Jamahiriya', NULL, NULL),
(177, 'LI', 'Liechtenstein', NULL, NULL),
(178, 'LT', 'Lithuania', NULL, NULL),
(179, 'LU', 'Luxembourg', NULL, NULL),
(180, 'MO', 'Macau', NULL, NULL),
(181, 'MK', 'Macedonia', NULL, NULL),
(182, 'MG', 'Madagascar', NULL, NULL),
(183, 'MW', 'Malawi', NULL, NULL),
(184, 'MY', 'Malaysia', NULL, NULL),
(185, 'MV', 'Maldives', NULL, NULL),
(186, 'ML', 'Mali', NULL, NULL),
(187, 'MT', 'Malta', NULL, NULL),
(188, 'MH', 'Marshall Islands', NULL, NULL),
(189, 'MQ', 'Martinique', NULL, NULL),
(190, 'MR', 'Mauritania', NULL, NULL),
(191, 'MU', 'Mauritius', NULL, NULL),
(192, 'TY', 'Mayotte', NULL, NULL),
(193, 'MX', 'Mexico', NULL, NULL),
(194, 'FM', 'Micronesia, Federated States of', NULL, NULL),
(195, 'MD', 'Moldova, Republic of', NULL, NULL),
(196, 'MC', 'Monaco', NULL, NULL),
(197, 'MN', 'Mongolia', NULL, NULL),
(198, 'ME', 'Montenegro', NULL, NULL),
(199, 'MS', 'Montserrat', NULL, NULL),
(200, 'MA', 'Morocco', NULL, NULL),
(201, 'MZ', 'Mozambique', NULL, NULL),
(202, 'MM', 'Myanmar', NULL, NULL),
(203, 'NA', 'Namibia', NULL, NULL),
(204, 'NR', 'Nauru', NULL, NULL),
(205, 'NP', 'Nepal', NULL, NULL),
(206, 'NL', 'Netherlands', NULL, NULL),
(207, 'AN', 'Netherlands Antilles', NULL, NULL),
(208, 'NC', 'New Caledonia', NULL, NULL),
(209, 'NZ', 'New Zealand', NULL, NULL),
(210, 'NI', 'Nicaragua', NULL, NULL),
(211, 'NE', 'Niger', NULL, NULL),
(212, 'NG', 'Nigeria', NULL, NULL),
(213, 'NU', 'Niue', NULL, NULL),
(214, 'NF', 'Norfolk Island', NULL, NULL),
(215, 'MP', 'Northern Mariana Islands', NULL, NULL),
(216, 'NO', 'Norway', NULL, NULL),
(217, 'OM', 'Oman', NULL, NULL),
(218, 'PK', 'Pakistan', NULL, NULL),
(219, 'PW', 'Palau', NULL, NULL),
(220, 'PS', 'Palestine', NULL, NULL),
(221, 'PA', 'Panama', NULL, NULL),
(222, 'PG', 'Papua New Guinea', NULL, NULL),
(223, 'PY', 'Paraguay', NULL, NULL),
(224, 'PE', 'Peru', NULL, NULL),
(225, 'PH', 'Philippines', NULL, NULL),
(226, 'PN', 'Pitcairn', NULL, NULL),
(227, 'PL', 'Poland', NULL, NULL),
(228, 'PT', 'Portugal', NULL, NULL),
(229, 'PR', 'Puerto Rico', NULL, NULL),
(230, 'QA', 'Qatar', NULL, NULL),
(231, 'RE', 'Reunion', NULL, NULL),
(232, 'RO', 'Romania', NULL, NULL),
(233, 'RU', 'Russian Federation', NULL, NULL),
(234, 'RW', 'Rwanda', NULL, NULL),
(235, 'KN', 'Saint Kitts and Nevis', NULL, NULL),
(236, 'LC', 'Saint Lucia', NULL, NULL),
(237, 'VC', 'Saint Vincent and the Grenadines', NULL, NULL),
(238, 'WS', 'Samoa', NULL, NULL),
(239, 'SM', 'San Marino', NULL, NULL),
(240, 'ST', 'Sao Tome and Principe', NULL, NULL),
(241, 'SA', 'Saudi Arabia', NULL, NULL),
(242, 'SN', 'Senegal', NULL, NULL),
(243, 'RS', 'Serbia', NULL, NULL),
(244, 'SC', 'Seychelles', NULL, NULL),
(245, 'SL', 'Sierra Leone', NULL, NULL),
(246, 'SG', 'Singapore', NULL, NULL),
(247, 'SK', 'Slovakia', NULL, NULL),
(248, 'SI', 'Slovenia', NULL, NULL),
(249, 'SB', 'Solomon Islands', NULL, NULL),
(250, 'SO', 'Somalia', NULL, NULL),
(251, 'ZA', 'South Africa', NULL, NULL),
(252, 'GS', 'South Georgia South Sandwich Islands', NULL, NULL),
(253, 'SS', 'South Sudan', NULL, NULL),
(254, 'ES', 'Spain', NULL, NULL),
(255, 'LK', 'Sri Lanka', NULL, NULL),
(256, 'SH', 'St. Helena', NULL, NULL),
(257, 'PM', 'St. Pierre and Miquelon', NULL, NULL),
(258, 'SD', 'Sudan', NULL, NULL),
(259, 'SR', 'Suriname', NULL, NULL),
(260, 'SJ', 'Svalbard and Jan Mayen Islands', NULL, NULL),
(261, 'SZ', 'Swaziland', NULL, NULL),
(262, 'SE', 'Sweden', NULL, NULL),
(263, 'CH', 'Switzerland', NULL, NULL),
(264, 'SY', 'Syrian Arab Republic', NULL, NULL),
(265, 'TW', 'Taiwan', NULL, NULL),
(266, 'TJ', 'Tajikistan', NULL, NULL),
(267, 'TZ', 'Tanzania, United Republic of', NULL, NULL),
(268, 'TH', 'Thailand', NULL, NULL),
(269, 'TG', 'Togo', NULL, NULL),
(270, 'TK', 'Tokelau', NULL, NULL),
(271, 'TO', 'Tonga', NULL, NULL),
(272, 'TT', 'Trinidad and Tobago', NULL, NULL),
(273, 'TN', 'Tunisia', NULL, NULL),
(274, 'TR', 'Turkey', NULL, NULL),
(275, 'TM', 'Turkmenistan', NULL, NULL),
(276, 'TC', 'Turks and Caicos Islands', NULL, NULL),
(277, 'TV', 'Tuvalu', NULL, NULL),
(278, 'UG', 'Uganda', NULL, NULL),
(279, 'UA', 'Ukraine', NULL, NULL),
(280, 'AE', 'United Arab Emirates', NULL, NULL),
(281, 'GB', 'United Kingdom', NULL, NULL),
(282, 'US', 'United States', NULL, NULL),
(283, 'UM', 'United States minor outlying islands', NULL, NULL),
(284, 'UY', 'Uruguay', NULL, NULL),
(285, 'UZ', 'Uzbekistan', NULL, NULL),
(286, 'VU', 'Vanuatu', NULL, NULL),
(287, 'VA', 'Vatican City State', NULL, NULL),
(288, 'VE', 'Venezuela', NULL, NULL),
(289, 'VN', 'Vietnam', NULL, NULL),
(290, 'VG', 'Virgin Islands (British)', NULL, NULL),
(291, 'VI', 'Virgin Islands (U.S.)', NULL, NULL),
(292, 'WF', 'Wallis and Futuna Islands', NULL, NULL),
(293, 'EH', 'Western Sahara', NULL, NULL),
(294, 'YE', 'Yemen', NULL, NULL),
(295, 'ZR', 'Zaire', NULL, NULL),
(296, 'ZM', 'Zambia', NULL, NULL),
(297, 'ZW', 'Zimbabwe', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `amount`, `amount_type`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Coupon001', 10, 'Percentage', '2019-12-06', 1, '2018-12-05 20:19:15', '2018-12-05 20:19:15'),
(7, 'sayursembalun', 10, 'Percentage', '2022-06-09', 1, '2021-08-12 04:16:35', '2021-08-12 04:16:35'),
(8, 'cupontes', 10, 'Percentage', '2021-08-27', 1, '2021-08-22 20:13:42', '2021-08-22 20:15:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `delivery_address`
--

CREATE TABLE `delivery_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `users_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `delivery_address`
--

INSERT INTO `delivery_address` (`id`, `users_id`, `users_email`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `created_at`, `updated_at`) VALUES
(11, 21, 'ridloyanuar@gmail.com', 'ridlo yanuar', '5', '1', 'Nusa Tenggara Barat', NULL, '54222', '082231821348', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_orders`
--

CREATE TABLE `detail_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_orders`
--

INSERT INTO `detail_orders` (`id`, `order_id`, `products_id`, `product_name`, `price`, `quantity`, `user_email`, `session_id`, `created_at`, `updated_at`) VALUES
(26, 38, 3, '2018 Toyota Prius', 100000, 1, 'weshare@gmail.com', 'N0RPlipd3cLWyBJEi8sKhQzksylOlSz5OKCrFA1D', '2021-08-20 14:24:54', '2021-08-20 14:24:54'),
(27, 38, 1, 'Lexus Rx 330', 15, 1, 'weshare@gmail.com', 'N0RPlipd3cLWyBJEi8sKhQzksylOlSz5OKCrFA1D', '2021-08-20 14:24:54', '2021-08-20 14:24:54'),
(28, 39, 3, '2018 Toyota Prius', 100000, 1, 'weshare@gmail.com', 'dBFYAWtSoI1jUDyA5sNJiFVmGTRyAKRonq10avnB', '2021-08-20 15:19:34', '2021-08-20 15:19:34'),
(29, 40, 7, 'Cole Haan', 5, 2, 'weshare@gmail.com', '8L9bQSxg8goMuPww2B1zluwETz20biP6pSIRdP4z', '2021-08-21 06:39:07', '2021-08-21 06:39:07'),
(30, 40, 2, '2019 New Toyota Highlander XLE V6', 20, 3, 'weshare@gmail.com', '8L9bQSxg8goMuPww2B1zluwETz20biP6pSIRdP4z', '2021-08-21 06:39:07', '2021-08-21 06:39:07'),
(31, 41, 1, 'Lexus Rx 330', 70000, 2, 'weshare@gmail.com', 'CBG8chCNFqWGGHyL28aOD2rVFWdmEGquBFjP8727', '2021-08-22 08:00:47', '2021-08-22 08:00:47'),
(32, 42, 1, 'Lexus Rx 330', 70000, 2, 'weshare@gmail.com', 'eEsJNtZZNLyYyIDJmrCuzvQykKWMEeYgPIoTaMjw', '2021-08-22 08:18:01', '2021-08-22 08:18:01'),
(33, 43, 37, 'mangga', 14000, 1, 'weshare@gmail.com', '2weTVTAsCUTh7BbZMZadgO5YjlvlLoUDFsHhIwPR', '2021-08-22 22:05:59', '2021-08-22 22:05:59'),
(34, 43, 38, 'Durian', 99000, 1, 'weshare@gmail.com', '2weTVTAsCUTh7BbZMZadgO5YjlvlLoUDFsHhIwPR', '2021-08-22 22:05:59', '2021-08-22 22:05:59'),
(35, 44, 1, 'Lexus Rx 330', 70000, 1, 'weshare@gmail.com', 'zuDTwnp40mFytEeGlfwBJn3ZXjoIpRT3i1FLJa0l', '2021-08-22 23:02:02', '2021-08-22 23:02:02'),
(36, 45, 1, 'Lexus Rx 330', 70000, 2, 'weshare@gmail.com', 'a9IAP5Iawm3NMlsyo0CyMi3n8TNOgqoxFxUHcAWj', '2021-09-11 03:03:45', '2021-09-11 03:03:45'),
(37, 46, 1, 'Lexus Rx 330', 70000, 1, 'weshare@gmail.com', 'a9IAP5Iawm3NMlsyo0CyMi3n8TNOgqoxFxUHcAWj', '2021-09-11 03:04:47', '2021-09-11 03:04:47'),
(38, 47, 37, 'mangga', 14000, 1, 'weshare@gmail.com', 'cujqsHbeySqmsl55BpmZyDLcrXorHV8D7W0Kl56A', '2021-09-12 02:01:15', '2021-09-12 02:01:15'),
(39, 48, 40, 'Buah Naga', 14000, 1, 'weshare@gmail.com', 'Qb8GrRYlS30yVipfMSkPl8L6TFm1PKJLLHQOEGTB', '2021-09-12 03:05:04', '2021-09-12 03:05:04'),
(40, 49, 40, 'Buah Naga', 14000, 1, 'weshare@gmail.com', 'Qb8GrRYlS30yVipfMSkPl8L6TFm1PKJLLHQOEGTB', '2021-09-12 03:28:31', '2021-09-12 03:28:31'),
(41, 51, 41, 'Buah Manggis', 40000, 1, 'weshare@gmail.com', 'Qb8GrRYlS30yVipfMSkPl8L6TFm1PKJLLHQOEGTB', '2021-09-12 03:41:57', '2021-09-12 03:41:57'),
(42, 57, 38, 'Durian', 99000, 2, 'weshare@gmail.com', 'O63ex4x6yqroEoImfJcD8MPRWqlUJYh6SU7ndBZ4', '2021-09-13 05:32:24', '2021-09-13 05:32:24'),
(43, 59, 43, 'Buah Anggur', 10000, 1, 'weshare@gmail.com', 'PRrScXLfEQ4P7bTC7j7Kjm356WMcHMrORdeIJfgn', '2021-12-11 19:36:56', '2021-12-11 19:36:56'),
(44, 59, 42, 'Buah Apel', 20000, 2, 'weshare@gmail.com', 'PRrScXLfEQ4P7bTC7j7Kjm356WMcHMrORdeIJfgn', '2021-12-11 19:36:56', '2021-12-11 19:36:56'),
(45, 60, 42, 'Buah Apel', 20000, 2, 'weshare@gmail.com', 'f06ZNmEhfdDvr35NNYhZy8RLHcX33l92uYmZaKPL', '2021-12-12 03:33:23', '2021-12-12 03:33:23'),
(46, 60, 43, 'Buah Anggur', 10000, 2, 'weshare@gmail.com', 'f06ZNmEhfdDvr35NNYhZy8RLHcX33l92uYmZaKPL', '2021-12-12 03:33:23', '2021-12-12 03:33:23'),
(47, 61, 42, 'Buah Apel', 20000, 1, 'weshare@gmail.com', 'f06ZNmEhfdDvr35NNYhZy8RLHcX33l92uYmZaKPL', '2021-12-12 03:35:19', '2021-12-12 03:35:19'),
(48, 62, 43, 'Buah Anggur', 10000, 1, 'weshare@gmail.com', '28QUlA5yFf17Xp7LGZcgGiHN65UpFz0icZIADKcD', '2021-12-12 04:34:48', '2021-12-12 04:34:48'),
(49, 62, 42, 'Buah Apel', 20000, 1, 'weshare@gmail.com', '28QUlA5yFf17Xp7LGZcgGiHN65UpFz0icZIADKcD', '2021-12-12 04:34:48', '2021-12-12 04:34:48'),
(50, 65, 42, 'Buah Apel', 20000, 1, 'weshare@gmail.com', 'uzaaVgJmxqW1raCqs9ltM4xVr8UULDxRpWyJb3y3', '2021-12-12 18:06:16', '2021-12-12 18:06:16'),
(51, 66, 43, 'Buah Anggur', 10000, 2, 'weshare@gmail.com', 'vGSpcY5Dmx1yMfKvBm3v0l3WjlNhmZbqrDkjLyS1', '2022-02-02 23:24:30', '2022-02-02 23:24:30'),
(52, 67, 42, 'Buah Apel', 20000, 3, 'weshare@gmail.com', 'W6IvCuKOhNr7hPSrRJlMBhRm1QtMSwkrgBjmjiEC', '2022-03-01 19:17:59', '2022-03-01 19:17:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 2),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2018_10_20_040609_create_categories_table', 3),
(9, '2018_10_24_075802_create_products_table', 4),
(10, '2018_11_08_024109_create_product_att_table', 5),
(11, '2018_11_20_055123_create_tblgallery_table', 6),
(12, '2018_11_26_070031_create_cart_table', 7),
(13, '2018_11_28_072535_create_coupons_table', 8),
(15, '2018_12_01_042342_create_countries_table', 10),
(19, '2018_12_03_043804_add_more_fields_to_users_table', 14),
(17, '2018_12_03_093548_create_delivery_address_table', 12),
(18, '2018_12_05_024718_create_orders_table', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `open_order`
--

CREATE TABLE `open_order` (
  `id` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `open_order`
--

INSERT INTO `open_order` (`id`, `tanggal`, `updated_at`, `created_at`) VALUES
(1, 1631605427, '2021-09-11', '2021-09-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `users_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charges` int(11) NOT NULL,
  `shipping_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_amount` int(11) NOT NULL,
  `order_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `users_id`, `users_email`, `name`, `address`, `city`, `state`, `pincode`, `country`, `mobile`, `shipping_charges`, `shipping_date`, `coupon_code`, `coupon_amount`, `order_status`, `payment_method`, `grand_total`, `created_at`, `updated_at`) VALUES
(26, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 7000, '1624233600', 'NO Coupon', 0, 'payment_success', 'COD', 7005, '2021-06-19 19:46:34', '2021-08-20 15:21:35'),
(27, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 7000, 'Monday 21 Jun 2021', 'NO Coupon', 0, 'pending', 'Bank', 7020, '2021-06-19 21:28:19', '2021-06-19 21:28:19'),
(28, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 7000, 'Monday 21 Jun 2021', 'NO Coupon', 0, 'pending', 'COD', 7030, '2021-06-19 23:31:30', '2021-06-19 23:31:30'),
(29, 7, 'akuntesting@gmail.com', 'akuntesting', 'c3 no 30', 'Lombok Timur', 'Nusa Tenggara Barat', '63155', 'Indonesia', '082231823144', 7000, 'Monday 21 Jun 2021', 'NO Coupon', 0, 'payment_success', 'Bank', 7005, '2021-06-20 22:52:02', '2021-08-20 15:18:09'),
(30, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 7000, 'Monday 16 Aug 2021', 'sayursembalun', 1000, 'pending', 'Bank', 99000, '2021-08-12 04:52:05', '2021-08-12 04:52:05'),
(31, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 7000, 'Monday 16 Aug 2021', 'sayursembalun', 1000, 'pending', 'Bank', 99000, '2021-08-12 04:52:28', '2021-08-12 04:52:28'),
(32, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 7000, 'Monday 23 Aug 2021', 'NO Coupon', 0, 'pending', 'COD', 7020, '2021-08-20 08:05:06', '2021-08-20 08:05:06'),
(33, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 7000, 'Monday 23 Aug 2021', 'NO Coupon', 0, 'pending', 'COD', 7010, '2021-08-20 08:39:40', '2021-08-20 08:39:40'),
(34, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 7000, 'Monday 23 Aug 2021', 'NO Coupon', 0, 'pending', 'COD', 7020, '2021-08-20 14:07:59', '2021-08-20 14:07:59'),
(35, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 7000, 'Monday 23 Aug 2021', 'NO Coupon', 0, 'pending', 'COD', 107020, '2021-08-20 14:11:52', '2021-08-20 14:11:52'),
(36, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 7000, 'Monday 23 Aug 2021', 'NO Coupon', 0, 'pending', 'COD', 107015, '2021-08-20 14:14:20', '2021-08-20 14:14:20'),
(37, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 7000, 'Monday 23 Aug 2021', 'NO Coupon', 0, 'pending', 'COD', 107020, '2021-08-20 14:22:44', '2021-08-20 14:22:44'),
(38, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 7000, 'Monday 23 Aug 2021', 'NO Coupon', 0, 'pending', 'COD', 107015, '2021-08-20 14:24:52', '2021-08-20 14:24:52'),
(39, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 7000, 'Monday 23 Aug 2021', 'NO Coupon', 0, 'confirm_payment', 'Bank', 107000, '2021-08-20 15:19:10', '2021-08-22 23:22:27'),
(40, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 7000, 'Monday 23 Aug 2021', 'sayursembalun', 10, 'pending', 'COD', 69, '2021-08-21 06:39:04', '2021-08-21 06:39:04'),
(41, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 7000, 'Tuesday 24 Aug 2021', 'NO Coupon', 0, 'confirm_payment', 'Bank', 147000, '2021-08-22 08:00:44', '2021-08-22 08:13:53'),
(42, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 7000, 'Tuesday 24 Aug 2021', 'sayursembalun', 1400, 'payment_success', 'Bank', 138600, '2021-08-22 08:17:59', '2021-08-22 20:42:16'),
(43, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Tengah', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 10000, 'Tuesday 24 Aug 2021', 'sayursembalun', 11300, 'payment_success', 'Bank', 111700, '2021-08-22 22:05:40', '2021-08-22 22:18:06'),
(44, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 7000, 'Tuesday 24 Aug 2021', 'NO Coupon', 0, 'pending', 'COD', 77000, '2021-08-22 23:02:00', '2021-08-22 23:02:00'),
(45, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 7000, 'Tuesday 14 Sep 2021', 'NO Coupon', 0, 'pending', 'COD', 147000, '2021-09-11 03:03:38', '2021-09-11 03:03:38'),
(46, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 7000, 'Tuesday 14 Sep 2021', 'NO Coupon', 0, 'payment_success', 'Bank', 77000, '2021-09-11 03:04:46', '2021-09-11 03:13:24'),
(47, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 10000, '1631605427', 'NO Coupon', 0, 'pending', 'COD', 24000, '2021-09-12 02:01:12', '2021-09-12 02:01:12'),
(48, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 10000, '1631605427', 'NO Coupon', 0, 'pending', 'Bank', 24000, '2021-09-12 03:05:03', '2021-09-12 03:05:03'),
(49, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 10000, '1631605427', 'NO Coupon', 0, 'pending', 'Bank', 24000, '2021-09-12 03:28:29', '2021-09-12 03:28:29'),
(50, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 10000, '1631605427', 'NO Coupon', 0, 'pending', 'Bank', 10000, '2021-09-12 03:32:49', '2021-09-12 03:32:49'),
(51, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 10000, '1631605427', 'NO Coupon', 0, 'pending', 'Bank', 50000, '2021-09-12 03:41:55', '2021-09-12 03:41:55'),
(52, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 10000, '1631605427', 'NO Coupon', 0, 'pending', 'Bank', 24000, '2021-09-12 05:51:16', '2021-09-12 05:51:16'),
(53, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 10000, '1631605427', 'NO Coupon', 0, 'pending', 'Bank', 64000, '2021-09-12 06:08:40', '2021-09-12 06:08:40'),
(54, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 10000, '1631605427', 'NO Coupon', 0, 'pending', 'Bank', 104000, '2021-09-12 06:17:14', '2021-09-12 06:17:14'),
(55, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 10000, '1631605427', 'NO Coupon', 0, 'pending', 'Bank', 104000, '2021-09-12 06:34:24', '2021-09-12 06:34:24'),
(56, 16, 'Ridloyanuar@gmail.com', 'ridlo', 'madiun', 'Lombok Timur', 'Nusa Tenggara Barat', '41233', 'Indonesia', '085803333652', 10000, '1631605427', 'NO Coupon', 0, 'pending', 'Bank', 109000, '2021-09-13 05:31:01', '2021-09-13 05:31:01'),
(57, 16, 'Ridloyanuar@gmail.com', 'ridlo', 'madiun', 'Lombok Timur', 'Nusa Tenggara Barat', '41233', 'Indonesia', '085803333652', 10000, '1631605427', 'NO Coupon', 0, 'payment_success', 'Bank', 208000, '2021-09-13 05:32:14', '2021-09-13 05:44:49'),
(58, 1, 'demo@gmail.com', 'boy', '123 Street', 'Lombok Timur', 'Nusa Tenggara Barat', '12252', 'Indonesia', '010313234', 10000, 'Tuesday 26 Oct 2021', 'NO Coupon', 0, 'pending', 'COD', 24000, '2021-10-23 19:41:18', '2021-10-23 19:41:18'),
(59, 22, 'akuntes@example.com', 'akuntes', '44', 'Lombok Timur', 'Nusa Tenggara Barat', '57634', 'Indonesia', '9689654479', 10000, 'Monday 20 Dec 2021', 'NO Coupon', 0, 'pending', 'COD', 60000, '2021-12-11 19:36:55', '2021-12-11 19:36:55'),
(60, 21, 'ridloyanuar@gmail.com', 'ridlo yanuar', '5', 'Lombok Timur', 'Nusa Tenggara Barat', '54222', 'Indonesia', '082231821348', 10000, 'Monday 20 Dec 2021', 'NO Coupon', 0, 'payment_success', 'Bank', 70000, '2021-12-12 03:33:21', '2021-12-12 04:57:18'),
(61, 21, 'ridloyanuar@gmail.com', 'ridlo yanuar', '5', 'Lombok Timur', 'Nusa Tenggara Barat', '54222', 'Indonesia', '082231821348', 10000, 'Monday 13 Dec 2021', 'NO Coupon', 0, 'pending', 'COD', 30000, '2021-12-12 03:35:18', '2021-12-12 03:35:18'),
(62, 21, 'ridloyanuar@gmail.com', 'ridlo yanuar', '5', 'Lombok Timur', 'Nusa Tenggara Barat', '54222', 'Indonesia', '082231821348', 10000, 'Monday 13 Dec 2021', 'NO Coupon', 0, 'pending', 'COD', 40000, '2021-12-12 04:34:43', '2021-12-12 04:34:43'),
(63, 21, 'ridloyanuar@gmail.com', 'ridlo yanuar', '5', 'Lombok Timur', 'Nusa Tenggara Barat', '54222', 'Indonesia', '082231821348', 10000, 'Monday 13 Dec 2021', 'NO Coupon', 0, 'pending', 'COD', 10000, '2021-12-12 04:35:09', '2021-12-12 04:35:09'),
(64, 21, 'ridloyanuar@gmail.com', 'ridlo yanuar', '5', 'Lombok Timur', 'Nusa Tenggara Barat', '54222', 'Indonesia', '082231821348', 10000, 'Monday 13 Dec 2021', 'NO Coupon', 0, 'pending', 'COD', 10000, '2021-12-12 04:37:58', '2021-12-12 04:37:58'),
(65, 21, 'ridloyanuar@gmail.com', 'ridlo yanuar', '5', 'Lombok Timur', 'Nusa Tenggara Barat', '54222', 'Indonesia', '082231821348', 10000, 'Monday 03 Jan 2022', 'NO Coupon', 0, 'pending', 'COD', 30000, '2021-12-12 18:06:09', '2021-12-12 18:06:09'),
(66, 21, 'ridloyanuar@gmail.com', 'ridlo yanuar', '5', 'Lombok Timur', 'Nusa Tenggara Barat', '54222', 'Indonesia', '082231821348', 10000, 'Monday 07 Feb 2022', 'NO Coupon', 0, 'pending', 'Bank', 30000, '2022-02-02 23:24:25', '2022-02-02 23:24:25'),
(67, 21, 'ridloyanuar@gmail.com', 'ridlo yanuar', '5', 'Lombok Timur', 'Nusa Tenggara Barat', '54222', 'Indonesia', '082231821348', 10000, 'Rabu, 02 Maret 2022', 'NO Coupon', 0, 'pending', 'COD', 60000, '2022-03-01 19:17:56', '2022-03-01 19:17:56'),
(68, 21, 'ridloyanuar@gmail.com', 'ridlo yanuar', '5', 'Lombok Timur', 'Nusa Tenggara Barat', '54222', 'Indonesia', '082231821348', 10000, 'Jumat, 04 Maret 2022', 'NO Coupon', 0, 'pending', 'COD', 60000, '2022-03-01 19:19:19', '2022-03-01 19:19:19'),
(69, 21, 'ridloyanuar@gmail.com', 'ridlo yanuar', '5', 'Lombok Timur', 'Nusa Tenggara Barat', '54222', 'Indonesia', '082231821348', 10000, 'Jumat, 04 Maret 2022', 'NO Coupon', 0, 'pending', 'COD', 10000, '2022-03-01 19:21:21', '2022-03-01 19:21:21'),
(70, 21, 'ridloyanuar@gmail.com', 'ridlo yanuar', '5', 'Lombok Timur', 'Nusa Tenggara Barat', '54222', 'Indonesia', '082231821348', 10000, 'Jumat, 04 Maret 2022', 'NO Coupon', 0, 'pending', 'COD', 10000, '2022-03-01 19:24:13', '2022-03-01 19:24:13'),
(71, 21, 'ridloyanuar@gmail.com', 'ridlo yanuar', '5', 'Lombok Timur', 'Nusa Tenggara Barat', '54222', 'Indonesia', '082231821348', 10000, 'Jumat, 04 Maret 2022', 'NO Coupon', 0, 'pending', 'COD', 10000, '2022-03-01 19:25:07', '2022-03-01 19:25:07'),
(72, 21, 'ridloyanuar@gmail.com', 'ridlo yanuar', '5', 'Lombok Timur', 'Nusa Tenggara Barat', '54222', 'Indonesia', '082231821348', 10000, 'Jumat, 04 Maret 2022', 'NO Coupon', 0, 'pending', 'COD', 10000, '2022-03-01 19:25:17', '2022-03-01 19:25:17'),
(73, 21, 'ridloyanuar@gmail.com', 'ridlo yanuar', '5', 'Lombok Timur', 'Nusa Tenggara Barat', '54222', 'Indonesia', '082231821348', 10000, 'Jumat, 04 Maret 2022', 'NO Coupon', 0, 'pending', 'COD', 10000, '2022-03-01 19:25:45', '2022-03-01 19:25:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_status`
--

INSERT INTO `order_status` (`id`, `user_id`, `order_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 28, 'pending', '2021-06-19 23:31:30', '2021-06-19 23:31:30'),
(2, 7, 29, 'pending', '2021-06-20 22:52:02', '2021-06-20 22:52:02'),
(3, 1, 30, 'pending', '2021-08-12 04:52:05', '2021-08-12 04:52:05'),
(4, 1, 31, 'pending', '2021-08-12 04:52:28', '2021-08-12 04:52:28'),
(5, 1, 32, 'pending', '2021-08-20 08:05:06', '2021-08-20 08:05:06'),
(6, 1, 33, 'pending', '2021-08-20 08:39:40', '2021-08-20 08:39:40'),
(7, 1, 34, 'pending', '2021-08-20 14:08:00', '2021-08-20 14:08:00'),
(8, 1, 35, 'pending', '2021-08-20 14:11:52', '2021-08-20 14:11:52'),
(9, 1, 36, 'pending', '2021-08-20 14:14:20', '2021-08-20 14:14:20'),
(10, 1, 37, 'pending', '2021-08-20 14:22:44', '2021-08-20 14:22:44'),
(11, 1, 38, 'pending', '2021-08-20 14:24:52', '2021-08-20 14:24:52'),
(12, 1, 39, 'pending', '2021-08-20 15:19:10', '2021-08-20 15:19:10'),
(13, 1, 40, 'pending', '2021-08-21 06:39:04', '2021-08-21 06:39:04'),
(14, 1, 41, 'pending', '2021-08-22 08:00:44', '2021-08-22 08:00:44'),
(15, 1, 42, 'pending', '2021-08-22 08:17:59', '2021-08-22 08:17:59'),
(16, 1, 43, 'pending', '2021-08-22 22:05:40', '2021-08-22 22:05:40'),
(17, 1, 44, 'pending', '2021-08-22 23:02:00', '2021-08-22 23:02:00'),
(18, 1, 45, 'pending', '2021-09-11 03:03:38', '2021-09-11 03:03:38'),
(19, 1, 46, 'pending', '2021-09-11 03:04:46', '2021-09-11 03:04:46'),
(20, 1, 47, 'pending', '2021-09-12 02:01:12', '2021-09-12 02:01:12'),
(21, 1, 48, 'pending', '2021-09-12 03:05:03', '2021-09-12 03:05:03'),
(22, 1, 49, 'pending', '2021-09-12 03:28:29', '2021-09-12 03:28:29'),
(23, 1, 50, 'pending', '2021-09-12 03:32:49', '2021-09-12 03:32:49'),
(24, 1, 51, 'pending', '2021-09-12 03:41:55', '2021-09-12 03:41:55'),
(25, 1, 52, 'pending', '2021-09-12 05:51:16', '2021-09-12 05:51:16'),
(26, 1, 53, 'pending', '2021-09-12 06:08:40', '2021-09-12 06:08:40'),
(27, 1, 54, 'pending', '2021-09-12 06:17:14', '2021-09-12 06:17:14'),
(28, 1, 55, 'pending', '2021-09-12 06:34:24', '2021-09-12 06:34:24'),
(29, 16, 56, 'pending', '2021-09-13 05:31:01', '2021-09-13 05:31:01'),
(30, 16, 57, 'pending', '2021-09-13 05:32:14', '2021-09-13 05:32:14'),
(31, 1, 58, 'pending', '2021-10-23 19:41:18', '2021-10-23 19:41:18'),
(32, 22, 59, 'pending', '2021-12-11 19:36:55', '2021-12-11 19:36:55'),
(33, 21, 60, 'pending', '2021-12-12 03:33:21', '2021-12-12 03:33:21'),
(34, 21, 61, 'pending', '2021-12-12 03:35:18', '2021-12-12 03:35:18'),
(35, 21, 62, 'pending', '2021-12-12 04:34:43', '2021-12-12 04:34:43'),
(36, 21, 63, 'pending', '2021-12-12 04:35:09', '2021-12-12 04:35:09'),
(37, 21, 64, 'pending', '2021-12-12 04:37:58', '2021-12-12 04:37:58'),
(38, 21, 65, 'pending', '2021-12-12 18:06:09', '2021-12-12 18:06:09'),
(39, 21, 66, 'pending', '2022-02-02 23:24:25', '2022-02-02 23:24:25'),
(40, 21, 67, 'pending', '2022-03-01 19:17:56', '2022-03-01 19:17:56'),
(41, 21, 68, 'pending', '2022-03-01 19:19:19', '2022-03-01 19:19:19'),
(42, 21, 69, 'pending', '2022-03-01 19:21:21', '2022-03-01 19:21:21'),
(43, 21, 70, 'pending', '2022-03-01 19:24:13', '2022-03-01 19:24:13'),
(44, 21, 71, 'pending', '2022-03-01 19:25:07', '2022-03-01 19:25:07'),
(45, 21, 72, 'pending', '2022-03-01 19:25:17', '2022-03-01 19:25:17'),
(46, 21, 73, 'pending', '2022-03-01 19:25:45', '2022-03-01 19:25:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_confirmation`
--

CREATE TABLE `payment_confirmation` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `bank_user` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `file_transfer` varchar(255) NOT NULL,
  `accept_tnc` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `payment_confirmation`
--

INSERT INTO `payment_confirmation` (`id`, `user_id`, `order_id`, `bank_user`, `bank_name`, `file_transfer`, `accept_tnc`, `created_at`, `updated_at`) VALUES
(1, 1, 26, 'sdfds', 'BCA', '1624164529.png', 1, '2021-06-20 07:41:44', '2021-06-19 21:48:49'),
(2, 7, 29, 'tes', 'BCA', '1624254892.png', 1, '2021-06-20 22:54:52', '2021-06-20 22:54:52'),
(3, 1, 26, 'fdf', 'BCA', '1629498040.png', 1, '2021-08-20 15:20:40', '2021-08-20 15:20:40'),
(4, 1, 41, 'tes', 'BCA', '1629645233.png', 1, '2021-08-22 08:13:53', '2021-08-22 08:13:53'),
(5, 1, 42, 'konfirmasi', 'BCA', '1629645502.png', 1, '2021-08-22 08:18:22', '2021-08-22 08:18:22'),
(6, 1, 43, 'boy', 'BCA', '1629695822.png', 1, '2021-08-22 22:17:02', '2021-08-22 22:17:02'),
(7, 1, 39, 'tes', 'BCA', '1629699747.png', 1, '2021-08-22 23:22:27', '2021-08-22 23:22:27'),
(8, 1, 46, 'boy', 'BCA', '1631354718.png', 1, '2021-09-11 03:05:18', '2021-09-11 03:05:18'),
(9, 16, 57, 'tes', 'BCA', '1631536476.png', 1, '2021-09-13 05:34:36', '2021-09-13 05:34:36'),
(10, 21, 60, '3280343250', 'BCA', '1639305245.jpg', 1, '2021-12-12 03:34:05', '2021-12-12 03:34:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `categories_id` int(11) NOT NULL,
  `p_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `satuan` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `promo` double(8,2) NOT NULL DEFAULT 0.00,
  `final_price` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `categories_id`, `p_name`, `p_code`, `description`, `price`, `satuan`, `stock`, `promo`, `final_price`, `image`, `created_at`, `updated_at`) VALUES
(42, 33, 'Buah Apel', 'ss-apel', 'apel merah<br>', 20000, 1, 2, 0.00, 20000, '1645724062-buah-apel.jpg', '2021-12-11 19:22:37', '2022-03-01 19:18:00'),
(43, 33, 'Buah Anggur Merah seger banget asli', 'ss-anggur', 'anggur merah<br>', 10000, 1, 6, 0.00, 10000, '1645724074-buah-anggur.jpg', '2021-12-11 19:24:46', '2022-02-24 17:37:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_att`
--

CREATE TABLE `product_att` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_att`
--

INSERT INTO `product_att` (`id`, `products_id`, `sku`, `size`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(35, 36, 'ss', '3', 0, 203, '2021-08-22 03:41:41', '2021-08-22 03:41:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id`, `jenis`, `updated_at`, `created_at`) VALUES
(1, 'kg', '2021-09-11', '2021-09-11'),
(2, 'ons', '2022-02-24', '2022-02-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` int(11) UNSIGNED NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `shipping_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `location_name`, `shipping_fee`) VALUES
(1, 'Lombok Timur', 10000),
(2, 'Lombok Tengah', 10000),
(3, 'Lombok Barat', 10000),
(4, 'Mataram', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblgallery`
--

CREATE TABLE `tblgallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HasVerifiedEmail` int(11) DEFAULT NULL,
  `reset_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `admin`, `remember_token`, `email_token`, `HasVerifiedEmail`, `reset_token`, `created_at`, `updated_at`, `address`, `city`, `state`, `country`, `pincode`, `mobile`) VALUES
(1, 'boy', 'admin@sayursembalun.com', NULL, '$2y$10$6BsEjgZDNd6UetgIKah7KeMcHK0DSoWTOnrtRia0buSOezYIi7rOS', 1, 'b81UzrnlyCGs3HBvkZzKc9mdh8ThZvjf4zL2PjyG2ipYP9o6eQdDN1yQOM7X', NULL, NULL, NULL, '2018-10-15 02:32:54', '2021-12-12 03:26:20', '123 Street', '1', 'Nusa Tenggara Barat', 'Cambodia', '12252', '010313234'),
(4, 'weshare', 'weshare@gmail.com', NULL, '$2y$10$3Ccxg17LYw/.qS7ib5Xcr.T5po6AXUsnjEcEI4IHcQ0MGkcuRfO.O', NULL, 'za7FtmzYvfzBYmkQtE5tfvStl7dY3Z6uZKSpuRtBRIvlbXzM0csZEQYzjuEb', NULL, NULL, NULL, '2018-12-06 01:40:27', '2018-12-06 01:40:27', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'ridlo yanuar', 'ridloyanuar@gmail.com', NULL, '$2y$10$SypzWUZHGGmzkQ7pSiXN5.8K.qSGKTUtHhJDggrhduywWiq6b9GDG', 1, 'k7C0V3pKr4s3E8gvucvuRpZT5RLncABS3Z5u3bNCubk1Kwqarcln6wr4vveQ', NULL, NULL, 'OcN2n7jIrmpVPJi8v7fPI0OZaRKqPLMCYpi7NGlBVmrmRLpTZ7L2ybyjvcvuUeQY', '2021-10-23 19:35:01', '2021-12-12 22:43:07', '5', '1', 'Nusa Tenggara Barat', NULL, '54222', '082231821348');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank_information`
--
ALTER TABLE `bank_information`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`name`);

--
-- Indeks untuk tabel `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `open_order`
--
ALTER TABLE `open_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `payment_confirmation`
--
ALTER TABLE `payment_confirmation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_att`
--
ALTER TABLE `product_att`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `shipping_charges`
--
ALTER TABLE `shipping_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tblgallery`
--
ALTER TABLE `tblgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank_information`
--
ALTER TABLE `bank_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT untuk tabel `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `open_order`
--
ALTER TABLE `open_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `payment_confirmation`
--
ALTER TABLE `payment_confirmation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `product_att`
--
ALTER TABLE `product_att`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tblgallery`
--
ALTER TABLE `tblgallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;
