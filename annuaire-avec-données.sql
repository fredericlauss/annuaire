-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 03 nov. 2022 à 19:42
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `annuaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `annee`
--

CREATE TABLE `annee` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `anneestudent`
--

CREATE TABLE `anneestudent` (
  `id` int(11) NOT NULL,
  `id_annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `filierestudent`
--

CREATE TABLE `filierestudent` (
  `id` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `jpo`
--

CREATE TABLE `jpo` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `jpostudent`
--

CREATE TABLE `jpostudent` (
  `id` int(11) NOT NULL,
  `id_jpo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `mail` text NOT NULL,
  `number` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annee`
--
ALTER TABLE `annee`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `anneestudent`
--
ALTER TABLE `anneestudent`
  ADD PRIMARY KEY (`id`,`id_annee`),
  ADD KEY `anneestudent_annee0_FK` (`id_annee`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `filierestudent`
--
ALTER TABLE `filierestudent`
  ADD PRIMARY KEY (`id`,`id_filiere`),
  ADD KEY `filierestudent_filiere0_FK` (`id_filiere`);

--
-- Index pour la table `jpo`
--
ALTER TABLE `jpo`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jpostudent`
--
ALTER TABLE `jpostudent`
  ADD PRIMARY KEY (`id`,`id_jpo`),
  ADD KEY `jpostudent_jpo0_FK` (`id_jpo`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annee`
--
ALTER TABLE `annee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jpo`
--
ALTER TABLE `jpo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `anneestudent`
--
ALTER TABLE `anneestudent`
  ADD CONSTRAINT `anneestudent_annee0_FK` FOREIGN KEY (`id_annee`) REFERENCES `annee` (`id`),
  ADD CONSTRAINT `anneestudent_student_FK` FOREIGN KEY (`id`) REFERENCES `student` (`id`);

--
-- Contraintes pour la table `filierestudent`
--
ALTER TABLE `filierestudent`
  ADD CONSTRAINT `filierestudent_filiere0_FK` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id`),
  ADD CONSTRAINT `filierestudent_student_FK` FOREIGN KEY (`id`) REFERENCES `student` (`id`);

--
-- Contraintes pour la table `jpostudent`
--
ALTER TABLE `jpostudent`
  ADD CONSTRAINT `jpostudent_jpo0_FK` FOREIGN KEY (`id_jpo`) REFERENCES `jpo` (`id`),
  ADD CONSTRAINT `jpostudent_student_FK` FOREIGN KEY (`id`) REFERENCES `student` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
