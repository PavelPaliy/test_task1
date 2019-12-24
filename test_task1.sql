-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 24 2019 г., 14:07
-- Версия сервера: 10.4.10-MariaDB
-- Версия PHP: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_task1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Phones'),
(2, 'Computers'),
(3, 'Tablets'),
(4, 'Printers');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `added` date NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `added`, `category_id`) VALUES
(1, 'LG V30 Plus LS998U 128GB - Black', 450, '2019-12-02', 1),
(2, 'LG Nexus 4 E960', 60, '2019-12-01', 1),
(3, 'Samsung Galaxy S7 Edge Black 32gb Unlocked', 150, '2019-12-03', 1),
(4, 'Samsung Galaxy S7 G930F', 190, '2019-12-22', 1),
(5, 'ASUS ZenBook Pro UX501', 365, '2019-12-21', 2),
(6, 'ASUS X550CA-EB51 LAPTOP INTEL CORE', 32, '2019-11-22', 2),
(7, 'Lenovo Thinkpad X1 Yoga', 255, '2019-12-12', 2),
(8, 'NOTEBOOK LENOVO S145-15AST 15,6 AMD A4-9125 4GB', 200, '2019-12-22', 2),
(9, 'Samsung Galaxy Tab S4 64GB', 100, '2019-12-22', 3),
(10, 'Samsung Galaxy Tab S4 SM-T837V 64GB', 175, '2019-12-13', 3),
(11, 'Samsung Galaxy Tab S5e 64GB', 350, '2019-12-22', 3),
(12, 'Amazon Fire HD 10 32GB', 35, '2019-12-22', 3),
(13, 'Amazon Fire Tablet Model SLO56ZE', 30, '2019-12-17', 3),
(14, 'HP Envy 4520 All-In-One InkJet Printer', 10, '2019-12-22', 4),
(15, 'Lexmark P350 Digital Photo Inkjet Printer', 10, '2019-12-20', 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
