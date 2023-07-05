-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Бер 07 2023 р., 14:10
-- Версія сервера: 10.4.27-MariaDB
-- Версія PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `aranoz`
--

-- --------------------------------------------------------

--
-- Структура таблиці `availibility`
--

CREATE TABLE `availibility` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `availibility`
--

INSERT INTO `availibility` (`id`, `title`) VALUES
(1, 'In stock'),
(2, 'Not available'),
(3, 'Ready to ship'),
(4, 'Expected');

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Chair'),
(2, 'Sofa'),
(3, 'Armchair');

-- --------------------------------------------------------

--
-- Структура таблиці `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `comments`
--

INSERT INTO `comments` (`id`, `text`, `product_id`, `user_id`, `rating`, `created`) VALUES
(1, 'great good', 1, 11, NULL, '2023-03-06 03:10:20'),
(2, 'perfect, just nothing to say', 1, 16, NULL, '2023-03-06 03:21:31'),
(3, 'Hello i am buy this product today and it is beautiful', 1, 11, NULL, '2023-03-06 12:45:50'),
(23, 'GOOOOD', 1, 15, NULL, '2023-03-07 10:09:32'),
(29, 'Good product', 2, 15, NULL, '2023-03-07 10:21:15'),
(30, 'perfect', 2, 15, NULL, '2023-03-07 10:24:09');

-- --------------------------------------------------------

--
-- Структура таблиці `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `favorites`
--

INSERT INTO `favorites` (`id`, `id_user`, `product_id`) VALUES
(49, 11, 6),
(50, 11, 8),
(51, 11, 9),
(59, 11, 11),
(63, 11, 19),
(66, 15, 18),
(68, 15, 23);

-- --------------------------------------------------------

