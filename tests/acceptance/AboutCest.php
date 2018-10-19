<?php

use yii\helpers\Url as Url;

class AboutCest
{
    public function ensureThatAboutWorks(\AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/about'));
        $I->wait(1);
        $I->see('About', 'h1');
    }
}
