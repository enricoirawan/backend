-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 10:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `comment_username` varchar(255) NOT NULL,
  `comment_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comments_id`, `movie_id`, `comment_username`, `comment_text`) VALUES
(1, 9, 'rico', 'Film ini sangat meneggangkan tapi layak untuk ditonton'),
(2, 9, 'Ariel', 'Lumayan bagus sebagai hiburan dikala bosan'),
(3, 9, 'Leonard', 'Saya penggemar film ini'),
(4, 9, 'Anon', 'Bagus'),
(5, 9, 'Anon', 'Nice'),
(6, 16, 'anon', 'Ngeri-ngeri sedap ini film hahaha'),
(7, 16, 'anon', 'Menghibur'),
(8, 16, 'anon', 'Lumayan'),
(9, 16, 'Hana', 'Bikin nagntuk'),
(10, 11, 'Anon', 'Film yang menegangkan'),
(11, 11, 'Dimas', 'Salah satu film godzilla terbaik sepanjang masa'),
(12, 13, 'Anon', 'Animasi bertarungnya keren'),
(13, 13, 'Galih', 'Pengen punya lightsaber juga'),
(14, 16, 'Anon', 'Oppa nya ganteng-ganteng'),
(15, 14, 'Anon', 'CGI nya bagus'),
(16, 17, 'Enrico', 'Film yang sangat mengharukan'),
(17, 11, 'Anon', 'Salah satu yang terbaik dari Produksi Tohou'),
(18, 13, 'Anon', 'Menarik'),
(19, 16, 'Enrico', 'Takut nonton nya');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `movie_description` text NOT NULL,
  `movie_image` varchar(255) NOT NULL,
  `movie_category` varchar(255) NOT NULL,
  `date_release` date NOT NULL,
  `movie_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_name`, `movie_description`, `movie_image`, `movie_category`, `date_release`, `movie_rating`) VALUES
(9, 'King Kong', 'Carl Denham needs to finish his movie and has the perfect location; Skull Island. But he still needs to find a leading lady. This \'soon-to-be-unfortunate\' soul is Ann Darrow. No one knows what they will encounter on this island and why it is so mysterious, but once they reach it, they will soon find out. Living on this hidden island is a giant gorilla and this beast now has Ann is its grasps. Carl and Ann\'s new love, Jack Driscoll must travel through the jungle looking for Kong and Ann, whilst avoiding all sorts of creatures and beasts. But Carl has another plan in mind. Written by Film Fan', 'kingkong.jpg', 'Action', '2021-02-25', 5),
(11, 'Shin Godzilla', 'Japan is plunged into chaos upon the appearance of a giant monster.\r\n\r\nAn unknown accident occurs in Tokyo Bay\'s Aqua Line, which causes an emergency cabinet to assemble. All of the sudden, a giant creature immediately appears, destroying town after town with its landing reaching the capital. This mysterious giant monster is named \"Godzilla\".\r\n\r\nNuclear waste and carlessness of man mutate a gilled creature in the Tokyo Bay. With social media capturing the footage, the emergency cabinet meets to find out what the creature is and if it will be a threat, but only to say that the creature is so massive it\'s weight would crush it if it came on land. They are proven wrong as the creature comes on land scaring the people of Tokyo and knocking over buildings. The cabinet sends a defence force to eliminate the monster but it evolves and starts overheating with radiation. This causes the monster to run back to the bay, leaving a risk of returning to the cabinet. Later it comes back in its next form and is now taller and indestructable. The cabinet gives it the name \"Godzilla\".', 'shin-godzilla.jpg', 'Action', '2021-02-17', 4),
(13, 'Starwars', 'While the First Order continues to ravage the galaxy, Rey finalizes her training as a Jedi. But danger suddenly rises from the ashes as the evil Emperor Palpatine mysteriously returns from the dead. While working with Finn and Poe Dameron to fulfill a new mission, Rey will not only face Kylo Ren once more, but she will also finally discover the truth about her parents as well as a deadly secret that could determine her future and the fate of the ultimate final showdown that is to come.', 'starwars.jpg', 'Action', '2019-06-13', 5),
(14, 'Jurasicc Park', 'Huge advancements in scientific technology have enabled a mogul to create an island full of living dinosaurs. John Hammond has invited four individuals, along with his two grandchildren, to join him at Jurassic Park. But will everything go according to plan? A park employee attempts to steal dinosaur embryos, critical security systems are shut down and it now becomes a race for survival with dinosaurs roaming freely over the island.', 'jurasic-park.jpg', 'Horror', '2020-08-20', 5),
(16, 'Parasite 2020', 'The Kims - mother and father Chung-sook and Ki-taek, and their young adult offspring, son Ki-woo and daughter Ki-jung - are a poor family living in a shabby and cramped half basement apartment in a busy lower working class commercial district of Seoul. Without even knowing it, they, especially Mr. and Mrs. Kim, literally smell of poverty. Often as a collective, they perpetrate minor scams to get by, and even when they have jobs, they do the minimum work required. Ki-woo is the one who has dreams of getting out of poverty by one day going to university. Despite not having that university education, Ki-woo is chosen by his university student friend Min, who is leaving to go to school, to take over his tutoring job to Park Da-hye, who Min plans to date once he returns to Seoul and she herself is in university. The Parks are a wealthy family who for four years have lived in their modernistic house designed by and the former residence of famed architect Namgoong. While Mr. and Mrs. Park ', 'parasite.jpg', 'Horror', '2019-07-25', 5),
(17, 'Titanic', '84 years later, a 100 year-old woman named Rose DeWitt Bukater tells the story to her granddaughter Lizzy Calvert, Brock Lovett, Lewis Bodine, Bobby Buell and Anatoly Mikailavich on the Keldysh about her life set in April 10th 1912, on a ship called Titanic when young Rose boards the departing ship with the upper-class passengers and her mother, Ruth DeWitt Bukater, and her fiancé, Caledon Hockley. Meanwhile, a drifter and artist named Jack Dawson and his best friend Fabrizio De Rossi win third-class tickets to the ship in a game. And she explains the whole story from departure until the death of Titanic on its first and last voyage April 15th, 1912 at 2:20 in the morning.', 'titanic.jpg', 'Romance', '1997-02-12', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`) VALUES
(1, 'admin', 'admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
