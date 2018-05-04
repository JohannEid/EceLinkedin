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
  `IDuser` int(11) AUTO_INCREMENT,
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
  (1,'thomas@gmail.com',null,'license','internship_search','user','Tom','Cop','Thomas','Thomas',null,21),
  (2,'johann@gmail.com',null,'master','internship_search','user','Jo','Eid','Johann','Johann',null,21),
  (3,'clement@gmail.com',null,'license','internship_search','user','Clem','Bail','Clement','Clement',null,22),
  (4,'sophie@gmail.com',null,'school_employee','no_search','user','Soph','Lam','Sophie','Sophie',null,27),
  (5,'garance@gmail.com',null,'master','job_search','user','Gar','Lautre','Garance','Garance',null,24),
  (6,'julie@gmail.com',null,'license','internship_search','user','Jul','Dupont','Julie','Julie',null,23),
  (7,'pierre@gmail.com',null,'license','internship_search','user','Boloss','Berland','Pierre','Pierre',null,20),
  (8,'myrna@gmail.com',null,'license','apprentice','user','lol','Wadi','Myrna','Myrna',null,21),
  (9,'clara@gmail.com',null,'master','job_search','user','Cla','Tromelin','Clara','Clara',null,23),
  (10,'pauline@gmail.com',null,'license','apprentice','user','Po','Salmon','Pauline','Pauline',null,21)
;




-- --------------------------------------------------------


--
-- Structure de la table `network`
--

CREATE TABLE IF NOT EXISTS `network` (
  `IDnetwork` int(11) NOT NULL,
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



-- --------------------------------------------------------


--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `IDmessage` int(11) AUTO_INCREMENT,
  `IDnetwork` int(11) NOT NULL,
  `text` text ,
  `date` datetime ,
  PRIMARY KEY(IDmessage),
  foreign key (IDnetwork) references network (IDnetwork) on delete cascade on update cascade
);

insert into message values
  (1,1,'Salut mec, comment tu vas','2018-05-04 10:08:00'),
  (2,1,'Re, comment vas tu ?','2018-05-04 10:12:00'),
  (3,1,'OUais de ouf ca va, tu fais quoi ce soir','2018-05-04 10:15:00'),
  (4,1,'Rendez vous à 18h','2018-05-04 10:12:00'),
  (5,2,'Bonjour, je vous contacte afin de fixer un horaire pour le prochain rendez-vous','2018-05-07 18:56:00'),
  (6,3,'Je me presente, je suis ingenieur en systeme embarque','2018-05-06 07:31:00')
  ;



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

insert into firm values
  (1,'Thales','Velizy',''),
  (2,'Bitcoin','Pau',''),
  (3,'Apple','Los Angeles',''),
  (4,'Google','New York',''),
  (5,'Dassault','Paris','')
  ;

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
  `time` varchar(15),
  PRIMARY KEY(IDjob),
  foreign key (IDfirm) references firm (IDfirm) on delete cascade on update cascade 
  ) ;

insert into job values
  (1,1,'Ingenieur en systeme embarque','Recherche ingenieur dans la defense. Connaissance en systeme embarque demande','Velizy',3100,'3 mois'),
  (2,2,'Ingenieur de systeme d information','Besoin d un ingenieur en systeme d information expert dans l abstarction','Paris',3500,'6 mois'),
  (3,3,'Ingenieur commercial','Ingenieur d affaire capable de vendre des produits de merde à des prix ultra cher','Singapour',2800,'3 mois'),
  (4,3,'Ingenieur financier','Ingenieur capable de determiner les risques d un futur marche','Moscou',2100,'3 mois'),
  (5,4,'Ingenieur prodige','Ingenieur capable de vendre pere et mere pour reussir','Bangkok',4000,'1 an'),
  (6,5,'Ingenieur en systeme embarque','Ingenieur ayant poour objectif de travailler serieusement','Paris',3000,'6 mois');



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

