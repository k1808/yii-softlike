<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%country}}`.
 */
class m201012_113806_create_country_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%country}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull(),
        ]);
        $this->batchInsert('country', ['name'], [['Ukraine'], ['Vietnam'],
          ['Canada'], ['USA'], ['Belarus'], ['Russia'],]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%country}}');
    }
}
