<?php

use common\rbac\AuthorRule;
use yii\db\Migration;

/**
 * Class m210320_140855_init_rbac
 */
class m210320_140855_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        // добавляем разрешение "updateOwnPost"
        $rule = new AuthorRule;
        $auth->add($rule);

        $updateOwnPost = $auth->createPermission('updateOwnPost');
        $updateOwnPost->description = 'Update own post';
        $updateOwnPost->ruleName = $rule->name;
        $auth->add($updateOwnPost);

        // добавляем разрешение "updatePost"
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        // добавляем разрешение "changeAllowEdit"
        $changeAllowEdit = $auth->createPermission('changeAllowEdit');
        $changeAllowEdit->description = 'Change allow edit';
        $auth->add($changeAllowEdit);

        // добавляем роль "author" и даём роли разрешение "updateOwnPost"
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $updateOwnPost);

        // добавляем роль "admin" разрешения "changeAllowEdit", "updatePost" и все разрешения роли "author"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $changeAllowEdit);
        $auth->addChild($admin, $author);

        $auth->assign($admin, 1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210320_140855_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
