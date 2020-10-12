<?php

use common\models\User;
use yii\db\Migration;

/**
 * Class m201012_114652_create_admin
 */
class m201012_114652_create_admin extends Migration
{
    public function up()
    {
        User::create(
          'admin',
          'admin@example.com',
          '123456'
        );
    }

    public function down()
    {
        $this->delete('user', ['username' => 'admin']);
    }

}
