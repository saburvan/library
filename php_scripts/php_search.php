<?php
    // Поиск
    if (isset($_POST['srch']) and !empty($_POST['srch'])){
        $search_query = $_POST['srch'];
    } else {
        $search_query = '';
    }

    // Функция обработки поискового запроса
    function to_words($str){
        $str = trim($str);                     // убирает пробелы в конце и начале строки
        $str = mb_strtolower($str);            // переводит все символы в нижний регистр
        return explode(" ", $str);  // создает массив со слова по разделителю "space"
    }

    $search_query_result = to_words($search_query);

    // Проверка на приблизительное соответствие
    // $sql_search = "SELECT * FROM book WHERE annotation LIKE "%Мертвые души%" OR annotation LIKE "Мир%" OR annotation LIKE "%прошлого";";


    


    // Если пользователь выполнил поисковый запрос
    if(isset($search_query) and $search_query != ''){

        $q_all_book_filtered = [];

        foreach ($q_all_book as $book) {

            // Получение информации о каждой книге и авторе
            $book_name = to_words($book['book_name']);
            $book_annotation = to_words($book['annotation']);
            $author_name = to_words($book['author_name']);
            $author_last_name = to_words($book['author_last_name']);
            $author_patronymic = to_words($book['author_patronymic']);

            $words_list = array_merge(
                $book_name, 
                $book_annotation, 
                $author_name, 
                $author_last_name, 
                $author_patronymic
            );

            // Массив с уникальными словами
            $unique_words = [];

            // Заполнение массива с уникальными словами
            foreach ($words_list as $word){
                $unique_words[$word] = true;
            }

            foreach ($search_query_result as $word){
                if (array_key_exists($word, $unique_words)){
                    $q_all_book_filtered[] = $book;
                    // include("templates/_rand_book.php");
                    break;
                }
            }

            $q_all_book = $q_all_book_filtered;
        }
    } 
    //else {
    //         // Вывод 10 книг в порядке убывания популярности из БД
    //         foreach ($q_all_book as $book) {
    //         include("templates/_rand_book.php");
    //         }
    // }
