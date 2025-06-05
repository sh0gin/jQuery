-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 05 2025 г., 16:12
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `database_practic2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `block`
--

CREATE TABLE `block` (
  `id` int UNSIGNED NOT NULL,
  `date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_end` datetime DEFAULT NULL,
  `user_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `block`
--

INSERT INTO `block` (`id`, `date_start`, `date_end`, `user_id`) VALUES
(29, '2025-05-19 11:17:33', '2025-05-20 00:00:00', 22),
(30, '2025-05-19 11:17:53', '2025-05-21 00:00:00', 22),
(31, '2025-05-19 11:21:32', '2025-05-19 12:00:00', 22),
(32, '2025-05-19 11:24:22', '2025-05-20 00:00:00', 22),
(33, '2025-05-19 11:30:16', '2025-05-19 00:00:00', 22),
(34, '2025-05-19 11:30:22', '2026-05-19 00:00:00', 22),
(35, '2025-05-19 11:33:30', '2025-05-29 00:00:00', 26),
(36, '2025-05-19 11:47:08', '2025-05-19 00:00:00', 22),
(37, '2025-05-19 11:49:12', '2025-05-19 00:00:00', 22),
(38, '2025-05-19 11:49:46', '2025-05-29 00:00:00', 25),
(39, '2025-05-19 12:23:48', '2025-05-19 00:00:00', 23),
(40, '2025-05-19 12:23:52', '2025-05-23 00:00:00', 23),
(41, '2025-05-19 12:24:26', '2025-05-29 00:00:00', 23),
(42, '2025-05-19 12:24:30', '2025-05-23 00:00:00', 23),
(43, '2025-05-19 12:54:53', NULL, 22),
(44, '2025-05-19 13:19:55', NULL, 22),
(45, '2025-05-19 13:20:50', '2025-05-19 00:00:00', 22),
(46, '2025-05-19 13:21:37', NULL, 22),
(47, '2025-05-19 13:22:24', '2025-05-19 00:00:00', 23),
(48, '2025-05-19 13:24:05', NULL, 22),
(49, '2025-05-19 13:24:35', NULL, 22),
(50, '2025-05-19 13:24:51', NULL, 22),
(51, '2025-05-19 13:24:52', NULL, 22),
(52, '2025-05-19 13:24:58', NULL, 22),
(53, '2025-05-19 13:25:05', NULL, 22),
(54, '2025-05-19 13:25:56', NULL, 22),
(55, '2025-05-19 13:27:15', NULL, 22),
(56, '2025-05-19 13:28:24', NULL, 22),
(57, '2025-05-19 13:28:25', NULL, 22),
(58, '2025-05-19 13:28:29', NULL, 22),
(59, '2025-05-19 13:29:44', NULL, 22),
(60, '2025-05-19 13:29:44', NULL, 22),
(61, '2025-05-19 13:29:45', NULL, 22),
(62, '2025-05-19 13:29:50', NULL, 22),
(63, '2025-05-19 13:31:00', NULL, 22),
(64, '2025-05-19 13:32:37', NULL, 22),
(65, '2025-05-19 13:33:09', NULL, 23),
(66, '2025-05-19 13:33:40', NULL, 11),
(67, '2025-05-19 13:35:47', '2025-05-19 00:00:00', 11),
(68, '2025-05-19 13:35:49', '2025-05-19 00:00:00', 22),
(69, '2025-05-19 13:35:50', '2025-05-19 00:00:00', 23),
(70, '2025-05-19 13:35:51', '2025-05-19 00:00:00', 25),
(71, '2025-05-19 13:35:52', '2025-05-19 00:00:00', 26),
(72, '2025-05-19 13:35:57', '2025-05-23 00:00:00', 26),
(73, '2025-05-19 13:35:58', NULL, 25),
(74, '2025-05-19 13:37:11', '2025-05-23 00:00:00', 11),
(75, '2025-05-19 13:37:24', NULL, 11),
(76, '2025-05-19 13:37:39', '2025-05-19 00:00:00', 11),
(77, '2025-05-19 13:42:45', NULL, 11),
(78, '2025-05-19 13:43:15', '2025-05-19 00:00:00', 11),
(79, '2025-05-19 15:18:23', NULL, 23),
(80, '2025-05-19 21:31:31', '2025-05-20 00:00:00', 23),
(81, '2025-05-29 19:43:36', '2025-05-30 00:00:00', 25),
(82, '2025-05-29 19:43:54', '2025-05-29 00:00:00', 25),
(83, '2025-06-05 07:29:45', NULL, 11),
(84, '2025-06-05 07:30:01', '2025-06-05 00:00:00', 22),
(85, '2025-06-05 07:30:30', '2025-06-15 00:00:00', 22);

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int UNSIGNED NOT NULL,
  `autor_id` int UNSIGNED NOT NULL,
  `post_id` int UNSIGNED NOT NULL,
  `comment_id` int UNSIGNED DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `autor_id`, `post_id`, `comment_id`, `message`, `date`) VALUES
