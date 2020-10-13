<?php

use yii\db\Migration;

/**
 * Class m201013_082030_create_rbac_migration
 */
class m201013_082030_create_rbac_migration extends Migration
{

    public function up()
    {
        Yii::$app->runAction('migrate/up', [
          'migrationPath' => '@yii/rbac/migrations/',
          'interactive' => false
        ]);
        $auth = Yii::$app->authManager;
        $admin = $auth->createRole('admin');
        $admin->description = 'Admin';
        $auth->add($admin);

        $customer = $auth->createRole('customer');
        $customer->description = 'Customer';
        $auth->add($customer);

        $user = $auth->createRole('user');
        $user->description = 'User';
        $auth->add($user);

        $manageSystem = $auth->createPermission('manageSystem');
        $manageSystem->description = 'Manage a system';
        $auth->add($manageSystem);


        $createProfile = $auth->createPermission('createProfile');
        $createProfile->description = 'Create profile';
        $auth->add($createProfile);

        $updateProfile = $auth->createPermission('updateProfile');
        $updateProfile->description = 'Update profile';
        $auth->add($updateProfile);

        $createOrder = $auth->createPermission('createOrder');
        $createOrder->description = 'Create order';
        $auth->add($createOrder);

        $auth->addChild($user, $createProfile);
        $auth->addChild($customer, $createOrder);
        $auth->addChild($customer, $updateProfile);
        $auth->addChild($admin, $manageSystem);
        $auth->addChild($admin, $user);
        $auth->addChild($admin, $customer);

        $auth->assign($admin, 1);
    }

    public function down()
    {
        return false;
    }
}
