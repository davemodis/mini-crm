<?php

use yii\grid\GridView;

?>
<h1>Список пользователей</h1>

<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'email',
        [
            'attribute' => 'role',
            'value' => function ($model) {
                $roles = [
                    'admin' => 'Админисратор',
                    'manager' => 'Менеджер'
                ];
                return $roles[$model->role];
            }
        ],
        [
            'attribute' => 'status',
            'value' => function ($model) {
                return $model->status ? 'Активен' : 'Неактивен';
            }
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
        ],
    ]
]);
?>