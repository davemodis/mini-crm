<?php

namespace common\models;

use yii\db\ActiveRecord;

class Order extends ActiveRecord
{
    const SCENARIO_STATUS_CHANGE = 'status_change';

    public function rules()
    {
        return [
            [['client_name', 'product_name', 'phone'], 'required'],
            ['phone', 'number'],
            ['price', 'number', 'min' => 0],
            [['comment','status'], 'string'],
            ['product_name', 'in', 'range' => ['Яблоки', 'Апельсины', 'Мандарины']],

            ['status', 'string', 'on' => self::SCENARIO_STATUS_CHANGE],

        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_STATUS_CHANGE] = ['status'];

        return $scenarios;
    }

    public function beforeSave($insert)
    {
        if (empty($this->order_name)) {
            $this->order_name = 'Order ' . rand(1000, 9000);
        }
        if ($insert) {
            $this->created_at = time();
        }
        $this->updated_at = time();

        return parent::beforeSave($insert);
    }


    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        // Если есть изменения, записать их в историю
        if (!$insert && !empty($changedAttributes)) {
            $history = new OrderHistory();
            $history->order_id = $this->id;
            $history->user_id = \Yii::$app->user->id;
            $history->changed_at = time();
            unset($changedAttributes['created_at']);
            unset($changedAttributes['updated_at']);
            $history->changes = json_encode($changedAttributes); // Сохраняем изменения как JSON
            $history->save();
        }
    }
}