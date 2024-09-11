<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h1>Редактировать пользователя</h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($user, 'email')->textInput() ?>
<?= $form->field($user, 'role')->dropDownList([
    'admin' => 'Администратор',
    'manager' => 'Менеджер'
]) ?>
<?= $form->field($user, 'status')->dropDownList([
    User::STATUS_ACTIVE => 'Активный',
    User::STATUS_INACTIVE => 'Неактивный'
]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>