<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<h1>Создать заявку</h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($order, 'client_name')->textInput(['placeholder' => 'Введите ваше имя']) ?>
<?= $form->field($order, 'phone')->textInput(['placeholder' => 'Введите ваш телефон']) ?>
<?= $form->field($order, 'comment')->textarea(['placeholder' => 'Добавьте комментарий к заявке']) ?>
<?= $form->field($order, 'product_name')->dropDownList([
    'Яблоки' => 'Яблоки',
    'Апельсины' => 'Апельсины',
    'Мандарины' => 'Мандарины'
]) ?>


    <div class="form-group" style="margin-top: 1em">
        <?= Html::submitButton('Отправить заявку', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

