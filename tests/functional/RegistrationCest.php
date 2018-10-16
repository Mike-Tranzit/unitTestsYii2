<?php 

class RegistrationCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnPage(['/site/example']);
    }


    public function registrationTitleTest(\FunctionalTester $I)
    {
        $I->see('Регистрация пользователей', 'h2');
    }
}