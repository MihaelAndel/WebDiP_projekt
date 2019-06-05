-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 05, 2019 at 10:42 PM
-- Server version: 5.5.62-0+deb8u1
-- PHP Version: 7.2.17-1+0~20190412070953.20+jessie~1.gbp23a36d

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WebDiP2018x003`
--

-- --------------------------------------------------------

--
-- Table structure for table `iznajmljena_oprema`
--

CREATE TABLE `iznajmljena_oprema` (
  `oprema_id` int(11) NOT NULL,
  `zahtjev_za_najam_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `iznajmljena_oprema`
--

INSERT INTO `iznajmljena_oprema` (`oprema_id`, `zahtjev_za_najam_id`) VALUES
(1, 1),
(3, 1),
(9, 2),
(5, 16),
(1, 16),
(6, 17),
(3, 17),
(5, 17),
(3, 18),
(5, 18),
(1, 19),
(5, 19),
(1, 20),
(9, 20),
(20, 21),
(21, 21),
(23, 21),
(16, 21),
(18, 21),
(1, 21),
(5, 21),
(9, 21),
(24, 22),
(26, 22),
(50, 22),
(52, 22),
(1, 22),
(5, 22),
(9, 22),
(25, 23),
(27, 23),
(13, 23),
(15, 23),
(20, 23),
(21, 23),
(23, 23),
(16, 23),
(4, 24),
(41, 24),
(42, 24),
(44, 24),
(20, 24),
(23, 24),
(50, 24),
(16, 24),
(18, 24),
(38, 25),
(39, 25),
(43, 25),
(14, 25),
(26, 25),
(27, 25),
(13, 25),
(15, 25),
(18, 25),
(22, 26),
(51, 26),
(21, 26),
(2, 27),
(20, 27),
(21, 27),
(23, 27),
(3, 27),
(5, 27),
(9, 27),
(21, 28),
(23, 28),
(24, 28),
(27, 28),
(50, 28),
(25, 29),
(26, 29),
(2, 29),
(51, 29),
(1, 29),
(5, 29),
(6, 29),
(9, 29),
(20, 30),
(21, 30),
(22, 30),
(23, 30),
(51, 30),
(52, 30),
(5, 30),
(9, 30),
(17, 31),
(19, 31),
(29, 31),
(30, 31),
(31, 31),
(32, 31),
(33, 31),
(14, 31),
(16, 31),
(18, 31),
(34, 32),
(35, 32),
(36, 32),
(16, 32),
(17, 32),
(18, 32),
(30, 32),
(31, 32),
(33, 32),
(19, 33),
(31, 33),
(32, 33),
(33, 33),
(34, 33),
(36, 33);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id_korisnik` int(11) NOT NULL,
  `uloga_id` int(11) NOT NULL DEFAULT '3',
  `ime` varchar(45) COLLATE latin2_croatian_ci NOT NULL,
  `prezime` varchar(45) COLLATE latin2_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(45) COLLATE latin2_croatian_ci NOT NULL,
  `lozinka` varchar(45) COLLATE latin2_croatian_ci NOT NULL,
  `lozinka_kriptirano` varchar(255) COLLATE latin2_croatian_ci DEFAULT NULL,
  `email` varchar(45) COLLATE latin2_croatian_ci NOT NULL,
  `datum_vrijeme_uvjeta` datetime DEFAULT NULL,
  `blokiran` tinyint(4) NOT NULL DEFAULT '0',
  `kljuc_lozinka` varchar(255) COLLATE latin2_croatian_ci DEFAULT NULL,
  `datum_kljuc` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnik`, `uloga_id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `lozinka_kriptirano`, `email`, `datum_vrijeme_uvjeta`, `blokiran`, `kljuc_lozinka`, `datum_kljuc`) VALUES
(1, 1, 'Mihael', 'Anđel', 'mandel', 'lozinka1', NULL, 'mandel@foi.hr', NULL, 0, 'dzJwtDuOXM', '2019-06-03 21:23:09'),
(2, 2, 'Kristina', 'Muhek', 'kmuhek', 'lozinka2', NULL, 'kmuhek@foi.hr', NULL, 0, NULL, NULL),
(3, 2, 'David', 'Koprek', 'dkoprek', 'lozinka3', NULL, 'dkoprek@foi.hr', NULL, 0, NULL, NULL),
(4, 2, 'Kristijan', 'Boban', 'kboban', 'lozinka4', NULL, 'kboban@foi.hr', NULL, 0, NULL, NULL),
(5, 2, 'Marko', 'Marković', 'mmarko', 'lozinka5', NULL, 'mmarkovic@yahoo.com', NULL, 0, NULL, NULL),
(6, 2, 'Mirko', 'Mirkovic', 'mirko_mirkan', 'potpunoneprobojnalozinka', NULL, 'mirkan21@gmail.com', NULL, 0, NULL, NULL),
(7, 2, 'Marija', 'Marjanović', 'xxmarijaxx', 'mojalozinka', NULL, 'marijaaa34@hotmail.com', NULL, 0, NULL, NULL),
(8, 2, 'Barbara', 'Vjerković', 'vjerkica', 'barbavjera', NULL, 'barbica_vjerkovic@yahoo.com', NULL, 0, NULL, NULL),
(9, 2, 'Ivan', 'Ivković', 'ivkoIvan', 'najboljasifraikad', NULL, 'ivkovic2546@gmail.com', NULL, 0, NULL, NULL),
(10, 2, 'Anja', 'Horvat', 'anjkaHorvat', '120596', NULL, 'anja.horvat@gmail.com', NULL, 0, NULL, NULL),
(11, 3, 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', NULL, 0, NULL, NULL),
(12, 3, 'Test', 'Test', '123123', '123123', '0ff69452aedc365123aad68c7f588029', 'test@test.tset', NULL, 0, NULL, NULL),
(13, 3, 'Mario', 'Super', 'super_mario', 'lozinka', '03821a3d2da5ee7220e82cf036b618d9', 'andel.mihael@gmail.com', NULL, 0, 'divuBbY5aT', '2019-06-03 21:27:14'),
(14, 3, 'Test', 'Email', 'testEmail', '123123', '0ff69452aedc365123aad68c7f588029', 'andel.mihael@gmail.com', NULL, 0, NULL, NULL),
(15, 3, 'TestTest', 'Testi', 'testy', '123123', '0ff69452aedc365123aad68c7f588029', 'andel.mihael@gmail.com', NULL, 0, NULL, NULL),
(16, 3, 'Kristina', 'Muhek', 'Kikica', 'halo123', '127cb8448d7f67d2fb5e67cd843425cb', 'kristina.muhek@gmail.com', NULL, 0, NULL, NULL),
(17, 3, 'Danica', 'Zvjezdica', 'danci', 'lozinka123', 'df5e8c760f430ff37c1384098bd7e806', 'danica.danic@gmail.com', NULL, 0, NULL, NULL),
(18, 3, 'Zvjezdana', 'Galicek', 'galc', 'lozinka123', 'df5e8c760f430ff37c1384098bd7e806', 'galic.zvjezda@gmail.com', NULL, 0, NULL, NULL),
(19, 3, 'Bojan', 'Bogdanović', 'bogdos', 'lozinka', '8aa87050051efe26091a13dbfdf901c6', 'bogdan21@yahoo.com', NULL, 0, NULL, NULL),
(20, 3, 'Kristina', 'Blagec', 'asdasdasdasdas', 'lozinka', '8aa87050051efe26091a13dbfdf901c6', 'blag.kris@gmail.com', NULL, 0, NULL, NULL),
(21, 3, 'Mihajlo', 'Mihajlović', 'mihaelko', 'asdasd', 'a8f5f167f44f4964e6c998dee827110c', 'andelmihael@yahoo.com', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `koristena_u_slikanju`
--

CREATE TABLE `koristena_u_slikanju` (
  `oprema_id_oprema` int(11) NOT NULL,
  `slika_id_slika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `koristena_u_slikanju`
