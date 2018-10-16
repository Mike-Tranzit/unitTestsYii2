<h2>Регистрация пользователей</h2>
<div class="site-about">
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(['id' => 'registration-form']) ?>
    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'skype') ?>
    <?= $form->field($model, 'phone') ?>
    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>
</div>