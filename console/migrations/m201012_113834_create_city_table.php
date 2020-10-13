<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%city}}`.
 */
class m201012_113834_create_city_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%city}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull(),
        ]);

        $this->batchInsert('city', ['name'], [['Kiev'], ['New Yerk'], ['London'], ['Baku'],
                                                    ['Moscow'], ['Yerevan'], ['Tunisia'], ['Minsk'],]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%city}}');
    }
}
