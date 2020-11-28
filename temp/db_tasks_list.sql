-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 28 2020 г., 22:27
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_tasks_list`
--

-- --------------------------------------------------------

--
-- Структура таблицы `T_tasks`
--

CREATE TABLE `T_tasks` (
  `id_task` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `text_task` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `finished` tinyint(1) NOT NULL,
  `edited` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `T_tasks`
--

INSERT INTO `T_tasks` (`id_task`, `username`, `user_email`, `text_task`, `finished`, `edited`) VALUES
(3, 'Кристина', 'bkr@gmail.com', 'Тестирование вывода запросов', 1, 0),
(12, 'Крис', 'bkr@mail.ru', 'Тестирование', 1, 0),
(13, 'Морена', 'morena@list.ru', 'Написать тематический план дня', 0, 0),
(14, 'Алексей', 'mil@mail.ru', 'Заменить блок питания', 1, 1),
(15, 'Дмитрий', 'dimil@bk.ru', 'Проверить сетевой адаптер', 0, 0),
(16, 'Константин', 'igla@gmail.com', 'Проверить кабели в коммутаторе', 0, 0),
(18, 'Николай', 'kolya@bk.ru', 'Написать аналитику по соц опросу', 0, 0),
(19, 'Кристина', 'test@test.com', 'Тестирование обратной связи', 0, 0),
(23, 'test', 'test@test.ru', 'tested', 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `T_tasks`
--
ALTER TABLE `T_tasks`
  ADD PRIMARY KEY (`id_task`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `T_tasks`
--
ALTER TABLE `T_tasks`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
