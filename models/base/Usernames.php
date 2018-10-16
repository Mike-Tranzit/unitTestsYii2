<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "usernames".
 *
 * @property int $id
 * @property string $email
 * @property string $username
 * @property string $skype
 * @property string $phone
 */
class Usernames extends \yii\db\ActiveRecord
{
    public $username;
    public $email;
    public $skype;
    public $phone;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usernames';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'username'], 'required'],
            [['username'], 'string', 'min' => 5],
            [['email'], 'email'],
            [['email', 'username', 'skype', 'phone'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'username' => 'Username',
            'skype' => 'Skype',
            'phone' => 'Phone',
        ];
    }
}
