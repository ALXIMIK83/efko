<?php


namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacConrtoller extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // добавляем разрешение "createPost"
        /*$createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);*/

//        // добавляем разрешение "updateOwnPost"
//        $updateOwnPost = $auth->createPermission('updateOwnPost');
//        $updateOwnPost->description = 'Update own post';
//        $updateOwnPost->ruleName = $rule->name;
//        $auth->add($updateOwnPost);

        // добавляем разрешение "changeAllowEdit"
        $changeAllowEdit = $auth->createPermission('changeAllowEdit');
        $changeAllowEdit->description = 'Change allow edit';
        $auth->add($changeAllowEdit);

        // добавляем роль "author" и даём роли разрешение "createPost" и "updateOwnPost"
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);
//        $auth->addChild($author, $updateOwnPost);

        // добавляем роль "admin" разрешение "changeAllowEdit" и все разрешения роли "author"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $changeAllowEdit);
        $auth->addChild($admin, $author);

        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
    }
}