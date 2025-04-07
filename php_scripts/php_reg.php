<?php
    global $link;
    include "php_link.php";
    session_start();

    // Регулярные выражения
    $pattern_mail = '/\w+@\w+\.\w+/';
    //$pattern_password = '/(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/g';

    // Получение данных из формы
    $user_login = $_POST['name'];
    $email = $_POST['em'];
    $user_pass = $_POST['pass'];
    $rep_pass = $_POST['rep_pass'];

    $fav_genre = $_POST['genre'];
    $desc = $_POST['desc'];

    // Сбор расширения аватарки
    $avatar_ext = $_FILES['avatar']['type'];
    $avatar_ext_assembled = explode('/', $avatar_ext);


    // Проверка на пустые поля
    if (!isset($user_login) or $user_login == '' or !isset($email) or $email == '' or !isset($user_pass) or $user_pass == '' or !isset($rep_pass) or $rep_pass == '' ) {
        $_SESSION['e'] = 'Заполните все обязательные поля';
        header("Location: index.php");
        exit();
    }

    // Проверка на длину имени
    if ( strlen($user_login) > 20 ) {
        $_SESSION['e'] = 'Имя пользователя должно быть не более 20 символов';
        header("Location: index.php");
        exit();
    }

    // Проверка на длину пароля
    if (strlen($user_pass) < 6){
//    } elseif (!preg_match($pattern_password, $user_pass)){
        $_SESSION['e'] = 'Необходимо придумать пароль длинной более 6 символов, c использованием хотя бы одного спец. символа';
        header("Location: index.php");
        exit();
    }

    // Проверка на совпадение пароля и его повторного ввода
    if ($user_pass !== $rep_pass ){
        $_SESSION['e'] = 'Пароли не совпадают';
        header("Location: index.php");
        exit();
    }

    // Проверка на соответствие формату адреса эл. почты
    if (!preg_match($pattern_mail, $email)){
        $_SESSION['e'] = 'Введен некорректный адрес эл. почты';
        header("Location: index.php");
        exit();
    }

    // Проверка на размер аватарки
    if ($_FILES['avatar']['size'] > 2097152){
        $_SESSION['e'] = 'Загрузите аватарку размером не более 2 мб';
        header("Location: index.php");
        exit();
    }

    // Проверка на расширение аватарки
    if ( $_FILES['avatar']['size'] != 0 and $avatar_ext_assembled[1] != 'png' and $avatar_ext_assembled[1] != 'jpg' and $avatar_ext_assembled[1] != 'jpeg'){
        $_SESSION['e'] = 'Загрузите аватарку в форматах: png, jpeg, jpg';
        header("Location: index.php");
        exit();
    }

    // Если обложка загружена
    if ($_FILES['avatar']['size'] != 0){
        // Создание уникального имени аватарки во избежание повторения названий
        $filename_avatar = uniqid() . '.' . $avatar_ext_assembled[1];

        // Изначальный статус успеха загрузки
        $avatar = false;

        // Сбор пути до папки, где будут храниться загруженные аватарки
        $uploadDir = 'media/uploads/avatars/';
        $uploadFile = $uploadDir . $filename_avatar;

        // Перемещение аватарки в созданную директорию
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)){
            $avatar = true;
        }

        // Если не удалось, то выводим ошибки
        if ($avatar === false){
            $_SESSION['e'] = 'Не удалось загрузить аватарку';
            header("Location: index.php");
            exit();
        }

    // Если обложка не загружена
    } else {
        $avatar = true;
        $uploadFile = '';
    }

//    $hashed_user_pass = password_hash($user_pass,  PASSWORD_DEFAULT);

    // Запрос на вставку в БД
    $sql_paste = "INSERT INTO `user` (`login`, `description`, `email`, `password`, `avatar`, `favourite_genre`) VALUES ('$user_login', '$desc', '$email', '$user_pass', '$uploadFile', '$fav_genre');";
    $q_paste = mysqli_query($link, $sql_paste);

    header("Location: index.php");
    exit();
