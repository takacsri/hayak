-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 04:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hyak_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(11, 'Paste'),
(14, 'Bistro food'),
(15, 'Pizza');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_location` varchar(255) NOT NULL,
  `customer_adress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_location`, `customer_adress`) VALUES
(10, 'Bogdan Ioan', 'ioanbogdan@yahoo.com', '0756454664', 'Gherla', 'str stejarului, nr 32'),
(11, 'Retegan Alina', 'alinuca@yahoo.com', '0756454664', 'Cluj-Napoca', 'str Avram Iancu, nr 11');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_observations` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_amount`, `order_status`, `customer_id`, `order_date`, `order_observations`) VALUES
(8, 108, 'în procesare', 10, '2023-03-25 21:07:50', ''),
(9, 38, 'în procesare', 11, '2023-03-26 16:23:58', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `product_id`, `order_id`, `product_quantity`) VALUES
(9, 9, 8, 2),
(10, 20, 8, 1),
(11, 9, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_weight` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_short_description` text NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_title`, `cat_id`, `product_price`, `product_weight`, `product_description`, `product_short_description`, `product_image`) VALUES
(9, 'Spaghette cu creveți', 11, 38, 450, 'Cantitate ingrediente pentru o portie\r\n\r\nBacon afumat: 100 g (Contine: Soia, Lapte, Poate contine urme de: Mustar, Oua, Telina, Gluten) (Agenti de ingrosare: E450v - Difosfat tetrapotasic, E407 - Caragenan, E425i - Gumă konjac, Agenti de incarcare: E415 - Gumă de xantan, E325 - Lactat de sodiu, Antioxidanti: E301 - Ascorbat de sodiu, E316 - Eritorbat de sodiu, Agenti sechestranti: E330 - Acid citric, Conservanti: E250 - Nitrit de sodiu, Potentiatori de aroma: E621 - Glutamat monosodic), Apa: 100 g , Spaghete no. 3 Barilla: 100 g (Contine: Gluten), Smantana dulce 32% LaDorna: 50 g (Contine: Lapte), Parmezan grana padano: 50 g (Contine: Lapte, Poate contine urme de: Oua), Galbenus de ou: 30 g (Contine: Oua), Sare de masa: 5 g , Piper alb: 1 g\r\n\r\nValori nutritionale / portie (400g)\r\n\r\nValoare energetica: 849.95 KCal /3556.21 Kj , Grasimi: 39.56 g, Acizi grasi saturati: 12.38 g, Glucide: 69.38 g, Zaharuri: 3.54 g, Proteine: 52.34 g, Sare: 8.87 g\r\n\r\nValori nutritionale / 100g\r\n\r\nValoare energetica: 212.49 KCal /889.05 Kj , Grasimi: 9.89 g, Acizi grasi saturati: 3.09 g, Glucide: 17.34 g, Zaharuri: 0.89 g, Proteine: 13.08 g, Sare: 2.22 g\r\n\r\nAlergeni: Soia, Lapte, Gluten, Oua\r\n\r\nPoate contine urme de: Mustar, Oua, Telina, Gluten', 'Ingrediente: spaghette, roși cherry, usturoi, creveți, vin alb, pătrunjel', 'spaghette-cu-creveti-crop.jpg'),
(14, 'File de păstrăv', 14, 36, 400, 'Cantitate ingrediente pentru o portie\r\n\r\nBacon afumat: 100 g (Contine: Soia, Lapte, Poate contine urme de: Mustar, Oua, Telina, Gluten) (Agenti de ingrosare: E450v - Difosfat tetrapotasic, E407 - Caragenan, E425i - Gumă konjac, Agenti de incarcare: E415 - Gumă de xantan, E325 - Lactat de sodiu, Antioxidanti: E301 - Ascorbat de sodiu, E316 - Eritorbat de sodiu, Agenti sechestranti: E330 - Acid citric, Conservanti: E250 - Nitrit de sodiu, Potentiatori de aroma: E621 - Glutamat monosodic), Apa: 100 g , Spaghete no. 3 Barilla: 100 g (Contine: Gluten), Smantana dulce 32% LaDorna: 50 g (Contine: Lapte), Parmezan grana padano: 50 g (Contine: Lapte, Poate contine urme de: Oua), Galbenus de ou: 30 g (Contine: Oua), Sare de masa: 5 g , Piper alb: 1 g\r\n\r\nValori nutritionale / portie (400g)\r\n\r\nValoare energetica: 849.95 KCal /3556.21 Kj , Grasimi: 39.56 g, Acizi grasi saturati: 12.38 g, Glucide: 69.38 g, Zaharuri: 3.54 g, Proteine: 52.34 g, Sare: 8.87 g\r\n\r\nValori nutritionale / 100g\r\n\r\nValoare energetica: 212.49 KCal /889.05 Kj , Grasimi: 9.89 g, Acizi grasi saturati: 3.09 g, Glucide: 17.34 g, Zaharuri: 0.89 g, Proteine: 13.08 g, Sare: 2.22 g\r\n\r\nAlergeni: Soia, Lapte, Gluten, Oua\r\n\r\nPoate contine urme de: Mustar, Oua, Telina, Gluten', 'Ingrediente: file de păstrăv, cartofi prăjiți, salată, lămâie', 'file-de-pastrav.jpg'),
(15, 'Pizza prosciuto e funghi', 15, 32, 410, '', 'Ingrediente: aluat, sos de roșii, mozzarella, ciuperci, șuncă', 'pizza-cu-ciuperci.jpg'),
(16, 'Pizza cu spanac', 15, 33, 410, '', 'Ingrediente: aluat, sos de roșii, mozzarella, spanac, șuncă, salam', 'pizza-cu-spanac.jpg'),
(19, 'Pizza Hayak', 15, 32, 430, '', 'Ingrediente: aluat, sos de roșii, ardei, mozarella, piept de pui, roșii, măsline', 'pizza-cu-ardei.jpg'),
(20, 'Pizza cu bacon', 15, 32, 430, '', 'Ingrediente: aluat, sos de roșii, mozarella, șuncă, salam, ceapă, bacon', 'pizza-prosciuto.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'rita', 'rita.takacs@yahoo.ro', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `product_id` (`product_id`,`order_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
