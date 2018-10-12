<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * 
 * @property plate
 *
 */
class Example extends Model
{
    public $plate;
    public $stevedore;
    public $trader;
    public $fio;


    public function rules()
    {
        return [
            [['plate'], 'required', 'when' => function($model) {
                return $model->stevedore == 1;
            }],
            ['plate', 'string', 'max' => 3],
            ['stevedore', 'integer'],
            ['trader', 'default' , 'value' => 1],
            ['fio', 'validateFio'],
        ];
    }

    public function validateFio($attribute, $params)
    {
        if(!in_array($this->$attribute, ['Иванов'])) {
            $this->addError($attribute, 'Фамилия должна быть только Иванов');
        }
    }
}