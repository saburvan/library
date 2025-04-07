<?php
    global $link, $q_all_book, $q_latest_books;

    // Подключение к БД
    include "php_scripts/php_link.php";

    session_start();

    // Обработка ошибок
    if (!isset($_SESSION['e'])){
      $_SESSION['e'] = '';
    }
    $e = $_SESSION['e'];
    $_SESSION['e'] = '';

    // Модальные окна не закрываются при получении ошибок
    if (!isset($_SESSION['modal'])){
      $_SESSION['modal'] = '';
    }
    $modal = $_SESSION['modal'];
    $_SESSION['modal'] = '';
   
    // Вывод жанров в выпадающий список в секции фильтров
    $sql_genre = "SELECT * FROM genre";
    $q_genre_list = mysqli_fetch_all(mysqli_query($link, $sql_genre), MYSQLI_ASSOC);

    // Вывод элементов выбора языка в секции фильтров
    $sql_lang = "SELECT * FROM lang";
    $q_lang = mysqli_query($link, $sql_lang);
    $q_lang_list = mysqli_fetch_all($q_lang, MYSQLI_ASSOC);

    // Сортировка и фильтрация
    include "php_scripts/php_sort.php";

    // Поиск
    include "php_scripts/php_search.php";
   
    // Пагинация
    $block_size = 5;
    $q_book_blocks = [];

    for ($i = 0; $i < count($q_all_book); $i++){
      if ($i % $block_size == 0){
        $q_book_blocks[] = [];
      }
      $q_book_blocks[count($q_book_blocks) - 1][] = $q_all_book[$i];
    }

    // Коллекция пользователя
    if (isset($_SESSION['id_user'])){
        $id_profile = $_SESSION['id_user'];
        include "templates/_collection_query.php";
    }

?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Library - Homepage</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/modal.css" />
  </head>
  <body>
    <?php 
        // Подключение шапки
        include("templates/_header.php")
    ?>

    <main class="main">
      <div class="cont">
        <h2>Недавние публикации</h2>
        <div class="main-books-wrap">
          <?php 
            // Вывод пяти последних добавленных книг
            foreach ($q_latest_books as $book){
              include("templates/_latest_books.php");
            }
          ?>
        </div>
      </div>
    </main>
    <section class="books">
      <div class="cont">
        <h2 class="books-headline">Рекомендуем к прочтению</h2>
        <div class="books-cont">
          <div class="filter-books">
            <label for="sort" class="sort-label">Сортировать по</label>
            <ul id="sort">
              <p class="first-line"><a>Популярности &#8595</a> <span>&#812;</span></p>
              <div class="list-sort">
                <li><a href="index.php?sort=popular-up&action=sort">Популярности &#8595</a></li>
                <li><a href="index.php?sort=popular-down&action=sort">Популярности &#8593;</a></li>
                <li><a href="index.php?sort=new-up&action=sort">Новизне &#8595;</a></li>
                <li><a href="index.php?sort=new-down&action=sort">Новизне &#8593;</a></li>
              </div>
              
          </ul>

            <form action="#" method="get">

              <input type="hidden" name="action" value="filter">
              <label for="filter-genre" class="sort-label">Выберите жанр</label>
              <select name="filter-genre" id="filter-genre">
                  <?php
                      // Вывод всех жанров из БД
                      foreach ($q_genre_list as $genre){
                          echo "<option value='".$genre['genre_name']."'>".$genre['genre_name']."</option>";
                      }
                  ?>
              </select>

              <p class="lang-filter">Выберите язык</p>
              <?php
                  // Вывод всех языков из БД
                  foreach ($q_lang_list as $lang){
                    echo '<div class="checkbox-input">'.
                              '<input type="checkbox" name="'.$lang['language'].'" class="chb"/>'.
                              '<label for="chb">'.$lang['lang_name'].'</label>'.
                          '</div>';
                  }
              ?>
      
              <div class="send-btn">
                  <input id="send" type="submit" value="Применить" class="btn">
              </div>
            </form>
              </div>
          <div class="books-pag">
                  <?php
                      if (empty($q_all_book)){
                        echo '<p class="not_found">Результатов по вашему запросу не найдено</p>';
                      } else {

                        foreach ($q_book_blocks as $block){
                          echo '<div class="wrap-books">';
                          foreach ($block as $book){
                            include "templates/_catalog_book.php";
                          }
                          echo '</div>';
                        }

                      }
                  ?> 
            </div>
          </div>

          <div class="pagination-control">
              <?php
              for ($i = 0; $i < count($q_book_blocks); $i++){
                  $count_pages = $i + 1;
                  echo '<span>'.$count_pages.'</span>';
              }
              ?>
          </div>
        </div>

    </section>

    <?php 
      // Подключение модальных окон
      include("templates/_modals.php")
    ?>

    <script src="js/main.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/sort.js"></script>
    <script src="js/pagination.js"></script>
    <script src="js/likes.js"></script>

  </body>
</html>