--

INSERT INTO `koristena_u_slikanju` (`oprema_id_oprema`, `slika_id_slika`) VALUES
(1, 1),
(2, 2),
(3, 1),
(4, 3),
(5, 3),
(6, 2),
(7, 1),
(8, 8),
(8, 1),
(9, 9),
(9, 2),
(11, 3),
(3, 21),
(4, 21),
(1, 22),
(2, 22),
(4, 22),
(20, 22),
(22, 22),
(33, 22),
(34, 22),
(35, 22),
(50, 22),
(52, 22),
(60, 22),
(65, 22),
(68, 22),
(77, 22),
(79, 22),
(30, 23),
(32, 23),
(33, 23),
(51, 23),
(52, 23),
(1, 24),
(4, 24),
(20, 24),
(21, 24),
(23, 24),
(41, 24),
(42, 24),
(44, 24),
(57, 24),
(59, 24),
(61, 24),
(1, 25),
(3, 25),
(16, 25),
(18, 25),
(19, 25),
(33, 25),
(35, 25),
(45, 25),
(46, 25),
(48, 25),
(62, 25),
(64, 25),
(2, 26),
(19, 26),
(21, 26),
(27, 26),
(28, 26),
(29, 26),
(32, 26),
(33, 26),
(35, 26),
(36, 26),
(40, 26),
(41, 26),
(44, 26),
(45, 26),
(47, 26),
(49, 26),
(56, 26),
(58, 26),
(59, 26),
(60, 26),
(65, 26),
(66, 26),
(68, 26),
(75, 26),
(76, 26),
(77, 26),
(1, 27),
(3, 27),
(4, 27),
(11, 27),
(14, 27),
(19, 27),
(21, 27),
(24, 27),
(25, 27),
(26, 27),
(30, 27),
(2, 28),
(4, 28),
(11, 28),
(15, 28),
(24, 28),
(26, 28),
(27, 28),
(30, 28),
(32, 28),
(39, 28),
(40, 28),
(41, 28),
(44, 28),
(45, 28),
(51, 28),
(52, 28),
(53, 28),
(55, 28),
(56, 28),
(57, 28),
(67, 28),
(68, 28),
(69, 28),
(67, 29),
(68, 29),
(69, 29),
(70, 29),
(71, 29),
(72, 29),
(76, 29),
(77, 29),
(78, 29),
(79, 29),
(27, 30),
(28, 30),
(29, 30),
(30, 30),
(48, 30),
(49, 30),
(50, 30),
(51, 30),
(52, 30),
(53, 30),
(60, 30),
(61, 30),
(62, 30),
(63, 30),
(76, 30),
(77, 30),
(78, 30),
(79, 30);

