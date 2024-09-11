<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m240911_084009_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'client_name' => $this->string(255)->notNull(),
            'order_name' => $this->string(255)->notNull(),
            'product_name' => $this->string(255)->notNull(),
            'phone' => $this->string(20)->notNull(),
            'status' => "ENUM('Принята', 'Отказана', 'Брак') NOT NULL",
            'comment' => $this->text(),
            'price' => $this->decimal(10, 2),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
