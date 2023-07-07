-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 01:10 PM
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
-- Database: `customer`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_summary` varchar(500) NOT NULL,
  `product_brand` varchar(200) NOT NULL,
  `product_cost_price` varchar(11) DEFAULT NULL,
  `product_selling_price` varchar(11) DEFAULT NULL,
  `product_marginal_price` int(11) DEFAULT NULL,
  `product_offer` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `product_image` varchar(255) NOT NULL,
  `product_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_summary`, `product_brand`, `product_cost_price`, `product_selling_price`, `product_marginal_price`, `product_offer`, `created_date`, `product_image`, `product_delete`) VALUES
(38, 'Men Regular Fit Printed Spread Collar Casual Shirt', '                    Special PriceGet at flat ₹289T&C  Bank OfferFlat ₹1,250 Off on HDFC Bank Credit Card EMI Trxns on orders priced between ₹15,000 to ₹39,999T&C  Bank OfferFlat ₹3,000 Off on HDFC Bank Credit Card EMI Trxns on orders priced between ₹40,000 to ₹49,999T&', 'pan america', '1000', '1849', 1627, 12, '2023-06-29 08:13:55', 'photo-1621072156002-e2fccdc0b1768.jpeg', 0),
(39, 'dadsfdsf', '   sdfdgtrrt', 'fffdsfsdfs', '800000', '90000000', 67500000, 25, '2023-06-30 11:45:47', 'acer-predator-helios3.jpg', 0),
(40, 'Dabur Viko Dantmanjan', '    super product', 'Dabur', '50', '150', 143, 5, '2023-07-04 09:23:13', 'download_(1)2.jpeg', 0),
(42, 'SAMSUNG 80 cm (32 Inch) HD Ready LED Smart Tizen T', 'Bank OfferFlat ₹1,250 Off on HDFC Bank Credit Card EMI Trxns on orders priced between ₹15,000 to ₹39,999T&C\r\n\r\nBank OfferGet additional ₹500 off on Debit/Credit Card and EMI TransactionsT&C\r\n\r\nBank OfferFlat ₹3,000 Off on HDFC Bank Credit Card EMI Trxns on orders priced between ₹40,000 to ₹49,999T&C\r\n\r\nFreebieGet ₹400 off on Times Prime 12 Months Membership worth ₹1199T&C', 'Samsung', '15000', '25000', 22500, 10, '2023-07-06 08:50:27', '71a4ZQNqTiL__AC_UF1000,1000_QL80_.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
