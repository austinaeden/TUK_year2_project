-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2025 at 10:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_image` varchar(255) DEFAULT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `purchase_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `user_id`, `item_name`, `item_image`, `item_price`, `item_quantity`, `purchase_date`) VALUES
(1, 14, 'BELT', 'https://ke.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/20/4517672/1.jpg?7984', 499.00, 1, '2025-01-10 22:36:14'),
(2, 14, 'Trouser', 'https://ke.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/31/1898771/1.jpg?0505', 1699.00, 1, '2025-01-10 22:36:14'),
(3, 14, 'Jacket', 'https://ke.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/78/4622362/1.jpg?0257', 1150.00, 1, '2025-01-10 22:36:14'),
(4, 14, ' Overcoat + Dress', 'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/60/8671032/1.jpg?4146', 1250.00, 3, '2025-01-10 22:44:45'),
(5, 14, 'Collar_Tops + Shorts.', 'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/91/6637591/1.jpg?8205', 1300.00, 3, '2025-01-10 22:44:45'),
(6, 14, 'T-Shirt + Short.', 'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/18/110027/1.jpg?0592', 1190.00, 5, '2025-01-10 22:44:45'),
(7, 14, 'Short', 'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/30/6185251/1.jpg?6151', 446.00, 1, '2025-01-10 22:44:45'),
(8, 14, 'Tshirt + Short-Mint Boss', 'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/82/3886462/1.jpg?4089', 1165.00, 1, '2025-01-10 22:44:45'),
(9, 14, 'BELT', 'https://ke.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/20/4517672/1.jpg?7984', 499.00, 4, '2025-01-10 22:45:41'),
(10, 14, 'Jacket', 'https://ke.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/78/4622362/1.jpg?0257', 1150.00, 1, '2025-01-10 23:16:45'),
(11, 14, 'T-Shirt + Short.', 'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/61/3592761/1.jpg?1009', 1250.00, 1, '2025-01-10 23:16:45'),
(12, 14, 'Shoulder Bubble + Skirt.', 'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/64/3886462/1.jpg?4090', 1072.00, 1, '2025-01-10 23:16:45'),
(13, 14, 'Short', 'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/57/5185251/1.jpg?6088', 524.00, 1, '2025-01-10 23:16:45'),
(14, 14, ' Overcoat + Dress', 'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/60/8671032/1.jpg?4146', 1250.00, 1, '2025-01-10 23:16:45'),
(15, 14, 'Bodysuit + Headband.', 'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/66/429936/1.jpg?5445', 960.00, 1, '2025-01-10 23:16:45'),
(16, 14, 'Cap', 'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/53/4304171/1.jpg?8112', 599.00, 4, '2025-01-14 21:54:59'),
(17, 14, 'Mr. Cute', 'https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/04/9453071/1.jpg?4796', 75.00, 1, '2025-01-14 21:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `pwd`, `date`) VALUES
(12, 'austinaeden@gmail.com', 'aeden', '$2y$12$PYyec40CSFT5iiloEX8VKeFHsJk99z6KAjLOwCB1QRM3vXYkJNV4G', '2025-01-02'),
(13, 'elizabethwaithera@gmail.com', 'elizabeth', '$2y$12$ZYrE1rXls9KHSViqBPvP7e5vdz5SXXgvA8AICfeFMCd9oFWZGnaIa', '2025-01-02'),
(14, 'johnmbogo106@gmail.com', 'john', '$2y$12$3013L0qGYjsaSQKvdmT8wueqKsKUnd6.v86UykOLZecwMB0YB2Xmm', '2025-01-03'),
(16, 'austinmbogo@gmail.com', 'austin', '$2y$12$6R9hv/PMlqzeGdjqDT16ReDky1NT3Ybim/qIwvflxw3vjcaN2Xy8m', '2025-01-04'),
(17, 'oliviaamani@gmail.com', 'amani', '$2y$12$.LuPfcx7Whulazl3O6Fzsuu8xQqHeT/hD7yCaff7P/iAho6OjFi6S', '2025-01-05'),
(18, 'kimura@gmail.com', 'kimura', '$2y$12$9zr3SKDzHrwzS4mOGjb/C.COWka2XzKE/vusF0OZozsuFDE6jc09G', '2025-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_image` varchar(255) DEFAULT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`id`, `user_id`, `item_id`, `item_name`, `item_image`, `item_price`, `item_quantity`, `created_at`) VALUES
(17, 17, 0, 'BELT', 'https://ke.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/20/4517672/1.jpg?7984', 499.00, 4, '2025-01-05 22:11:54'),
(18, 17, 0, 'Mr. Cute', 'https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/04/9453071/1.jpg?4796', 75.00, 2, '2025-01-05 22:12:31'),
(19, 17, 0, 'Jacket', 'https://ke.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/78/4622362/1.jpg?0257', 1150.00, 1, '2025-01-05 22:12:32'),
(79, 18, 0, 'BELT', 'https://ke.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/20/4517672/1.jpg?7984', 499.00, 1, '2025-01-13 05:29:03'),
(103, 14, 0, 'Jacket', 'https://ke.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/78/4622362/1.jpg?0257', 1150.00, 1, '2025-02-01 12:57:00'),
(104, 14, 0, 'BELT', 'https://ke.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/20/4517672/1.jpg?7984', 499.00, 1, '2025-02-01 12:59:54'),
(105, 14, 0, 'Mr. Cute', 'https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/04/9453071/1.jpg?4796', 75.00, 1, '2025-02-01 13:00:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD CONSTRAINT `user_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
