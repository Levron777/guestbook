<?php

/* @var $this yii\web\View */

$this->title = 'Мое приложение';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Здравствуйте!</h1>

        <p class="lead">Войдите или зарегистрируйтесь, чтобы оставить отзыв.</p>

    </div>
</div>

<p><a class=" btn btn-success" href="/site/newreview" ">Добавить новый отзыв</a></p>

<?php foreach ($reviews as $review) : ?>
    <div class=" col-md-4">
        <h2><?= $review->title ?></h2>
        <p><?= $review->review ?></p>
        <p><a class="btn btn-success" href="/site/review?id=<?= $review->id ?>" ">Узнать больше »</a></p>
    </div>
<?php endforeach ?>