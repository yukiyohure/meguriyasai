-- -------------------------------------------------------------
-- TablePlus 3.12.4(360)
--
-- https://tableplus.com/
--
-- Database: meguriyasai
-- Generation Time: 2021-02-19 22:05:09.7020
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `buy_data` (
  `id` int NOT NULL AUTO_INCREMENT,
  `buy_day` datetime NOT NULL,
  `user_id` int NOT NULL,
  `vegetable_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `vegitable_id` (`vegetable_id`),
  CONSTRAINT `buy_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `buy_data_ibfk_2` FOREIGN KEY (`vegetable_id`) REFERENCES `vegetables` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `buy_id` int NOT NULL,
  `sender_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sender_id` (`sender_id`),
  KEY `receiver_id` (`receiver_id`),
  KEY `buy_id` (`buy_id`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`),
  CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`buy_id`) REFERENCES `buy_data` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `postal_code` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `created` datetime  default 0,
  `updated` timestamp default current_timestamp on update current_timestamp,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `vegetables` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `trade_place` varchar(255) NOT NULL,
  `amount` int NOT NULL,
  `unit` varchar(2) NOT NULL,
  `description` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `created` datetime  default 0,
  `updated` timestamp default current_timestamp on update current_timestamp,
  `display_flag` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `vegetables_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `buy_data` (`id`, `buy_day`, `user_id`, `vegetable_id`) VALUES
('1', '2021-02-19 21:37:32', '2', '1');

INSERT INTO `users` (`id`, `name`, `postal_code`, `address`, `email`, `password`, `pic`, `created`, `updated`) VALUES
('1', '山田太郎', '1680073', '東京都杉並区下高井戸', 'test@gmail.com', '$2y$10$2ETr4RE1tggLLFAu8CNGw.ehNkEbE7hqj78g5nZhq9Wv6Yik3yOHy', '20210218151546zebra0.jpg', '2021-02-19 00:17:13', '2021-02-19 00:17:13'),
('2', 'ほげ太郎', '1680073', '東京都杉並区下高井戸hogehoge', 'hoge@gmail.com', '$2y$10$LqBunFdm9KbgcjdPG1Ch6.LFpI.HyqGK4a9TUjyxkqlngjnBybh6O', '20210219123659Chris Hemthworth.png', '2021-02-19 21:37:02', '2021-02-19 21:37:02');

INSERT INTO `vegetables` (`id`, `name`, `trade_place`, `amount`, `unit`, `description`, `pic`, `created`, `updated`, `display_flag`, `user_id`) VALUES
('1', 'ライム', 'xx県〇〇市', '3', '0', 'たくさん余ったのでもらってください。', '20210219122919ライム.jpg', '2021-02-19 21:30:47', '2021-02-19 21:30:47', '1', '1'),
('2', 'レモン', '▲▲県■■市', '100', '0', 'めちゃくちゃ美味しいレモンです。', '20210219123933レモン.webp', '2021-02-19 21:39:35', '2021-02-19 21:39:35', '0', '2'),
('3', 'ねぎ', 'どこか県いずこ市', '299', '0', 'ありすぎてネギ臭くなってしまうのであなたもネギ臭くなってしまいなさい', '20210219124302ネギ.jpg', '2021-02-19 21:43:05', '2021-02-19 21:43:05', '0', '1'),
('4', 'なすび', 'どこか県いずこ市', '5', '本', 'なすびの数え方「本」か「個」か迷ったわ。', '20210219124943なすび.webp', '2021-02-19 21:50:33', '2021-02-19 21:50:33', '0', '2');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;