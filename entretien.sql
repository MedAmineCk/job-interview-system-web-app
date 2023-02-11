-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 31 oct. 2019 à 17:21
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP :  7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `entretien`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidat_infos`
--

CREATE TABLE `candidat_infos` (
  `id_candidat` bigint(20) NOT NULL,
  `cin` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statut` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'new',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `candidat_infos`
--

INSERT INTO `candidat_infos` (`id_candidat`, `cin`, `nom`, `prenom`, `telephone`, `email`, `statut`, `date_added`) VALUES
(1, 'sdfsdf', 'MOHAMED-AMINE', 'CHEKROUNI', '5627453112', 'medamineck4u@gmail.com', 'accepted', '2019-10-17 11:26:11'),
(3, 'ghfhgfhfgh', 'BRAHIM', 'BOURHESDIS', '5627453112', 'medamineck4u@gmail.com', 'accepted', '2019-10-17 11:27:51'),
(5, 'dfgdg', 'MOHAMED-AMINE', 'CHEKROUNI', '5627453112', 'medamineck4u@gmail.com', 'refused', '2019-10-17 11:28:48'),
(6, 'UUUYTR', 'MOHAMED-AMINE', 'CHEKROUNI', '5627453112', 'medamineck4u@gmail.com', 'Delete', '2019-10-17 11:33:04'),
(7, 'sdfsdfsdf', 'BRAHIM', 'BOURHESDIS', '5627453112', 'medamineck4u@gmail.com', 'Delete', '2019-10-30 11:51:57');

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `pk_id_questionnaire` bigint(20) NOT NULL,
  `fk_id_candidat` bigint(20) NOT NULL,
  `experience` tinyint(1) NOT NULL,
  `duree_experience` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `fonction_experience` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `lieu_experience` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connaissance` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `pourquoi_notoriety` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `questionnaire`
--

INSERT INTO `questionnaire` (`pk_id_questionnaire`, `fk_id_candidat`, `experience`, `duree_experience`, `fonction_experience`, `lieu_experience`, `connaissance`, `pourquoi_notoriety`) VALUES
(1, 1, 0, '-', '-', '-', 'Un ami qui travaille chez', '-'),
(3, 3, 0, '-', '-', '-', ' Un ami de lâ€™extÃ©rieur', '-'),
(5, 5, 1, 'Plus de 6 mois', 'Formateur', 'KKK', 'dgfdfg', 'dfgdfg'),
(6, 6, 1, 'Plus dâ€™un an', 'tÃ©lÃ©vendeur', 'OUJDA', 'Anapec', 'sdfsdf'),
(7, 7, 0, '-', '-', '-', 'Un ami qui travaille chez', '-');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `statut` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `statut`) VALUES
(1, 'administrateur', 'admin@notoriety-group.com', 'admin', '@root@', 'admin'),
(2, 'recrutement', 'recrutement@notoriety-group.com', 'recrutement', '@recrutement@', 'recrutement');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidat_infos`
--
ALTER TABLE `candidat_infos`
  ADD PRIMARY KEY (`id_candidat`);

--
-- Index pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`pk_id_questionnaire`),
  ADD KEY `questionnaire_ibfk_1` (`fk_id_candidat`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidat_infos`
--
ALTER TABLE `candidat_infos`
  MODIFY `id_candidat` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `pk_id_questionnaire` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD CONSTRAINT `questionnaire_ibfk_1` FOREIGN KEY (`fk_id_candidat`) REFERENCES `candidat_infos` (`id_candidat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
