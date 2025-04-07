-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 07 2025 г., 16:37
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
-- База данных: `lib`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `id_author` int NOT NULL,
  `author_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_last_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_patronymic` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id_author`, `author_name`, `author_last_name`, `author_patronymic`) VALUES
(1, 'Михаил', 'Булгаков', 'Афанасьевич'),
(2, 'Николай', 'Гоголь', 'Васильевич'),
(3, 'Александр', 'Пушкин ', 'Сергеевич'),
(4, 'Федор', 'Достоевский ', 'Михайлович'),
(5, 'Лев', 'Толстой ', 'Николаевич'),
(6, 'Иван', 'Тургенев', 'Сергеевич'),
(7, 'Антон', 'Чехов', 'Павлович'),
(8, 'Александр', 'Куприн', 'Иванович'),
(9, 'Рэй', 'Брэдбери', NULL),
(10, 'Джордж', 'Оруэлл', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `author_book`
--

CREATE TABLE `author_book` (
  `id_author_book` int NOT NULL,
  `id_book` int NOT NULL,
  `id_author` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `author_book`
--

INSERT INTO `author_book` (`id_author_book`, `id_book`, `id_author`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE `book` (
  `id_book` int NOT NULL,
  `book_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_year` int NOT NULL,
  `annotation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_pages` int NOT NULL,
  `age_restrictions` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_lang` int NOT NULL,
  `id_publ_office` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`id_book`, `book_name`, `book_img`, `book_year`, `annotation`, `num_pages`, `age_restrictions`, `id_lang`, `id_publ_office`) VALUES
