<?php 

use Codeception\Exception\ModuleException;

class RegistrationCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('site/example');
    }

    public function testMissingUser(\FunctionalTester $I)
    {
        $I->expectException(ModuleException::class, function() use ($I) {
            $I->amLoggedInAs(100);
        });
        $I->amOnPage('site/index');
        $I->assertTrue(\Yii::$app->user->isGuest);
    }

    public function registrationTitleTest(\FunctionalTester $I)
    {
        // $I->expectTo('see validations errors');
        // $I->submitForm('#registration-form', []);
        // $I->see('Username cannot be blank.');
        // $I->see('Email cannot be blank.');
    }

    public function setWrongEmail(\FunctionalTester $I)
    {
        $I->see('Регистрация пользователей', 'h2');
    }
}