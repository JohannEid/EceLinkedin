-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 01 Mai 2018 à 15:19
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `meetece`
--



--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `user` (
  `IDuser` int(16) AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `photo` blob,
  `statue` enum('license','master','apprentice','school_employee') NOT NULL,
  `job_search` enum('intership_search','job_search','no_search') NOT NULL,
  `type` enum('admin','user') NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo_background` blob,
  `age` int(11),
  PRIMARY KEY(IDuser)
);



-- --------------------------------------------------------


--
-- Structure de la table `network`
--

CREATE TABLE IF NOT EXISTS `network` (
  `IDnetwork` int(11) AUTO_INCREMENT,
  `IDuser1` int(11) NOT NULL,
  `IDuser2` int(11) NOT NULL,
  `IDconv` int(11) NOT NULL,
  PRIMARY KEY(IDnetwork),
  foreign key (IDuser1) references user (IDuser) on delete cascade on update cascade,
  foreign key (IDuser2) references user (IDuser) on delete cascade on update cascade

  ) ;

-- foreign key (IDconv) references conversation (IDconv) on delete cascade on update cascade

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

CREATE TABLE IF NOT EXISTS `conversation` (
  `IDconv` int(11) AUTO_INCREMENT,
  `IDnetwork` int(11) NOT NULL,
  PRIMARY KEY(IDconv),
  foreign key (IDnetwork) references network(IDnetwork) on delete cascade on update cascade
);



-- --------------------------------------------------------


--
-- Structure de la table `firm`
--

CREATE TABLE IF NOT EXISTS `firm` (
  `IDfirm` int(11) AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `location` varchar(100),
  `description` text ,
  PRIMARY KEY(IDfirm)
);

-- --------------------------------------------------------



--
-- Structure de la table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `IDjob` int(11) AUTO_INCREMENT,
  `IDfirm` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `lieu` varchar(100),
  `salary` int(11),
  `time` time,
  PRIMARY KEY(IDjob),
  foreign key (IDfirm) references firm (IDfirm) on delete cascade on update cascade 
  ) ;


-- --------------------------------------------------------


--
-- Structure de la table `apply`
--

CREATE TABLE IF NOT EXISTS `apply` (
  `IDuser` int(11) NOT NULL,
  `IDjob` int(11) NOT NULL,
  PRIMARY KEY(IDuser,IDjob),
  foreign key (IDuser) references user (IDuser) on delete cascade on update cascade,
  foreign key (IDjob) references job (IDjob) on delete cascade on update cascade
);

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE IF NOT EXISTS `publication` (
  `IDpublication` int(11) AUTO_INCREMENT,
  `IDuser` int(11) NOT NULL,
  `text` text ,
  `photo` blob ,
  `video` longblob ,
  `lieu` varchar(100) ,
  `date` datetime ,
  `etat` tinyint(1),
  PRIMARY KEY(IDpublication),
  foreign key (IDuser) references user (IDuser) on delete cascade on update cascade 
);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `IDcomment` int(11) AUTO_INCREMENT,
  `IDpublication` int(11) NOT NULL,
  `IDuser` int(11) NOT NULL,
  `text` text,
  `date` datetime,
  PRIMARY KEY(IDcomment),
  foreign key (IDpublication) references publication(IDpublication) on delete cascade on update cascade,
  foreign key (IDuser) references user(IDuser) on delete cascade on update cascade
);

-- --------------------------------------------------------



--
-- Structure de la table `like`
--

CREATE TABLE IF NOT EXISTS `like` (
  `IDlike` int(11) AUTO_INCREMENT,
  `IDpublication` int(11) NOT NULL,
  `IDuser` int(11) NOT NULL,
  `emotion` int(11) NOT NULL,
  PRIMARY KEY(IDlike),
  foreign key (IDpublication) references publication (IDpublication) on delete cascade on update cascade,
  foreign key (IDuser) references user (IDuser) on delete cascade on update cascade 
  ) ;


-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `IDmessage` int(11) AUTO_INCREMENT,
  `IDconv` int(11) NOT NULL,
  `text` text ,
  `date` datetime ,
  PRIMARY KEY(IDmessage),
  foreign key (IDconv) references conversation (IDconv) on delete cascade on update cascade
);



-- --------------------------------------------------------


--
-- Structure de la table `evenement`
--

CREATE TABLE IF NOT EXISTS `event` (
  `IDevent` int(11) AUTO_INCREMENT,
  `IDnetwork` int(11) NOT NULL,
  `date` datetime,
  PRIMARY KEY(IDevent),
  foreign key (IDnetwork) references network(IDnetwork) on delete cascade on update cascade
);






-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `IDnotif` int(11) AUTO_INCREMENT,
  `IDnetwork` int(11) NOT NULL,
  `text` text NOT NULL,
  `url` varchar(200),
  `date` datetime NOT NULL,
  `type` int(11),
  PRIMARY KEY(IDnotif),
  foreign key (IDnetwork) references network (IDnetwork) on delete cascade on update cascade
  ) ;


-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

CREATE TABLE IF NOT EXISTS `participation` (
  `IDparticipation` int(11) AUTO_INCREMENT,
  `IDuser` int(11) NOT NULL,
  `IDevent` int(11) NOT NULL,
  PRIMARY KEY(IDparticipation),
  foreign key (IDuser) references user (IDuser) on delete cascade on update cascade,
  foreign key (IDevent) references event (IDevent) on delete cascade on update cascade 
  );


-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `IDphoto` int(11) AUTO_INCREMENT,
  `IDuser` int(11) NOT NULL,
  `album` text ,
  `photo` blob ,
  `video` longblob ,
  `date` datetime NOT NULL,
  PRIMARY KEY(IDphoto),
  foreign key (IDuser) references user (IDuser) on delete cascade on update cascade
  ) ;


-- --------------------------------------------------------







/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
