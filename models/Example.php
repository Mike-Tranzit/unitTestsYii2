<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\ServerErrorHttpException;
use app\components\ExampleBehavior;
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
    public $phone;
    public $local = 'Такое имя уже существует';
    public $name;
    const TEST = 'test';
    const TEST1 = 'test1';
    public static $foo = "John";


    public function __construct($plate = 'A222AA22')
    {
        $this->plate = $plate;
    }

    public static function foo($event)
    {
        print_r($event->data);die();
    
    }

    public static function getFoo()
    {
        return get_called_class()::$foo;
    }

    public function test()
    {
        $this->trigger(self::TEST);
    }

    public function behaviors()
    {
        return [
            [
                'class' => ExampleBehavior::className(),
                'nameLocal' => 'Hellow'
            ]
        ];
    }

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

    public function getName()
    {
        return 'David';
    }
    public function testMethod()
    {
        return true;
    }

    public function Send($layout = null)
    {
        if(!$layout) throw new ServerErrorHttpException('Layout is required');
        return 'Send is success';
    }
}