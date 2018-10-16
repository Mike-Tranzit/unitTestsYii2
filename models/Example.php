<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\ServerErrorHttpException;

/**
 * 
 * @property plate
 *
 */
class Example extends Model
{

    public function rules()
    {
        return [
            [['plate'], 'required', 'when' => function($model) {
                return $model->stevedore == 1;
            }],
            ['plate', 'string', 'max' => 8],
            ['stevedore', 'integer'],
            ['trader', 'default' , 'value' => 1],
            ['phone', 'filter', 'filter' => function ($value) {
                return '+7918' . $value;
            }],
            ['name', 'required'],
            ['name', 'validateName'],
            ['name', 'unique', 'targetClass' => '\app\models\base\Users', 'message' => 'Такое имя уже существует'],
        ];
    }

    public function validateName($attribute, $params)
    {
        if(in_array($this->$attribute, ['Петров'])) {
            $this->addError($attribute, 'Фамилия не должна быть Петров');
        }
    }

    public function Send($layout = null)
    {
        if(!$layout) throw new ServerErrorHttpException('Layout is required');
        return 'Send is success';
    }
}