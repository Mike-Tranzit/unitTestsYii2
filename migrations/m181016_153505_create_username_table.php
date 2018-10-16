<?php

use yii\db\Migration;

/**
 * Handles the creation of table `username`.
 */
class m181016_153505_create_usernames_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('usernames', [
            'id' => $this->primaryKey(),
            'email' => $this->string(20)->notNull(),
            'username' => $this->string(20)->notNull(),
            'skype' => $this->string(20),
            'phone' => $this->string(20)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('username');
    }
}