(11, 22, 93, NULL, 'ав', '2025-05-19 07:32:07'),
(12, 22, 93, NULL, 'ыва', '2025-05-19 07:32:09'),
(13, 22, 93, NULL, 'ыва', '2025-05-19 07:32:11'),
(19, 22, 98, NULL, 'asd', '2025-05-21 07:40:53'),
(20, 22, 127, NULL, '23432', '2025-05-26 10:47:34'),
(24, 23, 98, NULL, 'фыв', '2025-05-27 13:28:09'),
(62, 22, 125, NULL, '1', '2025-05-29 13:20:47'),
(80, 22, 125, 62, '2', '2025-05-29 18:16:31'),
(81, 22, 125, NULL, 'sad', '2025-05-29 18:16:33'),
(84, 22, 125, 62, 'dfgg', '2025-05-29 18:17:03'),
(85, 22, 128, NULL, 'hey third user! Greate story! Thank You! :)', '2025-05-29 18:23:37'),
(86, 23, 128, 85, 'Ouuu! Hey second! I like to meet you very match!!!!', '2025-05-29 18:24:27'),
(87, 23, 128, 85, 'I HAVE A BOY!!!', '2025-05-29 18:29:17'),
(89, 26, 128, NULL, 'Purumomputurunt!', '2025-05-29 18:30:30'),
(90, 22, 127, 20, 'ASAs', '2025-05-29 19:40:24'),
(91, 25, 129, NULL, '1234234', '2025-05-29 19:44:16'),
(92, 25, 129, 91, 'ASDASD', '2025-05-29 19:44:19'),
(117, 23, 129, 91, 'asdsad', '2025-05-30 13:13:46'),
(119, 23, 129, NULL, 'asd', '2025-05-30 13:13:54'),
(120, 23, 129, 119, 'asdasd', '2025-05-30 13:13:57'),
(121, 22, 129, NULL, 'sdf', '2025-05-30 16:08:48'),
(122, 22, 129, 121, 'dsf', '2025-05-30 16:08:51'),
(123, 22, 129, 121, '1237', '2025-05-30 16:08:56'),
(124, 35, 131, NULL, 'fsdg', '2025-06-01 10:08:10'),
(126, 35, 131, NULL, 'sdf', '2025-06-01 10:08:16'),
(127, 35, 131, NULL, 'sdfsdf', '2025-06-01 10:08:20'),
(128, 35, 131, 127, '123123', '2025-06-01 10:08:24');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int UNSIGNED NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `image`, `post_id`) VALUES
(1, 'image/person_4', 98),
(2, 'images/photo_2024-12-28_12-50-05.jpg', 98),
(3, 'images/photo_2024-12-28_12-50-05.jpg', 98),
(4, 'images/photo_2024-11-18_13-43-55.jpg', 98),
(5, 'images/IMG-20241109-WA0068.jpg', 98),
(6, 'images/IMG-20241109-WA0091.jpg', 120),
(7, 'images/photo_2024-12-28_12-50-05.jpg', 129),
(8, 'images/Снимок экрана 2025-01-02 020550.png', 127),
(9, 'images/localhost.7z', 130),
(10, 'images/egor_me.png', 131);

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int UNSIGNED NOT NULL,
  `autor_id` int UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `preview` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `autor_id`, `date`, `content`, `title`, `preview`) VALUES
