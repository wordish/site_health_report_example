<?php
namespace Concrete\Example\SiteHealthReport\Health\Report\Test\Suite;

use Concrete\Core\Health\Report\Test\Suite;
use Concrete\Example\SiteHealthReport\Health\Report\Test\Test\CheckRandomTest;
use Concrete\Example\SiteHealthReport\Health\Report\Test\Test\CheckTimeTest;
use Concrete\Example\SiteHealthReport\Health\Report\Test\Test\CheckDayOfWeekTest;

class ExampleSuite extends Suite
{

    public function __construct()
    {
        $tests = [
            CheckDayOfWeekTest::class,
            CheckRandomTest::class,
            CheckTimeTest::class,
        ];
        foreach ($tests as $test) {
            $this->add($test);
        }
    }
}
