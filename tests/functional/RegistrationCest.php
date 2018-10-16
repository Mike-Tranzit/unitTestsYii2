<?php 

class RegistrationCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnPage(['site/example']);
    }


    public function registrationTitleTest(\FunctionalTester $I)
    {
        $I->see('Регистрация пользователей', 'h2');
        $I->expectTo('see validations errors');
        $I->submitForm('#registration-form', [
            'Usernames[username]' => '',
            'Usernames[email]' => ''
        ]);
        $I->see('Username cannot be blank.');
        $I->see('Email cannot be blank.');
    }

    public function setWrongEmail(\FunctionalTester $I)
    {
        $I->see('Регистрация пользователей', 'h2');
    }
}