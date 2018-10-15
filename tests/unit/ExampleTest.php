<?php

use \app\models\Example;

use app\tests\unit\fixtures\UsersFixture;
use yii\web\ServerErrorHttpException;
class ExampleTest extends \Codeception\Test\Unit
{
    use \Codeception\Specify;
    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $formClass;

    public function _fixtures()
    {
        return [
            'users' => UsersFixture::className()
        ];
    }

    protected function _before()
    {
        $this->formClass = new Example();
    }

    protected function _after()
    {
    }

    /**
     * @test
     */
    public function checkAttributesExist()
    {
        $this->assertClassHasAttribute('plate', Example::class);
        $this->assertClassHasAttribute('name', Example::class);
        $this->assertClassHasAttribute('stevedore', Example::class);
        $this->assertClassHasAttribute('trader', Example::class);
        $this->assertClassHasAttribute('phone', Example::class);
    }

    /**
     * @test
     */
    public function checkEmptyExampleModel()
    {
        $this->assertFalse($this->formClass->validate(), 'Example class is empty');

        $this->specify("check name blank", function() {
            expect($this->formClass->getErrors())->hasKey('name');
            expect($this->formClass->getErrors()['name'][0])->equals('Name cannot be blank.');
        });
    }

    
    /**
     * @test
     */
    public function checkEmptyExampleModelWithStevedore()
    {
        $this->formClass->stevedore = 1;
        $this->specify('check Validate and Key plate', function() {
            expect($this->formClass->validate())->false();
            expect($this->formClass->getFirstError('plate'))->equals('Plate cannot be blank.');
        });
    }

    /**
     * @test
     */
    public function checkFailName()
    {
        $this->formClass->name = 'Devyatov';
        $this->formClass->validate();
        expect($this->formClass->getFirstError('name'))->equals('Такое имя уже существует');
    }

    /**
     * @test
     */
    public function checkPhoneFilterValue()
    {
        $this->formClass->phone = '4868904';
        $this->formClass->validate();
        expect($this->formClass->phone)->contains('+79184868904');
    }

    /**
     * @test
     */
    public function checkEmptyErrorArray()
    {
        
        $this->formClass->stevedore = 1;
        $this->formClass->name = 'Иванов';
        $this->formClass->plate = 'Y111YY11';
        $this->formClass->validate();
        expect($this->formClass->getErrors())->isEmpty();
    }

    //
    // ──────────────────────────────────────────────────────────────── I ──────────
    //   :::::: M O C K   O B J E C T S : :  :   :    :     :        :          :
    // ──────────────────────────────────────────────────────────────────────────
    //

    /**
     * @test
     */
    public function createAndTestSendMethod()
    {
        $example = $this->getMockBuilder(Example::class)
                    ->setMethods(['Send'])
                    ->getMock();

        $example->expects($this->once())
                        ->method('Send')
                        ->will($this->throwException(new ServerErrorHttpException()));
        
                        try {
                            $example->Send();
                        } catch (ServerErrorHttpException $ex) {
                            return;
                        }
                        $this->fail("Expected Exception has not been raised.");
    }

}