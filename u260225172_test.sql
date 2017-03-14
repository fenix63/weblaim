
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 14 2017 г., 08:48
-- Версия сервера: 10.0.28-MariaDB
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u260225172_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Books`
--

CREATE TABLE IF NOT EXISTS `Books` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Book_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Author_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `Books`
--

INSERT INTO `Books` (`Id`, `Book_Name`, `Author_Name`) VALUES
(19, 'Алгоритмы и структуры данных', 'Вирт'),
(7, 'книга', 'автор'),
(9, 'Новая книга', 'Новый автор'),
(11, 'hsgege', 'ghdrhr'),
(17, 'рее', 'Нваы'),
(18, 'Книга', 'Автор');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
