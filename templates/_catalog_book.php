<?php
    if (isset($id_profile)){
        $sql_like = "SELECT * FROM `like_book` WHERE `id_user` = $id_profile";
        $q_like_list = mysqli_fetch_all(mysqli_query($link, $sql_like), MYSQLI_ASSOC);
    }
    
?>

<div class="book-card rand-books" style="background-image: url('<?=$book['book_img']?>'); background-position: center; background-size: cover;">
    <div class="black">
        <a class="b-name" href="book.php?bookID=<?=$book['id_book']?>"><?=$book['book_name']?></a>
        <div class="like-panel">
            <div class="like-card">
                <?php
                    if (isset($id_profile)){
                        $c = 0;
                        foreach ($q_like_list as $like){
                            if ($like['id_book'] == $book['id_book']){
                                $c++;
                                break;
                            }
                        }

                        if ($c == 1){
                            echo '<img src="media/img/like.png" alt="like" class="like-img like-img_catalog" id_book="' . $book['id_book'] .'">';
                        } else {
                            echo '<img src="media/img/like_outline.png" alt="like" class="like-img like-img_catalog" id_book="' . $book['id_book'] .'">';
                        }
                    } else {
                        echo '<img src="media/img/like.png" alt="like" class="like-img-guest">';
                    }  
                ?>
                <p class="like-card__count like-card__count_catalog"><?=$book['likes']?></p>
            </div>
            
            <?php 
                if (isset($id_profile)){
                    $k = 0;
                    foreach ($q_collection as $collection){
                        if($collection['id_book'] == $book['id_book']){
                            $k++;
                            break;
                        }    
                    }
    
                    if ($k == 0){
                        echo '<img src="media/img/add.png" alt="add" class="add_collection add_collection_catalog" id_book="' . $book['id_book'] . '">';
                    }     
                } 
            ?>
        </div>
    </div>
            </div/>