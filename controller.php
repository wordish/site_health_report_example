<?php

namespace Concrete\Package\SiteHealthReportExample;

use Concrete\Core\Package\Package;
use Concrete\Core\Package\PackageService;
use Concrete\Core\Command\Task\Manager as TaskManager;
use Concrete\Example\SiteHealthReport\Command\Task\Controller\SiteHealthReportExampleController;

class Controller extends Package
{
    protected $pkgHandle = 'site_health_report_example';
    protected $appVersionRequired = '9';
    protected $pkgVersion = '0.1';
    protected $pkgAutoloaderRegistries = [
        'src' => '\Concrete\Example\SiteHealthReport'
    ];

    public function getPackageName()
    {
        return t('Site Health Report Example');
    }

    public function getPackageDescription()
    {
        return t('An example custom Site Health report');
    }

    public function install()
    {
        parent::install();
        $this->installContentFile('install' . DIRECTORY_SEPARATOR . 'tasks.xml');
    }

    public function upgrade() {
        parent::upgrade();
        $this->installContentFile('upgrade' . DIRECTORY_SEPARATOR . 'tasks.xml');
    }

    public function on_start()
    {
        $manager = $this->app->make(TaskManager::class);
        $manager->extend('custom_site_health_report_example', function () {
            return new SiteHealthReportExampleController($this->getEntityManager());
        });
    }    
}
    
