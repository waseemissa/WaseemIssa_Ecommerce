-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2021 at 10:00 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `artist` varchar(250) NOT NULL,
  `picture` text NOT NULL,
  `price` double NOT NULL,
  `amount` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `store_id`, `name`, `artist`, `picture`, `price`, `amount`, `description`) VALUES
(1, 1, 'Hiba Tawaji 30', 'Hiba Tawaji', 'Hiba Tawaji 30.jpg', 32, 26, 'A double album produced by Oussama Rahbani and released on March 30, 2017.'),
(2, 1, 'Evermore', 'Taylor Swift', 'evermore.jpg', 55, 99, 'an album released by Taylor Swift in 2020 having two bonus tracks.'),
(3, 1, 'Folklore', 'Taylor Swift', 'folklore.png', 51, 136, 'an album released by Taylor Swift in 2020.'),
(4, 2, 'Byeb\'a Nas', 'Abeer Nehme', 'byeb2a nas.jpeg', 70, 12, 'Released on June 2021'),
(9, 1, 'La Bidayi Wala Nihayi', 'Hiba Tawaji', 'la bidayi wala nihayi.jpg', 69, 63, 'Produced By Oussama Rahbani in 2011. The first studio album of Hiba Tawaji.'),
(10, 2, 'Ya Habibi', 'Hiba Tawaji', 'ya habibi.jpg', 70, 0, 'Produced by Oussama Rahbani in 2014.');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `address` varchar(250) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `email`, `phone_number`, `address`, `password`) VALUES
(1, 'Smart Stop', 'smartstop@hotmail.com', '+96103384398', 'Chtaura, West Bekaa, Lebanon', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(2, 'Virgin MegaStores', 'virgin@megastores.com', '+96171159786', 'Beirut, Lebanon', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `address` varchar(250) NOT NULL,
  `date_of_birth` date NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `date_of_birth`, `password`) VALUES
(1, 'Waseem', 'Issa', 'waseem.issa88@gmail.com', '+96176162783', 'Baaloul, West Bekaa, Lebanon', '1998-08-09', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(2, 'Issam', 'Issa', 'issam@gmail.com', '+96176162783', 'Baaloul, West Bekaa, Lebanon', '1994-12-11', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(3, 'Hiba', 'Tawaji', 'hiba@domain.com', '+96176162783', 'Near Green School', '1987-10-10', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(4, 'Nael', 'Maalouf', 'nael@hotmail.com', '+96176162783', 'Near Green School', '2000-04-20', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(5, 'Khaled', 'Ahmad', 'khaled@hotmail.com', '+96176162783', 'Baaloul, West Bekaa, Lebanon', '1987-10-13', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225');

-- --------------------------------------------------------

--
-- Table structure for table `users_buy_products`
--

CREATE TABLE `users_buy_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_buy_products`
--

INSERT INTO `users_buy_products` (`id`, `user_id`, `product_id`, `date`, `amount`, `price`) VALUES
(1, 1, 1, '2019-10-29', 1, 32),
(55, 1, 2, '2021-09-08', 1, 55),
(56, 1, 3, '2021-09-08', 1, 51),
(57, 1, 4, '2021-09-08', 1, 70),
(58, 1, 9, '2021-09-08', 1, 69),
(59, 1, 4, '2021-09-08', 1, 70),
(60, 1, 1, '2021-09-08', 1, 32),
(61, 1, 1, '2021-09-08', 1, 32),
(62, 1, 1, '2021-09-08', 1, 32),
(63, 1, 1, '2021-09-08', 1, 32),
(64, 1, 1, '2021-09-08', 1, 32),
(65, 1, 2, '2021-09-08', 1, 55),
(66, 1, 2, '2021-09-08', 1, 55),
(67, 1, 1, '2021-09-08', 1, 32);

-- --------------------------------------------------------

--
-- Table structure for table `users_like_products`
--

CREATE TABLE `users_like_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_like_products`
--

INSERT INTO `users_like_products` (`id`, `user_id`, `product_id`) VALUES
(22, 1, 9),
(27, 1, 2),
(28, 1, 3),
(29, 1, 4),
(32, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_buy_products`
--
ALTER TABLE `users_buy_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_like_products`
--
ALTER TABLE `users_like_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_buy_products`
--
ALTER TABLE `users_buy_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users_like_products`
--
ALTER TABLE `users_like_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
