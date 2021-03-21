<?php

namespace frontend\models;

use common\models\User;
use yii\db\ActiveRecord;

class Vocations extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vocations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['allow_edit'], 'boolean'],
            [['vocation_start', 'vocation_finish'], 'required' ],
            [['vocation_start', 'vocation_finish'], 'date', 'format' => 'php:Y-m-d', 'message' => 'Дата должна быть в формате Y-m-d' ],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class , ['id' => 'id_user']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Пользователь',
            'vocation_start' => 'Начало отпуска',
            'vocation_finish' => 'Конец отпуска',
            'allow_edit' => 'Разрешить редактирование',
        ];
    }
}
