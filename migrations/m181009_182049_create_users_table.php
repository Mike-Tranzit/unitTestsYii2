<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m181009_182049_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    CONST TABLE_NAME = 'users';
    CONST DB_NAME = 'yii2advanced_test';
    private $tableSchema;

    public function safeUp()
    {

        $tableName = $this->db->tablePrefix . 'users';

        $this->tableSchema = $this->db->getTableSchema($tableName, true);

        if ($this->tableSchema === null) {
            $this->createTable('users', [
                'id' => $this->primaryKey(),
                'name' => $this->string(255)->notNull(),
                'description' => $this->string(255),
                'deleted' => $this->integer(1),
                'updated_at' => $this->datetime()->notNull(),
                'arrived' => $this->tinyInteger(1)->comment("Status")->notNull()
            ]);
        }
        
        $this->tableSchema = (array) $this->tableSchema;

        if($this->checkColumnExist('loadingDate') == 0) {
            $this->addColumn('users', 'loadingDate', $this->datetime()->notNull());
        }

        if($this->checkColumnExist('role_id') == 0) {
            $this->addColumn('users', 'role_id', $this->integer()->notNull());
        }

        if(!$this->checkIndexExist('role_id')) {
            $this->createIndex(
                'idx_roles_role_id',
                'users',
                'role_id'
            );
        }
        
        if(!$this->checkForeignKeyExist('fk_roles_role_id')) {
            $this->addForeignKey(
                'fk_roles_role_id',
                'users',
                'role_id',
                'roles',
                'id',
                'CASCADE',
                'CASCADE'
            );
        }

        $this->batchInsert('users',
            ['name','description', 'deleted', 'updated_at', 'arrived','loadingDate','role_id'],
            [
                ['name', 'description', 1, date("Y-m-d H:i:s"), 0, date("Y-m-d H:i:s"), 10]
            ]
        );
    }
    
    /**
     * checkForeignKeyExist
     *
     * @param  mixed $foreignKey
     *
     * @return void
     */
    public function checkForeignKeyExist(string $foreignKey)
    {
        return ($this->tableSchema['foreignKeys'] && array_key_exists($foreignKey, $this->tableSchema['foreignKeys']));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }

    /**
     * checkIndexExist
     *
     * @param  mixed $indexName
     *
     * @return void
     */
    public function checkIndexExist(string $indexName)
    {
        return Yii::$app->db->createCommand("SHOW INDEX FROM ".self::TABLE_NAME." WHERE COLUMN_NAME=:indexName")
                                    // ->bindValue(':tablename', self::TABLE_NAME)
                                    ->bindValue(':indexName', $indexName)
                                    ->queryScalar();
    }
    /**
     * checkColumnExist
     *
     * @param  mixed $columnName
     * @param  mixed $tableSchema
     * @param  mixed $tableName
     *
     * @return void
     */
    public function checkColumnExist(string $columnName)
    {
        return Yii::$app->db->createCommand("SELECT count(:columnName) FROM INFORMATION_SCHEMA.COLUMNS 
                                    WHERE TABLE_SCHEMA = :tableSchema AND TABLE_NAME = :tablename 
                                    AND COLUMN_NAME=:columnName")
                                    ->bindValue(':tableSchema', self::DB_NAME)
                                    ->bindValue(':tablename', self::TABLE_NAME)
                                    ->bindValue(':columnName', $columnName)
                                    ->queryScalar();
    }
}
