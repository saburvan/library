<?php
    global $link;
    session_start();
    include "php_scripts/php_link.php";

    // Идентификатор пользователя
    $id_profile = $_SESSION['id_user'];

    // Получение всех данных о конкретном пользователе
    $sql_data_user = "SELECT * FROM `user`  WHERE `id_user` = '$id_profile'";
    $q_data_user = mysqli_fetch_assoc(mysqli_query($link, $sql_data_user));

    // Коллекция пользователя
    include "templates/_collection_query.php";
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
      <?php include("templates/_header.php")?>

      <main class="main">
        <div class="cont">
            <div class="head-profile">
                <div class="profile-info">
                    <div class="nameline">
                        <div class="user">
                            <?php
                                // Если пользователь загрузил аватарку
                                if ($q_data_user['avatar'] != ''){
                            ?>
                                <div class="avatar" style="background-image: url('<?=$q_data_user['avatar']?>'); background-position: center; background-size: cover;"></div>
                            <?php
                                // Вывод стандартной аватарки
                                } else {
                                    echo '<div class="avatar"></div>';
                                }
                            ?>
                            <div class="name-profile">
                                <p><?=$q_data_user['login'];?></p>
                                <p class="genre"><b>Любимый жанр:  </b><?= $q_data_user['favourite_genre'];?></p>
                            </div>
                        </div>
            
                        <div class="stats">
                            <div class="stat-card">
                                <p class="bold-number">123</p>
                                <p>num_books</p>
                            </div>
                            <div class="stat-card">
                                <p class="bold-number">567</p>
                                <p>num_rating</p>
                            </div>
                            <div class="stat-card">
                                <p class="bold-number">8910</p>
                                <p>num_reviews</p>
                            </div>
                        </div>
                    </div>
                    <div class="lastline">
                        <div class="descr">
                            <p>Это поучительная история о простом учителе гимназии Беликове. Сей человек добровольно загнал себя самого в футляр, как в физическом смысле — в любую погоду был под зонтом, в калошах, отгораживался от улицы высоким воротником, так и в духовном — всю свою жизнь он проводил отгораживаясь от мира, кутаясь и страшась «Как бы чего не вышло». Но вот коллеги по гимназии, изнуренные его обществом, решили его сосватать, а далее, что же все таки из этого вышло...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </main>

      <section class="collection">
        <h2 class="none">section main</h2>
        <div class="cont">
          <div class="pers-collection main-books-wrap">
            <?php
              foreach ($q_collection as $collection){
                include "templates/_collection_card.php";
              }
            ?>
          </div>
        </div>
      </section>

      <?php include("templates/_modals.php")?>

      <script src="js/modal.js"></script>
      <script src="js/main.js"></script>
</body>
</html>
