<?php
namespace Concrete\Example\SiteHealthReport\Health\Report\Finding\Control\Location;

use Concrete\Core\Health\Report\Finding\Control\DashboardPageLocation;

class DashboardWelcomeLocation extends DashboardPageLocation
{

    public function getPagePath(): string
    {
        return '/dashboard/welcome';
    }

    public function getName(): string
    {
        return 'Dashboard Welcome';
    }
}
