-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 08 jan. 2019 à 17:20
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `p4`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `post_id` int(11) NOT NULL,
  `nb_reports` int(11) NOT NULL DEFAULT '0',
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `author`, `post_id`, `nb_reports`, `creation_date`) VALUES
(76, 'test\r\ntest\r\ntest', 'Clément', 3, 0, '2019-01-04 12:00:40'),
(25, 'Super article !', 'Clément', 3, 0, '2018-12-28 11:57:27'),
(29, 'test', '<p>salut</p>', 3, 0, '2018-12-28 13:35:45'),
(33, 'test test', 'test', 3, 0, '2018-12-29 17:59:20'),
(32, 'Super article !', 'clement', 5, 0, '2018-12-29 11:05:07'),
(82, 'test', 'Clément                                                                        ', 3, 0, '2019-01-04 13:04:54'),
(89, '<p>ceci</p><p>est </p><p>un</p><p>test</p>', 'Clément', 2, 0, '2019-01-07 07:36:15');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `author_id`, `creation_date`) VALUES
(1, 'Batman: Shadow of the Bat', 'I just want my phone call.\r\n\r\nI hope you\'re not a member of the fire brigade.\r\n\r\nOoh, you think darkness is your ally? You merely adopted the dark, I was born in it. Molded by it. I didn\'t see the light until I was already a man. By then there was nothing to be but blinded.\r\n\r\nNo guns, no killing.\r\n\r\nNo, no, no. A vigilante is just a man lost in scramble for his own gratification. He can be destroyed or locked up. But if you make yourself more than just a man, if you devote yourself to an idel and if they can\'t stop you then you become something else entirely. Legend, Mr Wayne.', 1, '2018-12-03 09:52:39'),
(2, 'Batman: Legends of the Dark Knight', 'Let me get this straight. You think that your client, one of the wealthiest, most powerful men in the world is secretly a vigilante who spends his nights beating criminals to a pulp with his bare hands and your plan is to blackmail this person? Good luck.\r\n\r\nAre you so desperate to fight criminals that you lock yourself in to take them on one at a time ?\r\n\r\nI\'ll be standing where l belong. Between you and the peopIe of Gotham.\r\n\r\nI seek the means to fight injustice. To turn fear against those who prey on the fearful.\r\n\r\nBats frighten me. It\'s time my enemies shared my dread.', 1, '2018-12-04 09:52:39'),
(3, 'The Dark Knight Rises', 'I can\'t do that as Bruce Wayne... as a man. I\'m flesh and blood. I can be ignored, destroyed. But as a symbol, I can be incorruptible, I can be everlasting.\r\n\r\nNo, no, no, I kill the bus driver.\r\n\r\nI told you I was immortal. Oh there are many forms of immortality.\r\n\r\nSomeone like you. Someone who\'ll rattle the cages.\r\n\r\nOkay. Now... Hardened Kevlar plates over titanium-dipped, tri-weave fibers for flexibility. You\'ll be lighter, faster, more agile.', 1, '2018-12-04 10:50:39'),
(5, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat ex magnam tenetur dolores voluptate fugiat quam soluta aliquid eos iure maxime facilis culpa et error perspiciatis iusto, ullam optio corrupti modi eveniet. Inventore ad tempora, doloremque sunt deserunt impedit obcaecati ipsam harum ducimus est sed, quia, minima eaque, assumenda sequi.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat ex magnam tenetur dolores voluptate fugiat quam soluta aliquid eos iure maxime facilis culpa et error perspiciatis iusto, ullam optio corrupti modi eveniet. Inventore ad tempora, doloremque sunt deserunt impedit obcaecati ipsam harum ducimus est sed, quia, minima eaque, assumenda sequi.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat ex magnam tenetur dolores voluptate fugiat quam soluta aliquid eos iure maxime facilis culpa et error perspiciatis iusto, ullam optio corrupti modi eveniet. Inventore ad tempora, doloremque sunt deserunt impedit obcaecati ipsam harum ducimus est sed, quia, minima eaque, assumenda sequi.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat ex magnam tenetur dolores voluptate fugiat quam soluta aliquid eos iure maxime facilis culpa et error perspiciatis iusto, ullam optio corrupti modi eveniet. Inventore ad tempora, doloremque sunt deserunt impedit obcaecati ipsam harum ducimus est sed, quia, minima eaque, assumenda sequi.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat ex magnam tenetur dolores voluptate fugiat quam soluta aliquid eos iure maxime facilis culpa et error perspiciatis iusto, ullam optio corrupti modi eveniet. Inventore ad tempora, doloremque sunt deserunt impedit obcaecati ipsam harum ducimus est sed, quia, minima eaque, assumenda sequi.\r\n', 1, '2018-12-05 12:52:39'),
(27, 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet</p>', 1, '2018-12-30 15:44:57'),
(28, 'Lorem ipsum dolor sit ametLorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet</p>', 1, '2018-12-30 15:45:03'),
(43, 'test', '<p>test</p>', 1, '2019-01-08 08:17:13');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_pseudo` varchar(100) NOT NULL,
  `user_login` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user_pseudo`, `user_login`, `user_password`) VALUES
(1, 'Jean Forteroche', 'Jeanf', '$2y$10$P71QeH7qYczlwZWCsufSve1rrO0H5icfN3Tk9yggx/KHGPrc5DgfG');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
