-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2019 at 08:17 PM
-- Server version: 1.0.35
-- PHP Version: 5.6.37-1~dotdeb+zts+7.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `taudau1`
--

-- --------------------------------------------------------

--
-- Table structure for table `barber`
--

CREATE TABLE IF NOT EXISTS `barber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `barber`
--

INSERT INTO `barber` (`id`, `name`) VALUES
(1, 'Jane'),
(2, 'Cathrin'),
(3, 'Gertruda'),
(4, 'Cyndie'),
(5, 'Buddy'),
(6, 'Hilton'),
(7, 'Doris'),
(8, 'Ulric'),
(9, 'Wallie'),
(10, 'Elna'),
(11, 'Dallas'),
(12, 'Constancia'),
(13, 'Drud'),
(14, 'Gianina'),
(15, 'Wang'),
(16, 'Antoine'),
(17, 'Aleta'),
(18, 'Vachel'),
(19, 'Guthry'),
(20, 'Andromache'),
(21, 'Stephana'),
(22, 'Had'),
(23, 'Felizio'),
(24, 'Sallyanne'),
(25, 'Arlen'),
(26, 'Raul'),
(27, 'Sile'),
(28, 'Henka'),
(29, 'Yasmeen'),
(30, 'Marge'),
(31, 'Millard'),
(32, 'Sher'),
(33, 'Melba'),
(34, 'Morgen'),
(35, 'Terri'),
(36, 'Dora'),
(37, 'Freddy'),
(38, 'Corbie'),
(39, 'Fredra'),
(40, 'Avivah'),
(41, 'Mariya'),
(42, 'Alberto'),
(43, 'August'),
(44, 'Pepe'),
(45, 'Maggi'),
(46, 'Rennie'),
(47, 'Yank'),
(48, 'Judd'),
(49, 'Camella'),
(50, 'Caprice');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `visit_count` int(11) NOT NULL,
  `barberid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `barberid` (`barberid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `surname`, `visit_count`, `barberid`) VALUES
(1, 'John', 'Smith', 7, 1),
(2, 'Mike', 'Smith', 2, 1),
(3, 'Silva', 'Broadist', 96, 3),
(4, 'Corilla', 'Wooton', 82, 4),
(5, 'Pepi', 'Jills', 4, 5),
(6, 'Shalne', 'Shelmerdine', 93, 6),
(7, 'Eden', 'Robroe', 69, 7),
(8, 'Hana', 'Cregan', 33, 8),
(9, 'Engelbert', 'Izzatt', 59, 9),
(10, 'Daisi', 'Hardwin', 38, 10),
(11, 'Franny', 'Abba', 71, 11),
(12, 'Arleyne', 'Sign', 16, 12),
(13, 'Robbyn', 'Cowdery', 7, 13),
(14, 'Cathryn', 'Jerrom', 99, 14),
(15, 'Boot', 'Trustie', 52, 15),
(16, 'Daryl', 'Emeny', 40, 16),
(17, 'Vikki', 'McGinlay', 99, 17),
(18, 'Aurelia', 'Cavanaugh', 56, 18),
(19, 'Cairistiona', 'Clemmey', 74, 19),
(20, 'Robinett', 'Beagles', 87, 20),
(21, 'Idaline', 'Warton', 95, 21),
(22, 'Lukas', 'De Bruin', 50, 22),
(23, 'Sherlock', 'Scudamore', 28, 23),
(24, 'Wynny', 'Philo', 50, 24),
(25, 'Kipp', 'Tonnesen', 39, 25),
(26, 'Allistir', 'Merrill', 60, 26),
(27, 'Mata', 'Maffin', 56, 27),
(28, 'Malorie', 'Overlow', 24, 28),
(29, 'Dane', 'Mandrier', 3, 29),
(30, 'Hulda', 'Gillinghams', 77, 30),
(31, 'Tracey', 'Tilliards', 55, 31),
(32, 'Gerrie', 'Grancher', 23, 32),
(33, 'Harmon', 'Cobbing', 36, 33),
(34, 'Wini', 'Adelberg', 77, 34),
(35, 'Cristy', 'Castagneto', 4, 35),
(36, 'Gris', 'Jowling', 49, 36),
(37, 'Abeu', 'Tomisch', 58, 37),
(38, 'Ettore', 'Elverston', 21, 38),
(39, 'Chickie', 'Borges', 23, 39),
(40, 'Dosi', 'Coggill', 81, 40),
(41, 'Ricky', 'Foxwell', 44, 41),
(42, 'Bibby', 'Stebles', 35, 42),
(43, 'Enrica', 'Mattiazzo', 79, 43),
(44, 'Colman', 'Ficken', 12, 44),
(45, 'Milzie', 'Freckleton', 90, 45),
(46, 'Mame', 'McMennum', 96, 46),
(47, 'Aldridge', 'Proback', 10, 47),
(48, 'Alden', 'Le Franc', 81, 48),
(49, 'Hale', 'Ellett', 10, 49),
(50, 'Eddy', 'Denne', 65, 50);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `hour` int(11) NOT NULL,
  `minute` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client` (`client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `date`, `hour`, `minute`, `client`) VALUES
(2, '2019-07-04', 17, 15, 2),
(3, '2018-09-03', 19, 15, 3),
(4, '2019-05-16', 10, 15, 4),
(5, '2018-08-12', 20, 15, 5),
(6, '2019-05-19', 17, 15, 6),
(7, '2019-02-21', 10, 0, 1),
(8, '2019-03-18', 12, 15, 8),
(9, '2018-08-01', 15, 15, 9),
(10, '2019-01-21', 17, 15, 10),
(11, '2019-03-11', 19, 15, 11),
(12, '2018-06-27', 14, 15, 12),
(13, '2019-04-12', 18, 15, 13),
(14, '2018-12-03', 18, 15, 14),
(15, '2018-07-31', 12, 15, 15),
(16, '2019-03-05', 13, 15, 16),
(17, '2018-10-11', 20, 15, 17),
(18, '2018-04-13', 15, 15, 18),
(19, '2018-12-04', 18, 15, 19),
(20, '2019-06-29', 19, 15, 20),
(21, '2018-06-24', 16, 15, 21),
(22, '2019-07-14', 17, 15, 22),
(23, '2018-05-18', 19, 15, 23),
(24, '2018-11-26', 15, 15, 24),
(25, '2018-11-29', 12, 15, 25),
(26, '2018-09-25', 13, 15, 26),
(27, '2018-10-11', 13, 15, 27),
(28, '2018-08-09', 17, 15, 28),
(29, '2019-08-10', 19, 15, 29),
(30, '2018-02-20', 20, 15, 30),
(31, '2018-10-24', 19, 15, 31),
(32, '2018-12-16', 18, 15, 32),
(33, '2018-07-24', 12, 15, 33),
(34, '2019-02-17', 14, 15, 34),
(35, '2019-01-05', 12, 15, 35),
(36, '2018-12-18', 12, 15, 36),
(37, '2018-11-04', 14, 15, 37),
(38, '2018-03-31', 12, 15, 38),
(39, '2018-03-20', 19, 15, 39),
(40, '2018-10-31', 11, 15, 40),
(41, '2019-04-28', 12, 15, 41),
(42, '2018-07-04', 13, 15, 42),
(43, '2019-01-19', 18, 15, 43),
(44, '2018-03-07', 11, 15, 44),
(45, '2019-06-11', 20, 15, 45),
(46, '2019-05-15', 20, 15, 46),
(47, '2019-01-14', 12, 15, 47),
(48, '2018-06-08', 10, 15, 48),
(49, '2018-06-22', 14, 15, 49),
(50, '2018-11-04', 11, 15, 50);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`barberid`) REFERENCES `barber` (`id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`client`) REFERENCES `client` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
