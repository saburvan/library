<a class="book-card" href="book.php?bookID=<?=$book['id_book']?>" style="background-image: url('<?=$book['book_img']?>'); background-position: center; background-size: cover;">
    <div class="black">
        <p class="b-name"><?=$book['book_name']?></p>
        <div class="like-panel">
            <div class="like-card">
                <img src="media/img/like.png" alt="like" class="like-img">
                <p class="like-card__count"><?=$book['likes']?></p>
            </div>
            <img src="media/img/add.png" alt="add" class="add_collection">
        </div>
    </div>
</a>