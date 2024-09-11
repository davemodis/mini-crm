<?php

use yii\db\Migration;

/**
 * Class m240911_095058_fill_order_table
 */
class m240911_095058_fill_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $orders = [
            [
                'client_name' => 'John Doe',
                'order_name' => 'Order 001',
                'product_name' => 'Laptop Pro 15',
                'phone' => '+1234567890',
                'status' => 'Принята',
                'comment' => 'Доставка в течение 3 дней',
                'price' => 1500.00
            ],
            [
                'client_name' => 'Jane Smith',
                'order_name' => 'Order 002',
                'product_name' => 'Smartphone X',
                'phone' => '+0987654321',
                'status' => 'Отказана',
                'comment' => 'Отменен заказ',
                'price' => 800.99
            ],
            [
                'client_name' => 'Alex Brown',
                'order_name' => 'Order 003',
                'product_name' => 'Tablet S',
                'phone' => '+1112223334',
                'status' => 'Брак',
                'comment' => 'Возврат товара из-за дефекта',
                'price' => 400.50
            ],
            [
                'client_name' => 'Emily White',
                'order_name' => 'Order 004',
                'product_name' => 'Smartwatch Z',
                'phone' => '+5556667778',
                'status' => 'Принята',
                'comment' => 'Оплачено и отправлено',
                'price' => 200.75
            ],
            [
                'client_name' => 'Michael Black',
                'order_name' => 'Order 005',
                'product_name' => 'Headphones Pro',
                'phone' => '+9876543210',
                'status' => 'Принята',
                'comment' => 'Промо-код применен',
                'price' => 150.30
            ],
            [
                'client_name' => 'Olivia Green',
                'order_name' => 'Order 006',
                'product_name' => 'Gaming Console X',
                'phone' => '+1223344556',
                'status' => 'Брак',
                'comment' => 'Проблемы с HDMI портом',
                'price' => 499.99
            ],
            [
                'client_name' => 'Daniel Blue',
                'order_name' => 'Order 007',
                'product_name' => '4K TV 50"',
                'phone' => '+1357908642',
                'status' => 'Принята',
                'comment' => 'Бесплатная доставка',
                'price' => 750.25
            ],
            [
                'client_name' => 'Sophia Yellow',
                'order_name' => 'Order 008',
                'product_name' => 'Wireless Mouse',
                'phone' => '+2233445566',
                'status' => 'Отказана',
                'comment' => 'Отмена по просьбе клиента',
                'price' => 29.99
            ],
            [
                'client_name' => 'Liam Red',
                'order_name' => 'Order 009',
                'product_name' => 'Gaming Keyboard',
                'phone' => '+9871234567',
                'status' => 'Принята',
                'comment' => 'Доставка через неделю',
                'price' => 120.75
            ],
            [
                'client_name' => 'Isabella Purple',
                'order_name' => 'Order 010',
                'product_name' => 'Bluetooth Speaker',
                'phone' => '+6543217890',
                'status' => 'Принята',
                'comment' => 'Подарочная упаковка',
                'price' => 89.99
            ]
        ];

        foreach ($orders as $order) {

            $this->insert('{{%order}}', [
                'client_name' => $order['client_name'],
                'order_name' => $order['order_name'],
                'product_name' => $order['product_name'],
                'phone' => $order['phone'],
                'status' => $order['status'],
                'comment' => $order['comment'],
                'price' => $order['price'],
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
        $this->truncateTable('{{%order}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240911_095058_fill_order_table cannot be reverted.\n";

        return false;
    }
    */
}
