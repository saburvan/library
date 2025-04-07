<?php
    session_start(); 
    global $link;
    include "php_scripts/php_link.php";

    // Обработка ошибок
    if (!isset($_SESSION['e'])){
        $_SESSION['e'] = '';
    }
    $e = $_SESSION['e'];
    $_SESSION['e'] = '';

    // Идентификатор книги
    $id_book = $_GET['bookID'];

    // Запрос на получение всей информации о книге с конкретным ID
    $sql_book = "SELECT * FROM book INNER JOIN genre_book ON book.id_book = genre_book.id_book 
                INNER JOIN genre ON genre.id_genre = genre_book.id_genre 
                INNER JOIN author_book ON author_book.id_book = book.id_book 
                INNER JOIN author ON author.id_author = author_book.id_author WHERE book.id_book = $id_book"; 

    $q_book = mysqli_fetch_assoc(mysqli_query($link, $sql_book));

    // Отзывы
    $sql_review = "SELECT * , IF(LENGTH(DAY(`date_review`)) < 2, CONCAT('0', DAY(`date_review`) ), DAY(`date_review`) ) AS day , 
                    IF(LENGTH(MONTH(`date_review`)) < 2, CONCAT('0', MONTH(`date_review`)), MONTH(`date_review`)) AS month, 
                    YEAR(`date_review`) AS year 
                    FROM `review` 
                    INNER JOIN `user` ON review.id_user = user.id_user
                    WHERE `id_book` = '$id_book' AND `status` = 'accepted';";

    $q_review = mysqli_query($link, $sql_review);
    $q_review_res = mysqli_fetch_all($q_review, MYSQLI_ASSOC);

    // Скачивание книг
    $sql_download = "SELECT * FROM book_format INNER JOIN format ON format.id_format = book_format.id_format WHERE id_book = '$id_book'";
    $q_download = mysqli_fetch_all( mysqli_query($link, $sql_download), MYSQLI_ASSOC);
   

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/modal.css">
</head>
<body>
        <?php
            // Подключение шапки
            include("templates/_header.php")
        ?>

      <main class="main">
        <div class="cont">
            <div class="top_section">
                <div class="head-book">
                    <div class="book-cover preview-book" style="background-image: url('<?=$q_book['book_img']?>'); background-position: center; background-size: cover;">
                        <div class="age_restriction"><?=$q_book['age_restrictions']?></div>
                    </div>
                    <div class="book-info">
                        <h1 class="book_name"><?=$q_book['book_name']?></h1>

                        <div class="author_year">
                            <p class="year-public"><?=$q_book['book_year']?></p>
                            <p class="book_author"><?=$q_book['author_name']?> <?=$q_book['author_patronymic']?> <?=$q_book['author_last_name']?></p>
                        </div>

    
                        <div class="book-desc-block">
                            <div class="annotation">
                                <p><?=$q_book['annotation']?></p>
                            </div>  
                        </div>
                    </div> 
                </div>
                <div class="like-rating-block">
                    <div class="rating-block">
                        <h3 class="rating-block__title">Рейтинг книги</h3>
                        <div class="rating-stars">
                            <span class="rating-stars__span rating-stars__span_active"></span>
                            <span class="rating-stars__span"></span>
                            <span class="rating-stars__span"></span>
                            <span class="rating-stars__span"></span>
                            <span class="rating-stars__span"></span>
                        </div>
                    </div>
                    <div class="like-block">
                        <button type="button" class="btn like-block__btn_add">Поставить лайк</button>
                        <button type="button" class="btn like-block__btn_remove">Убрать лайк</button>
                    </div>

                    <div class="collection">
                        <button type="button" class="btn like-block__btn_add">Добавить в коллекцию</button>
                    </div>

                </div>
            </div>

            <div class="download-cont">
                <div class="download-wrap">
                    <div class="head-download">
                        <img src="media/img/download.png" alt="download" class="download__img">
                        <h2>Скачать книгу</h2>
                    </div>

                    <div class="download">
                        <?php
                            // Вывод ссылок на скачивание книг
                            foreach ($q_download as $download){
                                $path =  'media/uploads/book_file/' . $download['book_file'];
                                echo '<a class="download__link"  href="'.$path.'" download>'.$download["format_type"].'</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>

            


            <div class="reviews">
                <h2>Отзывы о книге</h2>
                <?php
                    if (isset($_SESSION['id_user'])){
                        echo '<button type="button" class="btn reviewBtn">Оставить отзыв</button>';
                    }
                ?>

                <div class="review-wrap">
                    <?php
                        if (mysqli_num_rows($q_review) > 0){
                            foreach ($q_review_res as $review){
                                include "templates/_review_card.php";
                            }
                        } else {
                            echo '<p class="no_reviews">Отзывов не найдено<p>';
                        }
                    ?>
                </div> 
            </div>
        </div>
      </main>

      <?php
          // Подключение модальных окон
          include("templates/_modals.php")
      ?>

        <div class="modal" id="modalBook">
            <div class="book-modal-wrap">
                <div class="modal-book" style="background-image: url('<?=$q_book['book_img']?>'); background-position: center; background-size: cover;"></div>
                <img src="media/img/cross.png" alt="cross" class="crossBook">
            </div>

        </div>

      <script src="js/write_review.js"></script>
      <script src="js/main.js"></script>
      <script src="js/modal.js"></script>
</body>
</html>
