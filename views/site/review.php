<?php

/* @var $this yii\web\View */

$this->title = 'Мое приложение';
?>

<div class=" col-sm-8 blog-main">

    <div class="blog-post">
        <h2 class="blog-post-title"><?= $review->title ?></h2>
        <p class="blog-post-meta"><?= $review->author ?></p>
        <hr>
        <p><?= $review->review ?></p>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
        <h3>Sub-Heading</h3>
        <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
        <h3>Sub-heading</h3>
        <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
        <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
        <hr>
        <h3 class="text-info">Комментарии</h3>
        <hr>

        <!-- if review's author == our user or admin - show the button  -->

        <?php if ($review->author == Yii::$app->user->identity->email || Yii::$app->user->identity->email == 'admin@mail.ru') : ?>
            <div><a href="/site/newcomment?id=<?= $review->id ?>" class="btn btn-success">Добавить комментарий</a></div>
            <hr>
            <?php endif;

        foreach ($comments as $comment) :

            // show all comments only for this review. review's id == review_id from comments DB

            if ($comment->review_id == $review->id) : ?>
                <p>Author - <?= $comment->author ?></p>
                <div><?= $comment->comment ?></div>
                <hr>
        <?php endif;
        endforeach; ?>
    </div>
</div>