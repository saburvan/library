<div class="review-card moderate-review">
    <p><?=$review['text_review']?></p>
    <div class="bottom-review">
        <div class="author">
            <p><?=$review['login']?></p>
        </div>
        <div class="date-review">
        <p><?=$review['day'] . '.' . $review['month'] . '.' . $review['year'] ?></p>
    </div>
    </div>
    <div class="moderate-block">
        <form action="php_moderate.php" method="post" class="accept">
            <input type="hidden" name="id_review" value="<?=$review['id_review']?>">
            <input type="hidden" name="status_review" value="accepted">
            <button type="submit" class="btn moderate-btn accept-btn">Принять</button>
        </form>

        <form action="php_moderate.php" class="reject" method="post">
            <input type="hidden" name="id_review" value="<?=$review['id_review']?>">
            <input type="hidden" name="status_review" value="rejected">
            <button type="submit" class="btn moderate-btn reject-btn">Отклонить</button>
        </form>
        
    </div>
</div>