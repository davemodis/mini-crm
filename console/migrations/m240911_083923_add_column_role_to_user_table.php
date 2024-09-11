<?php

use yii\db\Migration;

/**
 * Class m240911_083923_add_column_role_to_user_table
 */
class m240911_083923_add_column_role_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'role', "ENUM('admin', 'manager') NOT NULL");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'role');
    }

}
