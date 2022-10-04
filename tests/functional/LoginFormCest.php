<?php

class LoginFormCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('/');
    }

    public function openLoginPage(\FunctionalTester $I)
    {
        //$I->see('gg');
        $I->haveHttpHeader('Accept', 'application/json');
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPut('/tasks/4/done', ['done' => true]);
        $I->seeResponseContainsJson(['success' => true]);
    }
}