-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 20 juil. 2021 à 08:36
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom_categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom_categorie`) VALUES
(6, 'Crème visage'),
(7, 'Anti-rides'),
(8, 'Gel nettoyant'),
(9, 'Mascara'),
(12, 'make-up'),
(13, 'Epilation'),
(14, 'Rouge a lèvre'),
(15, 'maquillage');

-- --------------------------------------------------------

--
-- Structure de la table `client_commande`
--

CREATE TABLE `client_commande` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `addresse` text NOT NULL,
  `ville` varchar(255) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `pays` varchar(100) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_commande` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `prix_total` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client_commande`
--

INSERT INTO `client_commande` (`id`, `nom`, `prenom`, `telephone`, `email`, `addresse`, `ville`, `departement`, `code_postal`, `pays`, `id_utilisateur`, `id_commande`, `status`, `prix_total`, `date`) VALUES
(19, 'boost', 'booster', 9888, '@@@', '11111', 'LONDON', '88', 888, 'UK', 14, 'pi_1JEXBXJ9WCFPfyUzAXF9wQY2', NULL, NULL, NULL),
(17, 'Toto', 'vega', 9999, 'toto@gmail.com', '125 rue grignan', 'Paris', '75', 75000, 'FR', 14, 'pi_1JCmCVJ9WCFPfyUzMRuP0C2w', NULL, NULL, NULL),
(18, 'Toto', 'vega', 655, 'toto@gmail.com', '266', 'Paris', '75', 75000, 'FR', 14, 'pi_1JCmDxJ9WCFPfyUzDK1FUTcX', NULL, NULL, NULL),
(13, 'bou', 'bibi', 3, 'bou@', '222', 'LOS', '22', 0, 'US', 23, 'pi_1JCOZjJ9WCFPfyUz9QpIYzXH', NULL, NULL, NULL),
(14, 'boubou3', 'bou', 77, '@', '55', 'Alamois', '33', 33, 'DE', 23, 'pi_1JCP58J9WCFPfyUzCUhwsAzG', NULL, NULL, NULL),
(15, 'boubou4', 'bou', 88, '@@', '44', 'PARIS', '99', 99, 'FR', 23, 'pi_1JCPcNJ9WCFPfyUzEQIekqnH', NULL, NULL, NULL),
(16, 'boubou6', 'bou', 9, '@@', '44', 'LOS', '22', 22, 'KK', 23, 'pi_1JCPlGJ9WCFPfyUzLpvdy8pP', NULL, NULL, NULL),
(20, 'zelda', 'zelda', 88, 'zelda@', '666', 'salon', '122', 12222, 'FR', 24, 'pi_1JEaljJ9WCFPfyUz7fPuJD1g', NULL, NULL, NULL),
(21, 'zouzou', 'zou', 99, '@@', '87', 'sa', '13', 13, 'UK', 24, 'pi_1JEb3YJ9WCFPfyUzAnLIPxsl', NULL, 60, NULL),
(22, 'zelda', 'aa', 0, '@@', '222', 'UK', '12', 12, 'UK', 24, 'pi_1JEbPzJ9WCFPfyUzFzonvcoD', NULL, 125, NULL),
(23, 'tt', 't', 0, '@@', 'jjj', 'jj', '11', 11, 'kk', 24, 'pi_1JEdCSJ9WCFPfyUzOuWHuc0W', NULL, 60, NULL),
(24, 'dada', 'ggy', 0, '@@@', 'GGGA', 'IK', '23', 22, 'KJ', 24, 'pi_1JEdYvJ9WCFPfyUzl6EuCOrU', NULL, 90, '2021-07-18 20:06:40'),
(25, 'ventor', 'uu', 9, '@@@', '66', 'UK', '11', 11, 'UK', 24, 'pi_1JEgweJ9WCFPfyUzWY10KZP7', NULL, 105, '2021-07-18 22:51:16');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateurs'),
(909, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `liste_commande`
--

CREATE TABLE `liste_commande` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `statut` int(11) DEFAULT NULL,
  `prix` int(255) NOT NULL,
  `id_commande` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `liste_commande`
--

INSERT INTO `liste_commande` (`id`, `id_produit`, `id_utilisateur`, `quantite`, `statut`, `prix`, `id_commande`) VALUES
(102, 47, 23, 1, 1, 60, 'pi_1JCOZjJ9WCFPfyUz9QpIYzXH'),
(103, 44, 23, 1, 1, 25, 'pi_1JCOZjJ9WCFPfyUz9QpIYzXH'),
(104, 45, 23, 1, 1, 45, 'pi_1JCP58J9WCFPfyUzCUhwsAzG'),
(105, 46, 23, 1, 1, 50, 'pi_1JCP58J9WCFPfyUzCUhwsAzG'),
(106, 45, 23, 1, 1, 45, 'pi_1JCPcNJ9WCFPfyUzEQIekqnH'),
(107, 39, 23, 1, 1, 20, 'pi_1JCPcNJ9WCFPfyUzEQIekqnH'),
(108, 46, 23, 1, 1, 50, 'pi_1JCPcNJ9WCFPfyUzEQIekqnH'),
(110, 46, 23, 1, 1, 50, 'pi_1JCPlGJ9WCFPfyUzLpvdy8pP'),
(113, 44, 14, 1, 1, 25, 'pi_1JCmCVJ9WCFPfyUzMRuP0C2w'),
(114, 40, 14, 1, 1, 30, 'pi_1JCmCVJ9WCFPfyUzMRuP0C2w'),
(115, 45, 14, 4, 1, 180, 'pi_1JCmDxJ9WCFPfyUzDK1FUTcX'),
(120, 47, 14, 2, 1, 120, 'pi_1JEXBXJ9WCFPfyUzAXF9wQY2'),
(121, 46, 14, 3, 1, 150, 'pi_1JEXBXJ9WCFPfyUzAXF9wQY2'),
(122, 44, 14, 1, 1, 25, 'pi_1JEXBXJ9WCFPfyUzAXF9wQY2'),
(123, 47, 14, 1, NULL, 60, NULL),
(124, 45, 14, 1, NULL, 45, NULL),
(127, 44, 20, 1, NULL, 25, NULL),
(128, 45, 24, 2, 1, 90, 'pi_1JEaljJ9WCFPfyUz7fPuJD1g'),
(129, 44, 24, 1, 1, 25, 'pi_1JEaljJ9WCFPfyUz7fPuJD1g'),
(130, 40, 24, 2, 1, 60, 'pi_1JEb3YJ9WCFPfyUzAnLIPxsl'),
(131, 45, 24, 2, 1, 90, 'pi_1JEbPzJ9WCFPfyUzFzonvcoD'),
(132, 39, 24, 1, 1, 50, 'pi_1JEbPzJ9WCFPfyUzFzonvcoD'),
(133, 40, 24, 1, 1, 30, 'pi_1JEbPzJ9WCFPfyUzFzonvcoD'),
(134, 47, 24, 1, 1, 60, 'pi_1JEdCSJ9WCFPfyUzOuWHuc0W'),
(135, 45, 24, 2, 1, 90, 'pi_1JEdYvJ9WCFPfyUzl6EuCOrU'),
(136, 44, 24, 1, 1, 25, 'pi_1JEgweJ9WCFPfyUzWY10KZP7'),
(137, 40, 24, 1, 1, 30, 'pi_1JEgweJ9WCFPfyUzWY10KZP7'),
(138, 39, 24, 1, 1, 50, 'pi_1JEgweJ9WCFPfyUzWY10KZP7');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prix` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `stock` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `image_url`, `stock`, `id_categorie`) VALUES
(39, 'Crème Clinique', 'Moisture crème pour tout le corps ', 50, 'IMG-60e183f0b013c7.46134421.jpeg', 10, 6),
(40, 'Crème Lirac', 'Superbe crème', 30, 'IMG-60e18aff5dd3d0.33568792.png', 10, 6),
(44, 'Hydroboost', 'Un gel qui vivifie', 25, 'IMG-60e19466ed2295.52472977.jpeg', 45, 8),
(45, 'Crème laroche', 'Crème hyper-hydratante', 45, 'IMG-60e1954fdfcfd7.88972276.jpeg', 40, 6),
(46, 'Makeup Obsession', 'Palette de contour feels', 50, 'IMG-60e195b298b364.16221254.jpeg', 28, 12),
(47, 'Makeup sleek', 'Makeup moderne', 60, 'IMG-60e196bb5ad124.51632016.jpeg', 30, 12);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `email`, `password`, `id_droits`) VALUES
(0, 'admin', 'admin@admin.admin', '$2y$10$bhSRcva0pj7w033tx/Ye0eGAznEbbLF03pvSaLWnHJArvsjwsl58G', 909),
(14, 'toto', 'toto@gmail.com', '$2y$10$s7DhmvrZtXHPUhitAQaoreQQGq5dcDVtw7.dIzemjkS5DScL2HYFa', 1),
(16, 'kylie ', 'kylie@gmail.com', '$2y$10$037/mXtXi/NSRB4Qyj4rR.YGHBiAbJbiEi77kH14lIfbK57s1uaKa', 1),
(17, 'elise', 'elise@gmail.com', '$2y$10$SXIBlmCHz/fo3N/uWPtNBeVc9Eyy0VlSKZcCI.sPnzesCEQ07xjze', 1),
(19, 'franc', 'franc@gmail.com', '$2y$10$UVEQKCX.k8OXdyR6nQIJAep60fxPiQsYEL7khwlzNPCO9OAY.IGz.', 1),
(20, 'bobby', 'bobby@gmail.com', '$2y$10$bc85dg9BNdrJP4iaVOyl0OtJS1S800oyPIUfAnuAX.d.Kx1UyH2jG', 1),
(21, 'farah', 'farah@gmail.com', '$2y$10$5Bb/tqDLuk0hHRbCzDHaK.OSjVy6inMOLorYa9bg59vXk0j0TLXja', 1),
(22, 'sopra', 'sopra@gmail.com', '$2y$10$uQrKcDgkuTOQb2CgZ2Sa4OL5oWBUKh0UXZq4uaUbDMetsMgyIHfiC', 1),
(23, 'boubou', 'boubou@gmail.com', '$2y$10$RQqikJOQY.nrj0bbCaZulen8f.kQ4yyh5UuT/LsqdO82ZN2G1v8dS', 1),
(24, 'Zelda', 'zelda@gmail.com', '$2y$10$lMPudZYg2hFSgDFME2fGZuJ4.gYxTLrq47.7jsXteQbuLrcqO9yOu', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client_commande`
--
ALTER TABLE `client_commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `droits`
--
ALTER TABLE `droits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `liste_commande`
--
ALTER TABLE `liste_commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `client_commande`
--
ALTER TABLE `client_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `droits`
--
ALTER TABLE `droits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=910;

--
-- AUTO_INCREMENT pour la table `liste_commande`
--
ALTER TABLE `liste_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
