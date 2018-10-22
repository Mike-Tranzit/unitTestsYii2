<?php
namespace Page;

use yii\helpers\Url as Url;
use Codeception\Util\Locator;

class ContactPage
{
    // include url of current page
    public static $URL = '/site';
    public static $BASE = '/unitTestYii2';
    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */
    public static function route($param)
    {
        return static::$URL.$param;
    }

    /**
     * @var \Tester;
     */
    protected $tester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function openAndSetPage($page)
    {
        $I = $this->tester;
        $I->am('Mike');
        $I->amOnPage(Url::toRoute(self::route($page)));
        $I->seeCurrentUrlEquals(self::$BASE.self::route($page));
    }

    public function waitFormVisibleSetParamsAndCheck()
    {
        $I = $this->tester;
        $I->performOn('#contact-form', \Codeception\Util\ActionSequence::build() // ждем по¤влени¤ формы и потом делаем что-то.
                    ->fillField('#contactform-name', "")
                    ->fillField('#contactform-email', 'tester@example.com')
        );

        $I->wait(1);
        $I->see("Name cannot be blank.");
        $I->fillField('#contactform-name', 'tester');
        
        $I->fillField('#contactform-subject', 'test subject');

        $I->wait(1);
        $I->dontSee("Name cannot be blank.");
        $I->canSeeInField('#contactform-name', 'tester');

        $I->fillField('#contactform-body', 'test content');
        $I->fillField('#contactform-verifycode', 'testme');
    }

    public function checkNumberOfElement()
    {
        $I = $this->tester;
        $I->seeNumberOfElements(['css' => 'button.btn-primary'], 1);
    }

    public function submitAndCheckVisibleForm()
    {
        $I = $this->tester;
        $I->click(Locator::contains('#contact-form button', 'Submit'));
        $I->wait(1); // wait for button to be clicked
        $I->dontSeeElement('#contact-form');
    }
}
