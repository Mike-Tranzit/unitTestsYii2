<h2>Регистрация пользователей</h2>
<div class="site-about">
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php var_dump($model->errors);?>
<?php $form = ActiveForm::begin(['id' => 'registration-form']);?>
    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'skype') ?>
    <?= $form->field($model, 'phone') ?>
    <?= Html::submitButton('Submit', ['class' => 'btn btn-success', 'name' => 'registration-button']) ?>
<?php ActiveForm::end() ?>
</div>