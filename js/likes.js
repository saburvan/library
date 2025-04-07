let count_likes = document.querySelectorAll(".like-card__count_catalog");
let like_image = document.querySelectorAll(".like-img_catalog");

// Поставить и убрать лайк
for (let i = 0; i < like_image.length; i++){
    like_image[i].addEventListener("click", () => {
        
       if (like_image[i].getAttribute("src") == "media/img/like.png"){
            like_image[i].setAttribute("src", "media/img/like_outline.png");
            count_likes[i].textContent = parseInt(count_likes[i].textContent) - 1;

            like_book_id = like_image[i].getAttribute("id_book");
            fetch('php_remove_like.php?bookID=' + like_book_id);
       } else {
            like_image[i].setAttribute("src", "media/img/like.png");
            count_likes[i].textContent = parseInt(count_likes[i].textContent) + 1;

            like_book_id = like_image[i].getAttribute("id_book");
            fetch('php_add_like.php?bookID=' + like_book_id);
       }
    })
}

// Добавить в коллекцию
let addBtn = document.querySelectorAll(".add_collection_catalog");

for (let i = 0; i < addBtn.length; i++){
    addBtn[i].addEventListener("click", () => {

        addBtn[i].remove();
        let id_book = addBtn[i].getAttribute("id_book");
        fetch('php_add_collection.php?bookID=' + id_book );

    })
}