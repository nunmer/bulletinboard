-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 25 2021 г., 23:52
-- Версия сервера: 10.4.18-MariaDB
-- Версия PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bulletinboard`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ads`
--

CREATE TABLE `ads` (
  `ad_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `price` varchar(65) NOT NULL,
  `description` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `ads`
--

INSERT INTO `ads` (`ad_id`, `owner_id`, `category_id`, `title`, `photo`, `price`, `description`, `email`, `phone`, `location`) VALUES
(1, 1, 1, 'ТОРТ МУЖСКОЙ ИДЕАЛ ', 'upload/tort-ideal-mujskoi_1568143869_11_max.jpg', '2500', 'Идеальный вариант к сердцу любого мужчины! Попробуйте удивить своего мужчину вот таким мужским тортом. Да и украсить его лучше всего именно в мужском стиле. Торт очень прост в приготовлении и, без сом', 'cakes@email.com', '87758155576', 'Aktobe'),
(2, 1, 1, 'ТОРТ МЕДОВИК', 'upload/tort-medovik-zavarnoi-klassicheskii_1616864229_19_min.jpg', '1800', 'Наивкуснейший, из простых продуктов, на праздничный стол! Торт Медовик заварной классический ароматный настолько, что пока вы будете его готовить, восхитительный запах будет стоять по всей квартире. П', 'cakes@email.com', '87758155576', 'Aktobe'),
(3, 1, 2, 'IPhone 12 PRO MAX', 'upload/692ff62398ac66a761561766d4601e7c00fd9d68_228639_1.jpg', '450 000', 'Купите новый iPhone 12 Pro или iPhone 12 Pro Max от Apple с бесплатной доставкой и возможностью бесплатного возврата.', 'iphone@email.com', '87758155576', 'Aktobe'),
(4, 1, 2, 'Электросамокат Xiaomi', 'upload/scooterPro_12.jpg', '220 000', 'В 2017 году оригинальный электросамокат Xiaomi Mijia Electric Scooter получил престижные премии за выдающийся дизайн, продуманную конструкцию и высокое качество. Сегодня, новый Xiaomi Mijia Electric S', 'a@email.com', '87758155576', 'Aktobe'),
(5, 1, 2, 'IPhone 8 PLUS', 'upload/Apple-iPhone-8-Plus-.jpg', '210 000', 'Cмартфон с iOS 11 экран 5.5\", разрешение 1920x1080 двойная камера 12 МП/12 МП, автофокус память 64 Гб, без слота для карт памяти 3G, 4G LTE', 'a@email.com', '87758155576', 'Aktobe'),
(7, 1, 2, 'Samsung S12', 'upload/s12.png', '390000', 'Доп. скидка за трейд-ин до 8000 ₽,\r\nGalaxy Buds и зарядное устройство в подарок, скидка 50% на Galaxy Watch!', 'a@email.com', '87758155576', 'Aktobe'),
(16, 2, 3, 'Требуется строитель', 'upload/1465554609_1298.jpg', '200 000', '', 'b@email.com', '87478726216', 'Aktobe'),
(17, 2, 4, 'Платье Красное', 'upload/2d92774b6c10e732730c859500dc90cf.jpg', '20 000', '', 'b@email.com', '87478726216', 'Aktobe'),
(18, 2, 4, 'Платье Белое', 'upload/cfd015c5a59c62c89b392eb43eea8e16.jpg', '39000', '', 'b@email.com', '87478726216', 'Aktobe'),
(19, 2, 4, 'Платье Бежевое', 'upload/f0a2aa0f1548b57bd0e0f4e4d97e84d0.jpg', '45000', '', 'b@email.com', '87478726216', 'Aktobe');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Food'),
(2, 'Electronic devices'),
(3, 'Work'),
(4, 'Clothes');

-- --------------------------------------------------------

--
-- Структура таблицы `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `feedbacks`
--

INSERT INTO `feedbacks` (`feedback_id`, `name`, `email`, `subject`, `message`) VALUES
(3, 'Sanzhar', 'a@email.com', 'Like system', 'Please add like system!'),
(4, 'Aseka', 'test@email.com', 'Fix this bug please', 'There is not my ad in my ads panel!');

-- --------------------------------------------------------

--
-- Структура таблицы `liked`
--

CREATE TABLE `liked` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `phone`, `password`) VALUES
(1, 'Sanzhar', 'Yermek', 'a@email.com', '87758155576', '123'),
(2, 'Gulnaz', 'Amanzholova', 'b@email.com', '87478726216', '123'),
(3, 'First name', 'Second name', 'test@email.com', '87758155576', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Индексы таблицы `liked`
--
ALTER TABLE `liked`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ads`
--
ALTER TABLE `ads`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `liked`
--
ALTER TABLE `liked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
