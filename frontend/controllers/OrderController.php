<?php

namespace frontend\controllers;

use common\models\Order;
use Yii;
use yii\web\Controller;


class OrderController extends Controller
{
    /**
     * Страница Создание заявки
     * @return string|\yii\web\Response
     * @throws \yii\db\Exception
     */
    public function actionCreate()
    {
        $order = new Order();

        if ($order->load(Yii::$app->request->post()) && $order->save()) {
            Yii::$app->session->setFlash('success', 'Заявка успешно отправлена.');
            return $this->redirect(['create']);
        }

        return $this->render('create', [
            'order' => $order
        ]);
    }
}