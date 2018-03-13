-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 13 2018 г., 10:37
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `buy_products`
--

CREATE TABLE `buy_products` (
  `buy_id` int(11) NOT NULL,
  `buy_id_order` int(50) NOT NULL,
  `buy_id_product` int(50) NOT NULL,
  `buy_count_product` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `buy_products`
--

INSERT INTO `buy_products` (`buy_id`, `buy_id_order`, `buy_id_product`, `buy_count_product`) VALUES
(1, 1, 10, 1),
(2, 1, 11, 3),
(3, 1, 12, 1),
(4, 2, 10, 1),
(5, 2, 11, 6),
(6, 2, 34, 1),
(7, 3, 7, 2),
(8, 3, 6, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_id_product` int(255) NOT NULL,
  `cart_price` int(255) NOT NULL,
  `cart_count` int(255) NOT NULL DEFAULT '1',
  `cart_datetime` datetime NOT NULL,
  `cart_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_id_product`, `cart_price`, `cart_count`, `cart_datetime`, `cart_ip`) VALUES
(8, 6, 499, 3, '2017-12-31 14:43:21', '127.0.0.1'),
(9, 40, 271, 2, '2017-12-31 14:51:05', '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`cat_id`, `category`) VALUES
(1, 'БОСОНОЖКИ'),
(2, 'СПОРТ'),
(3, 'БОДИКИ'),
(4, 'КЕПКИ'),
(5, 'ФУТБОЛКИ');

-- --------------------------------------------------------

--
-- Структура таблицы `color`
--

CREATE TABLE `color` (
  `col_id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `color`
--

INSERT INTO `color` (`col_id`, `color`) VALUES
(3, 'бежевый'),
(8, 'белый'),
(9, 'голубой'),
(10, 'жёлтый'),
(11, 'зелёный'),
(2, 'коричневый'),
(5, 'красный'),
(4, 'разноцветный'),
(7, 'серый'),
(1, 'синий'),
(6, 'чёрный');

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `cou_id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`cou_id`, `country`) VALUES
(9, 'Австралия'),
(4, 'Бразилия'),
(10, 'галапагоси'),
(5, 'Германия'),
(8, 'Индия'),
(6, 'Италия'),
(7, 'Польша'),
(3, 'Турция'),
(2, 'Украина'),
(1, 'Финляндия');

-- --------------------------------------------------------

--
-- Структура таблицы `material`
--

CREATE TABLE `material` (
  `mat_id` int(11) NOT NULL,
  `material` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `material`
--

INSERT INTO `material` (`mat_id`, `material`) VALUES
(1, 'кожа'),
(6, 'нейлон'),
(3, 'нубук'),
(5, 'полиестр'),
(2, 'полимер'),
(4, 'хлопок');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_datetime` datetime NOT NULL,
  `order_confirmed` varchar(10) NOT NULL DEFAULT 'no',
  `order_dostavka` varchar(255) NOT NULL,
  `order_fio` text NOT NULL,
  `order_address` text NOT NULL,
  `order_phone` varchar(50) NOT NULL,
  `order_note` text NOT NULL,
  `order_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `order_datetime`, `order_confirmed`, `order_dostavka`, `order_fio`, `order_address`, `order_phone`, `order_note`, `order_email`) VALUES
(2, '2017-10-23 13:38:59', 'yes', 'Курьером', 'гшрнтошгтьд', '', '', '', ''),
(3, '2017-12-31 14:44:05', 'yes', 'Курьером', 'Гулько', 'гнабплгпрл', '5676898', '5кглбшглпм', 'люгпблгпбмои');

-- --------------------------------------------------------

--
-- Структура таблицы `reg_admin`
--

CREATE TABLE `reg_admin` (
  `admin_id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reg_admin`
--

INSERT INTO `reg_admin` (`admin_id`, `login`, `pass`) VALUES
(1, 'voldemar', 'vova2102');

-- --------------------------------------------------------

--
-- Структура таблицы `size`
--

CREATE TABLE `size` (
  `si_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `size`
--

INSERT INTO `size` (`si_id`, `size`) VALUES
(7, '104'),
(8, '122'),
(6, '128'),
(19, '140'),
(9, '164'),
(5, '19'),
(3, '22'),
(1, '27'),
(2, '30'),
(4, '32'),
(15, '42'),
(16, '46'),
(14, '48'),
(17, '53'),
(13, '62'),
(11, '68'),
(12, '74'),
(10, '80'),
(18, '92');

-- --------------------------------------------------------

--
-- Структура таблицы `table_products`
--

CREATE TABLE `table_products` (
  `products_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(255) NOT NULL,
  `country` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `material` varchar(20) NOT NULL,
  `size` varchar(10) NOT NULL,
  `num` int(4) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `country_id` int(10) NOT NULL,
  `Cl` int(10) NOT NULL,
  `M` int(10) NOT NULL,
  `S` int(10) NOT NULL,
  `visible` int(11) NOT NULL,
  `new` int(11) NOT NULL,
  `leader` int(11) NOT NULL,
  `sale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `table_products`
--

INSERT INTO `table_products` (`products_id`, `image`, `title`, `price`, `category`, `country`, `color`, `material`, `size`, `num`, `cat_id`, `country_id`, `Cl`, `M`, `S`, `visible`, `new`, `leader`, `sale`) VALUES
(1, 'lapsi.png', 'Босоножки Lapsi', 707, 'БОСОНОЖКИ', 'Финляндия', 'синий', 'кожа', '27', 30, 1, 1, 1, 1, 1, 1, 1, 0, 0),
(2, 'bear_sport.png', 'BEAR SPORT', 850, 'СПОРТ', 'Италия', 'красный', 'хлопок', '128', 10, 2, 6, 5, 4, 6, 1, 1, 1, 1),
(3, '3.png', 'Бодик VICTORY', 170, 'БОДИКИ', 'Украина', 'белый', 'хлопок', '80', 42, 3, 2, 8, 4, 10, 1, 1, 1, 1),
(4, '7.png', 'Кепка RIDERS', 190, 'КЕПКИ', 'Польша', 'синий', 'хлопок', '48', 18, 4, 7, 2, 4, 14, 1, 1, 0, 1),
(5, 'natal.png', 'Футболка НАТА ЛЮКС', 83, 'ФУТБОЛКИ', 'Украина', 'чёрный', 'хлопок', '122', 32, 5, 2, 6, 4, 8, 1, 1, 1, 1),
(6, 'arial.png', 'Босоножки Arial', 499, 'БОСОНОЖКИ', 'Украина', 'синий', 'кожа', '30', 547, 1, 2, 2, 1, 2, 1, 0, 1, 0),
(7, 'arial_red.png', 'Босоножки Arial', 499, 'БОСОНОЖКИ', 'Украина', 'синий', 'полимер', '30', 540, 1, 2, 2, 2, 2, 1, 0, 0, 1),
(8, 'theo.png', 'Босоножки Theo Leo', 802, 'БОСОНОЖКИ', 'Турция', 'коричневый', 'нубук', '22', 29, 1, 3, 2, 3, 3, 1, 0, 0, 1),
(9, 'lip.png', 'Босоножки \"Две липучки\"', 555, 'БОСОНОЖКИ', 'Украина', 'бежевый', 'кожа', '32', 57, 1, 2, 3, 1, 4, 1, 0, 0, 0),
(10, 'k-s.png', 'Босоножки коричнево-серые', 722, 'БОСОНОЖКИ', 'Бразилия', 'разноцветный', 'полимер', '30', 60, 1, 4, 4, 2, 2, 1, 1, 0, 0),
(11, '2.png', 'Босоножки FASHION', 765, 'БОСОНОЖКИ', 'Украина', 'синий', 'кожа', '22', 109, 1, 2, 1, 1, 3, 1, 0, 1, 0),
(12, '1.png', 'Босоножки SPORT', 650, 'БОСОНОЖКИ', 'Германия', 'коричневый', 'полимер', '19', 61, 1, 5, 2, 2, 5, 1, 0, 0, 0),
(13, 'losangeles.png', 'LOSANGELLES', 680, 'СПОРТ', 'Италия', 'синий', 'хлопок', '104', 80, 2, 6, 2, 4, 7, 1, 0, 0, 1),
(14, 'val_tex.png', 'VALERY-TEX', 518, 'СПОРТ', 'Украина', 'чёрный', 'хлопок', '122', 61, 2, 2, 6, 4, 8, 1, 0, 0, 0),
(15, 'happy_h.png', 'HAPPY HOUSE', 570, 'СПОРТ', 'Польша', 'серый', 'полимер', '122', 42, 2, 7, 7, 2, 8, 1, 1, 0, 0),
(16, 'ready.png', 'READY', 675, 'СПОРТ', 'Италия', 'серый', 'хлопок', '164', 6, 2, 6, 7, 4, 9, 1, 0, 0, 0),
(17, 'trb.png', 'TR-b', 961, 'СПОРТ', 'Индия', 'синий', 'хлопок', '122', 9, 2, 8, 2, 4, 8, 1, 1, 1, 1),
(18, '4.png', 'BEARS', 650, 'СПОРТ', 'Украина', 'красный', 'полиестр', '104', 58, 2, 2, 5, 5, 7, 1, 1, 0, 0),
(19, '5.png', 'ACTIV GYM', 650, 'СПОРТ', 'Польша', 'красный', 'полиестр', '104', 93, 2, 7, 5, 5, 7, 1, 0, 0, 0),
(20, '9.png', 'Бодик 1973', 180, 'БОДИКИ', 'Украина', 'белый', 'хлопок', '68', 198, 3, 2, 8, 4, 11, 1, 0, 1, 0),
(21, 'smil.png', 'Бодик SMIL', 170, 'БОДИКИ', 'Украина', 'синий', 'хлопок', '74', 93, 3, 2, 2, 4, 12, 1, 0, 1, 0),
(22, 'm&m.png', 'Бодик Miyo&Miyo', 252, 'БОДИКИ', 'Турция', 'белый', 'хлопок', '62', 18, 3, 3, 8, 4, 13, 1, 1, 0, 0),
(23, 'flexi.png', 'Бодик FLEXI', 168, 'БОДИКИ', 'Турция', 'разноцветный', 'хлопок', '68', 68, 3, 3, 4, 4, 11, 1, 1, 0, 0),
(24, 'smilp.png', 'Бодик SMIL', 210, 'БОДИКИ', 'Украина', 'разноцветный', 'полиестр', '68', 51, 3, 2, 4, 5, 11, 1, 0, 0, 0),
(25, 'gard_b.png', 'Бодик GARD', 189, 'БОДИКИ', 'Украина', 'синий', 'хлопок', '68', 40, 3, 2, 2, 4, 11, 1, 0, 1, 0),
(26, 'medv.png', 'Бодик \"Медвеженок\"', 121, 'БОДИКИ', 'Украина', 'голубой', 'полиестр', '80', 82, 3, 2, 9, 5, 10, 1, 0, 1, 0),
(27, 'ny.png', 'Кепка NY', 167, 'КЕПКИ', 'Украина', 'серый', 'хлопок', '42', 712, 4, 2, 7, 4, 15, 1, 1, 1, 1),
(28, 'mynzh.png', 'Кепка \"Миньон\"', 172, 'КЕПКИ', 'Украина', 'жёлтый', 'хлопок', '42', 56, 4, 2, 10, 4, 15, 1, 0, 1, 0),
(29, 'minch.png', 'Кепка \"Миньон\"', 174, 'КЕПКИ', 'Украина', 'чёрный', 'хлопок', '46', 59, 4, 2, 6, 4, 16, 1, 1, 0, 0),
(30, 'traum_star.png', 'Кепка TRAUM', 174, 'КЕПКИ', 'Украина', 'синий', 'хлопок', '48', 61, 4, 2, 2, 4, 14, 1, 0, 1, 0),
(31, 'little_b.png', 'Кепка LITTLE BEAR', 180, 'КЕПКИ', 'Польша', 'зелёный', 'хлопок', '48', 74, 4, 7, 11, 4, 14, 1, 0, 0, 0),
(32, 'rep.png', 'Кепка REPORTER', 324, 'КЕПКИ', 'Польша', 'белый', 'полиестр', '53', 49, 4, 7, 8, 5, 17, 1, 0, 1, 0),
(33, 'pia_it.png', 'Кепка PIAZA ITALIA', 350, 'КЕПКИ', 'Италия', 'белый', 'хлопок', '53', 10, 4, 6, 8, 4, 17, 1, 0, 0, 0),
(34, 'silvers.png', 'Футболка SILVER SUN', 409, 'ФУТБОЛКИ', 'Турция', 'жёлтый', 'хлопок', '92', 19, 5, 3, 10, 4, 18, 1, 0, 0, 0),
(35, 'banz.png', 'Футболка BANZ', 394, 'ФУТБОЛКИ', 'Австралия', 'разноцветный', 'нейлон', '92', 31, 5, 9, 4, 6, 18, 1, 0, 0, 1),
(36, 'piait.png', 'Футболка PIAZA ITALIA', 210, 'ФУТБОЛКИ', 'Италия', 'белый', 'хлопок', '68', 62, 5, 6, 8, 4, 11, 1, 0, 0, 0),
(37, 'sils.png', 'Футболка SILVER SUN', 345, 'ФУТБОЛКИ', 'Турция', 'разноцветный', 'хлопок', '140', 50, 5, 3, 4, 4, 19, 1, 0, 0, 1),
(38, 'sill.png', 'Футболка SILVER SUN', 225, 'ФУТБОЛКИ', 'Турция', 'серый', 'хлопок', '92', 16, 5, 3, 7, 4, 18, 1, 0, 0, 0),
(39, 'silg.png', 'Футболка SILVER SUN', 409, 'ФУТБОЛКИ', 'Турция', 'голубой', 'хлопок', '128', 9, 5, 3, 9, 4, 6, 1, 0, 1, 0),
(40, 'nyc.png', 'Футболка NYC', 271, 'ФУТБОЛКИ', 'Турция', 'белый', 'хлопок', '128', 17, 5, 3, 8, 4, 6, 1, 0, 0, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `buy_products`
--
ALTER TABLE `buy_products`
  ADD PRIMARY KEY (`buy_id`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Индексы таблицы `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`col_id`),
  ADD UNIQUE KEY `color` (`color`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`cou_id`),
  ADD UNIQUE KEY `country` (`country`);

--
-- Индексы таблицы `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`mat_id`),
  ADD UNIQUE KEY `material` (`material`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `reg_admin`
--
ALTER TABLE `reg_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Индексы таблицы `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`si_id`),
  ADD UNIQUE KEY `size` (`size`);

--
-- Индексы таблицы `table_products`
--
ALTER TABLE `table_products`
  ADD PRIMARY KEY (`products_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `buy_products`
--
ALTER TABLE `buy_products`
  MODIFY `buy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `color`
--
ALTER TABLE `color`
  MODIFY `col_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `cou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `material`
--
ALTER TABLE `material`
  MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `reg_admin`
--
ALTER TABLE `reg_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `size`
--
ALTER TABLE `size`
  MODIFY `si_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `table_products`
--
ALTER TABLE `table_products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
