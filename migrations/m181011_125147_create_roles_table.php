<?php

use yii\db\Migration;

/**
 * Handles the creation of table `roles`.
 */
class m181011_125147_create_roles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableName = $this->db->tablePrefix . 'roles';
        if ($this->db->getTableSchema($tableName, true) === null) {
            $this->createTable('roles', [
                'id' => $this->primaryKey(),
                'name' => $this->string(12)->notNull()
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('roles');
    }
}
