-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 10 2020 г., 21:51
-- Версия сервера: 10.4.6-MariaDB
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userLogin` varchar(256) NOT NULL,
  `userName` varchar(256) NOT NULL,
  `userLastName` varchar(256) NOT NULL,
  `userEmail` varchar(256) NOT NULL,
  `userPhone` varchar(256) NOT NULL,
  `userPswd` varchar(256) NOT NULL,
  `userData` date NOT NULL,
  `Admin` int(3) NOT NULL,
  `fileLink` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`userID`, `userLogin`, `userName`, `userLastName`, `userEmail`, `userPhone`, `userPswd`, `userData`, `Admin`, `fileLink`) VALUES
(19, 'olylokorcheck', 'olylokorcheck', 'olylokorcheck', 'korolyllo@gmai.com', '2147483647', '729023dfd4d3df6ce7d0ce966b2a9a81', '0000-00-00', 0, '../auth/files/instagram.png'),
(27, 'NAME', 'Name', 'Lastname', 'korolyllo@gmai.com', '+380631091415', '729023dfd4d3df6ce7d0ce966b2a9a81', '0000-00-00', 0, '../auth/files/def.jpg'),
(30, 'olylokor', 'olylokor', 'olylokor', 'korolyllo@gmai.com', '+380631091421', '729023dfd4d3df6ce7d0ce966b2a9a81', '0000-00-00', 0, '../auth/files/def.jpg'),
(32, 'Jim', 'Jim', 'Jim', 'Jim@gmai.com', '+380631081414', '729023dfd4d3df6ce7d0ce966b2a9a81', '0000-00-00', 0, '../auth/files/def.jpg'),
(33, 'Kate', 'Kate', 'Katelastname', 'Kate@gmai.com', '+380931071414', 'aeb8aab6af37d064efb8000abed4bee2', '0000-00-00', 0, '../auth/files/Kate.jpg'),
(34, 'Wilyam', 'Wilyam', 'Wilyam', 'Wilyam@gmail.com', '+38093000000', '62692cf523bf1ecc14431957b38b3c83', '0000-00-00', 0, '../auth/files/3-045-06738+f.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
