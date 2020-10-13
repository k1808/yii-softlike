<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category}}`
 */
class m201012_113907_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull(),
            'category_id' => $this->integer()->notNull(),
            'price' => $this->integer()->notNull(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-product-category_id}}',
            '{{%product}}',
            'category_id'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-product-category_id}}',
            '{{%product}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );

        $this->batchInsert('product', ['name', 'category_id', 'price'], [['Audy', 1, 1000],
                                                                                   ['BMW', 1 , 1200],
                                                                                   ['shorts', 2, 10],
                                                                                   ['Banana', 3 , 2],                                                   ['shorts', 2, 10],
                                                                                   ['Apple', 3 , 3],
                                                                                   ['curtains', 4, 330],
                                                                                   ['Milk', 3 , 1.5],
                                                                                            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-product-category_id}}',
            '{{%product}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-product-category_id}}',
            '{{%product}}'
        );

        $this->dropTable('{{%product}}');
    }
}
