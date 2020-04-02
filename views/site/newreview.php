<?php

use \yii\widgets\ActiveForm;
?>

<?php
if (Yii::$app->user->isGuest) { ?>
    <h2 class="text-info"><?= 'Только зарегистрированные пользователи могут оставлять отзывы!'; ?></h2>
<?php } else { ?>
    <h2 class="text-info"><?= 'Добавить новый отзыв'; ?> </h2>
<?php }

$form = ActiveForm::begin(['class' => 'form-horizontal']);
?>
<?= $form->field($review, 'title')->textInput(['autofocus' => true])->label('Название') ?>
<?= $form->field($review, 'review')->textarea()->label('Отзыв') ?>
<div>
    <button type="submit" class="btn btn-success">Отправить</button>
</div>
<?php
ActiveForm::end();
?>