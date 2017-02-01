-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25-Set-2016 às 03:11
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e8estrategia`
--

-- --------------------------------------------------------

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `age`, `insurance`) VALUES
(1, 'Jurgen Fink', 'jurgenfink@infojr.com.br', 19, false),
(2, 'User', 'user@infojr.com', 25, true),
(3, 'Guest', 'guest@infojr.com', 84, true);

--
-- Extraindo dados da tabela `active_principle`
--

INSERT INTO `active_principle` (`id`, `name`) VALUES
(1, 'Methanphetamine'),
(2, 'Acephate'),
(3, 'Bacillus thuringiensis'),
(4, 'Bendiocarb'),
(5, 'Bifenthrin'),
(6, 'Boric Acid'),
(7, 'Capsaicin');

--
-- Extraindo dados da tabela `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `generic`, `active_principle_id`) VALUES
(1, 'Crystal Meth', 1, 1),
(2, 'Rivotril', 0, 4),
(3, 'Ritalina', 0, 7),
(4, 'Dramina', 1, 4),
(5, 'Aspirina', 1, 6),
(6, 'Dipirona', 0, 2),
(7, 'Vergonha na Cara', 0, 1),
(8, 'Medicilina', 1, 3),
(9, 'Merlinina', 1, 5),
(10, 'Donaltrumpina', 0, 7);

--
-- Extraindo dados da tabela `user_needs_medicine`
--

INSERT INTO `user_needs_medicine` (`users_id`, `medicines_id`) VALUES
(1, 1),
(1, 5),
(1, 7),
(1, 10),
(2, 2),
(2, 8),
(2, 9),
(3, 3),
(3, 4),
(3, 6);
--
-- Indexes for dumped tables
--

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `active_principle`
--
ALTER TABLE `active_principle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;