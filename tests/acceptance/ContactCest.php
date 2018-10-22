<?php



use Page\ContactPage as Page;
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
//  $I->am('Михаил');
//  $I->amOnPage(Url::toRoute('/site/contact'));


        $page = new Page($I);
        $page->openAndSetPage('/contact');
        $page->checkNumberOfElement();

        $I->wantTo('Проверить форму добавления контакта');

        $page->waitFormVisibleSetParamsAndCheck();
        $page->submitAndCheckVisibleForm();

        $I->see('Thank you for contacting us. We will respond to you as soon as possible.');
    }

    public function contactPageWorks(AcceptanceTester $I)
    {
        $I->wantTo('ensure that contact page works');
        $I->see('Contact', 'h1');
    }
}