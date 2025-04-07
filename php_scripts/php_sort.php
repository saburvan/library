<?php
    if(!isset($_GET['action'])){
      $_GET['action'] = 'sort';
      $_GET['sort'] = 'popular-up';
    }

    // Сортировка + фильтрация
    // Значения запросов по умолчанию
    $where = 'TRUE';
    $sort = 'likes ASC';

    $where_list = [];

    $action = $_GET['action'];

    if ($action == 'sort'){
      $q_sort = $_GET['sort'];
      if ($q_sort == 'popular-up') $sort = 'likes DESC';
      if ($q_sort == 'popular-down') $sort = 'likes ASC';
      if ($q_sort == 'new-up') $sort = 'book.id_book ASC';
      if ($q_sort == 'new-down') $sort = 'book.id_book DESC';
    }

    if ($action == 'filter'){
      $genre = $_GET['filter-genre'];

      if ($genre == 'Все'){
        $q_genre = 'TRUE';
      } else {
        $q_genre = "genre_name = '$genre'"; 
      }

      $where_list[] = "$q_genre";

      $lang_str = [];

      for ($i = 0; $i < mysqli_num_rows($q_lang); $i++){
        if ($_GET[$q_lang_list[$i]["language"]]){
          $lang_str[] = $q_lang_list[$i]["language"];
        }
      }

      $lang_list = [];

      if (count($lang_str) > 0){
        $q_lang_str = implode(", ", $lang_str);
        $where_list[] = "language IN ('$q_lang_str')";
      }
      
      $where = implode (" AND ", $where_list); 
    }


    $sql_all_book = "SELECT *, (SELECT COUNT(*) FROM like_book WHERE id_book = book.id_book ) AS likes FROM book 
      INNER JOIN genre_book ON book.id_book = genre_book.id_book 
      INNER JOIN genre ON genre.id_genre = genre_book.id_genre 
      INNER JOIN author_book ON author_book.id_book = book.id_book 
      INNER JOIN author ON author.id_author = author_book.id_author
      INNER JOIN lang ON book.id_lang = lang.id_lang";

    
    $q_all_book = mysqli_fetch_all(mysqli_query($link, $sql_all_book . " WHERE $where ORDER BY $sort;"), MYSQLI_ASSOC);

    $q_latest_books = mysqli_query($link, $sql_all_book . " ORDER BY `book`.`id_book` DESC LIMIT 0, 5;");
