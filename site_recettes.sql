-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2022 at 06:36 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site_recettes`
--

-- --------------------------------------------------------

--
-- Table structure for table `recettes`
--

CREATE TABLE `recettes` (
  `recpe_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `recipe` text NOT NULL,
  `author` varchar(128) DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recettes`
--

INSERT INTO `recettes` (`recpe_id`, `title`, `recipe`, `author`, `is_enabled`) VALUES
(1, 'Cassoulet', 'Le cassoulet est une spécialité régionale du Languedoc, à base de haricots secs, généralement blancs, et de viande. À son origine, il était à base de fèves. Le cassoulet tient son nom de la cassole en terre cuite émaillée dite caçòla1 en occitan et fabriquée à Issel.\n', 'mickael.andrieu@exemple.com', 1),
(2, 'Couscous', 'Le couscous est d\'une part une semoule de blé dur préparée à l\'huile d\'olive (un des aliments de base traditionnel de la cuisine des pays du Maghreb) et d\'autre part, une spécialité culinaire issue de la cuisine berbère, à base de couscous, de légumes, d\'épices, d\'huile d\'olive et de viande (rouge ou de volaille) ou de poisson.', 'damirdine@exemple.com', 0),
(3, 'Salade Romaine', 'La salade César est une recette de cuisine de salade composée de la cuisine américaine, traditionnellement préparée en salle à côté de la table, à base de laitue romaine, œuf dur, croûtons, parmesan et de « sauce César » à base de parmesan râpé, huile d\'olive, pâte d\'anchois, ail, vinaigre de vin, moutarde, jaune d\'œuf et sauce Worcestershire.', 'laurene.castor@exemple.com', 0),
(4, 'Escalope milanaise', 'L\'escalope à la milanaise, ou escalope milanaise est une escalope panée, de viande de veau, traditionnellement prise dans le faux-filet. Historiquement, on la cuit avec du beurre. Elle est généralement servie avec salade ou frites, accompagnée de sauce mayonnaise. On peut y ajouter un filet de jus de citron.\n\nEn Italie, ce mets ne se sert pas avec des pâtes.', 'mathieu.nebra@exemple.com', 1),
(5, 'EFEFEF', 'FEFEF', 'mickael.andrieu@exemple.com', 1),
(6, 'EFEFEF', 'FEFEF', 'mickael.andrieu@exemple.com', 1),
(7, 'EFEFEF', 'FEFEF', 'mickael.andrieu@exemple.com', 1),
(8, 'EFEFEF', 'FEFEF', 'mickael.andrieu@exemple.com', 1),
(9, 'fefe', 'efe', 'mickael.andrieu@exemple.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(128) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `age`, `password`) VALUES
(1, 'Mickaël Andrieu', 'mickael.andrieu@exemple.com', 34, '12345'),
(2, 'Mathieu Nebra', 'mathieu.nebra@exemple.com', 34, '12345'),
(3, 'Laurène Castor', 'laurene.castor@exemple.com', 28, '12345'),
(4, 'Damiridne ALI SOILIHI', 'damirdine@exemple.com', 23, '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`recpe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `recpe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
