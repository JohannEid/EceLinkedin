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
  `job_search` enum('internship_search','job_search','no_search') DEFAULT 'no_search' NOT NULL,
  `type` enum('admin','user') NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo_background` blob,
  `age` int(11),
  PRIMARY KEY(IDuser)
);


INSERT INTO user(IDuser,email,photo,statue,job_search,type,pseudo,name,firstname,password,photo_background,age)
VALUES
  (1,'thomas@gmail.com',null,'license','no_search','user','Tom','Cop','Thomas','Thomas',null,21),
  (2,'johann@gmail.com',null,'master','no_search','user','Jo','Eid','Johann','Johann',null,21),
  (3,'clement@gmail.com',null,'license','apprentice','user','Clem','Bail','Clement','Clement',null,22),
  (4,'sophie@gmail.com',null,'school_employee','no_search','user','Soph','Lam','Sophie','Sophie',null,27),
  (5,'garance@gmail.com',null,'master','job_search','user','Gar','Lautre','Garance','Garance',null,24),
  (6,'julie@gmail.com',null,'license','internship_search','user','Jul','Dupont','Julie','Julie',null,23),
  (7,'pierre@gmail.com',null,'license','no_search','user','Boloss','Berland','Pierre','Pierre',null,20),
  (8,'myrna@gmail.com',null,'license','internship_search','user','lol','Wadi','Myrna','Myrna',null,21),
  (9,'clara@gmail.com',null,'master','job_search','user','Cla','Tromelin','Clara','Clara',null,23),
  (10,'pauline@gmail.com',null,'license','no_search','user','Po','Salmon','Pauline','Pauline',null,21)
;




-- --------------------------------------------------------


--
-- Structure de la table `network`
--

CREATE TABLE IF NOT EXISTS `network` (
  `IDnetwork` int(11) AUTO_INCREMENT,
  `IDuser1` int(11) NOT NULL,
  `IDuser2` int(11) NOT NULL,
  PRIMARY KEY(IDnetwork),
  foreign key (IDuser1) references user (IDuser) on delete cascade on update cascade,
  foreign key (IDuser2) references user (IDuser) on delete cascade on update cascade

  ) ;

insert into network values
  (1,1,2),(2,1,3),(3,1,5),(4,1,6),(5,1,7),(6,1,8),
  (7,2,3),(8,2,4),(9,2,5),(10,2,9),
  (11,3,4),(12,3,7),(13,3,8),(14,3,9),(15,3,10),
  (16,4,7),(17,4,8),(18,4,9),
  (19,5,6),(20,5,7),(21,5,10)
  ;



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
