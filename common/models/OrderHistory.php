<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Модель истории изменения заявки
 */
class OrderHistory extends ActiveRecord
{
    public function rules()
    {
        return [
            [['order_id', 'user_id', 'changed_at', 'changes'], 'required'],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

}