<?php
namespace Concrete\Example\SiteHealthReport\Health\Report\Test\Test;

use Concrete\Core\Config\Repository\Repository;
use Concrete\Core\Health\Report\Runner;
use Concrete\Core\Health\Report\Test\TestInterface;
use Concrete\Example\SiteHealthReport\Health\Report\Finding\Control\Location\DashboardWelcomeLocation;
use DateTime;

class CheckTimeTest implements TestInterface
{

    protected $config;

    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    public function run(Runner $report): void
    {
        $hours = [
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12,
            13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24
        ];
        $hour = (string) rand(1, count($hours));
        $currentHour= (new DateTime())->format('H');
        if ($hour === $currentHour) {
            $report->success(
                "Random hour ({$hours[$hour]}:00) is the same as now ({$currentHour}:00).",
                $report->button(new DashboardWelcomeLocation())
            );
        }
        else {
            $report->warning(
                "Random hour ({$hours[$hour]}:00) is not the same as now ({$currentHour}:00).",
                $report->button(new DashboardWelcomeLocation()));
        }
	}

}
