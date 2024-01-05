<?php
namespace Concrete\Example\SiteHealthReport\Health\Report\Test\Test;

use Concrete\Core\Config\Repository\Repository;
use Concrete\Core\Health\Report\Runner;
use Concrete\Core\Health\Report\Test\TestInterface;
use Concrete\Example\SiteHealthReport\Health\Report\Finding\Control\Location\DashboardWelcomeLocation;
use DateTime;

class CheckDayOfWeekTest implements TestInterface
{

    protected $config;

    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    public function run(Runner $report): void
    {

        $results = [
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
            7 => 'Sunday'
        ];
        $result = (string) rand(1, count($results));
        $dow = (new DateTime())->format('N');
        if ($result === $dow) {
            $report->success(
                "Random day ({$results[$result]}) is the same as today ({$results[$dow]}).",
                $report->button(new DashboardWelcomeLocation())
            );
        }
        else {
            $report->warning(
                "Random day ({$results[$result]}) is not the same as today ({$results[$dow]}).",
                $report->button(new DashboardWelcomeLocation())
            );
        }
	}

}
