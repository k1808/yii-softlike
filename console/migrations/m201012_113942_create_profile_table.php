<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%profile}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%country}}`
 * - `{{%city}}`
 */
class m201012_113942_create_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%profile}}', [
            'id' => $this->primaryKey(),
            'gender' => $this->string(128)->notNull(),
            'user_id' => $this->integer()->notNull(),
            'first_name' => $this->string(128)->notNull(),
            'last_name' => $this->string(128)->notNull(),
            'country_id' => $this->integer()->notNull(),
            'city_id' => $this->integer()->notNull(),
            'birth_date' => $this->dateTime()->notNull(),
            'phone' => $this->string(128)->defaultValue(''),
            'qty_orders' => $this->integer()->defaultValue(0),
            'total_income' => $this->integer()->defaultValue(0),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-profile-user_id}}',
            '{{%profile}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-profile-user_id}}',
            '{{%profile}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `country_id`
        $this->createIndex(
            '{{%idx-profile-country_id}}',
            '{{%profile}}',
            'country_id'
        );

        // add foreign key for table `{{%country}}`
        $this->addForeignKey(
            '{{%fk-profile-country_id}}',
            '{{%profile}}',
            'country_id',
            '{{%country}}',
            'id',
            'CASCADE'
        );

        // creates index for column `city_id`
        $this->createIndex(
            '{{%idx-profile-city_id}}',
            '{{%profile}}',
            'city_id'
        );

        // add foreign key for table `{{%city}}`
        $this->addForeignKey(
            '{{%fk-profile-city_id}}',
            '{{%profile}}',
            'city_id',
            '{{%city}}',
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
            '{{%fk-profile-user_id}}',
            '{{%profile}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-profile-user_id}}',
            '{{%profile}}'
        );

        // drops foreign key for table `{{%country}}`
        $this->dropForeignKey(
            '{{%fk-profile-country_id}}',
            '{{%profile}}'
        );

        // drops index for column `country_id`
        $this->dropIndex(
            '{{%idx-profile-country_id}}',
            '{{%profile}}'
        );

        // drops foreign key for table `{{%city}}`
        $this->dropForeignKey(
            '{{%fk-profile-city_id}}',
            '{{%profile}}'
        );

        // drops index for column `city_id`
        $this->dropIndex(
            '{{%idx-profile-city_id}}',
            '{{%profile}}'
        );

        $this->dropTable('{{%profile}}');
    }
}
