<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h1>Редактировать заявку</h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($order, 'client_name')->textInput() ?>
<?= $form->field($order, 'order_name')->textInput() ?>
<?= $form->field($order, 'product_name')->textInput() ?>
<?= $form->field($order, 'phone')->textInput() ?>
<?= $form->field($order, 'comment')->textarea() ?>
<?= $form->field($order, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>