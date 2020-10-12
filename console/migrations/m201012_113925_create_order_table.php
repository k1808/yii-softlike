<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%product}}`
 */
class m201012_113925_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'date' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'total' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-order-user_id}}',
            '{{%order}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-order-user_id}}',
            '{{%order}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-order-product_id}}',
            '{{%order}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-order-product_id}}',
            '{{%order}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-order-user_id}}',
            '{{%order}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-order-user_id}}',
            '{{%order}}'
        );

        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-order-product_id}}',
            '{{%order}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-order-product_id}}',
            '{{%order}}'
        );

        $this->dropTable('{{%order}}');
    }
}