--
-- Структура таблиці `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'nastyahomenko11@gmail.com'),
(2, 'lukas228@gmail.com'),
(6, 'anixelect1@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблиці `order_cart`
--

CREATE TABLE `order_cart` (
  `id` int(11) NOT NULL,
  `ordernumber` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `order_cart`
--

INSERT INTO `order_cart` (`id`, `ordernumber`, `user_id`, `created`, `product_id`, `quantity`, `total`, `status`) VALUES
(1, '0000001', 11, '2023-03-01 15:37:09', 1, 2, '2598 ', 'Your order has been received.'),
(2, '0000001', 11, '2023-03-01 15:37:09', 3, 1, '2000 ', 'Your order has been received.'),
(3, '0000002', 11, '2023-03-01 15:37:09', 3, 1, '2000 ', 'Your order has been received.'),
(4, '0000002', 11, '2023-03-01 15:37:09', 1, 2, '2598 ', 'Your order has been received.'),
(5, '0000003', 11, '2023-03-01 15:37:09', 2, 2, '2398 ', 'Your order has been received.'),
(6, '0000005', 11, '2023-03-01 15:37:09', 2, 2, '2398 ', 'Your order has been received.'),
(7, '0000005', 11, '2023-03-01 15:37:09', 3, 1, '2000 ', 'Your order has been received.'),
(10, '0000006', 11, '2023-03-05 19:03:23', 2, 2, '2398 ', 'Your order has been received.'),
(11, '0000006', 11, '2023-03-05 19:04:40', 9, 1, '2799 ', 'Your order has been received.'),
(12, '0000006', 11, '2023-03-05 19:26:19', 20, 9, '292500 ', 'Your order has been received.'),
(13, '0000006', 11, '2023-03-05 20:56:14', 26, 4, '13996 ', 'Your order has been received.'),
(58, '0000007', 15, '2023-03-07 09:45:54', 1, 2, '2598 ', 'Your order has been received.'),
(62, '0000008', 15, '2023-03-07 10:09:17', 30, 2, '45000 ', 'Your order has been received.'),
(64, '0000009', 15, '2023-03-07 10:35:38', 4, 1, '2499 ', 'Your order has been received.'),
(65, '0000009', 15, '2023-03-07 10:35:40', 2, 2, '2398 ', 'Your order has been received.'),
(66, '0000009', 15, '2023-03-07 10:35:41', 3, 1, '2000 ', 'Your order has been received.'),
(67, '0000009', 15, '2023-03-07 10:35:43', 5, 3, '8997 ', 'Your order has been received.'),
(68, '0000010', 15, '2023-03-07 10:51:16', 1, 2, '2598 ', 'Your order has been received.');

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `availibility_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `slider` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `productname`, `category_id`, `price`, `quantity`, `availibility_id`, `rating`, `image`, `user_id`, `created`, `slider`) VALUES
(1, 'Dining chair JONSTRUP gray', 1, '1299', 100, 3, NULL, 'product_1.jfif', 1, '2023-03-01 15:20:04', NULL),
(2, 'Dining chair BISTRUP olive/oak', 1, '1199', 100, 3, NULL, 'product_2.jfif', 1, '2023-03-01 15:27:15', 1),
(3, 'Dining chair KASTRUP black fabric', 1, '2000', 100, 3, NULL, 'product_3.jfif', 1, '2023-03-01 15:20:04', NULL),
(4, 'Dining chair TUREBY pcs. leather cream', 1, ' 2499', 100, 3, NULL, 'product_4.jfif', 1, '2023-03-04 17:47:51', 0),
(5, 'Dining chair JEGIND oak/black', 1, '2999', 100, 2, NULL, 'product_30.jfif', 1, '2023-03-04 17:54:45', NULL),
(6, 'Dining chair FARSTRUP white', 1, '1499', 100, 3, NULL, 'product_29.jfif', 1, '2023-03-04 17:54:45', NULL),
(7, 'Dining chair ADSLEV gray velvet', 1, '3000', 100, 4, NULL, 'product_28.jfif', 1, '2023-03-04 17:57:43', NULL),
(8, 'Dining chair TOREBY piece leather black', 1, '1150', 100, 1, NULL, 'product_27.jfif', 1, '2023-03-04 18:06:12', NULL),
(9, 'Dining chair HAMMEL black/chrome', 1, '2799', 100, 3, NULL, 'product_26.jfif', 1, '2023-03-04 18:06:12', NULL),
(10, 'Dining chair HVIDOVRE oak/black', 1, '3250', 100, 3, NULL, 'product_25.jfif', 1, '2023-03-04 18:09:13', NULL),
(11, 'Sofa LISELEJE natural', 2, '6000', 100, 3, NULL, 'product_24.jfif', 1, '2023-03-04 18:22:40', NULL),
(12, 'Sofa DAMHALE 2-seater black', 2, '13500', 100, 1, NULL, 'product_23.jfif', 1, '2023-03-04 18:22:40', NULL),
(13, 'Sofa-bed VARPELEV st. gray', 2, '15000', 100, 3, NULL, 'product_22.jfif', 1, '2023-03-04 18:28:41', NULL),
(14, 'GISTRUP 3-seater sofa, blue', 2, '14500', 100, 3, NULL, 'product_21.jfif', 1, '2023-03-04 18:28:41', NULL),
(15, 'The ODDESUND couch is white', 2, '22500', 100, 4, NULL, 'product_20.jfif', 1, '2023-03-04 18:34:54', 1),
(16, 'Corner sofa-bed VEJLBY St. Pisochny', 2, '23500', 100, 3, NULL, 'product_19.jfif', 1, '2023-03-04 18:34:54', 1),
(17, 'BATUM 2-seater multi-position sofa', 2, '25000', 100, 3, NULL, 'product_5.jfif', 1, '2023-03-04 18:39:09', 0),
(18, 'Corner sofa KARE right-sided St. Gray', 2, '26500', 100, 3, NULL, 'product_6.jfif', 1, '2023-03-04 18:39:09', 0),
(19, 'Corner sofa AARHUS dark gray', 2, '28500', 100, 3, NULL, 'product_7.jfif', 1, '2023-03-04 18:43:32', 0),
(20, 'AARHUS right-sided corner sofa, gray', 2, '32500', 100, 3, NULL, 'product_8.jfif', 1, '2023-03-04 18:43:32', 1),
(21, 'Low LISELEJE armchair natural', 3, '2500', 100, 3, NULL, 'product_9.jfif', 1, '2023-03-04 18:51:10', 0),
(22, 'TILST armchair terracotta/birch', 3, '2600', 100, 3, NULL, 'product_10.jfif', 1, '2023-03-04 18:51:10', 0),
(23, 'Office chair NIMTOF artificial leather black', 3, '2850', 100, 3, NULL, 'product_11.jfif', 1, '2023-03-04 18:54:53', 0),
(24, 'Armchair + pillow JORDRUP rattan', 3, '3250 ', 100, 3, NULL, 'product_12.jfif', 1, '2023-03-04 18:54:53', 0),
(25, 'Armchair UDSBJERG velvet t.green', 3, '3250', 100, 3, NULL, 'product_13.jfif', 1, '2023-03-04 18:58:26', 0),
(26, 'Bag chair BAKHOLM black', 3, '3499', 100, 3, NULL, 'product_14.jfif', 1, '2023-03-04 18:58:26', NULL),
(27, 'Gaming armchair HARLEV black', 3, '3500', 100, 3, NULL, 'product_15.jfif', 1, '2023-03-04 19:03:43', NULL),
(28, 'Armchair ONSEVIG velvet gray/black', 3, '3600', 100, 3, NULL, 'product_16.jfif', 1, '2023-03-04 19:03:43', NULL),
(29, 'THISTED armchair black/matte chrome', 3, '4250', 100, 3, NULL, 'product_17.jfif', 1, '2023-03-04 19:16:00', NULL),
(30, 'Lounge armchair ULLEHUSE natural', 3, '4500', 100, 3, 0, 'product_18.jfif', 16, '2023-03-04 19:16:00', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `product_specification`
--

CREATE TABLE `product_specification` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `width` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `depth` varchar(255) NOT NULL,
  `max_weight` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `product_specification`
--

INSERT INTO `product_specification` (`id`, `product_id`, `width`, `height`, `depth`, `max_weight`, `color`) VALUES
(1, 1, '45 ', '87 ', '53 ', '110', 'gray'),
(2, 2, '45 ', '87 ', '53 ', '110', 'olive'),
(3, 3, '48', '84', '56', '110', 'black'),
(4, 4, '47', '100 ', '60', '110', 'leather cream'),
(5, 5, '45', '79', '54', '110', 'oak/black'),
(6, 6, '43', '87', '45', '110', 'white'),
(7, 7, '59', '82', '58,5', '110', 'gray'),
(8, 8, '43', '98', '51', '110', 'black'),
(9, 9, '53', '86', '54', '110', 'black'),
(10, 10, '52', '79', '51', '110', 'black'),
(11, 11, '121', '79 ', '71', '130', 'natural'),
(12, 12, '157', '80', '87', '160', 'black'),
(13, 13, '214', '93', '89', '220', 'gray'),
(14, 14, '198', '75', '79', '220', 'blue'),
(15, 15, '181', '71', '87', '200', 'white'),
(16, 16, '243', '86', '82/155', '245', 'pisochny'),
(17, 17, '196', '78-96 ', '98-160', '200', 'gray'),
(18, 18, '230', '74', '76/169', '250', 'gray'),
(19, 19, '227', '85', '84/201', '230', 'dark gray'),
(20, 20, '294', '82', '84/137/201', '300', 'gray'),
(21, 21, '57', '79', '62', '110', 'natural'),
(22, 22, '67', '92', '78', '110', 'terracotta'),
(23, 23, '57', '92-102', '64', '110', 'black'),
(24, 24, '100', '60', '30', '110', 'rattan'),
(25, 25, '64', '86', '68', '110', 'green'),
(26, 26, '70', '100', '80', '110', 'black'),
(27, 27, '57', '63', '99-109', '110', 'black'),
(28, 28, '58', '61', '83', '110', 'gray/black'),
(29, 29, '72', '74', '83', '110', 'black'),
(30, 30, '72', '73', '68', '110', 'natural');

-- --------------------------------------------------------

--
-- Структура таблиці `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `request`
--

INSERT INTO `request` (`id`, `name`, `email`, `message`, `subject`) VALUES
(1, 'Anastasia', 'nastyahomenko11@gmail.com', 'Hello, who can I talk to about bulk purchases?', 'cooperation'),
(3, 'Anastasiia', 'nastyahomenko11@gmail.com', 'I have a great offer for you', 'Cooperation');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postcode` int(8) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `role` varchar(255) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `telephone`, `avatar`, `country`, `city`, `address`, `postcode`, `created`, `role`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin', NULL, 'default.jpg', 'Ukraine', '', '', 0, '2023-03-01 14:00:42', 'admin'),
(11, 'nastyahomenko11@gmail.com', 'Anastasiia Khomenko', '827ccb0eea8a706c4c34a16891f84e7b', '380992535421', 'ie4NXyMxEja9M0sXCBdUdgmwhckPKj6vDHW1IuV48NAIxqsZpPykztxl0rzKLco21678140564.jpg', 'Ukraine', 'Odesa', 'Armiiska 9', 65255, '2023-03-07 11:14:18', 'customer'),
(15, 'anixelect1@gmail.com', 'Maksim Gitruk', '827ccb0eea8a706c4c34a16891f84e7b', '380733904916', 'KlEW3ki20ldz8et5fqeoQVPG2YLgtHJeKRNrYHZnmWF2qjowg4ePpOXGUs7ya7oA1678175127.jpg', 'Ukraine', 'Lviv', 'Armiiska 12', 65025, '2023-03-07 03:17:48', 'customer'),
(16, 'mikitafedorenko1@gmail.com', 'Karyachok', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'A1I4OoAU1zLoibOASyNuEk5JZMHy10hzqEffz6K8pUJmL4IG26f7WRmxqUweWIho1678191510.jpg', NULL, NULL, NULL, NULL, '2023-03-07 11:02:00', 'admin');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `availibility`
--
ALTER TABLE `availibility`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `order_cart`
--
ALTER TABLE `order_cart`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `product_specification`
--
ALTER TABLE `product_specification`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `availibility`
--
ALTER TABLE `availibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблиці `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT для таблиці `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблиці `order_cart`
--
ALTER TABLE `order_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT для таблиці `product_specification`
--
ALTER TABLE `product_specification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблиці `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
