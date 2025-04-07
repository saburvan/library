<header class="header">
    <h2 class="none">header</h2>
    <div class="cont">
        <a href="index.php?sort=popular-up&action=sort">
            <div class="logo">
                <img src="media/img/logo.png" alt="logo"/>
            </div>
        </a>

        

        <?php
//             Получение страницы, на которой находится пользователь
//            $url = $_SERVER[REQUEST_URI];
//            $url_page = end(explode("/", $url));
//
//            if ($url_page == 'index.php'){
        ?>

        <form class="search" method="post" action="#">
            <input type="search" name="srch" id="srch" placeholder="Искать по названию и автору">
            <input type="submit" value="" class="sbm">
        </form>

        <?php
//            }
        ?>

        <?php
        // Авторизованный пользователь
        if (isset($_SESSION['login'])){
            echo '<nav class="header-nav">'.
                '<ul>'.
                '<li><a href="profile.php" class="btn">Профиль</a></li>'.
                '<li><a href="php_exit.php" class="btn">Выйти</a></li>'.
                '</ul>'.
                '</nav>';

//            Администратор
//        } elseif ($_SESSION['role'] == '1'){
//            echo '<nav class="header-nav">'.
//                '<ul>'.
//                '<li><a href="#" id="publBtn">Опубликовать книгу</a></li>'.
//                '<li><a href="profile.php">Профиль</a></li>'.
//                '<li><a href="php_exit.php">Выйти</a></li>'.
//                '</ul>'.
//                '</nav>';

        // Гость
        } else {
            echo '<nav class="header-nav">'.
                '<ul>'.
                '<li><a href="#"id="authBtn" class="btn">Авторизация</a></li>'.
                '<li><a href="#" id="regBtn" class="btn">Регистрация</a></li>'.
                '</ul>'.
                '</nav>';
        }
        ?>
    </div>
    <!-- /.cont -->
</header>
<!-- /.header -->