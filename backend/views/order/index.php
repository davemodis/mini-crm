<?php

use yii\grid\GridView;
use yii\helpers\Html;

?>
<h1>Список заявок</h1>

<?=Html::a('Выгрузить заявки в CSV',['export-csv'])?>

<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'client_name',
        'order_name',
        'product_name',
        'phone',
        'created_at:datetime',
        'status',
        'comment',
        'price',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {history}',
            'buttons' => [
                    'history' => function ($url, $model, $key) {
                        return Html::a('История изменений',['history', 'id' => $model->id]);
                    }
            ]
        ],
        [
            'label' => 'Изменить статус',
            'format' => 'raw',
            'value' => function ($order) {
                $str = Html::a(Html::img('@web/images/accepted.png', [
                    'title' => 'Изменить статус на Принята',
                    'width' => '32px',
                    'height' => '32px',
                    'style' => 'margin-right:10px;',
                ]),
                    ['change-status', 'id' => $order->id, 'status' => 'Принята']);

                $str .= Html::a(Html::img('@web/images/declined.png', [
                    'title' => 'Изменить статус на Отказана',
                    'width' => '20px',
                    'height' => '20px',
                    'style' => 'margin-right:15px;',
                ]),
                    ['change-status', 'id' => $order->id, 'status' => 'Отказана']);

                $str .= Html::a(Html::img('@web/images/defect.png', [
                    'title' => 'Изменить статус на Брак',
                    'width' => '20px',
                    'height' => '20px',
                ]),
                    ['change-status', 'id' => $order->id, 'status' => 'Брак']);

                return $str;
            }
        ]
    ]
]);
?>