-- --------------------------------------------------------

--
-- Table structure for table `lokacija`
--

CREATE TABLE `lokacija` (
  `id_lokacija` int(11) NOT NULL,
  `naziv` varchar(45) COLLATE latin2_croatian_ci NOT NULL,
  `zupanija` varchar(45) COLLATE latin2_croatian_ci NOT NULL,
  `regija` varchar(45) COLLATE latin2_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `lokacija`
--

INSERT INTO `lokacija` (`id_lokacija`, `naziv`, `zupanija`, `regija`) VALUES
(1, 'Varaždin', 'Varaždinska', 'sjever'),
(2, 'Čakovec', 'Međmurska', 'sjever'),
(3, 'Ivanec', 'Varaždinska', 'sjever'),
(4, 'Lepoglava', 'Varaždinska', 'sjever'),
(5, 'Marija Bistrica', 'Krapinsko-zagorska', 'sjever'),
(6, 'Virovitica', 'Virovitičko-podravska', 'sjever'),
(7, 'Zagreb', 'Grad Zagreb', 'sjever'),
(8, 'Osijek', 'Osječko-baranjska', 'istok'),
(9, 'Pula', 'Istarska', 'zapad'),
(10, 'Zadar', 'Zadarska', 'jug'),
(11, 'Vukovar', 'Vukovarsko-Srijemska', 'Istok'),
(12, 'Bjelovar', 'Bjelovarsko-bilogorska', 'sjever'),
(13, 'Rijeka', 'Primorsko-goranska', 'zapad'),
(14, 'Dubrovnik', 'Dubrovačko-neretvanska', 'jug'),
(15, 'Samobor', 'Zagrebačka', 'sjever'),
(16, 'Karlovac', 'Karlovačka', 'sjever');

-- --------------------------------------------------------

--
-- Table structure for table `moderator_lokacija`
--

CREATE TABLE `moderator_lokacija` (
  `korisnik_id_korisnik` int(11) NOT NULL,
  `lokacija_id_lokacija` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `moderator_lokacija`
--

INSERT INTO `moderator_lokacija` (`korisnik_id_korisnik`, `lokacija_id_lokacija`) VALUES
(2, 1),
(3, 2),
(3, 4),
(2, 2),
(3, 1),
(2, 3),
(2, 4),
(5, 5),
(5, 9),
(5, 10),
(6, 10),
(6, 11),
(6, 6),
(4, 6),
(8, 8),
(8, 9),
(9, 12),
(9, 14),
(10, 16),
(7, 16),
(7, 13),
(7, 15),
(6, 15),
(2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `oprema`
--

CREATE TABLE `oprema` (
  `id_oprema` int(11) NOT NULL,
  `vrsta_opreme_id` int(11) NOT NULL,
  `lokacija_id` int(11) NOT NULL DEFAULT '1',
  `korisnik_id` int(11) DEFAULT NULL,
  `naziv` varchar(45) COLLATE latin2_croatian_ci NOT NULL,
  `najamna_cijena` varchar(45) COLLATE latin2_croatian_ci NOT NULL,
  `nabavna_cijena` varchar(45) COLLATE latin2_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `oprema`
--

INSERT INTO `oprema` (`id_oprema`, `vrsta_opreme_id`, `lokacija_id`, `korisnik_id`, `naziv`, `najamna_cijena`, `nabavna_cijena`) VALUES
(1, 1, 1, NULL, 'canon ef-s 24mm', '400kn', '1500kn'),
(2, 1, 4, NULL, 'canon ef 50 mm', '600kn', '2500kn'),
(3, 1, 1, NULL, 'canon ef 100mm f/2.8', '1000kn', '7000kn'),
(4, 2, 3, NULL, 'nikon d5300', '730kn', '4000kn'),
(5, 2, 1, NULL, 'canon eos 2000d', '450kn', '3500kn'),
(6, 3, 1, NULL, 'canon xa11', '1500kn', '9500kn'),
(7, 3, 7, NULL, 'canon eos c200', '5000kn', '55000kn'),
(8, 6, 6, NULL, 'fujufilm ef-42 ttl', '100kn', '1500kn'),
(9, 6, 1, NULL, 'fujifilm ef-x500 ttl', '400kn', '4500kn'),
(11, 6, 8, NULL, 'canon speedlite 770ex', '120kn', '1500kn'),
(13, 8, 12, NULL, 'Sony xa-32fv', '100kn', '500kn'),
(14, 7, 12, NULL, 'Sony we-w22h', '100kn', '500kn'),
(15, 2, 12, NULL, 'Kodak 23s-wqi', '750kn', '8000kn'),
(16, 2, 12, NULL, 'Kodak 66-9fg', '600kn', '7000kn'),
(17, 9, 12, NULL, 'Canon flt-21', '50kn', '300kn'),
(18, 10, 12, NULL, 'Canon rm-12asd', '50kn', '250kn'),
(19, 1, 12, NULL, 'Sony object1', '50kn', '250kn'),
(20, 1, 2, NULL, 'Canon  44-21-we', '455kn', '4250kn'),
(21, 2, 2, NULL, 'Canon  87jj7h', '500kn', '8000kn'),
(22, 2, 2, NULL, 'Canon  787-8po', '550kn', '9000kn'),
(23, 2, 2, NULL, 'Sony 23gg-w', '452kn', '7500kn'),
(24, 6, 2, NULL, 'Sony 88-bljsk', '100kn', '750kn'),
(25, 6, 2, NULL, 'Sony 7-bljsk', '75kn', '700kn'),
(26, 7, 2, NULL, 'Sony stlk-22', '125kn', '1000kn'),
(27, 7, 2, NULL, 'Sony stlk-33', '200kn', '1250kn'),
(28, 1, 14, NULL, 'Kodak obj22-22', '500kn', '6250kn'),
(29, 1, 14, NULL, 'Kodak obj11-21', '500kn', '6250kn'),
(30, 2, 14, NULL, 'Sony d2l3-2', '625kn', '7250kn'),
(31, 3, 14, NULL, 'Canon kmr-231', '1000kn', '12000kn'),
(32, 3, 14, NULL, 'Canon kmr-351', '1300kn', '15000kn'),
(33, 4, 14, NULL, 'Canon st4l4k-12', '50kn', '650kn'),
(34, 4, 14, NULL, 'Canon st4l4k-13', '80kn', '800kn'),
(35, 5, 14, NULL, 'Canon st4b1l-120', '250kn', '2000kn'),
(36, 5, 14, NULL, 'Canon st4b1l-140', '400kn', '3200kn'),
(37, 10, 14, NULL, 'Kodak d4lj-88', '55kn', '450kn'),
(38, 2, 3, NULL, 'Kodak d2l3-123', '700kn', '7850kn'),
(39, 2, 3, NULL, 'Sony 223ds', '785kn', '8800kn'),
(40, 3, 3, NULL, 'Canon beta-77', '1200kn', '11000kn'),
(41, 4, 3, NULL, 'Canon beta-stlk', '200kn', '1500kn'),
(42, 5, 3, NULL, 'Canon beta-stbl', '420kn', '2630kn'),
(43, 7, 3, NULL, 'Canon 58-gamma', '250kn', '2000kn'),
(44, 9, 3, NULL, 'Kodak infra-22', '45kn', '300kn'),
(45, 9, 16, NULL, 'Kodak su-infra-25', '80kn', '400kn'),
(46, 10, 16, NULL, 'Sony dljn-212', '40kn', '280kn'),
(47, 2, 16, NULL, 'Canon 22-f.21', '900kn', '8000kn'),
(48, 2, 16, NULL, 'Canon 32-f.25', '1000kn', '9500kn'),
(49, 6, 16, NULL, 'Sony 43-beta-bljsk', '125kn', '750kn'),
(50, 1, 4, NULL, 'Canon obj-24-f.21', '500kn', '4500kn'),
(51, 2, 4, NULL, 'Canon f.21-super', '790kn', '8620kn'),
(52, 6, 4, NULL, 'Canon f.21-bljsk', '145kn', '750kn'),
(53, 2, 5, NULL, 'Kodak 78/f21-8', '1254kn', '7845kn'),
(54, 2, 5, NULL, 'Sony ff78ww', '1254kn', '7845kn'),
(55, 7, 5, NULL, 'Sony adj23-25', '48kn', '445kn'),
(56, 6, 5, NULL, 'Canon 16-125fgh', '145kn', '756kn'),
(57, 8, 5, NULL, 'Canon 1721-2d', '235kn', '1458kn'),
(58, 2, 8, NULL, 'FujiFilm f/21-er', '1256kn', '7896kn'),
(59, 2, 8, NULL, 'FujiFilm f/61-er', '3526kn', '15896kn'),
(60, 6, 8, NULL, 'Kodak lensuz-22', '140kn', '635kn'),
(61, 1, 9, NULL, 'FujiFilm 45f-23g', '890kn', '3650kn'),
(62, 2, 9, NULL, 'FujiFilm 23gpp', '1320kn', '7458kn'),
(63, 2, 9, NULL, 'Sony ag-23p', '1320kn', '7458kn'),
(64, 2, 13, NULL, 'Polaroid 24-12.g', '1200kn', '8500kn'),
(65, 2, 13, NULL, 'Polaroid 98pplk', '1250kn', '9632kn'),
(66, 7, 13, NULL, 'FujiFilm 32kj', '2000kn', '10020kn'),
(67, 10, 15, NULL, 'Sony dljn-23gh', '50kn', '423kn'),
(68, 2, 15, NULL, 'Sony 23gh-f/21', '600kn', '4230kn'),
(69, 6, 15, NULL, 'Sony 23gh-f/21-light', '150kn', '700kn'),
(70, 3, 6, NULL, 'Kodak 78hhg5', '1000kn', '7500kn'),
(71, 5, 6, NULL, 'Kodak stabil-88', '500kn', '2500kn'),
(72, 1, 11, NULL, 'FujiFilm obj8-98', '500kn', '5400kn'),
(73, 1, 11, NULL, 'FujiFilm obj12-98', '650kn', '7500kn'),
(74, 3, 11, NULL, 'Sony 98kj-we', '2300kn', '12500kn'),
(75, 3, 10, NULL, 'Kodak  96gz3', '3000kn', '13000kn'),
(76, 3, 10, NULL, 'Kodak 885-96', '3000kn', '13000kn'),
(77, 2, 10, NULL, 'Canon ds34-2c', '1000kn', '7900kn'),
(78, 6, 7, NULL, 'Sony blj-85g-2', '130kn', '960kn'),
(79, 2, 7, NULL, 'FujiFilm 8fg55', '1300kn', '9600kn');

-- --------------------------------------------------------

--
-- Table structure for table `slika`
--

CREATE TABLE `slika` (
  `id_slika` int(11) NOT NULL,
  `zahtjev_za_uslugu_id` int(11) NOT NULL,
  `putanja` varchar(255) COLLATE latin2_croatian_ci DEFAULT NULL,
  `korisnik_oznacen` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `slika`
--

INSERT INTO `slika` (`id_slika`, `zahtjev_za_uslugu_id`, `putanja`, `korisnik_oznacen`) VALUES
(1, 1, '22test.jpg\r\n', 1),
(2, 3, NULL, 0),
(3, 4, NULL, 0),
(4, 5, NULL, 0),
(5, 6, NULL, 0),
(6, 7, NULL, 0),
(7, 8, NULL, 1),
(8, 9, NULL, 1),
(9, 10, NULL, 0),
(10, 11, NULL, 0),
(11, 18, NULL, 1),
(12, 19, NULL, 1),
(13, 20, NULL, 1),
(19, 7, '58test.jpg', 1),
(21, 1, '45test.jpg', 1),
(22, 26, '14a-really-cute-red-panda.jpeg', 0),
(23, 9, '99a-really-cute-red-panda.jpeg', 0),
(24, 24, '5405-baby-seal.w700.h700.jpg', 1),
(25, 4, '38cute-puppy-pictures-science-why-adorable-puppies-1355345.jpg', 0),
(26, 12, '34why-do-i-want-to-crush-cute-animals-1432782372.webp', 0),
(27, 41, '36unleashed-pom-mixes.jpg', 1),
(28, 23, '80siberian-husky-two-puppies.jpg', 1),
(29, 29, '70landscape-1519416338-chihuahua.jpg', 1),
(30, 30, '25landscape-1500925839-golden-retriever-puppy.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id_uloga` int(11) NOT NULL,
  `naziv` varchar(45) COLLATE latin2_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id_uloga`, `naziv`) VALUES
(1, 'administrator'),
(2, 'moderator'),
(3, 'registrirani korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `vrsta_opreme`
--

CREATE TABLE `vrsta_opreme` (
  `id_vrsta_opreme` int(11) NOT NULL,
  `naziv_vrste` varchar(45) COLLATE latin2_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `vrsta_opreme`
--

INSERT INTO `vrsta_opreme` (`id_vrsta_opreme`, `naziv_vrste`) VALUES
(1, 'objektiv'),
(2, 'DSLR fotoaparat'),
(3, 'kamera'),
(4, 'stalak za kameru'),
(5, 'stabilizator za kameru'),
(6, 'bljeskalica'),
(7, 'stalak za fotoaparat'),
(8, 'rasvjeta'),
(9, 'filtar'),
(10, 'daljinski upravljač');

-- --------------------------------------------------------

--
-- Table structure for table `zahtjev_za_najam`
--

CREATE TABLE `zahtjev_za_najam` (
  `id_zahtjev_za_najam` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `pocetak_najma` date NOT NULL,
  `kraj_najma` date NOT NULL,
  `odobren` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `zahtjev_za_najam`
--

INSERT INTO `zahtjev_za_najam` (`id_zahtjev_za_najam`, `korisnik_id`, `pocetak_najma`, `kraj_najma`, `odobren`) VALUES
(1, 2, '2019-05-29', '2019-06-03', 1),
(2, 2, '2019-05-07', '2019-05-14', 1),
(3, 2, '2019-06-12', '2019-06-14', 1),
(4, 2, '0000-00-00', '2019-06-14', 0),
(5, 2, '0000-00-00', '2019-06-27', NULL),
(10, 2, '0000-00-00', '2019-06-27', 0),
(12, 2, '2019-06-25', '2019-06-27', NULL),
(13, 2, '2019-06-17', '2019-06-19', NULL),
(14, 2, '2019-06-17', '2019-06-26', NULL),
(15, 2, '2019-05-29', '2019-05-31', NULL),
(16, 2, '2019-07-08', '2019-07-10', 1),
(17, 2, '2019-06-10', '2019-06-12', NULL),
(18, 2, '2019-07-15', '2019-07-17', NULL),
(19, 2, '2019-05-28', '2019-05-30', NULL),
(20, 2, '2019-06-12', '2019-06-16', NULL),
(21, 2, '2019-06-12', '2019-06-14', NULL),
(22, 2, '2019-06-10', '2019-06-12', NULL),
(23, 2, '2019-06-18', '2019-06-30', NULL),
(24, 2, '2019-06-28', '2019-06-30', NULL),
(25, 2, '2019-07-02', '2019-07-05', NULL),
(26, 3, '2019-06-11', '2019-06-13', NULL),
(27, 3, '2019-08-05', '2019-08-07', NULL),
(28, 3, '2019-06-13', '2019-06-15', NULL),
(29, 3, '2019-07-15', '2019-07-17', NULL),
(30, 3, '2019-06-24', '2019-06-26', NULL),
(31, 9, '2019-06-12', '2019-06-14', NULL),
(32, 9, '2019-06-26', '2019-06-28', NULL),
(33, 9, '2019-06-23', '2019-06-24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zahtjev_za_uslugu`
--

CREATE TABLE `zahtjev_za_uslugu` (
  `id_zahtjev_za_uslugu` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `lokacija_id` int(11) NOT NULL,
  `opis_slike` varchar(255) COLLATE latin2_croatian_ci NOT NULL,
  `odobrava_oznacavanje` tinyint(4) NOT NULL,
  `odobrava_marketing` tinyint(4) NOT NULL,
  `odobren` tinyint(4) DEFAULT NULL,
  `datum_odobrenja_odbijanja` date DEFAULT NULL,
  `odraden` int(11) DEFAULT NULL,
  `postavljena_slika` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `zahtjev_za_uslugu`
--

INSERT INTO `zahtjev_za_uslugu` (`id_zahtjev_za_uslugu`, `korisnik_id`, `lokacija_id`, `opis_slike`, `odobrava_oznacavanje`, `odobrava_marketing`, `odobren`, `datum_odobrenja_odbijanja`, `odraden`, `postavljena_slika`) VALUES
(1, 5, 1, 'Želim slikanje iz aviona.', 1, 1, 1, '2019-05-30', 1, 1),
(2, 5, 1, 'Želim slikanje grada po noći.', 0, 0, 1, '2019-05-30', 1, NULL),
(3, 6, 1, 'Želim sliku urbane scene.', 0, 0, 1, '2019-06-03', 1, NULL),
(4, 6, 4, 'Samo želim neku lijepu sliku.', 0, 1, 1, '2019-06-05', 1, 1),
(5, 7, 2, 'Želim sliku centra grada iz zraka.', 1, 0, 1, '2019-06-05', 1, NULL),
(6, 7, 4, 'Slika mene ispred jezera.', 1, 0, 1, '2019-06-05', 1, NULL),
(7, 8, 1, 'Želim sliku prirode i životinja.', 0, 1, 1, '2019-05-30', 1, 1),
(8, 8, 1, 'Želim slikanje iz zraka.', 1, 1, 0, '2019-06-03', NULL, NULL),
(9, 9, 1, 'Privatno slikanje u prirodi.', 1, 1, 1, '2019-05-30', 1, 1),
(10, 9, 1, 'Slikanje grada po noći.', 0, 1, 0, '2019-06-03', NULL, NULL),
(11, 10, 2, 'Želim slikanje starog grada.', 0, 0, 1, '2019-06-05', 1, NULL),
(12, 10, 4, 'Želim slikanje prirode.', 0, 1, 1, '2019-06-05', 1, 1),
(17, 13, 2, 'Test', 1, 0, 0, '2019-06-05', NULL, NULL),
(18, 1, 1, 'Test2', 1, 1, 1, '2019-06-03', NULL, NULL),
(19, 1, 1, 'Test3', 0, 1, 1, '2019-05-30', NULL, NULL),
(20, 1, 1, 'Testiranje.', 1, 0, 1, '2019-05-30', 1, NULL),
(21, 16, 5, 'Bistrica je grad.', 1, 1, 1, '2019-06-04', 1, NULL),
(22, 1, 3, 'asd123', 1, 1, NULL, NULL, NULL, NULL),
(23, 19, 12, 'Slatka slika.', 1, 1, 1, '2019-06-05', 1, 1),
(24, 19, 12, 'Slatka slika, ali još ljepša.', 1, 1, 1, '2019-06-05', 1, 1),
(25, 19, 2, 'Neka malo ozbiljnija.', 1, 1, 1, '2019-06-05', 1, NULL),
(26, 19, 2, 'Neka još malo ozbiljnija.', 1, 1, 1, '2019-06-05', 1, 1),
(27, 19, 3, 'Neka da bude onako Ivanečka.', 1, 1, NULL, NULL, NULL, NULL),
(28, 19, 3, 'Neka da bude onako malo manje Ivanečka.', 1, 1, 0, '2019-06-05', NULL, NULL),
(29, 18, 14, 'Neke životinje.', 1, 1, 1, '2019-06-05', 1, 1),
(30, 18, 14, 'Još više životinja.', 1, 1, 1, '2019-06-05', 1, 1),
(31, 18, 16, 'Neka lijepa životinja.', 1, 1, NULL, NULL, NULL, NULL),
(32, 18, 5, 'Neka još ljepša životinja.', 1, 1, NULL, NULL, NULL, NULL),
(33, 18, 13, 'Lijepa slika iz grada.', 1, 1, NULL, NULL, NULL, NULL),
(34, 18, 13, 'Lijepa slika iz sela.', 1, 1, NULL, NULL, NULL, NULL),
(35, 18, 6, 'Lijepa slika iz centra sela.', 1, 1, NULL, NULL, NULL, NULL),
(36, 18, 6, 'Lijepa slika iz centra grada.', 1, 1, NULL, NULL, NULL, NULL),
(37, 20, 7, 'Neka samo bude lijepa.', 1, 1, NULL, NULL, NULL, NULL),
(38, 20, 11, 'Neka samo bude lijepa.', 1, 1, NULL, NULL, NULL, NULL),
(39, 20, 10, 'Neka samo bude lijepa.', 1, 1, NULL, NULL, NULL, NULL),
(40, 20, 15, 'Neka samo bude lijepa.', 1, 1, NULL, NULL, NULL, NULL),
(41, 20, 4, 'Neka samo bude lijepa.', 1, 1, 1, '2019-06-05', 1, 1),
(42, 20, 16, 'Neka samo bude lijepa.', 1, 1, NULL, NULL, NULL, NULL),
(43, 20, 3, 'Neka samo bude lijepa.', 1, 1, NULL, NULL, NULL, NULL),
(44, 16, 5, 'Slika moje rodne kuće.', 1, 1, NULL, NULL, NULL, NULL),
(45, 16, 8, 'Slika rodne kuće moje prijateljice.', 1, 1, NULL, NULL, NULL, NULL),
(46, 16, 16, 'Slika rodne kuće moje prijateljice.', 1, 1, NULL, NULL, NULL, NULL),
(47, 16, 9, 'Slika rodne kuće moje prijateljice.', 1, 1, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iznajmljena_oprema`
--
ALTER TABLE `iznajmljena_oprema`
  ADD KEY `fk_oprema_has_zahtjev_za_najam_zahtjev_za_najam1_idx` (`zahtjev_za_najam_id`),
  ADD KEY `fk_oprema_has_zahtjev_za_najam_oprema1_idx` (`oprema_id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD KEY `fk_korisnik_uloga_idx` (`uloga_id`);

--
-- Indexes for table `koristena_u_slikanju`
--
ALTER TABLE `koristena_u_slikanju`
  ADD KEY `fk_koristena_u_slikanju_oprema1_idx` (`oprema_id_oprema`),
  ADD KEY `fk_koristena_u_slikanju_slika1_idx` (`slika_id_slika`);

--
-- Indexes for table `lokacija`
--
ALTER TABLE `lokacija`
  ADD PRIMARY KEY (`id_lokacija`);

--
-- Indexes for table `moderator_lokacija`
--
ALTER TABLE `moderator_lokacija`
  ADD KEY `fk_korisnik_has_lokacija_lokacija1_idx` (`lokacija_id_lokacija`),
  ADD KEY `fk_korisnik_has_lokacija_korisnik1_idx` (`korisnik_id_korisnik`);

--
-- Indexes for table `oprema`
--
ALTER TABLE `oprema`
  ADD PRIMARY KEY (`id_oprema`),
  ADD KEY `fk_oprema_vrsta_opreme1_idx` (`vrsta_opreme_id`),
  ADD KEY `fk_oprema_korisnik1_idx` (`korisnik_id`),
  ADD KEY `fk_oprema_lokacija1_idx` (`lokacija_id`);

--
-- Indexes for table `slika`
--
ALTER TABLE `slika`
  ADD PRIMARY KEY (`id_slika`),
  ADD KEY `fk_slika_zahtjev_za_uslugu1_idx` (`zahtjev_za_uslugu_id`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id_uloga`);

--
-- Indexes for table `vrsta_opreme`
--
ALTER TABLE `vrsta_opreme`
  ADD PRIMARY KEY (`id_vrsta_opreme`);

--
-- Indexes for table `zahtjev_za_najam`
--
ALTER TABLE `zahtjev_za_najam`
  ADD PRIMARY KEY (`id_zahtjev_za_najam`),
  ADD KEY `fk_zahtjev_za_najam_korisnik1_idx` (`korisnik_id`);

--
-- Indexes for table `zahtjev_za_uslugu`
--
ALTER TABLE `zahtjev_za_uslugu`
  ADD PRIMARY KEY (`id_zahtjev_za_uslugu`),
  ADD KEY `fk_zahtjev_za_uslugu_korisnik1_idx` (`korisnik_id`),
  ADD KEY `fk_zahtjev_za_uslugu_lokacija1_idx` (`lokacija_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id_korisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `lokacija`
--
ALTER TABLE `lokacija`
  MODIFY `id_lokacija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `oprema`
--
ALTER TABLE `oprema`
  MODIFY `id_oprema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `slika`
--
ALTER TABLE `slika`
  MODIFY `id_slika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id_uloga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vrsta_opreme`
--
ALTER TABLE `vrsta_opreme`
  MODIFY `id_vrsta_opreme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `zahtjev_za_najam`
--
ALTER TABLE `zahtjev_za_najam`
  MODIFY `id_zahtjev_za_najam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `zahtjev_za_uslugu`
--
ALTER TABLE `zahtjev_za_uslugu`
  MODIFY `id_zahtjev_za_uslugu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `iznajmljena_oprema`
--
ALTER TABLE `iznajmljena_oprema`
  ADD CONSTRAINT `fk_oprema_has_zahtjev_za_najam_oprema1` FOREIGN KEY (`oprema_id`) REFERENCES `oprema` (`id_oprema`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_oprema_has_zahtjev_za_najam_zahtjev_za_najam1` FOREIGN KEY (`zahtjev_za_najam_id`) REFERENCES `zahtjev_za_najam` (`id_zahtjev_za_najam`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `fk_korisnik_uloga` FOREIGN KEY (`uloga_id`) REFERENCES `uloga` (`id_uloga`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `koristena_u_slikanju`
--
ALTER TABLE `koristena_u_slikanju`
  ADD CONSTRAINT `fk_koristena_u_slikanju_oprema1` FOREIGN KEY (`oprema_id_oprema`) REFERENCES `oprema` (`id_oprema`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_koristena_u_slikanju_slika1` FOREIGN KEY (`slika_id_slika`) REFERENCES `slika` (`id_slika`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `moderator_lokacija`
--
ALTER TABLE `moderator_lokacija`
  ADD CONSTRAINT `fk_korisnik_has_lokacija_korisnik1` FOREIGN KEY (`korisnik_id_korisnik`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_has_lokacija_lokacija1` FOREIGN KEY (`lokacija_id_lokacija`) REFERENCES `lokacija` (`id_lokacija`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `oprema`
--
ALTER TABLE `oprema`
  ADD CONSTRAINT `fk_oprema_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_oprema_lokacija1` FOREIGN KEY (`lokacija_id`) REFERENCES `lokacija` (`id_lokacija`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_oprema_vrsta_opreme1` FOREIGN KEY (`vrsta_opreme_id`) REFERENCES `vrsta_opreme` (`id_vrsta_opreme`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `slika`
--
ALTER TABLE `slika`
  ADD CONSTRAINT `fk_slika_zahtjev_za_uslugu1` FOREIGN KEY (`zahtjev_za_uslugu_id`) REFERENCES `zahtjev_za_uslugu` (`id_zahtjev_za_uslugu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `zahtjev_za_najam`
--
ALTER TABLE `zahtjev_za_najam`
  ADD CONSTRAINT `fk_zahtjev_za_najam_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `zahtjev_za_uslugu`
--
ALTER TABLE `zahtjev_za_uslugu`
  ADD CONSTRAINT `fk_zahtjev_za_uslugu_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_zahtjev_za_uslugu_lokacija1` FOREIGN KEY (`lokacija_id`) REFERENCES `lokacija` (`id_lokacija`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
