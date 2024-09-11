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

    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->response->redirect(['/site/login']);
            Yii::$app->end();
        }
        return parent::beforeAction($action);
    }
    /**
     * Страница Список пользователей
     * @return string
     * @throws ForbiddenHttpException
     */
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

    /**
     * Страница Изменить пользователя
     * @param $id
     * @return string|\yii\web\Response
     * @throws ForbiddenHttpException
     * @throws NotFoundHttpException
     * @throws \yii\db\Exception
     */
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

    /**
     * Удаление пользователя
     * @param $id
     * @return \yii\web\Response
     * @throws ForbiddenHttpException
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
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