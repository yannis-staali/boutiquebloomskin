-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : Dim 18 avr. 2021 à 09:11
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
(6, 'whisky'),
(7, 'sake'),
(8, 'vodka'),
(9, 'cognac'),
(11, 'armagnac'),
(12, 'rhum'),
(13, 'gin'),
(14, 'absinthe');

-- --------------------------------------------------------

--
-- Structure de la table `client_commande`
--

CREATE TABLE `client_commande` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `télephone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `addresse` text NOT NULL,
  `ville` varchar(255) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `code_postale` int(11) NOT NULL,
  `pays` varchar(100) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `prix` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_categorie` int(11) NOT NULL,
  `id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `image_url`, `stock`, `id_categorie`, `id_region`) VALUES
(23, 'Talisker', 'Un whisky iodé et fort en bouche provenant de l\'ile de sky.', 75, 'IMG-602929921aa852.51952212.jpg', 35, 6, 8),
(24, 'Paddy', 'Un whisky traditionnel irlandais de la marque mythique, doux et sucré il ravira les amateurs.', 28, 'IMG-602929cbae8b29.83628837.jpg', 46, 6, 9),
(25, 'Hennesey', 'Un Cognac de qualité produit dans la célèbre région du même nom, il saura mettre à l\'honneur votre table en apéritif.', 80, 'IMG-60292ad315e6c9.17743705.jpg', 43, 9, 10),
(26, 'Clé des Ducs', 'Armagnac traditionnel, très fort, parfait comme digestif après un repas copieux.', 45, 'IMG-60292d021e4f82.90048656.jpg', 40, 11, 10),
(27, 'Charette', 'Rhum sucré, élégant et traditionnel, il vous fera voyager au bout du monde.', 45, 'IMG-60292d9e53ab23.04532946.jpg', 60, 12, 11),
(28, 'Bombay', 'Gin anglais mythique et son mélange d\'épices incroyable, il ravira votre palet et votre odorat.', 60, 'IMG-60292ddd28ba99.14490329.jpg', 34, 13, 12),
(29, 'Poliakov', 'Vodka russe par excellence elle se déguste pur ou se mélange très bien en cocktail.', 45, 'IMG-60292e031dfac9.03637405.jpg', 45, 8, 13),
(30, 'Absolut', 'Vodka de qualité, elle se sert on the ice en soirée.', 70, 'IMG-60292e2ce0a556.25459909.jpg', 44, 8, 10),
(31, 'Takara', 'Saké traditionnel qui se déguste dans les règles de l\'art.', 80, 'IMG-60292e4adbfd95.64880345.jpg', 40, 7, 14),
(32, 'Bercloux', 'Abstinte mythique qui fait tourner la tête des artistes depuis des siècles.', 100, 'IMG-60292e77c9ad39.44179346.jpg', 20, 14, 10),
(33, 'Caol Ila', 'Whisky provenant de l\'ile d\'Islay, connue comme étant productrice des meilleurs whisky tourbés au monde.', 75, 'IMG-6029352febf971.01563466.png', 34, 6, 8),
(34, 'Boyard', 'Cognac doux et floral il saura mettre en valeur votre apéritif.', 45, 'IMG-602935c763f175.23518157.jpg', 47, 9, 10),
(35, 'Goudoulin', 'Armagnac de la region du Gers, charpenté et corsé il est parfait en digestif.', 46, 'IMG-6029363f2afa16.23324033.jpg', 67, 11, 10),
(36, 'Gordon', 'Le Gin londonien classique et adoré des anglais.', 30, 'IMG-602936bd35f459.70315606.jpg', 33, 13, 12),
(37, 'Citadelle', 'Gin français de la maison citadelle, parfait en cocktail et en aperitif de soirée.', 48, 'IMG-6029373dcefd66.00315259.jpg', 65, 13, 10),
(38, 'Explorer', 'Rhum de Guyane très typé, très moderne.', 65, 'IMG-602937c36e8cd1.99173076.jpg', 37, 12, 10);

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `nom_region` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `nom_region`) VALUES
(8, 'ecosse'),
(9, 'irlande'),
(10, 'france'),
(11, 'martinique'),
(12, 'angleterre'),
(13, 'russie'),
(14, 'japon');

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
(8, 'modifié', 'mathieu.duverne@laplateforme.io', '$2y$10$tFLaR5UNG5.OqTiLn9nBY.1W/b6IW.MRutUCD4vXhW.iR01NGhyOG', 1),
(9, 'wouhoussse', 'mathieu.duverne@laplateforme.io', '$2y$10$qcmRkN6EjXZ7vfmaEb9zhuEMG0tk1Wc37wsdbD44A5s4h.dkyTv6.', 1),
(10, 'allright', 'mathieu.duverne@laplateforme.io', '$2y$10$.TOE8M927Ih9HeejkPb3Q.TMLvh8Sm.debfiTztMJf6Hp5Vx7I0ci', 1),
(11, 'zorkin', 'zorkin.zorkin@zorkin.fr', '$2y$10$wVpdNWPVSNnYNrcJsDqYfektvZIkH8dNo3jwWzqG2KIBouGaUzAwK', 1),
(12, 'matlaboule', 'ccarre@hotmail.fr', '$2y$10$ayew4DjqhfMAM9PW59hpeOmBPVjOpYK2kdPTRmHxDhXRADfbQR1G6', 1),
(13, 'zzzz', 'zorkin.zorkin@zorkin.fr', '$2y$10$jj7BR9gzE3VWsrF6PincwOoLFY0BhBRgn6xYeRw8W./LdkH/3ywcG', 1);

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
-- Index pour la table `regions`
--
ALTER TABLE `regions`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `client_commande`
--
ALTER TABLE `client_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `droits`
--
ALTER TABLE `droits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=910;

--
-- AUTO_INCREMENT pour la table `liste_commande`
--
ALTER TABLE `liste_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
