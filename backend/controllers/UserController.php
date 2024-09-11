<?php

namespace backend\controllers;

use common\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class UserController extends Controller
{
    public function actionIndex()
    {
        // Проверка, что пользователь имеет права администратора
        if (!Yii::$app->user->identity->isAdmin()) {
            throw new ForbiddenHttpException('У вас нет прав для доступа к этой странице.');
        }

        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionUpdate($id)
    {
        if (!Yii::$app->user->identity->isAdmin()) {
            throw new ForbiddenHttpException('У вас нет прав для выполнения этого действия.');
        }

        $user = User::findOne($id);
        if (!$user) {
            throw new NotFoundHttpException("Пользователь не найден.");
        }

        if ($user->load(Yii::$app->request->post()) && $user->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'user' => $user
        ]);
    }

    public function actionDelete($id)
    {
        if (!Yii::$app->user->identity->isAdmin()) {
            throw new ForbiddenHttpException('У вас нет прав для выполнения этого действия.');
        }

        $user = User::findOne($id);
        if (!$user) {
            throw new NotFoundHttpException("Пользователь не найден.");
        }

        $user->delete();
        return $this->redirect(['index']);
    }
}