<?php
namespace Concrete\Example\SiteHealthReport\Health\Report\Test\Test;

use Concrete\Core\Config\Repository\Repository;
use Concrete\Core\Health\Report\Runner;
use Concrete\Core\Health\Report\Test\TestInterface;
use Concrete\Example\SiteHealthReport\Health\Report\Finding\Control\Location\DashboardWelcomeLocation;

class CheckRandomTest implements TestInterface
{

    protected $config;

    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    public function run(Runner $report): void
    {
        $results = [
            'success',
            'info',
            'alert',
            'warning'
        ];
        $result = rand(0, count($results) - 1);
        $report->{$results[$result]}(
            "Random result: {$results[$result]}",
            $report->button(new DashboardWelcomeLocation())
        );
	}

}
