<?php
// Коллекция книг пользователя
    $sql_collection = "SELECT book.*, user_book.id_user, 
                      (SELECT COUNT(*) FROM like_book WHERE like_book.id_book = user_book.id_book ) AS likes FROM user_book 
                      INNER JOIN book ON book.id_book = user_book.id_book
                      WHERE user_book.id_user = '$id_profile'";
    $q_collection = mysqli_fetch_all(mysqli_query($link, $sql_collection), MYSQLI_ASSOC);