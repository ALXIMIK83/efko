<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vocations}}`.
 */
class m210321_063918_create_vocations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vocations}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer(),
            'vocation_start' => $this->date(),
            'vocation_finish' => $this->date(),
            'allow_edit' => $this->integer()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%vocations}}');
    }
}
