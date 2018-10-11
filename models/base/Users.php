<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $deleted
 * @property string $updated_at
 * @property int $arrived Status
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'deleted', 'updated_at', 'arrived'], 'required'],
            [['deleted', 'arrived'], 'integer'],
            [['updated_at'], 'safe'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'deleted' => 'Deleted',
            'updated_at' => 'Updated At',
            'arrived' => 'Arrived',
        ];
    }
}
