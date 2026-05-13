-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 13, 2026 at 01:53 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1
CREATE DATABASE IF NOT EXISTS `noleak`;
USE `noleak`;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noleak`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `question` text NOT NULL,
  `reponse1` varchar(255) NOT NULL,
  `reponse2` varchar(255) NOT NULL,
  `reponse3` varchar(255) NOT NULL,
  `reponse4` varchar(255) NOT NULL,
  `bonne_reponse` int(11) NOT NULL,
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reponses_utilisateur`
--

CREATE TABLE `reponses_utilisateur` (
  `id` int(11) NOT NULL,
  `tentative_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `reponse_utilisateur` int(11) NOT NULL,
  `correcte` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tentatives`
--

CREATE TABLE `tentatives` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `score` float NOT NULL,
  `nb_bonnes_reponses` int(11) NOT NULL,
  `statut` enum('terminee','annulee','triche') DEFAULT 'terminee',
  `temps_restant` int(11) DEFAULT NULL,
  `date_passage` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idu` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `bloque` tinyint(1) DEFAULT '0',
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Indexes for table `reponses_utilisateur`
--
ALTER TABLE `reponses_utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tentative_id` (`tentative_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `tentatives`
--
ALTER TABLE `tentatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idu`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reponses_utilisateur`
--
ALTER TABLE `reponses_utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tentatives`
--
ALTER TABLE `tentatives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `reponses_utilisateur`
--
ALTER TABLE `reponses_utilisateur`
  ADD CONSTRAINT `reponses_utilisateur_ibfk_1` FOREIGN KEY (`tentative_id`) REFERENCES `tentatives` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reponses_utilisateur_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tentatives`
--
ALTER TABLE `tentatives`
  ADD CONSTRAINT `tentatives_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`idu`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
