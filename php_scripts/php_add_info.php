<?php

    $add = $_POST['add'];

    // Добавление формата
    if ($add == 'add_format'){
        $format = $_POST['format'];

        $q_format = mysqli_query($link, "INSERT INTO `format` (`format_type`); 
        VALUES ('$format');");

        header("Location: admin.php");
        exit();
    }

    // Добавление языка
    if ($add == 'add_lang'){
        $a_lang = $_POST['a_lang'];
        $lang = $_POST['lang'];

        $q_lang = mysqli_query($link, "INSERT INTO `lang` (`language`, `lang_name`); 
        VALUES ('$a_lang', '$lang');");

        header("Location: admin.php");
        exit();
    }

    // Добавление автора
    if ($add == 'add_author'){
        $name = $_POST['author_name'];
        $last_name = $_POST['author_last_name'];
        $patronymic = $_POST['author_patronymic'];

        $q_author = mysqli_query($link, "INSERT INTO `author` (`author_name`, `author_last_name`, `author_patronymic`); 
        VALUES ('$name', '$last_name', '$patronymic');");

        header("Location: admin.php");
        exit();
    }

    if ($add == 'add_genre'){
        $genre = $_POST['genre'];

        $q_genre = mysqli_query($link, "INSERT INTO `genre` (`genre_name`) VALUES ('$genre');");
        
        header("Location: admin.php");
        exit();
    }

    if ($add == 'add_publ_office'){
        $publ_office = $_POST['publ_office'];

        $q_publ_office = mysqli_query($link ,"INSERT INTO `publ_office` (`publ_name`) VALUES ('$publ_office');");
    
        header("Location: admin.php");
        exit();
    
    }