<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_history}}`.
 */
class m240911_084039_create_order_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_history}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(11)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
            'changed_at' => $this->integer(11)->notNull(),
            'changes' => $this->text()->notNull(),
        ]);

        // creates index for column `order_id`
        $this->createIndex(
            '{{%idx-order_history-order_id}}',
            '{{%order_history}}',
            'order_id'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-order_history-user_id}}',
            '{{%order_history}}',
            'user_id'
        );

        // add foreign key for table `{{%order}}`
        $this->addForeignKey(
            '{{%fk-order_history-order_id}}',
            '{{%order_history}}',
            'order_id',
            '{{%order}}',
            'id',
            'CASCADE'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-order_history-user_id}}',
            '{{%order_history}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%order}}`
        $this->dropForeignKey(
            '{{%fk-order_history-order_id}}',
            '{{%order_history}}'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            '{{%idx-order_history-order_id}}',
            '{{%order_history}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-order_history-user_id}}',
            '{{%order_history}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-order_history-user_id}}',
            '{{%order_history}}'
        );

        $this->dropTable('{{%order_history}}');
    }
}
