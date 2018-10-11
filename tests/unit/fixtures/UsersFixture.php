<?php

namespace app\tests\unit\fixtures;

use yii\test\ActiveFixture;

class UsersFixture extends ActiveFixture
{
    public $modelClass = 'app\models\base\Users';
    public $depends = ['app\tests\unit\fixtures\RolesFixture'];
}