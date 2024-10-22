-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 22, 2024 at 06:52 PM
-- Server version: 5.7.31
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_published` tinyint(1) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  `category` varchar(100) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `title`, `content`, `image_url`, `created_at`, `updated_at`, `is_published`, `views`, `category`, `tags`) VALUES
(5, 1, 'The Impact of Remote Work on Mental Health', 'This article investigates the psychological effects of remote work on employees. This article investigates the psychological effects of remote work on employees.', '/uploads/the-future.png', '2024-10-12 23:53:31', '2024-10-12 23:53:31', 1, 0, 'Knowledge', 'Education , Science , Exciting , Future'),
(6, 1, 'Be Busy, Not Hurried', 'â€œGood! But busy.â€ â€œTired, but good!â€ Itâ€™s amazing how many of our answers are some sort of combination of â€œgoodâ€ and â€œbusyâ€ as if those two go together like peanut butter and jelly. We wear busyness as a badge of honor. But is it? I guess that depends. After all, I think a more precise word people mean is â€œhurried.â€ Think about what the word â€œdisorderâ€ even means. It is literally when things are out of order. The quality of our life is diminished when we lose the proper order of things. Cosmologists revel at the fine tuning and order we find in the universe. What would happen if the universe became disordered overnight? Our cosmos would become a chaos and all life would cease to be! Thatâ€™s how important order isâ€¦ our very existence depends on order. Disorder is no joking matter! Yet, often we try to learn to cope with our disordered lives instead of having a severe wake-up call to re-order them so that we can thrive again.', '/uploads/be-busy.jpg', '2024-10-13 01:05:12', '2024-10-13 01:05:12', 1, 0, 'Science', 'Life-style ,Education , Science , Exciting , Future'),
(7, 1, 'What Makes the Difference in How We Process the Past?', 'Itâ€™s truly amazing how much power the past can have in influencing our present lives. The past can be full of lessons learned, or hindrances that hold us back, even today! sometimes we are the main character in the drama of our lives, but other times, we are simply supporting characters in the drama someone else has created. But it touches us just the same, and before we can launch forward into the future, we have to take the time to process the pain of the past.', '/uploads/past.jpg', '2024-10-13 01:15:45', '2024-10-13 01:15:45', 1, 0, 'Science', 'Life-style ,Education , Science , Exciting , Future'),
(8, 1, 'Suffering is Tough, But We Are Too!', 'You can make the right choices and do the right things and still walk into a season of suffering. Why is that? Because suffering comes as surely as the high-tide of the ocean, every person faces it. So what do we do? We may not be able to completely resolve the hardship we face in this life. And maybe we are not supposed to! We may not have all the answers as to â€œwhyâ€ we go through what we do, but we can find hope in what the disciples wrote in response to their suffering.', '/uploads/suffering.jpg', '2024-10-13 01:18:24', '2024-10-13 01:18:24', 1, 0, 'Science', 'Education , Science , Exciting , Future'),
(9, 1, 'Better Communication At Home', 'Effective communication is the cornerstone of a healthy home environment. Whether you live with family, roommates, or a partner, improving communication can lead to stronger relationships and a more harmonious atmosphere. Here are some key strategies to enhance communication at home:', '/uploads/communication.jpg', '2024-10-13 01:20:42', '2024-10-13 01:20:42', 1, 0, 'Education', 'Education , Science , Exciting , Future'),
(10, 1, 'Collaborating Together Despite Our Differences', 'In a world rich with diversity, collaboration often brings together individuals with varying perspectives, backgrounds, and beliefs. While these differences can sometimes pose challenges, they also present unique opportunities for growth and innovation. Here are some key insights on how to collaborate effectively despite our differences:', '/uploads/collabrative.jpg', '2024-10-13 01:22:46', '2024-10-13 01:22:46', 1, 0, 'Education', 'Life-style ,Education , Science , Exciting , Future'),
(11, 1, 'The Power of Fashion: Expressing Yourself Through Style', 'Fashion is more than just clothing; itâ€™s a powerful form of self-expression and creativity. It reflects our personality, values, and even our mood. Hereâ€™s a closer look at the impact of fashion and how it can transform our lives.\r\n\r\n1. Personal Expression\r\nFashion allows individuals to express their unique identities. Through choices in color, style, and accessories, we can communicate who we are without saying a word. Whether you prefer bold patterns or minimalist designs, each outfit tells a story about your personality.\r\n\r\n2. Cultural Significance\r\nFashion often reflects cultural heritage and traditions. Different styles can signify social status, profession, or cultural background. Embracing diverse fashion influences can foster appreciation and understanding of various cultures, promoting inclusivity in the fashion world.\r\n\r\n3. Confidence Boost\r\nWearing clothes that make you feel good can significantly boost your confidence. When you love what you wear, it shows in your demeanor. Fashion can empower you to face the world with self-assurance, making it a vital part of your daily routine.\r\n\r\n4. Trends and Innovation\r\nFashion is ever-evolving, with trends changing seasonally. Designers continuously push boundaries, experimenting with new materials and silhouettes. Staying attuned to fashion trends can inspire creativity and encourage individuals to explore their style.\r\n\r\n5. Sustainability in Fashion\r\nAs awareness of environmental issues grows, sustainable fashion has become increasingly important. Many brands are now focusing on eco-friendly materials and ethical production practices. Choosing sustainable fashion not only benefits the planet but also promotes a more conscious approach to consumption.\r\n\r\n6. Fashion as Art\r\nFashion is often regarded as a form of art. Designers create wearable masterpieces that not only serve a functional purpose but also evoke emotions and inspire. Fashion shows and exhibitions allow us to appreciate the artistry behind the garments and the creativity involved in their creation.\r\n\r\n7. Community and Connection\r\nFashion can foster a sense of community. From social media platforms to local fashion events, individuals can connect over shared interests. Engaging in fashion discussions, sharing outfit inspirations, and supporting local designers can create bonds and build a sense of belonging.\r\n\r\nConclusion\r\nFashion is a dynamic and influential aspect of our lives. It empowers us to express our individuality, embrace cultural diversity, and foster connections with others. By understanding the significance of fashion, we can appreciate its role not only as a means of personal expression but also as a reflection of societal values and trends. So, let your style speak for you and enjoy the art of fashion!', '/uploads/fashion3.jpg', '2024-10-13 01:26:10', '2024-10-13 01:26:57', 1, 0, 'Personal Expression', 'Life-style ,Education , Science , Exciting , Future');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'Ahmed Al-Sanadi', 'ahmed', '123456789', 'ahmed@example.com', '2024-10-09 17:34:36'),
(2, 'Ali Jala', 'ali', '$2y$10$x4VZ9NOiA1KlySl/2XbTMer69T2IlVsVvDjDmbOQL2CVhdE47OpYO', 'ali@example.com', '2024-10-09 17:34:36'),
(3, 'Bob Jones', 'bob_jones', '$2y$10$x4VZ9NOiA1KlySl/2XbTMer69T2IlVsVvDjDmbOQL2CVhdE47OpYO', 'bob@example.com', '2024-10-09 17:34:36'),
(4, 'Carol Lee', 'carol_lee', '$2y$10$x4VZ9NOiA1KlySl/2XbTMer69T2IlVsVvDjDmbOQL2CVhdE47OpYO', 'carol@example.com', '2024-10-09 17:34:36'),
(5, 'Dave Kim', 'dave_kim', '$2y$10$x4VZ9NOiA1KlySl/2XbTMer69T2IlVsVvDjDmbOQL2CVhdE47OpYO', 'dave@example.com', '2024-10-09 17:34:36'),
(6, 'computer', 'dfsd', '$2y$10$x4VZ9NOiA1KlySl/2XbTMer69T2IlVsVvDjDmbOQL2CVhdE47OpYO', 'asf@gmail.com', '2024-10-12 20:09:17'),
(7, 'Yasser Al-Ariqie', 'Yasser', '$2y$10$AhbWYx3ozEyolYnZRDg/lOo19idHHKcAB4pkAhlma4mOI7EFb0UP6', 'Yasser@gmail.com', '2024-10-12 20:10:49'),
(8, 'computers', 'computerss', '$2y$10$tMycQkkBzat8beIo0G8IN.KEib1ye5iom8EkDPawSjnSZS6a7U9rm', 'computers@kk.com', '2024-10-12 20:33:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
