-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 07:51 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_orders`
--

CREATE TABLE `admin_orders` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `individual_total` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_orders`
--

INSERT INTO `admin_orders` (`id`, `cart_id`, `user_id`, `product_id`, `product_qty`, `individual_total`, `total_price`, `approved`) VALUES
(1, 6, 1, 1, 1, 20, 20, 0),
(2, 7, 1, 3, 1, 200, 220, 0),
(3, 8, 1, 4, 1, 2000, 2220, 0),
(4, 9, 1, 6, 2, 4000, 6220, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `product_qty`, `total_price`) VALUES
(1, 4, 1, 0, 0),
(2, 4, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL,
  `cat_description` varchar(255) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `Is_Active`, `cat_description`, `PostingDate`, `UpdationDate`) VALUES
(1, 'Thriller', 1, 'Thriller Books', '2021-12-17 20:33:59', '2021-12-17 20:33:59'),
(2, 'Adventure', 1, 'Adventure Books', '2021-12-17 20:33:59', '2021-12-17 20:33:59'),
(3, 'Thriller', 1, 'Thriller Books', '2021-12-17 20:34:02', '2021-12-17 20:34:02'),
(4, 'Adventure', 1, 'Adventure Books', '2021-12-17 20:34:02', '2021-12-17 20:34:02'),
(5, 'Detective', 1, 'Detective Stories', '2021-12-17 20:35:02', '2021-12-17 20:35:02'),
(6, 'Children Stories', 1, 'Children Books', '2021-12-17 20:35:02', '2021-12-17 20:35:02'),
(7, 'Novel', 1, 'Novels', '2021-12-17 20:35:02', '2021-12-17 20:35:02'),
(8, 'Comedy', 1, 'Jokes', '2021-12-17 20:35:02', '2021-12-17 20:35:02'),
(9, 'Detective', 1, 'Detective Stories', '2021-12-17 20:35:05', '2021-12-17 20:35:05'),
(10, 'Children Stories', 1, 'Children Books', '2021-12-17 20:35:05', '2021-12-17 20:35:05'),
(11, 'Novel', 1, 'Novels', '2021-12-17 20:35:05', '2021-12-17 20:35:05'),
(12, 'Comedy', 1, 'Jokes', '2021-12-17 20:35:05', '2021-12-17 20:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `product_details` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `product_name`, `product_price`, `qty`, `image`, `short_desc`, `product_details`, `status`, `Is_Active`) VALUES
(1, 1, 'Himu Shomogro', 20, 1997, 'https://images-na.ssl-images-amazon.com/images/I/51JMNXLe6cL._SX303_BO1,204,203,200_.jpg', 'Himu is a fictional character created by Humayun Ahmed. Himu lives like a vagabond, and he does not have a job and, therefore, no source of income', 'Its a book', 1, 1),
(3, 2, 'After You', 200, 899997, 'https://upload.wikimedia.org/wikipedia/en/e/e8/After_You_%28Moyes_book%29.jpg', 'After You is a romance novel written by Jojo Moyes. It is a sequel to Me Before You. The book was first published on 29 September 2015 in the United Kingdom. A third novel in the series, Still Me, was published in January 2018', 'JoJo Mayos', 1, 1),
(4, 2, 'Diary Of A Wimpy Kid', 2000, 399999, 'https://static-01.daraz.com.bd/p/e726ed584d87040e4cf51229f05f37db.jpg', 'Diary of a Wimpy Kid is an American fiction book series and media franchise created by author and cartoonist Jeff Kinney. The series follows Greg Heffley, who illustrates his daily life in a diary. Kinney spent eight years working on the book before showing it to a publisher', 'Kids Book', 1, 1),
(5, 2, 'After You', 200, 900000, 'https://upload.wikimedia.org/wikipedia/en/e/e8/After_You_%28Moyes_book%29.jpg', 'After You is a romance novel written by Jojo Moyes. It is a sequel to Me Before You. The book was first published on 29 September 2015 in the United Kingdom. A third novel in the series, Still Me, was published in January 2018', 'JoJo Mayos', 1, 1),
(6, 2, 'Diary Of A Wimpy Kid', 2000, 399998, 'https://static-01.daraz.com.bd/p/e726ed584d87040e4cf51229f05f37db.jpg', 'Diary of a Wimpy Kid is an American fiction book series and media franchise created by author and cartoonist Jeff Kinney. The series follows Greg Heffley, who illustrates his daily life in a diary. Kinney spent eight years working on the book before showing it to a publisher', 'Kids Book', 1, 1),
(7, 2, 'After You', 200, 900000, 'https://upload.wikimedia.org/wikipedia/en/e/e8/After_You_%28Moyes_book%29.jpg', 'After You is a romance novel written by Jojo Moyes. It is a sequel to Me Before You. The book was first published on 29 September 2015 in the United Kingdom. A third novel in the series, Still Me, was published in January 2018', 'JoJo Mayos', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `usertype` int(11) NOT NULL DEFAULT 0,
  `address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Is_Active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `password`, `email`, `phone`, `added_on`, `usertype`, `address`, `username`, `Is_Active`) VALUES
(1, '', '1234', 'user1@gmail.com', '1234', '2021-12-19 18:41:28', 0, 'Dhaka', 'user1', 0),
(2, '', '1234', 'abida@gmail.com', '1234567890', '2021-12-24 17:37:59', 0, 'Dhaka', 'Abida', 0),
(3, 'Admin', 'admin', 'admin@gmail.com', '123456789', '2021-12-28 18:41:31', 1, 'Dhaka', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_orders`
--
ALTER TABLE `admin_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_orders`
--
ALTER TABLE `admin_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
