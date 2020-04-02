<?php

use \yii\widgets\ActiveForm;
?>

<?php
if (Yii::$app->user->isGuest) { ?>
    <h2 class="text-info"><?= 'Только зарегистрированные пользователи могут оставлять комментарии!'; ?></h2>
<?php } else { ?>
    <h2 class="text-info"><?= 'Добавить новый комментарий'; ?> </h2>
<?php }

$form = ActiveForm::begin(['class' => 'form-horizontal']);
?>
<?= $form->field($comment, 'comment')->textarea(['autofocus' => true])->label('Комментарий') ?>
<div>
    <button type="submit" class="btn btn-success">Отправить</button>
</div>
<?php
ActiveForm::end();
?>