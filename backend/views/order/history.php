<?php

use yii\grid\GridView;

?>
<h1>История изменения заявки</h1>

<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'changed_at:datetime',
        [
            'label' => 'Пользователь',
            'value' => function ($model) {
                return $model->user->username;
            }
        ],
        [
            'label' => 'Изменения',
            'format' => 'raw',
            'value' => function ($model) {
                return '<pre>'.print_r(json_decode($model->changes, true), true).'</pre>';
            }
        ],
    ]
]);
?>