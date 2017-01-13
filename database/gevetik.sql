-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 13 Janvier 2017 à 18:51
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gevetik`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) NOT NULL,
  `evenement_id` int(10) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `resume` text NOT NULL,
  `nombre_page` int(10) NOT NULL,
  `extra_page` int(10) NOT NULL DEFAULT '0',
  `keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `evenement_id`, `titre`, `resume`, `nombre_page`, `extra_page`, `keywords`) VALUES
(1, 1, 'article1', 'resumer article 1', 1, 0, 'resumer');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `evenement_id` int(10) NOT NULL,
  `nom_categorie` varchar(50) NOT NULL,
  `slug_categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `evenement_id`, `nom_categorie`, `slug_categorie`) VALUES
(1, 1, 'categorie1', 'categorie1');

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `id` int(10) NOT NULL,
  `nom_evenement` varchar(50) CHARACTER SET latin1 NOT NULL,
  `slug_evenement` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `adresse` text CHARACTER SET latin1 NOT NULL,
  `remise` int(10) NOT NULL DEFAULT '0',
  `date_remise` date NOT NULL,
  `date_soumission_debut` date NOT NULL,
  `date_soumission_fin` date NOT NULL,
  `date_acceptation` date NOT NULL,
  `date_acceptation_definitive` date NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `evenement_active` tinyint(4) NOT NULL DEFAULT '0',
  `nombre_page_accepte` int(10) NOT NULL DEFAULT '0',
  `prix_unitaire_extra_page` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `evenements`
--

INSERT INTO `evenements` (`id`, `nom_evenement`, `slug_evenement`, `description`, `adresse`, `remise`, `date_remise`, `date_soumission_debut`, `date_soumission_fin`, `date_acceptation`, `date_acceptation_definitive`, `date_debut`, `date_fin`, `evenement_active`, `nombre_page_accepte`, `prix_unitaire_extra_page`) VALUES
(1, 'evenements', 'evenements', 'bla bla bla', 'ibgbi', 0, '2016-11-02', '2016-11-02', '2016-11-03', '2016-11-01', '2016-11-02', '2016-11-03', '2016-11-04', 0, 0, 10);

-- --------------------------------------------------------

--
-- Structure de la table `option`
--

CREATE TABLE `option` (
  `option_id` int(10) NOT NULL,
  `categorie_id` int(10) NOT NULL,
  `nom_option` varchar(50) NOT NULL,
  `slug_option` varchar(50) NOT NULL,
  `prix_unitaire` float(10,2) NOT NULL DEFAULT '0.00',
  `quantite_minimum` int(10) NOT NULL DEFAULT '0',
  `quantite_maximum` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `option`
--

INSERT INTO `option` (`option_id`, `categorie_id`, `nom_option`, `slug_option`, `prix_unitaire`, `quantite_minimum`, `quantite_maximum`) VALUES
(1, 1, 'option1', 'option1', 4.00, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `option_paiement`
--

CREATE TABLE `option_paiement` (
  `option_paiement_id` int(10) NOT NULL,
  `paiement_id` int(10) NOT NULL,
  `option_id` int(10) NOT NULL DEFAULT '0',
  `quantite` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `organisateurs`
--

CREATE TABLE `organisateurs` (
  `id` int(10) NOT NULL,
  `evenement_id` int(10) NOT NULL,
  `participant_id` int(10) NOT NULL,
  `nom_role` varchar(50) NOT NULL DEFAULT '',
  `est_organisateur` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `page_payee`
--

CREATE TABLE `page_payee` (
  `page_payee_id` int(10) NOT NULL,
  `article_id` int(10) NOT NULL,
  `auteur_id` int(10) NOT NULL,
  `paiement_id` int(10) NOT NULL DEFAULT '0',
  `extra_page_payee` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `paiement_id` int(10) NOT NULL,
  `reference_paiement` varchar(50) NOT NULL,
  `page_payee_id` int(10) NOT NULL DEFAULT '0',
  `reservation_id` int(10) NOT NULL DEFAULT '0',
  `type` varchar(50) NOT NULL,
  `validation` tinyint(4) NOT NULL DEFAULT '0',
  `total` float(10,2) NOT NULL,
  `valide_par` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `paiement`
--

INSERT INTO `paiement` (`paiement_id`, `reference_paiement`, `page_payee_id`, `reservation_id`, `type`, `validation`, `total`, `valide_par`) VALUES
(1, 'reference1', 1, 0, 'CB', 1, 300.00, 0),
(2, 'reference2', 2, 0, 'CB', 1, 500.00, 0),
(3, 'reference3', 3, 0, 'Cheque', 0, 600.00, 0),
(4, 'reference4', 4, 0, 'Virement', 1, 300.00, 0),
(5, 'reference5', 5, 0, 'CB', 1, 300.00, 0),
(6, 'reference6', 0, 3, 'CB', 1, 150.00, 0),
(8, 'reference7', 0, 4, 'CB', 1, 60.00, 0);

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

CREATE TABLE `participants` (
  `id` int(10) NOT NULL,
  `prenom_participant` varchar(50) NOT NULL,
  `nom_participant` varchar(50) NOT NULL,
  `email_participant` varchar(100) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `etablissement` varchar(250) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `participants`
--

INSERT INTO `participants` (`id`, `prenom_participant`, `nom_participant`, `email_participant`, `mot_de_passe`, `etablissement`) VALUES
(1, 'participant1', 'NOMP1', 'p1@mail.fr', 'pass1', ''),
(2, 'participant2', 'NOMP2', 'p2@mail.fr', 'pass2', ''),
(3, 'participant3', 'NOMP3', 'p3@mail.fr', 'pass3', ''),
(4, 'participant4', 'NOMP4', 'p4@mail.fr', 'pass4', ''),
(5, 'participant5', 'NOMP5', 'p5@mail.fr', 'pass5', ''),
(6, 'participant6', 'NOMP6', 'p6@mail.fr', 'pass6', '');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) NOT NULL,
  `evenement_id` int(10) NOT NULL,
  `paiement_id` int(10) NOT NULL,
  `participant_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `datedenaissance` date NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'visiteur',
  `adresse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `nom`, `prenom`, `datedenaissance`, `role`, `adresse`) VALUES
(7, 'admin', '', '$2y$10$fSptILFpTkviGxYMjAGEzeXNMFMjpcu4Dixz683uaDHxWou58SuHC', 'admin', 'istrateur', '2017-01-13', 'admin', ''),
(15, 'mus', 'admin@mus.fr', 'password', 'mus', 'tapha', '2017-01-13', 'visiteur', 'ici');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`titre`),
  ADD KEY `FK_evenement` (`evenement_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`slug_categorie`,`evenement_id`),
  ADD KEY `FK_evemement` (`evenement_id`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`slug_evenement`);

