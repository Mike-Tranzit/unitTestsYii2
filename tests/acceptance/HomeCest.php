<?php

use yii\helpers\Url;

class HomeCest
{
    public function ensureThatHomePageWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/'));        
        $I->see('My Company');
        $I->seeLink('About');
        $I->see('Congratulations!');
    }
}