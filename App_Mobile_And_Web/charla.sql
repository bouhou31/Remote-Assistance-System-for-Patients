-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 09 Juin 2017 à 21:45
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `charla`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE IF NOT EXISTS `administrateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `privilege` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `avatar` varchar(256) DEFAULT '/img/use.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `administrateurs`
--

INSERT INTO `administrateurs` (`id`, `privilege`, `username`, `password`, `avatar`) VALUES
(1, '', 'admin', '123456789', '/img/use.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `alzheimers`
--

CREATE TABLE IF NOT EXISTS `alzheimers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perimetreCirculation` int(11) NOT NULL,
  `idAssistant` int(11) DEFAULT NULL,
  `nom` varchar(256) NOT NULL,
  `prenom` varchar(256) NOT NULL,
  `adresse` varchar(256) NOT NULL,
  `dateNaissance` date NOT NULL,
  `sexe` varchar(5) NOT NULL,
  `numeroTelephone` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `autonome` int(11) NOT NULL DEFAULT '1',
  `administrateur_id` int(11) DEFAULT NULL,
  `medecin_id` int(11) DEFAULT NULL,
  `type` varchar(256) DEFAULT 'Alzheimer',
  `poids` int(11) DEFAULT NULL,
  `taille` int(11) DEFAULT NULL,
  `groupesanguin` varchar(5) DEFAULT NULL,
  `avatar` varchar(256) DEFAULT '/img/use.jpg',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idAssistant` (`idAssistant`),
  KEY `medecin_id` (`medecin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `alzheimers`
--

INSERT INTO `alzheimers` (`id`, `perimetreCirculation`, `idAssistant`, `nom`, `prenom`, `adresse`, `dateNaissance`, `sexe`, `numeroTelephone`, `username`, `password`, `autonome`, `administrateur_id`, `medecin_id`, `type`, `poids`, `taille`, `groupesanguin`, `avatar`) VALUES
(1, 0, NULL, 'lynda', 'lehad', 'alger', '2017-06-09', 'F', 557895645, 'lynda', '123456789', 1, 1, 19, 'Alzheimer', 60, 171, 'O+', '/img/use.jpg'),
(2, 0, 1, 'lyazid', 'mekhlouf', 'alger', '2017-06-09', 'H', 2147483647, 'lyazid', '123456789', 1, 1, 22, 'Alzheimer', 70, 180, 'O+', '/img/use.jpg'),
(3, 0, NULL, 'karim', 'atar', 'alger', '2017-06-09', 'H', 668974512, 'karim', '123456789', 1, 1, 21, 'Alzheimer', 82, 186, 'A+', '/img/use.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `assistant_medicals`
--

CREATE TABLE IF NOT EXISTS `assistant_medicals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAlzheimer` int(11) DEFAULT '0',
  `nom` varchar(256) NOT NULL,
  `prenom` varchar(256) NOT NULL,
  `sexe` varchar(5) NOT NULL,
  `dateNaissance` date NOT NULL,
  `numeroTelephone` int(11) NOT NULL,
  `adresse` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `administrateur_id` int(11) DEFAULT NULL,
  `avatar` varchar(256) NOT NULL DEFAULT '/img/use.jpg',
  `medecin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idAlzheimer` (`idAlzheimer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `assistant_medicals`
--

INSERT INTO `assistant_medicals` (`id`, `idAlzheimer`, `nom`, `prenom`, `sexe`, `dateNaissance`, `numeroTelephone`, `adresse`, `username`, `password`, `administrateur_id`, `avatar`, `medecin_id`) VALUES
(1, 2, 'malika', 'sahli', 'F', '2017-06-09', 2147483647, 'batna', 'malika', '123456789', 1, '/img/use.jpg', NULL),
(2, NULL, 'salima', 'bekri', 'F', '2017-06-09', 2147483647, 'jijel', 'salima', '123456789', 1, '/img/use.jpg', NULL),
(4, NULL, 'fares', 'kezai', 'H', '2017-06-09', 2147483647, 'alger', 'fares', '123456789', 1, '/img/use.jpg', NULL),
(5, NULL, 'yacine', 'hamdi', 'H', '2017-06-09', 557894512, 'alger', 'yacine', '123456789', 1, '/img/use.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `changermateriels`
--

CREATE TABLE IF NOT EXISTS `changermateriels` (
  `idMateriel` int(11) NOT NULL,
  `idPraticien` int(11) NOT NULL,
  PRIMARY KEY (`idMateriel`,`idPraticien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `definirprelevements`
--

CREATE TABLE IF NOT EXISTS `definirprelevements` (
  `idPrelevement` int(11) NOT NULL,
  `idMedecin` int(11) NOT NULL,
  PRIMARY KEY (`idPrelevement`,`idMedecin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `diabetiques`
--

CREATE TABLE IF NOT EXISTS `diabetiques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tauxGlycemie` float NOT NULL,
  `nom` varchar(256) NOT NULL,
  `prenom` varchar(256) NOT NULL,
  `sexe` varchar(5) NOT NULL,
  `dateNaissance` date NOT NULL,
  `adresse` varchar(256) NOT NULL,
  `numeroTelephone` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `autonome` int(11) NOT NULL DEFAULT '1',
  `administrateur_id` int(11) DEFAULT NULL,
  `medecin_id` int(11) DEFAULT NULL,
  `type` varchar(256) DEFAULT 'Diabetique',
  `poids` int(11) NOT NULL,
  `taille` int(11) NOT NULL,
  `groupesanguin` varchar(5) NOT NULL,
  `avatar` varchar(256) DEFAULT '/img/use.jpg',
  PRIMARY KEY (`id`),
  KEY `medecin_id` (`medecin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `diabetiques`
--

INSERT INTO `diabetiques` (`id`, `tauxGlycemie`, `nom`, `prenom`, `sexe`, `dateNaissance`, `adresse`, `numeroTelephone`, `username`, `password`, `autonome`, `administrateur_id`, `medecin_id`, `type`, `poids`, `taille`, `groupesanguin`, `avatar`) VALUES
(2, 2.3, 'romaissa', 'khelafi', 'F', '2017-06-09', 'alger', 556457889, 'romaissa', '123456789', 1, 1, 19, 'Diabetique', 55, 165, 'AB+', '/img/use.jpg'),
(6, 3.4, 'nafissa', 'mezerreg', 'F', '2017-06-09', 'alger', 2147483647, 'nafissa', '123456789', 1, 1, 19, 'Diabetique', 69, 172, 'B-', '/img/use.jpg'),
(7, 0.95, 'jamila', 'tayeb', 'F', '1990-03-04', 'alger', 557848923, 'jamila', '123456789', 1, 1, 19, 'Diabetique', 71, 175, 'O+', '/img/use.jpg'),
(15, 5.3, 'lilia', 'auodia', 'F', '2017-06-09', 'alger', 0, 'lilia', '123456789', 1, 1, 19, 'Diabetique', 70, 174, 'A-', '/img/use.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `effectuers`
--

CREATE TABLE IF NOT EXISTS `effectuers` (
  `idPatient` int(11) NOT NULL,
  `idReservation` int(11) NOT NULL,
  `NumeroChassis` int(11) NOT NULL,
  PRIMARY KEY (`idPatient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `entreprisetransports`
--

CREATE TABLE IF NOT EXISTS `entreprisetransports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(256) NOT NULL,
  `adresse` varchar(256) NOT NULL,
  `numeroTlephone` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `envoyers`
--

CREATE TABLE IF NOT EXISTS `envoyers` (
  `idIndicateur` int(11) NOT NULL,
  `idPatient` int(11) NOT NULL,
  `idMedecin` int(11) NOT NULL,
  PRIMARY KEY (`idIndicateur`,`idPatient`,`idMedecin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etablissements`
--

CREATE TABLE IF NOT EXISTS `etablissements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(256) NOT NULL,
  `adresse` varchar(256) NOT NULL,
  `numeroTelphone` int(11) NOT NULL,
  `type` varchar(256) NOT NULL,
  `lieu` varchar(256) NOT NULL,
  `siegeSocial` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `grossesse_arisques`
--

CREATE TABLE IF NOT EXISTS `grossesse_arisques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indicateur` int(11) NOT NULL,
  `typeRisque` varchar(256) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `prenom` varchar(256) NOT NULL,
  `adresse` varchar(256) NOT NULL,
  `sexe` varchar(5) NOT NULL,
  `dateNaissance` date NOT NULL,
  `numeroTelephone` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `autonome` int(11) NOT NULL DEFAULT '1',
  `administrateur_id` int(11) DEFAULT NULL,
  `medecin_id` int(11) DEFAULT NULL,
  `type` varchar(256) DEFAULT 'Grossesse',
  `poids` int(11) NOT NULL,
  `taille` int(11) NOT NULL,
  `groupesanguin` varchar(5) NOT NULL,
  `avatar` varchar(256) DEFAULT '/img/use.jpg',
  `tauxGlycemie` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dateNaissane` (`dateNaissance`),
  KEY `medecin_id` (`medecin_id`),
  KEY `dateNaissane_2` (`dateNaissance`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `grossesse_arisques`
--

INSERT INTO `grossesse_arisques` (`id`, `indicateur`, `typeRisque`, `nom`, `prenom`, `adresse`, `sexe`, `dateNaissance`, `numeroTelephone`, `username`, `password`, `autonome`, `administrateur_id`, `medecin_id`, `type`, `poids`, `taille`, `groupesanguin`, `avatar`, `tauxGlycemie`) VALUES
(2, 0, '', 'safia', 'bouchouk', 'oran', 'F', '2017-06-07', 2147483647, 'safia', '123456789', 1, 1, 20, 'Grossesse', 63, 178, 'A+', '/img/use.jpg', 2),
(3, 0, '', 'hajar', 'ayad', 'stif', 'F', '2017-06-05', 557894512, 'hajar', '123456789', 1, 1, 19, 'Grossesse', 78, 159, 'O+', '/img/use.jpg', 1),
(4, 0, '', 'amel', 'hani', 'alger', 'F', '2017-06-06', 2147483647, 'amel', '123456789', 1, 1, 20, 'Grossesse', 64, 162, 'O-', '/img/use.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `incidents`
--

CREATE TABLE IF NOT EXISTS `incidents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `indicateurs`
--

CREATE TABLE IF NOT EXISTS `indicateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeIndicateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `materiels`
--

CREATE TABLE IF NOT EXISTS `materiels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL,
  `dateAchat` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `medecins`
--

CREATE TABLE IF NOT EXISTS `medecins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(256) NOT NULL,
  `prenom` varchar(256) NOT NULL,
  `adresse` varchar(256) NOT NULL,
  `sexe` varchar(5) NOT NULL,
  `dateNaissance` date NOT NULL,
  `numeroTelephone` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `avatar` varchar(256) DEFAULT '/img/use.jpg',
  `administrateur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `medecins`
--

INSERT INTO `medecins` (`id`, `nom`, `prenom`, `adresse`, `sexe`, `dateNaissance`, `numeroTelephone`, `username`, `password`, `avatar`, `administrateur_id`) VALUES
(19, 'nawel', 'khelafi', 'alger', 'F', '2017-06-05', 2147483647, 'nawel', '123456789', '/img/use.jpg', 1),
(20, 'selma', 'boudoukha', 'alger', 'F', '2017-06-06', 2147483647, 'selma', '123456789', '/img/use.jpg', 1),
(21, 'hichem', 'jadi', 'oran', 'H', '2017-06-02', 2147483647, 'hichem', '123456789', '/img/use.jpg', 1),
(22, 'idris', 'zitouni', 'jijel', 'H', '2017-06-08', 2147483647, 'idris', '123456789', '/img/use.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `medicaments`
--

CREATE TABLE IF NOT EXISTS `medicaments` (
  `id` int(11) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(11) NOT NULL,
  `nonAutonome` tinyint(1) NOT NULL,
  `typeMalade` int(11) NOT NULL,
  `idAgence` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idAgence` (`idAgence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `praticiens`
--

CREATE TABLE IF NOT EXISTS `praticiens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anneeDebutTravail` date NOT NULL,
  `domaineExperience` varchar(256) NOT NULL,
  `idPraticien` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `prelevements`
--

CREATE TABLE IF NOT EXISTS `prelevements` (
  `id` int(11) NOT NULL,
  `datePrelevement` date NOT NULL,
  `idDiabetique` int(11) NOT NULL,
  `idGrossesse` int(11) NOT NULL,
  `idIndicateur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idGrossesse` (`idGrossesse`),
  KEY `idDiabetique` (`idDiabetique`),
  KEY `idIndicateur` (`idIndicateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `prendremeds`
--

CREATE TABLE IF NOT EXISTS `prendremeds` (
  `idMedicament` int(11) NOT NULL,
  `idPatient` int(11) NOT NULL,
  PRIMARY KEY (`idMedicament`,`idPatient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

CREATE TABLE IF NOT EXISTS `rendezvous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebut` date NOT NULL,
  `datelimite` date NOT NULL,
  `idPatient` int(11) NOT NULL,
  `idMedecin` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idPatient` (`idPatient`),
  UNIQUE KEY `idMedecin` (`idMedecin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateReservation` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `signaleras`
--

CREATE TABLE IF NOT EXISTS `signaleras` (
  `idAlzheimer` int(11) NOT NULL,
  `idIncident` int(11) NOT NULL,
  `idMedecin` int(11) NOT NULL,
  PRIMARY KEY (`idAlzheimer`,`idIncident`,`idMedecin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `signalergs`
--

CREATE TABLE IF NOT EXISTS `signalergs` (
  `idGrossess` int(11) NOT NULL,
  `idIncident` int(11) NOT NULL,
  `idMedecin` int(11) NOT NULL,
  PRIMARY KEY (`idGrossess`,`idIncident`,`idMedecin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `suivres`
--

CREATE TABLE IF NOT EXISTS `suivres` (
  `idMedecin` int(11) NOT NULL,
  `idPatient` int(11) NOT NULL,
  PRIMARY KEY (`idMedecin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `travailleras`
--

CREATE TABLE IF NOT EXISTS `travailleras` (
  `idAdministrateur` int(11) NOT NULL,
  `idEtablissement` int(11) NOT NULL,
  PRIMARY KEY (`idAdministrateur`,`idEtablissement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `travaillerps`
--

CREATE TABLE IF NOT EXISTS `travaillerps` (
  `idPraticien` int(11) NOT NULL,
  `idEtablissement` int(11) NOT NULL,
  PRIMARY KEY (`idPraticien`,`idEtablissement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typevehicules`
--

CREATE TABLE IF NOT EXISTS `typevehicules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPraticien` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idPatient` (`idPraticien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisations`
--

CREATE TABLE IF NOT EXISTS `utilisations` (
  `id` int(11) NOT NULL,
  `idMateriel` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  PRIMARY KEY (`id`,`idMateriel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE IF NOT EXISTS `vehicules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numImmatriculation` int(11) NOT NULL,
  `designation` int(11) NOT NULL,
  `idAgence` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idAgence` (`idAgence`),
  UNIQUE KEY `idType` (`idType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `alzheimers`
--
ALTER TABLE `alzheimers`
  ADD CONSTRAINT `alzheimers_ibfk_1` FOREIGN KEY (`idAssistant`) REFERENCES `assistant_medicals` (`id`),
  ADD CONSTRAINT `alzheimers_ibfk_2` FOREIGN KEY (`medecin_id`) REFERENCES `medecins` (`id`);

--
-- Contraintes pour la table `assistant_medicals`
--
ALTER TABLE `assistant_medicals`
  ADD CONSTRAINT `assistant_medicals_ibfk_1` FOREIGN KEY (`idAlzheimer`) REFERENCES `alzheimers` (`id`);

--
-- Contraintes pour la table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`idAgence`) REFERENCES `entreprisetransports` (`id`);

--
-- Contraintes pour la table `prelevements`
--
ALTER TABLE `prelevements`
  ADD CONSTRAINT `prelevements_ibfk_1` FOREIGN KEY (`idDiabetique`) REFERENCES `diabetiques` (`id`),
  ADD CONSTRAINT `prelevements_ibfk_2` FOREIGN KEY (`idGrossesse`) REFERENCES `grossesse_arisques` (`id`),
  ADD CONSTRAINT `prelevements_ibfk_3` FOREIGN KEY (`idIndicateur`) REFERENCES `indicateurs` (`id`);

--
-- Contraintes pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD CONSTRAINT `rendezvous_ibfk_1` FOREIGN KEY (`idPatient`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `rendezvous_ibfk_2` FOREIGN KEY (`idMedecin`) REFERENCES `medecins` (`id`);

--
-- Contraintes pour la table `typevehicules`
--
ALTER TABLE `typevehicules`
  ADD CONSTRAINT `typevehicules_ibfk_1` FOREIGN KEY (`idPraticien`) REFERENCES `praticiens` (`id`);

--
-- Contraintes pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD CONSTRAINT `vehicules_ibfk_1` FOREIGN KEY (`idAgence`) REFERENCES `entreprisetransports` (`id`),
  ADD CONSTRAINT `vehicules_ibfk_2` FOREIGN KEY (`idType`) REFERENCES `typevehicules` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
