<?php
    $review_date = $review['day'] . '.' . $review['month'] . '.' . $review['year']; 
?>

<div class="review-card">
    <p><?=$review['text_review']?></p>
    <div class="bottom-review">
        <div class="author">
            <p><?=$review['login']?></p>
        </div>
        <div class="date-review">
            <p><?=$review_date?></p>
        </div>
    </div>
</div>
