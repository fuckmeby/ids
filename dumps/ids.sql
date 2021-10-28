-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 28 2021 г., 23:03
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ids`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clans`
--

CREATE TABLE `clans` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clans`
--

INSERT INTO `clans` (`id`, `name`) VALUES
(1, 'DJA');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `kills` int(11) NOT NULL,
  `deaths` int(11) NOT NULL,
  `tournaments` int(11) NOT NULL,
  `flags` int(11) NOT NULL,
  `clan_id` int(11) NOT NULL,
  `lvl` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `info` text NOT NULL,
  `banned` int(11) NOT NULL,
  `skin` int(11) NOT NULL,
  `ip` varchar(32) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `kills`, `deaths`, `tournaments`, `flags`, `clan_id`, `lvl`, `money`, `cash`, `info`, `banned`, `skin`, `ip`, `created_at`) VALUES
(1, 'Лев', 'lev@mail.ru', 'qwerty', 1000, 0, 200, 120, 0, 45, 10000, 200, 'Привет', 0, 0, '', '2021-09-29 00:00:00'),
(2, 'Dja', 'dja@mail.ru', 'qwerty', 0, 0, 0, 0, 1, 0, 0, 0, '', 0, 0, '127.0.0.1', '2021-09-29 03:00:00'),
(3, 'dw', 'dw', 'ddw', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', '2021-09-29 18:03:58'),
(4, '123', '12@mail.ru', '123', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '127.0.0.1', '2021-10-28 16:58:00'),
(5, '123', '123@mail.ru', '123', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '127.0.0.1', '2021-10-28 16:59:42'),
(6, '123', '122@mail.ru', '123', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '127.0.0.1', '2021-10-28 17:01:13'),
(7, '1234', '1@mail.ru', '1234', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '127.0.0.1', '2021-10-28 18:16:18');

-- --------------------------------------------------------

--
-- Структура таблицы `users_weapons`
--

CREATE TABLE `users_weapons` (
  `id` int(11) NOT NULL,
  `user_id` int(32) NOT NULL,
  `weapon_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_weapons`
--

INSERT INTO `users_weapons` (`id`, `user_id`, `weapon_id`) VALUES
(1, 2, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `weapons`
--

CREATE TABLE `weapons` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `firing` int(32) NOT NULL,
  `damage` int(32) NOT NULL,
  `recharge` int(32) NOT NULL,
  `cash` int(32) NOT NULL,
  `money` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `weapons`
--

INSERT INTO `weapons` (`id`, `name`, `firing`, `damage`, `recharge`, `cash`, `money`) VALUES
(1, 'Satanizer', 0, 2, 3, 1, 500),
(2, 'DJA weap', 1, 1, 1, 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clans`
--
ALTER TABLE `clans`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_weapons`
--
ALTER TABLE `users_weapons`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `weapons`
--
ALTER TABLE `weapons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clans`
--
ALTER TABLE `clans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users_weapons`
--
ALTER TABLE `users_weapons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `weapons`
--
ALTER TABLE `weapons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
