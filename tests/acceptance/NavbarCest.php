<?php

namespace MDBootstrapTest;

use MDBootstrapTest\AcceptanceTester;

/**
 * Class NavbarCest
 *
 * @package MDBootstrapTest
 */
class NavbarCest
{
    /**
     * @param \MDBootstrapTest\AcceptanceTester $I
     *
     * @throws \Exception
     */
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/application/about');
        $I->waitForText('Page about', 2);
        $I->seeElementInDOM('ul.navbar-nav li.active.nav-item a.nav-link');

        $I->amOnPage('/');
        $I->waitForText('Page index', 2);
        $I->seeElementInDOM('ul.navbar-nav li.active.nav-item a.nav-link');
    }
}