(93, 22, '2025-05-19 07:22:22', '1', '1', '1'),
(94, 22, '2025-05-19 07:22:25', '2', '2', '2'),
(95, 22, '2025-05-19 07:22:30', '3', '3', '3'),
(96, 22, '2025-05-19 07:22:33', '4', '4', '4'),
(97, 22, '2025-05-19 07:22:37', '5', '5', '5'),
(98, 22, '2025-05-19 07:22:41', '6', '6', '6'),
(99, 22, '2025-05-19 07:22:45', '7', '7', '7'),
(119, 22, '2025-05-26 10:46:36', '2', '8', '2'),
(120, 22, '2025-05-26 10:46:42', '2', '9', '2'),
(121, 22, '2025-05-26 10:46:47', '4', '10', '4'),
(122, 22, '2025-05-26 10:46:51', '5', '11', '5'),
(123, 22, '2025-05-26 10:46:55', '6', '12', '6'),
(124, 22, '2025-05-26 10:47:00', '7', '13', '7'),
(125, 22, '2025-05-26 10:47:05', '8', '14', '8'),
(127, 22, '2025-05-26 10:47:31', '4', '16213123', '4'),
(128, 23, '2025-05-26 11:34:33', '3', '3', '3'),
(129, 26, '2025-05-29 18:31:08', 'Content here! Photo:', 'Title', 'Previes'),
(130, 22, '2025-05-30 16:17:20', '0', '0', '0'),
(131, 22, '2025-05-30 16:23:26', 'ыфв', 'ывыв', 'ыв');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int UNSIGNED NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `surname`, `patronymic`, `name`, `email`, `password`, `token`, `role`) VALUES
(11, '123', '123', '123', '123', 'adasd@m', '$2y$10$7xct23yXb61O/UkJzT6mWOQYDJGPu795Syj464lskGOKxjcxavbF2', NULL, 0),
(21, '1', '1', '1', '1', '1@1', '$2y$10$MWlS65vIXgxROjqS1b/ATeinyXF3h63Qg1xgcczXghFuXVZVumegq', NULL, 1),
(22, '2', '2', '2', '2', '2@2', '$2y$10$7/g.ATXs.AuKJ0XLfGo8aOSISqm86Kq5y8XjFk4TzWCxHDYB78gbu', NULL, 0),
(23, '3', '3', '3', '3', '3@3', '$2y$10$oLBjCi1shYsDJ7Y8DWQ0Ne04VSPPYI5SUGVl.1aHyfHOtCTRNh4Vy', '922a14af1fc75d5bca8a77e87135ca99', 0),
(24, '5', '5', '5', '5', '5@5', '$2y$10$jpO52xCopTMjcPRGQj/AiehGCBHYpxgJjEt66tqNoueD6jol3V6Tq', NULL, 1),
(25, '6', '6', '6', '6', '6@6', '$2y$10$2ONkgb7MquJegveaHORSj.LqirvLtJrptyH57vRT56ePNTr3cG.qe', NULL, 0),
(26, '7', '7', '7', '7', '7@7', '$2y$10$qKqg7caGGrAz0QRjJh5hQuNdf0Dx1eT6/FG7S1Bp/KdZwtpKB96cu', NULL, 0),
(27, '8', '8', '8', '8', '8@8', '$2y$10$fdPitZNqhdSwYmm.BV7hF.bMCkMNhHB/bXpFPYUuBZriBCEkc5DWm', NULL, 0),
(28, '9', '9', '9', '9', '9@9', '$2y$10$K12SL3UKCH/rwTBE/WIWq.BxypDfIOzP6tt/P1GD7dXFFE2Kkrbjm', NULL, 0),
(33, '22', '[]', ' 22', '[]', '22@22', '$2y$10$65Q2Gg864UrbmzGKn7utO.2dasxcvENiXI4n.uOTXLAgNZfcq8r2q', NULL, 0),
(34, 'CAT', 'Cat@mail', 'Cat@mail', 'Cat@mail', 'Cat@mail', '$2y$10$4XeIEtDkgWJXqO141nTpLOZPNdOZk0xMOfxszfoOaX/3P38Yg2moO', NULL, 0),
(35, '0', '0', '0', '0', '0@0', '$2y$10$X6Ky8i/M3/RDR45KSYEXAOZ1NFv77WZzQsbkzmOJZVtwAsk9J9Hzu', NULL, 0),
(36, 'admin', '', '', '0', '', '$2y$10$acg93VDAgSmzfvBK7Tn8ruY/.7QY6A/c1a1j9v.5tJuzDiMzkc57G', NULL, 0),
(37, 'user', 'ggfdsgfg', 'sgfsdgf', 'df', 'u@u.com', '$2y$10$Pch4oY7pXDFKz4vi8pVCc.sjk4mscsSk6D4.k4AwrqWFYfCFY8uEi', NULL, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor_id` (`autor_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `obj_id` (`comment_id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor_id` (`autor_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `block`
--
ALTER TABLE `block`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `block`
--
ALTER TABLE `block`
  ADD CONSTRAINT `block_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`autor_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`autor_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
