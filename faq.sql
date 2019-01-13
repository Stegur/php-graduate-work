-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 10 2019 г., 22:53
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diploma`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_03_192231_create_questions_table', 1),
(4, '2018_09_04_123719_create_sabjects_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(11) NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `is_visible` tinyint(1) NOT NULL DEFAULT '1',
  `login` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `subject_id`, `question`, `answer`, `is_visible`, `login`, `email`, `created_at`, `updated_at`) VALUES
(2, 2, 'Кто был солист группы Queen?', 'Фредди Меркьюри', 1, 'someUser', 'some@mail.com', '2018-12-09 13:16:45', '2018-12-09 13:16:45'),
(3, 2, 'Сколько музыкантов в группе White Stripes?', 'Двое', 1, 'someUser', 'some@mail.com', '2018-12-09 13:17:53', '2018-12-09 13:17:53'),
(4, 3, 'Самая длинная река в Мире?', 'Нил', 1, 'someUser', 'some@mail.com', '2018-12-09 13:22:35', '2018-12-09 13:22:35'),
(5, 3, 'Сколько материков существует в настоящие время?', NULL, 1, 'someUser', 'some@mail.com', '2018-12-09 13:23:22', '2018-12-09 13:23:22'),
(6, 4, 'В каком году умер Юлий Цезарь?', '44 г. до н.э.', 1, 'someUser', 'some@mail.com', '2018-12-09 13:23:57', '2018-12-09 13:23:57'),
(7, 4, 'Кто придумал электрическую лампочку?', 'Томас Эдисон', 0, 'someUser', 'some@mail.com', '2018-12-09 13:24:34', '2018-12-09 13:24:34'),
(8, 5, 'Какое количество элементов в периодической таблице элементов?', '118', 1, 'someUser', 'some@mail.com', '2018-12-09 13:25:10', '2018-12-09 13:25:10'),
(9, 5, 'Как называется самая близкая к нашей планете звезда?', 'Солнце', 1, 'someUser', 'some@mail.com', '2018-12-09 13:26:38', '2018-12-09 13:26:38'),
(10, 4, 'В каком веке жили народность Майя?', NULL, 1, 'someUser', 'some@mail.com', '2018-12-09 13:33:14', '2018-12-09 13:33:14'),
(11, 5, 'Кто придумал Общую теорию относительности?', 'Альберт Эйнштейн', 1, 'someUser', 'some@mail.com', '2018-12-09 13:33:49', '2018-12-09 13:33:49'),
(12, 3, 'На коком материке располагается самая большая пустыня в мире?', 'Африка', 1, 'someUser', 'some@mail.com', '2018-12-09 13:34:37', '2018-12-09 13:34:37'),
(13, 2, 'Какая группа исполнила хит \"The Final Countdown\"?', 'Europe', 1, 'someUser', 'some@mail.com', '2018-12-09 13:35:38', '2018-12-09 13:35:38'),
(14, 6, 'Кто написал произведение \"Капитал\"?', 'Карл Маокс', 1, 'someUser', 'some@mail.com', '2018-12-09 13:36:22', '2018-12-09 13:36:22'),
(15, 8, 'Как называется крупнейшая биржа в мире?', 'Nasdaq', 1, 'someUser', 'some@mail.com', '2018-12-09 13:39:21', '2018-12-09 13:39:21'),
(16, 9, 'Кто самый быстрый спринтер в мире?', 'Усейн Болт', 1, 'someUser', 'some@mail.com', '2018-12-09 13:40:26', '2018-12-09 13:40:26'),
(17, 10, 'Кто написал картину \"Мона Лиза\"?', 'Леонардо да Винчи', 1, 'someUser', 'some@mail.com', '2018-12-09 13:41:00', '2018-12-09 13:41:00'),
(18, 10, 'Представителем какого направления является Клод Моне?', 'Импрессионизм', 1, 'someUser', 'some@mail.com', '2018-12-09 13:41:42', '2018-12-09 13:41:42');

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subjects`
--

INSERT INTO `subjects` (`id`, `body`, `created_at`, `updated_at`) VALUES
(1, 'Другая', '2019-01-10 16:51:12', '2019-01-10 16:51:12'),
(2, 'Музыка', NULL, NULL),
(3, 'География', NULL, NULL),
(4, 'История', NULL, NULL),
(5, 'Наука', NULL, NULL),
(6, 'Литература', NULL, NULL),
(7, 'Политика', NULL, NULL),
(8, 'Финансы', NULL, NULL),
(9, 'Спорт', NULL, NULL),
(10, 'Искусство', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$yFW99kNA171mrllxcBviL.YmSDBayAs7SwTpTAzg67zwUE.HyjzSS', NULL, NULL, NULL),
(3, 'New', 'some@mail.com', '$2y$10$DH9P9V5USOmzJe3t5JySuOyjKo.pxuwQcKmd8ZAJr.f1YOODzS4f6', NULL, '2018-09-26 16:59:17', '2018-09-26 16:59:17');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
