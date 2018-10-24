<?php

namespace app\components;

use yii\base\Behavior;
use app\models\Example;

class ExampleBehavior extends Behavior
{

    public $nameLocal;
    public $owner;

    public function testing()
    {
        $a = [
            'description' => $description = 'New desckriptuion' 
        ];
        return $a['description']." ".  $description;
    }

    public function getNameLocal()
    {
        echo $this->nameLocal;
    }

    public function events()
    {
        return [
            Example::TEST => 'getNameLocal'
        ];
    }
}