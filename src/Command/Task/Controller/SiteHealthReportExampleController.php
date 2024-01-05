<?php
namespace Concrete\Example\SiteHealthReport\Command\Task\Controller;

use Concrete\Core\Health\Report\Grader\GraderInterface;
use Concrete\Core\Health\Report\Test\SuiteInterface;
use Concrete\Core\Health\Report\ReportController;
use Concrete\Example\SiteHealthReport\Health\Report\Test\Suite\ExampleSuite;

defined('C5_EXECUTE') or die('Access Denied');

class SiteHealthReportExampleController extends ReportController
{

    public function getName(): string
    {
        return t('Custom Site Health Report Example');
    }

    public function getConsoleCommandName(): string
    {
        return 'health:custom-report-example';
    }

    public function getDescription(): string
    {
        return t('Demonstrates how to add a custom Site Health report to a package.');
    }

    public function getTestSuite(): SuiteInterface
    {
        return new ExampleSuite();
    }

    public function getResultGrader(): ?GraderInterface
    {
        return new ProductionGrader();
    }
}
