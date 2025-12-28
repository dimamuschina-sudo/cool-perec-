-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 04 2013 г., 21:32
-- Версия сервера: 5.1.68-community-log
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test10`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(500) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `time` int(11) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=39 ;

--
-- Дамп данных таблицы `chat`
--

INSERT INTO `chat` (`id`, `user`, `msg`, `time`) VALUES
(1, '1', 'Привет всем!', 1365688445);

-- --------------------------------------------------------

--
-- Структура таблицы `jurnal`
--

CREATE TABLE IF NOT EXISTS `jurnal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `time` int(11) NOT NULL,
  `chek` int(11) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `jurnal`
--

INSERT INTO `jurnal` (`id`, `user`, `msg`, `time`, `chek`) VALUES
(1, 72, '<b>Бонус:</b> вы получили ежедневный бонус 1<img src="img/medal.png" alt="*" /> и <img src="img/sila.png" alt="*" /> 0.24%', 1356339849, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(20) NOT NULL,
  `password` varchar(33) NOT NULL,
  `money` int(10) NOT NULL,
  `mm` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `time_rast` int(10) NOT NULL,
  `time_sun` int(10) NOT NULL,
  `time_water` int(10) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `online` int(10) NOT NULL,
  `location` varchar(10) NOT NULL,
  `access` int(1) NOT NULL,
  `gift_time` int(11) NOT NULL,
  `time_minimize` int(11) NOT NULL,
  `msg` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nick`, `password`, `money`, `mm`, `name`, `mail`, `time_rast`, `time_sun`, `time_water`, `ip`, `online`, `location`, `access`, `gift_time`, `time_minimize`, `msg`) VALUES
(1, 'Admin', 'a906449d5769fa7361d7ecc6aa3f6d28', 0, 30, '', '', 0, 0, 0, '127.0.0.1', 2147483647, '', 2, 0, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
