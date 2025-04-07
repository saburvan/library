<?php
    include "php_link.php";

    // Функция ошибок
    function failed_add($msg){
        $_SESSION['e'] = $msg;
        header("Location: admin.php");
        exit();
    }

    $book_name = $_POST['book_name'];
    $book_year = $_POST['book_year'];
    $book_annotation = $_POST['book_annotation'];
    $book_pages = $_POST['num_pages'];

    // Обложка и файл книги
    $book_cover = $_FILES['book_cover'];
    $book_file = $_FILES['book_file'];

    $book_age = $_POST['age_list'];
    $book_genre = $_POST['genre_list'];
    $book_lang = $_POST['lang_list'];
    $book_author = $_POST['author_list'];
    $book_format = $_POST['format_list'];
    $book_publ = $_POST['publisher_list'];


    if (!isset($book_name) or $book_name == '' or 
        !isset($book_year) or $book_year == '' or 
        !isset($book_annotation) or $book_annotation == '' or 
        !isset($book_pages) or $book_pages == '' or 
        $book_cover['size'] == 0 or $book_file['size'] == 0){

        failed_add('Все поля должны быть заполнены');
    }

    if (strlen($book_annotation) > 100){
        failed_add('Длина аннотации не должна превышать 100 символов');
    }

    if ($book_cover['size'] > 2097152 ){
        failed_add('Размер файла обложки не должен превышать 2 мб');
    }


    $sql_add_book = "";
    $q_add_book = mysqli_query($link, $sql_add_book);