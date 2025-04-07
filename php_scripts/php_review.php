<?php
    session_start();
    include "php_link.php";


    $id_book_review = $_POST['id_book_review'];
    $text_review = $_POST['rev'];
    $id_user_review = $_SESSION['id_user'];

    if (strlen($text_review) > 50){
        $_SESSION['e'] = 'Описание должно быть не более 50 символов';
        header("Location book.php?bookID=" . $id_book_review);
        exit();
    }

    $sql_add_review = "INSERT INTO `review` (`text_review`, `date_review`, `id_book`, `id_user`, `status`) VALUES ('$text_review', CURRENT_DATE(), '$id_book_review', '$id_user_review', 'new');";
    $q_add_review = mysqli_query($link, $sql_add_review);

    header("Location: book.php?bookID=" . $id_book_review);
    exit();
