-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 17 juin 2024 à 09:55
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quizza`
--

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int NOT NULL AUTO_INCREMENT,
  `question` varchar(250) NOT NULL,
  `options` varchar(250) NOT NULL,
  `correctAnswer` varchar(150) NOT NULL,
  `level` int NOT NULL,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `options`, `correctAnswer`, `level`, `category`) VALUES
(1, 'Quel est le héros principal de la série The Legend of Zelda ?', 'Mario;Link;Zelda;Samus', '2', 1, 'Video game'),
(2, 'Quel jeu vidéo met en scène des voitures jouant au football ?', 'FIFA;Gran Turismo;Rocket League;Need for Speed', '3', 1, 'Video game'),
(3, 'Dans quel jeu vidéo trouve-t-on l\'île de Banoi ?', 'Far Cry;Dead Island;The Witcher;Assassin\'s Creed', '2', 1, 'Video game'),
(4, 'Quel est le nom du personnage principal de la série Halo ?', 'Master Chief;Cortana;Marcus Fenix;Gordon Freeman', '1', 1, 'Video game'),
(5, 'Quel jeu vidéo a popularisé le genre Battle Royale ?', 'Minecraft;Call of Duty;PUBG;Fortnite', '4', 1, 'Video game'),
(6, 'Dans quel jeu incarne-t-on un tueur à gages nommé Agent 47 ?', 'Hitman;Splinter Cell;Metal Gear Solid;Max Payne', '1', 1, 'Video game'),
(7, 'Quel est le studio de développement derrière le jeu The Witcher 3 ?', 'BioWare;Bethesda;CD Projekt Red;Ubisoft', '3', 1, 'Video game'),
(8, 'Dans quel jeu vidéo peut-on explorer une version fictive de l\'Amérique post-apocalyptique appelée Appalachia ?', 'Fallout 76;Metro Exodus;The Last of Us;Days Gone', '1', 1, 'Video game'),
(9, 'Quel jeu vidéo met en scène une civilisation futuriste attaquée par des créatures extraterrestres appelées les Zergs ?', 'Warcraft;Halo;Mass Effect;Starcraft', '4', 1, 'Video game'),
(10, 'Quel jeu vidéo met en scène des robots géants pilotés par des humains dans des combats intenses ?', 'Overwatch;Titanfall;Apex Legends;Destiny', '2', 1, 'Video game'),
(11, 'Quel est le nom du héros principal de \'One Piece\' ?', 'Monkey D. Luffy;Naruto Uzumaki;Ichigo Kurosaki;Natsu Dragnir', '1', 1, 'Manga'),
(12, 'Dans \'Naruto\', quel est le démon renard à neuf queues scellé en Naruto ?', 'Shukaku;Gyuki;Kurama;Matatabi', '3', 1, 'Manga'),
(13, 'Quel manga met en scène des chasseurs de titans ?', 'Bleach;Attack on Titan;Tokyo Ghoul;Hunter x Hunter', '2', 1, 'Manga'),
(14, 'Qui est le créateur du manga \'Dragon Ball\' ?', 'Eiichiro Oda;Masashi Kishimoto;Tite Kubo;Akira Toriyama', '4', 1, 'Manga'),
(15, 'Dans \'Death Note\', quel est le nom du dieu de la mort qui accompagne Light Yagami ?', 'Rem;Ryuk;Sidoh;Zellogi', '2', 1, 'Manga'),
(16, 'Quel manga suit les aventures d\'un groupe de lycéens piégés dans un jeu mortel appelé \'Gantz\' ?', 'Gantz;Berserk;Parasyte;Tokyo Ghoul', '1', 1, 'Manga'),
(17, 'Dans \'My Hero Academia\', quel est le véritable nom de l\'héroïne Uravity ?', 'Ochaco Uraraka;Momo Yaoyorozu;Tsuyu Asui;Mina Ashido', '1', 1, 'Manga'),
(18, 'Quel manga se déroule dans le monde des alchimistes et suit les frères Elric ?', 'Fullmetal Alchemist;One Piece;Fairy Tail;Bleach', '1', 1, 'Manga'),
(19, 'Dans \'Hunter x Hunter\', quel est le nom du meilleur ami de Gon ?', 'Kurapika;Leorio;Hisoka;Killua', '4', 1, 'Manga'),
(20, 'Quel manga met en scène un jeune homme nommé Eren Jaeger qui veut éliminer tous les titans ?', 'Attack on Titan;Naruto;Dragon Ball;One Punch Man', '1', 1, 'Manga'),
(21, 'Quel film a remporté l\'Oscar du meilleur film en 2020 ?', 'Joker;1917;Parasite;Once Upon a Time in Hollywood', '3', 1, 'movie'),
(22, 'Qui a réalisé le film \'Inception\' sorti en 2010 ?', 'Steven Spielberg;Christopher Nolan;James Cameron;Quentin Tarantino', '2', 1, 'movie'),
(23, 'Dans quel film trouve-t-on le personnage de Jack Dawson ?', 'Titanic;Avatar;Gladiator;The Revenant', '1', 1, 'movie'),
(24, 'Quel est le premier film de la saga Star Wars sorti en 1977 ?', 'Le Retour du Jedi;L\'Empire contre-attaque;La Menace fantôme;Un nouvel espoir', '4', 1, 'movie'),
(25, 'Quel film met en scène un T-Rex et un parc à thème préhistorique ?', 'King Kong;Jurassic Park;Le Monde perdu;Dinotopia', '2', 1, 'movie'),
(26, 'Qui joue le rôle principal dans le film \'Forrest Gump\' ?', 'Tom Hanks;Leonardo DiCaprio;Brad Pitt;Johnny Depp', '1', 1, 'movie'),
(27, 'Quel film d\'animation de Disney met en scène un lion nommé Simba ?', 'Le Roi Lion;Bambi;Mulan;Tarzan', '1', 1, 'movie'),
(28, 'Quel film de Quentin Tarantino raconte l\'histoire de deux gangsters, un boxeur et un couple de braqueurs ?', 'Pulp Fiction;Kill Bill;Reservoir Dogs;Django Unchained', '1', 1, 'movie'),
(29, 'Dans quel film trouve-t-on le personnage de Neo, interprété par Keanu Reeves ?', 'John Wick;Constantine;The Matrix;Speed', '3', 1, 'movie'),
(30, 'Quel film est basé sur l\'histoire vraie du naufrage du Titanic ?', 'A Night to Remember;Poseidon;Titanic;The Abyss', '3', 1, 'movie'),
(31, 'Quel Pokémon est une souris électrique ?', 'Salamèche;Pikachu;Bulbizarre;Carapuce', '2', 1, 'pokemon'),
(32, 'Quel type est le Pokémon Rondoudou ?', 'Eau;Feu;Fée;Électrique', '3', 1, 'pokemon'),
(33, 'Quel Pokémon évolue en Dracaufeu ?', 'Reptincel;Bulbizarre;Carapuce;Roucoups', '1', 1, 'pokemon'),
(34, 'Quel Pokémon est numéro 1 dans le Pokédex ?', 'Bulbizarre;Herbizarre;Florizarre;Salamèche', '1', 1, 'pokemon'),
(35, 'De quelle couleur est Léviator shiny ?', 'Bleu;Rouge;Vert;Jaune', '2', 1, 'pokemon'),
(36, 'Quel Pokémon est connu pour dire \'Carapuce, à l\'attaque\' ?', 'Salamèche;Pikachu;Bulbizarre;Carapuce', '4', 1, 'pokemon'),
(37, 'Quel est le type principal de Dracolosse ?', 'Dragon;Vol;Eau;Feu', '1', 1, 'pokemon'),
(38, 'Quelle est l\'évolution de Pikachu ?', 'Raichu;Evoli;Voltali;Roucarnage', '1', 1, 'pokemon'),
(39, 'Quel Pokémon est le partenaire principal de Sacha dans l\'anime ?', 'Bulbizarre;Pikachu;Carapuce;Salamèche', '2', 1, 'pokemon'),
(40, 'Quel type de Pokémon est Arcanin ?', 'Feu;Eau;Électrique;Plante', '1', 1, 'pokemon');

-- --------------------------------------------------------

--
-- Structure de la table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `quiz_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  PRIMARY KEY (`quiz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `title`) VALUES
(1, 'quizz pokemon'),
(2, 'quizz mix');

-- --------------------------------------------------------

--
-- Structure de la table `quiz_questions`
--

DROP TABLE IF EXISTS `quiz_questions`;
CREATE TABLE IF NOT EXISTS `quiz_questions` (
  `quiz_questions_id` int NOT NULL AUTO_INCREMENT,
  `quiz_id` int NOT NULL,
  `question_id` int NOT NULL,
  PRIMARY KEY (`quiz_questions_id`),
  KEY `quiz_id` (`quiz_id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `quiz_questions`
--

INSERT INTO `quiz_questions` (`quiz_questions_id`, `quiz_id`, `question_id`) VALUES
(1, 1, 31),
(2, 1, 32),
(3, 1, 33),
(4, 1, 34),
(5, 1, 35),
(6, 1, 36),
(7, 1, 37),
(8, 1, 38),
(9, 1, 39),
(10, 1, 40),
(11, 2, 40),
(12, 2, 39),
(13, 2, 1),
(14, 2, 3),
(15, 2, 6),
(16, 2, 10),
(17, 2, 15),
(18, 2, 20),
(19, 2, 18);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quiz_questions_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