(1, 'Собачье сердце', 'media/uploads/book_cover/dogs_heart.jpg', 1925, 'В эту книгу вошли три повести Михаила Булгакова, настоящие шедевры его фантасмагорической сатиры: \"Роковые яйца\", притягивающие своей причудливостью и остроумием, и оказавшие огромное влияние на множество поколений российских читателей, раздерганное на цитаты, блестяще экранизированное Владимиром Бортко \"Собачье сердце\", а также повесть \"Дьяволиада\", которую литературоведы считают своеобразным эскизом, или наброском к бессмертному роману \"Мастер и Маргарита\".', 352, '12+', 1, 2),
(2, 'Мертвые души', 'media/uploads/book_cover/dead_souls.JPG', 1835, 'Поэма \"Мертвые души\" еще при жизни автора была переведена на множество других языков. Она имела невероятный успех. Никому до Гоголя и после него не удавалось так ярко и остро описать пороки и слабости русского человека, так живо и правдиво отразить важнейшие для России проблемы. Прошло 160 лет, и поэма звучит как только что написанная. Чичиковы, Коробочки, Ноздревы, Плюшкины, Собакевичи — их стремления, чувства, поступки не кажутся нам отголосками прошлого. Современное и острое звучание эти персонажи обретают, когда мы смотрим все новые и новые спектакли и фильмы по этой бессмертной поэме.', 352, '16+', 1, 3),
(3, 'Евгений Онегин', 'media/uploads/book_cover/eugine_onegin.jpg', 1823, 'Пронзительная любовная история, драматические повороты сюжета, тонкий психологизм персонажей, детальное описание быта и нравов той эпохи (не случайно Белинский назвал роман «энциклопедией русской жизни») — в этом произведении, как в зеркале, отразилась вся русская жизнь. «Евгений Онегин» никогда не утратит своей актуальности, и даже спустя два века мы поражаемся точности и верности «ума холодных наблюдений и сердца горестных замет» великого русского поэта. ', 224, '12+', 1, 2),
(4, 'Преступление и наказание', 'media/uploads/book_cover/crime_and_punishment.jpg', 1865, '\"Преступление и наказание\" (1866) — одно из самых значительных произведений в истории мировой литературы. Это и глубокий филососфский роман, и тонкая психологическая драма, и захватывающий детектив, и величественная картина мрачного города, в недрах которого герои грешат и ищут прощения, жертвуют собой и отрекаются от себя ради ближних и находят успокоение в смирении, покаянии, вере. Главный герой романа Родион Раскольников решается на убийство, чтобы доказать себе и миру, что он не \"тварь дрожащая\", а \"право имеет\". Главным предметом исследования писателя становится процесс превращения добропорядочного, умного и доброго юноши в убийцу, а также то, как совершивший преступление Раскольников может искупить свою вину.\r\n\"', 672, '16+', 1, 3),
(5, 'Война и Мир', 'media/uploads/book_cover/war_and_peace.jpg', 1863, ' «Война и мир» — роман‑эпопея Льва Толстого  «Война и мир» — роман‑эпопея Льва Толстого  «Война и мир» — роман‑эпопея Льва Толстого  «Война и мир» — роман‑эпопея Льва Толстого  «Война и мир» — роман‑эпопея Льва Толстого  «Война и мир» — роман‑эпопея Льва Толстого', 960, '12+', 1, 2),
(6, 'Муму', 'media/uploads/book_cover/mumu.jpg', 1852, 'Дворник по имени Герасим работал у барыни, влюбился в прачку Татьяну. Барыня выдала за муж Татьяну за алкоголика Капитона. Герасим спас собачку, назвал её Муму и привязался к ней. Капризная барыня приказала Герасиму жестоко обойтись с собачкой. ', 352, '16+', 1, 3),
(7, 'Человек в футляре', 'media/uploads/book_cover/man_futlar.jpg', 1898, 'Это поучительная история о простом учителе гимназии Беликове. Сей человек добровольно загнал себя самого в футляр, как в физическом смысле — в любую погоду был под зонтом, в калошах, отгораживался от улицы высоким воротником, так и в духовном — всю свою жизнь он проводил отгораживаясь от мира, кутаясь и страшась «Как бы чего не вышло». Но вот коллеги по гимназии, изнуренные его обществом, решили его сосватать, а далее, что же все таки из этого вышло...', 13, '16+', 1, 2),
(8, 'Куст сирени', 'media/uploads/book_cover/lilac_bush.jpg', 1894, 'Алмазов пришел домой расстроенный. Сколько было положено времени и сил, чтобы поступить и учиться в Академии генерального штаба. И вот теперь, из-за пятна зеленой краской на плане, который он делал до трех часов ночи, вся его учеба может пойти прахом...', 11, '12+', 1, 3),
(9, 'Марсианские хроники', 'media/uploads/book_cover/mars.jpg', 1950, 'Первые шаги освоения Марса... Первый контакт с внеземной цивилизацией...\r\n\r\nРассказы-хроники, составляющие роман, наполненные авторскими размышлениями по характерным вопросам существования человечества. За конкретными сюжетными ситуациями встают общие явления цивилизации землян, их тревоги и надежды перед лицом завтрашнего дня\r\n', 352, '16+', 1, 2),
(10, '1984', 'media/uploads/book_cover/1984.jpg', 1949, 'Своеобразный антипод второй великой антиутопии XX века - \"О дивный новый мир\" Олдоса Хаксли. Что, в сущности, страшнее: доведенное до абсурда \"общество потребления\" - или доведенное до абсолюта \"общество идеи\"?\r\nПо Оруэллу, нет и не может быть ничего ужаснее тотальной несвободы...', 320, '18+', 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `book_format`
--

CREATE TABLE `book_format` (
  `id_format` int NOT NULL,
  `id_book` int NOT NULL,
  `book_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `book_format`
--

INSERT INTO `book_format` (`id_format`, `id_book`, `book_file`) VALUES
(1, 1, 'dogs_heart.pdf'),
(1, 6, 'mumu.pdf'),
(2, 2, 'dead_souls.epub'),
(2, 3, 'eugine_onegin.epub'),
(2, 5, 'war_and_peace.epub'),
(2, 8, 'lilac_bush.epub'),
(2, 10, '1984.epub'),
(3, 4, 'crime_and_punishment.fb2'),
(3, 7, 'man_futlar.fb2'),
(3, 9, 'mars.fb2'),
(4, 1, 'dogs_heart.docx');

-- --------------------------------------------------------

--
-- Структура таблицы `format`
--

CREATE TABLE `format` (
  `id_format` int NOT NULL,
  `format_type` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `format`
--

INSERT INTO `format` (`id_format`, `format_type`) VALUES
(1, 'PDF'),
(2, 'EPUB'),
(3, 'FB2'),
(4, 'DOCX');

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `id_genre` int NOT NULL,
  `genre_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`id_genre`, `genre_name`) VALUES
(1, 'Все'),
(2, 'Пьеса'),
(3, 'Рассказ'),
(4, 'Роман'),
(5, 'Комедия'),
(6, 'Трагедия'),
(7, 'Драма'),
(8, 'Ужасы'),
(9, 'Сказка'),
(10, 'Фэнтези'),
(11, 'Детектив'),
(12, 'Любовный роман'),
(13, 'Научная фантастика'),
(14, 'Приключение'),
(15, 'Исторический'),
(16, 'Мистика'),
(17, 'Повесть');

-- --------------------------------------------------------

--
-- Структура таблицы `genre_book`
--

CREATE TABLE `genre_book` (
  `id_genre_book` int NOT NULL,
  `id_book` int NOT NULL,
  `id_genre` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `genre_book`
--

INSERT INTO `genre_book` (`id_genre_book`, `id_book`, `id_genre`) VALUES
(1, 1, 17),
(2, 2, 16),
(3, 3, 4),
(4, 4, 4),
(5, 5, 4),
(6, 6, 3),
(7, 7, 3),
(8, 8, 3),
(9, 9, 4),
(10, 10, 13);

-- --------------------------------------------------------

--
-- Структура таблицы `lang`
--

CREATE TABLE `lang` (
  `id_lang` int NOT NULL,
  `language` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lang`
--

INSERT INTO `lang` (`id_lang`, `language`, `lang_name`) VALUES
(1, 'RU', 'Русский'),
(2, 'EN', 'Английский'),
(3, 'FR', 'Французский'),
(4, 'GER', 'Немецкий');

-- --------------------------------------------------------

--
-- Структура таблицы `like_book`
--

CREATE TABLE `like_book` (
  `id_user` int NOT NULL,
  `id_book` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `like_book`
--

INSERT INTO `like_book` (`id_user`, `id_book`) VALUES
(1, 1),
(13, 1),
(14, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `publ_office`
--

CREATE TABLE `publ_office` (
  `id_publ_office` int NOT NULL,
  `publ_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `publ_office`
--

INSERT INTO `publ_office` (`id_publ_office`, `publ_name`) VALUES
(2, 'Издательство1'),
(3, 'Издательство2');

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `id_review` int NOT NULL,
  `text_review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_review` date NOT NULL,
  `id_book` int NOT NULL,
  `id_user` int NOT NULL,
  `status` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id_review`, `text_review`, `date_review`, `id_book`, `id_user`, `status`) VALUES
(1, '121231231231233', '2025-03-08', 5, 13, 'accepted'),
(3, 'fdgfgdfg', '2025-04-08', 6, 15, 'accepted'),
(5, '$text_review', '2025-04-05', 1, 15, 'accepted'),
(6, '$text_review', '0000-00-00', 1, 15, 'accepted'),
(7, '22343', '2025-04-05', 5, 15, 'accepted'),
(8, '22343', '2025-04-05', 5, 15, 'accepted'),
(9, '123', '2025-04-05', 5, 15, 'accepted');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `role` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `login` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favourite_genre` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `role`, `login`, `description`, `email`, `password`, `avatar`, `favourite_genre`) VALUES
(1, '1', '1', '1', '1', '1', '', '1'),
(10, '', '123', '', 'sdfgdsf@mail.ru', '25d55ad283aa400af464c76d713c07ad', '', 'Повесть'),
(11, '0', '123', '', '123@mail.ru', '$2y$10$lv4F1UzWXH7LJc6frnYbvuqsw7gbjMCJp7BHrtLAMhfeQkFYmkZse', '', 'Повесть'),
(12, '0', '123', '', '123@mail.ru', '$2y$10$IaZubNcW.YzZGbWwk./sHecOHMz1BJj1uDdsh6fTOiYGVczeDeAZO', '', 'Повесть'),
(13, '0', '123', '111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', '123@mail.ru', '12345678', '', 'Повесть'),
(14, '0', 'иван', '', '1234@mail.ru', '123456789', 'media/uploads/avatars/67e96eed5a2f0.jpeg', 'Повесть'),
(15, '0', 'text_user', '', '1@mail.ru', '123456', 'media/uploads/avatars/67e97147ced4f.jpeg', 'Повесть');

-- --------------------------------------------------------

--
-- Структура таблицы `user_book`
--

CREATE TABLE `user_book` (
  `id_user` int NOT NULL,
  `id_book` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_book`
--

INSERT INTO `user_book` (`id_user`, `id_book`) VALUES
(15, 1),
(15, 5),
(11, 6),
(15, 3),
(15, 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id_author`);

--
-- Индексы таблицы `author_book`
--
ALTER TABLE `author_book`
  ADD PRIMARY KEY (`id_author_book`),
  ADD KEY `id_author` (`id_author`),
  ADD KEY `id_book` (`id_book`);

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id_book`),
  ADD KEY `id_lang` (`id_lang`),
  ADD KEY `id_publ_office` (`id_publ_office`);

--
-- Индексы таблицы `book_format`
--
ALTER TABLE `book_format`
  ADD PRIMARY KEY (`id_format`,`id_book`),
  ADD KEY `id_book` (`id_book`);

--
-- Индексы таблицы `format`
--
ALTER TABLE `format`
  ADD PRIMARY KEY (`id_format`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Индексы таблицы `genre_book`
--
ALTER TABLE `genre_book`
  ADD PRIMARY KEY (`id_genre_book`),
  ADD KEY `id_book` (`id_book`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Индексы таблицы `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id_lang`);

--
-- Индексы таблицы `like_book`
--
ALTER TABLE `like_book`
  ADD PRIMARY KEY (`id_user`,`id_book`),
  ADD KEY `id_book` (`id_book`);

--
-- Индексы таблицы `publ_office`
--
ALTER TABLE `publ_office`
  ADD PRIMARY KEY (`id_publ_office`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_book` (`id_book`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `user_book`
--
ALTER TABLE `user_book`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_book` (`id_book`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `id_author` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `author_book`
--
ALTER TABLE `author_book`
  MODIFY `id_author_book` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `id_book` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `format`
--
ALTER TABLE `format`
  MODIFY `id_format` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `genre_book`
--
ALTER TABLE `genre_book`
  MODIFY `id_genre_book` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `lang`
--
ALTER TABLE `lang`
  MODIFY `id_lang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `publ_office`
--
ALTER TABLE `publ_office`
  MODIFY `id_publ_office` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `author_book`
--
ALTER TABLE `author_book`
  ADD CONSTRAINT `author_book_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `author` (`id_author`),
  ADD CONSTRAINT `author_book_ibfk_2` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`);

--
-- Ограничения внешнего ключа таблицы `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`id_lang`) REFERENCES `lang` (`id_lang`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`id_publ_office`) REFERENCES `publ_office` (`id_publ_office`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `book_format`
--
ALTER TABLE `book_format`
  ADD CONSTRAINT `book_format_ibfk_1` FOREIGN KEY (`id_format`) REFERENCES `format` (`id_format`),
  ADD CONSTRAINT `book_format_ibfk_2` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`);

--
-- Ограничения внешнего ключа таблицы `genre_book`
--
ALTER TABLE `genre_book`
  ADD CONSTRAINT `genre_book_ibfk_1` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`),
  ADD CONSTRAINT `genre_book_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`);

--
-- Ограничения внешнего ключа таблицы `like_book`
--
ALTER TABLE `like_book`
  ADD CONSTRAINT `like_book_ibfk_1` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`),
  ADD CONSTRAINT `like_book_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `user_book`
--
ALTER TABLE `user_book`
  ADD CONSTRAINT `user_book_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `user_book_ibfk_2` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
