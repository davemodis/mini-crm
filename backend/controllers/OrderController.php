<?php

namespace backend\controllers;

use common\models\Order;
use common\models\OrderHistory;
use common\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class OrderController extends Controller
{

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Order::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionUpdate($id)
    {
        $order = Order::findOne($id);
        if (!$order) {
            throw new NotFoundHttpException("Заявка не найдена.");
        }

        if ($order->load(Yii::$app->request->post()) && $order->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'order' => $order
        ]);
    }

    public function actionChangeStatus($id, $status)
    {
        $order = Order::findOne($id);
        if (!$order) {
            throw new NotFoundHttpException("Заявка не найдена.");
        }

        if (in_array($status, ['Принята', 'Отказана', 'Брак'])) {
            $order->scenario = Order::SCENARIO_STATUS_CHANGE;
            $order->status = $status;
            $order->save();
        }

        return $this->redirect(['index']);
    }

    public function actionHistory($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => OrderHistory::find()->where(['order_id' => $id])->orderBy(['changed_at' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('history', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionExportCsv()
    {
        $orders = Order::find()->all();

        $filename = 'orders-' . date('Y-m-d_H:i') . '.csv';

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename='.$filename);

        $output = fopen('php://output', 'w');
        fputcsv($output, ['Наименование заявки', 'Товар', 'Цена', 'Телефон']);

        foreach ($orders as $order) {
            fputcsv($output, [
                $order->order_name,
                $order->product_name,
                $order->price,
                $order->phone,
            ]);
        }

        fclose($output);
        exit();
    }
}