--
-- Index pour la table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `unique` (`slug_option`,`categorie_id`),
  ADD KEY `FK_categorie` (`categorie_id`);

--
-- Index pour la table `option_paiement`
--
ALTER TABLE `option_paiement`
  ADD PRIMARY KEY (`option_paiement_id`),
  ADD KEY `FK_paiement_option_paiement` (`paiement_id`),
  ADD KEY `FK_option_option_paiement` (`option_id`);

--
-- Index pour la table `organisateurs`
--
ALTER TABLE `organisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`evenement_id`,`participant_id`),
  ADD KEY `FK_participant_organisateur` (`participant_id`);

--
-- Index pour la table `page_payee`
--
ALTER TABLE `page_payee`
  ADD PRIMARY KEY (`page_payee_id`),
  ADD UNIQUE KEY `unique` (`article_id`,`auteur_id`),
  ADD KEY `FK_auteur_page_payee` (`auteur_id`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`paiement_id`),
  ADD UNIQUE KEY `unique` (`reference_paiement`);

--
-- Index pour la table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`email_participant`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`evenement_id`,`participant_id`,`paiement_id`),
  ADD KEY `FK_paiement_reservation` (`paiement_id`),
  ADD KEY `FK_participant_reservation` (`participant_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`username`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `option`
--
ALTER TABLE `option`
  MODIFY `option_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `option_paiement`
--
ALTER TABLE `option_paiement`
  MODIFY `option_paiement_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `organisateurs`
--
ALTER TABLE `organisateurs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `page_payee`
--
ALTER TABLE `page_payee`
  MODIFY `page_payee_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `paiement_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `FK_evenement` FOREIGN KEY (`evenement_id`) REFERENCES `evenements` (`id`);

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `FK_evemement` FOREIGN KEY (`evenement_id`) REFERENCES `evenements` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `option`
--
ALTER TABLE `option`
  ADD CONSTRAINT `FK_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `option_paiement`
--
ALTER TABLE `option_paiement`
  ADD CONSTRAINT `FK_option_option_paiement` FOREIGN KEY (`option_id`) REFERENCES `option` (`option_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_paiement_option_paiement` FOREIGN KEY (`paiement_id`) REFERENCES `paiement` (`paiement_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `organisateurs`
--
ALTER TABLE `organisateurs`
  ADD CONSTRAINT `FK_evenement_organisateur` FOREIGN KEY (`evenement_id`) REFERENCES `evenements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_participant_organisateur` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `page_payee`
--
ALTER TABLE `page_payee`
  ADD CONSTRAINT `FK_article_page_payee` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `FK_auteur_page_payee` FOREIGN KEY (`auteur_id`) REFERENCES `participants` (`id`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `FK_evenement_reservation` FOREIGN KEY (`evenement_id`) REFERENCES `evenements` (`id`),
  ADD CONSTRAINT `FK_paiement_reservation` FOREIGN KEY (`paiement_id`) REFERENCES `paiement` (`paiement_id`),
  ADD CONSTRAINT `FK_participant_reservation` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
