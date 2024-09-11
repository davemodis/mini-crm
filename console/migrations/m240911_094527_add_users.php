<?php

use yii\db\Migration;

/**
 * Class m240911_094527_add_users
 */
class m240911_094527_add_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%user}}', [
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password_hash' => Yii::$app->security->generatePasswordHash('admin_password'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'role' => 'admin',
            'status' => 10,  // Активный пользователь
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $users = [
            ['username' => 'john_doe', 'role' => 'admin'],
            ['username' => 'jane_smith', 'role' => 'manager'],
            ['username' => 'alex_brown', 'role' => 'admin'],
            ['username' => 'emily_white', 'role' => 'manager'],
            ['username' => 'michael_black', 'role' => 'admin'],
            ['username' => 'olivia_green', 'role' => 'manager'],
            ['username' => 'daniel_blue', 'role' => 'admin'],
            ['username' => 'sophia_yellow', 'role' => 'manager'],
            ['username' => 'liam_red', 'role' => 'admin'],
            ['username' => 'isabella_purple', 'role' => 'manager'],
        ];

        foreach ($users as $user) {
            $this->insert('{{%user}}', [
                'username' => $user['username'],
                'email' => $user['username'].'@example.com',
                'password_hash' => Yii::$app->security->generatePasswordHash($user['username'].'123'),
                'auth_key' => Yii::$app->security->generateRandomString(),
                'role' => $user['role'],
                'status' => 10,  // Активный пользователь
                'created_at' => time(),
                'updated_at' => time(),
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('{{%user}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240911_094527_add_users cannot be reverted.\n";

        return false;
    }
    */
}
