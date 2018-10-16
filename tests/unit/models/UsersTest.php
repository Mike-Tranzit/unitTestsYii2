<?php 

namespace app\tests\unit\models;

use app\tests\unit\fixtures\UsersFixture;
// use yii\test\FixtureTrait;
class UsersTest extends \Codeception\Test\Unit
{
    use \Codeception\Specify;

    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $userClass;

    public function _fixtures()
    {
        return [
            'users' => UsersFixture::className()
        ];
    }

    protected function _before()
    {
        $this->userClass = new \app\models\base\Users();
    }

    protected function _after()
    {
        $this->userClass = null;
    }

    /**
     * @dataProvider tryToCreateNameProvider
     */
    public function testTryToCreateTestedRecord($name)
    {
        $this->specify('test fake data', function($description, $deleted, $updated_at, $arrived) use ($name) {

            $testData = ['name' => $name, 'description' => $description, 'deleted' => $deleted, 'updated_at' => $updated_at, 'arrived' => $arrived];
            $this->userClass->setAttributes($testData);
            $valid = $this->userClass->validate();
            $this->assertTrue($valid);

        }, ['examples' => $this->tryToCreateProvider()]);
    }

    public function tryToCreateProvider()
    {   
        return [
            ['Description', 0, '2018-10-10 21:23:36', 1],
            ['Test description', 1, '2018-10-10 21:23:36', 1],
            ['Test description #2', 0, '2018-10-10 21:23:36', 2],
            ['Test description #2', 1, '2018-10-10 21:23:36', 4]
        ];
    }

    public function tryToCreateNameProvider()
    {
        return [
            ['Mike'],
            ['Test name'],
            ['Test name #1'],
            ['Test name #2']
        ];
    }

    /**
     * @group future
     */
    public function testFixtureInUsers()
    {
        $user = $this->tester->grabFixture('users', 0);
        $this->assertEquals(1, $user->id);
    }
}