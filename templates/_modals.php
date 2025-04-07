<?php
    global $q_genre_list, $e, $modal, $id_book;
?>
<div class="modal" id="modalReg">
      <div class="modal-reg">
        <div class="headline">
            <img src="media/img/logo.png" alt="logo" class="logo-head">
            <h2>Регистрация</h2>
            <img src="media/img/cross.png" alt="cross" class="crossReg">
        </div>
        <form action="php_reg.php" class="reg" method="post" enctype="multipart/form-data">
            <div class="wrap-reg">
                <div class="block-reg">
                    <label for="name">Ваше имя <span class="red-star">*</span></label>
                    <input type="text" name="name" id="name" placeholder="Ваше имя">

                    <label for="em">Email <span class="red-star">*</span></label>
                    <input type="email" name="em" id="em" placeholder="Email">

                    <label for="pass">Пароль <span class="red-star">*</span></label>
                    <input type="password" name="pass" id="pass" placeholder="Пароль">

                    <label for="rep_pass">Повторите пароль <span class="red-star">*</span></label>
                    <input type="password" name="rep_pass" id="rep_pass" placeholder="Повторите пароль">
                </div>

                <div class="block-reg">
                    <label for="genre">Выберите ваш любимый жанр</label>
                    <select name="genre" id="genre">
                        <?php
                            // Вывод всех жанров из БД
                            foreach ($q_genre_list as $genre){
                                echo "<option value='".$genre['genre_name']."'>".$genre['genre_name']."</option>";
                            }
                        ?>
                    </select>

                    <label for="desc">Описание профиля</label>
                    <textarea name="desc" class="textarea"></textarea>

                    <p class="upload-avatar">Аватарка</p>
                    <label class="avatar-wrap">
                        <span class="size-text">Макс. 2мб</span>
                        <input type="file" name="avatar" id="avatar">
                        <span class="choose-file">Выбрать файл</span>
                    </label>

                </div>
            </div>

            <button id="submit-reg" type="submit" class="btn">Зарегистрироваться</button>
            <p class="error"><?=$e?></p>
        </form>
      </div>
    </div>

    <div class="modal <?= $modal == 'auth' ? 'vis' : ''?>" id="modalAuth">
      <div class="modal-reg modal-auth">
        <div class="headline">
            <img src="media/img/logo.png" alt="logo" class="logo-head">
            <h2>Авторизация</h2>
            <img src="media/img/cross.png" alt="cross" class="crossAuth">
        </div>
        <form action="php_auth.php" class="reg" method ="post">
            <div class="block-auth">
              <label for="em">Email <span class="red-star">*</span></label>
              <input type="email" name="auth_email" id="auth_email" placeholder="Email">

              <label for="pass">Пароль <span class="red-star">*</span></label>
              <input type="password" name="auth_pass" id="auth_pass" placeholder="Пароль">
            </div>
            <button id="submit-auth" type="submit" class="btn">Войти</button>
            <p class="error"><?=$e?></p>
        </form>
      </div>
    </div>


    <div class="modal" id="modalReview">
      <div class="modal-reg modal-review">
        <div class="headline">
            <img src="media/img/logo.png" alt="logo" class="logo-head">
            <h2>Добавить отзыв</h2>
            <img src="media/img/cross.png" alt="cross" class="crossReview">
        </div>
        <form action="php_review.php" class="reg" method ="post">
            <div class="block-auth block-review">
              <input type="hidden" name="id_book_review" value="<?=$id_book?>">
                <label for="rev">Текст отзыва</label>
                <textarea name="rev" class="textarea"></textarea>
            </div>
            <button id="submit-review" type="submit" class="btn">Оставить отзыв</button>
            <p class="error"><?=$e?></p>
        </form>
      </div>
    </div>

    