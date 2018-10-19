<?php

use yii\helpers\Url as Url;

class ContactCest
{
    public function _before(\AcceptanceTester $I)
    {
        
    }
    
    public function contactFormCanBeSubmitted(AcceptanceTester $I)
    {

//     $I->performOn('.confirm', \Codeception\Util\ActionSequence::build()
//     ->see('Warning')
//     ->see('Are you sure you want to delete this?')
//     ->click('Yes')
// );

// $I->amOnPage('/messages');
// $nick = $I->haveFriend('nick');
// $nick->does(function(AcceptanceTester $I) {
//     $I->amOnPage('/messages/new');
//     $I->fillField('body', 'Hello all!');
//     $I->click('Send');
//     $I->see('Hello all!', '.message');
// });
// $I->wait(3);
// $I->see('Hello all!', '.message');


// $nickAdmin = $I->haveFriend('nickAdmin', adminStep::class);
// $nickAdmin->does(function(adminStep $I) {
//     // Admin does ...
// });
// $nickAdmin->leave();

// codecept_debug($I->grabTextFrom('#name'));
// $I->dontSeeInCurrentUrl('/users/');

        $I->amOnPage(Url::toRoute('/site/contact'));

        $I->seeCurrentUrlEquals('/unitTestYii2/site/contact');
        $I->seeNumberOfElements(['css' => 'button.btn-primary'], 1);

        $I->wantTo('ѕроверить форму добавлени€ контакта');

        $I->wait(1);
        $I->fillField('#contactform-name', "");
        $I->fillField('#contactform-email', 'tester@example.com');

        $I->wait(1);
        $I->see("Name cannot be blank.");
        $I->fillField('#contactform-name', $I->grabValueFrom('#contactform-email'));
        
        $I->fillField('#contactform-subject', 'test subject');

        $I->wait(1);
        $I->dontSee("Name cannot be blank.");

        $I->fillField('#contactform-body', 'test content');
        $I->fillField('#contactform-verifycode', 'testme');

        $I->click('contact-button');
        $I->wait(1); // wait for button to be clicked

        $I->dontSeeElement('#contact-form');
        $I->see('Thank you for contacting us. We will respond to you as soon as possible.');
    }

    public function contactPageWorks(AcceptanceTester $I)
    {
        $I->wantTo('ensure that contact page works');
        $I->see('Contact', 'h1');
    }

    
}
