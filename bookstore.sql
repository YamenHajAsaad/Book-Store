-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2024 at 12:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(15) NOT NULL,
  `admin_email` varchar(35) NOT NULL,
  `admin_password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'batoul@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(15) NOT NULL,
  `book_name` varchar(35) NOT NULL,
  `book_image` varchar(35) NOT NULL,
  `book_descrption` varchar(35) NOT NULL,
  `book_pdf` varchar(35) NOT NULL,
  `book_price` varchar(15) NOT NULL,
  `departement_id` int(15) NOT NULL,
  `writers_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `book_image`, `book_descrption`, `book_pdf`, `book_price`, `departement_id`, `writers_id`) VALUES
(1, 'Brothers Karamazov', '1.jpg', 'The Brothers Karamazov is a passion', 'fd1.pdf', '50000', 1, 2),
(2, ' poemsِِ', '9.jpg', 'Collection of poemsِِ', 'nazpropm.pdf', '50000', 2, 1),
(3, 'Women', '10.jpg', 'The best collection of ghazal poems', 'nk2.pdf', '50000', 2, 1),
(4, ' poemsِِ', '2.jpg', 'The best collection of ghazal poems', 'nm1.pdf', '50000', 2, 3),
(6, 'Crime and Punishment', '5.jpg', 'The best stories with destofaski', 'fd1.pdf', '50000', 3, 2),
(7, 'story of damscus', '4.jpg', 'Collection of stories', 'nm1.pdf', '50000', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `departement_id` int(15) NOT NULL,
  `departement_name` varchar(35) NOT NULL,
  `departement_image` varchar(35) NOT NULL,
  `departement_descrption` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`departement_id`, `departement_name`, `departement_image`, `departement_descrption`) VALUES
(1, 'Novels', 'blog3.jpg', 'Novels available in our library'),
(2, 'Poetry', 'blog2.jpg', 'Poetry available in our library'),
(3, 'stories', 'blog3.jpg', 'stories available in our library'),
(4, 'Childrens Stories', 'blog7.jpg', 'Childrens Stories available in our '),
(5, 'scientific', 'blog6.jpg', 'scientific available in our library');

-- --------------------------------------------------------

--
-- Table structure for table `detailsorder`
--

CREATE TABLE `detailsorder` (
  `detailsorder_id` int(15) NOT NULL,
  `order_id` int(15) NOT NULL,
  `book_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detailsorder`
--

INSERT INTO `detailsorder` (`detailsorder_id`, `order_id`, `book_id`) VALUES
(1, 1, 3),
(2, 2, 1),
(3, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `orderbook`
--

CREATE TABLE `orderbook` (
  `orderbook_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderbook`
--

INSERT INTO `orderbook` (`orderbook_id`, `user_id`) VALUES
(1, 3),
(2, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(15) NOT NULL,
  `user_name` varchar(35) NOT NULL,
  `user_email` varchar(35) NOT NULL,
  `user_password` varchar(35) NOT NULL,
  `user_phone` int(35) NOT NULL,
  `user_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_phone`, `user_status`) VALUES
(1, 'yamen', 'yamen@gmail.com', 'max99xam99', 1123456789, 0),
(2, 'safaa', 'safaa@gmail.com', 'safaammm', 1123456789, 1),
(3, 'tahsen', 'tahsen@gmail.com', 'tahsen', 1123456789, 1),
(4, 'rrrr', 'rrrr@gmail.com', '12%%max99ssaYYY', 1123456789, 1),
(5, 'aml', 'aml@gmail.com', 'khxjg756JFGD^^^^^@@@', 1123456789, 0);

-- --------------------------------------------------------

--
-- Table structure for table `writers`
--

CREATE TABLE `writers` (
  `writers_id` int(15) NOT NULL,
  `writers_name` varchar(35) NOT NULL,
  `writers_image` varchar(35) NOT NULL,
  `writers_descrption` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `writers`
--

INSERT INTO `writers` (`writers_id`, `writers_name`, `writers_image`, `writers_descrption`) VALUES
(1, 'NEZAR KABBANI', 'author3.jpg', 'Nizar Kabbani; 21 March 1923 – 30 April 1998) was a Syrian diplomat'),
(2, 'DESTOFSKI', 'author1.jpg', 'Fyodor Mikhailovich Dostoevsky is a Russian novelist, short story writer, and philosopher. It is one of the most famous books and authors around the w'),
(3, 'NAJEB MAHFOUZ', 'author2.jpg', ' know by his literary name, Naguib Mahfouz, he is an Egyptian novelist and writer. He is considered the first Arab writer to win the Nobel Prize in Li'),
(4, 'MAHMOUD DARWISH', 'author4.jpg', 'Mahmoud Darwish, one of the most important Palestinian and Arab poets whose name is associated with the poetry of revolution and homeland.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `book-departement` (`departement_id`),
  ADD KEY `book-writers` (`writers_id`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`departement_id`);

--
-- Indexes for table `detailsorder`
--
ALTER TABLE `detailsorder`
  ADD PRIMARY KEY (`detailsorder_id`),
  ADD KEY `details-order` (`order_id`),
  ADD KEY `details-book` (`book_id`);

--
-- Indexes for table `orderbook`
--
ALTER TABLE `orderbook`
  ADD PRIMARY KEY (`orderbook_id`),
  ADD KEY `order-user` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`writers_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `departement_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detailsorder`
--
ALTER TABLE `detailsorder`
  MODIFY `detailsorder_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderbook`
--
ALTER TABLE `orderbook`
  MODIFY `orderbook_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `writers`
--
ALTER TABLE `writers`
  MODIFY `writers_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book-departement` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`departement_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book-writers` FOREIGN KEY (`writers_id`) REFERENCES `writers` (`writers_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detailsorder`
--
ALTER TABLE `detailsorder`
  ADD CONSTRAINT `details-book` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `details-order` FOREIGN KEY (`order_id`) REFERENCES `orderbook` (`orderbook_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderbook`
--
ALTER TABLE `orderbook`
  ADD CONSTRAINT `order-user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