insert into apply values
  (1,1),(1,4),(1,6),
  (2,2),(2,5),
  (3,2),(3,4),(3,5),
  (5,5),(5,6),
  (6,2),(6,4),
  (7,1),(7,5),
  (8,5),(8,2),
  (9,2),(9,1),
  (10,1)
  ;


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

insert into publication values
  (1,1,'Bonjour à tous, je viens de m inscire',null,null,'Paris','2018-05-03 13:15:00',0),
  (2,1,'J adore ce reseau social',null,null,'Paris','2018-05-03 13:30:00',0),
  (3,1,'Qui veut etre mon ami',null,null,'Paris','2018-05-03 14:15:00',0),
  (4,2,'On peut faire tellement de rencontre',null,null,'Le Mans','2018-05-05 08:15:00',0),
  (5,3,'Je suis joyeux',null,null,'Caen','2018-05-06 20:55:00',0),
  (6,3,'Je suis un gros boloss',null,null,'Caen','2018-05-06 07:15:00',0)
  ;


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

insert into comment values 
  (1,2,2,'Moi Johann j adore aussi ce reseau social du turfu, c est vraiment un truc de ouf','2018-05-04 11:05:00'),
  (2,3,3,'J aimerais tellement etre ton ami','2018-05-05 16:18:00'),
  (3,3,2,'Moi aussi ;)','2018-05-05 17:15:00')
  ;

-- --------------------------------------------------------



--
-- Structure de la table `like`
--

CREATE TABLE IF NOT EXISTS `aime` (
  `IDlike` int(11) AUTO_INCREMENT,
  `IDpublication` int(11) NOT NULL,
  `IDuser` int(11) NOT NULL,
  `emotion` int(11) NOT NULL,
  PRIMARY KEY(IDlike),
  foreign key (IDpublication) references publication (IDpublication) on delete cascade on update cascade,
  foreign key (IDuser) references user (IDuser) on delete cascade on update cascade 
  ) ;

insert into aime values
  (1,1,7,1),
  (2,1,8,2),
  (3,2,2,3),
  (4,2,3,1)
  ;





-- --------------------------------------------------------


--
-- Structure de la table `evenement`
--

CREATE TABLE IF NOT EXISTS `event` (
  `IDevent` int(11) AUTO_INCREMENT,
  `IDuser` int(11) NOT NULL,
  `intitule` text,
  `date` datetime,
  PRIMARY KEY(IDevent),
  foreign key (IDuser) references user(IDuser) on delete cascade on update cascade
);

insert into event values 
  (1,1,'Pot de passation','2018-05-12 17:30:00'),
  (2,7,'Rattrapage de math','2018-05-17 15:30:00'),
  (3,1,'Assemblee generale','2018-05-26 19:45:00')
  ;


-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

CREATE TABLE IF NOT EXISTS `participation` (
  `IDparticipation` int(11) AUTO_INCREMENT,
  `IDevent` int(11) NOT NULL,
  `IDuser` int(11) NOT NULL,
  PRIMARY KEY(IDparticipation),
  foreign key (IDuser) references user (IDuser) on delete cascade on update cascade,
  foreign key (IDevent) references event (IDevent) on delete cascade on update cascade 
  );

insert into participation values
  (1,1,2),
  (2,1,3),
  (3,1,4),
  (4,1,7),
  (5,2,2),
  (6,2,3)
  ;







-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `IDnotif` int(11) AUTO_INCREMENT,
  `IDuser` int(11) NOT NULL,
  `text` text NOT NULL,
  `url` varchar(200),
  `date` datetime NOT NULL,
  `type` int(11),
  PRIMARY KEY(IDnotif),
  foreign key (IDuser) references user (IDuser) on delete cascade on update cascade
  ) ;

insert into notification values
  (1,1,'Vous avez un nouveau message','lol','2018-05-04 10:08:00',1)
  ;


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
