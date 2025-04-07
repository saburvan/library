<?php
    // Подключение к БД
    global $link;
    include "php_scripts/php_link.php";

    $sql_all_reviews = "SELECT * , IF(LENGTH(DAY(`date_review`)) < 2, CONCAT('0', DAY(`date_review`) ), DAY(`date_review`) ) AS day , 
                    IF(LENGTH(MONTH(`date_review`)) < 2, CONCAT('0', MONTH(`date_review`)), MONTH(`date_review`)) AS month, 
                    YEAR(`date_review`) AS year 
                    FROM `review` 
                    INNER JOIN `user` ON review.id_user = user.id_user
                    WHERE `status` = 'new';";
    $q_all_reviews = mysqli_fetch_all(mysqli_query($link, $sql_all_reviews), MYSQLI_ASSOC);

    // Вывод жанров в выпадающий список в секции фильтров
    $sql_genre = "SELECT * FROM genre";
    $q_genre_list = mysqli_fetch_all(mysqli_query($link, $sql_genre), MYSQLI_ASSOC);
 
    // Вывод языков
    $sql_lang = "SELECT * FROM lang";
    $q_lang_list = mysqli_fetch_all(mysqli_query($link, $sql_lang ), MYSQLI_ASSOC);

    // Вывод авторов
    $sql_author = "SELECT * FROM author";
    $q_author_list = mysqli_fetch_all(mysqli_query($link, $sql_author ), MYSQLI_ASSOC);

    // Вывод форматов
    $sql_format = "SELECT * FROM format";
    $q_format_list = mysqli_fetch_all(mysqli_query($link, $sql_format ), MYSQLI_ASSOC);

    // Вывод языков
    $sql_publisher = "SELECT * FROM publ_office";
    $q_publisher_list = mysqli_fetch_all(mysqli_query($link, $sql_publisher ), MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/modal.css">
</head>
<body>
    <?php include "templates/_header.php";?>

    <section class="admin-panel">
        <div class="cont">
            <h2>Управление сайтом</h2>
            <nav class="menu-nav">
                <div class="tab tab_active">
                    <p class="tab-text">Модерация отзывов</p>
                </div>
                <div class="tab">
                    <p class="tab-text">Добавление книги</p>
                </div>
                <div class="tab">
                    <p class="tab-text">Редактирование и удаление книги</p>
                </div>
                <div class="tab">
                    <p class="tab-text">Формат</p>
                </div>
                <div class="tab">
                    <p class="tab-text">Язык</p>
                </div>
                <div class="tab">
                    <p class="tab-text">Автор</p>
                </div>
                <div class="tab">
                    <p class="tab-text">Жанр</p>
                </div>
                <div class="tab">
                    <p class="tab-text">Издательство</p>
                </div>
            </nav>
            <div class="tab-container">
                <?php
                    if (empty($q_all_reviews)) {
                        echo '<p class="not_found">Новых отзывов не найдено</p>';
                        
                    } else{
                        foreach($q_all_reviews as $review){
                            include "templates/_review_admin.php";
                        }
                    }

                ?>
                
            </div>
            <div class="tab-container none">
                <form action="php_scripts/php_add_book.php" class="add_book" method="post" enctype="multipart/form-data">
                    <label for="name">Название книги <span class="red-star">*</span></label>
                    <input type="text" name="book_name" id="book_name" placeholder="Название книги">

                    <!-- Обложка -->
                    <p class="upload-avatar">Обложка</p>
                    <label class="avatar-wrap">
                        <span class="size-text">Макс. 2мб</span>
                        <input type="file" name="book_cover" id="book_cover">
                        <span class="choose-file">Выбрать файл</span>
                    </label>

                    <p class="upload-avatar">Файл книги</p>
                    <label class="avatar-wrap">
                        <input type="file" name="book_file" id="book_file">
                        <span class="choose-file">Выбрать файл</span>
                    </label>

                    <label for="name">Год выпуска <span class="red-star">*</span></label>
                    <input type="text" name="book_year" id="book_year" placeholder="Год выпуска">
                
                
                    <label for="desc">Аннотация</label>
                    <textarea name="book_annotation" id="book_annotation"></textarea>
                
                    <label for="name">Количество страниц <span class="red-star">*</span></label>
                    <input type="number" name="num_pages" id="num_pages" placeholder="Количество страниц">

                    <!-- Возрастное ограничение -->
                    <label for="age_list">Выберите возрастное ограничение <span class="red-star">*</span></label>
                    <select name="age_list" id="age_list">
                        <option value='0+'>0+</option>;
                        <option value='6+'>6+</option>;
                        <option value='12+'>12+</option>;
                        <option value='16+'>16+</option>;
                        <option value='18+'>18+</option>;
                    </select>

                    <!-- Жанры -->
                    <label for="genre_list">Выберите жанр <span class="red-star">*</span></label>
                    <select name="genre_list" id="genre_list">
                        <?php
                            // Вывод всех жанров из БД
                            foreach ($q_genre_list as $genre){
                                echo "<option value='".$genre['genre_name']."'>".$genre['genre_name']."</option>";
                            }
                        ?>
                    </select>

                    <!-- Языки -->
                    <label for="lang_list">Выберите язык <span class="red-star">*</span></label>
                    <select name="lang_list" id="lang_list">
                        <?php
                            // Вывод всех языков из БД
                            foreach ($q_lang_list as $lang){
                                echo "<option value='".$lang['language']."'>".$lang['lang_name']."</option>";
                            }
                        ?>
                    </select>

                    <!-- Авторы -->
                    <label for="author_list">Выберите автора <span class="red-star">*</span></label>
                    <select name="author_list" id="author_list">
                        <?php
                            // Вывод всех языков из БД
                            foreach ($q_author_list as $author){
                                echo "<option value='".$author['language']."'>".$author['author_name'] . ' ' . $author['author_last_name'] . ' ' . $author['author_patronymic'] ."</option>";
                            }
                        ?>
                    </select>
                
                    <!-- Форматы -->
                    <label for="format_list">Выберите формат <span class="red-star">*</span></label>
                    <select name="format_list" id="format_list">
                        <?php
                            // Вывод всех языков из БД
                            foreach ($q_format_list as $format){
                                echo "<option value='".$format['format_type']."'>".$format['format_type'] ."</option>";
                            }
                        ?>
                    </select>

                    <!-- Издательства -->
                    <label for="publisher_list">Выберите издательство <span class="red-star">*</span></label>
                    <select name="publisher_list" id="publisher_list">
                        <?php
                            // Вывод всех языков из БД
                            foreach ($q_publisher_list as $publisher){
                                echo "<option value='".$publisher['publ_name']."'>".$publisher['publ_name'] ."</option>";
                            }
                        ?>
                    </select>
                </form>
            </div>
            <div class="tab-container none"><p>123</p></div>
            <div class="tab-container none">
                <form action="php_scripts/php_add_info.php" method="post" class="add_info">
                    <input type="hidden" name="add" value="add_format">
                    <input type="text" placeholder="Формат" name="format" id="format">
                    <input type="submit" value="Добавить">
                </form>
            </div>
            <div class="tab-container none">
                <form action="php_scripts/php_add_info.php" method="post" class="add_info">
                    <input type="hidden" name="add" value="add_lang">
                    <input type="text" placeholder="Аббревиатура языка" name="a_lang" id="a_lang">
                    <input type="text" placeholder="Название языка" name="lang" id="lang">
                    <input type="submit" value="Добавить">
                </form>
            </div>
            <div class="tab-container none">
                <form action="php_scripts/php_add_info.php" method="post" class="add_info">
                    <input type="hidden" name="add" value="add_author">
                    <input type="text" placeholder="Имя автора" name="author_name" id="author_name">
                    <input type="text" placeholder="Фамилия автора" name="author_last_name" id="author_last_name">
                    <input type="text" placeholder="Отчество автора" name="author_patronymic" id="author_patronymic">
                    <input type="submit" value="Добавить">
                </form>
            </div>
            <div class="tab-container none">
                <form action="php_scripts/php_add_info.php" method="post" class="add_info">
                    <input type="hidden" name="add" value="add_genre">
                    <input type="text" placeholder="Жанр" name="genre" id="genre">
                    <input type="submit" value="Добавить">
                </form>
            </div>
            <div class="tab-container none">
                <form action="php_scripts/php_add_info.php" method="post" class="add_info">
                    <input type="hidden" name="add" value="add_publ_office">
                    <input type="text" placeholder="Название издательства" name="publ_office" id="publ_office">
                    <input type="submit" value="Добавить">
                </form>
            </div>
            </div>
    </section>

    <script src="js/tabs.js"></script>
</body>
</html>
